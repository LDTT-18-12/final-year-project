<?php include('partial/menu.php'); ?>


<div class="main-content">
        <div class="wrapper">

            <h1> Update Popular </h1>
            <br><br>


<?php  

   //Check whether the id is set or not
   if(isset($_GET['id']))
   {
        //Get all the detail
         $id = $_GET['id'];

       //Sql query to get the selected popular
        $sqlupdate = "SELECT * FROM tbl_popular WHERE id=$id";
       //Execute the query
       $resupdate = mysqli_query($conn, $sqlupdate);
        
       //count the rows  to check whether the id is valid or not
       $count = mysqli_num_rows($resupdate);

       if($count==1)
       {
        //Get the values based on query execueted
       $row2 = mysqli_fetch_assoc($resupdate);

      //Get the individual  values of selected popular

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_gallery = $row2['gallery_id'];
        $featured= $row2['featured'];
        $active= $row2['active']; 
      }
        
          else
            {  
              //Redirect to manage popular
               header("location:".SITEURL.'admin/manage-popular.php');
           }
      }
?>

                <form action="" method = "POST" enctype= "multipatr/form-data">
                        <table class="tbl-30">

                        <tr>
                            <td> Title: </td>
                            <td>
                                <input type="text" name="title" value = "<?php echo $title; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td> Description: </td>
                            <td>
                                <textarea name="description" colspan= "30" rows="5"><?php echo $description; ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td> price: </td>
                            <td>
                                <input type="number" name="price" value = "<?php echo $price; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td> Select New Image: </td>
                            <td>
                                <input type="file" name ="image">
                            </td>
                        </tr>

                        <tr>
                            <td> Current Image: </td>
                            <td>
                                    <?php
                                        if($current_image!=="")
                                        {
                                        
                                            //Display the Image
                                            ?>
                                            <img src="<?php echo SITEURL; ?>img/Food/<?php echo $current_image; ?>" width= "150px">
                                            <?php
                                            
                                        }
                                        else
                                        {
                                            
                                              //Image not availale
                                            echo "<div class= 'error'> Image not Added </div>";
                                            
                                        }

                                    ?>
                            </td>
                        </tr>

                        <tr>
                            <td> Gallery: </td>
                            <td>
                                <select name="gallery" >

                                    <?php
                                        $sql = "SELECT * FROM tbl_popular WHERE active ='Yes'";
                                        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                        $count = mysqli_num_rows( $res);
                                        if($count>0)
                                        {
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                                $gallery_title = $row['title'];
                                                $gallery_id = $row['id'];
                                                $featured = $row['featured'];
                                                 //echo "<option value = '$gallery_id'> $gallery_title </option>";

                                               ?>
                                                 <option <?php if($current_gallery==$gallery_id){echo "selected";} ?> value="<?php echo $gallery_id; ?>"><?php echo $gallery_title; ?></option>
                                               <?php  
                                            } 
                                        }
                                        
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td> Featured: </td>
                            <td>
                                <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name ="featured" value="Yes">Yes
                                <input <?php if($featured=="No"){echo "checked"; }?>  type="radio" name ="featured" value="No">No
                            </td>
                        </tr>

                        <tr>
                            <td> Active: </td>
                            <td>
                                <input <?php if($active=="Yes"){echo "checked";} ?>  type="radio" name = "active" value="Yes">Yes
                                <input <?php if($active=="No"){echo "checked"; } ?>  type="radio" name = "active" value="No">No
                            </td>
                        </tr>

                        <tr>
                            <td>
                                   <input type ="hidden" name= "id" value= "<?php echo $id; ?>" >
                                   <input type ="hidden" name="current_image" value="<?php echo $current_image; ?>" >
                                 <input type="submit" name="submit" value= "Update Popular" class ="btn-secondary">
                            </td>
                        </tr>

                        </table>
                </form>
                    <?php
                        if(isset($_POST['submit']))
                        {
                                //echo "button clicked";

                               //1. Get all details frothe form
                               $id = $_POST['id'];
                               $title = $_POST['title'];
                               $description = $_POST['description'];
                               $price = $_POST['price'];
                               $current_image = $_POST['current_image'];
                               //$gallery = $_POST['gallery'];
                               $featured = $_POST['featured'];
                               $active = $_POST['active'];

                               //2. Updating image if selected
                                 //Checked whether image is sellescted or not 
                                // Update Other Data
        
                            if(isset($_FILES['image']['name'])) //New image name
                            {
                                    $remove_path = "../img/Food/".$current_image;
                                    if(file_exists($remove_path))
                                    {
                                       unlink($remove_path);
                                    }
                                      //Get image detail
                                       $image_name = $_FILES['image']['name'];
                                    //Image is availale
                                    //A. Upload the image
                                    //Auto rename our iamge
                                    //Get the extension of img (img, png, ect)
                                    // $ext= explode('.',$image_name);
                                    //rename the image
                                    // $image_name = "Food_Gallery_".rand(000, 999).'.'.end($ext);
                                    $destination_path = "../img/Food/".$image_name;
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
                                    // Redirect to popular page
                                    header("location:".SITEURL.'admin/manage-popular.php');
                                    //stop the process
                                }
                                else
                                {
                                    $image_name = $current_image;  //Default image if image is not selected
                                }
                                    //B.Remove the current image
                            }
                            else
                            {
                                 $image_name = $current_image;  //Dedault image if the button is not clicked
                                 // $image_name = "`image_name`='".$image_name."'";
                            }
                                    //4. Update the Popular in database
                                    $sql = "UPDATE tbl_popular SET
                                    title = '$title',
                                    description = '$description',
                                    price = $price,
                                    image_name = '$image_name',
                                    gallery_id = '$gallery_id',
                                    featured = '$featured',
                                    active = '$active'
                                    WHERE id = $id;
                                    ";

                                    //Executed the query update ho gaya hy yiiiiiii
                                    $res = mysqli_query($conn,  $sql);
                                    // Checked whether the query is executed or not
                                    if($res==true)
                                    {
                                        //Query is executed and popular updated
                                        $_SESSION['update'] = "<div class = 'success'> Food updated successfuly. </div>";
                                        //header('location:'.SITEURL.'admin/manage-popular.php');
                                        echo "<script>window.location = 'manage-popular.php'</script>";
                                    }
                                    else
                                    {
                                        //Failed to updated
                                        $_SESSION['update'] = "<div class = 'error'> Failed to updated  Food. </div>";
                                        header('location:'.SITEURL.'admin/manage-popular.php');
                                        //echo "<script>window.location.href='admin/manage-popular.php'; </script>";
                                    }  
                        }
                    ?>

</div>
        </div>
        
<?php include('partial/footer.php'); ?>
        