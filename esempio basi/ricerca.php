<?php require "libreria.php";
  // pagina sostanzialmente statica, a parte il controllo dell'accesso iniziale
  // visualizza una form per creare un nuovo sondaggio, e i dati saranno elaborati da esegui_ricerca.php
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ricerca per parola nelle domande</title>
  </head>
  <body>
  <h1>Ricerca per parola all'interno delle domande</h1>
    <form action="esegui_ricerca.php" method="post">
      <p>Scrivi la parola che deve essere ricercata nelle domande:</p> 
      <input type="text" name="parola">
      <p>
      <input type="submit" value="Cerca">
      </p>
    </form>
  </body>
</html>

