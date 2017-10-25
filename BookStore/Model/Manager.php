<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Manager
{
    public $username;
    public $password;
    public $id;
    private $conn;
    
    public function __construct() {
        $this->conn = new DBConnection();
    }
    public function loadManager($id)
    {
        $sql = "SELECT * FROM manager WHERE id = $id";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc())
        {
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->id = $row['id'];
        }
    }
    public function createManager()
    {
        $sql = "INSERT INTO `manager` (`username`, `password`) VALUES ('$this->username', '$this->password');";
        return $this->conn->statementReturnID($sql);
    }
    
    public function deleteManager()
    {
        return $this->conn->statement("DELETE FROM `manager` WHERE id = $this->id");
    }
    public function updateManager()
    {
        return $this->conn->statement("UPDATE `manager` SET `username`='$this->username', `password`='$this->password' WHERE `id`='$this->id';");
    }
}
?>