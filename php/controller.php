<?php
    require_once("koneksi.php");

    $action = $_REQUEST["action"];

    if ($action=="delete"){
        $items = $conn->query("select * from item")->fetch_all(MYSQLI_ASSOC);

        $item_nama = $_POST["item_nama"];
        $item_color = $_POST["item_color"];
        $item = $conn->query("select * from item where item_nama='$item_nama' and item_color='$item_color'")->fetch_assoc();
        $imageurl = explode($item["imageurl"],",");
        foreach($imageurl as $key=>$value){
            unlink($value);
        }

        $stmt = $conn->prepare("DELETE FROM item WHERE item_nama=?");
        $stmt->bind_param("s",$item_nama);
        $stmt->execute();
        if ($stmt){
            echo '<script>alert("Berhasil Delete");</script>';
        }else {
            echo '<script>alert("Fail");</script>';
        }
        foreach($items as $key=>$value){
            if (strlen($value["item_desc"])>100){
                $desc = substr($value["item_desc"],0,100) . "...";
            }else{
                $desc = $value["item_desc"];
            }
            echo '<div class="kotakitem">
            <strong>'.$value["item_nama"].' - '.$value["item_color"].'</strong>
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
            <strong>'.$value["item_nama"].' - '.$value["item_color"].'</strong>
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
            <strong>'.$item["item_nama"].' - '.$item["item_color"].'</strong>
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
                echo '<option value="'.$value["id_item"].'">'.$value["item_nama"].' - '.$value["item_color"].'</option>';
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
            <strong>'.$item["item_nama"].' - '.$item["item_color"].'</strong>
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

?>