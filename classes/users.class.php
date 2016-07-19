<?php

class Users
{
    
    private $dsn = 'mysql:host=localhost;dbname=localhost';
    private $username = 'root';
    private $password = 'password';
    private $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    private $tbl = 'users';
    
    public function addUser($insert) {
        
        if (!empty($post)) {
            $db = new db($this->dsn, $this->username, $this->password, $this->options);
            $insert = $db->insert($this->tbl, $insert);
            
            header('Location: ./?page=users');
        }
        else {
            echo 'empty';
        }
    }
    
    public function deleteUser($userId) {
        
        $db = new db($this->dsn, $this->username, $this->password, $this->options);
        $result = $db->delete($this->tbl, "user_id = ". $userId ."");
        
        header('Location: ./?page=users');
        
    }
    
    public function getUser($userId) {
        
        $db = new db($this->dsn, $this->username, $this->password, $this->options);
        $result = $db->select($this->tbl, "user_id = ". $userId ." AND active = 1");
        
        return $result;
        
    }
    
     public function getAllAssignUsers() {
        
        $db = new db($this->dsn, $this->username, $this->password, $this->options);
        
        $result = $db->select($this->tbl, "active = 1");
        
        return $result;
    }
    
    
    public function getAllUsers() {
        
        $db = new db($this->dsn, $this->username, $this->password, $this->options);
        
        $result = $db->select($this->tbl, "admin = 0");
        
        return $result;
    }
    
    public function getAllAdminUsers() {
        
        $db = new db($this->dsn, $this->username, $this->password, $this->options);
        $result = $db->select($this->tbl, "admin = 1");
        
        return $result;
    }

    public function deactivateUser($userId) {

        $db = new db($this->dsn, $this->username, $this->password, $this->options);

        $update = array(
            "active" => 0
        );

        $db->update($this->tbl, $update, "user_id = ". $userId);

        header('Location: ./?page=users');
    }
    
    public function activateUser($userId) {

        $db = new db($this->dsn, $this->username, $this->password, $this->options);
        
        $update = array(
            "active" => 1
        );

        $db->update($this->tbl, $update, "user_id = ". $userId);
    }
    
    
    public function loginUser($username, $password) {
        
        $db = new db($this->dsn, $this->username, $this->password, $this->options);
                
        $bind = array(
            ":username" => $username,
        );
        
        $result = $db->select($this->tbl, "username = :username", $bind);
        
        if ($result) {
            $result = array_shift($result);
            
            if ($password === $result['password']) {

                if (!empty($_SESSION['user_error'])) {

                    session_unset($_SESSION['user_error']);

                }

                $_SESSION['user_session'] = $result;

                header('Location: ./?page=myaccount');

            }
            else {

                $_SESSION['user_error'] = 'Your username and password dont match :('; 

            }
        }
        else {
            $_SESSION['user_error'] = 'That username was not found.';
        }
    }
    
    public function logoutUser() {
    
        session_destroy();
        
        header('Location: ./?page=login');
        
    }
}