<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>inserimento appunto lista lezione</title>
</head>
<body>
  <h1>Elenco delle lezioni per inserimento appunti</h1>
  <p> Seleziona la lezione per la quale inserire un appunto.</p>
  <?php
  try {
    $dbconn = connessione();
    //echo "<h1>Hello " . $_GET["id"] . "</h1>";
    $id_del_corso = $_GET['id'];
	$query = "SELECT * FROM lezioni WHERE idcor = $id_del_corso"; /*  WHERE idcor = ? */
	$result = $dbconn->query($query);
	//if ($result->num_rows > 0){
	 echo "<table><tr><th>Lezioni</th><th></th></tr>";
     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr><td>" . "<a href=\"Inserisci_appunti_lezione_final.php?idlezionee=$row[id_lez]\">$row[nome]</a>" . "</td> </tr>";
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
