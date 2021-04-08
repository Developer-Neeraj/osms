-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 07:14 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newosms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_pass` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_pass`) VALUES
(1, 'admin', 'admin@123gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

CREATE TABLE `assets_tb` (
  `prod_Id` int(11) NOT NULL,
  `prod_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `prod_dop` date NOT NULL,
  `prod_avail` int(11) NOT NULL,
  `prod_total` int(11) NOT NULL,
  `prod_cost` int(11) NOT NULL,
  `prod_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `request_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_add1` text COLLATE utf8_bin NOT NULL,
  `request_add2` text COLLATE utf8_bin NOT NULL,
  `request_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_zip` int(11) NOT NULL,
  `request_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_mobile` int(11) NOT NULL,
  `request_assign` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `request_name`, `request_add1`, `request_add2`, `request_city`, `request_state`, `request_zip`, `request_email`, `request_mobile`, `request_assign`, `request_date`) VALUES
(1, 1, 'washing machine ', 'washing machine is very noisy', 'Neeraj', '10598', 'sanjay colony sector 23', 'Faridabad', 'Haryana', 121005, 'vishwakarmaneeraj866@gmail.com', 2147483647, 'kapil', '2021-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `cId` int(11) NOT NULL,
  `cname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cadd` text COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpsdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_tb`
--

CREATE TABLE `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_tb`
--

INSERT INTO `requesterlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(1, 'Neeraj', 'vishwakarmaneeraj866@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `requester_id` int(11) NOT NULL,
  `requester_info` text COLLATE utf8_bin NOT NULL,
  `requester_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `requester_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`requester_id`, `requester_info`, `requester_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `requester_date`) VALUES
(1, 'washing machine ', 'washing machine is very noisy', 'Neeraj', '10598', 'sanjay colony sector 23', 'Faridabad', 'Haryana', 121005, 'vishwakarmaneeraj866@gmail.com', 9267999376, '2021-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `empId` int(11) NOT NULL,
  `empName` varchar(60) COLLATE utf8_bin NOT NULL,
  `empCity` varchar(60) COLLATE utf8_bin NOT NULL,
  `empMobile` bigint(20) NOT NULL,
  `empEmail` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`empId`, `empName`, `empCity`, `empMobile`, `empEmail`) VALUES
(1, 'Kapil', 'faridabad', 9267999376, 'kapil@123.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `assets_tb`
--
ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`prod_Id`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`requester_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`empId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets_tb`
--
ALTER TABLE `assets_tb`
  MODIFY `prod_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `requester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
