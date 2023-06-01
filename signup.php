<?php
// var_dump(file_exists('libs/includes/user.class.php'));
include (__DIR__.'/libs/load.php');
include_once('libs/includes/user.class.php');
include_once 'libs/includes/database.class.php';

include_once(__DIR__.'/libs/includes/user.class.php');
$signup = false;

if(isset($_GET['uname']) && isset($_GET['phone']) && isset($_GET['email']) && isset($_GET['password'])){
    $uname= $_GET['uname'];
    $phone = $_GET['phone'];
    $email= $_GET['email'];
    $password = $_GET['password'];
    if(User::check_email($email)){
        $error= User::insert_user($uname,$phone,$email,$password);
        $signup = true;
    }  
}

if($signup){
    if(!$error){
        echo 'something went wrong';
        
    }else{ 
// <!-- this is signup = true and error = true   -->
        load_Template('__signup');
        User::getuserdata($email);

        echo '<table>';
        echo '<tr>';
        echo'<th> username </th>';
        echo'<th> phone </th>';
        echo'<th> email </th>';
        echo '</tr>';
        foreach(User::$rows as $data ){
            echo '<tr>';
            echo '<td>'.$data['user_name'].'</td>';
            echo '<td>'.$data['user_phone'].'</td>';
            echo '<td>'.$data['user_email'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}else{
        // <!--  this is the else part of signup = false  -->
        load_Template('__signup');
}
?>
