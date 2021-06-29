/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.13-MariaDB : Database - lirio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lirio` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `lirio`;

/*Table structure for table `dados` */

DROP TABLE IF EXISTS `dados`;

CREATE TABLE `dados` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_dispositivo` varchar(255) NOT NULL,
  `dados` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `dados` */

insert  into `dados`(`id`,`id_dispositivo`,`dados`) values 
(1,'teste',''),
(2,'teste 2','');

/*Table structure for table `dispositivos` */

DROP TABLE IF EXISTS `dispositivos`;

CREATE TABLE `dispositivos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `api_key` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`api_key`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `dispositivos` */

insert  into `dispositivos`(`id`,`api_key`,`nome`) values 
(1,'60db4a415c3ce','Lírio'),
(2,'60db4e73c9e33','Rosa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
