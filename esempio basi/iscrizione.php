<?php require "libreria.php"; 
/*  Crea la form per effettuare un'iscrizione, con il controllo preliminare se la pagina
 *  e' stata richiamata a causa di un errore (parametro errore nell'url). In questo
 *  caso viene emesso un messaggio di errore
 */
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Iscrizione al Sito di Sondaggi</title>
</head>
<body>
<h1>Iscrizione al sito di Sondaggi</h1>
  <p>Per iscriversi &egrave; necessario fornire un nome utente (login) e una password</p>
  <p>
  <?php 
    // se il login fornito dall'utente e' gia esistente, non si puo' accettare
    if ($_GET['errore'] == 'utenteesistente') {
      echo "<font color=red>Spiacente, il nome utente inserito &egrave; gi&agrave; in uso</font>";
    } elseif ($_GET['errore'] == 'mancainput') {  // ci sono tutti i dati obbligatori?
      echo "<font color=red>Devi dare sia login che password!</font>";
    } ; ?>
  </p>
  <form action="verifica_iscrizione.php" method="post">
    <table><tr><td>Login:</td><td><input type="text" name="login"></td></tr>
           <tr><td>Password:</td><td><input type="password" name="password"></td></tr>
    </table>
    <input type="submit" value="Iscrivimi">
  </form>
</body>
</html>

