-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2022 at 11:10 PM
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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `cart_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cart_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`,`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `cart_id`) VALUES
(1, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favorite_products`
--

INSERT INTO `favorite_products` (`user_id`, `product_id`, `favorite_products_id`) VALUES
(1, 1, 9),
(1, 15, 7),
(52, 1, 14),
(55, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `liked_markets`
--

DROP TABLE IF EXISTS `liked_markets`;
CREATE TABLE IF NOT EXISTS `liked_markets` (
  `user_id` int NOT NULL,
  `market_id` int NOT NULL,
  `liked_markets_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`liked_markets_id`),
  KEY `user_id` (`user_id`),
  KEY `market_id` (`market_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

DROP TABLE IF EXISTS `market`;
CREATE TABLE IF NOT EXISTS `market` (
  `market_id` int NOT NULL AUTO_INCREMENT,
  `market_name` varchar(50) NOT NULL,
  `market_email` varchar(50) NOT NULL,
  `market_address` varchar(100) NOT NULL,
  `market_password` varchar(50) NOT NULL,
  `market_phone` int NOT NULL,
  `market_photo` varchar(100) NOT NULL,
  `market_location` varchar(100) NOT NULL,
  PRIMARY KEY (`market_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`market_id`, `market_name`, `market_email`, `market_address`, `market_password`, `market_phone`, `market_photo`, `market_location`) VALUES
(3, 'market1', 'test2@email', 'xfhb', '123', 416106, '4.png', 'dgcjhdh'),
(5, 'market2', 'sdvfg', 'yoi', '8225', 75272, '4.png', 'uio'),
(6, 'market3', 'sdvfg', 'yoi', '8225', 75272, '4.png', 'uio');

-- --------------------------------------------------------

--
-- Table structure for table `market_products`
--

DROP TABLE IF EXISTS `market_products`;
CREATE TABLE IF NOT EXISTS `market_products` (
  `market_id` int NOT NULL,
  `product_id` int NOT NULL,
  `market_products_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`market_products_id`),
  UNIQUE KEY `market_id` (`market_id`,`product_id`),
  UNIQUE KEY `market_id_2` (`market_id`,`product_id`),
  KEY `product_id` (`product_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `market_products`
--

INSERT INTO `market_products` (`market_id`, `product_id`, `market_products_id`) VALUES
(3, 14, 11);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_name`, `product_brand`, `product_price`, `product_brief`, `product_description`, `product_count`, `product_photo`, `product_id`) VALUES
('Jordan 1 Retro Royal sneaker', 'Nike', 1500, 'The Jordan 1 Retro Royal (2017) released in April of 2017 and retailed for $160.\n\n', 'The Jordan 1 Retro Royal (2017) is one of the original Air Jordan 1 colorways that debuted in 1985. It features a black and blue leather upper, with the deep black tones acting as the base of the silhouette and giving way to the vibrant blues of Varsity Royal on the overlays. From there, a black \"Air Jordan\" wings logo contrasts nicely with the Varsity Royal on the collar, and a matching blue Nike \"Swoosh\" on the side completes the design.', 10, '2.jfif', 1),
('Jordan 2 Retro Royal sneaker', 'Nike', 2500, 'The Jordan 2 Retro Royal (2018) released in April of 2018 and retailed for $160.\n\n', 'sadbThe Jordan 1 Retro Royal (2017) is one of the original Air Jordan 1 colorways that debuted in 1985. It features a black and blue leather upper, with the deep black tones acting as the base of the silhouette and giving way to the vibrant blues of Varsity Royal on the overlays. From there, a black \"Air Jordan\" wings logo contrasts nicely with the Varsity Royal on the collar, and a matching blue Nike \"Swoosh\" on the side completes the design.', 4, 'Sneakers1.jfif', 14),
('Jordan 3 Retro Royal sneaker', 'Adidas', 1000, 'The Jordan 3 Retro Royal (2019) released in April of 2019 and retailed for $160.\n\n', 'The Jordan 1 Retro Royal (2017) is one of the original Air Jordan 1 colorways that debuted in 1985. It features a black and blue leather upper, with the deep black tones acting as the base of the silhouette and giving way to the vibrant blues of Varsity Royal on the overlays. From there, a black \"Air Jordan\" wings logo contrasts nicely with the Varsity Royal on the collar, and a matching blue Nike \"Swoosh\" on the side completes the design.', 4, 'Sneakers3.jfif', 15),
('Jordan 4 Retro Royal sneaker', 'Nike', 1750, 'The Jordan 4 Retro Royal (2019) released in April of 2017 and retailed for $160.\n\n', 'The Jordan 1 Retro Royal (2017) is one of the original Air Jordan 1 colorways that debuted in 1985. It features a black and blue leather upper, with the deep black tones acting as the base of the silhouette and giving way to the vibrant blues of Varsity Royal on the overlays. From there, a black \"Air Jordan\" wings logo contrasts nicely with the Varsity Royal on the collar, and a matching blue Nike \"Swoosh\" on the side completes the design.', 2, 'Sneakers4.jfif', 22),
('Jordan 5 Retro Royal sneaker', 'Nike', 3000, 'The Jordan 5 Retro Royal (2020) released in April of 2020 and retailed for $160.\n\n', 'The Jordan 1 Retro Royal (2017) is one of the original Air Jordan 1 colorways that debuted in 1985. It features a black and blue leather upper, with the deep black tones acting as the base of the silhouette and giving way to the vibrant blues of Varsity Royal on the overlays. From there, a black \"Air Jordan\" wings logo contrasts nicely with the Varsity Royal on the collar, and a matching blue Nike \"Swoosh\" on the side completes the design.', 10, 'Sneakers5.jfif', 23);

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_email`, `user_password`, `user_name`, `user_address`, `user_location`, `user_phone`, `user_photo`, `user_id`) VALUES
('user@email', '12345', 'user1', 'user1address', 'user1location', '021232', '960x0.jpg', 1),
('user2@email', '98765', 'user2', 'user2Address', 'user2Location', 'user2Phone', '1000_F_339459697_XAFacNQmwnvJRqe1Fe9VOptPWMUxlZP8.jpg', 50),
('test@email', '123', 'Amr Mourad', '6 October', '4th District, Building 1675', '01009980955', '1000_F_339459697_XAFacNQmwnvJRqe1Fe9VOptPWMUxlZP8.jpg', 52),
('test2@email', '1234', 'cgnd', 'sdgsdg', 'dfsagf', '2542', '4.png', 53),
('test2@email', '1234', 'cgnd', 'sdgsdg', 'dfsagf', '2542', '4.png', 54),
('amrmurad35@gmail.com', '123', 'amrmurad', 'Abd Elsalam Ameen', '4th District, Building 1675', '01009980955', '150-1503945_transparent-user-png-default-user-image-png-png.png', 55);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `favorite_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `liked_markets`
--
ALTER TABLE `liked_markets`
  ADD CONSTRAINT `liked_markets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `liked_markets_ibfk_2` FOREIGN KEY (`market_id`) REFERENCES `market` (`market_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `market_products`
--
ALTER TABLE `market_products`
  ADD CONSTRAINT `market_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `market_products_ibfk_2` FOREIGN KEY (`market_id`) REFERENCES `market` (`market_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
