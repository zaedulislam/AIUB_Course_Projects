-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 09:45 PM
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
-- Database: `skills_finder`
--
CREATE DATABASE IF NOT EXISTS `skills_finder` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `skills_finder`;
-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `textID` int(11) NOT NULL,
  `fromUserID` int(11) DEFAULT NULL,
  `toUserID` int(11) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `text` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`textID`, `fromUserID`, `toUserID`, `date`, `text`) VALUES
(20, 22, 23, '04/21/2018 12:45:56 am', 'Hi Shadowfax!'),
(21, 27, 28, '04/21/2018 12:48:53 am', 'Hi Arif!'),
(22, 25, 26, '04/21/2018 12:53:56 am', 'Your projects are cool.'),
(23, 22, 26, '04/21/2018 01:12:19 am', 'Hi'),
(24, 29, 26, '04/21/2018 01:33:06 am', 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` int(11) NOT NULL,
  `tagList` varchar(50) NOT NULL,
  `projectDescription` varchar(500) NOT NULL,
  `githubLink` varchar(100) NOT NULL,
  `rating` double NOT NULL,
  `studentID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `checkedByTeacher` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `tagList`, `projectDescription`, `githubLink`, `rating`, `studentID`, `teacherID`, `checkedByTeacher`) VALUES
(22, 'HTML,PHP,JavaScript', 'Project 1', 'https://www.codechef.com/', 56, 22, 23, 1),
(23, 'HTML,PHP,JavaScript,Node.js', 'Project 2', 'http://codeforces.com/', 85, 22, 24, 1),
(24, 'ASP.NET Core,ASP.NET MVC', 'Project 3', 'http://uhunt.onlinejudge.org/id/600727', 95, 22, 23, 1),
(25, 'Java', 'Project 4', 'http://uhunt.onlinejudge.org/id/600727', 96, 28, 23, 1),
(26, 'CPP,C', 'Project 5', 'https://www.codechef.com/', 89, 28, 23, 1),
(27, 'C#,ASP', 'Project 6', 'http://www.spoj.com/', 0, 27, 24, 0),
(28, 'C#,ASP,ASP.NET Core,ASP.NET MVC', 'Project 7', 'https://www.devskill.com/Home', 67, 27, 24, 1),
(29, 'PHP', 'Project 8', 'http://codeforces.com/', 76, 26, 23, 1),
(30, 'Node.js,ASP', 'Project 9', 'https://atcoder.jp/', 87, 26, 23, 1),
(31, 'HTML,ASP.NET MVC', 'Project 10', 'https://csacademy.com/', 0, 26, 23, 0),
(32, 'CPP', 'Project 11', 'https://www.codechef.com/', 69, 26, 24, 1),
(33, 'PHP,ASP.NET Core', 'Project 12', 'https://www.codechef.com/', 69, 29, 23, 1),
(34, 'PHP,ASP.NET Core,ASP.NET MVC', 'Project 13', 'http://codeforces.com/', 0, 29, 23, 0),
(35, 'Java,ASP,ASP.NET Core', 'Project 14', 'http://uhunt.onlinejudge.org/id/600727', 67, 29, 23, 1),
(36, 'Java,C#', 'Project 15', 'http://www.spoj.com/', 83, 29, 24, 1),
(37, 'HTML,PHP,JavaScript,Node.js,CPP,C,Java,C#,ASP,ASP.', 'Project 16', 'https://www.devskill.com/Home', 71, 29, 24, 1),
(38, 'Node.js,CPP,C,Java', 'Project 18', 'https://atcoder.jp/', 64, 29, 24, 1),
(39, 'HTML,C,ASP,ASP.NET Core,ASP.NET MVC', 'Project 19', 'https://csacademy.com/', 0, 29, 24, 0),
(40, 'C', 'P 18', 'https://portal.aiub.edu/', 0, 29, 23, 0),
(41, 'C', 'P 19', 'http://acm.timus.ru/', 64, 22, 24, 1),
(42, 'Node.js,ASP.NET Core,ASP.NET MVC', 'P 20', 'https://www.codechef.com/', 0, 28, 23, 0),
(43, 'Node.js,ASP.NET Core', 'P 21', 'http://codeforces.com/', 46, 28, 23, 1),
(44, 'Node.js,ASP.NET MVC', 'P 22', 'http://www.vocabulary.com/', 0, 28, 23, 0),
(45, 'C#', 'P 23', 'http://10fastfingers.com/', 58, 22, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recruiter`
--

CREATE TABLE `recruiter` (
  `recruiterID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `showEmail` varchar(30) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `showPhone` varchar(30) NOT NULL,
  `userType` int(11) NOT NULL,
  `studentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `university` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `showEmail` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `showPhone` varchar(50) NOT NULL,
  `userType` int(11) NOT NULL,
  `overallRating` double DEFAULT '0',
  `totalProjects` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `userName`, `fullName`, `university`, `password`, `email`, `showEmail`, `phone`, `showPhone`, `userType`, `overallRating`, `totalProjects`) VALUES
(22, 'Zayed', 'Zaedul Islam', 'AIUB', '123', 'z@gmail.com', 'yes', '01824844655', 'yes', 1, 358, 5),
(23, 'shadowfax', 'Imran Ziad', 'AIUB', '123', 'i@gmail.com', 'yes', '01824844655', 'yes', 2, 0, 0),
(24, 'rawnak', 'Rawnak Sarkar', 'AIUB', '123', 'r@gmail.com', 'yes', '01824844655', 'yes', 2, 0, 0),
(25, 'ifty', 'Ifty Khan', 'BUET', '123', 'if@gmail.com', 'yes', '01824844655', 'no', 3, 0, 0),
(26, 'pecha', 'Mokaddesh Rashid', 'AIUB', '123', 'mokaddeshrashidshovon@gmail.com', 'yes', '01794341690', 'yes', 1, 232, 3),
(27, 'swadhin', 'Mujahid Swadhin', 'SUST', '123', 'm@gmail.com', 'yes', '01824844655', 'yes', 1, 67, 1),
(28, 'arif', 'Arif Shariar', 'AIUB', '123', 'a@gmail.com', 'yes', '01824844655', 'yes', 1, 285, 4),
(29, 'sadi', 'Md Sadi', 'AIUB', '123', 's@gmail.com', 'yes', '01794341690', 'yes', 1, 354, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tagID` int(11) NOT NULL,
  `tagName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tagID`, `tagName`) VALUES
(1, 'HTML'),
(2, 'PHP'),
(3, 'JavaScript'),
(4, 'Node.js'),
(7, 'CPP'),
(8, 'C'),
(9, 'Java'),
(10, 'C#'),
(11, 'ASP'),
(12, 'ASP.NET Core'),
(13, 'ASP.NET MVC');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `university` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `showEmail` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `showPhone` varchar(30) NOT NULL,
  `userType` int(11) NOT NULL,
  `projectID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`textID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `recruiter`
--
ALTER TABLE `recruiter`
  ADD PRIMARY KEY (`recruiterID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tagID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `textID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `recruiter`
--
ALTER TABLE `recruiter`
  MODIFY `recruiterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
