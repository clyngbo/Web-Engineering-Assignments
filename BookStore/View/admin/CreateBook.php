<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'init.php';

if(isset($_POST['create-book-btn']))
{
    $book_ctr = new Book_controller();
    $category_ctr = new Category_controller();
    $book = new Book();
    $book->author = $_POST['author'];
    $book->description = $_POST['description'];
    $book->genre = $_POST['genre'];
    $book->inventory = $_POST['inventory'];
    $book->price = $_POST['price'];
    $book->title = $_POST['title'];
    $book->discount = $_POST['discount'];
    if(isset($_FILES['picture']) && $_FILES['picture']['error'] == 0)
    {
        $url_folder = "View/admin/pictures/";
        $folder = "pictures/";
        $book->picture = $url_folder . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES['picture']['name'], $folder. basename($_FILES['picture']['name']));
        
    }
    $book->id = $book_ctr->createBook($book);
    foreach ($_POST['category'] as $cat)
    {
        $category = $category_ctr->loadCategory($book->id);
        $book_ctr->addCategoryToBook($category, $book);
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Book</title>
    </head>
    <body>
        <?php include_once 'menu.php'; ?>
        <form action="CreateBook.php" method="post" id="create-book-form">
            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td><input type="text" name="author"></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" name="price"></td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td><input type="text" name="discount"></td>
                </tr>
                <tr>
                    <td>Genre</td>
                    <td><input type="text" name="genre"></td>
                </tr>
                <tr>
                    <td>Inventory</td>
                    <td><input type="number" name="inventory"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description"></textarea></td>
                </tr>
                <tr>
                    <td>Picture</td>
                    <td><input accept="image/*" name="picture" type="file" id="picture"/></td>
                </tr>
                <tr>
                    <td>Category</td>
                            <td><select name="category[]" multiple="multiple">
                        <?php
                        $category_ctr = new Category_controller();
                        $categories = $category_ctr->getAllCategories();
                        foreach ($categories as $cat)
                        {
                            ?><option value='<?php echo $cat->id; ?>'><?php echo $cat->name; ?></option><?php
                        }
                        ?>
                        </select></td>
                </tr>
            </table>
            <input type="submit" value="Create Book" name="create-book-btn" />
        </form>
    </body>
</html>
