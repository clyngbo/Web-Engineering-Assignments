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

    }
    
    public function query($sql)
    {
        try{
            $conn = new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);
            if($conn->connect_error)
            {
                die("Connection failed: ".$conn->connect_errno);
            }
            return $result = $conn->query($sql);
        } 
        catch (Exception $ex) {
            die("DBConnectyion failed: ".$ex->getMessage());
        }
         finally {
            $conn->close();    
                }
    }
    
    public function statement($sql)
    {
        try{
        $conn = new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);
        if($conn->connect_error)
        {
            die("Connection failed: ".$conn->connect_errno);
        }
        if($conn->query($sql))
        {
            return TRUE;
        }
         else {return FALSE;}
        }
         catch (Exception $ex)
         {
             die("DBConnection failed: ".$ex->getMessage());
         }
         finally {
                 $conn->close();    
         }
    }
    
    public function statementReturnID($sql)
    {
        try{
        $conn = new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);
        if($conn->connect_error)
        {
            die("Connection failed: ".$conn->connect_errno);
        }
        if($conn->query($sql))
        {
            return $conn->insert_id;
        }
         else {return FALSE;}
        }
         catch (Exception $ex)
         {
             die("DBConnection failed: ".$ex->getMessage());
         }
         finally {
                 $conn->close();    
         }
    }
}
?>