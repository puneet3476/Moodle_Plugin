-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2020 at 03:35 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `user_name` varchar(30) NOT NULL,
  `video_name` varchar(50) NOT NULL,
  `course_name` varchar(60) DEFAULT NULL,
  `user_roll_no` varchar(60) DEFAULT NULL,
  `score` int(20) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`user_name`, `video_name`, `course_name`, `user_roll_no`, `score`, `reg_date`) VALUES
('Puneet Khandelwal', 'Torque', 'Physics', '18MI33016', 0, '2020-08-11 13:15:13'),
('Puneet Khandelwal', 'Torque', 'Physics', '18MI33016', 0, '2020-08-11 13:15:18'),
('Puneet Khandelwal', 'Torque', 'Physics', '18MI33016', 0, '2020-08-11 13:15:23'),
('Deepam banerjee', 'Torque', 'Physics', '18TE10001', 0, '2020-08-11 15:19:29'),
('Puneet Khandelwal', 'Torque', 'Physics', '18MI3FP08', 0, '2020-08-11 15:20:04'),
('Puneet Khandelwal', 'Torque', 'Physics', '18MI3FP08', 0, '2020-08-11 15:20:10'),
('Puneet Khandelwal', 'Torque', 'Physics', '18MI3FP08', 0, '2020-08-11 15:20:11'),
('Puneet Khandelwal', 'Torque', 'Physics', '18MI3FP08', 0, '2020-08-11 15:20:19'),
('Deepam banerjee', 'Torque', 'Physics', '18TE10001', 0, '2020-08-11 15:20:23'),
('Deepam banerjee', 'Torque', 'Physics', '18TE10001', 0, '2020-08-11 15:20:24'),
('Deepam banerjee', 'Torque', 'Physics', '18TE10001', 0, '2020-08-11 15:20:24'),
('Deepam banerjee', 'Torque', 'Physics', '18TE10001', 0, '2020-08-11 15:20:25'),
('Deepam banerjee', 'Torque', 'Physics', '18TE10001', 0, '2020-08-11 15:20:25'),
('Deepam banerjee', 'Torque', 'Physics', '18TE10001', 0, '2020-08-11 15:20:26'),
('Deepam banerjee', 'Torque', 'Physics', '18TE10001', 0, '2020-08-11 15:24:31'),
('Deepam banerjee', 'Torque', 'Physics', '18TE10001', 0, '2020-08-11 15:24:32'),
('Shuvomoy Dey', 'Torque', 'Physics', '18MF3IM04', 1, '2020-08-11 16:39:02'),
('Puneet khandelwal', 'newlecture', 'finalcourse', 'QWE', 1, '2020-08-12 09:01:24'),
('Shuvomoy Dey', 'Bernoulli', 'FluidDynamics', '18MF3IM04', 1, '2020-08-12 11:37:44'),
('Deepam banerjee', 'react_hooks', 'ReactJS', '18TE10001', 0, '2020-08-12 13:04:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
