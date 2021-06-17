-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 08:09 PM
-- Server version: 8.0.23
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `uye`
--

CREATE TABLE `uye` (
  `uye_ad` varchar(30) NOT NULL,
  `uye_soyad` varchar(30) NOT NULL,
  `uye_mail` varchar(30) NOT NULL,
  `adres_id` int NOT NULL,
  `sifre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uye_tablosu`
--

CREATE TABLE `uye_tablosu` (
  `uye_id` int NOT NULL,
  `uye_ad` varchar(20) NOT NULL,
  `uye_soyad` varchar(20) NOT NULL,
  `uye_adres` varchar(20) NOT NULL,
  `uye_email` varchar(20) NOT NULL,
  `sifre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `uye_tablosu`
--

INSERT INTO `uye_tablosu` (`uye_id`, `uye_ad`, `uye_soyad`, `uye_adres`, `uye_email`, `sifre`) VALUES
(1, 'Müberra', 'Çatak', 'qweqwe', 'mail@mail', '123'),
(6, 'tuğçe', 'Çatak', 'asdfg', 'wqqweqwe@afaeeda', 'adsadasdsad'),
(7, 'rtuğçe', 'sadad', 'sdfsdfsdf', 'asdasd@asdfdsfds', 'e2342423'),
(8, 'rtuğçe', 'sadad', 'sdfsdfsdf', 'asdasd@asdfdsfds', '4324234234'),
(9, 'Müberra', 'Çatak', 'we', 'wqqweqwe@afaeeda', '3242342'),
(10, 'eqwe', 'qeqwe', 'qweqe', 'qweqe@afdasdf', 'qewqwe');

-- --------------------------------------------------------

--
-- Table structure for table `yemek`
--

CREATE TABLE `yemek` (
  `yemek_id` int NOT NULL,
  `yemek_ad` varchar(20) NOT NULL,
  `yemek_kategori` varchar(20) NOT NULL,
  `kullanici_email` varchar(30) NOT NULL,
  `kullanici_adres` varchar(30) NOT NULL,
  `kart_sifresi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `yemek`
--

INSERT INTO `yemek` (`yemek_id`, `yemek_ad`, `yemek_kategori`, `kullanici_email`, `kullanici_adres`, `kart_sifresi`) VALUES
(6, 'dfgfdgd', 'sdasd', 'dsfsdf@sdsdfsd', 'dsfsfsdfs', 121312);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uye_tablosu`
--
ALTER TABLE `uye_tablosu`
  ADD PRIMARY KEY (`uye_id`);

--
-- Indexes for table `yemek`
--
ALTER TABLE `yemek`
  ADD PRIMARY KEY (`yemek_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uye_tablosu`
--
ALTER TABLE `uye_tablosu`
  MODIFY `uye_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `yemek`
--
ALTER TABLE `yemek`
  MODIFY `yemek_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
