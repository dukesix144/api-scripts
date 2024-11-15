-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2024 at 07:57 PM
-- Server version: 10.6.19-MariaDB-cll-lve
-- PHP Version: 8.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rrgaming_servers`
--

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `server_id` int(11) NOT NULL,
  `server_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(50) NOT NULL,
  `port` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `map` varchar(50) NOT NULL,
  `nextmap` varchar(50) NOT NULL,
  `teamone` varchar(50) NOT NULL,
  `teamtwo` varchar(50) NOT NULL,
  `gamemode` varchar(50) NOT NULL,
  `version` varchar(50) NOT NULL,
  `gametype` varchar(50) NOT NULL,
  `licensedserver` int(11) DEFAULT NULL,
  `publicqueue` int(11) DEFAULT NULL,
  `publicqueuelimit` int(11) DEFAULT NULL,
  `players` int(11) DEFAULT NULL,
  `maxplayers` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`server_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
