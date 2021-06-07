-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 06:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hachi2`
--
CREATE DATABASE IF NOT EXISTS `hachi2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hachi2`;

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `kodebahan` int(11) NOT NULL,
  `namabahan` varchar(30) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `jenis` varchar(12) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`kodebahan`, `namabahan`, `satuan`, `jenis`, `harga`, `stok`, `foto`, `status`) VALUES
(3, 'TELUR AYAM', 'KG', 'BAHAN BAKU', 25500, 5, '', 'AKTIF'),
(4, 'BAKSO UDANG', 'PC', 'BAHAN BAKU', 30000, 2, '', 'AKTIF'),
(5, 'BAKSO CUMI', 'PC', 'BAHAN BAKU', 25000, 2, '', 'AKTIF'),
(6, 'FRENCH FRIES', 'PACK', 'BAHAN BAKU', 37000, 2, '', 'AKTIF'),
(7, 'BERAS LOKAL', 'SAK', 'BAHAN BAKU', 45000, 6, '', 'AKTIF'),
(8, 'UDON SPICY', 'PORSI', 'BAHAN JADI', 43000, 8, '', 'AKTIF'),
(9, 'SUSHI SHRIMP AND CHEESE ', 'PORSI', 'BAHAN JADI', 35000, 7, '', 'AKTIF'),
(10, 'SAUCE TERIYAKI', 'GL', 'BAHAN BAKU', 200000, 2, '', 'AKTIF'),
(11, 'UBUR - UBUR', 'PORSI', 'BAHAN JADI', 40000, 8, '', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

CREATE TABLE `bom` (
  `kodebom` int(11) NOT NULL,
  `kodebahanjadi` int(11) NOT NULL,
  `kodebahanbaku` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`kodebom`, `kodebahanjadi`, `kodebahanbaku`, `qty`) VALUES
(12, 9, 7, 1),
(14, 8, 3, 1),
(15, 9, 3, 1),
(16, 9, 6, 1),
(17, 8, 5, 3),
(19, 8, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `kodecabang` varchar(5) NOT NULL,
  `namacabang` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `tanggalberdiri` date DEFAULT NULL,
  `nomertelp` varchar(15) DEFAULT NULL,
  `jenis` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`kodecabang`, `namacabang`, `alamat`, `kota`, `tanggalberdiri`, `nomertelp`, `jenis`, `status`) VALUES
('KC1', 'TP Down Town', 'Jl. dummy', 'Surabaya', '2019-08-20', '08193735289', 'Outlet', 'AKTIF'),
('KC2', 'Hachi - Hachi Bistro', 'Jl. Galaxy Bumi Permai 2', 'Surabaya', '2020-01-02', '0316453938', 'Outlet', 'AKTIF'),
('KC3', 'Hachi - Hachi Bistro', 'Jl. DD', 'Surabaya', '2020-01-02', '0316453938', 'Gudang', 'NONAKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `detailpaketmenu`
--

CREATE TABLE `detailpaketmenu` (
  `kodedetailpaket` int(11) NOT NULL,
  `kodepaket` varchar(5) DEFAULT NULL,
  `kodebahan` int(11) DEFAULT NULL,
  `hargabahan` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailpaketmenu`
--

