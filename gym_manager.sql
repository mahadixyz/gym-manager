-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 09:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
CREATE DATABASE IF NOT EXISTS `gym_manager` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gym_manager`;

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
(1, 'hello@mahadiscode.xyz', '$2y$10$DTLO.zoNdCdZSQCDTGLgoeWdrqQX3.5N3IQ6iERoceu6fv1PujCFu', 'ab74ca822cd260062f0b8e73cdc4eb70', 'admin'),
(2, 'user1@gmail.com', '$2y$10$7xOogXwEmxmE1j3Z90JVxOM3gGJ2G49VoWNcvh8cu/AP4Db1.dYm6', '6e781bc664d650664b468aa2187d6724', 'member'),
(3, 'user2@gmail.com', '$2y$10$VQKZ0qlFR0X26LMb0KPLdOpyGNktjD8ntmfC4KO/pMSKqXnENEGce', '17535601a352810c98ac053558d14128', 'member'),
(4, 'user3@gmail.com', '$2y$10$bpqH0RIhg6CP/aQl108L5OHUO.Th0of8tfhSwrzRfil8/0vmR9RA.', '3f7d2c430a3854d92997b131e8c8ca73', 'member'),
(5, 'user4@gmail.com', '$2y$10$gApjL9Ws.IPffpPyPxSUROT5teQu0.aUVoiFPhNkuz0QzoZPaMpyG', 'd6bc895db206f5c01836e33a0a971796', 'member'),
(6, 'user5@gmail.com', '$2y$10$F6eZ2ylKr.WclUnz60hpHOirxEf1uLwE9FrrXxbr1FjaZFkaUcMSW', '73f0efa9dbf85c01d92c3a0b8e955d54', 'member'),
(7, 'user6@gmail.com', '$2y$10$1TG8KyAgZOKJEp1FeOvhUOCx3D4SuO1PiMBvKZoU8UR/OJOOCiW1S', 'b51b27a9b8e5fcae6af9456fde36a3e4', 'member'),
(8, 'user7@gmail.com', '$2y$10$re0iG5nX29EiGzgOTbC7DuGXEGg3YY4F2nFgnN3ylg0fylJTyLRCC', 'bf24b95461bc5175597e9a2908f03c21', 'member'),
(9, 'user8@gmail.com', '$2y$10$BoYh.rbFYBGQS7BKnE0v.eIKyOCB9kUBuheL5sEr6XGTXFS1qDVxu', '69a1d19914d4ee6274ec3dfd038d72b1', 'member'),
(10, 'user9@gmail.com', '$2y$10$Q7.FdNiRmxmv55wFeBJttO1mDHY1HwX8hlZd47PqAq2t2VfhIk4Ri', '381c1c088c728b1bb0cdb830ab04546a', 'member'),
(11, 'user10@gmail.com', '$2y$10$ky3kbMfZmsEIemQ0Zb3T1ejIVt6V1KWW1r1vAJZ2/rmR.GUcWt8wi', 'f6967e29fd6397b34bb1714b3583db51', 'member');

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
  `feedback_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_name`, `feedback_mail`, `feedback_subject`, `feedback_text`, `feedback_time`) VALUES
(1, 'Morgan Alfred', 'morgan@gmail.com', 'Inquiry', 'Hello, Whats your joining terms?', '2021-03-15 20:21:15');

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
  `invoice_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_member_id`, `invoice_month`, `invoice_amount`, `invoice_status`, `invoice_created`) VALUES
(1, 2, 'March, 2021', '7500', 'Unpaid', '2021-03-15 20:25:44'),
(2, 4, 'March, 2021', '7500', 'Paid', '2021-03-15 20:25:44'),
(3, 5, 'March, 2021', '7500', 'Unpaid', '2021-03-15 20:25:44'),
(4, 6, 'March, 2021', '10000', 'Unpaid', '2021-03-15 20:25:44'),
(5, 7, 'March, 2021', '7500', 'Paid', '2021-03-15 20:25:44'),
(6, 8, 'March, 2021', '10000', 'Unpaid', '2021-03-15 20:25:44'),
(7, 9, 'March, 2021', '10000', 'Unpaid', '2021-03-15 20:25:44'),
(8, 11, 'March, 2021', '10000', 'Unpaid', '2021-03-15 20:25:44');

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
  `member_joined_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_gender`, `member_dob`, `member_address`, `member_package`, `member_mobile`, `member_photo`, `member_status`, `member_user_id`, `member_joined_at`) VALUES
(1, 'Mahadi Hasan', NULL, NULL, NULL, '', NULL, NULL, '1', 1, '2021-03-15 19:18:20'),
(2, 'Jennifer Albama', NULL, NULL, NULL, 'Gold', NULL, NULL, '1', 2, '2021-03-15 19:23:41'),
(3, 'Dylan Mullhard', NULL, NULL, NULL, '', NULL, NULL, '0', 3, '2021-03-15 19:24:43'),
(4, 'Alisha Bekham', 'female', '1991-03-03', 'London Street, UK', 'Gold', '58423456987', 'Tue-3011.jpg', '1', 4, '2021-03-15 19:25:28'),
(5, 'Fredrik Gibson', NULL, NULL, NULL, 'Gold', NULL, NULL, '2', 5, '2021-03-15 19:26:48'),
(6, 'Lisa Robinson', NULL, NULL, NULL, 'Platinum', NULL, NULL, '1', 6, '2021-03-15 19:27:49'),
(7, 'Michale Morris', NULL, NULL, NULL, 'Gold', NULL, NULL, '1', 7, '2021-03-15 19:29:00'),
(8, 'Monica Hall', NULL, NULL, NULL, 'Platinum', NULL, NULL, '1', 8, '2021-03-15 19:30:04'),
(9, 'Disha Pens', NULL, NULL, NULL, 'Platinum', NULL, NULL, '2', 9, '2021-03-15 19:37:52'),
(10, 'Cyras Loretto', NULL, NULL, NULL, '', NULL, NULL, '0', 10, '2021-03-15 19:38:43'),
(11, 'Jenny DSouza', NULL, NULL, NULL, 'Platinum', NULL, NULL, '1', 11, '2021-03-15 19:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(100) NOT NULL,
  `notice_body` text NOT NULL,
  `notice_for` int(11) NOT NULL DEFAULT 0,
  `notice_issued_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `notice_body`, `notice_for`, `notice_issued_at`) VALUES
