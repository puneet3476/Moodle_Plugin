-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 08, 2020 at 11:14 PM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_teacher`
--

CREATE TABLE `register_teacher` (
  `teacher_name` varchar(30) NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `teacher_department` varchar(50) NOT NULL,
  `teacher_password` varchar(60) DEFAULT NULL,
  `teacher_activation_code` varchar(60) DEFAULT NULL,
  `teacher_ID` varchar(60) NOT NULL,
  `teacher_email_status` varchar(20) DEFAULT NULL,
  `teacher_otp` int(20) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teacher_avatar` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register_teacher`
--

INSERT INTO `register_teacher` (`teacher_name`, `teacher_email`, `teacher_department`, `teacher_password`, `teacher_activation_code`, `teacher_ID`, `teacher_email_status`, `teacher_otp`, `reg_date`, `teacher_avatar`) VALUES
('Puneet Khandelwalsir', 'puneet3476@yahoo.com', 'CS', '$2y$10$xuSu1X0B9R34fj9yFyANyeT8Rg..A69a.Jyai0npaCJYIC9Ur8Xpa', 'd2c3f13100f0b37d69081038e4c8ea71', 'T3476', 'verified', 127842, '2020-08-08 21:19:08', 'avatar/1596921454.png');

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

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`Student_ID`, `user_name`, `user_email`, `user_password`, `user_activation_code`, `user_Roll_no`, `user_email_status`, `user_otp`, `reg_date`, `user_avatar`, `user_role`) VALUES
(14, 'Puneet Khandelwal', 'puneet3476@gmail.com', '$2y$10$KtcZCa9RwyRNlngmpXiaCuin4JHTcnz2c9R9FxMWB6Nz6UvjJgAbG', '22003c931b0151510a014dfa16319d8c', '18MI3FP08', 'verified', 511402, '2020-08-06 12:32:41', 'avatar/1596717005.png', 'Student'),
(15, 'Puneet Khandelwal', 'puneet3476@yahoo.com', '$2y$10$UH6OErbaroUGQLnLCO0XsuQarLKSiDo7rkAeejb2rsn3mWLCDyPnC', '9fd6b7c8a133f27f33ff400bf52373ed', '18MI33016', 'not-verified', 674127, '2020-08-06 21:53:10', 'avatar/1596750790.png', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_teacher`
--
ALTER TABLE `register_teacher`
  ADD PRIMARY KEY (`teacher_ID`),
  ADD UNIQUE KEY `teacher_ID` (`teacher_ID`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `Student_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
