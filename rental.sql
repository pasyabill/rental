-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2024 at 02:25 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bayar`
--

DROP TABLE IF EXISTS `tbl_bayar`;
CREATE TABLE IF NOT EXISTS `tbl_bayar` (
  `id_bayar` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` int NOT NULL,
  `id_kembali` int NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_bayar` decimal(10,2) NOT NULL,
  `status` enum('lunas','belum lunas') NOT NULL,
  PRIMARY KEY (`id_bayar`),
  UNIQUE KEY `id_transaksi` (`id_transaksi`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_bayar`
--

INSERT INTO `tbl_bayar` (`id_bayar`, `id_transaksi`, `id_kembali`, `tgl_bayar`, `total_bayar`, `status`) VALUES
(1, 1, 0, '2024-10-20', '3750000.00', 'lunas'),
(2, 3, 0, '2024-10-21', '4672500.00', 'lunas'),
(3, 2, 0, '2024-10-21', '2025000.00', 'lunas'),
(4, 4, 0, '2024-10-21', '1000000.00', 'lunas'),
(5, 5, 0, '2024-10-21', '3277500.00', 'lunas'),
(6, 6, 0, '2024-10-21', '1533000.00', 'lunas'),
(7, 7, 0, '2024-10-21', '500000.00', 'lunas'),
(8, 0, 0, '2024-10-21', '1000000.00', 'lunas'),
(9, 8, 0, '2024-10-21', '2086250.00', 'lunas'),
(10, 9, 0, '2024-10-21', '300000.00', 'lunas'),
(11, 10, 0, '2024-10-21', '200000.00', 'lunas'),
(12, 11, 0, '2024-10-24', '400000.00', 'lunas'),
(13, 12, 0, '2024-10-24', '250000.00', 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kembali`
--

DROP TABLE IF EXISTS `tbl_kembali`;
CREATE TABLE IF NOT EXISTS `tbl_kembali` (
  `id_kembali` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` int NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kondisi_mobil` text NOT NULL,
  `denda` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_kembali`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kembali`
--

INSERT INTO `tbl_kembali` (`id_kembali`, `id_transaksi`, `tgl_kembali`, `kondisi_mobil`, `denda`) VALUES
(1, 7, '2024-10-21', 'spion baret dikit', '500000.00'),
(2, 6, '2024-10-21', 'aman', '0.00'),
(3, 5, '2024-10-21', 'aman', '0.00'),
(4, 4, '2024-10-21', 'rusak woi mobil gue dirusakin', '1000000.00'),
(5, 1, '2024-10-21', 'bagus owi, kamu menjaga mobilku', '0.00'),
(6, 3, '2024-10-21', 'bgzzz', '0.00'),
(7, 2, '2024-10-21', 'aman cuy', '0.00'),
(8, 9, '2024-10-21', 'gaada minus, bagus zivara kamu hebat! Tidak merusak mobil mahalku, sehr gut!!!!', '0.00'),
(9, 10, '2024-10-21', 'waduh dek lecet nih, denda 200000 y.', '200000.00'),
(10, 8, '2024-10-21', 'gud owi, gudjob', '0.00'),
(11, 11, '2024-10-24', 'gud', '200000.00'),
(12, 12, '2024-10-24', 'gud', '50000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

DROP TABLE IF EXISTS `tbl_member`;
CREATE TABLE IF NOT EXISTS `tbl_member` (
  `nik` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`nik`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`nik`, `nama`, `jenis_kelamin`, `telp`, `alamat`, `username`, `password`) VALUES
(123456789, 'Joko Widodo', 'L', '797979', 'Surakarta, Jawa Tengah', 'jokowi', '$2y$10$nMyRY2v//1IRpPXwTbI1zOI6xjZqCx4EqKMcGzsMHsXB5K.HEsATC'),
(5678901, 'Zivara Alifa', 'L', '12445769', 'Magelang Jawa Tengah', 'zivara', '$2y$10$cA4jrSzHpKhiMLbPknqpRewUaL0eIj80TAhbI/qFq1NPgc1.B1ReO'),
(2123123, 'zoorozuya', 'P', '2343456', 'Malang', 'zoorozuya', '$2y$10$29UasNG0gEZlXnO/7WRpre.9i4jET7rvPhMn162Yu1EZBmO4k2XW.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

DROP TABLE IF EXISTS `tbl_mobil`;
CREATE TABLE IF NOT EXISTS `tbl_mobil` (
  `nopol` varchar(10) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tahun` date NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` enum('tersedia','booked','kosong') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`nopol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`nopol`, `brand`, `type`, `tahun`, `harga`, `foto`, `status`) VALUES
