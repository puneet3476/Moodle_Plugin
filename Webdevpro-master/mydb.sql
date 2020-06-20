-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 20, 2020 at 02:28 PM
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
-- Database: `mydb`
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
  `Replies` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `chatuser`, `chat`, `time_mark`, `second`, `reaction`, `Replies`) VALUES
(10000, 'puneet', 'First Post', '00:00:00', 0, 1, 4),
(10001, 'puneet', 'Common Cold!', '00:00:32', 31, 5, 0),
(10002, 'puneet', 'corona', '00:00:22', 21, 2, 0),
(10003, 'puneet', 'Heya', '00:00:00', 0, 3, 0),
(10004, 'puneet', 'Everything is working so fine', '00:01:31', 90, 4, 0),
(10005, 'puneet', 'dfghj', '00:02:28', 147, 0, 0),
(10006, 'puneet', 'BULB', '00:01:54', 113, 6, 0),
(10007, 'puneet', 'Bet cov', '00:00:28', 27, 0, 0),
(10008, 'puneet', 'Learn this', '00:02:08', 128, 5, 0),
(10009, 'puneet', 'shkti', '00:00:00', 0, 3, 0),
(10010, 'puneet', 'llll', '00:00:00', 0, 3, 0),
(10011, 'puneet', 'write', '00:00:00', 0, 4, 0),
(10012, 'puneet', 'dfghj', '00:00:00', 0, 2, 0),
(10013, 'puneet', 'see it', '00:00:00', 0, 1, 0),
(10014, 'puneet', 'learn bro', '00:02:04', 124, 0, 0),
(10015, 'puneet', 'okay', '00:02:09', 128, 4, 0),
(10016, 'puneet', 'BULB see', '00:02:18', 137, 6, 0),
(10017, 'puneet', 'hope', '00:03:37', 217, 5, 0),
(10018, 'puneet', 'Happening!!', '00:00:00', 0, 3, 0),
(10019, 'puneet', 'hey', '00:02:18', 137, 3, 0),
(10020, 'puneet', 'last', '00:01:23', 82, 2, 0),
(10021, 'puneet', 'lastone', '00:01:23', 82, 4, 0),
(10022, 'puneet', 'Fast final', '00:01:41', 101, 0, 0),
(10023, 'puneet', 'hmm', '00:00:00', 0, 0, 0),
(10024, 'puneet', '?', '00:00:36', 36, 0, 0),
(10025, 'puneet', 'we', '00:00:00', 0, 0, 0),
(10026, 'puneet', 'ya', '00:02:49', 168, 3, 0),
(10027, 'puneet', 'll', '00:03:12', 191, 0, 0),
(10028, 'puneet', 'dfghj', '00:00:00', 0, 3, 0),
(10029, 'puneet', 'hello', '00:00:00', 0, 5, 0),
(10030, 'puneet', 'dfghj', '00:01:37', 96, 2, 0),
(10031, 'puneet', 'asdf', '00:00:00', 0, 3, 0),
(10032, 'puneet', 'dfghj', '00:00:00', 0, 4, 0),
(10033, 'puneet', 'fgh', '00:00:00', 0, 3, 0),
(10034, 'puneet', 'dgsdsa', '00:00:00', 0, 3, 0),
(10035, 'puneet', 'dfghj', '00:00:00', 0, 3, 0),
(10036, 'puneet', 'hello', '00:00:00', 0, 4, 0),
(10037, 'puneet', 'dfghj', '00:00:52', 51, 3, 0),
(10038, 'puneet', 'dfghj', '00:00:00', 0, 4, 0),
(10039, 'puneet', 'dfghj', '00:00:00', 0, 0, 0),
(10040, 'puneet', 'asdfghj', '00:01:35', 94, 1, 0),
(10041, 'puneet', 'sdfghh', '00:00:00', 0, 0, 0),
(10042, 'puneet', 'heya', '00:02:04', 124, 6, 0),
(10043, 'puneet', 'he', '00:00:46', 45, 2, 0),
(10044, 'puneet', '2qwer', '00:00:00', 0, 3, 0),
(10045, 'puneet', 'dfghj', '00:02:04', 124, 2, 0),
(10046, 'puneet', 'dfghj', '00:02:46', 165, 2, 0),
(10047, 'puneet', 'fgh', '00:02:17', 137, 4, 0),
(10048, 'puneet', 'dfghj', '00:02:15', 135, 2, 0),
(10049, 'puneet', 'efghjk', '00:00:00', 0, 3, 0),
(10050, 'puneet', 'lk', '00:01:53', 113, 2, 0),
(10051, 'puneet', 'dfghj', '00:01:37', 97, 3, 0),
(10052, 'puneet', 'dfghj', '00:02:27', 147, 4, 0),
(10053, 'puneet', 'dfghj', '00:02:58', 177, 2, 0),
(10054, 'puneet', 'rtrytyuj', '00:02:58', 177, 2, 0),
(10055, 'puneet', 'sddfgfgh', '00:00:00', 0, 2, 0),
(10056, 'puneet', 'asdsasd', '00:00:00', 0, 3, 0),
(10057, 'puneet', 'dfghjk', '00:00:00', 0, 2, 0),
(10058, 'puneet', 'fgh', '00:01:18', 78, 3, 0),
(10059, 'puneet', 'fgh', '00:01:41', 101, 2, 0),
(10060, 'puneet', 'dfghj', '00:00:00', 0, 2, 0),
(10061, 'puneet', 'dfghj', '00:00:00', 0, 3, 0),
(10062, 'puneet', 'dfghj', '00:00:00', 0, 3, 0),
(10063, 'puneet', 'dfghj', '00:00:00', 0, 2, 0),
(10064, 'puneet', 'dfghj', '00:00:00', 0, 2, 0),
(10065, 'puneet', 'ertyuu', '00:00:00', 0, 2, 0),
(10066, 'puneet', 'dfsdsg', '00:00:00', 0, 2, 0),
(10067, 'puneet', 'dfghj', '00:00:00', 0, 3, 0),
(10068, 'puneet', 'sdfghj', '00:01:24', 83, 3, 0),
(10069, 'puneet', 'fghgjh', '00:01:53', 113, 3, 0),
(10070, 'puneet', 'dfghj', '00:00:00', 0, 3, 0),
(10071, 'puneet', 'fghjhk', '00:00:00', 0, 2, 0),
(10072, 'puneet', 'dfghjrdgfh', '00:01:53', 113, 3, 0),
(10073, 'puneet', 'ewrghj', '00:01:53', 113, 3, 0),
(10074, 'puneet', 'fgh,.', '00:01:53', 113, 3, 0),
(10075, 'puneet', 'hzdfdf', '00:02:27', 147, 3, 0),
(10076, 'puneet', 'tyghkjl', '00:02:27', 147, 0, 0),
(10077, 'puneet', 'fbfdbdf', '00:00:00', 0, 2, 0),
(10078, 'puneet', 'sdfghjjk', '00:00:00', 0, 4, 0),
(10079, 'puneet', 'dfghj', '00:00:51', 51, 0, 0),
(10080, 'puneet', 'fghj', '00:00:51', 51, 0, 0),
(10081, 'puneet', 'dfghjk', '00:01:41', 101, 2, 0),
(10082, 'puneet', 'dfghjj', '00:00:00', 0, 3, 0),
(10083, 'puneet', 'dfghj', '00:00:54', 54, 2, 0),
(10084, 'puneet', 'dfghj', '00:00:54', 54, 3, 0),
(10085, 'puneet', 'dfghjd', '00:00:54', 54, 3, 0),
(10086, 'puneet', 'wertyh', '00:00:00', 0, 3, 0),
(10087, 'puneet', 'asdf', '00:01:22', 82, 0, 0),
(10088, 'puneet', 'ascgb', '00:02:48', 168, 3, 0),
(10089, 'puneet', 'Hey data', '00:02:11', 131, 0, 0),
(10090, 'puneet', 'Hey data hello', '00:02:11', 130, 0, 0),
(10091, 'puneet', 'Heyaaa', '00:01:53', 113, 0, 0),
(10092, 'puneet', 'HMM', '00:02:17', 137, 0, 0),
(10093, 'puneet', 'asdfgh', '00:00:00', 0, 0, 0),
(10094, 'puneet', 'dfghj', '00:02:27', 147, 0, 0),
(10095, 'puneet', 'Bhaubali', '00:01:53', 113, 0, 0),
(10096, 'puneet', 'dfghj', '00:02:17', 137, 0, 0),
(10099, 'puneet', 'hi', '00:01:31', 91, 5, 0),
(10101, 'puneet', 'okay', '00:01:53', 113, 1, 0),
(10102, 'puneet', 'okay', '00:02:45', 165, 0, 0),
(10103, 'puneet', 'heya', '00:01:53', 113, 3, 3),
(10104, 'puneet', 'dfghjsa', '00:02:27', 147, 2, 2),
(10105, 'puneet', 'dfghj', '00:00:00', 0, 3, 1);

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



