-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 03:17 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cipooja`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `br_id` int(11) NOT NULL,
  `br_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`br_id`, `br_name`) VALUES
(1, 'puma'),
(2, 'killer jeans'),
(3, 'adidas'),
(4, 'fasttrack');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ca_id` int(11) NOT NULL,
  `ca_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ca_id`, `ca_name`) VALUES
(1, 'mens wear'),
(2, 'womens wear'),
(3, 'kids wear'),
(4, 'accessories'),
(5, 'party wear'),
(6, 'western clothes');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `log_id` int(100) NOT NULL,
  `log_name` varchar(100) NOT NULL,
  `log_mobile` bigint(20) NOT NULL,
  `log_email` varchar(100) NOT NULL,
  `log_password` varchar(100) NOT NULL,
  `log_status` tinyint(4) NOT NULL,
  `log_otp` varchar(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `log_name`, `log_mobile`, `log_email`, `log_password`, `log_status`, `log_otp`) VALUES
(1, 'pooja', 9867219456, 'pooja@gmail.com', 'dfe00e25c5098720597d35d26051ff2eb6ef01a9', 1, ''),
(2, 'kajal', 9867219456, 'kajal@gmail.com', '1cd2f0fc9812119c1b7c2c10ca17044d9135b5bd', 0, ''),
(3, 'pillu', 9867219457, 'pillu@gmail.com', 'fdec26eca0b6d28ae60f3c549b1d3cd69c675e74', 0, ''),
(4, 'rina', 98672914567, 'rina@gmail.com', '427dd461730accb1229a0bf6dab586fe946b8c11', 1, ''),
(5, 'sona', 9867291456, 'sona@gmail.com', '0d9dd7a574e70a4f58c0a9de04adcb7a897f3f3d', 0, ''),
(6, 'rupa', 9867219567, 'rupa@gmail.com', 'd871eb3d04b82398056d6c97bf7af9968b1e3b34', 0, ''),
(8, 'pooja', 9867291456, 'poojajadhav@gmail.com', 'dfe00e25c5098720597d35d26051ff2eb6ef01a9', 0, ''),
(9, 'Raman', 9867219456, 'poojajadhav122@gmail.com', '1897b427a7f61df624bf8ff20657991f024835ac', 1, ''),
(10, 'deepa', 9867219457, 'deepa@gmail.com', 'fab4a62d3efa54ea09f10ac5dafd50023ae31811', 0, ''),
(11, 'puja', 9867219457, 'puja@gmail.com', '6387ad62f2f95cab53329aa7a8315c0a259f5794', 1, ''),
(12, 'puja', 9867219457, 'puja122@gmail.com', '4d41174a0eb7b1328d4384a5d16484d30e994c0f', 1, ''),
(13, 'shruti', 9867219457, 'shruti@gmail.com', 'e225a5351495536011ac3b1c182d58d02ea3f886', 1, ''),
(14, 'pooja', 9867219457, 'pillujadhav122@gmail.com', 'fdec26eca0b6d28ae60f3c549b1d3cd69c675e74', 1, ''),
(15, 'pooja', 9867219457, 'pooja122@gmail.com', '4d41174a0eb7b1328d4384a5d16484d30e994c0f', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_amount` decimal(10,0) NOT NULL,
  `p_discount` tinyint(4) NOT NULL,
  `p_caid` int(11) NOT NULL,
  `p_brid` int(11) NOT NULL,
  `p_desc` text NOT NULL,
  `p_imgpath` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_amount`, `p_discount`, `p_caid`, `p_brid`, `p_desc`, `p_imgpath`) VALUES
(4, 'womenswear', '12345', 12, 2, 1, 'womenswear', '10001538642524three.png'),
(5, 'menswear', '23000', 12, 1, 3, 'menswear', '10001538642653man-one.jpg'),
(6, 'wesawee', '12222', 11, 6, 4, 'eeee', '10001538643239man-four.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `uemail` varchar(200) NOT NULL,
  `upass` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uemail`, `upass`) VALUES
(4, 'sona1@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(6, 'kajal@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(10, 'shruti@gmail.com', 'e225a5351495536011ac3b1c182d58d02ea3f886'),
(12, 'rina@gmail.com', '70e21878d268fa8f82817f9278f8bae0fb108950'),
(13, 'sonali@gmail.com', 'dd0f9de2a6a85761d51ea2dad235df1eb8feec6d'),
(14, 'pooja@yahoo11.com', '1897b427a7f61df624bf8ff20657991f024835ac');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
