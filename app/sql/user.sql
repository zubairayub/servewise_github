-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 06:21 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address_2` varchar(100) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `security_code` int(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1- admin\r\n2- user\r\n3- vendor\r\n4- branch\r\n\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `contact_no`, `email_id`, `password`, `address`, `address_2`, `country`, `city`, `state`, `zip`, `created_date`, `security_code`, `status`, `type`) VALUES
(1, '', '', '', 'zakajutt32@gmail.com', '123', '', '', '', '', '', '', '2021-01-01 13:17:29', 7153, 'block', 2),
(6, 'zohaib', 'ali', '03464394910', 'zohaibali.sid@gmail.com', '123', 'ambala bakers', 'pechs', 'pakistan', 'karachi', 'sindh', '74000', '2021-01-01 13:17:25', 9869, 'active', 1),
(7, '', '', '', 'zaibi@gmail.com', '123', '', '', '', '', '', '', '2021-01-01 13:17:32', 6841, 'block', 2),
(8, '', '', '', 'you@gmail.com', '123', '', '', '', '', '', '', '2021-01-01 13:17:35', 7969, 'block', 2),
(9, '', '', '', 'aa@gmail.com', '123', '', '', '', '', '', '', '2021-01-01 13:17:39', 2514, 'block', 2),
(10, '', '', '', 'hi@gmail.com', '123', '', '', '', '', '', '', '2020-12-29 19:00:00', 5852, 'block', 0),
(11, '', '', '', 'b@gmail.com', '123', '', '', '', '', '', '', '2020-12-29 19:00:00', 5486, 'block', 0),
(12, '', '', '', 'm@gmail.com', '123', '', '', '', '', '', '', '2020-12-29 19:00:00', 1569, 'block', 0),
(13, '', '', '', 'r@gmail.com', '123', '', '', '', '', '', '', '2020-12-30 11:27:59', 8819, 'active', 0),
(14, '', '', '', 't@gmail.com', '123', '', '', '', '', '', '', '2020-12-30 11:29:31', 4264, 'active', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `contact_no` (`contact_no`,`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
