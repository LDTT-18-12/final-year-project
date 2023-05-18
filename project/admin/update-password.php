<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Change Password </h1>
        <br><br>

        <?php 
        if(isset($_GET['id']))
        {
           $id=$_GET['id'];
        }
        ?>

<form action="" method= "POST">

<table class = "tbl-30">
    <tr>
        <td> Current password: </td>
        <td>
            <input type="password" name = "current_password" paceholder = "Old password">
        </td>
    </tr>

       <tr>
        <td> New password:</td>
            <td>
                <input type="passwoed" name = "new_password" paceholder = "New password">
            </td>
       </tr>

             <tr>
                <td> Confirm password </td>
                <td>
                <input type="passwoed" name = "confirm_password" paceholder = "Confirm password">
            </td>
             </tr>

             <tr>
                <td colspan = "2">
                    <!-- <input type="hidden" name = "id" value = "<?php echo $id; ?>"> -->
                        <input type= "submit" name = "submit" value = "Change Password" class= "btn-secondary">
                </td>
             </tr>
</table>
</form>

    </div>
</div>



<?php

//Checked whether the button is Clicked or Not
if(isset($_POST['submit']))
{
    //$id=$_POST['id'];
    $id=$_GET['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);
    $sql = "SELECT * FROM tbl_admin WHERE id=$id";
    // Execute the query 
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    //check where the query executed or not
    if($res)
    {
    $row=mysqli_fetch_assoc($res);
    $count = mysqli_num_rows($res);
    //print_r($current_password);exit;
    //print_r($current_password,$row['password']);
    if($current_password == $row['password']){
        if($new_password == $confirm_password){
            $sql ="UPDATE `tbl_admin` SET `password` = '$new_password' WHERE `tbl_admin`.`id` = '$id'";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if($res){
                    //query executed and admin updated
                    $_SESSION['update'] = "<div class = 'successs'>Admin Update Successfully.</div>";
                    //Redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }else
                {
                  //Failled to update admin
                  $_SESSION['update'] = "<div class = 'error'>Failled to update password.</div>";
                  //Redirect to manage admin page
                  header('location:'.SITEURL.'admin/manage-admin.php');
                }
        }else{
            $_SESSION['user-not-found'] = "<div class = 'error'>New password and confirm password dose not matched</div>";
            header('location:'.SITEURL. 'admin/manage-admin.php');
        }
    }else{
        $_SESSION['user-not-found'] = "<div class = 'error'>Old password id incorrect</div>";
        //$_SESSION['user-not-found'] = "<div class = 'error'> User not found </div>";
        header('location:'.SITEURL. 'admin/manage-admin.php');
    }
    }else{
        $_SESSION['user-not-found'] = "<div class = 'error'>User not found</div>";
        //$_SESSION['user-not-found'] = "<div class = 'error'> User not found </div>";
        header('location:'.SITEURL. 'admin/manage-admin.php');
    }
}
?>

<?php include('partial/footer.php'); ?>