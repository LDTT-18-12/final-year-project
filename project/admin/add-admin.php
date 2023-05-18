<?php include('partial/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1> Add Admin </h1>
        <br> <br>

        <?php
        if(isset($_SESSION['add']))     //Checking whether the session is set or not
        {
            echo $_SESSION['add'];      //Displaying the session massage if SET
            unset($_SESSION['add']);        //Removing the session
        }
        ?>
        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td> Full Name: </td>
               <td> <input type="text" name="full_name" placeholder="Enter your Name"> </td>
            </tr>
                <tr>
                <td> Username: </td>
            <td>
                <input type="text" name="username" placeholder="Your username">
            </td>
                </tr>

                <tr>
                <td> Password: </td>
            <td>
                <input type="password" name="password" placeholder="Your password">
            </td>
                </tr>

                <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
            </td>
                </tr>

        </table>

        </form>
    </div>
</div>

<?php include('partial/footer.php'); ?>

<?php
//process the value from Form and save it in Database
//Check wether the submit button is click or not

if(isset($_POST['submit']))
{
    //button clicked
   // echo "button clicked";

   //1. get the data from form

   $full_name = $_POST['full_name'];
   $username = $_POST['username']; 
   $password = md5($_POST['password']);   //password encryption with md5

   //2. Sql Query to Save the data in Database

   $sql = "INSERT INTO tbl_admin(ful_name, username, password) VALUES('{$full_name}','{$username}','{$password}' )
--    full_name= '$full_name',
--    username='$username',
--    password='$password'
   ";
   
        
   // 3. Executing Query and saving the data into database

   $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

   //Check whether the (Query Executed) data is inserting or not and display the Approriate Massage
    if($res==TRUE)
    {
        //Data inserted
        //echo "data inserted";
        
        //create a session variavle for diplay a massage
    $_SESSION['add'] = "<div class= 'success'>Admin Added successfully</div>";
    
    //Redirect page to mange admin
    header("location:".SITEURL.'admin/manage-admin.php');
    }
else
{
    //Failed to insert Data
    //echo "Failed to data inserted";
    //create a session variavle for diplay a massage
    $_SESSION['add'] = "Failed to Add admin";
    
    //redict page to add admin
    header("location:".SITEURL.'admin/add-admin.php');
}

}

?>