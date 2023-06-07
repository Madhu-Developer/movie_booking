<?php
include_once '/var/www/html/madhu/form/libs/includes/database.class.php';
$uname = $_POST['uname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$requestmode = $_SERVER['REQUEST_METHOD'];

if($requestmode=='POST') {



database::db_connect();

try{
    $insert=database::$conn->prepare("INSERT INTO `signup`(`user_name`, `user_phone`, `user_email`, `user_password`) VALUES (?,?,?,?)");
    $insert->bindParam(1, $uname, PDO::PARAM_STR);
    $insert->bindParam(2, $phone, PDO::PARAM_STR); 
    $insert->bindParam(3, $email, PDO::PARAM_STR);
    $insert->bindParam(4, $pass, PDO::PARAM_STR);
    //$insert->bindparm('siss',$uname,$phone,$email,$password);
    if($insert->execute()){
        $result = array(
            'message'=>'insert success'
            
        );
        http_response_code(200);
        $json = json_encode($result,JSON_PRETTY_PRINT);
    }else{
        $result = array(
            'message'=>'insert failed'
        
        );
        http_response_code(500);
        $json = json_encode($result,JSON_PRETTY_PRINT);
    }
    
}catch(exception $e){
    http_response_code(500);
    echo 'error message is '.$e->getMessage();
}



echo '<pre>'.$json.'</pre>';
}else{
    http_response_code(405);
}
?>