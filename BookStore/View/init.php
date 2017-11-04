<?php

session_start();
foreach (glob("Model/*.php") as $filename)
{
    include_once $filename;
}
foreach (glob("Control/*.php") as $filename)
{
    include_once $filename;
}

include_once 'books.php';
include_once 'cart.php';
include_once 'categories.php';
include_once 'index.php';
include_once 'footer.php';
include_once 'header.php';


function getCSS()
{
    echo '<link rel="stylesheet" href="css.css">';
    echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />';

}

function getJS()
{
    echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';

    echo '<script type="text/javascript" src="js.js"></script>';
}
?>



