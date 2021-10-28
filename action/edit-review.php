<?php

include '../class/review.php';

$review = new Review();

if(isset($_POST["edit"])){
    $review_id = $_POST["review_id"];
    $rest_id = $_POST["rest_id"];
    $rating = $_POST["rating"];
    $menu_id = $_POST["menu"];
    $way = $_POST["way"];
    $message = $_POST["message"];
    $date_posted = $_POST["date_posted"];
    
    $review ->EditReview($review_id, $rest_id, $rating, $menu_id, $way, $message, $date_posted);

}

?>