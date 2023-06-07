<?php
include_once '/var/www/html/madhu/form/libs/includes/database.class.php';

database::db_connect();

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    

$email = $_GET['email'];

$update=database::$conn->prepare("DELETE FROM `signup` WHERE `user_email`=?");

$update->bindParam(1, $email, PDO::PARAM_STR);

$result=$update->execute();

if ($result) {
    
    echo "row deleted  successfully.";
} else {
    echo "Error in deleting data: " . mysqli_error($conn);
}
} else {
    // Handle other HTTP methods or display an error message
    echo "Invalid request method.";
}


mysqli_close($conn);

?>
