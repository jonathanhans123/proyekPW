<?php
    require_once("koneksi.php");
    
    if (!isset($_SESSION["auth"])){
        header("Location:../php/login.php");
    }
    $id_user = $_SESSION["auth"]["id_user"];
    $wishlist = $conn->query("select * from wishlist where id_user=$id_user")->fetch_all(MYSQLI_ASSOC);
    $items = [];
    foreach($wishlist as $key=>$value){
        $item_id = $value["id_item"];
        $item = $conn->query("select * from item where id_item=$item_id")->fetch_assoc();
        array_push($items,$item);
    }
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
        <h1><center>Your Wishlist</center></h1>
        
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
        
    </script>
</body>
</html>