<?php
require_once('../database/connection.php');
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Signup extends Dbh
{
    public function generateOtp()
    {
        return str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);
    }

    public function signup($fname, $lname, $email, $hashedPassword)
    {
        $otp = $this->generateOtp();
        $conn = $this->connect();

        // $checkStmt = $conn->prepare("SELECT u_email FROM tbl_users WHERE u_email = ?");
        // $checkStmt->bind_param("s", $email);
        // $checkStmt->execute();
        // $checkStmt->store_result();

        // if ($checkStmt->num_rows > 0) {
        //     return 1;
        // }

        session_start();

        $stmt = $conn->prepare("INSERT INTO tbl_users (u_fname, u_lname, u_email, u_pass, u_otp, u_otp_created, u_verified, u_date_created) VALUES (?,?,?,?,?,NOW(),'no',NOW())");

        if (!$stmt) {
            return 2;
        }

        $stmt->bind_param("ssssi", $fname, $lname, $email, $hashedPassword, $otp);

        if (!$stmt->execute()) {
            return 3;
        }
        $userId = $stmt->insert_id;
        $result = $conn->query("SELECT u_email, u_otp, u_id FROM tbl_users WHERE u_id = $userId");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['u_email'] = $row['u_email'];
            $_SESSION['u_id'] = $row['u_id'];

            $otp = $row['u_otp'];
            $email = $row['u_email'];

            $this->sendMail($email, $otp);

            return true;
        }
    }

    public function sendMail($email, $otp)
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username   = 'junzfundador142@gmail.com';
        $mail->Password   = 'dqrbvhpzxfouekae';

        $mail->setFrom('junzfundador142@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Here is the subject';
        $mail->Body    = "Hello $email,<br><br>Your OTP is: $otp<br><br>Best regards,<br>The Team";
        $mail->AltBody = "Hello ,\n\nYour OTP is:  $otp\n\nBest regards,\nThe Team";

        $mail->send();
    }

    public function isOtpValid($email, $otp, $id)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare("SELECT u_otp, u_otp_created FROM tbl_users WHERE u_email = ? AND u_otp = ? AND u_id = ?");
        $stmt->bind_param("sii", $email, $otp, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $otpCreatedTime = strtotime($row['u_otp_created']);
            $currentTime = time();

            if (($currentTime - $otpCreatedTime) <= 1200) {
                $this->setVerified($email, $id);
                return true;
            } else {
                return false;
            }
        }

        return false;
    }

    public function setVerified($email, $id)
    {
        $stmt = $this->connect()->prepare("UPDATE tbl_users SET u_verified = 'yes' WHERE u_email = ? AND u_id = ?");
        $stmt->bind_param("si", $email, $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function resendOtp($email, $id)
    {
        $otp = $this->generateOtp();
        $conn = $this->connect();

        $stmt = $conn->prepare("UPDATE tbl_users SET u_otp = ?, u_otp_created = NOW() WHERE u_id = ? AND u_email = ?");
        $stmt->bind_param("sis", $otp, $id, $email);

        if ($stmt->execute()) {
            $this->sendMail($email, $otp);
            return true;
        }

        return false;
    }
}
