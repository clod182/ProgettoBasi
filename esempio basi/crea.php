<?php
/*  Pagina dinamica che genera la form per creare un nuovo sondaggio da parte dell'utente
 *  della sessione corrente. La form invia i dati dell'utente a esegui_creazione.php
 */ 
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Creazione di un nuovo sondaggio</title>
</head>
<body>
  <h1>Creazione di un sondaggio</h1>
  <p>Qui <?php echo $_SESSION['nome_utente']?> puoi creare un nuovo sondaggio. Ricordati che devi formularlo in modo che la risposta possa essere solo s&igrave; o no.</p>
  <form action="esegui_creazione.php" method="post">
   <textarea name="domanda" cols=80 rows=4></textarea>
   <br>
   <input type="submit" value="Crea">
  </form>
  <a href="home.php">Torna alla pagina principale senza creare il sondaggio</a>
</body>
</html>

