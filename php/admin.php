<?php 
    require_once("koneksi.php"); 

    if (!isset($_SESSION["admin"])){
        header("Location:login.php");
    }

    if (isset($_POST["logout"])){
        unset($_SESSION["admin"]);
        header("Location:index.php");
    }
    $today = date('Y-m-d',(strtotime ( '-7 day' , strtotime ( date("Y-m-d")) ) ));
    $lastweek = date('Y-m-d',(strtotime ( '-14 day' , strtotime ( date("Y-m-d")) ) ));
    $orders = $conn->query("SELECT * FROM `order`")->fetch_all(MYSQLI_ASSOC);
    $totalrevenue = 0;
    $totalrevenue2 = 0;
    $totalquantity = 0;
    $totalquantity2 = 0;
    $solditem = [];
    $overallrevenue = 0;
    $overallorder = 0;
    foreach($orders as $key=>$value){
        if (strtotime($value["tanggal_order"])>=strtotime($today)){
            $totalrevenue += $value["harga_total"];
            $temp = $value["id_order"];
            $item = $conn->query("SELECT DISTINCT `id_item` FROM `ordered_item` WHERE `id_order`='$temp'")->fetch_all(MYSQLI_ASSOC);
            foreach($item as $key=>$value){
                array_push($solditem,$value["id_item"]);
            }
            $total = $conn->query("SELECT SUM(`quantity`) as TOTAL FROM `ordered_item` WHERE `id_order`='$temp'")->fetch_assoc();
            $totalquantity += $total["TOTAL"];
        }
        $overallorder++;
        $overallrevenue += $value["harga_total"];
    }
    foreach($orders as $key=>$value){
        if (strtotime($value["tanggal_order"])<strtotime($today)&&strtotime($value["tanggal_order"])>=strtotime($lastweek)){
            $totalrevenue2 += $value["harga_total"];
            $temp = $value["id_order"];
            $total = $conn->query("SELECT SUM(`quantity`) as TOTAL FROM  `ordered_item` WHERE `id_order`='$temp'")->fetch_assoc();
            $totalquantity2 += $total["TOTAL"];
        }
    }
    if ($totalrevenue2!=0){
        $percentrevenue = ($totalrevenue/$totalrevenue2*100)-100;
    }else{
        $percentrevenue = 999;
    }
    if ($totalquantity2!=0){
        $percentquantity = ($totalquantity/$totalquantity2*100)-100;
    }else{
        $percentquantity= 999;
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
                <div class="kotak mx-6" style="overflow-y:scroll;">
                    <div class="title" style="margin-top:20px;margin-left:3%;font-size:14pt;">TOP SELLER</div>
                    <?php 
                    if (empty($solditem)){
                        echo '<div class="wrap" style="margin-top:20px;margin-left:3%;">No top seller this week</div>';
                    }else{
                        foreach($solditem as $key=>$value){
                            $item = $conn->query("SELECT * FROM item where id_item='$value'")->fetch_assoc();
                            $imageurl = explode(",",$item["imageurl"]);
                            echo '<div class="wrap" style="display:flex;justify-content:left;margin-top:20px;margin-left:3%;align-items:center;">
                            <img src="'.$imageurl[0].'" style="width:100px;height:100px;">
                            <b>'.$item["item_nama"].'</b>
                        </div>';
                        }
                    }
                    ?>
                </div>
                <div class="kotak mx-3 kecil">
                    <p class="title">Revenue</p>
                    <p class="result">Rp. <?php echo number_format($totalrevenue); ?></p>
                    <p class="percent"<?php 
                    if ($percentrevenue>0){
                        echo ' style="color:lightgreen;">'.$percentrevenue; 
                    }else{
                        echo ' style="color:red;">'.$percentrevenue; 
                    }
                    ?>   %</p>
                    <p class="time">Since Last Week</p>
                </div>
                <div class="kotak mx-3 kecil">
                    <p class="title">Orders</p>
                    <p class="result"><?php echo $totalquantity; ?></p>
                    <p class="percent"<?php if ($percentquantity>0){
                        echo ' style="color:lightgreen;">'.$percentquantity; 
                    }else{
                        echo ' style="color:red;">'.$percentquantity; 
                    }?>% </p>
                    <p class="time">Since Last Week</p>
                </div>
                
                <div class="kotak mx-3 kecil">
                    <p class="title">Revenue</p>
                    <p class="result">Rp. <?php echo number_format($overallrevenue); ?></p>
                    
                    <p class="time">Overall</p>
                </div>
                <div class="kotak mx-3 kecil">
                    <p class="title">Orders</p>
                    <p class="result"><?php echo $overallorder; ?></p>
                    
                    <p class="time">Overall</p>
                </div>
            </div>
            
        </div>
    </div>
    
    
    <script>
        $(document).ready(function(){

            var open = true;

            $(".hamburger").click(function(){
                if (open){
                    $(".sidebar").animate({
                        left: "-35%"
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