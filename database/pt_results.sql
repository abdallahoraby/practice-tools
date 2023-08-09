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
-- Table structure for table `pt_results`
--

CREATE TABLE `pt_results` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ncode` text DEFAULT NULL,
  `baseline` text DEFAULT NULL,
  `personal` text DEFAULT NULL,
  `define` text DEFAULT NULL,
  `decision` text DEFAULT NULL,
  `wheel` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pt_results`
--

INSERT INTO `pt_results` (`id`, `user_id`, `ncode`, `baseline`, `personal`, `define`, `decision`, `wheel`) VALUES
(1, 6, '1. I am just not good enough#2. Fear of disappointing God#14. Too much energy into intellectual activities#12. Disconnected from my true self#3. Lack of faith in my own good or my own goals#11. I always have to sacrifice myself for the greater cause', '42#68#54#19#69#67#0#0', NULL, '14#18#23#20', NULL, '42#53#38#54#49#51#71#33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pt_results`
--
ALTER TABLE `pt_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pt_results`
--
ALTER TABLE `pt_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
