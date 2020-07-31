-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 25, 2020 at 10:53 AM
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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(12) UNSIGNED NOT NULL,
  `chatuser` varchar(30) NOT NULL,
  `chat` varchar(60) NOT NULL,
  `time_mark` time DEFAULT NULL,
  `second` int(30) DEFAULT NULL,
  `reaction` int(2) DEFAULT NULL,
  `Replies` int(10) NOT NULL DEFAULT '0',
  `student_ID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `chatuser`, `chat`, `time_mark`, `second`, `reaction`, `Replies`, `student_ID`) VALUES
(1, 'Admin', 'WELCOME !!', '00:00:04', 4, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------

--
-- Table structure for table `clickdata`
--

CREATE TABLE `clickdata` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(12) DEFAULT '0',
  `username` varchar(30) NOT NULL,
  `Event` varchar(30) NOT NULL,
  `Start_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `from_video_timestamp` varchar(30) DEFAULT NULL,
  `to_video_timestamp` varchar(30) DEFAULT NULL,
  `Post_ID` int(12) DEFAULT NULL,
  `Bar_ID` int(10) DEFAULT NULL,
  `display_style` varchar(30) DEFAULT NULL,
  `x` varchar(20) DEFAULT NULL,
  `y` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clickdata`
--


-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(12) UNSIGNED NOT NULL,
  `loginuser` varchar(30) NOT NULL,
  `note` varchar(300) NOT NULL,
  `time_mark` time DEFAULT NULL,
  `second` int(30) DEFAULT NULL,
  `reaction` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `postvideosurvey`
--

CREATE TABLE `postvideosurvey` (
  `id` int(12) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `question1` varchar(20) NOT NULL,
  `question2` varchar(20) NOT NULL,
  `question3` varchar(20) NOT NULL,
  `question4` varchar(20) NOT NULL,
  `question5` varchar(20) DEFAULT NULL,
  `question6` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prevideosurvey`
--

CREATE TABLE `prevideosurvey` (
  `id` int(12) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `question1` varchar(20) NOT NULL,
  `question2` varchar(20) NOT NULL,
  `question3` varchar(20) NOT NULL,
  `question4` varchar(20) NOT NULL,
  `question5` varchar(20) DEFAULT NULL,
  `question6` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `post_id` int(12) NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--


--
-- Indexes for dumped tables
--

--


--
-- Indexes for table `clickdata`
--
ALTER TABLE `clickdata`
  ADD PRIMARY KEY (`id`);



--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postvideosurvey`
--
ALTER TABLE `postvideosurvey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prevideosurvey`
--
ALTER TABLE `prevideosurvey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);



--
-- AUTO_INCREMENT for dumped tables
--



--
-- AUTO_INCREMENT for table `clickdata`
--
ALTER TABLE `clickdata`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;



--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postvideosurvey`
--
ALTER TABLE `postvideosurvey`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prevideosurvey`
--
ALTER TABLE `prevideosurvey`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
