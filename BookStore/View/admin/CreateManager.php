<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include_once 'init.php';

if(isset($_POST['create-manager-btn']))
{
    $manager = new Manager();
    $manager->password = $_POST['password'];
    $manager->username = $_POST['username'];
    $manager_ctr = new Manager_controller();
    $manager_ctr->createManager($manager);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Manager</title>
    </head>
    <body>
        <?php include_once 'menu.php'; ?>
        <form action="CreateManager.php" method="post" id="create-category-form">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password"></td>
                </tr>
            </table>
            <input type="submit" value="Create Manager" name="create-manager-btn" />
        </form>
    </body>
</html>