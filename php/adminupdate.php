<?php 
    require_once("koneksi.php"); 
    
    $items = $conn->query("select * from item")->fetch_all(MYSQLI_ASSOC);


    if (!isset($_SESSION["admin"])){
        header("Location:login.php");
    }

    if (isset($_POST["logout"])){
        unset($_SESSION["admin"]);
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        </div>
        <div class="main">
            <div class="navbar">
                <div class="hamburger">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hamicon" x="0px" y="0px"
                    width="40" height="40"
                    viewBox="0 0 24 24"
                    style=" fill:rgb(80, 80, 80);"><path d="M 2 5 L 2 7 L 22 7 L 22 5 L 2 5 z M 2 11 L 2 13 L 22 13 L 22 11 L 2 11 z M 2 17 L 2 19 L 22 19 L 22 17 L 2 17 z"></path></svg>
                </div>
                <div class="nav">
                    Admin Panel
                </div>
            </div>
            <div class="container2">
                <?php
                    foreach($items as $key=>$value){
                        if (strlen($value["item_desc"])>100){
                            $desc = substr($value["item_desc"],0,100) . "...";
                        }else{
                            $desc = $value["item_desc"];
                        }
                        echo '<div class="kotakitem">
                        <strong>'.$value["item_nama"].'</strong>
                        <p class="text">'.$desc.'</p>
                        <p class="textbutton">Update</p></div>';
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
                        left: "-15%"
                    }, { duration: 500 },)

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
                        width: "85%",
                        marginLeft: "15%"
                    }, { duration: 500});
                    open = true;
                }
            });
            $(document).on("click",".textbutton",function(){
                var item_nama = $(this).parent().children().first().html();
                $.ajax({
                    type:"post",
                    url:"controller.php",
                    data:{
                        'action':'update',
                        'item_nama':item_nama
                    },
                    success:function(response){
                        $(".container2").append(response);
                    }
                });
            });
        });
    </script>
</body>
</html>