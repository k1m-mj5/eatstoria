<?php

require_once 'database.php';

class Review extends Database{
    private $conn;
    private $review_id;
    private $account_id;
    private $rest_id;
    private $rest_name;
    private $menu_id;
    private $menu_title;
    private $rating;
    private $message;
    private $way;
    private $date_posted;

    public function __construct($review_id = NULL){
        $this->conn = $this->connect();
        if($review_id != NULL){
            $sql = "SELECT review_id, review.message, review.rating, menu.menu_id, menu.menu_title, way, date_posted, restaurant.rest_id, restaurant.rest_name, accounts.account_id FROM review
                    INNER JOIN accounts ON accounts.account_id = review.account_id
                    INNER JOIN restaurant ON restaurant.rest_id = review.rest_id
                    INNER JOIN menu ON menu.menu_id = review.menu_id
                    WHERE review_id=$review_id";
            $result = $this->conn->query($sql);
            
            if($result && $result->num_rows>0){
                $review = $result->fetch_assoc();

                $this->review_id = $review["review_id"];
                $this->message = $review["message"];
                $this->rating = $review["rating"];
                $this->menu_id = $review["menu_id"];
                $this->menu_title = $review["menu_title"];
                $this->way = $review["way"];
                $this->date_posted = $review["date_posted"];
                $this->rest_id = $review["rest_id"];
                $this->rest_name = $review["rest_name"];
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

    public function getMenuID(){

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

    public function getRestName(){
        return $this->rest_name;
    }

    public function getAccountID(){
        return $this->account_id;
    }
    
    public function addReview($rest_id, $menu_id, $way, $rating, $message, $date_posted, $account_id){
        $sql = "INSERT INTO review(rest_id, menu_id, way, rating, message, date_posted, account_id)
                VALUES ($rest_id, $menu_id, '$way', '$rating', '$message', '$date_posted', $account_id)";

        if($this->conn->query($sql)){
            $review_id = $this->conn->insert_id;

            $_SESSION["success"] = 1;
            $_SESSION["message"] = "Reveiw completed adding.";
            header("Location:../review-top-user.php");
            exit;
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Adding failed. Please check agian.";
            header("Location:../add-review.php");
            exit;
        }
    }

    public function displayReviewOnTop($rest_id=NULL){
        $sql = "SELECT review.review_id, review.rating, restaurant.rest_name FROM review
                INNER JOIN restaurant ON review.rest_id = restaurant.rest_id";
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<div class='card w-25 ms-1 mb-3 p-3'>
                        <div class='card-body'>
                            <h2 class='h4 fw-bolder'>".$row["rest_name"]."</h2>
                            <p><i class='fas fa-star'></i> Rating: ".$row["rating"]."</p>
                            <a class='text-decoration-none' href='review-details.php?id=".$row["review_id"]."'>
                            Read more
                            <i class='bi bi-arrow-right'></i>
                            </a>
                        </div>
                    </div>";
            }
        } else {
            echo "No data";
        }
    }
    
    public function EditReview($review_id, $rest_id, $rating, $menu_id, $way, $message, $date_posted){
        $sql = "UPDATE review SET rest_id='$rest_id', rating='$rating', menu_id='$menu_id', way='$way', message='$message', date_posted='$date_posted'
                WHERE review_id=$review_id;";
        

        if($this->conn->query($sql)){
            $_SESSION["success"] = 1;
            $_SESSION["message"] = "Successfully Updated.";
            header("Location:../review-details.php?id=$review_id");
            exit;
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Update failed. Please kinldy check again.";
            header("Location:../edit-review.php?id=$review_id");
            exit;
        }        
    }

    public function displayReviewOnReviewRest($rest_id=NULL){
        $sql = "SELECT * FROM review
                INNER JOIN restaurant ON review.rest_id = restaurant.rest_id
                INNER JOIN menu ON review.menu_id = menu.menu_id
                INNER JOIN accounts ON review.account_id = accounts.account_id
                WHERE review.rest_id=$rest_id";
        $result = $this->conn->query($sql);
        
        if($result && $result->num_rows>0){
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["date_posted"]."</td>
                <td>".$row["menu_title"]."</td>
                <td>".$row["way"]."</td>
                <td>".$row["rating"]."</td>
                <td>".$row["message"]."</td>
                <td>".$row["username"]."</td>
                </tr>";
            }
        } else {
            echo "<tr>
                <td></td>
                <td></td>
                <td>No data</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>";
        }
    }
}

?>