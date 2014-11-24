var loadUser = function(username) {
  $.ajax({//initial ajax call 
    type:"GET",
    url:"../api/users/" + username,
    success: function(data){
        renderUser(data);
    }
  });
}

var renderUser = function (data) {

  var level = Math.floor(Math.log(data.exp) / Math.log(2));
  var totalExp = Math.pow(level + 1, 2);
  
  $('.panel').children('h1').html(data.username);
  var bg = "url(" + data.picture + ") center center no-repeat";
  $('.profpic').css({"background": bg, "background-size":"cover"});

  $('.panel').children('h2').html("Level " + level);
  
}

