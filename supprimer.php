
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

$id = $_GET['id'];

$sql = 'DELETE FROM event WHERE  id = "'.$id.'"';

// use exec() because no results are returned
$bdd->exec($sql);

header('Location: eventApp.php');
  exit();
