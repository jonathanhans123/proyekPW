<?php
    require_once("../php/koneksi.php");

    if (isset($_REQUEST["login"])){
        $uname = $_REQUEST["uname"];
        $upass = $_REQUEST["upass"];
        if ($uname!=""&&$upass!=""){
            if ($uname!="admin"&&$upass!="admin"){
                $user=$conn->query("SELECT * FROM user WHERE user_name='$uname'")->fetch_assoc();
                if (!empty($user)){
                    $_SESSION["auth"] = $user;
                    header("Location:../php/user.php");
                }else{
                    $_SESSION["error"] = "Account does not exist!";
                }
            }else {
                $_SESSION["admin"] = "admin";
                header("Location:../php/admin.php");
            }
        }else {
            $_SESSION["error"] = "You need to fill everything!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Inc</title>
    <link rel="icon" type="image/x-icon" href="../icon/logo.svg">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../java/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="container-fluid">
        <?php require_once("../php/navbar.php") ?>
        <form action="" method="post">
            <div class="container2">
                <p class="title">Login</p>
                <div class="wrap">
                    <div class="accountinfo">Username</div>
                    <input type="text" name="uname" placeholder="Your Username">
                </div>
                <div class="wrap">
                    <div class="accountinfo">Password</div>
                    <input type="text" name="upass" placeholder="Your Password">
                </div>
                <div class="wrap">
                    <center><p style="color:red;"><?php if (isset($_SESSION["error"])){echo '*'.$_SESSION["error"]; unset($_SESSION["error"]);} ?></p></center>
                </div>
                <div class="wrap">
                    <input type="submit" value="Sign In" name="login">
                </div>
                <div class="wrap">
                    <center>Don't have an account? <a href="../php/register.php ">Register</a> now!</center>
                </div>
            </div>
        </form>
        <?php require_once("../php/footer.php"); ?>
    </div>
</body>
</html>