-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 11:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebakerysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'Bhoomi', 'Bhoomi@1205');

-- --------------------------------------------------------

--
-- Table structure for table `anniversary_cake`
--

CREATE TABLE `anniversary_cake` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anniversary_cake`
--

INSERT INTO `anniversary_cake` (`id`, `name`, `price`, `image`) VALUES
(1, 'Rose Cake', '1300', 'anniversarycake1.jpg'),
(2, 'White Forest', '500', 'anniversarycake2.jpg'),
(3, 'Special Anniversary Cake', '790', 'anniversarycake3.jpg'),
(4, 'White Forest', '1400', 'anniversarycake4.jpg'),
(5, 'Triple Layer Cake', '3000', 'anniversarycake5.jpg'),
(6, 'Cheese Cake', '1200', 'anniversarycake6.jpg'),
(7, 'Blue Velvet', '2000', 'anniversarycake7.jpg'),
(8, 'Red Wine Cake', '1550', 'anniversarycake8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `birthday_cake`
--

CREATE TABLE `birthday_cake` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birthday_cake`
--

INSERT INTO `birthday_cake` (`id`, `name`, `price`, `image`) VALUES
(1, 'Chocolate Cake', '900', 'bdaycake1.jpg'),
(2, 'Strawberry Cake', '850', 'bdaycake2.jpg'),
(3, 'Oreo Cake', '1100', 'bdaycake3.jpg'),
(4, 'Chocolate Cake', '500', 'bdaycake4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `Item_name` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `Item_name`, `Price`, `email_id`, `image`) VALUES
(50, 'Strawberry Cake', '850', 'e@gmail.com', 'bdaycake2.jpg'),
(51, 'Chocolate Cake', '900', 'e@gmail.com', 'bdaycake1.jpg'),
(57, 'Biscotti Cookies', '390', 'e@gmail.com', 'cookies3.jpg'),
(58, 'Strawberry CupCakes', '250', 'e@gmail.com', 'cupcake3.jpg'),
(60, 'Choco Pastry', '70', 'e@gmail.com', 'pastry3.jpg'),
(62, 'Strawberry Cake', '850', 'bhoomi@gmail.com', 'bdaycake2.jpg'),
(63, 'Chocolate Cake', '900', 'bhoomi@gmail.com', 'bdaycake1.jpg'),
(65, 'Chocolate Cake', '900 ', 'bhoomi@gmail.com', 'bdaycake1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cookies`
--

CREATE TABLE `cookies` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cookies`
--

INSERT INTO `cookies` (`id`, `name`, `price`, `image`) VALUES
(1, 'Chocolate Cookies', '400', 'cookies1.jpg'),
(2, 'Red Velvet Cookie', '350', 'cookies2.jpg'),
(3, 'Biscotti Cookies', '390', 'cookies3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cupcakes`
--

CREATE TABLE `cupcakes` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cupcakes`
--

INSERT INTO `cupcakes` (`id`, `name`, `price`, `image`) VALUES
(1, 'Blue Velvet ', '300', 'cupcake1.jpeg'),
(2, 'Bubbly Cupcakes\r\n\r\n', '200', 'cupcake2.jpg'),
(3, 'Strawberry CupCakes', '250', 'cupcake3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pastries`
--

CREATE TABLE `pastries` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pastries`
--

INSERT INTO `pastries` (`id`, `name`, `price`, `image`) VALUES
(1, 'Chocolate Pastry', '75', 'pastry1.jpg'),
(2, 'Pineapple Pastry', '100', 'pastry2.webp'),
(3, 'Choco Pastry', '70', 'pastry3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `gender` enum('male','female','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`firstname`, `lastname`, `email_id`, `password`, `mobile_no`, `gender`) VALUES
('Bhoomi', 'Parikh', 'bhoomi@gmail.com', 'bhoomi', '1234567891', 'female'),
('Rutu', 'Hadvani', 'rutuk@gmail.com', 'rutu', '1234567897', 'female'),
('Shruti', 'Patel', 'sp@gmail.com', 'shruti', '1234567888', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `Item_name` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `Item_name`, `Price`, `email_id`, `image`) VALUES
(20, 'Strawberry Cake', '850', 'e@gmail.com', 'bdaycake2.jpg'),
(21, 'Strawberry Cake', '850', 'e@gmail.com', 'bdaycake2.jpg'),
(24, 'Chocolate Cake', '900', 'bhoomi@gmail.com', 'bdaycake1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `anniversary_cake`
--
ALTER TABLE `anniversary_cake`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birthday_cake`
--
ALTER TABLE `birthday_cake`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookies`
--
ALTER TABLE `cookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupcakes`
--
ALTER TABLE `cupcakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pastries`
--
ALTER TABLE `pastries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anniversary_cake`
--
ALTER TABLE `anniversary_cake`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `birthday_cake`
--
ALTER TABLE `birthday_cake`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `cookies`
--
ALTER TABLE `cookies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cupcakes`
--
ALTER TABLE `cupcakes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pastries`
--
ALTER TABLE `pastries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `key1` FOREIGN KEY (`email_id`) REFERENCES `user_info` (`email_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
