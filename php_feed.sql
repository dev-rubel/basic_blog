-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2021 at 07:20 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `postid`, `name`, `message`) VALUES
(1, NULL, '39', 'Dev Rubel', 'Test Message'),
(2, '100826443277825392469', '39', 'Dev Rubel', 'Another test message.'),
(3, '100826443277825392469', '31', 'Dev Rubel', 'Hello World'),
(4, '4', '40', 'Md Rubel', 'Yes, appreciate it.'),
(5, '1', '44', 'Admin Page', 'test'),
(6, '1', '44', 'Admin Page', 'hello'),
(7, '6', '45', 'md raton', 'Yes');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pics`
--

INSERT INTO `pics` (`id`, `image`, `text`) VALUES
(4, 'coding-dojo.png', 'sdsadasdsadsd asdsadsadsadwdwbbdwubdw wkduwuidiwudniuwniudnwd wdiuwiudwiudwnbdbwdwdiuwddwdwd'),
(5, 'Capture.PNG', 'asdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsdasdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsd'),
(6, 'nigeriantech.PNG', 'sadsadsadasdsasdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsdasdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsdasdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsd'),
(7, 'nigeriantech.PNG', 'sadsadsadasdsasdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsdasdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsdasdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsd'),
(8, 'nigeriantech.PNG', 'sadsadsadasdsasdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsdasdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsdasdsadsdsadasdasd\r\nsadasdasdasdsadsad\r\nsdsadsadasdasdasdsd');

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `search`, `category`, `title`, `text`, `image`, `featured`, `engag`, `date`) VALUES
(11, '1', 'My', 'Programming', 'My Strategy and Skills', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'FB_IMG_15359946402223797.jpg', 0, 0, 'May 18, 2019'),
(20, NULL, 'Le', 'Programming', 'Learn to CODE', '	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'download.jpg', 0, 0, 'June 22, 2019'),
(31, '31', NULL, 'Technology, Google', 'How to code a program', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                  		     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                  		     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                  		     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                  		     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                  		     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1610166151.jpg', 1, 0, 'August 2, 2019'),
(39, '100826443277825392469', '', 'test', 'Victim blaming must stop', 'Whenever there is an incident of rape, most people tend to say that it was the girl or woman\'s fault, and question her character, social class, outfit, sexual experience, and lifestyle.\r\n\r\nAfter the news of the rape and subsequent death of a 17-year-old O-level student was published Thursday night, many took to social media to blame the girl.', '1610184467_100826443277825392469.jpg', 1, 0, 'January 9, 2021'),
(40, '4', NULL, 'Wasim Bin Habib, Sohel Parvez and Shaheen Mollah', '2020, the Year of Pandemic: Heartbreaks in heartland', 'Abdur Rahim*, a private tutor in Dhaka, thought his life had finally stabilised after two decades of hard work. With a steady income, he could afford a place in the capital and sustain his family.\r\n\r\nBut the stability he achieved was lost after coronavirus arrived on the country\'s shores in early March, destroying the very means of living as the tiny microbe upended all aspects of public life, work, and education.', '1610194029_4.jpg', 1, 0, 'January 9, 2021'),
(41, '5', NULL, 'Mohammad Jamil Khan', 'Fake NID for Tk 1.5 lakh', 'A syndicate of brokers and some dishonest staffers of the Election Commission had been forging national ID cards for years due to a lack of strict monitoring and loopholes in the system, found a police investigation.', '1610197868_5.jpg', 0, 0, 'January 9, 2021'),
(42, '5', NULL, 'Ramisa Rob', 'The lethal legacy of Donald Trump: American fascism', 'If there was any doubt that America has been encroaching fascism, it ended on Wednesday with the white nationalist coup in the US Capitol. The image of an American flag replaced with a Trump flag symbolises the \"F-word\" to its very core. At this point, America might as well wake up and prepare for another historically horrible political event infiltrated by Donald J. Trump, the most unhinged leader in the nation\'s history.', '1610203620_5.jpg', 0, 0, 'January 9, 2021'),
(43, '1', NULL, 'Ramisa Rob', 'The lethal legacy of Donald Trump: American fascism a', 'aaa', '1610435598_1.jpg', 0, 0, 'January 9, 2021'),
(44, '1', NULL, 'Technologys', 'Victim blaming must stop', 'Technologys', '1610438732_1.png', 0, 3, 'January 9, 2021'),
(45, '6', NULL, 'মফিজুল সাদিক, সিনিয়র করেসপন্ডেন্ট', 'বিদেশফেরতদের তালিকা করে বিশ্বব্যাংকের ঋণে পুনর্বাসন', 'ঢাকা: বিশ্বের বিভিন্ন দেশ থেকে ফেরত আসা কর্মীদের সামাজিক ও অর্থনৈতিকভাবে পুনর্বাসনের ব্যবস্থা করতে প্রকল্প হাতে নিতে যাচ্ছে সরকার। দেশব্যাপী বিদেশফেরত কর্মীদের তালিকা তৈরি করা হবে।\r\n\r\nএছাড়া বিশ্বব্যাংকের ঋণ সহায়তায় এসব কর্মীদের আর্থিক সহায়তা দেওয়া হবে বলে জানায় ওয়েজ আর্নার্স কল্যাণ বোর্ড।  ', '1610529365_6.jpg', 0, 3, 'January 13, 2021');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id`, `post_id`, `user_id`) VALUES
(2, 45, 6),
(3, 44, 6);

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
(1, '300x300.png', 'PHP News Feed', '', '2', 3, NULL);

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
