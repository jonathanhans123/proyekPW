<?php
    require_once("koneksi.php");

    $action = $_POST["action"];

    if ($action=="delete"){
        $items = $conn->query("select * from item")->fetch_all(MYSQLI_ASSOC);

        $item_nama = $_POST["item_nama"];
        $item = $conn->query("select * from item where item_nama='$item_nama'")->fetch_assoc();
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
            <strong>'.$value["item_nama"].'</strong>
            <p class="text">'.$desc.'</p>
            <p class="textbutton">Delete</p></div>';
        }
    }
    else if ($action=="update"){
        $item_nama = $_POST["item_nama"];
        $item = $conn->query("select * from item where item_nama='$item_nama'")->fetch_assoc();
        echo '
        <form action="" method="post" enctype="multipart/form-data">
                    <div class="kotak insert">
                        <p class="title">Add new Item</p>
                            <div class="text">Nama Barang</div>
                            <input type="text" id="namabarang" name="namabarang" placeholder="Item Name" disabled>
                            <div class="text">Stock</div>
                            <input type="text" id="stokbarang" name="stokbarang" placeholder="Item Stock" value="'.$item["item_stock"].'">
                            <div class="text">Price</div>
                            <input type="text" id="hargabarang" name="hargabarang" placeholder="Item Price"  value="'.$item["item_price"].'">
                            <div class="text">Color</div>
                            <input type="text" id="warnabarang" name="warnabarang" placeholder="Item Color" value="'.$item["item_color"].'">
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
                                <input type="checkbox" name="ukuranbarang[]" value="38" ';
                                if ($item["item_cate"]=="Sneakers"){echo 'selected';} 
                                echo '>38
                                <input type="checkbox" name="ukuranbarang[]" value="39">39
                                <input type="checkbox" name="ukuranbarang[]" value="40">40
                                <input type="checkbox" name="ukuranbarang[]" value="41">41
                                <input type="checkbox" name="ukuranbarang[]" value="42">42
                                <input type="checkbox" name="ukuranbarang[]" value="43">43
                                <input type="checkbox" name="ukuranbarang[]" value="44">44
                                
                            </div>
                            <div class="text">Description</div>
                            <textarea name="descriptionbarang" id="descriptionbarang" maxlength="250"></textarea>                
                        
                        <div class="wrap">
                            <div class="wrap1">
                                Main Image <input type="file" name="file1">
                            </div>
                            <div class="wrap1">
                                2nd Image <input type="file" name="file2">
                            </div>
                            <div class="wrap1">
                                3rd Image <input type="file" name="file3">
                            </div>
                            <div class="wrap1">
                                4th Image <input type="file" name="file4">
                            </div>
                        </div>
                        <input type="submit" value="Add new item" name="add" id="addbarang">
                    </div>
                </form>';
    }

?>