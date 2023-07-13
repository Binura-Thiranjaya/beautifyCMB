-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2023 at 01:48 AM
-- Server version: 5.7.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautify`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(200) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat`, `cat_name`) VALUES
(1, 'GENTS', 'GENTS'),
(2, 'LADIES', 'LADIES');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_by` varchar(200) NOT NULL,
  `comment_product` varchar(200) NOT NULL,
  `comment_text` varchar(200) NOT NULL,
  `comment_on` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(200) NOT NULL,
  `coupon_type` varchar(200) NOT NULL,
  `coupon_cat` varchar(200) NOT NULL,
  `coupon_value` varchar(200) NOT NULL,
  `isTemp` varchar(200) NOT NULL,
  `attempts` varchar(200) NOT NULL,
  `expired` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_type`, `coupon_cat`, `coupon_value`, `isTemp`, `attempts`, `expired`) VALUES
(1, 'test12', 'percentage', '', '3', '0', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(200) NOT NULL,
  `droppedPrice` varchar(200) NOT NULL,
  `droppedPercentage` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(200) NOT NULL,
  `order_by` varchar(200) NOT NULL,
  `order_on` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `order_paymentStatus` varchar(200) NOT NULL,
  `order_payment_card` varchar(200) NOT NULL,
  `order_isCoupon` varchar(200) NOT NULL,
  `order_note` varchar(5000) NOT NULL,
  `order_to` varchar(200) NOT NULL,
  `order_toZipCode` varchar(200) NOT NULL,
  `order_products` longtext NOT NULL,
  `order_subTotal` varchar(200) NOT NULL,
  `order_discount` varchar(200) NOT NULL,
  `order_deliveryFree` varchar(200) NOT NULL,
  `order_totalAmount` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments_history`
--

DROP TABLE IF EXISTS `payments_history`;
CREATE TABLE IF NOT EXISTS `payments_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `done_by` varchar(200) NOT NULL,
  `merchant_id` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `payhere_amount` varchar(200) NOT NULL,
  `payhere_currency` varchar(200) NOT NULL,
  `status_code` varchar(200) NOT NULL,
  `md5sig` varchar(200) NOT NULL,
  `card_holder_name` varchar(200) NOT NULL,
  `card_no` varchar(200) NOT NULL,
  `card_expiry` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_uniqueID` varchar(200) NOT NULL,
  `product_category` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `product_description` mediumtext NOT NULL,
  `product_stock` varchar(100) NOT NULL,
  `availability` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_uniqueID`, `product_category`, `product_name`, `product_price`, `product_description`, `product_stock`, `availability`) VALUES
