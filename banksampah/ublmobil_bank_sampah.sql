-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 06:06 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ublmobil_bank_sampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `alama` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `alama`, `password`, `nama`) VALUES
('a001', 'perum', '1234', 'Arya');

-- --------------------------------------------------------

--
-- Table structure for table `detil_setor`
--

CREATE TABLE `detil_setor` (
  `id_setor` varchar(30) NOT NULL,
  `id_sampah` varchar(10) DEFAULT NULL,
  `total` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `harga_nasabah`
--

CREATE TABLE `harga_nasabah` (
  `id_hrgnasabah` int(10) NOT NULL,
  `id_sampah` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `harga_lama` int(10) NOT NULL,
  `harga_baru` int(10) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_admin` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_nasabah`
--

INSERT INTO `harga_nasabah` (`id_hrgnasabah`, `id_sampah`, `harga_lama`, `harga_baru`, `tanggal`, `id_admin`) VALUES
(2, 'SMP001', 0, 2000, '2022-04-15 00:00:00', 'a001');

-- --------------------------------------------------------

--
-- Table structure for table `harga_pengepul`
--

CREATE TABLE `harga_pengepul` (
  `id_hrgpengepul` int(10) NOT NULL,
  `id_sampah` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `harga_lama` int(10) NOT NULL,
  `harga_baru` int(10) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `id_admin` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_pengepul`
--

INSERT INTO `harga_pengepul` (`id_hrgpengepul`, `id_sampah`, `harga_lama`, `harga_baru`, `tanggal`, `id_admin`) VALUES
(6, 'SMP001', 0, 1500, '2022-04-15 00:00:00', 'a001');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `deskripsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `deskripsi`) VALUES
(1, 'Besi'),
(2, 'kertas');

-- --------------------------------------------------------

--
-- Table structure for table `min_saldo`
--

CREATE TABLE `min_saldo` (
  `data` int(10) DEFAULT NULL,
  `sadlo` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `min_saldo`
--

INSERT INTO `min_saldo` (`data`, `sadlo`) VALUES
(10, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` varchar(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `alamat`, `password`, `nama`) VALUES
('123', 'perum', '123', 'arya'),
('321', 'Budi Luhur', '321', 'Phaksi Bangun Asmoro');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` varchar(20) NOT NULL,
  `jumlah_penarikan` int(7) DEFAULT NULL,
  `tanngal_penarikan` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_admin` varchar(20) NOT NULL,
  `id_nasabah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id_sampah` varchar(10) NOT NULL,
  `nama_sampah` varchar(30) NOT NULL,
  `harga_nasabah` int(7) NOT NULL,
  `harga_pengepul` int(7) NOT NULL,
  `id_kategori` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id_sampah`, `nama_sampah`, `harga_nasabah`, `harga_pengepul`, `id_kategori`) VALUES
('SMP001', 'koran', 2000, 1500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `setoran`
--

CREATE TABLE `setoran` (
  `id_setor` varchar(30) NOT NULL,
  `tgl_setor` date NOT NULL DEFAULT current_timestamp(),
  `id_nasabah` varchar(20) NOT NULL,
  `id_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setoran`
--

INSERT INTO `setoran` (`id_setor`, `tgl_setor`, `id_nasabah`, `id_admin`) VALUES
('321202203', '2022-03-08', '321', 'a001');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id_nasabah` varchar(20) NOT NULL,
  `saldo` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`id_nasabah`, `saldo`) VALUES
('123', 2000),
('321', 200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detil_setor`
--
ALTER TABLE `detil_setor`
  ADD KEY `FK_SETORAN` (`id_setor`),
  ADD KEY `fk_detil_sampah` (`id_sampah`);

--
-- Indexes for table `harga_nasabah`
--
ALTER TABLE `harga_nasabah`
  ADD PRIMARY KEY (`id_hrgnasabah`),
  ADD KEY `fk_sampah` (`id_sampah`),
  ADD KEY `fk_admin` (`id_admin`);

--
-- Indexes for table `harga_pengepul`
--
ALTER TABLE `harga_pengepul`
  ADD PRIMARY KEY (`id_hrgpengepul`),
  ADD KEY `fk_sampah_pengepul` (`id_sampah`),
  ADD KEY `fk_admin_pengepul` (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `FK_PENARIKAN_ADMIN` (`id_admin`),
  ADD KEY `FK_PENARIKAN_NASABAH` (`id_nasabah`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id_sampah`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `setoran`
--
ALTER TABLE `setoran`
  ADD PRIMARY KEY (`id_setor`),
  ADD KEY `FK_Nasabah` (`id_nasabah`),
  ADD KEY `FK_SETOR_ADMIN` (`id_admin`);
ALTER TABLE `setoran` ADD FULLTEXT KEY `Search_id` (`id_setor`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga_nasabah`
--
ALTER TABLE `harga_nasabah`
  MODIFY `id_hrgnasabah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `harga_pengepul`
--
ALTER TABLE `harga_pengepul`
  MODIFY `id_hrgpengepul` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_setor`
--
ALTER TABLE `detil_setor`
  ADD CONSTRAINT `FK_SETORAN` FOREIGN KEY (`id_setor`) REFERENCES `setoran` (`id_setor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detil_sampah` FOREIGN KEY (`id_sampah`) REFERENCES `sampah` (`id_sampah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `harga_nasabah`
--
ALTER TABLE `harga_nasabah`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `fk_sampah` FOREIGN KEY (`id_sampah`) REFERENCES `sampah` (`id_sampah`);

--
-- Constraints for table `harga_pengepul`
--
ALTER TABLE `harga_pengepul`
  ADD CONSTRAINT `fk_admin_pengepul` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `fk_sampah_pengepul` FOREIGN KEY (`id_sampah`) REFERENCES `sampah` (`id_sampah`);

--
-- Constraints for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD CONSTRAINT `FK_PENARIKAN_ADMIN` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `FK_PENARIKAN_NASABAH` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`);

--
-- Constraints for table `sampah`
--
ALTER TABLE `sampah`
  ADD CONSTRAINT `FK_ID_KATEGORI` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `setoran`
--
ALTER TABLE `setoran`
  ADD CONSTRAINT `FK_Nasabah` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SETOR_ADMIN` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `fk_tabungan` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
