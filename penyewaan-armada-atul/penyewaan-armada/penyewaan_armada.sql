-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 09:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penyewaan_armada`
--

-- --------------------------------------------------------

--
-- Table structure for table `armada`
--

CREATE TABLE `armada` (
  `id` int(11) NOT NULL,
  `no_armada` int(11) NOT NULL,
  `no_polisi` varchar(20) NOT NULL,
  `jenis` enum('Mobil','Pickup','Van','Bus') NOT NULL,
  `merk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `armada`
--

INSERT INTO `armada` (`id`, `no_armada`, `no_polisi`, `jenis`, `merk`) VALUES
(1, 212, 'B 5657 GH', 'Mobil', 'Toyota'),
(3, 189, 'H 7070 UH', 'Mobil', 'Hyundai'),
(4, 333, 'B 215 YJ', 'Pickup', 'Mitsubishi');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id` int(11) NOT NULL,
  `nama_penyewa` varchar(100) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_armada` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `with_supir` enum('ya','tidak') NOT NULL,
  `status` enum('disetujui','belum_disetujui') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id`, `nama_penyewa`, `nohp`, `alamat`, `nik`, `no_armada`, `tgl_sewa`, `durasi`, `with_supir`, `status`) VALUES
(4, 'Khayatul Khasanah', '0865162878', 'Subah', '333625347291643', 189, '2024-02-04', 7, 'ya', 'belum_disetujui'),
(5, 'Halimah Nur Cahyati', '08765433251', 'Adinuso', '3325095208060002', 333, '2024-02-01', 1, 'tidak', 'belum_disetujui'),
(6, 'Ari Maulida', '0863752462', 'Tragung', '3336283427836', 333, '2024-02-02', 2, 'ya', 'disetujui'),
(7, 'Farah Hidanah', '083727532786', 'Tersono', '33354358346563', 212, '2024-02-03', 4, 'ya', 'belum_disetujui'),
(8, 'Nabila Amalia', '08362247162', 'Subah', '3325095208060002', 212, '2024-02-03', 5, 'tidak', 'disetujui'),
(9, 'Meila Dwi sarah wulan', '08765433251', 'Subah', '335293668297', 189, '2024-02-10', 5, 'tidak', 'belum_disetujui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armada`
--
ALTER TABLE `armada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
