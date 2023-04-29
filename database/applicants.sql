-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 01:51 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applicants`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biodata`
--

CREATE TABLE `tbl_biodata` (
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biodata`
--

INSERT INTO `tbl_biodata` (`username`, `password`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `status`, `alamat`, `foto`) VALUES
('aa@gmail.com', '$2y$10$FopwGZjwHp0FiBfFB5k5X.lg67Dwrgac2PiymMNpgCpB/AV0CVm5m', 'ada', '', '0000-00-00', '', '', '', '', ''),
('abc@gmail.com', '$2y$10$avL9pfCu/QMaceN2t/3PWOpIacECf1/9fO/7mw0c3jTVyisU6CEgC', 'abcd', 'Tasikmalaya', '2002-04-29', 'Laki-laki', 'Islam', 'Married', 'Jl. Merdeka No. 19 Kota Bandung', 'computer.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayatkerja`
--

CREATE TABLE `tbl_riwayatkerja` (
  `id_riwayatkerja` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `alasan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_riwayatkerja`
--

INSERT INTO `tbl_riwayatkerja` (`id_riwayatkerja`, `username`, `nama_perusahaan`, `jabatan`, `durasi`, `alasan`) VALUES
(1, 'abc@gmail.com', 'pt jayabaya tbk', 'front end developer', '1 tahun 6 bulan', 'habis kontrak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayatpdd`
--

CREATE TABLE `tbl_riwayatpdd` (
  `id_riwayatpdd` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `jenjang` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `thn_lulus` int(4) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_riwayatpdd`
--

INSERT INTO `tbl_riwayatpdd` (`id_riwayatpdd`, `username`, `nama_sekolah`, `jenjang`, `jurusan`, `thn_lulus`, `kota`, `nilai`) VALUES
(1, 'abc@gmail.com', 'sman 1 singaparna', 'SMA/K', 'IPA', 2019, 'tasikmalaya', '91'),
(2, 'abc@gmail.com', 'smpn 1 sariwangi', '', '', 2016, 'tasikmalaya', '88,7'),
(3, 'abc@gmail.com', 'sdn sariwangi', '', '', 2013, 'tasikmalaya', '87'),
(4, 'abc@gmail.com', 'universitas siliwangi', 'S1', 'Teknik informatika', 2023, 'tasikmalaya', '3,65');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_riwayatkerja`
--
ALTER TABLE `tbl_riwayatkerja`
  ADD PRIMARY KEY (`id_riwayatkerja`);

--
-- Indexes for table `tbl_riwayatpdd`
--
ALTER TABLE `tbl_riwayatpdd`
  ADD PRIMARY KEY (`id_riwayatpdd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_riwayatkerja`
--
ALTER TABLE `tbl_riwayatkerja`
  MODIFY `id_riwayatkerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_riwayatpdd`
--
ALTER TABLE `tbl_riwayatpdd`
  MODIFY `id_riwayatpdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
