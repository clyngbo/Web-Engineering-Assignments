<?php
include_once '../Model/Book.php';
include_once '../Model/Category.php';
include_once '../Model/Order.php';
include_once '../Model/Manager.php';
include_once '../Model/BookOrder.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manager_controller
 *
 * @author Christian
 */
class Manager_controller {
    private $conn;
    public function __construct() {
        $this->conn = new DBConnection();
    }
    
    
    public function loadManagerByName($name)
    {
        $sql = "SELECT * FROM Manager WHERE username = $name";
        $manager = new Manager();
        $result = $this->conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $manager->id = $row['id'];
            $manager->username = $row['username'];
            $manager->password = $row['password'];
        }
        return $manager;
    }
    
    public function checkCredentials(Manager $manager)
    {
        $managerOrg = $this->loadManagerByName($manager->username);
        if($manager->password === $managerOrg->password)
        {
            return TRUE;
        }
         else {
             return FALSE;
         }
    }
    
     public function loadManagerById($id)
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
    public function createManager(Manager $manager)
    {
        $sql = "INSERT INTO `manager` (`username`, `password`) VALUES ('$manager->username', '$manager->password');";
        return $this->conn->statementReturnID($sql);
    }
    
    public function deleteManager(Manager $manager)
    {
        return $this->conn->statement("DELETE FROM `manager` WHERE id = $manager->id");
    }
    public function updateManager(Manager $manager)
    {
        return $this->conn->statement("UPDATE `manager` SET `username`='$manager->username', `password`='$manager->password' WHERE `id`='$manager->id';");
    }
}
