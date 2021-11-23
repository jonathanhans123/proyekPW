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
            $("a").click(function (e) {
                var category = $(this).html();
                window.location.href="../php/productlist.php?category="+category;
                
            });
            $jumboindex = 1;
            $('.left').click(leftclick);
            $('.right').click(rightclick);
            $('.category').mouseenter(function () { 
                $('.categories-text').css("text-decoration","underline");
            });
            $('.cate-wrap').mouseleave(function () { 
                $('.categories-text').css("text-decoration","none");
            });
            $('.loginicon').click(function(){
                
            });
            $(window).scroll(function() {
                var height = $(window).scrollTop();
            
                if(height >= 80) {
                    $(".bottom").css("position","fixed");
                    $(".bottom").css("z-index","1");
                    $(".bottom").css("top","0");
                }else if (height<80){
                    $(".bottom").css("position","static");
                }
            });
            function leftclick(){
                console.log()
                $jumboindex--;
                if ($jumboindex % 2 == 1){
                    console.log("jfiwoej");
                    $(".jumbotron").animate({
                        opacity: "0.4"
                    },500,function(){
                        $(".jumbotron").css("background-image","url('../images/jumbo1.jpg')");
                        $(".jumbotron").animate({
                            opacity: "1"
                        },500,function(){
                        });
                    });
                }else{
                    $(".jumbotron").animate({
                        opacity: "0.4"
                    },500,function(){
                        $(".jumbotron").css("background-image","url('../images/jumbo2.jpg')");
                        $(".jumbotron").animate({
                            opacity: "1"
                        },500,function(){
                        });
                    });
                }
            }
            function rightclick(){
                $jumboindex++;
                if ($jumboindex % 2 == 1){
                    console.log("jfiwoej");
                    $(".jumbotron").animate({
                        opacity: "0.4"
                    },500,function(){
                        $(".jumbotron").css("background-image","url('../images/jumbo1.jpg')");
                        $(".jumbotron").animate({
                            opacity: "1"
                        },500,function(){
                        });
                    });
                }else{
                    $(".jumbotron").animate({
                        opacity: "0.4"
                    },500,function(){
                        $(".jumbotron").css("background-image","url('../images/jumbo2.jpg')");
                        $(".jumbotron").animate({
                            opacity: "1"
                        },500,function(){
                        });
                    });
                }
            }
        });
    </script>
</body>
</html>