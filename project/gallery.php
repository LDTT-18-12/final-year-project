<h1 class="heading"> Our <span> Food </span> Gallery </h1>
<div class="box-container">
<?php
    //Create SQL query to display Gallery from Database
    $sqlgallery = "SELECT *FROM tbl_gallery WHERE active='Yes' LIMIT 6";
    //Execute the query
    $resgallery =mysqli_query($conn, $sqlgallery);
    
    //Count the rows whether the gallery is available or not
    $count = mysqli_num_rows($resgallery);
    if($count>0)
    {
        //Gallery is available
        while($row=mysqli_fetch_assoc($resgallery))
        {
                //Get the values like title, image, image-name
                $gid=$row['id'];
                $gtitle=$row['title'];
                $gimage_name=$row['image_name'];
?>

    <div class="box">
        <img src="img/gallery/<?php echo $gimage_name; ?>" alt="Image Loading">
        <h3> <?php echo $gtitle; ?></h3>
    </div>

<?php }} ?> 
</div>

    <!--==== gellary section end ====-->