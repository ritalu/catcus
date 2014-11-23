<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:100,300,500">
        <title>Your Pets</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="./css/topbar.css" rel="stylesheet">
        <link href="./css/pets.css" rel="stylesheet">

    </head>

    <body>
        

        <div class="content">
            <div class="panel">
                
                <div class="top">
                    <div class="petlist">
                        <div class="title">Pets</div>
                        <div class="petcontainer" style="background:url('./img/dog-happy.png') center center no-repeat;background-size:contain">
                            <div class="name">Spot</div>
                        </div>
                        <div class="petcontainer" style="background:url('./img/fish-happy.png') center center no-repeat;background-size:contain">
                            <div class="name">Go</div>
                        </div>
                        <div class="petcontainer" style="background:url('./img/cat-happy.png') center center no-repeat;background-size:contain">
                            <div class="name">Spot</div>
                        </div>
                        <div class="petcontainer" style="background:url('./img/dog-happy.png') center center no-repeat;background-size:contain">
                            <div class="name">Spot</div>
                        </div>
                            
                    </div>
                    <div class="petview" style="background:url('./img/background-fishturtle.png') center center no-repeat;background-size:cover;">
                        <div class="petpic"><img src="./img/turtle-happy.png"></div>
                        <div class="petinfo">
                            <table>
                                <tr><td class="d">Name:</td><td>Tuddles</td></tr>
                                <tr><td class="d">Age:</td><td>2 hours</td></tr>
                            </table>
                        </div>
                        <div class="petstats">
                            Hunger:
                            <div class="bar">
                                <div id="full" class="fill"></div>
                                <div class="text">20/120</div>
                            </div>
                            Happiness:
                            <div class="bar">
                                <div id="happy" class="fill"></div>
                                <div class="text">20/120</div>
                            </div>
                            Cleanliness:
                            <div class="bar">
                                <div id="clean" class="fill"></div>
                                <div class="text">20/120</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invent">
                    <div class="itemcontainer">
                        
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item active">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
                        </div>
                        <div class="item">
                            <img src="http://images.neopets.com/items/yellow_glitterbrush.gif">
                            <br>Item Name
                            <br>Qty: 1
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
                })

                
             });

            var counter = 0;
            function movePet() {
                console.log("called");
                //change algorithm eventually
                if ((counter % 6) == 0) {
                    $('.petpic').css( "margin-top", "10px" );
                    $('.petpic').css( "margin-left", "10px" );
                }
                else if ((counter % 6) == 1) {
                    $('.petpic').css( "margin-top", "20px" );
                    $('.petpic').css( "margin-left", "30px" );
                }
                else if ((counter % 6) == 2) {
                    $('.petpic').css( "margin-top", "0px" );
                    $('.petpic').css( "margin-left", "80px" );
                }
                else if ((counter % 6) == 3) {
                    $('.petpic').css( "margin-top", "30px" );
                    $('.petpic').css( "margin-left", "120px" );
                }
                else if ((counter % 6) == 4) {
                    $('.petpic').css( "margin-top", "40px" );
                    $('.petpic').css( "margin-left", "70px" );
                }
                else {
                    $('.petpic').css( "margin-top", "60px" );
                    $('.petpic').css( "margin-left", "40px" );
                }
                counter++;
            }

            window.setInterval(movePet, 1000);

         </script>

    </body>
</html>
