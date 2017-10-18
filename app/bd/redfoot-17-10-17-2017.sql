# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: redfoot
# Generation Time: 2017-10-18 01:18:37 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address` (
  `startup_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `street` varchar(300) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `complement` varchar(250) DEFAULT NULL,
  `neighborhood` varchar(250) DEFAULT NULL,
  `zipcode` varchar(8) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`startup_id`,`type`),
  CONSTRAINT `pk_add_id` FOREIGN KEY (`startup_id`) REFERENCES `startup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;

INSERT INTO `address` (`startup_id`, `type`, `street`, `number`, `complement`, `neighborhood`, `zipcode`, `city`, `uf`)
VALUES
	(6,1,'Rua Bruno Prospero Parolari','865','','Jd Alpes I','86075010','Londrina',NULL);

/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table business
# ------------------------------------------------------------

DROP TABLE IF EXISTS `business`;

CREATE TABLE `business` (
  `startup_id` int(11) NOT NULL,
  `main_market` int(11) DEFAULT NULL,
  `complementary_market` varchar(3000) DEFAULT NULL,
  `current_moment` int(11) DEFAULT NULL,
  `target_audience` varchar(50) DEFAULT NULL,
  `business_model` int(11) DEFAULT NULL,
  `revenue_model` int(11) DEFAULT NULL,
  PRIMARY KEY (`startup_id`),
  CONSTRAINT `pk_bus_id` FOREIGN KEY (`startup_id`) REFERENCES `startup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;

INSERT INTO `business` (`startup_id`, `main_market`, `complementary_market`, `current_moment`, `target_audience`, `business_model`, `revenue_model`)
VALUES
	(6,2,'\"3\"',1,'1',0,1);

/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_base` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;

INSERT INTO `config` (`id`, `url_base`)
VALUES
	(1,'http://redfoot.local/');

/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table investment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `investment`;

CREATE TABLE `investment` (
  `startup_id` int(11) NOT NULL,
  `is_invested` tinyint(1) DEFAULT NULL,
  `looking_for_investment` int(11) DEFAULT NULL,
  `investment_data` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`startup_id`),
  CONSTRAINT `pk_inv_id` FOREIGN KEY (`startup_id`) REFERENCES `startup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `investment` WRITE;
/*!40000 ALTER TABLE `investment` DISABLE KEYS */;

INSERT INTO `investment` (`startup_id`, `is_invested`, `looking_for_investment`, `investment_data`)
VALUES
	(6,0,0,'\"0\"');

/*!40000 ALTER TABLE `investment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table startup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `startup`;

CREATE TABLE `startup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `partners_number` int(11) DEFAULT NULL,
  `employees_number` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `is_formalized` tinyint(1) DEFAULT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `document1` varchar(14) DEFAULT NULL,
  `foundation_date` date DEFAULT NULL,
  `reason_formalized` int(11) DEFAULT NULL,
  `contact_name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `billing_range` int(11) DEFAULT NULL,
  `options_data` varchar(3000) DEFAULT NULL,
  `needs_text` varchar(3000) DEFAULT NULL,
  `image_path` varchar(300) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

LOCK TABLES `startup` WRITE;
/*!40000 ALTER TABLE `startup` DISABLE KEYS */;

INSERT INTO `startup` (`id`, `name`, `url`, `partners_number`, `employees_number`, `start_date`, `is_formalized`, `fullname`, `document1`, `foundation_date`, `reason_formalized`, `contact_name`, `email`, `phone`, `billing_range`, `options_data`, `needs_text`, `image_path`, `created_date`, `status`)
VALUES
	(6,'Corelab','www.corelab.com.br',1,1,'2017-10-10',0,'','','1970-01-01',1,'',NULL,NULL,0,'null','','media/1bb87d41d15fe27b500a4bfcde01bb0elogo.png','2017-10-17 23:11:56',0);

/*!40000 ALTER TABLE `startup` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table torm_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `torm_info`;

CREATE TABLE `torm_info` (
  `id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `torm_info` WRITE;
/*!40000 ALTER TABLE `torm_info` DISABLE KEYS */;

INSERT INTO `torm_info` (`id`)
VALUES
	(1);

/*!40000 ALTER TABLE `torm_info` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
