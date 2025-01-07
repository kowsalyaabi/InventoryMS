-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 11:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `userid` varchar(50) NOT NULL,
  `balance` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`userid`, `balance`) VALUES
('admin@mail.com', '5000'),
('chan@mail.com', '500'),
('kowc@mail.com', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `ims_brand`
--

CREATE TABLE `ims_brand` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `bname` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_brand`
--

INSERT INTO `ims_brand` (`id`, `categoryid`, `bname`, `status`) VALUES
(1, 2, 'Brand 1', 'active'),
(2, 2, 'Brand 2', 'active'),
(3, 2, 'Brand 3', 'active'),
(4, 1, 'Brand 201', 'active'),
(5, 1, 'Brand 202', 'active'),
(6, 1, 'Brand 203', 'active'),
(7, 3, 'Brand 301', 'active'),
(8, 3, 'Brand 302', 'active'),
(9, 3, 'Brand 303', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ims_category`
--

CREATE TABLE `ims_category` (
  `categoryid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_category`
--

INSERT INTO `ims_category` (`categoryid`, `name`, `status`) VALUES
(1, 'Smartphone', 'active'),
(2, 'Random Item', 'active'),
(3, 'Speaker', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ims_customer`
--

CREATE TABLE `ims_customer` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `reg` varchar(15) NOT NULL,
  `year` varchar(10) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_customer`
--

INSERT INTO `ims_customer` (`user_id`, `password`, `name`, `reg`, `year`, `dept`, `mobile`) VALUES
('admin@mail.com', 'chan@2003', 'Chandru', '613520104006', '3', 'CSE', '9360373727'),
('kowc@mail.com', 'kowc123', 'Kowsalya.R', '6135', 'III', 'CSE', '6382536993');

-- --------------------------------------------------------

--
-- Table structure for table `ims_order`
--

CREATE TABLE `ims_order` (
  `order_id` varchar(15) NOT NULL,
  `user` varchar(20) NOT NULL,
  `product` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_order`
--

INSERT INTO `ims_order` (`order_id`, `user`, `product`, `quantity`, `price`) VALUES
('A1001', 'admin@mail.com', 'p101', '2', '10'),
('A1002', 'admin@mail.com', 'P102', '10', '1000'),
('A1003', 'kowc@mail.com', 'P201', '2', '100'),
('A1004', 'admin@mail.com', 'P202', '2', '20');

-- --------------------------------------------------------

--
-- Table structure for table `ims_product`
--

CREATE TABLE `ims_product` (
  `pid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `pname` varchar(300) NOT NULL,
  `model` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(150) NOT NULL,
  `base_price` double(10,2) NOT NULL,
  `tax` decimal(4,2) NOT NULL,
  `minimum_order` double(10,2) NOT NULL,
  `supplier` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_product`
--

INSERT INTO `ims_product` (`pid`, `categoryid`, `brandid`, `pname`, `model`, `description`, `quantity`, `unit`, `base_price`, `tax`, `minimum_order`, `supplier`, `status`, `date`) VALUES
(1, 2, 1, 'Product 101', 'P-1001', 'usce auctor faucibus efficitur.', 10, 'Bottles', 500.00, '12.00', 1.00, 1, 'active', '0000-00-00'),
(2, 1, 4, 'Product 102', 'P-1002', 'Proin vehicula mi pulvinar ipsum ornare tincidunt.', 15, 'Box', 750.00, '12.00', 1.00, 2, 'active', '0000-00-00'),
(3, 3, 7, 'Product 103', 'P-1003', 'Integer interdum, odio eget mattis venenatis', 20, 'Bags', 350.00, '12.00', 1.00, 3, 'active', '0000-00-00'),
(4, 2, 1, 'Abcd', 'efg', 'none', 1, 'Bottles', 500.00, '5.00', 1.00, 1, 'active', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ims_purchase`
--

CREATE TABLE `ims_purchase` (
  `purchase_id` int(11) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_purchase`
--

INSERT INTO `ims_purchase` (`purchase_id`, `supplier_id`, `product_id`, `quantity`, `purchase_date`) VALUES
(1, '1', '1', '25', '2022-06-20 08:20:07'),
(2, '2', '2', '35', '2022-06-20 08:20:14'),
(3, '3', '3', '10', '2022-06-20 08:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `ims_supplier`
--

CREATE TABLE `ims_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_supplier`
--

INSERT INTO `ims_supplier` (`supplier_id`, `supplier_name`, `mobile`, `address`, `status`) VALUES
(1, 'Supplier 101', '09645987123', 'Over Here', 'active'),
(2, 'Supplier 102', '094568791252', 'Over There', 'active'),
(3, 'Supplier 103', '09789897879', 'Anywhere There', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ims_user`
--

CREATE TABLE `ims_user` (
  `userid` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` enum('admin','member') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_user`
--

INSERT INTO `ims_user` (`userid`, `email`, `password`, `name`, `type`, `status`) VALUES
(1, 'admin@mail.com', '0192023a7bbd73250516f069df18b500', 'Administrator', 'admin', 'Active'),
(2, 'chandru@mail.com', 'chan@123', 'Chandru', 'member', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `ims_brand`
--
ALTER TABLE `ims_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ims_category`
--
ALTER TABLE `ims_category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `ims_customer`
--
ALTER TABLE `ims_customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ims_order`
--
ALTER TABLE `ims_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ims_product`
--
ALTER TABLE `ims_product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `ims_purchase`
--
ALTER TABLE `ims_purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `ims_supplier`
--
ALTER TABLE `ims_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `ims_user`
--
ALTER TABLE `ims_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ims_brand`
--
ALTER TABLE `ims_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ims_category`
--
ALTER TABLE `ims_category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ims_product`
--
ALTER TABLE `ims_product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ims_purchase`
--
ALTER TABLE `ims_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ims_supplier`
--
ALTER TABLE `ims_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ims_user`
--
ALTER TABLE `ims_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
