<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>inserimento appunto lista corsi</title>
</head>
<body>
  <h1>Elenco dei corsi per inserimento appunti</h1>
  <p> Seleziona il corso per il quale inserire un appunto.</p>
  <?php
  try {
    $dbconn = connessione();
	$query = "SELECT * FROM corsi";
	$result = $dbconn->query($query);
	//if ($result->num_rows > 0){
	 echo "<table><tr><th>corsi</th><th></th></tr>";
     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr><td>" . "<a href=\"Inserisci_appunti_lezione_ll.php?id=$row[id_cor]\">$row[nome]</a>" . "</td> </tr>";/*al posto del primo id_cor c'era solo id*/
		}
	  echo "</table>";
	//}
/* else {
    echo "0 results";
}*/
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
<p> <a href="home.php">Ritorna alla home page</a> </p>
</body>
</html>
