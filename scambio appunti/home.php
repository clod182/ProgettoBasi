<?php
require "libreria.php";
controllo_accesso();?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Sito per lo scambio di appunti</title>
    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow" rel="stylesheet">
    <!-- CSS-->
    <link href="style_home.css" type="text/css" rel="stylesheet">
  </head>
  
  <body>
    <div class="container">
        <h1>---SCAMBIO APPUNTI---</h1>
        <h2>Benvenuto <b><?php echo $_SESSION['nome_utente']?>!</b>
        Queste sono le operazioni che puoi fare:</h2>
        <ul>
          <li> <a href="Inserisci_dati_corso.php" class="btn">Inserisci dati in un corso</a> </li>
          <br />
          <br />
          <li> <a href="Inserisci_appunti_lezione_lc.php" class="btn">Inserisci appunti per una lezione di un corso</a> </li>
          <br />
          <br />
          <li> <a href="elenco_corsi.php" class="btn">Visualizza elenco corsi</a> </li>
          <br />
          <br />
          <li> <a href="ricerca_appunti.php" class="btn">Ricerca appunti</a> </li>
        </ul>
    </div>      
  </body>
  
</html>
