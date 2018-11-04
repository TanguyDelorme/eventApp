<?php
include 'include/connection.php'
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



	<script type="text/javascript">
	$(document).ready(function() {
		$('#francemap').vectorMap({
		    map: 'france_fr',
			hoverOpacity: 0.5,
			hoverColor: "#EC0000",
			backgroundColor: "#ffffff",
			color: "#18bc9c",
			borderColor: "#000000",
			selectedColor: "#EC0000",
			enableZoom: true,
			showTooltip: true,
		    onRegionClick: function(element, code, region)
		    {
		        var message = 'Région : "'
		            + region
		            + '" || Id : "'
		            + code
					+ '"';

		        alert(message);
		    }
		});
	});
	</script>
  </head>
  <body>
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
      <div class="flexbox" style="display: flex;">
        <div id="francemap" style="width: 500px; height: 500px;"></div>
        <a href="#ajouter" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg rounded-pill" style="width:20%;margin-left:40%"><i class="far fa-plus-square"></i> Add an event</button></a>
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

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="event">
        <div class="row" >
          <?php

         $reponse =  $bdd->query("SELECT id, nom, date, adresse FROM event");
         while ($donnees = $reponse->fetch()){
           $nom =  $donnees["nom"];
           $id =  $donnees["id"];
           $date =  $donnees["date"];
           $adresse =  $donnees["adresse"]
           ?>
           <div class="col-md-6 col-lg-4 ">
             <a class="portfolio-item d-block mx-auto" href="#<?php echo $id ?>Event">
               <div class="portfolio-item-caption d-flex position-absolute h-100 w-100 fond">
                 <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                   <i class="fas fa-search-plus fa-3x"></i>
                 </div>
               </div>
               <div class="jumbotron jumbotron-fluid fond">
                 <div>
                    <?php echo  $nom ?>
                 </div>
             </div>
             </a>
           </div>

           <!--Modale descriptive de chaque event-->

           <div class="portfolio-modal mfp-hide" id="<?php echo $id ?>Event" style="width:70%;margin-left:15%">
             <div class="portfolio-modal-dialog bg-white">
               <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
                 <i class="fa fa-3x fa-times"></i>
               </a>
               <div class="container text-center">
                 <div class="row">
                   <div class="style" style="width:85%;margin-left:7.5%">
                     <h2 class="text-secondary text-uppercase mb-0"><?php echo $nom ?></h2>
                     <hr class="star-dark mb-5">

                     <div class="jumbotron">
                       <div class="split">
                         <div class="splithorizontal">
                            <p class="mb-5 infoEvent"><?php echo "Date : ".$date ?></p>
                            <p class="mb-5 infoEvent">Adresse : <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $adresse ?>" target="_blank"><?php echo $adresse ?></a></p>
                         </div>
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

                     <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                       <i class="fa fa-close"></i>
                       Close Event</a>
                   </div>
                 </div>
               </div>
             </div>
           </div>
        <?php
        }
        ?>
        </div>
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
