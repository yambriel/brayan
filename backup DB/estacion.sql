-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: estacion
-- ------------------------------------------------------
-- Server version	5.7.23-log

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
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `placa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idcustomers` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (14,'mrw','gris metalico','aaaaas','2019-09-19 05:31:07','2019-11-04 01:24:23',5,0),(15,'terio','bbbbb','abc322b','2019-09-19 05:31:17','2019-09-19 05:31:17',5,1),(16,'terio','bbbbb','aaaaas','2019-09-19 05:31:29','2019-09-19 05:31:29',5,1),(17,'mrw','gris metalico','aaaaas','2019-09-19 05:31:07','2019-09-19 05:31:07',5,1),(18,'mrw','gris metalico','aaaaas','2019-09-19 05:31:07','2019-09-19 05:31:07',5,1),(19,'mrw','gris metalico','aaaaas','2019-09-19 05:31:07','2019-09-19 05:31:07',5,1),(20,'terio','bbbbb','abc322b','2019-09-19 05:31:17','2019-09-19 05:31:17',5,1),(21,'terio','bbbbb','aaaaas','2019-09-19 05:31:29','2019-09-19 05:31:29',5,1),(22,'mrw','gris metalico','aaaaas','2019-09-19 05:31:07','2019-09-19 05:31:07',5,1),(23,'mrw','gris metalico','aaaaas','2019-09-19 05:31:07','2019-09-19 05:31:07',5,1),(24,'chevrolet','gris metalico','abr123','2019-09-19 05:38:47','2019-09-19 05:38:47',5,1),(25,'ewqewq','ewqeqw','ewqewq','2019-10-17 07:02:58','2019-10-17 07:02:58',5,1),(26,'sdads','dsadsad','dsad','2019-10-21 01:14:55','2019-10-21 02:04:28',4,1),(27,'puto','negro marico','puto','2019-10-21 01:15:34','2019-10-21 01:15:34',4,1),(28,'dsad','e32423','dsad','2019-10-21 03:15:56','2019-10-21 03:15:56',3,1),(29,'aaa','dsada','sasasd','2019-10-21 03:17:54','2019-10-21 03:17:54',2,1),(30,'fdsf','fsfgf','fdsf','2019-10-21 03:18:50','2019-10-21 03:18:50',2,1),(31,'terio','verde','fbt35b','2019-10-27 23:05:30','2019-10-27 23:05:30',8,1),(32,'aveo','negro','12f58h','2019-10-30 20:25:26','2019-10-30 20:25:26',12,1);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cellars`
--

DROP TABLE IF EXISTS `cellars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cellars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cantidadPuestos` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cellars`
--

