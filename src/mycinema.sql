-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2022 at 02:28 AM
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
(1, 'BLACK PANTHER', 
'Queen Ramonda, Shuri, M Baku, Okoye, and the Dora Milaje fight to protect their nation from intervening world powers in the wake of the death of King T Challa. As the Wakandans strive to embrace their next chapter, the heroes must band together with the help of War Dog Nakia and Everett Ross and forge a new path for the kingdom of Wakanda.', 
'2022-11-27', 'Action', 'https://lumiere-a.akamaihd.net/v1/images/h_blackpanther_mobile_19754_57fe2288.jpeg?region=0,0,640,480', NULL),
(2, 'She Said', 
'New York Times reporters Megan Twohey and Jodi Kantor, who together broke one of the most important stories in a generation--a story that helped propel the Metoo movement, shattered decades of silence around the subject of sexual assault in Hollywood and altered American culture forever.', 
'2022-12-10', 'Romance', 'https://i.ytimg.com/vi/i5pxUQecM3Y/maxresdefault.jpg', NULL),
(3, 'Strange World', 
'A legendary family of explorers, the Clades, as they attempt to navigate an uncharted, treacherous land alongside a motley crew that includes a mischievous blob, a three-legged dog, and a slew of ravenous creatures.', 
'2022-12-11', 'Adventure', 'https://prod-ripcut-delivery.disney-plus.net/v1/variant/disney/4AE5B5C650E5CB97D5AA97CB2B1207CB27E5AF880218DC6C5DE0FA178EE89D28/scale?width=1200&aspectRatio=1.78&format=jpeg', NULL),
(8, 'Johnny English', 
'Pascal Sauvage, a villain intent on stealing Britain Crown Jewels, has murdered the country top undercover agents, and mediocre spy Johnny English is ordered to prevent further mayhem. But even with help from quick-thinking sidekick Bough, the goofy agent lands himself in one precarious situation after another. Only when he meets up with Interpol crime-fighter Lorna Campbell is Johnny able to chip away at Pascal defenses.', 
'2022-12-12', 'Comedy', './assets/images/comedy.jpg', 'none'),
(9, 'John Wick:3', 
'John Wick uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe and forces that turn old friends into foes.', 
'2022-12-25', 'Action', './assets/images/action.jpg', 'none'),
(10, 'movie temp', 'Description', NULL, 'Action', NULL, NULL),
(11, 'Movie1', 'Movie Description', NULL, 'Romance', NULL, NULL),
(12, 'Movie 2', 'Description', NULL, 'Romance', NULL, NULL),
(13, 'The Shawshank Redemption', 
'Andy Dufresne is sentenced to two consecutive life terms in prison for the murders of his wife and her lover and sentenced to a tough prison. However, only Andy knows he did not commit the crimes. While there, he forms a friendship with Red, experiences the brutality of prison life, adapts, helps the warden, etc., all in 19 years.', 
'2022-12-15', 'Action', 'https://m.media-amazon.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_FMjpg_UX1000_.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

CREATE TABLE `bookingtable` (
  `id` int(11) NOT NULL,
  `username` varchar(233) NOT NULL,
  `moviename` varchar(233) NOT NULL,
  `theatre` varchar(233) NOT NULL,
  `type` varchar(233) NOT NULL,
  `bookingDate` varchar(255) NOT NULL,
  `showtime` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `hasPayed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`id`, `username`, `moviename`, `theatre`, `type`, `bookingDate`, `showtime`, `quantity`, `hasPayed`) VALUES
(3, 'testuser', 'She Said', 'vip-hall', '2D', '2022-12-10', '2030', '2', 1),
(5, 'testuser', 'Strange World', 'main-hall', 'IMAX', '2022-12-10', '2030', '1', 0),
(6, 'testuser', 'Strange World', 'private-hall', '2D', '2022-12-10', '2100', '1', 1),
(7, 'ouou', 'Strange World', 'main-hall', 'IMAX', '2022-12-04', '1900', '2', 0),
(8, 'ou1', 'The Shawshank Redemption', 'hall-2', '2D', '2022-12-13', '20:30', '11', 1),
(9, 'ou1', 'The Shawshank Redemption', 'hall-2', '2D', '2022-12-13', '20:30', '11', 1),
(10, 'ou1', 'The Shawshank Redemption', 'hall-2', '2D', '2022-12-13', '20:30', '11', 1),
(11, 'ou1', 'The Shawshank Redemption', 'hall-2', '2D', '2022-12-13', '20:30', '11', 1),
(12, 'ou1', 'The Shawshank Redemption', 'hall-2', '2D', '2022-12-13', '20:30', '11', 1),
(13, 'ou1', 'The Shawshank Redemption', 'hall-2', '2D', '2022-12-13', '20:30', '11', 1),
(14, 'ou1', 'The Shawshank Redemption', 'hall-2', '2D', '2022-12-13', '20:30', '11', 1),
(15, 'ou1', 'Johnny English', 'hall-1', '2D', '2022-12-08', '21:00', '3', 1),
(16, 'ou1', 'The Shawshank Redemption', 'hall-2', 'IMAX', '2022-12-14', '19:00', '2', 1),
(17, 'ou1', 'The Shawshank Redemption', 'hall-3', 'IMAX', '2022-12-09', '20:30', '1', 1),
(18, 'ou1', 'John Wick:3', 'hall-3', 'IMAX', '2022-12-20', '19:00', '2', 1),
(19, 'ou1', 'The Shawshank Redemption', 'hall-1', 'IMAX', '2022-12-08', '19:00', '2', 1);

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
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `Code` varchar(255) NOT NULL,
  `Percent` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`Code`, `Percent`) VALUES
('As21N2K', '0.10'),
('KKSAssq', '0.10');

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
(16, 'ou1', 'ekVwZW9VZ1h1eU9iU1lid1lCMGIvdz09', 'ouou8386@gmail.com', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL);

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
-- Indexes for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`Code`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;