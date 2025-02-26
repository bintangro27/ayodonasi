-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2025 at 01:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `metode` enum('ShopeePay','Gopay','Transfer') COLLATE utf8mb4_general_ci NOT NULL,
  `bukti` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_diterima` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id`, `nama`, `nominal`, `metode`, `bukti`, `deskripsi`, `tanggal_diterima`) VALUES
(48, 'Fahmi', 2000000, 'ShopeePay', '67b3f9d14a2b8.jpeg', ' berkah2', '2025-02-18 03:09:05'),
(50, 'irfan', 250000, 'Transfer', '67b3fe94b8e0d.jpeg', 'semoga bisa bermanfaat', '2025-02-18 03:29:24'),
(51, 'Azril', 1000000, 'Transfer', '67b403b801f24.jpeg', ' semoga dapat berguna walaupun tidak seberapa', '2025-02-18 03:51:20'),
(52, 'hamba tuhan', 200000, 'Gopay', '67b404403b030.jpeg', 'Semoga dana ini dapat membantu meringankan beban', '2025-02-18 03:53:36'),
(53, 'rizky', 550000, 'ShopeePay', '67b404de59562.jpeg', 'Bismillah..Mudah mudahan barkah', '2025-02-18 03:56:14'),
(54, 'hasan', 200000, 'ShopeePay', '67b461a2a92d3.jpeg', 'semoga bisa bermanfaat amin\r\n', '2025-02-18 10:32:02'),
(55, 'bintang', 1000000, 'Gopay', '67b4ac2ccfc34.jpeg', 'semoga bermanfaat', '2025-02-18 15:50:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
