-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2010 at 06:00 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gravitas1`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `code` varchar(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `leader1` varchar(50) NOT NULL,
  `leader2` varchar(50) NOT NULL,
  `phone1` bigint(10) NOT NULL,
  `phone2` bigint(10) NOT NULL,
  `p_male` int(4) NOT NULL,
  `p_female` int(4) NOT NULL,
  `staff_male` int(4) NOT NULL,
  `staff_female` int(4) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`code`, `name`, `leader1`, `leader2`, `phone1`, `phone2`, `p_male`, `p_female`, `staff_male`, `staff_female`, `reg_date`) VALUES
('001', 'MIT,Boston', '', '', 0, 0, 0, 0, 0, 0, '0000-00-00'),
('002', 'Princeton', '', '', 0, 0, 0, 0, 0, 0, '0000-00-00'),
('003', 'VIT,Vellore', '', '', 0, 0, 0, 0, 0, 0, '0000-00-00'),
('004', 'Manipal', '', '', 0, 0, 0, 0, 0, 0, '0000-00-00'),
('005', 'BITS Pilani', '', '', 0, 0, 0, 0, 0, 0, '0000-00-00'),
('006', 'IIT Mumbai', '', '', 0, 0, 0, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dd`
--

CREATE TABLE IF NOT EXISTS `dd` (
  `code` varchar(10) NOT NULL,
  `dd_amt` bigint(10) NOT NULL,
  `issue_date` date NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `dd_num` varchar(30) NOT NULL,
  PRIMARY KEY (`dd_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dd`
--


-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `e_num` int(11) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(50) NOT NULL,
  `e_type` varchar(20) NOT NULL,
  `e_price` bigint(20) NOT NULL,
  `team_limit` int(2) NOT NULL,
  `e_date` int(11) NOT NULL,
  PRIMARY KEY (`e_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `events`
--


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `code` varchar(10) NOT NULL,
  `non_premium` bigint(20) NOT NULL,
  `robotic` bigint(20) NOT NULL,
  `gaming` bigint(20) NOT NULL,
  `other` bigint(20) NOT NULL,
  `caution` int(11) NOT NULL,
  `dac` bigint(20) NOT NULL,
  `dar` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--


-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE IF NOT EXISTS `reg` (
  `code` varchar(10) NOT NULL,
  `e_num` int(11) NOT NULL,
  `num_teams` int(11) NOT NULL DEFAULT '0',
  `num_par` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`,`e_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

