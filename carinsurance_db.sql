# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.37)
# Database: carinsurance
# Generation Time: 2022-04-05 19:01:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table car_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `car_type`;

CREATE TABLE `car_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('Aston Martin','Jaguar','Ford','Audi','Land Rover','Mini','BMW','Volvo','Porsche','Ferrari','Other') NOT NULL DEFAULT 'Ferrari',
  `type_multiplier` float(2,1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `car_type` WRITE;
/*!40000 ALTER TABLE `car_type` DISABLE KEYS */;

INSERT INTO `car_type` (`id`, `type`, `type_multiplier`)
VALUES
	(1,'Ferrari',0.9),
	(2,'Aston Martin',0.4),
	(3,'Jaguar',0.7),
	(4,'Ford',0.3),
	(5,'Audi',0.4),
	(6,'Land Rover',0.6),
	(7,'Mini',0.7),
	(8,'BMW',0.8),
	(9,'Volvo',0.4),
	(10,'Porsche',0.9),
	(11,'Other',0.5);

/*!40000 ALTER TABLE `car_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cover_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cover_type`;

CREATE TABLE `cover_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` enum('3rd Party','3rd Party Fire & Theft','Full Cover') NOT NULL DEFAULT '3rd Party',
  `cover_multiplier` float(2,1) NOT NULL DEFAULT '0.6',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cover_type` WRITE;
/*!40000 ALTER TABLE `cover_type` DISABLE KEYS */;

INSERT INTO `cover_type` (`id`, `name`, `cover_multiplier`)
VALUES
	(5,'3rd Party',0.6),
	(6,'3rd Party Fire & Theft',0.8),
	(7,'Full Cover',0.9);

