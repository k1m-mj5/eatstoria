<?php

include '../class/restaurant.php';

if(isset($_POST["addrest"])){
    $account_id = $_SESSION["account_id"];
    $rest_name = $_POST["restname"];
    $description =  $_POST["description"];
    $location = $_POST["location"];
    $open_hour = $_POST["openinghour"];
    $telephone = $_POST["telephone"];
    
    $restaurant = new Restaurant();
    $restaurant->Addrestaurant($rest_name, $description, $location, $open_hour, $telephone, $account_id);
}

?>