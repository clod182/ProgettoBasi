<?php
// Questo file viene sempre incluso all'inizio dei files .php

// da eseguire per produrre stampe di errore visibili nelle pagine di risposta
error_reporting(E_ALL & ~E_NOTICE);

// alcune funzioni di utilita' comune alle varie pagine
  // verifica se esiste una sessione attiva (l'utente si e' autenticato)
  // altrimenti ri-indirizza alla pagina di "ingresso" (index.php)
  function controllo_accesso() {
    session_start();
    if (empty($_SESSION['nome_utente'])) {
      header('Location:index.php');
    }
  }
  // crea una connessione al database
  function connessione() {
     $dbconn = new PDO('pgsql:host=dblab.dsi.unive.it;port=5432;dbname=utente100','utente100','utentex100');
     $dbconn -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     return $dbconn;
  }

// funzioni per alcune query (potrebbero stare nelle varie pagine, sono qui come esempi)

  // restituisce gli ultimi 5 sondaggi come array di 5 valori numerici (da 0 a 4)
  function ultimi_sondaggi($dbconn) {
    $stat = $dbconn->query('select id, domanda, numsi, numno from questioni order by stamp desc limit 5');
    return $stat->fetchAll();
  }

  // restituisce tutti i sondaggi in funzione dell'utente della sessione corrente
  // con l'informazione se l'utente ha votato o no il sondaggio (campo "ha_risposto")
  function tutti_sondaggi($dbconn) {
    $stat = $dbconn->prepare('select id, domanda, numsi, numno, 0 as ha_risposto
       from questioni where not exists(select * from risposte where iddomanda=id and nick=?)
       union
       select distinct id, domanda, numsi, numno, 1 as ha_risposto
       from questioni, risposte where iddomanda=id and nick=?');
    $stat->execute(array($_SESSION['nome_utente'],$_SESSION['nome_utente']));
    return $stat;
  }

 // esempio molto semplice di ricerca: cerca i sondaggi la cui domanda contiene una parola (parametro)
 function domande($dbconn, $parola) {
   $parola_con_wildcard = '%'.$parola.'%';
   $stat = $dbconn->prepare('select * from questioni where domanda ilike ?');
   $stat->execute(array($parola_con_wildcard));
   return $stat;
 }
?>

