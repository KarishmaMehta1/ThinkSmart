-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2014 at 06:38 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mygeneration`
--
CREATE DATABASE IF NOT EXISTS `mygeneration` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mygeneration`;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `ip` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `browser` varchar(50) NOT NULL,
  `window` varchar(50) NOT NULL,
  `file` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`ip`, `username`, `location`, `datetime`, `browser`, `window`, `file`) VALUES
('::1', 'mr.trendsetters', '', '2014-09-27 12:44:34', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f70726f636573735369676e696e2e706870),
('::1', 'guest', '', '2014-09-27 13:02:21', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f696e6465782e706870),
('::1', 'guest', '', '2014-09-27 13:02:36', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f696e6465782e706870),
('::1', 'guest', '', '2014-09-27 13:03:39', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f696e6465782e706870),
('::1', '', '', '2014-09-27 13:10:04', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f696e6465782e706870),
('::1', 'guest', '', '2014-09-27 13:11:26', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f696e6465782e706870),
('::1', 'sahil', '', '2014-09-30 04:08:06', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f70726f636573735369676e696e2e706870),
('::1', 'mr.trendsetters', '', '2014-09-30 04:08:48', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f70726f636573735369676e696e2e706870),
('::1', 'mr.trendsetters', '', '2014-09-30 09:47:17', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f70726f636573735369676e696e2e706870),
('::1', 'sahil', '', '2014-09-30 09:51:28', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f70726f636573735369676e696e2e706870),
('::1', 'sahil', '', '2014-09-30 17:30:01', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f70726f636573735369676e696e2e706870),
('::1', 'mr.trendsetters', '', '2014-10-04 17:24:08', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f70726f636573735369676e696e2e706870),
('::1', 'sahil', '', '2014-10-04 17:24:49', 'Google Chrome.37.0.2062.124', 'Windows 8.1', 0x2f5468696e6b536d6172742f666f72756d2f70726f636573735369676e696e2e706870);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `post_id` int(11) NOT NULL,
  `user_username` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post` blob NOT NULL,
  `cat_id` varchar(5) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comments` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` varchar(10) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` blob NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`) VALUES
('j2se', 'Core Java (J2SE)', 0x43726f737320506c6174666f726d204170706c69636174696f6e20446576656c6f706d656e74),
('php', 'PHP', 0x5072652050726f636573736f7220487970657274657874);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `post_id` int(11) NOT NULL,
  `user_username` varchar(40) NOT NULL,
  `comment` blob NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`post_id`, `user_username`, `comment`, `datetime`) VALUES
(1, 'sahil', 0x676f74636861, '2014-10-04 17:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE IF NOT EXISTS `experts` (
  `expert_name` varchar(50) NOT NULL,
  `expert_username` varchar(40) NOT NULL,
  `expert_password` varchar(40) NOT NULL,
  `expert_email` varchar(50) NOT NULL,
  `expert_spl` varchar(5) NOT NULL,
  `reputation` int(11) NOT NULL DEFAULT '0',
  `status` varchar(1) NOT NULL DEFAULT 'i',
  PRIMARY KEY (`expert_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`expert_name`, `expert_username`, `expert_password`, `expert_email`, `expert_spl`, `reputation`, `status`) VALUES
('Sahil', 'sahil', 'password', 'mr.trendssetters@gmail.com', 'j2se', 0, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE IF NOT EXISTS `forum_posts` (
  `user_username` varchar(40) NOT NULL,
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` varchar(5) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `ques_desc` blob NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0',
  `solutions` int(11) NOT NULL DEFAULT '0',
  `suggestions` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`user_username`, `post_id`, `cat_id`, `headline`, `ques_desc`, `datetime`, `views`, `solutions`, `suggestions`) VALUES
('mr.trendsetters', 1, 'j2se', 'hi', 0x68656c6c6f, '2014-10-04 17:24:23', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE IF NOT EXISTS `solutions` (
  `post_id` int(11) NOT NULL,
  `user_username` varchar(40) NOT NULL,
  `solution` blob NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `voted` varchar(1) NOT NULL DEFAULT 'f',
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE IF NOT EXISTS `suggestions` (
  `post_id` int(11) NOT NULL,
  `user_username` varchar(40) NOT NULL,
  `suggestion` blob NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `voted` varchar(1) NOT NULL DEFAULT 'f',
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`post_id`, `user_username`, `suggestion`, `datetime`, `voted`, `likes`) VALUES
(1, 'mr.trendsetters', 0x776173737570, '2014-10-04 17:24:35', 'f', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_name` varchar(50) NOT NULL,
  `user_username` varchar(40) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_spl` varchar(5) DEFAULT NULL,
  `reputation` int(11) NOT NULL DEFAULT '0',
  `status` varchar(1) NOT NULL DEFAULT 'i',
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `user_username`, `user_password`, `user_email`, `user_spl`, `reputation`, `status`, `code`) VALUES
('Mittul Razdan', 'mr.trendsetters', 'password', 'mr.trendsetters@gmail.com', 'NULL', 2, 'a', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
