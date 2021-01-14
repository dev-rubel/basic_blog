-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2021 at 09:56 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(256) DEFAULT NULL,
  `postid` longtext DEFAULT NULL,
  `name` varchar(10000) DEFAULT NULL,
  `message` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pics`
--

DROP TABLE IF EXISTS `pics`;
CREATE TABLE IF NOT EXISTS `pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` mediumtext NOT NULL,
  `text` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `search` varchar(10000) DEFAULT NULL,
  `category` longtext DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `engag` int(11) NOT NULL DEFAULT 0,
  `date` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

DROP TABLE IF EXISTS `post_likes`;
CREATE TABLE IF NOT EXISTS `post_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sitedetails`
--

DROP TABLE IF EXISTS `sitedetails`;
CREATE TABLE IF NOT EXISTS `sitedetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitelogo` mediumtext DEFAULT NULL,
  `sitetitle` mediumtext DEFAULT NULL,
  `sitetagline` mediumtext DEFAULT NULL,
  `per_page` varchar(10) DEFAULT '10',
  `like_point` int(11) DEFAULT 3,
  `comment_point` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitedetails`
--

INSERT INTO `sitedetails` (`id`, `sitelogo`, `sitetitle`, `sitetagline`, `per_page`, `like_point`, `comment_point`) VALUES
(1, '300x300.png', 'PHP News Feed', '', '10', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(10000) DEFAULT NULL,
  `last` varchar(10000) DEFAULT NULL,
  `username` varchar(10000) DEFAULT NULL,
  `password` varchar(10000) DEFAULT NULL,
  `user_type` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first`, `last`, `username`, `password`, `user_type`) VALUES
(1, 'Admin', 'Page', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(4, 'Md', 'Rubel', 'rubel', '8fdabe873b1cc6e1b4a9069480aaaf1d', 'user'),
(5, 'md', 'rakib', 'rakib', 'a36949228c1d9146cace6359d88968e8', 'user'),
(6, 'md', 'raton', 'raton', '7a2c8a31c1ee7868a14f435fefcb3381', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
