
 <?php

//Connexion à la base de données
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=event;charset=utf8', 'root', '');
  echo "Connected successfully";
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

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

header('Location: eventApp.php');
  exit();
