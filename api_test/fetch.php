<?php
// Include the PDO connection file
require_once 'conn.php';

// Retrieve the query parameter from the API request
$query = 'select * from signup';

try {
    // Prepare and execute the query
    $statement = $conn->prepare($query);
    $statement->execute();

    // Fetch the results
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Convert the results to JSON and send the response
    header('Content-Type: application/json');
    echo json_encode($results);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
