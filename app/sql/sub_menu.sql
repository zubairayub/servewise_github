-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 01:53 PM
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
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `sm_id` int(20) NOT NULL,
  `sm_title` varchar(255) NOT NULL,
  `sm_url` varchar(255) NOT NULL,
  `sm_icon` varchar(255) NOT NULL,
  `sm_status` int(2) NOT NULL,
  `menu_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`sm_id`, `sm_title`, `sm_url`, `sm_icon`, `sm_status`, `menu_id`) VALUES
(2, 'Orders', '#', 'angle-double-right', 1, 3),
(6, 'Abandoned Carts', '#', 'angle-double-right', 1, 3),
(7, 'Customers', 'customerlist_dashboard', 'angle-double-right', 1, 3),
(8, 'Products', 'addnewproduct_dashboard', 'angle-double-right', 1, 4),
(9, 'Categories', 'category_dashboard', 'angle-double-right', 1, 4),
(10, 'Brands', 'brand_dashboard', 'angle-double-right', 1, 4),
(11, 'Flash Deals', 'flashdeal_dashboard', 'angle-double-right', 1, 8),
(12, 'Newsletter', 'newsletter_dashboard', 'angle-double-right', 1, 8),
(13, 'Bulk SMS', 'bluksms_dashboard', 'angle-double-right', 1, 8),
(14, 'Subscribers', 'subscrib_dashboard', 'angle-double-right', 1, 8),
(15, 'coupons', 'coupons_dashboard', 'angle-double-right', 1, 8),
(16, 'Emails', 'email_dashboard', 'angle-double-right', 1, 8),
(17, 'Tickets', 'tickets_dashboard', 'angle-double-right', 1, 9),
(18, 'Chats', 'chat_dashboard', 'angle-double-right', 1, 9),
(19, 'Staff', 'allstaff_dashboard', 'angle-double-right', 1, 10),
(20, 'Roles', 'staffpermission_dashboard', 'angle-double-right', 1, 10),
(21, 'Advance Report', 'allreports_dashboard', 'angle-double-right', 1, 7),
(22, 'Inventory', 'productstock_dashboard', 'angle-double-right', 1, 7),
(23, 'Wishlist', 'productwish_dashboard', 'angle-double-right', 1, 7),
(24, 'Searches', 'usersearches_dashboard', 'angle-double-right', 1, 7),
(25, 'Request Branch', 'requestbranch_dashboard', 'angle-double-right', 1, 6),
(26, 'Header', 'header_dashboard', 'angle-double-right', 1, 11),
(27, 'Footer', 'footer_dashboard', 'angle-double-right', 1, 11),
(28, 'Themes', 'appearance_dashboard', 'angle-double-right', 1, 11),
(29, 'Knowledgebase', 'knowledgebase_dashboard', 'angle-double-right', 1, 11),
(30, 'General Setting', 'generalsetting_dashboard', 'angle-double-right', 1, 12),
(31, 'Features', 'featureactive_dashboard', 'angle-double-right', 1, 12),
(32, 'Languages', 'language_dashboard', 'angle-double-right', 1, 12),
(33, 'Currency', 'currency_dashboard', 'angle-double-right', 1, 12),
(34, 'Shipping & Pickup', 'pickuppoint_dashboard', 'angle-double-right', 1, 4),
(35, 'Payment Methods', 'paymentmethod_dashboard', 'angle-double-right', 1, 12),
(36, 'Email Setting', 'smtpsetting_dashboard', 'angle-double-right', 1, 12),
(37, 'Social links', 'socialmedia_dashboard', 'angle-double-right', 1, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`sm_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `sm_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
