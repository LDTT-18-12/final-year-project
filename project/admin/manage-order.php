<?php include('partial/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
    <h1> Manage Order </h1>
    <br><br><br>

        <?php
        /*
            if(isset($_GET['id']))
            {
                //Get the order details
                $id=$_GET['id'];
                //Get all the detail base on tis id
                //Sql query to get all otherdetails
                $sql2 = "SELECT *FROM tbl_order WHERE id=$id";
                //Execute the querry
                $res2 = mysqli_query($conn, $sql2);
                //count the rows
                $count = mysqli_num_rows($res2);
                if($count==1)
                {
                    //Detail available
                    $row=mysqli_fetch_assoc($res2);
                    $food = $row['food'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                }
                else
                {
                    //Redirect to manage order
                    hearder('location:'.SITEURL.'admin/manage-order.php');
                }
                
            }
            else
            {
                //Redirect to manage order
                hearder('location:'.SITEURL.'admin/manage-order.php');
            }
            */
        ?>

        <table width='100%' border='0' style='font-size:11px;'>
            <tr>
                <th>Sr.</th>
                <th>Food</th>
                <th>Price | Qty | Total</th>
                <th> Date </th>
                <th> Name </th>
                <th> Mobile# </th>
                <th> Address </th>
                <th> Status</th>
                <th> Action</th>
            </tr>
               
            <?php
                 //Get all the order grom database
                 $sql = "SELECT *FROM tbl_order ORDER BY id DESC";  //Display the latest order at first 
                 //Execute query
                 $res = mysqli_query($conn, $sql);
                 //count the rows
                 $count = mysqli_num_rows($res);
                $sr = 0;  //Create a serial numer and set its initial value as 1
                 if($count>0)
                 {
                    //Order available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $sr++;
                        //Get all the order
                        $id = $row['id'];
                        $food = $row['food'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_address = $row['customer_address'];

                        ?>

                            <tr>
                                <td><?php echo $sr; ?> </td>
                                <td> <?php echo $food; ?> </td>
                                <td> <?php echo $price; ?> | <?php echo $qty; ?> | <?php echo $total; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $customer_address; ?></td>
                                <td>
                                    <?php
                                        if($status==0){echo "Pending";}else if($status==-1){echo "Cancel";}else{echo "Done";} 
                                    ?>
                                </td>
                                <td> 
                                    <a href='post-order.php?id=<?php echo $id; ?>'>Post</a> | <a href='cancel-order.php?id=<?php echo $id; ?>'>Cancel</a> | <a href='order-slip.php?id=<?php echo $id; ?>' target='_blank'>Slip</a>  
                                </td>

                            </tr>

                        <?php
                    }
                }
                else
                {
                    //Order not available
                    echo "<tr><td colspan='12' class='error'> Orders not available </tr></td>";
                }
            ?>

           
            
        </table>
</div>

<?php include('partial/footer.php'); ?>