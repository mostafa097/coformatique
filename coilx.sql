-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2018 at 04:35 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coilx`
--

-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE `capacity` (
  `id` int(11) NOT NULL,
  `from_cap` double NOT NULL,
  `to_cap` double NOT NULL,
  `size` int(11) NOT NULL,
  `cod_heaterId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capacity`
--

INSERT INTO `capacity` (`id`, `from_cap`, `to_cap`, `size`, `cod_heaterId`) VALUES
(1, 9000, 14000, 12000, 1),
(2, 14001, 21000, 18000, 1),
(3, 21001, 26000, 24000, 1),
(4, 26001, 32000, 30000, 1),
(5, 32001, 38500, 36000, 1),
(6, 38501, 54000, 48000, 1),
(7, 54001, 65000, 60000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `condition_heater`
--

CREATE TABLE `condition_heater` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `condition_heater`
--

INSERT INTO `condition_heater` (`id`, `name`) VALUES
(1, 'Air Condition'),
(2, 'Heater');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `address` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `engid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone`, `code`, `engid`) VALUES
(1, 'Mostafa Hammad', '120 Takka street - nasr city', '01118390924', 100, 0),
(2, 'has', '232h hhhhh', '01118390922', 100, 1),
(5, 'aa', NULL, NULL, NULL, 0),
(6, 'mah', NULL, NULL, NULL, 0),
(7, 'mah', NULL, NULL, NULL, 0),
(8, 'mas', NULL, NULL, NULL, 0),
(19, 'hammad beh talet', NULL, NULL, NULL, 0),
(20, 'testing', NULL, NULL, NULL, 0),
(21, 'hahaha', NULL, NULL, NULL, 0),
(22, 'haha', NULL, NULL, NULL, 0),
(23, 'tara', NULL, NULL, NULL, 0),
(24, 'lalala', NULL, NULL, NULL, 0),
(25, 'sewsew', NULL, NULL, NULL, 0),
(26, 'kke', NULL, NULL, NULL, 0),
(27, 'zz', NULL, NULL, NULL, 0),
(28, 'bnh', NULL, NULL, NULL, 0),
(29, 'tou', NULL, NULL, NULL, 0),
(30, 'zew', NULL, NULL, NULL, 0),
(31, 'hammad fam', NULL, NULL, NULL, 0),
(32, 'vvvv', NULL, NULL, NULL, 0),
(33, 'bob', NULL, NULL, NULL, 0),
(34, 'kantloba', NULL, NULL, NULL, 0),
(35, 'egmad', NULL, NULL, NULL, 0),
(36, 'Radwa Ashash', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

CREATE TABLE `engineer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engineer`
--

INSERT INTO `engineer` (`id`, `name`, `phone`) VALUES
(1, 'Hamada seya7a', '011820909'),
(2, 'egmad', NULL),
(3, 'Bm', NULL),
(4, 'Radwa Ashash', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE `extra` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `Rprice` float NOT NULL,
  `Cprice` float NOT NULL,
  `airCond` int(11) NOT NULL,
  `is_hidden` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `extra`
--

INSERT INTO `extra` (`id`, `name`, `Rprice`, `Cprice`, `airCond`, `is_hidden`) VALUES
(1, 'test', 50, 100, 1, 1),
(2, 'abc', 100, 50, 1, 1),
(3, 'ab', 1, 5, 1, 1),
(4, 'Refrigerant pipe complete with cables an', 145, 300, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `name`) VALUES
(1, 'fa fa-user'),
(2, 'fas fa-shopping-cart');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(1, 'Ground Floor'),
(2, 'First Floor'),
(3, 'Basement Floor'),
(4, 'Roof Floor');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `userid`, `username`, `password`) VALUES
(4, 1, 'hassan', '123'),
(5, 4, 'sarah12', 'dremanmostafa');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`) VALUES
(1, 'Concealed'),
(2, 'Hi-wall');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `engid` int(11) NOT NULL,
  `devid` int(11) NOT NULL,
  `date` date NOT NULL,
  `addedby` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `custid`, `engid`, `devid`, `date`, `addedby`, `status`) VALUES
