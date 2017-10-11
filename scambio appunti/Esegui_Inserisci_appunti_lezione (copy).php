<?php require "libreria.php";
  controllo_accesso();
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Inserisci apunto/esito</title>
      <!-- Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
      <!-- CSS-->
      <link href="style2.css" type="text/css" rel="stylesheet">
    </head>

    <body>
    <div class="container">
        <p>
          <?php
              if ((empty($_POST['box_titolo']))||(empty($_POST['box_testo']))) {
                echo '<h2>'."Il campo titolo e quello del testo appunto non possono essere vuoti!!".'</h2>';
              } else {
              try {
                $dbconn = connessione();                
                $statement = $dbconn->prepare('select nuovo_appunto(?, ?, ?, ?)');
                echo $_POST['idlezione'];                
                $statement->execute(array($_POST['box_titolo'],$_POST['box_testo'],$_SESSION['nome_utente'],$_POST["idlezione_input"]));
                echo '<h2>'."Appunto lezione inserito con successo!".'</h2>';
                } catch (PDOException $e) { echo $e->getMessage(); }
              }
          ?>
        </p>
        
        <p> <a href="Inserisci_appunti_lezione_final.php"><hend>Inserisci nuovamente i dati per un appunto.</hend></a> </p>
        <p> <a href="home.php"><hend>Torna alla pagina principale.</hend></a> </p>
      </div>
    </body>

</html>
