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
 * Description of Category_controller
 *
 * @author Christian
 */
class Category_controller {
    private $conn;
    public function __construct() {
        $this->conn = new DBConnection();
    }
    
    public function createCategory(Category $category)
    {
        $category->createCategory();
    }
    
    public function deleteCategory(Category $category)
    {
        $sql = "DELETE FROM book_category WHERE category_id = $category->id";
        $this->conn->statement($sql);
        $sql = "DELETE FROM category WHERE category_id = $category->id";
        $this->conn->statement($sql);
    }
    
    public function updateCategory(Category $category)
    {
        return $category->updateCategory();
    }
    
    public function getCategory($id)
    {
        $cat = new Category();
        $cat->loadCategory($id);
        return $cat;
    }
    
    public function getAllCategories()
    {
        $sql = "SELECT * FROM Category";
        $result = $this->conn->query($sql);
        $categories = new ArrayObject();
        while($row = $result->fetch_assoc())
        {
            $cat = new Category();
            $cat->loadCategory($row['id']);
            $categories->append($cat);
        }
        return $categories;
    }
}
