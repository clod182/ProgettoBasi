<?php
  require "libreria.php";
  controllo_accesso();
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>inserimento appunto lista lezione</title>
      <!-- Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
      <!-- CSS-->
      <link href="style_vis.css" type="text/css" rel="stylesheet">
    </head>

    <body>
      <div class="container">
          <h1>Elenco delle lezioni per inserimento appunti</h1>
          <h2> Seleziona la lezione per la quale inserire un appunto.</h2>

          <div class="containerCentral">
            <?php
                try {
                  $dbconn = connessione();    
                  $id_del_corso = $_GET['id'];
                  $query = "SELECT * FROM lezioni WHERE idcor = $id_del_corso";
                  $result = $dbconn->query($query);
                  //if ($result->num_rows > 0){
                  echo '<ht>'."<table border=1 frame=void rules=rows><tr><th>ID</th><th>Lezioni</th><th></th></tr>".'</ht>';
                  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>" . $row['id_lez'] . "</td><td>" .'<hlink>'. "<a href=\"Inserisci_appunti_lezione_final.php?idlezionee=$row[id_lez]\">$row[nome]</a>" .'</hlink>'. "</td> </tr>";
                  }
                  echo "</table>";
                  //}
                /* else {
                    echo "0 results";
                }*/
                } catch (PDOException $e) { echo $e->getMessage(); }
            ?>
          </div>

          <p><a href="Inserisci_appunti_lezione_lc.php"><hend>Torna alla pagina precedente(selezione corsi)</hend> </a></p>
          <p><a href="home.php"><hend>Torna alla pagina principale senza inserire un corso</hend> </a></p>
        </div>
    </body>

</html>
