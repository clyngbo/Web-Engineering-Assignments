<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Category
{
    
    private $conn;
    public $id;
    public $name;
    public function __construct() {
        $this->conn = new DBConnection();
    }
    
    public function loadCategory($id)
    {
        
    }
    public function createCategory()
    {
        
    }
    public function deleteCategory()
    {
        
    }
    public function updateCategory()
    {
        
    }
}
?>