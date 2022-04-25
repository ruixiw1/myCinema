-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 08:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopster`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`, `category_id`) VALUES
('sneaker', 1),
('tshirt', 2),
('accessory', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `special` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `image`, `special`) VALUES
(1, 'aj1Blue', '299.00', './image/image1.webp', 1),
(2, 'aj1Red', '199.00', './image/image2.webp', 1),
(3, 'aj1white', '399.00', './image/image3.webp', 1),
(4, 'aj1Silver', '699.00', './image/image4.webp', 1),
(5, 'yeezy350#1', '299.00', './image/image5.webp', 1),
(6, 'yeezy350#2', '599.00', './image/image6.jpeg', 1),
(7, 'aj1Blue', '299.00', './image/image1.webp', 1),
(8, 'aj1Red', '199.00', './image/image2.webp', 1),
(9, 'aj1white', '399.00', './image/image3.webp', 1),
(10, 'aj1Silver', '699.00', './image/image4.webp', 1),
(11, 'yeezy350#1', '299.00', './image/image5.webp', 1),
(12, 'yeezy350#2', '599.00', './image/image6.jpeg', 1),
(13, 'aj1Blue', '299.00', './image/image1.webp', 1),
(14, 'aj1Red', '199.00', './image/image2.webp', 1),
(15, 'aj1white', '399.00', './image/image3.webp', 1),
(16, 'aj1Silver', '699.00', './image/image4.webp', 1),
(17, 'yeezy350#1', '299.00', './image/image5.webp', 1),
(18, 'yeezy350#2', '599.00', './image/image6.jpeg', 1),
(19, 'aj1Blue', '299.00', './image/image1.webp', 1),
(20, 'aj1Red', '199.00', './image/image2.webp', 1),
(21, 'aj1white', '399.00', './image/image3.webp', 1),
(22, 'aj1Silver', '699.00', './image/image4.webp', 1),
(23, 'yeezy350#1', '299.00', './image/image5.webp', 1),
(24, 'yeezy350#2', '599.00', './image/image6.jpeg', 1),
(25, 'aj1Blue', '299.00', './image/image1.webp', 1),
(26, 'aj1Red', '199.00', './image/image2.webp', 1),
(27, 'aj1white', '399.00', './image/image3.webp', 1),
(28, 'aj1Silver', '699.00', './image/image4.webp', 1),
(29, 'yeezy350#1', '299.00', './image/image5.webp', 1),
(30, 'yeezy350#2', '599.00', './image/image6.jpeg', 1),
(31, 'aj1Blue', '299.00', './image/image1.webp', 1),
(32, 'aj1Red', '199.00', './image/image2.webp', 1),
(33, 'aj1white', '399.00', './image/image3.webp', 1),
(34, 'aj1Silver', '699.00', './image/image4.webp', 1),
(35, 'yeezy350#1', '299.00', './image/image5.webp', 1),
(36, 'yeezy350#2', '599.00', './image/image6.jpeg', 1),
(37, 'aj1Blue', '299.00', './image/image1.webp', 1),
(38, 'aj1Red', '199.00', './image/image2.webp', 1),
(39, 'aj1white', '399.00', './image/image3.webp', 1),
(40, 'aj1Silver', '699.00', './image/image4.webp', 1),
(41, 'yeezy350#1', '299.00', './image/image5.webp', 1),
(42, 'yeezy350#2', '599.00', './image/image6.jpeg', 1),
(43, 'aj1Blue', '299.00', './image/image1.webp', 1),
(44, 'aj1Red', '199.00', './image/image2.webp', 1),
(45, 'aj1white', '399.00', './image/image3.webp', 1),
(46, 'aj1Silver', '699.00', './image/image4.webp', 1),
(47, 'yeezy350#1', '299.00', './image/image5.webp', 1),
(48, 'yeezy350#2', '599.00', './image/image6.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `usersId` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`usersId`, `username`, `password`, `email`) VALUES
(5, 'ab123', 'ab123', 'ouou8386@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