/*!40000 ALTER TABLE `cover_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table quotes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quotes`;

CREATE TABLE `quotes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL DEFAULT '',
  `car_type_id` int(11) NOT NULL,
  `cover_id` int(11) NOT NULL,
  `cost` varchar(255) NOT NULL DEFAULT '',
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `car_value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;

INSERT INTO `quotes` (`id`, `customer_name`, `car_type_id`, `cover_id`, `cost`, `accepted`, `car_value`)
VALUES
	(1,'Cuthbert',2,3,'312.65',0,0),
	(2,'Gerbert',1,2,'270.98',1,0),
	(32,'Gabriel',1,1,'90000',1,100000),
	(51,'Gabriel',1,1,'900',0,1000),
	(52,'Gabriel',1,1,'1080',0,1200),
	(53,'Gabriel',1,1,'1080',0,1200),
	(54,'Gabriel',1,1,'900',0,1000),
	(55,'Gabriel',1,1,'900',0,1000),
	(56,'Gabriel',1,1,'900',0,1000),
	(57,'Gabriel',1,1,'900',0,1000),
	(58,'Gabriel',1,1,'900',0,1000),
	(59,'Gabriel',1,1,'900',0,1000),
	(60,'Gabriel',1,1,'900',0,1000),
	(61,'Gabriel',1,1,'900',0,1000),
	(62,'Gabriel',1,1,'900',0,1000),
	(63,'',1,1,'0',1,0),
	(64,'',1,1,'0',0,0),
	(65,'Gabriel',1,1,'9000',0,10000),
	(66,'Gabriel',1,1,'9000',0,10000),
	(67,'Gabriel',1,1,'9000',0,10000),
	(68,'Gabriel',1,1,'9000',0,10000),
	(69,'Gabriel',1,1,'9000',0,10000),
	(70,'Gabriel',1,1,'900',0,1000),
	(71,'Gabriel',1,1,'900',0,1000),
	(72,'Gabriel',1,1,'900',0,1000),
	(73,'Gabriel',1,1,'900',0,1000),
	(74,'Gabriel',1,1,'900',0,1000),
	(75,'Gabriel',1,1,'900',0,1000),
	(76,'Gabriel',1,1,'900',0,1000),
	(77,'Gabriel',1,1,'900',0,1000),
	(78,'Gabriel',1,1,'900',0,1000),
	(79,'Gabriel',1,1,'900',0,1000),
	(80,'Gabriel',1,1,'900',0,1000),
	(81,'Gabriel',1,1,'9000',0,10000),
	(82,'Gabriel',1,1,'9000',0,10000),
	(83,'Gabriel',1,1,'9000',0,10000),
	(84,'Gabriel',1,1,'9',0,10),
	(85,'Gabriel',1,1,'900',0,1000),
	(86,'Gabriel',1,1,'1170',0,1300),
	(87,'Gabriel',1,1,'10.8',0,12),
	(88,'Cuthbert',4,2,'8800',0,5000),
	(89,'Cuthbert',4,2,'8800',0,5000),
	(90,'Cuthbert2',1,1,'2700',0,3000),
	(91,'Cuthbert3',1,1,'45000',0,50000),
	(92,'Cuthbert4',1,1,'6899.4',0,7666),
	(93,'Cuthbert4',1,1,'4500',0,5000),
	(94,'Cuthbert5',1,1,'59999.4',1,66666),
	(95,'Cuthbert6',1,1,'69999.3',0,77777),
	(96,'Gabriel',1,6,'4000',1,10000),
	(97,'Gabriel',1,5,'300',0,1000),
	(98,'Gabriel',1,5,'300',0,1000),
	(99,'Gabriel',1,5,'150',0,500),
	(100,'Gabriel',1,5,'30',0,100),
	(101,'Gabriel',1,5,'300',1,1000),
	(102,'Gabriel47',1,5,'9000',1,30000),
	(103,'Gabriel',1,5,'3000',1,10000),
	(104,'Gabriel',1,5,'9',1,30),
	(105,'Gabriel47',1,5,'9',1,30),
	(106,'Finn',1,5,'6',1,20),
	(107,'Gabriel',1,5,'900',0,3000),
	(108,'Gabriel',1,5,'900',0,3000),
	(109,'Gabriel',1,5,'900',0,3000),
	(110,'Gabriel',1,5,'900',0,3000),
	(111,'Gabriel',1,5,'900',0,3000),
	(112,'Gabriel',1,5,'900',0,3000),
	(113,'Gabriel',1,5,'900',0,3000),
	(114,'Gabriel',1,5,'900',0,3000),
	(115,'Gabriel',1,5,'900',0,3000),
	(116,'Gabriel',1,5,'6',0,20),
	(117,'hello',1,5,'6',0,20),
	(118,'hello',1,5,'6',0,20),
	(119,'hello',1,5,'6',0,20),
	(120,'hello',1,5,'6',0,20),
	(121,'hello',1,5,'6',0,20),
	(122,'hello',1,5,'6',0,20),
	(123,'Gabriel',1,5,'6',1,20),
	(124,'Gabriel',1,5,'9',1,30),
	(125,'Solange',1,5,'6',0,20),
	(126,'Solange',1,5,'6',1,20),
	(127,'Kasey',1,5,'90',1,300),
	(128,'Gabriel',3,6,'168',1,300),
	(129,'Another test',1,5,'90',1,300),
	(130,'Gabriel',3,5,'12.6',1,30),
	(131,'Aliyah',1,5,'3',0,10),
	(132,'Aliyah',1,5,'3',0,10),
	(133,'Aliyah',1,5,'3',0,10),
	(134,'Aliyah',1,5,'3',0,10),
	(135,'Aliyah',1,5,'3',0,10),
	(136,'Rachel',1,5,'900',1,3000),
	(137,'Indya',3,6,'11.2',1,20),
	(138,'Asif',5,6,'9.6',1,30),
	(139,'WeDidIt',1,5,'27',1,50),
	(140,'Gabriel34',4,5,'9',1,50),
	(141,'Lisa',1,5,'16.2',1,30),
	(142,'Gabriel',1,5,'220.86',0,409),
	(143,'Olli',1,5,'43.2',1,80),
	(144,'Tom',1,5,'10.8',1,20),
	(145,'Gabriel',1,5,'162',1,300),
	(146,'Dani',1,5,'21.6',0,40),
	(147,'Gabriel89098',1,5,'27000',1,50000),
	(148,'Suzie',1,5,'24.3',0,45);

/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
