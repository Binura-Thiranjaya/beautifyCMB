-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2023 at 04:53 PM
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
(1, 'mens', 'GENTS'),
(2, 'ladies', 'LADIES');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `product`, `droppedPrice`, `droppedPercentage`) VALUES
(1, 'dw42q1e', '3500', '15'),
(2, '748165daw84652q', '700', '15'),
(4, '748165daw846fwa', '700', '15'),
(5, '748165daw846tyd', '950', '15'),
(6, '748165daw8466g7', '760', '15');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `order_by`, `order_on`, `order_status`, `order_paymentStatus`, `order_payment_card`, `order_isCoupon`, `order_note`, `order_to`, `order_toZipCode`, `order_products`, `order_subTotal`, `order_discount`, `order_deliveryFree`, `order_totalAmount`) VALUES
(6, 'ORDER6419bf1cb3121', 'Ganidu640594252de66', '2023-03-21 19:58', '1', '2', '************1292', 'TEST12', 'none', '630/3 Vilahena Road, Pamunuwila, Gonawala', '11600', '[{\"id\":\"dw42q1e\",\"name\":\"Petceylone Product #2\",\"price\":\"3000\",\"quantity\":\"5\"}]', '15000', '15000', '0', '5000'),
(8, 'ORDER64295c7ea0870', 'Ganidu640594252de66', '2023-04-02 16:14', '1', '2', '1292', 'test12', 'Test delivery Note', '630/3 Vilahena Road, Pamunuwila, Gonawala', '11600', '[{\"id\":\"dw42q1e\",\"name\":\"Petceylone Product #2\",\"price\":\"3000\",\"quantity\":\"1\"}]', '3000', '90', '1', '2910'),
(9, 'ORDER64295eac5b0be', 'Ganidu640594252de66', '2023-04-02 16:23', '0', '0', 'none', 'test12', 'none', '630/3 Vilahena Road, Pamunuwila, Gonawala', '11600', '[{\"id\":\"dw42q1e\",\"name\":\"Petceylone Product #2\",\"price\":\"3000\",\"quantity\":\"1\"},{\"id\":\"xc34v5rtb6gy7unda\",\"name\":\"Petceylone Product #1\",\"price\":\"1500\",\"quantity\":\"1\"}]', '4500', '135', '1', '4365'),
(10, 'ORDER6488aa07620f1', 'Ganidu640594252de66', '2023-06-13 23:10', '0', '0', 'none', '0', 'none', '630/3 Vilahena Road, Pamunuwila, Gonawala', '11600', '[{\"id\":\"748165daw846tyd\",\"name\":\"Pet Ceylon conditioning shampoo SHINER\",\"price\":\"800\",\"quantity\":\"1\"}]', '800', '0', '0', '1150');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments_history`
--

INSERT INTO `payments_history` (`id`, `done_by`, `merchant_id`, `order_id`, `payhere_amount`, `payhere_currency`, `status_code`, `md5sig`, `card_holder_name`, `card_no`, `card_expiry`) VALUES
(8, 'Ganidu640594252de66', '1220939', 'ORDER6419bf1cb3121', '5000.00', 'LKR', '2', 'CE7D6FC3A6D97EA6A5980453CB07D10A', '23132', '************1292', '12/25'),
(9, 'Ganidu640594252de66', '1220939', 'ORDER64295c7ea0870', '2910.00', 'LKR', '2', '712169A6D303FF33E054113DCE77F8A4', 'Ganidu Sathishka', '1292', '12/25');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_uniqueID`, `product_category`, `product_name`, `product_price`, `product_description`, `product_stock`) VALUES
(6, 'hugoboss-g1', 'mens', 'Hugo Boss 100ml', '35700', 'BOSS Bottled is the ideal fragrance for confident men who are driven to succeed. Fresh top notes of apple and citrus provides a fruity aroma which combines perfectly with middle notes of cinnamon and cloves to demand attention. Best of all, this cologne is finished off with base notes of sandalwood, cedarwood, amber, and musk to create a distinctly masculine scent.', '15'),
(7, 'diorhomme-g2', 'mens', 'Dior Homme 120ml', '18000', 'Dior Homme Parfum by Dior is a Leather fragrance for men. Dior Homme Parfum was launched in 2014. The nose behind this fragrance is Francois Demachy. ', '9'),
(8, 'diormidnight-l2', 'ladies', 'Midnight Poison', '28000', 'Midnight Poison by Dior is a Woody Chypre fragrance for women. Midnight Poison was launched in 2007. Midnight Poison was created by Jacques Cavallier, Olivier Cresp and Francois Demachy. Top notes are Bergamot and Mandarin Orange; middle note is Rose; base notes are Patchouli, Amber and Vanilla.', '8'),
(9, 'diorpure-l3', 'ladies', 'Pure Poison Dior', '28000', 'Pure Poison by Dior is a Floral fragrance for women. Pure Poison was launched in 2004. Pure Poison was created by Carlos Benaim, Dominique Ropion and Olivier Polge. Top notes are Jasmine, Orange, Bergamot and Sicilian Mandarin; middle notes are Gardenia and Orange Blossom; base notes are Sandalwood, White Amber, Cedar and White Musk.', '10'),
(10, 'Burberry My Burberry Blush-l4', 'ladies', 'Burberry My Burberry Blush', '22600', 'Introducing My Burberry Blush, a fruity floral Eau de Parfum with a sparkling twist. Stepping back into a London garden awakening in the first light of day, My Burberry Blush captures the senses as blossoming flowers pop with spirited energy.', '5'),
(11, 'laloa_in_paris_bottle', 'ladies', 'laloa in paris 100ml', '3700', 'Laloa in Paris by Via Paris Parfums is a Floral fragrance for women. Laloa in Paris was launched in 2012. Top notes are Lemon, Tangerine, Grapefruit, Passionfruit, Apple, Wild Strawberry and Peach; middle notes are Rose, Jasmine, Raspberry, Mango, Plum, Green Leaves and Pineapple; base notes are Cedar, Musk, Caramel, Sandalowood, Amber and Vanilla.', '15'),
(12, 'Elizabeth Arden Red Door', 'ladies', 'Elizabeth Arden Red Door 100ml', '22000', 'Red Door by Elizabeth Arden offers women of all ages a passionate and extravagant scent that bursts with exotic red roses, orchids, honey and spice. Ideal for the woman who wants to feel pampered, Elizabeth Arden\'s Red Door perfume enhances any romantic occasion, from a dinner date to a late night walk through downtown streets with your loved one.', '8'),
(13, 'hugoboss-g3', 'mens', 'Hugo Boss Night 100ml', '35500', 'Boss Bottled Night is a fragrance by Hugo Boss which is aimed towards ambitious young men who strive for new challenges. As the name suggests, this cologne was made to be worn at night and features intense woody accords. Notes of lavender, birch trees and musk will remind you of hot summer evenings. Order today and give this seductive cologne to your significant other as a gift!', '7'),
(14, 'adidas-ice-dive', 'mens', 'Adidas Ice Dive 100ml', '2400', 'adidas Ice Dive is a fresh and invigorating fragrance that features notes of sandalwood, citrus and tonka bean.', '15');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

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
(26, 'adidas-ice-dive', 'adidas-ice-dive.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_uniqueID`, `user_FirstName`, `user_LastName`, `user_Email`, `user_Password`, `user_Address`, `user_Mobile`, `user_Country`, `user_ZipCode`, `user_LastLogin`, `user_LastLoginIP`) VALUES
(4, 'Ganidu640594252de66', 'Ganidu', 'Sathishka', 'ganidu49@gmail.com', '$2y$10$VJA60g5mu4pTrnhDTiFIAu0oifbNZRpn8gaodPwMw/WnEP5F9WlUO', '630/3 Vilahena Road, Pamunuwila, Gonawala', '0757856219', 'SRI-LANKA', '11600', '2023-03-06 12:50', '127.0.0.1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
