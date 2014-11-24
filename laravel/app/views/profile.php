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
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,500">
        <title>Profile</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="../css/topbar.css" rel="stylesheet">
        <link href="../css/profile.css" rel="stylesheet">
        <script src="../js/loadTopbar.js"></script>
        <script src="../js/loadUser.js"></script>
    </head>

    <body>
        

        <div class="content">
            <div class="profpic"></div>

            <div class="panel">
                
                <h1>USERNAME</h1>
                <h2>LEVEL</h2>

                                    
            </div>
        </div>



       <?php
        include 'topbar.php';
        ?>


        <script type="text/javascript">
        //jquery!
            $(function() {
                <?php
                    $user = substr($_SERVER['REQUEST_URI'], 9, strlen($_SERVER['REQUEST_URI']));
                    if ($loggedIn) {
                ?>
                    loadTopbar("../api/users/" + <?php echo json_encode($username)?>);

                    loadUser(<?php echo json_encode($user)?>);
                <?php
                    } else {
                ?>
                    window.location = "./";
                <?php
                    }
                ?>
                
             });


         </script>

    </body>
</html>
