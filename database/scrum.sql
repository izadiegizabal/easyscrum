-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2017 at 11:56 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scrum`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
CREATE TABLE IF NOT EXISTS `board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `title`) VALUES
(1, 'board1\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `ref_board` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_board` (`ref_board`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `title`, `ref_board`) VALUES
(1, 'backlog1', 1),
(2, 'backlog2', 1),
(3, 'progress', 1),
(4, 'sprint', 1),
(5, 'done', 1);

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

DROP TABLE IF EXISTS `checklist`;
CREATE TABLE IF NOT EXISTS `checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `title`, `active`) VALUES
(5, 'n kj kjjk', 0),
(6, 'checklist', 0);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_item`
--

DROP TABLE IF EXISTS `checklist_item`;
CREATE TABLE IF NOT EXISTS `checklist_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `ref_checklist` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_checklist` (`ref_checklist`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist_item`
--

INSERT INTO `checklist_item` (`id`, `description`, `active`, `ref_checklist`) VALUES
(2, 'task', 0, 5),
(3, 'task', 0, 6),
(4, 'task', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `date` datetime NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `title`, `date`, `description`) VALUES
(7, 'khoa', '2017-11-18 13:00:00', 'asdfasdfasd'),
(2, 'testsdasdfsdfasdfsadfsadfsd', '2017-11-07 21:05:00', 'testsadfWFWEF'),
(3, 'test', '2017-11-14 16:02:00', 'test'),
(4, 'asdgasdgasdg', '2017-11-17 14:01:00', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `user_stories`
--

DROP TABLE IF EXISTS `user_stories`;
CREATE TABLE IF NOT EXISTS `user_stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `reason` text NOT NULL,
  `estimate` int(11) NOT NULL,
  `business_value` int(11) NOT NULL,
  `ref_card` int(11) NOT NULL,
  `ref_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_card` (`ref_card`),
  KEY `ref_user` (`ref_user`),
  KEY `ref_user_2` (`ref_user`),
  KEY `ref_user_3` (`ref_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checklist_item`
--
ALTER TABLE `checklist_item`
  ADD CONSTRAINT `checklist_item_ibfk_1` FOREIGN KEY (`ref_checklist`) REFERENCES `checklist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
