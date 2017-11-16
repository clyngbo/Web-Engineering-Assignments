<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include_once 'init.php';

if(isset($_POST['create-category-btn']))
{
    $category_ctr = new Category_controller();
    $category = new Category();
    $category->name = $_POST['name'];
    $category_ctr->createCategory($category);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Category</title>
    </head>
    <body>
        <?php include_once 'menu.php'; ?>
        <form action="CreateCategory.php" method="post" id="create-category-form">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                
            </table>
            <input type="submit" value="Create Category" name="create-category-btn" />
        </form>
    </body>
</html>
