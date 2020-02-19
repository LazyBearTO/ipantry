-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for debian-linux-gnueabihf (armv8l)
--
-- Host: localhost    Database: ipantry
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB-0+deb10u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `ipantry`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ipantry` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ipantry`;

--
-- Table structure for table `scanned_item`
--

DROP TABLE IF EXISTS `scanned_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scanned_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scanned_txt` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `image_thumb_url` varchar(255) NOT NULL DEFAULT 'img/default.png',
  `scanned_datetime` datetime DEFAULT NULL,
  `stock_datetime` datetime DEFAULT NULL,
  `trash_datetime` datetime DEFAULT NULL,
  `lastop_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scanned_item`
--

LOCK TABLES `scanned_item` WRITE;
/*!40000 ALTER TABLE `scanned_item` DISABLE KEYS */;
INSERT INTO `scanned_item` VALUES (1,'0058496447588','Bistro express à la mexicaine','uncle ben\'s','https://static.openfoodfacts.org/images/products/005/849/644/7588/front_en.25.200.jpg','2020-02-19 08:11:03',NULL,NULL,'2020-02-19 08:11:03'),(2,'0058496447588','Bistro express à la mexicaine','uncle ben\'s','https://static.openfoodfacts.org/images/products/005/849/644/7588/front_en.25.200.jpg','2020-02-19 08:11:04',NULL,NULL,'2020-02-19 08:11:04'),(3,'0058496447588','Bistro express à la mexicaine','uncle ben\'s','https://static.openfoodfacts.org/images/products/005/849/644/7588/front_en.25.200.jpg','2020-02-19 08:11:05',NULL,NULL,'2020-02-19 08:11:05'),(4,'0058496447588','Bistro express à la mexicaine','uncle ben\'s','https://static.openfoodfacts.org/images/products/005/849/644/7588/front_en.25.200.jpg','2020-02-19 08:11:05',NULL,NULL,'2020-02-19 08:11:05'),(5,'063348006936','Pattes d\'ours','Dare','https://static.openfoodfacts.org/images/products/006/334/800/6936/front_fr.4.200.jpg','2020-02-19 08:11:10',NULL,NULL,'2020-02-19 08:11:10'),(6,'063348006936','Pattes d\'ours','Dare','https://static.openfoodfacts.org/images/products/006/334/800/6936/front_fr.4.200.jpg','2020-02-19 08:11:11',NULL,NULL,'2020-02-19 08:11:11'),(7,'063348006936','Pattes d\'ours','Dare','https://static.openfoodfacts.org/images/products/006/334/800/6936/front_fr.4.200.jpg','2020-02-19 08:11:12',NULL,NULL,'2020-02-19 08:11:12');
/*!40000 ALTER TABLE `scanned_item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-19  8:11:21
