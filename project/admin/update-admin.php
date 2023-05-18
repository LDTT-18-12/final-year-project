<?php include('partial/menu.php'); ?>


<?php

// Authorization access control

// check whwrhwe user is logged or not

?>
<div class="main-content">
    <div class="wrapper">
        <h1> Update Admin </h1>

        <br><br>

        <?php 
        
        //1. Select the id of selected Admin
        $id = $_GET['id'];

        // 2. Create SQL query to get Details
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";

        //Execute the qury
        $res = mysqli_query($conn, $sql);

        //cheked whether the query is executed or not
        if($res)
        {
            //check whether the data availale or not
            $count = mysqli_num_rows($res);
            //whether we have admin data or not
            if($count==1)
            {
                //get the details
                //echo "Admin Availale";
                $row=mysqli_fetch_assoc($res);

                $ful_name = $row['ful_name'];
                $username = $row['username'];
            }
            else
            {
                //Redirect to manage page
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

        ?>

        <form action="" method= "POST">
            <table class="tbl-30">
                <tr>
                    <td> Full Name: </td>
                   <td> <input type="text" name="ful_name" value = "<?php echo $ful_name; ?>"></td>
                </tr>
                <tr>
                    <td> Username: </td>
                    <td> <input type="text" name="username" value ="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="hidden" name = "id" value="<?php echo $id; ?>">
                        <input type= "submit" name = "submit" value = "Update Admin" class = "btn-secondary">
                    </td>
                </tr>


            </table>
        </form>
    </div>
</div>

<?php

//Check whether the submit Button is Clicked or not
if(isset($_POST['submit']))
{
    //print_r($_POST);die;
    echo "Button clicked";
   //Get all the values from Form to update
  $id = $_POST['id'];
  $ful_name = $_POST['ful_name'];
  $username = $_POST['username'];

  //Create sql query to up-date admin
  $sql ="UPDATE `tbl_admin` SET `ful_name` = '$ful_name',`username` = '$username' WHERE `tbl_admin`.`id` = '$id'";

  //Execute the query
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
   // $res = mysqli_query($conn, $sql);
  //Checked whether the query executed successffully or not
  if($res)
  {
    //query executed and admin updated
    $_SESSION['update'] = "<div class = 'successs'>Admin Update Successfully.</div>";
    //Redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
  }
  else
  {
    //Failled to update admin
    $_SESSION['update'] = "<div class = 'error'>Failled to update admin.</div>";
    //Redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
  }
}
?>

<?php include('partial/footer.php'); ?>