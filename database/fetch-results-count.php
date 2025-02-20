<?php

require_once('connection.php');
$dbh = new Dbh();
$conn = $dbh->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['filters'])) {
    $filters = $_POST['filters'];

    // Create placeholders for query
    $placeholders = implode(',', array_fill(0, count($filters), '?'));

    // Prepare SQL query
    $query = "SELECT COUNT(*) AS count FROM tbl_provider WHERE p_location IN ($placeholders)";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo json_encode(['error' => 'Query preparation failed: ' . $conn->error]);
        exit;
    }

    // Create parameter types string (all "s" for strings)
    $types = str_repeat('s', count($filters));

    // Bind parameters dynamically
    $stmt->bind_param($types, ...$filters);

    // Execute query
    if (!$stmt->execute()) {
        echo json_encode(['error' => 'Query execution failed: ' . $stmt->error]);
        exit;
    }

    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    // Return JSON response
    echo json_encode(['count' => $count]);
} else {
    echo json_encode(['error' => 'Invalid request or empty filters']);
}
