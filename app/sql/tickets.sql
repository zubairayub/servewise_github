-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 06:27 PM
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
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `priority` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `from_user`, `to_user`, `vendor_id`, `branch_id`, `datetime`, `priority`) VALUES
(5, 'hgello', 6, 48, NULL, NULL, '2021-03-16 16:54:33', 1),
(6, 'hgello', 6, 48, NULL, NULL, '2021-03-16 17:04:30', 1),
(7, 'asdsadas', 6, 1, NULL, NULL, '2021-03-16 19:16:04', 1),
(8, 'this is pepsi ticket', 6, 52, NULL, NULL, '2021-03-16 19:47:15', 1),
(9, 'this is pepsi ticket', 6, 32, NULL, NULL, '2021-03-16 19:48:24', 1),
(10, 'this is devesa tickets', 6, 40, NULL, NULL, '2021-03-16 20:12:29', 1),
(11, 'Devesa branch', 6, 40, NULL, 14, '2021-03-16 20:48:24', 1),
(12, 'this iskf', 40, 39, 41, NULL, '2021-03-16 21:51:11', NULL),
(13, 'this iskf', 40, 39, 41, NULL, '2021-03-16 21:51:57', NULL),
(14, 'this iskf', 40, 39, 41, NULL, '2021-03-16 21:52:46', 3),
(15, 'new ticket', 40, 39, 41, 14, '2021-03-16 21:55:30', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
