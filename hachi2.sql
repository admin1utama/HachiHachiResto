-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 04:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
(3, 'TELUR AYAM', 'KG', 'BAHAN BAKU', 25500, 5, 'default.jpg', 'AKTIF'),
(4, 'BAKSO UDANG', 'PC', 'BAHAN BAKU', 30000, 2, 'default.jpg', 'AKTIF'),
(5, 'BAKSO CUMI', 'PC', 'BAHAN BAKU', 25000, 3, 'default.jpg', 'AKTIF'),
(6, 'FRENCH FRIES', 'PCK', 'BAHAN BAKU', 37000, 2, 'default.jpg', 'AKTIF'),
(7, 'BERAS LOKAL', 'SAK', 'BAHAN BAKU', 300000, 2, 'default.jpg', 'AKTIF'),
(8, 'SPICY SEAFOOD YAKI UDON', 'GL', 'BAHAN JADI', 43000, 8, 'spicy_seafood_yaki_udon1.jpeg', 'AKTIF'),
(9, 'SUSHI SHRIMP AND CHEESE ', 'GL', 'BAHAN JADI', 35000, 7, 'shrimpandcheese.jpg', 'AKTIF'),
(10, 'SAUCE TERIYAKI', 'GL', 'BAHAN BAKU', 200000, 2, 'default.jpg', 'AKTIF'),
(11, 'UBUR - UBUR', 'PORSI', 'BAHAN JADI', 40000, 8, 'default.jpg', 'AKTIF'),
(16, 'LEMON', 'KG', 'BAHAN BAKU', 90000, 3, 'default.jpg', 'AKTIF'),
(17, 'KIKOMAN', 'PC', 'BAHAN BAKU', 30000, 3, 'default.jpg', 'AKTIF'),
(21, 'NARUTOMAKI', 'KG', 'BAHAN BAKU', 37500, 5, 'narutomaki-kamaboko_43.jpeg', 'AKTIF'),
(23, 'MINYAK GORENG', 'PC', 'BAHAN BAKU', 20000, 3, 'default.jpg', 'AKTIF'),
(24, 'BOMBAY', 'PC', 'BAHAN BAKU', 17000, 1, 'default.jpg', 'AKTIF'),
(25, 'UDON MIE', 'PC', 'BAHAN BAKU', 28000, 7, 'default.jpg', 'AKTIF'),
(26, 'CHICKEN KARAGE', 'PC', 'BAHAN BAKU', 40000, 4, 'default.jpg', 'AKTIF'),
(27, 'RAMEN', 'PC', 'BAHAN BAKU', 15000, 2, 'default.jpg', 'AKTIF'),
(28, 'CRABSTIK', 'GL', 'BAHAN BAKU', 50000, 2, 'default.jpg', 'AKTIF'),
(29, 'MIE PASTA', 'PC', 'BAHAN BAKU', 27500, 1, 'default.jpg', 'AKTIF'),
(30, 'SAUCE RAMEN', 'GL', 'BAHAN BAKU', 75000, 1, 'default.jpg', 'AKTIF'),
(31, 'SAUCE DIANE', 'GL', 'BAHAN BAKU', 30000, 2, 'default.jpg', 'AKTIF'),
(32, 'GARAM', 'PC', 'BAHAN BAKU', 3000, 1, 'default.jpg', 'AKTIF'),
(33, 'SPAGHETTI', 'PC', 'BAHAN BAKU', 15000, 1, 'default.jpg', 'AKTIF'),
(34, 'FETTUCCINE', 'PC', 'BAHAN BAKU', 28000, 1, 'default.jpg', 'AKTIF'),
(35, 'MAYONNAISE ', 'PC', 'BAHAN BAKU', 40000, 1, 'default.jpg', 'AKTIF'),
(36, 'YAKINIKU BEEF', 'PC', 'BAHAN BAKU', 45000, 10, 'default.jpg', 'AKTIF'),
(37, 'JAMUR SHINTAKE', 'PC', 'BAHAN BAKU', 95000, 1, 'default.jpg', 'AKTIF'),
(38, 'KEJU CHEDDAR', 'PC', 'BAHAN BAKU', 25000, 2, 'default.jpg', 'AKTIF'),
(39, 'KEJU BUBUK', 'PC', 'BAHAN BAKU', 39000, 2, 'default.jpg', 'AKTIF'),
(40, 'DAGING SIRLOIN ', 'GL', 'BAHAN BAKU', 68000, 1, 'default.jpg', 'AKTIF'),
(41, 'BAWANG PUTIH', 'KG', 'BAHAN BAKU', 20000, 1, 'default.jpg', 'AKTIF');

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
(17, 8, 5, 3);

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
('KC1', 'Hachi-Hachi Bistro TP DownTown', 'Jl. dummy', 'Surabaya', '2019-08-20', '08193735289', 'Outlet', 'AKTIF'),
('KC2', 'Hachi-Hachi Bistro Galaxy Mall', 'Jl. Galaxy Bumi Permai 2', 'Surabaya', '2020-01-02', '0316453938', 'Outlet', 'AKTIF'),
('KC3', 'Hachi - Hachi Bistro Citraland', 'Jl. DD', 'Surabaya', '2020-01-02', '0316453938', 'Gudang', 'NONAKTIF'),
('KC4', 'HACHI - HACHI BISTRO GRAND CIT', 'JL. MERDEKA 45', 'SURABAYA', '2020-01-02', '0316453938', 'OUTLET', 'AKTIF'),
('KC5', 'HACHI - HACHI BISTRO LENMARC', 'JL. LENMARC', 'SURABAYA', '2020-01-02', '0316453938', 'OUTLET', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `ddistribusi`
--

CREATE TABLE `ddistribusi` (
  `notadetail` int(11) NOT NULL,
  `nomernota` varchar(20) DEFAULT NULL,
  `kodebahan` int(11) DEFAULT NULL,
  `kodesatuan` varchar(5) DEFAULT NULL,
  `qtyasal` int(11) DEFAULT NULL,
  `qtytujuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ddistribusi`
--

INSERT INTO `ddistribusi` (`notadetail`, `nomernota`, `kodebahan`, `kodesatuan`, `qtyasal`, `qtytujuan`) VALUES
(13, 'DDIS2020001', 10, 'GL', 1, 0),
(14, 'DDIS2020001', 7, 'SAK', 2, 0),
(15, 'DDIS2020002', 5, 'PC', 3, 0),
(16, 'DDIS2020003', 17, 'PC', 0, 0),
(17, 'DDIS2020003', 16, 'KG', 0, 0);

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
(6, 'MRDK1', 11, 40000, 3),
(11, 'MRDK2', 11, 40000, 1),
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
-- Table structure for table `djual`
--

CREATE TABLE `djual` (
  `nomernotadetail` int(11) NOT NULL,
  `nomernota` int(11) NOT NULL,
  `kodebahan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `djual`
--

INSERT INTO `djual` (`nomernotadetail`, `nomernota`, `kodebahan`, `qty`, `harga`, `subtotal`) VALUES
(1, 6, 8, 2, 43000, 43000),
(2, 6, 11, 1, 40000, 40000),
(3, 6, 9, 2, 35000, 35000),
(4, 7, 11, 4, 40000, 40000);

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
(37, 'JLY2020001', 5, 'KG', 3, 25500),
(38, 'JLY2020001', 4, 'PC', 99, 30000),
(39, 'JLY2020002', 5, 'KG', 3, 25500),
(40, 'JLY2020002', 4, 'PC', 99, 30000),
(41, 'JLY2020002', 10, 'GL', 88, 200000),
(42, 'JLY2020003', 5, 'KG', 3, 25500),
(43, 'JLY2020003', 4, 'PC', 99, 30000),
(44, 'JLY2020003', 10, 'GL', 88, 200000),
(45, 'JLY2020003', 7, 'SAK', 1, 45000),
(46, 'JLY2020003', 7, 'SAK', 1, 45000),
(47, 'JLY2020004', 6, 'PACK', 1, 37000),
(48, 'JLY2020005', 5, 'PC', 2, 25000),
(49, 'JLY2020005', 7, 'SAK', 2, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `dpenerimaan`
--

CREATE TABLE `dpenerimaan` (
  `notadetail` int(11) NOT NULL,
  `nomernota` varchar(20) DEFAULT NULL,
  `kodebahan` int(11) DEFAULT NULL,
  `kodesatuan` varchar(5) DEFAULT NULL,
  `qtypesan` int(11) DEFAULT NULL,
  `qtyterima` int(11) DEFAULT NULL,
  `hargabeli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpenerimaan`
--

INSERT INTO `dpenerimaan` (`notadetail`, `nomernota`, `kodebahan`, `kodesatuan`, `qtypesan`, `qtyterima`, `hargabeli`) VALUES
(1, 'TR2020004', 0, 'KG', 3, 3, 25500),
(2, 'TR2020004', 0, 'PC', 99, 99, 30000),
(3, 'TR2020004', 0, 'GL', 88, 88, 200000),
(4, 'TR2020005', 5, 'KG', 3, 3, 25500),
(5, 'TR2020005', 4, 'PC', 99, 99, 30000),
(6, 'TR2020006', 5, 'KG', 3, 3, 25500),
(7, 'TR2020006', 4, 'PC', 99, 99, 30000),
(8, 'TR2020006', 10, 'GL', 88, 77, 200000),
(9, 'TR2020006', 7, 'SAK', 1, 1, 45000),
(10, 'TR2020006', 7, 'SAK', 1, 1, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `dpermintaan`
--

CREATE TABLE `dpermintaan` (
  `notadetail` int(11) NOT NULL,
  `nomernota` varchar(20) DEFAULT NULL,
  `kodebahan` int(11) DEFAULT NULL,
  `kodesatuan` varchar(5) DEFAULT NULL,
  `qtypesan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpermintaan`
--

INSERT INTO `dpermintaan` (`notadetail`, `nomernota`, `kodebahan`, `kodesatuan`, `qtypesan`) VALUES
(11, 'HDIS2020001', 3, 'KG', 1),
(12, 'HDIS2020002', 6, 'PACK', 2),
(13, 'HDIS2020003', 7, 'SAK', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hdistribusi`
--

CREATE TABLE `hdistribusi` (
  `nomernota` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kodecabangasal` varchar(5) DEFAULT NULL,
  `kodecabangtujuan` varchar(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hdistribusi`
--

INSERT INTO `hdistribusi` (`nomernota`, `tanggal`, `kodecabangasal`, `kodecabangtujuan`, `status`) VALUES
('DDIS2020001', '2020-08-19', 'KC2', 'KC3', 'AKTIF'),
('DDIS2020002', '2020-08-22', 'KC1', 'KC2', 'AKTIF'),
('DDIS2020003', '2020-10-25', 'KC3', 'KC1', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `hjual`
--

CREATE TABLE `hjual` (
  `nomernota` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(11) NOT NULL,
  `kodemember` varchar(8) NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hjual`
--

INSERT INTO `hjual` (`nomernota`, `tanggal`, `username`, `kodemember`, `grandtotal`) VALUES
(6, '2020-12-03', 'yawan', 'FD01', 0),
(7, '2020-12-03', 'heni', 'AT01', 0);

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
('JLY2020001', '2020-10-10', 'SP5', 14300, 'AKTIF'),
('JLY2020002', '2020-10-10', 'SP4', 0, 'AKTIF'),
('JLY2020003', '2020-11-11', 'SP2', 0, 'DITERIMA'),
('JLY2020004', '2020-10-11', 'SP1', 0, 'AKTIF'),
('JLY2020005', '2020-10-12', 'SP3', 0, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `hpenerimaan`
--

CREATE TABLE `hpenerimaan` (
  `nomernota` varchar(20) NOT NULL,
  `nomernotapemesanan` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kodesupplier` varchar(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hpenerimaan`
--

INSERT INTO `hpenerimaan` (`nomernota`, `nomernotapemesanan`, `tanggal`, `kodesupplier`, `status`) VALUES
('TR2020001', 'JLY2020002', '2020-10-10', 'SP4', 'AKTIF'),
('TR2020002', 'JLY2020001', '2020-10-10', 'SP5', NULL),
('TR2020003', 'JLY2020002', '2020-10-10', 'SP4', NULL),
('TR2020004', 'JLY2020002', '2020-10-10', 'SP4', NULL),
('TR2020005', 'JLY2020001', '2020-10-10', 'SP5', NULL),
('TR2020006', 'JLY2020003', '2020-11-11', 'SP2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hpermintaan`
--

CREATE TABLE `hpermintaan` (
  `nomernota` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kodecabang` varchar(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hpermintaan`
--

INSERT INTO `hpermintaan` (`nomernota`, `tanggal`, `kodecabang`, `status`) VALUES
('HDIS2020001', '2020-10-12', 'KC1', 'AKTIF'),
('HDIS2020002', '2020-10-12', 'KC3', 'AKTIF'),
('HDIS2020003', '0000-00-00', 'KC2', 'AKTIF');

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
('DJ01', 'KC2', 'dermawanjoko', '123456', 'DERMAWAN JOKO', '2010-06-01', '357808098287004', '081553763773', 'KEPALA GUDANG', 'AKTIF'),
('DS01', 'KC1', 'davinsetya', 'davin01', 'DAVIN SETYA', '2020-12-01', '35770707787012', '081563763746', 'KEPALA GUDANG', 'AKTIF'),
('DW01', 'KC1', 'dwimas', 'dwimas01', 'DWIMAS', '2021-01-02', '3577070778701233', '085766347363', 'OPERATOR', 'AKTIF'),
('FD1', 'KC1', 'felixdjaja', 'djaja', 'FELIX DJAJA', '0000-00-00', '357707066687008', '081553763774', 'ADMIN', 'AKTIF'),
('NR01', 'KC3', 'norrianto', 'Rianto01', 'NORMAN RIANTO', '2020-12-12', '357707076587009', '085766346222', 'ADMIN', 'AKTIF'),
('OP1', 'KC3', 'yawan', '1234', 'MURNIYAWAN', '2015-04-01', '357808066687002', '081553763773', 'OPERATOR', 'AKTIF'),
('OP2', 'KC2', 'Heni', '12345', 'HENI LUTFI', '2010-04-01', '357707066687008', '081553763775', 'OPERATOR', 'AKTIF'),
('OP3', 'KC2', 'anwar11', '123456', 'ANWAR TIWI', '2010-06-01', '357808098287004', '081553763773', 'OPERATOR', 'NONAKTIF'),
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
(7, 10, 'GL', 'GR', '500.00'),
(8, 17, 'LTR', 'GR', '10.00'),
(9, 21, 'KG', 'GR', '20.00');

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
('AT01', 'AGUS TJANDRA', 'agustjandra@gmail.com', 'SURABAYA', 'JL. DRIYO REJO 2/6', '1997-05-05', 811345917, 'AKTIF'),
('C01', 'CAROLINE', 'caroline@gmail.com', 'SURABAYA', 'JL. JEPARA 1/22', '1990-01-08', 815731878, 'AKTIF'),
('CC01', 'CAKRA CIPUTRA', 'cakcracip@gmail.com', 'SURABAYA', 'JL. KEPUTERAN 5/88', '1980-05-20', 811754550, 'AKTIF'),
('DP01', 'DEWI PERKIN', 'dewiperkin@gmail.com', 'SURABAYA', 'JL. KEMBANG JEPUN 33', '1993-12-10', 2147483647, 'AKTIF'),
('KB01', 'KON BING', 'konbing@gmail.com', 'SURABAYA', 'JL..PANDEGILING 1', '0000-00-00', 2147483647, 'NONAKTIF');

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
('MRDK3', 'MERDEKA 3', 90000, 'AKTIF'),
('MRDK4', 'MERDEKA4', 55000, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `penyesuaianstok`
--

CREATE TABLE `penyesuaianstok` (
  `idpenyesuaian` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kodeoutlet` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `kodebahan` int(11) NOT NULL,
  `stokawal` int(11) NOT NULL,
  `stokakhir` int(11) NOT NULL,
  `alasan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyesuaianstok`
--

INSERT INTO `penyesuaianstok` (`idpenyesuaian`, `tanggal`, `kodeoutlet`, `username`, `kodebahan`, `stokawal`, `stokakhir`, `alasan`) VALUES
(3, '2020-10-13', 'KC3', 'yawan', 17, 8, 0, 'Zero Iventory'),
(4, '2020-10-13', 'KC3', 'yawan', 16, 8, 0, 'Zero Iventory'),
(6, '2020-10-25', 'KC3', 'yawan', 16, 1, 3, 'Stok Darurat');

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
('LTR', 'LITER'),
('ML', 'MILILITER'),
('PC', 'PIECE'),
('PCK', 'PACK'),
('SAK', 'SAK');

-- --------------------------------------------------------

--
-- Table structure for table `stokcabang`
--

CREATE TABLE `stokcabang` (
  `kodebahan` int(11) NOT NULL,
  `kodecabang` varchar(5) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stokcabang`
--

INSERT INTO `stokcabang` (`kodebahan`, `kodecabang`, `stok`) VALUES
(3, 'KC5', 0),
(4, 'KC5', 0),
(5, 'KC5', 0),
(6, 'KC5', 0),
(7, 'KC5', 0),
(8, 'KC5', 0),
(9, 'KC5', 0),
(10, 'KC5', 0),
(11, 'KC5', 0),
(16, 'KC1', 0),
(16, 'KC2', 0),
(16, 'KC3', 3),
(16, 'KC4', 0),
(16, 'KC5', 0),
(17, 'KC1', 0),
(17, 'KC2', 0),
(17, 'KC3', 0),
(17, 'KC4', 0),
(17, 'KC5', 0),
(18, 'KC1', 0),
(18, 'KC2', 0),
(18, 'KC3', 0),
(18, 'KC4', 0),
(18, 'KC5', 0),
(19, 'KC1', 0),
(19, 'KC2', 0),
(19, 'KC3', 0),
(19, 'KC4', 0),
(19, 'KC5', 0),
(20, 'KC1', 0),
(20, 'KC2', 0),
(20, 'KC3', 0),
(20, 'KC4', 0),
(20, 'KC5', 0),
(21, 'KC1', 0),
(21, 'KC2', 0),
(21, 'KC3', 0),
(21, 'KC4', 0),
(21, 'KC5', 0),
(22, 'KC1', 0),
(22, 'KC2', 0),
(22, 'KC3', 0),
(22, 'KC4', 0),
(22, 'KC5', 0),
(23, 'KC1', 0),
(23, 'KC2', 0),
(23, 'KC3', 0),
(23, 'KC4', 0),
(23, 'KC5', 0),
(24, 'KC1', 0),
(24, 'KC2', 0),
(24, 'KC3', 0),
(24, 'KC4', 0),
(24, 'KC5', 0),
(25, 'KC1', 0),
(25, 'KC2', 0),
(25, 'KC3', 0),
(25, 'KC4', 0),
(25, 'KC5', 0),
(26, 'KC1', 0),
(26, 'KC2', 0),
(26, 'KC3', 0),
(26, 'KC4', 0),
(26, 'KC5', 0),
(27, 'KC1', 0),
(27, 'KC2', 0),
(27, 'KC3', 0),
(27, 'KC4', 0),
(27, 'KC5', 0),
(28, 'KC1', 0),
(28, 'KC2', 0),
(28, 'KC3', 0),
(28, 'KC4', 0),
(28, 'KC5', 0),
(29, 'KC1', 0),
(29, 'KC2', 0),
(29, 'KC3', 0),
(29, 'KC4', 0),
(29, 'KC5', 0),
(30, 'KC1', 0),
(30, 'KC2', 0),
(30, 'KC3', 0),
(30, 'KC4', 0),
(30, 'KC5', 0),
(31, 'KC1', 0),
(31, 'KC2', 0),
(31, 'KC3', 0),
(31, 'KC4', 0),
(31, 'KC5', 0),
(32, 'KC1', 0),
(32, 'KC2', 0),
(32, 'KC3', 0),
(32, 'KC4', 0),
(32, 'KC5', 0),
(33, 'KC1', 0),
(33, 'KC2', 0),
(33, 'KC3', 0),
(33, 'KC4', 0),
(33, 'KC5', 0),
(34, 'KC1', 0),
(34, 'KC2', 0),
(34, 'KC3', 0),
(34, 'KC4', 0),
(34, 'KC5', 0),
(35, 'KC1', 0),
(35, 'KC2', 0),
(35, 'KC3', 0),
(35, 'KC4', 0),
(35, 'KC5', 0),
(36, 'KC1', 0),
(36, 'KC2', 0),
(36, 'KC3', 0),
(36, 'KC4', 0),
(36, 'KC5', 0),
(37, 'KC1', 0),
(37, 'KC2', 0),
(37, 'KC3', 0),
(37, 'KC4', 0),
(37, 'KC5', 0),
(38, 'KC1', 0),
(38, 'KC2', 0),
(38, 'KC3', 0),
(38, 'KC4', 0),
(38, 'KC5', 0),
(39, 'KC1', 0),
(39, 'KC2', 0),
(39, 'KC3', 0),
(39, 'KC4', 0),
(39, 'KC5', 0),
(40, 'KC1', 0),
(40, 'KC2', 0),
(40, 'KC3', 0),
(40, 'KC4', 0),
(40, 'KC5', 0),
(41, 'KC1', 0),
(41, 'KC2', 0),
(41, 'KC3', 0),
(41, 'KC4', 0),
(41, 'KC5', 0);

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
('SP5', 'PT.  MANDALA BARU', 'PAK DEDDY', '081389335678', 'JL. PENDESTRIAN RUNGKUT NO 22 ', 'SURABAYA', 'NONAKTIF'),
('SP6', 'CV. SURYA KENCANA', 'RENDI TRI', '0315672333', 'JL. KAPAS KRAMPUNG 3/22', 'SURABAYA', 'AKTIF');

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
-- Indexes for table `ddistribusi`
--
ALTER TABLE `ddistribusi`
  ADD PRIMARY KEY (`notadetail`);

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
-- Indexes for table `djual`
--
ALTER TABLE `djual`
  ADD PRIMARY KEY (`nomernotadetail`);

--
-- Indexes for table `dpembelian`
--
ALTER TABLE `dpembelian`
  ADD PRIMARY KEY (`notadetail`);

--
-- Indexes for table `dpenerimaan`
--
ALTER TABLE `dpenerimaan`
  ADD PRIMARY KEY (`notadetail`);

--
-- Indexes for table `dpermintaan`
--
ALTER TABLE `dpermintaan`
  ADD PRIMARY KEY (`notadetail`);

--
-- Indexes for table `hdistribusi`
--
ALTER TABLE `hdistribusi`
  ADD PRIMARY KEY (`nomernota`);

--
-- Indexes for table `hjual`
--
ALTER TABLE `hjual`
  ADD PRIMARY KEY (`nomernota`);

--
-- Indexes for table `hpembelian`
--
ALTER TABLE `hpembelian`
  ADD PRIMARY KEY (`nomernota`);

--
-- Indexes for table `hpenerimaan`
--
ALTER TABLE `hpenerimaan`
  ADD PRIMARY KEY (`nomernota`);

--
-- Indexes for table `hpermintaan`
--
ALTER TABLE `hpermintaan`
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
-- Indexes for table `penyesuaianstok`
--
ALTER TABLE `penyesuaianstok`
  ADD PRIMARY KEY (`idpenyesuaian`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`kodesatuan`);

--
-- Indexes for table `stokcabang`
--
ALTER TABLE `stokcabang`
  ADD PRIMARY KEY (`kodebahan`,`kodecabang`);

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
  MODIFY `kodebahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
  MODIFY `kodebom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ddistribusi`
--
ALTER TABLE `ddistribusi`
  MODIFY `notadetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `djual`
--
ALTER TABLE `djual`
  MODIFY `nomernotadetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dpembelian`
--
ALTER TABLE `dpembelian`
  MODIFY `notadetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `dpenerimaan`
--
ALTER TABLE `dpenerimaan`
  MODIFY `notadetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dpermintaan`
--
ALTER TABLE `dpermintaan`
  MODIFY `notadetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hjual`
--
ALTER TABLE `hjual`
  MODIFY `nomernota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konversisatuan`
--
ALTER TABLE `konversisatuan`
  MODIFY `kodekonversi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penyesuaianstok`
--
ALTER TABLE `penyesuaianstok`
  MODIFY `idpenyesuaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
