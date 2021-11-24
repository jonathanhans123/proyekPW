<?php
    require_once("koneksi.php");

    if (isset($_REQUEST["auth"])){

    }else{
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        require_once
        <h1>Welcome, <?php echo $_SESSION["auth"]["user_name"];?></h1>
    </div>
    
</body>
</html>