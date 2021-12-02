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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/checkout.css">
    <script src="../java/jquery.min.js"></script>
    <script src="../java/jquery.autocomplete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="../java/java.js"></script>
    
</head>
<body>
    <div class="container-fluid">
        <div class="back">&larr;Previous page</div>
        <div class="left">
            <h1>Shopping Cart</h1>
            <hr color="#ccc">
            <?php
                if (isset($_SESSION["order"])){
                    foreach($_SESSION["order"] as $key=>$value){
                        $id_itemnavbar = $value["id_item"];
                        $itemnavbar = $conn->query("select * from item where id_item=$id_itemnavbar")->fetch_assoc();
                        $imagenavbar = explode(",",$itemnavbar["imageurl"]);
                        $image1navbar = $imagenavbar[0];
                        
                        echo '<div style="width:100%;height:auto;margin-bottom:30px;">
                        <div style="width:100px;height:100px;float:left;"><img src="'.$image1navbar.'" alt=""></div>
                        <div style="margin-left:150px">
                            <label style="font-weight:bold;font-size:lager">'.$itemnavbar["item_nama"].' ~ '.$itemnavbar["item_color"].'</label><br>
                            <label for="">';
                        $discount = $conn->query("select * from discount where id_item=$id_itemnavbar")->fetch_assoc();
                        if (empty($discount)){
                            echo 'Rp. '.number_format($itemnavbar["item_price"],2).',-';
                        }else{
                            if ($discount["discount_type"]=="percentage"){
                                $truevalue = floor($itemnavbar["item_price"]/100*(100-$discount["value"]));
                            }else if ($discount["discount_type"]=="fixed"){
                                $truevalue = $itemnavbar["item_price"]-$discount["value"];
                            }
                            echo 'Rp. '.number_format($truevalue,2) .',-';
                        }    
                        echo '</label><br>
                            <label for="">Size : '.$value["item_size"].'</label><br>
                            <label for="">Quantity : '.$value["quantity"].'</label><br>
                        </div>
                        <hr color="#ccc">
                    </div>';
                    }
                }
            ?>
            <?php
            $ordercount = 0;
            $ordertotal = 0;
            
            foreach($_SESSION["order"] as $key => $value){
                $temp = $value["id_item"];
                $itemnavbar = $conn->query("select * from item where id_item=$temp")->fetch_assoc();
                $discount = $conn->query("select * from discount where id_item=$temp")->fetch_assoc();
                if (empty($discount)){
                    $truevalue = $itemnavbar["item_price"];
                }else{
                    if ($discount["discount_type"]=="percentage"){
                        $truevalue = floor($itemnavbar["item_price"]/100*(100-$discount["value"]));
                    }else if ($discount["discount_type"]=="fixed"){
                        $truevalue = $itemnavbar["item_price"]-$discount["value"];
                    }
                }     

                $ordercount += $value["quantity"];
                $ordertotal += $truevalue*$value["quantity"];
                
            }
                echo '<div class="wrap" style="float:left;">
                <p style="margin-bottom:0; margin-top:10px;">Total Item : '.$ordercount.'</p>
                <p style="margin-bottom:0;">Subtotal : Rp. '.number_format($ordertotal,2) .',-</p>
                <p style="margin-bottom:0;">Shipping : Free</p>
                <p style="margin-bottom:0;"><strong>TOTAL : Rp. '.number_format($ordertotal,2) .',-</strong></p>
            </div>';
            ?>
        </div>
        <div class="right">
                <h1>Checkout</h1>
                <p>Email used for this transaction is <?php echo $_SESSION["auth"]["user_email"]; ?>. This email will be used if there are any updates.</p>
                <h4>Zip-code/Post Code</h4>
                <input type="text" name="zipcode" id="zipcode" placeholder="Enter Zip Code : ex. 60117" style="width:80%; height:40px; padding-left:2%;">
                <h4>Country</h4>
                <input type="text" name="country" id="country" placeholder="ex. Indonesia" style="width:80%; height:40px; padding-left:2%;">
                <h4>City</h4>
                <input type="text" name="city" id="city"  placeholder="ex. Surabaya" style="width:80%; height:40px; padding-left:2%;">
                <h4>Address</h4>
                <input type="text" name="address" id="address" placeholder="Enter your address" style="width:80%; height:40px; padding-left:2%;"><br>

                <div class="wrapper">
                    <input type="submit" value="Confirm" name="confirm" id="confirm">
                </div>

        </div>
    </div>
    <script>
        $(document).on("click","#confirm", function () {
            var zipcode = $("#zipcode").val();
            var country = $("#country").val();
            var city = $("#city").val();
            var address = $("#address").val();
            if (address!=""&&city!=""&&country!=""&&zipcode!=""){
                $.ajax({
                    type:"POST",
                    url:"checkout-process.php",
                    data:{
                        "zipcode":zipcode,
                        "country":country,
                        "city":city,
                        "address":address
                    },
                    success:function(response){
                        $(".wrapper").html("");
                        $(".wrapper").append(response);
                    }
                });
            }else{
                $("body").append('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Oh no!</strong> You need to fill in everything!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                $(".alert").fadeTo(4000, 500).slideUp(500, function() {
                    $("#success-alert").slideUp(500);   
                });
                
            }
            
        });
        $(document).on("click",".back", function () {
            history.back();
        });
    </script>
</body>
</html>