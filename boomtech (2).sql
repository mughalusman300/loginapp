-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 06:41 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

CREATE TABLE `client` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_phone`, `client_cnic`, `package_id`, `client_mail`, `client_address`, `user_id`, `entry_date`, `entery_token`) VALUES
(1, 'Muhammad Danish', '03334616162', '35202-5302769-7', 1, 'saim_49@hotmail.com', 'house', 1, '2018-03-30 10:45:21', 7691828),
(3, 'Usman', '03014574586', '35214522654221', 1, 'u@u.com', 'Badami Bagh lahore', 1, '2018-04-16 19:38:40', 9971902),
(4, 'Irfan', '030214545258', '3520214545875', 3, 'i@i.com', 'Lahore', 1, '2018-04-20 07:33:18', 319342),
(5, 'Naveed', '030215454521', '35214564546645', 2, 'n@n.com', 'Shadbagh', 1, '2018-04-17 12:38:32', 319342),
(8, 'Imran', '031214562354', '352014545624', 4, 'i@i.com', 'lhr', 1, '2018-04-17 12:52:42', 319342),
(9, 'Jamshed', '03214512547', '352012132546', 1, 'j@j.com', 'lhr', 1, '2018-04-17 12:54:15', 319342),
(10, 'Shan', '03021454215', '3520212456', 3, 's@s.com', 'lhr', 2, '2018-04-20 07:31:34', 3965979),
(11, 'Ramzan', '03024565845', '3520142145478', 4, 'r@r.com', 'lhr', 2, '2018-04-20 07:32:51', 3965979),
(12, 'Tanveer', '03032245663', '3520274024335', 1, 't@t.com', 'lahore', 2, '2018-04-22 20:59:16', 564968),
(13, 'Faheem', '03032145632', '3520241545223', 1, 'f@dsf.com', 'lahore', 2, '2018-04-30 11:30:56', 564968),
(14, 'Fahad', '030321456236', '3520274024335', 2, 'f@f.com', 'lhr', 1, '2018-04-23 19:42:23', 3592855);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(300) NOT NULL,
  `package_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `payment_date` text NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `payment_remark` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `entery_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bill_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `client_id`, `payment_date`, `payment_amount`, `package_id`, `payment_remark`, `user_id`, `entery_date`, `bill_no`) VALUES
(16, 12, '2018-04-24', 500, 1, 'none', 1, '2018-04-22 19:00:00', 12127),
(17, 13, '2018-04-23', 500, 1, 'none', 1, '2018-04-22 23:12:39', 26681),
(18, 8, '2018-04-23', 1000, 4, 'none', 1, '2018-04-22 19:00:00', 18000),
(20, 11, '2018-04-23', 1000, 4, 'none', 1, '2018-04-22 19:00:00', 16797),
(23, 9, '2018-04-23', 500, 1, 'N/A', 1, '2018-04-22 19:00:00', 9318),
(24, 5, '2018-04-23', 1500, 2, 'N/A', 1, '2018-04-22 19:00:00', 26519),
(25, 3, '2018-04-23', 500, 1, 'none', 1, '2018-04-22 19:00:00', 15726),
(38, 1, '2018-04-27', 500, 1, 'N/A', 2, '2018-04-26 19:00:00', 9188),
(39, 4, '2018-04-28', 1000, 3, 'N/A', 2, '2018-04-27 19:00:00', 30751),
(40, 10, '2018-04-28', 1000, 3, 'N/A', 2, '2018-04-27 19:00:00', 20598),
(41, 14, '2018-04-30', 10000, 2, 'N/A', 2, '2018-04-29 19:00:00', 24771),
(42, 12, '2018-05-29', 500, 1, 'kh', 2, '2018-05-28 19:00:00', 8717),
(45, 3, '2018-05-29', 500, 1, 'n', 2, '2018-05-28 19:00:00', 31200),
(46, 9, '2018-05-29', 500, 1, 'N/A', 2, '2018-05-28 19:00:00', 29274);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `problem` varchar(70) NOT NULL,
  `ticket_remark` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `entery_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ticket_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `client_id`, `problem`, `ticket_remark`, `user_id`, `entery_date`, `ticket_status`) VALUES
