<?php include_once('config/constants.php'); ?>
<?php

if(isset($_POST['order']))
{
   $title= $_POST['title']; $price= $_POST['price']; $qty= $_POST['qty']; $total= $_POST['total']; 
   $date= $_POST['date']; $status=0; $name= $_POST['name']; $mobile= $_POST['mobile'];
   $email= $_POST['email'];$address= $_POST['address']; 
   $id= $_POST['id']; $id= $_POST['id']; 
   $sql="INSERT INTO `tbl_order`(`food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES 
   ('$title','$price','$qty','$total','$date','$status','$name','$mobile','$email','$address')";
   $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($res)
    {
        header("location:index.php");
    }
    else
    {
        header("location:index.php");
    }

}
else
{
    header("location:index.php");
}

?>