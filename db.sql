/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.31-MariaDB : Database - gungsaty_itcc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `category` enum('PROG','WEB','IDEA','LCC') DEFAULT NULL,
  `privilege` enum('lomba','sekre','humas','juri') DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text,
  `a_token` text,
  `last_login_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

/*Table structure for table `detail_score_list` */

DROP TABLE IF EXISTS `detail_score_list`;

CREATE TABLE `detail_score_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score_list_id` int(11) DEFAULT NULL,
  `part` enum('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z') DEFAULT NULL,
  `score` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_score_list` */

/*Table structure for table `group` */

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(50) DEFAULT NULL,
  `institution` varchar(50) DEFAULT NULL,
  `category` enum('LCC','PROG','WEB','IDEA') DEFAULT NULL,
  `verified_status` enum('Y','N') DEFAULT 'N',
  `verified_at` datetime DEFAULT NULL,
  `verifying_admin` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `group` */

insert  into `group`(`id`,`groupname`,`institution`,`category`,`verified_status`,`verified_at`,`verifying_admin`) values (4,'ITCC-01','SMA N 1','PROG','N',NULL,NULL);

/*Table structure for table `jury` */

DROP TABLE IF EXISTS `jury`;

CREATE TABLE `jury` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `login_at` datetime DEFAULT NULL,
  `category` enum('IDEA') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `j_token` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jury` */

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` tinyint(4) DEFAULT NULL,
  `group_id` tinyint(4) DEFAULT NULL,
  `tag` enum('ALL','IDEA','LCC','WEB','PROG') DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `message` */

/*Table structure for table `object` */

DROP TABLE IF EXISTS `object`;

CREATE TABLE `object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(4) DEFAULT NULL,
  `title` text,
  `link` text,
  `etc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `object` */

/*Table structure for table `participant` */

DROP TABLE IF EXISTS `participant`;

CREATE TABLE `participant` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(4) DEFAULT NULL,
  `code` varchar(20) DEFAULT '-',
  `fullname` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text,
  `u_token` text,
  `on` enum('N','Y') DEFAULT 'N',
  `create_at` datetime DEFAULT NULL,
  `last_update_at` datetime DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `active` enum('N','Y') DEFAULT 'Y',
  `vegetarian` enum('N','Y') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `participant` */

insert  into `participant`(`id`,`group_id`,`code`,`fullname`,`birthday`,`email`,`contact`,`photo`,`username`,`password`,`u_token`,`on`,`create_at`,`last_update_at`,`last_login_at`,`active`,`vegetarian`) values (4,4,'-','Satya','0000-00-00','mail@mail.com','082144646225','-','gung_satya','1621A5DC746D5D19665ED742B2EF9736','fd26589dbb392c904863c1e38afbe270','Y',NULL,NULL,'2018-07-12 19:55:25','Y','N');

/*Table structure for table `score_list` */

DROP TABLE IF EXISTS `score_list`;

CREATE TABLE `score_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jury_id` int(11) DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `ip` text,
  `scored_at` datetime DEFAULT NULL,
  `stage` enum('elimination','final') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `score_list` */

/*Table structure for table `upload_logs` */

DROP TABLE IF EXISTS `upload_logs`;

CREATE TABLE `upload_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `filename` varchar(20) DEFAULT NULL,
  `upload_at` datetime DEFAULT NULL,
  `checklist` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `upload_logs` */

/*Table structure for table `verified_req` */

DROP TABLE IF EXISTS `verified_req`;

CREATE TABLE `verified_req` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(4) DEFAULT NULL,
  `request_at` datetime DEFAULT NULL,
  `filename` varchar(20) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `verified_req` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
