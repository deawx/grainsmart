-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 02:24 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grainsmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `log_in` datetime NOT NULL,
  `log_out` datetime NOT NULL,
  `hours` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`) VALUES
(1, 'Rice'),
(2, 'Meat');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `id` int(11) NOT NULL,
  `sss` decimal(10,2) NOT NULL,
  `pagibig` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `philhealth` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sms` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email_status` enum('not verified','verified') NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `password`, `first_name`, `last_name`, `sms`, `address`, `email_status`, `activation_code`, `token`, `date_created`) VALUES
(1, 'guess', '', 'guess', 'guess', 1111111, '', '', '', NULL, '0000-00-00 00:00:00'),
(2, 'jeremy.rotoni@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Jeremy', 'Pogi', 9176323441, 'Cainta', 'verified', 'f03075b3d64b81e228963c532dbc55a4', '9e4919c25aa3e7d9146ae849d8b0068f', '2018-03-14 04:31:28'),
(3, 'lordvirgo31@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Jeremy', 'Rotoni', 9222222222, 'Not Specified', 'verified', '2a887f0ef54fb74c681091f5fe7a590c', 'd685b22935b370a4ffef50bfd23236b1', '2018-03-15 04:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sms` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_pic` text,
  `SSS_NUM` varchar(255) DEFAULT NULL,
  `PAGIBIG_NUM` varchar(255) DEFAULT NULL,
  `TIN` varchar(255) DEFAULT NULL,
  `PHILHEALTH_NUM` varchar(255) DEFAULT NULL,
  `roles` enum('staff','admin') NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `first_name`, `last_name`, `sms`, `address`, `profile_pic`, `SSS_NUM`, `PAGIBIG_NUM`, `TIN`, `PHILHEALTH_NUM`, `roles`) VALUES
(1, 'maymi', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Maymi', 'Pugi', '123', 'Quezon City', 'to be uploaded', NULL, NULL, NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reference_code` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` datetime NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sms` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `promotion_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `reference_code`, `order_date`, `delivery_date`, `notes`, `name`, `email`, `sms`, `address`, `promotion_id`, `status_id`) VALUES
(8, 1, '03149PW455', '2018-03-14 14:37:46', '2018-03-16 14:37:46', NULL, 'jeremy', 'jeremy.rotoni@gmau.com', 9135654654, '9', 1, 1),
(9, 1, '03147RMPDP', '2018-03-14 14:41:08', '2018-03-16 14:41:08', NULL, '', '', 0, '', 1, 1),
(10, 1, '0314ZAWA3E', '2018-03-14 14:54:31', '2018-03-16 14:54:31', NULL, 'lv', 'lordvirgo31@yahoo.com', 9356654455, '9999', 1, 1),
(11, 1, '0314RYURDI', '2018-03-14 15:33:24', '2018-03-16 15:33:24', NULL, '', '', 0, '', 1, 1),
(12, 1, '0314URMBAJ', '2018-03-14 15:35:16', '2018-03-16 15:35:16', NULL, '', '', 0, '', 1, 1),
(13, 2, '0314ASNMD4', '2018-03-14 15:37:28', '2018-03-16 15:37:28', NULL, 'Jeremy Rotoni', 'jeremy.rotoni@gmail.com', 9176323441, 'Cainta', 1, 1),
(14, 2, '0314MURJ7T', '2018-03-14 19:32:53', '2018-03-16 19:32:53', NULL, 'Jeremy Rotoni', 'jeremy.rotoni@gmail.com', 9176323441, 'Cainta', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `reference_code` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `reference_code`, `product_id`, `quantity`) VALUES
(8, '03149PW455', 2, 11),
(8, '03149PW455', 23, 1),
(9, '03147RMPDP', 4, 4),
(10, '0314ZAWA3E', 3, 2),
(10, '0314ZAWA3E', 4, 1),
(11, '0314RYURDI', 3, 1),
(12, '0314URMBAJ', 2, 5),
(13, '0314ASNMD4', 2, 2),
(14, '0314MURJ7T', 3, 1),
(14, '0314MURJ7T', 4, 1),
(14, '0314MURJ7T', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `paydate` date NOT NULL,
  `hours` datetime NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `contribution_id` int(11) NOT NULL,
  `netpay` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock_price` decimal(10,2) NOT NULL,
  `price_retail` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `stocks_onhand` decimal(10,2) NOT NULL,
  `product_image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `stock_price`, `price_retail`, `description`, `stocks_onhand`, `product_image`) VALUES
(1, 1, 'Malagkitan', '56.00', '63.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '100.00', 'assets/images/rice.png'),
(2, 1, 'Brown Rice', '48.00', '54.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '101.00', 'assets/images/rice.png'),
(3, 1, 'Premium Dinorado', '50.00', '54.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '102.00', 'assets/images/rice.png'),
(4, 1, 'Premium Whole Grain', '42.50', '48.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '103.00', 'assets/images/rice.png'),
(5, 1, 'Premium Maharlika', '42.00', '47.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '104.00', 'assets/images/rice.png'),
(6, 1, 'Thai Rice', '43.00', '46.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '105.00', 'assets/images/rice.png'),
(7, 1, 'Long Grain', '40.00', '46.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '106.00', 'assets/images/rice.png'),
(8, 1, 'Special Sinandomeng', '41.60', '45.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '107.00', 'assets/images/rice.png'),
(9, 1, 'Regular Sinandomeng', '40.00', '44.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '108.00', 'assets/images/rice.png'),
(10, 1, 'Super Angelica', '38.00', '42.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '109.00', 'assets/images/rice.png'),
(11, 1, 'Regular Angelica', '39.90', '43.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '110.00', 'assets/images/rice.png'),
(12, 1, 'Broken Rice', '35.00', '38.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '111.00', 'assets/images/rice.png'),
(13, 2, 'Bacon Honey Cured', '372.00', '470.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '112.00', 'assets/images/meat.png'),
(14, 2, 'Bacon Regular', '264.00', '340.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '113.00', 'assets/images/meat.png'),
(15, 2, 'Embutido Premium', '155.00', '186.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '114.00', 'assets/images/meat.png'),
(16, 2, 'Ham - Glazed', '148.00', '200.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '115.00', 'assets/images/meat.png'),
(17, 2, 'Regular Hotdog', '150.00', '180.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '116.00', 'assets/images/meat.png'),
(18, 2, 'Mini Hotdog', '150.00', '180.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '117.00', 'assets/images/meat.png'),
(19, 2, 'Cheesedog - Regular', '180.00', '230.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '118.00', 'assets/images/meat.png'),
(20, 2, 'Bologna Garlic', '137.00', '172.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '119.00', 'assets/images/meat.png'),
(21, 2, 'Bologna Hamonado', '135.00', '172.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '120.00', 'assets/images/meat.png'),
(22, 2, 'Longganisa - Breakfast', '145.00', '184.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '121.00', 'assets/images/meat.png'),
(23, 2, 'Tocino', '150.00', '188.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '122.00', 'assets/images/meat.png'),
(24, 2, 'Burger Patty', '148.00', '180.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '123.00', 'assets/images/meat.png'),
(25, 2, 'Hungarian Sausage', '200.00', '240.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '124.00', 'assets/images/meat.png'),
(26, 2, 'Cheese Kreamer', '200.00', '240.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '125.00', 'assets/images/meat.png'),
(27, 2, 'Corned Beef', '169.00', '220.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '126.00', 'assets/images/meat.png');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `discount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `promo_code`, `discount`) VALUES
(1, 'None', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `order_status`) VALUES
(1, 'For Confirmation'),
(2, 'Processing'),
(3, 'Shipping'),
(4, 'Delivered'),
(5, 'Cancelled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `attendance_fk0` (`staff_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_fk0` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `SSS_NUM` (`SSS_NUM`),
  ADD UNIQUE KEY `PAGIBIG_NUM` (`PAGIBIG_NUM`),
  ADD UNIQUE KEY `TIN` (`TIN`),
  ADD UNIQUE KEY `PHILHEALTH_NUM` (`PHILHEALTH_NUM`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_fk1` (`promotion_id`),
  ADD KEY `orders_fk2` (`status_id`),
  ADD KEY `orders` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_details_fk0` (`order_id`),
  ADD KEY `order_details_fk1` (`product_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_fk0` (`staff_id`),
  ADD KEY `payroll_fk1` (`attendance_id`),
  ADD KEY `payroll_fk2` (`contribution_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_fk0` (`category_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promo_code` (`promo_code`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_fk0` FOREIGN KEY (`staff_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_fk0` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `orders_fk2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_fk0` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_fk1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_fk0` FOREIGN KEY (`staff_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `payroll_fk1` FOREIGN KEY (`attendance_id`) REFERENCES `attendance` (`id`),
  ADD CONSTRAINT `payroll_fk2` FOREIGN KEY (`contribution_id`) REFERENCES `contributions` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
