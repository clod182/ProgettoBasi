<?php 
  // questa semplicissima pagina dinamica distrugge la sessione corrente (logout) e ritorna
  // alla pagina di ingresso
  session_start();    // attenzione: e' necessaria, altrimenti la sessione non viene distrutta
  session_destroy();
  header('Location:index.php');
?>

