<?php
    require_once("koneksi.php");

    $item_nama = $_REQUEST["item_nama"];
    $item = $conn->query("select * from item where item_nama='$item_nama'")->fetch_assoc();
    $ukuran = explode(",",$item["item_size"]);
    $image = explode(",",$item["imageurl"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../java/jquery.min.js"></script>
    <script src="../java/java.js"></script>
    <style>
        *{
            margin: 0;
        }
        .main{
            margin-top: 50px;
            width: 100%;
            height: 1000px;
            background-color: white;
            margin-bottom: 50px;
        }

        .submain{
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-left: 10;
        }

        .kiri{
            width: 40%;
            height: 400px;
            float: left;
            margin-left: 10%;
        }
        .gambarutama{
            width: 100%;
            height: 400px;
            border: 2px solid #ccc;
        }
        .subgambar1{
            margin-top:10px;
            width:13%;
            height: 150px;
            float: left;
            text-align: center;
            border: 2px solid black;
            margin-left: 10%;
            margin-right: 0.5%;
        }
        .subgambar2{
            margin-top:10px;
            width:13%;
            height: 150px;
            float: left;      
            text-align: center;
            border: 2px solid #ccc;
            margin-right: 0.5%;
        }
        .subgambar3{
            margin-top:10px;
            width:13%;
            height: 150px;
            float: left;   
            text-align: center;  
            border: 2px solid #ccc;

        }
        
        .subgambar1:hover{
            cursor: pointer;
        }
        .subgambar2:hover{
            cursor: pointer;
        }
        .subgambar3:hover{
            cursor: pointer;
        }

        .kanans{
            float: left;
            width: 40%;
            height: 400px;
            background-color: white;
            padding-left: 5%;
        }
        .btnsize1:hover{
            cursor: pointer;
        }
        .btnsize2:hover{
            cursor: pointer;
        }
        .btnsize3:hover{
            cursor: pointer;
        }
        .btnsize4:hover{
            cursor: pointer;
            
        }
        .btnsize5:hover{
            cursor: pointer;
        }
        .btnsize6:hover{
            cursor: pointer;
        }
        .btnclr1:hover{
            cursor: pointer;
        }
        .btnclr2:hover{
            cursor: pointer;
        }

        .addtochart{
            width: 70%;
            height: 50px;
            background-color: black;
            color: white;
            border-radius: 30px;
            padding-top: 15px;
            text-align: center;
            transition: 0.5s;
            
        }
        .addtochart:hover{
            cursor: pointer;
            background-color:white ;
            color: black;
            box-shadow: 0 0 50px #ccc;
        }
        img{
            height: 100%;
            width:100%;
            object-fit: cover;
            object-position: center center;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php
            require_once("navbar.php");
        ?>

        <div class="main">
            <div class="submain">
                <div class="kiri">
                    <center>
                    <div class="gambarutama"><img id="gmbrutama" src="../upload/<?php echo $image[0]; ?>" /></div>
                    </center>
                </div>
                <div class="kanans">
                    <p style="font-size: xx-large; font-weight: bold;"><?php echo $item["item_nama"]; ?></p>
                    <p style="font-size: larger;">Rp. <?php echo $item["item_price"]; ?></p>
                    <label for="size" class="txtsize"><b>Size :</b> </label> <br>
                    <?php
                        foreach($ukuran as $key=>$value){
                            if ($key==0){
                                echo '<div class="btnsize" style="border: 2px solid #ccc; border-radius: 10px; width:40px; height:40px; background-color: white; text-align: center; padding-top: 5px; float: left;">'.$value.'</div>';
                            }else{
                                echo '<div class="btnsize" style="margin-left: 10px; border: 2px solid #ccc; border-radius: 10px; width:40px; height:40px; background-color: white; text-align: center; padding-top: 5px; float: left;">'.$value.'</div>';
                            }
                        }
                    ?>
                    <div style="clear: both;"></div>
                    <label for="color">Color : Red</label> <br>
                    <div class="btnclr1" style="width:30px;height:30px;border: 2px solid black;background-color:white;border-radius: 50%;float: left;"><div class="sbtnclr1" style="width:20px;height:20px;border: 2px solid #ccc;background-color:red;border-radius: 50%;margin:3px 0px 0px 3px;"></div></div>
                    <div class="btnclr2" style="border: 2px solid #ccc;margin-left: 10px;width:30px;height:30px;background-color:black;border-radius: 50%;float: left;"><div class="sbtnclr2" style="width:20px;height:20px;border: 2px solid #ccc;background-color:black;border-radius: 50%;margin:3px 0px 0px 3px;"></div></div>
                    <div style="clear: both;"></div><br>
                    
                    <p style="font-size:15pt">Description  </p>
                    <hr>
                    <p><?php echo $item["item_desc"]; ?></p>
                    <br>
                    <div class="addtochart" >Add to Chart</div>
                    <br>
                    <p>Size Guide</p>

                </div>
                <div style="clear: both;"></div>
                <div class="subgambar1"><img src="../upload/<?php echo $image[0]; ?>" alt=""></div>
                <div class="subgambar2"><img src="../upload/<?php echo $image[1]; ?>" alt=""></div>
                <div class="subgambar3"><img src="../upload/<?php echo $image[2]; ?>" alt=""></div>

            </div>
        </div>


        <footer>
            <div class="footer-cont">
                <div class="title">Shoes</div>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
                <br>
                <div class="title">Shoes</div>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
            </div>
            <div class="footer-cont">
                <div class="title">Shoes</div>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>

            </div>
            <div class="footer-cont">
                <div class="title">Shoes</div>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
                <br>
                <div class="title">Shoes</div>
                <p><a href="#">shoes</a></p>
                <p><a href="#">shoes</a></p>
            </div>
            <div class="footer-cont">
                <div class="title">Contact us</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, quia saepe illo in laboriosam ipsum nihil, aliquam illum provident, dolor itaque quos quam doloribus. Nihil qui quo hic pariatur laboriosam?</p>
            </div>
        </footer>
    </div>
</body>
<script>
    $(document).ready(function(){
        $(".sbtnclr2").hide();
        
        $(".subgambar1").click(function(){
            console.log("jwioefjwofej")
            var url = "../upload/"+$(".subgambar1 img").attr("src");
            console.log(url);
            $("#gmbrutama").attr("src", url);
            $(".subgambar1").css("border-color", "black");
            $(".subgambar2").css("border-color", "#ccc");
            $(".subgambar3").css("border-color", "#ccc");
        });
        $(".subgambar2").click(function(){
            var url = "../upload/"+$(".subgambar2 img").attr("src");
            $("#gmbrutama").attr("src", url);
            $(".subgambar1").css("border-color", "#ccc");
            $(".subgambar2").css("border-color", "black");
            $(".subgambar3").css("border-color", "#ccc");
        });
        $(".subgambar3").click(function(){
            var url = "../upload/"+$(".subgambar3 img").attr("src");
            $("#gmbrutama").attr("src", url);
            $(".subgambar1").css("border-color", "#ccc");
            $(".subgambar2").css("border-color", "#ccc");
            $(".subgambar3").css("border-color", "black");
        });

        $(document).on("click",".btnsize",function(){
            var size = $(this).html();
            $(".btnsize").each(function(){
                $(this).css("border-color", "#ccc");
            });
            $(this).css("border-color", "black");
            $(".txtsize").html("<b>Size :</b> "+size);
        });
        
        
        $(".btnclr1").click(function(){
            $(".sbtnclr2").hide();
            $(".sbtnclr1").show();
            $(".btnclr2").css({"border-color": "#ccc","background": "black"});
            $(".btnclr1").css({"border-color": "black","background": "white"});
        });
        $(".btnclr2").click(function(){
            $(".sbtnclr2").show();
            $(".sbtnclr1").hide();
            $(".btnclr1").css({"border-color": "#ccc","background": "red"});
            $(".btnclr2").css({"border-color": "black","background": "white"});
        });
    });
</script>
</html>