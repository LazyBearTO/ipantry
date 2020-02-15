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
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scanned_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `scanned_txt` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `image_thumb_url` varchar(255) DEFAULT 'thumb.png',
  `image_small_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `item_count` int(11) DEFAULT 0,
  `moved_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,'0000-00-00 00:00:00','1000023','product name2','brand name','thumb.png','asd','thumb.png',32,NULL),(35,'2020-02-15 00:48:52','231231231','12312','brand name','thumb1.png',NULL,NULL,12,NULL),(39,'2020-02-15 02:07:56','067981882209','Ppl making stopper','Durez','https://static.openfoodfacts.org/images/products/006/798/188/2209/front_en.6.100.jpg',NULL,NULL,10,NULL),(40,'2020-02-15 02:08:59','048500017913','Jus raisin','Tropicana','https://static.openfoodfacts.org/images/products/004/850/001/7913/front_fr.4.100.jpg',NULL,NULL,4,NULL),(41,'2020-02-15 03:08:31','0679818822091','Jak','sss','https://static.openfoodfacts.org/images/products/006/798/188/2209/front_en.6.100.jpg',NULL,NULL,2,NULL),(42,'2020-02-15 03:08:37','06717401','Dasani Eau Reminéralisée','adsadd','thumb.png',NULL,NULL,1,NULL),(43,'2020-02-15 03:08:46','8410000810004','Biscuit Oreo','Oreo,Mondelez','https://static.openfoodfacts.org/images/products/841/000/081/0004/front_de.104.100.jpg',NULL,NULL,2,NULL),(44,'2020-02-15 03:09:26','X002A4MUCV','100% Soja Protein Vanille','allfitnessfactory.de','https://static.openfoodfacts.org/images/products/0024/front_de.3.100.jpg',NULL,NULL,1,NULL),(45,'2020-02-15 03:09:48','069052102353','Bean','pop brand','https://static.openfoodfacts.org/images/products/006/905/210/2353/front_fr.3.100.jpg',NULL,NULL,3,NULL),(46,'2020-02-15 03:15:18','5449000000996','Coca Cola','Coca-Cola','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.100.jpg',NULL,NULL,3,NULL),(47,'2020-02-15 04:22:12','06792800','Diet Coke™ / Coke Diète🅫','Coca-Cola,Coke,Diet Coke,Coke Diète','https://static.openfoodfacts.org/images/products/06792800/front_en.15.100.jpg',NULL,NULL,27,NULL),(48,'2020-02-15 04:22:20','069000014257','Pepsi Diète','','https://static.openfoodfacts.org/images/products/006/900/001/4257/front_fr.7.100.jpg',NULL,NULL,19,NULL),(49,'2020-02-15 04:26:13','059000003115','Evaporated Milk','Carnation','https://static.openfoodfacts.org/images/products/005/900/000/3115/front_en.3.100.jpg',NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
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
  `image_thumb_url` varchar(255) DEFAULT 'thumb.png',
  `image_small_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `moved_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scanned_item`
--

LOCK TABLES `scanned_item` WRITE;
/*!40000 ALTER TABLE `scanned_item` DISABLE KEYS */;
INSERT INTO `scanned_item` VALUES (1,'2020-02-11 10:35:22','069000014257','Pepsi Diète','','https://static.openfoodfacts.org/images/products/006/900/001/4257/front_fr.7.100.jpg','https://static.openfoodfacts.org/images/products/006/900/001/4257/front_fr.7.200.jpg','https://static.openfoodfacts.org/images/products/006/900/001/4257/front_fr.7.400.jpg',NULL),(2,'2020-02-11 10:35:57','06792800','Diet Coke™ / Coke Diète🅫','Coca-Cola,Coke,Diet Coke,Coke Diète','https://static.openfoodfacts.org/images/products/06792800/front_en.15.100.jpg','https://static.openfoodfacts.org/images/products/06792800/front_en.15.200.jpg','https://static.openfoodfacts.org/images/products/06792800/front_en.15.400.jpg',NULL),(4,'2020-02-11 10:44:45','X002A4MUCV','100% Soja Protein Vanille','allfitnessfactory.de','https://static.openfoodfacts.org/images/products/0024/front_de.3.100.jpg','https://static.openfoodfacts.org/images/products/0024/front_de.3.200.jpg','https://static.openfoodfacts.org/images/products/0024/front_de.3.400.jpg',NULL),(7,'2020-02-11 10:47:26','069052014601','Pois d’été 398ML','Géant Vert','https://static.openfoodfacts.org/images/products/006/905/201/4601/front_fr.4.100.jpg','https://static.openfoodfacts.org/images/products/006/905/201/4601/front_fr.4.200.jpg','https://static.openfoodfacts.org/images/products/006/905/201/4601/front_fr.4.400.jpg',NULL),(8,'2020-02-11 10:47:31','069052102353','Bean','pop brand','https://static.openfoodfacts.org/images/products/006/905/210/2353/front_fr.3.100.jpg','https://static.openfoodfacts.org/images/products/006/905/210/2353/front_fr.3.200.jpg','https://static.openfoodfacts.org/images/products/006/905/210/2353/front_fr.3.400.jpg',NULL),(13,'2020-02-11 10:48:06','059000003115','Evaporated Milk','Carnation','https://static.openfoodfacts.org/images/products/005/900/000/3115/front_en.3.100.jpg','https://static.openfoodfacts.org/images/products/005/900/000/3115/front_en.3.200.jpg','https://static.openfoodfacts.org/images/products/005/900/000/3115/front_en.3.400.jpg',NULL),(14,'2020-02-11 10:48:08','059000003115','Evaporated Milk','Carnation','https://static.openfoodfacts.org/images/products/005/900/000/3115/front_en.3.100.jpg','https://static.openfoodfacts.org/images/products/005/900/000/3115/front_en.3.200.jpg','https://static.openfoodfacts.org/images/products/005/900/000/3115/front_en.3.400.jpg',NULL),(16,'2020-02-12 16:32:56','068100043457','Kraft Balsamic Salad Dressing','kraft','https://static.openfoodfacts.org/images/products/006/810/004/3457/front_fr.4.100.jpg','https://static.openfoodfacts.org/images/products/006/810/004/3457/front_fr.4.200.jpg','https://static.openfoodfacts.org/images/products/006/810/004/3457/front_fr.4.400.jpg',NULL),(17,'2020-02-12 16:33:37','8410000810004','Biscuit Oreo','Oreo,Mondelez','https://static.openfoodfacts.org/images/products/841/000/081/0004/front_de.104.100.jpg','https://static.openfoodfacts.org/images/products/841/000/081/0004/front_de.104.200.jpg','https://static.openfoodfacts.org/images/products/841/000/081/0004/front_de.104.400.jpg',NULL),(18,'2020-02-12 16:33:56','063348006936','Pattes d\'ours','Dare','https://static.openfoodfacts.org/images/products/006/334/800/6936/front_fr.4.100.jpg','https://static.openfoodfacts.org/images/products/006/334/800/6936/front_fr.4.200.jpg','https://static.openfoodfacts.org/images/products/006/334/800/6936/front_fr.4.400.jpg',NULL),(19,'2020-02-12 16:34:02','096619510375','Mélange spécial de légumes congelés','Kirkland Signature','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.100.jpg','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.200.jpg','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.400.jpg',NULL),(20,'2020-02-12 16:34:21','056800664812','Oikos Yogourt Grec Nature','Danone,Oikos','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.100.jpg','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.200.jpg','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.400.jpg',NULL),(21,'2020-02-12 16:34:25','5449000000996','Coca Cola','Coca-Cola','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.100.jpg','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.200.jpg','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.400.jpg',NULL),(22,'2020-02-12 16:34:26','056800664812','Oikos Yogourt Grec Nature','Danone,Oikos','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.100.jpg','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.200.jpg','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.400.jpg',NULL),(23,'2020-02-12 16:34:27','096619510375','Mélange spécial de légumes congelés','Kirkland Signature','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.100.jpg','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.200.jpg','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.400.jpg',NULL),(24,'2020-02-12 16:34:29','90311017','Huel','Hsni','https://static.openfoodfacts.org/images/products/90311017/front_fr.6.100.jpg','https://static.openfoodfacts.org/images/products/90311017/front_fr.6.200.jpg','https://static.openfoodfacts.org/images/products/90311017/front_fr.6.400.jpg',NULL),(25,'2020-02-12 16:36:45','5449000000996','Coca Cola','Coca-Cola','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.100.jpg','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.200.jpg','https://static.openfoodfacts.org/images/products/544/900/000/0996/front_en.193.400.jpg',NULL),(26,'2020-02-12 16:37:07','90311017','Huel','','https://static.openfoodfacts.org/images/products/90311017/front_fr.6.100.jpg','https://static.openfoodfacts.org/images/products/90311017/front_fr.6.200.jpg','https://static.openfoodfacts.org/images/products/90311017/front_fr.6.400.jpg',NULL),(27,'2020-02-12 16:37:09','096619510375','Mélange spécial de légumes congelés','Kirkland Signature','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.100.jpg','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.200.jpg','https://static.openfoodfacts.org/images/products/009/661/951/0375/front_fr.5.400.jpg',NULL),(28,'2020-02-12 16:37:10','056800664812','Oikos Yogourt Grec Nature','Danone,Oikos','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.100.jpg','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.200.jpg','https://static.openfoodfacts.org/images/products/005/680/066/4812/front_fr.18.400.jpg',NULL),(29,'2020-02-12 17:09:51','048500017913','Jus raisin','Tropicana','https://static.openfoodfacts.org/images/products/004/850/001/7913/front_fr.4.100.jpg','https://static.openfoodfacts.org/images/products/004/850/001/7913/front_fr.4.200.jpg','https://static.openfoodfacts.org/images/products/004/850/001/7913/front_fr.4.400.jpg',NULL),(30,'2020-02-12 17:10:01','06717401','Dasani Eau Reminéralisée','adsadd','thumb.png','','',NULL),(31,'2020-02-12 17:10:43','0679818822091','Jak','sss','https://static.openfoodfacts.org/images/products/006/798/188/2209/front_en.6.100.jpg','','',NULL),(32,'2020-02-12 17:17:58','067981882209','Ppl making stopper','Durez','https://static.openfoodfacts.org/images/products/006/798/188/2209/front_en.6.100.jpg','https://static.openfoodfacts.org/images/products/006/798/188/2209/front_en.6.200.jpg','https://static.openfoodfacts.org/images/products/006/798/188/2209/front_en.6.400.jpg',NULL),(33,'2020-02-15 02:09:13','231231231','12312','Nice ','thumb1.png',NULL,NULL,NULL),(34,'2020-02-15 02:09:31','1000023','product name2','brand name','thumb.png',NULL,NULL,NULL),(37,'2020-02-15 03:49:05','barcode','product name','brand name','thumb.png',NULL,NULL,NULL);
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

-- Dump completed on 2020-02-15  9:10:59
