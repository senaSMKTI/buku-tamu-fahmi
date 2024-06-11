-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 05:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku_tamu_sekolah`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'fahmi', 'fahmi', 'petugas');

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
  `keperluan` varchar(48) NOT NULL,
  `waktu_buku_tamu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama`, `email`, `asal`, `pekerjaan`, `keperluan`, `waktu_buku_tamu`) VALUES
(62, 'Andi Santoso', 'andi.santoso@example.com', 'Jakarta', 'Guru', 'Mengikuti workshop pendidikan', '2024-06-11 15:11:33'),
(63, 'Budi Hartono', 'budi.hartono@example.com', 'Bandung', 'Wirausaha', 'Membahas kerja sama sekolah', '2024-06-11 15:10:37'),
(64, 'Chandra Wijaya', 'chandra.wijaya@example.com', 'Surabaya', 'Orang Tua Murid', 'Konsultasi pendidikan anak', '2024-06-11 15:10:37'),
(65, 'Dewi Lestari', 'dewi.lestari@example.com', 'Yogyakarta', 'Penulis', 'Memberikan seminar literasi', '2024-06-11 15:10:37'),
(66, 'Eka Prasetya', 'eka.prasetya@example.com', 'Semarang', 'Dosen', 'Penelitian pendidikan', '2024-06-11 15:10:37'),
(67, 'Fitri Rahmawati', 'fitri.rahmawati@example.com', 'Medan', 'Pegawai Negeri', 'Mengurus administrasi pendidikan', '2024-06-11 15:10:37'),
(68, 'Gita Anggraini', 'gita.anggraini@example.com', 'Makassar', 'Psikolog', 'Memberikan konseling kepada siswa', '2024-06-11 15:10:37'),
(69, 'Hariyanto', 'hariyanto@example.com', 'Bali', 'Fotografer', 'Dokumentasi acara sekolah', '2024-06-11 15:10:37'),
(70, 'Indah Sari', 'indah.sari@example.com', 'Palembang', 'Pustakawan', 'Pengadaan buku perpustakaan', '2024-06-11 15:10:37'),
(71, 'Joko Susilo', 'joko.susilo@example.com', 'Malang', 'Pengusaha', 'Memberikan motivasi kewirausahaan', '2024-06-11 15:11:04');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
