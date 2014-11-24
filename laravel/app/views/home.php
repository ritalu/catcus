<?php 

if(isset($_COOKIE['username']) && !empty(isset($_COOKIE['username']))){
    echo $_COOKIE['username'];
}else{
    echo "not logged in";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:100,300">
        <title>Home</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="/css/topbar.css" rel="stylesheet">
        <link href="/css/home.css" rel="stylesheet">

    </head>

    <body>
        

        <div class="content">
            <div class="center">
                <div class="welcome"></div>
                <div class="links">
                    <a href="/pets">Pets</a>
                    <a href="/store">Store</a>
                    <a href="/settings">Settings</a>
                </div>
            </div>
        </div>



        <div class="menu hidden">
            <a href="/pets">pets</a>
            <a href="/store">store</a>
            <a href="/profile">profile</a>
            <a href="/settings">settings</a>
        </div>
        <div class="topbar">
            <div class="downarrow">
               <div class="line1"></div>
               <div class="line2"></div>
            </div>
            <div class="userinfo">
                <a href="/profile/username">username</a>
                <a href="/store">125 coins</a>
            </div>
            <a href="/profile/username">
                <div class="profile" style="background:url(http://exmoorpet.com/wp-content/uploads/2012/08/cat.png) center center no-repeat white; background-size:cover"></div>
            </a>

            <div class="level">17</div>
            <div class="expbar">
                <div class="fill"></div>
                <div class="text">EXP: 20/120</div>
            </div>
        </div>

        <script type="text/javascript">
        //jquery!
            $(function() {
                $(".downarrow").click(function() {
                    if ($(".downarrow").hasClass("up")) {
                        $(".downarrow").removeClass("up");
                        $('.menu').addClass("hidden");
                    } else {
                        $(".downarrow").addClass("up");
                        $('.menu').removeClass("hidden");
                    }
                });
                $(".content").click(function() {
                    if ($(".downarrow").hasClass("up")) {
                        $(".downarrow").removeClass("up");
                        $('.menu').addClass("hidden");
                    } 
                })
             });
         </script>

    </body>
</html>
