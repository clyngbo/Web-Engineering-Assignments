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
    private $conn;
    function __construct() 
    {
        $this->conn = new DBConnection();
        $this->categories = new ArrayObject();
    }
    
    public function loadCategories()
    {
        $sql = "SELECT * FROM book_category WHERE book_id = $this->id";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc())
        {
            $book_id = $row['book_id'];
            $category = new Category();
            $category->loadCategory($book_id);
        }
    }

    public function loadBookByID($id)
    {
        $sql = "SELECT * FROM Book WHERE id = $id";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc())
        {
            $this->id = $row['id'];
            $this->title = $row['title'];
            $this->author = $row['author'];
            $this->genre = $row['genre'];
            $this->price = $row['price'];
            $this->description = $row['description'];
            $this->inventory = $row['inventory'];
        }
        $this->loadCategories();
    }
    
    public function createBook()
    {
        $sql = "INSERT INTO `book` (`title`, `author`, `genre`, `price`, `inventory`, `description`) VALUES ('$this->title', '$this->author', '$this->genre', '$this->price', '$this->inventory', '$this->description');";
        return $this->conn->statementReturnID($sql);
    }
    
    public function deleteBook()
    {
        $sql = "DELETE FROM Book WHERE id = $this->id";
        return $this->conn->statement($sql);
    }
    
    public function updateBook()
    {
        $sql = "UPDATE `book` SET `title`='$this->title', `author`='$this->author', `genre`='$this->genre', `price`='$this->price', `inventory`='$this->inventory', `description`='$this->description' WHERE `id`='$this->id';";
        return $this->conn->statement($sql);
    }
}

?>