(6, 'hugoboss-g1', 'GENTS', 'Hugo Boss 100ml', '35700', 'BOSS Bottled is the ideal fragrance for confident men who are driven to succeed. Fresh top notes of apple and citrus provides a fruity aroma which combines perfectly with middle notes of cinnamon and cloves to demand attention. Best of all, this cologne is finished off with base notes of sandalwood, cedarwood, amber, and musk to create a distinctly masculine scent.', '15', 1),
(7, 'diorhomme-g2', 'GENTS', 'Dior Homme 120ml', '18000', 'Dior Homme Parfum by Dior is a Leather fragrance for men. Dior Homme Parfum was launched in 2014. The nose behind this fragrance is Francois Demachy. ', '9', NULL),
(8, 'diormidnight-l2', 'LADIES', 'Midnight Poison', '28000', 'Midnight Poison by Dior is a Woody Chypre fragrance for women. Midnight Poison was launched in 2007. Midnight Poison was created by Jacques Cavallier, Olivier Cresp and Francois Demachy. Top notes are Bergamot and Mandarin Orange; middle note is Rose; base notes are Patchouli, Amber and Vanilla.', '8', NULL),
(9, 'diorpure-l3', 'LADIES', 'Pure Poison Dior', '28000', 'Pure Poison by Dior is a Floral fragrance for women. Pure Poison was launched in 2004. Pure Poison was created by Carlos Benaim, Dominique Ropion and Olivier Polge. Top notes are Jasmine, Orange, Bergamot and Sicilian Mandarin; middle notes are Gardenia and Orange Blossom; base notes are Sandalwood, White Amber, Cedar and White Musk.', '10', NULL),
(10, 'Burberry My Burberry Blush-l4', 'LADIES', 'Burberry My Burberry Blush', '22600', 'Introducing My Burberry Blush, a fruity floral Eau de Parfum with a sparkling twist. Stepping back into a London garden awakening in the first light of day, My Burberry Blush captures the senses as blossoming flowers pop with spirited energy.', '5', NULL),
(11, 'laloa_in_paris_bottle', 'LADIES', 'laloa in paris 100ml', '3700', 'Laloa in Paris by Via Paris Parfums is a Floral fragrance for women. Laloa in Paris was launched in 2012. Top notes are Lemon, Tangerine, Grapefruit, Passionfruit, Apple, Wild Strawberry and Peach; middle notes are Rose, Jasmine, Raspberry, Mango, Plum, Green Leaves and Pineapple; base notes are Cedar, Musk, Caramel, Sandalowood, Amber and Vanilla.', '15', NULL),
(12, 'Elizabeth Arden Red Door', 'LADIES', 'Elizabeth Arden Red Door 100ml', '22000', 'Red Door by Elizabeth Arden offers women of all ages a passionate and extravagant scent that bursts with exotic red roses, orchids, honey and spice. Ideal for the woman who wants to feel pampered, Elizabeth Arden\'s Red Door perfume enhances any romantic occasion, from a dinner date to a late night walk through downtown streets with your loved one.', '8', NULL),
(13, 'hugoboss-g3', 'GENTS', 'Hugo Boss Night 100ml', '35500', 'Boss Bottled Night is a fragrance by Hugo Boss which is aimed towards ambitious young men who strive for new challenges. As the name suggests, this cologne was made to be worn at night and features intense woody accords. Notes of lavender, birch trees and musk will remind you of hot summer evenings. Order today and give this seductive cologne to your significant other as a gift!', '7', NULL),
(14, 'adidas-ice-dive', 'GENTS', 'Adidas Ice Dive 100ml', '2400', 'adidas Ice Dive is a fresh and invigorating fragrance that features notes of sandalwood, citrus and tonka bean.', '15', NULL),
(15, 'Hugo Boss Hugo Just Different 125 ml', 'GENTS', 'Hugo Boss Just Different 125 ml', '29600', 'Hugo boss just different toilette is an aromatic fragrance for men \r\nThe top notes are Mint and Granny Smith apple\r\nMiddle notes are Basil, Freesia, and Coriander\r\nBase notes are Cashmeran, Patchouli, Olibanum, and Labdanum.', '10', NULL),
(16, 'Burberry London for Men 100ml', 'GENTS', 'Burberry London for Men 100ml', '30000', 'London for Men is a timeless signature fragrance created for the modern man who exudes both confidence and sophistication. It offers an unforgettable amber woody scent that is masculine, seductive and sexy all in one. It\'s recommended for winter wear during either daytime or nighttime. Order today and give as a gift for Christmas, New Years or any other holiday!', '6', NULL),
(17, 'Tommy for Men 100 ml', 'GENTS', 'Tommy for Men 100 ml', '11000', 'Tommy for Men by Tommy Hilfiger is a men\'s cologne that\'s composed of spicy-green accords with notes of bergamot, mint, lavender, cranberry, and amber. It\'s recommended for wearing during warmer months of the year and has been this companies signature cologne since 1995. Order a bottle today and give as a gift for holidays or any type of special occasion.', '5', NULL),
(18, 'Mercedes Benz for Men', 'GENTS', 'Mercedes Benz for Men', '12000', 'Mercedes-Benz by Mercedes-Benz is a Woody Spicy fragrance for men. Mercedes-Benz was launched in 2012. The nose behind this fragrance is Olivier Cresp. Top notes are Bergamot, Amalfi Lemon and Mandarin Orange; middle notes are Violet, Pepper, Galbanum and Nutmeg; base notes are Vetiver, Virginia Cedar and Patchouli.', '10', NULL),
(19, 'Versace Bright Crystal 50 ml', 'LADIES', 'Versace Bright Crystal 50ml', '10500', 'This sensual perfume comes inspired by a wonderful mixture of Donatella Versace\'s favorite floral fragrances. Bright Crystal offers a refreshing aroma of chilled yuzu and pomegranate mingled with floral blossoms of peony, lotus flower, and magnolia with warmed notes of amber and musk. One spritzis all you need for long lasting wear!', '5', NULL),
(20, 'Revlon Charlie Red for her 100 ml', 'LADIES', 'Revlon Charlie Red for her 100ml', '5000', 'Revlon brand. It belongs to the Oriental Floral family of perfumes.\r\nOrange blossom, gardenia, plum and black currant as top notes, follows the heart with, carnation, tuberose, orchid, jasmine, ylag ylag. It closes with the base notes, amber, musk and sandal, which mark the fragrance.', '7', NULL),
(22, 'VSecret Bombshell', 'LADIES', 'Victoria\'s Secret Bombshell 50ml', '18000', 'Victoria\'s Secret Bombshell 50ml', '10', NULL),
(23, 'violent-l1', 'LADIES', 'violent-l1', '20000', 'violent-l1', '10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_uniqueID` varchar(200) NOT NULL,
  `image` varchar(2000) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`img_id`, `product_uniqueID`, `image`) VALUES
