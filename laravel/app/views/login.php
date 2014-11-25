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
        <title>Login</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="./css/topbar.css" rel="stylesheet">
        <link href="./css/inputs.css" rel="stylesheet">
        <script src="./js/loadTopbar.js"></script>

    </head>

    <body>
        

        <div class="content">
            <div class="panel">
                
                <div class="top">
                    <h1>Login</h1>
                    <br>
                    <form name="login" method="get">
                    Username: <input type="text" name="username"><br>
                    Password: <input type="password" name="password"> <br> <br>
                     <div class="error">
                    </div>
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

                $('form').submit(function(){
                    var pass = encrypt();
                    var user = document.forms["login"]["username"].value;
                    $.get('./api/users/login?username=' + user + '&password=' + pass, 
                        function(response) {
                        console.log(response);
                        if (response != "success")
                        {
                            console.log(response);
                            $('.error').html(response);
                            //window.location = './login';
                        }
                        else 
                        {
                            console.log('loggedin');
                            window.location = './';                       
                        }

                    });
                    return false;
                  });
                <?php
                    if ($loggedIn) {
                ?>
                    loadTopbar(<?php echo json_encode($username)?>);
                <?php
                    }
                ?>
                
             });

            function encrypt() {
                var password = document.forms["login"]["password"].value;
                
                var encryptedPass = "";

                for (i = 0; i < password.length; i++) {
                    encryptedPass = encryptedPass + String.fromCharCode(password.charCodeAt(i) + 2 % 26);
                }
                return encryptedPass;
            }
         </script>

    </body>
</html>
