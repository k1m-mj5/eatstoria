<?php

include '../class/user.php';

$user = new User();

if (isset($_POST["edit"])){
    $account_id = $_SESSION["account_id"];
    $rest_username = $_POST["restusername"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $user->updateOwner($account_id,$rest_username,$email,$password,$confirmpassword);

}

?>