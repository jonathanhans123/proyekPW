<?php
    require_once("koneksi.php");
    if (!isset($_REQUEST["detail"])){
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/orderdetail.css">
    <script src="../java/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid">
        <?php require_once("navbar.php"); ?>

        <div class="info">
            <p>Order Placed <br><strong><?php echo date("d-M-Y",strtotime($order["tanggal_order"])); ?></strong></p>
            <p>Status <br><strong><?php echo $order["status"]; ?></strong></p>
            <p>Total <br><strong>Rp. <?php echo number_format($order["harga_total"],2); ?>,-</strong></p>
            <p>Shipment <br><strong><?php echo $order["address"]; ?></strong></p>
            <p>Order ID <br><strong><?php echo $order["id_order"]; ?></strong></p>
        </div>
        <table>
            <tr>
                <td>Item ID</td>
                <td>Item Name</td>
                <td>Quantity</td>
                <td>Size</td>
                <td>Price</td>
                <?php
                if ($order["status"]=="Finished"){
                    echo '<td>Action</td>';
                }
                ?>
            </tr>
            <?php
            foreach($ordered_item as $key=>$value){
                $temp = $value["id_item"];
                $item = $conn->query("select * from item where id_item=$temp")->fetch_assoc();
                $item_name = str_replace(' ','+',$item["item_nama"]);
                $item_color = str_replace(' ','+',$item["item_color"]);
                
                echo '<tr>
                <td>ITEM'.$value["id_item"].'</td>
                <td>'.$item["item_nama"].'</td>
                <td>'.$value["quantity"].'</td>
                <td>'.$value["item_size"].'</td>
                <td>'.$value["item_price"].'</td>';
                if ($order["status"]=="Finished"){
                    echo '<td><a href="../php/productpage.php?item_name='.$item_name.'&item_color='.$item_color.'"><input type="submit" value="Review" id="review"></a></td>';
                }
            echo '</tr>';
            }
            ?>
        </table>
        <div class="wrap">
            <form action="trackorder.php" method="post">
                <input type="hidden" name="index" value="<?php echo $id_order; ?>">
                <input type="submit" value="Track Order" name="track">
            </form>
            <form action="user.php" method="post">
                <input type="submit" value="Back to Order History">
            </form>
        </div>
    </div>
    <?php require_once("footer.php"); ?>
    <script>
        $(document).ready(function () {
            $(document).on("click",".review", function () {
                
            });
        });
    </script>
</body>
</html>