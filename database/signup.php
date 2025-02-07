<?php

include("../Classes/Portal.php");
$sup = new Signup();

if (isset($_POST['signup'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     die("Invalid email address.");
    // }

    // if (strlen($pass) < 8 || !preg_match('/[A-Z]/', $pass) || !preg_match('/[0-9]/', $pass)) {
    //     die("Password must be at least 8 characters long, include at least one uppercase letter and one number.");
    // }

    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    $input = $sup->signup($fname, $lname, $email, $hashedPassword);

    if ($input === 1) {
        $response = array(
            'error' => "Email already taken",
        );
    } else if ($input === 2) {
        $response = array(
            'error' => "There was an error executing",
        );
    } else if ($input === 3) {
        $response = array(
            'error' => "There was an error creating your account!",
        );
    } else {
        $response = array(
            'id' => $_SESSION['u_id'],
            'email' => $_SESSION['u_email'],
            'success' => "Account created go to home to Log in",
        );
    }

    echo json_encode($response);
    exit;
}
