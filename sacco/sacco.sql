-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2016 at 03:21 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sacco`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@mail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(50) NOT NULL,
  `emp_name` varchar(100) DEFAULT NULL,
  `emp_mail` varchar(50) NOT NULL,
  `emp_phone` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `town` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employer_tb`
--

CREATE TABLE `employer_tb` (
  `Emp_id` varchar(50) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `Emp_name` varchar(100) NOT NULL,
  `salary` int(50) NOT NULL,
  `years_worked` int(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_applications`
--

CREATE TABLE `loan_applications` (
  `no` int(4) NOT NULL,
  `serial_no` varchar(50) NOT NULL,
  `national_id` int(4) NOT NULL,
  `loan_amount` int(50) NOT NULL,
  `loan_interest` int(50) NOT NULL,
  `loan_purpose` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `repayment_period` varchar(100) NOT NULL,
  `rate` double(4,2) NOT NULL,
  `instalments` int(50) NOT NULL,
  `monthly_income` int(10) NOT NULL,
  `savings` int(50) NOT NULL,
  `guarantor1` varchar(20) NOT NULL,
  `guarantor2` varchar(20) NOT NULL,
  `loan_balance` int(10) NOT NULL,
  `is_paid` varchar(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `loan_type` varchar(20) NOT NULL,
  `is_repaid` tinyint(1) NOT NULL,
  `appl_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_repayments`
--

CREATE TABLE `loan_repayments` (
  `repayment_id` int(4) NOT NULL,
  `national_id` int(40) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `payment_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `national_id` varchar(20) NOT NULL,
  `member_num` int(4) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `member_address` varchar(100) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `spouse_id` varchar(20) NOT NULL,
  `spouse_name` varchar(100) NOT NULL,
  `income` int(10) NOT NULL,
  `company` varchar(30) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `years_worked` int(2) NOT NULL,
  `savings_account_balance` int(10) NOT NULL,
  `l_balance` int(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `number` int(50) NOT NULL,
  `saving_id` varchar(50) NOT NULL,
  `national_id` int(20) NOT NULL,
  `saving_amount` int(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `trans_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `national_id` varchar(50) NOT NULL,
  `staff_number` int(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employer_tb`
--
ALTER TABLE `employer_tb`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `loan_repayments`
--
ALTER TABLE `loan_repayments`
  ADD PRIMARY KEY (`repayment_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_num`),
  ADD UNIQUE KEY `national_id` (`national_id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`national_id`),
  ADD UNIQUE KEY `staff_number` (`staff_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loan_applications`
--
ALTER TABLE `loan_applications`
  MODIFY `no` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loan_repayments`
--
ALTER TABLE `loan_repayments`
  MODIFY `repayment_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_num` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `number` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_number` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
