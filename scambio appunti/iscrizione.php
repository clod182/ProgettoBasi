<?php require "libreria.php";
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Iscrizione per lo scambio di appunti</title>
</head>
<body>
<h1>Iscrizione per lo scambio di appunti</h1>
  <p>Iscriviti fornendo un nome utente e una password!</p>
  <p>
  <?php    
    if ($_GET['errore'] == 'utenteesistente') {
      echo "<font color=red>Spiacente, il nome utente inserito &egrave; gi&agrave; in uso</font>";
    } elseif ($_GET['errore'] == 'mancainput') {
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

