-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2013 at 04:45 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `joined_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `email`, `password`, `joined_on`) VALUES
(1, 'admin@admin.com', 'admins', '2013-04-04 17:17:05'),
(3, 'admin1@admin.com', 'password', '2013-07-05 12:17:05'),
(4, 'admins@admin.in', 'password', '2013-07-05 12:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE IF NOT EXISTS `programme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `semesters` smallint(6) NOT NULL,
  `fee` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`id`, `code`, `name`, `semesters`, `fee`) VALUES
(1, 'BCA', 'Bachelor in Computer Application', 6, 8000),
(2, 'MCA', 'Master in Computer Application', 6, 12000),
(3, 'BBA', 'Bachelor in Business Administration', 6, 8500),
(4, 'MBA', 'Master in Business Administration', 4, 14000),
(5, 'MCOM', 'Master of Commerce', 4, 7000),
(7, 'BA', 'Bachelor in Arts', 6, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site` enum('student','regional','administrator') NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `url` varchar(30) NOT NULL DEFAULT 'None',
  `status` enum('activated','blocked') NOT NULL DEFAULT 'activated',
  `status_changed_at` date DEFAULT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `template` varchar(10) NOT NULL DEFAULT 'style',
  `message` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site` (`site`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site`, `title`, `url`, `status`, `status_changed_at`, `visits`, `template`, `message`) VALUES
(2, 'student', 'Online Admission System', 'http://localhost/oas/', 'activated', '2013-07-04', 0, 'style', 'The Online Admission System has been developed in order to automate the complete admission system starting from the notification to admission process. This system enables online admissions saving the time of the geographically scattered students. It enables reducing time in activities, centralized data handling and paperless admission with reduced manpower. It improves the operational efficiency and reduces the cost. The student only has to visit the institute site. Then users are required to register him/ her. After registration users are provided with their valid email and password. After registration users have to enter the login form. This form is used to authenticate the user of the system. After users has been successfully logged in, an admission form opens and after clicking submit button then upload form opens and after clicking submit button, lastly payment form opens, which finally completes admission procedure within a few minutes and saves user’s time. '),
(3, 'administrator', 'Online Admission System', 'None', 'activated', NULL, 0, 'style', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_contact`
--

CREATE TABLE IF NOT EXISTS `student_contact` (
  `phone` bigint(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `district` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pin` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_contact`
--

INSERT INTO `student_contact` (`phone`, `address`, `city`, `district`, `state`, `pin`, `user_id`) VALUES
(2147483647, 'Ambika patty', 'Silchar', 'Cachar', 'Assam', 788721, 3),
(574838, 'edtxyhed', 'xdytdxy', 'zed6ty6xdz', 'zexdydx', 346643, 4),
(9588690387, 'Katakhal', 'None', 'Karimganj', 'Assam', 788710, 5),
(9999999999, 'KXJ', 'KXJ', 'KXJ', 'Assam', 788710, 6),
(7777777777, 'Silchar', 'Silchar', 'Cachar', 'Assam', 888888, 7),
(7389112345, 'Agartala', 'Agartala', 'West Tripura', 'Tripura', 787878, 8),
(9577690354, 'Nayabari', 'KXJ', 'KXJ', 'Assam', 788709, 40),
(55667, 'hhhh', 'kxj', 'kxj', 'assam', 788710, 41),
(3723757, 'erdherr rh r ', 'reyre', 'eryre', 'eherh', 377273, 42),
(9577690356, 'Village: Nayabari,\r\nP/O: Tillabazar,', 'Karimganj', 'Karimganj', 'Assam', 788709, 43),
(6248476787, 'Guwahati', 'Guwahati', 'Kamrup', 'Asssam', 788701, 44),
(9577690351, 'KXJ', 'KXJ', 'KXJ', 'Assam', 788709, 45),
(9577690352, 'KXJ', 'KXJ', 'KXJ', 'Assam', 788709, 46),
(9999999998, 'KXJ', 'KXJ', 'KXJ', 'Assam', 788707, 47);

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE IF NOT EXISTS `student_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `enrolment_no` bigint(20) DEFAULT NULL,
  `enroled_on` date DEFAULT NULL,
  `control_id` varchar(30) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `asset_id` (`control_id`),
  UNIQUE KEY `control_id` (`control_id`),
  UNIQUE KEY `control_id_2` (`control_id`),
  UNIQUE KEY `enrolement_no` (`enrolment_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`id`, `email`, `password`, `status`, `enrolment_no`, `enroled_on`, `control_id`, `created_on`) VALUES
(3, 'ad@sad.in', 'password', 3, NULL, NULL, 'oas5170b987a22e0', '2013-04-12 04:52:34'),
(4, 'ad@ad.in', 'password', 3, NULL, NULL, 'oas516e69a3e7670', '2013-04-12 05:33:01'),
(5, 'ad1@ad.com', 'password', 5, 201310003, '2013-07-04', 'oas5172aad415d09', '2013-04-20 01:43:51'),
(6, 'ad@ad.com', 'password', 5, 201310002, '2013-07-04', 'oas517619d94a335', '2013-04-20 01:44:31'),
(7, 'ad2@ad.com', 'password', 5, 201310001, '2013-07-04', 'oas51d5693d57b34', '2013-04-20 01:45:24'),
(8, 'ad3@ad.com', 'password', 2, NULL, NULL, 'oas51d8bfda982bc', '2013-04-20 01:45:50'),
(9, 'ad4@ad.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 01:49:09'),
(10, 'ad5@ad.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 01:49:49'),
(11, 'ad6@ad.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 01:50:41'),
(12, 'ad7@ad.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 01:51:07'),
(13, 'a8@ad.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 01:51:38'),
(14, 'ad9@ad.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 01:52:00'),
(15, 'ad10@ad.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 01:52:56'),
(16, 'sarma@ad.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:29:52'),
(17, 'sarma@ad1.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:30:18'),
(18, 'ads@as.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:30:44'),
(19, 'fandango@z.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:31:23'),
(20, 'fandango@ads.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:32:28'),
(21, 'fan@ad.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:33:00'),
(22, 'fan2@ad.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:33:20'),
(23, 'fanjo@ads.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:33:40'),
(24, 'gango@ads.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:33:59'),
(25, 'jhoyit@arw.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:34:23'),
(26, 'ytec@atrws.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:34:40'),
(27, 'kutecy@atjrs.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:34:58'),
(28, 'hgecte@ads.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:35:15'),
(29, 'jyhett@atgrfa.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:35:55'),
(30, 'mtuec@ads.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:36:13'),
(31, 'fancdu2@afe.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:36:41'),
(32, 'kuytdec@ads.com', 'password', 1, NULL, NULL, NULL, '2013-04-20 03:37:03'),
(33, 'yrvu@ads.com', 'password', 2, NULL, NULL, NULL, '2013-04-20 03:37:41'),
(34, 'mjrc@ads.com', 'password', 2, NULL, NULL, NULL, '2013-04-20 03:38:03'),
(35, 'uy5cuy@ads.com', 'password', 2, NULL, NULL, NULL, '2013-04-20 03:38:19'),
(36, 'ytek@ads.com', 'password', 2, NULL, NULL, NULL, '2013-04-20 03:38:59'),
(37, 'yjvjyvyv@ads.com', 'password', 2, NULL, NULL, NULL, '2013-04-20 03:39:12'),
(38, 'cyuuy@ads.com', 'password', 2, NULL, NULL, NULL, '2013-04-20 03:39:27'),
(39, 'yucy@ads.com', 'password', 2, NULL, NULL, NULL, '2013-04-20 03:39:40'),
(40, 'tushargoto@gmail.com', 'password', 4, NULL, NULL, 'oas51750bce4dadd', '2013-04-22 09:43:54'),
(41, 'rajibdas76@gmail.com', '123456', 4, NULL, NULL, 'oas5177e714278e7', '2013-04-24 14:03:14'),
(42, 'a@a.in', 'password', 4, NULL, NULL, 'oas5178c9f43bae3', '2013-04-25 04:55:01'),
(43, 'tushar@gmail.com', 'password', 4, NULL, NULL, 'oas51822aba27108', '2013-05-02 08:43:24'),
(44, 'a@afas.com', 'password', 2, NULL, NULL, 'oas51d43d586e0ef', '2013-05-02 08:50:16'),
(45, 'user@gmail.com', 'password', 4, NULL, NULL, 'oas51848c97bc2bc', '2013-05-04 04:15:17'),
(46, 'abcd@gmail.com', 'password', 4, NULL, NULL, 'oas5184906278b7c', '2013-05-04 04:35:05'),
(47, 'ss@ss.com', 'password', 4, NULL, NULL, 'oas51d55cad50b05', '2013-07-04 11:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--

CREATE TABLE IF NOT EXISTS `student_payments` (
  `amount` int(11) DEFAULT NULL,
  `draft_no` bigint(20) NOT NULL,
  `draft_date` date NOT NULL,
  `bank` varchar(40) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_payments`
--

INSERT INTO `student_payments` (`amount`, `draft_no`, `draft_date`, `bank`, `payment_date`, `user_id`) VALUES
(8000, 236162, '2013-08-12', ' State Bank of India', '2013-07-04', 5),
(7000, 777777, '2013-04-10', ' SBI', '2013-07-04', 6),
(8000, 334232, '2013-07-15', ' SBI', '2013-07-04', 7),
(12000, 666666, '2013-09-13', ' UBI', '2013-04-22', 40),
(12000, 888888, '2013-08-11', ' SBI', '2013-04-24', 41),
(8000, 333333, '2013-03-14', ' qwedwq', NULL, 42),
(12000, 754682, '2013-04-27', 'State Bank of India', NULL, 43),
(12000, 666669, '2013-10-14', 'SBI ', '2013-05-04', 45),
(12000, 555555, '2013-10-10', 'UBI ', '2013-05-04', 46),
(12000, 787580, '2013-04-17', ' HDFC', '2013-07-04', 47);

-- --------------------------------------------------------

--
-- Table structure for table `student_personnel`
--

CREATE TABLE IF NOT EXISTS `student_personnel` (
  `name` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `category` enum('general','sc','st','obc') NOT NULL DEFAULT 'general',
  `guardian` varchar(40) NOT NULL,
  `religion` char(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_personnel`
--

INSERT INTO `student_personnel` (`name`, `dob`, `gender`, `category`, `guardian`, `religion`, `user_id`) VALUES
('Abhik Roy', '1990-03-10', 'male', 'obc', 'Debarun Roy', 'Hindu', 3),
('zsrtz xsdt', '1990-02-01', 'male', 'general', 'xed6yxy', 'Hindu', 4),
('Deep Choudhury', '1993-09-26', 'male', 'general', 'Dipak Choudhury', 'Hindu', 5),
('Ravi Dey', '1991-03-03', 'male', 'sc', 'Ram Dey', 'Hindu', 6),
('Sujib ', '1994-03-15', 'male', 'st', 'Haldar', 'christian', 7),
('Sudip Dey', '1990-02-18', 'male', 'obc', 'Sujib Dey', 'hindu', 8),
('Surajit Sarma', '1990-10-14', 'male', 'general', 'Shekhar Sarma', 'Hindu', 40),
('rajib das', '2006-07-24', 'male', 'general', 'aaaa', 'Hindu', 41),
('rthrh rt y rt', '2001-03-16', 'male', 'sc', 'erhyrhfh', 'Muslim', 42),
('Surajit Sarma', '1990-10-14', 'male', 'general', 'Shekhar Ranjan Sarma', 'Hindu', 43),
('Tuhina Roy', '1990-04-23', 'female', 'sc', 'T.K. Roy', 'Hindu', 44),
('Arijeet', '1990-01-10', 'male', 'general', 'XYZ', 'Hindu', 45),
('Abcd Sarma', '1990-10-14', 'male', 'general', 'XYZ', 'Hindu', 46),
('Ananya Roy', '1988-03-16', 'female', 'sc', 'Rajib Das', 'hindu', 47);

-- --------------------------------------------------------

--
-- Table structure for table `student_qualification`
--

CREATE TABLE IF NOT EXISTS `student_qualification` (
  `user_id` int(11) NOT NULL,
  `programme` varchar(30) NOT NULL,
  `qualification` varchar(40) NOT NULL,
  `subjects` text NOT NULL,
  `passing_year` year(4) NOT NULL,
  `percentage` smallint(6) NOT NULL,
  `board` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_qualification`
--

INSERT INTO `student_qualification` (`user_id`, `programme`, `qualification`, `subjects`, `passing_year`, `percentage`, `board`) VALUES
(3, 'MBA', 'BBA', 'Marketing, Finance, Banking, Human Resources etc.', 2012, 67, 'Assam University'),
(4, 'MCA', 'sedgsdghe', 'sedgsdg', 0000, 32, 'wet'),
(5, 'BCA', 'Pravhu Deva', 'Physics, Maths, Stat', 2011, 73, 'CBSE'),
(6, 'MCOM', 'Bcom', 'Accountancy', 2012, 67, 'AU'),
(7, 'BCA', 'HS', 'gggmq', 2009, 57, 'TU'),
(8, 'MCOM', 'BCOm', 'Accountancy, Business management', 2011, 61, 'Tripura university'),
(40, 'MCA', 'BCA', 'OS, DBMS etc', 2011, 68, 'AU'),
(41, 'MCA', 'BCA', 'hjhgj\r\nhgj\r\n\r\nhj\r\n\r\nh\r\nh\r\nh\r\n', 2012, 56, '4567'),
(42, 'BCA', 'hs', 'sgerg', 0000, 56, 'rfgnd'),
(43, 'MCA', 'BCA', 'Operating Syatem, DBMS, Data Structure, Object Oriented Programming, C Programming Language, Networing, Microprocessor, Web Technology, Internet Programming, Algorithm, Computer Organization & Architecture etc.', 2011, 68, 'Assam University'),
(44, 'MBA', 'BBA', 'Accountancy etc.', 2011, 48, 'Assam College'),
(45, 'MCA', 'BCA', 'OS', 2012, 60, 'Assam University'),
(46, 'MCA', 'BCA', 'OS', 2012, 60, 'Assam University'),
(47, 'MCA', 'BCA', 'SAD, DBMS, OS', 2011, 60, 'AU');

-- --------------------------------------------------------

--
-- Table structure for table `student_status`
--

CREATE TABLE IF NOT EXISTS `student_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student_status`
--

INSERT INTO `student_status` (`id`, `status`, `description`) VALUES
(1, 'normal user', 'Registered user'),
(2, 'Form submitted', 'Registered user with admission form data submitted.'),
(3, 'Uploaded files', 'Registered user with both form data and required scanned images with necessary documents are submitted.'),
(4, 'Given payment details', 'Register user who has completed their all data submission with required payments.'),
(5, 'Enrolled', 'Users who are enrolled and completed their admission.');

-- --------------------------------------------------------

--
-- Table structure for table `student_uploads`
--

CREATE TABLE IF NOT EXISTS `student_uploads` (
  `user_id` int(11) NOT NULL,
  `doc` enum('0','1') NOT NULL DEFAULT '0',
  `photo` enum('0','1') NOT NULL DEFAULT '0',
  `signature` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_uploads`
--

INSERT INTO `student_uploads` (`user_id`, `doc`, `photo`, `signature`) VALUES
(3, '1', '1', '1'),
(4, '1', '1', '1'),
(5, '1', '1', '1'),
(6, '1', '1', '1'),
(7, '1', '1', '1'),
(8, '0', '0', '0'),
(40, '1', '1', '1'),
(41, '1', '1', '1'),
(42, '1', '1', '1'),
(43, '1', '1', '1'),
(44, '0', '0', '0'),
(45, '1', '1', '1'),
(46, '1', '1', '1'),
(47, '1', '1', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_contact`
--
ALTER TABLE `student_contact`
  ADD CONSTRAINT `student_contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student_login` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_payments`
--
ALTER TABLE `student_payments`
  ADD CONSTRAINT `student_payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student_login` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_personnel`
--
ALTER TABLE `student_personnel`
  ADD CONSTRAINT `student_personnel_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student_login` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_qualification`
--
ALTER TABLE `student_qualification`
  ADD CONSTRAINT `student_qualification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student_login` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_uploads`
--
ALTER TABLE `student_uploads`
  ADD CONSTRAINT `student_uploads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student_login` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
