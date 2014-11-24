var loadPetList=function(username) {
    console.log("load pets");
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/users/getallpets/"+username,
    success: function(data){
        renderPetList(data);
        loadInitialPet();
        loadObjects(username);
    }
  });
}

var loadInitialPet=function() {
  var initialPet = document.getElementById("initialPet").value;  
  $.ajax({//initial ajax call 
    type:"GET",
    url:"./api/pets/"+initialPet,
    success: function(data){
        console.log(data);
        renderPetBackground(data);
        renderInitialPet(data);
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
    }
  });
}

var renderPetList = function (data) {
  console.log("rendering");
  var content='<div class="title">Pets</div>';
  //add hidden field for first pet
  content+='<input id="initialPet" type="text" value="'+data[0].petID+'" style="display:none;">';
  content+='<input id="initialPetPic" type="text" value="'+data[0].happy+'" style="display:none;">';

  for (var i = 0; i < data.length; i++) {
    if (data[i] == null) {
      break;
    } 
    else {
      content +=
      '<div class="petcontainer" style="background:url('+data[i].happy+') center center no-repeat;background-size:contain">' +
        '<div class="name">'+data[i].name+'</div>' +
      '</div>'
  	};
  }
  $('.petlist').html(content);
}

var renderInitialPet = function (data) {
  var initialPetPic = document.getElementById("initialPetPic").value;
  $('.petpic').html('<img src="'+initialPetPic+'">');

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
        '<img src="' +data[i].image+ '">' +
        '<br><b>' + data[i].name + '</b>'+
        '<br>Qty: ' + qty +
        '</div>';
  }
  $('.itemcontainer').html(content);
}
