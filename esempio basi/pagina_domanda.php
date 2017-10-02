<?php
  /*  Pagina dinamica che mostra i dati relativi ad un sondaggio, ed eventualemente permette
   *  di rispondere se non lo si e' gia' fatto prima. Il parametro "id" nella richiesta
   *  e' come al solito l'identificatore del sondaggio da mostrare.
   */
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Sondaggio</title>
</head>
<body>
  <h1>Sondaggio</h1>
  <p>
  <?php
  try {
    $dbconn = connessione();
    // si rileggono i dati del sondaggio (attraverso la chiave)
    $stat = $dbconn -> prepare('select * from questioni where id = ?');
    $stat->execute(array($_GET['id']));
    $rec = $stat->fetch();
    // si salva la domanda nella sessione, per permettere all'utente di rispondere
    // chiamando la pagina dinamica esegui_risposta.php, se vuole
    $_SESSION['domanda'] = $rec['domanda'];
    $creatore = $rec['utente'];
    echo "<p>Il sondaggio:</p> <p>$rec[domanda]</p>";
    echo "ha avuto finora $rec[numsi] risposte positive e $rec[numno] risposte negative.";
    // si verifica se l'utente ha gia' risposto al questionario e in che modo, cercando
    // nella tabella risposta con iddomanda e idutente
    $stat = $dbconn -> prepare('select risposta from risposte where iddomanda = ? and nick = ?');
    $stat->execute(array($_GET['id'], $_SESSION['nome_utente']));
    $risp = $stat->fetch();
    if ($risp['risposta'] === 's') {           // risposta positiva
      echo "<p>Tu hai risposto positivamente.</p>";
    } else if ($risp['risposta'] === 'n') {    // risposta negativa
      echo "<p>Tu hai risposto negativamente.</p>";
    } else {                                   // risposta nulla, cioe' l'utente nohn ha risposto
      echo "<p>Tu non hai ancora risposto. Se vuoi puoi farlo adesso:</p>";
      echo "<form action=\"esegui_risposta.php\" method=\"post\">";
      echo '<input type="submit" name="si" value="si"> <input type="submit" name="no" value="no">';
      echo '</form>';
    }
    // si visualizza anche il nome dell'utente che ha creato il sondaggio, e si fa diventare
    // un link ad una pagina dinamica che mostra i dati di quell'utente (con parametro nell'url)
    echo "<p>Questo sondaggio &egrave; stato proposto da <a href=\"personale.php?utente=$creatore\">
          $creatore</a></p>";
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
  <p> <a href="home.php">Ritorna alla pagina principale</a> </p>
</body>
</html>

