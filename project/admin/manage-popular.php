<?php include('partial/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
    <h1> Manage Popular </h1>

    
    <br/><br>
        <!-- Add admin bbutton-->
        <a href="<?php echo SITEURL; ?>admin/add-popular.php" class="btn-primary"> Add Food </a>
        <br/><br><br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['unauthorize']))
            {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }

            if(isset( $_SESSION['update']))
            {
                echo  $_SESSION['update'];
                unset( $_SESSION['update']);
            }


        ?>

        <table class="tbl-full">
            <tr>
                <th> S.N </th>
                <th> Title </th>
                <th> Price </th>
                <th> Image </th>
                <th> Featured </th>
                <th> Active </th>
                <th> Action </th></h3>
            </tr>
                <?php
                    //Checked a sql query to get all the data
                    $sql= "SELECT * FROM tbl_popular";

                    //executed  the query
                    $res= mysqli_query($conn, $sql);

                    // Count the rows to checked whether we have food or not
                      $count = mysqli_num_rows( $res);
                            
                      if($count>0)
                      {
                        //We have food in dataase
                        //Get the Food from dataase and display
        $i =1;
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //Get the data and dispaly
                            $id = $i;
                            $tilte= $row['title'];
                            $price= $row['price'];
                            $image_name= $row['image_name'];
                            $featured= $row['featured'];
                            $active= $row['active'];
            $i++;
                            ?>

                          <tr>
                               
                                <td><?php  echo  $id; ?> </td>
                                <td><?php  echo  $tilte; ?> </td>
                                 <td>Rs. <?php  echo  $price; ?> </td>
                                <td>
                            <?php
                        //Ckeck whether the img name is availale or not
                    if(isset($image_name))            
                                
                    {
                       
                       ?>

                       <img src="../img/popular/<?php echo $image_name; ?>" width="100px" >

                       
                       <?php
                    }
                    else
                    {
                        //Display the msg
                        echo "<div class = 'error'>Image not Added</div>";
                    }
                    ?>

                                 </td>
                                 <td> <?php  echo  $featured; ?></td>
                                 <td> <?php  echo  $active; ?> </td>
                                   <td>
                                     <a href="<?php echo SITEURL; ?>admin/update-popular.php?id=<?php echo $row['id']; ?>" class="btn-secondary"> Update Admin </a>
                                     <a href="<?php echo SITEURL; ?>admin/delete-popular.php?id=<?php echo $row['id']; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger"> Delete Admin </a> 
                                      </td>

                            </tr>
                       <td> 
                            <?php 
                            
                        }
                      }
                      else
                      {
                        //Food not added in dayabase
                        echo "<tr> <td colspan= '7' class = 'error'> Food  not  Added Yet. </td> </tr>";
                      }
                ?>
           
            
        </table>
</div>

<?php include('partial/footer.php'); ?>