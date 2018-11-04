<?php
include 'include/connection.php';

//Ajouter un event
$reponse =  $bdd->query("SELECT nom, date, adresse, region FROM event");
$event = false;

while ($donnees = $reponse->fetch()){
   if($_POST['nom']==$donnees["nom"] && $_POST['date']==$donnees["date"] && $_POST['adresse']==$donnees["adresse"]){
      echo "<br>";
      echo "Evènement deja existant";
      $event = true;
   }
}
//Ajout de l'event s'il n'existe pas deja
if(!$event){
$req = $bdd->prepare('INSERT INTO event(nom, date, adresse, region) VALUES(?,?,?,?)');
$req->execute([$_POST['nom'], $_POST['date'], $_POST['adresse'], $_POST['region']]);
}

header('Location: eventApp.php');
  exit();
