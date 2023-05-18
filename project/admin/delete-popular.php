<?php

    //echo "clicked";
    include('../config/constants.php');

  if(isset($_GET['id']) AND isset($_GET['image_name']))
   {
       //process to delete
       // echo "process to delete";

       //1. Get the Id and image name
       $id= $_GET['id'];
       $image_name= $_GET['image_name'];

       //2. Delete the image if availale
       //Check whether the image is availale or not and Delete only if available
       if(isset($image_name))
       {
           //Image is availale. So delete it
           $path = "../img/Food/".$image_name;
           //Delete the image from folder
          $remove = unlink($path);

           //If failed to remove image then add and error massage and stop the process
          //  if($remove==false)
          //   {
          //      // Set the Session Massage 
          //       $_SESSION['upload'] = "<div class='error'>Fialed to Remove image File.</div>";
            
          //       //Redirect the manage popular page 
          //        header('location:'.SITEURL.'admin/manage-popular.php');

          //        //Stop the process
          //         die();

          //   }
        } 

             //3. Delete Food from dataase

             //Delete the data from Database
             //Sql query delete the data from database
             $sqlDelete = "DELETE FROM tbl_popular WHERE id=$id";

             //Execute the query
             $resDelte = mysqli_query($conn, $sqlDelete);

             // Check whether thye data is delete from tale or not
             if($resDelte==true)
            {
               //Set successfully massage
               $_SESSION['delete'] = "<div class = 'success text center'> Popular Deleted Successfully.<div>";
               //Redirect to manage popular
                header('location:'.SITEURL.'admin/manage-popular.php');
            }
            else
            {
              //Set failed to delete 
              //Set Failed to delete massage
              $_SESSION['delete'] = "<div class = 'error text-center'> Failed to Dalete Popular.<div>";
              //Redirect to manage popular
               header('location:'.SITEURL.'admin/manage-popular.php');
            }
    } 
      else
       {
          //Redirect to manage popular page
          // echo "Redirect";

           $_SESSION['unauthorize'] = "<div class='error'> Unauthorized Access.</div>";
           header('location:'.SITEURL.'admin/manage-popular.php');
        }
?>