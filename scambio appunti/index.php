<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Scambio appunti :)</title>
      <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
      <!-- CSS-->
    <link href="style2.css" type="text/css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <h1>Scambio appunti :)</h1>
          <h2>In questo sito potrai condividere e scambiare appunti con altri studenti!</h2>
          <h2>Se non sei iscritto <a href="iscrizione.php">fallo adesso</a> oppure entra nel sito fornendo login e password:</h2>
          <!-- stampa gli eventuali messaggi di errore, se necessari -->
              <?php  if ($_GET['errore'] == 'invalide') {
                  echo "<p><font color=red>Le credenziali che hai fornito non sono valide!</font></p>";
                } elseif ($_GET['errore'] == 'mancainput') {
                  echo "<p><font color=red>Devi dare sia login che password!</font></p>";
                }
                ?>
              <form action="login.php" method="post">
                <table><tr><td><ht>Login:</ht></td><td><input type="text" name="login"></td></tr>
                      <tr><td><ht>Password:</ht></td><td><input type="password" name="password"></td></tr>
                </table>
                <input type="submit" class="btn" value="Login">
              <form>
          </div>
    </body>
</html>