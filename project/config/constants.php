<?php
//Session Start
session_start();
//database connection
$conn = mysqli_connect("localhost", "root", "", "food-order") or die("Connection Failed, Check Your Connection String."); 


define('SITEURL', "http://localhost/project/");
//define('LOCALHOST', 'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');
//define('DB_NAME', 'food-order');
//$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
//$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());


  


?>