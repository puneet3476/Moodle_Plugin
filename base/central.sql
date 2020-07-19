-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2020 at 10:12 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `central`
--

-- --------------------------------------------------------

--
-- Table structure for table `total_videos`
--

CREATE TABLE `total_videos` (
  `id` int(6) UNSIGNED NOT NULL,
  `folder_name` varchar(30) NOT NULL,
  `database_name` varchar(30) NOT NULL,
  `page_url` varchar(200) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_videos`
--

INSERT INTO `total_videos` (`id`, `folder_name`, `database_name`, `page_url`, `creation_date`) VALUES
(9, 'Physics', 'physics', 'Location: http://localhost/Moodle_Plugin/Physics//load.php', '2020-07-19 15:07:27'),
(10, 'Coding', 'code', 'Location: http://localhost/Moodle_Plugin/Coding//load.php', '2020-07-19 16:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `student_id` int(12) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `realname` varchar(30) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`student_id`, `username`, `realname`, `role`, `password`) VALUES
(14, 'Admin', 'Prof. Jing', 'Teacher', 'admin!@#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `total_videos`
--
ALTER TABLE `total_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `total_videos`
--
ALTER TABLE `total_videos`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `student_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