INSERT INTO `detailpaketmenu` (`kodedetailpaket`, `kodepaket`, `kodebahan`, `hargabahan`, `qty`) VALUES
(4, 'MRDK1', 8, 43000, 1),
(5, 'MRDK1', 9, 35000, 2),
(6, 'MRDK1', 11, 40000, 3),
(9, 'MRDK2', 9, 35000, 2),
(11, 'MRDK2', 11, 40000, 1),
(13, 'MRDK2', 9, 35000, 2),
(14, 'MRDK2', 9, 35000, 2),
(15, 'MRDK2', 9, 35000, 2),
(16, 'MRDK2', 8, 43000, 2),
(17, 'MRDK3', 8, 43000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detailsupplier`
--

CREATE TABLE `detailsupplier` (
  `kodedetailsupplier` int(11) NOT NULL,
  `kodesupplier` varchar(5) NOT NULL,
  `kodebahan` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailsupplier`
--

INSERT INTO `detailsupplier` (`kodedetailsupplier`, `kodesupplier`, `kodebahan`, `status`) VALUES
(1, 'SP1', 4, 'AKTIF'),
(2, 'SP3', 4, 'AKTIF'),
(3, 'SP2', 6, 'AKTIF'),
(4, 'SP2', 6, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `dpembelian`
--

CREATE TABLE `dpembelian` (
  `notadetail` int(11) NOT NULL,
  `nomernota` varchar(20) NOT NULL,
  `kodebahan` int(11) NOT NULL,
  `kodesatuan` varchar(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `hargabeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpembelian`
--

INSERT INTO `dpembelian` (`notadetail`, `nomernota`, `kodebahan`, `kodesatuan`, `qty`, `hargabeli`) VALUES
(2, 'JLY2020001', 7, 'SAK', 2, 100000),
(3, 'JLY2020002', 3, 'KG', 1, 40000),
(6, 'JLY2020012', 2, 'GL', 0, 0),
(7, 'JLY2020012', 2, 'GL', 0, 0),
(8, 'JLY2020012', 2, 'GL', 0, 0),
(9, 'JLY2020012', 2, 'GL', 0, 0),
(10, 'JLY2020012', 2, 'GL', 0, 0),
(11, 'JLY2020012', 2, 'GL', 0, 0),
(12, 'JLY2020012', 2, 'GL', 0, 0),
(13, 'JLY2020012', 2, 'GL', 0, 0),
(14, 'JLY2020012', 2, 'GL', 0, 0),
(15, 'JLY2020012', 2, 'GL', 0, 0),
(16, 'JLY2020012', 2, 'GL', 0, 0),
(17, 'JLY2020012', 2, 'GL', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hpembelian`
--

CREATE TABLE `hpembelian` (
  `nomernota` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `kodesupplier` varchar(5) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hpembelian`
--

INSERT INTO `hpembelian` (`nomernota`, `tanggal`, `kodesupplier`, `subtotal`, `status`) VALUES
('JLY2020001', '2020-06-30', 'SP2', 90000, 'AKTIF'),
('JLY2020002', '2020-07-01', 'SP1', 25500, 'AKTIF'),
('JLY2020003', '2020-04-01', 'SP1', 0, 'AKTIF'),
('JLY2020004', '2020-04-01', 'SP1', 0, 'AKTIF'),
('JLY2020005', '2020-07-21', 'SP1', 0, 'AKTIF'),
('JLY2020006', '2020-07-21', 'SP1', 0, 'AKTIF'),
('JLY2020007', '2020-07-21', 'SP5', 0, 'AKTIF'),
('JLY2020008', '2020-07-21', 'SP5', 0, 'AKTIF'),
('JLY2020009', '2020-07-21', 'SP1', 0, 'AKTIF'),
('JLY2020010', '2020-07-21', 'SP1', 0, 'AKTIF'),
('JLY2020011', '2020-07-21', 'SP1', 0, 'AKTIF'),
('JLY2020012', '1997-09-05', 'SP5', 0, 'NONAKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kodekaryawan` varchar(5) NOT NULL,
  `kodecabang` varchar(5) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tanggalmulai` date DEFAULT NULL,
  `noidentitas` varchar(20) DEFAULT NULL,
  `nomertelp` varchar(15) DEFAULT NULL,
  `jabatan` varchar(15) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kodekaryawan`, `kodecabang`, `username`, `password`, `nama`, `tanggalmulai`, `noidentitas`, `nomertelp`, `jabatan`, `status`) VALUES
('DJ01', 'KC2', 'djaja', '123456', 'DJAJA A', '2010-06-01', '357808098287004', '081553763773', 'KEPALA GUDANG', 'NONAKTIF'),
('FD1', 'KC1', 'felixdjaja', 'djaja', 'FELIX DJAJA', '0000-00-00', '357707066687008', '081553763774', 'ADMIN', 'NONAKTIF'),
('OP1', 'CTP', 'yawan', '1234', 'MURNIYAWAN', '2015-04-01', '357808066687002', '081553763773', 'OPERATOR', 'NONAKTIF'),
('OP2', 'CGM', 'Heni', '12345', 'HENI LUTFI', '2010-04-01', '357707066687008', '081553763775', 'OPERATOR', 'NONAKTIF'),
('OP3', 'CGM', 'anwar11', '123456', 'ANWAR TIWI', '2010-06-01', '357808098287004', '081553763773', 'OPERATOR', 'NONAKTIF'),
('PA01', 'KC1', 'putraad', '123456', 'PUTERA ADHIGUNA', '2010-04-01', '357808066687002', '081553763773', 'KEPALA GUDANG', 'NONAKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `konversisatuan`
--

CREATE TABLE `konversisatuan` (
  `kodekonversi` int(11) NOT NULL,
  `kodebahan` int(11) DEFAULT NULL,
  `kodesatuan1` varchar(5) DEFAULT NULL,
  `kodesatuan2` varchar(5) DEFAULT NULL,
  `nilaikonversi` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konversisatuan`
--

INSERT INTO `konversisatuan` (`kodekonversi`, `kodebahan`, `kodesatuan1`, `kodesatuan2`, `nilaikonversi`) VALUES
(1, 3, 'KG', 'GR', '20.00'),
(3, 5, 'KG', 'GR', '750.00'),
(4, 6, 'KG', 'GR', '100.00'),
(5, 7, 'KG', 'GR', '250.00'),
(6, 4, 'KG', 'GR', '400.00'),
(7, 10, 'GL', 'GR', '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `kodemember` varchar(8) NOT NULL,
  `namamember` varchar(30) NOT NULL,
  `emailmember` varchar(30) NOT NULL,
  `kotamember` varchar(30) NOT NULL,
  `alamatrumahmember` varchar(50) NOT NULL,
  `tanggallahirmember` date NOT NULL,
  `notelpmember` int(12) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kodemember`, `namamember`, `emailmember`, `kotamember`, `alamatrumahmember`, `tanggallahirmember`, `notelpmember`, `status`) VALUES
('FD01', 'FELIX DJAJA', 'felix_putera@hotmail.com', 'SURABAYA', 'JL. DUMMY 41', '1997-05-09', 2147483647, 'NONAKTIF'),
('FD02', 'FELIX DJAJA', 'felix_putera@hotmail.com', 'SURABAYA', 'JL. DUMMY 41', '1997-05-09', 2147483647, 'NONAKTIF'),
('FD03', 'FELIX DJAJAS', 'felix_putera@gmail.com', 'SURABAYA', 'JL. DUMMY 41', '0000-00-00', 2147483647, 'NONAKTIF'),
('KF8', 'KON BING', 'konbing@gmail.com', 'SURABAYA', 'JL..PANDEGILING 1', '0000-00-00', 2147483647, 'NONAKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `paketmenu`
--

CREATE TABLE `paketmenu` (
  `kodepaket` varchar(5) NOT NULL,
  `namapaket` varchar(30) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paketmenu`
--

INSERT INTO `paketmenu` (`kodepaket`, `namapaket`, `harga`, `status`) VALUES
('MRDK1', 'MERDEKA 1', 70000, 'AKTIF'),
('MRDK2', 'MERDEKA 2', 80000, 'AKTIF'),
('MRDK3', 'MERDEKA 3', 90000, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `kodesatuan` varchar(5) NOT NULL,
  `namasatuan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`kodesatuan`, `namasatuan`) VALUES
('GL', 'GALON'),
('GR', 'GRAM'),
('KG', 'KILOGRAM'),
('ML', 'MILILITER'),
('PC', 'PACK'),
('SAK', 'SAK');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kodesupplier` varchar(5) NOT NULL,
  `namasupplier` varchar(20) DEFAULT NULL,
  `contactperson` varchar(20) DEFAULT NULL,
  `nomertelp` varchar(20) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kodesupplier`, `namasupplier`, `contactperson`, `nomertelp`, `alamat`, `kota`, `status`) VALUES
('SP1', 'PT. SARI INDOGUNA', 'PAK DERRY', '085722454476', 'JL. MANYAR JAYA 3', 'SURABAYA', 'NONAKTIF'),
('SP2', 'PT. LESTARI JAYA', 'PAK ONGKY', '081804227655', 'JL. LONTAR NO. 130', 'SURABAYA', 'NONAKTIF'),
('SP3', 'PT. SARANA KEDUNG CO', 'IBU HENNY', '0315877723', 'JL. DEMAK 3', 'SURABAYA', 'NONAKTIF'),
('SP4', 'PT. GARUDA', 'PAK HADI', '0315654432', 'JL. LONTAR NO. 137', 'SURABAYA', 'NONAKTIF'),
('SP5', 'PT.  MANDALA BARU', 'PAK DEDDY', '081389335678', 'JL. PENDESTRIAN RUNGKUT NO 22 ', 'SURABAYA', 'NONAKTIF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`kodebahan`);

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`kodebom`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`kodecabang`);

--
-- Indexes for table `detailpaketmenu`
--
ALTER TABLE `detailpaketmenu`
  ADD PRIMARY KEY (`kodedetailpaket`);

--
-- Indexes for table `detailsupplier`
--
ALTER TABLE `detailsupplier`
  ADD PRIMARY KEY (`kodedetailsupplier`);

--
-- Indexes for table `dpembelian`
--
ALTER TABLE `dpembelian`
  ADD PRIMARY KEY (`notadetail`);

--
-- Indexes for table `hpembelian`
--
ALTER TABLE `hpembelian`
  ADD PRIMARY KEY (`nomernota`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kodekaryawan`);

--
-- Indexes for table `konversisatuan`
--
ALTER TABLE `konversisatuan`
  ADD PRIMARY KEY (`kodekonversi`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`kodemember`);

--
-- Indexes for table `paketmenu`
--
ALTER TABLE `paketmenu`
  ADD PRIMARY KEY (`kodepaket`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`kodesatuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kodesupplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `kodebahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
  MODIFY `kodebom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `detailpaketmenu`
--
ALTER TABLE `detailpaketmenu`
  MODIFY `kodedetailpaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detailsupplier`
--
ALTER TABLE `detailsupplier`
  MODIFY `kodedetailsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dpembelian`
--
ALTER TABLE `dpembelian`
  MODIFY `notadetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `konversisatuan`
--
ALTER TABLE `konversisatuan`
  MODIFY `kodekonversi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;