<?php

require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../vendor/autoload.php';

class Users extends Dbh
{
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

    public function apply($id, $fname, $lname, $mname, $brgy, $block, $street, $city, $zip, $gender, $contact)
    {
        $stmt = $this->connect()->prepare("UPDATE tbl_users SET u_fname = ?, u_lname = ?, u_mname = ? WHERE u_id = ?");
        $stmt->bind_param("sssi", $fname, $lname, $mname, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $this->insertPersonalInfo($id, $brgy, $block, $street, $city, $zip, $gender, $contact);

        return $result;
    }

    public function insertPersonalInfo($id, $brgy, $block, $street, $city, $zip, $gender, $contact)
    {
        $status = 'pending';

        $stmt = $this->connect()->prepare("INSERT INTO tbl_personal_info (u_id, pi_gender, pi_contact, pi_brgy, pi_block, pi_street, pi_city, pi_zip, pi_date_added) VALUES (?,?,?,?,?,?,?,?,NOW())");
        $stmt->bind_param("issssssi", $id, $gender, $contact, $brgy, $block, $street, $city, $zip);
        $stmt->execute();

        $pid = $stmt->insert_id;
        $result = $this->connect()->query("INSERT INTO tbl_registration (u_id, pi_id, r_date_requested, r_status) VALUES ('$id', '$pid', NOW(), '$status')");

        if ($result) {
            return $result;
        } else {
            return 1;
        }
    }

    public function request($id, $name, $price, $type, $address, $description, $img)
    {
        $stmt = $this->connect()->prepare("INSERT INTO tbl_provider (u_id, p_name, p_img, p_desc, p_price, p_type, p_address, p_status) VALUES(?,?,?,?,?,?,?,3)");
        $stmt->bind_param("isssiss", $id, $name, $img, $description, $price, $type, $address);

        $result = $stmt->execute();
        return $result;
    }

    public function viewById($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_provider WHERE u_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $user_data = $result->fetch_all(MYSQLI_ASSOC);
        return $user_data;
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

    public function deleteProvider($id)
    {
        $stmt = $this->connect()->prepare("DELETE FROM tbl_provider WHERE p_id = ?");

        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows;
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
}
