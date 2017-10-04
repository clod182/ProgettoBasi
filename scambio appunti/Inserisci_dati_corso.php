<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Inserisci dati corso</title>
</head>
<body>
  <h1>Inserisci dati corso</h1>
  <p>Per inserire un nuovo corso dammi il nome e il suo docente!</p>
  <form action="Esegui_Inserisci_dati_corso.php" method="post">                        
   <table><tr><td>Nome:</td><td><input type="text" name="nome"></td></tr>
           <tr><td>Docente:</td><td><input type="text" name="docente"></td></tr>
    </table>
   <input type="submit" value="Inserisci">
  </form>
  <a href="home.php">Torna alla pagina principale senza inserire un corso</a>
</body>
</html>
