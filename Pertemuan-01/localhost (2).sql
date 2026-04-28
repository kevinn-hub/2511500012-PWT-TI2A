-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2026 at 10:06 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_guru`
--
CREATE DATABASE IF NOT EXISTS `jadwal_guru` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jadwal_guru`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `kd_guru` varchar(5) NOT NULL,
  `nm_guru` varchar(50) DEFAULT NULL,
  `jenkel` varchar(10) DEFAULT NULL,
  `pend_terakhir` varchar(20) DEFAULT NULL,
  `hp` varchar(13) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`kd_guru`, `nm_guru`, `jenkel`, `pend_terakhir`, `hp`, `alamat`) VALUES
('G-001', 'sukendar', 'Laki-laki', 'Stara1', '3232232323', 'dfdf'),
('G-002', 'dsf', 'Laki-laki', 'Stara2', '3434', 'fdf'),
('G-003', 'ffd', 'Perempuan', 'Stara2', '2323', 'dfdf'),
('G-004', 'asun', 'Laki-laki', 'Stara1', '089993', 'sungai selan'),
('G-005', 'fdf', 'Laki-laki', 'Stara1', '3434', 'trtrt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nm_kelas` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nm_kelas`) VALUES
(1, 'XXI'),
(2, 'TI 1A'),
(3, 'bahasa inggris'),
(4, 'pagi'),
(5, 'sore');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `kd_mapel` varchar(5) NOT NULL,
  `nm_mapel` varchar(35) DEFAULT NULL,
  `kkm` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`kd_mapel`, `nm_mapel`, `kkm`) VALUES
('M-001', 'BAHASA INGGRIS', 80);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` varchar(10) NOT NULL,
  `nm_siswa` varchar(50) DEFAULT NULL,
  `jenkel` varchar(10) DEFAULT NULL,
  `hp` varchar(13) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nm_siswa`, `jenkel`, `hp`, `id_kelas`) VALUES
('M-001', 'kepinnn', 'Laki-laki', '08899989', 1),
('M-002', 'kepin', 'Perempuan', '656', 1),
('M-003', 'livia', 'Laki-laki', '43434', 5),
('M-004', 'kepinn', 'Perempuan', '3434', 3),
('M-005', 'dfdf', 'Laki-laki', '08899989', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `Id_user` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('admin','guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`Id_user`, `Username`, `Password`, `Role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'Guru', 'guru', 'guru'),
(3, 'Siswa', 'Siswa', 'siswa'),
(4, 'G-002', '1234', 'guru'),
(5, 'G-003', '1234', 'guru'),
(6, 'G-004', '1234', 'guru'),
(7, 'G-005', '1234', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`kd_guru`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`kd_mapel`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `Id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
