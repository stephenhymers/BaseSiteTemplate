<?php

class Tickets
{
    
    private $dsn = 'mysql:host=localhost;dbname=localhost';
    private $username = 'root';
    private $password = 'password';
    private $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    private $tbl = 'tickets';
    
    public function addTicket($post) {
        
        if (!empty($post)) {
            $db = new db($this->dsn, $this->username, $this->password, $this->options);
            $insert = $db->insert($this->tbl, $post);
            
            //header('Location: ./?page=tickets');
        }
        else {
            echo 'empty';
        }
        
    }
    
    public function getTicket($ticketId) {
        
        $db = new db($this->dsn, $this->username, $this->password, $this->options);
        $result = $db->select($this->tbl, "ticket_id = ". $ticketId);
        
        return $result;
        
    }
    
    public function closeTicket($ticketId) {
        
        $db = new db($this->dsn, $this->username, $this->password, $this->options);
        
        $update = array(
            "status" => "closed"
        );

        $db->update($this->tbl, $update, "ticket_id = ". $ticketId);
        
        header('Location: ./?page=tickets');
        
    }

    public function getAllTickets() {
        
        $db = new db($this->dsn, $this->username, $this->password, $this->options);
        
        $bind = array(
            ":status" => "closed",
        );
        
        $result = $db->select($this->tbl, "status != :status", $bind);
        
        return $result;
    }
    
    public function getTicketsByUser($userName) {
        
        $db = new db($this->dsn, $this->username, $this->password, $this->options);
        
        $bind = array(
            ":username" => $userName,
        );
        
        $result = $db->select($this->tbl, "author = :username", $bind);
        
        return $result;
        
    }

}