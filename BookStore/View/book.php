<?php
include_once 'init.php';
$book_controller = new Book_controller();
if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

$book = $book_controller->getBookByID($_GET['id']);
$book_categories = $book_controller->getCategoriesForBook($book)

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
         <div class="book_view">
             <h3><?php echo $book->title ?></h3>
             <h4><?php echo $book->author?></h4>
             <table><td>
             <th><img src='../Images/<?php echo $book->picture; ?>' /></td>
             <td valign="top">
             <p><?php echo $book->description?></p>
             </td>  
             </tr></table>
            <div class="book_view_categories">
                   <?php
               if(!is_null($book_categories) and !empty($book_categories))
               {
                   echo '<p> The book can be found in these categories: ';
                   foreach($book_categories as $cat)
                   {
                       ?>
                <span class="book_view_category_tag">
                   <a href='category.php?id=<?php echo $cat->id; ?>'>
                       <?php echo $cat->name; ?>
                   </a>   
                </span>
                       <?php
                   }
                   echo '</p>';
               }
               else 
               {                
                   echo 'The book has no assigned categories.';
               }
               ?>
            </div>             
         </div>  
         </div>
     </body>
 </html>