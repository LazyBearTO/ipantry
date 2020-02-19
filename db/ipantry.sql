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
  `scanned_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `stock_datetime` datetime DEFAULT NULL,
  `trash_datetime` datetime DEFAULT NULL,
  `lastop_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scanned_item`
--

LOCK TABLES `scanned_item` WRITE;
/*!40000 ALTER TABLE `scanned_item` DISABLE KEYS */;
INSERT INTO `scanned_item` VALUES (1,'0733739021021','Plant Protein Complex','Now Sports','https://static.openfoodfacts.org/images/products/073/373/902/1021/front_en.4.200.jpg','2020-02-17 23:17:23','2020-02-17 23:17:42',NULL,'2020-02-17 23:17:42'),(2,'07337390210210733',NULL,NULL,'img/default.png','2020-02-17 23:17:30','2020-02-17 23:17:40',NULL,'2020-02-17 23:17:40'),(3,'096619510375','Mélange spécial de légumes congelés','Kirkland Signature','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.200.jpg','2020-02-17 23:25:20','2020-02-17 23:25:58',NULL,'2020-02-17 23:25:58'),(4,'096619510375','Mélange spécial de légumes congelés','Kirkland Signature','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.200.jpg','2020-02-17 23:25:51','2020-02-17 23:25:57',NULL,'2020-02-17 23:25:57'),(5,'096619510375','Mélange spécial de légumes congelés','Kirkland Signature','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.200.jpg','2020-02-17 23:26:02',NULL,'2020-02-17 23:26:07','2020-02-17 23:26:02'),(6,'90311017','Huel','','https://static.openfoodfacts.org/images/products/90311017/front_fr.6.200.jpg','2020-02-17 23:26:04',NULL,NULL,'2020-02-17 23:26:04'),(7,'90311017','Huel','','https://static.openfoodfacts.org/images/products/90311017/front_fr.6.200.jpg','2020-02-17 23:26:18',NULL,NULL,'2020-02-17 23:26:18'),(8,'056800664812','Oikos Yogourt Grec Nature','Danone,Oikos','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.200.jpg','2020-02-17 23:26:20',NULL,NULL,'2020-02-17 23:26:20'),(9,'056800664812','Oikos Yogourt Grec Nature','Danone,Oikos','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.200.jpg','2020-02-17 23:26:23',NULL,NULL,'2020-02-17 23:26:23'),(10,'096619510375','Mélange spécial de légumes congelés','Kirkland Signature','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.200.jpg','2020-02-17 23:26:24',NULL,NULL,'2020-02-17 23:26:24'),(11,'5449000000996','Coca Cola','Coca-Cola','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.200.jpg','2020-02-17 23:26:26',NULL,NULL,'2020-02-17 23:26:26'),(12,'056800664812','Oikos Yogourt Grec Nature','Danone,Oikos','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.200.jpg','2020-02-17 23:26:27',NULL,NULL,'2020-02-17 23:26:27'),(13,'096619510375','Mélange spécial de légumes congelés','Kirkland Signature','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.200.jpg','2020-02-17 23:26:29',NULL,NULL,'2020-02-17 23:26:29'),(14,'8410000810004','Biscuit Oreo','Oreo,Mondelez','https://static.openfoodfacts.org/images/products/841/000/081/0004/front_de.104.200.jpg','2020-02-17 23:26:31',NULL,NULL,'2020-02-17 23:26:31'),(15,'063348006936','Pattes d\'ours','Dare','https://static.openfoodfacts.org/images/products/006/334/800/6936/front_fr.4.200.jpg','2020-02-17 23:26:32',NULL,NULL,'2020-02-17 23:26:32'),(16,'063348006936','Pattes d\'ours','Dare','https://static.openfoodfacts.org/images/products/006/334/800/6936/front_fr.4.200.jpg','2020-02-17 23:26:34',NULL,NULL,'2020-02-17 23:26:34'),(17,'096619510375','Mélange spécial de légumes congelés','Kirkland Signature','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.200.jpg','2020-02-17 23:26:35',NULL,NULL,'2020-02-17 23:26:35'),(18,'8410000810004','Biscuit Oreo','Oreo,Mondelez','https://static.openfoodfacts.org/images/products/841/000/081/0004/front_de.104.200.jpg','2020-02-17 23:26:38',NULL,NULL,'2020-02-17 23:26:38'),(19,'068100043457','Kraft Balsamic Salad Dressing','kraft','https://static.openfoodfacts.org/images/products/006/810/004/3457/front_fr.4.200.jpg','2020-02-17 23:26:40',NULL,NULL,'2020-02-17 23:26:40'),(20,'5449000000996','Coca Cola','Coca-Cola','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.200.jpg','2020-02-17 23:26:41',NULL,NULL,'2020-02-17 23:26:41'),(21,'068100043457','Kraft Balsamic Salad Dressing','kraft','https://static.openfoodfacts.org/images/products/006/810/004/3457/front_fr.4.200.jpg','2020-02-17 23:26:42',NULL,NULL,'2020-02-17 23:26:42'),(22,'056800664812','Oikos Yogourt Grec Nature','Danone,Oikos','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.200.jpg','2020-02-17 23:26:44',NULL,NULL,'2020-02-17 23:26:44'),(23,'056800664812','Oikos Yogourt Grec Nature','Danone,Oikos','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.200.jpg','2020-02-17 23:26:44',NULL,NULL,'2020-02-17 23:26:44'),(24,'096619510375','Mélange spécial de légumes congelés','Kirkland Signature','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.200.jpg','2020-02-17 23:26:45',NULL,NULL,'2020-02-17 23:26:45'),(25,'90311017','Huel','','https://static.openfoodfacts.org/images/products/90311017/front_fr.6.200.jpg','2020-02-17 23:26:46',NULL,NULL,'2020-02-17 23:26:46');
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

-- Dump completed on 2020-02-17 23:30:56
