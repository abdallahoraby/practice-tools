-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 06:42 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awarenes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT current_timestamp(),
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `chatroom_status` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `chatroom_last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `pt_activate` tinyint(1) NOT NULL DEFAULT 0,
  `pt_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`pt_data`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `chatroom_status`, `chatroom_last_activity`, `pt_activate`, `pt_data`) VALUES
(1, 'admin', '$P$BSCzn.7wfLwP5FBq1lmzh0VP7l1TNr0', 'admin', 'webmaster@awarenesspathways.com', 'https://www.awarenesspathways.com', '2022-05-11 06:49:36', '', 0, 'admin', '', '2022-05-15 02:53:54', 0, NULL),
(6, 'maie', '$P$BZjaPmaAy2.qG/g8ahf8IjMpjnoRff0', 'Ahmed Dev', 'med@gmail.com', '', '2022-08-20 23:29:25', '1661038166:$P$BzJpjgggfkectVlX7g0bNhFSeRHAcx.', 0, 'maie', '', '2022-08-20 21:29:25', 1, '{\"ncode_1\":true,\"ncode_2\":true,\"ncode_3\":true,\"ncode_4\":false,\"baseline\":true,\"personal\":true,\"wheel\":true,\"decision\":true,\"define\":true}'),
(7, 'kholoood', '$P$BHDw5sqNQ8ASwPUsrKQrLQbqwb8tLx0', 'kholoood', 'koloode@gmail.com', '', '2022-08-21 10:07:02', '', 0, 'Kholood Al Ali', '', '2022-08-21 08:07:02', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
