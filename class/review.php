<?php

require_once 'database.php';

class Review extends Database{
    private $conn;
    private $review_id;
    private $account_id;
    private $rest_id;
    private $rest_name;
    private $menu_title;
    private $rating;
    private $message;
    private $way;
    private $date_posted;

    public function __construct($review_id = NULL){
        $this->conn = $this->connect();
        if($review_id != NULL){
            $sql = "SELECT review_id, message, rating, menu_title, way, date_posted, restaurant.rest_id, accounts.account_id FROM review
                    INNER JOIN accounts ON accounts.account_id = review.account_id
                    INNER JOIN restaurant ON restaurant.rest_id = review.rest_id
                    WHERE review_id=$review_id";
            $result = $this->conn->query($sql);
            
            if($result && $result->num_rows>0){
                $review = $result->fetch_assoc();

                $this->review_id = $review["review_id"];
                $this->message = $review["message"];
                $this->rating = $review["rating"];
                $this->menu_title = $review["menu_title"];
                $this->way = $review["way"];
                $this->date_posted = $review["date_posted"];
                $this->rest_id = $review["rest_id"];
                $this->account_id = $review["account_id"];
                
            }
        }
    }

    public function getReviewID(){
        return $this->review_id;
    }

    public function getMessage(){
        return $this->message;
    }

    public function getRating(){
        return $this->rating;
    }

    public function getMenuTitle(){
        return $this->menu_title;
    }

    public function getWay(){
        return $this->way;
    }

    public function getDatePosted(){
        return $this->date_posted;
    }

    public function getRestID(){
        return $this->rest_id;
    }

    public function getAccountID(){
        return $this->account_id;
    }
    

}

?>