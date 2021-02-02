-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2021 at 08:17 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm4gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `auth_id` int(11) NOT NULL,
  `auth_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_role` enum('admin','member') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`auth_id`, `auth_email`, `auth_password`, `auth_token`, `auth_role`) VALUES
(1, 'user1@gmail.com', '$2y$10$tsFoT4tazLOQ6oxZCj2fBOueTtmPCSbxpQ7dL28KD1GBxHHWg2oq.', 'c7e35010e9e34af26ca8da9a4d36be5d', 'member'),
(2, 'user2@gmail.com', '$2y$10$K1x9.LVSRvZLGEWNe9xNsuTbb.oIUanQe8TLsfzYlMpdVq6MmxDFy', '16f908adf088f148495b1b75056b8385', 'member'),
(3, 'user3@gmail.com', '$2y$10$IIGLlb2TIMZrL6oMI3v0vOLKVtZJEHbk6c4HAnOUpBDMPhEMJ4OEm', '96c31da86527c5bd5f7c7b6c0f663aac', 'member'),
(4, 'user4@gmail.com', '$2y$10$1mkFcp7.6VH5VzPtFiq1n.dY6v7h1NbM0F2cR4XgDyM9wnZDol9wi', '32513b4dd0201a3b078b186bfb1cc9e6', 'member'),
(5, 'user5@gmail.com', '$2y$10$6vEmmcpUMiK.SYscW9ae/OGgg5kIyEm1BWRM3VV/CkEoxuzfQZ.dy', 'dac5d58e4ff41015f341622372ace872', 'member'),
(6, 'user6@gmail.com', '$2y$10$.HcLlQ0xBnjpJq3P0xZoSu0rc7iOI3xPlzaqkUE6V.IR8Id6a0.Vu', '015e57c7bab19f39d8f2e6e9c552adb2', 'member'),
(7, 'user7@gmail.com', '$2y$10$XHmcHp8FVtSuD9Zd5A9bcOWCwsqA36.4HdLewqRR4ZrAvN4PH/XTe', '5f93438e7e43f588c937cd904e535e75', 'member'),
(8, 'user8@gmail.com', '$2y$10$f2C2d0Fkpo.UAaJfR4y0E.zjiU890tDg0tRJFCvKsyZ04eFUcjbUa', '78ebac7254a2d393df2df365fe96a6e8', 'member'),
(9, 'user9@gmail.com', '$2y$10$ynk2r0jd0Subuqi1XrNomOMcQ67Emi2RVN.xJS14kGBkpAyiG6Zoe', '48065a54dd2404db419d01686c40bad0', 'member'),
(10, 'user10@gmail.com', '$2y$10$E/cRaLuQcsDGDgrZfj1Xd.pOSI07KqkYxgeO2ZsSQigyuM5SSSntq', '8a10bc0d657ed06d08c7cf9e8cb1eae4', 'member'),
(11, 'user11@gmail.com', '$2y$10$aIS373oRG/.JNnXOqy23TeZcCbHDaFOUhU7DPx9ZNtKaegB6lbgh6', '90d63d65b6342e9ff410eaf1c7e6439d', 'member'),
(12, 'admin@crm.com', '$2y$10$.wZ1nUAHjjJpIbIGVCubk.4p8jtGSdqwQOG4/5M8ZnQF0WQY2wVTi', 'bc3d6b0f5f3d536706fa704cf2e4a18c', 'admin'),
(13, 'user12@gmail.com', '$2y$10$jnJcjqXinCdQayfxXnwgI.D7q0wWepZfA9TwmnbomGtAr3EnfDk96', '2aeb383f0a2d0724aeaeff0b92f102f4', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_name` varchar(50) NOT NULL,
  `feedback_mail` varchar(60) NOT NULL,
  `feedback_subject` varchar(50) NOT NULL,
  `feedback_text` varchar(500) NOT NULL,
  `feedback_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_name`, `feedback_mail`, `feedback_subject`, `feedback_text`, `feedback_time`) VALUES
(1, 'John Snow', 'assfa@afsre.hk', 'Inquiry', 'dsfdsf ds fsdf', '2021-02-02 20:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_dob` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_mobile` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 = pending, 1 = Active, 2 = banned',
  `member_user_id` int(11) NOT NULL,
  `member_package` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_gender`, `member_dob`, `member_address`, `member_mobile`, `member_photo`, `member_status`, `member_user_id`, `member_package`, `member_joined_at`) VALUES
