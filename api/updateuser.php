<?php
include_once '/var/www/html/madhu/form/libs/includes/database.class.php';

database::db_connect();

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    
$putData = file_get_contents("php://input");
$data = json_decode($putData, true); // Assuming data is in JSON format

// Extract the necessary field
$phone = $data['phone'];
$email = $data['email'];

$update=database::$conn->prepare("UPDATE `signup` SET`user_phone`=? WHERE `user_email`=?");

$update->bindParam(1, $phone, PDO::PARAM_STR);
$update->bindParam(2, $email, PDO::PARAM_STR);

$result=$update->execute();

if ($result) {
    
    echo "Data updated successfully.";
} else {
    echo "Error updating data: " . mysqli_error($conn);
}
} else {
    // Handle other HTTP methods or display an error message
    echo "Invalid request method.";
}


mysqli_close($conn);

?>
