<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
foreach (glob("../../Control/*.php") as $filename)
{
    include_once $filename;
}
foreach (glob("../../Model/*.php") as $filename)
{
    include_once $filename;
}