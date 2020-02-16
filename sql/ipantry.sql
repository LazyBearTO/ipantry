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
-- Table structure for table `inventory_item`
--

DROP TABLE IF EXISTS `inventory_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scanned_id` int(11) NOT NULL,
  `scanned_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `scanned_txt` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `image_thumb_url` varchar(255) DEFAULT NULL,
  `image_small_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `stock_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_item`
--

LOCK TABLES `inventory_item` WRITE;
/*!40000 ALTER TABLE `inventory_item` DISABLE KEYS */;
INSERT INTO `inventory_item` VALUES (1,7,'2020-02-16 04:18:42','X001KXPVHJ','spiruline','synercell','https://static.openfoodfacts.org/images/products/001/front_fr.55.100.jpg',NULL,NULL,'2020-02-16 04:18:42'),(6,7,'2020-02-16 04:43:47','X001KXPVHJ','spiruline','synercell','https://static.openfoodfacts.org/images/products/001/front_fr.55.100.jpg',NULL,NULL,'2020-02-16 04:43:47'),(7,8,'2020-02-16 04:54:05','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 04:54:05'),(8,14,'2020-02-16 04:57:17','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 04:57:17'),(10,12,'2020-02-16 04:57:26','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 04:57:26'),(11,11,'2020-02-16 04:57:27','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 04:57:27'),(16,18,'2020-02-16 05:34:20','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:34:20'),(17,19,'2020-02-16 05:35:35','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:35:35'),(18,21,'2020-02-16 05:39:50','3273230063986 ','HACHE 20%','auchan','https://static.openfoodfacts.org/images/products/327/323/006/3986/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:39:50'),(19,22,'2020-02-16 05:51:20','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:51:20'),(20,22,'2020-02-16 05:51:25','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:51:25'),(21,22,'2020-02-16 05:51:41','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:51:41'),(22,22,'2020-02-16 05:52:17','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:52:17'),(23,20,'2020-02-16 05:52:19','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:52:19'),(24,25,'2020-02-16 06:03:16','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 06:03:16'),(25,23,'2020-02-16 06:03:19','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 06:03:19'),(26,24,'2020-02-16 06:03:22','5449000000996 ','Coca Cola','Coca-Cola','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.100.jpg',NULL,NULL,'2020-02-16 06:03:22'),(27,30,'2020-02-16 06:10:50','5000112611861 ','Original taste','Coca-Cola','https://static.openfoodfacts.org/images/products/500/011/261/1861/front_fr.103.100.jpg',NULL,NULL,'2020-02-16 06:10:50'),(28,29,'2020-02-16 06:10:52','5000112611861 ','Original taste','Coca-Cola','https://static.openfoodfacts.org/images/products/500/011/261/1861/front_fr.103.100.jpg',NULL,NULL,'2020-02-16 06:10:52'),(29,28,'2020-02-16 06:10:53','5000112611861 ','Original taste','Coca-Cola','https://static.openfoodfacts.org/images/products/500/011/261/1861/front_fr.103.100.jpg',NULL,NULL,'2020-02-16 06:10:53'),(30,26,'2020-02-16 06:10:55','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 06:10:55'),(31,27,'2020-02-16 06:10:56','5000112611861 ','Original taste','Coca-Cola','https://static.openfoodfacts.org/images/products/500/011/261/1861/front_fr.103.100.jpg',NULL,NULL,'2020-02-16 06:10:56');
/*!40000 ALTER TABLE `inventory_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scanned_item`
--

DROP TABLE IF EXISTS `scanned_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scanned_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scanned_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `scanned_txt` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `image_thumb_url` varchar(255) DEFAULT NULL,
  `image_small_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `stock_datetime` datetime DEFAULT NULL,
  `trash_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scanned_item`
--

LOCK TABLES `scanned_item` WRITE;
/*!40000 ALTER TABLE `scanned_item` DISABLE KEYS */;
INSERT INTO `scanned_item` VALUES (7,'2020-02-16 02:55:33','X001KXPVHJ','spiruline','synercell','https://static.openfoodfacts.org/images/products/001/front_fr.55.100.jpg',NULL,NULL,'2020-02-16 04:43:47',NULL),(8,'2020-02-16 04:49:04','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 04:54:05',NULL),(12,'2020-02-16 04:57:10','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 04:57:26',NULL),(20,'2020-02-16 05:39:30','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:52:19',NULL),(21,'2020-02-16 05:39:48','3273230063986 ','HACHE 20%','auchan','https://static.openfoodfacts.org/images/products/327/323/006/3986/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:39:50',NULL),(22,'2020-02-16 05:47:25','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 05:52:17',NULL),(24,'2020-02-16 05:59:22','5449000000996 ','Coca Cola','Coca-Cola','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.100.jpg',NULL,NULL,'2020-02-16 06:03:22',NULL),(26,'2020-02-16 06:10:32','6111035000058','Eau Sidi Ali','Sidi Ali,Les Eaux Minérales d\'oulmès','https://static.openfoodfacts.org/images/products/611/103/500/0058/front_fr.13.100.jpg',NULL,NULL,'2020-02-16 06:10:55',NULL),(27,'2020-02-16 06:10:41','5000112611861 ','Original taste','Coca-Cola','https://static.openfoodfacts.org/images/products/500/011/261/1861/front_fr.103.100.jpg',NULL,NULL,'2020-02-16 06:10:56',NULL),(28,'2020-02-16 06:10:45','5000112611861 ','Original taste','Coca-Cola','https://static.openfoodfacts.org/images/products/500/011/261/1861/front_fr.103.100.jpg',NULL,NULL,'2020-02-16 06:10:53',NULL),(29,'2020-02-16 06:10:47','5000112611861 ','Original taste','Coca-Cola','https://static.openfoodfacts.org/images/products/500/011/261/1861/front_fr.103.100.jpg',NULL,NULL,'2020-02-16 06:10:52',NULL),(30,'2020-02-16 06:10:49','5000112611861 ','Original taste','Coca-Cola','https://static.openfoodfacts.org/images/products/500/011/261/1861/front_fr.103.100.jpg',NULL,NULL,'2020-02-16 06:10:50',NULL);
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

-- Dump completed on 2020-02-16  6:12:57
