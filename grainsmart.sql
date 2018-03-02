-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 09:19 AM
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
  `sms` int(11) NOT NULL,
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
(2, 'grainsmart.cainta@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Monday', 'Ganda', 2147483647, 'Cainta', 'not verified', 'cd5d0114541d501c6f84f0e018a3b52b', NULL, '2018-01-03');

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
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `stock_price`, `price_retail`, `description`, `stocks_onhand`, `image`) VALUES
(1, 1, 'Malagkit', '56.00', '62.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '100.00', 'null'),
(2, 1, 'Brown Rice', '48.00', '54.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '101.00', 'null'),
(3, 1, 'Premium Dinorado', '50.00', '54.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '102.00', 'null'),
(4, 1, 'Premium Whole Grain', '42.50', '48.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '103.00', 'null'),
(5, 1, 'Premium Maharlika', '42.00', '47.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '104.00', 'null'),
(6, 1, 'Thai Rice', '43.00', '46.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '105.00', 'null'),
(7, 1, 'Long Grain', '40.00', '46.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '106.00', 'null'),
(8, 1, 'Special Sinandomeng', '41.60', '45.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '107.00', 'null'),
(9, 1, 'Regular Sinandomeng', '40.00', '44.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '108.00', 'null'),
(10, 1, 'Super Angelica', '38.00', '42.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '109.00', 'null'),
(11, 1, 'Regular Angelica', '39.90', '43.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '110.00', 'null'),
(12, 1, 'Broken Rice', '35.00', '38.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '111.00', 'null'),
(13, 2, 'Bacon Honey Cured', '372.00', '470.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '112.00', 'null'),
(14, 2, 'Bacon Regular', '264.00', '340.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '113.00', 'null'),
(15, 2, 'Embutido Premium', '155.00', '186.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '114.00', 'null'),
(16, 2, 'Ham - Glazed', '148.00', '200.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '115.00', 'null'),
(17, 2, 'Regular Hotdog', '150.00', '180.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '116.00', 'null'),
(18, 2, 'Mini Hotdog', '150.00', '180.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '117.00', 'null'),
(19, 2, 'Cheesedog - Regular', '180.00', '230.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '118.00', 'null'),
(20, 2, 'Bologna Garlic', '137.00', '172.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '119.00', 'null'),
(21, 2, 'Bologna Hamonado', '135.00', '172.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '120.00', 'null'),
(22, 2, 'Longganisa - Breakfast', '145.00', '184.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '121.00', 'null'),
(23, 2, 'Tocino', '150.00', '188.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '122.00', 'null'),
(24, 2, 'Burger Patty', '148.00', '180.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '123.00', 'null'),
(25, 2, 'Hungarian Sausage', '200.00', '240.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '124.00', 'null'),
(26, 2, 'Cheese Kreamer', '200.00', '240.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '125.00', 'null'),
(27, 2, 'Corned Beef', '169.00', '220.00', 'Tempus sed tincidunt accumsan magna orci. Amet euismod aut accumsan a quis. A adipiscing auctor. A posuere nostra. Consequat est tortor feugiat a pharetra blandit turpis mauris a nec ut.', '126.00', 'null');

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_fk0` FOREIGN KEY (`staff_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

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
