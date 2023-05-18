
<!DOCTYPE html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="java.js"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Food Order </title>
    <!--===== Font awesome cdn limks =====-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    <!--===== custom css file link =====-->
    <link rel="stylesheet" href="css/stylesheet.css">
    
    <!-- image change in menu by Id -->
    <script>
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
<?php
//Navigation Bar 
include_once('config/constants.php'); 
?>
<body>
    
    <section>

        <?php include 'navbar.html'; ?>
        
    </section>


    <!--==== Home ===-->
    <section class="home" id="home">
    <img src="img/specials-1.png" alt="">
        <div class="content">

            <h3> We Belive Good offer Great Simple </h3>

            <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Et quod omnis ab ullam nostrum fuga vel sunt,
                beatae aperiam commodi suscipit pariatur soluta sapiente perspiciatis, alias rerum dolore. Placeat,
                dicta.</p>
            <a href="#"> <button class="btn"> get started </button></a>
        </div>
    </section>

        <!--==== Home section end =====-->

        <!--==== Aout section start =====-->

    <section class="about" id="about">

        <div class="image"></div>

        <div class="content">
            <h3> A Word about Us </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. T
                empore voluptatibus odio iste illum vero laboriosam excepturi,
                ducimus porro provident repudiandae facilis quod iure est suscipit </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. T
                empore voluptatibus odio iste illum vero laboriosam excepturi,
                ducimus porro provident repudiandae facilis quod iure est suscipit </p>
            <a href="#"><button class="btn">Learn more </button> </a>
        </div>

    </section>
        <!--==== Aout section end =====-->
    

        <!--==== Menu section start =====-->

    <section class="menu" id="menu">
        <h1 class="heading"> Our Delicious <span>Menu</span></h1>

        <ul class="list">
            <li class="btn" onclick="imgcall1()"> Breakfast </li>
            <li class="btn" onclick="imgcall2()"> Lunch </li>
            <li class="btn" onclick="imgcall3()"> Dinner </li>
            <li class="btn" onclick="imgcall4()"> Dessart </li>
            <li class="btn" onclick="imgcall5()"> caesar </li>
        </ul>

        <div class="row">
            <div class="image" id="menu-img" >
                <img src="img/menu/caesar.jpg" alt="Yup..." >
            </div>
            <div class="content">
                    <div class="info">
                        <h3> <span> .01</span> We serve est food in the country </h3>
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="info">
                        <h3> <span> .02</span> We serve est food in the country </h3>
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="info">
                        <h3> <span> .03</span> We serve est food in the country </h3>
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="info">
                        <h3> <span> .04</span> We serve est food in the country </h3>
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

            </div>
        </div>

    </section>
    <!--== Menu section end ====-->

    <!--==== Popular section start =====-->

    <section class="popular" id="popular">

        <h1 class="heading"> <span> Popular </span> Food </h1>

        <div class="box-container">
            <?php
        // Query
            $sqlpopular = "SELECT *FROM tbl_popular WHERE active='Yes' AND featured='Yes' LIMIT 6";
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
                    $image_name =$row['image_name']; ?>
                        <div class="box">
                            <img src="img/Food/<?php echo $image_name; ?>" alt="Yippippp hurry">
                            <h3> <?php echo $title; ?> </h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="price"> Rs. <?php echo $price; ?> </div>
                            <a href="order.php?id=<?php echo $id; ?>"> <button class="btn"> Place Order </button></a>
                        </div>
                <?php }} ?>
        </div>
    </section>

    <section class="gallery" id="gallery" >

    <?php include_once "gallery.php"; ?>
    </section>
    <!--====Gallery section====-->
    <!--====Gallery section====-->

        
    <section class="footer" id="footer">
        <!--=== Footer section start ====-->
        <?php include_once "footer.html"; ?>
        
        <!--=== Footer section end ===-->

    </section>

        <!--==== jquery cdn link ====-->
        

</body>

</html>