<?php

include '../class/review.php';

if(isset($_POST["post"])){
    $account_id = $_SESSION["account_id"];
    $rest_id = $_POST["rest_id"];
    $menu_id = $_POST["menu"];
    
    $way = $_POST["way"];
    $rating = $_POST["rate"];
    $message = $_POST["message"];
    $date_posted = $_POST["date"];
    // var_dump($_POST);
    // exit;
    $review = new Review();
    $review ->addReview($rest_id, $menu_id, $way, $rating, $message, $date_posted, $account_id);
}

?>