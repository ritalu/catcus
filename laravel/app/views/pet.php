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
        <title>Your Pets</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="./css/topbar.css" rel="stylesheet">
        <link href="./css/pets.css" rel="stylesheet">
        <script src="./js/loadPets.js"></script>
        <script src="./js/loadTopbar.js"></script>

    </head>

    <body>
        

        <div class="content">
            <div class="panel">
                
                <div class="top">
                    <div class="petlist">
                    
                            
                    </div>
                    <div class="petview" style="background:url(http://catcus.me/img/background_cactus.png) center center no-repeat;background-size:cover;">
                        <div class="petpic"></div>
                        <div class="petinfo">
                            <table>
                                <tr><td>Name:</td><td class="petname"></td></tr>
                                <tr><td>Age:</td><td class="petage"></td></tr>
                            </table>
                        </div>
                        <div class="petstats">

                        </div>
                    </div>
                </div>
                <div class="invent">
                    <div class="itemcontainer">
                        
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'topbar.php';
        ?>

        <div class="fullcontainer" style="display:none">
        </div>
        <div class="objactioncontainer hidden">
            <div class="objpic" style="background:url(./img/dog_happy.png) center center no-repeat;background-size:contain">
            </div>
            <div class="useform">
                <div class="objtype">Item</div>
                <span class="objuseneed">Fullness</span> +
                <span class="objfulfillment">Amount</span>
                <div class="objqty">unlimited</div>
            </div>
            <div class="bottomwrap">
                <div class="objusebutton">Use Item</div>
                <div class="objownedID" style="display:none">
            </div>
        </div>

        <script type="text/javascript">
        //jquery!
            $(function() {
                 <?php
                    if ($loggedIn) {
                ?>

                $(document).keyup(function(e){

                    if(e.keyCode === 27) {
                        $('.fullcontainer').fadeOut();
                        $('.objactioncontainer').addClass('hidden');
                    }
                });

                $('.fullcontainer').click(function() {
                    $('.fullcontainer').fadeOut();
                    $('.objactioncontainer').addClass('hidden');
                });
                
                $('.objusebutton').click(function() {
                    var objectsownedID = $('.objownedID').html();
                    var petID = $('#activePetID').val();
                    $.ajax({//initial ajax call 
                        type:"GET",
                        url:"./api/objects/use",
                        data: {petID: petID, objectsownedID: objectsownedID},
                        success: function(data){
                            if (data == "success") { 
                                //console.log(data);
                                //update bar
                                $('.fullcontainer').fadeOut();
                                $('.objactioncontainer').addClass('hidden');
                                if($('.objuseneed').text() == 'Fullness'){
                                    //console.log("NEED: FULLNESS");
                                    if($('.full').width() + 2*($('.objfulfillment').text()) >= 200) {
                                        $('.full').width(200);
                                        $('#fulltext').html('100/100');
                                    }
                                    else{
                                        var inc = parseInt($('.full').width()) + 2*parseInt($('.objfulfillment').text());
                                        $('.full').width(inc);
                                        $('#fulltext').html(inc/2 + '/100');
                                    }
                                }
                                else if($('.objuseneed').text() == 'Cleanliness'){
                                    //console.log("NEED: CLEANLINESS");
                                    if($('.clean').width() + 2*($('.objfulfillment').text()) >= 200){
                                        $('.clean').width(200);
                                        $('#cleantext').html('100/100');
                                    }
                                    else{
                                        var inc = parseInt($('.clean').width()) + 2*parseInt($('.objfulfillment').text());
                                        $('.clean').width(inc);
                                        $('#cleantext').html(inc/2 + '/100');
                                    }
                                }
                                else {
                                    //console.log("NEED: HAPPINESS");
                                    if($('.happy').width() + 2*($('.objfulfillment').text()) >= 200){
                                        $('.happy').width(200);
                                        $('#happytext').html('100/100');
                                    }
                                    else{
                                        var inc = parseInt($('.happy').width()) + 2*parseInt($('.objfulfillment').text());
                                        $('.happy').width(inc);
                                        $('#happytext').html(inc/2 + '/100');
                                    }
                                }
                                
                                loadPetImage(<?php echo json_encode($username)?>, petID);
                                                 
                                if($('.quantity').html != 'unlimited'){
                                    loadObjects(<?php echo json_encode($username)?>);
                                }

                                loadTopbar("./api/users/" + <?php echo json_encode($username)?>);
                            } 
                            else {
                                if ($('.useform').children('.error').length == 0) {
                                    $('.useform').append("<span class='error'><br>"+data+"</span>");
                                }
                            }
                        }
                      });
                });

                    loadTopbar("./api/users/" + <?php echo json_encode($username)?>);
                    loadPetList(<?php echo json_encode($username)?>);
                <?php
                    } else {
                ?>
                    window.location = "./";
                <?php
                    }
                ?>

             });

            var counter = 0;
            function movePet() {
                //console.log("called");
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
