-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 06:47 PM
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
(4, 'BAKSO UDANG', 'PCS', 'BAHAN BAKU', 30000, 2, 'default.jpg', 'AKTIF'),
(5, 'BAKSO CUMI', 'PCS', 'BAHAN BAKU', 25000, 3, 'default.jpg', 'AKTIF'),
(6, 'FRENCH FRIES', 'PCK', 'BAHAN BAKU', 37000, 2, 'default.jpg', 'AKTIF'),
(7, 'BERAS LOKAL', 'SAK', 'BAHAN BAKU', 300000, 2, 'default.jpg', 'AKTIF'),
(8, 'SPICY SEAFOOD YAKI UDON', 'PORSI', 'BAHAN JADI', 54000, 8, 'Spicy_Seafood_Yaki_Udon.jpg', 'AKTIF'),
(9, 'SHRIMP AND CHEESE ROLL ', 'PORSI', 'BAHAN JADI', 45000, 7, 'Shrimp_and_Cheese_Roll.jpg', 'AKTIF'),
(10, 'SAUCE TERIYAKI', 'GL', 'BAHAN BAKU', 200000, 2, 'default.jpg', 'AKTIF'),
(11, 'UBUR - UBUR', 'PORSI', 'BAHAN JADI', 40000, 8, 'default.jpg', 'AKTIF'),
(16, 'LEMON', 'KG', 'BAHAN BAKU', 90000, 3, 'default.jpg', 'AKTIF'),
(17, 'KIKOMAN', 'PCS', 'BAHAN BAKU', 30000, 3, 'default.jpg', 'AKTIF'),
(21, 'NARUTOMAKI', 'KG', 'BAHAN BAKU', 37500, 5, 'narutomaki-kamaboko_43.jpeg', 'AKTIF'),
(23, 'MINYAK GORENG', 'PCS', 'BAHAN BAKU', 20000, 3, 'default.jpg', 'AKTIF'),
(24, 'BOMBAY', 'PCS', 'BAHAN BAKU', 17000, 1, 'default.jpg', 'AKTIF'),
(25, 'UDON MIE', 'PCS', 'BAHAN BAKU', 28000, 7, 'default.jpg', 'AKTIF'),
(26, 'CHICKEN KARAGE', 'PCS', 'BAHAN BAKU', 40000, 4, 'default.jpg', 'AKTIF'),
(27, 'RAMEN', 'PCS', 'BAHAN BAKU', 15000, 2, 'default.jpg', 'AKTIF'),
(28, 'CRABSTIK', 'GL', 'BAHAN BAKU', 50000, 2, 'default.jpg', 'AKTIF'),
(29, 'MIE PASTA', 'PCS', 'BAHAN BAKU', 27500, 1, 'default.jpg', 'AKTIF'),
(30, 'SAUCE RAMEN', 'GL', 'BAHAN BAKU', 75000, 1, 'default.jpg', 'AKTIF'),
(31, 'SAUCE DIANE', 'GL', 'BAHAN BAKU', 30000, 2, 'default.jpg', 'AKTIF'),
(32, 'GARAM', 'PCS', 'BAHAN BAKU', 3000, 1, 'default.jpg', 'AKTIF'),
(33, 'SPAGHETTI', 'PCS', 'BAHAN BAKU', 15000, 1, 'default.jpg', 'AKTIF'),
(34, 'FETTUCCINE', 'PCS', 'BAHAN BAKU', 28000, 1, 'default.jpg', 'AKTIF'),
(35, 'MAYONNAISE ', 'PCS', 'BAHAN BAKU', 40000, 1, 'default.jpg', 'AKTIF'),
(36, 'YAKINIKU BEEF', 'PCS', 'BAHAN BAKU', 45000, 10, 'default.jpg', 'AKTIF'),
(37, 'JAMUR SHINTAKE', 'PCS', 'BAHAN BAKU', 95000, 1, 'default.jpg', 'AKTIF'),
(38, 'KEJU CHEDDAR', 'PCS', 'BAHAN BAKU', 25000, 2, 'default.jpg', 'AKTIF'),
(39, 'KEJU BUBUK', 'PCS', 'BAHAN BAKU', 39000, 2, 'default.jpg', 'AKTIF'),
(40, 'DAGING SIRLOIN ', 'GL', 'BAHAN BAKU', 68000, 1, 'default.jpg', 'AKTIF'),
(41, 'BAWANG PUTIH', 'KG', 'BAHAN BAKU', 20000, 1, 'default.jpg', 'AKTIF'),
(42, 'SALMON SASHIMI', 'PORSI', 'BAHAN JADI', 63000, 3, 'default.jpg', 'AKTIF'),
(43, 'SHASIMI SALAD', 'PORSI', 'BAHAN JADI', 65000, 3, 'shasimi_salad1.jpg', 'AKTIF'),
(44, 'SALMON CARPACIO', 'PORSI', 'BAHAN JADI', 65000, 3, 'default.jpg', 'AKTIF'),
(45, 'CHUKA WAKAME', 'PCS', 'BAHAN JADI', 10000, 3, 'chuka_wakame.jpg', 'AKTIF'),
(46, 'CRABSTICK MAYO', 'PCS', 'BAHAN JADI', 10000, 3, 'crabstick_mayo.jpg', 'AKTIF'),
(47, 'CHUKA KURAGE', 'PCS', 'BAHAN JADI', 10000, 3, 'chuka_kurage.jpg', 'AKTIF'),
(48, 'HACHI GUNKAN', 'PORSI', 'BAHAN JADI', 10000, 3, 'default.jpg', 'AKTIF'),
(49, 'ORANGE TOBIKO', 'PORSI', 'BAHAN JADI', 10000, 3, 'default.jpg', 'AKTIF'),
(50, 'BLACK TOBIKO', 'PCS', 'BAHAN JADI', 10000, 3, 'black_tobiko.jpg', 'AKTIF'),
(51, 'BABY OCTOPUS', 'PCS', 'BAHAN JADI', 10000, 3, 'nigiri_sushi_baby_octopus.jpg', 'AKTIF'),
(52, 'CALAMARI TEMPURA MAKI 6PCS', 'PORSI', 'BAHAN JADI', 41000, 3, 'default.jpg', 'AKTIF'),
(53, 'SPICY SALMON SKIN ROLL 6PCS', 'PORSI', 'BAHAN JADI', 41000, 3, 'Spicy_salmon_skin_roll.jpg', 'AKTIF'),
(54, 'KOREAN GIMBAP 6PCS', 'PORSI', 'BAHAN JADI', 47000, 3, 'Korean_Gimbab.jpg', 'AKTIF'),
(55, 'FUTOMAKI 6PCS', 'PORSI', 'BAHAN JADI', 42000, 3, 'Futomaki.jpg', 'AKTIF'),
(56, 'BAGELL ROLL 8PCS', 'PORSI', 'BAHAN JADI', 44000, 3, 'Bagel_Roll.jpg', 'AKTIF'),
(57, 'UNAKYU ROLL 8PCS', 'PORSI', 'BAHAN JADI', 45000, 3, 'Unakyu_Roll.jpg', 'AKTIF'),
(58, 'SUPER CALIFORNIA 8PCS', 'PORSI', 'BAHAN JADI', 39000, 3, 'Super_California.jpg', 'AKTIF'),
(59, 'ALASKAN CRUNCH ROLL 8PCS', 'PORSI', 'BAHAN JADI', 44000, 3, 'Alaskan_Crunch_Roll.jpg', 'AKTIF'),
(60, 'SHRIMP TEMPURA ROLL 8PCS', 'PORSI', 'BAHAN JADI', 43000, 3, 'Shrimp_Tempura_Roll.jpg', 'AKTIF'),
(61, 'FIRE FLOSS ROLL 8PCS', 'PORSI', 'BAHAN JADI', 52000, 3, 'Fire_Floss_Roll.jpg', 'AKTIF'),
(62, 'DRAGON ROLL 8PCS', 'PORSI', 'BAHAN JADI', 50000, 3, 'Dragon_Roll.jpg', 'AKTIF'),
(63, 'ROCK N ROLL 8PCS', 'PORSI', 'BAHAN JADI', 50000, 3, 'Rock_n_Roll.jpg', 'AKTIF'),
(64, 'VEGETABLE TEMPURA ROLL ', 'PORSI', 'BAHAN JADI', 33000, 2, 'default.jpg', 'AKTIF'),
(65, 'TUNA SANDWICH ROLL', 'PORSI', 'BAHAN JADI', 42000, 2, 'default.jpg', 'AKTIF'),
(66, 'SALMON DIP', 'PORSI', 'BAHAN JADI', 52000, 3, 'default.jpg', 'AKTIF'),
(67, 'DEVIL TUNA ROLL', 'PORSI', 'BAHAN JADI', 43000, 3, 'default.jpg', 'AKTIF'),
(68, 'PHILADELPHIA ROLL', 'PORSI', 'BAHAN JADI', 45000, 3, 'default.jpg', 'AKTIF'),
(69, 'DANCING EEL ROL 8PCS', 'PORSI', 'BAHAN JADI', 50000, 3, 'Dancing_Roll.JPG', 'AKTIF'),
(70, 'BEEF FLOSS ROLL 8PCS', 'PORSI', 'BAHAN JADI', 42000, 3, 'Beef_Floss_Roll.jpg', 'AKTIF'),
(71, 'BAKED SALMON ROLL 8PCS', 'PORSI', 'BAHAN JADI', 52000, 3, 'Baked_Salmon_Roll.jpg', 'AKTIF'),
(72, 'PEKING SALMON ROLL 8PCS', 'PORSI', 'BAHAN JADI', 51000, 3, 'Peking_Salmon_Roll.jpg', 'AKTIF'),
(73, 'CATERPILLAR ROLL 8PCS ', 'PORSI', 'BAHAN JADI', 47000, 3, 'Caterpillar_Roll.jpg', 'AKTIF'),
(74, 'EBIKO MAKI 8PCS', 'PORSI', 'BAHAN JADI', 45000, 3, 'Ebiko_Maki.jpg', 'AKTIF'),
(75, 'CRUNCHY ROLL 8PCS', 'PORSI', 'BAHAN JADI', 48000, 3, 'Crunchy_Roll.jpg', 'AKTIF'),
(76, 'FRIED CHICKEN MAKI 6PCS', 'PORSI', 'BAHAN JADI', 41000, 3, 'Fried_Chicken_Maki.JPG', 'AKTIF'),
(77, 'SUSHI PIZZA', 'PORSI', 'BAHAN JADI', 47000, 4, 'Sushi_Pizza.jpg', 'AKTIF'),
(78, 'HACHIBAN MAKI', 'PORSI', 'BAHAN JADI', 49000, 3, 'Hachiban_Maki.jpg', 'AKTIF'),
(79, 'CALIFORNIA CRUNCH ROLL', 'PORSI', 'BAHAN JADI', 40000, 3, 'default.jpg', 'AKTIF'),
(80, 'SUPER CRUNCH ROLL', 'PORSI', 'BAHAN JADI', 52000, 3, 'default.jpg', 'AKTIF'),
(81, 'SALMON TOWER MAKI', 'PORSI', 'BAHAN JADI', 52000, 3, 'default.jpg', 'AKTIF'),
(82, 'CLUB SALMON ROLL', 'PORSI', 'BAHAN JADI', 52000, 3, 'default.jpg', 'AKTIF'),
(83, 'HOT DIP ROLL', 'PORSI', 'BAHAN JADI', 46000, 3, 'Hot_Dip_Roll.jpg', 'AKTIF'),
(84, 'FANTASY ROLL', 'PORSI', 'BAHAN JADI', 52000, 3, 'default.jpg', 'AKTIF'),
(85, 'CRISPY CALAMARI ROLL', 'PORSI', 'BAHAN JADI', 41000, 3, 'default.jpg', 'AKTIF'),
(86, 'DRAGON ROLL', 'PORSI', 'BAHAN JADI', 50000, 3, 'default.jpg', 'AKTIF'),
(87, 'ORANGE ROLL', 'PORSI', 'BAHAN JADI', 43000, 3, 'default.jpg', 'AKTIF'),
(88, 'KAPPA MAKI', 'PORSI', 'BAHAN JADI', 19000, 4, 'default.jpg', 'AKTIF'),
(89, 'SALMON POWER MAKI', 'PORSI', 'BAHAN JADI', 50000, 3, 'Salmon_Power_Maki.jpg', 'AKTIF'),
(90, 'SPIDER ROLL 6PCS', 'PORSI', 'BAHAN JADI', 45000, 3, 'Spider_Roll.jpg', 'AKTIF'),
(91, 'SALMON ABURA MAKI 8PCS', 'PORSI', 'BAHAN JADI', 52000, 3, 'Salmon_Abura_Maki.jpg', 'AKTIF'),
(92, 'BLACK DRAGON ROLL 8PCS', 'PORSI', 'BAHAN JADI', 52000, 3, 'Black_Dragon_Roll.jpg', 'AKTIF'),
(93, 'TRIANGLE ROLL 8PCS', 'PORSI', 'BAHAN JADI', 46000, 3, 'Triangle_Roll.jpg', 'AKTIF'),
(94, 'SALMON TWISTER 8PCS', 'PORSI', 'BAHAN JADI', 52000, 3, 'Salmon_Twister.jpg', 'AKTIF'),
(95, 'FRESH ROLL 8PCS', 'PORSI', 'BAHAN JADI', 52000, 3, 'default.jpg', 'AKTIF'),
(96, 'SALMON VOLCANO 4PCS', 'PORSI', 'BAHAN JADI', 65000, 3, 'Salmon_Volcano.jpg', 'AKTIF'),
(97, 'DOUBLE DRAGON 8PCS', 'PORSI', 'BAHAN JADI', 72000, 3, 'Double_Dragon.jpg', 'AKTIF'),
(98, 'SALMON DYNAMITE 6PCS', 'PORSI', 'BAHAN JADI', 65000, 3, 'Salmon_Dynamite.jpg', 'AKTIF'),
(99, 'SEAFOOD BAR ', 'PORSI', 'BAHAN JADI', 47000, 4, 'Seafood_Bar.jpg', 'AKTIF'),
(100, 'ELECTRIC EEL BAR', 'PORSI', 'BAHAN JADI', 50000, 3, 'default.jpg', 'AKTIF'),
(101, 'SALMON CRUNCH BAR', 'PORSI', 'BAHAN JADI', 47000, 3, 'default.jpg', 'AKTIF'),
(102, 'BIG PLATE ENERGIZER', 'PORSI', 'BAHAN JADI', 143000, 4, 'default.jpg', 'AKTIF'),
(103, 'BIG PLATE POWER BOOSTER', 'PORSI', 'BAHAN JADI', 132000, 4, 'default.jpg', 'AKTIF'),
(104, 'BIG PLATE SALMONIZER', 'PORSI', 'BAHAN JADI', 105000, 4, 'default.jpg', 'AKTIF'),
(105, 'BIG PLATE MAKI SUSHI PLATE', 'PORSI', 'BAHAN JADI', 116000, 4, 'default.jpg', 'AKTIF'),
(106, 'BIG PLATE UNAGI LOVER', 'PORSI', 'BAHAN JADI', 127000, 4, 'default.jpg', 'AKTIF'),
(107, 'BIG PLATE SHASIMI GRANDE', 'PORSI', 'BAHAN JADI', 121000, 4, 'default.jpg', 'AKTIF'),
(108, 'BIG PLATE NIGIRI SUSHI', 'PORSI', 'BAHAN JADI', 105000, 4, 'default.jpg', 'AKTIF'),
(109, 'BIG PLATE CHIRASI DON', 'PORSI', 'BAHAN JADI', 83000, 4, 'default.jpg', 'AKTIF'),
(110, 'BIG PLATE UNAGI DON', 'PORSI', 'BAHAN JADI', 83000, 4, 'default.jpg', 'AKTIF'),
(111, 'TORI TORI', 'PORSI', 'BAHAN JADI', 37000, 5, 'Tori.jpg', 'AKTIF'),
(112, 'CHUKA WAKAME SALAD', 'PORSI', 'BAHAN JADI', 42000, 3, 'Chuka_Wakame_Salad.jpg', 'AKTIF'),
(113, 'SALMON CREAM PIE SOUP', 'PORSI', 'BAHAN JADI', 34000, 3, 'Salmon_Cream1.jpg', 'AKTIF'),
(114, 'MIXED GREEN SALAD', 'PORSI', 'BAHAN JADI', 36000, 3, 'default.jpg', 'AKTIF'),
(115, 'MISO SOUP', 'PORSI', 'BAHAN JADI', 17000, 5, 'default.jpg', 'AKTIF'),
(116, 'AGEDHASI TOFU', 'PORSI', 'BAHAN JADI', 31000, 6, 'default.jpg', 'AKTIF'),
(117, 'CALAMARI TEMPURA', 'PCS', 'BAHAN JADI', 36000, 4, 'default.jpg', 'AKTIF'),
(118, 'ONION RINGS', 'PORSI', 'BAHAN JADI', 29000, 7, 'default.jpg', 'AKTIF'),
(119, 'SALMON CRUNCH', 'PORSI', 'BAHAN JADI', 36000, 3, 'default.jpg', 'AKTIF'),
(120, 'EDAMAME', 'PORSI', 'BAHAN JADI', 17000, 8, 'Edamame.jpg', 'AKTIF'),
(121, 'CHICKEN TONKOTSU RAMEN', 'PORSI', 'BAHAN JADI', 53000, 5, 'Chicken_Tonkotsu.jpg', 'AKTIF'),
(122, 'SEAFOOD TEMPURA RAMEN', 'PORSI', 'BAHAN JADI', 61000, 5, 'Seafood_Tempura.jpg', 'AKTIF'),
(123, 'TAN TAN SPICY RAMEN', 'PORSI', 'BAHAN JADI', 53000, 5, 'Tan_Tan_Spicy.jpg', 'AKTIF'),
(124, 'MISO RAMEN', 'PORSI', 'BAHAN JADI', 53000, 5, 'default.jpg', 'AKTIF'),
(125, 'SHOYU RAMEN', 'PORSI', 'BAHAN JADI', 53000, 3, 'default.jpg', 'AKTIF'),
(126, 'SPICY CHEESE ABURA SOBA', 'PORSI', 'BAHAN JADI', 53000, 4, 'Spicy_Cheese_Abura.jpg', 'AKTIF'),
(127, 'ABURA SOBA', 'PORSI', 'BAHAN JADI', 53000, 6, 'Abura_Soba.jpg', 'AKTIF'),
(128, 'TAN TAN ABURA SOBA', 'PORSI', 'BAHAN JADI', 53000, 4, 'Tan_Tan_Abura.jpg', 'AKTIF'),
(129, 'GYUNIKU ABURA SOBA', 'PORSI', 'BAHAN JADI', 58000, 4, 'default.jpg', 'AKTIF'),
(130, 'CURRY ABURA SOBA', 'PORSI', 'BAHAN JADI', 58000, 4, 'default.jpg', 'AKTIF'),
(131, 'NOBEYAKI UDON', 'PORSI', 'BAHAN JADI', 54000, 8, 'Nobeyaki_Udon.jpg', 'AKTIF'),
(132, 'TAN TAN CHICKEN YAKIUDON', 'PORSI', 'BAHAN JADI', 53000, 8, 'Tan_Tan_Chicken.jpg', 'AKTIF'),
(133, 'BEEF YAKIUDON', 'PORSI', 'BAHAN JADI', 53000, 8, 'default.jpg', 'AKTIF'),
(134, 'KAKE TEMPURA UDON', 'PORSI', 'BAHAN JADI', 54000, 8, 'default.jpg', 'AKTIF'),
(135, 'CHASHU UDON', 'PORSI', 'BAHAN JADI', 57000, 8, 'default.jpg', 'AKTIF'),
(136, 'SPICY BULGOGI DON', 'PORSI', 'BAHAN JADI', 64000, 5, 'Spicy_Bulgogi_Don.jpg', 'AKTIF'),
(137, 'SALMON DON', 'PORSI', 'BAHAN JADI', 68000, 5, 'default.jpg', 'AKTIF'),
(138, 'OYAKO DON', 'PORSI', 'BAHAN JADI', 47000, 5, 'default.jpg', 'AKTIF'),
(139, 'SOBA GOHAN', 'PORSI', 'BAHAN JADI', 50000, 5, 'Soba_Gohan.jpg', 'AKTIF'),
(140, 'SALMON WAFU GOHAN', 'PORSI', 'BAHAN JADI', 68000, 5, 'Salmon_Gafu_Gohan.jpg', 'AKTIF'),
(141, 'MUSHROOM BLACK PEPPER DON', 'PORSI', 'BAHAN JADI', 64000, 5, 'Mushroom_Black_Pepper_Don.jpg', 'AKTIF'),
(142, 'TORI KURO KUSHO DON', 'PORSI', 'BAHAN JADI', 53000, 5, 'Tori_Kuro.jpg', 'AKTIF'),
(143, 'GYU CHIKARA EBI', 'PORSI', 'BAHAN JADI', 68000, 5, 'Gyu_Chikara_Ebi.jpg', 'AKTIF'),
(144, 'DORI KURO KUSHO DON', 'PORSI', 'BAHAN JADI', 53000, 5, 'Tori_Kuro1.jpg', 'AKTIF'),
(145, 'YAKITORI DON', 'PORSI', 'BAHAN JADI', 53000, 5, 'Yakitori_Don.jpg', 'AKTIF'),
(146, 'CHICKEN KATSU DON', 'PORSI', 'BAHAN JADI', 50000, 5, 'Chicken_Katsu_Don.jpg', 'AKTIF'),
(147, 'SEAFOOD KURO', 'PORSI', 'BAHAN JADI', 53000, 5, 'default.jpg', 'AKTIF'),
(148, 'GYU CHIKARA MESHI', 'PORSI', 'BAHAN JADI', 68000, 5, 'Gyu_Chikara_Meshi.jpg', 'AKTIF'),
(149, 'TORI KARA DON', 'PORSI', 'BAHAN JADI', 53000, 5, 'Tori_Kara_Don.jpg', 'AKTIF'),
(150, 'DORI CURRY', 'PORSI', 'BAHAN JADI', 52000, 5, 'Dorry_Curry.jpg', 'AKTIF'),
(151, 'HURRY CURRY', 'PORSI', 'BAHAN JADI', 52000, 5, 'Hurry_Curry.jpg', 'AKTIF'),
(152, 'CURRY DON', 'PORSI', 'BAHAN JADI', 52000, 5, 'default.jpg', 'AKTIF'),
(153, 'BEEF CURRY', 'PORSI', 'BAHAN JADI', 68000, 5, 'default.jpg', 'AKTIF'),
(154, 'DAUN KEMANGI', 'KG', 'BAHAN BAKU', 5000, 2, 'default.jpg', 'AKTIF'),
(155, 'TEPUNG TEMPURA', 'PCK', 'BAHAN BAKU', 28000, 3, 'default.jpg', 'AKTIF'),
(156, 'WORTEL ', 'KG', 'BAHAN BAKU', 20000, 10, 'default.jpg', 'AKTIF'),
(157, 'CUMI RING', 'PCK', 'BAHAN BAKU', 30000, 4, 'default.jpg', 'AKTIF'),
(158, 'KECAMBAH', 'KG', 'BAHAN BAKU', 20000, 10, 'default.jpg', 'AKTIF');

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
(15, 9, 3, 1),
(20, 118, 24, 1),
(21, 118, 155, 1),
(22, 118, 154, 1),
(23, 118, 3, 1),
(24, 8, 25, 200),
(25, 8, 23, 41),
(26, 8, 24, 100),
(27, 8, 41, 7),
(30, 8, 156, 125),
(31, 8, 28, 80),
(32, 8, 32, 2),
(33, 8, 3, 40),
(34, 8, 157, 50),
(35, 8, 158, 100),
(37, 0, 0, 0);

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
('KC1', 'Hachi-Hachi Bistro Citraland', 'Jl. dummy', 'Surabaya', '2019-08-20', '08193735289', 'GUDANG', 'AKTIF'),
('KC2', 'Hachi-Hachi Bistro Galaxy Mall', 'Jl. Galaxy Bumi Permai 2', 'Surabaya', '2020-01-02', '0316453938', 'OUTLET', 'AKTIF'),
('KC3', 'Hachi-Hachi Bistro TP DownTown', 'Jl. DD', 'Surabaya', '2020-01-02', '0316453938', 'OUTLET', 'AKTIF'),
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
(4, 'SP2', 6, 'AKTIF'),
(5, 'SP1', 59, 'AKTIF');

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
(14, 'HDIS2020001', 3, 'KG', 2),
(15, 'HDIS2020001', 32, 'PCS', 3),
(16, 'HDIS2020002', 28, 'GL', 3),
(17, 'HDIS2020002', 23, 'PCS', 2),
(18, 'HDIS2020002', 26, 'PCS', 3),
(19, 'HDIS2020002', 17, 'PCS', 3);

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
(6, '2020-12-03', 'yawan', 'C01', 0),
(7, '2020-12-07', 'heni', 'AT01', 0);

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
('HDIS2020001', '2020-08-19', 'KC5', 'AKTIF'),
('HDIS2020002', '2020-12-12', 'KC4', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `kartustok`
--

CREATE TABLE `kartustok` (
  `kodekartustok` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kodecabang` varchar(5) NOT NULL,
  `kodebahan` varchar(5) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `noref` varchar(20) NOT NULL,
  `stokawal` int(11) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `stokakhir` int(11) NOT NULL,
  `hargatrans` int(11) NOT NULL,
  `hargaavg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartustok`
--

INSERT INTO `kartustok` (`kodekartustok`, `tanggal`, `kodecabang`, `kodebahan`, `jenis`, `noref`, `stokawal`, `debet`, `kredit`, `stokakhir`, `hargatrans`, `hargaavg`) VALUES
(1, '2021-01-17', 'KC3', '3', 'Bahan Baku', '22', 3, 1, 1, 2, 2000, 2000),
(2, '2021-01-17', 'KC2', '4', 'Bahan Baku', '23', 2, 1, 1, 1, 4000, 4000);

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
('PCK', 'PACK'),
('PCS', 'PIECES'),
('PORSI', 'PORSI'),
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
(41, 'KC5', 0),
(42, 'KC1', 0),
(42, 'KC2', 0),
(42, 'KC3', 0),
(42, 'KC4', 0),
(42, 'KC5', 0),
(43, 'KC1', 0),
(43, 'KC2', 0),
(43, 'KC3', 0),
(43, 'KC4', 0),
(43, 'KC5', 0),
(44, 'KC1', 0),
(44, 'KC2', 0),
(44, 'KC3', 0),
(44, 'KC4', 0),
(44, 'KC5', 0),
(45, 'KC1', 0),
(45, 'KC2', 0),
(45, 'KC3', 0),
(45, 'KC4', 0),
(45, 'KC5', 0),
(46, 'KC1', 0),
(46, 'KC2', 0),
(46, 'KC3', 0),
(46, 'KC4', 0),
(46, 'KC5', 0),
(47, 'KC1', 0),
(47, 'KC2', 0),
(47, 'KC3', 0),
(47, 'KC4', 0),
(47, 'KC5', 0),
(48, 'KC1', 0),
(48, 'KC2', 0),
(48, 'KC3', 0),
(48, 'KC4', 0),
(48, 'KC5', 0),
(49, 'KC1', 0),
(49, 'KC2', 0),
(49, 'KC3', 0),
(49, 'KC4', 0),
(49, 'KC5', 0),
(50, 'KC1', 0),
(50, 'KC2', 0),
(50, 'KC3', 0),
(50, 'KC4', 0),
(50, 'KC5', 0),
(51, 'KC1', 0),
(51, 'KC2', 0),
(51, 'KC3', 0),
(51, 'KC4', 0),
(51, 'KC5', 0),
(52, 'KC1', 0),
(52, 'KC2', 0),
(52, 'KC3', 0),
(52, 'KC4', 0),
(52, 'KC5', 0),
(53, 'KC1', 0),
(53, 'KC2', 0),
(53, 'KC3', 0),
(53, 'KC4', 0),
(53, 'KC5', 0),
(54, 'KC1', 0),
(54, 'KC2', 0),
(54, 'KC3', 0),
(54, 'KC4', 0),
(54, 'KC5', 0),
(55, 'KC1', 0),
(55, 'KC2', 0),
(55, 'KC3', 0),
(55, 'KC4', 0),
(55, 'KC5', 0),
(56, 'KC1', 0),
(56, 'KC2', 0),
(56, 'KC3', 0),
(56, 'KC4', 0),
(56, 'KC5', 0),
(57, 'KC1', 0),
(57, 'KC2', 0),
(57, 'KC3', 0),
(57, 'KC4', 0),
(57, 'KC5', 0),
(58, 'KC1', 0),
(58, 'KC2', 0),
(58, 'KC3', 0),
(58, 'KC4', 0),
(58, 'KC5', 0),
(59, 'KC1', 0),
(59, 'KC2', 0),
(59, 'KC3', 0),
(59, 'KC4', 0),
(59, 'KC5', 0),
(60, 'KC1', 0),
(60, 'KC2', 0),
(60, 'KC3', 0),
(60, 'KC4', 0),
(60, 'KC5', 0),
(61, 'KC1', 0),
(61, 'KC2', 0),
(61, 'KC3', 0),
(61, 'KC4', 0),
(61, 'KC5', 0),
(62, 'KC1', 0),
(62, 'KC2', 0),
(62, 'KC3', 0),
(62, 'KC4', 0),
(62, 'KC5', 0),
(63, 'KC1', 0),
(63, 'KC2', 0),
(63, 'KC3', 0),
(63, 'KC4', 0),
(63, 'KC5', 0),
(64, 'KC1', 0),
(64, 'KC2', 0),
(64, 'KC3', 0),
(64, 'KC4', 0),
(64, 'KC5', 0),
(65, 'KC1', 0),
(65, 'KC2', 0),
(65, 'KC3', 0),
(65, 'KC4', 0),
(65, 'KC5', 0),
(66, 'KC1', 0),
(66, 'KC2', 0),
(66, 'KC3', 0),
(66, 'KC4', 0),
(66, 'KC5', 0),
(67, 'KC1', 0),
(67, 'KC2', 0),
(67, 'KC3', 0),
(67, 'KC4', 0),
(67, 'KC5', 0),
(68, 'KC1', 0),
(68, 'KC2', 0),
(68, 'KC3', 0),
(68, 'KC4', 0),
(68, 'KC5', 0),
(69, 'KC1', 0),
(69, 'KC2', 0),
(69, 'KC3', 0),
(69, 'KC4', 0),
(69, 'KC5', 0),
(70, 'KC1', 0),
(70, 'KC2', 0),
(70, 'KC3', 0),
(70, 'KC4', 0),
(70, 'KC5', 0),
(71, 'KC1', 0),
(71, 'KC2', 0),
(71, 'KC3', 0),
(71, 'KC4', 0),
(71, 'KC5', 0),
(72, 'KC1', 0),
(72, 'KC2', 0),
(72, 'KC3', 0),
(72, 'KC4', 0),
(72, 'KC5', 0),
(73, 'KC1', 0),
(73, 'KC2', 0),
(73, 'KC3', 0),
(73, 'KC4', 0),
(73, 'KC5', 0),
(74, 'KC1', 0),
(74, 'KC2', 0),
(74, 'KC3', 0),
(74, 'KC4', 0),
(74, 'KC5', 0),
(75, 'KC1', 0),
(75, 'KC2', 0),
(75, 'KC3', 0),
(75, 'KC4', 0),
(75, 'KC5', 0),
(76, 'KC1', 0),
(76, 'KC2', 0),
(76, 'KC3', 0),
(76, 'KC4', 0),
(76, 'KC5', 0),
(77, 'KC1', 0),
(77, 'KC2', 0),
(77, 'KC3', 0),
(77, 'KC4', 0),
(77, 'KC5', 0),
(78, 'KC1', 0),
(78, 'KC2', 0),
(78, 'KC3', 0),
(78, 'KC4', 0),
(78, 'KC5', 0),
(79, 'KC1', 0),
(79, 'KC2', 0),
(79, 'KC3', 0),
(79, 'KC4', 0),
(79, 'KC5', 0),
(80, 'KC1', 0),
(80, 'KC2', 0),
(80, 'KC3', 0),
(80, 'KC4', 0),
(80, 'KC5', 0),
(81, 'KC1', 0),
(81, 'KC2', 0),
(81, 'KC3', 0),
(81, 'KC4', 0),
(81, 'KC5', 0),
(82, 'KC1', 0),
(82, 'KC2', 0),
(82, 'KC3', 0),
(82, 'KC4', 0),
(82, 'KC5', 0),
(83, 'KC1', 0),
(83, 'KC2', 0),
(83, 'KC3', 0),
(83, 'KC4', 0),
(83, 'KC5', 0),
(84, 'KC1', 0),
(84, 'KC2', 0),
(84, 'KC3', 0),
(84, 'KC4', 0),
(84, 'KC5', 0),
(85, 'KC1', 0),
(85, 'KC2', 0),
(85, 'KC3', 0),
(85, 'KC4', 0),
(85, 'KC5', 0),
(86, 'KC1', 0),
(86, 'KC2', 0),
(86, 'KC3', 0),
(86, 'KC4', 0),
(86, 'KC5', 0),
(87, 'KC1', 0),
(87, 'KC2', 0),
(87, 'KC3', 0),
(87, 'KC4', 0),
(87, 'KC5', 0),
(88, 'KC1', 0),
(88, 'KC2', 0),
(88, 'KC3', 0),
(88, 'KC4', 0),
(88, 'KC5', 0),
(89, 'KC1', 0),
(89, 'KC2', 0),
(89, 'KC3', 0),
(89, 'KC4', 0),
(89, 'KC5', 0),
(90, 'KC1', 0),
(90, 'KC2', 0),
(90, 'KC3', 0),
(90, 'KC4', 0),
(90, 'KC5', 0),
(91, 'KC1', 0),
(91, 'KC2', 0),
(91, 'KC3', 0),
(91, 'KC4', 0),
(91, 'KC5', 0),
(92, 'KC1', 0),
(92, 'KC2', 0),
(92, 'KC3', 0),
(92, 'KC4', 0),
(92, 'KC5', 0),
(93, 'KC1', 0),
(93, 'KC2', 0),
(93, 'KC3', 0),
(93, 'KC4', 0),
(93, 'KC5', 0),
(94, 'KC1', 0),
(94, 'KC2', 0),
(94, 'KC3', 0),
(94, 'KC4', 0),
(94, 'KC5', 0),
(95, 'KC1', 0),
(95, 'KC2', 0),
(95, 'KC3', 0),
(95, 'KC4', 0),
(95, 'KC5', 0),
(96, 'KC1', 0),
(96, 'KC2', 0),
(96, 'KC3', 0),
(96, 'KC4', 0),
(96, 'KC5', 0),
(97, 'KC1', 0),
(97, 'KC2', 0),
(97, 'KC3', 0),
(97, 'KC4', 0),
(97, 'KC5', 0),
(98, 'KC1', 0),
(98, 'KC2', 0),
(98, 'KC3', 0),
(98, 'KC4', 0),
(98, 'KC5', 0),
(99, 'KC1', 0),
(99, 'KC2', 0),
(99, 'KC3', 0),
(99, 'KC4', 0),
(99, 'KC5', 0),
(100, 'KC1', 0),
(100, 'KC2', 0),
(100, 'KC3', 0),
(100, 'KC4', 0),
(100, 'KC5', 0),
(101, 'KC1', 0),
(101, 'KC2', 0),
(101, 'KC3', 0),
(101, 'KC4', 0),
(101, 'KC5', 0),
(102, 'KC1', 0),
(102, 'KC2', 0),
(102, 'KC3', 0),
(102, 'KC4', 0),
(102, 'KC5', 0),
(103, 'KC1', 0),
(103, 'KC2', 0),
(103, 'KC3', 0),
(103, 'KC4', 0),
(103, 'KC5', 0),
(104, 'KC1', 0),
(104, 'KC2', 0),
(104, 'KC3', 0),
(104, 'KC4', 0),
(104, 'KC5', 0),
(105, 'KC1', 0),
(105, 'KC2', 0),
(105, 'KC3', 0),
(105, 'KC4', 0),
(105, 'KC5', 0),
(106, 'KC1', 0),
(106, 'KC2', 0),
(106, 'KC3', 0),
(106, 'KC4', 0),
(106, 'KC5', 0),
(107, 'KC1', 0),
(107, 'KC2', 0),
(107, 'KC3', 0),
(107, 'KC4', 0),
(107, 'KC5', 0),
(108, 'KC1', 0),
(108, 'KC2', 0),
(108, 'KC3', 0),
(108, 'KC4', 0),
(108, 'KC5', 0),
(109, 'KC1', 0),
(109, 'KC2', 0),
(109, 'KC3', 0),
(109, 'KC4', 0),
(109, 'KC5', 0),
(110, 'KC1', 0),
(110, 'KC2', 0),
(110, 'KC3', 0),
(110, 'KC4', 0),
(110, 'KC5', 0),
(111, 'KC1', 0),
(111, 'KC2', 0),
(111, 'KC3', 0),
(111, 'KC4', 0),
(111, 'KC5', 0),
(112, 'KC1', 0),
(112, 'KC2', 0),
(112, 'KC3', 0),
(112, 'KC4', 0),
(112, 'KC5', 0),
(113, 'KC1', 0),
(113, 'KC2', 0),
(113, 'KC3', 0),
(113, 'KC4', 0),
(113, 'KC5', 0),
(114, 'KC1', 0),
(114, 'KC2', 0),
(114, 'KC3', 0),
(114, 'KC4', 0),
(114, 'KC5', 0),
(115, 'KC1', 0),
(115, 'KC2', 0),
(115, 'KC3', 0),
(115, 'KC4', 0),
(115, 'KC5', 0),
(116, 'KC1', 0),
(116, 'KC2', 0),
(116, 'KC3', 0),
(116, 'KC4', 0),
(116, 'KC5', 0),
(117, 'KC1', 0),
(117, 'KC2', 0),
(117, 'KC3', 0),
(117, 'KC4', 0),
(117, 'KC5', 0),
(118, 'KC1', 0),
(118, 'KC2', 0),
(118, 'KC3', 0),
(118, 'KC4', 0),
(118, 'KC5', 0),
(119, 'KC1', 0),
(119, 'KC2', 0),
(119, 'KC3', 0),
(119, 'KC4', 0),
(119, 'KC5', 0),
(120, 'KC1', 0),
(120, 'KC2', 0),
(120, 'KC3', 0),
(120, 'KC4', 0),
(120, 'KC5', 0),
(121, 'KC1', 0),
(121, 'KC2', 0),
(121, 'KC3', 0),
(121, 'KC4', 0),
(121, 'KC5', 0),
(122, 'KC1', 0),
(122, 'KC2', 0),
(122, 'KC3', 0),
(122, 'KC4', 0),
(122, 'KC5', 0),
(123, 'KC1', 0),
(123, 'KC2', 0),
(123, 'KC3', 0),
(123, 'KC4', 0),
(123, 'KC5', 0),
(124, 'KC1', 0),
(124, 'KC2', 0),
(124, 'KC3', 0),
(124, 'KC4', 0),
(124, 'KC5', 0),
(125, 'KC1', 0),
(125, 'KC2', 0),
(125, 'KC3', 0),
(125, 'KC4', 0),
(125, 'KC5', 0),
(126, 'KC1', 0),
(126, 'KC2', 0),
(126, 'KC3', 0),
(126, 'KC4', 0),
(126, 'KC5', 0),
(127, 'KC1', 0),
(127, 'KC2', 0),
(127, 'KC3', 0),
(127, 'KC4', 0),
(127, 'KC5', 0),
(128, 'KC1', 0),
(128, 'KC2', 0),
(128, 'KC3', 0),
(128, 'KC4', 0),
(128, 'KC5', 0),
(129, 'KC1', 0),
(129, 'KC2', 0),
(129, 'KC3', 0),
(129, 'KC4', 0),
(129, 'KC5', 0),
(130, 'KC1', 0),
(130, 'KC2', 0),
(130, 'KC3', 0),
(130, 'KC4', 0),
(130, 'KC5', 0),
(131, 'KC1', 0),
(131, 'KC2', 0),
(131, 'KC3', 0),
(131, 'KC4', 0),
(131, 'KC5', 0),
(132, 'KC1', 0),
(132, 'KC2', 0),
(132, 'KC3', 0),
(132, 'KC4', 0),
(132, 'KC5', 0),
(133, 'KC1', 0),
(133, 'KC2', 0),
(133, 'KC3', 0),
(133, 'KC4', 0),
(133, 'KC5', 0),
(134, 'KC1', 0),
(134, 'KC2', 0),
(134, 'KC3', 0),
(134, 'KC4', 0),
(134, 'KC5', 0),
(135, 'KC1', 0),
(135, 'KC2', 0),
(135, 'KC3', 0),
(135, 'KC4', 0),
(135, 'KC5', 0),
(136, 'KC1', 0),
(136, 'KC2', 0),
(136, 'KC3', 0),
(136, 'KC4', 0),
(136, 'KC5', 0),
(137, 'KC1', 0),
(137, 'KC2', 0),
(137, 'KC3', 0),
(137, 'KC4', 0),
(137, 'KC5', 0),
(138, 'KC1', 0),
(138, 'KC2', 0),
(138, 'KC3', 0),
(138, 'KC4', 0),
(138, 'KC5', 0),
(139, 'KC1', 0),
(139, 'KC2', 0),
(139, 'KC3', 0),
(139, 'KC4', 0),
(139, 'KC5', 0),
(140, 'KC1', 0),
(140, 'KC2', 0),
(140, 'KC3', 0),
(140, 'KC4', 0),
(140, 'KC5', 0),
(141, 'KC1', 0),
(141, 'KC2', 0),
(141, 'KC3', 0),
(141, 'KC4', 0),
(141, 'KC5', 0),
(142, 'KC1', 0),
(142, 'KC2', 0),
(142, 'KC3', 0),
(142, 'KC4', 0),
(142, 'KC5', 0),
(143, 'KC1', 0),
(143, 'KC2', 0),
(143, 'KC3', 0),
(143, 'KC4', 0),
(143, 'KC5', 0),
(144, 'KC1', 0),
(144, 'KC2', 0),
(144, 'KC3', 0),
(144, 'KC4', 0),
(144, 'KC5', 0),
(145, 'KC1', 0),
(145, 'KC2', 0),
(145, 'KC3', 0),
(145, 'KC4', 0),
(145, 'KC5', 0),
(146, 'KC1', 0),
(146, 'KC2', 0),
(146, 'KC3', 0),
(146, 'KC4', 0),
(146, 'KC5', 0),
(147, 'KC1', 0),
(147, 'KC2', 0),
(147, 'KC3', 0),
(147, 'KC4', 0),
(147, 'KC5', 0),
(148, 'KC1', 0),
(148, 'KC2', 0),
(148, 'KC3', 0),
(148, 'KC4', 0),
(148, 'KC5', 0),
(149, 'KC1', 0),
(149, 'KC2', 0),
(149, 'KC3', 0),
(149, 'KC4', 0),
(149, 'KC5', 0),
(150, 'KC1', 0),
(150, 'KC2', 0),
(150, 'KC3', 0),
(150, 'KC4', 0),
(150, 'KC5', 0),
(151, 'KC1', 0),
(151, 'KC2', 0),
(151, 'KC3', 0),
(151, 'KC4', 0),
(151, 'KC5', 0),
(152, 'KC1', 0),
(152, 'KC2', 0),
(152, 'KC3', 0),
(152, 'KC4', 0),
(152, 'KC5', 0),
(153, 'KC1', 0),
(153, 'KC2', 0),
(153, 'KC3', 0),
(153, 'KC4', 0),
(153, 'KC5', 0),
(154, 'KC1', 0),
(154, 'KC2', 0),
(154, 'KC3', 0),
(154, 'KC4', 0),
(154, 'KC5', 0),
(155, 'KC1', 0),
(155, 'KC2', 0),
(155, 'KC3', 0),
(155, 'KC4', 0),
(155, 'KC5', 0),
(156, 'KC1', 0),
(156, 'KC2', 0),
(156, 'KC3', 0),
(156, 'KC4', 0),
(156, 'KC5', 0),
(157, 'KC1', 0),
(157, 'KC2', 0),
(157, 'KC3', 0),
(157, 'KC4', 0),
(157, 'KC5', 0),
(158, 'KC1', 0),
(158, 'KC2', 0),
(158, 'KC3', 0),
(158, 'KC4', 0),
(158, 'KC5', 0);

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
-- Indexes for table `kartustok`
--
ALTER TABLE `kartustok`
  ADD PRIMARY KEY (`kodekartustok`);

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
  MODIFY `kodebahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
  MODIFY `kodebom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `kodedetailsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `notadetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hjual`
--
ALTER TABLE `hjual`
  MODIFY `nomernota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kartustok`
--
ALTER TABLE `kartustok`
  MODIFY `kodekartustok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