(18, 'hugoboss-g1', 'hugoboss-g1.png'),
(19, 'diorhomme-g2', 'diorhomme-g2'),
(20, 'diormidnight-l2', 'diormidnight-l2.png'),
(21, 'diorpure-l3', 'diorpure-l3.png'),
(22, 'Burberry My Burberry Blush-l4', 'Burberry My Burberry Blush-l4.png'),
(23, 'laloa_in_paris_bottle', 'laloa_in_paris_bottle.png'),
(24, 'Elizabeth Arden Red Door', 'Elizabeth Arden Red Door.png'),
(25, 'hugoboss-g3', 'hugoboss-g3.png'),
(26, 'adidas-ice-dive', 'adidas-ice-dive.png'),
(27, 'Hugo Boss Hugo Just Different 125 ml', 'Hugo Boss Hugo Just Different 125 ml.png'),
(28, 'Burberry London for Men 100ml', 'Burberry London for Men 100ml.png'),
(29, 'Tommy for Men 100 ml', 'Tommy for Men 100 ml.png'),
(30, 'Mercedes Benz for Men', 'Mercedes Benz for Men.png'),
(31, 'Versace Bright Crystal 50 ml', 'Versace Bright Crystal 50 ml.png'),
(32, 'Revlon Charlie Red for her 100 ml', 'Revlon Charlie Red for her 100 ml.png'),
(33, 'VSecret Bombshell', 'VSecret Bombshell.png'),
(34, 'violent-l1', 'violent-l1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_uniqueID` varchar(200) NOT NULL,
  `user_FirstName` varchar(200) NOT NULL,
  `user_LastName` varchar(200) NOT NULL,
  `user_Email` varchar(200) NOT NULL,
  `user_Password` varchar(200) NOT NULL,
  `user_Address` varchar(200) NOT NULL,
  `user_Mobile` varchar(200) NOT NULL,
  `user_Country` varchar(200) NOT NULL,
  `user_ZipCode` varchar(200) NOT NULL,
  `user_LastLogin` varchar(200) NOT NULL,
  `user_LastLoginIP` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_uniqueID`, `user_FirstName`, `user_LastName`, `user_Email`, `user_Password`, `user_Address`, `user_Mobile`, `user_Country`, `user_ZipCode`, `user_LastLogin`, `user_LastLoginIP`) VALUES
(1, 'Chanu64ae365f67898', 'Chanu', 'Perera', 'chanukaperera53@gmail.com', '$2y$10$htQoseY9TeyKdwDRuC8Zd.EPMQNDptHwK3WqYyncUzWLAqEGJHCxq', '817/1 Gamunu Mawatha', '0775906032', 'SRI-LANKA', '10200', '2023-07-12 10:43', '::1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
