-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2015 at 04:23 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `writer`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_title` varchar(50) NOT NULL,
  `order_description` varchar(200) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_completion_date` datetime NOT NULL,
  `assigned_status` varchar(10) NOT NULL,
  `assigned_writer` varchar(50) NOT NULL,
  `order_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_type` varchar(30) NOT NULL,
  `document_type` varchar(30) NOT NULL,
  `academic_level` varchar(30) NOT NULL,
  `spacing` varchar(20) NOT NULL,
  `pages` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `activation_token` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `worders`
--

CREATE TABLE IF NOT EXISTS `worders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_title` varchar(50) NOT NULL,
  `order_description` varchar(200) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_completion_date` datetime NOT NULL,
  `assigned_status` varchar(10) NOT NULL,
  `assigned_writer` varchar(50) NOT NULL,
  `order_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_type` varchar(30) NOT NULL,
  `document_type` varchar(30) NOT NULL,
  `academic_level` varchar(30) NOT NULL,
  `spacing` varchar(20) NOT NULL,
  `pages` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
