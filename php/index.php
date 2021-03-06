<?php
    require_once("../php/koneksi.php");
    if(isset($_REQUEST["btnDisc"])){
        header("Location:...");
    }
    if(isset($_REQUEST["btnAbout"])){
        header("Location: about.php");
    }
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
        <div class="showcase one">
            <div class="left">
            </div>
            <div class="right">
            <div class="title">Discount Shoes!</div>
                <div class="text">Discount Shoes, just for you! Only today! Don't miss this chance! Take a look by clicking this button below!</div>
                <div class="button" name="btnDisc">Go now</div>
            </div>
        </div>
        <div class="showcase two">
            <div class="right">
                <div class="title">About Us</div>
                <div class="text">Want to know more about our shoes store? Click this button below!</div>
                <div class="button" name="btnAbout"><a href="about.php"  style="color:white;text-decoration:none;">Learn more about our shop!</a></div>
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
