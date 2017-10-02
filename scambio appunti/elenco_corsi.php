<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Lista dei corsi</title>
</head>
<body>
  <h1>Elenco dei corsi</h1>
  <p> In questa pagina puoi vedere tutti i corsi.</p>
  <?php
  try {
    $dbconn = connessione();
	$query = "SELECT * FROM corsi";
	$result = $dbconn->query($query);
	//if ($result->num_rows > 0){
	 echo "<table><tr><th>id</th><th>nome</th><th>docente</th><th>link</th><th></th></tr>";
     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr><td>" . $row['id_cor'] . "</td><td>" . $row['nome'] . "</td><td>" . $row['docente'] . "</td><td>" . "<a href=\"pagina_corso.php?id=$row[id_cor]\">$row[nome]</a>" . "</td> </tr>";/*al posto del primo id_cor c'era solo id*/
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