(49, 5, 2, 1, '2018-09-15', 1, 0),
(50, 28, 2, 1, '2018-09-15', 1, 0),
(51, 35, 1, 1, '2018-09-15', 1, 0),
(52, 5, 2, 1, '2018-09-16', 1, 0),
(53, 30, 3, 1, '2018-09-16', 1, 0),
(55, 34, 1, 1, '2018-09-16', 1, 0),
(56, 19, 2, 1, '2018-09-19', 1, 0),
(57, 5, 3, 1, '2018-09-19', 1, 0),
(58, 36, 4, 1, '2018-09-19', 1, 0),
(59, 28, 3, 1, '2018-09-19', 1, 0),
(60, 5, 2, 1, '2018-09-20', 1, 0),
(61, 5, 3, 1, '2018-09-24', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_extras`
--

CREATE TABLE `order_extras` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `extraid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_extras`
--

INSERT INTO `order_extras` (`id`, `orderid`, `extraid`, `quantity`) VALUES
(55, 49, 1, 10),
(56, 50, 1, 10),
(57, 51, 1, 12),
(58, 52, 1, 44),
(59, 53, 1, 50),
(60, 53, 1, 60),
(61, 56, 1, 80),
(62, 56, 1, 80),
(63, 56, 1, 80),
(64, 57, 4, 80),
(65, 58, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `path` varchar(60) NOT NULL,
  `parentid` int(11) NOT NULL,
  `posid` int(11) NOT NULL,
  `iconid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `path`, `parentid`, `posid`, `iconid`) VALUES
(1, 'User', 'user', 0, 1, 1),
(2, 'New User', 'new_user.php', 1, 1, 0),
(3, 'Delete User', 'delete_user.php', 1, 1, 0),
(5, 'Order', 'order', 0, 1, 2),
(6, 'Technical Order', 'order.php', 5, 1, 0),
(7, 'Financial Order', 'Forder.php', 5, 1, 0),
(8, 'Extras', 'extra', 0, 1, 2),
(9, 'Add Product', 'add_product.php', 8, 1, 0),
(11, 'Add Extra', 'add_extra.php', 8, 1, 0),
(12, 'Accept Order', 'Aorder.php', 5, 1, 0),
(13, 'Edit / Delete Product', 'edit_product.php', 8, 1, 0),
(14, 'Edit / Delete Extra', 'edt_extra.php', 8, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `model` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `rprice` float NOT NULL,
  `cprice` float NOT NULL,
  `devid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `model`, `size`, `rprice`, `cprice`, `devid`) VALUES
(1, 'Carrier QDM 60,000 (7.5 Hp)', 1, 7, 29618, 29618, 1),
(2, 'Carrier QDM 48,000 (6.5 Hp)', 1, 6, 26070, 26070, 1),
(3, 'Carrier QDM 36,000 (5.0 Hp)', 1, 5, 18928, 18928, 1),
(4, 'Carrier QDM 30,000 (4.0 Hp)', 1, 4, 16128, 16128, 1),
(5, 'Carrier QDM 24,000 (3.0 Hp)', 1, 3, 12582, 12582, 1),
(6, 'Carrier QDM 18,000 (2.2 Hp)', 1, 2, 10976, 10976, 1),
(7, 'Carrier Hi-wall 36,000 (5.0 Hp)', 2, 5, 21056, 21056, 1),
(8, 'Carrier Hi-wall 30,000 (4.0 Hp)', 2, 4, 18312, 18312, 1),
(9, 'Carrier Hi-wall 24,000 (3.0 Hp)', 2, 3, 11872, 11872, 1),
(10, 'Carrier Hi-wall 18,000 (2.2 Hp)', 2, 2, 10248, 10248, 1),
(11, 'Carrier Hi-wall 12,000    (1.5 Hp)', 2, 1, 8131, 8131, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productype`
--

CREATE TABLE `productype` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `salary` float NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `technicalorder`
--

CREATE TABLE `technicalorder` (
  `id` int(11) NOT NULL,
  `zoneid` int(11) NOT NULL,
  `area` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `modelid` int(11) NOT NULL,
  `size` float NOT NULL,
  `is_hidden` int(11) NOT NULL DEFAULT '0',
  `lvl_id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `factor` float NOT NULL,
  `cond_heater_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technicalorder`
--

INSERT INTO `technicalorder` (`id`, `zoneid`, `area`, `quantity`, `modelid`, `size`, `is_hidden`, `lvl_id`, `orderid`, `factor`, `cond_heater_id`) VALUES
(57, 1, 50, 1, 1, 48000, 0, 3, 49, 1, 1),
(58, 1, 64, 1, 1, 60000, 0, 3, 50, 1, 1),
(59, 1, 64, 1, 2, 60000, 0, 3, 51, 1, 1),
(60, 3, 100, 2, 2, 48000, 0, 2, 51, 1, 1),
(61, 2, 120, 2, 2, 60000, 0, 2, 51, 1, 1),
(62, 2, 24, 1, 1, 24000, 0, 3, 52, 1, 1),
(66, 3, 200, 4, 1, 48000, 0, 2, 53, 1, 1),
(67, 3, 200, 3, 1, 48000, 0, 2, 53, 1, 1),
(68, 3, 180, 4, 1, 48000, 0, 2, 53, 1, 1),
(69, 3, 180, 4, 1, 48000, 0, 2, 53, 1, 1),
(70, 2, 35, 1, 1, 36000, 0, 2, 53, 1, 1),
(71, 4, 45, 1, 1, 48000, 0, 3, 55, 1, 1),
(75, 4, 45, 1, 1, 48000, 0, 3, 55, 1, 1),
(77, 2, 25, 1, 1, 24000, 0, 3, 56, 1, 1),
(78, 3, 40, 1, 1, 48000, 0, 3, 56, 1, 1),
(79, 3, 36, 1, 1, 36000, 0, 3, 56, 1, 1),
(80, 1, 36, 1, 1, 36000, 0, 3, 57, 1, 1),
(81, 3, 200, 4, 1, 48000, 0, 2, 58, 1, 1),
(82, 3, 64, 1, 1, 60000, 0, 2, 59, 1, 1),
(85, 2, 23, 2, 2, 12000, 0, 3, 60, 1, 1),
(86, 2, 60, 1, 1, 60000, 0, 3, 61, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mobile_number`, `usertype`) VALUES
(1, 'Hassan Hamdy', '01118309024', 1),
(4, 'Sarah Nabil', '01119090222', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `type`) VALUES
(1, 'Owner'),
(2, 'Ø­Ø³Ø§Ø¨Ø§Øª'),
(3, 'Ø§Ø¯Ø§Ø±Ø© ØªÙ†ÙÙŠØ°ÙŠØ©');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `id` int(11) NOT NULL,
  `level` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `level`) VALUES
