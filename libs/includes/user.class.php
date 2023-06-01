<?php

include_once __DIR__.'/database.class.php';

class User{
    public static $insert_valid ;
    public static $rows;


    public  static function insert_user($uname,$phone,$email,$password){
            database::db_connect();

        // alter TABLE signup add CONSTRAINT check_phone CHECK (user_phone REGEXP '^[0-9]{10}$');
        // regular expresion is used for phone number coloumn
        try{
            $insert=database::$conn->prepare("INSERT INTO `signup`(`user_name`, `user_phone`, `user_email`, `user_password`) VALUES (?,?,?,?)");
            $insert->bindParam(1, $uname, PDO::PARAM_STR);
            $insert->bindParam(2, $phone, PDO::PARAM_STR); 
            $insert->bindParam(3, $email, PDO::PARAM_STR);
            $insert->bindParam(4, $password, PDO::PARAM_STR);
            //$insert->bindparm('siss',$uname,$phone,$email,$password);
            $insert->execute();
            return user::$insert_valid=true;
        }catch(exception $e){
            echo 'error message is '.$e->getMessage();
        }
    }

    public static function check_email($email){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
              }else{
                return true;
              }
        
    }

    public static function getuserdata($email){
        database::db_connect();
        try{
            $query_fetch = "SELECT user_name,user_phone,user_email FROM signup order by user_id desc";
            //$query_fetch = "SELECT * FROM signup WHERE user_email = :email";
            $fetch = database::$conn->prepare($query_fetch);
            // $fetch->bindValue(':email', $email);
            $fetch->execute();
            User::$rows = $fetch->fetchAll(PDO::FETCH_ASSOC);
            return User::$rows;
             // $query_fetch = "SELECT * FROM signup WHERE user_email = :email";
            // $fetch = database::$conn->query($query_fetch);
            // $fetch->bindValue(':email',$email);
            // $fetch->execute();
            // $rows = $fetch->fetchAll(PDO::FETCH_ASSOC);
            
        }catch(Exception $e){
            echo'error message : '.$e->getMessage();
        }
        
    }
}

