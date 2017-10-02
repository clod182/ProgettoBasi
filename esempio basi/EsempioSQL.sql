/* cancellazioni preventive per caricamenti multipli in caso di errore */
drop table if exists utenti cascade;
drop table if exists questioni cascade;
drop table if exists risposte cascade;

/* definizione delle tabelle senza chiavi esterne */
create table utenti
   ( nickname text not null,
     password text not null,
     primary key(nickname));

create table questioni
   ( id serial not null,
     domanda text not null,
     stamp timestamp not null default current_timestamp,
     numSi integer not null default 0,
     numNo integer not null default 0,
     utente text,
     primary key(id));

create table risposte
   ( idDomanda integer not null,
     nick text,
     risposta char(1)  not null,
     primary key(idDomanda, nick));

alter table risposte
add foreign key (idDomanda) references questioni 
  on delete cascade;

/* definizione delle chiavi esterne */
alter table risposte
add foreign key (nick) references utenti 
  on delete set null;

alter table questioni
add foreign key(utente) references utenti
  on delete set null;

/* esempio di vista */
drop view if exists statistiche_utenti cascade;

create view statistiche_utenti as
  select nickname, count(*) as numeroQuestioniPoste
    from utenti, questioni
   where nickname = utente
   group by nickname;

/*  esempi di funzioni
 *  in questo caso si usa create or replace function
 *  per i caricamenti multipi
 *  Si noti che si definiscono prima due funzioni SQL, il cui corpo e' un'unico
 *  comando SQL (ma potrebbero avere anche piu' comandi)
 *  e poi una funzione PL/pgSQL (credenziali_valide)
 */

/*  per creare un nuovo utente si inserisce nel database NON la password
 *  fornita (che sara' in chiaro), ma il risultato dell'applicazione
 *  della funzione di hash crittografico md5 alla password. In questo modo se qualcuno
 *  accede al database NON potra' vedere le password inserite dagli utenti
 *  ma solo il loro hash, che, essendo non invertibile, non permette di
 *  risalire alla password.
 */
create or replace function nuovo_utente(n text, p text) returns void as $$
  insert into utenti (nickname, password) values (n, md5(p));
$$ language sql;

create or replace function nuova_questione(d text, n text) returns void as $$
  insert into questioni (domanda, utente) values (d, n);
$$ language sql;

/*  la prossima funzione controlla le credenziali dell'utente per verificarne la validita',
 *  applicando la funzione md5 alla password passata e confrontandola con quella presente
 *  nel database, e restituisce vero o false a seconda che le credenziali siano corrette
 */
create or replace function credenziali_valide(n text, p text) returns boolean as $$
declare
  pwd text;
begin
  select password into pwd from utenti where n = nickname;
  if md5(p) = pwd
     then return true;
     else return false;
  end if;
end;
$$ language plpgsql;

/*  Esempio di funzione che restituisce una tabella.
 *  questioni_di(nomeutente) restituisce una tabella con tutte le domande
 *  poste da un certo utente. Questo e' un modo per creare query parametriche.
 *  esempio di uso:  select * from questioni_di('mario')
 */
create or replace function questioni_di(n text) returns setof text as $$
declare
  r text;
begin
  for r in select domanda from questioni where utente = n loop
    return next r;
  end loop;
  return;
end;
$$ language plpgsql;

/*  Esempio di gestione dell'aggiornamento automatico di un campo con un trigger.
 *  I campi numSi e numNo della tabella questioni vengono aggiornati automaticamente
 *  quando si inserisce una riga nella tabella risposte, in base alla risposta.
 *  Questo avviene con un trigger sull'inserimento della riga.
 *  Si definisce prima la funzione trigger, poi il trigger vero e proprio
 *  La funzione trigger non ha parametri e usa new per indicare la riga inserita
 */
create or replace function incrementaSiONo() returns trigger as $$
declare
  risposta text = new.risposta;
  iddom integer = new.idDomanda;
begin
  if risposta = 's'
     then update questioni set numSi = numSi + 1 where id = iddom;
     else update questioni set numNo = numNo + 1 where id = iddom;
  end if;
  return new;
end
$$ language plpgsql;

drop trigger if exists incrementaSiONo on risposte;
create trigger incrementaSiONo after insert on risposte
  for each row execute procedure incrementaSiONo();

/*  Questa e' la funzione di creazione di una risposta, prende in ingresso l'utente
 *  che risponde, il testo della domanda, perche' piu' "leggibile" dell'id, e la
 *  risposta, e fa le sequenti operazioni:
 *  1) Trova l'id associato alla domanda, se non esiste fa fallire la transazione
 *  2) Qualunque sia il carattere della risposta, lo trasforma in 's' oppure 'n'
 *  3) Inserisce la risposta
 *            ==>> L'inserzione provochera' l'attivazione del trigger
 *                 per incrementare il totale delle risposte si o no nella domanda
 *  Si noti che l'operazione puo' fallire anche per il vincolo di chiave esterna
 *  sull'utente (n)
 */
create or replace function risponde(n text, td text, r char(1)) returns void as $$
declare
  idDom integer;
begin
  select id into idDom
    from questioni
   where domanda = td;
  if idDom is null then
     raise exception 'Nessuna domanda con il testo specificato';
  end if;
  if (r = 's') or (r = 'S')
     then r = 's';
     else r = 'n';
  end if;
  insert into risposte (idDomanda, nick, risposta) values (idDom, n, r);
end
$$ language plpgsql;

/* inserimento di alcuni dati di esempio */

select nuovo_utente('pippo', 'yuk!');
select nuovo_utente('pluto', 'arfbau');
select nuovo_utente('minnie', 'ciao!');

select nuova_questione('L’uovo è meglio della gallina ?', 'pippo');
select nuova_questione('I cani sono più simpatici dei gatti ?', 'minnie');

select risponde( 'pippo', 'L’uovo è meglio della gallina ?', 's');
select risponde( 'pluto', 'L’uovo è meglio della gallina ?', 'n');
select risponde( 'minnie', 'L’uovo è meglio della gallina ?', 'n');
select risponde( 'pippo', 'I cani sono più simpatici dei gatti ?', 's');
select risponde( 'pluto', 'I cani sono più simpatici dei gatti ?', 's');
select risponde( 'minnie', 'I cani sono più simpatici dei gatti ?', 's');

/*  esempio di ricerca testuale:
 *  si usa l'operatore ilike (che, a differenza di like, ignora la differenza fra
 *  maiuscole e minuscole) e l'operatore di concatenazione di stringhe ||
 *  i caratteri % indicano qualunque sequenza anche vuota di caratteri.
 *  Quindi ad esempio con "domande('uovo')" si restituiscono tutte le domande
 *  che hanno nel testo la parola "uovo", "Uovo", "UOVO", ecc. in qualunque posizione 
 */

create or replace function domande(parola text) returns SETOF questioni as $$
  select * from questioni where domanda ilike '%' || parola || '%';
$$ language sql;

select * from domande('uovo');

