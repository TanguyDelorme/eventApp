<?php
include '../include/connection.php';
include '../include/controller.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
if(empty($_SESSION['user_name'])){
    header("location:login.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=set_to_true_or_false"></script>
    <!-- Bootstrap core CSS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../css/freelancer.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <script type="text/javascript" src="../dataTables/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dataTables/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script type="text/javascript" src="adminEvent.js"></script>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Admin</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../eventApp.php">Events</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#table">TableEvent</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#table2">TableInscription</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#footer">Footer</a>
            </li>
            <button type="button" class="btn btn-danger" onclick="window.location.href='logout.php'"><i class="fas fa-sign-out-alt"></i></i></button>
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

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="table">
      <div class="jumbotron" style="width:80%;margin-left:10%;">
              <h4 style="display : flex;justify-content:center">Events table, click on one to see the participants</h4><br>
              <table id="event" class="display table-bordered ">
                      <thead>
                          <tr>
                               <th>ID</th>
                               <th>Name</th>
                               <th>Date</th>
                               <th>Address</th>
                               <th>Region</th>
                               <th>Update</th>
                               <th>Delete</th>
                          </tr>

                      </thead>
                      <tfoot>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Region</th>
                            <th>Update</th>
                            <th>Delete</th>
                         </tr>
                      </tfoot>
              </table>
    				</div>

        </section>

        <section class="portfolio" id="table2">
          <div class="jumbotron hideJumbo" style="width:80%;margin-left:10%;">
            <h4 style="display : flex;justify-content:center">Participants table</h4><br>
              <table id="inscription" class="display table-bordered ">
                      <thead>
                          <tr>
                               <th>Name</th>
                               <th>Surname</th>
                               <th>Mail</th>
                               <th>IdEvent</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Mail</th>
                            <th>IdEvent</th>
                         </tr>
                      </tfoot>
              </table>
            </div>
          </section>


       <?php
             $reponse =  $bdd->query("SELECT id, nom, date, adresse FROM event");
               while ($donnees = $reponse->fetch()){ ?>


             <div id="update<?php echo $donnees["id"]; ?>" class="modal fade" role="dialog">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-body ">
                     <h4 class="text-secondary mb-0" style="text-align:center">Modification de l'event <?php echo $donnees["nom"]  ?></h4>
                     <hr class="star-dark mb-5">
                     <div class="alert alert-primary">
                       <form action="updateForm.php" method="post">
                         <div class="form-group">
                           <label>Nom :</label>
                           <input value="<?php echo $donnees["nom"] ?>" type="text" class="form-control" name="nom">
                         </div>
                         <div class="form-group">
                           <label>Date :</label>
                           <input value="<?php echo $donnees["date"] ?>" type="date" class="form-control" name="date">
                         </div>
                         <div class="form-group">
                           <label>Adresse :</label>
                           <input value="<?php echo $donnees["adresse"] ?>" type="text" class="form-control" name="adresse">
                           <input value="<?php echo $donnees["id"]?>" type="hidden" class="form-control" name="id">
                         </div>
                       </div>
                      <button type="submit" class="btn btn-secondary modif" style="color:white;width:15%;margin-left:40%"><i class="far fa-edit"></i> Modifier</button>
                      </form><br>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i> Fermer</button>
                  </div>
                </div>
              </div>
            </div>


            <div id="delete<?php echo $donnees["id"]; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete</h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger">Do you want to delete the event <strong>
                                        <?php echo $donnees["nom"]; ?>?</strong> </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='supprimer.php?action=supprimer&id=<?php echo $donnees["id"] ?>'"><i class="fas fa-trash-alt"></i> YES</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="far fa-times-circle"></i> NO</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
            <div id="map<?php echo $donnees["id"]; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <form method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Map</h4>
                            </div>

                            <div class="modal-body">

                              <?php
                              $adresse = "https://maps.google.it/maps?q=".$donnees['adresse']."&output=embed";
                              echo "<iframe width='600' height='450' frameborder='0' style='border:0' src='$adresse' allowfullscreen></iframe>";
                              ?>
                            </div>
                        </div>
                    </form>
                </div>
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



    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/freelancer.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>

</html>
