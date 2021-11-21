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

/*Table structure for table `acknowledgetab` */

DROP TABLE IF EXISTS `acknowledgetab`;

CREATE TABLE `acknowledgetab` (
  `serialno` int(10) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `productname` varchar(200) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `supplyqnty` int(6) DEFAULT NULL,
  `entryuserid` varchar(25) DEFAULT NULL,
  `entrydate` datetime DEFAULT NULL,
  `state` varchar(20) DEFAULT 'ok',
  `brand` varchar(50) DEFAULT NULL,
  `transferdate` datetime DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`serialno`)
) ENGINE=InnoDB AUTO_INCREMENT=1110438 DEFAULT CHARSET=utf8;

/*Data for the table `acknowledgetab` */

insert  into `acknowledgetab`(`serialno`,`userid`,`productname`,`model`,`supplyqnty`,`entryuserid`,`entrydate`,`state`,`brand`,`transferdate`,`remarks`) values 
(1110435,'RE105','CARTRIDGE','85A',2,'re105','2021-11-21 23:46:02','ok','Print-Rite','2021-11-21 00:00:00','TEST'),
(1110436,'EE153','HARDDISK','512GB',2,'re105','2021-11-22 00:19:30','ok','Segate','2021-11-22 00:00:00',''),
(1110437,'OE028','BRAND DESKTOP PC','DELL',1,'re105','2021-11-22 00:21:22','ok','DELL','2021-11-22 00:00:00','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
