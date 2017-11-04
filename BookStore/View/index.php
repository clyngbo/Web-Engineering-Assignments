<?php
include_once 'init.php';
$book_controller = new Book_controller();
$newest_books = $book_controller->getNewestBooks();
$special_offer_books = $book_controller->getSpecialOfferBooks();
$most_ordered_books = $book_controller->getMostOrderedBooks();
?>
<!DOCTYPE html>
 
 <html>
     <head>
        <meta charset="UTF-8">
        <meta name="description" content="Perfect book shop.">
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
         <div id="book_list">
             <p>
                 New in the store
             </p>
             <?php
                if(!empty($newest_books))
                {
                    foreach($newest_books as $book)
                    {
            ?>
                <div id="book_item">                   
                        <?php echo $book->title; ?>
                    
                </div>
                        <?php
                    }
                }
                else{
                    echo 'No new books';
                }
            ?>
         </div>
         <div id="book_list">
             <p>
                 Customers often buy
             </p>
             <?php
                if(!empty($most_ordered_books))
                {
                    foreach($most_ordered_books as $book)
                    {
                        ?>
                <div id="book_item">                   
                        <?php echo $book->title; ?>
                    
                </div>
                        <?php
                    }
                }
                else{
                    echo 'No popular books available';
                }
            ?>
         <div id="book_list">
             <p>              
                 Today's special offers            
             </p>
             <?php
                if(!empty($newest_books))
                {
                    foreach($newest_books as $book)
                    {
                        ?>
                <div id="book_item">                   
                        <?php echo $book->title; ?>
                    
                </div>
                        <?php
                    }
                }
                else{
                    echo 'No books are on sale today.';
                }
            ?>
         </div>
     </body>
 </html>

