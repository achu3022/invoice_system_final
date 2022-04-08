-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 07:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_order`
--

CREATE TABLE `invoice_order` (
  `biller_id` int(11) NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `order_reciever_name` varchar(255) NOT NULL,
  `order_reciever_address` varchar(255) NOT NULL,
  `order_total_before_tax` varchar(255) NOT NULL,
  `tax_rate` varchar(255) NOT NULL,
  `order_total_tax` varchar(255) NOT NULL,
  `order_total_after_tax` varchar(255) NOT NULL,
  `order_discount` varchar(255) NOT NULL,
  `order_amount_paid` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_order`
--

INSERT INTO `invoice_order` (`biller_id`, `order_id`, `order_reciever_name`, `order_reciever_address`, `order_total_before_tax`, `tax_rate`, `order_total_tax`, `order_total_after_tax`, `order_discount`, `order_amount_paid`, `order_date`) VALUES
(101, '101', 'manu', 'manu bhavan', '100', '0', '0', '100', '0', '100', '08/04/2022'),
(101, '102', 'anu', '123', '30', '5', '1.5', '31.5', '.5', '31', '08-04-2022'),
(101, '103', 'anil', 'hfoudoih', '7890', '10', '789', '8679', '200', '8479', '08-04-2022');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_order_item`
--

CREATE TABLE `invoice_order_item` (
  `order_id` int(11) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `order_item_qty` varchar(255) NOT NULL,
  `order_item_price` varchar(255) NOT NULL,
  `order_item_final_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_order_item`
--

INSERT INTO `invoice_order_item` (`order_id`, `item_code`, `item_name`, `order_item_qty`, `order_item_price`, `order_item_final_amount`) VALUES
(101, '1', 'pen', '10', '10', '100'),
(102, '1', 'pen', '5', '2', '10'),
(102, '2', 'pencil', '10', '2', '20'),
(103, '123', 'dsjbui', '1', '1000', '1000'),
(103, '124', 'ryshf', '5', '1000', '5000'),
(103, '234', 'j9k', '9', '50', '450'),
(103, '67', 'ok,lmn', '12', '120', '1440');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_user`
--

CREATE TABLE `invoice_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_user`
--

INSERT INTO `invoice_user` (`id`, `email`, `password`, `first_name`, `last_name`, `address`, `mobile`) VALUES
(101, 'test@test.com', 'test@123', 'Biller', '1', 'ABC ltd', '9400242160'),
(112, 'biller@biller.com', 'biller@123', 'biller2', 'second', 'biller.com', '9778355116');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_user`
--
ALTER TABLE `invoice_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_user`
--
ALTER TABLE `invoice_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
