<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Lista appunti ricercati</title>
</head>
<body>
  <h1>Lista appunti ricercati</h1>
  <p> In questa pagina puoi vedere tutti gli appunti con la parola da te richiesta.</p>
  <?php
  $parola_ric = $_POST['parola'];
  try {
    $dbconn = connessione();
  $query = "SELECT * FROM appunti
            WHERE testo LIKE '%$parola_ric%'";
	$result = $dbconn->query($query);
	 echo "<table><tr><th>id</th><th>titolo</th><th>testo</th><th>creatore</th><th></th></tr>";
     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr><td>" . $row['id_app'] . "</td><td>" . $row['titolo'] . "</td><td>" . $row['testo'] . "</td><td>" . $row['utente'] . "</td> </tr>";/*al posto del primo id_cor c'era solo id*/
		}
	  echo "</table>";	
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
<p> <a href="home.php">Ritorna alla home page</a> </p>
</body>
</html>
