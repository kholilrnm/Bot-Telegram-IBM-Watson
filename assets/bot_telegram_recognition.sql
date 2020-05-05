-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2020 at 05:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telegram_bot_recognition`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `animal` enum('dog','cat','bukan anjing atau kucing') NOT NULL,
  `score` float NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `animal`, `score`, `url`) VALUES
(2, 'dog', 0.949, 'https://post.healthline.com/wp-content/uploads/sites/3/2020/02/322868_1100-732x549.jpg'),
(3, 'cat', 0.809, 'https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2020/03/14/182785947.jpg'),
(4, 'dog', 0.967, 'https://www.guidedogs.org/wp-content/uploads/2019/11/website-donate-mobile.jpg'),
(5, 'cat', 0.928, 'https://blog.ferplast.com/wp-content/uploads/2019/07/owning-a-white-cat-5b1b91a318ba9-1024x683.jpg'),
(6, 'bukan anjing atau kucing', 0.703, 'https://specials-images.forbesimg.com/imageserve/5de6f2d8c283810006a3947f/960x0.jpg'),
(7, 'cat', 0.935, 'https://i0.wp.com/ideasfornames.com/wp-content/uploads/2019/11/shutterstock_561829969.jpg'),
(8, 'cat', 0.852, 'https://www.warrenphotographic.co.uk/photography/bigs/41944-White-cat-sitting-on-grey-background.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
