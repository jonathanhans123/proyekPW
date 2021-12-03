<?php
    require_once("koneksi.php");
    $query="";
    if (isset($_REQUEST["autocomplete"])&&!isset($_REQUEST["category"])){
        $item_nama = $_REQUEST["item_name"];
        $query = "select * from item where item_nama like '%$item_nama%'";
    }else if (isset($_REQUEST["category"])&&!isset($_REQUEST["autocomplete"])){
        $category = $_REQUEST["category"];
        $query="";
        if ($category=="all"){
            $query = "select * from item";
        }else if ($category=="Casual"){
            $query = "select * from item where item_cate='Sneakers'";
        }else if ($category=="Sports"){
            $query = "select * from item where item_cate='Sports'";
        }else if ($category=="Formal"){
            $query = "select * from item where item_cate='Oxford'";
        }else if ($category=="women"){
            $query = "select * from item where (item_cate='Slip-on' or item_cate='High heel' or item_cate='High-Tops' or item_cate='Wedges')";
        }else if ($category=="men"){
            $query = "select * from item where (item_cate='Sneakers' or item_cate='Boots' or item_cate='Hiking' or item_cate='Oxford' or item_cate='Sandals' or item_cate='Sports')";
        }else{
            $query = "select * from item where item_cate='".$category."'";
        }
    }else{
        $category = "all";
        $query = "select * from item";
    }
    $query2 = $query;
    if ($query=="select * from item"){
        $query2 .= " where item_price>=0";
    }
    echo '<input type="hidden" value="'.$query2.'" class="itemlistname">';
    $items = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $color = $conn->query("select distinct item_color from item")->fetch_all(MYSQLI_ASSOC);
    $colorarray = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Inc</title>
    <link rel="icon" type="image/x-icon" href="../icon/logo.svg">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/productlist.css">
    <script src="../java/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    

</head>
<body>

    <?php include_once("navbar.php"); ?>
    <div class="container">
        <h1><?php
        if (isset($_REQUEST["autocomplete"])&&!isset($_REQUEST["category"])){
            echo "Search Result : ".$item_nama;
        }else if (isset($_REQUEST["category"])&&!isset($_REQUEST["autocomplete"])){ 
            echo ucfirst($category); 
        }
        ?></h1>
        <div class="wrapper" style="overflow:hidden;">
        <div class="wrap">
        Availability <br>
        <select name="availability" id="availability">
            <option value="All">All</option>
            <option value="instock">In stock</option>
            <option value="outofstock">Out of stock</option>
        </select>
        </div>
        <div class="wrap">
        Price <br>
        <input type="text" name="min" id="min" placeholder="Min">
        &nbsp;to&nbsp;
        <input type="text" name="max" id="max" placeholder="Max">
        </div>
        <div class="wrap">
        Color <br>
        <select name="color" id="color">
            <option value="All">All</option>
            <?php
                foreach($color as $key=>$value){
                    $temp = ucfirst($value["item_color"]);
                    $temp2 = explode(" and ",$temp);
                    foreach($temp2 as $key2=>$value2){
                        if (!in_array($value2,$colorarray)){
                            array_push($colorarray,$value2);
                            echo '<option value="'.$value2.'">'.$value2.'</option>';
                        }
                    }
                }
            ?>
        </select>
        </div>
        <div class="wrap">
        Category <br>
        <select name="category" id="category">
            <option value="All">All</option>
            <option value="Sneakers">Sneakers</option>
            <option value="Boots">Boots</option>
            <option value="Slip-on">Slip-on</option>
            <option value="Oxford">Oxford</option>
            <option value="Hiking">Hiking</option>
            <option value="Hiking">Wedges</option>
            <option value="Hiking">High-heels</option>
            <option value="Hiking">High-Tops</option>
            <option value="Hiking">Sandals</option>
            <option value="Hiking">Sports</option>
        </select>
        </div>
        <div class="button">Apply filter</div>
        </div>
        <div class="container-item">
            <?php
                if (!empty($items)){
                    foreach($items as $key=>$value){
                        $image = explode(",",$value["imageurl"]);
                        echo '<div class="item">
                            <img src="'.$image[0].'" alt="">
                            <p class="name">'.$value["item_nama"].' ~ '.ucfirst($value["item_color"]).'</p>';
                        $temp = $value["id_item"];
                        $discount = $conn->query("select * from discount where id_item=$temp")->fetch_assoc();
                        if (empty($discount)){
                            echo '<p class="price">Rp. '.number_format($value["item_price"],2).',-</p>';
                        }else{
                            if ($discount["discount_type"]=="percentage"){
                                $truevalue = floor($value["item_price"]/100*(100-$discount["value"]));
                            }else if ($discount["discount_type"]=="fixed"){
                                $truevalue = $value["item_price"]-$discount["value"];
                            }
                            echo '<p class="price"><strike>Rp. '.number_format($value["item_price"],2) .',-</strike>';
                            echo '&nbsp;&nbsp;Rp. '.number_format($truevalue,2) .',-</p>';
                            if ($value["item_stock"]>0){
                                echo '<p>In Stock</p>';
                            }else{
                                echo '<p>Out of Stock</p>';
                            }
                        }
                        echo '</div>';
                    }
                }else{
                    echo '<h1>No products yet</h1>';
                }
            ?>
        </div>

        

    </div>
    <?php require_once("footer.php"); ?>

    <script>
        $(document).ready(function () {
            $(document).on("click",".item", function () {
                var item = $(this).children().first().next().html().split(" ~ ");
                var item_name = item[0];
                var color = item[1].replace(/ /g,"+");
                var item2 = item_name.replace(/ /g,"+");
                console.log(item);
                $.ajax({
                    type:"get",
                    url:"controller.php",
                    data:{
                        'action':'product',
                        'item_nama':item2,
                        'item_color':color
                    },
                    success:function(response){
                        window.location.href = "../php/productpage.php?item_name="+item2+"&item_color="+color;
                    }
                });
            });
        });
        $(document).on("click",".button",function(){
            var available = $("#availability").find("option:selected").val();
            var min = $("#min").val();
            var max = $("#max").val();
            var color = $("#color").find("option:selected").val();
            var category = $("#category").find("option:selected").val();
            var itemlistname = $(".itemlistname").val();
            if (min>=max && min!="" && max!=""){
                $("body").append('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Oh no!</strong> The minimum value needs to be smaller than maximum value!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                $(".alert").fadeTo(4000, 500).slideUp(500, function() {
                    $("#success-alert").slideUp(500);   
                });
                
            }else{
                $.ajax({
                    type:"post",
                    url:"controller.php",
                    data:{
                        'action':'listproduct',
                        'available':available,
                        'min':min,
                        'max':max,
                        'color':color,
                        'category':category,
                        'itemlistname':itemlistname
                    },
                    success:function(response){
                        $(".container-item").html("");
                        $(".container-item").append(response);
                    }
                });
            }
        });
    </script>
</body>
</html>