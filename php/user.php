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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container-fluid">
        <?php require_once("navbar.php"); ?>
        <h1>Welcome, <?php echo $_SESSION["auth"]["user_name"];?></h1>

        <form action="" method="post">
            <input type="submit" value="Logout" name="logout">
        </form>
    </div>
    
    
</body>
</html>