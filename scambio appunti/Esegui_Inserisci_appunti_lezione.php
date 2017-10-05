<?php require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Inserisci apunto/esito</title>
</head>
<body>
<p>
<?php
if ((empty($_POST['box_titolo']))||(empty($_POST['box_testo']))) {
  echo "Il campo titolo e quello del testo appunto non possono essere vuoti!!";
} else {
try {
  $dbconn = connessione();
  //(titolo,testo, utente,idlez)
  $id_lezione = $_GET['idlezionee'];
  $statement = $dbconn->prepare('select nuovo_appunto(?, ?, ?, ?)');
  echo $_POST['idlezione'];
  /*$statement->execute(array($_POST['box_titolo'],$_POST['box_testo'],$_SESSION['nome_utente'],$id_lezione));*/
  $statement->execute(array($_POST['box_titolo'],$_POST['box_testo'],$_SESSION['nome_utente'],$id_lezionex));
  echo "Appunto lezione inserito con successo!";
  } catch (PDOException $e) { echo $e->getMessage(); }
}
?>
</p>
<p> <a href="home.php">Ritorna alla pagina principale</a> </p>
</body>
</html>
