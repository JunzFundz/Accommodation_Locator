<?php
include '../Classes/Admin.php';
$admin = new Admin();

if (isset($_POST['deactivate'])) {
    $id = $_POST['uid'];

    $result = $admin->deactivate($id);

    if ($result == 1) {
        $response = array(
            'success' => "Account was disabled"
        );
    } else {
        $response = array(
            'error' => "Deactivation not complete"
        );
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['activate'])) {
    $id = $_POST['uid'];

    $result = $admin->activate($id);

    if ($result == 1) {
        $response = array(
            'success' => "Account was activated"
        );
    } else {
        $response = array(
            'error' => "Activation not complete"
        );
    }

    echo json_encode($response);
    exit;
}
