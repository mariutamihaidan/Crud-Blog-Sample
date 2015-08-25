-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2015 at 09:52 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cuimip_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `modified_at`) VALUES
(4, 'aaaaaaaaa', 'Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'aaaaaaaaaadsf', 'Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content test Content ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'aaaaa', 'aaaaaa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'ccccccccc', 'ccccccccccc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'test', 'adsfasd adsf adsf asdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'ttttttttttttt', 'adsfasdfasdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'eeeeeeeeeeeeee', '2222222222222222', '0000-00-00 00:00:00', '2015-08-25 00:52:26'),
(19, 'adsfasdf', 'adsfasdf', '2015-08-24 19:52:36', '2015-08-25 00:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `email`, `password`, `created_on`) VALUES
(1, 'admin', 'admin@admin.com', 'password', '2015-08-24 08:17:07'),
(3, 'user', 'Volly1964@cuvox.de', 'Volly1964@cuvox.de', '2015-08-24 23:48:17'),
(4, 'user', 'Aphism32@dayrep.com', 'Aphism32@dayrep.com', '2015-08-25 00:47:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
