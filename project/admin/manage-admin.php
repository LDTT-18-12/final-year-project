<?php include('partial/menu.php'); ?>
     <!-- Main content start -->
     <div class="main-content">
        <div class="wrapper">
        <h1> Manage Admin </h1>

        <br/><br>

<?php 
if(isset($_SESSION["add"]))
{
    echo ($_SESSION["add"]);      //Displaying session massage
    unset($_SESSION["add"]);       //Removing session massage
}

if(isset($_SESSION["delete"]))
{
    echo $_SESSION["delete"];      //Displaying session massage
    unset($_SESSION["delete"]);     //Removing session massage
}

if(isset($_SESSION["update"]))
{
    echo $_SESSION["update"];      //Displaying session massage
    unset($_SESSION["update"]);     //Removing session massage
}

if(isset($_SESSION["user-not-found"]))
{
    echo $_SESSION["user-not-found"];      //Displaying session massage
    unset ($_SESSION["user-not-found"]);     //Removing session massage
}

if(isset($_SESSION['no-gallery-found']))
{
    echo $_SESSION['no-gallery-found'];      //Displaying session massage
    unset ($_SESSION['no-gallery-found']);     //Removing session massage
}

?>

<br><br><br>
        <!-- Add admin bbutton-->
        <a href="add-admin.php" class="btn-primary">Add Admin </a>
        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th> S.N </th>
                <th> Full name </th>
                <th> Username </th>
                <th><h1> ACTIONS </h1></th>
            </tr>


            <?php
            //Query to get all admin
                $sql = "SELECT *FROM tbl_admin";
            //Execute Query
            $res = mysqli_query($conn, $sql) ;
             
            //checked query whether the query is executed or not
            if($res==TRUE)
            {

                //Count rows whether we have data in database or not
                $count = mysqli_num_rows($res);    //function to get all database

                
                //Cheked the num of rows

                if($count>0)
                {
                    //We have data in database
$i =1;
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        //Using whileloop to get allthe data in batabase
                        //and while loop will run as long as we have data in dtabase

                        //get invidual data
                        $id = $i;
                        $ful_name = $rows['ful_name'];
                        $username = $rows['username'];
$i++;

                        //Display the values in our tabale
                        ?>

                    <tr>
                        <td> <?php  echo $id;  ?>. </td>
                        <td> <?php  echo $ful_name ; ?> </td>
                        <td> <?php  echo $username;  ?>  </td>
                        <td> 
                            <a href = "<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class = "btn-primary"> Change Password </a>
                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Admin </a>
                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"> Delete Admin </a> 
                        </td>

                    </tr>

                        <?php


                    }
                }
                else
                {
                    //Do not data in database
                }
            }


            ?>

           
        </table>

    </div>
        </div>
    
     <!-- Main content end -->

     <?php include('partial/footer.php'); ?>