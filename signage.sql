-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: NusanetSignage
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(35) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `type` char(10) NOT NULL DEFAULT 'unknown',
  `screen` char(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'Gambar 1','file_3_1_46fe2f081e31bb604a42005e7422401e.jpg','2019-02-11 04:08:55','2019-02-11 04:08:55',3,1,'contoh','images','Screen Lobby'),(2,'Gambar 2','file_3_1_10e388c75cab8c8cf99dc2940a885b47.jpg','2019-02-11 04:09:14','2019-02-11 04:09:14',3,1,'contoh 2','images','Screen Lobby'),(15,'tes','file_6_12_28b662d883b6d76fd96e4ddc5e9ba780.mp4','2019-05-10 08:01:45','2019-05-10 08:01:45',6,12,'ew','video','TEst'),(17,'cs','file_6_12_95cc64dd2825f9df13ec4ad683ecf339.mp4','2019-05-10 08:15:12','2019-05-10 08:15:12',6,12,'ds','video','TEst');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fonts`
--

DROP TABLE IF EXISTS `fonts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `font_name` varchar(45) NOT NULL,
  `font` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonts`
--

LOCK TABLES `fonts` WRITE;
/*!40000 ALTER TABLE `fonts` DISABLE KEYS */;
/*!40000 ALTER TABLE `fonts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `running_text`
--

DROP TABLE IF EXISTS `running_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `running_text` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `running_text`
--

LOCK TABLES `running_text` WRITE;
/*!40000 ALTER TABLE `running_text` DISABLE KEYS */;
INSERT INTO `running_text` VALUES (1,'ini text running',NULL,NULL),(2,'aaaa',NULL,NULL);
/*!40000 ALTER TABLE `running_text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(35) NOT NULL,
  `description` varchar(50) NOT NULL,
  `for_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `room` varchar(35) NOT NULL,
  `target` varchar(15) NOT NULL,
  `start` varchar(10) NOT NULL,
  `end` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (17,'Nusanet','Signage Test View 1','2019-05-09','2019-05-09 02:39:53','2019-05-09 02:39:53',6,11,'Grand Orchid Ballroom','screen10','09:40 am','11:41 am'),(18,'Nusanet','Kubernetes Workshop','2019-05-09','2019-05-09 02:56:04','2019-05-09 03:34:28',6,11,'Lotus Ballroom','screen10','10:34 am','01:34 am'),(19,'Nusanet','Maintenance POP','2019-05-09','2019-05-09 03:31:52','2019-05-09 03:31:52',6,11,'Atlantis Ballroom','screen10','10:31 am','12:31 am'),(20,'INIXINDO Surabaya','Kubernetes Workshop II','2019-05-10','2019-05-09 06:26:19','2019-05-10 06:28:12',6,11,'Atlantis Ballroom','screen11','01:28 pm','06:27 pm'),(21,'Test','Mabar Mobile Legend','2019-05-13','2019-05-13 06:55:25','2019-05-13 06:55:25',6,12,'Atlantis Ballroom','screen12','11:55 am','04:58 pm');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `screen_device`
--

DROP TABLE IF EXISTS `screen_device`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `screen_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(35) NOT NULL,
  `description` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `status` char(2) NOT NULL DEFAULT '0',
  `type` char(5) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `template_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screen_device`
--