LOCK TABLES `cellars` WRITE;
/*!40000 ALTER TABLE `cellars` DISABLE KEYS */;
INSERT INTO `cellars` VALUES (1,'sotano 1','2019-10-17 07:14:01','2019-11-04 01:40:40',30,1),(2,'sotano 2','2019-10-18 07:39:07','2019-10-28 21:33:51',10,1),(14,'sotano 2','2019-10-21 04:02:39','2019-11-04 01:44:12',3,0),(15,'sotano 3','2019-10-21 04:03:35','2019-10-21 04:11:28',20,1);
/*!40000 ALTER TABLE `cellars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `carnet` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (2,'dadads','dasdasd','dsads','1232131212','4125440526',NULL,'2019-11-04 01:48:01',0),(3,'dwadas','dsadasd','dsasdas','231313','3213123','2019-10-17 07:07:21','2019-10-17 07:07:21',1),(4,'tyrytry','tyrtyry','yrytryrt','1231','32423','2019-10-17 07:08:35','2019-10-17 07:08:35',1),(5,'gabriel','rodriguez','yambrielg@gmail.com','124578','02128642853',NULL,'2019-11-04 01:48:14',0),(11,'antonietta','marron','antonietta@gmail.com','123456','04122005927','2019-10-30 20:24:38','2019-10-30 20:24:38',1),(7,'brayan','MARTINEZX','andryrodriguez_27@hotmail','1232131212222','04125440526','2019-10-24 21:42:54','2019-10-24 21:42:54',1),(8,'luz','marina','luzmarina_9447@hotmail.com','11113455','04142647912','2019-10-26 19:01:17','2019-10-26 19:01:17',1),(10,'luz','MARTINEZX','gabocuberos@gmail.com','1245682','86475989','2019-10-26 19:02:27','2019-10-26 19:02:27',1),(12,'antonietta','marron','antonietta@gmail.com','123456','04122005927','2019-10-30 20:24:39','2019-10-30 20:24:39',1);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cellar_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (2,14,2,0,'2019-10-21 04:02:40','2019-10-21 04:02:40'),(3,14,3,0,'2019-10-21 04:02:40','2019-10-21 04:02:40'),(14,15,1,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(15,15,2,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(16,15,3,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(17,15,4,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(18,15,5,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(19,15,6,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(20,15,7,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(21,15,8,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(22,15,9,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(23,15,10,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(24,15,11,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(25,15,12,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(26,15,13,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(27,15,14,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(28,15,15,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(29,15,16,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(30,15,17,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(31,15,18,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(32,15,19,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(33,15,20,0,'2019-10-21 04:11:28','2019-10-21 04:11:28'),(64,2,1,0,'2019-10-28 21:33:51','2019-10-28 21:33:51'),(65,2,2,1,'2019-10-28 21:33:51','2019-11-03 22:30:17'),(66,2,3,0,'2019-10-28 21:33:51','2019-10-28 21:33:51'),(67,2,4,0,'2019-10-28 21:33:52','2019-10-28 21:33:52'),(68,2,5,0,'2019-10-28 21:33:52','2019-11-04 01:12:30'),(69,2,6,1,'2019-10-28 21:33:52','2019-10-28 21:33:52'),(70,2,7,0,'2019-10-28 21:33:52','2019-10-28 21:33:52'),(71,2,8,0,'2019-10-28 21:33:52','2019-10-28 21:33:52'),(72,2,9,0,'2019-10-28 21:33:52','2019-10-28 21:33:52'),(73,2,10,0,'2019-10-28 21:33:52','2019-10-28 21:33:52');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cellar_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `entry_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exit_time` datetime DEFAULT NULL,
  `id_customer` int(11) NOT NULL,
  `systemTimeEntry` varchar(2) NOT NULL,
  `systemTimeExit` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`cellar_id`,`post_id`,`car_id`),
  KEY `cellar_id` (`cellar_id`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`cellar_id`) REFERENCES `cellars` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (14,2,1,1,31,'2019-10-28 01:10:00','2019-10-28 05:30:30','2019-11-03 21:36:06','2019-11-03 05:11:00',8,'AM','AM'),(15,2,1,26,32,'2019-10-30 12:10:00','2019-10-30 20:26:25','2019-11-03 21:36:52','2019-11-03 05:11:00',12,'PM','AM'),(16,2,2,5,31,'2019-10-31 04:10:00','2019-10-31 20:32:48','2019-11-04 01:12:30','2019-11-03 08:11:00',8,'AM','PM'),(17,2,2,6,32,'2019-10-31 04:10:00','2019-10-31 20:35:07','2019-10-31 20:35:07',NULL,12,'AM',NULL),(18,2,2,2,28,'2019-11-03 06:11:00','2019-11-03 22:30:17','2019-11-03 22:32:22','2019-11-03 06:11:00',3,'AM','PM');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com',NULL,'$2y$10$MmQCMQsPFrh2iIWypUHNweihMs6eI94gBrIXf15jVJVWpQGngAbj6',NULL,0,'2019-07-14 22:33:50','2019-07-14 22:33:50'),(2,'brayan','yambrielg@gmail.com',NULL,'$2y$10$mm/L/LpAQiTmSOqoQOAs2uwRuudMBz4TB9GChYXQMfJt1soqPKdcC',NULL,1,'2019-07-24 18:39:54','2019-07-24 18:39:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'estacion'
--

--
-- Dumping routines for database 'estacion'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-03 16:53:49
