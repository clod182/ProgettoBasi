<?php
  require "libreria.php";
  controllo_accesso();
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Inserisci dati corso</title>
    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
    <!-- CSS-->
    <link href="style2.css" type="text/css" rel="stylesheet">
  </head>

  <body>
      <div class="container">
          <h1>Inserisci dati corso</h1>
          <h2>Per inserire un nuovo corso dammi il nome e il suo docente!</h2>

          <div class="containerCentral">
            <form action="Esegui_Inserisci_dati_corso.php" method="post">                        
              <table><tr><td><ht>Nome:</ht></td><td><input type="text" name="nome"></td></tr>
                      <tr><td><ht>Docente:</ht></td><td><input type="text" name="docente"></td></tr>
                </table>
              <input type="submit" class="btn" value="Inserisci">
            </form>
          </div>

          <a href="home.php"><hend>Torna alla pagina principale senza inserire un corso</hend></a>
      </div>
  </body>
  
</html>
