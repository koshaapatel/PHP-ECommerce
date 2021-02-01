-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 07:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `product_id`, `quantity`, `username`) VALUES
(1, 2, 2, 'kosha'),
(2, 2, 2, 'kosha'),
(3, 2, 5, 'kosha'),
(4, 2, 5, 'anonymous'),
(5, 2, 5, 'anonymous');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `image` text NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `product_id`, `username`, `rating`, `image`, `comment`) VALUES
(1, 5, 'kosha', 5, 'as', 'great'),
(2, 5, 'kosha', 5, 'UPLOAD_DIRimg-1559145011.', 'great'),
(3, 5, 'kosha', 5, 'upload/img-1559145226.', 'great'),
(4, 5, 'kosha', 5, 'upload/img-1559145289.', 'great'),
(5, 5, 'kosha', 5, 'upload/img-1559145419.png', 'great');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `shipping_address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `username`, `product_quantity`, `total_price`, `shipping_address`) VALUES
(1, 'koshapatel1045', 2, 100, 'as'),
(2, '', 2, 34, 'WATERLOO'),
(3, '', 2, 34, 'WATERLOO'),
(4, '', 2, 34, 'WATERLOO'),
(5, '', 2, 34, 'WATERLOO'),
(6, '', 2, 34, 'WATERLOO'),
(7, '', 2, 34, 'WATERLOO'),
(8, '', 2, 34, 'WATERLOO'),
(9, '', 2, 34, 'WATERLOO'),
(10, '', 2, 34, 'WATERLOO'),
(11, '', 2, 34, 'WATERLOO'),
(12, '', 2, 34, 'WATERLOO'),
(13, '', 2, 34, 'WATERLOO'),
(14, '', 2, 34, 'WATERLOO'),
(15, '', 2, 34, 'WATERLOO'),
(16, 'kosha', 2, 34, 'WATERLOO');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderdetails_id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `product_id` double NOT NULL,
  `product_quantity` double NOT NULL,
  `shipping_cost` double NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderdetails_id`, `orderid`, `product_id`, `product_quantity`, `shipping_cost`, `total_price`) VALUES
(1, 1, 3, 3, 10, 100),
(5, 13, 5, 2, 3, 34),
(6, 14, 5, 2, 3, 34),
(7, 15, 5, 2, 3, 34),
(8, 16, 5, 2, 3, 34);

-- --------------------------------------------------------

--
-- Table structure for table `tab_product`
--

CREATE TABLE `tab_product` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL,
  `pricing` double NOT NULL,
  `shipping_cost` double NOT NULL,
  `image` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tab_product`
--

INSERT INTO `tab_product` (`id`, `name`, `description`, `pricing`, `shipping_cost`, `image`) VALUES
(2, 'AC', 'asd', 100, 10, NULL),
(3, 'Heater', 'as', 150, 10, NULL),
(6, 'Laptop', 'Laptop', 1000, 0, 'asd'),
(7, 'Laptop', 'Laptop1', 1000, 0, 'asd'),
(36, 'Laptop', 'Laptop1', 1000, 0, 'Laptop'),
(37, 'Laptop', 'Laptop1', 1000, 0, 'Laptop'),
(38, 'Laptop', 'Laptop1', 1000, 0, 'upload/img-1559131087.png'),
(39, 'Laptop', 'Laptop1', 100, 10, 'upload/img-1559131246.jpeg'),
(40, 'Laptop', 'Laptop1', 100, 10, 'upload/img-1559131313.jpeg'),
(41, 'Laptop', 'Laptop1', 100, 10, NULL),
(42, 'Laptop', 'Laptop1', 100, 10, NULL),
(43, 'Laptop', 'Laptop1', 100, 10, 'upload/img-1559131619.jpeg'),
(44, 'Laptop', 'Laptop1', 100, 10, 'upload/img-1559131661.jpeg'),
(45, 'Laptop', 'Laptop1', 100, 10, 'upload/img-1559131737.png'),
(46, 'Laptop', 'Laptop1', 100, 10, 'upload/img-1559131755.png'),
(47, 'Laptop', 'Laptop1', 100, 10, 'upload/img-1559131801.png'),
(48, 'Lap', 'Laptop1', 100, 10, 'upload/img-1559140968.png');

-- --------------------------------------------------------

--
-- Table structure for table `tab_user`
--

CREATE TABLE `tab_user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `add_line_1` varchar(50) NOT NULL,
  `add_line_2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tab_user`
--

INSERT INTO `tab_user` (`id`, `email`, `username`, `password`, `add_line_1`, `add_line_2`, `city`, `state`, `country`) VALUES
(27, 'koshapatel1045@gmail.com', 'koshapatel1045', '$2y$10$QByP6kve421DGZh8OFRP2uVP.QHVE6yLOUkyecgH2UUrgog6/2KSy', 'asd', 'asd', 'asd', 'asd', 'asd'),
(28, 'koshapatel1045@gmail.com', 'koshapatel1045', '$2y$10$hvZP5qXWYWTAKWfJU0gqIe2ltld7NMeewf/Wn0P4gGSqklswxr2vO', 'asd', 'asd', 'asd', 'asd', 'asd'),
(29, 'kosha@gmail.com', 'kosha', '$2y$10$.jYbSOzBFw30TcOBvBWwp.BSyzqXJ2m1OTnQJMCm0W72sLByiRam2', 'asd', 'asd', 'asd', 'asd', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `username` (`username`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderdetails_id`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tab_product`
--
ALTER TABLE `tab_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_user`
--
ALTER TABLE `tab_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderdetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tab_product`
--
ALTER TABLE `tab_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tab_user`
--
ALTER TABLE `tab_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