LOCK TABLES `screen_device` WRITE;
/*!40000 ALTER TABLE `screen_device` DISABLE KEYS */;
INSERT INTO `screen_device` VALUES (1,'Screen Lobby','untuk lobby','2019-02-11 03:50:30','2019-02-14 06:28:18',3,'1','','http://10.10.200.12',NULL),(6,'Screen Lobby','No description','2019-02-14 07:25:11','2019-02-14 07:25:11',7,'0','2','http://10.10.200.12',NULL),(10,'Test LCD 1','LCD Test','2019-04-12 13:58:12','2019-05-10 07:56:54',6,'0','2','127.0.0.1',NULL),(11,'Test LCD 2','Test LCD 2','2019-04-30 15:28:42','2019-05-10 07:57:17',6,'0','1','127.0.0.1',NULL),(12,'TEst','a','2019-05-10 07:06:11','2019-05-13 08:21:34',6,'0','2','127.0.0.1','9');
/*!40000 ALTER TABLE `screen_device` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(35) NOT NULL,
  `location` varchar(150) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `picture` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` VALUES (6,'Hotel Jemursari','jemursari','jemursa@ri.com','0','','2019-02-13 03:24:36','2019-02-13 03:24:36','uILLns6DxgD3Ih6IGnGiAmbHKiCEDGusHEaC0iltCw7yCl0Jo5');
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `background` varchar(150) DEFAULT NULL,
  `type` char(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `logo` varchar(150) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `gradient_color` varchar(100) NOT NULL DEFAULT '#000000',
  `center_color` varchar(100) NOT NULL DEFAULT '#000000',
  `weather` varchar(255) DEFAULT NULL,
  `tabel` varchar(255) DEFAULT NULL,
  `background_video` varchar(255) DEFAULT NULL,
  `background_schedule` varchar(255) DEFAULT NULL,
  `background_marquee` varchar(255) DEFAULT NULL,
  `font_type_1` varchar(255) DEFAULT NULL,
  `font_size_1` varchar(255) DEFAULT NULL,
  `font_color_1` varchar(255) DEFAULT NULL,
  `font_type_2` varchar(255) DEFAULT NULL,
  `font_size_2` varchar(255) DEFAULT NULL,
  `font_color_2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
INSERT INTO `template` VALUES (1,'file_background1_c4ca4238a0b923820dcc509a6f75849b.jpg','1','2019-02-13 03:24:36','2019-05-13 08:10:47',6,0,'file_logo1_c4ca4238a0b923820dcc509a6f75849b.png',NULL,'Meeting_Room','rgba(53, 53, 53, 0)','rgba(72, 139, 21, 0)','rgba(88, 90, 199, 0.95)','rgba(255, 255, 255, 0.86)',NULL,NULL,NULL,NULL,'12','#f20101',NULL,NULL,NULL),(3,NULL,'3','2019-02-13 03:24:36','2019-04-30 15:23:26',6,0,NULL,NULL,'Image Slideshow','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'file_background4_a87ff679a2f3e71d9181a67b7542122c.jpg','1','2019-02-14 06:34:25','2019-02-14 07:18:26',7,0,'file_logo4_a87ff679a2f3e71d9181a67b7542122c.jpg',NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'file_background5_e4da3b7fbbce2345d7772b0674a318d5.jpg','2','2019-02-14 06:34:25','2019-02-14 07:20:02',7,0,'file_logo5_e4da3b7fbbce2345d7772b0674a318d5.jpg',NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,'3','2019-02-14 06:34:25','2019-02-14 06:34:25',7,0,NULL,NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'file_background9_45c48cce2e2d7fbdea1afc51c7c6ad2613-05-2019.png','2','2019-04-26 11:11:44','2019-05-13 08:02:20',6,0,NULL,NULL,'tes','','',NULL,NULL,'#2c64ca','file_backgrounds9_45c48cce2e2d7fbdea1afc51c7c6ad2613-05-2019.png','#000000',NULL,'1','#cf2727',NULL,'45','#67d755'),(11,NULL,'4','2019-05-10 09:18:31','2019-05-10 09:18:31',6,0,NULL,NULL,'xaa','#000000','#000000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_type`
--

DROP TABLE IF EXISTS `template_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(40) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_type`
--

LOCK TABLES `template_type` WRITE;
/*!40000 ALTER TABLE `template_type` DISABLE KEYS */;
INSERT INTO `template_type` VALUES (1,'1',NULL,'2019-04-26 02:04:30','Schedule'),(2,'2',NULL,'2019-04-26 02:04:30','Schedule with promotion'),(3,'3',NULL,'2019-04-26 02:04:30','Image Slideshow'),(4,'4',NULL,'2019-05-10 08:45:24','Video Slideshow');
/*!40000 ALTER TABLE `template_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(35) NOT NULL,
  `username` char(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `role` char(15) NOT NULL DEFAULT 'User',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'nusanet','admin','admin88!','nusanet@nusa.net.id',NULL,NULL,0,'Administrator'),(2,'Santika Jemursari','santikajs','santikanusa2019','sriwijaya@hotel.com','2019-04-25 08:50:38','2019-02-15 02:34:23',6,'User');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-23 15:38:56
