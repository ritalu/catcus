<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:100,300,500">
        <title>Store</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="./css/topbar.css" rel="stylesheet">
        <link href="./css/store.css" rel="stylesheet">


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
                        <div class="pet active">
                            <div class="petimg" style="background:url('../../public/img/dog-happy.png') center center no-repeat;background-size:contain"></div>
                            <br><b>Dog</b>
                            <br>500 coins
                            <br>Level 1

                        </div>
                        <div class="pet active">
                            <div class="petimg" style="background:url('../../public/img/fish-happy.png') center center no-repeat;background-size:contain"></div>
                            <br><b>Fish</b>
                            <br>500 coins
                            <br> Level 1
                        </div>
                        <div class="pet active">
                            <div class="petimg" style="background:url('../../public/img/cactus-happy.png') center center no-repeat;background-size:contain"></div>
                            <br><b>Cactus</b>
                            <br>500 coins
                            <br> Level 1
                        </div>
                        <div class="pet active">
                            <div class="petimg" style="background:url('../../public/img/cat-happy.png') center center no-repeat;background-size:contain"></div>
                            <br><b>Cat</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                        <div class="pet active">
                            <div class="petimg" style="background:url('../../public/img/turtle-happy.png') center center no-repeat;background-size:contain"></div>
                            <br><b>Turtle</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                    </div>
                    <div class="itemcontainer hidden">
                        
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br><b>Item Name</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br><b>Item Name</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br><b>Item Name</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br><b>Item Name</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br><b>Item Name</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br><b>Item Name</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br><b>Item Name</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br><b>Item Name</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br><b>Item Name</b>
                            <br>500 coins
                            <br>Level 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br><b>Item Name</b>
                            <br>500 coins
                            <br>Level 1
                            
                        </div>
    

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

                })
                
             });

         </script>

    </body>
</html>
