<?php
	
//Parameters to establish connection to mySQL database
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'wit123');
   define('DB_DATABASE', 'udine');
   $connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>