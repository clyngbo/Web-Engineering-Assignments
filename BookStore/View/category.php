<?php
include_once 'init.php';
$category_controler = new Category_controller();
if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

$category = $category_controler->loadCategory($_GET['id']) ;
$category_books = $category_controler->getBooksForCategory($category);
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
             <h3>Books in category <?php echo $category->name; ?></h3> 
             <hr>
             <?php
                if(!empty($category_books))
                {
                    foreach($category_books as $book)
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

