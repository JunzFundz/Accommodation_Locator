<?php
include('connection.php');
$dbh = new Dbh();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tr_id = intval($_POST['tr_id']);
    $status = intval($_POST['status']);

    $conn = $dbh->connect();

    $stmt = $conn->prepare("UPDATE tbl_rooms SET tr_status = ? WHERE tr_id = ?");
    $stmt->bind_param("ii", $status, $tr_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Status updated successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to update status"]);
    }

    $stmt->close();
    $conn->close();
}
?>