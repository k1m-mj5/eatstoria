<?php

include '../class/user.php';

if(isset($_POST["submit"])){
    $rest_username = $_POST["restusername"];
    $password = $_POST["password"];

    $user = new User();
    $user->loginowner($rest_username,$password);
}

?>