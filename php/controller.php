<?php
    require_once("koneksi.php");

    $action = $_REQUEST["action"];

    if ($action=="delete"){
        $item_nama = $_POST["item_nama"];
        $item_color = $_POST["item_color"];
        $item = $conn->query("select * from item where item_nama='$item_nama' and item_color='$item_color'")->fetch_assoc();
        $imageurl = explode($item["imageurl"],",");
        foreach($imageurl as $key=>$value){
            unlink($value);
        }

        $stmt = $conn->prepare("DELETE FROM item WHERE item_nama=? and item_color=?");
        $stmt->bind_param("ss",$item_nama,$item_color);
        $stmt->execute();

        if ($stmt){
            echo '<script>alert("Berhasil Delete");</script>';
        }else {
            echo '<script>alert("Fail");</script>';
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
        $item_nama = $_POST["item_nama"];
        $item_color = $_POST["item_color"];
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
        $item_nama = $_POST["item_nama"];
        $item_stock = $_POST["item_stock"];
        $item_price = $_POST["item_price"];
        $item_color = $_POST["item_color"];
        $item_desc = $_POST["item_desc"];
        $item_size = $_POST["item_size"];
        $item_cate = $_POST["item_cate"];

        $stmt = $conn->prepare("UPDATE item SET item_stock=?,item_price=?,item_color=?,item_desc=?,item_size=?,item_cate=? WHERE item_nama=?");
        $stmt->bind_param("sssssss",$item_stock,$item_price,$item_color,$item_desc,$item_size,$item_cate,$item_nama);
        $stmt->execute();

        echo '<script>alert("Update Successfull");</script>';
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
        $discount_type = $_POST["type"];
        $value = $_POST["value"];
        $id_item = $_POST["item"];
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
        <input type="submit" value="Add Discount" id="adddiscount">
        ';
        }
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
        $index = $_POST["id_item"];
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
        <input type="submit" value="Add Discount" id="adddiscount">
        ';
        }
    }
    else if ($action=="product"){
        
    }
    else if ($action=="listproduct"){
        $available = $_POST["available"];
        $min=$_POST["min"];
        $max=$_POST["max"];
        $color=$_POST["color"];
        $category=$_POST["category"];
        $query = "select * from item where";
        if ($available=="All"){
            
        }else{
            if (str_ends_with($available,"where")){
                if ($available=="instock"){
                    $query .= " item_stock>0";
                }else{
                    $query .= " item_stock=0";
                }
            }else {
                if ($available=="outofstock"){
                    $query .= " and item_stock>0";
                }else{
                    $query .= " and item_stock=0";
                }
            }
        }
        if ($color=="All"){
            
        }else{
            if (str_ends_with($query,"where")){
                $query .= " color='$color'";
            }else {
                $query .= " and color='$color'";
            }
        }
        if ($category=="All"){

        }else{
            if (str_ends_with($query,"where")){
                $query .= " item_cate='$category'";
            }else {
                $query .= " and item_cate='$category'";
            }
        }
        if (str_ends_with($query,"where")){
            if ($min!=""){
                $query .= " item_price>$min";
            }
        }else{
            if ($min!=""){
                $query .= " and item_price>$min";
            }
        }
        if (str_ends_with($query,"where")){
            if ($max!=""){
                $query .= " item_price<$max";
            }
        }else{
            if ($max!=""){
                $query .= " and item_price<$max";
            }
        }
        
        if (str_ends_with($query,"where")){
            $query = substr($query,0,strlen($query)-5);
        }
        $items = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

        if (!empty($items)){
            foreach($items as $key=>$value){
                $image = explode(",",$value["imageurl"]);
                echo '<div class="item">
                    <img src="../upload/'.$image[0].'" alt="">
                    <p class="name">'.$value["item_nama"].'</p>';
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
    }
    else if ($action=="addtowishlist"){
        if (isset($_SESSION["auth"])){
            $item_nama = $_POST["item_name"];
            $item = $conn->query("select * from item where item_nama='$item_nama'")->fetch_assoc();
            $id_item = $item["id_item"];
            $id_user = $_SESSION["auth"]["id_user"];
            $exist = $conn->query("select * from wishlist where id_item='$id_item' and id_user='$id_user'")->fetch_assoc();
            if (empty($exist)){
                $stmt = $conn->prepare("insert into wishlist(id_item,id_user) values(?,?)");
                $stmt->bind_param("ii",$id_item,$id_user);
                $stmt->execute();
                echo '<script>alert("Successfully added to your wishlist");</script>';
            }else{
                echo '<script>alert("Item already added to your wishlist");</script>';
            }
        }else{
            echo '<script>alert("You need to sign before add wishlist");</script>';
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
                echo $order["id_item"].$value["id_item"].$order["item_size"].$value["item_size"];
                if ($order["id_item"] == $value["id_item"]&&$order["item_size"] == $value["item_size"]){
                    $_SESSION["order"][$key]["quantity"]++; 
                    $exist = true;
                }
            }
            if (!$exist){
                array_push($_SESSION["order"],$order);
            }
            echo '<script>
                alert("Item added to cart");
                location.reload();
                
                </script>';
        }else{
            $_SESSION["order"] = [];
            array_push($_SESSION["order"],$order);
            echo '<script>
                alert("Item added to cart");
                location.reload();
                
                </script>';
        }
    }
    else if ($action=="gotocheckout"){
        echo "berhasil";
        if (isset($_SESSION["auth"])&&isset($_SESSION["order"])){
            echo '<script>window.location.href = "../php/checkout.php";</script>';
        }else{
            echo '<script>alert("Sign in to go to checkout page!");</script>';
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
            $id_order = "ORDER".$count;
            $stmt = $conn->prepare("INSERT INTO `ordered_item`(id_order,id_item,item_price,quantity,item_size) VALUES(?,?,?,?,?)");
            $stmt->bind_param("siiii",$id_order,$temp,$truevalue,$value["quantity"],$value["item_size"]);
            $stmt->execute();
            $total += $value["quantity"]*$truevalue;
        }
        $orders = $conn->query("SELECT * FROM `order`")->fetch_all(MYSQLI_ASSOC);
        $count = count($orders);
        $id_order = "TEST".$count;
        $date = date('m/d/Y h:i:s a', time());
        $status = "Pending";
        $stmt = $conn->prepare ("INSERT INTO `order`(`id_order`, `id_user`, `harga_total`, `tanggal_order`, `status`, `address`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$id_order,$_SESSION["auth"]["id_user"],$total,$date,$status,$_SESSION["shipping_address"]["address"]);
        $stmt->execute();
    }

?>