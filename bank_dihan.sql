-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2023 at 09:23 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_dihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'Dihan', 'admin@gmail.com', '$2y$10$vSuzsl6d7n9hb2wZngSgguPiEyVFNseEyLbAwEIdfOjPhvlbtSvqK');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`) VALUES
(1, 'emp1', 'emp1@gmail.com', '$2y$10$oOxEeUuinNHpFtDgeulHCuq4WN0SKiv/Dg.E9Joq2eX6Cgge7C.BW'),
(2, 'emp2', 'emp2@gmail.com', '$2y$10$mkmS..0Q9XyJreT8/RiABuXi0GKefgnjiic0EgyumQKmPMFq/iMO2'),
(3, 'emp3', 'emp3@gmail.com', '$2y$10$yMOptZRDtQAn8YZIr5EZ8OmiYPm3XtigMBwVPvQEJ1tSwA3wlzdhu');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int NOT NULL,
  `sender_email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `receiver_email` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` decimal(6,0) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `sender_email`, `receiver_email`, `amount`, `status`) VALUES
(1, 'brad@gmail.com', 'jhon@gmail.com', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `confirm_password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `account_id` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `current_amt` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `confirm_password`, `account_id`, `current_amt`) VALUES
(1, 'Jhon', 'jhon@gmail.com', '$2y$10$SPe84LztWSR2VsUSMJt2E.CJ0JJM.kKxSX6Kd8X7coGaFqYJ.ipPG', '$2y$10$cniYa6ScaLx0vwlPg1JAvOrehcOYNkbOAsDxITmSGzfrH2XzBQeiy', 'DHB121', '20'),
(2, 'Brad', 'brad@gmail.com', '$2y$10$l.2pFIuJyoNmP2Dp/maq6eoZzyYVJgODCoz9U/lBnggKLi3Z.Tbsu', '$2y$10$DqR7/Trp/EV/hqFI.gFYVecsMcXOHhKbi3GaDpvrEeQzqWrJB7gUC', 'DHB321', '90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
