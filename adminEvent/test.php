<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid">
    <h1>Display Google maps in Bootstrap Modal</h1>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-address='Lyon'>
      Location 1
    </button>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-address='Paris'>
      Location 2
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
                <div style="width: 600px; height: 400px;" id="map"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
 <script>
 function initMap(event) {
   var directionsDisplay = new google.maps.DirectionsRenderer;
   var directionsService = new google.maps.DirectionsService;
   var map = new google.maps.Map(document.getElementById('map'), {
     zoom: 7,
     center: {lat: 41.85, lng: -87.65}
   });
   directionsDisplay.setMap(map);
   directionsDisplay.setPanel(document.getElementById('right-panel'));

   if (navigator.geolocation) {
     navigator.geolocation.getCurrentPosition(function(position) {
       var pos = {
         lat: position.coords.latitude,
         lng: position.coords.longitude
       };
       localStorage.setItem('lat', position.coords.latitude);
       localStorage.setItem('lng', position.coords.longitude);
       map.setCenter(pos);
     }, function() {
       handleLocationError(true, infoWindow, map.getCenter());
     });
     calculateAndDisplayRoute(directionsService, directionsDisplay, event);
   } else {
     // Browser doesn't support Geolocation
     handleLocationError(false, infoWindow, map.getCenter());
   }
 }

 function calculateAndDisplayRoute(directionsService, directionsDisplay, event) {
   var start = {lat:parseFloat(localStorage.getItem('lat')), lng:parseFloat(localStorage.getItem('lng'))};
   var button = $(event.relatedTarget);
   end = button.data('address');
   directionsService.route({
     origin: start,
     destination: end,
     travelMode: 'DRIVING'
   }, function(response, status) {
     if (status === 'OK') {
       directionsDisplay.setDirections(response);
     } else {
       window.alert('Directions request failed due to ' + status);
     }
   });
 }

 // Re-init map before show modal
 $('#myModal').on('show.bs.modal', function(event) {
   initMap(event);
 });

 </script>
  <!-- Placed at the end of the document so the pages load faster -->
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0BJjYHaflXgduKz5GGy8KSrNZ0wiCtCY">
  </script>
</body>

</html>
