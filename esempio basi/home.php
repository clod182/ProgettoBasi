<?php 
/*  Pagina principale dell'applicazione. Accoglie l'utente, elenca le funzioni principali
 *  che possono essere richieste, mostra gli ultimi sondaggi inseriti estraendoli dal database.
 *  La domanda di ogni sondaggio e' un link alla pagina con i dettagli del sondaggio.
 */
  require "libreria.php";
  controllo_accesso();?>   // protezione della pagina
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Sito Sondaggi</title>
</head>
<body>
  <h1>Sito di sondaggi: pagina principale</h1>
  Benvenuto <b><?php echo $_SESSION['nome_utente']?></b>!
  Queste sono le operazioni che puoi fare:</h1>
  <ul>
    <li> <a href="lista.php">Elencare tutti i sondaggi</a> </li>
    <li> <a href="ricerca.php">Ricercare sondaggi</a> </li>
    <li> <a href="crea.php">Creare un nuovo sondaggio</a> </li>
    <li> <a href="personale.php">Vedere i tuoi dati personali</a> </li>
    <li> <a href="uscita.php">Uscire dall'applicazione</a></li>
  </ul>
  <p>Lista degli ultimi sondaggi inseriti:</p>
  <?php 
  try {
    $dbconn = connessione();
    $sond = ultimi_sondaggi($dbconn);
    // i dati sono formattati come una tabella HTML
    echo "<table><tr><th>Domanda</th><th>Risposte S&igrave;</th><th>Risposte No</th></tr>";
    foreach ($sond as $rec) {
       // ogni domanda e' un link alla pagina_domanda con il parametro che specifica l'id del sondaggio
       // si noti che nella pagina questo parametro si trovera' con $_GET['id']
       echo "<tr><td><a href=\"pagina_domanda.php?id=$rec[id]\">$rec[domanda]</a></td><td>$rec[numsi]</td><td>$rec[numno]</td></tr>";
    }
    echo "</table>";
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
</body>
</html>

