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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
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