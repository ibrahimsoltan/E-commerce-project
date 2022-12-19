-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 19, 2022 at 03:43 PM
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
-- Database: `ecomm-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorite_products`
--

DROP TABLE IF EXISTS `favorite_products`;
CREATE TABLE IF NOT EXISTS `favorite_products` (
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `favorite_products_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`favorite_products_id`),
  UNIQUE KEY `favorite_product_unique` (`user_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favorite_products`
--

INSERT INTO `favorite_products` (`user_id`, `product_id`, `favorite_products_id`) VALUES
(1, 1, 9),
(1, 15, 7),
(50, 1, 10),
(52, 1, 11),
(52, 14, 12);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_name` varchar(50) NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  `product_price` double NOT NULL,
  `product_brief` varchar(200) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_count` int NOT NULL,
  `product_photo` varchar(200) NOT NULL,
  `product_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_name`, `product_brand`, `product_price`, `product_brief`, `product_description`, `product_count`, `product_photo`, `product_id`) VALUES
('wef', 'wef', 2.2, 'rwegfwr', 'ewfvgwe', 10, '2.png', 1),
('gfnjgf', 'dhfmdghm', 535.3, 'sdb', 'sadb', 4, 'Screenshot_20221109_124725.png', 14),
('gfnjgf', 'dhfmdghm', 535.3, 'sdb', 'sadb', 4, 'Screenshot_20221109_124725.png', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_location` varchar(100) DEFAULT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_photo` varchar(200) NOT NULL DEFAULT '1000_F_339459697_XAFacNQmwnvJRqe1Fe9VOptPWMUxlZP8.jpg',
  `user_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_email`, `user_password`, `user_name`, `user_address`, `user_location`, `user_phone`, `user_photo`, `user_id`) VALUES
('user@email', '12345', 'user1', 'user1address', 'user1location', '021232', 'Screenshot_20221109_124748.png', 1),
('user2@email', '98765', 'user2', 'user2Address', 'user2Location', 'user2Phone', '1000_F_339459697_XAFacNQmwnvJRqe1Fe9VOptPWMUxlZP8.jpg', 50),
('test@email', '123', 'scw', 'dwvwvdhdfbvcx', 'wwcv', '021156', 'Screenshot_20221109_124529.png', 52);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `favorite_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
