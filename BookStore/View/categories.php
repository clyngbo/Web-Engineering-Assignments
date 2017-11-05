<?php
include_once '../Control/Category_controller.php';


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getCategories() 
{
    $category_controller = new Category_controller();
    $categories = $category_controller->getAllCategories();
    ?>
<div id="categories-outer">
            <div id="categories-heading">
                <h2>Categories</h2>
            </div>    
            <div id="categories">
                <?php
                if(!empty($categories))
                {
                    foreach($categories as $cat)
                    {
                        ?>
                <div class="category">
                    <a href='category.php?id=<?php echo $cat->id; ?>'>
                        <?php echo $cat->name; ?>
                    </a>                        
                </div>
                        <?php
                    }
                }
                else{
                    echo 'Categories are unavailable';
                }
                ?>
            </div>
        </div>

    <?php
}