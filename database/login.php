<?php
include("../Classes/Portal.php");
$login = new Login();


if (isset($_POST['login-user'])) {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

    $result = $login->login($password, $email);

    if ($result === 1) {
        $response = array(
            'error' => "Incorrect password",
        );
    } else if ($result === 2) {
        $response = array(
            'error' => "Account not found",
        );
    } else {
        $response = array(
            'redirect' => $result
        );
    }

    echo json_encode($response);
    exit;
}
