<?php
session_start();
require 'connection.php';

$usernameErr = $passwordErr ="";
$username = $txtpassword = "" ;

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = clean($_POST["username"]);
    }

    if (empty($_POST["txtpassword"])) {
        $passwordErr = "password is required";
    } else {
        $txtpassword = clean($_POST["txtpassword"]);
    }

}

//Login Query
if(isset($_POST['login'])){
    $reponse =  $bdd->query("SELECT * FROM tbl_user WHERE username='$username'");


        // output data of each row
        while($row = $reponse->fetch()) {
            if($row['password'] == $txtpassword){
                $_SESSION['user_name'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                header("location:adminEvent.php");
            } else {
                $passwordErr = '<div class="alert alert-warning">
                        <strong>Login!</strong> Failed.
                        </div>';
                $username = $row['username'];
            }
        }


}

?>
