<?php include('partial/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1> Add Food </h1>
            <br><br>

            <?php
                if(isset($_SESSION['upload']))     //Checking whether the session is set or not
                {
                    echo $_SESSION['upload'];      //Displaying the session massage if SET
                    unset($_SESSION['upload']);        //Removing the session
                }
            ?>

  <form action="" method = "POST" enctype= "multipart/form-data">
    <table class = "tbl-30">
      <tr>
        <td> Title: </td>
        <td>
            <input type="text" name="title" placeholder ="Title of Food">
         </td>
       </tr>

      <tr>
               <td> Description:</td>
              <td>
                 <textarea name="description" id="" cols="30" rows="5" placeholder = "Description of Food"> </textarea>
              </td>
         </tr>

         <tr>
            <td> Price: </td>
            <td> <input type="number" name = "price"> </td>
         </tr>

            <tr>
                <td> Selesct Image:</td>
                <td>
                    <input type="file" name = "image">
                </td>
            </tr>

            <tr>
                <td> Gallery:</td>
                    <td>
                         <select name="gallery">

                        <?php
                             //Create php code to display gallery from databadse
                             //1. Create sql to get all active gallery fromd database
                             $sql="SELECT * FROM tbl_gallery WHERE active='Yes'";
                                
                             // Executing the query
                            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                            //Count the rows  to ckecked wherther We have gallery or not
                            $count = mysqli_num_rows($res);

                                //if count is greater the zero , We have gallery in else we do not have gallery
                                if($count>0)
                                {
                                    //We have gallery 
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //Get the detail of gallery
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>
                                          <option value="<?php echo $id; ?>"><?php echo $title; ?> </option>
                                        
                                        <?php
                                    }
                                }
                                else
                                {
                                    //We do mot have gallery
                                       ?>
                                          <option value="0"> No Gallery Found </option>
                                    <?php
                                }
                               
                                        //2. Dispaly on dropdown
                                        ?>
                                     
                     </select>
                </td>
            </tr>

            <tr>
                <td> Featured: </td>
                <td>
                    <input type="radio" name = "featured" value = "Yes">Yes
                    <input type="radio" name = "featured" value "No">No
                </td>
            </tr>

            <tr>
                 <td> Active: </td>
                 <td>
                 <input type="radio" name= "active" value = "Yes">Yes
                    <input type="radio" name = "active" value "No">No
                    </td>
            </tr>

            <tr>
                <td colspan="2"> 
                    <input type="submit" name="submit" value="Add Food" class ="btn-secondary">
                </td>
            </tr>

        </table>
       </form>


<?php
  //Checked whether the button is clicked or not
  if(isset($_POST['submit']))
  {
    //Add Food in database
    //echo "Clicked";

    //1. Get the data from Form 
     $id= $_POST['id'];
     $title= $_POST['title'];
     $description= $_POST['description'];
     $price= $_POST['price'];
     $gallery= $_POST['gallery'];

     //Checked whether the radio button for featured and active are checked or not
     if(isset($_POST['featured']))
     {
        $featured= "Yes";
     }
     else
     {
        $featured = "No";   //Setting if the default value
     }

     if(isset($_POST['active']))
     {
        $active= "Yes";
     }
     else
     {
        $active = "No";   //Setting if the default value
     }


    // 2.Upload the image if selected 

     //Checked whether the selectd image is clicked or not and upload the image if image is selected
     if(isset($_FILES['image']['name']))
     {
            //get the detailed of the selected image
            $image_name = $_FILES['image']['name'];

            //Checked whether the image is selected or not and upload only is selected
            if(isset($image_name))
            {
                //Image is selected
                //Rename the image
                      // $image_name = "Food_Name_".rand(000, 999).'.'.end($ext);

                        //Get the extension of img (img, png, .jpg ect)
                     $ext= explode('.',$image_name);

                //uploaded the image
                //Get the src_path and destination path
                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../img/Food/".$image_name;

                //Finally uploaed the image
                $upload = move_uploaded_file($source_path, $destination_path);

                //Check whether the img upload or not
                    //And img is not uploaded then we will stop the process and redirect with error massage
                    if($upload==false)
                     {
                          // Set Massage
                           $_SESSION['upload'] = "<div class = 'error'> Failed to upload image</div>";
                             // Redirect to gallery page
                             header("location:".SITEURL.'admin/manage-popular.php');

                            //stop the process
                                die();
                    }



            }
     }
     else
     {
        $image_name="";    //Setting default value as blank
     }

    //3. Insert data in database 

    //Create the sql query to save and Add food
    //For numerical we do not need to pass value inside quates'' ut for string values it is compulsory to add quates''
   $sql2 = "INSERT INTO tbl_popular SET
   id = '$id',
   title = '$title',
   description = '$description',
   price = '$price',
   image_name= '$image_name',
   gallery_id = $gallery,
    featured = '$featured',
    active = '$active'
   ";
     

    //Executed query 
    $res2=  mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    //Checked whether the data inserted or not
    if($res2==TRUE)
    {
        //Data inserted successfully
        $_SESSION['add'] = "<div class= 'success'>Food Added Successfully. </div>";
                // Redirect to manage gallery page
                header('location:'.SITEURL.'admin/manage-popular.php');
    }
    else
    {
        //Failed to insert data
        $_SESSION['add'] = "<div class= 'error text-center'>Failed to Add Food. </div>";
                // Redirect to manage gallery page
                header('location:'.SITEURL.'admin/manage-order.php');
    }

    // 4. Redirected with Massage to manage Food page

  }
  
?>

    </div>
</div>

<?php include('partial/footer.php'); ?>