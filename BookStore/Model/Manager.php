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
        
    }
    public function createManager()
    {
        
    }
    
    public function deleteManager()
    {
        
    }
    public function updateManager()
    {
        
    }
}
?>