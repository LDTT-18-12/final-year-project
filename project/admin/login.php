
<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login-Food order system</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        
    <div class="login">
        <h1 class= "text-center">LOGIN</h1>  <br>

        <?php
        if(isset($_SESSION["login"]))
        {
            echo $_SESSION["login"];      //Displaying session massage
            unset ($_SESSION["login"]);     //Removing session massage
        }

        if(isset($_SESSION["no-login-massage"]))
        {
            echo $_SESSION["no-login-massage"];      //Displaying session massage
            unset ($_SESSION["no-login-massage"]);     //Removing session massage
        }
        ?>
        <br><br>

       

         <!--==Login form start here==-->

         <form action="" method= "POST" class= "text-center"> 

           <h4> UserName: </h4>   <br>
            <input type="text" name = "username" placeholder = "Enter Username">  <br> <br>

           <h4> Password: </h4>    <br>
            <input type="password" name="password" placeholder= "Enter youe Password">   <br> <br>

            <input type="submit" name="submit" value="LOGIN" class="btn-primary">
         </form>
         <!--==Login form start here==-->

       <br>
         <p class= "text-center">Create-By <a href="#"> Rimsha Parveen</a></p>  
    </div>
    </body>
</html>
 

<?php

// Checked whether submit button is Clicked or not
if(isset($_POST['submit']))
{
    // Process for login

    //1.Get the data from login from
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // 2. sql to check whether the user with username and password exists or not
    $sql = "SELECT * from tbl_admin WHERE username = '$username' AND password = '$password'";

    // 3. Execute query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

    // 4. Count rows to check whether the user exists or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        // User availble and login
        $_SESSION['login'] = "<div class = 'success'> Login Successfully.</div>";
        $_SESSION['user'] = $username;    //To check whether the user is login or not and logout will unset it

        // Redirect to home page/dashboard
        header('location:'.SITEURL.'admin/index.php');
    }
    else
    {
        //User not available and login Fail
        $_SESSION['login'] = "<div class = 'error text-center'> Username and password did not Match.</div>";
        // Redirect to home page/dashboard
        header('location:'.SITEURL.'admin/login.php');
    }

    // 5.
}
?>