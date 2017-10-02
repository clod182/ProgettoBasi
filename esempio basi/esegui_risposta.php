<?php
  /*  Questa pagina dinamica analizza la risposta data dall'utente, la trasforma in maniera 
   *  corretta per il database, e inserisce una riga nella tabella delle risposte
   */
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Accettazione di una risposta</title>
</head>
<body>
  <h1>Accettazione di una risposta</h1>
  <p>
  <?php
  // Si assegna il valore atteso dal database (un carattere 's' o 'n').
  // Se il parametro si' esiste (cioe' e' stato premuto il pulsante si', che ha name='si'
  //  (e anche value 'si', ma questo non viene nemmeno controllato))
  if ($_POST['si']) {
    $risposta = 's';
  } else {
    $risposta = 'n';
  }
  try {
    // si inserisce la risposta nel database attraverso la funzione gia' definita "risponde"
    $dbconn = connessione();
    $stat = $dbconn -> prepare('select risponde(?,?,?)');
    // i parametri a risponde sono il nome utente, la domanda e la risposta
    $stat->execute(array($_SESSION['nome_utente'], $_SESSION['domanda'], $risposta));
    echo "Risposta registrata.";
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
  </p>
<p> <a href="home.php">Ritorna alla pagina principale</a> </p>
<p> <a href="lista.php">Ritorna alla lista dei sondaggi</a> </p>
</body>
</html>

