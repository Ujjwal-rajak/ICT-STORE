-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 04:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `product_image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`id`, `product_name`, `price`, `category`, `description`, `product_image`, `user_id`) VALUES
(1, 'jmbngm ', 1000.00, 'Laptop', 'ghj hjk jkl', '1730120177.jpg', NULL),
(2, 'jmbngm ', 500.00, 'Laptop', 'hgj jkl kju', '1730120231.jpg', NULL),
(3, 'jmbngm ', 500.00, 'Laptop', 'wewef', '1730207569.jpg', NULL),
(4, 'yugg', 500.00, 'Desktop', 'hjigu', '1730209191.jpg', NULL),
(5, 'dff', 4256.00, 'Laptop', 'dsfsdf', '1730565831.jpg', NULL),
(6, 'fasohfudsu', 81.00, 'Laptop', 'bfusdb', '1730809167.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'nav', '$2y$10$0kP841WtI2nqNMrORR.hReE1jKKb9kTC6OV4jMzVKJMF/iF9oWQl.'),
(3, 'abc', '$2y$10$3nMALGMUlTg1YuscP8qOROYqPN2YRD9ARp4cmuK6wf.Mn5zNxBLpO'),
(4, 'Ujjwal', '$2y$10$cl3laJf.S80MYQYZQFH57.cGqLNKPu1fFMKqXFiLTuu/wVyNmxx/2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email`, `product_id`, `quantity`, `delivery_address`, `order_date`) VALUES
(1, 'ujjwal@gmail.com', 1, 1, 'nit fdsfs', '2024-10-30 13:43:11'),
(2, 'ujjwal@gmail.com', 4, 1, 'nit fdsfs', '2024-10-30 13:43:11'),
(3, 'ujjwal@gmail.com', 1, 1, 'nit fdsfs', '2024-10-30 13:46:19'),
(4, 'ujjwal@gmail.com', 2, 1, 'nit fdsfs', '2024-10-30 13:46:19'),
(5, 'ujjwal@gmail.com', 1, 1, 'nit fdsfs', '2024-10-30 14:02:47'),
(6, 'ujjwal@gmail.com', 1, 1, 'nit fdsfs', '2024-10-30 14:40:58'),
(7, 'ujjwal@gmail.com', 4, 1, 'nit fdsfs', '2024-10-30 14:40:58'),
(8, 'ujjwal@gmail.com', 2, 1, 'nit fdsfs', '2024-10-30 14:45:21'),
(9, 'joshua@gmail.com', 1, 1, 'gh', '2024-10-30 15:27:58'),
(10, 'ujjwal@gmail.com', 2, 1, 'dsff', '2024-11-02 22:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(3, 'abv', 'abv@gmail.com', '$2y$10$8P3vUaSQN.Gya3v83IfIWO3UjTTCZ/5tHtIiU11HAvxd8qgDzRM3W', '2024-10-16 15:01:22'),
(4, 'Ujjwal', 'ujjwal444444@gmail.com', '$2y$10$2xwB/5aZ3nbhHznoyZimwegMEuHA5cVcSFZ42ChgC10lAq4702QF.', '2024-10-19 10:56:43'),
(5, 'def', 'def@gmail.com', '$2y$10$QLsXGktvk2oAnMiiWSDM7.mw/SX4e5FTo6xrO48e7e53XZHwAufCi', '2024-10-28 12:57:50'),
(6, 'Ujjwal', 'ujjwal@gmail.com', '$2y$10$HFILxfDQiAZh8IYzWajQtO8fsYhC6dNaL0WO2h84tDnsAmz6u7Mqm', '2024-10-29 12:55:04'),
(7, 'Arjun', 'Arjun@123gamil.com', '$2y$10$CTWoFb7lqAQHLbaSmX8scOp453PIRDi17OMjlsnNTzKRMWFYkOZj6', '2024-10-30 09:38:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_product`
--
ALTER TABLE `add_product`
  ADD CONSTRAINT `add_product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `add_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `add_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
