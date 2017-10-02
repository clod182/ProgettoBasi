<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Utente</title>
</head>
<body>
  <h1>Informazioni sull'utente</h1>
  <?php
  if (empty($_GET['utente'])) {
    $utente = $_SESSION['nome_utente'];
  } else {
    $utente = $_GET['utente'];
  }
  try {
    $dbconn = connessione();
    $stat = $dbconn -> prepare('select count(*) from questioni where utente = ?');
    $stat->execute(array($utente));
    $rec = $stat->fetch();
    $num_sondaggi_creati = $rec[0];
    // in standard SQL, nullif(a,b) ritorna null se a e' uguale a b
    // e count(attributo) conta tutti i valori diversi da null. Notare l'inversione dei test
    $stat = $dbconn -> prepare("select count(nullif(risposta,'n')), count(nullif(risposta,'s'))
                                from risposte where nick = ?");
    $stat->execute(array($utente));
    $rec = $stat->fetch();
    $num_si = $rec[0];
    $num_no = $rec[1];
    echo "<p>$utente ha creato $num_sondaggi_creati sondaggi. Inoltre ha 
          risposto positivamente a $num_si e negativamente a $num_no.</p>";
    if ($num_sondaggi_creati > 0) {
      $stat = $dbconn->prepare
         ("with sondaggi_utente as (
             select questioni.*, numsi+numno as totale_voti
               from questioni
              where utente = ?)
           select domanda
             from sondaggi_utente
            where totale_voti = (select max(totale_voti) from sondaggi_utente)");
      $stat->execute(array($utente));
      echo "<p>Le domande di $utente che hanno avuto pi&ugrave; risposte sono state:<p><ul>";
      foreach ($stat as $rec) { echo "<li>$rec[domanda]</li>"; }
      echo "</ul>";
    }
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
  <p> <a href="home.php">Ritorna alla pagina principale</a> </p>
</body>
</html>

