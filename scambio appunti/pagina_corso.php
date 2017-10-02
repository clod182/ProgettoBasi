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
  <h1>Pagina Corso</h1>
  <p> In questa pagina puoi vedere tutte le lezioni del corso.</p>
  <?php
  try {
    $dbconn = connessione();
    //echo "<h1>Hello " . $_GET["id"] . "</h1>";
    $id_del_corso = $_GET['id'];
	$query = "SELECT * FROM lezioni WHERE idcor = $id_del_corso"; /*  WHERE idcor = ? */
	$result = $dbconn->query($query);
	//if ($result->num_rows > 0){
	 echo "<table><tr><th>id</th><th>nome</th><th>data</th><th>link</th><th></th></tr>";
     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr><td>" . $row['id_lez'] . "</td><td>" . $row['nome'] . "</td><td>" . $row['data'] . "</td><td>" . "<a href=\"pagina_lezione.php?idlezionee=$row[id_lez]\">$row[nome]</a>" . "</td> </tr>";
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
