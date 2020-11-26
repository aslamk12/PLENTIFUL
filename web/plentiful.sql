-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2020 at 09:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plentiful`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_delivery`
--

CREATE TABLE `assigned_delivery` (
  `ad_id` int(5) NOT NULL,
  `d_id` int(5) NOT NULL,
  `emp_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_delivery`
--

INSERT INTO `assigned_delivery` (`ad_id`, `d_id`, `emp_id`) VALUES
(5, 6, 14),
(6, 8, 14);

-- --------------------------------------------------------

--
-- Table structure for table `buyer_registration`
--

CREATE TABLE `buyer_registration` (
  `b_id` int(5) NOT NULL,
  `b_name` varchar(30) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_registration`
--

INSERT INTO `buyer_registration` (`b_id`, `b_name`, `mobile`, `email`, `dob`) VALUES
(1, 'aslam', 9567105860, 'aslam@gmail.com', '1998-08-17'),
(8, 'suhail a k', 9633058949, 'suhail@gmail.com', '1998-01-01'),
(9, 'yuno', 9876543210, 'yuno@gmail.com', '1998-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL,
  `b_id` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `p_id`, `b_id`, `qty`, `total`, `status`) VALUES
(67, 12, 8, 1, 500, '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(10) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category_name`, `image`) VALUES
(19, 'Craft and Decoration', '1606116888.jpg'),
(21, 'Gents Fashion', '1606421425.jpg'),
(22, 'Ladies Fashion', '1606421499.png'),
(23, 'Toys', '1606421555.png'),
(24, 'Foods', '1606421621.jpg'),
(25, 'Cake ', '1606421675.png');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `d_id` int(5) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `s_id` int(5) NOT NULL,
  `o_id` int(5) NOT NULL,
  `total` int(8) NOT NULL,
  `sts` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`d_id`, `product_name`, `s_id`, `o_id`, `total`, `sts`) VALUES
