-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2025 at 09:30 AM
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
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `n_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_personal_info`
--

INSERT INTO `tbl_personal_info` (`pi_id`, `u_id`, `pi_gender`, `pi_contact`, `pi_brgy`, `pi_block`, `pi_street`, `pi_city`, `pi_zip`, `pi_date_added`, `pi_status`) VALUES
(33, 83, 'f', '11111111111', 'fdgdsf', '543634', 'fdsgsd34', 'dffdsaasdf', 3423, '2025-03-09 12:59:47', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_provider`
--

INSERT INTO `tbl_provider` (`p_id`, `u_id`, `p_name`, `p_inclusion`, `p_img`, `p_desc`, `p_price`, `p_type`, `p_address`, `p_link`, `p_date_added`, `p_status`) VALUES
(55, 83, '3423sdfsd', '[\"LCC\"]', '[\"1741562573_logo.png\",\"1741562573_ACLS-removebg-preview.png\"]', 'AsdASD ASDASDRfdgbdfs sdfsdf', 800, 'hs', 'asdfasD', '', '2025-03-09 23:22:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

DROP TABLE IF EXISTS `tbl_registration`;
CREATE TABLE IF NOT EXISTS `tbl_registration` (
  `r_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `r_id_front` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `r_id_back` varchar(255) NOT NULL,
  `pi_id` int NOT NULL,
  `r_date_requested` timestamp NOT NULL,
  `r_status` varchar(20) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`r_id`, `u_id`, `r_id_front`, `r_id_back`, `pi_id`, `r_date_requested`, `r_status`) VALUES
(44, 83, '../uploads/1741525187_codes4.png', '../uploads/1741525187_codes3.png', 33, '2025-03-09 12:59:47', 'approved');

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`tr_id`, `p_id`, `u_id`, `tr_name`, `tr_images`, `tr_price`, `tr_description`, `tr_date_added`, `tr_status`) VALUES
(19, 55, 83, 'Room 1', '[\"1741575056_codes2.png\",\"1741575056_codes3.png\",\"1741612355_b74d7a8f-f8c7-487b-9510-832bde273788.jpg\",\"1741612355_477462940_627223103589233_7691313705986979258_n.png\",\"1741612355_87fc1ee5-0fda-413e-b8c8-564013dd7228.jpg\",\"1741612355_1737388619389.jpg\"]', 700, 'dsolsdjfiogj opijfdgjiodfgj dgdfg', '2025-03-10 02:50:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `u_profile` varchar(255) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`u_id`, `u_profile`, `u_fname`, `u_lname`, `u_mname`, `u_email`, `u_pass`, `u_otp`, `u_otp_created`, `u_verified`, `u_date_created`, `u_status`) VALUES
(81, '', 'Haish', 'new', 'name', 'haish207@gmail.com', '$2y$10$2kIWN2UUtXbae8jHHzJ.lOkuxpMNrLD3MioHPu1eAJQsBbxT7vKvG', 104496, '2025-03-03 23:35:11', 'yes', '2025-03-04 07:35:11', 1),
(83, '01200056.jpg', 'Junz', 'Fundador', 'Caday', 'fundadordiongie@gmail.com', '$2y$10$RyBewZeJZXK0P8XhCNg3gO7GMPkXTrxkWOVrLFd/7sTe1Q/DjhW5K', 108701, '2025-03-08 08:20:47', 'yes', '2025-03-08 16:20:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(6, 'junzfundador142@gmai', 'admin12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
