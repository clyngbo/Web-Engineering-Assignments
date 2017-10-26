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
    
    public function createManager(Manager $manager)
    {
        return $manager->createManager();
    }
    
    public function deleteManager(Manager $manager)
    {
        return $manager->deleteManager();
    }
    
    public function updateManager(Manager $manager)
    {
        return $manager->updateManager();
    }
    
    public function loadManager($name)
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
        $managerOrg = $this->loadManager($manager->username);
        if($manager->password === $managerOrg->password)
        {
            return True;
        }
         else {
             return FALSE;
         }
    }
}
