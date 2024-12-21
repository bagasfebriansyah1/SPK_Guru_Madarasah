-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2019 at 12:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `gapguru`
--

CREATE TABLE `gapguru` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` varchar(30) NOT NULL,
  `gappendidikan` int(5) NOT NULL,
  `gappengalaman` int(5) NOT NULL,
  `gappedagogik` int(5) NOT NULL,
  `gapwawancara` int(5) NOT NULL,
  `gapkedisiplinan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasilguru`
--

CREATE TABLE `hasilguru` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` varchar(30) NOT NULL,
  `bobotpendidikan` float NOT NULL,
  `bobotpengalaman` float NOT NULL,
  `bobotpedagogik` float NOT NULL,
  `bobotwawancara` float NOT NULL,
  `bobotkedisiplinan` float NOT NULL,
  `ncf` float NOT NULL,
  `nsf` float NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keteranganguru`
--

CREATE TABLE `keteranganguru` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` varchar(30) NOT NULL,
  `ket_pendidikan` varchar(20) NOT NULL,
  `ket_pengalaman` varchar(20) NOT NULL,
  `ket_pedagogik` varchar(20) NOT NULL,
  `ket_wawancara` varchar(20) NOT NULL,
  `ket_kedisiplinan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` varchar(30) NOT NULL,
  `pendidikan` int(5) NOT NULL,
  `pengalaman` int(5) NOT NULL,
  `pedagogik` int(5) NOT NULL,
  `wawancara` int(5) NOT NULL,
  `kedisiplinan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
