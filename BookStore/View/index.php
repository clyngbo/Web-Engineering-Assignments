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
         <div class="book_list">
             <h4>
                 New in the store
             </h4>
             <table>
             <?php
                if(!empty($newest_books))
                {
                    foreach($newest_books as $book)
                    {
            ?>
                <td>
                <div class="book_item">
                    <a href='book.php?id=<?php echo $book->id; ?>'>
                        <img src='../Images/<?php echo $book->picture; ?>' />
                        <h5><?php echo $book->title; ?> </h5>
                        <p><?php echo $book->author; ?> </p>
                    </a>
                </div>
                </td>
                        <?php
                    }
                }
                else{
                    echo 'No new books';
                }
            ?>
             </table>
         </div>
         <div class="book_list">
             <h4>
                 Customers often buy
             </h4>
             <table>
             <?php
                if(!empty($most_ordered_books))
                {
                    foreach($most_ordered_books as $book)
                    {
                        ?>
                <td>
                <div class="book_item">
                    <a href='book.php?id=<?php echo $book->id; ?>'>
                        <img src='../Images/<?php echo $book->picture; ?>' />
                        <h5><?php echo $book->title; ?> </h5>
                        <p><?php echo $book->author; ?> </p>
                    </a>
                </div>
                </td>
                        <?php
                    }
                }
                else{
                    echo 'No popular books available';
                }
            ?>
             </table>
         </div>
         <div class="book_list">
             <h4>              
                 Today's special offers            
             </h4>
             <table>
             <?php
                if(!empty($special_offer_books))
                {
                    foreach($special_offer_books as $book)
                    {
                        ?>
                <td>
                <div class="book_item">
                    <a href='book.php?id=<?php echo $book->id; ?>'>
                        <img src='../Images/<?php echo $book->picture; ?>' />
                        <h5><?php echo $book->title; ?> </h5>
                        <p><?php echo $book->author; ?> </p>
                    </a>
                </div>
                </td>
                        <?php
                    }
                }
                else{
                    echo 'No books are on sale today.';
                }
            ?>
             </table>
         </div>
         </body>
 </html>

