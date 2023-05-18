<?php include('partial/menu.php'); ?>

     <!-- Main content start -->
     <div class="main-content">
        <div class="wrapper">
        <h1> Dashboard </h1>   

        <br><br>
         <?php
         if(isset($_SESSION["login"]))
         {
             echo $_SESSION["login"];      //Displaying session massage
             unset ($_SESSION["login"]);     //Removing session massage
         }
        ?>  <br><br>
          
        <div class="col-4 text-center">
            <?php
                $sqlg = "SELECT *FROM tbl_gallery";
                $resg = mysqli_query($conn, $sqlg);
                $countg =mysqli_num_rows($resg);
            ?>
            <h1><?php echo $countg; ?></h1>
            <br>
            Gallery
        </div>

        <div class="col-4 text-center">
        <?php
        //Sql query
                $sqlp = "SELECT *FROM tbl_popular";
                //Executed query
                $resp = mysqli_query($conn, $sqlp);
                //Count the row
                $countp= mysqli_num_rows($resp);
            ?>
            <h1><?php echo $countp; ?></h1>
            <br>
           Popular
        </div>

        <div class="col-4 text-center">
        <?php
        //Sql query
                $sqlo = "SELECT *FROM tbl_order";
                //Execute query
                $reso = mysqli_query($conn, $sqlo);
                //Count Rows
                $counto= mysqli_num_rows($reso);
            ?>

            <h1><?php echo $counto; ?></h1>
            <br>
           Order
        </div>
    <div class="col-4 text-center">
        <?php
         //Sql query
            $sqlt = "SELECT SUM(total) as Total FROM tbl_order";
            //Execute the query
            $rest = mysqli_query($conn, $sqlt);
            //Get the values
            $rowt = mysqli_fetch_assoc( $rest);
           //Get total reveneu
            $total_revenuen= $rowt['Total'];
        ?>
            <br>
             <h3> Revenue Generated <h3>
           <?php echo $total_revenuen; ?>
              
    </div>
    
        <div class="clearfix"></div>
         
         
    </div>
        </div>
    
     <!-- Main content end -->

     <?php include('partial/footer.php'); ?>