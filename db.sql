-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 12:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahmad_alidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amount`
--

CREATE TABLE `tbl_amount` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `basic_amount` int(10) NOT NULL,
  `total_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_amount`
--

INSERT INTO `tbl_amount` (`id`, `user_id`, `basic_amount`, `total_amount`) VALUES
(1, 2, 100, 95),
(2, 3, 100, 90),
(3, 4, 100, 86),
(5, 5, 100, 86);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_commission`
--

CREATE TABLE `tbl_commission` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `ref_id` int(10) NOT NULL,
  `commission` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_commission`
--

INSERT INTO `tbl_commission` (`id`, `user_id`, `ref_id`, `commission`) VALUES
(7, 1, 2, '5'),
(8, 2, 3, '5'),
(9, 1, 3, '4.75'),
(10, 3, 4, '5'),
(11, 2, 4, '4.75'),
(12, 1, 4, '4.5125'),
(13, 3, 5, '5'),
(14, 2, 5, '4.75'),
(15, 1, 5, '4.5125');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ref_user_id` int(10) NOT NULL,
  `parent_user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `username`, `ref_user_id`, `parent_user_id`) VALUES
(1, 'ahmad', 'ahmad01', 0, 0),
(2, 'ali', 'ali01', 1, 0),
(3, 'ahmad ali', 'ahmadali', 2, 1),
(4, 'jamal', 'jamal1', 3, 1),
(5, 'jalal', 'jalal2', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_amount`
--
ALTER TABLE `tbl_amount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_commission`
--
ALTER TABLE `tbl_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_amount`
--
ALTER TABLE `tbl_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_commission`
--
ALTER TABLE `tbl_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_amount`
--
ALTER TABLE `tbl_amount`
  ADD CONSTRAINT `tbl_amount_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
