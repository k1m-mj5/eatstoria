<?php

require_once 'database.php';

class Restaurant extends Database{
    private $conn;
    private $rest_id;
    private $rest_name;
    private $description;
    private $location;
    private $telephone;
    private $open_hour;
    private $rest_username;

    public function __construct($rest_id=NULL){
        $this->conn = $this->connect();
        if($rest_id != NULL){
            $sql = "SELECT restaurant.rest_id, restaurant.rest_name, restaurant.description, restaurant.location, restaurant.telephone, restaurant.open_hour, accounts.rest_username
                    FROM restaurant INNER JOIN accounts ON accounts.rest_username
                    WHERE restaurant.rest_id = $rest_id";
            
            $result = $this->conn->query($sql);
            if($result && $result->num_rows>0){
                $restaurant = $result->fetch_assoc();{
                    $this->rest_id = $restaurant["rest_id"];
                    $this->rest_name = $restaurant["rest_name"];
                    $this->description = $restaurant["description"];
                    $this->location = $restaurant["location"];
                    $this->telephone = $restaurant["telephone"];
                    $this->open_hour = $restaurant["open_hour"];
                }
            }
        }
    }

    public function Addrestaurant($rest_name, $description, $location, $open_hour, $telephone, $account_id){
        
        $sql = "INSERT INTO restaurant(rest_name,description,location,open_hour,telephone,account_id) 
                VALUES ('$rest_name','$description','$location','$open_hour','$telephone',$account_id)";

        if($this->conn->query($sql)){
            $rest_id = $this->conn->insert_id;

            $_SESSION["success"] = 1;
            $_SESSION["message"] = "Restaurant completed adding.";
            header("Location:../edit-owner.php");
            exit;
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Adding failed. Please check agian.";
            header("Location:../add-restaurant.php");
        }
    }

    public function getRestID(){
        return $this->rest_id;
    }

    public function getRestname(){
        return $this->rest_name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getLocation(){
        return $this->location;
    }

    public function getTelephone(){
        return $this->telephone;
    }

    public function getOpenhour(){
        return $this->open_hour;
    }
}

?>