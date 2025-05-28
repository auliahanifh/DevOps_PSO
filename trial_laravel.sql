-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 06:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
CREATE DATABASE IF NOT EXISTS `trial_laravel` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

---GRANT ALL PRIVILEGES ON `trial_laravel`.* TO 'root'@'localhost' IDENTIFIED BY '' WITH GRANT OPTION;
---GRANT ALL PRIVILEGES ON `trial_laravel`.* TO ''@'localhost' WITH GRANT OPTION;
---GRANT ALL PRIVILEGES ON `trial_laravel`.* TO '*'@'%' IDENTIFIED BY '' WITH GRANT OPTION;

USE `trial_laravel`;
--
-- Table structure for table `keranjangbelanja`
--

CREATE TABLE IF NOT EXISTS `keranjangbelanja` (
  `ID` int(11) NOT NULL,
  `KodeBarang` varchar(3) NOT NULL,
  `Jumlah` int(20) NOT NULL,
  `Harga` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjangbelanja`
--

INSERT INTO `keranjangbelanja` (`ID`, `KodeBarang`, `Jumlah`, `Harga`) VALUES
(1, 'ZRH', 10, 7258420),
(2, 'CDG', 832, 6248544),
(3, 'ADD', 228, 7882694),
(4, 'YVR', 217, 3149161),
(5, 'ATL', 412, 10838875),
(6, 'CPH', 468, 379996),
(7, 'ZRH', 730, 6217965),
(8, 'CDG', 530, 14607762),
(9, 'ADD', 155, 17680847),
(10, 'CDG', 502, 3898087),
(11, 'MEX', 272, 19948190),
(12, 'SIN', 491, 8419228),
(13, 'CDG', 188, 844239),
(14, 'HND', 484, 7311231),
(15, 'CDG', 289, 14198904),
(16, 'CDG', 259, 1904251),
(18, 'DOH', 125, 7878706),
(19, 'DOH', 336, 8134406),
(20, 'BOM', 303, 8011427),
(21, 'YYZ', 419, 13384448),
(22, 'ICN', 447, 17698948),
(23, 'CDG', 839, 6858660),
(24, 'SFO', 150, 3127536),
(25, 'BOM', 847, 7281047),
(26, 'CPH', 208, 9320465),
(28, 'NBO', 503, 18377064),
(29, 'AMS', 551, 16285641),
(30, 'HND', 188, 7872149),
(31, 'EZE', 641, 6207587),
(32, 'CDG', 667, 16185138),
(33, 'EZE', 566, 340419),
(34, 'SIN', 371, 9803371),
(35, 'YYZ', 199, 18748393),
(36, 'CDG', 360, 5253669),
(37, 'ORD', 89, 19503534),
(38, 'CDG', 888, 2262211),
(39, 'EZE', 311, 5971641),
(40, 'CDG', 653, 17631783),
(41, 'CDG', 384, 9827698),
(42, 'EZE', 984, 4409245),
(43, 'FRA', 115, 12512732),
(44, 'CDG', 722, 1054633),
(45, 'BOG', 866, 8227419),
(46, 'CDG', 68, 2713541),
(47, 'ADD', 483, 2783436),
(48, 'VIE', 698, 3663030),
(49, 'SIN', 172, 12853194),
(50, 'DOH', 862, 18456197),
(51, 'CDG', 901, 16542976),
(52, 'SIN', 929, 19683867),
(53, 'SIN', 683, 1839144),
(54, 'VIE', 752, 16696641),
(55, 'SYD', 195, 14365890),
(56, 'JFK', 665, 5693750),
(57, 'PEK', 201, 17358551),
(58, 'LAX', 539, 14322356),
(59, 'SYD', 187, 2053103),
(60, 'ADD', 152, 19663154);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjangbelanja`
--
ALTER TABLE `keranjangbelanja`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjangbelanja`
--
ALTER TABLE `keranjangbelanja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
COMMIT;

CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Created` varchar(50) NOT NULL,
  `Updated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;