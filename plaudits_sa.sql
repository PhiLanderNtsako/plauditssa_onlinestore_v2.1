-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 07:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plaudits_sa`
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

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_name_slug`, `product_price`, `product_type`, `product_category`, `product_description`, `product_front_image`, `product_back_image`, `product_model_image`, `created_at`) VALUES
(1, 'Gray Base Hoodie', 'gray-base-hoodie', '400.00', 'hoodies', 'clothing', '&#8226; Plaudits logo printed on the chest and pocket in white<br>\n&#8226; 240gsm CVC 60% Cotton 40% Polyester<br>\n&#8226; Brushed Fleece<br>\n&#8226; Unisex<br>\n&#8226; Ribbed Waist & Cuffs<br>\n&#8226; Kangaroo Pocket<br>\n&#8226; Shoelace Drawstring<br>\n&#8226; Buttonhole Eyelets', 'hoodies - gray-base-hoodie_front.jpg', 'hoodies - gray-base-hoodie_back.jpg', 'hoodies - gray-base-hoodie_model.jpg', '2022-06-26 09:26:45'),
(2, 'White Base Hoodie', 'white-base-hoodie', '400.00', 'hoodies', 'clothing', '&#8226; Plaudits logo printed on the chest and pocket in white<br>\r\n&#8226; 240gsm CVC 60% Cotton 40% Polyester<br>\r\n&#8226; Brushed Fleece<br>\r\n&#8226; Unisex<br>\r\n&#8226; Ribbed Waist & Cuffs<br>\r\n&#8226; Kangaroo Pocket<br>\r\n&#8226; Shoelace Drawstring<br>\r\n&#8226; Buttonhole Eyelets', 'hoodies - white-base-hoodie_front.jpg', 'hoodies - white-base-hoodie_back.jpg', 'hoodies - white-base-hoodie_model.jpg', '2022-06-26 09:32:20'),
(3, 'Green Base Hoodie', 'green-base-hoodie', '400.00', 'hoodies', 'clothing', '&#8226; Plaudits logo printed on the chest and pocket in white<br>\r\n&#8226; 240gsm CVC 60% Cotton 40% Polyester<br>\r\n&#8226; Brushed Fleece<br>\r\n&#8226; Unisex<br>\r\n&#8226; Ribbed Waist & Cuffs<br>\r\n&#8226; Kangaroo Pocket<br>\r\n&#8226; Shoelace Drawstring<br>\r\n&#8226; Buttonhole Eyelets', 'hoodies - green-base-hoodie_front.jpg', 'hoodies - green-base-hoodie_back.jpg', 'hoodies - green-base-hoodie_model.jpg', '2022-06-26 09:33:47'),
(4, 'Yellow Base Hoodie', 'yellow-base-hoodie', '400.00', 'hoodies', 'clothing', '&#8226; Plaudits logo printed on the chest and pocket in white<br>\r\n&#8226; 240gsm CVC 60% Cotton 40% Polyester<br>\r\n&#8226; Brushed Fleece<br>\r\n&#8226; Unisex<br>\r\n&#8226; Ribbed Waist & Cuffs<br>\r\n&#8226; Kangaroo Pocket<br>\r\n&#8226; Shoelace Drawstring<br>\r\n&#8226; Buttonhole Eyelets', 'hoodies - yellow-base-hoodie_front.jpg', 'hoodies - yellow-base-hoodie_back.jpg', 'hoodies - yellow-base-hoodie_model.jpg', '2022-06-26 09:35:22'),
(5, 'Maroon Base Hoodie', 'maroon-base-hoodie', '400.00', 'hoodies', 'clothing', '&#8226; Plaudits logo printed on the chest and pocket in white<br>\r\n&#8226; 240gsm CVC 60% Cotton 40% Polyester<br>\r\n&#8226; Brushed Fleece<br>\r\n&#8226; Unisex<br>\r\n&#8226; Ribbed Waist & Cuffs<br>\r\n&#8226; Kangaroo Pocket<br>\r\n&#8226; Shoelace Drawstring<br>\r\n&#8226; Buttonhole Eyelets', 'hoodies - maroon-base-hoodie_front.jpg', 'hoodies - maroon-base-hoodie_back.jpg', 'hoodies - maroon-base-hoodie_model.jpg', '2022-06-26 09:36:31'),
(6, 'Orange Base Hoodie', 'orange-base-hoodie', '400.00', 'hoodies', 'clothing', '&#8226; Plaudits logo printed on the chest and pocket in white<br>\r\n&#8226; 240gsm CVC 60% Cotton 40% Polyester<br>\r\n&#8226; Brushed Fleece<br>\r\n&#8226; Unisex<br>\r\n&#8226; Ribbed Waist & Cuffs<br>\r\n&#8226; Kangaroo Pocket<br>\r\n&#8226; Shoelace Drawstring<br>\r\n&#8226; Buttonhole Eyelets', 'hoodies - orange-base-hoodie_front.jpg', 'hoodies - orange-base-hoodie_back.jpg', 'hoodies - orange-base-hoodie_model.jpg', '2022-06-26 09:37:40'),
(7, 'Blue Base Hoodie', 'blue-base-hoodie', '400.00', 'hoodies', 'clothing', '&#8226; Plaudits logo printed on the chest and pocket in white<br>\r\n&#8226; 240gsm CVC 60% Cotton 40% Polyester<br>\r\n&#8226; Brushed Fleece<br>\r\n&#8226; Unisex<br>\r\n&#8226; Ribbed Waist & Cuffs<br>\r\n&#8226; Kangaroo Pocket<br>\r\n&#8226; Shoelace Drawstring<br>\r\n&#8226; Buttonhole Eyelets', 'hoodies - blue-base-hoodie_front.jpg', 'hoodies - blue-base-hoodie_back.jpg', 'hoodies - blue-base-hoodie_model.jpg', '2022-06-26 09:38:38'),
(8, 'Spongebob Black Tee', 'spongebob-black-tee', '250.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - spongebob-black-tee_front.jpg', 't-shirts - spongebob-black-tee_back.jpg', 't-shirts - spongebob-black-tee_model.jpg', '2022-06-26 09:44:20'),
(9, 'Zip Toon Black Tee', 'zip-toon-black-tee', '250.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - zip-toon-black-tee_front.jpg', 't-shirts - zip-toon-black-tee_back.jpg', 't-shirts - zip-toon-black-tee_model.jpg', '2022-06-26 09:45:35'),
(10, 'Zip Toon White Tee', 'zip-toon-white-tee', '250.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - zip-toon-white-tee_front.jpg', 't-shirts - zip-toon-white-tee_back.jpg', 't-shirts - zip-toon-white-tee_model.jpg', '2022-06-26 09:46:23'),
(11, 'Plaudits SA Gray Tee', 'plaudits-sa-gray-tee', '200.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - plaudits-sa-gray-tee_front.jpg', 't-shirts - plaudits-sa-gray-tee_back.jpg', 't-shirts - plaudits-sa-gray-tee_model.jpg', '2022-06-26 09:48:33'),
(12, 'Plaudits SA White Tee', 'plaudits-sa-white-tee', '200.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - plaudits-sa-white-tee_front.jpg', 't-shirts - plaudits-sa-white-tee_back.jpg', 't-shirts - plaudits-sa-white-tee_model.jpg', '2022-06-26 09:49:34'),
(13, 'Patrick White Tee', 'patrick-white-tee', '250.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - patrick-white-tee_front.jpg', 't-shirts - patrick-white-tee_back.jpg', 't-shirts - patrick-white-tee_model.jpg', '2022-06-26 09:51:17'),
(14, 'Eye Monster Black Tee', 'eye-monster-black-tee', '250.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - eye-monster-black-tee_front.jpg', 't-shirts - eye-monster-black-tee_back.jpg', 't-shirts - eye-monster-black-tee_model.jpg', '2022-06-26 09:53:11'),
(15, 'Plaudits Pride White Tee', 'plaudits-pride-white-tee', '220.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - plaudits-pride-white-tee_front.jpg', 't-shirts - plaudits-pride-white-tee_back.jpg', 't-shirts - plaudits-pride-white-tee_model.jpg', '2022-06-26 09:57:25'),
(16, 'Plaudits Pride Black Tee', 'plaudits-pride-black-tee', '220.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - plaudits-pride-black-tee_front.jpg', 't-shirts - plaudits-pride-black-tee_back.jpg', 't-shirts - plaudits-pride-black-tee_model.jpg', '2022-06-26 09:58:20'),
(17, 'Plaudits White Tee', 'plaudits-white-tee', '200.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - plaudits-white-tee_front.jpg', 't-shirts - plaudits-white-tee_back.jpg', 't-shirts - plaudits-white-tee_model.jpg', '2022-06-26 10:01:25'),
(18, 'Plaudits Black Tee', 'plaudits-black-tee', '200.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - plaudits-black-tee_front.jpg', 't-shirts - plaudits-black-tee_back.jpg', 't-shirts - plaudits-black-tee_model.jpg', '2022-06-26 10:02:48'),
(19, 'Pig Shades Black Teee', 'pig-shades-black-teee', '250.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - pig-shades-black-teee_front.jpg', 't-shirts - pig-shades-black-teee_back.jpg', 't-shirts - pig-shades-black-teee_model.jpg', '2022-06-26 10:04:18'),
(20, 'Cool Stereo Black Tee', 'cool-stereo-black-tee', '250.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - cool-stereo-black-tee_front.jpg', 't-shirts - cool-stereo-black-tee_back.jpg', 't-shirts - cool-stereo-black-tee_model.jpg', '2022-06-26 10:05:22'),
(21, 'Egyptian White Tee', 'ancient-egypt-white-tee', '250.00', 't-shirts', 'clothing', '&#8226; Secret Emoji with Applaud logo on the eye<br>\r\n&#8226; 165gms Combed Cotton (100%)<br>\r\n&#8226; Unisex<br>\r\n&#8226; Taped Shoulders & Neckline<br>\r\n&#8226; Double Stitched Hem On Waistline & Sleeves<br>\r\n&#8226; Side Seams', 't-shirts - ancient-egypt-white-tee_front.jpg', 't-shirts - ancient-egypt-white-tee_back.jpg', 't-shirts - ancient-egypt-white-tee_model.jpg', '2022-06-26 10:06:56'),
(22, 'Cow Bucket Hat - Pink', 'cow-print-bucket-hat---pink', '200.00', 'bucket-hats', 'headwear', '&#8226; Secret Emoji with Applaud logo on the eye<br>', 'bucket-hats - cow-print-bucket-hat---pink_front.jpg', 'bucket-hats - cow-print-bucket-hat---pink_back.jpg', 'bucket-hats - cow-print-bucket-hat---pink_model.jpg', '2022-06-26 10:20:15'),
(23, 'Cow Bucket Hat - Black', 'cow-print-bucket-ha---black', '200.00', 'bucket-hats', 'headwear', '&#8226; Secret Emoji with Applaud logo on the eye<br>', 'bucket-hats - cow-print-bucket-ha---black_front.jpg', 'bucket-hats - cow-print-bucket-ha---black_back.jpg', 'bucket-hats - cow-print-bucket-ha---black_model.jpg', '2022-06-26 10:21:32'),
(24, 'Cow Bucket Hat - Brown', 'cow-bucket-hat---brown', '200.00', 'bucket-hats', 'headwear', '&#8226; Secret Emoji with Applaud logo on the eye<br>', 'bucket-hats - cow-bucket-hat---brown_front.jpg', 'bucket-hats - cow-bucket-hat---brown_back.jpg', 'bucket-hats - cow-bucket-hat---brown_model.jpg', '2022-06-26 10:22:27'),
(25, 'Plaudits White Socks', 'plaudits-white-socks', '80.00', 'socks', 'accessories', 'Socks', 'socks - plaudits-white-socks_front.jpg', 'socks - plaudits-white-socks_back.jpg', 'socks - plaudits-white-socks_model.jpg', '2022-06-26 10:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `size_XS` int(10) NOT NULL,
  `size_S` int(10) NOT NULL,
  `size_M` int(10) NOT NULL,
  `size_L` int(10) NOT NULL,
  `size_XL` int(10) NOT NULL,
  `size_XXL` int(10) NOT NULL,
  `size_fit_all` int(10) NOT NULL,
  `stock_SKU` varchar(80) NOT NULL,
  `active_yn` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `product_id`, `size_XS`, `size_S`, `size_M`, `size_L`, `size_XL`, `size_XXL`, `size_fit_all`, `stock_SKU`, `active_yn`) VALUES
