<?php

require_once 'database.php';

class Order extends Database{
    private $conn;
    private $order_id;
    private $rest_id;
    private $rest_name;
    private $menu_id;
    private $menu_title;
    private $quantity;
    private $contact_num;
    private $way;
    private $order_date;
    private $order_time;
    private $account_id;
    private $message;
    private $username;

    public function __construct($order_id=NULL){
        $this->conn = $this->connect();
        if($order_id != NULL){
            $sql = "SELECT order_id, restaurant.rest_id, restaurant.rest_name, menu.menu_id, menu.menu_title, quantity, contact_num, orders.way, order_date, order_time, accounts.account_id, accounts.username, orders.message
                    FROM orders
                    INNER JOIN accounts ON accounts.account_id = orders.account_id
                    INNER JOIN restaurant ON restaurant.rest_id = orders.rest_id
                    INNER JOIN menu ON menu.menu_id = orders.menu_id
                    WHERE orders.order_id=$order_id";
            $result = $this->conn->query($sql);

            if($result && $result->num_rows>0){

                $order = $result->fetch_assoc();

                $this->order_id = $order["order_id"];
                $this->rest_id = $order["rest_id"];
                $this->menu_id = $order["menu_id"];
                $this->quantity = $order["quantity"];
                $this->way = $order["way"];
                $this->contact_num = $order["contact_num"];
                $this->order_date = $order["order_date"];
                $this->order_time = $order["order_time"];
                $this->account_id = $order["account_id"];
                $this->message = $order["message"];
            }
        }
    }

    public function getOrderID(){
        return $this->order_id;
    }
    public function getRestID(){
        return $this->rest_id;
    }
    public function getRestname(){
        return $this->rest_name;
    }
    public function getMenuID(){
        return $this->menu_id;
    }
    public function getMenuTitle(){
        return $this->menu_title;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function getWay(){
        return $this->way;
    }
    public function getContactNum(){
        return $this->contact_num;
    }
    public function getOrderdate(){
        return $this->order_date;
    }
    public function getOrdertime(){
        return $this->order_time;
    }
    public function getAccountID(){
        return $this->account_id;
    }
    public function getMessage(){
        return $this->message;
    }

    public function getUsername(){
        return $this->username;
    }
    
    public function addOrder($rest_id, $menu_id, $quantity, $way, $contact_num, $order_date, $order_time, $account_id, $message){
        $sql = "INSERT INTO orders(rest_id, menu_id, quantity, contact_num, way, order_date, order_time, account_id, message)
                VALUES ($rest_id, $menu_id, '$quantity', '$contact_num', '$way', '$order_date', '$order_time', $account_id, '$message')";
        //echo $sql;
        if($this->conn->query($sql)){
            $order_id = $this->conn->insert_id;

            $_SESSION["success"] = 1;
            $_SESSION["message"] = "Order completed.";
            header("Location:../mypage-user.php?id=$account_id");
            exit;
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Order failed. Please check agian.";
            header("Location:../add-order.php?id=$rest_id");
            exit;
        }        
    }

    public function displayOrderOnMyUser($account_id=NULL){
        $sql = "SELECT orders.order_id, orders.order_date, restaurant.rest_name, menu.menu_title FROM orders
                INNER JOIN restaurant ON orders.rest_id = restaurant.rest_id
                INNER JOIN menu ON orders.menu_id = menu.menu_id
                WHERE orders.account_id=$account_id";
        
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["order_date"]."</td>
                <td>".$row["rest_name"]."</td>
                <td>".$row["menu_title"]."</td>
                <td><a href='edit-order.php?id=".$row["order_id"]."' class='btn btn-block btn-warning text-light'>Check & Edit details</a></td>
                 </tr>";
            }
        } else {
            echo "<tr>
            <td></td>
            <td>No data</td>
            <td></td>
            <td></td>
             </tr>";
        }
    }

    public function EditOrder($order_id, $rest_id, $menu_id, $quantity, $way, $contact_num, $order_date, $order_time, $account_id, $message){
        $sql = "UPDATE orders SET rest_id='$rest_id', menu_id='$menu_id', quantity='$quantity', way='$way', contact_num='$contact_num', order_date='$order_date', order_time='$order_time', message='$message', account_id=$account_id
                WHERE orders.order_id=$order_id;";

        if ($this->conn->query($sql)) {
            $_SESSION["success"] = 1;
            $_SESSION["message"] = "Successfully Updated.";
            header("Location:../mypage-user.php?id=$account_id");
            exit;
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Update failed. Please kinldy check again.";
            header("Location:../edit-order.php?id=$order_id");
            exit;
        }
    }

    public function displayOrderOnOwnerpage($rest_id=NULL){
        $sql = "SELECT * FROM orders
                INNER JOIN restaurant ON orders.rest_id = restaurant.rest_id
                INNER JOIN menu ON orders.menu_id = menu.menu_id
                INNER JOIN accounts ON orders.account_id = accounts.account_id
                WHERE orders.rest_id=$rest_id";
        
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0) {
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["order_id"]."</td>
                <td>".$row["order_date"]."</td>
                <td>".$row["order_time"]."</td>
                <td>".$row["menu_title"]."</td>
                <td>".$row["quantity"]."</td>
                <td>".$row["way"]."</td>
                <td>".$row["contact_num"]."</td>
                <td>".$row["username"]."</td>
                <td>".$row["message"]."</td>
                </tr>";
            }
        } else {
            echo "<tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>No data</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>";
        }
    }

    public function displayOrderOnDashboard($order_id=NULL){
        $sql = "SELECT * FROM orders
                INNER JOIN accounts ON orders.account_id = accounts.account_id
                INNER JOIN restaurant ON orders.rest_id = restaurant.rest_id
                INNER JOIN menu ON orders.menu_id = menu.menu_id";
        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0){
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["order_id"]."</td>
                <td>".$row["order_date"]."</td>
                <td>".$row["username"]."</td>
                <td>".$row["rest_name"]."</td>
                <td>".$row["menu_title"]."</td>
                <td>".$row["quantity"]."</td>
                <td>".$row["way"]."</td>
                </tr>";
            }
        } else {
            echo "No Data";
        }
    }
}

?>