-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2021 at 07:32 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10559296_sijadin`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` varchar(3) NOT NULL,
  `activity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity`) VALUES
('A01', 'KSA padi'),
('A02', 'Survei ubinan');

-- --------------------------------------------------------

--
-- Table structure for table `activity_code`
--

CREATE TABLE `activity_code` (
  `activity_code` varchar(4) NOT NULL,
  `attribute_id` varchar(3) NOT NULL,
  `activity_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_code`
--

INSERT INTO `activity_code` (`activity_code`, `attribute_id`, `activity_id`) VALUES
('K001', 'P01', 'A02'),
('K002', 'P03', 'A02'),
('K003', 'P01', 'A01');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attribute_id` varchar(3) NOT NULL,
  `attribute` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attribute_id`, `attribute`) VALUES
('P01', 'Pengawasan'),
('P02', 'Pencacahan'),
('P03', 'Listing');

-- --------------------------------------------------------

--
-- Table structure for table `perjadin`
--

CREATE TABLE `perjadin` (
  `perjadin_id` varchar(13) NOT NULL,
  `nip` varchar(9) NOT NULL,
  `activity_code` varchar(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perjadin`
--

INSERT INTO `perjadin` (`perjadin_id`, `nip`, `activity_code`, `date`) VALUES
('5ff408fc9cd03', '340018309', 'K003', '2021-01-05'),
('5ff409288742e', '999060218', 'K003', '2021-02-02'),
('5ff410f2e6b43', '340018309', 'K002', '2021-02-10'),
('5ff447d689579', '340013647', 'K002', '2021-01-15'),
('5ff447f76fd84', '340000002', 'K001', '2021-01-26'),
('5ff5f2981f0d5', '340018309', 'K002', '2021-02-16'),
('5ff60321036d4', '340000003', 'K003', '2021-02-10'),
('5ff6032db6152', '340018309', 'K001', '2021-02-23'),
('5ff60337f37b6', '340018309', 'K002', '2021-03-16'),
('5ff60358e5d82', '340060098', 'K003', '2021-03-16'),
('5ff60364b1a1a', '340018309', 'K002', '2021-04-19'),
('5ff605e92d516', '340018309', 'K002', '2021-01-08'),
('5ffaef2aa496d', '340013647', 'K001', '2021-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(9) NOT NULL,
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
('340000001', 'Beny Ssidharta', 'beny.ssidharta@bps.go.id', '$2y$10$WERCJjA9AbHhXKc9vLPa6eZQpyFjITlJeRc0gmJBrTy9Yu47Vjgc6', 4, 'male', 'KSK Kecamatan Palang', ''),
('340000002', 'Lulus', 'lulus@bps.go.id', '$2y$10$y4joL5aZMy.HJHiSvUN6m.ErbZVB/Wg4PZ2DrrFNTsVfc7XIqQ2gS', 2, 'male', 'Kepala TU', ''),
('340000003', 'Respati Yekti Wibowo', 'respatih@bps.go.id', '$2y$10$.SBE6XuQT0pyCaFfFBzHruJGUNJ71qhR7UkJYejy6NHff2QiNOE86', 4, 'male', 'Staff Stat. Neraca Wilayah dan Analisis Statistik', ''),
('340013647', 'Eko Mardiana', 'eko.mardiana@bps.go.id', '$2y$10$T7RnhCI8fOlbXBOHqCswN.W93.2dZw7lN0uI.RtcEUgiNeVf0s3cO', 3, 'female', 'Kepala BPS Kabupaten Tuban', ''),
('340018309', 'Widhi S', 'widhis@bps.go.id', '$2y$10$yt7OxZpPOIo8UcyeKmAY2.A6VbxZ1ciuHKE4osnOeXlJ3V1qaElLy', 2, 'male', 'Kepala Sie Stat. Distribusi', ''),
('340060098', 'Febiana Dahlia Anjani', 'febianadahliaa@bps.go.id', '$2y$10$7mKVZTu03A8WWIJKuraGcurJDuUoVxtwZPwa6T0KTO8rn9Lds4inW', 1, 'female', 'Staff Stat. Neraca Wilayah dan Analisis Statistik', '081210766330'),
('999060218', 'Muhammad Hadid', 'mhadid@bps.go.id', '$2y$10$Ilkoma1cCFunOd0ekRkz.e246Hyg73dl8ObKaiugupnFtuIm5aTSq', 1, 'male', 'Staff IPDS', '');

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
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 3, 1),
(9, 3, 3),
(10, 4, 1),
(11, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `is_active`) VALUES
(1, 'Perjadin_saya', 1),
(2, 'Perjadin_pegawai', 1),
(3, 'Profil', 0),
(4, 'Menu', 1),
(5, 'Daftar pegawai', 0),
(20, 'dddddddddddddddd', 0),
(21, 'aaaaaaaaaaaaaaaaaaaaaa', 0);

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
(1, 'admin'),
(2, 'kasie'),
(3, 'kepala'),
(4, 'staff_ksk');

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
(1, 1, 'Perjadin Saya', 'perjadin_saya', 'fas fa-fw fa-clipboard-list', 1),
(2, 2, 'Input Perjadin', 'perjadin_pegawai/input_perjadin', 'fas fa-fw fa-pencil-alt', 1),
(3, 2, 'List Perjadin', 'perjadin_pegawai/list_perjadin', 'fas fa-fw fa-list', 1),
(4, 2, 'Matriks Perjadin', 'perjadin_pegawai/matriks_perjadin', 'fas fa-fw fa-table', 1),
(5, 3, 'Profil Saya', 'profile', 'fas fa-fw fa-user', 1),
(6, 4, 'Pengaturan Menu', 'menu', 'fas fa-fw fa-folder', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `activity_code`
--
ALTER TABLE `activity_code`
  ADD PRIMARY KEY (`activity_code`),
  ADD KEY `fk_activity` (`activity_id`),
  ADD KEY `fk_attribute` (`attribute_id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `perjadin`
--
ALTER TABLE `perjadin`
  ADD PRIMARY KEY (`perjadin_id`),
  ADD KEY `fk_perjadin_user_nip` (`nip`),
  ADD KEY `fk_activity_code` (`activity_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_user_role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_access_menu_role_id` (`role_id`),
  ADD KEY `fk_user_access_menu_menu_id` (`menu_id`);

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
  ADD KEY `fk_user_sub_menu_menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_code`
--
ALTER TABLE `activity_code`
  ADD CONSTRAINT `fk_activity` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_attribute` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`);

--
-- Constraints for table `perjadin`
--
ALTER TABLE `perjadin`
  ADD CONSTRAINT `fk_activity_code` FOREIGN KEY (`activity_code`) REFERENCES `activity_code` (`activity_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perjadin_user_nip` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role_id` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `fk_user_access_menu_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_access_menu_role_id` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `fk_user_sub_menu_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
