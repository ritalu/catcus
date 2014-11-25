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

  if (data.username == null) {
    window.location = "http://catcus.me/error";
  }
  else {
    var level = Math.floor(Math.log(data.exp) / Math.log(2));
    var totalExp = Math.pow(level + 1, 2);

    $('.panel').children('h1').html(data.username);
    var bg = "url(" + data.picture + ") center center no-repeat white";
    $('.profpic').css({"background": bg, "background-size":"cover"});

    $('.panel').children('h2').html("Level " + level);
  }
  

}

var loadUserPets = function(username) {
  $.ajax({//initial ajax call 
    type:"GET",
    url:"../api/users/getallpets/" + username,
    success: function(data){
        renderPets(data);
    }
  });
}

var renderPets = function(data) {
  var content = "";
  console.log(data.length);
  for (var i = 0; i < data.length; i++) {
    if (data[i] == null) {
      console.log("no");
      break;
    }
    else {
      console.log(data[i]);
      content += '<div class="pet">' + 
        '<img class="petimg" src="' + data[i].happy + '">' + 
          '<br>' + data[i].name +
      '</div>';
    };
  }
  content += '<br clear="all" />'
  if (data.length == 1) {
    $('.petwrapper').css({"width":"160px"});
  } else if (data.length == 2) {
    $('.petwrapper').css({"width":"320px"})
  }
  else {
    $('.petwrapper').css({"width":"480px"})
  }
  $('.petwrapper').html(content);
}