(1, 'Wash Your Hand befor Entering Gym', '<p>Hello Members, Please Wash your hand with Handwash befor entering the Gym</p>', 0, '2021-03-15 20:18:39'),
(2, 'Pay Your Joining Fee', '<p>Hey Alisha, Pay Your Joining Fee</p>', 4, '2021-03-15 20:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_details` text NOT NULL,
  `package_image` varchar(255) NOT NULL,
  `package_fee` float NOT NULL,
  `package_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_details`, `package_image`, `package_fee`, `package_created`) VALUES
(1, 'Silver', '<p>Silver Package Includes:</p>\r\n<p>1. Diet Plan</p>\r\n<p>2. Cardio Excercise</p>\r\n<p>3. Mentorship</p>\r\n<p>4. Protein Supply</p>', 'Tue-9858.png', 4500, '2021-03-15 20:05:15'),
(2, 'Gold', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', \'Liberation Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">Silver Package Includes:</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', \'Liberation Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">1. Exclusive Diet Plan</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', \'Liberation Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">2. Cardio and Yoga Excercise</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', \'Liberation Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">3. Exclusive Mentorship</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', \'Liberation Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">4. Protein Supply</p>', 'Tue-5812.png', 7500, '2021-03-15 20:07:25'),
(3, 'Platinum', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', \'Liberation Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">Silver Package Includes:</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', \'Liberation Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">1. Diet Plan and Report</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', \'Liberation Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">2. Cardio, Yoga and Muay Thai</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', \'Liberation Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">3. Mentorship and Guidance</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: system-ui, -apple-system, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', \'Liberation Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px;\">4. Top Tier Protein Supply</p>', 'Tue-7877.png', 10000, '2021-03-15 20:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_amount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_invoice` int(11) NOT NULL,
  `payment_comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_amount`, `payment_invoice`, `payment_comments`, `payment_date`) VALUES
(1, '7500', 2, 'Payment Complete', '2021-03-15 20:26:05'),
(2, '7500', 5, 'Payment Complete', '2021-03-15 20:26:19');

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
  `report_generated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `report_member_id`, `report_height`, `report_weight`, `report_waist`, `report_bmi`, `report_body_fat`, `report_generated`) VALUES
(1, 4, 1.68, 65, 33, 23.03, 29.14, '2021-03-15 20:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_caption` varchar(128) NOT NULL,
  `slider_details` varchar(500) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_caption`, `slider_details`, `slider_image`, `slider_created`) VALUES
(1, 'The Best Gym in the town', '<p>We have been entitled the Best Gym of 2020</p>', 'Tue-8944.jpg', '2021-03-15 20:10:36'),
(2, 'We have the latest Equipment', '<p>Our equipments are modern and currently at the latest design.</p>', 'Tue-5293.jpg', '2021-03-15 20:12:41'),
(3, 'We have a spacious Gym', '<p>Our Gym have a lot of space!</p>', 'Tue-9352.jpg', '2021-03-15 20:13:18');

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
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
