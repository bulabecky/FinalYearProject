<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>PHP/MySQL & Google Maps Example</title>
    <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJXSQg6uRk9OD-fGID7NQ52sXpufXz268&callback=initMap">
    </script>
    <script type="text/javascript">
    //<![CDATA[

//set up globals
var gmarkers = [];
var infoWindow = [];

//set up icons
var customIcons = {
 FolkBand: {
                icon: 'http://maps.google.com/mapfiles/ms/micons/orange-dot.png'
               },
                Festival: {
                  icon: 'http://maps.google.com/mapfiles/ms/micons/red-dot.png'
                },
                Fiddle: {
                  icon: 'http://maps.google.com/mapfiles/ms/micons/blue-dot.png'
                },
                Banjo: {
                icon: 'http://maps.google.com/mapfiles/ms/micons/green-dot.png'
                },

                Singer: {
                icon: 'http://maps.google.com/mapfiles/ms/micons/yellow-dot.png'
               },

               Guitarist: {
                icon: 'http://maps.google.com/mapfiles/ms/micons/ltblue-dot.png'
               },

               Uilleann : {
                icon: 'http://maps.google.com/mapfiles/ms/micons/pink-dot.png'
               },

               TinWhistle : {
                icon: 'http://maps.google.com/mapfiles/marker_white.png'
               },

                Band: {
                  icon: 'http://maps.google.com/mapfiles/ms/micons/purple-dot.png'
                }
             };

//load function
function load() {

//initialise map
var map = new google.maps.Map(document.getElementById("map"), {
center: new google.maps.LatLng(53.350140, -6.266155),
zoom: 6
});
var infoWindow = new google.maps.InfoWindow;
//ok



//set up pins from xmlgen.php file
  // Change this depending on the name of your PHP file
downloadUrl("http://cosanceol.tk/mapDBXML.php", function(data) {
  var xml = data.responseXML;
  var markers = xml.documentElement.getElementsByTagName("marker");
  for (var i = 0; i < markers.length; i++) {
    var name = markers[i].getAttribute("name");
    var address = markers[i].getAttribute("address");
    var video = markers[i].getAttribute("video");
    var type = markers[i].getAttribute("type");
    var point = new google.maps.LatLng(
        parseFloat(markers[i].getAttribute("lat")),
        parseFloat(markers[i].getAttribute("lng")));
    var infowincontent = document.createElement('div');
                      var strong = document.createElement('strong');
                      strong.textContent = name
                      infowincontent.appendChild(strong);
                      infowincontent.appendChild(document.createElement('br'));

                      var text = document.createElement('text');
                      text.textContent = address
                      infowincontent.appendChild(text);
                      infowincontent.appendChild(document.createElement('br'));
                      var x = document.createElement("IFRAME");
                      x.setAttribute("src", video);
                      infowincontent.appendChild(x);
    var icon = customIcons[type] || {};

    var marker = new google.maps.Marker({
      map: map,
      position: point,
      icon: icon.icon
    });
    marker.mycategory = type;
    gmarkers.push(marker);

    bindInfoWindow(marker, map, infoWindow, infowincontent);
}
  });
}

    function bindInfoWindow(marker, map, infoWindow, infowincontent) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}


// == shows all markers of a particular category, and ensures the checkbox is checked ==
 function show(category) {
   for (var i=0; i<gmarkers.length; i++) {
     if (gmarkers[i].mycategory == category) {
       gmarkers[i].setVisible(true);
     }
   }
   // == check the checkbox ==
   document.getElementById(category+"box").checked = true;
 }

 // == hides all markers of a particular category, and ensures the checkbox is cleared ==
 function hide(category) {
   for (var i=0; i<gmarkers.length; i++) {
     if (gmarkers[i].mycategory == category) {
       gmarkers[i].setVisible(false);
     }
   }
   // == clear the checkbox ==
   document.getElementById(category+"box").checked = false;
   // == close the info window, in case its open on a marker that we just hid
   infoWindow.close();
 }

 // == a checkbox has been clicked ==
      function boxclick(box,category) {
        if (box.checked) {
          show(category);
        } else {
          hide(category);
        }
      }

    //]]>

  </script>

  </head>

<body onload="load()">

<div id="map" style="width: 700px; height: 500px"></div>

<form action="#">
<input type="checkbox" id="Festivalbox" onclick="boxclick(this,'Festival')" checked/>
<label>Festival</label>
<input type="checkbox" id="Bandbox" onclick="boxclick(this,'Band')" checked/>
<label>Band</label>
</form>

</body>
</html>