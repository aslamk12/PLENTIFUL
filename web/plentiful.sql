-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2020 at 02:02 PM
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
  `email` varchar(20) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(10) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category_name`, `image`) VALUES
(5, 'Ladies Fashion', '1601453513.jpeg');

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
(4, 'employee1', 'emp1@gmail.com', 9638527410, '2020-01-01', 'emp1 address'),
(5, 'employye2', 'emp2@gmail.com', 7418529, '2020-01-01', 'emp2 address');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `password`, `type`) VALUES
(1, 'admin@gmail.com', 'admin123', 'admin'),
(2, 'seller@gmail.com', 'seller123', 'seller'),
(3, 'emp1@gmail.com', 'qwerty', 'employee'),
(4, 'emp2@gmail.com', 'qwerty', 'employee'),
(5, 'seller2@gmail.com', 'qwerty', 'seller');

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
(5, 'Seller1', 'seller@gmail.com', 7894561230, '2020-01-01', 'Seller Address', '7894561230@apl'),
(6, 'seller2', 'seller2@gmail.com', 7894561230, '2020-02-02', 'seller 2 address', '7894561230@apl');

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
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_registration`
--
ALTER TABLE `seller_registration`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
