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
        $sql = "SELECT * FROM category WHERE id = $id";
        $result = $this->conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $this->id = $row['id'];
            $this->name = $row['name'];
        }
    }
    public function createCategory()
    {
        return $this->conn->statementReturnID("INSERT INTO `category` (`name`) VALUES ('$this->name');");
    }
    public function deleteCategory()
    {
        return $this->conn->statement("DELETE FROM `bookstore`.`category` WHERE `id`='$this->id';");
    }
    public function updateCategory()
    {
        return $this->conn->statement("UPDATE `bookstore`.`category` SET `name`='$this->name' WHERE `id`='$this->id';");    
    }
}
?>