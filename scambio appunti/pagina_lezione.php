<?php
  require "libreria.php";
  controllo_accesso();
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Pagina corso</title>
      <!-- Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
      <!-- CSS-->
      <link href="style_vis.css" type="text/css" rel="stylesheet">
    </head>

    <body>
    <div class="container2">
      <h1>Pagina Lezione</h1>
      <h2> In questa pagina puoi vedere tutti gli appunti per la lezione selezionata.</h2>
      <?php
      try {
        $dbconn = connessione();
        $id_lezione = $_GET['idlezionee'];
        $query = "SELECT * FROM appunti WHERE idlez = $id_lezione";
        $result = $dbconn->query($query);
        /*if ($result->num_rows > 0){*/
        echo '<ht>'."<table border=1 frame=void><tr><th>id</th><th>titolo</th><th>testo</th><th>utente</th></tr>".'</ht>';
          while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['id_app'] . "</td><td>" . $row['titolo'] . "</td><td>" . $row['testo'] . "</td><td>" . $row['utente'] . "</td> </tr>";
          }
          echo "</table>";      
        /*} 
        else {
          echo '<ht>'."0 results".'</ht>';
        }*/
      }
      catch (PDOException $e) { echo $e->getMessage(); }
      ?>
     <p> <a href="home.php">Ritorna alla home page</a> </p>
     </div>
    </body>
    
</html>
