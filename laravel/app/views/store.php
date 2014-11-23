<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:100,300,500">
        <title>Store</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="./css/topbar.css" rel="stylesheet">
        <link href="./css/store.css" rel="stylesheet">

        <script src="./js/loadStore.js"></script>

    </head>

    <body>
        

        <div class="content">
            <div class="panel">
                <div class="top">
                    <div class="petstore"></div>
                    <div class="objstore inactive"></div>
                </div>
                <div class="stock">
                    <div class="petcontainer">

                    </div>
                    <div class="itemcontainer" style="display:none">
                    
                    </div>
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

        <div class="fullcontainer">
            <div class="actioncontainer">
                <div class="title">Create Pet</div>
                <div class="buypic" style="background:url(./img/dog_happy.png) center center no-repeat;background-size:contain">
                </div>
                <div class="buyform">
                    Name:
                    <input id="petname" required type="text" name="petname" placeholder="Spot" autocomplete="off" >
                    Cost: 500 coins
                </div>
                <div class="buybutton">
                    Create Pet
                </div>

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
                });
                $('.petstore').click(function() {
                    $('.itemcontainer').hide();
                    $('.petcontainer').fadeIn();
                    $('.objstore').addClass('inactive');
                    $('.petstore').removeClass('inactive');
                });
                $('.objstore').click(function() {
                    $('.itemcontainer').fadeIn();
                    $('.petcontainer').hide();
                    $('.petstore').addClass('inactive');
                    $('.objstore').removeClass('inactive');

                });
                loadPets();
                loadObjects();
                
             });

         </script>

    </body>
</html>
