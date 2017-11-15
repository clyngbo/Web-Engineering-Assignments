<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getHeader() 
{
?>
<header>
    <table id='header' style="width:100%">
        <tr>
            <td>
                <div id='store_name'>
                    <a href='index.php' style="text-decoration:none">
                        <img src='../Images/book_icon.png' />
                        <h1>Book Store</h1>
                    </a>        
                </div>
            </td>
            <td style="text-align:right">
		<form id="tfnewsearch" method="get" action="search.php">
		        <input type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="Search" class="tfbutton">
		</form>
            <div class="tfclear"></div>                           
            </td> 
            <td style="text-align:right">
                <a href='cart.php' text-color='red'><img src="../Images/cart.png" style="height:50pt; width:50pt" /></a>                            
            </td>     
        </tr>
    </table>
    
</header>

    <?php
}