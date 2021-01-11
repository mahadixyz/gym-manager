-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 07:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `auth_role` enum('admin','member') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`auth_id`, `auth_email`, `auth_password`, `auth_token`, `auth_role`) VALUES
(1, 'dave@gsgs.csa', '$2y$10$WF.Y5WXAyERrIy.8yM2kW.2DZTBVCsYPtche.2rl/T6eIijPzHFAa', 'f560d4e85ac8d9b1bf507fed4fa17b7c', 'admin'),
(2, 'm@h.khan', '$2y$10$EAQq5o5iNuahw9m3pADIMuisoB.aMwE//dFqIg6WSxrLskz3ZGP1K', '8dbfea2cc4b0720da1542aae01a9118d', 'admin'),
(3, 'dylan@ggg.vom', '$2y$10$/2QLcnPeagdD5G25ZSKHy.HwUMRix3HUyqXI6WLh9fBOGOExVIpdm', '41e79cda31d0761d016666eb4d86cf0f', 'admin'),
(4, 'afan@go.com', '$2y$10$vTcXDGGqS0a5g9pKumw.vOaEY2poSXPLLxSH6Y2ypekO2UBTQF2uy', 'de913968a77b35f2c556f3bc30a03e1d', 'admin'),
(5, 'admin@crm.com', '$2y$10$z4BKEV9NbcjJU3LV7rIJMebknfrwDq/y1Ld/YvE42a01fLYx2b7Sy', 'd98b1d7eb09e9b0889b65731712bd215', 'admin'),
(6, 'dav@google.com', '$2y$10$7lC/SmEtUAlrQhTNzKvp/uiXZ0zBWSwFI03eTX7o8V/0amJPCkRNq', 'cb91fa3a59d66f3bf989dab09eb7d07d', 'admin'),
(7, 'araman666@gmail.com', '$2y$10$exGEZyZMqt2qrBng..9XXueDVB3ctG4.jQin0YVfVNkDjOzmN2lOK', '693a830c617d17d5a683ea16895ec77c', 'admin'),
(8, 'd@gs.as', '$2y$10$bhSNIvox71huLjzj7GJdceQ2hWvTLevaBj4M5Ch3PX/mOdIGP1tSK', '005687f2570ed552c976d09bcb75a271', 'admin'),
(9, 'fr@afaf.as', '$2y$10$2a8rlOEdMLNSguD0gBj8dOCdgRoB1.aTD2ZhboUlT6eYX7V3wPFI2', '24bafc78d36b2e2b16e593e184229d9e', 'admin'),
(10, 'laur@dgs.eu', '$2y$10$oDlmS50LkpwXBkolL6Cx6ed8.cCgyvoi4ci5RnAhPbByHZMkc.use', 'daea7014fd26630786d6712b485a409a', 'admin'),
(11, 'taur@afaag.ds', '$2y$10$56nvyROEITip3fmkDbctB.X5NBEP5hTjcvxSmsMsoySs.ka87VzEy', 'fc2cbad7e1b97869bb76b078a46fe8e7', 'admin'),
(12, 'mike@aesgsa.cc', '$2y$10$X6YLMZEaObQEgUkeXTqItePd/QNbCdVBCTQXjaLghLczEMDOrbveO', '42ee0f81381d868f886fb0631ba83d22', 'admin'),
(13, 'alf@sgs.com', '$2y$10$ps4nF9wYbmxHn1/E.PiUQOb8XVoJPSY5VPRteXP2biKCJG7DmwA8u', '1114b30d5366c2ddf879d49f1d563464', 'admin'),
(14, 'ksjhdk@sgsdghs.com', '$2y$10$z956WxCvxl.54TPSeBGc0ednnNJIZu3/Zl91qHzKckE2vLusNniEC', 'b85469563cdbc2605c16f4e8dda16900', 'admin'),
(15, 'kasgsk@asa.ru', '$2y$10$PGag9s26/uOLOG9iu7vVRej8gtxSwD8UatTfnEpAo3c.bP.cSOS/y', '5075a3f23199d2aa185451b1fe6176b8', 'admin'),
(16, 'akgjs@kjlsd.ds', '$2y$10$QmRRUEbpDApkUyGVE.4P6uoCV4b6SgNZQLrUN23KK7MxUuLIBR7.q', '4af51d3d1d3c586168691b7fe63f149e', 'admin'),
(17, 'sjgs@sdkgs.nna', '$2y$10$4gGGhoV7N7V2XiG98WzLXuPH6TOq5GSMo2oSs8bCDdeucKaMJY/AC', 'b81a0b3df963b6e5742db40d30af0ee0', 'admin'),
(18, 'ksdjgs@asaf.ca', '$2y$10$WaQv0Ca7QP/AKFDhsylaY.hngKMu.RhCJ.EhZhGHoK454EM7hHAtC', 'e367fe69feed4adff9dbe2c799b7accf', 'admin'),
(19, 'mafase@ggvs.kl', '$2y$10$dipNv7eKATk16QoRR8EmF.TKm10GsvRWBib9kfJ/7yAv1pC5f06ta', 'f24a78b1f2dfc97cd503a70d53947708', 'admin'),
(20, 'dgha@mloa.ca', '$2y$10$gyCy2Fx9syGfxwVCD76iEOHyOD/4bngEzaMhQb9EG3LBQbDUgQ.c6', 'ab6892243f8adfb7bd926fa5f5cf26d1', 'admin'),
(21, 'naomi@aega.op', '$2y$10$Lxl24Vktk/wI/Qr9xHwycedRsTV.HZTZOR2f13ABuAl0MKKodn5/i', '4692f2fc106caf1dd7e0b1a1164b027e', 'admin'),
(22, 'mona@lisa.com', '$2y$10$Szn4vq2GQRAw9Xw2kpln8uHsGhslNLYtAcLMLHWmSoqBkZYn76oZm', 'c5d73d04e39d3287c0d36248c0f2d798', 'admin'),
(23, 'pablo@mone.com', '$2y$10$sPsZ7y.Fy24/SRyv2R.wyea8Imu4uL4mcGBBVz6avK0W5fOm.6JK.', '87fd158c4cd025b62b1a4f8d8b299973', 'admin'),
(24, 'leo@davinchi.itl', '$2y$10$GDW3WZhlmL5wEE.ss//UXePhf8fv/dmZHPF0E2Bb460nfRhdTmBKy', 'd05d02a60ffe8e878001497a1c961913', 'admin'),
(25, 'Davebr@asdsa.ui', '$2y$10$sg748RUmycp8n.xP.W.dZO.nj3gSIwMs0dXcC89rcWkRBQf5wiEoi', '0170ec23f7e3bf2d2fe04af7767e54da', 'admin');

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
  `member_joined_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_gender`, `member_dob`, `member_address`, `member_mobile`, `member_photo`, `member_status`, `member_user_id`, `member_joined_at`) VALUES
