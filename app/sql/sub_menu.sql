-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 02:57 PM
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
(2, 'Orders', 'order_dashboard', 'fa fa-list', 1, 3),
(6, 'Abandoned Carts', 'abandoncart_dashboard', 'fa fa-cart-plus', 1, 3),
(7, 'Customers', 'customerlist_dashboard', 'fa fa-users', 1, 3),
(8, 'Products', 'addnewproduct_dashboard', 'fa fa-product-hunt', 1, 4),
(9, 'Categories', 'category_dashboard', 'fa fa-list-ol', 1, 4),
(10, 'Brands', 'brand_dashboard', 'fa fa-eercast', 1, 4),
(11, 'Flash Deals', 'flashdeal_dashboard', 'fa fa-percent', 1, 8),
(12, 'Newsletter', 'newsletter_dashboard', 'fa fa-newspaper-o', 1, 8),
(13, 'Bulk SMS', 'bluksms_dashboard', 'fa fa-commenting-o', 1, 8),
(14, 'Subscribers', 'subscrib_dashboard', 'fa fa-bell', 1, 8),
(15, 'coupons', 'coupons_dashboard', 'fa fa-star', 1, 8),
(16, 'Emails', 'email_dashboard', 'fa fa-envelope', 1, 8),
(17, 'Tickets', 'tickets_dashboard', 'fa fa-ticket', 1, 9),
(18, 'Chats', 'chat_dashboard', 'fa fa-comments', 1, 9),
(19, 'Staff', 'allstaff_dashboard', 'fa fa-user-plus', 1, 10),
(20, 'Roles', 'staffpermission_dashboard', 'fa fa-user-secret', 1, 10),
(21, 'Advance Report', 'allreports_dashboard', 'fa fa-list', 1, 7),
(22, 'Inventory', 'productstock_dashboard', 'fa fa-archive', 1, 7),
(23, 'Wishlist', 'productwish_dashboard', 'fa fa-smile-o', 1, 7),
(24, 'Searches', 'usersearches_dashboard', 'fa fa-search-plus', 1, 7),
(25, 'Request Vendor', 'requestbranch_dashboard', 'fa fa-building-o', 1, 6),
(26, 'Header', 'header_dashboard', 'fa fa-header', 1, 11),
(27, 'Footer', 'footer_dashboard', 'fa fa-code', 1, 11),
(28, 'Themes', 'appearance_dashboard', 'fa fa-certificate', 1, 11),
(29, 'Knowledgebase', 'knowledgebase_dashboard', 'fa fa-pie-chart', 1, 11),
(30, 'General Setting', 'generalsetting_dashboard', 'fa fa-cog', 1, 12),
(31, 'Features', 'featureactive_dashboard', 'fa fa-linode', 1, 12),
(32, 'Languages', 'language_dashboard', 'fa fa-language', 1, 12),
(33, 'Currency', 'currency_dashboard', 'fa fa-money', 1, 12),
(34, 'Shipping & Pickup', 'pickuppoint_dashboard', 'fa fa-map-pin', 1, 4),
(35, 'Payment Methods', 'paymentmethod_dashboard', 'fa fa-credit-card-alt', 1, 12),
(36, 'Email Setting', 'smtpsetting_dashboard', 'fa fa-envelope-o', 1, 12),
(37, 'Social links', 'socialmedia_dashboard', 'fa fa-link', 1, 12),
(38, 'View Vendor', 'viewbranch_dashboard', 'fa fa-eye', 1, 6),
(39, 'View Brand', 'viewvendor_dashboard', 'fa fa-eye', 1, 13),
(40, 'Request Brand', 'signupvendor_dashboard', 'fa fa-handshake-o', 1, 13),
(42, 'About us', 'about_dashboard', 'fa fa-info-circle', 1, 14),
(43, 'Term of Service', 'termofserve_dashboard', 'fa fa-sticky-note', 1, 14),
(44, 'Privacy Policy', 'privacypolicy_dashboard', 'fa fa-user-secret', 1, 14),
(45, 'Help Center', 'helpcenter_dashboard', 'fa fa-question-circle', 1, 14),
(46, 'Guide', 'guide_dashboard', 'fa fa-compass', 1, 14),
(47, 'Video ', 'videopage_dashboard', 'fa fa-video-camera', 1, 14),
(48, 'Partners', 'partners_dashboard', 'fa fa-thumbs-up', 1, 14),
(49, 'Theme Product', 'themeproduct_dashboard', 'fa fa-product-hunt', 1, 15),
(50, 'Theme About', 'themeaboutus_dashboard', 'fa fa-question-circle', 1, 15),
(51, 'Theme Menu', 'ourmenu_dashboard', 'fa fa-list-alt', 1, 15),
(52, '(Resturant) About us', 'resaboutus_dashboard', 'fa fa-info-circle', 1, 15),
(53, '(Resturant) Customer Review', 'resclientreview_dashboard', 'fa fa-sticky-note', 1, 15),
(54, 'Theme Footer', 'themefooter_dashboard', 'fa fa-caret-down', 1, 15),
(55, 'View Product', 'viewproduct_dashboard', 'fa fa-eye', 1, 4),
(56, 'Activity Logs', 'activity_dashboard', 'fa fa-list', 1, 16);

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
  MODIFY `sm_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
