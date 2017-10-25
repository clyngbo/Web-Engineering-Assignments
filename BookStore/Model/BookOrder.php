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
        $sql = "SELECT * FROM order_book WHERE order_id = $order_id";
        $result = $this->conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $this->book_id = $row['book_id'];
            $this->order_id = $row['order_id'];
            $this->count = $row['count'];
        }
    }
    
    public function createBookOrder()
    {
        return $this->conn->statementReturnID("INSERT INTO `order_book` (`book_id`, `order_id`, `count`) VALUES ('$this->book_id', '$this->order_id', '$this->count');");
    }
    public function deleteBookOrder()
    {
        return $this->conn->statement("DELETE FROM order_book WHERE order_id = $this->order_id");
    }
    public function updateBookOrder()
    {
        return $this->conn->statement("UPDATE `order_book` SET `book_id`='$this->book_id', `count`='$this->count' WHERE `order_id`='$this->order_id';");
    }
}
?>