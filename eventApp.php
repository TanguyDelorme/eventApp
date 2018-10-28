<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EventApp</title>

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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="eventApp.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


  </head>

  <body id="page-top">

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
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#admin">Admin</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#event">Event</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
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

            <?php

           //Connexion à la base de données
           try
           {
             $bdd = new PDO('mysql:host=localhost;dbname=event;charset=utf8', 'root', 'tseinfo');
           }
           catch (Exception $e)
           {
               die('Erreur : ' . $e->getMessage());
           }
           ?>

      <section  class="portfolio" id="admin">
        <!-- Trigger the modal with a button -->
        <a class="portfolio-item d-block mx-auto btn btn-primary btn-lg rounded-pill" href="#ajouter" style="width:250px">
        Ajouter un évènement
      </a><br></br>
                  <table id="example" style="color:red;" >
                      <tr>
                           <th>Id</th>
                           <th>Nom</th>
                           <th>Date</th>
                           <th>Adresse</th>
                           <th class="center">Modifier</th>
                           <th class="center">Supprimer</th>
                      </tr>
        <?php
                  $reponse =  $bdd->query("SELECT id, nom, date, adresse FROM event");
                    while ($donnees = $reponse->fetch()){
                      echo "<tr><td>".$donnees["id"]."</td><td>".$donnees["nom"]."</td><td>".$donnees["date"]."</td><td>".$donnees["adresse"]."</td><td>"; ?>
                        <a class="portfolio-item d-block mx-auto btn btn-primary btn-lg rounded-pill" href="#<?php echo $donnees["id"] ?>Modifier" style="width:60px">
                        <i class="far fa-plus-square fa-1x "></i>
                        </a>
                        <?php echo "</td><td>"; ?>
                          <button type="button" class="portfolio-item d-block mx-auto btn btn-primary btn-lg rounded-pill" style="width:60px" onclick="window.location.href='supprimer.php?action=supprimer&id=<?php echo $donnees["id"] ?>&nom=<?php echo $donnees["nom"] ?>'"><i class="far fa-minus-square fa-1x "></i></button>
                         <?php echo "</td></tr>"; ?>

                                         <!--Modale d'ajout d'event-->
                                         <div class="portfolio-modal mfp-hide" id="<?php echo $donnees["id"] ?>Modifier">
                                           <div class="portfolio-modal-dialog bg-white">
                                             <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
                                               <i class="fa fa-3x fa-times"></i>
                                             </a>
                                             <div class="container text-center">
                                               <div class="row">
                                                 <div class="col-lg-8 mx-auto">
                                                   <h2 class="text-secondary text-uppercase mb-0">Modification de l'event <?php echo $donnees["nom"]  ?></h2>
                                                   <hr class="star-dark mb-5">
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
                                                      <button type="submit" class="btn btn-default">Modifier</button>
                                                  </form><br>
                                                                 <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                                                                   <i class="fa fa-close"></i>Annuler</a>
                                                 </div>
                                               </div>
                                             </div>
                                           </div>
                                         </div>
                                       <?php
                    }
 ?>
                </table>
                <style>
                table{
                  margin-right: 100px;
                  width: 90%;
                  margin-left: 5%;
                  border-collapse: collapse;
                  font-size: 25px;
                  text-align: center;
                }
                th{
                  background-color: #18bc9c;
                }
                tr{
                  color: #2c3e50;
                }
                tr:nth-child(even){background-color: #f2f2f2;}
                .portfolio .portfolio-item{
                  margin-bottom: 0px !important;
                }
                </style>


                <!--Modale d'ajout d'event-->
        <div class="portfolio-modal mfp-hide" id="ajouter">
          <div class="portfolio-modal-dialog bg-white">
            <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
              <i class="fa fa-3x fa-times"></i>
            </a>
            <div class="container text-center">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
                  <hr class="star-dark mb-5">

                          			<form action="addForm.php" method="post">
                           				<div class="form-group">
                             					<label>Nom :</label>
                             					<input type="text" class="form-control" name="nom">
                            				</div>
                            				<div class="form-group">
                              					<label>Date :</label>
                              					<input type="date" class="form-control" name="date">
                            				</div>
                             				<div class="form-group">
                             					<label>Adresse :</label>
                             					<input type="text" class="form-control" name="adresse">
                            				</div>
                            				<button type="submit" class="btn btn-secondary" style="color:white;">Ajouter</button>
                          			</form><br>
                                <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                                  <i class="fa fa-close"></i>Annuler</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="event">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Event</h2>
        <hr class="star-dark mb-5">
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
           <div class="portfolio-modal mfp-hide" id="<?php echo $id ?>Event">
             <div class="portfolio-modal-dialog bg-white">
               <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
                 <i class="fa fa-3x fa-times"></i>
               </a>
               <div class="container text-center">
                 <div class="row">
                   <div class="col-lg-8 mx-auto">
                     <h2 class="text-secondary text-uppercase mb-0"><?php echo $nom ?></h2>
                     <hr class="star-dark mb-5">

                     <div class="jumbotron">
                       <div class="split">
                         <div class="splithorizontal">
                            <p class="mb-5 infoEvent"><?php echo "Date : ".$date ?></p>
                            <p class="mb-5 infoEvent"><?php echo "Adresse : ".$adresse ?></p>
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
      </div>
    </section>

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">About</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <div class="col-lg-4 mr-auto">
            <p class="lead">This application is free and designed thanks to Freelancer </p>
          </div>
          <div class="col-lg-4 ml-auto">
            <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
          </div>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="#">
            <i class="fas fa-download mr-2"></i>
            Download Now!
          </a>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Contact Me</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Name</label>
                  <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Email Address</label>
                  <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Phone Number</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Message</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Location</h4>
            <p class="lead mb-0">2215 John Daniel Drive
              <br>Clark, MO 65243</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Around the Web</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-google-plus-g"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-linkedin-in"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-dribbble"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">About Freelancer</h4>
            <p class="lead mb-0">Freelance is a free to use, open source Bootstrap theme created by
              <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Your Website 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Portfolio Modals -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-1">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/cabin.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-2">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/cake.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-3">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/circus.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-4">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/game.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-5">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/safe.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-6">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/submarine.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>
