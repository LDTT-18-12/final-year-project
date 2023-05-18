<?php include_once('../config/constants.php'); ?>
<?php
    $fetch_id=$_GET['id']; 
   $sql="UPDATE tbl_order SET status='-1' WHERE id='$fetch_id'";
   $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($res)
    {
        header('location:'.SITEURL. 'admin/manage-order.php');
    }
    else
    {
        header('location:'.SITEURL. 'admin/manage-order.php');
    }

?>