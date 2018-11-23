<?php
include 'include/connection.php';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Tanguy DELORME">
    <title>EventApp</title>

    <link href="franceJvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="franceJvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="franceJvmap/jquery.vmap.france.js" type="text/javascript"></script>
	   <script src="franceJvmap/jquery.vmap.colorsFrance.js" type="text/javascript"></script>
     <!-- Bootstrap core CSS -->
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom fonts for this template -->
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

     <!-- Plugin CSS -->
     <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

     <!-- Custom styles for this template -->
     <link href="css/freelancer.min.css" rel="stylesheet">
     <link rel="stylesheet" href="style.css" />
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
     <script src="eventApp.js" type="text/javascript"></script>
  </head>
  <body style="margin-right: 10px; margin-left: 10px;">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">EventApp</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="adminEvent/adminEvent.php">Admin</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#area">Area</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#event">Events</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#footer">Footer</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <h1 class="text-uppercase mb-0">EventApp</h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">Create event and register in.</h2>
      </div>
    </header>

    <section class="portfolio" id="area">
      <div class="center">
        <div class="jumbotron flexbox">
          <div id="francemap"></div>
          <?php
          if(isset($_GET['region'])){
            $region = $_GET['region'];
           ?>
          <div class="flexboxV">
            <a href="#ajouter" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg rounded-pill" ><i class="far fa-plus-square"></i> Add an event</button></a>
          </div>
          <?php
          }
         ?>
        </div>
      </div>
      <div id="ajouter" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body">
            <h2 class="text-secondary mb-0" style="text-align:center">New event :</h2>
            <hr class="star-dark mb-5">
            <form action="addForm.php" method="post">
              <div class="form-group">
                <label>Name :</label>
                <input type="text" class="form-control" name="nom">
              </div>
              <div class="form-group">
                <label>Date :</label>
                <input type="date" class="form-control" name="date">
              </div>
              <div class="form-group">
                <label>Address :</label>
                <input type="text" class="form-control" name="adresse">
              </div>
              <div class="form-group">
                <input value="<?php echo $_GET['region']; ?>"type="text" class="form-control" name="region" hidden>
              </div>
              <button type="submit" class="btn btn-secondary" ><i class="far fa-plus-square"></i> Add</button>
            </form><br>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
        </div>
      </div>
    </div>
  </div>
    </section>

    <!-- Event Grid Section -->
    <section class="portfolio" id="event">
      <?php
      //If you didn't select a region, it displays all the events available with their modal xmlrpc_parse_method_descriptions
      //If you clicked on one region you have the events for this region
      if(!isset($_GET['region'])){
        echo "<div class='center'><h4 class='selected'>Events coming in France</h4></div><hr class='star-dark mb-5'>";
         ?>
      <div style="display : flex; justify-content:center;">
        <div class="row">
          <?php
         $reponse =  $bdd->query("SELECT id, nom, date, adresse, region FROM event");
         while ($donnees = $reponse->fetch()){
           $nom =  $donnees["nom"];
           $id =  $donnees["id"];
           $date =  $donnees["date"];
           $adresse =  $donnees["adresse"]
           ?>
           <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="mr-5"><?php echo $nom ?></div>
                </div>
                <div class="card-footer text-white clearfix " >
                  <span class="float-left">The : <?php echo $date ?></span>
                </div>
                <a class="card-footer text-white clearfix z-1" data-address='<?php echo str_replace(" ","+",$donnees['adresse']); ?>' data-toggle='modal' href='#myModal'>
                  <span class="float-left"><?php echo $donnees['adresse']; ?></span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
                <a class="card-footer text-white clearfix " href="#subscribe<?php echo $id ?>" data-toggle="modal">
                  <span class="float-left">  Subscribe</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

           <!--Modale descriptive de chaque event-->
           <div id="subscribe<?php echo $donnees["id"]; ?>" class="modal fade" role="dialog">
               <div class="modal-dialog modal-lg">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h4 class="modal-title"><?php echo $nom ?></h4>
                           </div>
                           <div class="modal-body">
                             <div class="row">
                               <div class="style" style="width:85%;margin-left:7.5%">
                                 <div class="jumbotron">
                                     <div>
                                       <form action="inscrire.php" method="post">
                                          <div class="form-group">
                                            <label>Nom :</label>
                                            <input type="text" class="form-control" name="name">
                                          </div>
                                          <div class="form-group">
                                            <label>Prenom :</label>
                                            <input type="text" class="form-control" name="nickname">
                                          </div>
                                          <div class="form-group">
                                            <label>Mail :</label><input type="email" class="form-control" name="mail">
                                            <input value="<?php echo $id?>" type="hidden" class="form-control" name="id">
                                          </div>
                                          <button type="submit" class="btn btn-secondary">S'inscrire</button>
                                       </form>
                                   </div>
                                </div>
                               </div>
                             </div>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close event</button>
                           </div>
                       </div>
               </div>
           </div>
        <?php
        }
        ?>
      </div>
        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4  class="modal-title" id="myModalLabel">Directions to the event</h4>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body" style="display:flex">
                      <div style="width: 400px; height: 400px;margin-right:15px" id="map"></div>
                      <div style="width: 400px; height: 400px;overflow:auto;margin-top:-10px" id="right-panel"></div>
                  </div>
              </div>
            </div>
          </div>
        </div>
       <script>
       function initMap(event) {
         document.getElementById('right-panel').innerHTML = "";
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
        </div>
        <?php
        }
        else{
          echo "<div class='center'><h4 class='selected'>Events coming in ".$region."</h4></div><hr class='star-dark mb-5'>";
           ?>
          <div class="row" >
            <?php
           $reponse =  $bdd->query('SELECT id, nom, date, adresse, region FROM event where region="'.$region.'"');
           while ($donnees = $reponse->fetch()){
             $nom =  $donnees["nom"];
             $id =  $donnees["id"];
             $date =  $donnees["date"];
             $adresse =  $donnees["adresse"]
             ?>
             <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                  <div class="card-body">
                    <div class="mr-5"><?php echo $nom ?></div>
                  </div>
                  <div class="card-footer text-white clearfix " >
                    <span class="float-left">The : <?php echo $date ?></span>
                  </div>
                  <a class="card-footer text-white clearfix z-1" data-address='<?php echo str_replace(" ","+",$donnees['adresse']); ?>' data-toggle='modal' href='#myModal'>
                    <span class="float-left"><?php echo $donnees['adresse']; ?></span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                  <a class="card-footer text-white clearfix " href="#subscribe<?php echo $id ?>" data-toggle="modal">
                    <span class="float-left">  Subscribe</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>

              <!--Modale descriptive de chaque event-->
              <div id="subscribe<?php echo $donnees["id"]; ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title"><?php echo $nom ?></h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="style" style="width:85%;margin-left:7.5%">
                                    <div class="jumbotron">
                                        <div>
                                          <form action="inscrire.php" method="post">
                                             <div class="form-group">
                                               <label>Nom :</label>
                                               <input type="text" class="form-control" name="name">
                                             </div>
                                             <div class="form-group">
                                               <label>Prenom :</label>
                                               <input type="text" class="form-control" name="nickname">
                                             </div>
                                             <div class="form-group">
                                               <label>Mail :</label><input type="email" class="form-control" name="mail">
                                               <input value="<?php echo $id?>" type="hidden" class="form-control" name="id">
                                             </div>
                                             <button type="submit" class="btn btn-secondary">S'inscrire</button>
                                          </form>
                                      </div>
                                   </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close event</button>
                              </div>
                          </div>
                  </div>
              </div>
           <?php
           }
           ?>
         </div>
           <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
             <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h4  class="modal-title" id="myModalLabel">Directions to the event</h4>
                   <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 </div>
                 <div class="modal-body" style="display:flex">
                         <div style="width: 400px; height: 400px;margin-right:15px" id="map"></div>
                         <div style="width: 400px; height: 400px;overflow:auto;margin-top:-10px" id="right-panel"></div>
                     </div>
                 </div>
               </div>
             </div>
           </div>
          <script>
          function initMap(event) {
            document.getElementById('right-panel').innerHTML = "";
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
          </div>
          <?php
        }
         ?>
    </section>
    <!-- Footer -->

    <footer class="footer text-center">
      <section class="portfolio" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Mail</h4>
            <p class="lead mb-0">delorme.tanguy@gmail.com</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Linkedin</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://www.linkedin.com/in/tanguy-delorme-82659a133/">
                  <i class="fab fa-fw fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">About EventApp</h4>
            <p class="lead mb-0">Designed by TanguyDELORME, student at engineering school Télécom Saint-Etienne</a>.</p>
          </div>
        </div>
      </div>
    </section
    </footer>


    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; EventApp</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>



    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>
