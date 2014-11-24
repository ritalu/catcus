var loadPetList=function(username) {
    console.log("load pets");
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/users/getallpets/"+username,
    success: function(data){
        renderPetList(data);
        loadActivePet();
        loadObjects(username);
    }
  });
}

var loadActivePet=function() {
  var activePet = document.getElementById("activePet").value;  
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/pets/"+activePet,
    success: function(data){
        console.log(data);
        renderPetBackground(data);
        renderActivePet(data);
        $('petcontainer.notactive').click(function(){
          console.log('New pet selected');
        //TODO load new background
        //TODO load new pet
        });
    }
  });
}

var loadObjects=function(username) {
    console.log("load objects");
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/users/getallobjects/"+username,
    success: function(data){
        console.log(data);
        loadAllObjects(data);
    }
  });
}

loadAllObjects = function (objectsOwned) {
   console.log("load objects: "+objectsOwned);
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/objects",
    success: function(data){
        console.log(data);
        renderObjects(data, objectsOwned);
        $('.item.active').click(function() {
          $('.fullcontainer').fadeIn();
          $('.objactioncontainer').removeClass('hidden');
          var url = "url("+$(this).children('.objimg').attr('src') + ") center center no-repeat";
          console.log(url);
          $('.objpic').css({"background": url,"background-size":"contain"})
          $('.objusetype').html($(this).children('.type').html());
          $('.objuseneed').html($(this).children('.need').html());
          $('.objownedID').html($(this).children('#objectsownedID').val());
          $('.error').remove();
        });
    }
  });
}

var renderPetList = function (data) {
  console.log("rendering");
  var content='<div class="title">Pets</div>';
  //add hidden field for first pet
  content+='<input id="activePet" type="text" value="'+data[0].petID+'" style="display:none;">';
  content+='<input id="activePetPic" type="text" value="'+data[0].happy+'" style="display:none;">';
  content +=
  '<div class="petcontainer active" style="background:url('+data[0].happy+') center center no-repeat;background-size:contain">' +
    '<div class="name">'+data[0].name+'</div>' +
  '</div>'
  for (var i = 1; i < data.length; i++) {
    if (data[i] == null) {
      break;
    } 
    else {
      content +=
      '<div class="petcontainer notactive" style="background:url('+data[i].happy+') center center no-repeat;background-size:contain">' +
        '<div class="name">'+data[i].name+'</div>' +
      '</div>'
  	};
  }
  $('.petlist').html(content);
}

var renderActivePet = function (data) {
  var activePetPic = document.getElementById("activePetPic").value;
  $('.petpic').html('<img src="'+activePetPic+'">');

  var age = Math.floor(calcAge(data.creationdate));
  var petDeets = '<table><tr><td>Name:</td><td class="petname">'+data.name+
  '</td></tr><tr><td>Age:</td><td class="petage">'+ age+
  ' days</td></tr></table>';
  $('.petinfo').html(petDeets);

  //TODO pet levels
  var petStats = "";
  petStats = 'Hunger:'
      +'<div class="bar">'
          +'<div id="full" class="fill"></div>'
          +'<div class="text">'+ data.fullness +'/100</div>'
      +'</div>'
      +'Happiness:'
      +'<div class="bar">'
          +'<div id="happy" class="fill"></div>'
          +'<div class="text">'+data.happiness+'/100</div>'
      +'</div>'
      +'Cleanliness:'
      +'<div class="bar">'
          +'<div id="clean" class="fill"></div>'
          +'<div class="text">'+ data.cleanliness+'/100</div>'
      +'</div></div>'
  $('.petstats').html(petStats);
  $('#full').css('width',2*data.fullness+'px');
  $('#happy').css('width',2*data.happiness+'px');
  $('#clean').css('width',2*data.cleanliness+'px');
}

function calcAge(creationdate) {
  var bday = creationdate.split(' ');
  bday = bday[0].split('-');
  bday = new Date(bday[0], bday[1]-1, bday[2]);
  return (new Date()-bday)/(1000*60*60*24);
}

renderPetBackground = function(data) {
  console.log("rendering");
    //set background to match pet
  if (data.typeID == "Cactus") {
    $('.petview').css('background','url(http://catcus.me/img/background_cactus.png) center center no-repeat');
  }
  else if (data.typeID == "Turtle" || data.typeID == "Fish") {
    $('.petview').css('background','url(http://catcus.me/img/background_fishturtle.png) center center no-repeat');
  }
  else {
    $('.petview').css('background','url(http://catcus.me/img/background_catdog.png) center center no-repeat');
  };
}

var renderObjects = function(data, objectsOwned)
{
  var content="";
  for (var i = 0; i < objectsOwned.length; i++) {
    if (objectsOwned[i] == null) {
      break;
    }

    var qty = objectsOwned[i].uses_remaining;
    if (objectsOwned[i].uses_remaining < 0)
    {
      qty = 'unlimited';
    };
    content +=
      '<div class="item active">' +
        '<input id="objectsownedID" type="text" value="'+
        objectsOwned[i].objectsownedID+'" style="display:none;">' +
        '<img class="objimg" src="' +data[i].image+ '">' +
        '<br><span class="type">' + data[i].name + '</span>'+
        '<br><span class="need">' + data[i].need_fulfilled + '</span>'+
        '<br>+<span class="fullfillment">' + data[i].rate_of_fulfillment + '</span>'+
        '<br>Qty: ' + qty +
        '</div>';
  }
  $('.itemcontainer').html(content);
}
