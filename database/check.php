<?php
include(__DIR__ . '/../Classes/Users.php');

$load = new Users();

if (isset($_SESSION['u_id'])) {
    $id = $_SESSION['u_id'];
    $user = $_SESSION['u_id'];

    if (filter_var($id, FILTER_VALIDATE_INT)) {
        $result = $load->searchId($id);
        $data = $load->viewById($id);
        $checkStatus = $load->checkStatus($id);
        $new = $load->getUserInfo($user);

        return true;
    }
}