<?php
    require_once("../php/koneksi.php");

    if (isset($_REQUEST["register"])){
        $uname = $_REQUEST["uname"];
        $upass = $_REQUEST["upass"];
        $cpass = $_REQUEST["cpass"];
        $email = $_REQUEST["email"];
        $phone = $_REQUEST["phone"];
        if ($uname!=""&&$upass!=""&&$cpass!=""&&$email!=""&&$phone!=""&&$uname!="admin"){
            if ($upass==$cpass){
                $exist = false;
                $stmt = $conn->query("SELECT * FROM user WHERE user_email='$email' and user_name='$uname'");
                if (mysqli_num_rows($stmt)>0){
                    $exist = true;
                }
                if (!$exist){
                    $stmt = $conn->prepare("INSERT INTO user(user_name,user_password,user_email,user_phone) VALUES(?,?,?,?)");
                    $stmt->bind_param("ssss",$uname,$upass,$email,$phone);
                    $result =$stmt->execute();
                    if ($result){
                        header("Location:../php/login.php");
                    }else{
                        $_SESSION["error"] = "Error add ke Database!";
                    }
                }else {
                    $_SESSION["error"] = "Another account with the same name or email already exist!";
                }
            }else{
                $_SESSION["error"] = "Password and Confirm Password must be the same!";
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="container-fluid">
        <?php require_once("../php/navbar.php") ?>
        <form action="" method="post">
        <div class="container2">
            <p class="title">Create Account</p>
            <div class="wrap">
                <div class="accountinfo">Username</div>
                <input type="text" name="uname" placeholder="Your Username">
            </div>
            <div class="wrap">
                <div class="accountinfo">Password</div>
                <input type="text" name="upass" placeholder="Your Password">
            </div>
            <div class="wrap">
                <div class="accountinfo">Confirm Password</div>
                <input type="text" name="cpass" placeholder="Confirm Your Password">
            </div>
            <div class="wrap">
                <div class="accountinfo">Email</div>
                <input type="text" name="email" placeholder="example@gmail.com">
            </div>
            <div class="wrap">
                <div class="accountinfo">Phone</div>
                <input type="text" name="phone" placeholder="+628123456789">
            </div>
            <div class="wrap">
                <center><p style="color:red;"><?php if (isset($_SESSION["error"])){echo '*'.$_SESSION["error"]; unset($_SESSION["error"]);} ?></p></center>
            </div>
            <div class="wrap">
                <input type="submit" value="Sign Up" name="register">
            </div>
            <div class="wrap">
                <center>Already have an account? <a href="../php/login.php">Sign in</a> now!</center>
            </div>
        </div>
        </form>
        <?php require_once("../php/footer.php") ?>
    </div>
</body>
</html>