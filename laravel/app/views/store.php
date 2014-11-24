<?php 

$username = "";
$loggedIn = false;
$level = -1;

if (Cookie::get('username') !== null) {
    $username = Cookie::get('username');
    $loggedIn = true;
};
if (Cookie::get('level') !== null) {
    $level = Cookie::get('level');
    echo $level;
};

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:100,300,500">
        <title>Store</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="./css/topbar.css" rel="stylesheet">
        <link href="./css/store.css" rel="stylesheet">
        <script src="./js/loadTopbar.js"></script>

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



        <?php
        include 'topbar.php';
        ?>

        <div class="fullcontainer" style="display:none">
        </div>
        <div class="objactioncontainer hidden">
            <div class="objpic" style="background:url(./img/dog_happy.png) center center no-repeat;background-size:contain">
            </div>
            <div class="buyform">
                <div class="objbuytype">Item</div>
                Cost: 
                <span class="objbuyprice">500</span> coins
            </div>
            <div class="bottomwrap">
                <div class="objbuybutton">Buy Item</div>
            </div>
        </div>
        <div class="actioncontainer hidden">
            <div class="buypic" style="background:url(./img/dog_happy.png) center center no-repeat;background-size:contain">
            </div>
            <div class="buyform">
                <div class="buytype">Dog</div>
                Name:
                <input id="petname" required type="text" name="petname" placeholder="e.g. Spot" autocomplete="off" >
                Cost: 
                <span class="buyprice">500 </span> coins
            </div>
            <div class="bottomwrap">
                <div class="buybutton">Create Pet</div>
            </div>
        </div>

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
                $(document).keyup(function(e){

                    if(e.keyCode === 27) {
                        $('.fullcontainer').fadeOut();
                        $('.actioncontainer').addClass('hidden');
                        $('.objactioncontainer').addClass('hidden');
                    }
                });

                $('.fullcontainer').click(function() {
                    $('.fullcontainer').fadeOut();
                    $('.actioncontainer').addClass('hidden');
                    $('.objactioncontainer').addClass('hidden');
                });
                $('.buybutton').click(function() {
                    var typeID = $('.buytype').html();
                    var name = $('#petname').val();
                    console.log(typeID + " " + name);
                    $.ajax({//initial ajax call 
                        type:"GET",
                        url:"./api/pets/buy",
                        data: {username: <?php echo json_encode($username)?>, typeID: typeID , name: name},
                        success: function(data){
                            if (data == "success") {
                                console.log(data);
                                //window.location.replace("/pets");
                            } else {
                                if ($('.buyform').children('.error').length == 0) {
                                    $('.buyform').append("<span class='error'><br>"+data+"</span>");
                                }
                            }
                        }
                      });
                });
                $('.objbuybutton').click(function() {
                    var objID = $('.objbuyprice').html();
                      $.ajax({//initial ajax call 
                        type:"GET",
                        url:"./api/objects/buy",
                        data: {username: <?php echo json_encode($username)?>, objectID: objID},
                        success: function(data){
                            console.log(data);
                            loadTopbar();
                        }
                      });

                });
                
                loadPets();
                loadObjects();
                
             });

         </script>

    </body>
</html>
