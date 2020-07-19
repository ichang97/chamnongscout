-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2020 at 04:02 PM
-- Server version: 10.2.23-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dekcomch_scout`
--

-- --------------------------------------------------------

--
-- Table structure for table `camps`
--

CREATE TABLE `camps` (
  `id` int(10) NOT NULL,
  `camp_name` varchar(250) NOT NULL,
  `camp_start` date NOT NULL,
  `camp_end` date NOT NULL,
  `created_date` datetime NOT NULL,
  `camp_semester` int(10) NOT NULL,
  `camp_year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `camps`
--

INSERT INTO `camps` (`id`, `camp_name`, `camp_start`, `camp_end`, `created_date`, `camp_semester`, `camp_year`) VALUES
(1, 'ค่ายลูกเสือ - เนตรนารีสามัญ (ชั้นป.6) ปีการศึกษา 2562', '2019-09-20', '2019-09-22', '2019-09-17 16:54:25', 1, 2562),
(2, 'ค่ายลูกเสือ - เนตรนารีสามัญรุ่นใหญ่ (ม.1-ม.3) ปีการศึกษา 2562', '2019-12-20', '2019-12-22', '2019-09-19 09:57:40', 2, 2562),
(4, 'ค่ายลูกเสือ - เนตรนารีสำรอง (ชั้นป.1 - ป.3) ปีการศึกษา 2562', '2019-11-16', '2019-11-16', '2019-10-03 17:05:00', 2, 2562),
(5, 'ค่ายลูกเสือ - เนตรนารีสามัญ (ชั้นป.5) ปีการศึกษา 2562', '2019-12-13', '2019-12-14', '2019-10-03 17:08:26', 2, 2562),
(6, 'ค่ายลูกเสือ - เนตรนารีสามัญ (ชั้นป.4) ปีการศึกษา 2562', '2019-12-15', '2019-12-15', '2019-10-03 17:09:30', 2, 2562);

-- --------------------------------------------------------

--
-- Table structure for table `camp_docs`
--

