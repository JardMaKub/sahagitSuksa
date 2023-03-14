-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 04:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finaleproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `acc_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `acc_stdid` varchar(11) NOT NULL,
  `acc_name` varchar(100) NOT NULL,
  `acc_pass` varchar(100) NOT NULL,
  `acc_state` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`acc_id`, `acc_stdid`, `acc_name`, `acc_pass`, `acc_state`) VALUES
(00001, '12345678910', 'admin1', '1234', '1'),
(00002, '01234567890', 'admin2', '999999999', '1'),
(00003, '62114340195', 'std1', '1234', '2'),
(00022, '01234567891', 'root', '12345678', '1'),
(00030, '62114340302', 'lima sripukd', '1234', '1'),
(00032, '62114340032', 'kawin udom', '1111', '1'),
(00033, '62114340027', 'tintin wang', '1234', '2'),
(00034, '62114340192', 'fluke fluke', '33333', '2'),
(00035, '62114340111', 'wad wad', '4566', '2'),
(00036, '62114340212', 'jacj jacj', '555', '2'),
(00038, '62114340099', 'pang noy', '6969', '2'),
(00039, '62114340025', 'wadee jaa', '4567', '2'),
(00040, '62114340254', 'jardma dikub', '123456', '2'),
(00042, '62114340253', 'narongwit', '555', '2'),
(00044, '62114340000', 'leklek', '555', '2'),
(00045, '62114340001', 'ohm', '1234', '2'),
(00046, '62114340058', 'kiattisak Gesornchuen', 'Kunlek555', '1'),
(00047, '62114340235', 'KIWI', '1234', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accountstate`
--

CREATE TABLE `tbl_accountstate` (
  `sta_id` int(5) NOT NULL,
  `sta_useid` varchar(5) NOT NULL,
  `sta_name` varchar(50) NOT NULL,
  `sta_detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accountstate`
--

INSERT INTO `tbl_accountstate` (`sta_id`, `sta_useid`, `sta_name`, `sta_detail`) VALUES
(1, '1', 'admin', 'manage all thing in web'),
(2, '2', 'student', 'can set self password only');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_internship`
--

CREATE TABLE `tbl_internship` (
  `stdtn_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `stdtn_year` varchar(4) NOT NULL,
  `stdtn_stdid` varchar(11) NOT NULL,
  `org_orgid` varchar(11) NOT NULL,
  `stdtn_type` varchar(1) NOT NULL,
  `stdtn_jobdesc` varchar(100) NOT NULL,
  `stdtn_status` varchar(1) NOT NULL,
  `stdtn_reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_internship`
--

INSERT INTO `tbl_internship` (`stdtn_id`, `stdtn_year`, `stdtn_stdid`, `org_orgid`, `stdtn_type`, `stdtn_jobdesc`, `stdtn_status`, `stdtn_reason`) VALUES
(00001, '2564', '62114340235', '12356525684', '1', 'ตีอาจารย์', '1', '-ไม่มี-'),
(00005, '2563', '62114340032', '25369874556', '1', 'Gods', '2', 'Ezs'),
(00006, '2566', '62114340058', '2536597', '1', '4566', '2', 'mama'),
(00009, '2566', '62114340026', '25365985622', '1', 'checjk', '2', 'waee'),
(00010, '2564', '62114340302', '2536597', '2', '658596669 58741221 52355', '2', 'kkkkkk kkkkkokk koooooo'),
(00012, '2564', '62114340058', '11421', '1', 'Digital media', '2', 'ว่าง'),
(00014, '2561', '62114340302', '12356525684', '1', '456688', '2', '4566'),
(00015, '2560', '62114340026', '11421', '1', 'free time', '1', ''),
(00016, '2564', '62114340195', '25369874556', '1', 'ma len len', '2', ''),
(00017, '2563', '62114340195', '25365985622', '1', 'jardmadi', '1', 'maimee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization`
--

CREATE TABLE `tbl_organization` (
  `org_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `org_orgid` varchar(11) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `org_address` varchar(250) NOT NULL,
  `org_prov` varchar(100) NOT NULL,
  `org_contectname` varchar(100) NOT NULL,
  `org_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_organization`
--

INSERT INTO `tbl_organization` (`org_id`, `org_orgid`, `org_name`, `org_address`, `org_prov`, `org_contectname`, `org_tel`) VALUES
(00001, '12356525684', 'ABCDEFG co.', '152 moo 11 suksamraun warinchamrab ubonrachatani 34190', 'Konkhen', 'suriya', '023659851'),
(00002, '25369874556', 'Subjang Co.', '458 10 warin warinchamrab', 'Ubonrachatani', 'jiam', '0453696326'),
(00003, '25365985622', 'Submark Co.', '256 20 sansuk warin', 'Surin', 'suchat', '0562545896'),
(00006, '2536597', 'TinTin Logistic Co.', '595 20 mavang naimuang', 'Bankkok', 'tintin', '035698564'),
(00007, '456966', 'awdawdawd', 'awdwad', 'Bankkok', 'awd', '4569636985'),
(00008, '654', 'AZE Co.', '254 10 meung', 'Surin', 'kaikai', '0325645825'),
(00010, '11421', 'Lekky co.', 'ark', 'Surin', 'kitti', '0646951722');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stdntype`
--

CREATE TABLE `tbl_stdntype` (
  `type_id` varchar(5) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stdntype`
--

INSERT INTO `tbl_stdntype` (`type_id`, `type_name`) VALUES
('1', 'ฝึกงาน'),
('2', 'สหกิจ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `std_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `std_stdid` varchar(11) NOT NULL,
  `std_name` varchar(25) NOT NULL,
  `std_year` varchar(4) NOT NULL,
  `std_type` varchar(1) NOT NULL,
  `std_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`std_id`, `std_stdid`, `std_name`, `std_year`, `std_type`, `std_tel`) VALUES
(00001, '62114340058', 'kiattisak gesornchuen', '3', '2', '0646951725'),
(00002, '62114340032', 'kawipat udom', '3', '2', '083546523'),
(00006, '62114340235', 'kimi', '4', '1', '0985232369'),
(00007, '62114340026', 'kittin wangyot', '3', '2', '0933550000'),
(00008, '62114340302', 'lima sripukdee', '3', '2', '0933598758'),
(00013, '62114340195', 'norrawit', '3', '2', '0231568596');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `acc_stdid` (`acc_stdid`);

--
-- Indexes for table `tbl_accountstate`
--
ALTER TABLE `tbl_accountstate`
  ADD PRIMARY KEY (`sta_id`),
  ADD UNIQUE KEY `sta_useid` (`sta_useid`);

--
-- Indexes for table `tbl_internship`
--
ALTER TABLE `tbl_internship`
  ADD PRIMARY KEY (`stdtn_id`);

--
-- Indexes for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  ADD PRIMARY KEY (`org_id`),
  ADD UNIQUE KEY `org_orgid` (`org_orgid`);

--
-- Indexes for table `tbl_stdntype`
--
ALTER TABLE `tbl_stdntype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`std_id`),
  ADD UNIQUE KEY `std_stdid` (`std_stdid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `acc_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_accountstate`
--
ALTER TABLE `tbl_accountstate`
  MODIFY `sta_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_internship`
--
ALTER TABLE `tbl_internship`
  MODIFY `stdtn_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  MODIFY `org_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `std_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
