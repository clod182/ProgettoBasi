<?php require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Inserisci corso/esito</title>
      <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
    <!-- CSS-->
    <link href="style2.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
          <p>
              <?php
              if ((empty($_POST['nome']))||(empty($_POST['docente']))) {
                echo '<h2>'. "Il campo nome e quello docente non possono essere vuoti".'</h2>';
              } else {
                try {
                  $dbconn = connessione();
                  $statement = $dbconn->prepare('select nuovo_corso(?, ?)');
                  $statement->execute(array($_POST['nome'],$_POST['docente']));
                  echo '<h2>'."Dati corso inseriti con successo!".'</h2>';
                } catch (PDOException $e) { echo $e->getMessage(); }
              }
              ?>
          </p>
          <a href="home.php"><hend>Torna alla pagina principale senza inserire un corso</hend></a>
        </div>
    </body>
</html>

