<?php
include("../Classes/Users.php");
$load = new Users();

if (isset($_POST['add_room'])) {
    $uid = $_POST['uid'];
    $pid = $_POST['pid'];
    $comp = $_POST['comp'];
    $rprice = $_POST['rprice'];
    $rname = $_POST['rname'];
    $description = $_POST['description'];

    $imagePaths = [];
    $uploadDir = "../uploads/";
    

    if (!empty($_FILES['images']['name'][0])) {
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['images']['error'][$key] === 0) {
                $fileName = time() . "_" . $_FILES['images']['name'][$key];
                $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($tmp_name, $filePath)) {
                    $imagePaths[] = $fileName;
                } else {
                    echo json_encode(["status" => "error", "message" => "File upload failed"]);
                    exit;
                }
            }
        }
    }

    $img = !empty($imagePaths) ? json_encode($imagePaths) : NULL;

    $result = $load->addRoom($pid, $uid, $rprice, $rname, $comp, $description, $img);
    
    if ($result) {
        $response = array(
            'success' => "Room added!",
        );
    } else {
        $response = array(
            'error' => "There was an error adding the item",
        );
    }
    echo json_encode($response);
    exit;
}

if (isset($_POST['add_acc'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $address = $_POST['address'];
    $description = $_POST['description'];

    $imagePaths = [];
    $uploadDir = "../uploads/";

    if (!empty($_FILES['images']['name'][0])) {
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['images']['error'][$key] === 0) {
                $fileName = time() . "_" . $_FILES['images']['name'][$key];
                $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($tmp_name, $filePath)) {
                    $imagePaths[] = $fileName;
                } else {
                    echo json_encode(["status" => "error", "message" => "File upload failed"]);
                    exit;
                }
            }
        }
    }

    $img = !empty($imagePaths) ? json_encode($imagePaths) : NULL;

    $result = $load->request($id, $name, $price, $type, $address, $description, $img);
    
    if ($result) {
        $response = array(
            'success' => "Item added please wait for the host to validate!",
        );
    } else {
        $response = array(
            'error' => "There was an error adding the item",
        );
    }
    echo json_encode($response);
    exit;
}
