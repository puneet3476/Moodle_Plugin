-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 20, 2020 at 12:25 AM
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
  `chat` varchar(30) NOT NULL,
  `time_mark` time DEFAULT NULL,
  `second` int(30) DEFAULT NULL,
  `reaction` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `chatuser`, `chat`, `time_mark`, `second`, `reaction`) VALUES
(10000, 'puneet', 'First Post', '00:00:00', 0, 1),
(10001, 'puneet', 'Common Cold!', '00:00:32', 31, 5),
(10002, 'puneet', 'corona', '00:00:22', 21, 2),
(10003, 'puneet', 'Heya', '00:00:00', 0, 3),
(10004, 'puneet', 'Everything is working so fine', '00:01:31', 90, 4),
(10005, 'puneet', 'dfghj', '00:02:28', 147, 0),
(10006, 'puneet', 'BULB', '00:01:54', 113, 6),
(10007, 'puneet', 'Bet cov', '00:00:28', 27, 0),
(10008, 'puneet', 'Learn this', '00:02:08', 128, 5);

-- --------------------------------------------------------

--
-- Table structure for table `clickdata`
--

CREATE TABLE `clickdata` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(12) DEFAULT '0',
  `username` varchar(30) NOT NULL,
  `login` int(1) NOT NULL DEFAULT '0',
  `play` int(1) NOT NULL DEFAULT '0',
  `pause` int(1) NOT NULL DEFAULT '0',
  `click_on_video_stamp` int(1) NOT NULL DEFAULT '0',
  `click_on_bar` int(1) NOT NULL DEFAULT '0',
  `video_timestamp` varchar(30) DEFAULT NULL,
  `logout` int(1) NOT NULL DEFAULT '0',
  `from_video_timestamp` varchar(30) DEFAULT NULL,
  `to_video_time_stamp` varchar(30) DEFAULT NULL,
  `click_on_post` int(12) NOT NULL DEFAULT '0',
  `click_on_reply` int(12) NOT NULL DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clickdata`
--

INSERT INTO `clickdata` (`id`, `user_id`, `username`, `login`, `play`, `pause`, `click_on_video_stamp`, `click_on_bar`, `video_timestamp`, `logout`, `from_video_timestamp`, `to_video_time_stamp`, `click_on_post`, `click_on_reply`, `reg_date`) VALUES
(2209, 2, 'puneet', 0, 0, 0, 0, 0, '00:00:32', 0, NULL, NULL, 10001, 0, '2020-05-19 23:09:40'),
(2210, 2, 'puneet', 0, 0, 0, 0, 0, '00:00:22', 0, '0', NULL, 10002, 0, '2020-05-19 23:11:30'),
(2211, 2, 'puneet', 0, 0, 0, 0, 0, '00:00:32', 0, '21', NULL, 10001, 0, '2020-05-19 23:11:50'),
(2212, 2, 'puneet', 0, 0, 0, 0, 6, '00:01:23', 0, '00:00:00', '00:01:23', 0, 0, '2020-05-19 23:14:23'),
(2213, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:22', 0, NULL, '00:01:22', 0, 0, '2020-05-19 23:14:23'),
(2214, 2, 'puneet', 0, 0, 0, 0, 10, '00:02:18', 0, '00:01:22', '00:02:18', 0, 0, '2020-05-19 23:14:26'),
(2215, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:17', 0, NULL, '00:02:17', 0, 0, '2020-05-19 23:14:27'),
(2216, 2, 'puneet', 0, 0, 0, 0, 0, '00:00:32', 0, '00:02:17', NULL, 10001, 0, '2020-05-19 23:14:33'),
(2217, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:31', 0, NULL, '00:00:31', 0, 0, '2020-05-19 23:14:33'),
(2218, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:08', 0, NULL, '00:01:08', 0, 0, '2020-05-19 23:22:37'),
(2219, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:31', 0, NULL, '00:00:31', 0, 0, '2020-05-19 23:22:40'),
(2220, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:31', 0, NULL, '00:00:31', 0, 0, '2020-05-19 23:22:40'),
(2221, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:21', 0, NULL, '00:00:21', 0, 0, '2020-05-19 23:24:55'),
(2222, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:21', 0, NULL, '00:00:21', 0, 0, '2020-05-19 23:24:55'),
(2223, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:30', 0, NULL, '00:01:30', 0, 0, '2020-05-19 23:26:18'),
(2224, 2, 'puneet', 0, 0, 0, 0, 0, '00:00:32', 0, '00:00:31', '00:00:32', 10001, 0, '2020-05-19 23:29:04'),
(2225, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:31', 0, NULL, '00:00:31', 0, 0, '2020-05-19 23:29:04'),
(2226, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:31', 0, NULL, '00:00:31', 0, 0, '2020-05-19 23:29:04'),
(2227, 2, 'puneet', 0, 0, 0, 0, 0, '00:00:22', 0, '00:00:21', '00:00:22', 10002, 0, '2020-05-19 23:29:06'),
(2228, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:21', 0, NULL, '00:00:21', 0, 0, '2020-05-19 23:29:06'),
(2229, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:21', 0, NULL, '00:00:21', 0, 0, '2020-05-19 23:29:06'),
(2230, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:04', 0, NULL, '00:01:04', 0, 0, '2020-05-19 23:31:11'),
(2231, 2, 'puneet', 0, 0, 0, 0, 0, '00:01:31', 0, '00:01:04', '00:01:31', 10004, 0, '2020-05-19 23:31:20'),
(2232, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:30', 0, NULL, '00:01:30', 0, 0, '2020-05-19 23:31:20'),
(2233, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:28', 0, NULL, NULL, 0, 10005, '2020-05-19 23:32:08'),
(2234, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:28', 0, '00:01:30', '00:02:28', 10005, 0, '2020-05-19 23:32:08'),
(2235, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:27', 0, NULL, '00:02:27', 0, 0, '2020-05-19 23:32:08'),
(2236, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:28', 0, '00:02:27', '00:02:28', 10005, 0, '2020-05-19 23:32:09'),
(2237, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:27', 0, NULL, '00:02:27', 0, 0, '2020-05-19 23:32:09'),
(2238, 2, 'puneet', 1, 0, 0, 0, 0, NULL, 0, NULL, NULL, 0, 0, '2020-05-20 00:05:24'),
(2239, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:53', 0, NULL, '00:01:53', 0, 0, '2020-05-20 00:08:40'),
(2240, 2, 'puneet', 0, 0, 0, 0, 0, '00:01:54', 0, '00:01:53', '00:01:54', 10006, 0, '2020-05-20 00:09:13'),
(2241, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:53', 0, NULL, '00:01:53', 0, 0, '2020-05-20 00:09:13'),
(2242, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:53', 0, NULL, '00:01:53', 0, 0, '2020-05-20 00:09:14'),
(2243, 2, 'puneet', 0, 0, 0, 0, 8, '00:01:50', 0, '00:01:53', '00:01:50', 0, 0, '2020-05-20 00:09:17'),
(2244, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:50', 0, NULL, '00:01:50', 0, 0, '2020-05-20 00:09:17'),
(2245, 2, 'puneet', 0, 0, 0, 0, 8, '00:01:50', 0, '00:00:00', '00:01:50', 0, 0, '2020-05-20 00:09:23'),
(2246, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:50', 0, NULL, '00:01:50', 0, 0, '2020-05-20 00:09:24'),
(2247, 2, 'puneet', 0, 0, 0, 0, 2, '00:00:28', 0, '00:01:50', '00:00:28', 0, 0, '2020-05-20 00:09:32'),
(2248, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:27', 0, NULL, '00:00:27', 0, 0, '2020-05-20 00:09:32'),
(2249, 2, 'puneet', 0, 0, 0, 0, 0, '00:00:28', 0, '00:00:27', '00:00:28', 10007, 0, '2020-05-20 00:10:02'),
(2250, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:27', 0, NULL, '00:00:27', 0, 0, '2020-05-20 00:10:02'),
(2251, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:27', 0, NULL, '00:00:27', 0, 0, '2020-05-20 00:10:02'),
(2252, 2, 'puneet', 0, 0, 0, 0, 10, '00:02:18', 0, '00:00:27', '00:02:18', 0, 0, '2020-05-20 00:10:07'),
(2253, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:17', 0, NULL, '00:02:17', 0, 0, '2020-05-20 00:10:07'),
(2254, 2, 'puneet', 0, 0, 0, 0, 1, '00:00:14', 0, '00:02:17', '00:00:14', 0, 0, '2020-05-20 00:10:20'),
(2255, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:13', 0, NULL, '00:00:13', 0, 0, '2020-05-20 00:10:20'),
(2256, 2, 'puneet', 0, 0, 0, 0, 0, '00:00:00', 0, '00:00:13', '00:00:00', 0, 0, '2020-05-20 00:10:21'),
(2257, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:00', 0, NULL, '00:00:00', 0, 0, '2020-05-20 00:10:21'),
(2258, 2, 'puneet', 0, 0, 0, 0, 2, '00:00:28', 0, '00:00:00', '00:00:28', 0, 0, '2020-05-20 00:10:23'),
(2259, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:27', 0, NULL, '00:00:27', 0, 0, '2020-05-20 00:10:23'),
(2260, 2, 'puneet', 0, 0, 0, 0, 6, '00:01:23', 0, '00:00:27', '00:01:23', 0, 0, '2020-05-20 00:10:26'),
(2261, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:22', 0, NULL, '00:01:22', 0, 0, '2020-05-20 00:10:26'),
(2262, 2, 'puneet', 0, 0, 0, 0, 8, '00:01:50', 0, '00:01:22', '00:01:50', 0, 0, '2020-05-20 00:10:28'),
(2263, 2, 'puneet', 0, 0, 0, 1, 0, '00:01:50', 0, NULL, '00:01:50', 0, 0, '2020-05-20 00:10:28'),
(2264, 2, 'puneet', 0, 0, 0, 0, 10, '00:02:18', 0, '00:01:50', '00:02:18', 0, 0, '2020-05-20 00:10:31'),
(2265, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:17', 0, NULL, '00:02:17', 0, 0, '2020-05-20 00:10:31'),
(2266, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:10:39'),
(2267, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:08', 0, '00:02:08', '00:02:08', 10008, 0, '2020-05-20 00:10:59'),
(2268, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:11:00'),
(2269, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:11:00'),
(2270, 2, 'puneet', 0, 0, 0, 0, 9, '00:02:04', 0, '00:02:08', '00:02:04', 0, 0, '2020-05-20 00:11:02'),
(2271, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:04', 0, NULL, '00:02:04', 0, 0, '2020-05-20 00:11:03'),
(2272, 2, 'puneet', 0, 0, 0, 0, 9, '00:02:04', 0, '00:02:04', '00:02:04', 0, 0, '2020-05-20 00:11:04'),
(2273, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:04', 0, NULL, '00:02:04', 0, 0, '2020-05-20 00:11:04'),
(2274, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:08', 0, NULL, NULL, 0, 10008, '2020-05-20 00:11:09'),
(2275, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:08', 0, '00:02:08', '00:02:08', 10008, 0, '2020-05-20 00:11:09'),
(2276, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:11:09'),
(2277, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:11:09'),
(2278, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:08', 0, NULL, NULL, 0, 10008, '2020-05-20 00:11:15'),
(2279, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:08', 0, '00:02:08', '00:02:08', 10008, 0, '2020-05-20 00:11:18'),
(2280, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:11:18'),
(2281, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:11:18'),
(2282, 2, 'puneet', 0, 0, 0, 0, 9, '00:02:04', 0, '00:02:08', '00:02:04', 0, 0, '2020-05-20 00:11:21'),
(2283, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:04', 0, NULL, '00:02:04', 0, 0, '2020-05-20 00:11:21'),
(2284, 2, 'puneet', 0, 0, 0, 0, 9, '00:02:04', 0, '00:00:00', '00:02:04', 0, 0, '2020-05-20 00:11:26'),
(2285, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:04', 0, NULL, '00:02:04', 0, 0, '2020-05-20 00:11:26'),
(2286, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:08', 0, NULL, NULL, 0, 10008, '2020-05-20 00:11:30'),
(2287, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:08', 0, '00:02:08', '00:02:08', 10008, 0, '2020-05-20 00:11:30'),
(2288, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:11:30'),
(2289, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:11:30'),
(2290, 2, 'puneet', 0, 0, 0, 0, 0, '00:02:08', 0, '00:02:08', '00:02:08', 10008, 0, '2020-05-20 00:11:34'),
(2291, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:11:34'),
(2292, 2, 'puneet', 0, 0, 0, 1, 0, '00:02:08', 0, NULL, '00:02:08', 0, 0, '2020-05-20 00:11:34'),
(2293, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:00', 0, NULL, '00:00:00', 0, 0, '2020-05-20 00:19:38'),
(2294, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:00', 0, NULL, '00:00:00', 0, 0, '2020-05-20 00:19:40'),
(2295, 2, 'puneet', 0, 0, 0, 1, 0, '00:00:00', 0, NULL, '00:00:00', 0, 0, '2020-05-20 00:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`) VALUES
(2, 'comment'),
(1, 'tfh'),
(5, 'hj'),
(24, 'sdfg'),
(35, 'ertg'),
(36, 'wre'),
(24, 'wer'),
(37, 'th'),
(36, 'ewrfw'),
(35, 'c2'),
(5, 'er'),
(36, '4ew'),
(36, '23 v'),
(24, 'sdef'),
(24, 'dsvf'),
(24, 'desf'),
(37, 'regt'),
(38, 'fg'),
(36, 'rgt'),
(24, 'rg'),
(5, 're'),
(24, ''),
(24, 'efet'),
(35, 'rt'),
(24, 'de'),
(24, 'rt'),
(36, 'er'),
(24, 'rtgh'),
(35, 'e'),
(24, 'ewf'),
(24, 'd'),
(35, 'fe'),
(24, 'ef'),
(37, 'ef'),
(24, 'sdef'),
(24, 'wqd'),
(24, 'ad'),
(35, 'tg'),
(24, '67y'),
(24, 'wd'),
(24, 'wef'),
(24, 'sd'),
(24, 'ertyg'),
(35, 'xds'),
(24, 'gfn'),
(36, 'ghj'),
(5, '8o'),
(24, 'tyu'),
(24, 'ert'),
(35, 'rty'),
(24, 'ry'),
(24, '6jui'),
(24, 'rtyh'),
(24, 'dfg'),
(38, 'gfh'),
(2, 'comment'),
(1, 'tfh'),
(5, 'hj'),
(24, 'sdfg'),
(35, 'ertg'),
(36, 'wre'),
(24, 'wer'),
(37, 'th'),
(36, 'ewrfw'),
(35, 'c2'),
(5, 'er'),
(36, '4ew'),
(36, '23 v'),
(24, 'sdef'),
(24, 'dsvf'),
(24, 'desf'),
(37, 'regt'),
(38, 'fg'),
(36, 'rgt'),
(24, 'rg'),
(5, 're'),
(24, ''),
(24, 'efet'),
(35, 'rt'),
(24, 'de'),
(24, 'rt'),
(36, 'er'),
(24, 'rtgh'),
(35, 'e'),
(24, 'ewf'),
(24, 'd'),
(35, 'fe'),
(24, 'ef'),
(37, 'ef'),
(24, 'sdef'),
(24, 'wqd'),
(24, 'ad'),
(35, 'tg'),
(24, '67y'),
(24, 'wd'),
(24, 'wef'),
(24, 'sd'),
(24, 'ertyg'),
(35, 'xds'),
(24, 'gfn'),
(36, 'ghj'),
(5, '8o'),
(24, 'tyu'),
(24, 'ert'),
(35, 'rty'),
(24, 'ry'),
(24, '6jui'),
(24, 'rtyh'),
(24, 'dfg'),
(38, 'gfh');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user`) VALUES
(0, 'gf'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'badal'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'badal'),
(0, 'puneet'),
(0, 'badal'),
(0, 'mony'),
(0, 'puneet'),
(0, 'mony'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'mony'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'mony'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'gf'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'springfest'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'badal'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'badal'),
(0, 'puneet'),
(0, 'badal'),
(0, 'mony'),
(0, 'puneet'),
(0, 'mony'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'mony'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'mony'),
(0, 'puneet'),
(0, 'puneet'),
(0, 'puneet');

-- --------------------------------------------------------

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

INSERT INTO `contact` (`name`, `email`, `phone`, `website`, `comment`) VALUES
('puneet3476', 'puneet3476@yahoo.com', 1234567890, 'https://ytyt.co', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus`
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

