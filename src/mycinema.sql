-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2022 at 05:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `password`, `email`) VALUES
(1, 'ouAdmin', 'oyzx1234', 'ouou8386@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `all_movie`
--

CREATE TABLE `all_movie` (
  `id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL DEFAULT 'No name',
  `movie_description` text NOT NULL DEFAULT 'No description',
  `date` date DEFAULT NULL,
  `genre` varchar(255) DEFAULT 'Not Defined',
  `image` varchar(255) DEFAULT NULL,
  `trailerURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_movie`
--

INSERT INTO `all_movie` (`id`, `movie_name`, `movie_description`, `date`, `genre`, `image`, `trailerURL`) VALUES
(1, 'BLACK PANTHER: WAKANDA FOREVER (2022)', 'No description', '2022-11-27', 'Action', 'https://lumiere-a.akamaihd.net/v1/images/h_blackpanther_mobile_19754_57fe2288.jpeg?region=0,0,640,480', NULL),
(2, 'She Said', 'No description', '2022-11-23', 'Romance', 'https://i.ytimg.com/vi/i5pxUQecM3Y/maxresdefault.jpg', NULL),
(3, 'Strange World', 'No description for', '2022-11-24', 'Adventure', 'https://prod-ripcut-delivery.disney-plus.net/v1/variant/disney/4AE5B5C650E5CB97D5AA97CB2B1207CB27E5AF880218DC6C5DE0FA178EE89D28/scale?width=1200&aspectRatio=1.78&format=jpeg', NULL),
(8, 'Johnny English', 'comedy', '2022-11-25', 'Comedy', './assets/images/comedy.jpg', 'none'),
(9, 'John Wick:3', 'John Wick', '2022-12-07', 'Action', './assets/images/action.jpg', 'none'),
(10, 'movie temp', 'Description', NULL, 'Action', NULL, NULL),
(11, 'Movie1', 'Movie Description', NULL, 'Romance', NULL, NULL),
(12, 'Movie 2', 'Description', NULL, 'Romance', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Genre`
--

CREATE TABLE `Genre` (
  `id` int(11) NOT NULL,
  `Genre` varchar(255) NOT NULL DEFAULT 'Not Defined'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Genre`
--

INSERT INTO `Genre` (`id`, `Genre`) VALUES
(1, 'Action'),
(2, 'Romance'),
(3, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `cardNumber` varchar(255) DEFAULT NULL,
  `cvv` varchar(20) DEFAULT NULL,
  `expMonth` varchar(20) DEFAULT NULL,
  `expYear` varchar(20) DEFAULT NULL,
  `promotion` tinyint(1) DEFAULT 0,
  `billingAddress` varchar(255) DEFAULT NULL,
  `nameOnCard` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `password`, `email`, `active`, `cardNumber`, `cvv`, `expMonth`, `expYear`, `promotion`, `billingAddress`, `nameOnCard`) VALUES
(11, 'ouou', 'V1d0OG5Cd3VHVkNDMlFOK0RTRFZNdz09', 'ouou8386@gmail.com', 0, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(12, 'wqewq', '2e21213', 'zzzongxin@gmail.com', 1, '1', NULL, NULL, NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `all_movie`
--
ALTER TABLE `all_movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_movie`
--
ALTER TABLE `all_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
