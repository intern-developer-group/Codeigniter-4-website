-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 06:29 PM
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
-- Database: `kj`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `p_id` int(11) NOT NULL,
  `whight` varchar(20) NOT NULL,
  `netwhight` varchar(20) NOT NULL,
  `productpic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`p_id`, `whight`, `netwhight`, `productpic`) VALUES
(5, '12.12', '11', '1667722125_c97a17426f11e1c8e7bc.jpg'),
(6, '12345', '12345', '1667724636_ddc17250e35e78589347.jpg'),
(7, 'hello', 'hello1', '1667724659_12858d7c5533b24d9e05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `password_token`
--

CREATE TABLE `password_token` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_token`
--

INSERT INTO `password_token` (`id`, `email`, `unique_id`, `time`) VALUES
(12, 'zinzuvadiyaraj6881@gmail.com', '776b4912f4f2e20aa9515e2b32e78a3c', '2022-11-07 12:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Owner_name` varchar(200) NOT NULL,
  `Shop_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mo` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Owner_name`, `Shop_name`, `email`, `mo`, `pwd`, `status`) VALUES
('devdip', 'kj', 'devdip@gmail.com', '9999999999', 'A@as1234', 'Deleted'),
('admin122', 'Admin', 'raj@gmail.com', '7383436882', '123', 'Admin'),
('Vinit123', 'parmeshwari jewellers123', 'vinit@gmail.com', '098754321', 'QW#$qw34', 'Deleted'),
('rajraj', 'raj', 'zinzuvadiyaraj6881@gmail.com', '1122334466', 'QW#$qw34', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `password_token`
--
ALTER TABLE `password_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `password_token`
--
ALTER TABLE `password_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
