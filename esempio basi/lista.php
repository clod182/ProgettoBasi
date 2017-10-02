<?php
/*  Pagina che elenca tutti i sondaggi, proponendo all'utente la possibilita' di
 *  rispondere a quelli a cui non ha ancora risposto. La funzione tutti_sondaggi
 *  restituisce l'iteratore (result set) attraverso cui si accede a tutti i record
 *  (si noti anche che restituisce il campo ha_risposto (0 o 1) per l'utente corrente)
 */ 
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Lista dei sondaggi</title>
</head>
<body>
  <h1>Elenco dei sondaggi</h1>
  <p> In questa pagina puoi vedere tutti i sondaggi inseriti e puoi votare quelli che non hai ancora votato.</p>
  <?php 
  try {
    $dbconn = connessione();
    $sond = tutti_sondaggi($dbconn);
    // i sondaggi sono restituiti sotto forma di tabella HTML
    echo "<table><tr><th>Domanda</th><th>Risposte S&igrave;</th><th>Risposte No</th><th></th></tr>";
    foreach ($sond as $rec) {
       // Per ogni domanda si mette un link alla pagina relativa (prendendo l'id dal database e passandolo
       // come parametro nell'url: nella pagina dinamicha sara' preso con $_GET['id']
       echo "<tr><td><a href=\"pagina_domanda.php?id=$rec[id]\">$rec[domanda]</a></td><td>$rec[numsi]</td><td>$rec[numno]</td>";
       // se l'utente non ha ancora risposto si mette un link alla pagina che permette di rispondere
       // a quella particolare domanda, di nuovo passando l'id della domanda nell'url
       if ($rec[ha_risposto]) {
         echo "<td></td>";
       } else {
         echo "<td><a href=\"rispondi.php?iddomanda=$rec[id]\">Rispondi</a><td>";
       }
       echo "</tr>";
    }
    echo "</table>";
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
<p> <a href="home.php">Ritorna alla pagina principale</a> </p>
</body>
</html>
