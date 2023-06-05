<?php
include_once '/var/www/html/madhu/form/libs/includes/database.class.php';

parse_str(file_get_contents("php://input"), $_PUT);
$putData = $_PUT;

$requestmode = $_SERVER['REQUEST_METHOD'];
if($requestmode ==='PUT') {
    $uname = $putData ['uname'];
    $phone = $putData ['phone'];
    $email = $putData ['email'];
    $pass = $putData ['pass'];

    database::db_connect();

    try {
        $update=database::$conn->prepare("UPDATE `signup` SET `user_name`=?,`user_phone`=?,`user_password`=? WHERE `user_email`=?");
        $update->bindParam(1, $uname, PDO::PARAM_STR);
        $update->bindParam(2, $phone, PDO::PARAM_STR);
        $update->bindParam(3, $pass, PDO::PARAM_STR);
        $update->bindParam(4, $email, PDO::PARAM_STR);


        //$insert->bindparm('siss',$uname,$phone,$email,$password);
        $update->execute();
            $rowCount = $update->rowCount();
    
    if ($rowCount > 0) {
        // Update successful
        echo "Record updated successfully";
    } else {
        // No rows affected, update failed
        echo "Failed to update record";
    }
        
    } catch(exception $e) {
        http_response_code(500);
        echo 'error message is '.$e->getMessage();
    }



    echo '<pre>'.$json.'</pre>';
}else{
    http_response_code(405);
}
?>