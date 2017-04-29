-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2017 at 03:49 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hello_world` () RETURNS TEXT CHARSET latin1 BEGIN
  RETURN 'Hello World';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `activity_unique_id` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `assigned_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activity_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority_id` int(11) NOT NULL,
  `status_id` tinyint(1) NOT NULL,
  `activity_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `progress` int(11) NOT NULL,
  `created_by` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `project_id`, `activity_unique_id`, `modified_by`, `assigned_to`, `activity_title`, `priority_id`, `status_id`, `activity_description`, `due_date`, `progress`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 2, '3', 'Activity Test 3 ', 1, 0, 'SDFSDFSFD', '0000-00-00', 0, 2, '2017-03-30 15:16:59', '2017-03-30 15:16:59'),
(2, 1, 5, 2, '3', 'Activity Test 3 ', 1, 0, 'jjkjkjkjk', '0000-00-00', 0, 2, '2017-03-30 15:22:39', '2017-03-30 15:22:39'),
(3, 1, 6, 2, '3', 'Activity Test23 ', 1, 0, 'sadasdasd', '2017-03-16', 0, 2, '2017-03-30 15:25:33', '2017-03-30 15:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `user1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user1_is_typing` tinyint(1) NOT NULL DEFAULT '0',
  `user2_is_typing` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `user1_is_typing` tinyint(1) NOT NULL,
  `user2_is_typing` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_username`, `receiver`, `message`, `read`, `user1_is_typing`, `user2_is_typing`, `created_at`, `updated_at`) VALUES
(1, '2', 3, 'Un jom Edoni ', 1, 0, 1, '2017-03-28 23:18:19', '2017-04-29 15:47:48'),
(2, '3', 2, 'Un jom Hajra', 1, 0, 0, '2017-03-28 23:18:42', '2017-03-28 23:18:44'),
(3, '3', 2, 'Un jom Hajra 1', 1, 0, 0, '2017-03-28 23:18:50', '2017-03-28 23:18:50'),
(4, '2', 3, 'un jom edoni 2', 1, 0, 0, '2017-03-28 23:19:55', '2017-03-28 23:19:57'),
(5, '3', 2, 'un jom hajra 3', 1, 0, 0, '2017-03-28 23:20:20', '2017-03-28 23:20:20'),
(6, '2', 3, 'ani tash u bo medemek edhe kjo a ', 1, 0, 0, '2017-03-28 23:43:47', '2017-03-28 23:43:50'),
(7, '3', 2, 'poget po', 1, 0, 0, '2017-03-28 23:44:32', '2017-03-28 23:44:33'),
(8, '1', 3, 'hej hajro', 0, 0, 0, '2017-03-28 23:46:24', '2017-03-28 23:46:24'),
(9, '1', 3, ' hajro dreni jom', 0, 0, 0, '2017-03-29 00:14:14', '2017-03-29 00:14:14'),
(10, '2', 3, 'http://localhost/pms/en/dashboard', 1, 0, 0, '2017-03-29 00:16:41', '2017-03-29 00:16:43'),
(11, '3', 2, 'test', 1, 0, 0, '2017-03-29 00:32:14', '2017-03-29 00:32:15'),
(12, '3', 2, 'testi', 1, 0, 0, '2017-03-29 00:32:20', '2017-03-29 00:32:23'),
(13, '2', 3, 'oki', 1, 0, 0, '2017-03-29 00:32:38', '2017-03-29 00:32:39'),
(14, '2', 3, 'super', 1, 0, 0, '2017-03-29 00:32:42', '2017-03-29 00:32:42'),
(15, '2', 3, 'https://almsaeedstudio.com/ qeky site i mire', 1, 0, 0, '2017-03-29 00:32:57', '2017-03-29 00:32:57'),
(16, '3', 2, 'http://stackoverflow.com/questions/18614301/keep-overflow-div-scrolled-to-bottom-unless-user-scrolls-up qekjo a loqk', 1, 0, 0, '2017-03-29 00:58:01', '2017-03-29 00:58:05'),
(17, '2', 3, 'http://localhost/pms/en/dashboard', 1, 0, 0, '2017-03-29 01:03:57', '2017-03-29 01:03:59'),
(18, '2', 3, 'http://localhost/pms/en/dashboard asdasd', 1, 0, 0, '2017-03-29 01:04:19', '2017-03-29 01:04:20'),
(19, '2', 3, 'https://almsaeedstudio.com/', 1, 0, 0, '2017-03-29 01:05:31', '2017-03-29 01:05:33'),
(20, '2', 3, 'http://localhost/pms/en/dashboard/', 1, 0, 0, '2017-03-29 01:05:57', '2017-03-29 01:06:00'),
(21, '2', 3, 'https://almsaeedstudio.com/', 1, 0, 0, '2017-03-29 01:06:37', '2017-03-29 01:06:39'),
(22, '2', 3, 'https://almsaeedstudio.com/ qekjo test', 1, 0, 0, '2017-03-29 01:07:06', '2017-03-29 01:07:06'),
(23, '2', 3, 'https://localhost/pms/en/dashboard/', 1, 0, 0, '2017-03-29 01:07:50', '2017-03-29 01:07:51'),
(24, '2', 3, 'https://css-tricks.com/snippets/php/find-urls-in-text-make-links/', 1, 0, 0, '2017-03-29 01:08:44', '2017-03-29 01:08:45'),
(25, '2', 3, 'https://css-tricks.com/snippets/php/find-urls-in-text-make-links/', 1, 0, 0, '2017-03-29 01:10:20', '2017-03-29 01:10:21'),
(26, '2', 3, 'https://localhost/pms/en/dashboard/', 1, 0, 0, '2017-03-29 01:10:45', '2017-03-29 01:10:45'),
(27, '2', 3, 'www.google.com', 1, 0, 0, '2017-03-29 01:12:04', '2017-03-29 01:12:06'),
(28, '2', 3, 'https://css-tricks.com/snippets/php/find-urls-in-text-make-links/', 1, 0, 0, '2017-03-29 01:13:03', '2017-03-29 01:13:04'),
(29, '2', 3, 'https://css-tricks.com/snippets/php/find-urls-in-text-make-links', 1, 0, 0, '2017-03-29 01:13:10', '2017-03-29 01:13:13'),
(30, '2', 3, 'https://mail.google.com/mail/u/0/#inboxhttps://mail.google.com/mail/u/0/#inbox', 1, 0, 0, '2017-03-29 01:14:00', '2017-03-29 01:14:01'),
(31, '3', 2, 'hej', 1, 0, 0, '2017-03-29 10:17:30', '2017-03-29 10:17:32'),
(32, '2', 3, 'qa ka qa ka ', 1, 0, 0, '2017-03-29 10:17:39', '2017-03-29 10:17:40'),
(33, '3', 2, 'qe hiq', 1, 0, 0, '2017-03-29 10:17:48', '2017-03-29 10:17:50'),
(34, '3', 2, 'https://eonasdan.github.io/bootstrap-datetimepicker/ qe linku', 1, 0, 0, '2017-03-29 10:18:13', '2017-03-29 10:18:14'),
(35, '2', 3, 'hej', 1, 0, 0, '2017-03-30 17:30:39', '2017-04-04 00:41:27'),
(36, '2', 4, 'hej', 0, 0, 0, '2017-04-03 14:53:54', '2017-04-03 14:53:54'),
(37, '2', 3, 'hej', 1, 0, 0, '2017-04-03 18:22:43', '2017-04-04 00:41:30'),
(38, '2', 3, 'qa po bon qa ka ', 1, 0, 0, '2017-04-03 18:22:54', '2017-04-04 00:41:33'),
(39, '2', 3, 'qe hiq', 1, 0, 0, '2017-04-03 18:23:19', '2017-04-04 00:41:36'),
(40, '2', 5, 'opa', 1, 0, 0, '2017-04-03 18:26:14', '2017-04-03 19:47:41'),
(41, '5', 2, 'qa je tu bo', 1, 0, 0, '2017-04-03 19:49:59', '2017-04-04 12:20:25'),
(42, '5', 2, 'gji ka ', 1, 0, 0, '2017-04-03 19:51:35', '2017-04-04 12:20:25'),
(43, '5', 2, 'gji ka gji ska', 1, 0, 0, '2017-04-03 19:52:58', '2017-04-04 12:20:25'),
(44, '5', 2, 'a u bo tash', 1, 0, 0, '2017-04-03 19:54:23', '2017-04-04 12:20:26'),
(45, '5', 2, 'asdasd', 1, 0, 0, '2017-04-03 19:54:38', '2017-04-04 12:20:26'),
(46, '5', 2, 'sdfsdf', 1, 0, 0, '2017-04-03 19:54:40', '2017-04-04 12:20:27'),
(47, '6', 7, 'hej', 1, 0, 0, '2017-04-03 20:39:45', '2017-04-03 20:44:30'),
(48, '6', 7, 'qa je tu bo', 1, 0, 0, '2017-04-03 20:53:17', '2017-04-03 20:54:25'),
(49, '6', 7, 'test', 1, 0, 0, '2017-04-03 20:54:53', '2017-04-03 20:54:54'),
(50, '6', 7, 'allo', 1, 0, 0, '2017-04-03 20:55:56', '2017-04-03 20:55:57'),
(51, '6', 7, 'hejo', 1, 0, 0, '2017-04-03 21:00:17', '2017-04-03 21:01:43'),
(52, '6', 7, 'un jom vlora', 1, 0, 0, '2017-04-03 21:02:21', '2017-04-03 21:04:43'),
(53, '6', 7, 'une jom vlora 2', 1, 0, 0, '2017-04-03 21:05:40', '2017-04-03 21:05:44'),
(54, '6', 7, 'un jom vlora 3', 1, 0, 0, '2017-04-03 21:06:05', '2017-04-03 21:06:06'),
(55, '6', 7, 'un jom vlora 4', 1, 0, 0, '2017-04-03 21:09:14', '2017-04-03 21:09:27'),
(56, '6', 7, 'un jom vlora 5', 1, 0, 0, '2017-04-03 21:09:54', '2017-04-03 21:09:55'),
(57, '6', 7, 'sdfsdfsdf', 1, 0, 0, '2017-04-03 21:12:43', '2017-04-03 21:12:45'),
(58, '7', 6, 'sadasdasdasd', 1, 0, 0, '2017-04-03 21:13:12', '2017-04-03 21:13:13'),
(59, '6', 7, 'asdasdsdfsdf', 1, 0, 0, '2017-04-03 21:13:49', '2017-04-03 21:13:51'),
(60, '6', 7, 'hejo testi', 1, 0, 0, '2017-04-03 21:19:53', '2017-04-03 21:27:25'),
(61, '6', 7, 'hej', 1, 0, 0, '2017-04-03 21:27:13', '2017-04-03 21:28:06'),
(62, '6', 7, 'hello', 1, 0, 0, '2017-04-03 21:28:33', '2017-04-03 21:28:47'),
(63, '6', 7, 'hello1', 1, 0, 0, '2017-04-03 21:29:14', '2017-04-03 21:29:26'),
(64, '6', 7, 'hello2', 1, 0, 0, '2017-04-03 21:30:44', '2017-04-03 21:30:54'),
(65, '6', 7, 'hello3', 1, 0, 0, '2017-04-03 21:31:29', '2017-04-03 21:31:40'),
(66, '6', 7, 'qa bone qa ka ', 1, 0, 0, '2017-04-03 21:32:07', '2017-04-03 21:32:31'),
(67, '6', 7, 'testito', 1, 0, 0, '2017-04-03 21:33:50', '2017-04-03 21:34:28'),
(68, '6', 7, 'testooooo', 1, 0, 0, '2017-04-03 21:35:18', '2017-04-03 21:35:27'),
(69, '6', 7, 'opaaa', 1, 0, 0, '2017-04-03 21:36:52', '2017-04-03 21:37:02'),
(70, '6', 7, 'qa ka ', 1, 0, 0, '2017-04-03 21:37:18', '2017-04-03 21:39:45'),
(71, '6', 7, 'hej bre ', 1, 0, 0, '2017-04-03 21:38:28', '2017-04-03 21:41:22'),
(72, '6', 7, 'hejooo', 1, 0, 0, '2017-04-03 21:39:41', '2017-04-03 21:41:56'),
(73, '6', 7, 'hej', 1, 0, 0, '2017-04-03 21:41:03', '2017-04-03 21:42:32'),
(74, '7', 6, 'a po qetsohesh mo', 1, 0, 0, '2017-04-03 21:42:50', '2017-04-03 21:43:15'),
(75, '6', 7, 'ha ej', 1, 0, 0, '2017-04-03 21:46:31', '2017-04-03 21:46:33'),
(76, '7', 6, 'qa u bo more', 1, 0, 0, '2017-04-03 21:46:43', '2017-04-03 21:46:43'),
(77, '6', 7, 'qa pe di un', 1, 0, 0, '2017-04-03 21:46:52', '2017-04-03 21:46:54'),
(78, '6', 7, 'mos ha mut ani', 1, 0, 0, '2017-04-03 21:47:12', '2017-04-03 21:47:15'),
(79, '7', 6, 'hajt mos fol palidhje', 1, 0, 0, '2017-04-03 21:47:28', '2017-04-03 21:47:28'),
(80, '7', 6, 'ncc', 1, 0, 0, '2017-04-03 21:48:05', '2017-04-03 21:48:07'),
(81, '6', 7, 'ncc je vet3', 1, 0, 0, '2017-04-03 21:48:35', '2017-04-03 21:48:36'),
(82, '7', 6, 'qa ki bre mo', 1, 0, 0, '2017-04-03 21:49:16', '2017-04-03 21:49:18'),
(83, '6', 7, 'mare be qyli', 1, 0, 0, '2017-04-03 21:50:08', '2017-04-03 21:50:20'),
(84, '6', 7, 'a', 1, 0, 0, '2017-04-03 21:52:02', '2017-04-03 21:53:19'),
(85, '6', 7, 'flase', 1, 0, 0, '2017-04-03 21:53:30', '2017-04-03 21:55:29'),
(86, '6', 7, 'hej', 1, 0, 0, '2017-04-03 21:55:12', '2017-04-03 21:56:32'),
(87, '6', 7, 'hej', 1, 0, 0, '2017-04-03 21:56:28', '2017-04-03 21:58:49'),
(88, '7', 6, 'qa po bon', 1, 0, 0, '2017-04-03 21:56:40', '2017-04-03 21:59:05'),
(89, '7', 6, 'si je ', 1, 0, 0, '2017-04-03 21:59:01', '2017-04-03 21:59:19'),
(90, '6', 7, 'hej', 1, 0, 0, '2017-04-03 22:00:44', '2017-04-03 22:01:57'),
(91, '7', 6, 'qa ka', 1, 0, 0, '2017-04-03 22:00:59', '2017-04-03 22:02:24'),
(92, '7', 6, 'hej', 1, 0, 0, '2017-04-03 22:02:08', '2017-04-03 22:03:55'),
(93, '6', 7, 'qa ka ', 1, 0, 0, '2017-04-03 22:02:31', '2017-04-03 22:04:04'),
(94, '6', 7, 'hajde', 1, 0, 0, '2017-04-03 22:03:59', '2017-04-03 22:05:12'),
(95, '6', 7, 'hajde mo', 1, 0, 0, '2017-04-03 22:07:12', '2017-04-03 22:07:17'),
(96, '6', 7, 'hej mo', 1, 0, 0, '2017-04-03 22:08:44', '2017-04-03 22:09:00'),
(97, '7', 6, 'hej', 1, 0, 0, '2017-04-03 22:09:41', '2017-04-03 22:10:36'),
(98, '6', 7, 'phia', 1, 0, 0, '2017-04-03 22:10:38', '2017-04-03 22:10:43'),
(99, '6', 7, 'hejo', 1, 0, 0, '2017-04-03 22:11:56', '2017-04-03 22:12:02'),
(100, '6', 7, 'hej', 1, 0, 0, '2017-04-03 22:15:43', '2017-04-03 22:16:02'),
(101, '6', 7, 'asdsdasd', 1, 0, 0, '2017-04-03 22:17:04', '2017-04-03 22:17:05'),
(102, '7', 6, 'asdasdasdasd', 1, 0, 0, '2017-04-03 22:17:11', '2017-04-03 22:17:14'),
(103, '6', 7, 'asdasdasd', 1, 0, 0, '2017-04-03 22:17:54', '2017-04-03 22:18:21'),
(104, '7', 6, 'flase', 1, 0, 0, '2017-04-03 22:18:38', '2017-04-03 22:18:41'),
(105, '6', 7, 'ne var ne yok', 1, 0, 0, '2017-04-03 22:18:51', '2017-04-03 22:18:52'),
(106, '6', 7, 'sende', 1, 0, 0, '2017-04-03 22:19:01', '2017-04-03 22:19:01'),
(107, '7', 6, 'hej', 1, 0, 0, '2017-04-03 22:21:27', '2017-04-03 22:21:53'),
(108, '6', 7, 'qa po bon', 1, 0, 0, '2017-04-03 22:21:57', '2017-04-03 22:23:41'),
(109, '7', 6, 'plasa', 1, 0, 0, '2017-04-03 22:23:45', '2017-04-03 22:23:49'),
(110, '6', 7, 'plassa', 1, 0, 0, '2017-04-03 22:24:12', '2017-04-03 22:25:00'),
(111, '6', 7, 'hej', 1, 0, 0, '2017-04-03 22:24:57', '2017-04-03 22:29:40'),
(112, '7', 6, 'qa ka ', 1, 0, 0, '2017-04-03 22:29:55', '2017-04-03 22:30:03'),
(113, '6', 7, 'qa ka ', 1, 0, 0, '2017-04-03 22:30:11', '2017-04-03 22:30:13'),
(114, '6', 7, 'hiq te ti', 1, 0, 0, '2017-04-03 22:30:34', '2017-04-03 22:30:35'),
(115, '7', 6, 'qa', 1, 0, 0, '2017-04-03 22:30:49', '2017-04-03 22:30:52'),
(116, '6', 7, 'smerdh', 1, 0, 0, '2017-04-03 22:30:57', '2017-04-03 22:30:59'),
(117, '6', 7, 'qa u bo', 1, 0, 0, '2017-04-03 22:31:15', '2017-04-03 22:31:20'),
(118, '7', 6, '?', 1, 0, 0, '2017-04-03 22:31:32', '2017-04-03 22:31:34'),
(119, '6', 7, 'spo vijne fjalt', 1, 0, 0, '2017-04-03 22:31:56', '2017-04-03 22:31:59'),
(120, '6', 7, 'kaja nonen', 1, 0, 0, '2017-04-03 22:32:21', '2017-04-03 22:32:30'),
(121, '7', 6, 'pse', 1, 0, 0, '2017-04-03 22:32:34', '2017-04-03 22:32:34'),
(122, '6', 7, 'so bash taman ', 1, 0, 0, '2017-04-03 22:32:41', '2017-04-03 22:32:42'),
(123, '6', 7, 'me koh mdoket', 1, 0, 0, '2017-04-03 22:32:50', '2017-04-03 22:32:51'),
(124, '7', 6, 'qija noen', 1, 0, 0, '2017-04-03 22:32:59', '2017-04-03 22:33:01'),
(125, '6', 7, 'a be', 1, 0, 0, '2017-04-03 22:33:42', '2017-04-03 22:33:43'),
(126, '6', 7, 'qamet', 1, 0, 0, '2017-04-03 22:35:12', '2017-04-03 22:35:28'),
(127, '6', 7, 'qametii', 1, 0, 0, '2017-04-03 22:36:25', '2017-04-03 22:36:42'),
(128, '6', 7, 'pse', 1, 0, 0, '2017-04-03 22:38:12', '2017-04-03 22:41:08'),
(129, '6', 7, 'qa kari o ka bohet o njeri', 1, 0, 0, '2017-04-03 22:40:59', '2017-04-03 22:40:59'),
(130, '6', 7, 'a', 1, 0, 0, '2017-04-03 22:46:55', '2017-04-03 22:48:35'),
(131, '7', 6, 'fol', 1, 0, 0, '2017-04-03 22:48:44', '2017-04-03 22:49:05'),
(132, '6', 7, 'mos ha mo', 1, 0, 0, '2017-04-03 22:49:05', '2017-04-03 22:49:05'),
(133, '6', 7, 'ihhha', 1, 0, 0, '2017-04-03 22:49:52', '2017-04-03 22:49:59'),
(134, '7', 6, 'qa u bo', 1, 0, 0, '2017-04-03 22:50:07', '2017-04-03 22:50:08'),
(135, '6', 7, 'qa pe di un', 1, 0, 0, '2017-04-03 22:50:17', '2017-04-03 22:50:20'),
(136, '7', 6, 'smerdh qa fole', 1, 0, 0, '2017-04-03 22:50:37', '2017-04-03 22:50:39'),
(137, '6', 7, 'as mu', 1, 0, 0, '2017-04-03 22:50:46', '2017-04-03 22:50:47'),
(138, '7', 6, 'shum palidhje', 1, 0, 0, '2017-04-03 22:50:56', '2017-04-03 22:50:57'),
(139, '6', 7, 'ama bash', 1, 0, 0, '2017-04-03 22:51:05', '2017-04-03 22:51:08'),
(140, '6', 7, 'hejo', 1, 0, 0, '2017-04-03 22:51:56', '2017-04-03 22:53:00'),
(141, '6', 7, 'qa ka ', 1, 0, 0, '2017-04-03 22:52:13', '2017-04-03 22:53:03'),
(142, '6', 7, 'mut', 1, 0, 0, '2017-04-03 22:53:33', '2017-04-03 22:53:36'),
(143, '7', 6, 'pse qa u bo', 1, 0, 0, '2017-04-03 22:53:49', '2017-04-03 22:53:49'),
(144, '6', 7, 'qa pe di bre tripa', 1, 0, 0, '2017-04-03 22:53:58', '2017-04-03 22:53:58'),
(145, '6', 7, 'qa ka najsen', 1, 0, 0, '2017-04-03 22:54:07', '2017-04-03 22:54:11'),
(146, '7', 6, 'hiq valla krejt ', 1, 0, 0, '2017-04-03 22:54:36', '2017-04-03 22:54:37'),
(147, '6', 7, 'qa krejt lol', 1, 0, 0, '2017-04-03 22:55:12', '2017-04-03 22:55:13'),
(148, '6', 7, 'po fol palidhje', 1, 0, 0, '2017-04-03 22:55:26', '2017-04-03 22:55:29'),
(149, '7', 6, 'aaa', 1, 0, 0, '2017-04-03 22:56:49', '2017-04-03 22:56:51'),
(150, '6', 7, 'sdfsdfsf', 1, 0, 0, '2017-04-03 22:57:08', '2017-04-03 22:57:44'),
(151, '6', 7, 'asdasdasd', 1, 0, 0, '2017-04-03 22:57:56', '2017-04-03 22:57:58'),
(152, '6', 7, 'aaaaasdsad', 1, 0, 0, '2017-04-03 22:58:08', '2017-04-03 22:58:10'),
(153, '6', 7, 'hej mdoket u bo qesi heri', 1, 0, 0, '2017-04-03 23:18:40', '2017-04-03 23:18:54'),
(154, '7', 6, 'po thu', 1, 0, 0, '2017-04-03 23:19:02', '2017-04-03 23:19:03'),
(155, '6', 7, 'valla po thom', 1, 0, 0, '2017-04-03 23:19:14', '2017-04-03 23:19:30'),
(156, '7', 6, 'super pra', 1, 0, 0, '2017-04-03 23:19:36', '2017-04-03 23:19:39'),
(157, '7', 6, 'qa ka ', 1, 0, 0, '2017-04-03 23:19:47', '2017-04-03 23:19:49'),
(158, '7', 6, 'qa po thu', 1, 0, 0, '2017-04-03 23:20:06', '2017-04-03 23:20:23'),
(159, '7', 6, 'qa kom me thon', 1, 0, 0, '2017-04-03 23:26:12', '2017-04-03 23:26:12'),
(160, '7', 4, 'AA', 0, 0, 0, '2017-04-03 23:26:42', '2017-04-03 23:26:42'),
(161, '7', 6, 'qa u bo', 1, 0, 0, '2017-04-03 23:27:15', '2017-04-03 23:27:15'),
(162, '7', 6, 'aaaa', 1, 0, 0, '2017-04-03 23:27:43', '2017-04-03 23:27:45'),
(163, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-03 23:29:56', '2017-04-03 23:29:58'),
(164, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-03 23:29:57', '2017-04-03 23:30:01'),
(165, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-03 23:29:57', '2017-04-03 23:30:04'),
(166, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-03 23:29:58', '2017-04-03 23:30:07'),
(167, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-03 23:29:58', '2017-04-03 23:30:10'),
(168, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-03 23:29:58', '2017-04-03 23:30:13'),
(169, '7', 6, 'asdasdsdad', 1, 0, 0, '2017-04-03 23:30:26', '2017-04-03 23:30:28'),
(170, '7', 6, 'aa', 1, 0, 0, '2017-04-03 23:31:37', '2017-04-03 23:31:40'),
(171, '7', 6, 'asdasd', 1, 0, 0, '2017-04-03 23:32:37', '2017-04-03 23:32:40'),
(172, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-03 23:33:24', '2017-04-03 23:33:25'),
(173, '7', 3, 'asdasdad', 1, 0, 0, '2017-04-03 23:33:51', '2017-04-04 00:36:54'),
(174, '7', 3, 'asdasd', 1, 0, 0, '2017-04-03 23:34:23', '2017-04-04 00:36:57'),
(175, '7', 3, 'asdasd', 1, 0, 0, '2017-04-03 23:34:25', '2017-04-04 00:37:00'),
(176, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-03 23:34:41', '2017-04-04 00:37:03'),
(177, '7', 4, 'asdasd', 0, 0, 0, '2017-04-03 23:34:50', '2017-04-03 23:34:50'),
(178, '7', 6, 'sadasd', 1, 0, 0, '2017-04-03 23:36:04', '2017-04-03 23:36:07'),
(179, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-03 23:36:12', '2017-04-04 00:37:06'),
(180, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-03 23:37:25', '2017-04-04 00:37:09'),
(181, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-03 23:38:34', '2017-04-03 23:38:34'),
(182, '7', 3, 'asadasd', 1, 0, 0, '2017-04-03 23:38:51', '2017-04-04 00:37:12'),
(183, '7', 4, 'asdasdasd', 0, 0, 0, '2017-04-03 23:39:26', '2017-04-03 23:39:26'),
(184, '7', 6, 'sadasdasd', 1, 0, 0, '2017-04-03 23:43:07', '2017-04-03 23:43:08'),
(185, '7', 3, 'asdasd', 1, 0, 0, '2017-04-03 23:43:19', '2017-04-04 00:37:15'),
(186, '7', 4, 'asdasdasd', 0, 0, 0, '2017-04-03 23:43:55', '2017-04-03 23:43:55'),
(187, '7', 4, 'asdasdasdasdasd', 0, 0, 0, '2017-04-03 23:44:52', '2017-04-03 23:44:52'),
(188, '7', 6, '\\asdasd', 1, 0, 0, '2017-04-03 23:45:34', '2017-04-03 23:45:35'),
(189, '7', 6, 'asdasddsaasddd', 1, 0, 0, '2017-04-03 23:45:46', '2017-04-03 23:45:47'),
(190, '7', 3, 'asdasd', 1, 0, 0, '2017-04-03 23:46:00', '2017-04-04 00:37:18'),
(191, '7', 3, 'asasdddddasddsaqwe', 1, 0, 0, '2017-04-03 23:46:17', '2017-04-04 00:37:21'),
(192, '7', 6, 'asdasdasdasdasdasddsaasddsaasdasdasdasdasdasdasdasd', 1, 0, 0, '2017-04-03 23:46:39', '2017-04-03 23:46:41'),
(193, '7', 3, 'asdasd', 1, 0, 0, '2017-04-03 23:46:57', '2017-04-04 00:37:24'),
(194, '7', 6, 'sdfsdfsdf', 1, 0, 0, '2017-04-03 23:49:18', '2017-04-03 23:49:21'),
(195, '7', 3, 'sadasdasd', 1, 0, 0, '2017-04-03 23:49:30', '2017-04-04 00:37:27'),
(196, '7', 3, 'asdasd', 1, 0, 0, '2017-04-03 23:51:10', '2017-04-04 00:37:30'),
(197, '7', 2, 'blla', 1, 0, 0, '2017-04-03 23:51:57', '2017-04-04 12:20:20'),
(198, '7', 6, 'blla', 1, 0, 0, '2017-04-03 23:52:03', '2017-04-03 23:52:06'),
(199, '7', 6, 'opa', 1, 0, 0, '2017-04-03 23:52:55', '2017-04-03 23:52:57'),
(200, '7', 3, 'opalla', 1, 0, 0, '2017-04-03 23:53:35', '2017-04-04 00:37:33'),
(201, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-03 23:59:44', '2017-04-04 00:37:36'),
(202, '7', 5, 'saddasd', 0, 0, 0, '2017-04-04 00:03:42', '2017-04-04 00:03:42'),
(203, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-04 00:05:26', '2017-04-04 00:37:39'),
(204, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-04 00:05:30', '2017-04-04 00:37:42'),
(205, '7', 6, 'asdasd', 1, 0, 0, '2017-04-04 00:08:35', '2017-04-04 00:08:38'),
(206, '7', 4, 'sadasdasd', 0, 0, 0, '2017-04-04 00:08:44', '2017-04-04 00:08:44'),
(207, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-04 00:10:41', '2017-04-04 00:10:41'),
(208, '7', 4, 'asdasdasd', 0, 0, 0, '2017-04-04 00:11:53', '2017-04-04 00:11:53'),
(209, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-04 00:14:11', '2017-04-04 00:14:12'),
(210, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-04 00:14:15', '2017-04-04 00:14:15'),
(211, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-04 00:14:29', '2017-04-04 00:37:47'),
(212, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-04 00:14:36', '2017-04-04 00:37:50'),
(213, '7', 3, 'send 6', 1, 0, 0, '2017-04-04 00:15:34', '2017-04-04 00:37:53'),
(214, '7', 3, 'send 6', 1, 0, 0, '2017-04-04 00:15:34', '2017-04-04 00:37:56'),
(215, '7', 3, 'send 3', 1, 0, 0, '2017-04-04 00:15:42', '2017-04-04 00:37:59'),
(216, '6', 6, 'asdasdasd', 0, 0, 0, '2017-04-04 00:17:36', '2017-04-04 00:17:36'),
(217, '6', 3, 'asdasdasd', 1, 0, 0, '2017-04-04 00:17:43', '2017-04-04 00:41:39'),
(218, '6', 3, 'asdasdasd', 1, 0, 0, '2017-04-04 00:17:43', '2017-04-04 00:41:42'),
(219, '6', 3, 'asdasdasd', 1, 0, 0, '2017-04-04 00:17:44', '2017-04-04 00:41:45'),
(220, '6', 3, 'ggg', 1, 0, 0, '2017-04-04 00:17:52', '2017-04-04 00:41:48'),
(221, '3', 3, 'asdasdasd', 0, 0, 0, '2017-04-04 00:17:57', '2017-04-04 00:17:57'),
(222, '7', 6, 'asdasd', 1, 0, 0, '2017-04-04 00:18:42', '2017-04-04 00:18:42'),
(223, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-04 00:18:56', '2017-04-04 00:38:02'),
(224, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-04 00:19:35', '2017-04-04 00:38:05'),
(225, '7', 6, 'asddfsff', 1, 0, 0, '2017-04-04 00:20:45', '2017-04-04 00:20:46'),
(226, '7', 3, 'sdfsdfsdf', 1, 0, 0, '2017-04-04 00:20:49', '2017-04-04 00:38:08'),
(227, '7', 3, 'sdfsdfsdfsdf', 1, 0, 0, '2017-04-04 00:21:04', '2017-04-04 00:38:11'),
(228, '7', 6, 'sdfsdfsdfsdwf', 1, 0, 0, '2017-04-04 00:21:10', '2017-04-04 00:21:13'),
(229, '7', 4, 'sdsdfsfsdfsffd', 0, 0, 0, '2017-04-04 00:22:03', '2017-04-04 00:22:03'),
(230, '7', 4, 'fddfgdfgdfg', 0, 0, 0, '2017-04-04 00:22:30', '2017-04-04 00:22:30'),
(231, '7', 4, 'asdasd', 0, 0, 0, '2017-04-04 00:23:34', '2017-04-04 00:23:34'),
(232, '7', 3, 'fghfghfh', 1, 0, 0, '2017-04-04 00:24:32', '2017-04-04 00:38:14'),
(233, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-04 00:27:11', '2017-04-04 00:27:13'),
(234, '7', 6, 'asdasdasd', 1, 0, 0, '2017-04-04 00:27:20', '2017-04-04 00:27:22'),
(235, '7', 3, 'asdasdasd', 1, 0, 0, '2017-04-04 00:30:24', '2017-04-04 00:38:17'),
(236, '7', 3, 'asddasdasd', 1, 0, 0, '2017-04-04 00:32:35', '2017-04-04 00:38:20'),
(237, '7', 3, 'asddasdasd', 1, 0, 0, '2017-04-04 00:32:36', '2017-04-04 00:38:23'),
(238, '7', 3, 'bali', 1, 0, 0, '2017-04-04 00:32:45', '2017-04-04 00:38:26'),
(239, '7', 4, 'dren', 0, 0, 0, '2017-04-04 00:32:48', '2017-04-04 00:32:48'),
(240, '7', 3, 'balio', 1, 0, 0, '2017-04-04 00:32:57', '2017-04-04 00:38:29'),
(241, '7', 3, 'hajrulla', 1, 0, 0, '2017-04-04 00:33:34', '2017-04-04 00:38:32'),
(242, '7', 4, 'natyre', 0, 0, 0, '2017-04-04 00:33:37', '2017-04-04 00:33:37'),
(243, '7', 5, 'rasim', 0, 0, 0, '2017-04-04 00:33:40', '2017-04-04 00:33:40'),
(244, '7', 3, 'hajrulla', 1, 0, 0, '2017-04-04 00:34:40', '2017-04-04 00:38:35'),
(245, '7', 4, 'natyre', 0, 0, 0, '2017-04-04 00:35:19', '2017-04-04 00:35:19'),
(246, '7', 5, 'rasim', 0, 0, 0, '2017-04-04 00:35:21', '2017-04-04 00:35:21'),
(247, '7', 6, 'vlora', 1, 0, 0, '2017-04-04 00:35:24', '2017-04-04 00:35:34'),
(248, '7', 3, 'hajrulla? si je a je mire ?', 1, 0, 0, '2017-04-04 00:36:09', '2017-04-04 00:38:38'),
(249, '3', 7, 'mire fat', 1, 0, 0, '2017-04-04 00:39:31', '2017-04-04 00:40:39'),
(250, '3', 5, 'qa bone ti', 0, 0, 0, '2017-04-04 00:39:54', '2017-04-04 00:39:54'),
(251, '3', 4, 'hejo', 0, 0, 0, '2017-04-04 00:40:01', '2017-04-04 00:40:01'),
(252, '3', 5, 'asdasdasd', 0, 0, 0, '2017-04-04 00:40:13', '2017-04-04 00:40:13'),
(253, '7', 3, 'qa ka.', 1, 0, 0, '2017-04-04 00:41:06', '2017-04-04 00:43:52'),
(254, '3', 7, 'hej', 1, 0, 0, '2017-04-04 00:42:04', '2017-04-04 00:42:04'),
(255, '7', 3, 'a ej', 1, 0, 0, '2017-04-04 00:43:02', '2017-04-04 00:43:55'),
(256, '7', 4, 'teta natyre ?', 0, 0, 0, '2017-04-04 00:43:11', '2017-04-04 00:43:11'),
(257, '7', 2, 'hala sje aty a ?', 1, 0, 0, '2017-04-04 00:43:19', '2017-04-04 12:34:39'),
(258, '3', 7, 'false fat', 1, 0, 0, '2017-04-04 00:44:32', '2017-04-04 00:45:24'),
(259, '3', 7, 'oo vlla', 1, 0, 0, '2017-04-04 00:47:45', '2017-04-04 00:47:56'),
(260, '3', 7, 'fatush', 1, 0, 0, '2017-04-04 00:49:57', '2017-04-04 00:49:58'),
(261, '7', 3, 'hajro', 1, 0, 0, '2017-04-04 00:50:08', '2017-04-04 00:50:10'),
(262, '3', 7, 'a be mo', 1, 0, 0, '2017-04-04 00:50:26', '2017-04-04 00:50:29'),
(263, '7', 4, 'a jeni aty ?', 0, 0, 0, '2017-04-04 00:50:42', '2017-04-04 00:50:42'),
(264, '7', 3, 'test vlla test se plasem', 1, 0, 0, '2017-04-04 00:52:42', '2017-04-04 00:52:45'),
(265, '3', 7, 'bash mo ora 3', 1, 0, 0, '2017-04-04 00:53:00', '2017-04-04 00:53:03'),
(266, '7', 4, '?', 0, 0, 0, '2017-04-04 00:53:43', '2017-04-04 00:53:43'),
(267, '7', 5, 'axha rasim ?', 0, 0, 0, '2017-04-04 00:53:50', '2017-04-04 00:53:50'),
(268, '7', 3, '?', 1, 0, 0, '2017-04-04 00:56:23', '2017-04-04 00:56:24'),
(269, '7', 4, 'asddss', 0, 0, 0, '2017-04-04 01:05:12', '2017-04-04 01:05:12'),
(270, '2', 5, 'aha po de', 0, 0, 0, '2017-04-04 12:20:44', '2017-04-04 12:20:44'),
(271, '2', 6, 'hej', 0, 0, 0, '2017-04-04 12:34:49', '2017-04-04 12:34:49'),
(272, '3', 2, 'hej', 1, 0, 0, '2017-04-04 13:21:39', '2017-04-04 15:04:09'),
(273, '3', 7, 'test', 0, 0, 0, '2017-04-04 13:22:27', '2017-04-04 13:22:27'),
(274, '3', 2, 'test', 1, 0, 0, '2017-04-04 13:23:33', '2017-04-04 18:54:04'),
(275, '3', 2, 'testito', 1, 0, 0, '2017-04-04 13:28:09', '2017-04-04 19:07:34'),
(276, '2', 5, 'asdasdasdasd', 0, 0, 0, '2017-04-26 13:51:44', '2017-04-26 13:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city_slug`, `city_title`, `created_at`, `updated_at`) VALUES
(1, '1', 'pz', 'Prizren', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cover_images`
--

CREATE TABLE `cover_images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_original_name` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cover_images`
--

INSERT INTO `cover_images` (`id`, `user_id`, `file_original_name`, `file_size`, `file_type`, `created_at`, `updated_at`) VALUES
(0, 1, 'Uml1.jpg', 84152, 'image/jpeg', '2017-02-02 15:50:02', '2017-02-02 15:50:02'),
(0, 1, 'Uml1.jpg', 84152, 'image/jpeg', '2017-02-02 15:51:43', '2017-02-02 15:51:43'),
(0, 2, 'cat-adult-landing-hero.jpg', 40144, 'image/jpeg', '2017-03-29 01:22:06', '2017-03-29 01:22:06'),
(0, 2, '13325735_10209979164500394_7276194570617060042_n.jpg', 107501, 'image/jpeg', '2017-03-29 01:23:39', '2017-03-29 01:23:39'),
(0, 0, '', 0, '', '2017-04-03 19:12:30', '2017-04-03 19:12:30'),
(0, 2, 'tracker.png', 1743, 'image/png', '2017-04-03 19:15:55', '2017-04-03 19:15:55'),
(0, 2, 'tracker.png', 1743, 'image/png', '2017-04-03 19:23:39', '2017-04-03 19:23:39'),
(0, 2, 'cat-adult-landing-hero.jpg', 40144, 'image/jpeg', '2017-04-03 19:29:48', '2017-04-03 19:29:48'),
(0, 3, '13406804_979528785502063_7230848329689681849_n.jpg', 47694, 'image/jpeg', '2017-04-03 19:41:16', '2017-04-03 19:41:16'),
(0, 3, '17309192_1236772779777661_4095899185550000586_n.jpg', 154819, 'image/jpeg', '2017-04-03 19:42:23', '2017-04-03 19:42:23'),
(0, 4, '15032042_10211650191597319_2887522034605437914_n.jpg', 70342, 'image/jpeg', '2017-04-03 19:46:04', '2017-04-03 19:46:04'),
(0, 5, '10568868_538869929573572_7431391660654303639_n.jpg', 82771, 'image/jpeg', '2017-04-03 19:46:51', '2017-04-03 19:46:51'),
(0, 6, 'cat-adult-landing-hero.jpg', 40144, 'image/jpeg', '2017-04-03 20:09:46', '2017-04-03 20:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `posted_by` int(11) NOT NULL,
  `file_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_original_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `posted_by`, `file_title`, `file_original_name`, `size`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, '', '', 0, '', '2017-03-28 17:33:21', '2017-03-28 17:33:21'),
(2, 2, 'File 1', 'cat-adult-landing-hero.jpg', 40144, 'image/jpeg', '2017-04-04 01:08:26', '2017-04-04 01:08:26'),
(3, 2, 'Fajlli', '17309192_1236772779777661_4095899185550000586_n.jpg', 154819, 'image/jpeg', '2017-04-04 01:16:00', '2017-04-04 01:16:00'),
(4, 2, 'Fajlli', '17309192_1236772779777661_4095899185550000586_n.jpg', 154819, 'image/jpeg', '2017-04-04 01:24:09', '2017-04-04 01:24:09'),
(5, 2, 'Fajlli', 'cat-adult-landing-hero.jpg', 40144, 'image/jpeg', '2017-04-04 01:37:12', '2017-04-04 01:37:12'),
(6, 0, '', '', 0, '', '2017-04-04 01:39:34', '2017-04-04 01:39:34'),
(7, 0, '', '', 0, '', '2017-04-04 01:45:12', '2017-04-04 01:45:12'),
(8, 0, '', '', 0, '', '2017-04-04 02:26:30', '2017-04-04 02:26:30'),
(9, 0, '', '', 0, '', '2017-04-04 02:31:00', '2017-04-04 02:31:00'),
(10, 0, '', '', 0, '', '2017-04-04 09:58:12', '2017-04-04 09:58:12'),
(11, 0, '', '', 0, '', '2017-04-04 10:36:49', '2017-04-04 10:36:49'),
(12, 0, '', '', 0, '', '2017-04-04 10:40:21', '2017-04-04 10:40:21'),
(13, 0, '', '', 0, '', '2017-04-04 10:52:23', '2017-04-04 10:52:23'),
(14, 0, '', '', 0, '', '2017-04-04 10:55:36', '2017-04-04 10:55:36'),
(15, 0, '', '', 0, '', '2017-04-04 10:56:31', '2017-04-04 10:56:31'),
(16, 0, '', '', 0, '', '2017-04-04 11:47:05', '2017-04-04 11:47:05'),
(17, 0, '', '', 0, '', '2017-04-04 12:03:21', '2017-04-04 12:03:21'),
(18, 0, '', '', 0, '', '2017-04-04 12:04:14', '2017-04-04 12:04:14'),
(19, 0, '', '', 0, '', '2017-04-04 12:18:34', '2017-04-04 12:18:34'),
(20, 0, '', '', 0, '', '2017-04-26 13:48:40', '2017-04-26 13:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `code`, `ord`, `visible`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '', '', NULL, NULL),
(2, 'Shqip', 'sq', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_18_183830_create_chats_table', 1),
('2014_10_18_183949_create_chat_messages_table', 1),
('2016_10_02_180230_create_users_table', 1),
('2016_10_02_192553_create_languages_table', 1),
('2016_10_03_034002_create_roles_table', 1),
('2016_10_16_192455_create_projects_table', 1),
('2016_10_16_201913_create_project_Details_table', 1),
('2016_10_16_211727_create_tasks_table', 1),
('2016_10_16_213929_create_priorities_table', 1),
('2016_10_16_213952_create_satuses_table', 1),
('2016_10_22_214532_create_states_table', 1),
('2016_10_22_214629_create_cities_table', 1),
('2016_11_07_200608_create_users_details_table', 1),
('2016_11_08_144321_create_task_responses_table', 1),
('2016_11_08_150949_create_files_table', 1),
('2016_12_25_224551_create_activities_table', 1),
('2017_01_19_225806_create_rejected_table', 1),
('2017_02_02_164206_create_to_dos_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `priority_title`, `created_at`, `updated_at`) VALUES
(1, 'High', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_title`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Project 1', 1, '2017-03-30 15:13:51', '2017-03-30 15:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `projects_details`
--

CREATE TABLE `projects_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `project_budget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_cost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modified_by` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects_details`
--

INSERT INTO `projects_details` (`id`, `project_id`, `project_description`, `created_by`, `state`, `city`, `startDate`, `endDate`, `project_budget`, `project_cost`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdasdasdasd', 2, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3000', '2000', 2, '2017-03-30 15:13:51', '2017-03-30 15:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'Project Owner', 'User is the owner of the given Project', '2017-03-28 18:08:25', '2017-03-28 18:08:25'),
(2, 'admin', 'User Administrator', 'User is allowed to manade and edit other users', '2017-03-28 18:11:43', '2017-03-28 18:11:43'),
(3, 'employee', 'Employee of the organization', 'Employee can publish tasks and read assigned tasks', '2017-03-28 18:14:51', '2017-03-28 18:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(0, 1, 1),
(1, 2, 2),
(2, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_slug`, `state_title`, `created_at`, `updated_at`) VALUES
(1, 'ks', 'Kosovo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status_title`, `created_at`, `updated_at`) VALUES
(1, 'Not Started', NULL, NULL),
(2, 'Rejected', NULL, NULL),
(3, 'In Progress', NULL, NULL),
(4, 'Pending', NULL, NULL),
(5, 'Completed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `task_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `task_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `progress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `deadline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `activity_id`, `modified_by`, `assigned_to`, `task_title`, `task_description`, `priority_id`, `status_id`, `progress`, `due_date`, `deadline`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 2, 2, 'Task 1', 'asdasdasdasdasd', 1, 5, '', '2017-04-05', '', 2, '2017-04-04 10:37:51', '2017-04-04 11:10:33'),
(2, 1, 6, 2, 2, 'Task 2', 'asdasdasdasd', 1, 5, '', '2017-05-06', '', 2, '2017-04-04 10:39:52', '2017-04-04 12:04:56'),
(3, 1, 6, 2, 2, 'Task 3', 'asdasdasdasd', 1, 5, '', '2017-03-04', '', 2, '2017-04-04 11:27:12', '2017-04-04 12:05:01'),
(4, 1, 6, 2, 2, 'Taks kumeidt sa', 'Nxhjbv', 1, 5, '', '2017-04-06', '', 2, '2017-04-04 12:17:42', '2017-04-04 12:18:51'),
(5, 1, 9, 2, 2, 'Takimi ne ortakoll', 'asdasdasdasd', 1, 2, '', '2017-04-27', '', 2, '2017-04-26 13:44:58', '2017-04-26 13:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `task_rejects`
--

CREATE TABLE `task_rejects` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rejected_count` int(11) NOT NULL,
  `task_response_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task_rejects`
--

INSERT INTO `task_rejects` (`id`, `user_id`, `task_id`, `comment`, `rejected_count`, `task_response_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'sdfsdfsdfsdf', 0, 1, '2017-04-04 10:52:08', '2017-04-04 10:52:08'),
(2, 2, 2, 'Task 2 Reject 1', 0, 2, '2017-04-04 10:55:56', '2017-04-04 10:55:56'),
(3, 2, 2, 'Su bo bash mire njeri', 0, 2, '2017-04-04 11:45:50', '2017-04-04 11:45:50'),
(4, 2, 2, 'Khju', 0, 2, '2017-04-04 11:47:32', '2017-04-04 11:47:32'),
(5, 2, 5, 'zsadasdasdsad', 0, 5, '2017-04-26 13:50:50', '2017-04-26 13:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `task_responses`
--

CREATE TABLE `task_responses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task_responses`
--

INSERT INTO `task_responses` (`id`, `user_id`, `task_id`, `comment`, `file_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Response 1 Task 1', '12', '2017-04-04 10:40:21', '2017-04-04 10:40:21'),
(2, 2, 1, 'sadasdasdsd', '13', '2017-04-04 10:52:23', '2017-04-04 10:52:23'),
(3, 2, 2, 'Task 2 Response 1', '14', '2017-04-04 10:55:36', '2017-04-04 10:55:36'),
(4, 2, 2, 'Task 2 Response 2', '15', '2017-04-04 10:56:31', '2017-04-04 10:56:31'),
(5, 2, 2, ' Qe edhe ni response', '16', '2017-04-04 11:47:05', '2017-04-04 11:47:05'),
(6, 2, 2, 'Bllaaa', '17', '2017-04-04 12:03:21', '2017-04-04 12:03:21'),
(7, 2, 3, 'fgdfgdfg', '18', '2017-04-04 12:04:14', '2017-04-04 12:04:14'),
(8, 2, 4, 'Hjvhbghn', '19', '2017-04-04 12:18:34', '2017-04-04 12:18:34'),
(9, 2, 5, 'sdfsdfsdfsdf', '20', '2017-04-26 13:48:40', '2017-04-26 13:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `to_dos`
--

CREATE TABLE `to_dos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `last_name`, `email`, `username`, `password`, `profession`, `cover_image`, `img_src`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dren', 'Mullafetahu', 'dramdrum.m@gmail.com', 'dren.mullafetahu', '$2y$10$5k5T/b0wJU0iu44TvpcT0.paCpuG9zM7wlmRlEHv3eAHGEBlV.CXO', 'Computer Engineer', 'Uml1.jpg', '13343082_10210110120736510_319745826725273325_n', 1, '9tuDmBImPlJIIjH7J6yk9ftseo1vh0VFR9ub4OvS5OfxR1l7MJ04U7925gWj', '2017-02-02 15:17:03', '2017-04-29 15:42:00'),
(2, 2, 'Edon', 'Mullafetahu', 'edon.mullafetahu@gmail.com', 'edon.mullafetahu', '$2y$10$wHAJIwUZT3y3m2WGRCHC6.e3o2a7T.g660AahNLGbw972yK/v2wU.', 'Director Ec Ma ndryshe', '13325735_10209979164500394_7276194570617060042_n.jpg', 'cat-adult-landing-hero.jpg', 1, 'CqsxdooLZcKQY1qP94aMUijOr1sOjTef80GEo80obWIx1Odk8YtYeFmP438p', '2017-02-02 15:17:03', '2017-04-29 15:02:48'),
(3, 1, 'Hajrulla', 'Ceku', 'hajrulla.ceku@gmail.com', 'hajrulla.ceku', '$2y$10$tqv6mdIg869eDk9U6lezbe8f1ADtof.vf4a3pYaC9wsGds6Kq6A12', 'Former Director Ec ma Ndryshe', '17309192_1236772779777661_4095899185550000586_n.jpg', '13406804_979528785502063_7230848329689681849_n.jpg', 1, 'TLgM0CFfR35siMa4ycIdisNy02vBYkSTFVspc6eV5CbyacChN6rHcfSGcuBb', '2017-02-02 15:17:03', '2017-04-04 13:11:39'),
(4, 0, 'Natyre', 'Mullafetahu', 'dr.natyre@gmail.com', '', '$2y$10$RyuXrjE3l7TGIFJOFDgodeyoei4eeK8hHkJxmFEGvt.rJ70L6I9Yy', '', '', '15032042_10211650191597319_2887522034605437914_n.jpg', 0, 'QZp00ccObpUHUp9v8DJqC66x9IZSon1usxThJed4JQzndNkUAhbxLfHUbp0c', '2017-03-31 16:13:54', '2017-04-03 19:46:19'),
(5, 0, 'Rasim', 'Mullafetahu', 'rasim.mullafetahu@gmail.com', '', '$2y$10$Q/FnAz/cW3Pr4rK5IV9p7eD6NIWVlQqMpVlD0twE8Vmdq8EOc419K', '', '', '10568868_538869929573572_7431391660654303639_n.jpg', 0, 'jyAbEg87S72JZB0xHrx51eKYqj91brWWqzm914yQGCd0OsDEnjQrH1x2M5Da', '2017-04-03 14:58:48', '2017-04-03 20:01:07'),
(6, 0, 'Vlora', 'Mullafetahu', 'vloram@gmail.com', '', '$2y$10$KklW4y6jlwUztnPSDLdzxuhaVr64Ak/3cuLdcnLd64rJCjBBICW7K', '', '', 'avatar.png', 0, '7MFT1BDeRTVRGsVH1yBmLdZxlcEwjacUyxsCJ5GpbD6G2xPXLK5IPBNKDg49', '2017-04-03 20:06:20', '2017-04-04 00:36:37'),
(7, 0, 'Fati', 'Ceku', 'fati.ceku@gmail.com', '', '$2y$10$8YeiA/6XVS26FHjt72IQjurgUGRrNhTPPCw0RfvImqemsyaznFJke', '', '', 'avatar.png', 0, 'jl8G5bIf62wqPuwwuA3kBVcLukk7hYrpUCgBUzsLkpAXBDuMlIFdHSvpzRWv', '2017-04-03 20:24:15', '2017-04-04 01:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birtdhdate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_details`
--
ALTER TABLE `projects_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_rejects`
--
ALTER TABLE `task_rejects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_responses`
--
ALTER TABLE `task_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `to_dos`
--
ALTER TABLE `to_dos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_details_user_id_unique` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects_details`
--
ALTER TABLE `projects_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `task_rejects`
--
ALTER TABLE `task_rejects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `task_responses`
--
ALTER TABLE `task_responses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `to_dos`
--
ALTER TABLE `to_dos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
