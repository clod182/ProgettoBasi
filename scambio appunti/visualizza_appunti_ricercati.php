<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Lista appunti ricercati</title>
      <!-- Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
      <!-- CSS-->
      <link href="style_vis.css" type="text/css" rel="stylesheet">
    </head>

    <body>
      <div class="container2">
        <h1>Lista appunti ricercati</h1>
        <h2> In questa pagina puoi vedere tutti gli appunti con la parola da te richiesta.</h2>
        <?php
        $parola_ric = $_POST['parola'];
        try {
          $dbconn = connessione();
          $query = "SELECT * FROM appunti
                    WHERE testo LIKE '%$parola_ric%'";
          $result = $dbconn->query($query);
          echo '<ht>'."<table border=1 frame=void><tr><th>id</th><th>titolo</th><th>testo</th><th>creatore</th><th></th></tr>".'</ht>';
          while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['id_app'] . "</td><td>" . $row['titolo'] . "</td><td>" . $row['testo'] . "</td><td>" . $row['utente'] . "</td> </tr>";/*al posto del primo id_cor c'era solo id*/
          }
            echo "</table>";	
        } catch (PDOException $e) { echo $e->getMessage(); }
        ?>
      <p> <a href="home.php">Ritorna alla home page</a> </p>
      </div>
    </body>
    
</html>
