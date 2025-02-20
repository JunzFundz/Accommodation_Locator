<?php
include("../Classes/Users.php");
$apply = new Users();

session_start();

if (isset($_POST['apply'])) {
    $id = $_POST['id'];
    $brgy = $_POST['brgy'];
    $block = $_POST['block'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $gender = $_POST['gender'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $contact = $_POST['contact'];

    $result = $apply->apply($id, $fname, $lname, $mname, $brgy, $block, $street, $city, $zip, $gender, $contact);

    if ($result === 1) {
        $response = array('error' => "Error updating user information");
    } else if ($result === 2) {
        $response = array('error' => "There was an error inserting personal info");
    } else {
        $_SESSION['request_sent'] = true;
        $response = array(
            'success' => "Request sent successfully");
    }
    
    echo json_encode($response);
    exit;
    
}
