-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 09:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `value`, `userid`) VALUES
(6, 'logo', '4efef036246cb4e94cfa22a2dc7889b4.webp', 6),
(7, 'currency', '1', 0),
(8, 'language', '1', 0),
(9, 'logo', 'a1c6e259ca8bafef8430de2d6143bf7d.jpeg', 22),
(10, 'contact', 'efd', 0),
(11, 'email', 'jjjs', 0),
(12, 'address', 'abc', 0),
(13, 'footer_logo', '', 0),
(14, 'aboutdiscribtion', '', 0),
(15, 'Copyrighttext', 'asd', 0),
(16, 'facebook', 'ffg', 0),
(17, 'twitter', 'hh', 0),
(18, 'instagram', 'qq', 0),
(19, 'Linkin', 'ww', 0),
(20, 'blogtitle', 'asdas', 0),
(21, 'blogcode', '<p>asdsadasd</p>', 0),
(22, 'blogtype', 'Blog', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
