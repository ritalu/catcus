var loadTopbar = function() {
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/users/" + "ritalu",
    success: function(data){
        renderTopbar(data);
    }
  });
}

var renderTopbar = function (data) {
  var content="";
  var level = Math.floor(Math.log(data.exp) / Math.log(2));
  var totalExp = Math.pow(level + 1, 2);
  content +=
        '<div class="downarrow"><div class="line1"></div> <div class="line2"></div></div> <div class="userinfo"><a href="/profile/'
        + data.username + '">' + data.username + 
        '</a> <br><a href="/store">' + data.money + ' coins</a></div><a href="/profile/' +
        data.username + 
        '"><div class="profile" style="background:url(http://exmoorpet.com/wp-content/uploads/2012/08/cat.png) center center no-repeat white; background-size:cover"></div></a> <div class="level">' 
        + level + 
        '</div><div class="expbar"> <div class="fill"></div><div class="text">EXP: ' 
        + data.exp + '/' + totalExp +
        '</div></div>'

  $('.topbar').html(content);
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
}