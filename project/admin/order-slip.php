<?php include_once('../config/constants.php'); ?>
<?php
    $fetch_id=$_GET['id'];
    $sqlpopular = "SELECT * FROM tbl_order WHERE id='$fetch_id' LIMIT 1";
        //Executed the query
        $respopular = mysqli_query($conn, $sqlpopular);
        
        //Count rows
        $count2 = mysqli_num_rows($respopular);

        //Checked whether the food is available or not
        if($count2>0)
        {
            //Food available 
            while($row=mysqli_fetch_assoc($respopular))
            {
                //Get all the values
                $id = $row['id'];
                $title =$row['food'];
                $qty =$row['qty'];
                $price =$row['price'];
                $total = $row['total'];
                $order_date =$row['order_date'];
                $status =$row['status'];
                $name =$row['customer_name'];
                $contact =$row['customer_contact'];
                $customer_address =$row['customer_address'];
            }
        }
?>



<html>
<head>
    <title>Order Slip</title>
</head>
<body>
<table width='90%' align='center' border='0'>
<tr>
    <td colspan='2'><font size='+3'><b>ONLINE FOOD ORDER</b></font></td>
</tr>
<tr>
    <td>Food Order Slip</td>
    <td align='right'><a href='' onclick="window.print()">Print</a></td>
</tr>
<tr>
    <td>Order Date: <?php echo $order_date; ?></td>
    <td align='right'>Status: <?php if($status==0){echo "Pending";}else if($status==1){echo "Done";}else{echo "Cancel";} ?></td>
</tr>
<tr>
    <td colspan='2'><hr /></td>
</tr>
<tr>
    <td colspan='2' align='right'>Ordre ID: <?php echo $id; ?></td>
</tr>
<tr>
    <td>Customer Name:</td>
    <td><?php echo $name; ?></td>
</tr>
<tr>
    <td>Food Name:</td>
    <td><?php echo $title; ?></td>
</tr>
<tr>
    <td>Price</td>
    <td><?php echo $price; ?></td>
</tr>
<tr>
    <td>Qty</td>
    <td><?php echo $qty; ?></td>
</tr>
<tr>
    <td>Total</td>
    <td><?php echo $total; ?></td>
</tr>
<tr>
    <td colspan='2'>Address: <i><?php echo $customer_address; ?></i></td>
</tr>
<tr>
    <td colspan='2'><hr /></td>
</tr>

<tr>
    <td>For more details please contact with us at: (+92) 300 123 1234</td>
    <td align='right'>E-mail abc@gmail.com</td>
</tr>

</table>
</body>
</html>