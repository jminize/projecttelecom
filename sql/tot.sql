-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 04:27 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tot`
--

-- --------------------------------------------------------

--
-- Table structure for table `cable`
--

CREATE TABLE `cable` (
  `cable_id` varchar(64) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status_2` varchar(16) NOT NULL,
  `type_2` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cable`
--

INSERT INTO `cable` (`cable_id`, `capacity`, `status_2`, `type_2`) VALUES
('', 0, 'ระบุสถานะ', 'ระบุประเภท');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `eq_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_2` varchar(16) NOT NULL,
  `location` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `t_id_in` varchar(64) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `slot` tinyint(4) NOT NULL,
  `eq_id` varchar(64) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `status` varchar(16) NOT NULL,
  `memo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cable`
--
ALTER TABLE `cable`
  ADD PRIMARY KEY (`cable_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`t_id_in`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
