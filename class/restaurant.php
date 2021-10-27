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
            $sql = "SELECT rest_id, rest_name, restaurant.description, location, telephone, open_hour, accounts.account_id
                    FROM restaurant INNER JOIN accounts ON restaurant.account_id=accounts.account_id
                    WHERE rest_id = $rest_id";

            $result = $this->conn->query($sql);

            if($result && $result->num_rows>0){
                $restaurant = $result->fetch_assoc();
                
                    $this->rest_id = $restaurant["rest_id"];
                    $this->rest_name = $restaurant["rest_name"];
                    $this->description = $restaurant["description"];
                    $this->location = $restaurant["location"];
                    $this->telephone = $restaurant["telephone"];
                    $this->open_hour = $restaurant["open_hour"];
                
            }
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

    public function displayRestListOnMyowner($account_id=NULL){
        $sql = "SELECT restaurant.rest_id, restaurant.rest_name 
                FROM restaurant WHERE account_id=$account_id;";
                
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["rest_id"]."</td>
                <td>".$row["rest_name"]."</td>
                <td><a href='restaurant-details-owner.php?id=".$row["rest_id"]."' class='btn btn-block btn-outline-success mt-3'>Details</a></td>
                <td><a href='order-ownerpage.php?id=".$row["rest_id"]."' class='btn btn-block btn-outline-success mt-3'>Check Order</a></td>
                </tr>";
            }
        } else {
            echo "No data";
        }
    }

    public function displayRestListOnEdit($account_id=NULL){
        $sql = "SELECT restaurant.rest_id, restaurant.rest_name 
                FROM restaurant WHERE account_id=$account_id;";
                
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["rest_id"]."</td>
                <td>".$row["rest_name"]."</td>
                <td><a href='restaurant-details-owner.php?id=".$row["rest_id"]."' class='btn btn-block btn-outline-success mt-3'>Details</a></td>
                <td><a href='order.php' class='btn btn-block btn-danger mt-3'>DELETE</a></td>
                </tr>";
            }
        } else {
            echo "No data";
        }
    }

    
    public function editRest($id, $rest_name, $description, $location, $open_hour, $telephone){
        $sql = "UPDATE restaurant SET rest_name='$rest_name', description='$description', location='$location', open_hour='$open_hour', telephone='$telephone'
                WHERE rest_id=$id";
        //echo $sql;    

        if($this->conn->query($sql)){
            $_SESSION["success"] = 1;
            $_SESSION["message"] = "Successfully Updated.";
            header("Location:../restaurant-details-owner.php?id=$id");
            exit;
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Update failed. Please kinldy check again.";
            header("Location:../edit-restaurant.php?id=$id");
            exit;
        }        
    }

    public function displayRestNameAsOptions($rest_id = NULL){
        $sql = "SELECT * FROM restaurant";
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            if($rest_id == NULL){
                echo "<option disabled selected>Select Restaurant</option>";
            }
            while($row = $result->fetch_assoc()){
                if($rest_id == $row["rest_id"]){
                    echo "<option value='".$row["rest_id"]."' selected>".$row["rest_name"]."</option>";
                }else{
                    echo "<option value='".$row["rest_id"]."'>".$row["rest_name"]."</option>";
                }
            }
        } else {
            echo "<option disabled selected>No Restaurant to choose from</option>";
        }
    }
    
    public function displayRestOnTop($rest_id=NULL){
        $sql = "SELECT restaurant.rest_id, restaurant.rest_name, restaurant.description FROM restaurant";
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<div class='card w-25 ms-1 mb-3 p-3'>
                        <div class='card-body'>
                        <img class='card-img-top img-fluid' src='https://cdn.dribbble.com/users/58386/screenshots/6860641/eat24_restaurants.jpg?compress=1&resize=400x300'>
                            <h2 class='h4 fw-bolder mt-2'>".$row["rest_name"]."</h2>
                            <p class='text-muted'>".$row["description"]."</p>
                            <a class='text-decoration-none' href='restaurant-details-user.php?id=".$row["rest_id"]."'>
                            Check Details <i class='bi bi-arrow-right'></i>
                            </a>
                        </div>
                    </div>";
            }
        } else {
            echo "No data";
        }
    }

}
