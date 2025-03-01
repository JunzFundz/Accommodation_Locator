<?php
require_once('../database/connection.php');
$dbh = new Dbh();
$conn = $dbh->connect();

if (isset($_POST['filters'])) {
    $filters = $_POST['filters']; 

    file_put_contents('debug.log', print_r($filters, true), FILE_APPEND);

    if (!empty($filters)) {

        $conditions = array_fill(0, count($filters), "JSON_SEARCH(p_inclusion, 'one', ?) IS NOT NULL");
        $query = "SELECT COUNT(*) as count FROM tbl_provider WHERE p_status = 1 AND p_inclusion IS NOT NULL AND p_inclusion != '' AND JSON_VALID(p_inclusion) AND (" . implode(" OR ", $conditions) . ")";

        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die(json_encode(['count' => null, 'error' => "Query preparation failed: " . $conn->error]));
        }

        $types = str_repeat('s', count($filters));
        $stmt->bind_param($types, ...$filters);

        if (!$stmt->execute()) {
            die(json_encode(['count' => null, 'error' => "Query execution failed: " . $stmt->error]));
        }

        $result = $stmt->get_result();
        if ($result === false) {
            die(json_encode(['count' => null, 'error' => "get_result() failed: " . $stmt->error]));
        }

        $row = $result->fetch_assoc();
        $count = $row['count'];

        echo json_encode(['count' => $count]);
    } else {
        echo json_encode(['count' => 0]);
    }
} else {
    echo json_encode(['count' => 0, 'error' => "Invalid request."]);
}

?>
