-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2021 at 05:25 PM
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
-- Database: `gym_manager`
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
(13, 'user12@gmail.com', '$2y$10$jnJcjqXinCdQayfxXnwgI.D7q0wWepZfA9TwmnbomGtAr3EnfDk96', '2aeb383f0a2d0724aeaeff0b92f102f4', 'member'),
(14, 'user55@gmail.com', '$2y$10$jhXroJHzTkGVe74VWQWdUOCQGX5Yfu8G82MXwupbGLJJWUtyEWcNS', '4499550f553f04606843d06e3144bfb0', 'member'),
(15, 'user23@gmail.com', '$2y$10$6dRdAWx.uD48eajNMdJs4.EzuPZMRPFZWWYpJHGlav6SJHlHDPKTm', '0630a09ae9286028a0c4ac27d0e798c0', 'member'),
(16, 'masumayesmin016@gmail.com', '$2y$10$LZw4MPnShVaW4slyZYmUzugdNh4zLXn3AmfZmBisaBLj7jyal7aP6', '3f656f333e2adf543e578283c15da776', 'member'),
(17, 'asd@dsgs.fgh', '$2y$10$gUhPM95GMiZYjdukCKXdOOSgt/iAN8mXP9UnunZ0QjONqHHUWPSGi', '898e34494fa2b050219b190360de9211', 'member'),
(18, 'masusadmayesmin016@gmail.com', '$2y$10$BDtiqyHpZb1ruEpq8LtA1uqIr71WOpZkkaDgscWqQlZdEqIldSakC', '9af70773a5d4fce79888ea9d8ece6b04', 'member'),
(19, 'min016@gmail.com', '$2y$10$rguT2sKEFK7Uf/Irjd.UWed/ZCTXoUajn7NXkAUIZr5qYzyEqv5bq', '7e9aa3befc80b200926bb113d728ba23', 'member'),
(20, 'asfasf@dsgsdggsdsg.fgn', '$2y$10$vBY9i8EJ6yuHxeFEgG3IOOs8YT5zHl5p7WKao0kpJJs4yCNlGvTnS', '0ef242009b41d97e1012c7a606675eff', 'member'),
(21, 'asfasasf@gsgsd.df', '$2y$10$2aLD40osDgqKbk0lnWPseu6jQbG4QWUuCFHsFIQBGXTmnyB3zwEI2', '165532f24636dff223aebd8b41d9dc5e', 'member'),
(22, 'araman666@gmail.com', '$2y$10$Cdu9R.8M/xWuWSznTm9iX.gRox5/gaCvOPMWzQYMO6dIShrSq/H52', '50e49ca14d74340722148f49e70d4d79', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_name` varchar(25) NOT NULL,
  `feedback_mail` varchar(120) NOT NULL,
  `feedback_subject` varchar(255) NOT NULL,
  `feedback_text` text NOT NULL,
  `feedback_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_name`, `feedback_mail`, `feedback_subject`, `feedback_text`, `feedback_time`) VALUES
(1, 'John Mayer', 'jmay@google.com', 'Inquiry', 'hello world!', '2021-02-14 11:08:29'),
(2, 'Dana Neer', 'dneer@foolbrot.com', 'Complain', 'Service need to upgrade\r\n', '2021-02-15 17:22:24'),
(3, 'Dino Malhock', 'dinomalh@outbrot.com', 'General', 'Do i need to bring my own towel?', '2021-02-15 17:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_member_id` int(11) NOT NULL,
  `invoice_month` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_amount` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_status` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_member_id`, `invoice_month`, `invoice_amount`, `invoice_status`, `invoice_created`) VALUES
(1, 3, 'February, 2021', '1500', 'Unpaid', '2021-02-08 04:52:53'),
(2, 8, 'February, 2021', '5200', 'Unpaid', '2021-02-08 04:52:53'),
(3, 9, 'February, 2021', '2500', 'Unpaid', '2021-02-08 04:52:53'),
(4, 10, 'February, 2021', '5200', 'Unpaid', '2021-02-08 04:52:53'),
(5, 11, 'February, 2021', '2500', 'Unpaid', '2021-02-08 04:52:53'),
(6, 12, 'February, 2021', '1500', 'Unpaid', '2021-02-08 04:52:53'),
(7, 13, 'February, 2021', '1500', 'Unpaid', '2021-02-08 04:52:53'),
(8, 14, 'February, 2021', '5200', 'Unpaid', '2021-02-08 04:52:53'),
(9, 15, 'February, 2021', '2500', 'Unpaid', '2021-02-08 04:52:53'),
(10, 16, 'February, 2021', '5200', 'Unpaid', '2021-02-08 04:52:53'),
(11, 17, 'February, 2021', '2500', 'Unpaid', '2021-02-08 04:52:53'),
(12, 18, 'February, 2021', '2500', 'Paid', '2021-02-08 04:52:53');

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
  `member_package` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_mobile` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 = pending, 1 = Active, 2 = banned',
  `member_user_id` int(11) NOT NULL,
  `member_joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_gender`, `member_dob`, `member_address`, `member_package`, `member_mobile`, `member_photo`, `member_status`, `member_user_id`, `member_joined_at`) VALUES
