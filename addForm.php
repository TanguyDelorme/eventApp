
 <?php

//Connexion à la base de données
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=event;charset=utf8', 'root', 'tseinfo');
  echo "Connected successfully";
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

//Ajouter un event
$reponse =  $bdd->query("SELECT nom, date, adresse FROM event");
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
$req = $bdd->prepare('INSERT INTO event(nom, date, adresse) VALUES(?,?,?)');
$req->execute([$_POST['nom'], $_POST['date'], $_POST['adresse']]);
}

//Affichage de l'event
$reponse =  $bdd->query("SELECT id, nom, date, adresse FROM event");
while ($donnees = $reponse->fetch()){
   echo "<br>";
   echo "Nom de l'évènement : " . $donnees["nom"]. "<br>" . "Date : " . $donnees["date"]. "<br>". "Adresse : " . $donnees["adresse"]. "<br>". "ID : " . $donnees["id"]. "<br>";
}
header('Location: eventApp.php');
  exit();
