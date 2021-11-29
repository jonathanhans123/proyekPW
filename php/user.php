<?php
    require_once("koneksi.php");

    if (isset($_SESSION["auth"])){

    }else{
        header("Location:../php/login.php");
    }
    if (isset($_REQUEST["logout"])){
        unset($_SESSION["auth"]);
        header("Location:index.php");
    }
    $orders = $conn->query("SELECT * FROM `order`")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/user.css">
    <script src="../java/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid">
        <?php require_once("navbar.php"); ?>
        <div class="wrapper">
            <center><h1 style="margin-top:3%;">Welcome, <?php echo $_SESSION["auth"]["user_name"];?></h1></center>

            <form action="" method="post">
                <input type="submit" value="Logout" name="logout" class="logout">
            </form>
            <center><h2>Order History</h2></center>
            <div class="container-order">
                <div class="wrapper1"><p style="font-weight:bold;">Order No.</p><p style="font-weight:bold;">Amount</p><p style="font-weight:bold;">Order Date</p><p style="font-weight:bold;">Status</p><p style="font-weight:bold;">See Detail</p></div>
                <hr>
                <?php
                foreach ($orders as $key=>$value){
                    echo '<div class="wrapper1">
                    <p>'.$value["id_order"].'</p>
                    <p>Rp. '.number_format($value["harga_total"],2).',-</p>
                    <p>'.date("l,d M Y",strtotime($value["tanggal_order"])).'</p>
                    <p>'.$value["status"].'</p>

                        <form action="../php/orderdetail.php" method="post" class="formdetail">
                            <input type="submit" value="Detail" name="detail">  
                            <input type="hidden" name="index" value="'.$value["id_order"].'">
                        </form>
                        </div>
                    <hr>';
                }   
                
                ?>

    
            </div>
        </div>
        <?php require_once("footer.php"); ?>
    </div>
    
    
</body>
</html>