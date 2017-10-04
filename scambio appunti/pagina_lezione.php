<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Pagina corso</title>
</head>
<body>
  <h1>Pagina Lezione</h1>
  <p> In questa pagina puoi vedere tutti gli appunti per la lezione selezionata.</p>
  <?php
  try {
    $dbconn = connessione();
    $id_lezione = $_GET['idlezionee'];
	$query = "SELECT * FROM appunti WHERE idlez = $id_lezione";
	$result = $dbconn->query($query);
	//if ($result->num_rows > 0){
	 echo "<table><tr><th>id</th><th>titolo</th><th>testo</th><th>utente</th></tr>";
     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr><td>" . $row['id_app'] . "</td><td>" . $row['titolo'] . "</td><td>" . $row['testo'] . "</td><td>" . $row['utente'] . "</td> </tr>";
		}
	  echo "</table>";
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
<p> <a href="home.php">Ritorna alla home page</a> </p>
</body>
</html>
