<?php
include("../Classes/Users.php");
$apply = new Users();

session_start();

if (isset($_POST['apply'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
    $brgy = filter_var(trim($_POST['brgy']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $block = filter_var(trim($_POST['block']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $street = filter_var(trim($_POST['street']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $city = filter_var(trim($_POST['city']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $zip = filter_var(trim($_POST['zip']), FILTER_SANITIZE_NUMBER_INT);
    $gender = filter_var(trim($_POST['gender']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mname = filter_var(trim($_POST['mname']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $contact = filter_var(trim($_POST['contact']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (empty($id) || empty($fname) || empty($lname) || empty($brgy) || empty($block) || empty($street) || empty($city) || empty($zip) || empty($gender) || empty($contact)) {
        $response = array('error' => "All fields are required.");
    } elseif (!preg_match('/^[0-9]{4,6}$/', $zip)) {
        $response = array('error' => "Invalid ZIP code format.");
    } elseif (!preg_match('/^[0-9]{10,11}$/', $contact)) {
        $response = array('error' => "Invalid contact number format.");
    } elseif (!in_array($gender, ['m', 'f'])) {
        $response = array('error' => "Invalid gender selection.");
    } else {
        
        $result = $apply->apply($id, $fname, $lname, $mname, $brgy, $block, $street, $city, $zip, $gender, $contact);

        if ($result === 1) {
            $response = array('error' => "Error updating user information");
        } elseif ($result === 2) {
            $response = array('error' => "There was an error inserting personal info");
        } else {
            $_SESSION['request_sent'] = true;
            $response = array('success' => "Request sent successfully");
        }
    }

    echo json_encode($response);
    exit;
}
