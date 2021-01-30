-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 04:10 PM
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
  `activity_id` varchar(5) NOT NULL,
  `activity` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity`) VALUES
('K1001', 'Kalender Pencatatan Pemotongan Ternak Bulanan'),
('K1002', 'Laporan Triwulanan Pemotongan Ternak'),
('K1003', 'Laporan Triwulanan Pelabuhan Perikanan (PPS/PPN/PPP/PPI), Tempat Pelelangan Ikan (TPI)'),
('K1004', 'Laporan Tahunan Tempat Pelelangan Ikan/Pelabuhan Pendaratan Ikan'),
('K1005', 'Survei Industri Besar Dan Sedang'),
('K1006', 'Perusahaan Industri Manufaktur'),
('K1007', 'Perusahaan Manufaktur Industri Besar Sedang'),
('K1008', 'Direktori Perusahaan Besar Sedang'),
('K1009', 'Survei Tahunan Perusahaan Industri Manufaktur'),
('K1010', 'Survei Industri Mikro Kecil. Pemutakhiran Rumahtangga'),
('K1011', 'Survei Industri Mikro Kecil Triwulanan'),
('K1012', 'Survei Industri Mikro Kecil Tahunan'),
('K1013', 'Survei Penggalian Berbadan Hukum'),
('K1014', 'Survei Penggalian Rumahtangga'),
('K1015', 'Survei Air Bersih/PDAB'),
('K1016', 'Direktori Perusahaan Konstruksi'),
('K1017', 'Survei Konstruksi Tahunan'),
('K1018', 'Survei Konstruksi Bulanan'),
('K1019', 'Survei Konstruksi Triwulanan'),
('K1020', 'Survei Ubinan Tanaman Pangan. Daftar Sample Bloksensus'),
('K1021', 'Survei Ubinan Tanaman Pangan. Pemutakhiran Daftar Rumahtangga'),
('K1022', 'Survei Ubinan Tanaman Pangan. Daftar Sample Rumahtangga'),
('K1023', 'Survei Ubinan Tanaman Pangan. Keterangan Hasil Ubinan'),
('K1024', 'Survei Kerangka Sample Area Tanaman Padi'),
('K1025', 'Survei Kerangka Sample Area Tanaman Jagung'),
('K1026', 'Survei Pertanian Antar Sensus'),
('K1027', 'Survei Konversi Gabah Ke Beras. Keterangan Rendeman Penggilingan'),
('K1028', 'Survei Konversi Gabah Ke Beras. Keterangan Konversi Pengeringan'),
('K1029', 'Survei Ongkos Usaha Tani HORTIKULTURA'),
('K1030', 'Laporan Tahunan Budidaya Tambak'),
('K1031', 'Pendataan Industri Penggilingan Padi'),
('K2001', 'Survei Harga Produsen Perdesaan (Subsektor Tanaman Pangan)'),
('K2002', 'Survei Harga Produsen Perdesaan (Subsektor Hortikultura)'),
('K2003', 'Survei Harga Konsumen Pedesaan (Subsektor Perikanan Tangkap)'),
('K2004', 'Survei Statistik Keuangan Desa'),
('K2005', 'Survei Lembaga Keuangan. Koperasi Simpan Pinjam'),
('K2006', 'Survei Profil Pasar Tradisional, Pusat Perbelanjaan Dan Toko Modern'),
('K2007', 'Survei Statistik Harga Produsen Non Kontruksi'),
('K2008', 'Survei Statistik Harga Produsen Kontruksi'),
('K2009', 'Survei Perdagangan Antar Wilayah'),
('K2010', 'Survei Wisatawan Nusantara (Wisnus)'),
('K2011', 'Survei Objek Daya Tarik Pariwisata'),
('K2012', 'Survei Harga Perdagangan Besar Bulanan'),
('K2013', 'Survei Harga Produsen Nilai Tukar Pengolah Hasil Perikanan'),
('K2014', 'Survei Triwulanan Kegiatan Usaha (Kategori Perdagangan)'),
('K2015', 'Perusahaan/Usaha Perdagangan Menengah Besar'),
('K2016', 'Survei Pola Distribusi Perdagangan (VPDP-19)'),
('K3001', 'Survei Khusus Konsumsi RumahTangga Triwulanan'),
('K3002', 'Survei Khusus Lembaga NonProfit RumahTangga Triwulanan'),
('K3003', 'Direktori Lembaga Non Profit'),
('K3004', 'Survei Khusus Neraca Produksi'),
('K3005', 'Survei Khusus Studi Penyusunan Perubahan Inventori'),
('K3006', 'Pengumpulan Data Sekunder PMTB'),
('K3007', 'Pengumpulan Data SMAK'),
('K3008', 'Survei Tendensi Bisnis Triwulanan'),
('K3009', 'Survei Dampak Covid-19'),
('K4001', 'Survei Sosial Ekonomi Nasional'),
('K4002', 'Survei Sosial Ekonomi Nasional. Daftar Sample Bloksensus'),
('K4003', 'Survei Sosial Ekonomi Nasional. Range Harga (RH)'),
('K4004', 'Survei Sosial Ekonomi Nasional. Daftar Sample Rumahtangga'),
('K4005', 'Survei Sosial Ekonomi Nasional. Daftar Pemutakhiran Rumahtangga'),
('K4006', 'Survei Sosial Ekonomi Nasional. Keterangan Konsumsi/Pengeluaran Makanan & Bukan Makanan, Dan Pendapatan Penerimaan Rumahtangga'),
('K4007', 'Survei Angkatan Kerja Nasional'),
('K4008', 'Survei Angkatan Kerja Nasional. Daftar Sample Bloksensus'),
('K4009', 'Survei Angkatan Kerja Nasional. Daftar Pemutakhiran Rumahtangga'),
('K4010', 'Survei Angkatan Kerja Nasional. Daftar Sample Rumahtangga'),
('K4011', 'Survei Angkatan Kerja Nasional. Keterangan Anggota Rumahtangga'),
('K4012', 'Satuan Lingkungan Setempat Sensus Penduduk 2020'),
('K4013', 'Sosialisi SPOnline Tingkat Kecamatan'),
('K4014', 'Potensi Desa 2020'),
('K4015', 'Sensus Penduduk 2020'),
('K4016', 'Sensus Penduduk 2020. Daftar Penduduk Pada Lingkungan Terkecil (SLS)'),
('K4017', 'Sensus Penduduk 2020. Peta Wilayah SLS'),
('K4018', 'Sensus Penduduk 2020. Daftar Penduduk Desa/Kelurahan Tak Ter-Identifikasi'),
('K4019', 'Sensus Penduduk 2020. Koordinator Sensus Penduduk Kecamatan'),
('K4020', 'Sensus Penduduk 2020. Lanjutan'),
('K4021', 'Sensus Penduduk 2020. Daftar Sample SP'),
('K5001', 'Data Skunder Publikasi Kecamatan Dalam Angka'),
('K5002', 'Design Dan Tataletak Publikasi Kecamatan Dalam Angka'),
('K5003', 'Tabel-Tabel Publikasi Kecamatan Dalam Angka'),
('K5004', 'Grafik dan Infografik Publikasi Kecamatan Dalam Angka'),
('K5005', 'Pemutakhiran Master File Desa dan Muatan Blok Sensus'),
('K5006', 'Pemetaan 2020'),
('K5007', 'Koordinator Lapangan Pemetaan 2020 (KORLAP)'),
('K5008', 'Digitasi Peta Desa SPLIT SLS (RT-RW)'),
('K5009', 'Digitasi Peta Desa'),
('K5010', 'Pengolahan Dokumen SP2020'),
('K6001', 'Pengiriman Surat Dinas'),
('K6002', 'Penyusunan Surat Menyurat'),
('K6003', 'Laporan Capaian Kinerja Pegawai Realisasi'),
('K6004', 'Laporan Capaian Kinerja Pegawai Target'),
('K6005', 'Laporan Sasaran Kinerja Pegawai'),
('K6006', 'Laporan Kinerja Work From Home (LapKinWFH)');

-- --------------------------------------------------------

--
-- Table structure for table `activity_code`
--

CREATE TABLE `activity_code` (
  `activity_code` varchar(5) NOT NULL,
  `attribute_id` varchar(3) NOT NULL,
  `activity_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_code`
--

INSERT INTO `activity_code` (`activity_code`, `attribute_id`, `activity_id`) VALUES
('K1001', 'A03', 'K1009'),
('K1002', 'A04', 'K1009'),
('K1003', 'A03', 'K1010'),
('K1004', 'A04', 'K1010');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attribute_id` varchar(3) NOT NULL,
  `attribute` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attribute_id`, `attribute`) VALUES
('A01', 'Listing'),
('A02', 'Updating'),
('A03', 'Pencacahan'),
('A04', 'Pengawasan'),
('A05', 'Pemeriksaan'),
('A06', 'Revisit');

-- --------------------------------------------------------

--
-- Table structure for table `perjadin`
--

CREATE TABLE `perjadin` (
  `perjadin_id` varchar(13) NOT NULL,
  `nip` varchar(9) NOT NULL,
  `activity_code` varchar(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perjadin`
