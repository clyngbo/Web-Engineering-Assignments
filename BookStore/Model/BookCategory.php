<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class BookCategory
{
    private $conn;
    public $book_id;
    public $category_id;
    
    public function __construct() {
        $this->conn = new DBConnection();
    }
    
    public function loadBookCategory($category_id)
    {
        
    }
    public function createBookCategory()
    {
        
    }
    
    public function deleteBookCategory()
    {
        
    }
    public function updateBookCategory()
    {
        
    }
}
?>
