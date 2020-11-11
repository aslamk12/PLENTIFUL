-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2020 at 12:34 PM
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
(8, 'suhail A K', 9633058949, 'suhail@gmail.com', '1998-01-01'),
(9, 'yuno', 9876543210, 'yuno@gmail.com', '1998-10-01');

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
(5, 'Gents Fashion', '1601453513.jpeg'),
(6, 'Toys', '1602618408.jpg'),
(7, 'Cake', '1602665185.jpg'),
(8, 'Ladies Fashion', '1603262759.jpeg'),
(13, 'Craft and Decoration', '1604505250.jpg');

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
(13, 'usopp', 'usopp@gmail.com', 6549873210, '2005-01-01', 'grand line');

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
(6, 'aslam@gmail.com', 'qwerty', 'buyer', ''),
(16, 'empd@gmail.com', 'empd123', 'employee', 'disable'),
(17, 'sellerd@gmail.com', 'seller123', 'seller', 'approved'),
(18, 'suhail@gmail.com', 'suhail1234', 'buyer', 'approved'),
(19, 'ram@gmail.com', 'ram123', 'employee', 'disable'),
(20, 'eren@gmail.com', 'eren123', 'employee', 'approved'),
(21, 'naruto@gmail.com', 'naruto123', 'seller', 'pending'),
(22, 'luffy@gmail.com', 'luffy123', 'seller', 'approved'),
(23, 'yuno@gmail.com', 'qwerty', 'buyer', 'approved'),
(24, 'zoro@gmail.com', 'zoro123', 'seller', 'pending'),
(25, 'nami@gmail.com', 'nami123', 'seller', 'pending'),
(26, 'usopp@gmail.com', 'usopp123', 'employee', 'pending');

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
(6, 8, 'shirt', 'Gents Fashion', '1603188231.jpg', 150, 5, '01:30:00', 'good product'),
(7, 8, 'sari', 'Ladies Fashion', '1603262924.jpeg', 550, 10, '15:00:00', 'good product'),
(8, 8, 'Black forest', 'Cake', '1603269015.jpg', 200, 5, '01:30:00', 'good product');

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
(8, 'seller demo', 'sellerd@gmail.com', 9865327410, '2020-01-01', 'Seller Home', '9865327410@apl'),
(9, 'Naruto', 'naruto@gmail.com', 8978897889, '2000-01-01', 'Leaf village', '8978897889@apl'),
(10, 'luffy', 'luffy@gmail.com', 7878787878, '2001-01-01', 'grand line', '7878787878@apl'),
(11, 'zoro', 'zoro@gmail.com', 9865327410, '1999-01-01', 'grand line', '9865327410@apl'),
(12, 'nami', 'nami@gmail.com', 7894105263, '2000-01-01', 'grand line', '7894105263@apl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_registration`
--
ALTER TABLE `buyer_registration`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `seller_registration`
--
ALTER TABLE `seller_registration`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_registration`
--
ALTER TABLE `buyer_registration`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seller_registration`
--
ALTER TABLE `seller_registration`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `seller_registration` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
