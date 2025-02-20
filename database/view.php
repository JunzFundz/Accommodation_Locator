<?php
include(__DIR__ . '/../Classes/Users.php');
$view = new Users();

if(isset($_SESSION['u_id'])){
    $user_id = $_SESSION['u_id'];

    $result = $view->viewById($user_id);

}

if(isset($_GET['name']) && isset($_GET['type']) && isset($_GET['number'])){
    $id = $_GET['number'];

    $viewData = $view->viewData($id);

}