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
        
    }
    
    public function createOrder()
    {
        
    }
    
    public function deleteOrder()
    {
        
    }
    
    public function updateOrder()
    {
        
    }
}
?>
