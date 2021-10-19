<?php
include '../class/user.php';

if( isset($_POST["submit"])){
    $email = $_POST["email"];
    $rest_username = $_POST["rest_username"];
    $password = $_POST["password"];

    $user = new User();
    $user->regitsterowner($rest_username,$email,$password);

}

?>