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
    public $categories;
    public $added;
    public $discount;
    public $picture;
    function __construct() 
    {
        
        $this->categories = new ArrayObject();
    }
    
    
}

?>