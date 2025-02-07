<?php
session_start();

if (isset($_SESSION['u_email']) && isset($_SESSION['u_id'])) {
    $email = $_SESSION['u_email'];
    $id = $_SESSION['u_id'];
} else {
    $email = "No email found";
}

function maskEmail($email)
{
    $parts = explode("@", $email);
    $name = substr($parts[0], 0, 2);
    $maskedName = str_pad($name, strlen($parts[0]), "*");
    return $maskedName . "@" . $parts[1];
}
$maskedEmail = isset($email) ? maskEmail($email) : "No email found";

