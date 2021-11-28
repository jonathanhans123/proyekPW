<?php
    require_once("koneksi.php");

    $item_nama = $_REQUEST["item_name"];
    $item_color = $_REQUEST["item_color"];
    $item = $conn->query("select * from item where item_nama='$item_nama' and item_color='$item_color'")->fetch_assoc();
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
    <link rel="stylesheet" href="../css/styleproductpage.css">
    <script src="../java/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="../java/java.js"></script>
    <style>
        *{
            margin: 0;
        }
        .main{
            margin-top: 50px;
            width: 100%;
            height: 600px;
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

        .addtochart,.addtowishlist{
            width: 70%;
            height: 50px;
            background-color: black;
            color: white;
            border-radius: 30px;
            padding-top: 15px;
            text-align: center;
            transition: 0.5s;
            
        }
        .addtochart:hover,.addtowishlist:hover{
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
        .rating{
            width: 100%;
            background-color: white;
        }
        .ratingtiapprofile{
            width: 100%;
            height: 280px;
            background-color: white;
            padding-top: 20px;
            padding-left: 20px;
        }
        .profilepicture{
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: rgb(245, 245, 245);
            float: left;
            margin-bottom: 10px;
        }
        .profilename{
            margin-left: 20px;
            float: left;
        }
        .verifiedbuyer{
            color: rgb(45, 175, 45);
            margin-left: 10px;
            float: left;
        }
        .country{
            margin-left: 20px;
            color: #ccc;
        }
        #star{
            width:120px;
            margin-bottom:10px;
            
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
                    <p style="font-size: xx-large; font-weight: bold;" class="item_name"><?php echo $item["item_nama"]; ?></p>
                    <p style="font-size: larger;">
                    <?php  
                    $temp = $item["id_item"];
                    $discount = $conn->query("select * from discount where id_item=$temp")->fetch_assoc();
                    if (empty($discount)){
                        echo 'Rp. '.number_format($item["item_price"],2).',-';
                    }else{
                        if ($discount["discount_type"]=="percentage"){
                            $truevalue = floor($item["item_price"]/100*(100-$discount["value"]));
                        }else if ($discount["discount_type"]=="fixed"){
                            $truevalue = $item["item_price"]-$discount["value"];
                        }
                        echo '<strike>Rp. '.number_format($item["item_price"],2) .',-</strike><br>';
                        echo 'Rp. '.number_format($truevalue,2) .',-';
                    }
                    ?></p>
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
                    <label for="color" class="color" style="font-size: larger;" >Color : <?php echo ucfirst($item["item_color"]); ?></label> <br>
                    <!-- <div class="btnclr1" style="width:30px;height:30px;border: 2px solid black;background-color:white;border-radius: 50%;float: left;"><div class="sbtnclr1" style="width:20px;height:20px;border: 2px solid #ccc;background-color:red;border-radius: 50%;margin:3px 0px 0px 3px;"></div></div>
                    <div class="btnclr2" style="border: 2px solid #ccc;margin-left: 10px;width:30px;height:30px;background-color:black;border-radius: 50%;float: left;"><div class="sbtnclr2" style="width:20px;height:20px;border: 2px solid #ccc;background-color:black;border-radius: 50%;margin:3px 0px 0px 3px;"></div></div> -->
                    <div style="clear: both;"></div><br>
                    
                    <p style="font-size:15pt">Description  </p>
                    <hr>
                    <p><?php echo $item["item_desc"]; ?></p>
                    <br>
                    <div class="addtochart" >Add to Cart</div>
                    <br>
                    <div class="addtowishlist">Add to Wish List</div>
                    <br>

                </div>
                <div style="clear: both;"></div>
                
                <div class="subgambar1"><img src="../upload/<?php echo $image[0]; ?>" alt=""></div>
                <div class="subgambar2"><img src="../upload/<?php echo $image[1]; ?>" alt=""></div>
                <div class="subgambar3"><img src="../upload/<?php echo $image[2]; ?>" alt=""></div>

            </div>
        </div>
        <div class="review">
            <textarea name="comment" id="comment" placeholder="Rate Your Shoes"></textarea>
        
            <div class="rating">
                <div class="ratingtiapprofile"> 
                    <div class="profilepicture"><div class="sx" style="text-align:center;margin-top: 25px; color: grey;"></div><img src="../icon/veri.png" style="width: 30px;height: 30px;margin-left: 54px; object-fit:contain;"></div>
                    <label class="profilename">ryan reynaldi pratama</label>
                    <label class="verifiedbuyer"> Verified Buyer</label><br>
                    <label class="country">United States</label>
                    <div style="height: 20px;"><img src="../icon/star.png" id="star" style="margin-left: 20px;"></div>
                    <div style="clear: both;"></div>
                    <b>Not Sure</b><br>
                    <p>aidsjoiasjido</p>
                    <p>asduasd</p>
                    <hr color="#ccc">
                </div>
            </div>
        </div>
</div>
        <?php require_once("footer.php"); ?>
    </div>
</body>
<script>
    $(document).ready(function(){
        var text =$(".profilename").text();
        if (/\s/.test($(".profilename").text())) {
            
            var pertama = text.charAt(0).toUpperCase();
            var kedua = text.split(' ')[1].charAt(0).toUpperCase();
            $(".sx").html(pertama+kedua);
        }else{
            var firstWord = text.charAt(0).toUpperCase();
            var secondWord = text.charAt(1).toUpperCase();
            $(".sx").html(firstWord + secondWord);
        }
        $(document).on("click",".addtowishlist", function () {
            console.log("feiwojowf");
            var item_name = $(".item_name").html();
            $.ajax({
                type:"post",
                url:"controller.php",
                data:{
                    'action':'addtowishlist',
                    'item_name':item_name
                },
                success:function(response){
                    $(".container-fluid").append(response);
                }
            });

        });
    
        $(document).on("click",".addtochart", function () {
            var item_name = $(".item_name").html();
            var item_color = $(".color").html().substring(8).toLowerCase();
            var item_size = "";
            $(".btnsize").each(function () { 
                if ($(this).css("border-color")=="black"){
                    item_size = $(this).html();
                }
            });
            $.ajax({
                type:"post",
                url:"controller.php",
                data:{
                    'action':'addtocart',
                    'item_name':item_name,
                    'item_color':item_color,
                    'item_size':item_size
                },
                success:function(response){
                    $(".container-fluid").append(response);
                }
            });
        });
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