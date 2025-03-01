<?php
require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../vendor/autoload.php';

class Admin extends Dbh
{
    public function viewRequest()
    {
        $stmt = $this->connect()->query("
        SELECT * FROM tbl_registration r
        INNER JOIN tbl_users u ON r.u_id = u.u_id
        INNER JOIN tbl_personal_info p ON u.u_id = p.u_id
        WHERE r.r_status = 'pending'
        ");

        $result = $stmt->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function viewUploads()
    {
        $stmt = $this->connect()->query("SELECT * FROM tbl_provider r
        INNER JOIN tbl_users u ON r.u_id = u.u_id
        INNER JOIN tbl_personal_info p ON u.u_id = p.u_id
        WHERE r.p_status = 3
        ");

        $result = $stmt->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function viewIndividual($rid, $uid)
    {
        $stmt = $this->connect()->prepare("
        SELECT * FROM tbl_registration r
        INNER JOIN tbl_users u ON r.u_id = u.u_id
        INNER JOIN tbl_personal_info p ON u.u_id = p.u_id
        WHERE r.r_status = 'pending' AND r.r_id = ? AND u.u_id = ?
        ");
        $stmt->bind_param("ii", $rid, $uid);
        $stmt->execute();
        $result = $stmt->get_result();

        $user_data = $result->fetch_assoc();
        return $user_data;
    }

    public function checkUploads($pid)
    {
        $stmt = $this->connect()->prepare("
        SELECT * FROM tbl_provider 
        WHERE p_status = 3 AND p_id = ?
        ");
        $stmt->bind_param("i", $pid);
        $stmt->execute();
        $result = $stmt->get_result();

        $user_data = $result->fetch_assoc();
        return $user_data;
    }

    public function setApproveUpload($pid, $embedded)
    {
        $stmt = $this->connect()->prepare("UPDATE tbl_provider SET p_link = ?, p_date_added = NOW(), p_status = 1 WHERE p_id = ?");
        $stmt->bind_param("si", $embedded, $pid);
        $stmt->execute();
        $result = $stmt->affected_rows > 0;

        return $result;
    }

    public function setStatus($rid, $uid)
    {
        $conn = $this->connect();

        $stmt1 = $conn->prepare("UPDATE tbl_registration SET r_status = 'approved' WHERE r_id = ?");
        $stmt1->bind_param("i", $rid);
        $stmt1->execute();
        $affectedRows1 = $stmt1->affected_rows;
        $stmt1->close();

        $stmt2 = $conn->prepare("UPDATE tbl_personal_info SET pi_status = 1 WHERE u_id = ?");
        $stmt2->bind_param("i", $uid);
        $stmt2->execute();
        $affectedRows2 = $stmt2->affected_rows;
        $stmt2->close();

        return ($affectedRows1 > 0 || $affectedRows2 > 0);
    }

    public function setDeclined($rid)
    {
        $stmt = $this->connect()->prepare("UPDATE tbl_registration SET r_status = 'declined' WHERE r_id = ? ");
        $stmt->bind_param("i", $rid);
        $stmt->execute();
        $result = $stmt->affected_rows > 0;

        return $result;
    }

    public function showProviders()
    {
        $stmt = $this->connect()->query("SELECT DISTINCT pr.u_id, pr.p_img, pr.p_name, pr.p_id, pr.p_price, i.*, r.*, u.*
        FROM tbl_registration r
        INNER JOIN tbl_personal_info i ON i.u_id = r.u_id
        INNER JOIN tbl_provider pr ON pr.u_id = i.u_id
        INNER JOIN tbl_users u ON u.u_id = pr.u_id
        WHERE r.r_status = 'approved'");
        $result = $stmt->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function showItem($number)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_provider p
            INNER JOIN tbl_personal_info pi ON p.u_id = pi.u_id
            WHERE p.p_id = ?");

        $stmt->bind_param("i", $number);
        $stmt->execute();
        $result = $stmt->get_result();

        $items = $result->fetch_assoc();

        return $items;
    }

    public function showProfile($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_provider p 
        INNER JOIN tbl_personal_info i ON i.u_id = p.u_id 
        INNER JOIN tbl_users u ON u.u_id = i.u_id 
        WHERE i.u_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function showProvidersPage($limit = 3, $offset = 0)
    {
        $stmt = $this->connect()->prepare("SELECT *
            FROM tbl_registration r
            INNER JOIN tbl_personal_info i ON i.u_id = r.u_id
            INNER JOIN tbl_provider pr ON pr.u_id = i.u_id
            INNER JOIN tbl_users u ON u.u_id = pr.u_id
            WHERE r.r_status = 'approved'
            ORDER BY pr.p_id DESC
            LIMIT ? OFFSET ?");

        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $result;
    }


    public function showAdminData($user)
    {
        $stmt = $this->connect()->prepare("SELECT *
        FROM tbl_users WHERE u_id = ?");
        $stmt->bind_param("i", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        return $data;
    }

    public function allUsers()
    {
        $stmt = $this->connect()->query("SELECT DISTINCT pr.u_id, pr.p_img, pr.p_name, pr.p_id, pr.p_price, i.*, r.*, u.*,
        COUNT(DISTINCT pr.u_id) AS number_of_acc,
        COUNT(pr.p_id) AS number_of_us
        FROM tbl_registration r
        INNER JOIN tbl_personal_info i ON i.u_id = r.u_id
        INNER JOIN tbl_provider pr ON pr.u_id = i.u_id
        INNER JOIN tbl_users u ON u.u_id = pr.u_id
        GROUP BY pr.u_id");
        $result = $stmt->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function activate($id)
    {
        $conn = $this->connect();

        $conn->begin_transaction();

        try {
            $stmt1 = $conn->prepare("UPDATE tbl_registration SET r_status = 'approved' WHERE u_id = ?");
            $stmt1->bind_param("i", $id);
            $stmt1->execute();

            $stmt2 = $conn->prepare("UPDATE tbl_users SET u_verified = 'yes', u_status = 1 WHERE u_id = ? ");
            $stmt2->bind_param("i", $id);
            $stmt2->execute();

            $stmt3 = $conn->prepare("UPDATE tbl_rooms SET tr_status = 1 WHERE u_id = ?");
            $stmt3->bind_param("i", $id);
            $stmt3->execute();

            $stmt4 = $conn->prepare("UPDATE tbl_personal_info SET pi_status = 1 WHERE u_id = ?");
            $stmt4->bind_param("i", $id);
            $stmt4->execute();

            $stmt5 = $conn->prepare("UPDATE tbl_provider SET p_status = 1 WHERE u_id = ?");
            $stmt5->bind_param("i", $id);
            $stmt5->execute();

            return $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            return false;
        }
    }

    public function deactivate($id)
    {
        $conn = $this->connect();

        $conn->begin_transaction();

        try {
            $stmt1 = $conn->prepare("UPDATE tbl_registration SET r_status = 'deactivated' WHERE u_id = ?");
            $stmt1->bind_param("i", $id);
            $stmt1->execute();

            $stmt2 = $conn->prepare("UPDATE tbl_users SET u_verified = 'no', u_status = 3 WHERE u_id = ? ");
            $stmt2->bind_param("i", $id);
            $stmt2->execute();

            $stmt3 = $conn->prepare("UPDATE tbl_rooms SET tr_status = 3 WHERE u_id = ?");
            $stmt3->bind_param("i", $id);
            $stmt3->execute();

            $stmt4 = $conn->prepare("UPDATE tbl_personal_info SET pi_status = 3 WHERE u_id = ?");
            $stmt4->bind_param("i", $id);
            $stmt4->execute();

            $stmt5 = $conn->prepare("UPDATE tbl_provider SET p_status = 3 WHERE u_id = ?");
            $stmt5->bind_param("i", $id);
            $stmt5->execute();

            return $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            return false;
        }
    }
}
