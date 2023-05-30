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
            database::$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            database::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'success';
            return database::$conn;

            }
            catch(PDOException $e)
            {
                echo "error message : ".$e->getMessage();
            }
    } 
    public static function closeConnection() {
        self::$conn = null;
    }
}


?>