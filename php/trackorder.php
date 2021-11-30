<?php
    require_once("koneksi.php");
    if (!isset($_REQUEST["track"])){
        header("Location:../php/user.php");
    }
    $id_order = $_REQUEST["index"];
    $order = $conn->query("SELECT * FROM `order` where id_order='$id_order'")->fetch_assoc();
    $ordered_item = $conn->query("SELECT * FROM `ordered_item` where id_order='$id_order'")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/trackorder.css">
    <script src="../java/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid">
        <?php require_once("navbar.php"); ?>

        <div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6>Order ID: <?php echo $id_order; ?></h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php echo date("d-M-Y",strtotime("+3 day",strtotime($order["tanggal_order"]))); ?> </div>
                    <div class="col"> <strong>Status:</strong> <br> 
                    <?php
                        if ($order["status"]=="Pending"){
                            echo 'Order waiting to be confirmed';
                        }else if ($order["status"]=="Confirmed"){
                            echo 'Order is Confirmed';
                        }else if ($order["status"]=="Sent"){
                            echo 'Order is being sent';
                        }
                        else if ($order["status"]=="Finished"){
                            echo 'Finished';
                        }
                    ?> </div>
                    <div class="col"> <strong>ORDER ID:</strong> <br> <?php echo $order["id_order"] ?> </div>
                </div>
            </article>
            <div class="track">
                <?php
                    if ($order["status"]=="Pending"){
                        echo '<div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>';
                    }else if ($order["status"]=="Confirmed"){
                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>';
                    }else if ($order["status"]=="Sent"){
                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>';
                    }
                    else if ($order["status"]=="Finished"){
                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>';
                    }
                ?>
                
            </div>
            <hr>
            <ul class="row">
                <?php
                    if ($order["status"]=="Pending"){
                        echo '<li>Your order is being confirmed.</li>';
                    }else if ($order["status"]=="Confirmed"){
                        echo '<li>Your order is being confirmed.</li>
                        <li>Your order is confirmed.</li>';
                    }else if ($order["status"]=="Sent"){
                        echo '<li>Your order is being confirmed.</li>
                        <li>Your order is confirmed.</li>
                        <li>Order is picked up by our courier and is on the way.</li>';
                    }
                    else if ($order["status"]=="Finished"){
                        echo '<li>Your order is being confirmed.</li>
                        <li>Your order is confirmed.</li>
                        <li>Order is picked up by our courier and is on the way.</li>
                        <li>Order is received by customer.</li>';
                    }

                ?>
            </ul>
            <div class="wrap">
                <form action="orderdetail.php" method="post">
                <input type="submit" value="Back to order" name="detail">
                <input type="hidden" name="index" value="<?php echo $id_order; ?>">
                </form>
            </div>
        </div>
    </article>
</div>
    </div>
    <?php require_once("footer.php"); ?>
</body>
</html>