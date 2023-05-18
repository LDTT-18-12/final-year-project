<?php

//Authorization - Access control

// Check whether the user is login or not
if(!isset($_SESSION['user']))
{
    // User not login
    //Redirect to login page with mag
    $_SESSION['no-login-massage'] = "<div class='error text-center'> Please login to admin access Admin panel. </div>";
     //Redirect to login page
     header('location:'.SITEURL.'admin/login.php');
}
?>