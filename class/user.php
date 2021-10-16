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
            $sql = "SELECT accounts.account_id, user_id, email, username, rest_username, password
                    FROM accounts INNER JOIN users ON accounts.account_id = users.account_id
                    WHERE accounts.account_id = $account_id";

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

    public function registeruser($username,$email,$password){
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO accounts(username,password) VALUES ('$username','$hashed_password')";

        if($this->conn->query($sql)){
            $account_id = $this->conn->insert_id;

            $sql = "INSERT INTO users(username, email, account_id)
                    VALUES('$username','$email','$account_id')";

            if($this->conn->query($sql)){
                $_SESSION["success"] = 1;
                $_SESSION["message"] = "Registration successful.";
                header("Location:../index.php");
            } else {
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Registration Failed. Kindly try agian.";
                header("Location:../register-user.php");
            }
        }else {
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Registration Failed. Kindly try agian.";
                header("Location:../register-user.php");
            }
        }
    
    public function regitsterowner($rest_username,$email,$password){
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO accounts(rest_username,password) VALUES ('$rest_username','$hashed_password')";

        if($this->conn->query($sql)){
            $account_id = $this->conn->insert_id;

            $sql = "INSERT INTO users(rest_username, email, account_id)
                    VALUES('$rest_username','$email',$account_id)";
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
        }
    }
    
    public function loginuser($username,$password){
        $sql = "SELECT accounts.account_id, accounts.password, accounts.role, users.username, users.email, users.user_id
                FROM accounts INNER JOIN users ON accounts.account_id = users.account_id
                WHERE users.username='$username';";
        
        $result = $this->conn->query($sql);
        
        if($result && $result->num_rows==1){
            $user = $result->fetch_assoc();
            if(password_verify($password,$user["password"])){
                $_SESSION["account_id"] = $user["account_id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["role"] = $user["role"];
                
                if($user["role"]=="A"){
                    header("Location: ../index.php");
                } elseif($user["role"]=="U"){
                    header("Location: ../mypage-user.php");
                }
            } else{
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Incorrect password.";
                header("Location: ../login-user.php");
            } 
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Incorrect username.";
            header("Location: ../login-user.php");
        }
    }

    public function loginowner($rest_username,$password){
        $sql = "SELECT accounts.account_id, accounts.password, accounts.role, users.rest_username, users.email, users.user_id
                FROM accounts INNER JOIN users ON accounts.account_id = users.account_id
                WHERE users.rest_username='$rest_username';";
        
        $result = $this->conn->query($sql);
        
        if($result && $result->num_rows==1){
            $user = $result->fetch_assoc();
            if(password_verify($password,$user["password"])){
                $_SESSION["account_id"] = $user["account_id"];
                $_SESSION["rest_username"] = $user["rest_username"];
                $_SESSION["role"] = $user["role"];
                
                if($user["role"]=="R"){
                    header("Location: ../mypage-restaurant.php");
                } else{
                    //header("Location: ../mypage-user.php");
                    echo "error";
                }

            } else{
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "Incorrect password.";
                //header("Location: ../login-owner.php");
                echo "password";
            } 
        } else {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Incorrect username.";
            //header("Location: ../login-owner.php");
            echo "username";
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
}

?>