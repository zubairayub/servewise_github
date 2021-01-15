-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 10:13 AM
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
  `value` longtext NOT NULL,
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
(14, 'footer about dis', '<p>About Discribtion 123123</p>', 0),
(15, 'Copyrighttext', 'copyright text', 0),
(16, 'facebook', 'ffg1231', 0),
(17, 'twitter', 'hh', 0),
(18, 'instagram', 'qq', 0),
(19, 'Linkin', 'ww', 0),
(20, 'blogtitle', 'The ServeWise E-Commerce Blog', 0),
(21, 'blogcode', '<div class=\"section2-blog-content\">\r\n<div class=\"section2-blog-left-side\" data-aos=\"fade-right\">\r\n<div class=\"section2-blog-row\">\r\n<div class=\"section2-blog-row-content1\">\r\n<div class=\"section2-blog-img\"><img src=\"<?php echo $image;?>no-image.jpg\" alt=\"cover\" /></div>\r\n<div class=\"section2-blog-heading\">Getting Your E-commerce shop Ready</div>\r\n<div class=\"section2-blog-link\"><a href=\"#\">Click here</a></div>\r\n</div>\r\n<div class=\"section2-blog-row-content1\" data-aos=\"flip-left\">\r\n<div class=\"section2-blog-img\"><img src=\"<?php echo $image;?>no-image.jpg\" alt=\"cover\" /></div>\r\n<div class=\"section2-blog-heading\">Getting Your E-commerce shop Ready</div>\r\n<div class=\"section2-blog-link\"><a href=\"#\">Click Here</a></div>\r\n</div>\r\n</div>\r\n<div class=\"section2-blog-row\">\r\n<div class=\"section2-blog-row-content1\" data-aos=\"flip-left\">\r\n<div class=\"section2-blog-img\"><img src=\"<?php echo $image;?>no-image.jpg\" alt=\"cover\" /></div>\r\n<div class=\"section2-blog-heading\">Getting Your E-commerce shop Ready</div>\r\n<div class=\"section2-blog-link\"><a href=\"#\">Click here</a></div>\r\n</div>\r\n<div class=\"section2-blog-row-content1\" data-aos=\"flip-right\">\r\n<div class=\"section2-blog-img\"><img src=\"<?php echo $image;?>no-image.jpg\" alt=\"cover\" /></div>\r\n<div class=\"section2-blog-heading\">Getting Your E-commerce shop Ready</div>\r\n<div class=\"section2-blog-link\"><a href=\"#\">Click Here</a></div>\r\n</div>\r\n</div>\r\n<div class=\"section2-blog-row\">\r\n<div class=\"section2-blog-row-content1\" data-aos=\"flip-left\">\r\n<div class=\"section2-blog-img\"><img src=\"<?php echo $image;?>no-image.jpg\" alt=\"cover\" /></div>\r\n<div class=\"section2-blog-heading\">Getting Your E-commerce shop Ready</div>\r\n<div class=\"section2-blog-link\"><a href=\"#\">Click here</a></div>\r\n</div>\r\n<div class=\"section2-blog-row-content1\" data-aos=\"flip-right\">\r\n<div class=\"section2-blog-img\"><img src=\"<?php echo $image;?>no-image.jpg\" alt=\"cover\" /></div>\r\n<div class=\"section2-blog-heading\">Getting Your E-commerce shop Ready</div>\r\n<div class=\"section2-blog-link\"><a href=\"#\">Click Here</a></div>\r\n</div>\r\n</div>\r\n<div class=\"section2-blog-row\">\r\n<div class=\"section2-blog-row-content1\" data-aos=\"flip-left\">\r\n<div class=\"section2-blog-img\"><img src=\"<?php echo $image;?>no-image.jpg\" alt=\"cover\" /></div>\r\n<div class=\"section2-blog-heading\">Getting Your E-commerce shop Ready</div>\r\n<div class=\"section2-blog-link\"><a href=\"#\">Click here</a></div>\r\n</div>\r\n<div class=\"section2-blog-row-content1\" data-aos=\"flip-right\">\r\n<div class=\"section2-blog-img\"><img src=\"<?php echo $image;?>no-image.jpg\" alt=\"cover\" /></div>\r\n<div class=\"section2-blog-heading\">Getting Your E-commerce shop Ready</div>\r\n<div class=\"section2-blog-link\"><a href=\"#\">Click Here</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"section2-blog-right-side\" data-aos=\"fade-left\">\r\n<div class=\"section2-blog-side\">\r\n<div class=\"section-blog-right-side\"><strong>Blog Link</strong></div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<div class=\"blog-side-link-content\">\r\n<p>Start your E-Commerce <br /> <small>Click here</small></p>\r\n</div>\r\n<hr />\r\n<div class=\"blog-side-podcast\"><a href=\"#\">Click here to see the Podcast</a></div>\r\n<hr /></div>\r\n</div>\r\n</div>', 0),
(22, 'blogtype', 'Blog', 0),
(23, 'AboutDiscribtion', '<p>Have you thought that selling online was a little out of your reach? Think again. Opening an online store has never been easier. <strong>ServeWise</strong> is a leading choice for small business merchants to easily set up a store and start selling fast. No need to abandon your existing site — <strong>ServeWise</strong> can be added virtually anywhere you have an online presence. You have the freedom to operate multiple online stores including on your website, social media channels, and mobile devices. So stop reading and start selling from your new online store!</p>', 0),
(24, 'our team Name', 'Muzzamil Qureshi', 0),
(25, 'our team position', 'Graphics designer / web dev', 0),
(26, 'our team image', '', 0),
(27, 'our team company', 'Nazreen Consulting', 0),
(29, 'Term of services', '<div class=\"content-right-side\" data-aos=\"fade-up-right\">\r\n<p>Have you thought that selling online was a little out of your reach? Think again. Opening an online store has never been easier. <strong>ServeWise</strong> is a leading choice for small business merchants to easily set up a store and start selling fast. No need to abandon your existing site — <strong>ServeWise</strong> can be added virtually anywhere you have an online presence. You have the freedom to operate multiple online stores including on your website, social media channels, and mobile devices. So stop reading and start selling from your new online store!</p>\r\n</div>', 0),
(30, 'privacy policy', '<div class=\"content-right-side\" data-aos=\"fade-up-right\">\r\n<p>Have you thought that selling online was a little out of your reach? Think again. Opening an online store has never been easier. <strong>ServeWise</strong> is a leading choice for small business merchants to easily set up a store and start selling fast. No need to abandon your existing site — <strong>ServeWise</strong> can be added virtually anywhere you have an online presence. You have the freedom to operate multiple online stores including on your website, social media channels, and mobile devices. So stop reading and start selling from your new online store!</p>\r\n</div>', 0),
(31, 'Help Question', 'What else you may want to know!', 0),
(32, 'Help Ans', '<div class=\"section2-hc-faq\" data-aos=\"fade-up\" data-aos-duration=\"3000\"><button class=\"accordion\">Does ServeWise provide products to sell in my store?</button>\r\n<div class=\"panel\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n</div>\r\n<button class=\"accordion\">I\'m attempting to import products from my store on another platform to my ServeWise store, but I continue receiving an error message. <br /> What should I do?</button>\r\n<div class=\"panel\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n</div>\r\n<button class=\"accordion\">Can I connect the domain I already own to the ServeWise Instant Site?</button>\r\n<div class=\"panel\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n</div>\r\n<button class=\"accordion\">I\'ve set up Instagram shopping/product tagging for a while now, but I still can\'t tag my products on Instagram. What should I do?</button>\r\n<div class=\"panel\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n</div>\r\n<button class=\"accordion\">How do I get paid?</button>\r\n<div class=\"panel\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n</div>\r\n<button class=\"accordion\">Can the Ecwid store be integrated with a third-party service?</button>\r\n<div class=\"panel\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n</div>\r\n</div>', 0),
(33, 'guide title', 'Our E-Commerce guide', 0),
(34, 'guide Short Description', 'Get the knowledge you need to build a successful e-commerce store with Ecwid’s comprehensive user guides.', 0),
(35, 'guide video', '<div class=\"section2-Guide-content\">\r\n<div class=\"guide-row-card\">\r\n<div class=\"guide-card\" data-aos=\"flip-left\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n<div class=\"guide-card\" data-aos=\"flip-right\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n<div class=\"guide-card\" data-aos=\"flip-up\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n</div>\r\n<div class=\"guide-row-card\" data-aos=\"flip-right\">\r\n<div class=\"guide-card\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n<div class=\"guide-card\" data-aos=\"flip-up\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n<div class=\"guide-card\" data-aos=\"flip-down\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n</div>\r\n</div>', 0),
(36, 'video Title', 'Our Video Section.', 0),
(37, 'video short dis', 'Get the knowledge you need to build a successful e-commerce store with ServeWise Videos.', 0),
(38, 'video dis', '<div class=\"section2-Guide-content\">\r\n<div class=\"guide-row-card\">\r\n<div class=\"guide-card\" data-aos=\"flip-left\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n<div class=\"guide-card\" data-aos=\"flip-right\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n<div class=\"guide-card\" data-aos=\"flip-up\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n</div>\r\n<div class=\"guide-row-card\" data-aos=\"flip-right\">\r\n<div class=\"guide-card\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n<div class=\"guide-card\" data-aos=\"flip-up\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n<div class=\"guide-card\" data-aos=\"flip-down\">\r\n<div class=\"g-card-upper\">\r\n<p>Image Here</p>\r\n</div>\r\n<div class=\"g-card-btn\"><a href=\"#\">How to Do it..</a></div>\r\n<div class=\"g-card-content\">This Guide will Teach you how to do E-commerce.</div>\r\n</div>\r\n</div>\r\n</div>', 0),
(39, 'partner faq title', 'Frequently Asked Questions (FAQ)', 0),
(40, 'partner faq ans', '<h3>How does the partnership program work?</h3>\r\n<p>When you join our program, you\'ll get everything you need to start reselling <strong>ServeWise\'s</strong> e-commerce plans to your own clients. We\'ll create your personal partner dashboard where you can create store accounts for your clients and manage their plans. If you\'d like to resell <strong>ServeWise\'s</strong> under your own brand, our white label option lets you feature your own brand name and logos on the store account and login pages.</p>\r\n<h3>How do I become a partner?</h3>\r\n<ul>All you need to do is:\r\n<li>i) Enter your email on this page</li>\r\n<li>ii) Submit the membership fee for your first year using the personal payment link that we will send you by email.</li>\r\n<li>iii) Submit your branding information (company name and logos).</li>\r\n<li>iv) Once we have your payment and branding information, we will create your partner dashboard within 5 business days. Then you\'ll be ready to start selling e-commerce!</li>\r\n</ul>\r\n<h3>Can I choose which store features to enable/disable for my customers?</h3>\r\n<p>Yes, you can choose to hide certain sections of the store control panel from your customers and select which apps should be pre-installed or available for installation in all your stores. This Advanced Setup option is included in the Gold Tier membership and is available as a paid add-on on the Silver Tier.</p>', 0),
(41, 'partner pkg name', 'PLATINUM', 0),
(42, 'partner pkg price', '20', 0),
(43, 'partner pkg heading', 'The easiest way to get started selling e-commerce', 0),
(44, 'partner pkg dis', '<p class=\"card1-disc\">30% discount on subscription plans</p>\r\n<p class=\"card1-disc\">30% discount on subscription plans</p>', 0),
(45, 'partner hero heading', 'Have you thought about becoming an Partner reseller?', 0),
(46, 'partner hero disc', '<div class=\"p-dis\">\r\n<p style=\"color: black; font-size: 20px;\">Resell a leading ecommerce platform and grow your business with the Ecwid Partner Program. Sign up below to learn more about our partnership options and how to get started.</p>\r\n</div>', 0),
(56, 'theme_about_dis', '<p>abcdssfdasdas</p>', 6),
(57, 'theme_about_vision', '<p>about visionsdsfsdfdasdas</p>', 6),
(58, 'news_letter_subcriber', '2', 6),
(59, 'news_letter_subject', 'news letter subject', 6),
(60, 'news_letter_content', '<p>news letter content</p>', 6),
(61, 'Mobile_User', 'list 2', 6),
(62, 'Bluk_sms_sub', 'Sms subject', 6),
(63, 'Bluk_Sms_content', '<p>bluk sms content</p>', 6),
(64, 'Email', 'bunniqureshi007@gmail.com', 6),
(65, 'Email_title', 'Email title', 6),
(66, 'Email_msg', '<p>email msg</p>', 6),
(67, 'System_name', 'System general setting', 6),
(68, 'System_time', '2', 6),
(69, 'SMTP_type', '2', 6),
(70, 'SMTP_host', 'bunniqureshi007@gmail.com', 6),
(71, 'SMTP_port', '123', 6),
(72, 'page_background_image', 'username', 6),
(73, 'SMTP_password', '123412341234', 6),
(74, 'SMTP_encryption', 'bunniqureshi@gmail.com', 6),
(75, 'SMTP_form_address', '12312333', 6),
(76, 'SMTP_form_name', 'user', 6),
(77, 'Google_client_id', 'user google ', 6),
(78, 'Google_client_secret_key', '123123', 6),
(79, 'Facebook_app_id', 'user facebook ', 6),
(80, 'Facebook_app_secret_key', '123321', 6),
(81, 'Twitter_app_id', 'user twitter', 6),
(82, 'Twitter_client_secret_key', '321123', 6),
(83, 'news_letter_subcriber', '1', 22),
(84, 'news_letter_subject', '123', 22),
(85, 'news_letter_content', '<p>123</p>', 22),
(86, 'about our vision', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In sequi laudantium eligendi magnam similique explicabo dignissimos enim, minima sit iste. Magni asperiores molestias veritatis voluptate eos officiis hic necessitatibus esse?</p>', 0),
(87, 'footer about discribtion', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
