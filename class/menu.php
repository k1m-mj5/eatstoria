<?php

require_once 'database.php';

class Menu extends Database{
    private $conn;
    private $menu_id;
    private $menu_title;
    private $price;
    private $description;
    private $rest_id;

    public function __construct($menu_id=NULL){
        $this->conn = $this->connect();
        if($menu_id !=NULL){
            $sql = "SELECT menu_id, menu_title, price, description, rest_id FROM menu 
                    WHERE menu_id = $menu_id";
            
            $result = $this->conn->query($sql);

            if($result && $result->num_rows>0){
                $menu = $result->fetch_assoc();
                
                $this->menu_id = $menu["menu_id"];
                $this->menu_title = $menu["menu_title"];
                $this->price = $menu["price"];
                $this->description = $menu["description"];
                $this->rest_id = $menu["rest_id"];
            }
        }
    }

    public function getMenuID(){
        return $this->menu_id;
    }
    
    public function getMenuTitle(){
        return $this->menu_title;
    }

    public function getPrice(){
        return $this->price;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getRest_id(){
        return $this->rest_id;
    }

    public function Addmenu($id, $menu_title, $price, $description){
        $sql = "INSERT INTO menu(menu_title, price, description, rest_id)
                VALUES('$menu_title', '$price','$description',$id)";

        if($this->conn->query($sql)){
            
            $_SESSION["success"] = 1;
            $_SESSION["message"] = "Menu completed adding.";
            header("Location:../restaurant-details-owner.php?id=$id");
            exit;
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Adding failed. Please check agian.";
            header("Location:../add-menu.php?id=$id");           
        }
    }

    public function displayMenuOnDetailsOwner($rest_id=NULL){
        $sql = "SELECT menu_id, menu_title, price, description FROM menu WHERE rest_id=$rest_id;";

        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["menu_title"]."</td> 
                <td>".$row["price"]."</td>
                 <td>".$row["description"]."</td>
                 <td><a href='#' class='btn btn-block btn-outline-info'>View Picture</a></td>
                 <td><a href='#' class='btn btn-block btn-warning'>Order</a></td>
                 </tr>";
            } 
        } else {
        echo "No data";
        }
    }

    public function displayMenuOnAddmenu($rest_id=NULL){
        $sql = "SELECT menu_id, menu_title, price, description FROM menu WHERE rest_id=$rest_id;";

        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["menu_title"]."</td> 
                <td>".$row["price"]."</td>
                 <td>".$row["description"]."</td>
                 <td><p>img</p></td>
                 <td><a href='edit-menu.php?id=".$row["menu_id"]."' class='btn btn-block btn-outline-info'>Update</a></td>
                 <td><a href='#' class='btn btn-block btn-danger'>DELETE</a></td>
                 </tr>";
            } 
        } else {
        echo "No data";
        }
    }

    public function editMenu($id, $menu_title, $price, $description,$rest_id){
        $sql = "UPDATE menu SET menu_title='$menu_title', price='$price', description='$description'
                WHERE menu_id=$id";

        if($this->conn->query($sql)){
            $_SESSION["success"] = 1;
            $_SESSION["message"] = "Successfully Updated Menu.";
            header("Location:../add-menu.php?id=$rest_id");
            exit;
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Update failded. Please kinldy check again.";
            header("Location:../edit-restaurant.php?id=$id");
            exit;
        }
    }

    public function displayMenuAsOptions($rest_id=NULL){
        $sql = "SELECT * FROM menu WHERE rest_id=$rest_id";
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            echo "<option disabled selected>Select Menu</option>";
            
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row["rest_id"]."'>".$row["menu_title"]."</option>";
            }
        } else {
            echo "<option disabled selected>No Menu to choose from</option>";
        }
    }

    public function displayMenuOnDetailsUser($rest_id=NULL){
        $sql = "SELECT menu_id, menu_title, price, description FROM menu WHERE rest_id=$rest_id;";

        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["menu_title"]."</td> 
                <td>".$row["price"]."</td>
                 <td>".$row["description"]."</td>
                 <td><a href='#' class='btn btn-block btn-outline-info'>View Picture</a></td>
                 </tr>";
            } 
        } else {
        echo "No data";
        }
    }
}
?>