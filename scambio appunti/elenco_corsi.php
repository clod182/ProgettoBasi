<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Lista dei corsi</title>
      <!-- Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
      <!-- CSS-->
      <link href="style_vis.css" type="text/css" rel="stylesheet">
    </head>
    <body>
      <div class="container">
        <h1>Elenco dei corsi</h1>
        <p><h2> In questa pagina puoi vedere tutti i corsi.</h2></p>
        <?php
          try {
            $dbconn = connessione();
            $query = "SELECT * FROM corsi";
            $result = $dbconn->query($query);
            //if ($result->num_rows > 0){
            echo '<ht>'."<table border=1 frame=void rules=rows><tr><th>id</th><th>nome</th><th>docente</th><th>link</th><th></th></tr>".'</ht>'; /*<table border=1 frame=void rules=rows>
            */
              while($row = $result->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr><td>" . $row['id_cor'] . "</td><td>" . $row['nome'] . "</td><td>" . $row['docente'] . "</td><td>" .'<hlink>'. "<a href=\"pagina_corso.php?id=$row[id_cor]\">$row[nome]</a>" .'</hlink>'. "</td> </tr>";/*al posto del primo id_cor c'era solo id*/
              }
              echo "</table>";
            //}
          /* else {
              echo "0 results";
          }*/
          } catch (PDOException $e) { echo $e->getMessage(); }
        ?>
        <p> <a href="home.php"><hend>Ritorna alla home page</hend> </a> </p>
      </div>
    </body>
</html>