(1, 1, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-092645885#19', 1),
(2, 2, 3, 3, 5, 5, 4, 5, 0, 'PLDTS-093220711#20', 1),
(3, 3, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-093347899#21', 1),
(4, 4, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-093522354#22', 1),
(5, 5, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-093632986#23', 1),
(6, 6, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-093740483#24', 1),
(7, 7, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-093838124#25', 1),
(8, 8, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-094420915#26', 1),
(9, 9, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-094535178#27', 1),
(10, 10, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-094623760#28', 1),
(11, 11, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-094833734#29', 1),
(12, 12, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-094934621#30', 1),
(13, 13, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-095118348#31', 1),
(14, 14, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-095311711#32', 1),
(15, 15, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-095725382#33', 1),
(16, 16, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-095820769#34', 1),
(17, 17, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-100125236#35', 1),
(18, 18, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-100248588#36', 1),
(19, 19, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-100418525#37', 1),
(20, 20, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-100522330#38', 1),
(21, 21, 5, 5, 5, 5, 5, 5, 0, 'PLDTS-100656886#39', 1),
(22, 22, 0, 0, 0, 0, 0, 0, 5, 'PLDTS-102015927#40', 1),
(23, 23, 0, 0, 0, 0, 0, 0, 5, 'PLDTS-102132524#41', 1),
(24, 24, 0, 0, 0, 0, 0, 0, 5, 'PLDTS-102227129#42', 1),
(25, 25, 0, 0, 0, 0, 0, 0, 5, 'PLDTS-102442495#43', 1);

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
  MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

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
