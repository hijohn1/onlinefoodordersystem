-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 08:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodordersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(25, 'Speical taste', 'images/fc/5.jpg'),
(26, 'Dessert', 'images/fc/0.jpg'),
(27, 'Beverage', 'images/fc/50.jpg'),
(28, 'Pizza', 'images/fc/jp.jpg'),
(29, 'Seafood', 'images/fc/sea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dorder`
--

CREATE TABLE `dorder` (
  `id` int(255) NOT NULL,
  `orderid` int(255) NOT NULL,
  `itemid` int(255) NOT NULL,
  `itemimage` text NOT NULL,
  `itemname` text NOT NULL,
  `qty` int(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dorder`
--

INSERT INTO `dorder` (`id`, `orderid`, `itemid`, `itemimage`, `itemname`, `qty`, `price`) VALUES
(1329, 136, 70, 'images/fm/c.jpg', 'Coca-Cola', 1, 3),
(1330, 136, 69, 'images/fm/coffee.jpg', 'Hot coffee', 1, 34),
(1331, 137, 70, 'images/fm/c.jpg', 'Coca-Cola', 1, 3),
(1332, 137, 69, 'images/fm/coffee.jpg', 'Hot coffee', 1, 34);

-- --------------------------------------------------------

--
-- Table structure for table `forder`
--

CREATE TABLE `forder` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `username` text NOT NULL,
  `cardname` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `bankinfo` text NOT NULL,
  `date` datetime NOT NULL,
  `accountemail` text NOT NULL,
  `accountphone` text NOT NULL,
  `deliveryorpickup` int(100) NOT NULL,
  `deliveryaddress` text NOT NULL,
  `deliveryphone` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forder`
--

INSERT INTO `forder` (`id`, `userid`, `username`, `cardname`, `phone`, `address`, `email`, `bankinfo`, `date`, `accountemail`, `accountphone`, `deliveryorpickup`, `deliveryaddress`, `deliveryphone`, `status`) VALUES
(136, 21, '123', '123', '123', '123', '123@gmail.com', '123', '2021-12-05 01:22:16', '123@gmail.com', '123', 1, '', '', 1),
(137, 21, '123', '123', '123', '123', '123@gmail.com', '123', '2021-12-10 00:24:43', '123@gmail.com', '123', 1, '', '', 1),
(138, 21, '123', '', '', '', '', '', '0000-00-00 00:00:00', '', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(100) NOT NULL,
  `foodname` text NOT NULL,
  `foodimage` text NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `category` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `foodname`, `foodimage`, `description`, `price`, `category`) VALUES
(62, 'Sandwitch', 'images/fm/2.jpg', 'Vegetable + delicious bread', 12, 25),
(63, 'Fried chicken bread', 'images/fm/1.jpg', 'Fried chicken + bread', 4, 25),
(64, 'Fried chips + French Beef', 'images/fm/3.jpg', 'Chips and french beef', 24, 25),
(65, 'Fried chicken salad', 'images/fm/4.jpeg', 'Fried chicken and salad', 45, 25),
(66, 'Chocolate ice cream', 'images/fm/9.jpg', 'Brussels Chocolate and ice cream', 43, 26),
(67, 'French chocolate cake', 'images/fm/Chocolate_Golgappe.jpg', 'French chocolate', 4, 26),
(68, 'Black cake', 'images/fm/Chocolate_Hazelnut_Truffle.jpg', 'Chocolate, hazalnut and bread', 23, 26),
(69, 'Hot coffee', 'images/fm/coffee.jpg', 'Classic  coffe', 34, 27),
(70, 'Coca-Cola', 'images/fm/c.jpg', 'Coca-Cola (330ml)', 3, 27),
(71, 'Hawaiian pizza', 'images/fm/hp.jpg', 'Beef, Hawaiian mango', 5, 28),
(72, 'Combined Pizza', 'images/fm/Pizza.jpg', 'Combined with different taste pizza', 10, 28),
(73, 'Fried fish', 'images/fm/Meurig.jpg', 'Fried sea bass', 18, 29),
(74, 'Fried lobster and shrimp', 'images/fm/shirp.jpg', 'Shrimp， Sausage, corn and lobster', 43, 29);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `userpassword` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `userpassword`, `email`, `phone`) VALUES
(21, '123', '123', '123@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dorder`
--
ALTER TABLE `dorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forder`
--
ALTER TABLE `forder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dorder`
--
ALTER TABLE `dorder`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1335;

--
-- AUTO_INCREMENT for table `forder`
--
ALTER TABLE `forder`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
