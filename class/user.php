<?php

require_once 'database.php';

class User extends Database{
    private $conn;
    private $account_id;
    private $username;
    private $rest_username;
    private $email;
    

    public function __construct($account_id=NULL){
        $this->conn = $this->connect();
        if($account_id !=NULL){
            $sql = "SELECT accounts.account_id, users.user_id, users.email, accounts.username, accounts.rest_username, accounts.password
                    FROM accounts INNER JOIN users ON accounts.account_id = users.account_id
                    WHERE accounts.account_id = $account_id";

            //echo "$sql";

                    $result = $this->conn->query($sql);

                    if($result && $result->num_rows>0){
                        $user = $result->fetch_assoc();{
                            $this->account_id = $user["account_id"];
                            $this->username = $user["username"];
                            $this->rest_username = $user["rest_username"];
                            $this->email = $user["email"];
                            
                        }
                    }
        }
    }

    public function getAccountID(){
        return $this->account_id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getRestUsername(){
        return $this->rest_username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassward(){
        return $this->password;
    }

    public function registeruser($username,$email,$password){
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO accounts(username,password) VALUES ('$username','$hashed_password')";

        if($this->conn->query($sql)){
            $account_id = $this->conn->insert_id;

            $sql = "INSERT INTO users(email, account_id)
                    VALUES('$email','$account_id')";

            if($this->conn->query($sql)){
                $_SESSION["success"] = 1;
                $_SESSION["message"] = "Registration successful.";
                header("Location:../index.php");
                exit;
            } else {
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Registration Failed. Kindly try agian.";
                header("Location:../register-user.php");
                exit;
            }
        }else {
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Registration Failed. Kindly try agian.";
                header("Location:../register-user.php");
                exit;
            }
        }
    
    public function regitsterowner($rest_username,$email,$password){
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO accounts(rest_username,password) VALUES ('$rest_username','$hashed_password')";

        if($this->conn->query($sql)){
            $account_id = $this->conn->insert_id;

            $sql = "INSERT INTO users(email, account_id)
                    VALUES('$email',$account_id)";
            if($this->conn->query($sql)){
                $_SESSION["success"] = 1;
                $_SESSION["message"] = "Registration successful.";
                header("Location:../index.php");
            } else {
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Registration Failed. Kindly try agian.";
                header("Location:../register-owner.php");
            }       
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Registration Failed. Kindly try agian.";
            header("Location:../register-owner.php");
            exit;
        }
    }
    
    public function loginuser($username,$password){
        $sql = "SELECT * FROM accounts 
                WHERE username='$username';";
        
        $result = $this->conn->query($sql);
        
        if($result && $result->num_rows==1){
            $user = $result->fetch_assoc();
            
            if(password_verify($password,$user["password"])){
                $_SESSION["account_id"] = $user["account_id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["role"] = $user["role"];
                
                if($user["role"]=="A"){
                    header("Location: ../dashboard.php");
                    exit;
                } elseif($user["role"]=="U"){
                    header("Location: ../mypage-user.php");
                    exit;
                } 
            } else{
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Incorrect password.";
                header("Location: ../login-user.php");
                exit;
            } 
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Incorrect username.";
            header("Location: ../login-user.php");
            exit;
        }
    }

    public function loginowner($rest_username,$password){
        $sql = "SELECT * FROM accounts 
                WHERE rest_username='$rest_username';";
        
        $result = $this->conn->query($sql);
        
        if($result && $result->num_rows==1){
            $user = $result->fetch_assoc();
            if(password_verify($password,$user["password"])){
                $_SESSION["account_id"] = $user["account_id"];
                $_SESSION["rest_username"] = $user["rest_username"];
                $_SESSION["role"] = $user["role"];
                
                if($user["role"]=="R"){
                    header("Location: ../mypage-restaurant.php");
                    exit;
                } else{
                    header("Location: ../index.php");
                    exit;
                }

            } else{
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Incorrect password.";
                header("Location: ../login-owner.php");
                exit;
            } 
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Incorrect username.";
            header("Location: ../login-owner.php");
            exit;
        }
    }

    public function updateUser($account_id, $username, $email, $password, $confirmpassword){
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "UPDATE accounts SET username = '$username'
                WHERE account_id=$account_id;";         
        $sql .= "UPDATE users SET email = '$email'
                WHERE account_id=$account_id;";

        if(!empty($password)){
            if($password == $confirmpassword){
            $sql .= "UPDATE accounts SET password='$hashed_password' WHERE accounts.account_id=$account_id;";
            } 
            else {
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Check your password again.";
                header("Location: ../edit-user.php");
                exit;
            } 
        }        
        
        if($this->conn->multi_query($sql)){
            $_SESSION["success"] = 1;
            $_SESSION["message"] = "Successfully Updated";
            header("Location: ../mypage-user.php");
            exit;
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Update Failed. Please kinldy check again.";
            header("Location: ../edit-user.php");
            exit;
        }
    }

    public function updateOwner($account_id, $rest_username, $email, $password, $confirmpassword){
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "UPDATE accounts SET rest_username='$rest_username' WHERE account_id=$account_id;";
        $sql .= "UPDATE users SET email='$email' WHERE account_id=$account_id;";

        if(!empty($password)){
            if($password = $confirmpassword) {
                $sql .= "UPDATE accounts SET password='$hashed_password' WHERE account_id=$account_id;";
            } else {
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Check your password";
                header("Location: ../edit-owner.php");
                exit;
            }
        }
        if($this->conn->multi_query(($sql))){
            $_SESSION["success"] = 1;
            $_SESSION["message"] = "Successfully Updated.";
            header("Location:../mypage-restaurant.php");
            exit;
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Update failed. Please kinldy check again.";
            header("Location:../edit-owner.php");
            exit;
        }

        }
    
    public function displayUsersOnDashboard($account_id=NULL){
        $sql = "SELECT * FROM accounts
                INNER JOIN users ON accounts.account_id = users.account_id
                WHERE accounts.role = 'U' ";
        
        $result = $this->conn->query($sql);
        
        if($result && $result->num_rows>0) {
            
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["account_id"]."</td>
                <td>".$row["username"]."</td>
                <td>".$row["email"]."</td>
                </tr>";
            }
        
        } else {
            echo "<tr>
            <td>No data</td>
            <td></td>
            <td></td>
            </tr>";
        }
    }

    public function displayOwnersOnDashboard($account_id=NULL){
        $sql = "SELECT * FROM accounts
                INNER JOIN users ON accounts.account_id = users.account_id
                WHERE accounts.role = 'R' ";
        
        $result = $this->conn->query($sql);
        
        if($result && $result->num_rows>0) {
            
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row["account_id"]."</td>
                <td>".$row["rest_username"]."</td>
                <td>".$row["email"]."</td>
                </tr>";
            }
        
        } else {
            echo "<tr>
            <td>No data</td>
            <td></td>
            <td></td>
            </tr>";
        }
    }
}


?>