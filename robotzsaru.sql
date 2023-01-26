-- --------------------------------------------------------
-- Host:                         titok
-- Server version:               10.1.44-MariaDB-0ubuntu0.18.04.1 - Ubuntu 18.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for robotzsaru
CREATE DATABASE IF NOT EXISTS `robotzsaru` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `robotzsaru`;

-- Dumping structure for table robotzsaru.files
CREATE TABLE IF NOT EXISTS `files` (
  `dbid` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(16) NOT NULL DEFAULT 'NO TITLE',
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL DEFAULT 'NO TITLE',
  `author` int(11) NOT NULL DEFAULT '0',
  `text` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `archive` int(11) DEFAULT '0',
  `edited_by` int(11) DEFAULT '0',
  `edited` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dbid`),
  UNIQUE KEY `file_name` (`file_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Nyomozati akták';

-- Data exporting was unselected.

-- Dumping structure for table robotzsaru.minutes
CREATE TABLE IF NOT EXISTS `minutes` (
  `dbid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL DEFAULT 'UNKNOWN TITLE',
  `author` int(11) DEFAULT '0',
  `text` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `edited_by` int(11) DEFAULT '0',
  `edited` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dbid`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Jegyzőkönyvek';

-- Data exporting was unselected.

-- Dumping structure for table robotzsaru.ranks
CREATE TABLE IF NOT EXISTS `ranks` (
  `dbid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL DEFAULT 'UNKNOWN RANKNAME',
  `perm` int(11) DEFAULT '0',
  PRIMARY KEY (`dbid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table robotzsaru.users
CREATE TABLE IF NOT EXISTS `users` (
  `badge_number` varchar(5) NOT NULL COMMENT 'Játékos jelvényszáma',
  `playername` varchar(25) NOT NULL DEFAULT 'UNKNOWN NAME' COMMENT 'Játékos neve',
  `password` varchar(128) DEFAULT NULL COMMENT 'Játékos jelszava (SHA512)',
  `rank` int(11) DEFAULT '0' COMMENT 'Játékos joga',
  `active` int(1) DEFAULT '0' COMMENT 'Játékos aktív-e (beléphet-e)',
  `registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Játékos regisztrációjának ideje',
  PRIMARY KEY (`badge_number`),
  UNIQUE KEY `playername` (`playername`),
  KEY `FK_users_ranks` (`rank`),
  CONSTRAINT `FK_users_ranks` FOREIGN KEY (`rank`) REFERENCES `ranks` (`dbid`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
