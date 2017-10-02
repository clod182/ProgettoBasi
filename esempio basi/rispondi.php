<?php
  /*  Questa pagina permette di ripondere ad un sondaggi a cui sicuramente l'utente non
   *  ha ancora risposto. La chiave primaria di sondaggio e' passata come parametro
   *  all'url della pagina (iddomanda). Si rileggono quindi i dati del sondaggio e si
   *  crea una form con i pulsanti si o no. La form rimanda alla pagina dinamica 
   *  esegui_risposta.php, che trovera' la domanda del sondaggio nella sessione
   *  ($_SESSION['domanda']).
   */
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Rispondi ad un sondaggio</title>
</head>
<body>
  <h1>Rispondi ad un sondaggio</h1>
  <p>
  <?php
  try {
    $dbconn = connessione();
    // si recuperano i dati del sondaggio
    $stat = $dbconn -> prepare('select domanda from questioni where id = ?');
    $stat->execute(array($_GET['iddomanda']));
    // si leggono con fetch perche' id e' chiave
    $rec = $stat->fetch();
    // si stampa il testo della domanda e pulsanti, 
    echo "<p>Rispondi alla seguente domanda:</p> <p>$rec[domanda]</p>";
    echo "<form action=\"esegui_risposta.php\" method=\"post\">";
    // si inserisce nella sessione il valore della domanda, che sara' usata per registrare la risposta
    $_SESSION['domanda'] = $rec['domanda'];
    // si generano i due pulsanti per il si e per il no. attraverso l'attributo value si sapra'
    // la scelta che ha fatto l'utente nella risposta
    echo '<input type="submit" name="si" value="si"> <input type="submit" name="no" value="no">';
    echo '</form>';
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
<p> <a href="home.php">Ritorna alla pagina principale senza rispondere</a> </p>
</body>
</html>

