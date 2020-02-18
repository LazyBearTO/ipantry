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
  `image_thumb_url` varchar(255) DEFAULT NULL,
  `scanned_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `stock_datetime` datetime DEFAULT NULL,
  `trash_datetime` datetime DEFAULT NULL,
  `lastop_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scanned_item`
--

LOCK TABLES `scanned_item` WRITE;
/*!40000 ALTER TABLE `scanned_item` DISABLE KEYS */;
INSERT INTO `scanned_item` VALUES (1,'3564700652657 ','Speculoos pocket','P\'tit déli,Marque Repère','https://static.openfoodfacts.org/images/products/356/470/065/2657/front_en.3.200.jpg','2020-02-17 18:46:03','2020-02-17 18:46:27',NULL,'2020-02-17 18:46:27'),(2,'0733739021021 ','Plant Protein Complex','Now Sports','https://static.openfoodfacts.org/images/products/073/373/902/1021/front_en.4.200.jpg','2020-02-17 18:46:13','2020-02-17 18:46:28',NULL,'2020-02-17 18:46:28'),(3,'0733739021021 ','Plant Protein Complex','Now Sports','https://static.openfoodfacts.org/images/products/073/373/902/1021/front_en.4.200.jpg','2020-02-17 18:46:16',NULL,'2020-02-17 18:46:31','2020-02-17 18:46:16'),(4,'0733739021021 ','Plant Protein Complex','Now Sports','https://static.openfoodfacts.org/images/products/073/373/902/1021/front_en.4.200.jpg','2020-02-17 18:46:17','2020-02-17 18:46:32',NULL,'2020-02-17 18:46:32'),(5,'3564700652657 ','Speculoos pocket','P\'tit déli,Marque Repère','https://static.openfoodfacts.org/images/products/356/470/065/2657/front_en.3.200.jpg','2020-02-17 18:46:24',NULL,'2020-02-17 18:46:34','2020-02-17 18:46:24'),(6,'3564700652657 ','Speculoos pocket','P\'tit déli,Marque Repère','https://static.openfoodfacts.org/images/products/356/470/065/2657/front_en.3.200.jpg','2020-02-17 18:46:25','2020-02-17 18:59:24',NULL,'2020-02-17 18:59:24'),(7,'3564700652657','Speculoos pocket','P\'tit déli,Marque Repère','https://static.openfoodfacts.org/images/products/356/470/065/2657/front_en.3.200.jpg','2020-02-17 18:47:09',NULL,NULL,'2020-02-17 18:47:09'),(8,'0733739021021','Plant Protein Complex','Now Sports','https://static.openfoodfacts.org/images/products/073/373/902/1021/front_en.4.200.jpg','2020-02-17 18:47:23',NULL,'2020-02-17 18:59:36','2020-02-17 18:47:23'),(9,'3564700652657','Speculoos pocket','P\'tit déli,Marque Repère','https://static.openfoodfacts.org/images/products/356/470/065/2657/front_en.3.200.jpg','2020-02-17 18:47:33',NULL,'2020-02-17 19:10:37','2020-02-17 18:47:33'),(10,'0733739021021','Plant Protein Complex','Now Sports','https://static.openfoodfacts.org/images/products/073/373/902/1021/front_en.4.200.jpg','2020-02-17 19:10:17','2020-02-17 19:10:20',NULL,'2020-02-17 19:10:20'),(11,'0733739021021','Plant Protein Complex','Now Sports','https://static.openfoodfacts.org/images/products/073/373/902/1021/front_en.4.200.jpg','2020-02-17 19:12:09',NULL,NULL,'2020-02-17 19:12:09');
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

-- Dump completed on 2020-02-17 19:12:36
