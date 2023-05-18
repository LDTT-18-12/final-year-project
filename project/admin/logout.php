<?php include('../config/constants.php'); ?>

<?php
//1. Destory the session
session_destroy();    //unsets $_SESSION['user']

//2. Redirect to login page
header('location:'.SITEURL.'admin/login.php');
?>