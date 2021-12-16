<?php
    require_once("koneksi.php");

    if (isset($_REQUEST["item_name"])&&isset($_REQUEST["item_color"])){
        $item_nama = $_REQUEST["item_name"];
        $item_color = $_REQUEST["item_color"];
        $item = $conn->query("select * from item where item_nama='$item_nama' and item_color='$item_color'")->fetch_assoc();
        $id_item = $item["id_item"];
        $ukuran = explode(",",$item["item_size"]);
        $image = explode(",",$item["imageurl"]);
        $review = $conn->query("SELECT * FROM `review` WHERE id_item=$id_item")->fetch_all(MYSQLI_ASSOC);
    }else{
        header("Location:../php/index.php");
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
    <link rel="stylesheet" href="../css/styleproductpage.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../java/jquery.min.js"></script>
    <script src="../java/java.js"></script>
    <script src="../java/rater.min.js"></script>
    <script src="../java/Nzoom.min.js"></script>

    <style>
        
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
                    <div class="zoomArea"><img id="NZoomImg" data-NZoomscale="2" src="../upload/<?php echo $image[0]; ?>" /></div>
                    </center>
                    <div class="subgambar1"><img src="../upload/<?php echo $image[0]; ?>" alt=""></div>
                <div class="subgambar2"><img src="../upload/<?php echo $image[1]; ?>" alt=""></div>
                <div class="subgambar3"><img src="../upload/<?php echo $image[2]; ?>" alt=""></div>
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
                    <label for="color" class="stock" style="font-size: larger;" >Stock : <?php echo $item["item_stock"]; ?></label> <br>
                    <!-- <div class="btnclr1" style="width:30px;height:30px;border: 2px solid black;background-color:white;border-radius: 50%;float: left;"><div class="sbtnclr1" style="width:20px;height:20px;border: 2px solid #ccc;background-color:red;border-radius: 50%;margin:3px 0px 0px 3px;"></div></div>
                    <div class="btnclr2" style="border: 2px solid #ccc;margin-left: 10px;width:30px;height:30px;background-color:black;border-radius: 50%;float: left;"><div class="sbtnclr2" style="width:20px;height:20px;border: 2px solid #ccc;background-color:black;border-radius: 50%;margin:3px 0px 0px 3px;"></div></div> -->
                    <div style="clear: both;"></div><br>
                    
                    <p style="font-size:15pt">Description  </p>
                    <hr>
                    <p><?php echo $item["item_desc"]; ?></p>
                    <br>
                    <div class="addtochart<?php if ($item["item_stock"]<=0){echo '2'; } ?>" <?php if ($item["item_stock"]<=0){echo 'data-bs-toggle="tooltip" title="Item is out of stock!"'; }?>>Add to Cart</div>
                    <br>
                    <div class="addtowishlist">Add to Wish List</div>
                    <br>

                </div>
                <div style="clear: both;"></div>
                
                

            </div>
        </div>
        <div class="review" style="margin-bottom:200px;">
            <center><h1>Reviews</h1></center>
            <?php
            if (isset($_SESSION["auth"])){
                $temp = $_SESSION["auth"]["id_user"];
                $orders = $conn->query("SELECT * FROM `order` where id_user=$temp")->fetch_all(MYSQLI_ASSOC);
                $bought = false;
                foreach($orders as $key=>$value){
                    $temp = $value["id_order"];
                    $ordered_item = $conn->query("SELECT * FROM `ordered_item` where id_order='$temp' and id_item=$id_item")->fetch_assoc();
                    if (!empty($ordered_item)){
                        $bought = true;
                    }
                }
                $reviewed = false;
                $temp = $_SESSION["auth"]["id_user"];

                $reviewcheck = $conn->query("SELECT * FROM `review` WHERE `id_item`=$id_item and `id_user`=$temp")->fetch_all(MYSQLI_ASSOC);
                if (!empty($reviewcheck)){
                    $reviewed = true;
                }
                if (!$reviewed&&$bought){
                    echo '<div class="starrating" style="font-size:30pt;margin-left:5%;color:rgb(255,215,00);"></div>
                    <div class="wrapper" style="margin-bottom:5%;overflow:hidden;">
                        <textarea name="comment" id="comment" placeholder="Rate Your Shoes" style="float:left"></textarea>
                        <input type="submit" id="reviewconfirm" value="&#8594;" style="height:50px;margin-top:12px;margin-left:1%;border-radius:20%;float:left;">
                        <input type="hidden" id="index_item" value="'. $item["id_item"].'">
                    </div>';
                }
            }
            ?>
            
            <?php 
            if (!empty($review)){
                foreach($review as $key=>$value){
                    $temp = $value["id_user"];
                    $user = $conn->query("select * from user where id_user=$temp")->fetch_assoc();
                    $star = $value["stars"];
                    $starempty = 5 - $value["stars"];
                    echo '<div class="rating">
                        <div class="ratingtiapprofile"> 
                            <div class="profilepicture">
                                <div class="sx" style="text-align:center;margin-top: 25px; color: grey;"></div>
                                <img src="../icon/veri.png" style="width: 30px;height: 30px;margin-left: 54px; object-fit:contain;">
                            </div>
                            <label class="profilename">'.$user["user_name"].'</label>
                            <label class="verifiedbuyer"> Verified Buyer</label><br>
                            <div style="height: auto;color:rgb(255,215,00);font-size:20pt;margin-left:10%;overflow:hidden;">';
                            for ($i=0;$i<$star;$i++){
                                echo '&#9733;';
                            }
                            for ($i=0;$i<$starempty;$i++){
                                echo '&#9734;';
                            }
                            echo '</div>
                            <div style="clear: both;"></div>
                            <p>'.$value["comment"].'</p>
                            <hr color="#ccc">
                        </div>
                    </div>';
                }
            }else{
                echo '<h1><center>No reviews yet!</center></h1>';
            }
            ?>
        </div>
    </div>

        <?php require_once("footer.php"); ?>
</div>
</body>

<script>
    $(document).ready(function(){
        var left = 0;
        var top = 0;
        

        var options = {
            max_value: 5,
            step_size: 1,
            initial_value: 0,
            selected_symbol_type: 'utf8_star', // Must be a key from symbols
            cursor: 'default',
            readonly: false,
            change_once: false
        }

        $(".starrating").rate(options);
        $(document).on("click","#reviewconfirm", function () {
            var id_item = $("#index_item").val();
            var comment = $("#comment").val();
            var star = $(".starrating").rate("getValue");
            if (comment!=""&&star!=0){
                $.ajax({
                    type:"post",
                    url:"controller.php",
                    data:{
                        'action':'addreview',
                        'id_item':id_item,
                        'comment':comment,
                        'star':star
                    },
                    success:function(response){
                        $(".container-fluid").append(response);
                        location.reload();
                    }
                });
            }else{
                $("body").append('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Oh no!</strong> Rate and Comment first!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                $(".alert").fadeTo(4000, 500).slideUp(500, function() {
                    $("#success-alert").slideUp(500);   
                });
            }   
        });


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
            var item_color = $(".color").html().substring(8);
            var item_size = "";
            $(".btnsize").each(function () { 
                if ($(this).css("border-color")=="rgb(0, 0, 0)"){
                    item_size = $(this).html();
                }
            });
            if (item_size!=""){
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
                        $(".offcanvas-body").html("");
                        $(".offcanvas-body").append(response);
                    
                    }
                });
            }else{
                $("body").append('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Oh no!</strong> You should pick the shoes size first!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                $(".alert").fadeTo(4000, 500).slideUp(500, function() {
                    $("#success-alert").slideUp(500);   
                });
            }
        });
        $(".sbtnclr2").hide();
        
        $(".subgambar1").click(function(){
            console.log("jwioefjwofej")
            var url = "../upload/"+$(".subgambar1 img").attr("src");
            console.log(url);
            $("#NZoomImg").attr("src", url);
            $(".subgambar1").css("border-color", "black");
            $(".subgambar2").css("border-color", "#ccc");
            $(".subgambar3").css("border-color", "#ccc");
        });
        $(".subgambar2").click(function(){
            var url = "../upload/"+$(".subgambar2 img").attr("src");
            $("#NZoomImg").attr("src", url);
            $(".subgambar1").css("border-color", "#ccc");
            $(".subgambar2").css("border-color", "black");
            $(".subgambar3").css("border-color", "#ccc");
        });
        $(".subgambar3").click(function(){
            var url = "../upload/"+$(".subgambar3 img").attr("src");
            $("#NZoomImg").attr("src", url);
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