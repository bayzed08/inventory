/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 10.1.25-MariaDB : Database - erl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`erl` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `erl`;

/*Table structure for table `stockentry` */

DROP TABLE IF EXISTS `stockentry`;

CREATE TABLE `stockentry` (
  `entryID` int(8) NOT NULL AUTO_INCREMENT,
  `productName` varchar(200) DEFAULT NULL,
  `modelName` varchar(300) DEFAULT NULL,
  `Qnty` int(5) DEFAULT NULL,
  `MR` varchar(20) DEFAULT NULL,
  `PO` varchar(20) DEFAULT NULL,
  `entrydate` datetime DEFAULT NULL,
  `dbentrydate` datetime DEFAULT NULL,
  `warranty` int(3) DEFAULT NULL,
  `brandName` varchar(100) DEFAULT NULL,
  `entryUser` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`entryID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `stockentry` */

insert  into `stockentry`(`entryID`,`productName`,`modelName`,`Qnty`,`MR`,`PO`,`entrydate`,`dbentrydate`,`warranty`,`brandName`,`entryUser`) values 
(1,'CARTRIDGE','85A',1,'424CP21','456','2021-11-16 00:00:00','2021-11-17 23:49:11',6,'Printech','re105'),
(2,'CARTRIDGE','85A',50,'424CP21','334','2021-11-18 00:00:00','2021-11-17 23:56:51',6,'Print-Rite','re105-'),
(3,'CARTRIDGE','280A',4,'2','2','2021-11-14 00:00:00','2021-11-17 23:57:44',6,'Printech','re105-::1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
