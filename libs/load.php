<?php

include_once(__DIR__.'/includes/user.class.php');
include_once __DIR__."/includes/database.class.php";


function load_Template($name){
    //  print(" includeing ". __DIR__."/../_templates/$name.php ");   *path* 
    include "/var/www/html/madhu/form/__templates/$name.php";  
}

