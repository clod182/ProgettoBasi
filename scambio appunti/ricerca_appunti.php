<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Ricerca appunti</title>
      <!-- Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
      <!-- CSS-->
      <link href="style2.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
          <h1>Ricerca appunti</h1>
          <h2>Per cercare un appunto dammi la parola/dato che vorresti trovare</h2>
          <form action="visualizza_appunti_ricercati.php" method="post">                        
          <table><tr><td><ht>Parola/dato:</ht></td><td><input type="text" name="parola"></td></tr>           
            </table>
          <input type="submit" class="btn" value="Ricerca">
          </form>
          <a href="home.php"><hend>Torna alla pagina principale senza ricercare</hend></a>
        </div>
    </body>
</html>
