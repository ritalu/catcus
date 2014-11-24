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
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:100,300,500">
        <title>Settings</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="./css/topbar.css" rel="stylesheet">
        <link href="./css/inputs.css" rel="stylesheet">
        <script src="./js/loadTopbar.js"></script>

    </head>

    <body>
        

        <div class="content">
            <div class="panel">
                
                <div class="top">
                    <h1>Settings</h1>
                    <br>
                    <form name="create" method="get">
                    Change Password: <input type="password" name="password"> <br> 
                    Change Email: <input type="text" name="email"> <br>
                    Profile Image (URL): <input type="text" name="picture"> <br> <br>
                    <input type="submit" value="Submit">
                    </form>
                                       
                </div>

            </div>
        </div>



       <?php
        include 'topbar.php';
        ?>


        <script type="text/javascript">
        //jquery!
            $(function() {
                <?php
                    if ($loggedIn) {
                ?>
                    loadTopbar(<?php echo json_encode($username)?>);
                <?php
                    } else {
                ?>
                    window.location = "./";
                <?php
                    }
                ?>

                $('form').submit(function(){
                    var o = new Object();
                    if (document.forms["create"]["password"].value != "")
                    {
                        var pass = encrypt();
                        o.password = pass;                       
                    }
                    if (document.forms["create"]["picture"].value != "")
                    {
                        var p = document.forms["create"]["picture"].value;
                        o.picture = p;                       
                    }
                    if (document.forms["create"]["email"].value != "")
                    {
                        var em = document.forms["create"]["email"].value;
                        o.email = em;                       
                    }
                    o.username = <?php echo json_encode($username)?>;
                    $.post('./api/users/update/', 
                        o,
                    function(response) {
                        if (response == "success")
                        {
                            window.location = './';
                        }
                        else 
                        {
                            window.location = './settings';                       
                        }

                    });
                    return false;
                  });
                
             });

            function encrypt() {
                var password = document.forms["create"]["password"].value;
                
                var encryptedPass = "";

                for (i = 0; i < password.length; i++) {
                    encryptedPass = encryptedPass + String.fromCharCode(password.charCodeAt(i) + 2 % 26);
                }
                return encryptedPass;
            }
         </script>

    </body>
</html>
