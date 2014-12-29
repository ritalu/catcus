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
        <title>Sign Up</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="./css/topbar.css" rel="stylesheet">
        <link href="./css/inputs.css" rel="stylesheet">

        <script src="./js/loadTopbar.js"></script>

    </head>

    <body>
        

        <div class="content">
            <div class="panel">
                
                    <h1>Sign Up</h1>
                    <br>
                    <form name="create" method="get">
                    Username: <input type="text" name="username"><br>
                    Password: <input type="password" name="password"> <br> 
                    Email: <input type="text" name="email"> <br><br>
                      <div class="error">
                    </div>
                    <input type="submit" value="Submit">
                    </form>
                                       
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
                    loadTopbar("./api/users/" + <?php echo json_encode($username)?>);
                <?php
                    }
                ?>

                $('form').submit(function(e){
                    var pass = encrypt();
                    var user = document.forms["create"]["username"].value;
                    var em = document.forms["create"]["email"].value;
                    // input validation here
                    if (pass.length == 0)
                    {
                        $('.error').html("Password cannot be empty.");
                        e.preventDefault();
                        return;
                    }
                    if (user.length == 0)
                    {
                        $('.error').html("Username cannot be empty.");
                        e.preventDefault(); 
                        return;
                    }
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    var emailIsValid = regex.test(email);
                    if (!emailIsValid)
                    {
                        e.preventDefault(); 
                        $('.error').html("Invalid email format.");
                        return;
                    }
                    $.post('./api/users/save', 
                    {
                        username : user,
                        password : pass,
                        email : em
                    },
                    function(response) {
                        if (response == "success")
                        {
                            window.location = './login';
                        }
                        else 
                        {

                            document.forms["create"]["username"].value = "";
                            document.forms["create"]["password"].value = "";
                            document.forms["create"]["email"].value = "";
                            $('.error').html(response);
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
