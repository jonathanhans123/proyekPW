<?php
    require_once("../php/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Inc</title>
    <link rel="icon" type="image/x-icon" href="../icon/logo.svg">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../java/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="../java/java.js"></script>
    
</head>
<body>
    <div class="container-fluid">
        <!-- navbar -->
        <?php require_once("navbar.php"); ?>
        <!-- jumbotron -->
        <div class="jumbotron">
            <div class="left">&#10094;</div>
            <div class="jumbo-wrap">
                <p class="caption">Shoes For You</p>
                
                <div class="shopnow">SHOP NOW</div>
                
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
        <?php require_once("../php/footer.php"); ?>
    </div>
    <script>
        $(document).ready(function(){
            $(".button").click(function (e) { 
                var category = $(this).parent().children().first().html().replace(" ","+");
                window.location.href="../php/productlist.php?category="+category;
                
            });
            $(".shopnow").click(function (e) {
                window.location.href="../php/productlist.php?category=all";
            });
            
        });
    </script>
</body>
</html>