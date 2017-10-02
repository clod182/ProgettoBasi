<?php
error_reporting(E_ALL & ~E_NOTICE);

  function controllo_accesso() {
    session_start();
    if (empty($_SESSION['nome_utente'])) {
      header('Location:index.php');
    }
  }

  function connessione() {	 
     $dbconn = new PDO('pgsql:host=dblab.dsi.unive.it;port=5432;dbname=a2016u68','a2016u68','qwQGUY6h');
     $dbconn -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	 
     return $dbconn;
  }
  
  function tutti_corsi($dbconn) {
    $stat = $dbconn->prepare('SELECT nome, id
       FROM corsi');
    $stat->execute(array($_SESSION['nome_utente'],$_SESSION['nome_utente']));
    return $stat;
  }
?>