(1, 'Charlene Cochran', 'female', '2021-01-12', 'asff afasf', '', '0125555', NULL, '1', 1, '2021-01-11 19:42:43'),
(2, 'Peter Shilton', 'others', '1990-01-01', 'House: 11/B, C Wing, 12/C East Birmingham Street, London. UK', '', '01555898989', 'peter.jpg', '1', 2, '2021-01-11 19:44:13'),
(3, 'Ashley Cole', NULL, NULL, NULL, 'Gold', NULL, NULL, '2', 3, '2021-01-11 19:44:45'),
(4, 'Frank Moore', NULL, NULL, NULL, '', NULL, NULL, '1', 4, '2021-01-11 19:45:25'),
(5, 'Billy Owen', NULL, NULL, NULL, '', NULL, NULL, '1', 5, '2021-01-11 19:46:19'),
(6, 'Bryan Terry', NULL, NULL, NULL, '', NULL, NULL, '2', 6, '2021-01-11 19:46:48'),
(7, 'Sandy Maclver', NULL, NULL, NULL, '', NULL, NULL, '1', 7, '2021-01-11 19:47:55'),
(8, 'Lucy Morgan', NULL, NULL, NULL, 'Silver', NULL, NULL, '2', 8, '2021-01-11 19:48:39'),
(9, 'Keira Stainforth', NULL, NULL, NULL, 'Platinum', NULL, NULL, '1', 9, '2021-01-11 19:49:26'),
(10, 'Georgia Walsh', NULL, NULL, NULL, 'Silver', NULL, NULL, '1', 10, '2021-01-11 19:50:25'),
(11, 'Ellen  Bright', NULL, NULL, NULL, 'Platinum', NULL, NULL, '2', 11, '2021-01-11 19:51:32'),
(12, 'Alessia Patten', NULL, NULL, NULL, 'Gold', NULL, NULL, '1', 12, '2021-01-11 19:52:02'),
(13, 'Ashley Brimm', NULL, NULL, NULL, 'Gold', NULL, NULL, '0', 13, '2021-01-11 19:56:20'),
(14, 'Rasha Bin Aziz', NULL, NULL, NULL, 'Silver', NULL, NULL, '0', 14, '2021-02-04 06:36:48'),
(15, 'Sarah Yesmin', NULL, NULL, NULL, 'Platinum', NULL, NULL, '0', 16, '2021-02-06 04:56:47'),
(16, 'Joesef Jackson', NULL, NULL, NULL, 'Silver', NULL, NULL, '0', 17, '2021-02-06 05:01:33'),
(17, 'Lauren Miller', NULL, NULL, NULL, 'Platinum', NULL, NULL, '0', 21, '2021-02-06 05:04:35'),
(18, 'Amanur Rahman', NULL, NULL, NULL, 'Platinum', NULL, NULL, '0', 22, '2021-02-08 04:50:20');

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
(5, 'Payment Notice', '<p>Payment Done for <strong>Billy Owen</strong></p>', 5, '2021-01-12 05:16:15'),
(6, 'Pay Bill', '<p>Hey Peter,</p>\r\n<p>Please Pay the <strong>bill</strong></p>', 2, '2021-02-08 04:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_details` text NOT NULL,
  `package_fee` float NOT NULL,
  `package_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_details`, `package_fee`, `package_created`) VALUES
(1, 'Gold', '<p>1. Diet Plan</p>\r\n<p>2. Gym facilites</p>\r\n<p>3. Protien Shacke</p>', 1500, '2021-01-17 05:31:52'),
(2, 'Platinum', '<p>1. Diet Plan</p>\r\n<p>2. Breckfast</p>\r\n<p>3. Hot Yoga</p>\r\n<p>4. Cardio</p>\r\n<p>5. Weight Lifting</p>', 2500, '2021-01-17 05:32:47'),
(3, 'Silver', '<p>asfsdag shh</p>', 5200, '2021-02-03 05:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_amount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_invoice` int(11) NOT NULL,
  `payment_comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_amount`, `payment_invoice`, `payment_comments`, `payment_date`) VALUES
(1, '2500', 12, 'full paid!', '2021-02-08 04:54:08');

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
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

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
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
