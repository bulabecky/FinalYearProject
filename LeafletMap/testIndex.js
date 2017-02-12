var mymap = L.map('mapid').setView([53.350140, -6.266155], 13);
    
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 17,
      attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
    }).addTo(mymap);

    var popup = L.popup(); 

    function onMapClick(e) {
      popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
        var LatLong = e.latlng.toString()
    }

    var band = L.icon({
      iconUrl: 'showband.png'

      iconSize:     [38, 95], // size of the icon
      //shadowSize:   [50, 64], // size of the shadow
      iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      //shadowAnchor: [4, 62],  // the same for the shadow
      popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    })

    mymap.on('click', onMapClick);    
    L.marker([53.35, -6.25], {icon: band}).addTo(map).bindPopup("Can you see me?");