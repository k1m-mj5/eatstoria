<?php

include '../class/restaurant.php';

$restaurant = new Restaurant();

if(isset($_POST["edit"])){
    
    $id = $_POST["rest_id"];
    $rest_name = $_POST["restname"];
    $description = $_POST["description"];
    $location = $_POST["location"];
    $open_hour = $_POST["openinghours"];
    $telephone = $_POST["telephone"];

    $restaurant->editRest($id, $rest_name, $description, $location, $open_hour, $telephone);
}

?>