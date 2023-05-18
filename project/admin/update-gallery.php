<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Update Gallery </h1>

        <br><br>
                <?php
                    // Check where the id is set or not
                    if(isset($_GET['id']))
                    {
                        // Get the id and all other details
                    // echo "Getting the data"; This code is to retrive data and display which needs to get updated then why is code is runing?
                    $id = $_GET['id'];

                    //Create a query to get the all other details
                    $sql = "SELECT * FROM tbl_gallery WHERE id= $id";
                    //Execute the query
                    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    // Count the rows to check whether the id is valid or not
                    $count = mysqli_num_rows( $res);

                    if($count==1)
                        {
                            //Get all data   
                    
                                $row = mysqli_fetch_assoc($res); 
                        
                                    $title = $row['title'];
                                    $current_image= $row['image_name'];
                                    $featured= $row['featured'];
                                    $active= $row['active']; 
                    }
                    else
                    {
                            //Redirect to manage gallery with session massage
                            $_SESSION['no-gallery-found'] = "<div class = 'error'> Gallery not Found. </div>";
                            header("location:".SITEURL.'admin/mange-gallery.php');
                        }
                    }
                    else
                    {
                        // Redirect to manage gallery
                        header('location:'.SITEURL.'admin/mange-gallery.php');
                    }

                ?>


    <form action="" method = "POST" enctype = "multipart/form-data">
        <table class= "tbl-30">
            <tr>
                <td> Title: </td>
                <td>
                    <input type="text" name="title" value = "<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td> Current Image: </td>
                <td>
                   <?php 
                        if($current_image!== "")
                        {
                            //Display the Image
                            ?>
                            <img src="<?php echo SITEURL; ?>img/gallery/<?php echo $current_image; ?>" width= "150px">
                            <?php
                        }
                        else
                        {
                            echo "<div class= 'error'>Image Not Added</div>";
                        }
                   ?>
                </td>
            </tr>

            <tr>
                <td> New Image </td>
                <td>
                    <input type="file" name = "image">
                </td>
            </tr>

            <tr>
                <td> Featured: </td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name = "featured" value = "Yes"> Yes
                    
                    <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name = "featured" value = "No"> No
                </td>
            </tr>

            <tr>
                <td> Active: </td>
                     <td>
                        <input  <?php if($active=="Yes"){echo "checked";} ?> type="radio" name = "active" value = "Yes"> Yes
                          
                        <input  <?php if($active=="No"){echo "checked";} ?> type="radio" name = "active" value = "No"> No
                     </td>   
            </tr>

            <tr>
                <td>
                    <input type="hidden" name = "current_image" value = "<?php echo $current_image; ?>">
                    <input type="hidden" name = "id" value = "<?php echo $id; ?>">
                    <input type="submit" name = "submit" value = "update gallery" class = "btn-secondary">
                </td>
            </tr>

        </table>
    </form>


    <?php

            if(isset($_POST['submit']))
            
            {
                //echo "Clicked";exit;
                //1. Get the values fro the Form

                $id = $_POST['id'];
                
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

               $image_name = $current_image;
             
                //2. Updating image if selected
                //Checked whether image is sellescted or not 
                // Update Other Data
                
                if(isset($_FILES['image']['name']))
                {
                
                    $remove_path = "../img/gallery/".$current_image;
                    if(file_exists($remove_path)){
                        unlink($remove_path);

                    }
                    //Get image detail
                    $image_name = $_FILES['image']['name'];

                    
                    //A. Upload the image

                    //Auto rename our iamge
                    //Get the extension of img (img, png, ect)
                    // $ext= explode('.',$image_name);
                    //rename the image
                   // $image_name = "Food_Gallery_".rand(000, 999).'.'.end($ext);

                    $destination_path = "../img/gallery/".$image_name;
                     

                    // Finally upload image
                     //$image_name = "$image_name";
                     //print_r($_FILES['image']['name']);exit;
                     $source_path = $_FILES['image']['tmp_name'];
                     $imageUploaded = move_uploaded_file($source_path, $destination_path);
                    //  Update Other Data as well
                 
                    //Check whether the img upload or not
                    //And img is not uploaded then we will stop the process and redirect with error massage
                    if($imageUploaded == false)
                    {
                            // Sent msge 
                               $_SESSION['upload'] = "<div class = 'error'> Failed to upload image</div>";
                        // Redirect to gallery page
                        header("location:".SITEURL.'admin/mange-gallery.php');

                        //stop the process
                       
                    }

                    //B.Remove the current image
                    
                }
                else
                {
                    $image_name = $current_image;
                    // $image_name = "`image_name`='".$image_name."'";
                }
                // $updateQuery = "UPDATE tbl_gallery SET `title`=`$title`,`image_name`=`$_FILES['image']['name']`, `featured`=`$featured`,`active`=`$active` WHERE `id`==`$id`";
                // $queryExecuted = mysqli_query($conn, $updateQuery);
             
                // //3. Update Database

                $sqlupdate = "UPDATE tbl_gallery SET title='$title',image_name='$image_name', featured='$featured',active='$active' WHERE id=$id";
                
                // //Execute the query image name ko image variale assin kia howa hy jisy bakio ko kia hy same baki ap dikh ly
                   $resupdate = mysqli_query($conn,  $sqlupdate);
                

                //4. Redirect to manage gallery
                //Checked whether exequted or not
                if($resupdate==true) 
                {
                    //gallery updated 
                    $_SESSION['update'] = "<div class = 'success'> Gallery Updated Successfuly. <?div>";
                    header('location:'.SITEURL.'admin/mange-gallery.php');
                }
                else
                {
                    //Failed to update gallery
                    $_SESSION['update'] = "<div class = 'error'> Failed to Updated Gallery. <?div>";
                    header('location:'.SITEURL.'admin/mange-gallery.php');

                }
            }

    ?>

    </div>
</div>


<?php include('partial/footer.php'); ?>