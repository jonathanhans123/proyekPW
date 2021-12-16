<?php 
    require_once("koneksi.php"); 
    if (isset($_POST["add"])){
        $nama = $_POST["namabarang"];
        $stok = $_POST["stokbarang"];
        $harga = $_POST["hargabarang"];
        $warna = $_POST["warnabarang"];
        $cate = $_POST["catebarang"];
        $description = $_POST["descriptionbarang"];
        $ukuran = $_POST["ukuranbarang"]??"";
        if ($nama!=""&&$stok!=""&&is_numeric($stok)&&$harga!=""&&is_numeric($harga)&&$warna!=""&&!empty($_POST["ukuranbarang"])&&$description!=""&&$_FILES["file1"]["error"]==0&&$_FILES["file2"]["error"]==0&&$_FILES["file3"]["error"]==0){
            $pathinfo1 = pathinfo($_FILES["file1"]["name"]);
            $filesize1 = $_FILES["file1"]["size"];
            $pathinfo2 = pathinfo($_FILES["file2"]["name"]);
            $filesize2 = $_FILES["file2"]["size"];
            $pathinfo3 = pathinfo($_FILES["file3"]["name"]);
            $filesize3 = $_FILES["file3"]["size"];

            if ($filesize1<2000000&&$filesize2<2000000&&$filesize3<2000000){
                $filetype1 = $_FILES['file1']['type'];
                $filetype2 = $_FILES['file2']['type'];
                $filetype3 = $_FILES['file3']['type'];
                $allowed = array("image/png", "image/jpg", "image/jpeg");
                if(in_array($filetype1, $allowed)&&in_array($filetype2, $allowed)&&in_array($filetype3, $allowed)) {
                    $items = $conn->query("select * from item where item_nama='$nama' and item_color='$warna'")->fetch_all(MYSQLI_ASSOC);
                    if (empty($items)){
                        $ukuran = $_POST["ukuranbarang"];
                        $ukuranbarang = "";
                        foreach($ukuran as $key=>$value){
                            if ((count($ukuran)-1)==$key){
                                $ukuranbarang = $ukuranbarang . $value;
                            }else{
                                 $ukuranbarang = $ukuranbarang . $value . ",";
                            }
                        }
                        $target_dir = "../upload/";

                        $extension1 = $pathinfo1["extension"];
                        $nama_file_tujuan1 = $target_dir . $nama."1".$warna .".".$extension1;
                        $asal1 = $_FILES["file1"]["tmp_name"];
                        $extension2 = $pathinfo2["extension"];
                        $nama_file_tujuan2 = $target_dir . $nama."2".$warna.".".$extension2;
                        $asal2 = $_FILES["file2"]["tmp_name"];
                        $extension3 = $pathinfo3["extension"];
                        $nama_file_tujuan3 = $target_dir . $nama."3".$warna.".".$extension3;
                        $asal3 = $_FILES["file3"]["tmp_name"];
                        
                        $imageurl = $nama_file_tujuan1.",".$nama_file_tujuan2.",".$nama_file_tujuan3;
                        $stmt = $conn->query("insert into item(item_nama,item_stock,item_price,item_color,item_desc,imageurl,item_size,item_cate) values('$nama','$stok','$harga','$warna','$description','$imageurl','$ukuranbarang','$cate')");
                        move_uploaded_file($asal1,$nama_file_tujuan1);
                        move_uploaded_file($asal2,$nama_file_tujuan2);
                        move_uploaded_file($asal3,$nama_file_tujuan3);
                        
                        echo '<script>alert("Item uploaded successfully!");</script>';
                        header("Location:adminupdate.php");
                    }else{
                        echo '<script>alert("Item with same name and color already exists!");</script>';
                    }
                }else{
                    echo '<script>alert("File upload can only be JPEG or PNG!");</script>';
                }
            }else{
                echo '<script>alert("File size is too big!");</script>';
            }
        }else{
            echo '<script>alert("Fill in every field!");</script>';
        }
    }

    if (!isset($_SESSION["admin"])){
        header("Location:login.php");
    }

    if (isset($_POST["logout"])){
        unset($_SESSION["admin"]);
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Inc</title>
    <link rel="icon" type="image/x-icon" href="../icon/logo.svg">
    <link rel="stylesheet" href="../css/styleadmin.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../java/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        
        <div class="sidebar">
        <form action="" method="post">
                <input type="submit" value="Logout" name="logout">
            </form>
            <div class="nav-bold">Home</div>
            <div class="nav report"><a href="../php/admin.php">Report</a></div>
            <div class="nav-bold">E-commerce</div>
            <div class="nav add"><a href="../php/adminadd.php">Add products</a></div>
            <div class="nav update"><a href="../php/adminupdate.php">Update products</a></div>
            <div class="nav delete"><a href="../php/admindelete.php">Delete products</a></div>
            <div class="nav discount"><a href="../php/admindiscount.php">Add Discount</a></div>
            <div class="nav-bold">Order</div>
            <div class="nav"><a href="../php/adminorder.php">Update Order</a></div>
        </div>
        <div class="main">
            <div class="navbar">
                <div class="hamburger">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hamicon" x="0px" y="0px"
                    width="40" height="40"
                    viewBox="0 0 24 24"
                    style=" fill:rgb(80, 80, 80);"><path d="M 2 5 L 2 7 L 22 7 L 22 5 L 2 5 z M 2 11 L 2 13 L 22 13 L 22 11 L 2 11 z M 2 17 L 2 19 L 22 19 L 22 17 L 2 17 z"></path></svg>
                </div>
                
            </div>
            <div class="container2">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="kotak insert">
                        <p class="title">Add new Item</p>
                            <div class="text">Nama Barang (no special characters)</div>
                            <input type="text" id="namabarang" name="namabarang" placeholder="Item Name">
                            <div class="text">Stock</div>
                            <input type="text" id="stokbarang" name="stokbarang" placeholder="Item Stock">
                            <div class="text">Price</div>
                            <input type="text" id="hargabarang" name="hargabarang" placeholder="Item Price">
                            <div class="text">Color (if multiple color use " and " divider)</div>
                            <input type="text" id="warnabarang" name="warnabarang" placeholder="Item Color">
                            <div class="text">Category</div>
                            <select name="catebarang" id="">
                                <option value="Sneakers">Sneakers</option>
                                <option value="Boots">Boots</option>
                                <option value="Slip-on">Slip-on</option>
                                <option value="Oxford">Oxford</option>
                                <option value="Hiking">Hiking</option>
                                <option value="Wedges">Wedges</option>
                                <option value="High-heels">High-heels</option>
                                <option value="High-Tops">High-Tops</option>
                                <option value="Sandals">Sandals</option>
                                <option value="Sports">Sports</option>
                            </select>
                            <div class="text">Size</div>
                            <div class="wrap2">
                                <input type="checkbox" name="ukuranbarang[]" value="38">38
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
                        </div>
                        <input type="submit" value="Add new item" name="add" id="addbarang">
                    </div>
                </form>
            </div>

        </div>
    </div>
    
    
    <script>
        $(document).ready(function(){

            var open = true;

            $(".hamburger").click(function(){
                if (open){
                    $(".sidebar").animate({
                        left: "-45%"
                    }, { duration: 500 })

                    $(".main").animate({
                        width: "100%",
                        marginLeft: "0%"
                    }, { duration: 500 });
                    open = false;
                }else{
                    $(".sidebar").css("display","block");
                    $(".sidebar").animate({
                        left: "0%"
                    }, { duration: 500},function(){
                        $(".sidebar").css("display","block");
                    });
                    $(".main").animate({
                        width: "65%",
                        marginLeft: "35%"
                    }, { duration: 500});
                    open = true;
                }
            });
        });
    
    </script>
</body>
</html>