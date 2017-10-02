<?php require "libreria.php";
// pagina dinamica che esegue l'operazione di creazione di un contatto e visualizza l'esito.
// permette di ritornare alla pagina di creazione sondaggi
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Creazione Sondaggio: esito</title>
</head>
<body>
<p>
<?php
if (empty($_POST['domanda'])) {
  echo "Il sondaggio non &egrave; stato creato perch&eacute; la domanda &egrave vuota!";
} else {
try {
  $dbconn = connessione();
  $statement = $dbconn->prepare('select nuova_questione(?, ?)');
  $statement->execute(array($_POST['domanda'],$_SESSION['nome_utente']));
  echo "Il sondaggio &egrave; stato creato.";
} catch (PDOException $e) { echo $e->getMessage(); }
}
?>
</p>
<p> <a href="home.php">Ritorna alla pagina principale</a> </p>
<p> <a href="crea.php">Crea un nuovo sondaggio</a> </p>
</body>
</html>

