-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 02:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artemis`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwrd` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstName`, `lastName`, `email`, `passwrd`, `address`) VALUES
(1, 'Lucinda', 'Zachos', 'lucindazachos@gmail.com', '1234', '29 Ashford road, Dinwiddie, Germiston, 1401'),
(6, 'Christos', 'Zachos', 'bazilzachos@gmail.com', '1234', 'Unit 20, The Curve');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(4, 'lucindazachos@gmail.com'),
(5, 'lucindazachos@gmail.com'),
(6, 'lucindazachos@gmail.com'),
(7, 'lucindazachos@gmail.com'),
(8, 'bazilzachos@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerEmail` varchar(50) NOT NULL,
  `orderItems` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cartTotal` varchar(50) NOT NULL,
  `orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerEmail`, `orderItems`, `cartTotal`, `orderDate`) VALUES
(39, 'bazilzachos@gmail.com', '[{\"name\":\"Keychain - Mono Checkers\",\"image\":\"https:\\/\\/img.fruugo.com\\/product\\/1\\/02\\/451111021_max.jpg\",\"price\":499,\"quantity\":1}]', '499', '2023-06-06'),
(40, 'bazilzachos@gmail.com', '[{\"name\":\"Keychain - Mono Checkers\",\"image\":\"https:\\/\\/img.fruugo.com\\/product\\/1\\/02\\/451111021_max.jpg\",\"price\":499,\"quantity\":1}]', '499', '2023-06-06'),
(41, 'bazilzachos@gmail.com', '[{\"name\":\"Keychain - Dark Grey\",\"image\":\"https:\\/\\/img.fruugo.com\\/product\\/7\\/15\\/451121157_max.jpg\",\"price\":499,\"quantity\":1}]', '499', '2023-06-06'),
(42, 'bazilzachos@gmail.com', '[{\"name\":\"Keychain - Red Tartan\",\"image\":\"https:\\/\\/img.fruugo.com\\/product\\/2\\/31\\/685505312_max.jpg\",\"price\":599,\"quantity\":1}]', '599', '2023-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `stockLevel` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `description`, `stockLevel`, `image`, `price`, `category`) VALUES
(1, 'Keychain - Black', 'Women\'s self-defense 8-piece keychain', 100, 'https://img.fruugo.com/product/6/21/436316216_max.jpg', '499', 'Keychains'),
(2, 'Keychain - Multicolour', 'Women\'s self-defense 8-piece keychain', 100, 'https://img.fruugo.com/product/4/24/451114244_max.jpg', '499', 'Keychains'),
(4, 'Keychain - Crazy Green', 'Women\'s self-defense 8-piece keychain', 100, 'https://img.fruugo.com/product/7/01/835590017_max.jpg', '499', 'Keychains'),
(5, 'Keychain - Mono Checkers', 'Women\'s self-defense 8-piece keychain', 100, 'https://img.fruugo.com/product/1/02/451111021_max.jpg', '499', 'Keychains'),
(6, 'Keychain - Red Lipstick', 'Women\'s self-defense 8-piece keychain', 100, 'https://img.fruugo.com/product/4/00/835590004_max.jpg', '499', 'Keychains'),
(7, 'Keychain - Sunflowers', 'Women\'s self-defense 8-piece keychain', 100, 'https://img.fruugo.com/product/1/27/451117271_max.jpg', '499', 'Keychains'),
(9, 'Keychain - Dark Grey', 'Women\'s self-defense 8-piece keychain', 100, 'https://img.fruugo.com/product/7/15/451121157_max.jpg', '499', 'Keychains'),
(10, 'Keychain - Blue', 'Women\'s self-defense 8-piece keychain', 100, 'https://img.fruugo.com/product/3/93/808645933_max.jpg', '499', 'Keychains'),
(11, 'Keychain - Purple', 'Women\'s self-defense 10-piece keychain', 100, 'https://img.fruugo.com/product/0/60/685501600_max.jpg', '599', 'Keychains'),
(12, 'Keychain - Pink', 'Women\'s self-defense 8-piece keychain', 100, 'https://img.fruugo.com/product/3/21/741787213_max.jpg', '499', 'Keychains'),
(13, 'Keychain - Pink Dream', 'Women\'s self-defense 10-piece keychain', 100, 'https://img.fruugo.com/product/7/03/685500037_max.jpg', '599', 'Keychains'),
(14, 'Keychain - Red Tartan', 'Women\'s self-defense 10-piece keychain', 100, 'https://img.fruugo.com/product/2/31/685505312_max.jpg', '599', 'Keychains'),
(15, 'Silk Scrunchie - Champagne', 'Jumbo Silk Hair Scrunchie', 100, 'https://img.fruugo.com/product/1/34/627995341_max.jpg', '299', 'Scrunchies'),
(16, 'Silk Scrunchie - White', 'Jumbo Silk Hair Scrunchie', 100, 'https://img.fruugo.com/product/3/34/627995343_max.jpg', '299', 'Scrunchies'),
(17, 'Silk Scrunchie - Black', 'Jumbo Silk Hair Scrunchie', 100, 'https://img.fruugo.com/product/9/69/525783699_max.jpg', '299', 'Scrunchies'),
(18, 'Silk Scrunchie - Powder Blue', 'Jumbo Silk Hair Scrunchie', 100, 'https://img.fruugo.com/product/8/84/624070848_max.jpg', '299', 'Scrunchies'),
(19, 'Silk Scrunchie - Teal', 'Jumbo Silk Hair Scrunchie', 100, 'https://img.fruugo.com/product/1/16/859029161_max.jpg', '299', 'Scrunchies'),
(20, 'Silk Scrunchie - Silver', 'Jumbo Silk Hair Scrunchie', 100, 'https://img.fruugo.com/product/5/93/426852935_max.jpg', '299', 'Scrunchies'),
(21, 'Silk Scrunchie - Pink', 'Jumbo Silk Hair Scrunchie', 100, 'https://img.fruugo.com/product/2/74/436157742_max.jpg', '299', 'Scrunchies'),
(22, 'Silk Scrunchie - Blue', 'Jumbo Silk Hair Scrunchie', 100, 'https://img.fruugo.com/product/0/60/311692600_max.jpg', '299', 'Scrunchies'),
(23, 'Budget Binders - Purple', 'PVC Budget Binder', 100, 'https://img.fruugo.com/product/9/15/766747159_max.jpg', '399', 'Budget Binders'),
(24, 'Budget Binders - Pink', 'PVC Budget Binder', 100, 'https://img.fruugo.com/product/5/97/703840975_max.jpg', '399', 'Budget Binders'),
(25, 'Budget Binders - Blue', 'PVC Budget Binder', 100, 'https://img.fruugo.com/product/7/12/703841127_max.jpg', '399', 'Budget Binders'),
(26, 'Budget Binders - Green', 'PVC Budget Binder', 100, 'https://img.fruugo.com/product/4/30/703841304_max.jpg', '399', 'Budget Binders'),
(27, 'Budget Binders - Black', 'PVC Budget Binders', 100, 'https://img.fruugo.com/product/0/46/703841460_max.jpg', '399', 'Budget Binders');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `queryID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `query` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`queryID`, `firstName`, `lastName`, `email`, `query`) VALUES
(10, 'Lucinda', 'Zachos', 'lucindazachos@gmail.com', 'Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`queryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `queryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
