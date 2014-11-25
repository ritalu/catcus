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
        <link href="./css/search.css" rel="stylesheet">
        <script src="./js/loadTopbar.js"></script>

    </head>

    <body>
        

        <div class="content">
            <div class="bar">
                <input type="text" id="term" placeholder="Search">
                <div class="icon"></div>
            </div>
            <div class="panel">
                <div class="result"></div>
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
                    } else {
                ?>
                    window.location = "./";
                <?php
                    }
                ?>

                $('#term').keypress(function (e) {
                  if (e.which == 13) {
                    var query = $('#input').val();
                    getResults(query);
                    return false;    
                  }
                });
            });

            function getResults(query) {
                $.ajax({//initial ajax call 
                    type:"GET",
                    url:"./api/users/search",
                    data: {term : query},
                    success: function(data){
                        for (var i = 0; i < data.length; i++) {
                            if (data[i] == null) {
                              console.log("no");
                              break;
                            }
                            else {
                              console.log(data[i].username);
                            };
                        }
                    }
                });
            }
         </script>

    </body>
</html>
