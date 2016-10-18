/*		var marker;
        var directionsService = new google.maps.DirectionsService();

      function initMap() {
        var myLatLng = {lat: -25.363, lng: -102.311168};
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          scrollwheel: false,
          zoom: 4
        });
        var infoWindow = new google.maps.InfoWindow({map: map});
		  if (navigator.geolocation) {
		  			map.setZoom(15);

		    navigator.geolocation.getCurrentPosition(function(position) {
		    var pos = {
		        lat: position.coords.latitude,
		        lng: position.coords.longitude
		      };

		      infoWindow.setPosition(pos);
		      infoWindow.setContent('Posicion actual.');
		       marker = new google.maps.Marker({
		          map: map,
		          position: pos,
		          title: 'Hello World!'
		        });
		      map.setCenter(pos);
		    }, function() {
		      handleLocationError(true, infoWindow, map.getCenter());
		    });
		  } else {
		    // Browser doesn't support Geolocation
		    handleLocationError(false, infoWindow, map.getCenter());
		  }
		  var infowindow = new google.maps.InfoWindow;
		  var geocoder = new google.maps.Geocoder;


		  map.addListener('click', function(e) {
		  	//alert("lel");
		    //placeMarkerAndPanTo(e.latLng, map);
    		geocodeLatLng(geocoder, map, infowindow,e.latLng);
		  });
		 }
		  

  function placeMarkerAndPanTo(latLng, map) {
  //	setMapOnAll(null);
		marker.setMap(null);
		marker = new google.maps.Marker({
		  position: latLng,
		  map: map
		});
		//map.panTo(latLng);
	}

	function geocodeLatLng(geocoder, map, infowindow,latLng) {
	  var input = latLng.latitude+","+latlng.longitude;
	  var latlngStr = input.split(',', 2);
	  var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
	  geocoder.geocode({'location': latlng}, function(results, status) {
	    if (status === google.maps.GeocoderStatus.OK) {
	      if (results[1]) {
	        map.setZoom(11);
	        var marker = new google.maps.Marker({
	          position: latlng,
	          map: map
	        });
	        infowindow.setContent(results[1].formatted_address);
	        infowindow.open(map, marker);
	      } else {
	        window.alert('No results found');
	      }
	    } else {
	      window.alert('Geocoder failed due to: ' + status);
	    }
	  });
	}
*/
	/*function setMapOnAll(map) {
	  for (var i = 0; i < markers.length; i++) {
	    markers[i].setMap(map);
	  }
	}*/

	function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: {lat: 40.731, lng: -73.997}
  });
  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;

//  document.getElementById('submit').addEventListener('click', function() {
  //  geocodeLatLng(geocoder, map, infowindow);
  //});

  map.addListener('click', function(e) {
		  	//alert("lel");
		    //placeMarkerAndPanTo(e.latLng, map);
    		geocodeLatLng(geocoder, map, infowindow,e.latLng);
		  });
}

function geocodeLatLng(geocoder, map, infowindow,latLng) {
  var input = latLng.lat()+","+latLng.lng();
  var latlngStr = input.split(',', 2);
  var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
  geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        map.setZoom(11);
        var marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
        infowindow.setContent(results[1].formatted_address);
        infowindow.open(map, marker);
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });
}