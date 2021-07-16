-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 01:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checkoutsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Customer_Id` int(100) NOT NULL,
  `Full_Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `City` varchar(256) NOT NULL,
  `State` varchar(256) NOT NULL,
  `Zipcode` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Customer_Id`, `Full_Name`, `Email`, `Address`, `City`, `State`, `Zipcode`) VALUES
(2, 'Bhoomi Parikh', 'Bhoomi123@gmail.com', '111 , ABC Ahemdabad', 'Ahemdabad', 'Gujarat', 567568);

-- --------------------------------------------------------

--
-- Table structure for table `cuscake`
--

CREATE TABLE `cuscake` (
  `Occasion` varchar(256) NOT NULL,
  `Shape` varchar(256) NOT NULL,
  `Flavaour` varchar(256) NOT NULL,
  `Type` varchar(256) NOT NULL,
  `Decoration` varchar(256) NOT NULL,
  `Wish` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `custcake`
--

CREATE TABLE `custcake` (
  `ID` int(10) NOT NULL,
  `Occasion` varchar(256) NOT NULL,
  `Shape` varchar(256) NOT NULL,
  `Weight` varchar(256) NOT NULL,
  `Bread` varchar(256) NOT NULL,
  `CakeType` varchar(256) NOT NULL,
  `Decoration` varchar(256) NOT NULL,
  `Wish` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custcake`
--

INSERT INTO `custcake` (`ID`, `Occasion`, `Shape`, `Weight`, `Bread`, `CakeType`, `Decoration`, `Wish`, `Email`, `Phone`) VALUES
(1, 'Birthday', 'Round', '1.5 kg', 'Vannila', 'ganache', 'Chocolates', 'Happy Birthday', 'shruti123@gmail.com', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Customer_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `Customer_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
