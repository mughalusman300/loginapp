-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2018 at 12:37 PM
-- Server version: 5.5.43
-- PHP Version: 5.5.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boomtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(250) NOT NULL,
  `client_phone` varchar(15) NOT NULL,
  `client_cnic` varchar(16) NOT NULL,
  `package_id` int(11) NOT NULL,
  `client_mail` varchar(350) NOT NULL,
  `client_address` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entery_token` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_phone`, `client_cnic`, `package_id`, `client_mail`, `client_address`, `user_id`, `entry_date`, `entery_token`) VALUES
(1, 'Muhammad Danish', '03334616162', '35202-5302769-7', 1, 'saim_49@hotmail.com', 'house', 1, '2018-03-30 10:45:21', 7691828),
(2, 'asfas', 'asfasf', 'asfasf', 2, 'asfasf', 'afa', 1, '2018-03-30 10:45:31', 7691828);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(300) NOT NULL,
  `package_remark` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_remark`) VALUES
(1, 'BASIC PACK', 'PKR 500 /MONTH\r\nUNLIMITED DOWNLOADS\r\nUNLIMITED UPLOADS\r\n0.75 MBPS'),
(2, 'STARTER PACK', 'PKR 800 /MONTH\r\nUNLIMITED DOWNLOADS\r\nUNLIMITED UPLOADS\r\n1 MBPS'),
(3, 'INFINET PACK', 'PKR 1200 /MONTH\r\nUNLIMITED DOWNLOADS\r\nUNLIMITED UPLOADS\r\n1.5 MBPS'),
(4, 'ELITE PACK', 'PKR 1600 /MONTH\r\nUNLIMITED DOWNLOADS\r\nUNLIMITED UPLOADS\r\n2 MBPS');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `payment_remark` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `entery_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entery_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `ticket_remark` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entery_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(350) NOT NULL,
  `user_email` varchar(390) NOT NULL,
  `user_password` varchar(600) NOT NULL,
  `user_power` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_power`, `timestamp`) VALUES
(1, 'Muhammad Saim', 'saim_49@hotmail.com', '35afb4e889201413d8f49620c62003ef', 'Admin', '2017-11-21 12:24:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
