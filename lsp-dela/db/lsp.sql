-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 09:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `armadas`
--

CREATE TABLE `armadas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `armadas`
--

INSERT INTO `armadas` (`id`, `nama`) VALUES
(1, 'Fortuner'),
(2, 'Pajero'),
(3, 'Avanza'),
(4, 'Veloz');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaans`
--

CREATE TABLE `penyewaans` (
  `id` int(11) NOT NULL,
  `armada_id` int(11) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `with_supir` enum('iya','tidak') DEFAULT NULL,
  `status` enum('disetujui','belum_disetujui') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyewaans`
--

INSERT INTO `penyewaans` (`id`, `armada_id`, `nik`, `nama`, `no_hp`, `alamat`, `tgl_pinjam`, `durasi`, `with_supir`, `status`) VALUES
(1, 1, '335698001', 'Dela Fajar Mulia', '0882879732', 'Botolambat', '2024-02-26', 3, 'tidak', 'disetujui'),
(2, 2, '7986001', 'Khayatul Khasanah', '089692', 'Clapar', '2024-02-29', 2, 'iya', 'belum_disetujui'),
(3, 2, '8691001', 'Elma Febri', '089723', 'Ujungnegoro', '2024-02-02', 1, 'iya', 'disetujui'),
(7, 3, '870238001', 'Dinda Pramai', '08923792', 'Tulis', '2024-02-26', 4, 'iya', 'disetujui'),
(8, 1, '8028203001', 'Farah Hidanah', '082386794', 'Tersono', '2024-02-29', 5, 'iya', 'belum_disetujui'),
(9, 4, '8923702001', 'Fajar', '089237', 'Batang', '2024-03-02', 2, 'tidak', 'belum_disetujui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armadas`
--
ALTER TABLE `armadas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyewaans`
--
ALTER TABLE `penyewaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `armada_id` (`armada_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armadas`
--
ALTER TABLE `armadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penyewaans`
--
ALTER TABLE `penyewaans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyewaans`
--
ALTER TABLE `penyewaans`
  ADD CONSTRAINT `penyewaans_ibfk_1` FOREIGN KEY (`armada_id`) REFERENCES `armadas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
