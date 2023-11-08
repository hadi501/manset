-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 05:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manset`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `task` enum('0','1','2','3') NOT NULL,
  `phone` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `name`, `task`, `phone`, `updated_at`, `created_at`) VALUES
(1, 'Abdul', '1', '089284750739', '2023-10-22', '2023-10-22'),
(2, 'Martina', '3', '085784650387', '2023-10-22', '2023-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `finishing`
--

CREATE TABLE `finishing` (
  `id` bigint(20) NOT NULL,
  `order_id` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL,
  `task` enum('0','1','2','3') NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finishing`
--

INSERT INTO `finishing` (`id`, `order_id`, `employe_id`, `task`, `amount`, `date`, `status`, `updated_at`, `created_at`) VALUES
(1, 15, 2, '3', 180, '2023-10-22', '0', '2023-10-22', '2023-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `customer` varchar(150) NOT NULL,
  `sock` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `deadline` date NOT NULL,
  `status` enum('0','1') NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `sock`, `color`, `size`, `amount`, `date`, `deadline`, `status`, `updated_at`, `created_at`) VALUES
(14, 'Fulan', 'Jempol Polos', 'Hitam', '30', 120, '2023-10-16', '2023-10-22', '0', '2023-10-15', '2023-10-15'),
(15, 'Fulanah', 'Mensock', 'Abu Tua', '30x25', 240, '2023-10-21', '2023-10-28', '0', '2023-10-22', '2023-10-21'),
(16, 'Fulan', 'Mensock', 'Abu Tua', '30x25', 240, '2023-10-21', '2023-10-28', '0', '2023-10-21', '2023-10-21'),
(17, 'Fulan', 'School', 'Putih', '29x25', 600, '2023-10-20', '2023-11-03', '0', '2023-10-21', '2023-10-21'),
(18, 'Azkia', 'Kaos Kaki Sambung', 'Abu Muda Tulisan Hitam', '45', 72, '2023-10-22', '2023-10-29', '0', '2023-10-23', '2023-10-23'),
(19, 'Azkia', 'Kaos Kaki Sambung', 'Ungu Tua Tulisan Putih', '45', 72, '2023-10-22', '2023-10-29', '0', '2023-10-23', '2023-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint(20) NOT NULL,
  `order_id` int(11) NOT NULL,
  `employe_id` bigint(20) NOT NULL,
  `shift` enum('0','1','2') NOT NULL,
  `machine_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `order_id`, `employe_id`, `shift`, `machine_no`, `amount`, `date`, `status`, `updated_at`, `created_at`) VALUES
(1, 14, 1, '0', 1, 60, '2023-10-22', '0', '2023-10-22', '2023-10-22'),
(2, 15, 1, '1', 1, 180, '2023-10-23', '0', '2023-10-22', '2023-10-22'),
(3, 18, 1, '0', 1, 72, '2023-10-23', '0', '2023-10-23', '2023-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `socks`
--

CREATE TABLE `socks` (
  `id` bigint(20) NOT NULL,
  `sock` varchar(50) NOT NULL,
  `dimension` enum('0','1') NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finishing`
--
ALTER TABLE `finishing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `socks`
--
ALTER TABLE `socks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finishing`
--
ALTER TABLE `finishing`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socks`
--
ALTER TABLE `socks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
