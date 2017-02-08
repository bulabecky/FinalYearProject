
function initMap() {
        var Donegal = {lat: 54.6549, lng: -8.1041};
        var uluru2 = {lat: 53.34560667126015, lng: -6.262207028750026};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: Donegal,

        });
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Clonmany Festival</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Clonmany Festival</b> is Irelands longest running (49 years and counting!) and best known family festival and is situated in the' + ' beautiful village of Clonmany in the Inishowen Peninsula.' +
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
          position: Donegal,
          map: map,
          title: 'Donegal'
        });
        var marker2 = new google.maps.Marker({
          position: uluru2,
          map: map,
          title: 'uluru'
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker, marker2);
        });
       
      }

