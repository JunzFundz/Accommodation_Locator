<?php
require_once('../database/connection.php');
$dbh = new Dbh();
$conn = $dbh->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $min_price = isset($_POST['min_price']) ? (int) $_POST['min_price'] : 0;
    $max_price = isset($_POST['max_price']) ? (int) $_POST['max_price'] : 7000;

    $query = "SELECT COUNT(*) AS count FROM tbl_provider WHERE p_status = 1 AND p_price BETWEEN ? AND ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $min_price, $max_price);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    echo json_encode(['count' => $count]);
} else {
    echo json_encode(['error' => 'Invalid request']);
}
