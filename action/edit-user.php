<?php

include '../class/user.php';

$user = new User();

if(isset($_POST["edit"])){
    $account_id = $_SESSION["account_id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $user->updateUser($account_id, $username, $email, $password, $confirmpassword);
}

?>