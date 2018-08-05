<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: uDine Login.php");
   }
?>