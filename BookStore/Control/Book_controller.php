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
 * Description of Book_controller
 *
 * @author Christian
 */
class Book_controller {
    private $conn;
    public function __construct() {
        $this->conn= new DBConnection();
    }
    
    public function getAllBooks()
    {
        $sql = "SELECT id FROM book";
        $books = new ArrayObject();
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc())
        {
            $id = $row['id'];
            $book = new Book();
            $book->loadBookByID($id);
            $books->append($book);
        }
        return $books;
    }
    
    public function getBook($id)
    {
        $book = new Book();
        $book->loadBookByID($id);
        return $book;
    }
    
    public function createBook(Book $book)
    {
        return $book->createBook();
    }
    
    public function deleteBook(Book $book)
    {
        return $book->deleteBook();
    }
    
    public function updateBook(Book $book)
    {
        return $book->updateBook();
    }
    
    public function getCategoriesForBook($book_id)
    {
        $book = new Book();
        $book->loadBookByID($book_id);
        return $book->categories;
    }
    
    public function deleteBookCategory(Category $category, Book $book)
    {
        $sql = "DELETE FROM book_category WHERE category_id = $category->id AND book_id = $book->id";
        return $this->conn->statement($sql);
    }
    
    public function addCategoryToBook(Category $category, Book $book)
    {
        $sql = "INSERT INTO book_category(book_id, category_id) VALUES($book->id, $category->id)";
        return $this->conn->statement($sql);
    }
   
}
?>