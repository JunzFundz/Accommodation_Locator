<?php
session_start();

include("../Classes/Portal.php");
$portal = new Signup();

if (isset($_POST['verify_otp'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp'];
    $id = $_POST['id'];

    $result = $portal->isOtpValid($email, $otp, $id);

    if ($result) {
        $response = array(
            'success' => "Account Verified",
        );
    } else {
        $response = array(
            'error' => "OTP expired or incorrect. Request a new OTP.",
        );
    }
    echo json_encode($response);
    exit;
}

if (isset($_POST['resend'])) {
    $email = $_POST['email'];
    $id = $_POST['id'];

    $result = $portal->resendOtp($email, $id);

    exit;
}