(' B1234ABC', 'Lamborghini', 'Aventador', '2022-01-01', '5000000.00', 'lamborghini.jpg', 'tersedia'),
('B5678XYZ', 'Ferrari', '488 GTB', '2019-02-01', '4250000.00', 'ferrari.jpg', 'tersedia'),
('B8765EFG', 'Porsche', '911 Turbo S', '2021-03-01', '6500000.00', 'porsche.jpg', 'tersedia'),
('B4321HIJ', 'Rolls-Royce', ' Ghost', '2022-04-01', '7100000.00', 'rolls.jpg', 'tersedia'),
('B2468LMN', 'Bentley', 'Continental GT', '2019-05-01', '4900000.00', 'bentley.jpg', 'tersedia'),
(' B1357OPQ', 'McLaren', '720S', '2021-06-01', '8345000.00', 'mclaren.jpg', 'tersedia'),
('B9753RST', 'Aston Martin', 'DB11', '2018-07-01', '5555000.00', 'aston.jpg', 'tersedia'),
('B8524UVW', 'Mercedes-Benz', 'S-Class', '2020-08-01', '6132000.00', 'mercedenz.jpg', 'tersedia'),
('aspasya123', 'pickup percobaan', 'coba', '2017-06-07', '200000.00', 'logoo.jpg', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `nik` int NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `tgl_booking` date NOT NULL,
  `tgl_ambil` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `supir` tinyint(1) NOT NULL DEFAULT '0',
  `total` decimal(10,2) NOT NULL,
  `downpayment` decimal(10,2) NOT NULL,
  `kekurangan` decimal(10,2) NOT NULL,
  `status` enum('booking','approved','ambil','kembali') NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `nik`, `nopol`, `tgl_booking`, `tgl_ambil`, `tgl_kembali`, `supir`, `total`, `downpayment`, `kekurangan`, `status`) VALUES
(1, 123456789, 'B8765EFG', '2024-10-20', '2024-10-20', '2024-10-22', 1, '15000000.00', '11250000.00', '3750000.00', 'kembali'),
(2, 123456789, 'B4321HIJ', '2024-10-20', '2024-10-20', '2024-10-21', 1, '8100000.00', '6075000.00', '2025000.00', 'kembali'),
(3, 123456789, ' B1357OPQ', '2024-10-20', '2024-10-20', '2024-10-22', 1, '18690000.00', '14017500.00', '4672500.00', 'kembali'),
(4, 5678901, 'B8524UVW', '2024-10-21', '2024-10-21', '2024-10-23', 0, '12264000.00', '9198000.00', '3066000.00', 'kembali'),
(5, 2123123, 'B9753RST', '2024-10-21', '2024-10-21', '2024-10-23', 1, '13110000.00', '9832500.00', '3277500.00', 'kembali'),
(6, 2123123, 'B8524UVW', '2024-10-21', '2024-10-21', '2024-10-22', 0, '6132000.00', '4599000.00', '1533000.00', 'kembali'),
(7, 2123123, 'B2468LMN', '2024-10-21', '2024-10-21', '2024-10-23', 0, '9800000.00', '7350000.00', '2450000.00', 'kembali'),
(8, 123456789, ' B1357OPQ', '2024-10-21', '2024-10-22', '2024-10-23', 0, '8345000.00', '6258750.00', '2086250.00', 'kembali'),
(9, 5678901, 'aspasya123', '2024-10-21', '2024-10-21', '2024-10-22', 1, '1200000.00', '900000.00', '300000.00', 'kembali'),
(10, 5678901, 'coba3', '2024-10-21', '2024-10-21', '2024-10-24', 1, '5100000.00', '3825000.00', '1275000.00', 'kembali'),
(11, 2123123, 'aspasya123', '2024-10-24', '2024-10-24', '2024-10-25', 0, '200000.00', '150000.00', '50000.00', 'kembali'),
(12, 2123123, 'aspasya123', '2024-10-24', '2024-10-24', '2024-10-25', 0, '200000.00', '150000.00', '50000.00', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas') NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'salsabila', '$2y$10$md8wsP1WjfLD5I1ILAH37.L7m6FeBDuUzW1SicdLmaI7h3bpHWvN2', 'petugas'),
(2, 'aspasya', '$2y$10$6qkvT9hX71418SHvzuDJvuXvDpK/BudludZavpKRuYUEj8n5sNpu6', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
