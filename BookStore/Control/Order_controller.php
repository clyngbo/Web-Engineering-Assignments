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
 * Description of Order_controller
 *
 * @author Christian
 */
class Order_controller {
    private $conn;
    public function __construct() {
        $this->conn = new DBConnection();
    }
    


    public function deleteOrderAndDetails(Order $order)
    {
        $book_orders = $this->loadBookOrder($order->id);
        foreach ($book_orders as $b)
        {
            $this->deleteBookOrder($b);
        }
        return $this->deleteOrder($order);
    }
    
    public function createOrderWithBooks(Order $order, ArrayObject $bookOrders)
    {
        $success = FALSE;
        $order_id = $this->createOrder();
        if($order_id == 0)
        {
            return $success;
        }
        
        foreach ($bookOrders as $b)
        {
            $b->order_id = $order_id;
            if($this->createBookOrder($b) == FALSE)
            {
                return $success;
            }
        }
        $success = TRUE;
        return $success;
    }

    
    public function loadBookOrder($order_id)
    {
        $sql = "SELECT * FROM order_book WHERE order_id = $order_id";
        $result = $this->conn->query($sql);
        $book_orders = new ArrayObject();
        while($row = $result->fetch_assoc())
        {
            $book_order = new BookOrder();
            $book_order->book_id = $row['book_id'];
            $book_order->order_id = $row['order_id'];
            $book_order->count = $row['count'];
            $book_orders->append($book_order);
        }
        return $book_orders;
    }
    
    public function createBookOrder(BookOrder $book_order)
    {
        return $this->conn->statementReturnID("INSERT INTO `order_book` (`book_id`, `order_id`, `count`) VALUES ('$book_order->book_id', '$book_order->order_id', '$book_order->count');");
    }
    public function deleteBookOrder(BookOrder $book_order)
    {
        return $this->conn->statement("DELETE FROM order_book WHERE order_id = $book_order->order_id");
    }
    public function updateBookOrder(BookOrder $book_order)
    {
        return $this->conn->statement("UPDATE `order_book` SET `book_id`='$book_order->book_id', `count`='$book_order->count' WHERE `order_id`='$book_order->order_id';");
    }
    
    public function loadOrder($id)
    {
        $sql = "SELECT * FROM `order` WHERE id = $id";
        $result = $this->conn->query($sql);
        $order = new Order();
        while($row = $result->fetch_assoc())
        {
            $order->id = $row['id'];
            $order->city = $row['city'];
            $order->address = $row['address'];
            $order->name = $row['name'];
            $order->postcode = $row['postcode'];
            $order->status = $row['status'];
        }
        return $order;
    }
    
    public function createOrder(Order $order)
    {
         $sql = "INSERT INTO `order` (`name`, `address`, `city`, `postcode`, `status`) VALUES ('$order->name', '$order->address', '$order->city', '$order->postcode', '$order->status');";
         return $this->conn->statementReturnID($sql);
    }
    
    
    public function deleteOrder(Order $order)
    {
        $sql = "DELETE FROM `order` WHERE `id`='$order->id';";
        return $this->conn->statement($sql);
    }
    
    public function updateOrder(Order $order)
    {
        $sql = "UPDATE `order` SET `name`='$order->name', `address`='$order->address', `city`='$order->city', `postcode`='$order->postcode', `status`='$order->status' WHERE `id`='$order->id';";
        return $this->conn->statement($sql);
    }
}
