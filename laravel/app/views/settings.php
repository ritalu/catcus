<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:100,300,500">
        <title>Settings</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="./css/topbar.css" rel="stylesheet">
        <link href="./css/pets.css" rel="stylesheet">
        <script src="./js/loadTopbar.js"></script>

    </head>

    <body>
        

        <div class="content">
            <div class="panel">
                
                <div class="top">
                    <hr>
                    <h1>Update User Settings</h1>
                    <hr><br>
                    <form name="create" method="get">
                    Password: <input type="password" name="password"> <br> 
                    Email: <input type="text" name="email"> <br>
                    Profile Image URL: <input type="text" name="picture"> <br> <br>
                    <input type="submit" value="Submit">
                    </form>
                                       
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
                loadTopbar();

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
                    o.username = 'ritalu';
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
