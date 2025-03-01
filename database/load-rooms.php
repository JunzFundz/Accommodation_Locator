<?php
include __DIR__ . "/../Classes/Users.php";
$load = new Users();

if(isset($_GET['id'])){
    $pid = $_GET['id'];

    $result = $load->showRooms($pid);
}

if(isset($_GET['number'])){
    $pid = $_GET['number'];

    $result = $load->showRooms($pid);
}