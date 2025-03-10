<?php

require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../vendor/autoload.php';

class Users extends Dbh
{
    public function getUserInfo2($id)
    {
        $conn = $this->connect();
        if (!$conn) {
            die("Database connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tbl_users WHERE u_id = ?";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Query preparation failed: " . $conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0 ? $result->fetch_assoc() : null;
    }
    public function getUserInfo($user)
    {
        $conn = $this->connect();
        if (!$conn) {
            die("Database connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT u.*, p.*, r.*, 
            COUNT(p.u_id) AS number_of_acc, 
            SUM(CASE WHEN r.p_status = 3 THEN 1 ELSE 0 END) AS number_of_req
        FROM tbl_users u
        INNER JOIN tbl_personal_info p ON p.u_id = u.u_id
        INNER JOIN tbl_provider r ON r.u_id = p.u_id
        WHERE u.u_id = ?
        GROUP BY u.u_id";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Query preparation failed: " . $conn->error);
        }

        $stmt->bind_param("i", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0 ? $result->fetch_assoc() : null;
    }
    public function showPP($user)
    {
        $conn = $this->connect();
        if (!$conn) {
            die("Database connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tbl_users where u_id = ?";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Query preparation failed: " . $conn->error);
        }

        $stmt->bind_param("i", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0 ? $result->fetch_assoc() : null;
    }

    public function loadInfo($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_users WHERE u_id =?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $userInfo = $result->fetch_assoc();
            return $userInfo;
        }
    }

    public function searchId($id)
    {
        $stmt = $this->connect()->prepare("SELECT u_id FROM tbl_registration WHERE u_id = ? AND r_status NOT IN ('declined')");

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkStatus($id)
    {
        $stmt = $this->connect()->prepare("SELECT r_status FROM tbl_registration WHERE u_id = ? ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = $result->fetch_assoc();
        return $data;
    }

    public function viewById($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_provider WHERE u_id = ? ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $user_data = $result->fetch_all(MYSQLI_ASSOC);
        return $user_data;
    }

    public function apply($id, $fname, $lname, $mname, $brgy, $block, $street, $city, $zip, $gender, $contact, $frontPath, $backPath)
    {
        $stmt = $this->connect()->prepare("UPDATE tbl_users SET u_fname = ?, u_lname = ?, u_mname = ? WHERE u_id = ?");
        $stmt->bind_param("sssi", $fname, $lname, $mname, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $this->insertPersonalInfo($id, $brgy, $block, $street, $city, $zip, $gender, $contact, $frontPath, $backPath);

        return $result;
    }

    public function insertPersonalInfo($id, $brgy, $block, $street, $city, $zip, $gender, $contact, $frontPath, $backPath)
    {
        $status = 'pending';

        $stmt = $this->connect()->prepare("INSERT INTO tbl_personal_info (u_id, pi_gender, pi_contact, pi_brgy, pi_block, pi_street, pi_city, pi_zip, pi_date_added,pi_status) VALUES (?,?,?,?,?,?,?,?,NOW(),3)");
        $stmt->bind_param("issssssi", $id, $gender, $contact, $brgy, $block, $street, $city, $zip);
        $stmt->execute();

        $pid = $stmt->insert_id;
        $result = $this->connect()->query("INSERT INTO tbl_registration (u_id, r_id_front, r_id_back, pi_id, r_date_requested, r_status) VALUES ('$id','$frontPath', '$backPath', '$pid', NOW(), '$status')");

        if ($result) {
            return $result;
        } else {
            return 1;
        }
    }

    public function request($id, $name, $price, $type, $address, $description, $img, $labels)
    {
        $stmt = $this->connect()->prepare("INSERT INTO tbl_provider (u_id, p_name, p_inclusion, p_img, p_desc, p_price, p_type, p_address, p_date_added, p_status) VALUES(?,?,?,?,?,?,?,?,NOW(),3)");
        $stmt->bind_param("issssiss", $id, $name, $labels, $img, $description, $price, $type, $address);

        $result = $stmt->execute();
        return $result;
    }

    public function addRoom($pid, $uid, $rprice, $rname, $comp, $description, $img)
    {
        $stmt = $this->connect()->prepare("INSERT INTO tbl_rooms (p_id, u_id, tr_name, tr_images, tr_price, tr_description, tr_date_added, tr_status) VALUES(?,?,?,?,?,?,NOW(),1)");
        $stmt->bind_param("iissis", $pid, $uid, $rname, $img, $rprice, $description);

        $result = $stmt->execute();
        return $result;
    }

    public function showRooms($pid)
    {
        $stmt = $this->connect()->prepare("SELECT *
        FROM tbl_rooms r
        INNER JOIN tbl_provider p ON p.p_id = r.p_id
        WHERE r.p_id = ?");
        $stmt->bind_param("i", $pid);
        $stmt->execute();
        $result = $stmt->get_result();
        $response = $result->fetch_all(MYSQLI_ASSOC);

        return $response;
    }

    public function getRoom($room)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_rooms WHERE tr_id = ?");
        $stmt->bind_param("i", $room);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $data['tr_images'] = json_decode($data['tr_images'], true);

        return $data;
    }

    public function deleteRoomImage($img, $id)
    {
        $stmt = $this->connect()->prepare("SELECT tr_images FROM tbl_rooms WHERE tr_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $imagePaths = json_decode($row['tr_images'], true);

            if (!is_array($imagePaths)) {
                return false;
            }

            if (($key = array_search($img, $imagePaths)) !== false) {
                unset($imagePaths[$key]);
            }

            $updatedImages = json_encode(array_values($imagePaths));

            $stmt = $this->connect()->prepare("UPDATE tbl_rooms SET tr_images = ? WHERE tr_id = ?");
            $stmt->bind_param("si", $updatedImages, $id);
            $stmt->execute();

            $imagePath = "../uploads/" . $img;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            return ($stmt->affected_rows > 0);
        }

        return false;
    }

    public function updateRoom($id, $name, $price, $description, $img)
    {
        $stmt = $this->connect()->prepare("UPDATE tbl_rooms SET tr_name = ? , tr_images = ? , tr_price = ?, tr_description = ? WHERE tr_id = ?");
        $stmt->bind_param("ssisi", $name, $img, $price, $description, $id);

        $result = $stmt->execute();
        return $result;
    }

    public function viewData($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_provider WHERE p_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $item = $result->fetch_assoc();
        return $item;
    }

    public function updateProvider($id, $name, $address, $price, $description)
    {
        $stmt = $this->connect()->prepare("UPDATE tbl_provider SET p_name= ?, p_desc = ?, p_price = ?, p_address = ? WHERE p_id = ?");

        $stmt->bind_param("ssisi", $name, $description, $price, $address, $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function deleteRoom($id)
    {
        $stmt = $this->connect()->prepare("SELECT tr_images FROM tbl_rooms WHERE tr_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $images = json_decode($row['tr_images'], true);

            if (is_array($images)) {
                foreach ($images as $image) {
                    $imagePath = realpath(__DIR__ . "/../uploads/" . trim($image));

                    if (!empty($image) && file_exists($imagePath)) {
                        chmod($imagePath, 0777);
                        if (unlink($imagePath)) {
                            error_log("Deleted: " . $imagePath);
                        } else {
                            error_log("Failed to delete: " . $imagePath);
                        }
                    } else {
                        error_log("Not found: " . $imagePath);
                    }
                }
            } else {
                $imagePath = realpath(__DIR__ . "/../uploads/" . trim($row['tr_images']));

                if (!empty($row['tr_images']) && file_exists($imagePath)) {
                    chmod($imagePath, 0777);
                    if (unlink($imagePath)) {
                        error_log("Deleted: " . $imagePath);
                    } else {
                        error_log("Failed to delete: " . $imagePath);
                    }
                } else {
                    error_log("Not found: " . $imagePath);
                }
            }
        }

        $stmt = $this->connect()->prepare("DELETE FROM tbl_rooms WHERE tr_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->affected_rows;
    }

    public function deleteRoomProvider($id)
    {
        $stmt = $this->connect()->prepare("SELECT tr_images FROM tbl_rooms WHERE p_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $images = json_decode($row['tr_images'], true);

            if (is_array($images)) {
                foreach ($images as $image) {
                    $imagePath = realpath(__DIR__ . "/../uploads/" . trim($image));

                    if (!empty($image) && file_exists($imagePath)) {
                        chmod($imagePath, 0777);
                        if (unlink($imagePath)) {
                            error_log("Deleted: " . $imagePath);
                        } else {
                            error_log("Failed to delete: " . $imagePath);
                        }
                    } else {
                        error_log("Not found: " . $imagePath);
                    }
                }
            } else {
                $imagePath = realpath(__DIR__ . "/../uploads/" . trim($row['tr_images']));

                if (!empty($row['tr_images']) && file_exists($imagePath)) {
                    chmod($imagePath, 0777);
                    if (unlink($imagePath)) {
                        error_log("Deleted: " . $imagePath);
                    } else {
                        error_log("Failed to delete: " . $imagePath);
                    }
                } else {
                    error_log("Not found: " . $imagePath);
                }
            }
        }

        $stmt = $this->connect()->prepare("DELETE FROM tbl_rooms WHERE p_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->affected_rows;
    }

    public function deleteProvider($id)
    {
        $stmt = $this->connect()->prepare("SELECT p_img FROM tbl_provider WHERE p_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $images = json_decode($row['p_img'], true);

            if (is_array($images)) {
                foreach ($images as $image) {
                    $imagePath = realpath(__DIR__ . "/../uploads/" . trim($image));

                    if (!empty($image) && file_exists($imagePath)) {
                        chmod($imagePath, 0777);
                        if (unlink($imagePath)) {
                            error_log("Deleted: " . $imagePath);
                        } else {
                            error_log("Failed to delete: " . $imagePath);
                        }
                    } else {
                        error_log("Not found: " . $imagePath);
                    }
                }
            } else {
                $imagePath = realpath(__DIR__ . "/../uploads/" . trim($row['p_img']));

                if (!empty($row['p_img']) && file_exists($imagePath)) {
                    chmod($imagePath, 0777);
                    if (unlink($imagePath)) {
                        error_log("Deleted: " . $imagePath);
                    } else {
                        error_log("Failed to delete: " . $imagePath);
                    }
                } else {
                    error_log("Not found: " . $imagePath);
                }
            }
        }

        $stmt = $this->connect()->prepare("DELETE FROM tbl_provider WHERE p_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows) {
            return $this->deleteRoomProvider($id);
        }
    }

    public function showItem($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_provider p
            INNER JOIN tbl_personal_info pi ON p.u_id = pi.u_id
            WHERE p.p_id = ?");

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $items = $result->fetch_assoc();

        return $items;
    }

    public function showroomById($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_rooms r INNER JOIN tbl_provider p ON r.p_id = p.p_id WHERE r.tr_id = ?");

        if (!$stmt) {
            die("SQL Error: " . $this->connect()->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function showroomProfile($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_rooms WHERE tr_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $items = $result->fetch_assoc();

        return $items;
    }

    public function updateUserPassword($id, $hashedPassword)
    {
        $stmt = $this->connect()->prepare("UPDATE tbl_users SET u_pass = ? WHERE u_id = ?");

        $stmt->bind_param("si", $hashedPassword, $id);
        $result = $stmt->execute();

        return $result;
    }

    public function uploadProfile($id, $file)
    {
        $uploadDir = __DIR__ . "/../uploads/";
        $fileName = basename($file["name"]);
        $targetFilePath = $uploadDir . $fileName;

        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        if (!in_array($fileType, $allowedTypes)) {
            return false;
        }

        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {

            $stmt = $this->connect()->prepare("UPDATE tbl_users SET u_profile = ? WHERE u_id = ?");
            $stmt->bind_param("si", $fileName, $id);
            $stmt->execute();

            return $stmt->affected_rows > 0;
        }

        return false;
    }

    public function updateUserInfo($id, $fname, $lname, $mname, $phone, $email, $brgy, $block, $street, $city, $zip)
    {
        $stmt = $this->connect()->prepare("UPDATE tbl_users SET 
            u_fname = ?, 
            u_lname = ?, 
            u_mname = ?, 
            u_email = ? 
            WHERE u_id = ?");
        $stmt->bind_param("ssssi", $fname, $lname, $mname, $email, $id);
        $stmt->execute();

        if ($stmt->affected_rows >= 0) {
            $stmt = $this->connect()->prepare("UPDATE tbl_personal_info SET 
                pi_contact = ?, 
                pi_brgy = ?, 
                pi_block = ?, 
                pi_street = ?, 
                pi_city = ?, 
                pi_zip = ? 
                WHERE u_id = ?");
            $stmt->bind_param("ssssssi", $phone, $brgy, $block, $street, $city, $zip, $id);
            $stmt->execute();

            return $stmt->affected_rows >= 0;
        }

        return false;
    }
}
