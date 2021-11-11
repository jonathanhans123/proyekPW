<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
    <script src="../java/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="nav-bold">Home</div>
            <div class="nav">Daily Report</div>
            <div class="nav">Weekly Report</div>
            <div class="nav">Overall</div>
            <div class="nav-bold">E-commerce</div>
            <div class="nav">Add new products</div>
            <div class="nav">Update products</div>
            <div class="nav">Delete products</div>
        </div>
        <div class="main">
            <div class="navbar">
                <div class="hamburger">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hamicon" x="0px" y="0px"
                    width="40" height="40"
                    viewBox="0 0 24 24"
                    style=" fill:rgb(80, 80, 80);"><path d="M 2 5 L 2 7 L 22 7 L 22 5 L 2 5 z M 2 11 L 2 13 L 22 13 L 22 11 L 2 11 z M 2 17 L 2 19 L 22 19 L 22 17 L 2 17 z"></path></svg>
                </div>
                <p class="title">Daily Report</p>
                <div class="nav">
                    Admin Panel
                </div>
            </div>
            <div class="kotak mx-6">
                
            </div>
            <div class="kotak mx-3 kecil">
                <p class="title">Revenue</p>
                <p class="result">Rp. 11024</p>
                <p class="percent">10.5% </p>
                <p class="time">Since Yesterday</p>
            </div>
            <div class="kotak mx-3 kecil">
                <p class="title">Visitors</p>
                <p class="result">1214</p>
                <p class="percent">5.5% </p>
                <p class="time">Since Yesterday</p>
            </div>
            <div class="kotak mx-3 kecil">
                <p class="title">Orders</p>
                <p class="result">100</p>
                <p class="percent">100.5% </p>
                <p class="time">Since Yesterday</p>
            </div>
            <div class="kotak mx-3 kecil">
                <p class="title">Time Visited</p>
                <p class="result">102 hours</p>
                <p class="percent">5.5% </p>
                <p class="time">Since Yesterday</p>
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
            $(document).on("click",".nav",function(){
                $(".navbar .title").html($(this).html());
            });
        });
    </script>
</body>
</html>