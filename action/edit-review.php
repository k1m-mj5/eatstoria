<?php

include '../class/review.php';

$review = new Review();

if(isset($_POST["edit"])){
    $review_id = $_POST["review_id"];
    $rest_name = $_POST["restname"];
    $rating = $_POST["rating"];
    $menu_title = $_POST["menu"];
    $way = $_POST["way"];
    $message = $_POST["message"];
    $date_posted = $_POST["date_posted"];
    
    $review ->EditReview($review_id, $rest_name, $rating, $menu_title, $way, $message, $date_posted);

}

?>