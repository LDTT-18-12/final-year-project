<?php

include('../config/constants.php');
//echo "Delete page";
// Whether check id and image-name value in set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //Get value and Delete
    //echo "Get value and Delete";
    
    $id= $_GET['id'];
    $image_name= $_GET['image_name'];


    // Remove  the physical image file is availale
    if(isset($image_name))
    {
        //Image is availale. So remove it
        $path = "../img/gallery/".$image_name;
        //Remove the image
       $remove = unlink($path); 


        //If failed to remove image then add and error massage and stop the process
        if($remove==false)
        {
            // set the session msg 
            $_SESSION['remove'] = "<div class='error'>Fialed to Remove Gallery image.</div>";
            
            //Redirect the manage gallery page 
            header('location:'.SITEURL.'admin/mange-gallery.php');

            //Stop the process
            die();

        }


        
    }


    //Delete the data from Database
    //sql query delete the data from database
    $sqlDelete = "DELETE FROM tbl_gallery WHERE id=$id";

    //execute the query
    $resDelte = mysqli_query($conn, $sqlDelete);

    // Check whether thye data is delete from tale or not
    if($resDelte==true)
    {
        //Set successfully massage
        $_SESSION['delete'] = "<div class = 'success text center'> Gallary Deleted Successfully.<div>";
        //Redirect to manage gallery
        header('location:'.SITEURL.'admin/mange-gallery.php');

    }
    else
    {
        //Set failed to delete 
         //Set successfully massage
         $_SESSION['delete'] = "<div class = 'error text-center'> Failed to Dalete Gallary.<div>";
         //Redirect to manage gallery
         header('location:'.SITEURL.'admin/mange-gallery.php');
 
        
    }

    //Redirect to manage gallery page with massage
}
else
{
    // Redirect to manage gallery page
    header('location:'.SITEURL.'admin/mange-gallery.php');
    
}
?>