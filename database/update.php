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

if (isset($_POST['update_password'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
    $npass = filter_var(trim($_POST['npass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rpass = filter_var(trim($_POST['rpass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($npass != $rpass) {
        $response = array(
            'error' => "Password don't match"
        );
    }

    $hashedPassword = password_hash($rpass, PASSWORD_DEFAULT);

    $result = $update->updateUserPassword($id, $hashedPassword);

    if ($result) {
        $response = array(
            'success' => "Update successfully"
        );
    } else {
        $response = array(
            'error' => "An error occured"
        );
    }

    echo json_encode($response);
    exit;
}
