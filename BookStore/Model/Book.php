<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Book
{
    public $id;
    public $author;
    public $genre;
    public $title;
    public $price;
    public $inventory;
    public $description;
    private $conn;
    function __construct() 
    {
        $this->conn = new DBConnection();
    }
    
    public function loadBookByID($id)
    {
        
    }
    
    public function createBook()
    {
        
    }
    
    public function deleteBook()
    {
        
    }
    
    public function updateBook()
    {
        
    }
}

?>