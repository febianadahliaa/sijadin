-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 04:29 AM
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
-- Table structure for table `atribut`
--

CREATE TABLE `atribut` (
  `idAtribut` varchar(3) NOT NULL,
  `namaAtribut` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atribut`
--

INSERT INTO `atribut` (`idAtribut`, `namaAtribut`) VALUES
('P01', 'Pengawasan'),
('P02', 'Pencacahan'),
('P03', 'Listing');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `idKegiatan` varchar(3) NOT NULL,
  `namaKegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`idKegiatan`, `namaKegiatan`) VALUES
('A01', 'KSA padi'),
('A02', 'Survei ubinan');

-- --------------------------------------------------------

--
-- Table structure for table `kode_kegiatan`
--

CREATE TABLE `kode_kegiatan` (
  `kodeKegiatan` varchar(4) NOT NULL,
  `idAtribut` varchar(3) NOT NULL,
  `idKegiatan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_kegiatan`
--

INSERT INTO `kode_kegiatan` (`kodeKegiatan`, `idAtribut`, `idKegiatan`) VALUES
('K001', 'P01', 'A02'),
('K002', 'P03', 'A02');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `nip` varchar(8) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `idPeran` int(11) NOT NULL,
  `jabatan` varchar(64) NOT NULL,
  `nomor_hp` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`nip`, `nama`, `email`, `password`, `idPeran`, `jabatan`, `nomor_hp`) VALUES
('34000010', 'Beny Ssidharta', 'beny.ssidharta@bps.go.id', '123', 3, 'KSK Kecamatan Palang', ''),
('34000020', 'Lulus', 'lulus@bps.go.id', '123', 1, 'Kepala TU', ''),
('34001364', 'Eko Mardiana', 'eko.mardiana@bps.go.id', '123', 2, 'Kepala BPS Kabupaten Tuban', ''),
('34001830', 'Widhi S', 'widhis@bps.go.id', '123', 1, 'Kepala Sie Stat. Distribusi', '');

-- --------------------------------------------------------

--
-- Table structure for table `peran_pengguna`
--

CREATE TABLE `peran_pengguna` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peran_pengguna`
--

INSERT INTO `peran_pengguna` (`id`, `role`) VALUES
(1, 'kasie'),
(2, 'kepala'),
(3, 'staff_ksk');

-- --------------------------------------------------------

--
-- Table structure for table `perjadin`
--

CREATE TABLE `perjadin` (
  `idPerjadin` int(11) NOT NULL,
  `nip` varchar(8) NOT NULL,
  `idAtribut` varchar(3) NOT NULL,
  `idKegiatan` varchar(3) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perjadin`
--

INSERT INTO `perjadin` (`idPerjadin`, `nip`, `idAtribut`, `idKegiatan`, `tanggal`) VALUES
(1, '34001830', 'P01', 'A02', '2020-11-24'),
(3, '34000010', 'P03', 'A02', '2020-11-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atribut`
--
ALTER TABLE `atribut`
  ADD PRIMARY KEY (`idAtribut`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`idKegiatan`);

--
-- Indexes for table `kode_kegiatan`
--
ALTER TABLE `kode_kegiatan`
  ADD PRIMARY KEY (`kodeKegiatan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `peran_pengguna`
--
ALTER TABLE `peran_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perjadin`
--
ALTER TABLE `perjadin`
  ADD PRIMARY KEY (`idPerjadin`),
  ADD KEY `perjadin_nip_pengguna` (`nip`),
  ADD KEY `perjadin_idKegiatan_kegiatan` (`idKegiatan`),
  ADD KEY `perjadin_idAtribut_atribut` (`idAtribut`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perjadin`
--
ALTER TABLE `perjadin`
  MODIFY `idPerjadin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perjadin`
--
ALTER TABLE `perjadin`
  ADD CONSTRAINT `perjadin_idAtribut_atribut` FOREIGN KEY (`idAtribut`) REFERENCES `atribut` (`idAtribut`) ON UPDATE CASCADE,
  ADD CONSTRAINT `perjadin_idKegiatan_kegiatan` FOREIGN KEY (`idKegiatan`) REFERENCES `kegiatan` (`idKegiatan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `perjadin_nip_pengguna` FOREIGN KEY (`nip`) REFERENCES `pengguna` (`nip`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
