<?php
include '../Classes/Admin.php';
$set = new Admin();

if(isset($_POST['accept'])){
    $rid = $_POST['rid'];
    $uid = $_POST['uid'];

    $result = $set->setStatus($rid, $uid);

    if($result){
        $response = array(
            'success' => "Registration approved",
        );
    }else{
        $response = array(
            'error' => "An error occured try again later",
        );
    }

    echo json_encode($response);
    exit;
}

if(isset($_POST['declined'])){
    $rid = $_POST['rid'];

    $result = $set->setDeclined($rid);

    if($result){
        $response = array(
            'success' => "Registration declined",
        );
    }else{
        $response = array(
            'error' => "An error occured try again later",
        );
    }

    echo json_encode($response);
    exit;
}

if(isset($_POST['approve'])){
    $pid = $_POST['pid'];
    $embedded = $_POST['embedded'];

    $result = $set->setApproveUpload($pid, $embedded);

    if($result){
        $response = array(
            'success' => "Request updated",
        );
    }else{
        $response = array(
            'error' => "An error occured try again later",
        );
    }

    echo json_encode($response);
    exit;
}