--
-- Database: `db_shruikan`
--

--
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_ID` bigint(20) unsigned NOT NULL auto_increment,
  `comment_author` tinytext NOT NULL,
  `comment_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_approved` varchar(20) NOT NULL default '1',
  PRIMARY KEY  (`comment_ID`),
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Структура на таблица `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `post_author` bigint(20) unsigned NOT NULL default '0',
  `post_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `comment_count` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `user_login` varchar(60) NOT NULL default '',
  `user_pass` varchar(64) NOT NULL default '',
  `user_fname` varchar(50) NOT NULL default '',
  `user_family` varchar(50) NOT NULL default '',
  `user_email` varchar(100) NOT NULL default '',
  `user_url` varchar(100) NOT NULL default '',
  `user_reg_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_status` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`ID`, `user_login`, `user_pass`, `user_fname`, `user_family`,`user_email`, `user_url`, `user_reg_date`, `user_status`) VALUES
(1, 'admin', '', 'Admin', 'Adminov', 'admin@yahoo.com', 'https://github.com/shruikan/Blog-System/', '2012-06-27 21:22:49', 0),
(2, 'user', '', 'User', 'Userov', 'user@gmail.com', 'https://github.com/shruikan/', '2012-07-14 15:20:13', 0);
