-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2022 at 08:38 PM
-- Server version: 10.2.38-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plauduki_plaudits_sa_clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(12) NOT NULL,
  `admin_fullNames` varchar(250) NOT NULL,
  `admin_username` varchar(250) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `date_accessed` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullNames`, `admin_username`, `admin_password`, `date_accessed`, `is_active`) VALUES
(1, 'Philander Malatji', 'philander@plauditssa.co.za', 'phil-ntsako', '0000-00-00 00:00:00', 0),
(2, 'Thapelo J', 'thapelo@plauditssa.co.za', 'thapelo-jay', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `order_code` varchar(225) NOT NULL,
  `order_total_price` decimal(6,2) NOT NULL,
  `order_delivery_method` varchar(250) NOT NULL,
  `order_delivery_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `order_id` int(12) NOT NULL,
  `order_item_size` varchar(100) NOT NULL,
  `order_item_quantity` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(12) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_name_slug` varchar(250) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_type` varchar(250) NOT NULL,
  `product_category` varchar(250) NOT NULL,
  `product_description` text NOT NULL,
  `product_front_image` varchar(250) NOT NULL,
  `product_back_image` varchar(250) NOT NULL,
  `product_model_image` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `size_XS_quantity` int(10) NOT NULL,
  `size_S_quantity` int(10) NOT NULL,
  `size_M_quantity` int(10) NOT NULL,
  `size_L_quantity` int(10) NOT NULL,
  `size_XL_quantity` int(10) NOT NULL,
  `size_XXL_quantity` int(10) NOT NULL,
  `size_fit_all` int(10) NOT NULL,
  `stock_SKU` varchar(80) NOT NULL,
  `active_yn` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `user_firstName` varchar(250) NOT NULL,
  `user_lastName` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_company` varchar(250) NOT NULL,
  `address_street_name` varchar(250) NOT NULL,
  `address_towncity_name` varchar(250) NOT NULL,
  `address_province` varchar(250) NOT NULL,
  `address_zipcode` int(4) NOT NULL,
  `verification_code` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
