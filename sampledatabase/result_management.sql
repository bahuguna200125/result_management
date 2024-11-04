-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2024 at 05:55 AM
-- Server version: 8.0.39-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `admin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `mail`, `phone_no`, `password`, `admin`) VALUES
(1, 'Amit', 'Bahuguna', 'amitbahuguna55@gmail.com', '8192047322', 'amit', 1),
(2, 'Bhaskar ', 'Bahuguna', 'bhaskarbahuguna8@gmail.com', '8192047374', 'bhaskar', 0),
(3, 'Amit', 'Bahuguna', 'bahugunaamit2001@gmail.com', '8192047322', '1234', 0),
(5, 'amit', 'bahuguna', 'amitbahuguna200@gmail.com', '7409901855', '12345', 0),
(25, 'amit', 'bah', 'amitbahuguna2001@gmail.com', '8192047322', '12345', 0),
(26, 'mohit', 'bisht', 'mohit@124', '8192045566', '3344', 0),
(28, 'Nikhil ', 'Bahuguna', 'nikhilbahuguna1@gmail.com', '6398057567', '895427', 0),
(31, 'mohit', 'mehta', 'mehtamohit@gmail.com', '9456161280', '12345', 0),
(32, 'manish', 'pandey', 'manish200@gmail.com', '9412016259', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_result`
--

CREATE TABLE `user_result` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `hindi` int NOT NULL,
  `english` int NOT NULL,
  `maths` int NOT NULL,
  `physics` int NOT NULL,
  `chemistry` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_result`
--

INSERT INTO `user_result` (`id`, `user_id`, `hindi`, `english`, `maths`, `physics`, `chemistry`) VALUES
(7, 3, 90, 99, 99, 84, 71),
(12, 5, 90, 99, 97, 96, 95),
(13, 2, 77, 90, 82, 65, 90),
(19, 25, 55, 66, 77, 88, 99),
(21, 26, 90, 90, 90, 90, 90),
(22, 28, 90, 90, 19, 90, 90),
(25, 31, 23, 43, 54, 65, 76),
(26, 32, 45, 56, 76, 87, 98);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_result`
--
ALTER TABLE `user_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_result`
--
ALTER TABLE `user_result`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_result`
--
ALTER TABLE `user_result`
  ADD CONSTRAINT `user_result_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
