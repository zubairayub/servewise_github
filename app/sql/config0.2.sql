-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 04:45 PM
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
(14, 'aboutdiscribtion', '<p>About Discribtion </p>', 0),
(15, 'Copyrighttext', 'asd', 0),
(16, 'facebook', 'ffg', 0),
(17, 'twitter', 'hh', 0),
(18, 'instagram', 'qq', 0),
(19, 'Linkin', 'ww', 0),
(20, 'blogtitle', 'asdsad', 0),
(21, 'blogcode', '<p>asdsad</p>', 0),
(22, 'blogtype', 'knowledge base', 0),
(23, 'AboutDiscribtion', '<p>About Discribtion </p>', 0),
(24, 'our team Name', 'asdasd', 0),
(25, 'our team position', 'asd', 0),
(26, 'our team image', '', 0),
(27, 'our team company', 'asdsad', 0),
(28, 'about our vision', '<p><strong>About Our Vision</strong></p>', 0),
(29, 'Term of services', '<p>term of services</p>', 0),
(30, 'privacy policy', '<p>privacy policy</p>', 0),
(31, 'Help Question', 'help question', 0),
(32, 'Help Ans', '<p>help answer</p>', 0),
(33, 'guide title', 'guide title', 0),
(34, 'guide Short Description', 'guide short dis', 0),
(35, 'guide video', '', 0),
(36, 'video Title', 'video title', 0),
(37, 'video short dis', 'video short dis', 0),
(38, 'video videofile', '', 0),
(39, 'partner faq title', 'partner faq questions', 0),
(40, 'partner faq ans', '<p>partner faq ans</p>', 0),
(41, 'partner pkg name', 'partner package name', 0),
(42, 'partner pkg price', '20$', 0),
(43, 'partner pkg heading', 'partner pkg heading', 0),
(44, 'partner pkg dis', '<p>pakg dis</p>', 0),
(45, 'partner hero heading', 'partner hero heading', 0),
(46, 'partner hero disc', '<p>partner hero dis</p>', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
