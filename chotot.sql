-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 05:01 AM
-- Server version: 5.7.12
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chotot`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `position_order` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0-deactive, 1-active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order_menu` int(11) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `order_menu`, `image`) VALUES
(1, 'Ô tô', 0, NULL, ''),
(2, 'Xe máy', 0, NULL, ''),
(3, 'Chăm sóc sức khoẻ, làm đẹp', 0, NULL, ''),
(4, 'Xe hơi', 1, NULL, ''),
(5, 'Xe tải', 1, NULL, ''),
(6, 'Kem trộn', 3, NULL, ''),
(7, 'Kem trộn fake', 3, NULL, ''),
(8, 'Phân khối lớn', 2, NULL, ''),
(9, 'Phân khối nhỏ', 2, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_province` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `id_province`) VALUES
(1, 'Cầu Giấy', 1),
(2, 'Thanh Xuân', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-mới, 1 - cũ',
  `id_city` int(11) NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-actived, 0 deactived',
  `id_category` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `description` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `post_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_sale` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 là bán, 0 là mua'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `price`, `content`, `status`, `id_city`, `address`, `activated`, `id_category`, `keyword`, `id_user`, `description`, `post_created`, `is_sale`) VALUES
(6, 'Ô tô cũ', 121212, '&lt;p&gt;&lt;strong&gt;12121212121212121&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2121iô2121u2o12&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;klsfjsdfsf&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;dsfhskjdfhsdkfjhsdfksjhfksf&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;sdfsfhsfkjshfksdjfhskfjhsfk&lt;/strong&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;sjdkfhskfjshfksjfhskjfhskfjshf&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;strong&gt;sjkdhfskdjfsdf&lt;/strong&gt;&lt;/p&gt;', 0, 1, 'Hà Nội', 1, '1|4', '12121212', 7, '12121212121232312', '2020-07-20 02:34:04', 1),
(7, 'Ô tô cũ', 121212, '&lt;p&gt;&lt;strong&gt;12121212121212121&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2121iô2121u2o12&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;klsfjsdfsf&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;dsfhskjdfhsdkfjhsdfksjhfksf&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;sdfsfhsfkjshfksdjfhskfjhsfk&lt;/strong&gt;&lt;/p&gt;&lt;h2&gt;&lt;strong&gt;sjdkfhskfjshfksjfhskjfhskfjshf&lt;/strong&gt;&lt;/h2&gt;&lt;p&gt;&lt;strong&gt;sjkdhfskdjfsdf&lt;/strong&gt;&lt;/p&gt;', 0, 1, 'Hà Nội', 1, '1|4', '12121212', 7, '12121212121232312', '2020-07-20 02:45:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_images`
--

CREATE TABLE `item_images` (
  `id` bigint(20) NOT NULL,
  `path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_item` int(11) NOT NULL,
  `is_thumbnail` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 ko phai anh dai dien - 1 la anh dai dien'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_images`
--

INSERT INTO `item_images` (`id`, `path`, `id_item`, `is_thumbnail`) VALUES
(1, './../uploads/items/202007/159460767502020-07-08 17.29.22.jpg', 0, 1),
(2, './../uploads/items/202007/15946076900photo_2020-07-08 17.23.03.jpeg', 5, 1),
(3, './../uploads/items/202007/15952124440download.jpeg', 6, 1),
(4, './../uploads/items/202007/159521244414424294170_675095649.400x400.jpg', 6, 1),
(5, './../uploads/items/202007/15952124442Why-ISO-standards-are-crucial-for-organic-and-natural-transparency-CFTAS-president_wrbm_large.jpg', 6, 1),
(6, './../uploads/items/202007/15952124443apps.58868.14403833510503142.72a67ef8-3805-4e1b-9ff0-41a3646fd28a.jpeg', 6, 1),
(7, './../uploads/items/202007/15952131140download.jpeg', 7, 1),
(8, './../uploads/items/202007/159521311414424294170_675095649.400x400.jpg', 7, 1),
(9, './../uploads/items/202007/15952131142Why-ISO-standards-are-crucial-for-organic-and-natural-transparency-CFTAS-president_wrbm_large.jpg', 7, 1),
(10, './../uploads/items/202007/15952131143apps.58868.14403833510503142.72a67ef8-3805-4e1b-9ff0-41a3646fd28a.jpeg', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `code`) VALUES
(1, 'Hà Nội', ''),
(2, 'Quảng Ninh', ''),
(3, 'Hải Phòng', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '3' COMMENT '0-admin;1-staff;2-bussiness;3 personal',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 - deactive, 1- active',
  `pwd` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `phone`, `address`, `level`, `status`, `pwd`) VALUES
(1, 'admin', ' idhjksdsad', 'luann4099@gmail.com', '0868120192', 'Quang Ninh1212', 3, 1, '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin1', 'Luan ', 'a@admin.com', '93829389', 'Ha Long - QN', 0, 1, 'e00cf25ad42683b3df678c61f42c6bda'),
(3, 'admwin@a.com', 'jkhkj', 'jskdhsjkd@s.com', '902382903', 'jkhsjkdhsdjk', 0, 0, '2a56bdaf5d7d8bde1569fcb6ca41cd5c'),
(7, 'lrandom', 'LuÃ¢n', 'luan@gmail.com', '3987438947', 'HN', 3, 1, '3ff84f4b354831cf586fadcf4c5716cf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_images`
--
ALTER TABLE `item_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item_images`
--
ALTER TABLE `item_images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
