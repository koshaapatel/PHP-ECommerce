-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 07:00 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_product`
--
ALTER TABLE `tab_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_product`
--
ALTER TABLE `tab_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
