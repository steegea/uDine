<?php
   //include('config.php');
   error_reporting(0); //gives a session start error when navigating multiple pages
   
   session_start();
   
   $connection = mysqli_connect("localhost", "root", "wit123", "udine");
   
   
   $email_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connection,"SELECT Email from users where Email = '$email_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['Email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:uDine Login.php");
   }
?>