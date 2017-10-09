<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Inserisci appunto</title>
      <!-- Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
      <!-- CSS-->
      <link href="style_vis.css" type="text/css" rel="stylesheet">
    </head>
    <body>
    <div class="container2">
      <h1>Inserisci appunto per una lezione di un corso.</h1>
      <h2>Per inserire un appunto dammi il suo titotolo e poi il suo testo!</h2>
      <?php
          $id_lezionex = $_GET['idlezionee'];
          /*echo "<h>lezione id = " . $id_lezionex . "</h>";*/  
      ?>

      <form action="Esegui_Inserisci_appunti_lezione.php" method="post">      
      <input type="hidden" name="idlezione_input" value="<?php echo $id_lezionex; ?>">

      <table><tr><td><ht>Titolo:</ht></td><td><input type="text" name="box_titolo"></td></tr>
              <tr><td><ht>Testo:</ht></td><td><textarea type="text" name="box_testo" rows="20" cols="80"></textarea></td></tr>
      </table>

      <input type="submit" class="btn" value="Inserisci">
      </form>
      <a href="home.php"><hend>Torna alla pagina principale senza inserire un corso</hend></a>
      </div>
    </body>
</html>
