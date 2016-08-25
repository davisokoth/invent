-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.0.7-beta - Official MySQL binary
-- Server OS:                    Win32
-- HeidiSQL Version:             8.2.0.4690
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table alivekenya.albums
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `description` text collate utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `active` enum('Y','N') collate utf8_unicode_ci NOT NULL,
  `title` text collate utf8_unicode_ci NOT NULL,
  `releasedate` date NOT NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.albums: 1 rows
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
REPLACE INTO `albums` (`id`, `description`, `status`, `active`, `title`, `releasedate`, `created_at`, `updated_at`) VALUES
	(1, 'Faith in Action', 1, 'Y', 'Faith in Action', '2014-09-17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;


-- Dumping structure for table alivekenya.authors
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `first_name` varchar(255) collate utf8_unicode_ci default NULL,
  `last_name` varchar(255) collate utf8_unicode_ci default NULL,
  `description` longtext collate utf8_unicode_ci,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `authorimg` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.authors: ~2 rows (approximately)
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
REPLACE INTO `authors` (`id`, `first_name`, `last_name`, `description`, `created_at`, `updated_at`, `authorimg`) VALUES
	(1, 'Seraphine', 'Okemwa', 'Seraphine is a student at the University of Nairobi. She love Jesus. She also serves as the Vice President in charge of Training at ALIVE Kenya and as the Prayer Ministry director at the University of Nairobi SDA Church', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sera'),
	(2, 'Janet', 'Oyende', 'Janet, or Jt, is a long-serving Youth Ministries director from Nairobi Central SDA Church. She is a former president of ALIVE Kenya and a member of the ALIVE Kenya Board', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jt');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;


-- Dumping structure for table alivekenya.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(10) NOT NULL,
  `newsid` int(10) NOT NULL,
  `active` enum('Y','N') character set utf8 collate utf8_unicode_ci NOT NULL,
  `imagename` varchar(50) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `isactive` tinyint(4) NOT NULL default '1',
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table alivekenya.banners: ~0 rows (approximately)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;


-- Dumping structure for table alivekenya.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `description` text collate utf8_unicode_ci NOT NULL,
  `active` enum('Y','N') collate utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.comments: 0 rows
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table alivekenya.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `permissions` text collate utf8_unicode_ci,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
REPLACE INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
	(5, 'SuperAdmins', '{"system":1}', '2014-08-01 11:39:33', '2014-08-01 11:39:33'),
	(6, 'Managers', '{"system.articles":1}', '2014-08-01 11:39:33', '2014-08-01 11:39:33'),
	(7, 'Users', '{"system.articles.add":1,"system.articles.edit":1,"system.articles.delete":1,"system.articles.publish":1}', '2014-08-01 11:39:33', '2014-08-01 11:39:33'),
	(8, 'Guests', '{"system.articles.add":1,"system.articles.edit":1,"system.articles.delete":1}', '2014-08-01 11:39:33', '2014-08-01 11:39:33');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table alivekenya.medias
CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL default '1',
  `active` enum('Y','N') collate utf8_unicode_ci NOT NULL default 'Y',
  `rating` smallint(6) NOT NULL default '0',
  `user_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `storedname` varchar(50) collate utf8_unicode_ci NOT NULL,
  `posterimg` varchar(50) collate utf8_unicode_ci default NULL,
  `author_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.medias: 2 rows
/*!40000 ALTER TABLE `medias` DISABLE KEYS */;
REPLACE INTO `medias` (`id`, `name`, `description`, `status`, `active`, `rating`, `user_id`, `program_id`, `album_id`, `created_at`, `updated_at`, `storedname`, `posterimg`, `author_id`) VALUES
	(1, 'Prayers after \'The Doors\'', '\'Njooni\' is Swahili for \'Come.\' It echoes Christ\'s invitation to weary sous to come to Him for rest. This song was written by XXX for King\'s Ministers in October 2001. Br. XXX was undergoing some crisis and the invitation was precisely what he needed then. We hope the song will bless you too!', 1, 'Y', 0, 1, 1, 1, '2014-09-17 13:24:35', '0000-00-00 00:00:00', '108', 'sera.jpg', 1),
	(2, 'Final Charge', 'The Conference final charge', 1, 'Y', 0, 1, 1, 1, '2014-09-30 21:13:07', '0000-00-00 00:00:00', '108', 'jt.jpg', 2);
/*!40000 ALTER TABLE `medias` ENABLE KEYS */;


-- Dumping structure for table alivekenya.meetings
CREATE TABLE IF NOT EXISTS `meetings` (
  `id` int(11) NOT NULL auto_increment,
  `type` tinyint(4) NOT NULL,
  `theme` varchar(200) default NULL,
  `title` varchar(100) default NULL,
  `venue` varchar(100) NOT NULL,
  `startdate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `enddate` timestamp NULL default NULL,
  `cost` float default NULL,
  `description` blob,
  `report` blob,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table alivekenya.meetings: 2 rows
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
REPLACE INTO `meetings` (`id`, `type`, `theme`, `title`, `venue`, `startdate`, `enddate`, `cost`, `description`, `report`) VALUES
	(1, 1, '2010: \'Awake to Righteousness\'', NULL, 'Newlife SDA Church', '2014-10-08 17:22:18', '2010-09-12 16:39:00', 0, _binary 0x5C00000000, NULL),
	(2, 1, '2011: \'The Army\'', NULL, 'Diguna DDT  (Ongata Rongai)', '2014-10-08 17:23:17', '2014-10-08 17:23:19', NULL, _binary 0x000000000000000000000000C035BF0100, NULL);
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;


-- Dumping structure for table alivekenya.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) collate utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.migrations: 0 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table alivekenya.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `createdby` int(11) NOT NULL,
  `ispublished` tinyint(1) NOT NULL default '0',
  `publishdate` timestamp NULL default NULL,
  `validtill` timestamp NULL default NULL,
  `numberviews` int(11) NOT NULL default '0',
  `news` longblob NOT NULL,
  `description` varchar(225) default NULL,
  `title` varchar(225) NOT NULL,
  `hasbanner` char(1) NOT NULL default 'N',
  `isactive` tinyint(4) NOT NULL default '1',
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table to hold specific blog entries (i.e. the blogs)';

-- Dumping data for table alivekenya.news: ~0 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Dumping structure for table alivekenya.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `active` enum('Y','N') collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.profiles: 0 rows
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;


-- Dumping structure for table alivekenya.programs
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `recurrence` varchar(10) NOT NULL,
  `owner` int(11) NOT NULL default '1',
  `eventtype` varchar(10) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `report` longblob,
  `details` longblob,
  `cost` float NOT NULL default '0',
  `currency` varchar(3) NOT NULL default 'KES',
  `brief` varchar(225) default NULL,
  `projectid` int(10) default NULL,
  `xcoord` float default NULL,
  `ycoord` float default NULL,
  `iconname` varchar(50) default NULL,
  `isactive` tinyint(4) NOT NULL default '1',
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `FKProgramsUser` (`user_id`),
  CONSTRAINT `FKProgramsUser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table to track events';

-- Dumping data for table alivekenya.programs: ~1 rows (approximately)
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
REPLACE INTO `programs` (`id`, `name`, `venue`, `startdate`, `enddate`, `recurrence`, `owner`, `eventtype`, `user_id`, `report`, `details`, `cost`, `currency`, `brief`, `projectid`, `xcoord`, `ycoord`, `iconname`, `isactive`, `created_at`, `updated_at`) VALUES
	(1, '#FaithInAction', 'Kenyatta University SDA Church', '2014-09-24 17:53:26', '2014-09-28 17:53:42', 'Annual', 1, 'Conference', 1, NULL, NULL, 0, 'KES', '#Faithinaction is the 2014 ALIVE Kenya Conference', NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;


-- Dumping structure for table alivekenya.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `projectid` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `startdate` date default NULL,
  `enddate` date default NULL,
  `budget` int(11) default NULL,
  `details` longblob,
  `brief` blob,
  `isactive` tinyint(4) NOT NULL default '1',
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`projectid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table alivekenya.projects: ~0 rows (approximately)
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;


-- Dumping structure for table alivekenya.reflections
CREATE TABLE IF NOT EXISTS `reflections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `author` int(11) NOT NULL,
  `ispublished` tinyint(1) NOT NULL default '0',
  `publishdate` timestamp NULL default NULL,
  `validtill` timestamp NULL default NULL,
  `numberviews` int(11) NOT NULL default '0',
  `entry` longblob NOT NULL,
  `brief` mediumtext,
  `isactive` tinyint(4) NOT NULL default '1',
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table to hold specific blog entries (i.e. the blogs)';

-- Dumping data for table alivekenya.reflections: ~0 rows (approximately)
/*!40000 ALTER TABLE `reflections` DISABLE KEYS */;
/*!40000 ALTER TABLE `reflections` ENABLE KEYS */;


-- Dumping structure for table alivekenya.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.tags: 10 rows
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
REPLACE INTO `tags` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'prayer', 'prayer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'devotion', 'devotion', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'revival', 'revival', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'relationships', 'relationships', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'faith', 'faith', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'mission', 'mission', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'bible study', 'bible study', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'training', 'training', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'growth', 'growth', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'doctrine', 'doctrine', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Dumping structure for table alivekenya.tags_medias
CREATE TABLE IF NOT EXISTS `tags_medias` (
  `tag_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  PRIMARY KEY  (`tag_id`,`media_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table alivekenya.tags_medias: 4 rows
/*!40000 ALTER TABLE `tags_medias` DISABLE KEYS */;
REPLACE INTO `tags_medias` (`tag_id`, `media_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 2),
	(5, 2);
/*!40000 ALTER TABLE `tags_medias` ENABLE KEYS */;


-- Dumping structure for table alivekenya.throttle
CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned default NULL,
  `ip_address` varchar(255) collate utf8_unicode_ci default NULL,
  `attempts` int(11) NOT NULL default '0',
  `suspended` tinyint(1) NOT NULL default '0',
  `banned` tinyint(1) NOT NULL default '0',
  `last_attempt_at` timestamp NULL default NULL,
  `suspended_at` timestamp NULL default NULL,
  `banned_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.throttle: ~2 rows (approximately)
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
REPLACE INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
	(1, 1, '::1', 0, 0, 0, NULL, NULL, NULL),
	(2, 2, '::1', 0, 0, 0, NULL, NULL, NULL);
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;


-- Dumping structure for table alivekenya.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password` varchar(255) collate utf8_unicode_ci NOT NULL,
  `permissions` text collate utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL default '0',
  `activation_code` varchar(255) collate utf8_unicode_ci default NULL,
  `activated_at` timestamp NULL default NULL,
  `last_login` timestamp NULL default NULL,
  `persist_code` varchar(255) collate utf8_unicode_ci default NULL,
  `reset_password_code` varchar(255) collate utf8_unicode_ci default NULL,
  `first_name` varchar(255) collate utf8_unicode_ci default NULL,
  `last_name` varchar(255) collate utf8_unicode_ci default NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
	(1, 'deenee@name.com', '$2y$10$gPH536M/0FsrP6t5UrVdP.U.xHGVEKCly7hMRkaBw/4YSRlFt3stG', NULL, 1, NULL, NULL, '2014-10-08 13:28:34', '$2y$10$FKco8NEZ7r1K9m/XX3Zls.5zV73.FOgDtKSdlfRrkebkR.wPqt9XW', NULL, 'Davis', 'Okoth', '2014-08-01 12:26:53', '2014-10-08 13:28:34'),
	(2, 'davisokoth@gmail.com', '$2y$10$yRKXXokzKSQ7R/4mTuhh3.J9eLVS6PSrTm9mjKyFahufQMb.GD8X6', NULL, 1, 'mb5kru6L90Zwtn0cpJk0UzxNll6BO4lt9FoRBYGZnQ', NULL, '2014-10-24 09:28:23', '$2y$10$FyDPiL0skVq82Jm7mGU1t.X1xxePv.jvvGNkuxpuAw8fnXCUocsSG', NULL, 'Davis', 'Okoth', '2014-08-21 07:42:02', '2014-10-24 09:28:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table alivekenya.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table alivekenya.users_groups: ~1 rows (approximately)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
REPLACE INTO `users_groups` (`user_id`, `group_id`) VALUES
	(2, 5);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
