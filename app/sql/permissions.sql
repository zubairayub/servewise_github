-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 01:17 PM
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL DEFAULT 0,
  `submenu_id` int(11) NOT NULL DEFAULT 0,
  `user_type_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `menu_id`, `submenu_id`, `user_type_id`) VALUES
(197, 1, 0, 2),
(198, 6, 0, 2),
(199, 6, 25, 2),
(467, 1, 0, 1),
(468, 3, 0, 1),
(469, 4, 0, 1),
(470, 6, 0, 1),
(471, 7, 0, 1),
(472, 8, 0, 1),
(473, 9, 0, 1),
(474, 10, 0, 1),
(475, 11, 0, 1),
(476, 12, 0, 1),
(477, 13, 0, 1),
(478, 3, 2, 1),
(479, 3, 6, 1),
(480, 3, 7, 1),
(481, 4, 8, 1),
(482, 4, 9, 1),
(483, 4, 10, 1),
(484, 4, 34, 1),
(485, 6, 25, 1),
(486, 7, 21, 1),
(487, 7, 22, 1),
(488, 7, 23, 1),
(489, 7, 24, 1),
(490, 8, 11, 1),
(491, 8, 12, 1),
(492, 8, 13, 1),
(493, 8, 14, 1),
(494, 8, 15, 1),
(495, 8, 16, 1),
(496, 9, 17, 1),
(497, 9, 18, 1),
(498, 10, 19, 1),
(499, 10, 20, 1),
(500, 11, 26, 1),
(501, 11, 27, 1),
(502, 11, 28, 1),
(503, 11, 29, 1),
(504, 12, 30, 1),
(505, 12, 31, 1),
(506, 12, 32, 1),
(507, 12, 33, 1),
(508, 12, 35, 1),
(509, 12, 36, 1),
(510, 12, 37, 1),
(511, 13, 39, 1),
(512, 13, 40, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
