
<?php
include 'include/connection.php';


    $nom = $_POST['nom'];
    $id = $_POST['id'];
    $date = $_POST['date'];
    $adresse = $_POST['adresse'];

$req = $bdd->prepare('UPDATE event SET nom = :nom, date = :date, adresse = :adresse where id = "'.$id.'"');
    	$req->execute(array(
    	'nom' => $nom,
    	'date' => $date,
    	'adresse' => $adresse,
));

header('Location: adminEvent.php');
  exit();
