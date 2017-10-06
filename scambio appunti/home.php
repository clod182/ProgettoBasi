<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Sito per lo scambio di appunti</title>
</head>
<body>
  <h1>Scambio appunti ---HOMEPAGE---</h1>
  Benvenuto <b><?php echo $_SESSION['nome_utente']?></b>!
  Queste sono le operazioni che puoi fare:</h1>
  <ul>
    <li> <a href="Inserisci_dati_corso.php">Inserisci dati in un corso</a> </li>
    <li> <a href="Inserisci_appunti_lezione_lc.php">Inserisci appunti per una lezione di un corso</a> </li>
    <li> <a href="elenco_corsi.php">Visualizza elenco corsi</a> </li>
    <li> <a href="ricerca_appunti.php">Ricerca appunti</a> </li>
  </ul>
</body>
</html>
