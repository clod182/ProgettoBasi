<?php
  require "libreria.php";
  controllo_accesso();
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>inserimento appunto lista corsi</title>
      <title>Lista dei corsi</title>
      <!-- Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
      <!-- CSS-->
      <link href="style_vis.css" type="text/css" rel="stylesheet">
    </head>

    <body>
      <div class="container">
        <h1>Elenco dei corsi per inserimento appunti</h1>
        <h2> Seleziona il corso per il quale inserire un appunto.</h2>

        <div class="containerCentral">
          <?php
            try {
              $dbconn = connessione();
              $query = "SELECT * FROM corsi";
              $result = $dbconn->query($query);
              //if ($result->num_rows > 0){
              echo '<ht>'."<table border=1 frame=void rules=rows><tr><th>corsi</th><th></th></tr>".'<ht>';
              while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>" .'<hlink>'. "<a href=\"Inserisci_appunti_lezione_ll.php?id=$row[id_cor]\">$row[nome]</a>" .'</hlink>'. "</td> </tr>";/*al posto del primo id_cor c'era solo id*/
              }
              echo "</table>";
              //}
              /* else {
                echo "0 results";
              }*/
            } catch (PDOException $e) { echo $e->getMessage(); }
          ?>
        </div>

        <p><a href="home.php"><hend>Torna alla pagina principale senza inserire un corso</hend> </a></p>
      </div>
    </body>

</html>
