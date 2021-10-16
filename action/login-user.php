<?php

include '../class/user.php';

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = new User();
    $user->loginuser($username,$password);
}

?>