--

INSERT INTO `perjadin` (`perjadin_id`, `nip`, `activity_code`, `date`) VALUES
('5ff408fc9cd03', '340018309', 'K1003', '2021-01-05'),
('5ff409288742e', '999060218', 'K1003', '2021-02-02'),
('5ff410f2e6b43', '340018309', 'K1002', '2021-02-10'),
('5ff447d689579', '340013647', 'K1002', '2021-01-15'),
('5ff447f76fd84', '340000002', 'K1001', '2021-01-27'),
('5ff5f2981f0d5', '340018309', 'K1002', '2021-02-16'),
('5ff60321036d4', '340000003', 'K1003', '2021-02-10'),
('5ff6032db6152', '340018309', 'K1001', '2021-02-23'),
('5ff60337f37b6', '340018309', 'K1002', '2021-03-16'),
('5ff60358e5d82', '340060098', 'K1003', '2021-03-16'),
('5ff60364b1a1a', '340018309', 'K1001', '2021-04-19'),
('5ff605e92d516', '340018309', 'K1002', '2021-01-08'),
('5ffaef2aa496d', '340013647', 'K1001', '2021-01-14'),
('5ffe9c0a3da3a', '999060218', 'K1001', '2021-02-06'),
('6015620f26644', '340013647', 'K1001', '2021-01-14');

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
  `position_id` int(11) NOT NULL,
  `phone` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `name`, `email`, `password`, `role_id`, `gender`, `position_id`, `phone`) VALUES
