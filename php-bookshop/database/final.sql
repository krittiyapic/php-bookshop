-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 01:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(100) NOT NULL,
  `c_bookid` int(100) NOT NULL,
  `c_booktitle` varchar(200) NOT NULL,
  `c_priceperbook` int(100) NOT NULL,
  `c_qty` int(100) NOT NULL,
  `c_totalprice` int(100) NOT NULL,
  `user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comic`
--

CREATE TABLE `comic` (
  `cb_id` int(100) NOT NULL,
  `cb_title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cb_des` varchar(700) NOT NULL,
  `cb_price` int(100) NOT NULL,
  `cb_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comic`
--

INSERT INTO `comic` (`cb_id`, `cb_title`, `img`, `cb_des`, `cb_price`, `cb_status`) VALUES
(1, 'Iron-Man', 'bookimg/ironman.jpg', '\"This art print displays sharp, vivid images with a high degree of color accuracy. A member of the versatile family of art prints, this high-quality reproduction represents the best of both worlds: quality and affordability. Art prints are created using a digital or offset lithography press.\"', 800, 1),
(2, 'Spider-Man', 'bookimg/spiderman.jpg', '\"Bitten by a radioactive spider, ordinary teen Peter Parker takes on the mantle of Spider-Man and sets off on a quest to rid New York City of bad guys. More than 50 years since his web-slinging debut, heâ€™s become the most popular superhero in the world! This tribute to everyoneâ€™s favorite web-head features 192 pages of battles with one of the best roguesâ€™ galleries in comics.\"', 500, 1),
(3, 'Hulk', 'newbook/hulk.jpg', '\"HULK LEGENDS, PETER DAVID & DALE KEOWN REUNITE! In his twelve-year stint on THE INCREDIBLE HULK\"', 800, 1),
(4, 'Thor', 'thor.jpg', '\"This art print displays sharp, vivid images with a high degree of color accuracy. A member of the versatile family of art prints, this high-quality reproduction represents the best of both worlds: quality and affordability. Art prints are created using a digital or offset lithography press.\"', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderbook`
--

CREATE TABLE `orderbook` (
  `order_id` int(100) NOT NULL,
  `order_bookid` int(10) NOT NULL,
  `order_booktitle` varchar(255) NOT NULL,
  `order_qty` int(100) NOT NULL,
  `order_priceperbook` int(100) NOT NULL,
  `order_totalprice` int(100) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderbook`
--

INSERT INTO `orderbook` (`order_id`, `order_bookid`, `order_booktitle`, `order_qty`, `order_priceperbook`, `order_totalprice`, `order_date`, `order_time`, `order_user`) VALUES
(230, 24, 'Hulk', 1, 700, 700, '2019-11-20', '03:58:02', 30),
(231, 22, 'Iron-Man', 7, 1000, 7000, '2019-11-20', '19:45:28', 30),
(232, 23, 'Spider-Man', 4, 500, 2000, '2019-11-20', '19:55:35', 31),
(233, 34, 'Thor', 4, 700, 2800, '2019-11-20', '20:15:55', 31),
(234, 22, 'Iron-Man', 5, 700, 3500, '2019-11-20', '20:31:29', 31),
(235, 23, 'Spider-Man', 5, 500, 2500, '2019-11-20', '20:31:29', 31);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(100) NOT NULL,
  `staff_fname` varchar(255) NOT NULL,
  `staff_lname` varchar(100) NOT NULL,
  `staff_username` varchar(255) NOT NULL,
  `staff_password` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_fname`, `staff_lname`, `staff_username`, `staff_password`) VALUES
(1, 'ohmmy', 'eiei', 'ohmmy555', 123456),
(3, 'om', 'om', 'admin', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` int(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `user_tel` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `username`, `password`, `user_type`, `user_tel`, `user_address`) VALUES
(30, 'ommy', 'zaza', 'omzaza', 123456, 'User', '0618643163', 'SIIT BKD'),
(31, 'ZAZA', 'ZAZA', 'zaza', 123456, 'User', '0618643163', 'SIIT RS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `comic`
--
ALTER TABLE `comic`
  ADD PRIMARY KEY (`cb_id`);

--
-- Indexes for table `orderbook`
--
ALTER TABLE `orderbook`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `comic`
--
ALTER TABLE `comic`
  MODIFY `cb_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orderbook`
--
ALTER TABLE `orderbook`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