(1, 'Charlene Cochran', 'female', '2021-01-12', 'asff afasf', '0125555', NULL, '1', 1, '0', '2021-01-11 19:42:43'),
(2, 'Peter Shilton', 'others', '1990-01-01', 'House: 11/B, C Wing, 12/C East Birmingham Street, London. UK', '01555898989', 'peter.jpg', '1', 2, '0', '2021-01-11 19:44:13'),
(3, 'Ashley Cole', NULL, NULL, NULL, NULL, NULL, '2', 3, '0', '2021-01-11 19:44:45'),
(4, 'Frank Moore', NULL, NULL, NULL, NULL, NULL, '1', 4, '0', '2021-01-11 19:45:25'),
(5, 'Billy Owen', NULL, NULL, NULL, NULL, NULL, '1', 5, '0', '2021-01-11 19:46:19'),
(6, 'Bryan Terry', NULL, NULL, NULL, NULL, NULL, '2', 6, '0', '2021-01-11 19:46:48'),
(7, 'Sandy Maclver', NULL, NULL, NULL, NULL, NULL, '1', 7, '0', '2021-01-11 19:47:55'),
(8, 'Lucy Morgan', NULL, NULL, NULL, NULL, NULL, '2', 8, '0', '2021-01-11 19:48:39'),
(9, 'Keira Stainforth', NULL, NULL, NULL, NULL, NULL, '0', 9, '0', '2021-01-11 19:49:26'),
(10, 'Georgia Walsh', 'male', '1998-06-09', 'senpara, Dhaka', '01259656235', 'Fri-6827.jpg', '1', 10, 'Gold', '2021-01-11 19:50:25'),
(11, 'Ellen  Bright', NULL, NULL, NULL, NULL, NULL, '2', 11, '0', '2021-01-11 19:51:32'),
(12, 'Alessia Patten', NULL, NULL, NULL, NULL, NULL, '1', 12, '0', '2021-01-11 19:52:02'),
(13, 'Ashley Brimm', NULL, NULL, NULL, NULL, NULL, '0', 13, '0', '2021-01-11 19:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(100) NOT NULL,
  `notice_body` text NOT NULL,
  `notice_for` int(11) NOT NULL DEFAULT '0',
  `notice_isuued_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `notice_body`, `notice_for`, `notice_isuued_at`) VALUES
(1, 'Covid-19 Safety', 'Wear Mask, Use Hand Sanitizer, Maintain Social Distance', 0, '2021-01-12 03:48:58'),
(2, 'Entry Time Violation', 'Maintain entry Time ', 13, '2021-01-12 03:51:59'),
(3, 'Payment Notice', 'Please Pay the fee of December, 2020', 6, '2021-01-12 03:54:16'),
(4, 'Happy New Year', '<p>Wish you all a very <strong>Happy New Year 2021</strong></p>', 0, '2021-01-12 04:00:24'),
(5, 'Payment Notice', '<p>Payment Done for <strong>Billy Owen</strong></p>', 5, '2021-01-12 05:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `package_details` text NOT NULL,
  `package_fee` float NOT NULL,
  `package_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_details`, `package_fee`, `package_created`) VALUES
(1, 'Gold', '<p>1. Diet Plan</p>\r\n<p>2. Gym facilites</p>\r\n<p>3. Protien Shacke</p>', 1500, '2021-01-17 05:31:52'),
(2, 'Platinum', '<p>1. Diet Plan</p>\r\n<p>2. Breckfast</p>\r\n<p>3. Hot Yoga</p>\r\n<p>4. Cardio</p>\r\n<p>5. Weight Lifting</p>', 2500, '2021-01-17 05:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_amount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_month` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_member` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_amount`, `payment_month`, `payment_member`, `payment_date`) VALUES
(1, '500', '2021-01', '12', '2021-01-11 20:37:34'),
(2, '655', '2021-01', '6', '2021-01-11 20:38:04'),
(3, '900', '2020-08', '11', '2021-01-11 20:38:12'),
(4, '666', '2020-04', '10', '2021-01-11 20:38:21'),
(5, '1000', '2020-07', '2', '2021-01-12 03:14:29'),
(6, '346', '2020-11', '10', '2021-01-12 03:19:49'),
(7, '1500', '2020-11', '13', '2021-01-12 03:20:16'),
(8, '1750', '2020-06', '8', '2021-01-12 05:13:45'),
(9, '500', '2021-01', '12', '2021-01-14 06:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report_member_id` int(11) NOT NULL,
  `report_height` float NOT NULL,
  `report_weight` float NOT NULL,
  `report_waist` float NOT NULL,
  `report_bmi` float NOT NULL,
  `report_body_fat` float NOT NULL,
  `report_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `report_member_id`, `report_height`, `report_weight`, `report_waist`, `report_bmi`, `report_body_fat`, `report_generated`) VALUES
(1, 2, 1.65, 85, 45, 31.22, 28.39, '2021-01-16 06:13:01'),
(2, 9, 1.65, 90, 55, 33.06, 35.2, '2021-01-16 06:13:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `userID` (`member_user_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `userID` FOREIGN KEY (`member_user_id`) REFERENCES `auth` (`auth_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
