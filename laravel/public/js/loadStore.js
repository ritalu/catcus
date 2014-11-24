var loadPets=function(level) {
    console.log("load pets");
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/pettypes",
    success: function(data){
        renderPets(data, level);
        $('.pet.active').click(function() {
            $('.fullcontainer').fadeIn();
            $('.actioncontainer').removeClass('hidden');
            var background = $(this).children('.petimg').css("background");
            $('.buypic').css({"background": background ,"background-size":"contain"})
            $('.buyprice').html($(this).children('.price').html());
            $('.buytype').html($(this).children('.type').html());
            $('.error').remove();
        });
    }
  });
}

var loadObjects=function(level) {
    console.log("load objects");
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/objects",
    success: function(data){
        renderObjects(data, level);
        $('.item.active').click(function() {
          $('.fullcontainer').fadeIn();
          $('.objactioncontainer').removeClass('hidden');
          var url = "url("+$(this).children('.objimg').attr('src') + ") center center no-repeat";
          console.log(url);
          $('.objpic').css({"background": url,"background-size":"contain"})
          $('.objbuyprice').html($(this).children('.price').html());
          $('.objbuytype').html($(this).children('.type').html());
          $('.error').remove();
        });
    }
  });
}

var renderPets = function (data, level) {
console.log("rendering");
  var content="";
  for (var i = 0; i < data.length; i++) {
     console.log("LINK: " + data[i].happy);

    if (data[i] == null) {
      break;
    }
    else {
      content +=
      '<div class="pet';
      if (level <= data[i].unlock_level) content += ' active';
      console.log(level);
      console.log(data[i].unlock_level);
      content +=
       '">' + 
          '<div class="petimg" style="background:url(' + data[i].happy +') center center no-repeat;background-size:contain"></div>' +
          '<br><span class="type">'+ data[i].typeID + '</span>' +
          '<br><span class="price">' + data[i].price +'</span> coins' +
          '<br> Level ' + data[i].unlock_level +
      '</div>';
  	};
  }
  $('.petcontainer').html(content);
}

var renderObjects = function (data, level) {
  var content="";
  for (var i = 0; i < data.length; i++) {
    if (data[i] == null) {
      break;
    }
    else {
      content +=
      '<div class="item';
      if (level <= data[i].unlock_level) content += ' active';
      content +=
       '">' + '<input class="objID" type="hidden" value="' + data[i].objectID + '">' + 
      	'<img class = "objimg" src=' + data[i].image + '>' +
        '<br><span class="type">' + data[i].name + '</span>'+
        '<br><span class="price">' + data[i].price + '</span> coins' +
        '<br>Level ' + data[i].unlock_level +
        '</div>';
  	};
  }
  $('.itemcontainer').html(content);
}