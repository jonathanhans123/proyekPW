$(document).ready(function(){
    $jumboindex = 1;
    $('.left').click(leftclick);
    $('.right').click(rightclick);
    $('.category').mouseenter(function () { 
        $('.categories-text').css("text-decoration","underline");
    });
    $('.cate-wrap').mouseleave(function () { 
        $('.categories-text').css("text-decoration","none");
    });
    $('.loginicon').click(function(){
        
    })
    function leftclick(){
        $jumboindex--;
        if ($jumboindex % 2 == 1){
            console.log("jfiwoej");
            $(".jumbotron").animate({
                opacity: "0.4"
            },500,function(){
                $(".jumbotron").css("background-image","url('../images/jumbo1.jpg')");
                $(".jumbotron").animate({
                    opacity: "1"
                },500,function(){
                });
            });
        }else{
            $(".jumbotron").animate({
                opacity: "0.4"
            },500,function(){
                $(".jumbotron").css("background-image","url('../images/jumbo2.jpg')");
                $(".jumbotron").animate({
                    opacity: "1"
                },500,function(){
                });
            });
        }
    }
    function rightclick(){
        $jumboindex++;
        if ($jumboindex % 2 == 1){
            console.log("jfiwoej");
            $(".jumbotron").animate({
                opacity: "0.4"
            },500,function(){
                $(".jumbotron").css("background-image","url('../images/jumbo1.jpg')");
                $(".jumbotron").animate({
                    opacity: "1"
                },500,function(){
                });
            });
        }else{
            $(".jumbotron").animate({
                opacity: "0.4"
            },500,function(){
                $(".jumbotron").css("background-image","url('../images/jumbo2.jpg')");
                $(".jumbotron").animate({
                    opacity: "1"
                },500,function(){
                });
            });
        }
    }
});
