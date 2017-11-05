<?php
include_once 'init.php';
$book_controler = new Book_controller();
if (!isset($_GET['q'])) {
        header("Location: index.php");
        exit;
    }

$books = $book_controler->searchBooks($_GET['q']);
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
         <div class='main'>
         <div class="book_section">
             <h3>Books matching query '<?php echo $_GET['q'] ?>'</h3> 
             <hr>
             <?php
                if(!empty($books))
                {
                    foreach($books as $book)
                    {
                        ?>
                <div class="book_section_item">
                    <a href='book.php?id=<?php echo $book->id; ?>'>                        
                        <div class='book_section_item_image'><img src='../Images/<?php echo $book->picture; ?>' /></div>
                        <div class='book_section_item_content'>
                            <h5><?php echo $book->title; ?></h5>
                            <h6><?php echo $book->author; ?> </h6> 
                            <p><?php echo $book->description; ?></p>
                        </div>
                    </a> 
                </div>
                <hr>
                        <?php
                    }
                }
                else{
                    echo 'No books in the category';
                }
                ?>
         </div>         
         </div>
     </body>
 </html>

