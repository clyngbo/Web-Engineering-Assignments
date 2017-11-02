<?php include_once 'init.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'menu.php';
        $book_ctr = new Book_controller();
        $books = $book_ctr->getAllBooks();
        ?>
        <table class="bookTable">
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Description</th>
            <th>Inventory</th>
            <th>Price</th>
            <th>Categories</th>
            <?php
            foreach($books as $book)
            {
                ?>
            <tr>
                <td><?php echo $book->title; ?></td>
                <td><?php echo $book->author; ?></td>
                <td><?php echo $book->genre; ?></td>
                <td><?php echo $book->description; ?></td>
                <td><?php echo $book->inventory; ?></td>
                <td><?php echo $book->price; ?></td>
                <td><?php foreach($book->categories as $category)
                {
                    echo $category->name . '<br>';
                }
                ?></td>
            </tr>
                <?php
            }
            ?>
        </table>
        
    </body>
</html>
