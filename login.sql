-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 30, 2021 at 09:41 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `Gestion_users`
--

CREATE TABLE `Gestion_users` (
  `id` int(11) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Gestion_users`
--

INSERT INTO `Gestion_users` (`id`, `password`) VALUES
(2021001, 'login2021001'),
(2021002, 'login2021002'),
(2021003, 'login2021003'),
(2021004, 'login2021004'),
(2021005, 'login2021005'),
(2021006, 'login2021006'),
(2021007, 'login2021007'),
(2021008, 'login2021008'),
(2021009, 'login2021009'),
(2021010, 'login2021010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Gestion_users`
--
ALTER TABLE `Gestion_users`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
