<?php 
    require_once("koneksi.php"); 

    if (!isset($_SESSION["admin"])){
        header("Location:login.php");
    }

    if (isset($_POST["logout"])){
        unset($_SESSION["admin"]);
        header("Location:index.php");
    }
    if (isset($_REQUEST["update"])){
        $id_order = $_REQUEST["index"];
        $order = $conn->query("SELECT * FROM `order` where id_order='$id_order'")->fetch_assoc();
        $update = "";
        if ($order["status"]=="Pending"){
            $update = "Confirmed";
            $stmt = $conn->prepare("UPDATE `order` SET status=? where id_order=?");
            $stmt->bind_param("ss",$update,$id_order);
            $stmt->execute();
        }else if ($order["status"]=="Confirmed"){
            $update = "Sent";
            $stmt = $conn->prepare("UPDATE `order` SET status=? where id_order=?");
            $stmt->bind_param("ss",$update,$id_order);
            $stmt->execute();
        }else if ($order["status"]=="Sent"){
            $update = "Finished";
            $stmt = $conn->prepare("UPDATE `order` SET status=? where id_order=?");
            $stmt->bind_param("ss",$update,$id_order);
            $stmt->execute();
        }else if ($order["status"]=="Finished"){
            echo '<script>alert("This order is finished");</script>';
        }
    }
    $orders = $conn->query("SELECT * FROM `order`")->fetch_all(MYSQLI_ASSOC);
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
                <?php
                
                    foreach($orders as $key=>$value){
            
                        echo '<div class="kotakdisc">
                        
                        <strong>'.$value["id_order"].'</strong>
                        <p class="text">Status : '.$value["status"].'
                        <form action="" method="post" style="margin-right:5%;">
                        <input type="submit" value="Update order" name="update">
                        <input type="hidden" name="index" value="'.$value["id_order"].'">
                        </form>';

                    echo '</div>';
                    }
                ?>
                
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