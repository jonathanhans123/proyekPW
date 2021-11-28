<?php
    require_once("koneksi.php");
    $query="";

    if (isset($_REQUEST["category"])){
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
        }else{
            $query = "select * from item where item_cate='".$category."'";
        }
    }else{
        $category = "all";
        $query = "select * from item";
    }
    $items = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $color = $conn->query("select distinct item_color from item")->fetch_all(MYSQLI_ASSOC);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h1><?php echo ucfirst($category); ?></h1>
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
                    echo '<option value="'.$value["item_color"].'">'.$temp.'</option>';
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
        <div class="container-item">
            <?php
                if (!empty($items)){
                    foreach($items as $key=>$value){
                        $image = explode(",",$value["imageurl"]);
                        echo '<div class="item">
                            <img src="../upload/'.$image[0].'" alt="">
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
                var color = item[1].toLowerCase();
                var item2 = item_name.replace(" ","+");
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
            console.log("fijowef");
            var available = $("#availability").find("option:selected").val();
            var min = $("#min").val();
            var max = $("#max").val();
            var color = $("#color").find("option:selected").val();
            var category = $("#category").find("option:selected").val();
            if (min>=max && min!="" && max!=""){
                alert("Minimum value needs to be smaller than maximum value");
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
                        'category':category
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