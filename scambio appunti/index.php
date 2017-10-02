<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Scambio appunti :)</title>
</head>
<body>
<h1>Scambio appunti :)</h1>
  <p>In questo sito potrai condividere e scambiare appunti con altri studenti!</p>
  <p>Se non sei iscritto <a href="iscrizione.php">fallo adesso</a> oppure entra nel sito fornendo login e password:</p>
  <!-- stampa gli eventuali messaggi di errore, se necessari -->
  <?php  if ($_GET['errore'] == 'invalide') {
      echo "<p><font color=red>Le credenziali che hai fornito non sono valide!</font></p>";
    } elseif ($_GET['errore'] == 'mancainput') {
      echo "<p><font color=red>Devi dare sia login che password!</font></p>";
    }
    ?>
  <form action="login.php" method="post">
    <table><tr><td>Login:</td><td><input type="text" name="login"></td></tr>
           <tr><td>Password:</td><td><input type="password" name="password"></td></tr>
    </table>
    <input type="submit" value="Login">
  <form>
</body>
</html>


