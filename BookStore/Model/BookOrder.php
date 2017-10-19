<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class BookOrder
{
    private $conn;
    public $book_id;
    public $order_id;
    public $count;
    
    public function __construct() {
        $this->conn = new DBConnection();
    }
    public function loadBookOrder($order_id)
    {
        
    }
    
    public function createBookOrder()
    {
        
    }
    public function deleteBookOrder()
    {
        
    }
    public function updateBookOrder()
    {
        
    }
}
?>