(6, 't shirt', 8, 36, 200, 'completed'),
(8, 'dolls', 8, 38, 500, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `del_address`
--

CREATE TABLE `del_address` (
  `o_id` int(5) NOT NULL,
  `b_id` int(5) NOT NULL,
  `oi_id` int(5) NOT NULL,
  `buy_name` varchar(20) NOT NULL,
  `mobile` bigint(13) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` int(9) NOT NULL,
  `landmark` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `del_address`
--

INSERT INTO `del_address` (`o_id`, `b_id`, `oi_id`, `buy_name`, `mobile`, `address`, `city`, `pincode`, `landmark`) VALUES
(36, 8, 36, 'Aslam K', 9567105860, 'kallingal', 'edapal', 679576, 'kseb'),
(37, 8, 37, 'suhail', 7736918949, 'valathel', 'calicut', 679576, 'kseb'),
(38, 8, 38, 'Aslam K', 9567405860, 'kallingal', 'edapal', 679576, 'kseb');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(10) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_email` varchar(30) NOT NULL,
  `emp_mobile` bigint(15) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `emp_name`, `emp_email`, `emp_mobile`, `emp_dob`, `emp_address`) VALUES
(10, 'emp del', 'empd@gmail.com', 9874562130, '2020-01-01', 'empd address'),
(11, 'Ram', 'ram@gmail.com', 7894561230, '1998-01-01', 'Ram House'),
(12, 'Eren', 'eren@gmail.com', 9685743021, '1999-01-01', 'eren villa'),
(13, 'usopp', 'usopp@gmail.com', 6549873210, '2005-01-01', 'grand line'),
(14, 'asta', 'asta@gmail.com', 9567105860, '1998-01-01', 'grand line');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `password`, `type`, `status`) VALUES
(1, 'admin@gmail.com', 'admin123', 'admin', ''),
(17, 'Ram@gmail.com', 'ram123', 'seller', 'approved'),
(18, 'suhail@gmail.com', 'suhail1234', 'buyer', 'approved'),
(20, 'eren@gmail.com', 'eren123', 'employee', 'disable'),
(21, 'naruto@gmail.com', 'naruto123', 'seller', 'approved'),
(23, 'yuno@gmail.com', 'qwerty', 'buyer', 'approved'),
(24, 'zoro@gmail.com', 'zoro123', 'seller', 'pending'),
(25, 'nami@gmail.com', 'nami123', 'seller', 'pending'),
(26, 'usopp@gmail.com', 'usopp123', 'employee', 'approved'),
(27, 'asta@gmail.com', 'asta123', 'employee', 'approved'),
(28, 'jhon@gmail.com', 'jhon123', 'seller', 'approved'),
(29, 'vivek@gmail.com', 'vivek123', 'seller', 'pending'),
(30, 'ravi@gmail.com', 'ravi123', 'seller', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `oi_id` int(5) NOT NULL,
  `b_id` int(5) NOT NULL,
  `cart_id` int(5) NOT NULL,
  `item_total` int(9) NOT NULL,
  `del_charge` int(8) NOT NULL,
  `del_time` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `production_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`oi_id`, `b_id`, `cart_id`, `item_total`, `del_charge`, `del_time`, `status`, `production_status`) VALUES
(35, 8, 64, 250, 40, '2020-12-20', 'pending', 'pending'),
(36, 8, 65, 450, 40, '2020-12-20', 'pending', 'pending'),
(37, 8, 66, 550, 40, '2020-12-20', 'pending', 'pending'),
(38, 8, 67, 500, 40, '2020-12-20', 'confirmed', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(5) NOT NULL,
  `d_id` int(5) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `d_id`, `status`) VALUES
(6, 6, 'pending'),
(7, 8, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `category` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(5) NOT NULL,
  `stock` int(5) NOT NULL,
  `time_for_production` time NOT NULL,
  `discription` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `s_id`, `product_name`, `category`, `image`, `price`, `stock`, `time_for_production`, `discription`) VALUES
(10, 8, 'churidar', 'Ladies fashion', '1606118700.jpg', 100, 2, '01:30:00', 'good product'),
(11, 8, 'black forest', 'Cake', '1606118731.jpg', 300, 5, '01:30:00', 'good product'),
(12, 8, 'dolls', 'Toys', '1606118763.jpeg', 500, 7, '01:30:00', 'good product'),
(13, 8, 't shirt', 'Gents fashion', '1606118809.jpeg', 200, 30, '01:30:00', 'good product'),
(15, 9, 'Blue Shirt', 'Gents fashion', '1606372103.jpg', 250, 5, '01:30:00', 'Blue shirt,good material,100% cotton'),
(16, 8, 'pizza', 'Food', '1606418689.jpg', 50, 10, '02:30:00', 'good product,very tasty and healthy pizza'),
(17, 9, 'blue sari', 'Ladies fashion', '1606419123.jpg', 500, 9, '01:30:00', 'good product'),
(18, 9, 'blue berry cake', 'Cake', '1606419206.jpg', 800, 8, '02:30:00', 'good product'),
(19, 9, 'Blue car', 'Toys', '1606419361.jpg', 160, 4, '01:30:00', 'good product'),
(20, 9, 'Blue gelly', 'Food', '1606419444.jpg', 20, 9, '01:30:00', 'good product');

-- --------------------------------------------------------

--
-- Table structure for table `seller_orders`
--

CREATE TABLE `seller_orders` (
  `sl_id` int(5) NOT NULL,
  `oi_id` int(5) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_orders`
--

INSERT INTO `seller_orders` (`sl_id`, `oi_id`, `status`) VALUES
(5, 36, 'completed'),
(6, 37, 'completed'),
(7, 38, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `seller_registration`
--

CREATE TABLE `seller_registration` (
  `s_id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` bigint(13) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(250) NOT NULL,
  `upi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_registration`
--

INSERT INTO `seller_registration` (`s_id`, `name`, `email`, `mobile`, `dob`, `address`, `upi`) VALUES
(8, 'Ram', 'Ram@gmail.com', 9865327410, '2020-01-01', 'Ram villa', '9865327410@apl'),
(9, 'Naruto', 'naruto@gmail.com', 8978897889, '2000-01-01', 'Leaf village', '8978897889@apl'),
(13, 'jhon', 'jhon@gmail.com', 9876543210, '1998-07-18', 'jhonvilla', '9876543210@apl'),
(14, 'vivek', 'vivek@gmail.com', 9865327410, '2000-01-01', 'vivek villa', '9865327410@apl'),
(15, 'Ravi', 'ravi@gmail.com', 7894561203, '2002-01-01', 'Ravi villa', '7894561203@apl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_delivery`
--
ALTER TABLE `assigned_delivery`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `buyer_registration`
--
ALTER TABLE `buyer_registration`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `cart_ibfk_1` (`p_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `del_address`
--
ALTER TABLE `del_address`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `del_address_ibfk_1` (`oi_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`oi_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `seller_orders`
--
ALTER TABLE `seller_orders`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `seller_registration`
--
ALTER TABLE `seller_registration`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_delivery`
--
ALTER TABLE `assigned_delivery`
  MODIFY `ad_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buyer_registration`
--
ALTER TABLE `buyer_registration`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `d_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `del_address`
--
ALTER TABLE `del_address`
  MODIFY `o_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `oi_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `seller_orders`
--
ALTER TABLE `seller_orders`
  MODIFY `sl_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seller_registration`
--
ALTER TABLE `seller_registration`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `del_address`
--
ALTER TABLE `del_address`
  ADD CONSTRAINT `del_address_ibfk_1` FOREIGN KEY (`oi_id`) REFERENCES `order_item` (`oi_id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `buyer_registration` (`b_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `seller_registration` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
