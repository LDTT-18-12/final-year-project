<?php

// Include constants.php here
include('../config/constants.php');

// 1. Get the id of admin to be deledted
echo $id = $_GET['id'];


// 2. create admin query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id ";

// Execute the query
$res = mysqli_query($conn, $sql);


//check where the query executed or not
if($res==true)
{

    //Query executed succesfully and admin deleted
    echo "Admin Delete";
    //create Session variable to Dispaly massage
    $_SESSION['delete'] = "<div class='success'> Admin deleted successfully </div>";
    //Redirect to manage page
    header('location:'.SITEURL. 'admin/manage-admin.php');
}
else
{

    //Failled to deleted
    echo "Ffailledto delete";

   $_SESSION['delete'] = "<div class='error'> Failled to Delete Admin.  Try again later. </div>";
   header('location:'.SITEURL. 'admin/manage-admin.php');

}



// 3. Redirect to manage admin page with massage (succes/error)

?>