<?php

//PHP script that is invoked when a user logs out of their account
   session_start();
   
   if(session_destroy()) {
      header("Location: uDine Login.php");
   }
?>