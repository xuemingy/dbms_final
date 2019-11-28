-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 28, 2019 at 04:33 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `final_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `business_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `grs_an_incm` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`business_id`, `customer_id`, `category`, `grs_an_incm`) VALUES
(1, 2, 'health', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(5) NOT NULL,
  `cityname` varchar(20) DEFAULT NULL,
  `state_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `cityname`, `state_id`) VALUES
(1, 'Pittsburgh', 1),
(2, 'Philadelphia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custKind`
--

CREATE TABLE `custKind` (
  `custkind_id` int(5) NOT NULL,
  `kind` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custKind`
--

INSERT INTO `custKind` (`custkind_id`, `kind`) VALUES
(1, 'home'),
(2, 'business');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(5) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `city_id` int(5) DEFAULT NULL,
  `zipcode` int(5) DEFAULT NULL,
  `custkind_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `street`, `city_id`, `zipcode`, `custkind_id`) VALUES
(1, 'firstName', 'yang', '5701 center', 1, 15206, 1),
(2, 'pitt clinic', NULL, '5701 center', 2, 15206, 2),
(3, 'yuki', 'yang', '5701 center', 2, 15206, 1);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `mrg_state` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `income` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `customer_id`, `mrg_state`, `gender`, `age`, `income`) VALUES
(1, 1, 'N', 'F', 22, 2000000),
(2, 3, 'N', 'F', 22, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(5) NOT NULL,
  `prod_name` varchar(20) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `cost` int(10) DEFAULT NULL,
  `rate` double(4,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `amount`, `price`, `cost`, `rate`) VALUES
(1, 'Pay-As-You-Park', '99', 269, 3, 0.090),
(2, 'Travel Trailer', '31', 410, 7, 0.010),
(3, 'Apartment & Condo', '66', 82, 46, 0.920),
(4, 'Universal Life', '58', 801, 11, 0.350),
(5, 'Term Life', '64', 126, 29, 0.730),
(6, 'Disability Insurance', '6', 635, 4, 0.660),
(7, 'Pet Insurance', '68', 507, 2, 0.760),
(8, 'Mobile Home', '52', 425, 12, 0.380);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(5) NOT NULL,
  `region_name` varchar(20) NOT NULL,
  `region_manager_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`, `region_manager_id`) VALUES
(1, 'Great Pitt', 3);

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE `salesperson` (
  `sid` int(5) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city_id` int(5) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `email` varchar(15) NOT NULL,
  `title` varchar(20) NOT NULL,
  `store_id` int(5) NOT NULL,
  `salary` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`sid`, `first_name`, `last_name`, `street`, `city_id`, `zipcode`, `email`, `title`, `store_id`, `salary`) VALUES
(1, 'Xueming', 'Yang', '5701 center', 1, 15206, 'xuy22@pitt.edu', 'Manager', 1, 2000000),
(2, 'yuki', 'yang', '5701 center', 1, 15206, 'xuy22@pitt.edu', 'sales person', 1, 5000),
(3, 'Bigboss', 'yang', '5701 center', 1, 12292, 'xuy22@pitt.edu', 'CEO', 1, 10000000),
(4, 'Store2Mgr', 'Pitt', '5100, 500', 1, 12121, 'sci@pitt.edu', 'Manager', 2, 222222);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(5) NOT NULL,
  `statename` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `statename`) VALUES
(1, 'Pennsylvania');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(5) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city_id` int(5) NOT NULL,
  `manager_id` int(5) NOT NULL,
  `faculty` int(5) NOT NULL,
  `region_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `street`, `city_id`, `manager_id`, `faculty`, `region_id`) VALUES
(1, 'Pitt-Shadyside', '5701 center', 1, 1, 30, 1),
(2, 'Pitt-university', '3232 ave', 1, 4, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `order_id` int(10) NOT NULL,
  `trans_date` date NOT NULL,
  `total_price` int(10) DEFAULT NULL,
  `sid` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trans_prod`
--

CREATE TABLE `trans_prod` (
  `order_id` int(10) NOT NULL,
  `prod_id` int(5) NOT NULL,
  `price` int(10) DEFAULT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `customer_id`) VALUES
(1, 'xuy22@pitt.edu', '$2y$10$lmv9x2dNh3Li2WEd6Upk0uMSRxR5JoUTuZ1q5UswGz/HzTz0n.6Vm', 1),
(2, 'testemaillength@pitt.edu', '$2y$10$vMRlwExBf/dTyT0I.QY60.m5FnGdlaAPHlOX3q3KIIab/oMhqBYyO', 2),
(3, 'yangxueming@test.com', '$2y$10$iY63PM7FNkz/9nFGnzMqTezC/qQ9GENSHemWkz/ys0y5SUbcwX7Iu', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`business_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `custKind`
--
ALTER TABLE `custKind`
  ADD PRIMARY KEY (`custkind_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `custkind_id` (`custkind_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `trans_prod`
--
ALTER TABLE `trans_prod`
  ADD PRIMARY KEY (`order_id`,`prod_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `business_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custKind`
--
ALTER TABLE `custKind`
  MODIFY `custkind_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salesperson`
--
ALTER TABLE `salesperson`
  MODIFY `sid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_prod`
--
ALTER TABLE `trans_prod`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`custkind_id`) REFERENCES `custKind` (`custkind_id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `home_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);
