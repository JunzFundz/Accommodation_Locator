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

    // Validate required fields
    if (empty($id) || empty($fname) || empty($lname) || empty($brgy) || empty($block) || empty($street) || empty($city) || empty($zip) || empty($gender) || empty($contact)) {
        echo json_encode(['error' => "All fields are required."]);
        exit;
    } elseif (!preg_match('/^[0-9]{4,6}$/', $zip)) {
        echo json_encode(['error' => "Invalid ZIP code format."]);
        exit;
    } elseif (!preg_match('/^[0-9]{10,11}$/', $contact)) {
        echo json_encode(['error' => "Invalid contact number format."]);
        exit;
    } elseif (!in_array($gender, ['m', 'f'])) {
        echo json_encode(['error' => "Invalid gender selection."]);
        exit;
    }

    // File upload handling
    $uploadDir = "../uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB limit

    $uploadedFiles = [];

    foreach (['front', 'back'] as $fileKey) {
        if (!empty($_FILES[$fileKey]['name'])) {
            $file = $_FILES[$fileKey];
            $fileName = time() . "_" . basename($file['name']);
            $fileTmp = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Validate file type
            if (!in_array($fileExt, $allowedExtensions)) {
                echo json_encode(["error" => "Invalid file type for $fileKey. Only JPG, PNG, and PDF allowed."]);
                exit;
            }

            // Validate file size
            if ($fileSize > $maxFileSize) {
                echo json_encode(["error" => "$fileKey exceeds the 5MB size limit."]);
                exit;
            }

            // Move uploaded file
            if (move_uploaded_file($fileTmp, $uploadDir . $fileName)) {
                $uploadedFiles[$fileKey] = $uploadDir . $fileName;
            } else {
                echo json_encode(["error" => "Failed to upload $fileKey."]);
                exit;
            }
        }
    }

    $frontPath = $uploadedFiles['front'] ?? null;
    $backPath = $uploadedFiles['back'] ?? null;

    $result = $apply->apply($id, $fname, $lname, $mname, $brgy, $block, $street, $city, $zip, $gender, $contact, $frontPath, $backPath);

    if ($result === 1) {
        echo json_encode(['error' => "Error updating user information"]);
    } elseif ($result === 2) {
        echo json_encode(['error' => "There was an error inserting personal info"]);
    } else {
        $_SESSION['request_sent'] = true;
        echo json_encode(['success' => "Request sent successfully"]);
    }
    exit;
}


// if (isset($_POST['apply'])) {
//     $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
//     $brgy = filter_var(trim($_POST['brgy']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     $block = filter_var(trim($_POST['block']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     $street = filter_var(trim($_POST['street']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     $city = filter_var(trim($_POST['city']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     $zip = filter_var(trim($_POST['zip']), FILTER_SANITIZE_NUMBER_INT);
//     $gender = filter_var(trim($_POST['gender']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     $fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     $mname = filter_var(trim($_POST['mname']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     $contact = filter_var(trim($_POST['contact']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//     if (empty($id) || empty($fname) || empty($lname) || empty($brgy) || empty($block) || empty($street) || empty($city) || empty($zip) || empty($gender) || empty($contact)) {
//         $response = array('error' => "All fields are required.");
//     } elseif (!preg_match('/^[0-9]{4,6}$/', $zip)) {
//         $response = array('error' => "Invalid ZIP code format.");
//     } elseif (!preg_match('/^[0-9]{10,11}$/', $contact)) {
//         $response = array('error' => "Invalid contact number format.");
//     } elseif (!in_array($gender, ['m', 'f'])) {
//         $response = array('error' => "Invalid gender selection.");
//     } else {
        
//         $result = $apply->apply($id, $fname, $lname, $mname, $brgy, $block, $street, $city, $zip, $gender, $contact);

//         if ($result === 1) {
//             $response = array('error' => "Error updating user information");
//         } elseif ($result === 2) {
//             $response = array('error' => "There was an error inserting personal info");
//         } else {
//             $_SESSION['request_sent'] = true;
//             $response = array('success' => "Request sent successfully");
//         }
//     }

//     echo json_encode($response);
//     exit;
// }
