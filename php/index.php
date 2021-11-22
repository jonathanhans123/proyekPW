<?php
    require_once("../php/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../java/jquery.min.js"></script>
    <script src="../java/java.js"></script>
    
</head>
<body>
    <div class="container">
        <!-- navbar -->
        <?php require_once("navbar.php"); ?>
        <!-- jumbotron -->
        <div class="jumbotron">
            <div class="left">&#10094;</div>
            <div class="jumbo-wrap">
                <p class="caption">Shoes For You</p>
                <a href="#">
                <div class="shopnow">SHOP NOW</div>
                </a>
            </div>
            <div class="right">&#10095;</div>
        </div>
        <!-- categories -->
        <div class="categories">
            <div class="cate-wrap">
                <div class="category a">
                    <div class="wrapper">
                        <div class="text">Casual</div>
                        <div class="button">Shop Now</div>
                    </div>
                </div>
                <div class="category b">
                    <div class="wrapper">
                        <div class="text">Sports</div>
                        <div class="button">Shop Now</div>
                    </div>
                </div>
                <div class="category c">
                    <div class="wrapper">
                        <div class="text">Formal</div>
                        <div class="button">Shop Now</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- showcase picture left -->
        <div class="showcase">
            <div class="left">
            </div>
            <div class="right">
                <div class="title">Shoes shoes shoes</div>
                <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nisi ab maxime et, pariatur facere laborum totam eaque sunt odit architecto harum debitis explicabo corporis amet voluptate aut numquam. Impedit!</div>
                <div class="button">Go now</div>
            </div>
        </div>
        <!-- showcase picture right -->
        <div class="showcase">
            <div class="right">
                <div class="title">Shoes shoes shoes</div>
                <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nisi ab maxime et, pariatur facere laborum totam eaque sunt odit architecto harum debitis explicabo corporis amet voluptate aut numquam. Impedit!</div>
                <div class="button">Go now</div>
            </div>
            <div class="left">
            </div>
        </div>
        <?php require_once("../php/footer.php") ?>
    </div>
</body>
</html>