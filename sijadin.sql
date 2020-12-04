-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 08:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sijadin`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` varchar(3) NOT NULL,
  `activity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `activity`) VALUES
('A01', 'KSA padi'),
('A02', 'Survei ubinan');

-- --------------------------------------------------------

--
-- Table structure for table `activity_code`
--

CREATE TABLE `activity_code` (
  `id` varchar(4) NOT NULL,
  `attribute_id` varchar(3) NOT NULL,
  `activity_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_code`
--

INSERT INTO `activity_code` (`id`, `attribute_id`, `activity_id`) VALUES
('K001', 'P01', 'A02'),
('K002', 'P03', 'A02');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` varchar(3) NOT NULL,
  `attribute` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `attribute`) VALUES
('P01', 'Pengawasan'),
('P02', 'Pencacahan'),
('P03', 'Listing');

-- --------------------------------------------------------

--
-- Table structure for table `perjadin`
--

CREATE TABLE `perjadin` (
  `id` int(11) NOT NULL,
  `nip` varchar(8) NOT NULL,
  `attribute_id` varchar(3) NOT NULL,
  `activity_id` varchar(3) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perjadin`
--

INSERT INTO `perjadin` (`id`, `nip`, `attribute_id`, `activity_id`, `date`) VALUES
(1, '34001830', 'P01', 'A02', '2020-11-24'),
(3, '34000010', 'P03', 'A02', '2020-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(8) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `gender` enum('female','male') NOT NULL,
  `position` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `name`, `email`, `password`, `role_id`, `gender`, `position`, `phone`) VALUES
('34000009', 'Respatih Yekti Wibowo', 'respatih@bps.go.id', '$2y$10$.SBE6XuQT0pyCaFfFBzHruJGUNJ71qhR7UkJYejy6NHff2QiNOE86', 3, 'male', 'Staff Stat. Neraca Wilayah dan Analisis Statistik', ''),
('34000010', 'Beny Ssidharta', 'beny.ssidharta@bps.go.id', '$2y$10$WERCJjA9AbHhXKc9vLPa6eZQpyFjITlJeRc0gmJBrTy9Yu47Vjgc6', 3, 'male', 'KSK Kecamatan Palang', ''),
('34000020', 'Lulus', 'lulus@bps.go.id', '$2y$10$y4joL5aZMy.HJHiSvUN6m.ErbZVB/Wg4PZ2DrrFNTsVfc7XIqQ2gS', 1, 'male', 'Kepala TU', ''),
('34001364', 'Eko Mardiana', 'eko.mardiana@bps.go.id', '$2y$10$T7RnhCI8fOlbXBOHqCswN.W93.2dZw7lN0uI.RtcEUgiNeVf0s3cO', 2, 'female', 'Kepala BPS Kabupaten Tuban', ''),
('34001830', 'Widhi S', 'widhis@bps.go.id', '$2y$10$yt7OxZpPOIo8UcyeKmAY2.A6VbxZ1ciuHKE4osnOeXlJ3V1qaElLy', 1, 'male', 'Kepala Sie Stat. Distribusi', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 3, 1),
(5, 3, 3),
(6, 2, 1),
(7, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Perjadin Saya'),
(2, 'Perjadin Pegawai'),
(3, 'Profil Saya');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'kasie'),
(2, 'kepala'),
(3, 'staff_ksk');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_menu_name` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `sub_menu_name`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Perjadin', 'perjadin_saya', 'fas fa-fw fa-clipboard-list', 1),
(2, 2, 'Input Perjadin', 'perjadin/input_perjadin', 'fas fa-fw fa-pencil-alt', 1),
(3, 2, 'List Perjadin', 'perjadin/list_perjadin', 'fas fa-fw fa-th-list', 1),
(4, 2, 'Matriks Perjadin', 'perjadin/matriks_perjadin', 'fas fa-fw fa-table', 1),
(5, 3, 'Profil', 'profile', 'fas fa-fw fa-user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_code`
--
ALTER TABLE `activity_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perjadin`
--
ALTER TABLE `perjadin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perjadin_attribute` (`attribute_id`),
  ADD KEY `perjadin_activity` (`activity_id`),
  ADD KEY `perjadin_user` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `user_userRole` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perjadin`
--
ALTER TABLE `perjadin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perjadin`
--
ALTER TABLE `perjadin`
  ADD CONSTRAINT `perjadin_activity` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `perjadin_attribute` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `perjadin_user` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_userRole` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
