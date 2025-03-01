-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 01, 2025 at 06:52 AM
-- Server version: 8.2.0
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_info`
--

DROP TABLE IF EXISTS `tbl_personal_info`;
CREATE TABLE IF NOT EXISTS `tbl_personal_info` (
  `pi_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `pi_gender` varchar(10) NOT NULL,
  `pi_contact` varchar(255) NOT NULL,
  `pi_brgy` varchar(255) NOT NULL,
  `pi_block` varchar(255) NOT NULL,
  `pi_street` varchar(255) NOT NULL,
  `pi_city` varchar(255) NOT NULL,
  `pi_zip` int NOT NULL,
  `pi_date_added` timestamp NOT NULL,
  `pi_status` int NOT NULL,
  PRIMARY KEY (`pi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_personal_info`
--

INSERT INTO `tbl_personal_info` (`pi_id`, `u_id`, `pi_gender`, `pi_contact`, `pi_brgy`, `pi_block`, `pi_street`, `pi_city`, `pi_zip`, `pi_date_added`, `pi_status`) VALUES
(26, 80, 'f', '11111111111', '1', '888', 'roxas', 'bais', 6206, '2025-03-01 06:09:01', 1),
(25, 79, 'm', '09319158016', 'II', 'N/A', 'Tavera', 'Bais city', 6206, '2025-02-28 11:53:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provider`
--

DROP TABLE IF EXISTS `tbl_provider`;
CREATE TABLE IF NOT EXISTS `tbl_provider` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_inclusion` varchar(5000) NOT NULL,
  `p_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `p_desc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `p_price` int NOT NULL,
  `p_type` varchar(20) NOT NULL,
  `p_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `p_link` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `p_date_added` timestamp NOT NULL,
  `p_status` int NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_provider`
--

INSERT INTO `tbl_provider` (`p_id`, `u_id`, `p_name`, `p_inclusion`, `p_img`, `p_desc`, `p_price`, `p_type`, `p_address`, `p_link`, `p_date_added`, `p_status`) VALUES
(46, 79, 'Linda\'a bording house', '[\"NORSU Campus 1\",\"Private room\",\" Bathroom\",\"Kitchen\"]', '[\"1740751658_1236664.jpg\",\"1740751658_351159691_211126931748745_9085733395367522681_n.jpg\"]', 'Nice and comfortable', 1500, 'lh', 'Bais city sad', 'https://www.google.com/maps/embed?pb=!4v1740800990867!6m8!1m7!1sJRzupZMk0DJCY_q_Ld237g!2m2!1d9.592441774816951!2d123.1207863680925!3f177.7911674092644!4f-10.206471798675793!5f0.7820865974627469', '2025-02-28 14:09:53', 1),
(47, 80, 'feliz', '[\"\\n                            Shared room\\n                        \",\" Bathroom\",\"Kitchen\",\" Air conditioned\",\"\\n                            Wifi\\n                        \"]', '[\"1740809628_514-5149231_madara-uchiha-blue-outfit-hd-png-download.png\"]', 'near amorganda guest house', 5000, 'hs', 'hshshshshsh', 'https://www.google.com/maps/embed?pb=!4v1740800990867!6m8!1m7!1sJRzupZMk0DJCY_q_Ld237g!2m2!1d9.592441774816951!2d123.1207863680925!3f177.7911674092644!4f-10.206471798675793!5f0.7820865974627469', '2025-03-01 06:16:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

DROP TABLE IF EXISTS `tbl_registration`;
CREATE TABLE IF NOT EXISTS `tbl_registration` (
  `r_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `pi_id` int NOT NULL,
  `r_date_requested` timestamp NOT NULL,
  `r_status` varchar(20) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`r_id`, `u_id`, `pi_id`, `r_date_requested`, `r_status`) VALUES
(37, 80, 26, '2025-03-01 06:09:01', 'approved'),
(36, 79, 25, '2025-02-28 11:53:36', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

DROP TABLE IF EXISTS `tbl_rooms`;
CREATE TABLE IF NOT EXISTS `tbl_rooms` (
  `tr_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `u_id` int NOT NULL,
  `tr_name` varchar(255) NOT NULL,
  `tr_images` varchar(255) NOT NULL,
  `tr_price` int NOT NULL,
  `tr_description` varchar(10000) NOT NULL,
  `tr_date_added` timestamp NOT NULL,
  `tr_status` int NOT NULL,
  PRIMARY KEY (`tr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`tr_id`, `p_id`, `u_id`, `tr_name`, `tr_images`, `tr_price`, `tr_description`, `tr_date_added`, `tr_status`) VALUES
(10, 47, 80, 'room 1', '[\"1740809935_Logoweb.png\",\"1740809990_Linux.jpg\",\"1740810005_Linux.jpg\"]', 2000, 'hahahah', '2025-03-01 06:18:55', 1),
(9, 46, 79, 'Room 1', '[\"1740799452_Linux.jpg\"]', 1000, 'Bed spacer good for 2 person', '2025-03-01 03:24:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `u_fname` varchar(255) NOT NULL,
  `u_lname` varchar(255) NOT NULL,
  `u_mname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_otp` int NOT NULL,
  `u_otp_created` timestamp NOT NULL,
  `u_verified` varchar(255) NOT NULL,
  `u_date_created` datetime NOT NULL,
  `u_status` int NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`u_id`, `u_fname`, `u_lname`, `u_mname`, `u_email`, `u_pass`, `u_otp`, `u_otp_created`, `u_verified`, `u_date_created`, `u_status`) VALUES
(79, 'Junz', 'Fundador', 'Caday', 'fundadordiongie@gmail.com', '$2y$10$lCVND3049tObbH7FxryqQOthpqR.lp4v9r0tLKr7j6.0Vbrmy.iue', 574587, '2025-02-28 11:36:38', 'yes', '2025-02-28 19:36:38', 1),
(72, '111', '111', '', 'junzfundador142@gmail.com', '$2y$10$ZC58LWw4G7OLAFt3jp32veKBWNVRRpTP3fJD///YsE3w3EZF6xbp.', 755967, '2025-02-07 11:44:02', 'yes', '2025-02-07 19:44:02', 1),
(80, 'jonacel', 'jay ann', 'ocat', 'haish207@gmail.com', '$2y$10$7cLNoBUNskbqW7ANAtCbnuTvgq2EIUb1hFMPpeEgiiGNLvPi/d9GO', 930437, '2025-03-01 06:05:32', 'yes', '2025-03-01 14:04:51', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