(1, 'Kitchen'),
(2, 'Bedroom'),
(3, 'Reception '),
(4, 'Dinning'),
(5, 'Master Bedroom'),
(6, 'Living');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_heaterId` (`cod_heaterId`);

--
-- Indexes for table `condition_heater`
--
ALTER TABLE `condition_heater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineer`
--
ALTER TABLE `engineer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airCond` (`airCond`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custid` (`custid`),
  ADD KEY `engid` (`engid`),
  ADD KEY `devid` (`devid`),
  ADD KEY `addedby` (`addedby`);

--
-- Indexes for table `order_extras`
--
ALTER TABLE `order_extras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extaid` (`extraid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model` (`model`);

--
-- Indexes for table `productype`
--
ALTER TABLE `productype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `technicalorder`
--
ALTER TABLE `technicalorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modelid` (`modelid`),
  ADD KEY `zoneid` (`zoneid`),
  ADD KEY `lvl` (`lvl_id`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `cond_heater_id` (`cond_heater_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype` (`usertype`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capacity`
--
ALTER TABLE `capacity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `condition_heater`
--
ALTER TABLE `condition_heater`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `engineer`
--
ALTER TABLE `engineer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `extra`
--
ALTER TABLE `extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `order_extras`
--
ALTER TABLE `order_extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `productype`
--
ALTER TABLE `productype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `technicalorder`
--
ALTER TABLE `technicalorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `capacity`
--
ALTER TABLE `capacity`
  ADD CONSTRAINT `Capacity_ibfk_1` FOREIGN KEY (`cod_heaterId`) REFERENCES `condition_heater` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `extra`
--
ALTER TABLE `extra`
  ADD CONSTRAINT `extra_ibfk_1` FOREIGN KEY (`airCond`) REFERENCES `condition_heater` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`engid`) REFERENCES `engineer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`devid`) REFERENCES `condition_heater` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`addedby`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_extras`
--
ALTER TABLE `order_extras`
  ADD CONSTRAINT `order_extras_ibfk_1` FOREIGN KEY (`extraid`) REFERENCES `extra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_extras_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `technicalorder`
--
ALTER TABLE `technicalorder`
  ADD CONSTRAINT `lvl` FOREIGN KEY (`lvl_id`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `technicalOrder_ibfk_4` FOREIGN KEY (`modelid`) REFERENCES `model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `technicalOrder_ibfk_5` FOREIGN KEY (`zoneid`) REFERENCES `zone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `technicalorder_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `technicalorder_ibfk_2` FOREIGN KEY (`cond_heater_id`) REFERENCES `condition_heater` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`usertype`) REFERENCES `usertype` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
