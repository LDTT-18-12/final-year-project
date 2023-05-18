<?php include('partial/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1> Add Gallery </h1>

        <br><br>

        <?php
         if(isset($_SESSION['add']))     //Checking whether the session is set or not
         {
             echo $_SESSION['add'];      //Displaying the session massage if SET
             unset($_SESSION['add']);        //Removing the session
         }

         if(isset($_SESSION['upload']))     //Checking whether the session is set or not
         {
             echo $_SESSION['upload'];      //Displaying the session massage if SET
             unset($_SESSION['upload']);        //Removing the session
         }


        ?>
            
        <!--== Add gallery form start ==-->

        <form action="" method= "POST" enctype= "multipart/form-data">
            <table>
                <tr>
                    <td> Title: </td>

                    <td>
                        <input type="text" name= "title" placeholder = "Category Title">
                    </td>
                </tr>

                <tr>
                    <td> Select Image: </td>
                    <td>
                        <input type="file" name = "image">
                    </td>
                </tr>

                <tr>
                    <td> Featured: </td> 
                <td> 
                    <input type="radio" name= "featured" value= "Yes">Yes
                    <input type="radio" name= "featured" value= "No">No
                </td>
                </tr>

                <tr>
                    <td> Active: </td>
                    <td>
                        <input type="radio" name="active" value= "Yes"> Yes
                        <input type="radio" name="active" value= "No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan= "2">
                        <input type="submit" name= "submit" valu= "Add Category" class= "btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <!--== Add gallery form end ==-->

        <?php  
           // Checked wether the submit button is clicked or not

           if(isset($_POST['submit']))
           {
            //echo "Clicked";

            //1. Get the values from Gallery Form
            $title= $_POST['title'];
            
            //for redio input , we need to check button is selected or not
            if(isset($_POST['featured']))
            {
                // Get the value from form 
                $featured= $_POST['featured'];
            }
            else{
                // See the defualt value
                $featured= "No";
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No";
            }

            // Checked whether the image is selected or not and set the value for img name accordingly
           // print_r($_FILES['image']);
           // die();  //break the code here

     if(isset($_FILES['image']['name']))
    {

                //Uploaded the image is selected
                $image_name= $_FILES['image']['name'];

                //upload the image only if image is selected
               // to upload image we need image name, source path and destination path
                 $image_name = $_FILES['image']['name'];

               // Upload the image only if image is selected
           if($image_name)
           {       
                   //Auto rename our iamge
                    //Get the extension of img (img, png, ect)
                     $ext= explode('.',$image_name);

                     //Rename the image
                      // $image_name = "Food_Gallery_".rand(000, 999).'.'.end($ext);

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../img/gallery/".$image_name;

                     // Finally upload image
                   $upload = move_uploaded_file($source_path, $destination_path);
            
                   //Check whether the img upload or not
                    //And img is not uploaded then we will stop the process and redirect with error massage
                    if($upload==false)
                     {
                          // Set Massage
                           $_SESSION['upload'] = "<div class = 'error'> Failed to upload image</div>";
                             // Redirect to gallery page
                             header("location:".SITEURL.'admin/add-gallery.php');

                            //stop the process
                                die();
                    }
    }
           }
        
           else
           {
                //don't upload image and image_name value as blank
                $image_name= "";
           }

            // 2.Create sql query to insert Gallery into databadse
            $sql= "INSERT INTO tbl_gallery(title, image_name, featured, active) VALUES('{$title}','{$image_name}','{$featured}','{$active}' )
            ";

            // Execute the query and save in dataase
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            // 4. chcked query executed or not and data added or not
            if($res==TRUE)
            {
                // Query executed and added gallery
                $_SESSION['add'] = "<div class= 'success'>Gallery Added successfully. </div>";
                // Redirect to manage gallery page
                header('location:'.SITEURL.'admin/mange-gallery.php');
            }
            else
            {
                // Failed to  added gallery
                $_SESSION['add'] = "<div class= 'error text-center'>Failed to Add Gallery. </div>";
                // Redirect to manage gallery page
                header('location:'.SITEURL.'admin/add-gallery.php');
            }
           }
        ?>


    </div>
</div>




<?php include('partial/footer.php'); ?>
