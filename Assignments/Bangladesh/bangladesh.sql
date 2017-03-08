-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 09:18 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP DATABASE IF EXISTS `bangladesh`;
CREATE DATABASE `bangladesh`;
USE `bangladesh`;

--
-- Database: `bangladesh`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `dist_id` int(11) NOT NULL,
  `div_id` int(11) NOT NULL,
  `District` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`dist_id`, `div_id`, `District`) VALUES
(1, 1, 'Dhaka'),
(2, 1, 'Narayanganj'),
(3, 2, 'Rajshahi'),
(4, 2, 'Natore'),
(5, 2, 'Chapainawabganj'),
(6, 3, 'Barisal'),
(7, 3, 'Barguna'),
(8, 4, 'Chittagong'),
(9, 4, 'Chandpur'),
(10, 5, 'Khulna'),
(11, 5, 'Jessore'),
(12, 6, 'Mymensingh'),
(13, 6, 'Jamalpur'),
(14, 7, 'Rangpur'),
(15, 7, 'Dinajpur'),
(16, 8, 'Sylhet'),
(17, 8, 'Habiganj');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `div_id` int(11) NOT NULL,
  `Division` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`div_id`, `Division`) VALUES
(1, 'Dhaka'),
(2, 'Rajshahi'),
(3, 'Barisal'),
(4, 'Chittagong'),
(5, 'Khulna'),
(6, 'Mymensingh'),
(7, 'Rangpur'),
(8, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `upazilla`
--

CREATE TABLE `upazilla` (
  `up_id` int(11) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `Upazilla` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upazilla`
--

INSERT INTO `upazilla` (`up_id`, `dist_id`, `Upazilla`) VALUES
(1, 1, 'Dhamrai Upazila'),
(2, 1, 'Dohar Upazila'),
(3, 1, 'Keraniganj Upazila'),
(4, 1, 'Nawabganj Upazila'),
(5, 1, 'Savar Upazila'),
(6, 2, 'Narayanganj Sadar Upazila'),
(7, 2, 'Rupganj Upazila'),
(8, 2, 'Araihazar Upazila'),
(9, 2, 'Sonargaon Upazila'),
(10, 2, 'Bandar Upazila'),
(11, 3, 'Tanore Upazila'),
(12, 3, 'Bagha Upazila'),
(13, 3, 'Bagmara Upazila'),
(14, 3, 'Charghat Upazila'),
(15, 3, 'Durgapur Upazila'),
(16, 3, 'Godagari Upazila'),
(17, 3, 'Mohanpur Upazila'),
(18, 4, 'Gurudaspur Upazila'),
(19, 4, 'Natore Sadar Upazila'),
(20, 4, 'Baraigram Upazila'),
(21, 4, 'Bagatipara Upazila'),
(22, 4, 'Lalpur Upazila'),
(23, 4, 'Singra Upazila'),
(24, 4, 'Naldanga Upazila'),
(25, 5, 'Bholahat Upazila'),
(26, 5, 'Gomastapur Upazila'),
(27, 5, 'Gomastapur Upazila'),
(28, 5, 'Nachole Upazila'),
(29, 5, 'Nawabganj Sadar Upazila'),
(34, 6, 'Agailjhara Upazila'),
(35, 6, 'Babuganj Upazila'),
(36, 6, 'Bakerganj Upazila'),
(37, 6, 'Banaripara Upazila'),
(38, 7, 'Amtali Upazila'),
(39, 7, 'Bamna Upazila'),
(40, 7, 'Barguna Sadar Upazila'),
(41, 7, 'Betagi Upazila'),
(42, 7, 'Patharghata Upazila'),
(43, 8, 'Anwara Upazila'),
(44, 8, 'Banshkhali Upazila'),
(45, 8, 'Chandanaish Upazila'),
(46, 8, 'Fatikchhari Upazila'),
(47, 8, 'Hathazari Upazila'),
(48, 9, 'Chandpur Sadar Upazila'),
(49, 9, 'Faridganj Upazila'),
(50, 9, 'Haimchar Upazila'),
(51, 9, 'Haziganj Upazila'),
(52, 9, 'Kachua Upazila'),
(53, 10, 'Terokhada Upazila'),
(54, 10, 'Batiaghata Upazila'),
(55, 10, 'Dacope Upazila'),
(56, 10, 'Dumuria Upazila'),
(57, 10, 'Dighalia Upazila'),
(58, 11, 'Abhaynagar Upazila'),
(59, 11, 'Bagherpara Upazila'),
(60, 11, 'Chaugachha Upazila'),
(61, 11, 'Jhikargachha Upazila'),
(62, 11, 'Koyra Upazila'),
(63, 12, 'Bhaluka'),
(64, 12, 'Trishal'),
(65, 12, 'Haluaghat'),
(66, 12, 'Muktagachha'),
(67, 12, 'Dhobaura'),
(68, 13, 'Dewanganj Upazila'),
(69, 13, 'Baksiganj Upazila'),
(70, 13, 'Islampur Upazila'),
(71, 13, 'Jamalpur Sadar Upazila'),
(72, 13, 'Madarganj Upazila'),
(73, 14, 'Badarganj'),
(74, 14, 'Mithapukur'),
(75, 14, 'Gangachara'),
(76, 14, 'Kaunia'),
(77, 14, 'Rangpur Sadar'),
(78, 15, 'Biral Upazila'),
(79, 15, 'Birampur Upazila'),
(80, 15, 'Birganj Upazila'),
(81, 15, 'Bochaganj Upazila'),
(82, 15, 'Chirirbandar Upazila'),
(83, 16, 'Balaganj'),
(84, 16, 'Beanibazar'),
(85, 16, 'Bishwanath'),
(86, 16, 'Companiganj'),
(87, 16, 'Fenchuganj'),
(88, 17, 'Ajmiriganj'),
(89, 17, 'Baniachang'),
(90, 17, 'Bahubal'),
(91, 17, 'Chunarughat'),
(92, 17, 'Habiganj Sadar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`div_id`);

--
-- Indexes for table `upazilla`
--
ALTER TABLE `upazilla`
  ADD PRIMARY KEY (`up_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `div_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `upazilla`
--
ALTER TABLE `upazilla`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
