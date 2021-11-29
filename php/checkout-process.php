<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

require_once '../midtrans/Midtrans.php';
require_once("koneksi.php");
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-NMVGX2Rc1aiDP37T7ABu93tq';
Config::$clientKey = 'SB-Mid-client-CAcpC230ptHYx8Z1';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;

// Enable sanitization
Config::$isSanitized = true;

// Enable 3D-Secure
Config::$is3ds = true;

// Uncomment for append and override notification URL
// Config::$appendNotifUrl = "https://example.com";
// Config::$overrideNotifUrl = "https://example.com";

// Optional
$item_details = array ();

// Optional
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
    $array = array(
        "id" => $temp,
        "price" => $truevalue,
        "quantity" => $value["quantity"],
        "name" => $item["item_nama"]
    );
    array_push($item_details,$array);
}
$total = 0;
$orders = $conn->query("select * from `order`")->fetch_all(MYSQLI_ASSOC);
$count = count($orders);
foreach($item_details as $key=>$value){
    $total += $value["price"]*$value["quantity"];
}

$transaction_details = array(
    'order_id' => "ORDER".$count,
    'gross_amount' => $total
);

// Optional
$shipping_address = $_SESSION["shipping_address"];

// Optional
$customer_details = $_SESSION["customer_details"];

// Optional, remove this to display all available payment methods
$enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');

// Fill transaction details
$transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}

echo "snapToken = ".$snap_token;

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
        die();
    } 
}

?>

<!DOCTYPE html>
<html>
    <body>
        <button id="pay-button">Pay!</button>
        <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> 

        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
        <script src="../java/jquery.min.js"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snap_token?>', {
                    // Optional
                    onSuccess: function(result){
                        $.ajax({
                            type:"POST",
                            url:"controller.php",
                            data:{
                                'action':'payment'
                            },
                            success:function(response){
                                window.location.href = "../php/user.php";
                            }
                        });
                    },
                    // Optional
                    onPending: function(result){
                        
                    },
                    // Optional
                    onError: function(result){
                        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script>
    </body>
</html>
