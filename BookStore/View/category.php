<?php
include_once 'init.php';
$category_controler = new Category_controller();
if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

$category = $category_controler->loadCategory($_GET['id']) ;
$category_books = $category_controler->loadBooks($category);
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
         <div id="book_section">
             <h3>Books in category <?php echo $category->name; ?></h3>             
             <?php
                if(!empty($category_books))
                {
                    foreach($category_books as $book)
                    {
                        ?>
                <div class="book_category_item">
                    <a href='book.php?id=<?php echo $book->id; ?>'>
                        <?php echo $book->title ; ?>                        
                    </a>                        
                </div>
                        <?php
                    }
                }
                else{
                    echo 'No books in the category';
                }
                ?>
         </div>         
     </body>
 </html>

