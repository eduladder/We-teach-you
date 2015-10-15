-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2015 at 05:17 AM
-- Server version: 5.1.62-community
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teacher_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_management`
--

CREATE TABLE IF NOT EXISTS `student_management` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `student_usn` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `student_library` smallint(10) NOT NULL,
  `student_canteen` smallint(10) NOT NULL,
  `student_lab` smallint(10) NOT NULL,
  `student_classroom` smallint(10) NOT NULL,
  `student_transport` smallint(10) NOT NULL,
  `student_toilet` smallint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student_management`
--

INSERT INTO `student_management` (`id`, `student_usn`, `student_library`, `student_canteen`, `student_lab`, `student_classroom`, `student_transport`, `student_toilet`) VALUES
(1, '1jt11is003', 2, 2, 1, 4, 5, 2),
(2, '1jt11me033', 1, 3, 4, 1, 1, 5),
(3, '1jt12cs033', 2, 2, 3, 3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_catagory`
--

CREATE TABLE IF NOT EXISTS `teachers_catagory` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `section_id` varchar(100) NOT NULL,
  `teacher_id` smallint(10) DEFAULT NULL,
  `department_id` smallint(10) DEFAULT NULL,
  `teacher_name` varchar(100) DEFAULT NULL,
  `teacher_section` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `teachers_catagory`
--

INSERT INTO `teachers_catagory` (`id`, `subject_code`, `section_id`, `teacher_id`, `department_id`, `teacher_name`, `teacher_section`) VALUES
(27, '10MAT11', '5', 12, 3, 'Kemparaju m.c', 'Physics'),
(30, '10PHY12', '5', 13, 3, 'Vinay deepak', 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_department`
--

CREATE TABLE IF NOT EXISTS `teachers_department` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_department` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teachers_department`
--

INSERT INTO `teachers_department` (`id`, `teacher_department`) VALUES
(3, 'Mathamatics'),
(4, 'Basic science');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_feedback`
--

CREATE TABLE IF NOT EXISTS `teachers_feedback` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `teacher_id` smallint(10) DEFAULT NULL,
  `sectionid` varchar(10) DEFAULT NULL,
  `department_id` smallint(10) NOT NULL,
  `student_usn` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `teacher_clarity` smallint(10) NOT NULL,
  `teacher_understand` smallint(10) NOT NULL,
  `teacher_relevent` smallint(10) NOT NULL,
  `teacher_answer` smallint(10) NOT NULL,
  `teacher_ontime` smallint(10) NOT NULL,
  `teacher_example` smallint(10) NOT NULL,
  `teacher_help` smallint(10) NOT NULL,
  `teacher_communication` smallint(10) NOT NULL,
  `teacher_control` smallint(10) NOT NULL,
  `teacher_overoll` smallint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `teachers_feedback`
--

INSERT INTO `teachers_feedback` (`id`, `teacher_name`, `teacher_id`, `sectionid`, `department_id`, `student_usn`, `teacher_clarity`, `teacher_understand`, `teacher_relevent`, `teacher_answer`, `teacher_ontime`, `teacher_example`, `teacher_help`, `teacher_communication`, `teacher_control`, `teacher_overoll`) VALUES
(112, 'Kemparaju', 12, '5', 3, '1jt11is003', 1, 1, 3, 2, 1, 3, 4, 1, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_name`
--

CREATE TABLE IF NOT EXISTS `teachers_name` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `teachers_name`
--

INSERT INTO `teachers_name` (`id`, `teacher_name`, `photo`) VALUES
(12, 'Kemparaju m.c', 'kemp.jpg'),
(13, 'Vinay deepak', 'vinay.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_overoll`
--

CREATE TABLE IF NOT EXISTS `teachers_overoll` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `teacher_id` smallint(10) DEFAULT NULL,
  `teacher_clarity` smallint(10) NOT NULL,
  `teacher_understand` smallint(10) NOT NULL,
  `teacher_relevent` smallint(10) NOT NULL,
  `teacher_answer` smallint(10) NOT NULL,
  `teacher_ontime` smallint(10) NOT NULL,
  `teacher_example` smallint(10) NOT NULL,
  `teacher_help` smallint(10) NOT NULL,
  `teacher_communication` smallint(10) NOT NULL,
  `teacher_control` smallint(10) NOT NULL,
  `teacher_overoll` smallint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `teachers_overoll`
--

INSERT INTO `teachers_overoll` (`id`, `teacher_name`, `teacher_id`, `teacher_clarity`, `teacher_understand`, `teacher_relevent`, `teacher_answer`, `teacher_ontime`, `teacher_example`, `teacher_help`, `teacher_communication`, `teacher_control`, `teacher_overoll`) VALUES
(9, 'Kemparaju', 12, 10, 10, 6, 13, 8, 15, 13, 9, 16, 11),
(10, 'Vinay', 13, 6, 6, 6, 5, 5, 3, 3, 4, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_section`
--

CREATE TABLE IF NOT EXISTS `teachers_section` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_section` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `teachers_section`
--

INSERT INTO `teachers_section` (`id`, `teacher_section`) VALUES
(5, 'Physics'),
(6, 'Chemistry'),
(7, 'B section'),
(8, 'C section');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
