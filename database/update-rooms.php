<?php
include __DIR__ . "/../Classes/Users.php";
require_once "connection.php";
$get = new Users();
$db = new Dbh();
$conn = $db->connect();

if (isset($_POST['get_data'])) {
    $room = $_POST['tid'];
    $result = $get->getRoom($room);

    if (!isset($result['tr_images'])) {
        $result['tr_images'] = [];
    }

    echo json_encode($result);
}

if (isset($_POST['delete_image'])) {
    $img = $_POST['image_name'];
    $id = $_POST['room_id'];

    if (empty($img) || empty($id)) {
        echo json_encode(['error' => 'Invalid data provided']);
        exit;
    }

    $result = $get->deleteRoomImage($img, $id);

    if ($result) {
        echo json_encode(['success' => "Image deleted"]);
    } else {
        echo json_encode(['error' => 'Image not deleted']);
    }

    exit;
}

if (isset($_POST['delete_room'])) {
    $id = $_POST['id'];

    if (empty($id)) {
        echo json_encode(['error' => 'Invalid data provided']);
        exit;
    }

    $result = $get->deleteRoom($id);

    if ($result) {
        echo json_encode(['success' => "Room deleted"]);
    } else {
        echo json_encode(['error' => 'Image not deleted']);
    }

    exit;
}

if (isset($_POST['update_room'])) {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $name = isset($_POST['name']) ? filter_var(trim($_POST['name']), FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0.0;
    $description = isset($_POST['description']) ? filter_var(trim($_POST['description']), FILTER_SANITIZE_SPECIAL_CHARS) : '';

    if ($id <= 0 || empty($name) || $price <= 0) {
        echo json_encode(['error' => "Invalid input data"]);
        exit;
    }

    $uploadDir = "../uploads/";
    $uploadedImages = [];

    $stmt = $conn->prepare("SELECT tr_images FROM tbl_rooms WHERE tr_id = ?");
    if (!$stmt) {
        echo json_encode(['error' => "SQL Error: " . $conn->error]); 
        exit;
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $existingImages = [];
    if ($row = $result->fetch_assoc()) {
        $existingImages = json_decode($row['tr_images'], true) ?: [];
    }

    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            $imageName = time() . "_" . basename($_FILES['images']['name'][$key]);
            $targetFilePath = $uploadDir . $imageName;

            if (move_uploaded_file($tmpName, $targetFilePath)) {
                $uploadedImages[] = $imageName;
            }
        }
    }

    $finalImages = array_merge($existingImages, $uploadedImages);

    $updatedImagesJSON = json_encode($finalImages);

    $stmt = $conn->prepare("UPDATE tbl_rooms SET tr_name = ?, tr_price = ?, tr_description = ?, tr_images = ? WHERE tr_id = ?");
    if (!$stmt) {
        echo json_encode(['error' => "SQL Error: " . $conn->error]); 
        exit;
    }

    $stmt->bind_param("sissi", $name, $price, $description, $updatedImagesJSON, $id);
    $updateResult = $stmt->execute();

    if ($updateResult) {
        echo json_encode(['success' => "Room updated successfully!", 'images' => $finalImages]);
        exit;
    } else {
        echo json_encode(['error' => "Failed to update room."]);
        exit;
    }
}



// if (isset($_POST['update_room'])) {
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $price = $_POST['price'];
//     $description = $_POST['description'];

//     $imagePaths = [];
//     $uploadDir = "../uploads/";
    
//     if (!empty($_FILES['images']['name'][0])) {
//         if (!is_dir($uploadDir)) {
//             mkdir($uploadDir, 0777, true);
//         }

//         foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
//             if ($_FILES['images']['error'][$key] === 0) {
//                 $fileName = time() . "_" . $_FILES['images']['name'][$key];
//                 $filePath = $uploadDir . $fileName;

//                 if (move_uploaded_file($tmp_name, $filePath)) {
//                     $imagePaths[] = $fileName;
//                 } else {
//                     echo json_encode(["status" => "error", "message" => "File upload failed"]);
//                     exit;
//                 }
//             }
//         }
//     }

//     $img = !empty($imagePaths) ? json_encode($imagePaths) : NULL;

//     $result = $get->updateRoom($id, $name, $price, $description, $img);
    
//     if ($result) {
//         $response = array(
//             'success' => "Room updated!",
//         );
//     } else {
//         $response = array(
//             'error' => "There was an error adding the item",
//         );
//     }
//     echo json_encode($response);
//     exit;
// }
