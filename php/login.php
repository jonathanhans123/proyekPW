<?php
    require_once("../php/koneksi.php");

    if (isset($_REQUEST["login"])){
        $uname = $_REQUEST["uname"];
        $upass = $_REQUEST["upass"];
        if ($uname!=""&&$upass!=""){
            if ($uname!="admin"&&$upass!="admin"){
                $exist = false;
                $user=$conn->query("SELECT * FROM user WHERE user_name='$uname'")->fetch_assoc();
                if (isset($user)){
                    $_SESSION["auth"] = $user;
                    header("Location:../php/user.php");
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
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
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
                    <input type="submit" value="Sign In" name="login">
                </div>
                <div class="wrap">
                    <center>Don't have an account? <a href="../php/register.php ">Register</a> now!</center>
                </div>
            </div>
        </form>
        <?php require_once("../php/footer.php") ?>
    </div>
</body>
</html>