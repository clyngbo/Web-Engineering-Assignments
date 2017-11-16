<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Create Order</title>
    </head>
    <body>
        <script type="text/javascript">
        function addBook()
        {
            
        }
        function deleteBook(rowno)
        {
            
        }
        function loadBooks(rowno)
        {
            
        }
        </script>
        <?php
        include_once 'menu.php';
        
        ?>
        <form action="CreateOrder.php" method="post" id="create-order-form">
            <table id="order-table">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address"></td>
                </tr>
                <tr>
                    <td>Postcode</td>
                    <td><input type="text" name="postcode"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><select name="status"><option value="0">Error</option><option value="1">Not confirmed</option><option value="2">Confirmed</option><option value="3">Completed</option></select></td>
                </tr>
                <tr id="books-row">
                    <td>Books</td>
                    <td><tr id="row1">
                    <td>
                        <input id="count" name="count[]" type="number"/>
                    </td>
                    <td>
                        <select autocomplete="on" name="book[]" id="book" onload="loadbooks()"></select>
                    </td>
                </tr></td>
                </tr>
            </table>
            <input type="submit" value="Create Order" name="create-order-btn" />
        </form>
    </body>
</html>
