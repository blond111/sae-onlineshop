# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.21-MariaDB)
# Datenbank: onlineshop
# Erstellt am: 2018-01-14 17:30:27 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `cartDatum` int(11) DEFAULT NULL,
  `order_finished` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;

INSERT INTO `cart` (`id`, `user_id`, `cartDatum`, `order_finished`)
VALUES
	(108,17,1515804761,1),
	(110,19,1515804790,1),
	(112,20,1515804814,1),
	(114,21,1515804856,1),
	(116,22,1515804878,1),
	(146,21,1515873870,1),
	(155,21,1515876865,1),
	(165,35,1515880355,1),
	(168,36,1515880465,1),
	(173,37,1515880717,1),
	(175,38,1515880904,1),
	(178,39,1515881146,1);

/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle cartitems
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cartitems`;

CREATE TABLE `cartitems` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `prodPriceNow` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cartitems` WRITE;
/*!40000 ALTER TABLE `cartitems` DISABLE KEYS */;

INSERT INTO `cartitems` (`id`, `cart_id`, `prod_id`, `qty`, `prodPriceNow`)
VALUES
	(118,108,1,3,'55'),
	(119,110,2,2,'85'),
	(120,112,1,3,'55'),
	(121,112,2,4,'85'),
	(122,114,1,5,'55'),
	(123,114,2,6,'85'),
	(124,116,1,7,'55'),
	(132,146,1,4,'55'),
	(137,155,1,1,'55'),
	(138,155,2,1,'85'),
	(144,165,1,1,'55'),
	(146,168,1,1,'55'),
	(148,173,2,1,'85'),
	(149,175,2,1,'85'),
	(150,178,2,5,'85');

/*!40000 ALTER TABLE `cartitems` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `prodName` text,
  `prodBeschreibung` text,
  `prodPreis` varchar(30) DEFAULT NULL,
  `prodBild` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prodDatum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `prodName`, `prodBeschreibung`, `prodPreis`, `prodBild`, `user_id`, `prodDatum`)
VALUES
	(1,'SHINE&FINE Small','120g','55','uploads/Flasche.jpg',1,1515702040),
	(2,'SHINE&FINE Big','150g inkl. Gratis Pinsel','85','uploads/Flaschpluspinsel.jpg',1,1515714129);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `door` varchar(50) DEFAULT NULL,
  `plz` varchar(20) DEFAULT NULL,
  `ort` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `usergroup` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `street`, `door`, `plz`, `ort`, `username`, `password`, `usergroup`)
VALUES
	(1,'','','babsi@kritsch.at','','','','','Admin','7b902e6ff1db9f560443f2048974fd7d386975b0:1234',1),
	(17,'Barbara','Kritsch ','babsi@kritsch.at','Franz-Schubertstraße, 3','3','3013','Tullnerbach','Babsi','8fa0d12e67b28ca1a58b572e138ea2943e341913:1234',0),
	(19,'Anna Katharina','Musil','musil@gmail.com','Luisastraße','45','3452','Güssing','Anna Katharina','4bd7b6f317b8cd8ce55524730ba0440fcac2d24c:1234',0),
	(20,'Elli','Motz','motz@gmail.com','Lühnestraße','2','2453','Norgamb','Elli','777921f6d385e997f0888b54c8662ade573b6e5b:1234',0),
	(21,'Valentina','Krauss','kraus@gmail.com','Wollgasse','70','1245','Hartdmannsdorf','Vali','9e6203c440f1c688aa5f66552b944a02d318e080:1234',0),
	(22,'Maxi','Ruppert','ruppert@gmail.com','Rasenstraße','1','1212','Nimbad','Maxi','55fbbb65d6b09d77c530ec77eecd32bdead7b21d:1234',0),
	(23,'Vera','Decombe','decombe@gmail.com','Fußstraße','12','3423','Koneburg','Vera','9dea102c4c5a3f2832c290689aaa24f53905b36d:1234',0),
	(25,'Alexander','Kurnikowski','a.kurnikowski@gmail.com','Favoritenstraße','66/3-4','1030','Wien','Kurni','8d70f0204550e9215d3ea07a6b666f7c815560cd:1234',0),
	(47,'Anna Katharina','Musil','musil@gmail.com','Luisastraße, 45','3','3452','Güssing','Meisterpropper','8fa0d12e67b28ca1a58b572e138ea2943e341913:1234',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
