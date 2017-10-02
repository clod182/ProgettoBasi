<?php require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Inserisci corso/esito</title>
</head>
<body>
<p>
<?php
if ((empty($_POST['nome']))||(empty($_POST['docente']))) {
  echo "Il campo nome e quello docente non possono essere vuoti";
} else {
try {
  $dbconn = connessione();
  $statement = $dbconn->prepare('select nuovo_corso(?, ?)');
  $statement->execute(array($_POST['nome'],$_POST['docente']));
  echo "Dati corso inseriti!";
} catch (PDOException $e) { echo $e->getMessage(); }
}
?>
</p>
<p> <a href="home.php">Ritorna alla pagina principale</a> </p>
</body>
</html>

