<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Ricerca appunti</title>
</head>
<body>
  <h1>Ricerca appunti</h1>
  <p>Per cercare un appunto dammi la parola/dato che vorresti trovare</p>
  <form action="visualizza_appunti_ricercati.php" method="post">                        
   <table><tr><td>Parola/dato:</td><td><input type="text" name="parola"></td></tr>           
    </table>
   <input type="submit" value="Ricerca">
  </form>
  <a href="home.php">Torna alla pagina principale senza ricercare</a>
</body>
</html>
