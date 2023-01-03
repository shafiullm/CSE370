-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 06:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `App_id` int(11) NOT NULL,
  `S_id` varchar(10) NOT NULL,
  `Schol_id` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'p'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`App_id`, `S_id`, `Schol_id`, `status`) VALUES
(35, '19301240', '1', 'p'),
(36, '19301194', '3', 'p'),
(37, '19301259', '2', 'p'),
(38, '16301155', '4', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `eligible`
--

CREATE TABLE `eligible` (
  `Elig_id` varchar(7) NOT NULL,
  `Schol_id` varchar(11) NOT NULL,
  `Credit` varchar(11) NOT NULL,
  `CGPA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eligible`
--

INSERT INTO `eligible` (`Elig_id`, `Schol_id`, `Credit`, `CGPA`) VALUES
('1', '1', '45', '3.0'),
('2', '2', '45', '3.3'),
('3', '3', '30', '3.7'),
('4', '4', '30', '3.5');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `S_id` varchar(10) NOT NULL,
  `Schol_id` varchar(7) NOT NULL,
  `qa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `S_id`, `Schol_id`, `qa`) VALUES
(135, '19301240', '1', 'Annual Income : 40000'),
(136, '19301240', '1', 'No. of family members:7'),
(137, '19301259', '2', 'F.F:Y'),
(138, '19301259', '2', 'F.F:Y'),
(139, '19301259', '2', 'F.Name:Sabbir Ahmed'),
(140, '16301155', '4', 'Tanjim'),
(141, '16301155', '4', 'Tanjim'),
(142, '16301155', '4', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `Schol_id` varchar(7) NOT NULL,
  `Schol_name` varchar(50) NOT NULL,
  `Schol_fund` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`Schol_id`, `Schol_name`, `Schol_fund`) VALUES
('1', 'Need Based Scholarship', '100'),
('2', 'Freedom Fighter Scholarship', '40'),
('3', 'Performance Based Scholarship', '70'),
('4', 'Sibling Scholarship', '50');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `S_id` varchar(10) NOT NULL,
  `username` varchar(7) NOT NULL,
  `FullName` varchar(20) NOT NULL,
  `CGPA` varchar(7) DEFAULT NULL,
  `Credit` varchar(7) DEFAULT NULL,
  `major` varchar(15) DEFAULT NULL,
  `MailAddress` varchar(20) NOT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`S_id`, `username`, `FullName`, `CGPA`, `Credit`, `major`, `MailAddress`, `MobileNumber`, `status`) VALUES
('16301155', 'Tahmina', 'Tanjim Ahmed', '3.80', '126', 'CSE', 'tahmina@gmail.com', '', '1'),
('19301194', 'Shafiul', 'Shafiul Alam', '3.89', '60', 'CSE', 'shafiul@gmail.com', '01626275623', '1'),
('19301240', 'Tajwar', 'M M Hasan Tajwar', '3.5', '60', 'CSE', 'tajwar@gmail.com', '01675023133', '1'),
('19301259', 'Tanjim', 'Tanjim Ahmed', '3.75', '60', 'CSE', 'tanjim.ahmed@g.bracu', '01686855885', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `username` varchar(11) NOT NULL,
  `password` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`username`, `password`, `user_id`) VALUES
('admin', 1234, 1),
('Shafiul', 1234, 2),
('Tahmina', 1234, 2),
('Tajwar', 1234, 2),
('Tanjim', 1234, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`App_id`);

--
-- Indexes for table `eligible`
--
ALTER TABLE `eligible`
  ADD PRIMARY KEY (`Elig_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`Schol_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `App_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
