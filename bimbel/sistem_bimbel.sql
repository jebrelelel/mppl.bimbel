create database sistem_bimbel;
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 07:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_bimbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(10) UNSIGNED NOT NULL,
  `namaAdmin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `namaAdmin`, `password`) VALUES
(1, 'Tono', 'makanbang');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `idMurid` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `waktuPendaftaran` datetime NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `idProgram` int(10) UNSIGNED DEFAULT NULL,
  `idPembayaran` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`idMurid`, `nama`, `noHP`, `email`, `alamat`, `waktuPendaftaran`, `password`, `idProgram`, `idPembayaran`) VALUES
(2, 'Muhammad Jibril', '086969696969', 'jebrel0912@gmail.com', 'jl. jaya no. 25', '2022-05-23 15:04:20', '24914706', 1, 256002),
(4, 'Imam Zelkova', '086969696969', 'zelkova.pohon@gmail.com', 'Pasar Kolombo', '2022-05-24 11:04:16', '45358972', 2, 256004),
(6, 'Tirta Agung Jati', '089765225546', 'tirtaaj@gmail.com', 'Bantul jauh banget', '2022-05-30 16:32:44', '57821648', 3, 256006),
(7, 'Abimanyu Wahyu Palagan', '081228923690', 'abimanyupalagan@gmail.com', 'Jl. Jurugsari Gg. Teratai No. 31', '2022-05-30 16:42:58', '79044774', 2, 256007);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `idProgram` int(10) UNSIGNED NOT NULL,
  `namaProgram` varchar(20) NOT NULL,
  `biaya` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`idProgram`, `namaProgram`, `biaya`) VALUES
(1, 'Kelas 10', 6000000),
(2, 'Kelas 11', 7000000),
(3, 'Kelas 12', 8000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`idMurid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idProgram_murid` (`idProgram`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`idProgram`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `idMurid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `idProgram` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `FK_murid_program` FOREIGN KEY (`idProgram`) REFERENCES `program` (`idProgram`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
