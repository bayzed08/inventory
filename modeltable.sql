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

/*Table structure for table `stockproductmodel` */

DROP TABLE IF EXISTS `stockproductmodel`;

CREATE TABLE `stockproductmodel` (
  `id` int(3) DEFAULT NULL,
  `productid` int(3) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `modeldesc` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `stockproductmodel` */

insert  into `stockproductmodel`(`id`,`productid`,`model`,`modeldesc`) values 
(4,3,'HP',NULL),
(3,3,'DELL',NULL),
(2,2,'',NULL),
(1,1,'',NULL),
(5,4,'85A',NULL),
(6,4,'280A',NULL),
(7,4,'80A',NULL),
(8,5,'MAXELL',NULL),
(9,6,'EPSON L-130',NULL),
(10,6,'EPSON L-110',NULL),
(11,7,'Logitech',NULL),
(12,8,'Netis',NULL),
(13,8,'TP-LINK',NULL),
(14,9,'',NULL),
(15,10,'1 TB',NULL),
(16,10,'512GB',NULL),
(17,10,'4 TB',NULL),
(18,11,'Logitech H111',NULL),
(19,12,'INK SET',NULL),
(20,13,'USB A4tech',NULL),
(21,14,'18.5 inch LED',NULL),
(22,14,'22 inch LED',NULL),
(23,15,'DDR2',NULL),
(24,16,'USB A4tech',NULL),
(25,17,'',NULL),
(26,18,'85A',NULL),
(27,19,'Velotop',NULL),
(28,20,'Epson LQ-590',NULL),
(29,21,'CANON 6030',NULL),
(30,22,'2GB DDR2',NULL),
(31,22,'4GB DDR3',NULL),
(32,22,'4GB DDR4',NULL),
(33,22,'8GB DDR4',NULL),
(34,23,'EPSON LQ-590',NULL),
(35,23,'EPSON LQ-2090',NULL),
(36,24,'Micronet',NULL),
(37,25,'',NULL),
(38,26,'EPSON v39',NULL),
(39,26,'EPSON v19',NULL),
(40,27,'',NULL),
(41,28,'',NULL),
(42,29,'',NULL),
(43,30,'',NULL),
(44,31,'Logitech C270',NULL),
(45,11,'Logitech H110',NULL),
(46,32,'Adata ',NULL),
(47,32,'Transcend',NULL),
(48,32,'Apacer',NULL),
(49,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
