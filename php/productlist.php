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
                            <p class="name">'.$value["item_nama"].'</p>
                            <p class="price">Rp. '.$value["item_price"].'</p>
                        </div>';
                    }
                }else{
                    echo '<h1>No products yet</h1>';
                }
            ?>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            $(document).on("click",".item", function () {
                var item = $(this).children().first().next().html();
                var item2 = item.replace(" ","+");
                console.log(item);
                $.ajax({
                    type:"get",
                    url:"controller.php",
                    data:{
                        'action':'product',
                        'item_nama':item
                    },
                    success:function(response){
                        window.location.href = "../php/productpage.php?item_nama="+item2;
                    }
                });
            });
        });
    </script>
</body>
</html>