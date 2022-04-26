-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2022 at 05:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `category`
--
INSERT INTO
  `category` (`category_name`, `category_id`)
VALUES
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
  `price` decimal(10, 2) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `special` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `product_detail` text NOT NULL DEFAULT '"No detail availiable"',
  `color` varchar(200) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `product`
--
INSERT INTO
  `product` (
    `product_id`,
    `product_name`,
    `price`,
    `image`,
    `special`,
    `category_id`,
    `date_added`,
    `product_detail`,
    `color`
  )
VALUES
  (
    1,
    'Air Jordan 1 Retro High OG',
    '199.00',
    './image/image1.png',
    1,
    1,
    '2022-03-01',
    'The Air Jordan 1 High Dark Marina Blue arrives with a smooth black leather upper with Dark Marina Blue overlays and Swooshes. On the ankle wrap, a black Jordan Wings logo pays homage to the origins of the Air Jordan 1. From there, a contrasting white and blue Air sole completes the design. The Air Jordan 1 High Dark Marina Blue releases in February of 2022.',
    'Dark Marina Blue'
  ),
  (
    2,
    'Air Jordan 1 Retro High OG',
    '199.00',
    './image/image2.png',
    0,
    1,
    '2019-04-03',
    'The Nike Air Jordan 1 Retro High OG GS \'Chicago\' 2015 was a May 2015 Grade School re-release of the iconic OG \'Chicago\' colorway. The Chicago-Bulls inspired design combines a white, black, and Varsity Red leather upper with a white midsole and Varsity Red outsole. The sneaker also features OG Nike Air branding on the tongue and the Wings logo at the ankle collar.',
    'Chicago'
  ),
  (
    3,
    'Air Jordan 1 High OG \'Airness\'\r\n',
    '399.00',
    './image/image3.png',
    1,
    1,
    '2012-04-10',
    'The A Ma Maniére x Air Jordan 1 High OG \'Airness\' represents the follow-up to the creative partners’ successful Air Jordan 3 collaboration from spring 2021. The iconic silhouette replaces traditional leather construction with a textured suede upper in a subtle off-white finish. Premium touches include burgundy snakeskin on the collar and Swoosh, along with a quilted satin lining in the same autumnal hue. A traditional Wings logo is stamped on the collar flap, the interior side of which features MJ’s signature and an inscription that reads ‘You have to expect things of yourself before you can do them.’ ',
    'Sail/Burgundy Crush'
  ),
  (
    4,
    'Air Jordan 11 Retro \'Bred\' 2019',
    '349.00',
    './image/aj11Bred.png',
    1,
    1,
    '2019-04-12',
    'The Air Jordan 11 Retro \'Bred\' 2019 brings back an original colorway initially debuted in 1995. The Tinker Hatfield-designed silhouette features Chicago Bulls colors, with black mesh on the upper sitting atop shiny black patent leather. A white midsole melds nicely with a translucent Varsity Red outsole, and is the same colorway that Michael Jordan wore during the 1996 NBA championship playoff run. This retro was distributed in December 2019 with OG detailing, including high-cut patent leather, signature Jumpman branding and MJ\'s number 23 stamped on the heel.',
    'Black Red'
  ),
  (
    5,
    'Yeezy Boost 350 V2 \'Beluga 2.0\'',
    '299.00',
    './image/image5.png',
    1,
    1,
    '2019-04-16',
    'With its name coming from the colorway similarities found on the first Yeezy Boost 350 V2, the Yeezy Boost 350 V2 \'Beluga 2.0\' dropped on November 25, 2017. It was quickly restocked on November 30th after selling out. The shoe features a muted grey stripe on the laterals instead of the bright orange stripe found on the original ‘Beluga’ sneaker. The Yeezy Boost 350 V2 \'Beluga 2.0\' also features a heel pull tab with orange stitching and orange ‘SPLY-350’ lettering in reverse on the laterals.',
    'Grey'
  ),
  (
    6,
    'Yeezy Boost 350 V2 \'Oreo\'',
    '329.00',
    './image/yeezyOreo.png',
    1,
    1,
    '2017-04-04',
    'Released on December 17, 2016, the Yeezy Boost 350 V2 ‘Oreo’ features a black Primeknit upper with a white stripe, SPLY 350 branding, and a translucent black midsole housing full-length Boost.',
    'Core Black/Core White'
  ),
  (
    7,
    'Supreme Burberry Box Logo Tee',
    '259.00',
    './image/tshrit1.avif',
    0,
    2,
    '2022-04-09',
    'This black Supreme Burberry Box Logo T-shirt was released in March of 2022 as a part of the streetwear brand\'s Spring/Summer 2022 Week 3 delivery.',
    'Black'
  ),
  (
    8,
    'Supreme Person Tee',
    '299.00',
    './image/tshrit2.avif',
    1,
    2,
    '2015-04-15',
    'No detail availiable',
    'White'
  ),
  (
    9,
    'Off-White Industrial Belt',
    '229.99',
    './image/accessory1.avif',
    0,
    3,
    '2019-02-04',
    'The Off-White Industrial Belt is potentially the most well-recognized and popular item the brand has ever made. The yellow and black version is the most classic iteration of the belt and features Off-White branding as well as red stitching down the middle. This belt has been seen on celebrities both inside and outside of Virgil Abloh\'s direct circle, from Lil Uzi Vert to Tan France. This particular Off-White Industrial Belt retailed for $225 USD but has primarily resold on StockX for below retail.',
    'Black/Yellow'
  ),
  (
    10,
    'Dunk Low',
    '199.00',
    './image/dunkPanda.png',
    0,
    1,
    '2022-04-05',
    'The Nike Dunk Low ‘Black White’ treats the retro model to an essential two-tone color scheme that accentuates the sneaker’s clean lines, developed by designer Peter Moore and responsible for the shoe’s easy transition from the hardwood to the street. The leather upper combines a white base with contrasting black overlays that wrap around the toe and heel. On both the woven tongue tag and heel tab, Nike branding in white stands out in relief against a black backdrop.',
    'Black White'
  ),
  (
    11,
    'Off-White x Dunk Low \'Pine Green\'',
    '500.00',
    './image/offwhiteDunkGreen.png',
    0,
    1,
    '2020-07-15',
    'Virgil Abloh explores the art of deconstruction and recreation with a three-piece capsule collection of the Off-White x Nike Dunk Low. Launched in December 2019, this version is given a Pine Green and white leather upper, bold branding on the medial and an orange-flagged Swoosh across the lateral. Bright secondary Flywire lacing and a raw-edge tongue channel Abloh\'s signature aesthetic. Its classic rubber cupsole echoes the scheme.',
    'White/Pine Green'
  ),
  (
    12,
    'New Era 59Fifty Fitted Hat',
    '65.00',
    './image/hat2.png',
    0,
    3,
    '2021-11-24',
    'Fear of God Essentials New Era 59Fifty Fitted Hat (FW21)',
    'Black'
  ),
  (
    13,
    'Nike x Fear of God Warm Up T-Shirt',
    '299.00',
    './image/Tshirt4.png',
    1,
    2,
    '2022-03-08',
    '\"No detail availiable\"',
    'Oatmeal/Cream'
  ),
  (
    14,
    'Yeezy Boost 700 \'Wave Runner\'',
    '399.00',
    './image/yeezyWaveRunner.png',
    0,
    1,
    '2019-04-10',
    'This inaugural colorway of Kanye West’s Yeezy Wave Runner 700 launched in November 2017, following a public debut earlier in the year as part of the Yeezy Season 5 runway show. The sneaker’s retro-inspired lines worked in tandem with a chunky silhouette reminiscent of an earlier era. ',
    'Solid Grey/Chalk White'
  );

-- --------------------------------------------------------
--
-- Table structure for table `user_info`
--
CREATE TABLE `user_info` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `user_info`
--
INSERT INTO
  `user_info` (`username`, `password`, `email`)
VALUES
  ('ab123', 'ab123', 'ouou8386@gmail.com'),
  ('oyzx1234', 'Oyzx1234!', 'ou@gmail.com');

--
-- Indexes for dumped tables
--
--
-- Indexes for table `category`
--
ALTER TABLE
  `category`
ADD
  PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE
  `product`
ADD
  PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE
  `user_info`
ADD
  PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE
  `product`
MODIFY
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 15;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;