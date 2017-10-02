<?php 
  /*  Pagina dinamica che mostra il risultato di una ricerca per parola. La parola ricercata
   *  viene passata come parametro attraverso l'url. Si esegue la query di ricerca (con la
   *  funzione php domande dentro libreria.php e si stampano i risultati con un foreach
   */
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Lista dei trovati</title>
</head>
<body>
  <h1>Elenco dei sondaggi trovati</h1>
  <p>La ricerca della parola <?php echo $_GET['parola']?> nelle domande dei sondaggi ha prodotto la seguente lista:</p>
  <?php 
  try {
    $dbconn = connessione();
    // si chiama la funzione di libreria domande (che chiamera' un'analoga funzione nel database
    // il valore di parola viene passato attraverso la form (con modalita' POST)
    $sond = domande($dbconn, $_POST['parola']);
    // si stampa il risultato con un ciclo foreach
    echo "<table><tr><th>Domanda</th><th>Risposte S&igrave;</th><th>Risposte No</th></tr>";
    foreach ($sond as $rec) {
       // anche in questo caso il testo della domanda viene fatto diventare un link alla pagina dinamica
       // che mostra tutte le informazioni sul sondaggio relativo
       echo "<tr><td><a  href=\"pagina_domanda.php?id=$rec[id]\">$rec[domanda]</a></td><td>$rec[numsi]</td><td>$rec[numno]</td></tr>";
    }
    echo "</table>";
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>
<p> <a href="home.php">Ritorna alla pagina principale</a> </p>
</body>
</html>