CREATE TABLE `camp_docs` (
  `id` int(10) NOT NULL,
  `camp_id` int(10) NOT NULL,
  `doc_name` longtext NOT NULL,
  `uploaded_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `camp_docs`
--

INSERT INTO `camp_docs` (`id`, `camp_id`, `doc_name`, `uploaded_date`) VALUES
(1, 1, 'หน้าปกคู่มือลูกเสือ62_สามัญ.jpg', '2019-09-20 22:43:44'),
(2, 2, 'หน้าปกคู่มือลูกเสือ62_สามัญรุ่นใหญ่.jpg', '2019-09-20 22:44:27'),
(11, 1, 'คู่มือเข้าค่ายลูกเสือสามัญ_2561.pdf', '2019-10-03 17:03:07'),
(12, 2, 'คู่มือเข้าค่ายลูกเสือสามัญรุ่นใหญ่_2561.pdf', '2019-10-03 17:03:26'),
(13, 4, 'คู่มือเข้าค่ายลูกเสือสำรอง_2561.pdf', '2019-10-03 17:05:21'),
(14, 4, 'หน้าปกคู่มือลูกเสือ62_สำรอง.jpg', '2019-10-03 17:05:33'),
(15, 5, 'หน้าปกคู่มือลูกเสือ62_สามัญ.jpg', '2019-10-03 17:08:41'),
(16, 5, 'คู่มือเข้าค่ายลูกเสือสามัญ_2561.pdf', '2019-10-03 17:08:50'),
(17, 6, 'คู่มือเข้าค่ายลูกเสือสามัญ_2561.pdf', '2019-10-04 09:15:42'),
(18, 6, 'หน้าปกคู่มือลูกเสือ62_สามัญ.jpg', '2019-10-04 09:16:07'),
(19, 6, 'กำหนดการลูกเสือป.4.62.pdf', '2019-10-04 16:02:54'),
(20, 5, 'กำหนดการลูกเสือป.5.62.pdf', '2019-10-04 16:04:09'),
(21, 1, 'กำหนดการลูกเสือ ป.6.2562.pdf', '2019-10-04 16:04:24'),
(22, 2, 'คำสั่งลูกเสื่อ ม.1-3.62.pdf', '2019-10-04 16:05:05'),
(24, 4, 'กำหนดการลูกเสือป.1-3.pdf', '2019-10-07 12:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `download_stat`
--

CREATE TABLE `download_stat` (
  `id` int(10) NOT NULL,
  `doc_id` int(10) NOT NULL,
  `stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `download_stat`
--

INSERT INTO `download_stat` (`id`, `doc_id`, `stamp`) VALUES
(1, 17, '2019-10-06 16:15:22'),
(2, 18, '2019-10-06 16:15:29'),
(3, 19, '2019-10-06 16:15:33'),
(4, 17, '2019-10-06 16:19:55'),
(5, 18, '2019-10-06 16:20:01'),
(6, 19, '2019-10-06 16:20:06'),
(7, 1, '2019-10-06 16:21:17'),
(8, 11, '2019-10-06 18:13:21'),
(9, 21, '2019-10-06 18:13:30'),
(10, 12, '2019-10-06 18:18:46'),
(11, 22, '2019-10-06 18:19:02'),
(12, 2, '2019-10-06 18:19:12'),
(13, 1, '2019-10-06 21:14:45'),
(14, 1, '2019-10-06 21:15:03'),
(15, 11, '2019-10-06 21:15:35'),
(16, 21, '2019-10-06 21:16:09'),
(17, 21, '2019-10-06 21:16:10'),
(18, 1, '2019-10-06 21:16:31'),
(19, 1, '2019-10-06 21:16:46'),
(20, 13, '2019-10-06 21:17:21'),
(21, 14, '2019-10-06 21:17:42'),
(22, 13, '2019-10-06 21:17:51'),
(23, 15, '2019-10-06 21:18:45'),
(24, 16, '2019-10-06 21:18:54'),
(25, 20, '2019-10-06 21:19:09'),
(26, 20, '2019-10-06 21:19:10'),
(27, 17, '2019-10-06 21:19:40'),
(28, 18, '2019-10-06 21:19:46'),
(29, 19, '2019-10-06 21:19:50'),
(30, 19, '2019-10-06 21:19:50'),
(31, 2, '2019-10-06 21:20:14'),
(32, 12, '2019-10-06 21:20:19'),
(33, 22, '2019-10-06 21:20:52'),
(34, 22, '2019-10-06 21:20:52'),
(35, 19, '2019-10-07 00:49:53'),
(36, 19, '2019-10-07 00:50:03'),
(37, 19, '2019-10-07 00:50:07'),
(38, 18, '2019-10-07 00:50:11'),
(39, 17, '2019-10-07 00:50:18'),
(40, 15, '2019-10-07 00:50:26'),
(41, 16, '2019-10-07 00:50:32'),
(42, 1, '2019-10-07 09:58:43'),
(43, 11, '2019-10-07 09:58:58'),
(44, 14, '2019-10-07 10:01:16'),
(45, 14, '2019-10-07 10:01:22'),
(46, 14, '2019-10-07 10:01:23'),
(47, 13, '2019-10-07 10:01:24'),
(48, 13, '2019-10-07 11:16:04'),
(49, 1, '2019-10-07 11:19:32'),
(50, 11, '2019-10-07 11:20:02'),
(51, 1, '2019-10-07 11:22:00'),
(52, 1, '2019-10-07 11:26:38'),
(53, 1, '2019-10-07 11:28:11'),
(54, 1, '2019-10-07 11:34:20'),
(55, 1, '2019-10-07 11:35:11'),
(56, 11, '2019-10-07 11:37:13'),
(57, 1, '2019-10-07 11:37:22'),
(58, 21, '2019-10-07 11:39:01'),
(59, 1, '2019-10-07 11:39:09'),
(60, 11, '2019-10-07 11:41:16'),
(61, 1, '2019-10-07 11:41:50'),
(62, 11, '2019-10-07 11:41:56'),
(63, 1, '2019-10-07 11:44:08'),
(64, 21, '2019-10-07 11:44:12'),
(65, 1, '2019-10-07 11:44:47'),
(66, 21, '2019-10-07 11:44:51'),
(67, 1, '2019-10-07 11:49:22'),
(68, 11, '2019-10-07 11:49:27'),
(69, 1, '2019-10-07 11:56:14'),
(70, 11, '2019-10-07 11:56:20'),
(71, 1, '2019-10-07 11:56:49'),
(72, 14, '2019-10-07 11:57:41'),
(73, 14, '2019-10-07 11:57:45'),
(74, 24, '2019-10-07 12:08:09'),
(75, 14, '2019-10-07 12:08:26'),
(76, 1, '2019-10-07 13:53:14'),
(77, 1, '2019-10-07 13:53:26'),
(78, 11, '2019-10-07 13:53:28'),
(79, 21, '2019-10-07 13:53:32'),
(80, 1, '2019-10-07 13:53:39'),
(81, 18, '2019-10-07 13:53:59'),
(82, 18, '2019-10-07 13:54:21'),
(83, 2, '2019-10-07 13:54:37'),
(84, 12, '2019-10-07 13:54:45'),
(85, 13, '2019-10-07 13:58:45'),
(86, 1, '2019-10-07 17:08:06'),
(87, 14, '2019-10-07 17:08:32'),
(88, 24, '2019-10-07 17:08:42'),
(89, 24, '2019-10-07 17:08:43'),
(90, 1, '2019-10-08 15:25:44'),
(91, 2, '2019-10-09 13:24:39'),
(92, 2, '2019-10-09 13:24:42'),
(93, 12, '2019-10-09 13:24:52'),
(94, 22, '2019-10-09 13:25:11'),
(95, 22, '2019-10-09 13:25:12'),
(96, 13, '2019-10-13 01:53:41'),
(97, 24, '2019-10-13 01:53:51'),
(98, 24, '2019-10-13 01:54:01'),
(99, 24, '2019-10-24 11:52:35'),
(100, 13, '2019-11-12 17:17:41'),
(101, 14, '2019-11-12 17:17:45'),
(102, 24, '2019-11-12 17:17:47'),
(103, 24, '2019-11-21 12:35:08'),
(104, 13, '2019-11-21 15:20:03'),
(105, 22, '2019-11-26 17:05:00'),
(106, 20, '2019-12-12 18:49:46'),
(107, 19, '2019-12-15 08:42:33'),
(108, 22, '2019-12-15 12:43:09'),
(109, 22, '2019-12-15 12:43:13'),
(110, 22, '2019-12-15 12:43:14'),
(111, 22, '2019-12-15 12:43:15'),
(112, 22, '2019-12-15 12:43:15'),
(113, 22, '2019-12-15 12:43:16'),
(114, 22, '2019-12-15 12:43:16'),
(115, 22, '2019-12-15 12:43:16'),
(116, 24, '2020-03-06 09:21:27'),
(117, 13, '2020-03-06 09:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(1) NOT NULL,
  `dev_mode` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `dev_mode`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(10) NOT NULL,
  `u_firstname` varchar(100) NOT NULL,
  `u_lastname` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` longtext NOT NULL,
  `avatar_link` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_firstname`, `u_lastname`, `username`, `password`, `avatar_link`) VALUES
(1, 'วัชรพล', 'ประคองใจ', 'ichang97', '$2y$10$fEVGEM8t48IPppInMyw/sODS1LjMJY47QMvS4Feu6AsaSc3RWXupS', 'https://scontent.fbkk5-3.fna.fbcdn.net/v/t1.0-9/69151959_1140327052843825_8970955597688078336_n.jpg?_nc_cat=105&_nc_oc=AQkZrhK6ZYSgzbew8P-5mN9xh73mu84JWsNTfkaPZsaSCmfyxczM5Oop0ORGwQXrmS8&_nc_ht=scontent.fbkk5-3.fna&oh=7e43447093a78f6b728f03f75ee07625&oe=5E23EF94'),
(7, 'test', 'admin', 'admin', '$2y$10$iTCunnhHEtPkERSI2kAR..QTXNmEJazwE7ifUKJtPwdAIoEK.zxGi', 'https://scontent.fbkk5-6.fna.fbcdn.net/v/t1.0-9/10665800_265894893620383_8593630310972511151_n.jpg?_nc_cat=101&_nc_oc=AQnPF2joCjCrqqQTf0hqybqXzhzlLpnGgMqpgDgEV65Y4jV6egk6Xy0p7c-QXy_gi0E&_nc_ht=scontent.fbkk5-6.fna&oh=16580abc1cd6c91b28363bf94824d4a2&oe=5E3251AF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camps`
--
ALTER TABLE `camps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `camp_docs`
--
ALTER TABLE `camp_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`camp_id`);

--
-- Indexes for table `download_stat`
--
ALTER TABLE `download_stat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`doc_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camps`
--
ALTER TABLE `camps`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `camp_docs`
--
ALTER TABLE `camp_docs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `download_stat`
--
ALTER TABLE `download_stat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
