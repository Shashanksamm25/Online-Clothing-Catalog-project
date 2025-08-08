-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2025 at 11:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeans`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `car_image` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price_per_day` decimal(10,2) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_name`, `car_image`, `brand`, `price_per_day`, `status`) VALUES
(2, 'Mercedes Benz SL Class', 'car-1.png', 'Marcedes Benz', 15000.00, 1),
(3, 'MG HS', 'car-2.png', 'Morris Garage', 5000.00, 0),
(4, 'Honda City', 'car-6.png', 'Honda', 3000.00, 0),
(8, 'Audi Q8 EV', 'car-4.png', 'Audi', 10000.00, 0),
(9, 'Kia Seltos', 'car-7.png', 'Kia', 4000.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `carsale`
--

CREATE TABLE `carsale` (
  `id` int(11) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `car_image` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `fuel_type` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carsale`
--

INSERT INTO `carsale` (`id`, `car_name`, `car_image`, `brand`, `price`, `fuel_type`, `model`, `info`) VALUES
(10, 'gt112', 'WhatsApp Image 2024-07-22 at 09.55.46_d2a89f48.jpg', 'NIKE', 5487.00, 'S', NULL, 'kjkjk'),
(11, 'gt112', 'WhatsApp Image 2024-07-22 at 09.55.46_d2a89f48.jpg', 'NIKE', 5487.00, 'S', NULL, 'kjkjk');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `Email`) VALUES
('Shashank', 'Shank25', 'shashanksamm23@gmail.com'),
('nikhil', 'Nikhil25', 'nikhil@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cloth_id` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `cloth_id`, `added_on`) VALUES
(3, 1, 6, '2025-07-28 20:17:18'),
(5, 1, 11, '2025-07-28 20:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `womens`
--

CREATE TABLE `womens` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `womens`
--

INSERT INTO `womens` (`id`, `service_name`, `service_image`, `info`, `price`, `size`) VALUES
(6, 'wM007', 'sa.jpg', 'Cotton ', 12454.00, NULL),
(7, 'wM005', 'sa.jpg', 'Cottons', 547845.00, 'XLL'),
(8, 'wM0077', 'IMG_6415.JPG', 'nylon', 5698.00, 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carsale`
--
ALTER TABLE `carsale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `womens`
--
ALTER TABLE `womens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carsale`
--
ALTER TABLE `carsale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `womens`
--
ALTER TABLE `womens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
