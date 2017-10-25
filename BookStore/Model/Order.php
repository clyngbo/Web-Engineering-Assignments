<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Order
{
    public $id;
    public $name;
    public $address;
    public $city;
    public $postcode;
    public $status;
    private $conn;
    
    public function __construct() {
        $this->conn = new DBConnection();
    }
    
    public function loadOrder($id)
    {
        $sql = "SELECT * FROM `order` WHERE id = $id";
        $result = $this->conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $this->id = $row['id'];
            $this->city = $row['city'];
            $this->address = $row['address'];
            $this->name = $row['name'];
            $this->postcode = $row['postcode'];
            $this->status = $row['status'];
        }
    }
    
    public function createOrder()
    {
         $sql = "INSERT INTO `order` (`name`, `address`, `city`, `postcode`, `status`) VALUES ('$this->name', '$this->address', '$this->city', '$this->postcode', '$this->status');";
         return $this->conn->statementReturnID($sql);
    }
    
    
    public function deleteOrder()
    {
        $sql = "DELETE FROM `order` WHERE `id`='$this->id';";
        return $this->conn->statement($sql);
    }
    
    public function updateOrder()
    {
        $sql = "UPDATE `order` SET `name`='$this->name', `address`='$this->address', `city`='$this->city', `postcode`='$this->postcode', `status`='$this->status' WHERE `id`='$this->id';";
        return $this->conn->statement($sql);
    }
}
?>
