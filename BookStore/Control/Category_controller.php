<?php
include_once '../Model/Book.php';
include_once '../Model/Category.php';
include_once '../Model/Order.php';
include_once '../Model/Manager.php';
include_once '../Model/BookOrder.php';
include_once 'Book_controller.php';
include_once 'DBConnection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category_controller
 *
 * @author Christian
 */
class Category_controller {
    private $conn;
    public function __construct() {
        $this->conn = new DBConnection();
    }  
    
    
    public function deleteCategory(Category $category)
    {
        $sql = "DELETE FROM book_category WHERE category_id = $category->id";
        $this->conn->statement($sql);
        $sql = "DELETE FROM category WHERE category_id = $category->id";
        $this->conn->statement($sql);
    }
     
    public function getAllCategories()
    {
        $sql = "SELECT * FROM Category";
        $result = $this->conn->query($sql);
        $categories = new ArrayObject();
        while($row = $result->fetch_assoc())
        {
            $cat = $this->loadCategory($row['id']);
            $categories->append($cat);
        }
        return $categories;
    }
    
     public function loadCategory($id)
    {
        $sql = "SELECT * FROM category WHERE id = $id";
        $result = $this->conn->query($sql);
        $category = new Category();
        while($row = $result->fetch_assoc())
        {
            $category->id = $row['id'];
            $category->name = $row['name'];
        }
        return $category;
    }
    
    public function loadBooks(Category $category)
    {
        $sql = "SELECT * FROM book_category WHERE category_id = $category->id";
        $result = $this->conn->query($sql);
        
        $book_ctr = new Book_controller();
        
        while($row = $result->fetch_assoc())
        {
            $book_id = $row['book_id'];
            $book = $book_ctr->getBookByID($book_id);
            
            $category->books->append($book);
        }
        return $category;
    }

    public function createCategory(Category $category)
    {
        return $this->conn->statementReturnID("INSERT INTO `category` (`name`) VALUES ('$category->name');");
    }
  
    public function updateCategory(Category $category)
    {
        return $this->conn->statement("UPDATE `bookstore`.`category` SET `name`='$category->name' WHERE `id`='$category->id';");    
    }
}
