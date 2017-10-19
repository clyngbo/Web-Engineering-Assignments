<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DBConnection{
    private $server = "localhost";
    private $port = "3306";
    private $password = "";
    private $user = "root";
    private $database = "bookstore";
    private $conn;
    public function __construct() {
        $this->$conn = new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);
    }
    
    public function query($sql)
    {
        try{
            
            if($this->$conn->connect_error)
            {
                die("Connection failed: ". $this->$conn->connect_errno);
            }
            return $result = $this->$conn->query($sql);
        } 
        catch (Exception $ex) {
            die("DBConnectyion failed: ".$ex->getMessage());
        }
         finally {
            $this->$conn->close();    
                }
    }
    
    public function statement($sql)
    {
        
    }
}