('012345678', 'Yoshida', 'yoshi@bps.go.id', '$2y$10$xLmyBnITLCwINVpQcS0jB.lfh4xyeL3PZb5iKfugWM8.3g90NV2/6', 4, 'female', 13, ''),
('123456789', 'Aisha', 'ai@bps.go.id', '$2y$10$CJybaxCmZq0XkSZJN1vYoelBUAQOHS8jull7qoPf3VCTzgVQVmFKa', 4, 'female', 13, ''),
('340000001', 'Beny Ssidharta', 'beny.ssidharta@bps.go.id', '$2y$10$WERCJjA9AbHhXKc9vLPa6eZQpyFjITlJeRc0gmJBrTy9Yu47Vjgc6', 4, 'male', 13, ''),
('340000002', 'Lulus', 'lulus@bps.go.id', '$2y$10$y4joL5aZMy.HJHiSvUN6m.ErbZVB/Wg4PZ2DrrFNTsVfc7XIqQ2gS', 2, 'male', 2, ''),
('340000003', 'Respati Yekti Wibowo', 'respatih@bps.go.id', '$2y$10$.SBE6XuQT0pyCaFfFBzHruJGUNJ71qhR7UkJYejy6NHff2QiNOE86', 4, 'male', 11, ''),
('340013647', 'Eko Mardiana', 'eko.mardiana@bps.go.id', '$2y$10$T7RnhCI8fOlbXBOHqCswN.W93.2dZw7lN0uI.RtcEUgiNeVf0s3cO', 3, 'female', 1, ''),
('340018309', 'Widhi S', 'widhis@bps.go.id', '$2y$10$yt7OxZpPOIo8UcyeKmAY2.A6VbxZ1ciuHKE4osnOeXlJ3V1qaElLy', 2, 'male', 6, ''),
('340060098', 'Febiana Dahlia Anjani', 'febianadahliaa@bps.go.id', '$2y$10$.Zffj5OYd/FxojCr.uIws.uhjFgKhDniXuwh5uMV2rP2mrztW9hUm', 1, 'female', 11, '081210766330'),
('987654321', 'Yuki', 'yuki@bps.go.id', '$2y$10$4MEW/9E2b1CuIeud3BW0Uea4uRrDU1IhGt3baVx0Y6/LiEjTN64oi', 4, 'female', 7, '0'),
('999060218', 'Muhammad Hadid', 'mhadid@bps.go.id', '$2y$10$u08uHW6zUNFOgBHaSVn51u/i9a3KW0tic9ELmCRa.EXy55vD78kjy', 1, 'male', 13, '');

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
(4, 'Manajemen', 1),
(5, 'Daftar pegawai', 0),
(20, 'dddddddddddddddd', 0),
(21, 'aaaaaaaaaaaaaaaaaaaaaa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_position`
--

CREATE TABLE `user_position` (
  `id` int(11) NOT NULL,
  `position` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_position`
--

INSERT INTO `user_position` (`id`, `position`) VALUES
(1, 'Kepala BPS Tuban'),
(2, 'Koordinator Subbag Umum'),
(3, 'Staf Subbag Umum'),
(4, 'Koordinator Fungsi Stat. Produksi'),
(5, 'Staf Fungsi Stat. Produksi'),
(6, 'Koordinator Fungsi Stat. Distribusi'),
(7, 'Staf Fungsi Stat. Distribusi'),
(8, 'Koordinator Fungsi Stat. Sosial'),
(9, 'Staf Fungsi Stat. Sosial'),
(10, 'Koordinator Fungsi Stat. Nerwilis'),
(11, 'Staf Fungsi Stat. Nerwilis'),
(12, 'Koordinator Fungsi Stat. IPDS'),
(13, 'Staf Fungsi Stat. IPDS');

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
(4, 'staf'),
(5, 'ksk');

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
(5, 3, 'Profil Saya', 'profile', 'fas fa-fw fa-user', 0),
(6, 4, 'Pegawai', 'manajemen/pegawai', 'fas fa-fw fa-users', 1),
(7, 4, 'Kegiatan', 'manajemen/kegiatan', 'fas fa-fw fa-boxes', 1);

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
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `fk_user_role_id` (`role_id`),
  ADD KEY `fk_user_position_id` (`position_id`);

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
-- Indexes for table `user_position`
--
ALTER TABLE `user_position`
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
-- AUTO_INCREMENT for table `user_position`
--
ALTER TABLE `user_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_code`
--
ALTER TABLE `activity_code`
  ADD CONSTRAINT `fk_activity` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_attribute` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_user_position_id` FOREIGN KEY (`position_id`) REFERENCES `user_position` (`id`) ON UPDATE CASCADE,
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
