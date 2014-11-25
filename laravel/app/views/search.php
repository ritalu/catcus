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
        <title>Search</title>
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
                Enter your search query.
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

                $('#term').keyup(function (e) {
                    var query = $('#term').val();
                    $('.panel').html("");
                    getResults(query);
                });
            });

            function getResults(query) {
                $.ajax({//initial ajax call 
                    type:"GET",
                    url:"./api/users/search",
                    data: {term : query},
                    success: function(data){
                        if (data.length == 0) {
                            $('.panel').html("No results found.")
                        }
                        for (var i = 0; i < data.length; i++) {
                            if (data[i] == null) {
                              console.log("no");
                              break;
                            }
                            else {
                              var content = 
                              '<a href="/profile/' + data[i].username + '"><div class="result">' +
                                '<div class="profpic" style="background:url(' + data[i].picture +') center center no-repeat;background-size:cover">' +
                                '</div>' +
                                data[i].username +
                                '<div class="' + data[i].username + ' pets">'+
                                '</div>'+
                            '</div></a>';
                                $('.panel').append(content);
                                getPets(data[i].username);

                            };
                        }
                    }
                });
            }

            function getPets(username) {
                $.ajax({//initial ajax call 
                    type:"GET",
                    url:"../api/users/getallpets/" + username,
                    success: function(data){
                        var content = "";
                        for (var i = 0; i < data.length; i++) {
                            if (data[i] == null) {
                              break;
                            }
                            else {
                                content += "<img src='" + data[i].happy + "'>"
                            }
                        }
                        $('.' + username).html(content);
                    }
                  });
            }
         </script>

    </body>
</html>
