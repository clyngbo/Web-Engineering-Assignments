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
    
    public function getOrder($id)
    {
        $order = new Order();
        $order->loadOrder($id);
        return $order;
    }
    
    public function getOrderDetails(Order $order)
    {
        
    }

    public function deleteOrder(Order $order)
    {
        $book_order = new BookOrder();
        if($book_order->deleteBookOrder() && $order->deleteOrder())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function createOrder(Order $order, ArrayObject $bookOrders)
    {
        $success = FALSE;
        $order_id = $order->createOrder();
        if($order_id == 0)
        {
            return $success;
        }
        
        foreach ($bookOrders as $b)
        {
            $b->order_id = $order_id;
            if($b->createBookOrder() == FALSE)
            {
                return $success;
            }
        }
        $success = TRUE;
        return $success;
    }
    /**
     * Update things like name and address.
     * @param Order $order
     * @return boolean
     */
    public function updateOrder(Order $order)
    {
        return $order->updateOrder();
    }
    /**
     * Updates counts of books and books ordered.
     * @param BookOrder $book_order Instance of BookOrder with the new count of books ordered
     */
    public function updateOrderDetails(BookOrder $book_order)
    {
        return $book_order->updateBookOrder();
    }
}