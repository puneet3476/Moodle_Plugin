-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 27, 2020 at 05:30 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `Student_ID` int(12) UNSIGNED NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(60) DEFAULT NULL,
  `user_activation_code` varchar(60) DEFAULT NULL,
  `user_Roll_no` varchar(60) DEFAULT NULL,
  `user_email_status` varchar(20) DEFAULT NULL,
  `user_otp` int(20) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_avatar` varchar(250) DEFAULT NULL,
  `user_role` varchar(30) NOT NULL DEFAULT 'Student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `total_videos`
--

CREATE TABLE `total_videos` (
  `id` int(6) UNSIGNED NOT NULL,
  `folder_name` varchar(30) NOT NULL,
  `database_name` varchar(30) NOT NULL,
  `page_url` varchar(200) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `total_videos`
--
ALTER TABLE `total_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `Student_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_videos`
--
ALTER TABLE `total_videos`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