(8, 9, 'SlowingBrowser-Network Issue', 'Slow 		', 1, '2018-04-27 20:06:34', 'Cancel'),
(9, 8, 'Frequent-Disconnection', 'NotWorking', 1, '2018-04-27 23:34:19', 'Processing'),
(27, 11, 'Network-Failed', 'none				', 1, '2018-04-27 16:57:00', 'Complaint Resolved'),
(28, 8, 'SlowingBrowser-Network', 'none				', 1, '2018-04-27 13:20:34', 'Cancel'),
(38, 14, 'SlowingBrowser-Network Issue', 'fesa				', 1, '2018-04-23 22:14:19', 'Processing'),
(39, 8, 'SlowingBrowser-Network Issue', '				WD', 1, '2018-04-24 22:14:52', 'Initialized'),
(42, 14, 'SlowingBrowser-Network Issue', '				aea', 1, '2018-04-27 23:34:51', 'Processing'),
(43, 11, 'Frequent-Disconnection', 'N/A', 1, '2018-04-27 20:38:17', 'Cancel'),
(44, 9, 'Frequent-Disconnection', 'N/A', 1, '2018-04-27 20:37:58', 'Initialized'),
(45, 9, 'Authentication-Error', 'Not working', 1, '2018-04-27 20:37:44', 'Cancel'),
(46, 11, 'Network-Failed', 'N/A', 1, '2018-04-27 23:35:28', 'Complaint Resolved'),
(47, 11, 'SlowingBrowser-Network', 'N/A', 1, '2018-04-27 20:36:40', 'Processing'),
(50, 13, 'SlowingBrowser-Network Issue', 'N/A', 2, '2018-04-27 23:35:38', 'Complaint Resolved'),
(51, 13, 'Authentication-Error', 'N/A', 2, '2018-04-27 20:07:39', 'Initialized'),
(52, 14, 'Network-Failed', 'N/A', 2, '2018-04-27 20:08:55', 'Processing'),
(53, 12, 'Frequent-Disconnection', 'N/A', 2, '2018-04-27 23:35:49', 'Complaint Resolved'),
(54, 3, 'Frequent-Disconnection', 'N/A', 2, '2018-04-27 20:21:31', 'Processing'),
(55, 1, 'Frequent-Disconnection', 'N/A', 2, '2018-04-27 20:21:50', 'Complaint Resolved'),
(56, 4, 'Authentication-Error', 'N/A', 2, '2018-04-27 20:22:18', 'Initialized'),
(57, 5, 'SlowingBrowser-Network Issue', 'N/A', 2, '2018-04-30 11:13:09', 'Initialized');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_ticket`
--

CREATE TABLE `tracking_ticket` (
  `tracking_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `problem` varchar(70) NOT NULL,
  `tracking_status` varchar(20) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking_ticket`
--

INSERT INTO `tracking_ticket` (`tracking_id`, `ticket_id`, `problem`, `tracking_status`, `entry_date`, `remark`) VALUES
(2, 9, 'Frequent-Disconnection', 'Initialized', '2018-04-21 12:52:05', 'Not Working'),
(5, 27, 'Network-Failed', 'Initialized', '2018-04-10 21:07:07', 'none				'),
(6, 28, 'SlowingBrowser-Network', 'Initialized', '2018-04-27 16:55:29', 'n				'),
(43, 8, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-21 19:00:00', 'a				'),
(46, 30, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-25 19:00:00', '				asd'),
(47, 31, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-25 19:00:00', 'zd'),
(48, 32, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-25 19:00:00', 'swf				'),
(49, 33, 'Frequent-Disconnection', 'Initialized', '2018-04-25 19:00:00', '				df'),
(50, 34, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-25 19:00:00', '	sdf			'),
(51, 35, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-25 19:00:00', '				df'),
(52, 36, 'Frequent-Disconnection', 'Initialized', '2018-04-25 19:00:00', '			ads	'),
(53, 37, 'Network-Failed', 'Processing', '2018-04-25 19:00:00', '				AD'),
(54, 38, 'SlowingBrowser-Network Issue', 'Processing', '2018-04-25 19:00:00', 'fesa				'),
(55, 39, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-25 19:00:00', '				WD'),
(56, 40, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-25 19:00:00', 'WA				'),
(57, 41, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-25 19:00:00', 'wd'),
(58, 42, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-25 19:00:00', '				aea'),
(59, 43, 'Frequent-Disconnection', 'Initialized', '2018-04-25 19:00:00', '				3rt'),
(60, 44, 'Frequent-Disconnection', 'Initialized', '2018-04-25 19:00:00', 'wer'),
(61, 45, 'Authentication-Error', 'Initialized', '2018-04-25 19:00:00', 'qef				'),
(62, 46, 'Network-Failed', 'Initialized', '2018-04-25 19:00:00', 'efw				'),
(63, 47, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-25 19:00:00', '		awe		'),
(66, 8, 'SlowingBrowser-Network Issue', 'Processing', '2018-04-26 19:00:00', 'none				'),
(67, 9, 'Frequent-Disconnection', 'Complaint Resolved', '2018-04-26 19:00:00', 'n				'),
(68, 28, 'SlowingBrowser-Network', 'Cancel', '2018-04-26 19:00:00', 'n				'),
(69, 43, 'Frequent-Disconnection', 'Cancel', '2018-04-26 19:00:00', 'n				'),
(70, 27, 'Network-Failed', 'Complaint Resolved', '2018-04-26 19:00:00', 'none				'),
(71, 47, 'SlowingBrowser-Network Issue', 'Processing', '2018-04-26 19:00:00', 'none				'),
(85, 47, 'SlowingBrowser-Network Issue', 'Processing', '2018-04-26 19:00:00', 'N/A'),
(86, 47, 'SlowingBrowser-Network Issue', 'Processing', '2018-04-26 19:00:00', 'N/A'),
(87, 48, 'Network-Failed', 'Complaint Resolved', '2018-04-26 19:00:00', '				'),
(88, 49, 'Network-Failed', 'Complaint Resolved', '2018-04-26 19:00:00', '				'),
(89, 50, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-26 19:00:00', 'N/A'),
(90, 8, 'SlowingBrowser-Network Issue', 'Complaint Resolved', '2018-04-27 19:00:00', 'N/A'),
(91, 8, 'SlowingBrowser-Network Issue', 'Cancel', '2018-04-27 19:00:00', 'N/A'),
(92, 51, 'Authentication-Error', 'Initialized', '2018-04-27 19:00:00', 'N/A'),
(93, 52, 'Network-Failed', 'Processing', '2018-04-27 19:00:00', 'N/A'),
(94, 53, 'Frequent-Disconnection', 'Processing', '2018-04-27 19:00:00', 'N/A'),
(95, 54, 'Frequent-Disconnection', 'Processing', '2018-04-27 19:00:00', 'N/A'),
(96, 55, 'Frequent-Disconnection', 'Complaint Resolved', '2018-04-27 19:00:00', 'N/A'),
(97, 56, 'Authentication-Error', 'Initialized', '2018-04-27 19:00:00', 'N/A'),
(98, 9, 'Frequent-Disconnection', 'Processing', '2018-04-27 19:00:00', 'N/A'),
(99, 42, 'SlowingBrowser-Network Issue', 'Processing', '2018-04-27 19:00:00', 'N/A'),
(100, 46, 'Network-Failed', 'Complaint Resolved', '2018-04-27 19:00:00', 'N/A'),
(101, 50, 'SlowingBrowser-Network Issue', 'Complaint Resolved', '2018-04-27 19:00:00', 'N/A'),
(102, 53, 'Frequent-Disconnection', 'Complaint Resolved', '2018-04-27 19:00:00', 'N/A'),
(103, 57, 'SlowingBrowser-Network Issue', 'Initialized', '2018-04-29 19:00:00', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(350) NOT NULL,
  `user_email` varchar(390) NOT NULL,
  `user_phone` varchar(25) NOT NULL,
  `password` varchar(600) NOT NULL,
  `user_power` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phone`, `password`, `user_power`, `timestamp`) VALUES
(1, 'Muhammad Farhan', 'farhan@gmail.com', '03084754562', 'mughal303', 'ADMIN', '2019-06-13 12:06:27'),
(2, 'Usman Azeem', 'mughalusman300@gmail.com', '03034402363', 'mughal', 'ADMIN', '2018-04-22 20:45:04'),
(10, 'Rana', 'r@r.com', '03032145626', '123456', 'USER', '2018-04-22 20:38:24'),
(11, 'Ali', 'a@a.com', '03034402363', 'a123456', 'USER', '2018-04-23 19:34:56');

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
-- Indexes for table `tracking_ticket`
--
ALTER TABLE `tracking_ticket`
  ADD PRIMARY KEY (`tracking_id`);

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
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tracking_ticket`
--
ALTER TABLE `tracking_ticket`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
