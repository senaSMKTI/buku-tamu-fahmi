-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 01:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'LobakSoup', 'LobakSoup', 'petugas'),
(4, 'sdsds', 'sdsads', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `asal` varchar(32) NOT NULL,
  `pekerjaan` varchar(32) NOT NULL,
  `keperluan` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama`, `email`, `asal`, `pekerjaan`, `keperluan`) VALUES
(1, 'Yasa Muta', 'yasamuta@gmail.com', 'Magelang', 'Petani', 'ada aja'),
(2, 'asdsa', 'sadsa', 'sadsad', 'sadsad', 'jejeheheheh'),
(4, 'Alwi Ridho Anshory', 'alwi22@gmail.com', 'Gg. Ulin', 'Pelajar', 'Ambil Pulpen'),
(9, 'asdsadsa', 'sadsad', 'ssadsadaa', 'asdasdsa', 'sadasd'),
(10, 'sadsadsa', 'sadsadsa', 'sadsad', 'sadasdsa', 'sads'),
(11, 'asdsadsa', 'asdsad', 'sasadsa', 'dsasadsad', 'asdsad'),
(12, 'sdfdsfs', 'sdfsdfds', 'sdfsdf', 'sdfsdfds', 'dsfsd'),
(14, 'asdsad', 'asdsadsa', 'sadsad', 'asdsadsa', 'sadas'),
(19, 'ehyehahe', 'hejshjeah', 'hejhejhae', 'jehjaheja', 'ehjasehjaea271');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
