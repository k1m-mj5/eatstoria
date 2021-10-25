<?php

include '../class/review.php';

if(isset($_POST["post"])){
    $account_id = $_SESSION["account_id"];
    $rest_id = $_POST["restname"];
    $menu_title = $_POST["menu"];
    $way = $_POST["way"];
    $rating = $_POST["rate"];
    $message = $_POST["message"];
    $date_posted = $_POST["date"];

    $review = new Review();
    $review ->addReview($rest_id, $menu_title, $way, $rating, $message, $date_posted, $account_id);
}

?>