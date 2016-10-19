var marker;
var geocoder;
var infowindow;

function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
    	zoom: 8,
    	center: {lat: 40.731, lng: -73.997}
  	});
   	marker = new google.maps.Marker({
        map: map
    });
   	geocoder = new google.maps.Geocoder;
   	infowindow = new google.maps.InfoWindow;
    if (navigator.geolocation) {
		map.setZoom(15);
	    navigator.geolocation.getCurrentPosition(function(position) {
	    var pos = {
			lat: position.coords.latitude,
	        lng: position.coords.longitude
	      };
        geocodeLatLng(geocoder, map, infowindow,new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
        map.setCenter(pos);
	    }, function() {
		     // handleLocationError(true, infoWindow, map.getCenter());
 	    });
	} else {
		    // Browser doesn't support Geolocation
	    handleLocationError(false, infoWindow, map.getCenter());
  	}

  	map.addListener('click', function(e) {
		geocodeLatLng(geocoder, map, infowindow,e.latLng);
    });
}

function geocodeLatLng(geocoder, map, infowindow,latLng) {
	$("#IdAddress").val(0);
  var input = latLng.lat()+","+latLng.lng();
  var latlngStr = input.split(',', 2);
  var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
  geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        marker.setPosition(latLng);
        infowindow.setContent(results[0].formatted_address);
        infowindow.open(map, marker);

        $("#numero").val(results[0].address_components[0].short_name);
    	$("#calle").val(results[0].address_components[1].short_name);
    	$("#lat").val(latLng.lat());
    	$("#lng").val(latLng.lng());
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });
}

function cargaDireccion(lati, lngi,index){
	 geocodeLatLng(geocoder, map, infowindow,new google.maps.LatLng(lati, lngi));
	 $("#IdAddress").val(index);
}