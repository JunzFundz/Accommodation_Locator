<?php
include(__DIR__ . '/../Classes/Users.php');
$update = new Users();

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $result = $update->deleteProvider($id);

    if ($result) {
        $response = array(
            'success' => "Deleted successfully"
        );
    } else {
        $response = array(
            'error' => "An error occured"
        );
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $description = trim($_POST['description']);

    $result = $update->updateProvider($id, $name, $address, $price, $description);

    if ($result) {
        $response = array(
            'success' => "Updated successfully"
        );
    } else {
        $response = array(
            'error' => "An error occured"
        );
    }

    echo json_encode($response);
    exit;
}
