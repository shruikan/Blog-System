-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 20 авг 2014 в 22:30
-- Версия на сървъра: 5.5.25a
-- PHP Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shruikan`
--

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) NOT NULL,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`id`, `slug`, `label`) VALUES
(1, 'news', 'News');

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `author` varchar(30) NOT NULL,
  `content` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `label` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL,
  `target` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Схема на данните от таблица `navigation`
--

INSERT INTO `navigation` (`id`, `label`, `url`, `target`, `position`, `status`) VALUES
(1, 'Home', 'http://blog.vezni.org/home', '', 0, 1),
(2, 'About', 'http://blog.vezni.org/about', '', 1, 1),
(3, 'Contacts', 'http://blog.vezni.org/contacts', '', 2, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user` mediumint(9) NOT NULL,
  `date` datetime NOT NULL,
  `category` varchar(35) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `header` varchar(300) NOT NULL,
  `body` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Схема на данните от таблица `pages`
--

INSERT INTO `pages` (`id`, `user`, `date`, `category`, `slug`, `label`, `title`, `header`, `body`) VALUES
(1, 0, '0000-00-00 00:00:00', 'news', 'welcome', 'Welcome', 'Welcome to the Blog System', 'Welcome to the Blog System', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 0, '0000-00-00 00:00:00', 'news', 'test-post', 'Test', 'Test Post', 'Test Post in The Blog System', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?');

-- --------------------------------------------------------

--
-- Структура на таблица `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` varchar(150) NOT NULL,
  `label` varchar(150) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `settings`
--

INSERT INTO `settings` (`id`, `label`, `value`) VALUES
('debug-status', 'Debug Status', '1'),
('site-title', 'Site Title', 'Blog System');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(100) NOT NULL,
  `user` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `family` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `avatar`, `user`, `name`, `family`, `email`, `password`, `url`, `reg_date`, `status`) VALUES
(1, '1408494148934.jpg', 'Admin', 'Blog', 'System', 'admin@blog.com', 'aafdc23870ecbcd3d557b6423a8982134e17927e', 'http://blog.vezni.org/', '2014-08-19 00:00:00', 1),
(2, '', 'user', 'Pesho', 'Peshev', 'pesho@blog.com', 'f9618390f8cd6af82c9a276d4ed5d60c25a7d284', 'http://pesho.com', '2014-08-19 07:30:04', 0),
(4, '', 'test_date', 'test', 'test', 'rrtest@gb.n', '202cb962ac59075b964b07152d234b70', '', '2014-08-19 14:59:24', 1),
(5, '', 'test', 'test', 'test', 'test@test.bg', '202cb962ac59075b964b07152d234b70', '', '2014-08-19 17:54:57', 1),
(6, '', 'test', 'test', 'test', 'test@test.bg', '202cb962ac59075b964b07152d234b70', '', '2014-08-19 17:55:21', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
