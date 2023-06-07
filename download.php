<?php

$servername='localhost';
$password='w1llres0lve';
$dbname='movies_db';
$username= 'madhu';

$customer_id = $_GET['id'];


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT customers.customer_id, customers.customer_name, customers.customer_email,
        GROUP_CONCAT(DISTINCT movies.movie_name) AS movie_booked,
        SUM(booking.no_of_tickets) AS count_of_tickets_booked,
        AVG(booking.total_price) as avg_spend 
        FROM booking 
        JOIN sms_price ON sms_price.sms_id = booking.sms_id
        JOIN movies ON movies.movie_id = sms_price.movie_id
        JOIN customers ON customers.customer_id = booking.customer_id
        WHERE customers.customer_id = $customer_id
        AND YEAR(booking.booking_date) = 2023 
        GROUP BY customers.customer_id";

$result = $conn->query($sql);

if ($result) {

    $file = fopen('php://memory', 'w');

    $headers = ['Customer ID', 'Customer Name', 'Customer Email', 'Movies Booked', 'Tickets Booked','Spend'];
    fputcsv($file, $headers);

    while ($row = $result->fetch_assoc()) {

            fputcsv($file, $row);
        
        
    }

    rewind($file);

    $csvData = stream_get_contents($file);

    fclose($file);

    $secureFilePath = "";
    $secureFileQuery = "SHOW VARIABLES LIKE 'secure_file_priv'";
    $secureFileResult = $conn->query($secureFileQuery);
    if ($secureFileResult && $secureFileResult->num_rows > 0) {
        $row = $secureFileResult->fetch_assoc();
        $secureFilePath = $row['Value'];
    }

    $csvFilePath = $secureFilePath .$customer_id.'_'.date('d-M-Y H:i:s').'.csv';


    file_put_contents($csvFilePath, $csvData);

    echo "CSV file created successfully at: " . $csvFilePath;
} else {
    echo "Error executing the SQL query: " . $conn->error;
}

// Close the MySQL connection
$conn->close();
?>
