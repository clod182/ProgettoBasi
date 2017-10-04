<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Inserisci appunto</title>
</head>
<body>
  <h1>Inserisci appunto per una lezione di un corso.</h1>
  <p>Per inserire un nuovo corso dammi il nome e il suo docente!</p>
  <?php
  $id_lezionex = $_GET['idlezionee'];
  echo "<h>lezione id = " . $id_lezionex . "</h>";
  ?>

  <form action="Esegui_Inserisci_appunti_lezione.php" method="post">

   <table><tr><td>Titolo:</td><td><input type="text" name="box_titolo"></td></tr>
           <tr><td>Testo:</td><td><input type="text" name="box_testo"style="height:400px;width:800px;"></td></tr>
    </table>
   <input type="submit" value="Inserisci">
  </form>
  <a href="home.php">Torna alla pagina principale senza inserire un corso</a>
</body>
</html>
