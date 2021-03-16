-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 06:28 PM
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
-- Table structure for table `tickets_conversation`
--

CREATE TABLE `tickets_conversation` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets_conversation`
--

INSERT INTO `tickets_conversation` (`id`, `ticket_id`, `reciever_id`, `sender_id`, `message`, `datetime`, `status`) VALUES
(5, 5, 48, 6, 'eorld', '2021-03-16 16:54:33', 0),
(6, 5, 6, 48, 'reply', '2021-03-16 16:54:33', 0),
(7, 5, 6, 6, 'dsadasd', '2021-03-16 19:43:32', 0),
(8, 5, 6, 6, 'hello world', '2021-03-16 19:43:49', 0),
(9, 9, 6, 6, 'what are you saying', '2021-03-16 20:11:09', 0),
(10, 8, 6, 6, 'hellow orld', '2021-03-16 20:11:29', 0),
(11, 11, 6, 6, 'please check details', '2021-03-16 20:48:55', 0),
(12, 11, 6, 40, 'ok i wil', '2021-03-16 20:49:53', 0),
(13, 11, 6, 40, 'good job', '2021-03-16 20:50:50', 0),
(14, 11, 6, 6, 'thanks alot i will try more', '2021-03-16 20:51:33', 0),
(15, 11, 6, 40, 'ok thnks', '2021-03-16 20:56:31', 0),
(16, 11, 6, 40, 'yes', '2021-03-16 20:56:48', 0),
(17, 15, 40, 40, 'test', '2021-03-16 21:55:58', 0),
(18, 15, 40, 39, 'waht hapen', '2021-03-16 22:01:43', 0),
(19, 15, 40, 40, 'aww nothing', '2021-03-16 22:02:23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets_conversation`
--
ALTER TABLE `tickets_conversation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets_conversation`
--
ALTER TABLE `tickets_conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