-- --------------------------------------------------------

--
-- Table structure for table `comment`
--


--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(13) NOT NULL,
  `website` varchar(50) NOT NULL,
  `comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--



INSERT INTO `contactus` (`id`, `name`, `phone`, `email`, `comment`, `website`) VALUES
(1, 'tyu', 1234567890, 'tyugii', 'qewretr', 'rtyu'),
(2, 'tyu', 1234567890, 'tyugii', 'qewretr', 'rtyu'),
(3, 'puneet3476', 1234567890, 'puneet3476@yahoo.com', 'ascvf', 'https://ytyt.com'),
(4, 'puneet3476', 1234567890, 'puneet3476@yahoo.com', 'ascvf', 'https://ytyt.com'),
(5, 'puneet3476', 1234567890, 'puneet3476@yahoo.com', 'asdgm', 'https://ytyt.com'),
(6, 'puneet3476', 1234567890, 'puneet3476@yahoo.com', 'dfd', 'https://ytyt.com'),
(7, 'puneet3476', 1234567890, 'puneet3476@yahoo.com', '122', 'https://ytyt.com'),
(8, 'puneet3476', 1234567890, 'puneet3476@yahoo.com', 'sdfgfhj', 'https://ytyt.com');


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

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `loginuser`, `note`, `time_mark`, `second`, `reaction`) VALUES
(20000, 'puneet', 'we did it!', '00:00:00', 0, 3),
(20001, 'puneet', 'yeah', '00:00:00', 0, 1),
(20002, 'puneet', 'Definately', '00:00:00', 0, 4),
(20003, 'puneet', 'dfghj', '00:00:00', 0, 1),
(20004, 'puneet', 'dfghj', '00:00:00', 0, 2),
(20005, 'puneet', 'dfghj', '00:02:40', 159, 3),
(20006, 'puneet', 'dfghjdf', '00:00:00', 0, 4),
(20007, 'puneet', 'dfghjdf', '00:00:00', 0, 4),
(20008, 'puneet', 'dfghj', '00:03:06', 186, 3),
(20009, 'puneet', 'dfghj', '00:03:06', 186, 3),
(20010, 'puneet', 'dfghj', '00:03:06', 186, 3),
(20011, 'puneet', 'Heyaa', '00:01:49', 108, 5),
(20012, 'puneet', 'Heyaasa', '00:02:00', 119, 3);

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

--
-- Dumping data for table `postvideosurvey`
--

INSERT INTO `postvideosurvey` (`id`, `username`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`) VALUES
(1, 'puneet', 'unsatisfied', 'unsatisfied', 'unsatisfied', 'unsatisfied', NULL, NULL),
(2, 'puneet', 'very satisfied', 'neutral', 'satisfied', 'satisfied', NULL, NULL),
(3, 'springfest', 'very satisfied', 'unsatisfied', 'satisfied', 'very unsatisfied', NULL, NULL),
(4, 'puneet', '', '', '', '', NULL, NULL),
(5, 'puneet', '', '', '', '', NULL, NULL),
(6, 'puneet', '', '', '', '', NULL, NULL),
(7, 'puneet', '', '', '', '', NULL, NULL),
(8, 'puneet', 'very satisfied', 'very satisfied', 'neutral', 'neutral', NULL, NULL),
(9, 'puneet1', 'very satisfied', 'satisfied', 'unsatisfied', 'satisfied', NULL, NULL),
(10, 'puneet', '', '', '', '', NULL, NULL),
(11, 'SAM123', '', '', '', '', NULL, NULL),
(12, 'puneet', 'satisfied', 'very satisfied', 'satisfied', 'very satisfied', NULL, NULL),
(13, 'puneet', '', '', '', '', NULL, NULL),
(14, 'puneet', '', '', '', '', NULL, NULL),
(15, 'springfest', '', '', '', '', NULL, NULL),
(16, 'badal', '', '', '', '', NULL, NULL),
(17, 'puneet', '', '', '', '', NULL, NULL),
(18, 'puneet', '', '', '', '', NULL, NULL),
(19, 'puneet', '', '', '', '', NULL, NULL),
(20, 'badal', '', '', '', '', NULL, NULL),
(21, 'badal', '', '', '', '', NULL, NULL),
(22, 'springfest', '', '', '', '', NULL, NULL),
(23, 'puneet', '', '', '', '', NULL, NULL),
(24, 'puneet', '', '', '', '', NULL, NULL),
(25, 'puneet', '', '', '', '', NULL, NULL),
(26, 'puneet', '', '', '', '', NULL, NULL),
(27, 'puneet', '', '', '', '', NULL, NULL),
(28, 'puneet', '', '', '', '', NULL, NULL),
(29, 'puneet', '', '', '', '', NULL, NULL),
(30, 'puneet', '', '', '', '', NULL, NULL),
(31, 'puneet', '', '', '', '', NULL, NULL),
(32, 'puneet', 'very satisfied', 'very satisfied', 'very satisfied', 'very satisfied', NULL, NULL),
(33, 'puneet', '', '', '', '', NULL, NULL),
(34, 'puneet', '', '', '', '', NULL, NULL),
(35, 'puneet', '', '', '', '', NULL, NULL),
(36, 'puneet', '', '', '', '', NULL, NULL),
(37, 'puneet', '', '', '', '', NULL, NULL),
(38, 'puneet', '', '', '', '', NULL, NULL),
(39, 'puneet', '', '', '', '', NULL, NULL),
(40, 'puneet', '', '', '', '', NULL, NULL),
(41, '', '', '', '', '', NULL, NULL),
(42, 'puneet', '', '', '', '', NULL, NULL),
(43, 'puneet', '', '', '', '', NULL, NULL),
(44, 'puneet', '', '', '', '', NULL, NULL),
(45, 'puneet', '', '', '', '', NULL, NULL),
(46, 'puneet', '', '', '', '', NULL, NULL),
(47, '', '', '', '', '', NULL, NULL),
(48, 'puneet', '', '', '', '', NULL, NULL),
(49, '', '', '', '', '', NULL, NULL),
(50, 'puneet', '', '', '', '', NULL, NULL),
(51, 'puneet', '', '', '', '', NULL, NULL),
(52, 'puneet', '', '', '', '', NULL, NULL),
(53, '', '', '', '', '', NULL, NULL),
(54, 'puneet', '', '', '', '', NULL, NULL),
(55, 'puneet', '', '', '', '', NULL, NULL),
(56, 'puneet', 'very satisfied', 'very satisfied', 'very satisfied', 'very satisfied', NULL, NULL),
(57, '', 'very satisfied', 'very satisfied', 'very satisfied', 'very satisfied', NULL, NULL),
(58, 'puneet', '', '', '', 'very satisfied', NULL, NULL),
(59, 'puneet', '', '', '', '', NULL, NULL),
(60, 'puneet', '', '', '', '', NULL, NULL),
(61, 'puneet', '', '', '', '', NULL, NULL),
(62, 'puneet', '', '', '', '', NULL, NULL),
(63, 'puneet', '', '', '', '', NULL, NULL),
(64, 'puneet', '', '', '', '', NULL, NULL),
(65, 'puneet', '', '', '', '', NULL, NULL),
(66, 'puneet', '', '', '', '', NULL, NULL),
(67, 'puneet', '', '', '', '', NULL, NULL),
(68, 'puneet', '', '', '', '', NULL, NULL),
(69, 'puneet', '', '', '', '', NULL, NULL),
(70, 'puneet', '', '', '', '', NULL, NULL),
(71, 'puneet', 'neutral', '', '', '', NULL, NULL),
(72, 'puneet', '', '', '', '', NULL, NULL),
(73, 'puneet', '', '', '', '', NULL, NULL),
(74, 'puneet', '', '', '', '', NULL, NULL),
(75, 'puneet', '', '', '', '', NULL, NULL),
(76, 'puneet', '', '', '', '', NULL, NULL),
(77, 'puneet', '', '', '', '', NULL, NULL),
(78, 'puneet', '', '', '', '', NULL, NULL),
(79, 'puneet', '', '', '', '', NULL, NULL),
(80, 'puneet', '', '', '', '', NULL, NULL),
(81, 'puneet', '', '', '', '', NULL, NULL),
(82, 'puneet', '', '', '', '', NULL, NULL),
(83, 'puneet', '', '', '', '', NULL, NULL),
(84, 'puneet', '', '', '', '', NULL, NULL),
(85, 'puneet', '', '', '', '', NULL, NULL),
(86, '', '', '', '', '', NULL, NULL),
(87, 'puneet', '', '', '', '', NULL, NULL),
(88, 'puneet', '', '', '', '', NULL, NULL),
(89, 'puneet', '', '', '', '', NULL, NULL),
(90, 'puneet', '', '', '', '', NULL, NULL),
(91, 'puneet', '', '', '', '', NULL, NULL),
(92, 'puneet', '', '', '', '', NULL, NULL),
(93, 'puneet', '', '', '', '', NULL, NULL),
(94, 'puneet', '', '', '', '', NULL, NULL),
(95, 'puneet', '', '', '', '', NULL, NULL),
(96, 'puneet', '', '', '', '', NULL, NULL),
(97, '', '', '', '', '', NULL, NULL),
(98, '', '', '', '', '', NULL, NULL),
(99, '', '', '', '', '', NULL, NULL),
(100, '', '', '', '', '', NULL, NULL),
(101, '', '', '', '', '', NULL, NULL),
(102, '', '', '', '', '', NULL, NULL),
(103, '', '', '', '', '', NULL, NULL),
(104, '', '', '', '', '', NULL, NULL),
(105, '', '', '', '', '', NULL, NULL),
(106, '', '', '', '', '', NULL, NULL),
(107, '', '', '', '', '', NULL, NULL),
(108, '', '', '', '', '', NULL, NULL),
(109, '', '', '', '', '', NULL, NULL),
(110, '', '', '', '', '', NULL, NULL),
(111, '', '', '', '', '', NULL, NULL),
(112, '', '', '', '', '', NULL, NULL),
(113, '', '', '', '', '', NULL, NULL),
(114, '', '', '', '', '', NULL, NULL),
(115, '', '', '', '', '', NULL, NULL),
(116, '', '', '', '', '', NULL, NULL),
(117, '', '', '', '', '', NULL, NULL),
(118, '', '', '', '', '', NULL, NULL),
(119, '', '', '', '', '', NULL, NULL),
(120, '', '', '', '', '', NULL, NULL),
(121, '', '', '', '', '', NULL, NULL),
(122, '', '', '', '', '', NULL, NULL),
(123, '', '', '', '', '', NULL, NULL),
(124, '', '', '', '', '', NULL, NULL),
(125, '', '', '', '', '', NULL, NULL),
(126, '', '', '', '', '', NULL, NULL),
(127, '', '', '', '', '', NULL, NULL),
(128, '', '', '', '', '', NULL, NULL),
(129, '', '', '', '', '', NULL, NULL),
(130, '', '', '', '', '', NULL, NULL),
(131, '', '', '', '', '', NULL, NULL),
(132, '', '', '', '', '', NULL, NULL),
(133, '', '', '', '', '', NULL, NULL),
(134, '', '', '', '', '', NULL, NULL),
(135, '', '', '', '', '', NULL, NULL),
(136, '', '', '', '', '', NULL, NULL),
(137, '', '', '', '', '', NULL, NULL),
(138, '', '', '', '', '', NULL, NULL),
(139, '', '', '', '', '', NULL, NULL),
(140, '', '', '', '', '', NULL, NULL),
(141, '', '', '', '', '', NULL, NULL),
(142, '', '', '', '', '', NULL, NULL),
(143, '', '', '', '', '', NULL, NULL),
(144, '', '', '', '', '', NULL, NULL),
(145, '', '', '', '', '', NULL, NULL),
(146, '', '', '', '', '', NULL, NULL),
(147, '', '', '', '', '', NULL, NULL),
(148, '', '', '', '', '', NULL, NULL),
(149, '', '', '', '', '', NULL, NULL),
(150, '', '', '', '', '', NULL, NULL),
(151, '', '', '', '', '', NULL, NULL),
(152, '', '', '', '', '', NULL, NULL),
(153, '', '', '', '', '', NULL, NULL),
(154, '', '', '', '', '', NULL, NULL),
(155, '', '', '', '', '', NULL, NULL),
(156, '', '', '', '', '', NULL, NULL),
(157, '', '', '', '', '', NULL, NULL),
(158, '', '', '', '', '', NULL, NULL),
(159, '', '', '', '', '', NULL, NULL),
(160, '', '', '', '', '', NULL, NULL),
(161, '', '', '', '', '', NULL, NULL),
(162, '', '', '', '', '', NULL, NULL),
(163, '', '', '', '', '', NULL, NULL),
(164, '', '', '', '', '', NULL, NULL),
(165, '', '', '', '', '', NULL, NULL),
(166, '', '', '', '', '', NULL, NULL),
(167, '', '', '', '', '', NULL, NULL),
(168, '', '', '', '', '', NULL, NULL),
(169, '', '', '', '', '', NULL, NULL),
(170, '', '', '', '', '', NULL, NULL),
(171, '', '', '', '', '', NULL, NULL),
(172, '', '', '', '', '', NULL, NULL),
(173, '', '', '', '', '', NULL, NULL),
(174, '', '', '', '', '', NULL, NULL),
(175, 'puneet', 'neutral', 'satisfied', 'very satisfied', 'very satisfied', NULL, NULL),
(176, 'puneet', '', '', '', '', NULL, NULL),
(177, 'puneet', '', '', '', '', NULL, NULL),
(178, 'puneet', '', '', '', '', NULL, NULL),
(179, 'puneet', '', '', '', '', NULL, NULL),
(180, 'puneet', '', '', '', '', NULL, NULL),
(181, 'puneet', '', '', '', '', NULL, NULL),
(182, 'puneet', '', '', '', '', NULL, NULL),
(183, 'puneet', '', '', '', '', NULL, NULL),
(184, 'puneet', '', '', '', '', NULL, NULL),
(185, 'puneet', '', '', '', '', NULL, NULL),
(186, 'puneet', '', '', '', '', NULL, NULL),
(187, 'puneet', '', '', '', '', NULL, NULL),
(188, 'puneet', '', '', '', '', NULL, NULL),
(189, 'puneet', '', '', '', '', NULL, NULL),
(190, 'puneet', '', '', '', '', NULL, NULL),
(191, 'puneet', '', '', '', '', NULL, NULL),
(192, 'puneet', '', '', '', '', NULL, NULL),
(193, 'puneet', '', '', '', '', NULL, NULL),
(194, 'puneet', '', '', '', '', NULL, NULL),
(195, 'puneet', '', '', '', '', NULL, NULL),
(196, 'puneet', '', '', '', '', NULL, NULL),
(197, 'puneet', '', '', '', '', NULL, NULL),
(198, '', '', '', '', '', NULL, NULL),
(199, '', '', '', '', '', NULL, NULL),
(200, '', '', '', '', '', NULL, NULL),
(201, '', '', '', '', '', NULL, NULL);

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

