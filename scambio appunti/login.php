<?php
  require "libreria.php";
  if (empty($_POST['login']) || empty($_POST['password'])) {
    header('Location:index.php?errore=mancainput');
  } else
  try {
    $dbconn = connessione();
    $statement = $dbconn->prepare('select credenziali_valide(?, ?)');
    $statement->execute(array($_POST['login'],$_POST['password']));
    $rec = $statement->fetch();  
    if ($rec[0]==1) {
      header('Location:home.php');
      session_start();                            
      $_SESSION['nome_utente'] = $_POST['login']; 
    } else {
      header('Location:index.php?errore=invalide');
    }
  } catch (PDOException $e) { echo $e->getMessage(); }
?>

