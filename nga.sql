-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 07:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nga`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat` varchar(200) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat`, `cat_name`) VALUES
(1, 'petceylon', 'PET-CEYLON'),
(2, 'secretsein', 'SECRET-SEIN');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_by` varchar(200) NOT NULL,
  `comment_product` varchar(200) NOT NULL,
  `comment_text` varchar(200) NOT NULL,
  `comment_on` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(200) NOT NULL,
  `coupon_type` varchar(200) NOT NULL,
  `coupon_cat` varchar(200) NOT NULL,
  `coupon_value` varchar(200) NOT NULL,
  `isTemp` varchar(200) NOT NULL,
  `attempts` varchar(200) NOT NULL,
  `expired` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_type`, `coupon_cat`, `coupon_value`, `isTemp`, `attempts`, `expired`) VALUES
(1, 'test12', 'percentage', '', '3', '0', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `product` varchar(200) NOT NULL,
  `droppedPrice` varchar(200) NOT NULL,
  `droppedPercentage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
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
  `order_totalAmount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `payments_history` (
  `id` int(11) NOT NULL,
  `done_by` varchar(200) NOT NULL,
  `merchant_id` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `payhere_amount` varchar(200) NOT NULL,
  `payhere_currency` varchar(200) NOT NULL,
  `status_code` varchar(200) NOT NULL,
  `md5sig` varchar(200) NOT NULL,
  `card_holder_name` varchar(200) NOT NULL,
  `card_no` varchar(200) NOT NULL,
  `card_expiry` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_uniqueID` varchar(200) NOT NULL,
  `product_category` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `product_description` mediumtext NOT NULL,
  `product_stock` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_uniqueID`, `product_category`, `product_name`, `product_price`, `product_description`, `product_stock`) VALUES
(1, '748165daw84652q', 'petceylon', 'Pet Ceylon conditioning shampoo BERRY', '595', 'Size : 200ml', '10'),
(3, '748165daw846fwa', 'petceylon', 'Pet Ceylon conditioning shampoo BLUE', '595', 'Size : 200ml', '10'),
(4, '748165daw846tyd', 'petceylon', 'Pet Ceylon conditioning shampoo SHINER', '800', 'Size : 200ml', '9'),
(5, '748165daw8466g7', 'petceylon', 'Pet Ceylon calamine powder (anti-itching) ', '646', 'Size : 200ml', '10');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `img_id` int(11) NOT NULL,
  `product_uniqueID` varchar(200) NOT NULL,
  `image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`img_id`, `product_uniqueID`, `image`) VALUES
(1, '748165daw84652q', '748165daw84652q1.jfif'),
(11, '748165daw84652q', '748165daw84652q1.jfif'),
(12, '748165daw846fwa', '748165daw846fwa.jfif'),
(13, '748165daw846fwa', '748165daw846fwa.jfif'),
(14, '748165daw846tyd', '748165daw846tyd.jfif'),
(15, '748165daw846tyd', '748165daw846tyd.jfif'),
(16, '748165daw8466g7', '748165daw8466g7.jfif'),
(17, '748165daw8466g7', '748165daw8466g7.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
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
  `user_LastLoginIP` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_uniqueID`, `user_FirstName`, `user_LastName`, `user_Email`, `user_Password`, `user_Address`, `user_Mobile`, `user_Country`, `user_ZipCode`, `user_LastLogin`, `user_LastLoginIP`) VALUES
(4, 'Ganidu640594252de66', 'Ganidu', 'Sathishka', 'ganidu49@gmail.com', '$2y$10$VJA60g5mu4pTrnhDTiFIAu0oifbNZRpn8gaodPwMw/WnEP5F9WlUO', '630/3 Vilahena Road, Pamunuwila, Gonawala', '0757856219', 'SRI-LANKA', '11600', '2023-03-06 12:50', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_history`
--
ALTER TABLE `payments_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments_history`
--
ALTER TABLE `payments_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
