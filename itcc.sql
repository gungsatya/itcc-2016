/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.13-MariaDB : Database - gungsaty_itcc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gungsaty_itcc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `gungsaty_itcc`;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`fullname`,`category`,`privilege`,`username`,`password`,`a_token`,`last_login_at`) values (1,'IGBN Satya Wibawa','IDEA','sekre','idea','d10d6b075de8234f2d33d8246aba5800','b73f9a764167e7b4e24fb46356f1fdbf','2016-09-12 19:29:21'),(2,'IGBN Satya Wibawa','LCC','sekre','lcc','d10d6b075de8234f2d33d8246aba5800',NULL,'2016-08-16 08:39:59'),(3,'IGBN Satya Wibawa','PROG','sekre','prog','d10d6b075de8234f2d33d8246aba5800','0f76220b904c173a84742f62cf6037dc','2016-08-30 10:56:37'),(4,'IGBN Satya Wibawa','WEB','sekre','web','d10d6b075de8234f2d33d8246aba5800',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `group` */

insert  into `group`(`id`,`groupname`,`institution`,`category`,`verified_status`,`verified_at`,`verifying_admin`) values (1,'Green Tea','SMA Negeri 1 Singaraja','LCC','N',NULL,NULL),(2,'Green Tea II','SMA Negeri 1 Singaraja','WEB','Y',NULL,NULL),(3,'I Gusti','SMA Negeri 1 Singaraja','IDEA','N','2016-08-22 12:07:38',1),(4,'PROG','SMA Negeri 1 Singaraja','PROG','N',NULL,NULL),(5,'Ini Baru John','SMA N A','IDEA','Y','2016-08-22 12:21:15',1),(6,'PROG','SMA Negeri 1 Singaraja','PROG','Y','2016-08-30 10:56:49',3),(7,'BlaBlaBla','BlaBlaBla','IDEA','N',NULL,NULL),(8,'PROG','sman 1 kuta utara','PROG','N',NULL,NULL),(9,'PROG','Coba AJa','PROG','N',NULL,NULL),(10,'PROG','1234567890','PROG','N',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `jury` */

insert  into `jury`(`id`,`fullname`,`login_at`,`category`,`username`,`password`,`j_token`) values (1,'maitri','2016-09-12 18:01:55','IDEA','maitri','49302973bb721af9052a091195a7d7d5','3b5d9d88051bf3ce9dd958ffbb980bf4');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` tinyint(4) DEFAULT NULL,
  `group_id` tinyint(4) DEFAULT NULL,
  `tag` enum('ALL','IDEA','LCC','WEB','PROG') DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `message` */

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
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `participant` */

insert  into `participant`(`id`,`group_id`,`code`,`fullname`,`birthday`,`email`,`contact`,`photo`,`username`,`password`,`u_token`,`on`,`create_at`,`last_update_at`,`last_login_at`,`active`,`vegetarian`) values (1,1,'-','I Gusti Bagus Ngurah Satya Wibawa','1997-01-01','caesarsoft1112@gmail.com','082144646225','1_kartu_id.jpg','gung54ty4','bfe3d0f11b616749c19abe867be11d78',NULL,'N','2016-08-18 18:02:07',NULL,'2016-09-04 09:15:45','Y',NULL),(2,2,'-','I Gusti Bagus Ngurah Satya Wibawa','1997-01-01','caesarsoft1112@gmail.com','082144646225','2_kartu_id.jpg','gung54ty45','d10d6b075de8234f2d33d8246aba5800','288a2c2500303512c768cf3cdb609351','Y','2016-08-18 18:06:21',NULL,'2016-09-04 09:16:46','Y',NULL),(3,3,'ITCC-IDEA-1','I Gusti Bagus Ngurah Satya Wibawa','1997-01-01','caesarsoft1112@gmail.com','082144646225','3_kartu_id.jpg','qqqqqqq','beee47d70a7fc4c0c2cd2b517cc4b134',NULL,'N','2016-08-19 17:03:29',NULL,NULL,'Y','N'),(4,4,'-','I Gusti Bagus Ngurah Satya Wibawa','1996-01-01','caesarsoft1112@gmail.com','082144646225','4_kartu_id.jpg','gung54ty459','bfe3d0f11b616749c19abe867be11d78',NULL,'N','2016-08-19 17:17:17',NULL,'2016-08-20 15:06:36','Y','Y'),(5,1,'-','Kika Adi Saputra','1996-01-01','eeee@gmail.com','0988797800','5_kartu_id.jpg',NULL,NULL,NULL,'N','2016-08-20 13:01:04','2016-08-20 15:11:35',NULL,'Y','N'),(6,3,'ITCC-IDEA-2','dadadadad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,NULL,'Y','N'),(7,3,'ITCC-IDEA-3','dawqrqtqwtq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,NULL,'Y','N'),(8,5,'ITCC-IDEA-4','Ini Baru John','1990-01-01','caesarsoft1112@gmail.com','082144646225','8_kartu_id.jpg','BoomBassTis','2948e6da4e5d28d0c98b4928f0fcbc75',NULL,'N','2016-08-22 12:10:53',NULL,'2016-08-22 12:11:06','Y','Y'),(9,5,'ITCC-IDEA-5','BoomBassTis','1990-02-02','caesarsoft1112@gmail.com','082144646225','9_kartu_id.jpg',NULL,NULL,NULL,'N','2016-08-22 12:11:54',NULL,NULL,'Y','Y'),(10,6,'ITCC-PROG-1','I Gusti Bagus Ngurah Satya Wibawa','0001-01-01','caesarsoft1112@gmail.com','082144646225','10_kartu_id.jpg','caesarsoft1112','d10d6b075de8234f2d33d8246aba5800',NULL,'N','2016-08-30 10:55:14',NULL,'2016-08-30 10:55:37','Y','Y'),(11,7,'-','BlaBlaBla','1996-01-01','BlaBlaBla@BlaBlaBla.com','082144646225','11_kartu_id.jpg','BlaBlaBla','a1a3e64ff7f9702a58bb6edd24ecbce5','ae56e0f7e7d3f870a1de44b2063c025d','Y','2016-09-08 19:08:53',NULL,'2016-09-08 19:09:07','Y','N'),(12,7,'-','BlaBlaBla','1996-01-01','caesarsoft1112@gmail.com','82144646225','12_kartu_id.jpg',NULL,NULL,NULL,'N','2016-09-08 19:09:35',NULL,NULL,'Y','N'),(13,7,'-','BlaBlaBla','1996-01-01','BlaBlaBla@BlaBlaBla.com','82144646225','13_kartu_id.jpg',NULL,NULL,NULL,'N','2016-09-08 19:10:21',NULL,NULL,'Y','Y'),(14,8,'-','I Gede John Arissaputra','1997-03-13','john.arissaputra@gmail.com','082144744848','14_kartu_id.JPG','johnaris','54058395aab911e9af3795403f0c9571',NULL,'N','2016-09-12 19:09:10',NULL,NULL,'Y','Y'),(15,9,'-','Coba AJa','1996-01-01','caesarsoft1112@gmail.com','82144646225','15_kartu_id.JPG','1234567890','e807f1fcf82d132f9bb018ca6738a19f',NULL,'N','2016-09-12 19:13:42',NULL,NULL,'Y','N'),(16,10,'-','John Arissaputra','1997-01-01','demondestiny13@gmail.com','0393193841','16_kartu_id.JPG','123456789','25f9e794323b453885f5181f1b624d0b',NULL,'N','2016-09-12 19:15:01',NULL,NULL,'Y','N');

/*Table structure for table `upload_logs` */

DROP TABLE IF EXISTS `upload_logs`;

CREATE TABLE `upload_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `filename` varchar(20) DEFAULT NULL,
  `upload_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `upload_logs` */

/*Table structure for table `verified_req` */

DROP TABLE IF EXISTS `verified_req`;

CREATE TABLE `verified_req` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(4) DEFAULT NULL,
  `request_at` datetime DEFAULT NULL,
  `filename` varchar(20) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `verified_req` */

insert  into `verified_req`(`id`,`group_id`,`request_at`,`filename`,`note`) values (1,3,'2016-08-18 13:43:01','3.jpg',''),(2,4,'2016-08-19 18:00:54','4.jpg',''),(3,5,'2016-08-22 12:14:17','5.jpg',''),(4,6,'2016-08-30 10:56:05','6.jpg','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