(1, 'Dave Basey', NULL, NULL, NULL, NULL, NULL, '0', 1, '2020-12-30 21:28:58'),
(2, 'Mhk', NULL, NULL, NULL, NULL, NULL, '1', 2, '2020-12-30 21:38:05'),
(3, 'Dylan', NULL, NULL, NULL, NULL, NULL, '0', 3, '2020-12-31 00:22:18'),
(4, 'Mickey', NULL, NULL, NULL, NULL, NULL, '2', 4, '2020-12-31 00:22:59'),
(5, 'Admin', NULL, NULL, NULL, NULL, NULL, '1', 5, '2021-01-01 20:43:25'),
(6, 'David', NULL, NULL, NULL, NULL, NULL, '0', 6, '2021-01-02 06:28:34'),
(7, 'Amanur Rahman', NULL, NULL, NULL, NULL, NULL, '0', 7, '2021-01-02 06:31:39'),
(8, 'David', NULL, NULL, NULL, NULL, NULL, '0', 8, '2021-01-04 03:23:44'),
(9, 'Freya', NULL, NULL, NULL, NULL, NULL, '1', 9, '2021-01-04 03:24:14'),
(10, 'Lauren', NULL, NULL, NULL, NULL, NULL, '0', 10, '2021-01-04 03:24:39'),
(11, 'Tauriel', NULL, NULL, NULL, NULL, NULL, '0', 11, '2021-01-04 03:25:02'),
(12, 'Michael', NULL, NULL, NULL, NULL, NULL, '0', 12, '2021-01-04 03:25:25'),
(13, 'Alfread', NULL, NULL, NULL, NULL, NULL, '0', 13, '2021-01-04 03:25:47'),
(14, 'Foomin', NULL, NULL, NULL, NULL, NULL, '1', 14, '2021-01-04 03:26:14'),
(15, 'Kruskal', NULL, NULL, NULL, NULL, NULL, '0', 15, '2021-01-04 03:27:04'),
(16, 'Konsal Moor', NULL, NULL, NULL, NULL, NULL, '2', 16, '2021-01-04 03:28:03'),
(17, 'Dylan Den', NULL, NULL, NULL, NULL, NULL, '0', 17, '2021-01-04 03:28:34'),
(18, 'Orlando', NULL, NULL, NULL, NULL, NULL, '2', 18, '2021-01-04 03:29:12'),
(19, 'Merry', NULL, NULL, NULL, NULL, NULL, '0', 19, '2021-01-04 03:37:50'),
(20, 'Glenn', NULL, NULL, NULL, NULL, NULL, '1', 20, '2021-01-04 03:38:21'),
(21, 'naomi', NULL, NULL, NULL, NULL, NULL, '0', 21, '2021-01-04 03:38:56'),
(22, 'Lisa', NULL, NULL, NULL, NULL, NULL, '2', 22, '2021-01-04 03:39:18'),
(23, 'P. Escober', NULL, NULL, NULL, NULL, NULL, '0', 23, '2021-01-04 03:39:51'),
(24, 'vinchi', NULL, NULL, NULL, NULL, NULL, '1', 24, '2021-01-04 03:40:24'),
(25, 'Brooks', NULL, NULL, NULL, NULL, NULL, '2', 25, '2021-01-04 03:40:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `userID` (`member_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
