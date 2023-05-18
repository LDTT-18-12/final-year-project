<?php include_once('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <!--===== Font awesome cdn limks =====-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    <!--===== custom css file link =====-->
    <link rel="stylesheet" href="css/stylesheet.css">
    <!-- image change in menu by Id -->
    <script>
        function calculation()
        {
            var p,q,t;
            p=document.getElementById('price').value;
            q=document.getElementById('qty').value;
            t=p*q;
            document.getElementById('total').value=t;
        }
        function imgcall1()
        {
            document.getElementById("menu-img").innerHTML='<img src="img/menu/spinach-salad.jpg">';
        }
        function imgcall2()
        {
            document.getElementById("menu-img").innerHTML='<img src="img/menu/tuscan-grilled.jpg">';
        }
        function imgcall3()
        {
            document.getElementById("menu-img").innerHTML='<img src="img/menu/mozzarella.jpg">';
        }
        function imgcall4()
        {
            document.getElementById("menu-img").innerHTML='<img src="img/menu/greek-salad.jpg">';
        }
        function imgcall5()
        {
            document.getElementById("menu-img").innerHTML='<img src="img/menu/caesar.jpg">';
        }
     </script>

</head>

<body>

    <?php include_once('navbar.html'); ?>
    <!--====Order section Start====-->
<?php
    $fetch_id=$_GET['id'];
    $sqlpopular = "SELECT * FROM tbl_popular WHERE id='$fetch_id' LIMIT 1";
        //Executed the query
        $respopular = mysqli_query($conn, $sqlpopular);
        
        //Count rows
        $count2 = mysqli_num_rows($respopular);

        //Checked whether the food is available or not
        if($count2>0)
        {
            //Food available 
            while($row=mysqli_fetch_assoc($respopular))
            {
                //Get all the values
                $id = $row['id'];
                $title =$row['title'];
                $price = $row['price'];
                $description =$row['description'];
                $image_name =$row['image_name'];
            }
        }
?>
    <section class="order" id="order">
    <br><br><br><br><br><br><br>
        <h1 class="heading"> Make an <span> ORDER </span> </h1>

        <div class="row">
            <form action="insert-order.php" method="post"><input type='hidden' name='id' value='<?php echo $id; ?>'>
            <table width='100%'>
                <tr>
                    <td><input type="text" placeholder=" Full Name" name='name' class="box"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" value='<?php echo $title; ?>' name='title' class="box" readonly></td>
                    <td><input type="date" class="box" name='date'></td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="0300-1234567" maxlenght='12' minlength='12' name='mobile' class="box"></td>
                    <td><input type="text" placeholder="Enter address..." name='address' class="box"></td>
                </tr>
                <tr>
                <td><input type="text" class="box" value='<?php echo $price; ?>' id='price' name='price' readonly></td>
                <td><input type="number" class="box" placeholder="Quentity" min='0' id='qty' name='qty' max="5" onclick='calculation();'></td>
                </tr>
                <tr>
                    <td><input type="text" class="box" value='<?php echo $price; ?>' id='total' name='total' readonly></td>
                    <td><input type="submit" value="Place Order" name='order' class="btn" style='float:right;'></td>
                </tr>
            </table>
                
            </form> 

            
        </div> 
    </section>
    <!--====Order section end====-->

    <!--==== jquery cdn link ====-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jqury.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="java.js"></script>

</body>

</html>