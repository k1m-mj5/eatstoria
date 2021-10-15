<?php
include '../class/user.php';

if( isset($_POST["submit"])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = new User();
    $user->registeruser($username,$email,$password);

}

?>