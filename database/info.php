<?php
include("../Classes/Users.php");
$load = new Users();


if (isset($_POST['id'])) {
    $id = $_POST['id']; 

    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        echo json_encode(["error" => "INVALID ID"]);
        exit;  
    }

    $result = $load->loadInfo($id);
    echo json_encode($result);
    exit;
}

