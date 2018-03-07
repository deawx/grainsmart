-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2018 at 09:53 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `password`, `first_name`, `last_name`, `sms`, `address`, `email_status`, `activation_code`, `token`, `date_created`) VALUES
(1, 'lordvirgo31@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jeremy', 'rotoni', 2147483647, 'Cainta', 'not verified', '5af6169095b11e202aaf5eb01ca6a9b4', NULL, '0000-00-00'),
(2, 'grainsmart.cainta@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Monday', 'Ganda', 2147483647, 'Cainta', 'not verified', 'cd5d0114541d501c6f84f0e018a3b52b', NULL, '2018-01-03'),
(3, 'vivaslindeyg@gmail.com', '67ae1fc6cdca2d42c82f34f5f86ec85898f6780e', 'Lindey', 'Vivas', 9178763509, 'Cainta', 'not verified', '9f342dd0fca9b5497d085e162f0ef349', NULL, '2018-03-03'),
(4, 'j.jwkqjw@ya.co', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'j', 'j', 9999999999, 'Cainta', 'not verified', '2f83367ff54464cd0cc349bdc1f8fe37', NULL, '2018-04-03'),
(5, 'q@o.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'q', 'q', 9198778879, 'Cainta', 'not verified', '4b9f4e01d6ace913459eb9e747a32e63', NULL, '2018-04-03'),
(6, 'a@a.aa', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'a', 'a', 9178763508, 'Cainta', 'not verified', 'fc3c5f2b92a32768654fb62bb2783e7a', NULL, '2018-04-03'),
(7, 'jeremy@yahoo.com', 'b3f594e10a9edcf5413cf1190121d45078c62290', 'jeremy', 'jeremy', 9222222223, 'Cainta', 'not verified', '12bab8138ec6c0fbe5a9031b945022f1', NULL, '2018-06-03');

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
  `profile_pic` text NOT NULL,
  `SSS_NUM` varchar(255) DEFAULT NULL,
  `PAGIBIG_NUM` varchar(255) DEFAULT NULL,
  `TIN` varchar(255) DEFAULT NULL,
  `PHILHEALTH_NUM` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `first_name`, `last_name`, `sms`, `address`, `profile_pic`, `SSS_NUM`, `PAGIBIG_NUM`, `TIN`, `PHILHEALTH_NUM`, `role_id`) VALUES
(1, 'maymi', 'admin', 'Maymi', 'Pugi', '123', 'Quezon City', 'to be uploaded', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `contact_details` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `promotion_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `description` varchar(255) NOT NULL,
  `stocks_onhand` decimal(10,2) NOT NULL,
  `product_image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `stock_price`, `price_retail`, `description`, `stocks_onhand`, `product_image`) VALUES
(1, 1, 'Malagkit', '56.00', '62.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '100.00', 'assets/images/rice.png'),
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'admin'),
(2, 'staff');

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
(1, 'Processing'),
(2, 'Shipping'),
(3, 'Delivered'),
(4, 'Cancelled');

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
  ADD UNIQUE KEY `PHILHEALTH_NUM` (`PHILHEALTH_NUM`),
  ADD KEY `employee_fk0` (`role_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_fk0` (`customer_id`),
  ADD KEY `orders_fk1` (`promotion_id`),
  ADD KEY `orders_fk2` (`status_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
