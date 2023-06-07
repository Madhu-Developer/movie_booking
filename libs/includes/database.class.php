<?php

class database
{
    public static $conn;
    public static function db_connect(){
        $servername='localhost';
        $username= 'madhu';
        $password='w1llres0lve';
        $dbname='trail';

        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return database::$conn=$conn;

            }
            catch(PDOException $e)
            {
                echo "error message : ".$e->getMessage();
            }
    } 
  
}


?>