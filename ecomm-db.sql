-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 03, 2023 at 03:38 AM
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
  `quantity` int NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`,`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `cart_id`, `quantity`) VALUES
(1, 1, 2, 11),
(1, 14, 3, 6),
(1, 15, 9, 4),
(50, 22, 11, 1),
(50, 23, 12, 1),
(55, 14, 13, 5),
(55, 15, 15, 1),
(52, 15, 74, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favorite_products`
--

INSERT INTO `favorite_products` (`user_id`, `product_id`, `favorite_products_id`) VALUES
(1, 1, 9),
(50, 14, 19),
(52, 14, 47),
(52, 15, 31),
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
  UNIQUE KEY `user_id_2` (`user_id`,`market_id`),
  KEY `user_id` (`user_id`),
  KEY `market_id` (`market_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `liked_markets`
--

INSERT INTO `liked_markets` (`user_id`, `market_id`, `liked_markets_id`) VALUES
(52, 3, 10),
(52, 5, 14),
(52, 6, 11);

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
  `market_balance` int NOT NULL,
  `market_balance_no` int NOT NULL,
  PRIMARY KEY (`market_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`market_id`, `market_name`, `market_email`, `market_address`, `market_password`, `market_phone`, `market_photo`, `market_location`, `market_balance`, `market_balance_no`) VALUES
(3, 'market1', 'test@email', 'Madinty', '1234', 41610662, 'marketimage1.jfif', 'Egypt', 46000, 0),
(5, 'market2', 'sdvfg', 'El-rehab', '8225', 75272, 'marketimage2.png', 'Egypt', 0, 0),
(6, 'market3', 'market3@gmail.com', 'El-hosary', '3', 75272, 'marketimage3.png', 'Egypt', 0, 0),
(24, 'market4', 'market4@gmail.com', 'Nasr city', '123123', 120088412, 'WhatsApp Image 2023-01-03 at 01.39.25.jpg', 'Egypt', 0, 0),
(25, 'market5', 'market5@gmail.com', 'El-shrouk city', '1991', 104567726, 'WhatsApp Image 2023-01-03 at 01.39.33.jpg', 'Egypt', 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `market_products`
--

INSERT INTO `market_products` (`market_id`, `product_id`, `market_products_id`) VALUES
(3, 14, 11),
(3, 15, 18),
(3, 40, 30),
(3, 41, 31),
(3, 42, 32),
(3, 43, 33),
(3, 44, 34),
(3, 45, 35),
(3, 46, 36),
(3, 47, 37),
(5, 29, 20),
(5, 31, 21),
(5, 32, 22),
(5, 33, 23),
(5, 34, 24),
(5, 35, 25),
(5, 36, 26),
(5, 37, 27),
(5, 38, 28),
(5, 39, 29),
(6, 58, 48),
(6, 59, 49),
(6, 60, 50),
(6, 61, 51),
(6, 62, 52),
(6, 63, 53),
(6, 64, 54),
(6, 65, 55),
(6, 66, 56),
(24, 48, 38),
(24, 49, 39),
(24, 50, 40),
(24, 51, 41),
(24, 52, 42),
(24, 53, 43),
(24, 54, 44),
(24, 55, 45),
(24, 56, 46),
(24, 57, 47),
(25, 67, 57),
(25, 68, 58),
(25, 69, 59),
(25, 70, 60),
(25, 71, 61),
(25, 72, 62),
(25, 73, 63),
(25, 74, 64);

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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_name`, `product_brand`, `product_price`, `product_brief`, `product_description`, `product_count`, `product_photo`, `product_id`) VALUES
('Jordan 1 Retro Royal sneaker', 'Nike', 1500, 'The Jordan 1 Retro Royal (2017) released in April of 2017 and retailed for $160.\n\n', 'The Jordan 1 Retro Royal (2017) is one of the original Air Jordan 1 colorways that debuted in 1985. It features a black and blue leather upper, with the deep black tones acting as the base of the silhouette and giving way to the vibrant blues of Varsity Royal on the overlays. From there, a black \"Air Jordan\" wings logo contrasts nicely with the Varsity Royal on the collar, and a matching blue Nike \"Swoosh\" on the side completes the design.', 1, 'Air1.jpg', 1),
('Jordan 2 Retro Royal sneaker', 'Nike', 2500, 'The Jordan 2 Retro Royal (2018) released in April of 2018 and retailed for $160.\n\n', 'sadbThe Jordan 1 Retro Royal (2017) is one of the original Air Jordan 1 colorways that debuted in 1985. It features a black and blue leather upper, with the deep black tones acting as the base of the silhouette and giving way to the vibrant blues of Varsity Royal on the overlays. From there, a black \"Air Jordan\" wings logo contrasts nicely with the Varsity Royal on the collar, and a matching blue Nike \"Swoosh\" on the side completes the design.', 2, 'Sneakers1.jfif', 14),
('Jordan 3 Retro Royal sneaker', 'Adidas', 1000, 'The Jordan 3 Retro Royal (2019) released in April of 2019 and retailed for $160.\n\n', 'The Jordan 1 Retro Royal (2017) is one of the original Air Jordan 1 colorways that debuted in 1985. It features a black and blue leather upper, with the deep black tones acting as the base of the silhouette and giving way to the vibrant blues of Varsity Royal on the overlays. From there, a black \"Air Jordan\" wings logo contrasts nicely with the Varsity Royal on the collar, and a matching blue Nike \"Swoosh\" on the side completes the design.', 3, 'Air2.jpg', 15),
('Jordan 4 Retro Royal sneaker', 'Nike', 1750, 'The Jordan 4 Retro Royal (2019) released in April of 2017 and retailed for $160.\n\n', 'The Jordan 1 Retro Royal (2017) is one of the original Air Jordan 1 colorways that debuted in 1985. It features a black and blue leather upper, with the deep black tones acting as the base of the silhouette and giving way to the vibrant blues of Varsity Royal on the overlays. From there, a black \"Air Jordan\" wings logo contrasts nicely with the Varsity Royal on the collar, and a matching blue Nike \"Swoosh\" on the side completes the design.', 2, 'NewBalance1.jpg', 22),
('Jordan 5 Retro Royal sneaker', 'Nike', 3000, 'The Jordan 5 Retro Royal (2020) released in April of 2020 and retailed for $160.\n\n', 'The Jordan 1 Retro Royal (2017) is one of the original Air Jordan 1 colorways that debuted in 1985. It features a black and blue leather upper, with the deep black tones acting as the base of the silhouette and giving way to the vibrant blues of Varsity Royal on the overlays. From there, a black \"Air Jordan\" wings logo contrasts nicely with the Varsity Royal on the collar, and a matching blue Nike \"Swoosh\" on the side completes the design.', 9, 'adidas1.jpg', 23),
('DUNK LOW \'UCLA\'', 'nike', 1500, 'The Nike Dunk Low \'UCLA\' takes inspiration from the Bruins color palette. ', 'The Nike Dunk Low \'UCLA\' takes inspiration from the Bruins color palette. A leather upper features a yellow base with blue overlays and Swoosh. A contrasting white midsole leads to a blue rubber outsole, identical to the original basketball specific tread from 1985.', 4, 'shoe1.jpg', 29),
('AIR JORDAN 6 RETRO \'GEORGETOWN\'', 'Air Jordan', 1000, 'Michael Jordan and the North Carolina Tar Heels faced off against the Georgetown Hoyas during the 1982 NCAA Tournament', 'Michael Jordan and the North Carolina Tar Heels faced off against the Georgetown Hoyas during the 1982 NCAA Tournament, where MJ hit the go ahead basket to cement a win in the final game. This Air Jordan 6 Retro utilizes signature Hoya colors across the retro hoops shoe, commemorating the epic finish. A grey suede upper showcases perforated detailing and a Huarache inner sleeve for a custom fit. Navy accents add a nice pop of contrast on the heel tab, Jumpman logo and the midsole. A visible NIke', 7, 'shoe2.jpg', 31),
('DUNK LOW \'BLACK WHITE\'', 'Nike', 950, 'The Dunk Low \'Black White\' also known as \'Panda\' brings a classic two-tone look to its classic basketball construction', 'The Dunk Low \'Black White\' also known as \'Panda\' brings a classic two-tone look to its classic basketball construction. The shoe\'s low-top build emerges in leather, with a white base contrasted by black overlays, with further black on the Swoosh branding. Perforations on the toe box provide breathability, while underfoot, the two-tone look is matched by the tooling, which incorporates a concentric rubber outsole for traction.', 5, 'shoe3.jpg', 32),
('AIR JORDAN 11 RETRO \'CHERRY\'', 'Air Jordan', 1100, 'the \'Cherry\' also known as \'Varsity Red\' features a clean colorway that utilizes a Chicago Bulls inspired palette', 'A new entry in the lineage of the Air Jordan 11, the \'Cherry\' also known as \'Varsity Red\' features a clean colorway that utilizes a Chicago Bulls inspired palette. The upper features white mesh with tonal webbing eyelets, while a shiny patent leather mudguard wraps around the entire shoe in a deep red hue. A red Jumpman logo appears on the back heel area, while a translucent rubber outsole finishes the look. A lightweight Phylon midsole provides cushioning while a carbon fiber spring plate offer', 8, 'shoe4.jpg', 33),
('DUNK LOW \'VALERIAN BLUE\'', 'Nike', 1050, 'Color blocking in vibrant tones distinguishes the Nike Dunk Low Valerian Blue.', 'Color blocking in vibrant tones distinguishes the Nike Dunk Low ‘Valerian Blue.’ The heritage-inspired colorway features a white upper with perforated toe box and overlays in navy blue with a matching signature Swoosh. Hits of red appear on the back tab, sockliner and tongue tag with Nike branding. The traditional cupsole with white sidewalls provides support while the rubber outsole in navy ensures solid traction.', 3, 'shoe5.jpg', 34),
('AIR JORDAN 12 RETRO \'PLAYOFF\' 2022', 'Air Jordan', 1450, 'Bringing back the mid-top that Michael wore during his 1997 championship campaign is the 2022 edition of the Air Jordan 12 Retro \'Playoff.\'', 'Bringing back the mid-top that Michael wore during his 1997 championship campaign is the 2022 edition of the Air Jordan 12 Retro \'Playoff.\' It features an essential two-tone color scheme, featuring radiating stitched lines on the black leather upper and lizard-textured overlays in a contrasting white finish. Metallic silver eyelets are molded on, while color-popped crimson accents land on the Jumpman-embroidered tongue and webbing heel loop. Full-length Zoom Air cushioning is underneath with a c', 6, 'shoe6.jpg', 35),
('DUNK LOW \'GYM RED\'', 'Nike', 1325, 'With a color palette that recalls the original \'Be True to your School\' series, the Nike Dunk Low \'Gym Red\' showcases a simple two-tone color block.', 'With a color palette that recalls the original \'Be True to your School\' series, the Nike Dunk Low \'Gym Red\' showcases a simple two-tone color block. The all leather upper features a white base, with vivid red overlays. Contrasting gold hits appear on the woven tongue label, the Nike branding on the back heel and the sockliner. A crisp white midsole gives way to a red rubber outsole, with the same traction pattern as the 1985 original.', 5, 'shoe7.jpg', 36),
('AIR JORDAN 11 RETRO \'COOL GREY\' 2021', 'Air Jordan', 1700, 'Released in December 2021, the Air Jordan 11 Retro \'Cool Grey\' 2021 brings back a colorway from 2001 and 2010.', 'Released in December 2021, the Air Jordan 11 Retro \'Cool Grey\' 2021 brings back a colorway from 2001 and 2010. Faithful to the OG, the shoe\'s upper is built with leather, finished in grey and supported by a darker grey patent leather mudguard. Tonal webbing eyelets are worked into the lacing system to secure the fit, while underfoot, a contrasting white phylon midsole houses full-length Air for cushioning, with a carbon fiber plate included for added support. An icy translucent rubber outsole pr', 7, 'shoe8.jpg', 37),
('AIR JORDAN 1 RETRO HIGH OG \'PATENT BRED\'', 'Air Jordan', 1625, 'Featuring a classic mix of hues, the Air Jordan 1 Retro High OG \'Patent Bred\' also sports an elevated construction.', 'Featuring a classic mix of hues, the Air Jordan 1 Retro High OG \'Patent Bred\' also sports an elevated construction. Built entirely with patent leather, the shoe\'s upper appears in a familiar mix of black and Varsity Red, with perforations on the toe box offering breathability. Underfoot, a white Air midsole provides cushioning and contrast, giving way to a Varsity Red finish on the concentric rubber outsole, which is included for traction.', 4, 'shoe9.jpg', 38),
('AIR JORDAN 6 RETRO \'CHROME\'', 'Air Jordan', 2000, 'Taking the lowtop design of the AJ6 Low \'Chrome\' from 2015, the Air Jordan 6 Retro \'Chrome\' showcases what a high-top version would look like.', 'Taking the lowtop design of the AJ6 Low \'Chrome\' from 2015, the Air Jordan 6 Retro \'Chrome\' showcases what a high-top version would look like. Featuring a full black nubuck upper, contrasting metallic silver hits appear on the midsole, lace locks, heel tab and Jumpman logo. The classic AJ6 details remain, including a visible Nike Air unit in the heel and a translucent rubber outsole.', 5, 'shoe10.jpg', 39),
('AIR JORDAN 5 RETRO \'RACER BLUE\'', 'Air Jordan', 2350, 'Adding some color to the 1990s silhouette designed by Tinker Hatfield and brought to the public by Mars Blackmon is the Air Jordan 5 Retro \'Racer Blue.\'', 'Adding some color to the 1990s silhouette designed by Tinker Hatfield and brought to the public by Mars Blackmon is the Air Jordan 5 Retro \'Racer Blue.\' It features a black nubuck upper with tonal TPU eyelets, translucent quarter panel netting and a reflective silver tongue. The mid-top\'s latter has contrasting touches of royal blue on the embroidered Jumpman and interior lining. The blue polyurethane midsole has lightweight cushioning with black shark tooth detailing and visible Air-sole cushio', 8, 'shoe11.jpg', 40),
('AIR JORDAN 6 RETRO \'UNC HOME\'', 'Air Jordan', 1975, 'The Air Jordan 6 Retro \'UNC Home\' pays homage to Michael Jordan’s alma mater, bearing a colorway reminiscent of the University of North Carolina.', 'The Air Jordan 6 Retro \'UNC Home\' pays homage to Michael Jordan’s alma mater, bearing a colorway reminiscent of the University of North Carolina. The classic hoops sneakers feature a white leather upper set against University Blue nubuck underlays. Hits of navy appear on the molded TPU heel tab and collar lining. Navy repeats on the midsole, which houses visible Air-sole cushioning. The jock tag on the heel reinforces the shoe’s varsity athletics theme.', 4, 'shoe12.jpg', 41),
('AIR JORDAN 4 RETRO \'RED THUNDER\'', 'Air Jordan', 1925, 'Recalling the \'Thunder\' colorway, the Air Jordan 4 Retro \'Red Thunder\', also known as \'Crimson\', emerges with similar color-blocking, albeit in a different mix of hues.', 'Recalling the \'Thunder\' colorway, the Air Jordan 4 Retro \'Red Thunder\', also known as \'Crimson\', emerges with similar color-blocking, albeit in a different mix of hues. The shoe\'s upper is built with a black nubuck base, highlighted by red throughout, including on the molded eyelets and quarter panel. More red marks the midsole, which includes visible Air for cushioning, while a two-tone rubber outsole is included for traction.', 7, 'shoe13.jpg', 42),
('DUNK HIGH \'BLACK WHITE\'', 'Nike', 1425, 'The Nike Dunk High \'Black White\' also known as ‘Panda’ dresses the classic high-top in a monochromatic two-tone color palette.', 'The Nike Dunk High \'Black White\' also known as ‘Panda’ dresses the classic high-top in a monochromatic two-tone color palette. The iconic silhouette features a smooth white leather upper, set against black leather overlays. The toe box is perforated for breathability. The shoe rests on a rubber cupsole, with a concentric rubber outsole included for traction.', 6, 'shoe14.jpg', 43),
('AIR JORDAN 3 RETRO \'FIRE RED\' 2022', 'Air Jordan', 1725, 'The Air Jordan 3 Retro \'Fire Red\' sees one of the original colors of the silhouette return, true to form.', 'The Air Jordan 3 Retro \'Fire Red\' sees one of the original colors of the silhouette return, true to form. A white leather upper is paired with grey elephant print overlays on the toe and heel, while Fire Red accents on the midsole and collor offers a pop of contrast. Designed by Tinker Hatfield, the Air Jordan 3 was the first to feature a visible Nike Air unit, along with the Jumpman logo. This 2022 edition sees the return of the \'Nike Air\' logo on the back heel, along with the \'Nike\' wordmark o', 9, 'shoe15.jpg', 44),
('WMNS DUNK LOW \'ROSE WHISPER\'', 'Nike', 1125, 'The Wmns Dunk Low \'Rose Whisper\'', 'The Wmns Dunk Low \'Rose Whisper\' refreshes the classic style of the retro basketball shoe in a light-hearted hue. The sneaker\'s leather upper is constructed entirely from a white base complemented by Rose Whisper overlays and Nike Swoosh. A breathable nylon tongue provides comfort while the rubber outsole anchors the build.', 3, 'shoe16.jpg', 45),
('AIR JORDAN 1 RETRO HIGH OG \'STAGE HAZE\'', 'Air Jordan', 2500, 'Featuring neutral tones on the foundational sneaker is the Air Jordan 1 Retro High OG \'Stage Haze.\'', 'Featuring neutral tones on the foundational sneaker is the Air Jordan 1 Retro High OG \'Stage Haze.\' Its\' upper combines a white leather base with a grey suede heel overlay and a forefoot overlay in cracked black leather. Matching black accents are featured on the signature Swoosh and a retro Wings logo stamped on the lateral ankle. Nike branding is outlined in Bleached Coral on the woven tongue tag while the high-top rests on a rubber cupsole that pairs white sidewalls with a grey rubber outsole', 5, 'shoe17.jpg', 46),
('AIR JORDAN 3 RETRO \'CARDINAL RED\'', 'Air Jordan', 2100, 'The Air Jordan 3 Retro \'Cardinal Red\' features a palette inspired by an iconic colorway of the Air Jordan 7.', 'The Air Jordan 3 Retro \'Cardinal Red\' features a palette inspired by an iconic colorway of the Air Jordan 7. The sneaker pairs a white tumbled leather upper with Cardinal Red accents on the collar lining, molded eyelets and raised Jumpman branding at the heel. A Jumpman logo embroidered in orange appears on the tongue, with signature elephant print overlays positioned on the forefoot and heel. A two-tone polyurethane midsole with visible Air arrives underfoot.', 4, 'shoe18.jpg', 47),
('AIR JORDAN 4 RETRO \'MILITARY BLACK\'', 'Air Jordan', 1650, 'Featuring the same color blocking and materials used on the OG \'Military Blue\' colorway from 1989 is the Air Jordan 4 Retro \'Military Black.\'', 'Featuring the same color blocking and materials used on the OG \'Military Blue\' colorway from 1989 is the Air Jordan 4 Retro \'Military Black.\' The upper is made with smooth white leather with a forefoot overlay in grey suede. Black accents are on the TPU eyelets, molded heel tab, and the Jumpman logo on the woven tongue tag. It\'s built on a two-tone polyurethane midsole with a visible Air-sole unit under the heel.', 7, 'shoe19.jpg', 48),
('AIR JORDAN 1 MID \'COLLEGE GREY\'', 'Air Jordan', 2200, 'Inspired by Peter Moore\'s original 1985 design is the Air Jordan 1 Mid \'College Grey.\'', 'Inspired by Peter Moore\'s original 1985 design is the Air Jordan 1 Mid \'College Grey.\' The mid-top has an all-leather upper with a clean white base and tan overlays. Jumpman branding is on the sockliner and woven tongue tag with retro Wings on the lateral collar flap. It\'s built on a rubber cupsole with an Air-sole heel unit encapsulated in lightweight polyurethane.\r\n\r\n', 6, 'shoe20.jpg', 49),
('WMNS DUNK HIGH \'BLACK WHITE\'', 'Nike', 1950, 'The Wmns Dunk High \'Black White\' brings a classic two-tone look to a classic high-top silhouette.', 'The Wmns Dunk High \'Black White\' brings a classic two-tone look to a classic high-top silhouette. Built with leather, the shoe\'s upper appears in a mix of black and white, contrasted only by the red on the woven tongue tag. The toe box is perforated to offer breathability, while the rubber cupsole anchors the build and maintains the black and white look. A concentric rubber outsole is included for traction.', 5, 'shoe21.jpg', 50),
('AIR JORDAN 4 RETRO \'INFRARED\'', 'Air Jordan', 2600, 'Bringing back color blocking similar to the 2013 release of the \'Green Glow\' AJ4 is the Air Jordan 4 Retro \'Infrared.\'', 'Bringing back color blocking similar to the 2013 release of the \'Green Glow\' AJ4 is the Air Jordan 4 Retro \'Infrared.\' The upper is made from smooth nubuck in a charcoal finish. A lighter shade of grey is on the forefoot overlay with black accents on the quarter panel netting, structural wings, and Jumpman-branded heel tab. The titular hue lights up the woven tongue tag and molded eyelets. It\'s built on a polyurethane midsole with visible Air-sole cushioning in the heel.', 8, 'shoe22.jpg', 51),
('YEEZY BOOST 350 V2 \'DAZZLING BLUE\'', 'Adidas', 2400, 'Delivering a two-tone colorway of Kanye West\'s popular lifestyle runner is the adidas Yeeezy Boost 350 V2 \'Dazzling Blue.\'', 'Delivering a two-tone colorway of Kanye West\'s popular lifestyle runner is the adidas Yeeezy Boost 350 V2 \'Dazzling Blue.\' The minimalist upper is constructed with flexible Primeknit, pitched to a solid black hue with contrasting threads woven throughout. A royal blue streak cuts through the lateral side, complete with signature SPLY-350 branding. Responsive cushioning arrives via a full-length Boost midsole wrapped in a semi-translucent TPU cage.', 6, 'shoe23.jpg', 52),
('AIR JORDAN 6 RETRO \'MIDNIGHT NAVY\' 2022', 'Air Jordan', 2425, 'The Air Jordan 6 Retro ‘Midnight Navy’ 2022 arrives in a tumbled leather upper in white.', 'The Air Jordan 6 Retro ‘Midnight Navy’ 2022 arrives in a tumbled leather upper in white. Color is delivered with the contrasting navy blue tongue, heel tab, lace guard and back heel, the latter two adorned with the signature Jumpman logo. Underfoot, support and grippiness are delivered via a clear rubber outsole with a PU midsole and an exposed Air-sole unit inThe sneaker rides on a two-tone polyurethane midsole, enhanced with a visible Air-sole heel unit and supported by a translucent rubber ou', 6, 'shoe24.jpg', 53),
('AIR JORDAN 1 MID SE \'DIAMOND\'', 'Air Jordan', 2225, 'The Air Jordan 1 Mid SE \'Diamond\' gives a new iteration of the legendary shoe design, renewed in White and Black.', 'The Air Jordan 1 Mid SE \'Diamond\' gives a new iteration of the legendary shoe design, renewed in White and Black. Its upper spotlights a leather base with overlays and the standard Wings’ Logo. On the upper, a Swoosh branding emphasizes the design with a breathable nylon tongue. The midsole is built on top of a rubber outsole with a circular design for traction.', 7, 'shoe25.jpg', 54),
('AIR JORDAN 11 RETRO LOW \'72-10\'', 'Air Jordan', 1666, 'Bringing back a design theme first featured on an Air Jordan 11 release from 2015 is the Air Jordan 11 Retro Low \'72-10\'', 'Bringing back a design theme first featured on an Air Jordan 11 release from 2015 is the Air Jordan 11 Retro Low \'72-10\', which makes a nod to the Chicago Bulls\' legendary 1996-97 season. The low-top features a black tumbled leather upper with a tonal patent leather mudguard and crimson Jumpman branding accents on the tongue and heel. On the bottom is a white Phylon midsole with full-length Air-sole cushioning and a translucent rubber midsole. The Jordan 11 Low \'72-10\' will drop on May 14, 2022.', 2, 'shoe26.jpg', 55),
('AIR JORDAN 1 HIGH OG \'REBELLIONAIRE\'', 'Air Jordan', 2375, 'Drawing back to when Michael Jordan received a $5,000 fine each time the rookie wore his signature black and red shoes on the court', 'Drawing back to when Michael Jordan received a $5,000 fine each time the rookie wore his signature black and red shoes on the court, which violated the NBA\'s uniform dress code at the time is the Air Jordan 1 High OG \'Rebellionaire.\' The shoe which ties into the shoe\'s mythic \'Banned\' narrative, features a leather upper finished in two-tone color blocking similar to the OG \'Shadow\' colorway. Details include the \'Banned\' AJ1\'s red \'X\' on the heel, along with an all-over print that spells out \'The', 5, 'shoe27.jpg', 56),
('AIR JORDAN 5 RETRO \'GREEN BEAN\' 2022', 'Air Jordan', 1446, 'Bringing back a two-tone colorway first released in 2006 is the 2022 edition of the Air Jordan 5 \'Green Bean.\'', 'Bringing back a two-tone colorway first released in 2006 is the 2022 edition of the Air Jordan 5 \'Green Bean.\' Similar to the original mid-top, a light grey nubuck upper is entirely coated in a reflective finish. Bright green accents make their way to the interior lining and the embroidered Jumpman logo on the heel and tongue, which is repeated on the shark-tooth detailing that enlivens the dark grey polyurethane midsole. It\'s built on a translucent herringbone-tread rubber outsole. The Jordan 5', 3, 'shoe28.jpg', 57),
('AIR JORDAN 1 RETRO HIGH OG \'DARK MARINA BLUE\'', 'Air Jordan', 1560, 'Dressing the legendary silhouette in a classic two-tone color block is the Air Jordan 1 Retro High OG \'Dark Marina Blue.\'', 'Dressing the legendary silhouette in a classic two-tone color block is the Air Jordan 1 Retro High OG \'Dark Marina Blue.\' The upper is all-leather and features a black base with contrasting dark blue overlays along the forefoot, heel, collar, and eyestay. A matching blue Swoosh is complemented by a Jordan Wings logo stamped in black on the lateral collar flap. A woven Nike Air tag on the nylon tongue gives the nod to the shoe\'s retro cushioning technology, which is an Air-sole unit encapsulated ', 3, 'shoe29.jpg', 58),
('AIR JORDAN 1 MID \'SHADOW\'', 'Air Jordan', 1800, 'Recalling on the neutral two-tone palette of the iconic colorway from Jordan\'s debut signature shoe is the Air Jordan 1 Mid GS \'Shadow.\'', 'Recalling on the neutral two-tone palette of the iconic colorway from Jordan\'s debut signature shoe is the Air Jordan 1 Mid GS \'Shadow.\' The upper is made with smooth grey leather and contrasting black leather overlays and features a color-matched Swoosh. Gym Red hints make their way to the Jumpman icon on the woven tongue tag and the Wings logo debossed on the lateral collar flap. It\'s built on a rubber cupsole with crisp white sidewalls, a black rubber outsole, and encapsulated Air-sole cushio', 6, 'shoe30.jpg', 59),
('AIR JORDAN 9 RETRO \'CHILE RED\'', 'Air Jordan', 1825, 'The Air Jordan 9 Retro \'Chile Red\' draws inspiration from 2012\'s \'Motorboat Jones\' ', 'The Air Jordan 9 Retro \'Chile Red\' draws inspiration from 2012\'s \'Motorboat Jones\' colorway. Vibrant red features throughout, from the textile utilized on the upper to the speed lacing system. The theme continues through to the tonal patent leather on the mudguard, collar and heel. Black accents arrive on the tongue tag, molded eyelets and pull loop at the heel. A glossy red polyurethane midsole and black rubber outsole complete the iteration. The Jordan 9 \'Chile Red\' will drop on May 7, 2022.', 4, 'shoe30.jpg', 60),
('AIR JORDAN 1 RETRO HIGH OG \'CHICAGO LOST & FOUND\'', 'Air Jordan', 1320, 'The Air Jordan 1 Retro High OG \'Chicago Lost & Found\' brings back the famous \'Chicago\' colorway with new storytelling elements.', 'The Air Jordan 1 Retro High OG \'Chicago Lost & Found\' brings back the famous \'Chicago\' colorway with new storytelling elements. Featuring the OG high-cut shape, the leather upper features a white base with Varsity Red overlays and a black Swoosh and Wings logo. Cracked black leather on the padded collar gives it a vintage look, along with a pre-yellowed midsole. The packaging also tells the \'Lost & Found\' story, with a damaged-looking box plastered with sale stickers showcasing a different color', 2, 'shoe32.jpg', 61),
('AIR JORDAN 13 RETRO \'COURT PURPLE\'', 'Air Jordan', 1850, 'From the same color blocking of the original \"Bred\' colorway', 'From the same color blocking of the original \"Bred\' colorway, which Jordan wore on the road throughout the 1998 Playoffs until the Finals, is the Air Jordan 13 Retro \'Court Purple.\' This mid-top has black mesh overlays throughout the upper built with a blend of black tumbled leather and purple synthetic suede. An embroidered Jumpman branding is on the microfiber tongue, while the classic cat-eye hologram is on the lateral ankle. On the bottom is the panther paw outsole that features herringbone-', 9, 'shoe33.jpg', 62),
('DUNK LOW GS \'TRIPLE PINK\'', 'Nike', 1350, 'The Dunk Low GS \'Triple Pink\' also known as \'Barbie\' updates the traditional design of the vintage Nike basketball shoe.', 'The Dunk Low GS \'Triple Pink\' also known as \'Barbie\' updates the traditional design of the vintage Nike basketball shoe. The sneaker goes against the traditional two-tone color blocking with an all-leather upper in light pink for both the base and overlays. Hot pink highlights Nike branding along the Swoosh, tongue tag, and heel. While the rubber outsole secures the build, a breathable nylon tongue gives comfort.', 5, 'shoe34.jpg', 63),
('AIR JORDAN 1 RETRO HIGH OG \'BROTHERHOOD\'', 'Air Jordan', 1475, 'Inspired by the fraternity Michael Jordan joined while at UNC, Omega Psi Phi, is the Air Jordan 1 Retro High OG \'Brotherhood.\'', 'Inspired by the fraternity Michael Jordan joined while at UNC, Omega Psi Phi, is the Air Jordan 1 Retro High OG \'Brotherhood.\' The upper features a white leather quarter panel with nubuck overlays in Light Bordeaux. A University Gold leather toe box is matched by wraparound leather overlays at the collar and heel. A leather Nike Air tag is on the nylon tongue, while a classic Wings logo is stamped on the lateral ankle. The high-top is supported by a rubber cupsole with an Air-sole heel unit in l', 4, 'shoe35.jpg', 64),
('AIR JORDAN 3 RETRO \'PINE GREEN\'', 'Air Jordan', 2125, 'The Air Jordan 3 Retro \'Pine Green\' combines updated materials with OG color blocking.', 'The Air Jordan 3 Retro \'Pine Green\' combines updated materials with OG color blocking. The upper\'s traditional leather construction is replaced with textured nubuck. Pops of green appear on the perforated leather collar, molded eyelets and embroidered Jumpman branding on the tongue. The 3\'s classic elephant print arrives on the forefoot and heel overlays, with a second Jumpman icon displayed on the molded heel tab. The theme continues underfoot in the form of a white polyurethane midsole with co', 7, 'shoe36.jpg', 65),
('YEEZY BOOST 350 V2 \'BONE\'', 'Nike', 975, 'The adidas Yeezy Boost 350 V2 is treated to a monochromatic makeover.', 'The adidas Yeezy Boost 350 V2 is treated to a monochromatic makeover. \'Bone\' features an ivory Primeknit upper and a matching traditional lace closure. An off-white webbing pull tab at the heel and a see-through monofilament side stripe continue the tonal theme. Branding arrives in the form of a Three-Stripes logo on the interior heel and a Yeezy word mark stamped on the sockliner. A full-length TPU-wrapped Boost midsole provides responsive cushioning.', 2, 'shoe37.jpg', 66),
('YEEZY BOOST 350 V2 \'BELUGA REFLECTIVE\'', 'Adidas', 1930, 'The adidas Yeezy Boost 350 V2 \'Beluga Reflective\' revisits a 2016 colorway', 'The adidas Yeezy Boost 350 V2 \'Beluga Reflective\' revisits a 2016 colorway, pairing a predominantly grey Primeknit upper with an orange side stripe that features SPLY-350 branding. The knit build is interwoven with reflective fibers that provide enhanced visibility in low-light conditions. A full-length Boost midsole housed in a semi-translucent rubber cage provides support, durability and traction.', 6, 'shoe38.jpg', 67),
('YEEZY BOOST 700 \'WAVE RUNNER\'', 'Adidas', 2050, 'This first colorway of Yeezy Wave Runner 700 from Kanye West was introduced in November 2017.', 'This first colorway of Yeezy Wave Runner 700 from Kanye West was introduced in November 2017, following an initial public opening in the Yeezy Season 5 fashion show previously that year. The retro-inspired lines of the sneaker worked together with a chunky silhouette reminiscent of a previous age. A mesh base on the quarter panel is completed in gray and a yellow with a teal forefoot.', 3, 'shoe39.jpg', 68),
('AIR JORDAN 4 RETRO \'MIDNIGHT NAVY\'', 'Air Jordan', 2325, 'The Air Jordan 4 Retro \'Midnight Navy\' heavily borrows from the White/Cement OG colorway.', 'The Air Jordan 4 Retro \'Midnight Navy\' heavily borrows from the White/Cement OG colorway, including the grey paint splatter midsole and TPU wings. Midnight Navy hits on the lace loops, Jumpman logos and the midsole add a sharp contrast against the white leather upper. Other defining AJ4 details remain, including a visible Nike Air unit in the heel for cushioning and a modified herringbone traction pattern on the rubber outsole.', 2, 'shoe40.jpg', 69),
('AIR JORDAN 4 RETRO \'LIGHTNING\' 2021', 'Air Jordan', 2025, 'Bringing back a 2006 colorway, which released alongside the \'Thunder\'', 'Bringing back a 2006 colorway, which released alongside the \'Thunder\' the Air Jordan 4 Retro \'Lightning\' 2021 features inspiration from Michael Jordan\'s motorsports team. The shoe\'s upper is built with nubuck, finished in Tour Yellow and contrasted by the mesh netting and signature wings. Underfoot, a white PU midsole houses visible Air in the heel to provide cushioning, giving way to a herringbone rubber outsole for traction.', 5, 'shoe41.jpg', 70),
('AIR JORDAN 13 RETRO \'DEL SOL\'', 'Air Jordan', 1640, 'Combining bright accents with the influence of original color-blocking and materials is the Air Jordan 13 Retro \'Del Sol.\'', 'Combining bright accents with the influence of original color-blocking and materials is the Air Jordan 13 Retro \'Del Sol.\' The white leather upper features dimpled overlays in matching white tumbled leather with a crimson Jumpman logo on the tongue and a green-tinged holographic cat eye on the lateral ankle. Yellow synthetic suede wraps the midfoot, heel, and lightweight Phylon midsole, fitted with Zoom Air cushioning in the forefoot and heel. The mid-top is built on a black panther-paw outsole ', 3, 'shoe42.jpg', 71),
('DUNK LOW \'CHAMPIONSHIP PURPLE\'', 'Nike', 1875, 'The Nike Dunk Low \'Championship Purple\' is rendered in two-tone OG-inspired color blocking.', 'The Nike Dunk Low \'Championship Purple\' is rendered in two-tone OG-inspired color blocking. The silhouette features an all-leather white upper with violet overlays and a matching Swoosh. A woven Nike tongue tag and branded embroidery appear on the heel. The low-top is mounted on a durable rubber cupsole, complete with a concentric rubber outsole for traction.', 4, 'shoe43.jpg', 72),
('AIR JORDAN 1 LOW \'SHADOW TOE\'', 'Air Jordan', 1935, 'The \'Flax\' colorway of the Yeezy Slide sees the one-piece shoe arrive in a monochromatic dark beige hue.', 'The \'Flax\' colorway of the Yeezy Slide sees the one-piece shoe arrive in a monochromatic dark beige hue. The entire shoe is made with injected EVA, making it lightweight, durable and comfortable. The outsole features a series of horizontal grooves, placed for optimal impact protection and traction.', 6, 'shoe44.jpg', 73),
('DUNK LOW RETRO QS \'ARGON\' 2022', 'Nike', 1575, 'The Dunk Low Retro QS \'Argon\' returns true to form, first released exclusively in Japan back in 2001 as part of the CO.JP program.', 'The Dunk Low Retro QS \'Argon\' returns true to form, first released exclusively in Japan back in 2001 as part of the CO.JP program. The upper is crafted entirely of leather, mixing two different shades of blue with a white Swoosh. Additional white details can be seen on the laces, back heel tab and the midsole, which features the traditional Dunk cupsole and traction pattern.', 8, 'shoe45.jpg', 74);

-- --------------------------------------------------------

--
-- Table structure for table `purchased_products`
--

DROP TABLE IF EXISTS `purchased_products`;
CREATE TABLE IF NOT EXISTS `purchased_products` (
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `user_id` int NOT NULL,
  `purchase_id` int NOT NULL AUTO_INCREMENT,
  `total_price` int NOT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchased_products`
--

INSERT INTO `purchased_products` (`product_id`, `quantity`, `user_id`, `purchase_id`, `total_price`) VALUES
(14, 1, 52, 1, 1000),
(14, 2, 52, 2, 5000),
(1, 2, 52, 3, 3000),
(14, 1, 52, 4, 2500),
(1, 1, 52, 5, 1500),
(15, 1, 52, 6, 1000),
(14, 2, 52, 7, 5000),
(1, 1, 52, 8, 1500),
(23, 1, 52, 9, 3000);

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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_email`, `user_password`, `user_name`, `user_address`, `user_location`, `user_phone`, `user_photo`, `user_id`) VALUES
('user@email', '12345', 'user1', 'user1address', 'user1location', '021232', '960x0.jpg', 1),
('user2@email', '98765', 'user2', 'user2Address', 'user2Location', 'user2Phone', '1000_F_339459697_XAFacNQmwnvJRqe1Fe9VOptPWMUxlZP8.jpg', 50),
('test@email', '12', 'Amr Mourad', '6 October', '4th District, Building 1675', '010099809554236', 'IMG-20220724-WA0031.jpg', 52),
('test2@email', '1234', 'cgnd', 'sdgsdg', 'dfsagf', '2542', '4.png', 53),
('test2@email', '1234', 'cgnd', 'sdgsdg', 'dfsagf', '2542', '4.png', 54),
('amrmurad35@gmail.com', '123', 'amrmurad', 'Abd Elsalam Ameen', '4th District, Building 1675', '01009980955', '150-1503945_transparent-user-png-default-user-image-png-png.png', 55),
('ibrahimsoltan2000@gmail.com', '142', 'asdf', 'Manial- Cairo', '', '+201200572686', '', 84),
('11410120196082@stud.cu.edu.eg', '22', 'aa', 'Abd Elsalam Ameen', '4th District, Building 1675', '01009980955', 'IMG-20220724-WA0031.jpg', 85),
('11410120196082@stud.cu.edu.eg', '22', 'aa', 'Abd Elsalam Ameen', '4th District, Building 1675', '01009980955', 'IMG-20220724-WA0031.jpg', 86);

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

--
-- Constraints for table `purchased_products`
--
ALTER TABLE `purchased_products`
  ADD CONSTRAINT `purchased_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `purchased_products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
