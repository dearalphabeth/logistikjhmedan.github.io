-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 06:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_logistik_jh`
--

-- --------------------------------------------------------

--
-- Table structure for table `brg_keluar`
--

CREATE TABLE `brg_keluar` (
  `idbarang` int(11) NOT NULL,
  `idkeluar` int(11) DEFAULT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `desk` varchar(255) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ambil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brg_keluar`
--

INSERT INTO `brg_keluar` (`idbarang`, `idkeluar`, `nama_brg`, `desk`, `jumlah`, `tanggal`, `ambil`, `created_at`) VALUES
(2, 1, 'Box ', '', 4, '2025-01-09', 'Felix', '2025-01-27 17:10:39'),
(3, 2, 'Goodie Bag', '', 5, '2025-01-22', 'Bryant', '2025-01-27 17:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `brg_masuk`
--

CREATE TABLE `brg_masuk` (
  `idbarang` int(11) NOT NULL,
  `idmasuk` int(11) DEFAULT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `desk` text NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brg_masuk`
--

INSERT INTO `brg_masuk` (`idbarang`, `idmasuk`, `nama_brg`, `desk`, `jumlah`, `tanggal`, `penerima`, `created_at`) VALUES
(1, 3, 'Ellis CardHolder', '', 5, '2025-01-22', 'Khairul', '2025-01-27 17:03:30'),
(2, 1, 'Box ', 'Hampers', 5, '2025-01-27', 'Admin 1', '2025-01-27 16:07:29'),
(3, 4, 'Goodie Bag', '', 5, '2025-01-14', 'Khairul', '2025-01-27 17:17:49'),
(5, 2, 'Plastik JH Putih', '', 5, '2025-01-21', 'Admin 1', '2025-01-27 17:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `stokbarang`
--

CREATE TABLE `stokbarang` (
  `idbarang` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `desk` text,
  `stok` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stokbarang`
--

INSERT INTO `stokbarang` (`idbarang`, `nama_brg`, `desk`, `stok`, `created_at`) VALUES
(1, 'Ellis CardHolder', 'Black', 1010, '2025-01-27 14:07:20'),
(2, 'Box ', 'Hampers', 1000, '2025-01-27 14:08:06'),
(3, 'Goodie Bag', 'Hologram Mot', 503, '2025-01-27 14:08:26'),
(4, 'Goodie Bag', 'Pink', 503, '2025-01-27 14:08:44'),
(5, 'Plastik JH Putih', 'M', 1510, '2025-01-27 14:09:02'),
(6, 'Plastik JH Putih', 'L', 1510, '2025-01-15 14:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin Logistik','Staff Medis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$5tMy2K/Ht0XmsOGOgBBfVeT6u44ahuSiOKIQORmz//rSEdrCwP7Y2', 'Admin Logistik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `idkeluar` (`idkeluar`);

--
-- Indexes for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `idmasuk` (`idmasuk`);

--
-- Indexes for table `stokbarang`
--
ALTER TABLE `stokbarang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stokbarang`
--
ALTER TABLE `stokbarang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD CONSTRAINT `brg_keluar_ibfk_1` FOREIGN KEY (`idkeluar`) REFERENCES `stokbarang` (`idbarang`);

--
-- Constraints for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD CONSTRAINT `brg_masuk_ibfk_1` FOREIGN KEY (`idmasuk`) REFERENCES `stokbarang` (`idbarang`),
  ADD CONSTRAINT `fk_idbarang` FOREIGN KEY (`idbarang`) REFERENCES `stokbarang` (`idbarang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
