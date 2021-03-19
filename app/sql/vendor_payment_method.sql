-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 01:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servewise`
--

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payment_method`
--

CREATE TABLE `vendor_payment_method` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `pay_key` varchar(255) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_payment_method`
--

INSERT INTO `vendor_payment_method` (`id`, `branch_id`, `pay_key`, `secret`, `method`, `status`) VALUES
(10, 14, 'fluiterfgfd', 'w', 'Flutterwave', 0),
(11, 14, 'HELLO', 'swefsfsd', 'Pesapal', 1),
(12, 14, 'paytstrxk', 'sdfsdkfkjs', 'paystack', 0),
(13, 14, 'mepsakey', 'skrfsdklf', 'mpesa', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vendor_payment_method`
--
ALTER TABLE `vendor_payment_method`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vendor_payment_method`
--
ALTER TABLE `vendor_payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
