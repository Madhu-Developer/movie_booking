<?php
include_once '/var/www/html/madhu/form/libs/includes/database.class.php';

$email = $_GET['email'];


database::db_connect();

try{
    $delete=database::$conn->prepare("DELETE FROM `signup` WHERE `user_email`=?");
    $delete->bindParam(1, $email, PDO::PARAM_STR);
    
    
    //$insert->bindparm('siss',$uname,$phone,$email,$password);
    if($delete->execute()){
        $result = array(
            'message'=>'delete success'
            
        );
        http_response_code(200);
        $json = json_encode($result,JSON_PRETTY_PRINT);
    }else{
        $result = array(
            'message'=>'delete failed'
        
        );
        http_response_code(500);
        $json = json_encode($result,JSON_PRETTY_PRINT);
    }
    
}catch(exception $e){
    http_response_code(500);
    echo 'error message is '.$e->getMessage();
}



echo '<pre>'.$json.'</pre>';

?>