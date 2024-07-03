-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2021 at 09:15 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akebono`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_achievement`
--

CREATE TABLE `master_achievement` (
  `id_acv` int(11) NOT NULL,
  `kode_acv` varchar(4) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_achievement`
--

INSERT INTO `master_achievement` (`id_acv`, `kode_acv`, `time_from`, `time_to`) VALUES
(1, 'A001', '07:31:00', '08:31:00'),
(2, 'A002', '08:31:00', '09:31:00'),
(3, 'A003', '09:31:00', '10:31:00'),
(4, 'A004', '10:31:00', '11:31:00'),
(5, 'A005', '11:31:00', '12:31:00'),
(6, 'A006', '12:31:00', '13:31:00'),
(7, 'A007', '13:31:00', '14:31:00'),
(8, 'A008', '14:31:00', '15:31:00'),
(9, 'A009', '15:31:00', '16:31:00'),
(10, 'A010', '16:31:00', '17:31:00'),
(11, 'A011', '17:31:00', '18:31:00'),
(12, 'A012', '18:31:00', '19:31:00'),
(13, 'A013', '19:31:00', '20:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `master_item`
--

CREATE TABLE `master_item` (
  `id_item` int(11) NOT NULL,
  `kode_item` varchar(4) NOT NULL,
  `nama_item` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_item`
--

INSERT INTO `master_item` (`id_item`, `kode_item`, `nama_item`) VALUES
(1, 'M001', 'Ballpoint'),
(2, 'M002', 'Penghapus'),
(3, 'M003', 'Pensil'),
(4, 'M004', 'Spidol');

-- --------------------------------------------------------

--
-- Table structure for table `master_karyawan`
--

CREATE TABLE `master_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `NPK` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_karyawan`
--

INSERT INTO `master_karyawan` (`id_karyawan`, `NPK`, `nama`, `alamat`) VALUES
(4, '10001', 'Agus', 'Jakarta'),
(5, '10002', 'Asep', 'Semarang'),
(6, '10003', 'Jajang', 'Subang');

-- --------------------------------------------------------

--
-- Table structure for table `master_lokasi`
--

CREATE TABLE `master_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `kode_lokasi` varchar(5) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_lokasi`
--

INSERT INTO `master_lokasi` (`id_lokasi`, `kode_lokasi`, `nama_lokasi`) VALUES
(1, 'L001', 'Lokasi 1'),
(2, 'L002', 'Lokasi 2'),
(3, 'L003', 'Lokasi 3'),
(4, 'L004', 'Lokasi 4');

-- --------------------------------------------------------

--
-- Table structure for table `master_planning`
--

CREATE TABLE `master_planning` (
  `id_planning` int(11) NOT NULL,
  `kode` varchar(4) NOT NULL,
  `qty_target` int(11) NOT NULL,
  `waktu` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_planning`
--

INSERT INTO `master_planning` (`id_planning`, `kode`, `qty_target`, `waktu`) VALUES
(1, 'M001', 10, '20'),
(2, 'M002', 15, '30'),
(3, 'M003', 12, '24'),
(4, 'M004', 14, '28');

-- --------------------------------------------------------

--
-- Table structure for table `table_login`
--

CREATE TABLE `table_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_login`
--

INSERT INTO `table_login` (`id_login`, `username`, `password`, `create_date`, `create_by`) VALUES
(1, '10001', '21232f297a57a5a743894a0e4a801fc3', '2021-06-12 12:25:41', 'System'),
(2, '10002', '21232f297a57a5a743894a0e4a801fc3', '2021-06-12 12:26:01', 'System');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_produksi`
--

CREATE TABLE `transaksi_produksi` (
  `id_transaksi` int(11) NOT NULL,
  `NPK` varchar(5) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `lokasi` varchar(4) NOT NULL,
  `item` varchar(4) NOT NULL,
  `qty_actual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_produksi`
--

INSERT INTO `transaksi_produksi` (`id_transaksi`, `NPK`, `tanggal_transaksi`, `lokasi`, `item`, `qty_actual`) VALUES
(1, '5', '2021-06-22 08:23:56', '1', '3', 2900),
(2, '5', '2021-06-25 07:55:04', '3', '3', 40),
(3, '6', '2021-06-10 03:09:54', '4', '4', 100),
(4, '4', '2021-06-10 03:18:14', '4', '4', 100),
(5, '5', '2021-06-10 03:18:51', '4', '4', 100),
(6, '6', '2021-06-10 03:23:06', '2', '2', 38),
(8, '4', '2021-06-10 03:24:33', '2', '2', 38),
(9, '6', '2021-06-11 03:24:44', '3', '2', 2),
(10, '6', '2021-06-11 03:25:07', '3', '2', 2),
(11, '5', '2021-06-10 03:27:33', '1', '1', 100),
(13, '5', '2021-06-12 09:04:00', '1', '1', 20),
(14, '5', '2021-06-12 10:07:00', '3', '2', 1),
(15, '5', '2021-06-12 11:33:00', '1', '1', 90),
(16, '5', '2021-06-12 11:33:00', '3', '3', 80),
(17, '5', '2021-06-12 11:34:00', '2', '4', 20),
(18, '4', '2021-06-12 01:09:00', '1', '1', 100),
(19, '4', '2021-06-12 01:09:00', '2', '3', 90),
(20, '4', '2021-06-12 01:09:00', '1', '1', 1),
(21, '4', '2021-06-12 13:16:00', '1', '1', 22),
(22, '5', '2021-06-12 13:23:00', '4', '1', 133),
(23, '5', '2021-06-12 13:41:00', '1', '2', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_achievement`
--
ALTER TABLE `master_achievement`
  ADD PRIMARY KEY (`id_acv`);

--
-- Indexes for table `master_item`
--
ALTER TABLE `master_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `master_karyawan`
--
ALTER TABLE `master_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `master_lokasi`
--
ALTER TABLE `master_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `master_planning`
--
ALTER TABLE `master_planning`
  ADD PRIMARY KEY (`id_planning`);

--
-- Indexes for table `table_login`
--
ALTER TABLE `table_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `transaksi_produksi`
--
ALTER TABLE `transaksi_produksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_achievement`
--
ALTER TABLE `master_achievement`
  MODIFY `id_acv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `master_item`
--
ALTER TABLE `master_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_karyawan`
--
ALTER TABLE `master_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_lokasi`
--
ALTER TABLE `master_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_planning`
--
ALTER TABLE `master_planning`
  MODIFY `id_planning` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_login`
--
ALTER TABLE `table_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_produksi`
--
ALTER TABLE `transaksi_produksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
