<?php

include("../Classes/Portal.php");
$reset = new Signup();


if (isset($_POST['update_pass'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $npass = $_POST['npassword'];
    $rpass = $_POST['rpassword'];

    if ($npass != $rpass) {
        echo json_encode(['error' => "Password didn't match"]);
        exit;
    }

    if (!$email || empty($npass)) {
        echo json_encode(['error' => "Invalid email or password"]);
        exit;
    }

    $result = $reset->forgotPassword($email, $npass);

    if ($result === 1) {
        $response = ['error' => "Incorrect password"];
    } else if ($result === 2) {
        $response = ['error' => "Account not found"];
    } else {
        $response = ['success' => "Password updated successfully"];
    }

    echo json_encode($response);
    exit;
}
