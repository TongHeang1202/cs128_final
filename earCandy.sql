-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2023 at 03:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earCandy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(10) NOT NULL,
  `cart_quantity` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(40) NOT NULL,
  `category_description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'piano', 'black and white keys'),
(2, 'guitar', 'strings you pluck make sound'),
(3, 'violin', 'strings you bow make sound');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_description` varchar(40) NOT NULL,
  `product_price` float(8,2) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `rating` float(8,2) NOT NULL,
  `rating_count` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_quantity`, `product_image`, `rating`, `rating_count`, `category_id`) VALUES
(1, 'Starument Digital Piano PD-90', 'A lightweight starter piano', 129.99, 6, 'images/piano/sql_piano1.jpeg', 0.00, 0, 1),
(2, 'Arkon Digital Piano AK-47', 'Digital organ with built-in microphone', 159.99, 9, 'images/piano/sql_piano2.jpeg', 0.00, 0, 1),
(3, 'Rock Digital Organ RX-350', 'Piano that will rock your world', 84.99, 1, 'images/piano/sql_piano3.jpeg', 0.00, 0, 1),
(4, 'RockJam Digital Organ NX-200T', 'A beginner-friendly piano with pedal', 109.99, 0, 'images/piano/sql_piano4.jpeg\r\n', 0.00, 0, 1),
(5, 'Roland GO:KEYS', 'For playing music on the GO', 349.99, 11, 'images/piano/sql_piano5.jpeg', 0.00, 0, 1),
(6, 'Roland QX-110', 'Upright Digital Piano with 88-keys', 499.99, 6, 'images/piano/sql_piano6.jpeg', 0.00, 0, 1),
(7, 'Roland QZ-225', 'Digital Piano with weighted keys', 779.99, 3, 'images/piano/sql_piano7.jpeg', 0.00, 0, 1),
(8, 'Roland QX-110 Pro', 'Perfect piano for kids and pros', 1099.99, 8, 'images/piano/sql_piano8.jpeg\r\n', 0.00, 0, 1),
(9, 'Ibanez GRG', 'An electric 6-string guitar', 369.99, 12, 'images/guitar/sql_guitar1.jpeg', 0.00, 0, 2),
(10, 'Ibanez GRX70', '6-String Electric with whammy bar', 409.99, 6, 'images/guitar/sql_guitar2.jpeg', 0.00, 0, 2),
(11, 'Ibanez AEWC400', 'Good Quality Acoustic Electric Guitar', 289.99, 4, 'images/guitar/sql_guitar3.jpeg', 0.00, 0, 2),
(12, 'Ibanez GRGA', '6-String Electric with whammy bar', 489.99, 15, 'images/guitar/sql_guitar4.jpeg', 0.00, 0, 2),
(13, 'Ibanez AW540PN', '6-String Acoustic Guitar', 349.99, 9, 'images/guitar/sql_guitar5.jpeg', 0.00, 0, 2),
(14, 'Ibanez GA34ST', '6-String Classical Guitar', 199.99, 21, 'images/guitar/sql_guitar6.jpeg', 0.00, 0, 2),
(15, 'Ibanez AZES60', 'Standard Electric Guitar for Beginners', 229.99, 14, 'images/guitar/sql_guitar7.jpeg', 0.00, 0, 2),
(16, 'Ibanez RG470DX', 'Black Planet 6-String Electric Guitar', 619.99, 32, 'images/guitar/sql_guitar8.jpeg', 0.00, 0, 2),
(17, 'Eastar CN90 Full Set', 'Full Set of Violin Essentials', 709.99, 32, 'images/violin/sql_violin1.jpeg', 0.00, 0, 3),
(18, 'Poseidon SolidWood', 'Solid Wood Violin Kit for Children', 89.99, 21, 'images/violin/sql_violin2.jpeg', 0.00, 0, 3),
(19, 'Djlin APM Set', 'Affordable First Violin for Beginners', 79.99, 37, 'images/violin/sql_violin3.jpeg', 0.00, 0, 3),
(20, 'Mendini By Cecilio MV900', 'Full Size Blood Red Violin', 479.99, 5, 'images/violin/sql_violin4.jpeg', 0.00, 0, 3),
(21, 'Cecilio CVN-300', 'Ebony Violin with D\'Addario Strings', 324.99, 25, 'images/violin/sql_violin5.jpeg', 0.00, 0, 3),
(22, 'Naeve UL-18', 'Beginner Violin set with Rosin', 99.99, 9, 'images/violin/sql_violin6.jpeg', 0.00, 0, 3),
(23, 'Eastar VL-34', 'Full Size Beginner Violin for Adults', 149.99, 27, 'images/violin/sql_violin7.jpeg', 0.00, 0, 3),
(24, 'Kmise KN-24', 'Full Size Acoustic Violin 4/4', 79.99, 47, 'images/violin/sql_violin8.jpeg', 0.00, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `test` (`category_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `test` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
