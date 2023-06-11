-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 06:27 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapak_kios`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(3) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `nama_nasabah` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rekening`, `nama_nasabah`, `aktif`) VALUES
(1, 'BRI Cabang Jakarta', '01.1.0001', 'KIOS JATINEGARA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cover`
--

CREATE TABLE `cover` (
  `id_cover` int(3) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cover`
--

INSERT INTO `cover` (`id_cover`, `judul`, `foto`) VALUES
(1, 'Penyewaan Kios', '4.jpg'),
(2, 'Proses Mudah', '3.jpg'),
(3, 'Pembayaran Murah', '2.jpg'),
(4, 'Selamat Datang', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kios`
--

CREATE TABLE `kios` (
  `idk` int(11) NOT NULL,
  `kd_kios` varchar(15) NOT NULL,
  `nama_kios` varchar(25) NOT NULL,
  `status` enum('kosong','isi') NOT NULL,
  `biaya` bigint(12) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kios`
--

INSERT INTO `kios` (`idk`, `kd_kios`, `nama_kios`, `status`, `biaya`, `keterangan`) VALUES
(1, 'B-01', 'Blok 01', 'kosong', 5000000, 'Pembayaran Perbulan'),
(2, 'B-02', 'Blok 02', 'kosong', 5000000, 'Pembayaran Perbulan'),
(3, 'B-03', 'Blok 03', 'kosong', 5000000, 'Pembayaran Perbulan');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_lengkap` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `hp` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `sudahbaca` enum('N','Y') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `jawab` text COLLATE latin1_general_ci NOT NULL,
  `tgl_jawab` datetime NOT NULL,
  `status_jawab` enum('N','Y') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `cek_jawab` enum('N','Y') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kd_penyewa` varchar(15) NOT NULL,
  `kd_kios` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kode_transfer` varchar(50) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `status` enum('belum','lunas') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id` int(11) NOT NULL,
  `kd_penyewa` varchar(15) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kd_kios` varchar(15) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `aktif` enum('N','Y') NOT NULL DEFAULT 'Y',
  `akses` enum('1','2') NOT NULL DEFAULT '2',
  `validasi` enum('N','M','Y','X') NOT NULL,
  `tgl_daftar` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting_web`
--

CREATE TABLE `setting_web` (
  `id` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `fb` varchar(35) NOT NULL,
  `twit` varchar(35) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `logo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_web`
--

INSERT INTO `setting_web` (`id`, `title`, `keyword`, `email`, `telp`, `fb`, `twit`, `alamat`, `logo`) VALUES
(1, 'Kios Pulo Jahe', 'Sewa-Kios', 'sewakios@gmail.com', '082345678910', 'sewakios@gmail.com', 'sewakios@gmail.com', 'Jatinegara, Cakung', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `akses` enum('1','2') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id_admin`, `nama`, `username`, `password`, `foto`, `akses`) VALUES
(1, 'ADMIN', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user.png', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `cover`
--
ALTER TABLE `cover`
  ADD PRIMARY KEY (`id_cover`);

--
-- Indexes for table `kios`
--
ALTER TABLE `kios`
  ADD PRIMARY KEY (`idk`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_web`
--
ALTER TABLE `setting_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cover`
--
ALTER TABLE `cover`
  MODIFY `id_cover` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kios`
--
ALTER TABLE `kios`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_web`
--
ALTER TABLE `setting_web`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
