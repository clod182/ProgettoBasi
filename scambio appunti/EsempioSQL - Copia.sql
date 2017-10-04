/* cancellazioni preventive per caricamenti multipli in caso di errore */
drop table if exists utenti cascade;
drop table if exists appunti cascade;
drop table if exists lezioni cascade;
drop table if exists corsi cascade;


create table utenti
   ( nickname text not null,
     password text not null,
     primary key(nickname));

create table appunti
   ( id_app serial not null,
     titolo text not null,
     testo text not null,
     utente text,
	   idlez integer,
     primary key(id_app));

create table lezioni
   ( id_lez integer not null,
     nome text,
	   dataa timestamp not null default current_timestamp,
	   idcor integer,
     primary key(id_lez));

create table corsi
   ( id_cor serial not null,
     nome text,
	   docente text,
     primary key(id_cor));

/* definizione delle chiavi esterne */

alter table appunti
add foreign key (utente) references utenti
  on delete set null;

 alter table appunti
add foreign key (idlez) references lezioni
  on delete set null;

  alter table lezioni
add foreign key (idcor) references corsi
  on delete set null;

/* funzioni */
create or replace function nuovo_utente(n text, p text) returns void as $$
  insert into utenti (nickname, password) values (n, md5(p));
$$ language sql;

//aggiunta
create or replace function nuovo_appunto(tit text,t text,nu text,iddd int) returns void as $$
  insert into appunti (titolo,testo, utente,idlez) values (tit,t, nu, iddd);
$$ language sql;

create or replace function nuovo_corso(n text,d text) returns void as $$
  insert into corsi (nome, docente) values (n, d);
$$ language sql;

/*prova inserimento lezioni
select nuova_lezione (1,'laboratorio','2001-09-29 00:17:00' ,1);
select nuova_lezione (18,'tutorato','2001-09-29 00:12:00' ,1);
select nuova_lezione (2,'esercitazione','2001-09-29 00:00:00' ,3);
*/
create or replace function nuova_lezione(idd integer,n text,data timestamp,idc integer) returns void as $$
  insert into lezioni (id_lez, nome, dataa, idcor) values (idd, n, data, idc);
$$ language sql;
/* controllo credenziali */
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

/*inserimento dati prova */
SELECT lezioni(1, 'programmazione');
