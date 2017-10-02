<?php 
// questa pagina dinamica controlla che i dati di iscrizione siano corretti; se no ridirige
// alla pagina di iscrizione, se si' alla pagina iniziale del sito (home.php)
require "libreria.php";
// se mancano dati...
if (empty($_POST['login']) || empty($_POST['password'])) {
  header('Location:iscrizione.php?errore=mancainput');
} else
try{  
  $dbconn = connessione();
  // si controlla che il nome utente esista gia' (e si avvisa l'utnte ridirigendolo a iscrizione.php
  // con l'opportuno parametro di errore
  $statement = $dbconn->prepare('select count(*) from utenti where nickname = ?');
  $statement->execute(array($_POST['login']));
  $rec = $statement->fetch();
  if ($rec[0] == 1) {               // utente gia' inserito
    header('Location:iscrizione.php?errore=utenteesistente');
  } else {
    session_start();                // anche qui, come in login.php, si crea una nuova sessione
    $_SESSION['nome_utente'] = $_POST['login'];
    $stat = $dbconn->prepare('select nuovo_utente(?,?)');  // si inserisce il nuovo utente nel db
    $stat->execute(array($_POST['login'],$_POST['password']));
    // si ridirige l'utente alla pagina centrale del sito.
    header('Location:home.php');
  }
} catch (PDOException $e) { echo $e->getMessage(); }
?>

