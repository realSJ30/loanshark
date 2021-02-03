-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 02:03 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_loanshark`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `account_ID` int(3) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `gender_ID` int(2) NOT NULL,
  `cs_ID` int(2) NOT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  `address` text,
  `corporate_name` varchar(40) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `loaned_money` float(10,2) DEFAULT NULL,
  `pin_card` varchar(20) NOT NULL,
  `bank_id` int(2) NOT NULL,
  `image` mediumblob,
  `investment` float(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`account_ID`, `account_name`, `gender_ID`, `cs_ID`, `nationality`, `address`, `corporate_name`, `contact`, `username`, `password`, `loaned_money`, `pin_card`, `bank_id`, `image`, `investment`) VALUES
(6, 'Izza Mae', 2, 1, 'Filipino', 'Davao City', 'Funding', '09123333', 'izza123', '123izza', 0.00, '4518', 2, 0x70726f66696c657069635c706963312e706e67, 15829.00),
(10, 'Joseph Moraga', 1, 2, 'Filipino', 'Davao City', 'DavoaFund', '091000', 'joseph', 'joseph', 0.00, '1233', 2, NULL, 44880.00),
(11, 'Dell Inspiron', 1, 1, 'Filipino', 'Davao City', 'The Metropolitan', '0912345678', 'di123', '123di', NULL, '123456', 4, NULL, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accountmessages`
--

CREATE TABLE `tbl_accountmessages` (
  `account_id` int(2) DEFAULT NULL,
  `admin_reply` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accountmessages`
--

INSERT INTO `tbl_accountmessages` (`account_id`, `admin_reply`) VALUES
(10, 'Hello Mr. Joseph....');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `bank_id` int(2) NOT NULL,
  `bank_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`bank_id`, `bank_name`) VALUES
(1, 'BDO'),
(2, 'PayPal'),
(3, 'Malayan Bank'),
(4, 'MetroBank'),
(5, 'LandBank');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_civilstatus`
--

CREATE TABLE `tbl_civilstatus` (
  `cs_ID` int(2) NOT NULL,
  `cs_Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_civilstatus`
--

INSERT INTO `tbl_civilstatus` (`cs_ID`, `cs_Type`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Widowed'),
(4, 'Separated');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

CREATE TABLE `tbl_gender` (
  `gender_ID` int(2) NOT NULL,
  `gender_Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`gender_ID`, `gender_Type`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `account_id` int(2) DEFAULT NULL,
  `feedback_message` text,
  `admin_reply` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`account_id`, `feedback_message`, `admin_reply`) VALUES
(10, 'hahays', 'Hello Mr. Joseph....'),
(6, 'Hello Po...', NULL),
(6, 'Thank you...', NULL),
(11, 'hi im groot...', NULL),
(11, 'PSsssttttt....', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_ID` int(8) NOT NULL,
  `status_Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_ID`, `status_Type`) VALUES
(1, 'Invest'),
(2, 'Borrow');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transact_id` int(8) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  `status_id` int(2) DEFAULT NULL,
  `transact_info` text,
  `bank_id` int(2) DEFAULT NULL,
  `account_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transact_id`, `amount`, `date`, `status_id`, `transact_info`, `bank_id`, `account_id`) VALUES
(3, 2000.00, '2018-01-01', 1, 'invest ni', 2, 6),
(4, 10.00, '2018-01-01', 1, 'pisolime', 2, 6),
(5, 10.00, '2018-01-01', 1, 'sew', 2, 6),
(6, 10.00, '2018-01-01', 1, 'hala oy', 2, 6),
(7, 10000.00, '2018-01-01', 1, 'awwww', 2, 6),
(8, 200.00, '2018-01-01', 1, 'lol', 2, 6),
(9, 1.00, '2018-01-01', 1, 'sge', 2, 6),
(11, 30000.00, '2018-01-01', 1, 'buset', 2, 6),
(20, 1000.00, '2018-01-01', 1, 'pambayad ko po', 2, 10),
(21, 6000.00, '2018-01-01', 2, 'tistingan bi', 2, 10),
(22, 50000.00, '2018-01-01', 1, 'daw bi', 2, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`account_ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `gender_ID` (`gender_ID`),
  ADD KEY `cs_ID` (`cs_ID`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `tbl_accountmessages`
--
ALTER TABLE `tbl_accountmessages`
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `tbl_civilstatus`
--
ALTER TABLE `tbl_civilstatus`
  ADD PRIMARY KEY (`cs_ID`);

--
-- Indexes for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`gender_ID`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_ID`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transact_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `bank_id` (`bank_id`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `account_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `bank_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_civilstatus`
--
ALTER TABLE `tbl_civilstatus`
  MODIFY `cs_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  MODIFY `gender_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transact_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD CONSTRAINT `tbl_account_ibfk_1` FOREIGN KEY (`gender_ID`) REFERENCES `tbl_gender` (`gender_ID`),
  ADD CONSTRAINT `tbl_account_ibfk_2` FOREIGN KEY (`cs_ID`) REFERENCES `tbl_civilstatus` (`cs_ID`),
  ADD CONSTRAINT `tbl_account_ibfk_3` FOREIGN KEY (`bank_id`) REFERENCES `tbl_bank` (`bank_id`);

--
-- Constraints for table `tbl_accountmessages`
--
ALTER TABLE `tbl_accountmessages`
  ADD CONSTRAINT `tbl_accountmessages_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `tbl_account` (`account_ID`);

--
-- Constraints for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD CONSTRAINT `tbl_messages_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `tbl_account` (`account_ID`);

--
-- Constraints for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD CONSTRAINT `tbl_transaction_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`status_ID`),
  ADD CONSTRAINT `tbl_transaction_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `tbl_bank` (`bank_id`),
  ADD CONSTRAINT `tbl_transaction_ibfk_3` FOREIGN KEY (`account_id`) REFERENCES `tbl_account` (`account_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
