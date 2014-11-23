var loadPets=function() {
    console.log("load pets");
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/pettypes",
    success: function(data){
        renderPets(data);
        $('.pet').click(function() {
            $('.fullcontainer').fadeIn();
            $('.actioncontainer').removeClass('hidden');
            var background = $(this).children('.petimg').css("background");
            var backgroundsize = $(this).children('.petimg').css("background-size");
            console.log(this);
            console.log(background);
            console.log(backgroundsize);
        });
    }
  });
}

var loadObjects=function() {
    console.log("load objects");
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/objects",
    success: function(data){
        renderObjects(data);
    }
  });
}

var renderPets = function (data) {
console.log("rendering");
  var content="";
  for (var i = 0; i < data.length; i++) {
     console.log("LINK: " + data[i].happy);

    if (data[i] == null) {
      break;
    }
    else {
      content +=
      '<div class="pet active">' + //TODO
          '<div class="petimg" style="background:url(' + data[i].happy +') center center no-repeat;background-size:contain"></div>' +
          '<br><b>'+ data[i].typeID + '</b>' +
          '<br>' + data[i].price +' coins' +
          '<br> Level ' + data[i].unlock_level +
      '</div>';
  	};
  }
  $('.petcontainer').html(content);
}

var renderObjects = function (data) {
console.log("rendering");
  var content="";
  for (var i = 0; i < data.length; i++) {
    if (data[i] == null) {
      break;
    }
    else {
      content +=
      '<div class="item active">' + //TODO
      	'<img src=' + data[i].image + '>' +
        '<br><b>' + data[i].name + '</b>'+
        '<br><span class="price">' + data[i].price + '</span> coins' +
        '<br>Level ' + data[i].unlock_level +
        '</div>';
  	};
  }
  $('.itemcontainer').html(content);
}