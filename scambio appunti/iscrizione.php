<?php require "libreria.php";
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Iscrizione per lo scambio di appunti</title>
      <!-- Google Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Lobster|Quicksand|Open+Sans|Pacifico|Ribeye+Marrow|Varela|Forum" rel="stylesheet">
      <!-- CSS-->
      <link href="style2.css" type="text/css" rel="stylesheet">
    </head>
    <body>
      <div class="container">
        <h1>Iscrizione per lo scambio di appunti</h1>
          <h2>Iscriviti fornendo un nome utente e una password!</h2>
          <p>
          <?php    
            if ($_GET['errore'] == 'utenteesistente') {
              echo "<font color=red>Spiacente, il nome utente inserito &egrave; gi&agrave; in uso</font>";
            } elseif ($_GET['errore'] == 'mancainput') {
              echo "<font color=red>Devi dare sia login che password!</font>";
            } ; ?>
          </p>
          <form action="verifica_iscrizione.php" method="post">
            <table><tr><td><ht>Login:</ht></td><td><input type="text" name="login"></td></tr>
                  <tr><td><ht>Password:</ht></td><td><input type="password" name="password"></td></tr>
            </table>
            <input type="submit" class="btn" value="Iscrivimi">
          </form>
        </div>
    </body>
</html>

