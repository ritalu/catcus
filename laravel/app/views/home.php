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
        include 'topbar.php';
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
                ?>
                    loadTopbar(<?php echo json_encode($username)?>);
                <?php
                    }
                ?>

             });
         </script>

    </body>
</html>
