<?php
include_once 'init.php';
//add product to session or create new one

if(isset($_POST["type"]) && $_POST["type"]=='add' && isset($_POST["book_quantity"]) && $_POST["book_quantity"]>0 && isset($_POST["book_id"]))
{
    $book_id = $_POST["book_id"];
    if(!isset($_SESSION["cart_books"])){
        $_SESSION["cart_books"] = new ArrayObject();
    }
    $_SESSION["cart_books"][$book_id] = $_POST["book_quantity"];
}


if(isset($_POST["type"]) && $_POST["type"]=='delete' && isset($_POST["book_id"]))
{
    unset($_SESSION["cart_books"][$book_id]);        
}

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):'';
header('Location:'.$return_url);
