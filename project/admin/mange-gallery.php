<?php include('partial/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
    <h1> Manage Gallery </h1>

    <br><br>

    <?php
         if(isset($_SESSION['add']))     //Checking whether the session is set or not
         {
             echo $_SESSION['add'];      //Displaying the session massage if SET
             unset($_SESSION['add']);        //Removing the session
         }


         if(isset($_SESSION['remove']))     //Checking whether the session is set or not
         {
             echo $_SESSION['remove'];      //Displaying the session massage if SET
             unset($_SESSION['remove']);        //Removing the session
         }

         if(isset($_SESSION['delete']))     //Checking whether the session is set or not
         {
             echo $_SESSION['delete'];      //Displaying the session massage if SET
             unset($_SESSION['delete']);        //Removing the session
         }

         if(isset($_SESSION['no-gallery-found']))     //Checking whether the session is set or not
         {
             echo $_SESSION['no-gallery-found'];      //Displaying the session massage if SET
             unset($_SESSION['no-gallery-found']);        //Removing the session
         }

         if(isset($_SESSION['update']))     //Checking whether the session is set or not
         {
             echo $_SESSION['update'];      //Displaying the session massage if SET
             unset($_SESSION['update']);        //Removing the session
         }

         if(isset($_SESSION['upload']))     //Checking whether the session is set or not
         {
             echo $_SESSION['upload'];      //Displaying the session massage if SET
             unset($_SESSION['upload']);        //Removing the session
         }




        ?>
    <br><br>
        <!-- Add admin button-->
        <a href="<?php echo SITEURL; ?>admin/add-gallery.php ?>" class="btn-primary">Add Gallery </a>
        <br/><br><br>

        <table class="tbl-full">
            <tr>
                <th> S.N </th>
                <th> Title </th>
                <th> Image </th>
                <th> Featured </th>
                <th> Active </th>
                <th> Action </th>
            </tr>


            <?php

            // Query to get all GALLERY from database
            $sql = "SELECT *FROM tbl_gallery";

            //Execute query
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            // Count the rows
            $count = mysqli_num_rows( $res);


            // Checked whether the data in dataase or not
            if($count>0)
            {
                // We have data in dataase
                    // Get the data  and display
                      $i = 1;
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $tilte= $row['title'];
                        $image_name= $row['image_name'];
                        $featured= $row['featured'];
                        $active= $row['active'];
            
                        ?>
            <tr>
                <td> <?php  echo  $i; ?> </td>
                <td> <?php  echo  $tilte; ?></td>
                <td> 
                    <?php  $i++;
                    //Ckeck whether the img name is availale or not
                    if(isset($image_name))
                    {
                        //Display the img name
                       ?>

                       <img src="../img/gallery/<?php echo $image_name; ?>" width="100px" >

                       
                    <?php
                    }
                    else
                    {
                        //Display the msg
                        echo "<div class = 'error'>Image not Added</div>";
                    }
                    ?> 

                </td>
                <td> <?php  echo   $featured; ?> </td>
                <td>  <?php  echo   $active; ?></td>
                <td> 
                   <a href="<?php echo SITEURL; ?>admin/update-gallery.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Gallery </a>
                    <a href="<?php echo SITEURL; ?>admin/delete-gallery.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger"> Delete Gallery </a> 
                     </td>

            </tr>



                        <?php
                    }

            }
            else
            {
                // we do not have data
                // We will display the massage inside the title

                ?>

                <tr>
                    <td colspan= "6"><div class = "error">No gallery Added </div>  </td>
                </tr>

                <?php
            }

           ?>

           
            
        </table>
</div>



<?php include('partial/footer.php'); ?>