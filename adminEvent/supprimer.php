
<?php
include '../include/connection.php';


$id = $_GET['id'];

$sql = 'DELETE FROM event WHERE  id = "'.$id.'"';

// use exec() because no results are returned
$bdd->exec($sql);

header('Location: adminEvent.php');
  exit();
