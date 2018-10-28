
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

$idEvent = $_POST['id'];
$name = $_POST['name'];
$mail = $_POST['mail'];
$nickname = $_POST['nickname'];

//Sélection des colonnes de la table
$reponse =  $bdd->query("SELECT nom, prenom, idEvent, mail  FROM inscription");
$inscription = false;

//Vérification si on est deja inscris
while ($donnees = $reponse->fetch()){
   if($mail==$donnees["mail"] && $idEvent == $donnees["idEvent"]){
      echo "<br>";
      echo "Vous êtes deja inscris";
      $inscription = true;
   }
}

//Ajout a la bdd de la personne si elle n'est pas deja inscrite
if(!$inscription){
$req = $bdd->prepare('INSERT INTO inscription(nom, prenom, mail, idEvent) VALUES(?,?,?,?)');
$req->execute([$name, $nickname, $mail, $idEvent]);
}

header('Location: eventApp.php');
  exit();

?>