--
-- Dumping data for table `prevideosurvey`
--

INSERT INTO `prevideosurvey` (`id`, `username`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`) VALUES
(1, 'springfest', 'unsatisfied', 'unsatisfied', 'unsatisfied', 'unsatisfied', NULL, NULL),
(2, 'puneet', '', '', '', '', NULL, NULL),
(3, 'puneet', '', '', '', '', NULL, NULL),
(4, 'puneet', '', '', '', '', NULL, NULL),
(5, 'puneet', '', '', '', '', NULL, NULL),
(6, 'puneet', '', '', '', '', NULL, NULL),
(7, 'puneet', '', '', '', '', NULL, NULL),
(8, 'puneet', '', '', '', '', NULL, NULL),
(9, 'puneet1', '', '', '', '', NULL, NULL),
(10, 'puneet', 'very satisfied', 'neutral', 'neutral', 'neutral', NULL, NULL),
(11, 'puneet', 'very satisfied', 'neutral', 'neutral', 'neutral', NULL, NULL),
(12, 'SAM123', 'neutral', 'satisfied', 'very satisfied', 'very satisfied', NULL, NULL),
(13, 'puneet', '', '', '', '', NULL, NULL),
(14, 'puneet', '', '', '', '', NULL, NULL),
(15, 'puneet', '', '', '', '', NULL, NULL),
(16, 'springfest', '', '', '', '', NULL, NULL),
(17, 'badal', '', '', '', '', NULL, NULL),
(18, 'puneet', '', '', '', '', NULL, NULL),
(19, 'puneet', '', '', '', '', NULL, NULL),
(20, 'puneet', '', '', '', '', NULL, NULL),
(21, 'puneet', '', '', '', '', NULL, NULL),
(22, 'badal', '', '', '', '', NULL, NULL),
(23, 'badal', '', '', '', '', NULL, NULL),
(24, 'springfest', '', '', '', '', NULL, NULL),
(25, 'puneet', '', '', '', '', NULL, NULL),
(26, 'puneet', '', '', '', '', NULL, NULL),
(27, 'puneet', '', '', '', '', NULL, NULL),
(28, 'puneet', '', '', '', '', NULL, NULL),
(29, 'puneet', '', '', '', '', NULL, NULL),
(30, 'puneet', '', '', '', '', NULL, NULL),
(31, 'puneet', '', '', '', '', NULL, NULL),
(32, 'puneet', '', '', '', '', NULL, NULL),
(33, 'puneet', '', '', '', '', NULL, NULL),
(34, 'puneet', '', '', '', '', NULL, NULL),
(35, 'puneet', '', '', '', '', NULL, NULL),
(36, 'puneet', '', '', '', '', NULL, NULL),
(37, 'puneet', '', '', '', '', NULL, NULL),
(38, 'puneet', '', '', '', '', NULL, NULL),
(39, 'puneet', '', '', '', '', NULL, NULL),
(40, 'puneet', '', '', '', '', NULL, NULL),
(41, 'puneet', '', '', '', '', NULL, NULL),
(42, 'puneet', '', '', '', '', NULL, NULL),
(43, 'puneet', '', '', '', '', NULL, NULL),
(44, 'puneet', '', '', '', '', NULL, NULL),
(45, 'puneet', '', '', '', '', NULL, NULL),
(46, 'puneet', '', '', '', 'very unsatisfied', NULL, NULL),
(47, 'puneet', '', '', '', '', NULL, NULL),
(48, 'puneet', '', '', '', '', NULL, NULL),
(49, 'puneet', 'very satisfied', 'very satisfied', 'very satisfied', 'very satisfied', NULL, NULL),
(50, 'puneet', '', '', '', '', NULL, NULL),
(51, 'puneet', '', '', '', '', NULL, NULL),
(52, 'puneet', '', '', '', '', NULL, NULL),
(53, 'puneet', '', '', '', '', NULL, NULL),
(54, 'puneet', '', '', '', '', NULL, NULL),
(55, 'puneet', '', '', '', '', NULL, NULL),
(56, 'puneet', '', '', '', '', NULL, NULL),
(57, 'puneet', '', '', '', '', NULL, NULL),
(58, 'puneet', '', '', '', '', NULL, NULL),
(59, 'puneet', '', '', '', '', NULL, NULL),
(60, 'puneet', '', '', '', '', NULL, NULL),
(61, 'puneet', '', '', '', '', NULL, NULL),
(62, 'puneet', '', '', '', '', NULL, NULL),
(63, 'puneet', '', '', '', '', NULL, NULL),
(64, 'puneet', '', '', '', '', NULL, NULL),
(65, 'puneet', '', '', '', '', NULL, NULL),
(66, 'puneet', '', '', '', '', NULL, NULL),
(67, 'puneet', '', '', '', '', NULL, NULL),
(68, 'puneet', '', '', '', '', NULL, NULL),
(69, 'puneet', '', '', '', '', NULL, NULL),
(70, 'puneet', 'satisfied', 'very satisfied', 'satisfied', 'satisfied', NULL, NULL),
(71, 'puneet', '', '', '', '', NULL, NULL),
(72, 'puneet', '', '', '', '', NULL, NULL),
(73, 'puneet', '', '', '', '', NULL, NULL),
(74, 'puneet', '', '', '', '', NULL, NULL),
(75, 'puneet', '', '', '', '', NULL, NULL),
(76, 'puneet', '', '', '', '', NULL, NULL),
(77, 'puneet', '', '', '', '', NULL, NULL),
(78, 'puneet', '', '', '', '', NULL, NULL),
(79, 'puneet', '', '', '', '', NULL, NULL),
(80, 'puneet', '', '', '', '', NULL, NULL),
(81, 'puneet', '', '', '', '', NULL, NULL),
(82, 'puneet', '', '', '', '', NULL, NULL),
(83, 'puneet', '', '', '', '', NULL, NULL),
(84, 'puneet', '', '', '', '', NULL, NULL),
(85, 'puneet', '', '', '', '', NULL, NULL),
(86, 'puneet', '', '', '', '', NULL, NULL),
(87, 'puneet', '', '', '', '', NULL, NULL),
(88, 'puneet', '', '', '', '', NULL, NULL),
(89, 'puneet', '', '', '', '', NULL, NULL),
(90, 'puneet', '', '', '', '', NULL, NULL),
(91, 'puneet', '', '', '', '', NULL, NULL),
(92, 'puneet', '', '', '', '', NULL, NULL),
(93, 'puneet', '', '', '', '', NULL, NULL),
(94, 'springfest', '', '', '', '', NULL, NULL),
(95, 'puneet', '', '', '', '', NULL, NULL),
(96, 'puneet', '', '', '', '', NULL, NULL),
(97, 'puneet', '', '', '', '', NULL, NULL);

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

INSERT INTO `reply` (`id`, `user`, `post_id`, `reply`) VALUES
(30012, 'puneet', 10000, 'Heya'),
(30013, 'puneet', 10000, 'Done & Dusted'),
(30014, 'puneet', 10000, 'Defibe'),
(30015, 'puneet', 10000, 'asf'),
(30024, 'puneet', 10105, '1'),
(30025, 'puneet', 10104, '1'),
(30026, 'puneet', 10104, '2'),
(30027, 'puneet', 10103, '1'),
(30028, 'puneet', 10103, '2'),
(30029, 'puneet', 10103, '3');


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
(2, 'puneet', 'Puneet Khandelwal', 'Teacher', '123'),
(3, 'springfest', 'Puneet Khandelwal', 'Student', '123'),
(4, 'puneet1', 'Puneet Khandelwal', 'Student', '1234'),
(5, 'SAM123', 'Puneet Khandelwal', 'Assistant', '123'),
(6, 'badal', 'Badal Raj Beejawat', 'Student', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clickdata`
--
ALTER TABLE `clickdata`
  ADD PRIMARY KEY (`id`);



--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10106;

--
-- AUTO_INCREMENT for table `clickdata`
--
ALTER TABLE `clickdata`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=622;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;



--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20013;


--
-- AUTO_INCREMENT for table `postvideosurvey`
--
ALTER TABLE `postvideosurvey`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `prevideosurvey`
--
ALTER TABLE `prevideosurvey`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30030;


--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `student_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
