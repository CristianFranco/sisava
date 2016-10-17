<!DOCTYPE html>
<html>
<head>
	<title>Sithec</title>

	  <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!-- Magnific Popup -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery.datetimepicker.css">

        <!-- Theme style  -->


        <!-- Modernizr JS -->
        <script src="js/modernizr-2.6.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        



</head>
<body >


<div class="container" >
<div class="row">	
	<div class="col-md-6">
	<h2> elige la ubicacion a donde se entregara el servicio</h2>
		<div id="map" style="width: 500px; height: 500px"></div>
	</div>
	<div class="col-md-6">
	<h2>Elige la fecha y hora</h2>
		<input id="date">
	</div>

	</div>
	<!--
	<div class="row">
		<div class="col-md-6">
			<div class="col-md-4">
				<input type="radio" name="type" value="male" checked="true"> <img src="images/visa.jpg" style="width:50px" />  <br>
			</div>

			<div class="col-md-4">
				<input type="radio" name="type" value="male"> <img src="images/master.jpg" style="width:50px" /><br>
			</div>		

			<div class="col-md-4">
				<input type="radio" name="type" value="male"> <img src="images/scotia.png" style="width:50px"/><br>
			</div>		
		</div>
		<div class="col-md-12">
			<input type="text" id="numTar" class="form-control" placeholder="Numero de tarjeta" maxlength="16" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
		</div>
		<div class="col-md-6">
			<input type="text" id="numCvc" class="form-control" placeholder="CVC" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
		</div>
		<div class="col-md-6">
			<input type="text" id="numVig" class="form-control" placeholder="Fecha de vigencia" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
		</div>
	</div>-->

</div>



      <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing.1.3.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Waypoints -->
        <script src="js/jquery.waypoints.min.js"></script>
        <!-- countTo -->
        <script src="js/jquery.countTo.js"></script>
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
        <!-- Main -->
        <script src="js/main.js"></script>


       
        <script type="text/javascript">
        	$(document).ready(function(){
		    var date=document.getElementById("date");
		    jQuery("#date").datetimepicker();
		    closeAdd.onclick=function(){
		        quantity.value=1;
		        date.value="";
		        addModal.style.display="none";
		    }
		});
        </script>

    <script>
    var marker;
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


		  map.addListener('click', function(e) {
		    placeMarkerAndPanTo(e.latLng, map);
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

	/*function setMapOnAll(map) {
	  for (var i = 0; i < markers.length; i++) {
	    markers[i].setMap(map);
	  }
	}*/

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6ruPRFnYFnmQ4lKVFIjE3W1OYloNRB8Q&callback=initMap"
        async defer></script>

</body>
</html>