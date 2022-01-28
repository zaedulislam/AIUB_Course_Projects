-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 06:37 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library`;
-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `entrydate` varchar(50) NOT NULL,
  `issuedate` varchar(50) DEFAULT NULL,
  `duedate` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookname`, `author`, `isbn`, `category`, `status`, `entrydate`, `issuedate`, `duedate`, `username`) VALUES
(30, 'Math1', 'M', '123', 'Mathematics', 1, '2018-04-08 & 10:23:24pm', NULL, NULL, NULL),
(31, 'Math2', 'M', '567', 'Mathematics', 1, '2018-04-08 & 10:24:47pm', NULL, NULL, NULL),
(32, 'Physics1', 'P', '789', 'PHY', 1, '2018-04-08 & 10:25:46pm', NULL, NULL, NULL),
(33, 'Physics2', 'P', '54867', 'PHY', 1, '2018-04-08 & 10:34:23pm', NULL, NULL, NULL),
(34, 'PL1', 'P', '545', 'CS', 1, '2018-04-08 & 10:35:02pm', NULL, NULL, NULL),
(35, 'Data Structure', 'D', '45456', 'CS', 1, '2018-04-08 & 10:35:18pm', NULL, NULL, NULL),
(36, 'Algorithms', 'A', '434', 'CS', 1, '2018-04-08 & 10:35:44pm', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `type`) VALUES
('Admin', '12', '1'),
('Arnab', '12', '2'),
('Shovon', '12', '2'),
('Shuvo', '123', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
