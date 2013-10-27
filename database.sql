-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2013 at 07:28 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gdg_hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` longtext NOT NULL,
  `tags` longtext NOT NULL,
  `path` longtext NOT NULL,
  `author` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `shouts`
--

CREATE TABLE IF NOT EXISTS `shouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `shouts`
--

INSERT INTO `shouts` (`id`, `name`, `message`, `post_date`) VALUES
(1, 'Varun', 'hello :)', '2013-10-21 17:44:17'),
(2, 'Varun', 'Hello', '2013-10-21 17:44:48'),
(3, 'Varun', 'Hey', '2013-10-21 18:58:46'),
(4, 'search.php?author=', 'hey', '2013-10-21 19:19:37'),
(5, 'search.php?author=', 'hey', '2013-10-21 19:19:42'),
(6, 'Zath', 'hello', '2013-10-22 13:33:33'),
(7, 'Zath', 'Hello :)', '2013-10-23 05:27:09'),
(8, 'Zath', 'heklki', '2013-10-23 05:27:40'),
(9, 'Zath', 'Google :P', '2013-10-23 05:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `category` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`username`, `password`, `name`, `email`, `category`) VALUES
('zath', 'Sa', 'Varun', 'varunraj.026@gmail.com', 'cat'),
('zathvarun', 'google', 'Varun', 'varunraj.026@gmail.com', 'Developer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
