<?php
    require_once("koneksi.php");

    $action = $_REQUEST["action"];

    if ($action=="delete"){
        $item_nama = $_REQUEST["item_nama"];
        $item_color = $_REQUEST["item_color"];
        $item = $conn->query("select * from item where item_nama='$item_nama' and item_color='$item_color'")->fetch_assoc();
        $imageurl = explode($item["imageurl"],",");
        foreach($imageurl as $key=>$value){
            unlink($value);
        }

        $stmt = $conn->prepare("DELETE FROM item WHERE item_nama=? and item_color=?");
        $stmt->bind_param("ss",$item_nama,$item_color);
        $stmt->execute();

        if ($stmt){
            echo "
                <script>$(\"body\").append('<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><strong>Nice!</strong> Item successfully deleted!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');
                $(\".alert\").fadeTo(4000, 500).slideUp(500, function() {
                    $(\"#success-alert\").slideUp(500);   
                });</script>";

        }else {
            echo "
                <script>$(\"body\").append('<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\"><strong>Oh no!</strong> Something went wrong while deleting!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');
                $(\".alert\").fadeTo(4000, 500).slideUp(500, function() {
                    $(\"#success-alert\").slideUp(500);   
                });</script>";
        }
        $items = $conn->query("select * from item")->fetch_all(MYSQLI_ASSOC);
        foreach($items as $key=>$value){
            if (strlen($value["item_desc"])>100){
                $desc = substr($value["item_desc"],0,100) . "...";
            }else{
                $desc = $value["item_desc"];
            }
            echo '<div class="kotakitem">
            <strong>'.$value["item_nama"].' ~ '.$value["item_color"].'</strong>
            <p class="text">'.$desc.'</p>
            <p class="textbutton">Delete</p></div>';
        }
        
    }
    else if ($action=="update"){
        $item_nama = $_REQUEST["item_nama"];
        $item_color = $_REQUEST["item_color"];
        $item = $conn->query("select * from item where item_nama='$item_nama' and item_color='$item_color'")->fetch_assoc();
        $ukuran = explode(",",$item["item_size"]);

        echo '
                    <div class="kotak insert">
                        <p class="title">Update existing item</p>
                            <div class="text">Nama Barang</div>
                            <input type="text" id="namabarang" name="namabarang" placeholder="Item Name" disabled value="'.$item["item_nama"].'">
                            <div class="text">Stock</div>
                            <input type="text" id="stokbarang" name="stokbarang" placeholder="Item Stock" value="'.$item["item_stock"].'">
                            <div class="text">Price</div>
                            <input type="text" id="hargabarang" name="hargabarang" placeholder="Item Price"  value="'.$item["item_price"].'">
                            <div class="text">Color</div>
                            <input type="text" id="warnabarang" disabled    name="warnabarang" placeholder="Item Color" value="'.$item["item_color"].'">
                            <div class="text">Category</div>
                            <select name="catebarang" id="catebarang">
                                <option value="Sneakers" ';
                                if ($item["item_cate"]=="Sneakers"){echo 'selected';} 
                                echo '>Sneakers</option>
                                <option value="Boots" ';
                                if ($item["item_cate"]=="Boots"){echo 'selected';} 
                                echo '>Boots</option>
                                <option value="Slip-on" ';
                                if ($item["item_cate"]=="Slip-on"){echo 'selected';} 
                                echo '>Slip-on</option>
                                <option value="Oxford" ';
                                if ($item["item_cate"]=="Oxford"){echo 'selected';} 
                                echo '>Oxford</option>
                                <option value="Hiking" ';
                                if ($item["item_cate"]=="Hiking"){echo 'selected';} 
                                echo '>Hiking</option>
                                <option value="Wedges" ';
                                if ($item["item_cate"]=="Wedges"){echo 'selected';} 
                                echo '>Wedges</option>
                                <option value="High-heels" ';
                                if ($item["item_cate"]=="High-heels"){echo 'selected';} 
                                echo '>High-heels</option>
                                <option value="High-Tops" ';
                                if ($item["item_cate"]=="HIgh-Tops"){echo 'selected';} 
                                echo '>High-Tops</option>
                                <option value="Sandals" ';
                                if ($item["item_cate"]=="Sandals"){echo 'selected';} 
                                echo '>Sandals</option>
                                <option value="Sports" ';
                                if ($item["item_cate"]=="Sports"){echo 'selected';} 
                                echo '>Sports</option>
                            </select>
                            <div class="text">Size</div>
                            <div class="wrap2">
                                <input type="checkbox" id="ukuranbarang" value="38" ';
                                if (in_array("38",$ukuran)){echo 'checked';} 
                                echo '>38
                                <input type="checkbox" id="ukuranbarang" value="39" ';
                                if (in_array("38",$ukuran)){echo 'checked';} 
                                echo '>39
                                <input type="checkbox" id="ukuranbarang" value="40" ';
                                if (in_array("40",$ukuran)){echo 'checked';} 
                                echo '>40
                                <input type="checkbox" id="ukuranbarang" value="41" ';
                                if (in_array("41",$ukuran)){echo 'checked';} 
                                echo '>41
                                <input type="checkbox" id="ukuranbarang" value="42" ';
                                if (in_array("42",$ukuran)){echo 'checked';} 
                                echo '>42
                                <input type="checkbox" id="ukuranbarang" value="43" ';
                                if (in_array("43",$ukuran)){echo 'checked';} 
                                echo '>43
                                <input type="checkbox" id="ukuranbarang" value="44" ';
                                if (in_array("44",$ukuran)){echo 'checked';} 
                                echo '>44
                                
                            </div>
                            <div class="text">Description</div>
                            <textarea name="descriptionbarang" id="descriptionbarang" maxlength="250">'.$item["item_desc"].'</textarea>                
                        
                        
                        <input type="submit" value="Update Item" name="update" id="updatebarang">
                    </div>
                ';
    }
    else if ($action=="save"){
        $item_nama = $_REQUEST["item_nama"];
        $item_stock = $_REQUEST["item_stock"];
        $item_price = $_REQUEST["item_price"];
        $item_color = $_REQUEST["item_color"];
        $item_desc = $_REQUEST["item_desc"];
        $item_size = $_REQUEST["item_size"];
        $item_cate = $_REQUEST["item_cate"];

        $stmt = $conn->prepare("UPDATE item SET item_stock=?,item_price=?,item_color=?,item_desc=?,item_size=?,item_cate=? WHERE item_nama=?");
        $stmt->bind_param("sssssss",$item_stock,$item_price,$item_color,$item_desc,$item_size,$item_cate,$item_nama);
        $stmt->execute();
        echo "
        <script>$(\"body\").append('<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><strong>Nice!</strong> Item is successfully updated!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');
        $(\".alert\").fadeTo(4000, 500).slideUp(500, function() {
            $(\"#success-alert\").slideUp(500);   
        });</script>";

        $items = $conn->query("select * from item")->fetch_all(MYSQLI_ASSOC);
        foreach($items as $key=>$value){
            if (strlen($value["item_desc"])>100){
                $desc = substr($value["item_desc"],0,100) . "...";
            }else{
                $desc = $value["item_desc"];
            }
            echo '<div class="kotakitem">
            <strong>'.$value["item_nama"].' ~ '.$value["item_color"].'</strong>
            <p class="text">'.$desc.'</p>
            <p class="textbutton">Update</p></div>';
        }
    }
    else if ($action=="adddiscount2"){
        $discount_type = $_REQUEST["type"];
        $value = $_REQUEST["value"];
        $id_item = $_REQUEST["item"];
        $stmt = $conn->prepare("insert into discount(id_item,value,discount_type) values(?,?,?)");
        $stmt->bind_param("iss",$id_item,$value,$discount_type);
        $stmt->execute();   

        $discounts = $conn->query("select * from discount")->fetch_all(MYSQLI_ASSOC);
        foreach($discounts as $key=>$value){
            $temp = $value["id_item"];
            $item = $conn->query("select * from item where id_item=$temp")->fetch_assoc();

            echo '<div class="kotakdisc">
            <input type="hidden" id="indexdelete" value="'.$value["id_item"].'">
            <strong>'.$item["item_nama"].' ~ '.$item["item_color"].'</strong>
            <p class="text">Discount for ';
            if ($value["discount_type"]=="percentage"){
                echo $value["value"].'%';
            }else{
                echo 'Rp. '.$value["value"];
            }
            echo '</p>
                <p class="textbutton">Delete Discount</p>
        </div>
        ';
        
        }
        echo '<input type="submit" value="Add Discount" id="adddiscount">';
    }
    else if ($action=="adddiscount"){
        $discounts = $conn->query("select * from discount")->fetch_all(MYSQLI_ASSOC);
        $notvalid = [];
        foreach($discounts as $key=>$value){
            array_push($notvalid,$value["id_item"]);
        }
        
        $items = $conn->query("select * from item")->fetch_all(MYSQLI_ASSOC);
        echo '<div class="kotakinputdisc">

        <strong>Type</strong><br>
        <input type="radio" name="type" id="percentage" value="percentage" checked>Percentage <br>
        <input type="radio" name="type" id="fixed" value="fixed">Fixed Amount <br>
        <strong>Value</strong><br>
        <input type="number" name="" id="discvalue" placeholder="%"><br>
        <strong>Item</strong><br>
        <select name="" id="item">';
            
        foreach($items as $key=>$value){
            if (!in_array($value["id_item"],$notvalid)){
                echo '<option value="'.$value["id_item"].'">'.$value["item_nama"].' ~ '.$value["item_color"].'</option>';
            }
        }
        echo '</select><br><br>
        <input type="submit" value="Add" id="add">
    </div>';
    }
    else if ($action=="deletediscount"){
        $index = $_REQUEST["id_item"];
        $stmt = $conn->prepare("delete from discount where id_item=?");
        $stmt->bind_param("i",$index);
        $stmt->execute();
        $items = $conn->query("select * from item")->fetch_all(MYSQLI_ASSOC);
        $discounts = $conn->query("select * from discount")->fetch_all(MYSQLI_ASSOC);
        foreach($discounts as $key=>$value){
            $temp = $value["id_item"];
            $item = $conn->query("select * from item where id_item=$temp")->fetch_assoc();

            echo '<div class="kotakdisc">
            <input type="hidden" id="indexdelete" value="'.$value["id_item"].'">
            <strong>'.$item["item_nama"].' ~ '.$item["item_color"].'</strong>
            <p class="text">Discount for ';
            if ($value["discount_type"]=="percentage"){
                echo $value["value"].'%';
            }else{
                echo 'Rp. '.$value["value"];
            }
            echo '</p>
                <p class="textbutton">Delete Discount</p>
        </div>
        ';
        }
        echo '<input type="submit" value="Add Discount" id="adddiscount">';
    }
    else if ($action=="product"){
        
    }
    else if ($action=="listproduct"){
        $available = $_REQUEST["available"];
        $min=$_REQUEST["min"];
        $max=$_REQUEST["max"];
        $color=$_REQUEST["color"];
        $category=$_REQUEST["category"];
        $itemlistname = $_REQUEST["itemlistname"];
        
        $query = $itemlistname;
        if ($available=="instock"){
            $query .= " and item_stock>0";
        }else if ($available=="outofstock"){
            $query .= " and item_stock<=0";
        }
        if ($min!=""){
            $query .= " and item_price>$min";
        }
        if ($max!=""){
            $query .= " and item_price<$max";
        }
        if ($color!=""&&$color!="All"){
            $query .= " and item_color='$color'";
        }
        if ($category!=""&&$category!="All"){
            $query .= " and item_cate='$category'";
        }
        $items = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

        if (!empty($items)){
            foreach($items as $key=>$value){
                $image = explode(",",$value["imageurl"]);
                echo '<div class="item">
                    <img src="../upload/'.$image[0].'" alt="">
                    <p class="name">'.$value["item_nama"].' ~ '.$value["item_color"].'</p>';
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
                    
                }
                echo '</div>';
            }
        }else{
            echo '<h1>No products yet</h1>';
        }
    }
    else if ($action=="addtowishlist"){
        if (isset($_SESSION["auth"])){
            $item_nama = $_REQUEST["item_name"];
            $item = $conn->query("select * from item where item_nama='$item_nama'")->fetch_assoc();
            $id_item = $item["id_item"];
            $id_user = $_SESSION["auth"]["id_user"];
            $exist = $conn->query("select * from wishlist where id_item='$id_item' and id_user='$id_user'")->fetch_assoc();
            if (empty($exist)){
                $stmt = $conn->prepare("insert into wishlist(id_item,id_user) values(?,?)");
                $stmt->bind_param("ii",$id_item,$id_user);
                $stmt->execute();
                echo "
                <script>$(\"body\").append('<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><strong>Nice!</strong> Successfully added to your wishlist!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');
                $(\".alert\").fadeTo(4000, 500).slideUp(500, function() {
                    $(\"#success-alert\").slideUp(500);   
                });</script>";
            }else{
                echo "
                <script>$(\"body\").append('<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\"><strong>Oh no!</strong> Item already added to your wishlist!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');
                $(\".alert\").fadeTo(4000, 500).slideUp(500, function() {
                    $(\"#success-alert\").slideUp(500);   
                });</script>";
                
                
            }
        }else{
            echo "
                <script>$(\"body\").append('<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\"><strong>Oh no!</strong> You need to sign before add wishlist!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');
                $(\".alert\").fadeTo(4000, 500).slideUp(500, function() {
                    $(\"#success-alert\").slideUp(500);   
                });</script>";
        }
        
    }
    else if ($action=="addtocart"){
        $item_nama = $_REQUEST["item_name"];
        $item_color = $_REQUEST["item_color"];
        $item_size = $_REQUEST["item_size"];
        $item = $conn->query("select * from item where item_nama='$item_nama' and item_color='$item_color'")->fetch_assoc();
        $id_item = $item["id_item"];
        $order = [
            "id_item"=>$id_item,
            "item_size"=>$item_size,
            "quantity"=>1
        ];
        if (isset($_SESSION["order"])){
            $exist = false;
            foreach($_SESSION["order"] as $key=>$value){
                if ($order["id_item"] == $value["id_item"]&&$order["item_size"] == $value["item_size"]){
                    $_SESSION["order"][$key]["quantity"]++; 
                    $exist = true;
                }
            }
            if (!$exist){
                array_push($_SESSION["order"],$order);
            }
            
            echo "
                <script>$(\"body\").append('<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><strong>Nice!</strong> Item successfully added!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');
                $(\".alert\").fadeTo(4000, 500).slideUp(500, function() {
                    $(\"#success-alert\").slideUp(500);   
                });</script>";
        }else{
            $_SESSION["order"] = [];
            array_push($_SESSION["order"],$order);
            echo "
                <script>$(\"body\").append('<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><strong>Nice!</strong> Item successfully added!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');
                $(\".alert\").fadeTo(4000, 500).slideUp(500, function() {
                    $(\"#success-alert\").slideUp(500);   
                });</script>";
        }
        echo '<label for="">';        
        $count = 0;
        if (isset($_SESSION["order"])){
            foreach($_SESSION["order"] as $key=>$value){
                $count += $value["quantity"];
            }
            echo $count;
        }
        else{
            echo "0";
        }
        echo ' item</label><br><br>
        <div class="container-checkout">';
            
        if (isset($_SESSION["order"])){
            foreach($_SESSION["order"] as $key=>$value){
                $id_itemnavbar = $value["id_item"];
                $itemnavbar = $conn->query("select * from item where id_item=$id_itemnavbar")->fetch_assoc();
                $imagenavbar = explode(",",$itemnavbar["imageurl"]);
                $image1navbar = $imagenavbar[0];
                echo '<button type="button" class="btn-close text-reset" id="deleteorder"></button>
                
                <div style="width:100%;height:100px;margin-bottom:40px;">
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
    
            
            
        echo '</div>
        <div class="checkout">Checkout</div>';
    }
    else if ($action=="gotocheckout"){
        echo "berhasil";
        if (isset($_SESSION["auth"])&&isset($_SESSION["order"])){
            echo '<script>window.location.href = "../php/checkout.php";</script>';
        }else{
            echo "
                <script>$(\"body\").append('<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\"><strong>Oh no!</strong> You need to sign before going to checkout!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');
                $(\".alert\").fadeTo(4000, 500).slideUp(500, function() {
                    $(\"#success-alert\").slideUp(500);   
                });</script>";

        }
    }
    else if ($action=="payment"){
        $total = 0;
        foreach($_SESSION["order"] as $key=>$value){
            $temp = $value["id_item"];
            $item = $conn->query("select * from item where id_item=$temp")->fetch_assoc();
            $discount = $conn->query("select * from discount where id_item=$temp")->fetch_assoc();
            if (empty($discount)){
                $truevalue = $item["item_price"];
            }else{
                if ($discount["discount_type"]=="percentage"){
                    $truevalue = floor($item["item_price"]/100*(100-$discount["value"]));
                }else if ($discount["discount_type"]=="fixed"){
                    $truevalue = $item["item_price"]-$discount["value"];
                }
            }
            $orders = $conn->query("SELECT * FROM `order`")->fetch_all(MYSQLI_ASSOC);
            $count = count($orders);
            $id_order = "ORDER_".$count;
            $stmt2 = $conn->prepare("INSERT INTO `ordered_item`(id_order,id_item,item_price,quantity,item_size) VALUES(?,?,?,?,?)");
            $stmt2->bind_param("siiii",$id_order,$temp,$truevalue,$value["quantity"],$value["item_size"]);
            $stmt2->execute();

            $temp1 = $value["quantity"];
            
            $stmt = $conn->query("UPDATE item SET item_stock=item_stock-$temp1 WHERE id_item=$temp");
            $total += $value["quantity"]*$truevalue;
        }
        $orders = $conn->query("SELECT * FROM `order`")->fetch_all(MYSQLI_ASSOC);
        $count = count($orders);
        $id_order = "ORDER_".$count;
        $date = date('m/d/Y h:i:s a', time());
        $status = "Pending";
        $stmt = $conn->prepare("INSERT INTO `order`(`id_order`, `id_user`, `harga_total`, `tanggal_order`, `status`, `address`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$id_order,$_SESSION["auth"]["id_user"],$total,$date,$status,$_SESSION["shipping_address"]["address"]);
        $stmt->execute();
        unset($_SESSION["order"]);
        echo '<script>window.location.href = "../php/user.php"; </script>';
    }
    else if ($action=="deleteorder"){
        $index = $_REQUEST["index"];
        unset($_SESSION["order"][$index]);
        $_SESSION["order"] = array_values($_SESSION["order"]);
    
        echo '<label for="">';        
        $count = 0;
        if (isset($_SESSION["order"])){
            foreach($_SESSION["order"] as $key=>$value){
                $count += $value["quantity"];
            }
            echo $count;
        }
        else{
            echo "0";
        }
        echo ' item</label><br><br>
        <div class="container-checkout">';
            
        if (isset($_SESSION["order"])){
            foreach($_SESSION["order"] as $key=>$value){
                $id_itemnavbar = $value["id_item"];
                $itemnavbar = $conn->query("select * from item where id_item=$id_itemnavbar")->fetch_assoc();
                $imagenavbar = explode(",",$itemnavbar["imageurl"]);
                $image1navbar = $imagenavbar[0];
                echo '<button type="button" class="btn-close text-reset" id="deleteorder"></button>
                
                <div style="width:100%;height:100px;margin-bottom:40px;">
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
            
        echo '</div>
        <div class="checkout">Checkout</div>';
    }
    else if ($action=="addreview"){
        $id_item = $_REQUEST["id_item"];
        $comment = $_REQUEST["comment"];
        $star = $_REQUEST["star"];

        $stmt = $conn->prepare("INSERT INTO `review`(id_item,id_user,stars,comment) VALUES(?,?,?,?)");
        $stmt->bind_param("iiis",$id_item,$_SESSION["auth"]["id_user"],$star,$comment);
        $stmt->execute();
        echo "
                <script>$(\"body\").append('<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><strong>Oh no!</strong> Thank you for rating and reviewing our product!<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>');
                $(\".alert\").fadeTo(4000, 500).slideUp(500, function() {
                    $(\"#success-alert\").slideUp(500);   
                });</script>";
    }

?>