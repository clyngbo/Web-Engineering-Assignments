<?php
include_once 'init.php';
$book_controller = new Book_controller();
if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

$book = $book_controller->getBookByID($_GET['id']);
$book_categories = $book_controller->getCategoriesForBook($book);
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
            <form method="post" action="cart_update.php">
                 <label>
                    <span>Quantity</span>
                     <?php
                        if (isset($_SESSION["cart_books"]) && isset($_SESSION["cart_books"][$book->id])) {
                            $quantity = $_SESSION["cart_books"[$book->id]];
                        } else {
                            $quantity = 1;
                        }
                     ?>
                    <input type="text" size="2" maxlength="2" name="book_quantity" value="<?php echo $quantity ?>" />
                </label>
    
                <input type="hidden" name="book_id" value=<?php echo $book->id ?> />
                <input type="hidden" name="type" value="add" />
                <input type="hidden" name="return_url" value=<?php echo $current_url ?> />
                <div align="center"><button type="submit" class="add_to_cart">Add to cart</button></div>
            </form>
         </div>  
         </div>
     </body>
 </html>