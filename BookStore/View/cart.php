<?php
include_once 'init.php';
$book_controller = new Book_controller();
$books = new ArrayObject();
if (isset($_SESSION["cart_books"]) && count($_SESSION["cart_books"])>0) {
    foreach($_SESSION["cart_books"] as $id => $quantity) {
        $book = $book_controller->getBookByID($id);
        $books[$id] = $book;
    }
}

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
 
 <html>
     <head>
        <meta charset="UTF-8">
        <meta name="description" content="Perfect book shop.">
        <link rel="shortcut icon" type="image/png" href="../Images/favicon.png"/>
        <?php
            getCSS();
        ?>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Book store</title>
     </head>
     <body>
         <?php
            getHeader();
         ?>         
         <?php
            getCategories();
         ?>
         <div class="main">
             <div class="cart_books">
            <?php
               if (count($books) == 0) {
                   echo 'Shopping cart is empty';
               } else {
                   foreach($_SESSION["cart_books"] as $id => $quantity) {
                       echo $books[$id]->title;
                       echo $quantity;
                   }
               }
            ?>   
             </div>
         </div>
     </body>
 </html>