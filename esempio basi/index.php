<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<!-- pagina di login. stampa un'eventuale messaggio d'errore se la richiesta e' un get
     con un parametro errore. La form di con i parametri  prevede l'invio dei dati a login.php
     che controllera' la validita' delle xredenziali fornite -->
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Sito di Sondaggi</title>
</head>
<body>
<h1>Sito di Sondaggi</h1>
  <p>Iscriviti a questo sito per fare sondaggi e per rispondere ai sondaggi degli iscritti</p>
  <p>Se non sei iscritto <a href="iscrizione.php">fallo adesso</a> oppure entra nel sito fornendo login e password:</p>
  <!-- stampa gli eventuali messaggi di errore, se necessari -->
  <?php  if ($_GET['errore'] == 'invalide') {
      echo "<p><font color=red>Le credenziali che hai fornito non sono valide!</font></p>";
    } elseif ($_GET['errore'] == 'mancainput') {
      echo "<p><font color=red>Devi dare sia login che password!</font>i</p>";
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


