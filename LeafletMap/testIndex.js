var mymap = L.map('mapid').setView([53.350140, -6.266155], 13);
    
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 17,
      attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
    }).addTo(mymap);

    var marker = L.marker([53.350140, -6.266155]).addTo(mymap);

    var popup = L.popup(); 

    function onMapClick(e) {
      popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
        var LatLong = e.latlng.toString()
    }
  mymap.on('click', onMapClick);   

  var kmlLayer = new L.KML ("test.kml", {async:true});
  kmlLayer.on("loaded", function(e) {
    mymap.fitBounds(e.target.getBounds());
  });

  mymap.addLayer(kmlLayer); 