-- --------------------------------------------------------

--
-- Table structure for table `googleaccount`
--

CREATE TABLE `googleaccount` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('google','facebook','twitter','linkedin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'google',
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merch`
--

CREATE TABLE `merch` (
  `id` int(6) UNSIGNED NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `S` int(10) NOT NULL,
  `M` int(10) NOT NULL,
  `L` int(10) NOT NULL,
  `XL` int(10) NOT NULL,
  `Cost` int(10) NOT NULL,
  `Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merch`
--

INSERT INTO `merch` (`id`, `product_name`, `S`, `M`, `L`, `XL`, `Cost`, `Image`) VALUES
(1, 'T-Shirt', 91, 86, 100, 100, 200, ''),
(2, 'Zipper', 97, 99, 95, 99, 200, '');

-- --------------------------------------------------------

--
-- Table structure for table `mycomment`
--

CREATE TABLE `mycomment` (
  `id` int(11) DEFAULT NULL,
  `commentid` int(6) UNSIGNED NOT NULL,
  `user` varchar(30) NOT NULL,
  `comment` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mycomment`
--

INSERT INTO `mycomment` (`id`, `commentid`, `user`, `comment`) VALUES
(5, 23, 'badal', 'Well done bro!'),
(5, 24, 'puneet', 'Thanks'),
(5, 25, 'puneet', 'hk'),
(39, 26, 'puneet', ''),
(39, 27, 'puneet', 'rtyh'),
(45, 28, 'badal', 'hi'),
(52, 29, 'puneet', 'dsf'),
(52, 30, 'puneet', 'dsg'),
(52, 31, 'puneet', 'dsgf'),
(52, 32, 'vandana', 'ey'),
(54, 33, 'vandana', 'thfy'),
(54, 34, 'vandana', 'rtyh'),
(56, 35, 'mony', 'HI'),
(58, 36, 'puneet', 'afss'),
(57, 37, 'puneet', 'asdf'),
(57, 38, 'puneet', 'asdf'),
(57, 39, 'puneet', 'af'),
(57, 40, 'puneet', 'asfaf'),
(55, 41, 'puneet', '<script>alert(hello)</script>'),
(55, 42, 'puneet', ''),
(55, 43, 'puneet', '<ujy'),
(55, 44, 'puneet', 'tyj'),
(55, 45, 'puneet', 'sdfg'),
(55, 46, 'puneet', 'fgh'),
(58, 47, 'puneet', 'sdfgh'),
(58, 48, 'puneet', 'ssfghjf'),
(55, 49, 'puneet', 'aesr'),
(62, 50, 'puneet', 'gfhj'),
(62, 51, 'puneet', 'esdg'),
(66, 52, 'puneet', 'sxdf'),
(67, 53, 'puneet', 'ajnay\n'),
(67, 54, 'puneet', 'rytufyiuhipj'),
(69, 55, 'puneet', 'fdgfhgkjj;l/l;dsfdgghkjl;');

-- --------------------------------------------------------

--
-- Table structure for table `myguests`
--

CREATE TABLE `myguests` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `myguests`
--

INSERT INTO `myguests` (`id`, `name`, `pass`) VALUES
(47, 'puneet', 'sunny'),
(57, 'springfest', 'springfest'),
(58, 'badal', 'harshita'),
(62, 'puneet', 'sunny'),
(63, 'yash', 'refine'),
(64, 'old', 'monk'),
(65, 'old', 'monk'),
(66, 'dfsg', 'asf'),
(67, 'dfsg', 'asf'),
(68, 'df', 'df'),
(69, 'df', 'df'),
(70, 'dg', 'dg'),
(71, 'dg', 'dg'),
(72, 'vandana', 'mom'),
(73, 'vandana', 'mom'),
(74, 'soham', 'soham'),
(75, 'soham', 'soham'),
(76, 'mony', 'mony'),
(77, 'mony', 'mony'),
(78, 'aveek', 'das'),
(79, 'aveek', 'das'),
(80, 'shuvo', 'dey'),
(81, 'shuvo', 'dey'),
(82, 'puneet', 'sunny'),
(83, 'puneet', 'sunny'),
(84, 'puneet', 'sunny'),
(85, 'puneet', 'sunny'),
(86, 'puneet', 'sunny'),
(87, 'puneet', 'sunny'),
(88, 'puneet', '58'),
(89, 'puneet', '58'),
(90, 'puneet', 'qwe'),
(91, 'puneet', 'qwe'),
(92, 'puneet', '123'),
(93, 'puneet', '123'),
(94, 'puneet', 'puneet'),
(95, 'puneet', 'puneet'),
(96, 'puneet', 'puneet'),
(97, 'puneet', 'puneet'),
(98, 'puneet', '123'),
(99, 'puneet', '123'),
(100, 'puneet', 'qw'),
(101, 'puneet', 'qw'),
(102, 'puneet', '123'),
(103, 'puneet', '123'),
(104, 'puneet', 'as'),
(105, 'puneet', 'as'),
(106, 'puneet', '12'),
(107, 'puneet', '12'),
(108, 'puneet', '13'),
(109, 'puneet', '13'),
(110, 'puneet', '12'),
(111, 'puneet', '12');

-- --------------------------------------------------------

--
-- Table structure for table `mytopic`
--

CREATE TABLE `mytopic` (
  `id` int(11) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(12) UNSIGNED NOT NULL,
  `loginuser` varchar(30) NOT NULL,
  `note` varchar(30) NOT NULL,
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
(20002, 'puneet', 'Definately', '00:00:00', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(7) UNSIGNED NOT NULL,
  `loginuser` varchar(30) NOT NULL,
  `note` varchar(100) NOT NULL,
  `time_mark` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_new`
--

CREATE TABLE `orders_new` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll` varchar(10) NOT NULL,
  `address` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `tshirt_S` int(4) NOT NULL,
  `tshirt_M` int(4) NOT NULL,
  `tshirt_L` int(4) NOT NULL,
  `tshirt_XL` int(4) NOT NULL,
  `Zipper_S` int(4) NOT NULL,
  `Zipper_M` int(4) NOT NULL,
  `Zipper_L` int(4) NOT NULL,
  `Zipper_XL` int(4) NOT NULL,
  `total_price` int(5) NOT NULL,
  `ctm` varchar(50) DEFAULT NULL,
  `delivery` int(11) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `sms_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_new`
--

INSERT INTO `orders_new` (`id`, `name`, `roll`, `address`, `email`, `phone`, `tshirt_S`, `tshirt_M`, `tshirt_L`, `tshirt_XL`, `Zipper_S`, `Zipper_M`, `Zipper_L`, `Zipper_XL`, `total_price`, `ctm`, `delivery`, `payment`, `sms_status`) VALUES
(1, 'puneet', '18mi33016', 'Gokhale  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 4, 0, 0, 2, 0, 0, 0, 0, NULL, 0, 0, 0),
(2, 'puneet', '18mi33016', 'J C Bose  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 7, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(3, 'puneet', '18mi33016', 'Madan Mohan Malviya  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 3, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(4, 'puneet', '18mi33016', 'Vikram sarabhai residential complexb-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(5, 'puneet', '18mi33016', 'Megnad Saha  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(6, 'puneet', '18mi33016', 'Mother Teresa  Hall test', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(7, 'puneet', '18mi33016', 'Radha Krishnan  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(8, 'puneet', '18mi33016', 'Patel  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(9, 'puneet', '18mi33016', 'Lalbahadur Sastry  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(10, 'sadsf', '18mi33016', 'Vikram sarabhai residential complextest', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(11, 'ewr', '18mi33016', 'Rani Laxmibai  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(12, 'puneet', '18mi33016', 'Mother Teresa  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(13, 'puneet', '18mi33016', 'Mother Teresa  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(14, 'puneet', '18mi33016', 'Rajendra Prasad  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(15, 'ret', '18mi33016', 'Patel  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(16, 'puneet', '18mi33016', 'Patel  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(17, 'puneet', '18mi33016', 'Radha Krishnan  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(18, 'ZA', '18mi33016', 'Vikram sarabhai residential complexb-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(19, 'puneet', '18mi33016', 'Azad  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(20, 'puneet', '18mi33016', 'Nehru  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(21, 'puneet', '18mi33016', 'Radha Krishnan  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(22, 'puneet', '18mi33016', 'Patel  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(23, 'puneet', '18mi33016', 'Patel  Hall b-402', 'shuvo151dey@gmail.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(24, 'puneet', '18mi33016', 'Madan Mohan Malviya  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 4, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(25, 'puneet', '18mi33016', 'Patel  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 2, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(26, 'puneet', '18mi33016', 'Vikram sarabhai residential complexb-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 5, 0, 0, NULL, 0, 0, 0),
(27, 'puneet', '18mi33016', 'Mother Teresa  Hall b-402', 'puneet3476@yaho.com', 1234567890, 0, 0, 0, 0, 0, 0, 3, 0, 0, NULL, 0, 0, 0),
(28, 'puneet', '18MI33016', 'Megnad Saha  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 6, 0, NULL, 0, 0, 0),
(29, 'puneet', '18mi33016', 'Vikram sarabhai residential complexb-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 3, 0, 0, 0, 0, NULL, 0, 0, 0),
(30, 'puneet', '18mi33016', 'Nehru  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(31, 'puneet', '18mi3fp08', 'Sir Ashutosh Mukherjee  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 6, 0, 0, NULL, 0, 0, 0),
(32, 'puneet', '18mi33016', 'Mother Teresa  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(33, 'puneet', '18mi33016', 'Patel  Hall asdf', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(34, 'puneet', '18mi33016', 'Gokhale  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 3, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(35, 'puneet', '18mi33016', 'Madan Mohan Malviya  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 4, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(36, 'puneet', '18mi33016', 'Sir Ashutosh Mukherjee  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 3, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(37, 'puneet', '18mi33016', 'Vikram sarabhai residential complexb-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(38, 'puneet', '18mi33016', 'Mother Teresa  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(39, 'puneet', '18mi33016', 'Azad  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(40, 'puneet', '18mi33016', 'Vikram sarabhai residential complexb-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(41, 'puneet', '18mi33016', 'Azad  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 4, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(42, 'puneet', '18mi33016', 'Radha Krishnan  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(43, 'puneet', '18mi33016', 'Radha Krishnan  Hall asdf', 'shuvo151dey@gmail.com', 1234567890, 0, 3, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(44, 'puneet', '18mi33016', 'Patel  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 3, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(45, 'puneet', '18mi33016', 'Vikram sarabhai residential complexb-402', 'puneet3476@yahoo.com', 1234567890, 2, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(46, 'puneet', '18mi33016', 'Rani Laxmibai  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(47, 'puneet', '18mi33016', 'Mother Teresa  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 0, 2, 0, 0, 0, NULL, 0, 0, 0),
(48, 'puneet', '18mi33016', 'Nehru  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 2, 0, 0, 0, 0, 0, 3, 0, 0, NULL, 0, 0, 0),
(49, 'puneet', '18mi33016', 'Vikram sarabhai residential complexb-402', 'puneet3476@yahoo.com', 1234567890, 1, 0, 0, 0, 2, 0, 0, 0, 0, NULL, 0, 0, 0),
(50, 'puneet', '18mi33016', 'Megnad Saha  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 2, 2, 0, 0, 0, 1, 0, 1, 0, NULL, 0, 0, 0),
(51, 'puneet', '18mi33016', 'Rajendra Prasad  Hall test', 'puneet3476@yahoo.com', 1234567890, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL, 0, 0, 0),
(52, 'puneet', '18mi33016', 'Patel  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(53, 'puneet', '18mi33016', 'Patel  Hall b-402', 'puneet3476@yahoo.com', 1234567890, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(54, 'puneet', '18mi33016', 'B R Ambedkar  Hall 12', 'puneet3476@yahoo.com', 1234567890, 0, 2, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0);

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
(26, 'puneet', '', '', '', '', NULL, NULL);

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
(37, 'puneet', '', '', '', '', NULL, NULL);

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
(30006, 'puneet', 10008, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `sf`
--

CREATE TABLE `sf` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `roll` varchar(30) NOT NULL,
  `hall` varchar(30) DEFAULT NULL,
  `room` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
  `s` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sf`
--

INSERT INTO `sf` (`id`, `name`, `roll`, `hall`, `room`, `email`, `phone`, `s`) VALUES
(5, 'tests', 'test', 'test', 'test', 'puneeetyahoo.com', 1234567890, 0),
(6, 'tests', 'test', 'test', 'test', 'puneeetyahoo.com', 1234567890, 0),
(7, 'tests', 'test', 'test', 'test', 'puneeetyahoo.com', 1234567890, 0),
(8, 'tests', 'test', 'test', 'test', 'puneeetyahoo.com', 1234567890, 0),
(9, 'tests', 'test', 'test', 'test', 'puneeetyahoo.com', 1234567890, 0),
(10, 'tests', 'test', 'test', 'test', 'puneet3476@yahoo.com', 1234567890, 0),
(11, 'tests', 'test', 'test', 'test', 'puneet3476@yahoo.com', 1234567890, 0),
(12, 'tests', 'test', 'test', 'test', 'puneet3476@yahoo.com', 1234567890, 0),
(13, 'puneet', '18mi33016', 'Nehru Hall', 'b-402', 'puneet3476@yahoo.com', 1234567890, 0),
(14, 'puneet', '18mi33016', 'Rajendra Prasad Hall', 'b-402', 'puneet3476@yahoo.com', 1234567890, 0),
(15, 'puneet', '18mi33016', 'Nehru Hall', 'b-402', 'shuvo151dey@gmail.com', 1234567890, 0),
(16, 'puneet', '18mi33016', 'Radha Krishnan Hall', 'b-402', 'puneet3476@yahoo.com', 1234567890, 0),
(17, 'puneet', '18mi33016', 'Radha Krishnan Hall', '', 'sgdanawe111@gmail.com', 1234567890, 0),
(18, 'puneet', '18mi33016', 'Radha Krishnan Hall', '', 'shuvo151dey@gmail.com', 1234567890, 0),
(19, 'puneet', '18mi33016', 'Patel Hall', '', 'puneet3476@yahoo.com', 1234567890, 0),
(20, 'puneet', '18mi33016', 'Patel Hall', '', 'puneet3476@yahoo.com', 1234567890, 0),
(21, 'puneet', '18mi33016', 'Patel Hall', '', 'sgdanawe111@gmail.com', 1234567890, 0),
(22, 'puneet', '18mi33016', 'Patel Hall', '', 'puneet3476@yahoo.com', 1234567890, 0),
(23, 'puneet', '18mi33016', 'Nehru Hall', 'b-402', 'puneet3476@yahoo.com', 1234567890, 0),
(24, 'puneet', '18mi33016', 'Patel Hall', 'b-402', 'puneet3476@yahoo.com', 1234567890, 0),
(25, 'puneet', '18mi33016', 'Megnad Saha Hall', 'b-402', 'puneet3476@yahoo.com', 1234567890, 0),
(26, 'puneet', '18mi33016', 'Mother Teresa Hall', 'b-402', 'puneet3476@yahoo.com', 1234567890, 0),
(27, 'puneet', '18mi33016', 'Patel Hall', 'b-402', 'puneet3476@yahoo.com', 1234567890, 0),
(28, 'hnj', '12sd34565', 'Sir Ashutosh Mukherjee Hall', 'fgh', 'fcgv@fg.com', 1234567890, 0),
(29, 'puneet', '18mi33016', 'Radha Krishnan Hall', 'b-402', 'sgdanawe111@gmail.com', 1234567890, 0),
(30, 'asfsd', '18mi33016', 'Rani Laxmibai Hall', 'b-402', 'shuvo151dey@gmail.com', 1234567890, 0);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `phone_2` (`phone`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `googleaccount`
--
ALTER TABLE `googleaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merch`
--
ALTER TABLE `merch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mycomment`
--
ALTER TABLE `mycomment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `myguests`
--
ALTER TABLE `myguests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mytopic`
--
ALTER TABLE `mytopic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_new`
--
ALTER TABLE `orders_new`
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
-- Indexes for table `sf`
--
ALTER TABLE `sf`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
ALTER TABLE `sf` ADD FULLTEXT KEY `email` (`email`);

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
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10009;

--
-- AUTO_INCREMENT for table `clickdata`
--
ALTER TABLE `clickdata`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2296;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `googleaccount`
--
ALTER TABLE `googleaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merch`
--
ALTER TABLE `merch`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mycomment`
--
ALTER TABLE `mycomment`
  MODIFY `commentid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `mytopic`
--
ALTER TABLE `mytopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20003;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `orders_new`
--
ALTER TABLE `orders_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `postvideosurvey`
--
ALTER TABLE `postvideosurvey`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `prevideosurvey`
--
ALTER TABLE `prevideosurvey`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30007;

--
-- AUTO_INCREMENT for table `sf`
--
ALTER TABLE `sf`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `student_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
