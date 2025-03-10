<?php
include(__DIR__ . '/../Classes/Users.php');
$update = new Users();

if (isset($_POST['add_prof']) && isset($_FILES['pic'])) {
    $id = $_POST['id'];
    $pic = $_FILES['pic']; // Get uploaded file

    $result = $update->uploadProfile($id, $pic); // Pass both ID & file

    if ($result) {
        $response = array('success' => "Profile picture uploaded successfully");
    } else {
        $response = array('error' => "An error occurred while uploading");
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $result = $update->deleteProvider($id);

    if ($result) {
        $response = array(
            'success' => "Deleted successfully"
        );
    } else {
        $response = array(
            'error' => "An error occured"
        );
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $description = trim($_POST['description']);

    $result = $update->updateProvider($id, $name, $address, $price, $description);

    if ($result) {
        $response = array(
            'success' => "Updated successfully"
        );
    } else {
        $response = array(
            'error' => "An error occured"
        );
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['update_password'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
    $npass = filter_var(trim($_POST['npass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rpass = filter_var(trim($_POST['rpass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($npass != $rpass) {
        $response = array(
            'error' => "Password don't match"
        );
    }

    $hashedPassword = password_hash($rpass, PASSWORD_DEFAULT);

    $result = $update->updateUserPassword($id, $hashedPassword);

    if ($result) {
        $response = array(
            'success' => "Update successfully"
        );
    } else {
        $response = array(
            'error' => "An error occured"
        );
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['update_pi_s'])) {
    $id = $_POST['id'];
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $mname = trim($_POST['mname']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $brgy = trim($_POST['brgy']);
    $block = trim($_POST['block']);
    $street = trim($_POST['street']);
    $city = trim($_POST['city']);
    $zip = trim($_POST['zip']);

    $result = $update->updateUserInfo($id, $fname, $lname, $mname, $phone, $email, $brgy, $block, $street, $city, $zip);

    if ($result) {
        $response = array('success' => "Information updated successfully");
    } else {
        $response = array('error' => "An error occurred while updating");
    }

    echo json_encode($response);
    exit;
}
?>
