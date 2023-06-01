<?php
$path= __DIR__;

echo __DIR__;

var_dump(file_exists(__DIR__.'/libs/includes/database.class.php'));
include($path.'/libs/load.php');
load_template('__signup');