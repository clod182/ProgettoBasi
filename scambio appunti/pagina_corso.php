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
    <div class="container">
      <h1>Pagina Corso</h1>
      <h2> In questa pagina puoi vedere tutte le lezioni del corso.</h2>
      <?php
          try {
            $dbconn = connessione();            
            $id_del_corso = $_GET['id'];
            $query = "SELECT * FROM lezioni WHERE idcor = $id_del_corso"; 
            $result = $dbconn->query($query);
            //if ($result->num_rows > 0){
            echo '<ht>'."<table border=1 frame=void rules=rows><tr><th>id</th><th>nome</th><th>data</th><th>link</th><th></th></tr>".'</ht>';
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr><td>" . $row['id_lez'] . "</td><td>" . $row['nome'] . "</td><td>" . $row['data'] . "</td><td>" .'<hlink>'. "<a href=\"pagina_lezione.php?idlezionee=$row[id_lez]\">$row[nome]</a>" .'</hlink>'. "</td> </tr>";
             }
            echo "</table>";
           //}
         /* else {
            echo "0 results";
         }*/
          } catch (PDOException $e) { echo $e->getMessage(); }
      ?>
      <p> <a href="home.php">Ritorna alla home page</a> </p>
      </div>
    </body>
    
</html>
