-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2023 at 04:09 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yummyfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `item_name` varchar(11) NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dessert`
--

DROP TABLE IF EXISTS `dessert`;
CREATE TABLE IF NOT EXISTS `dessert` (
  `item_id` int NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(55) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `item_name`, `price`) VALUES
(1, 'capachuno', 200),
(2, 'Ice_coffee', 250),
(5, 'Faluda', 200),
(6, 'Chocolate_Drink', 150);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `cart_id` int NOT NULL,
  `total_payment` int NOT NULL,
  `payment_type` enum('Cash','Card','','') NOT NULL,
  PRIMARY KEY (`payment_id`),
  UNIQUE KEY `cart_id` (`user_id`,`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `cart_id`, `total_payment`, `payment_type`) VALUES
(28, 6, 0, 0, 'Cash'),
(34, 6, 73, 150, 'Cash'),
(35, 6, 74, 450, 'Cash'),
(36, 6, 75, 600, 'Cash'),
(39, 6, 76, 180, 'Cash'),
(40, 6, 77, 540, 'Card'),
(43, 6, 80, 180, 'Cash'),
(90, 6, 81, 540, 'Cash'),
(91, 6, 82, 180, 'Cash'),
(93, 6, 83, 200, 'Cash'),
(94, 6, 84, 400, 'Cash'),
(96, 6, 86, 200, 'Cash'),
(97, 6, 87, 2300, 'Cash'),
(98, 8, 98, 200, 'Cash'),
(100, 6, 99, 10400, 'Card'),
(101, 6, 144, 450, 'Cash'),
(102, 6, 146, 200, 'Cash'),
(103, 6, 147, 450, 'Cash'),
(105, 9, 0, 0, 'Cash'),
(108, 6, 150, 2300, 'Cash'),
(109, 6, 159, 200, 'Cash'),
(110, 6, 160, 200, 'Cash'),
(111, 6, 161, 200, 'Cash'),
(112, 6, 162, 800, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

DROP TABLE IF EXISTS `table`;
CREATE TABLE IF NOT EXISTS `table` (
  `table_id` int NOT NULL AUTO_INCREMENT,
  `reservation_id` int NOT NULL,
  `availability` enum('Available','Not Available','','') NOT NULL,
  PRIMARY KEY (`table_id`),
  UNIQUE KEY `reservation_id` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone_number` int NOT NULL,
  `password` varchar(55) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `address`, `email`, `phone_number`, `password`) VALUES
(6, 'wanushka', 'lakmal', 'metiyagane', 'wanu@gmail.com', 0, '1234'),
(7, 'wanushka', 'lakmal', 'metiyagane', 'wanu@gmail.com', 0, '1234'),
(8, 'wanuwa', 'lakmal', 'fvefgge', 'janith@gmail.com', 99999999, '1234'),
(9, 'wanushka', 'lakmal', 'metiyagane', '9999wanu@gmail.com', 789338799, '2222');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
