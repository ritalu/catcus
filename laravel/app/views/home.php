<?php 

$username = "";
$loggedIn = false;

if (Cookie::get('username') !== null) {
    $username = Cookie::get('username');
    $loggedIn = true;
};

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
        <script src="./js/loadTopbar.js"></script>

    </head>

    <body>
        

        <div class="content">
            <div class="center">
                <div class="welcome"></div>
                <div class="links">
                    <?php 
                        if ($loggedIn) {
                    ?>
                            <a href="/pets">Pets</a>
                            <a href="/store">Store</a>
                            <a href="/settings">Settings</a>

                    <?php
                        } else {

                    ?>
                            <a href="/login">Login</a>
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>


        <?php 
            if ($loggedIn) {
        ?>
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
        ?>
        <?php 
            } else {
                echo "<div class='topbar'></div>";
            }
        ?>

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
                <?php
                    if ($loggedIn) {
                        echo "loadTopbar($username)";
                    }
                ?>
             });
         </script>

    </body>
</html>
