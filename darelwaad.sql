-- MySQL dump 10.13  Distrib 5.6.31, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: darelwaad
-- ------------------------------------------------------
-- Server version	5.6.31-0ubuntu0.15.10.1

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
-- Table structure for table `citys`
--

DROP TABLE IF EXISTS `citys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tourist_types_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `citys_tourist_types_id_foreign` (`tourist_types_id`),
  CONSTRAINT `citys_tourist_types_id_foreign` FOREIGN KEY (`tourist_types_id`) REFERENCES `tourist_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citys`
--

LOCK TABLES `citys` WRITE;
/*!40000 ALTER TABLE `citys` DISABLE KEYS */;
INSERT INTO `citys` VALUES (1,'الصين',2),(2,'اليابان',2),(4,'مدينه بدر',1),(5,'الغردقه',1),(6,'عين السخنه',1),(51,'الصين',4),(64,'الصين',4);
/*!40000 ALTER TABLE `citys` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_04_15_141252_create_tourist_types_table',1),(4,'2017_04_15_141301_create_citys_table',1),(5,'2017_04_15_141310_create_offers_table',1),(6,'2017_04_15_141323_create_offer_content_ofs_table',1),(7,'2017_04_15_141334_create_offer_not_content_ofs_table',1),(8,'2017_04_15_141341_create_photos_table',1),(9,'2017_04_15_141350_create_prices_table',1),(10,'2017_04_16_150800_create_offer_photos_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer_content_ofs`
--

DROP TABLE IF EXISTS `offer_content_ofs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offer_content_ofs` (
  `offers_id` int(10) unsigned NOT NULL,
  `feature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `offer_content_ofs_offers_id_foreign` (`offers_id`),
  CONSTRAINT `offer_content_ofs_offers_id_foreign` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer_content_ofs`
--

LOCK TABLES `offer_content_ofs` WRITE;
/*!40000 ALTER TABLE `offer_content_ofs` DISABLE KEYS */;
INSERT INTO `offer_content_ofs` VALUES (1,'غداء'),(1,'عشاء'),(1,'كفايه عليك كده'),(2,'غداء'),(3,'غداء'),(4,'غداء'),(5,'غداء'),(6,'dflksmfdlkv'),(7,'kdflsfdklv'),(8,'kdflsfdklv'),(9,'kdflsfdklv'),(10,'kdflsfdklv'),(11,'kdflsfdklv'),(12,'kdflsfdklv'),(13,'kdflsfdklv'),(14,'kdflsfdklv'),(15,'kdflsfdklv'),(16,'kdflsfdklv'),(17,'غداء'),(17,'عشاء'),(17,'رحلات لليه'),(17,'سفارى'),(18,'غداء'),(18,'جوائز'),(18,'نيمسشى'),(18,'مشبنتىشسمنلىشم'),(18,'يسشبمنىيسم'),(19,'الا الاالنتن ﻻي سنتيب سيى تسي تىة'),(20,'الا الاالنتن ﻻي سنتيب سيى تسي تىة'),(21,'الا الاالنتن ﻻي سنتيب سيى تسي تىة'),(22,'يسبىش تسشيبنتﻻسبمنت سيبمهاﻻسشيمب  شرنشيب'),(22,'تبﻻا اتثبﻻصثنتاﻻب نتثقصبﻻن تﻻبنتيل يلةىﻻيبس منسميﻻ'),(22,'يبةىﻻ اتب تابﻻه سثب تسيﻻبةسيىﻻ تﻻنتﻻةىب نلتﻻلنتﻻ'),(22,'بيلاﻻس تبببسياﻻسيت باتسياتسيل بتاسبتﻻسين'),(23,'يمبلسنة كمنيسلة'),(23,'نتىبيم لىيبنل'),(23,'نتى يمتئنبىسئني'),(23,'نتئﻻؤتني'),(23,'نتؤيﻻسنت'),(23,'تﻻيبسنتب|اﻻ');
/*!40000 ALTER TABLE `offer_content_ofs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer_not_content_ofs`
--

DROP TABLE IF EXISTS `offer_not_content_ofs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offer_not_content_ofs` (
  `offers_id` int(10) unsigned NOT NULL,
  `feature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `offer_not_content_ofs_offers_id_foreign` (`offers_id`),
  CONSTRAINT `offer_not_content_ofs_offers_id_foreign` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer_not_content_ofs`
--

LOCK TABLES `offer_not_content_ofs` WRITE;
/*!40000 ALTER TABLE `offer_not_content_ofs` DISABLE KEYS */;
INSERT INTO `offer_not_content_ofs` VALUES (1,'و لا رحلات'),(1,'فلوس'),(2,'و لا رحلات'),(3,'و لا رحلات'),(4,'و لا رحلات'),(5,'و لا رحلات'),(6,'fdkvn fdkjv'),(7,'dfmsv fdkjv'),(8,'dfmsv fdkjv'),(9,'dfmsv fdkjv'),(10,'dfmsv fdkjv'),(11,'dfmsv fdkjv'),(12,'dfmsv fdkjv'),(13,'dfmsv fdkjv'),(15,'dfmsv fdkjv'),(16,'dfmsv fdkjv'),(17,'نبتلنتيبنت'),(17,'يبتىلي تلنتي نتس'),(17,'بيشة نيشب لنشت لنت'),(18,'شسبخهىص'),(18,'سبنﻻنتبﻻؤنتسيب'),(21,'صقعث صثعناقصثنقاهثصعب اهعيابنتيسﻻ'),(22,'قثاصﻻ اتث بسيﻻباسشﻻينبارسشمتبشمﻻ'),(23,'اتﻻي سنابهشساﻻ');
/*!40000 ALTER TABLE `offer_not_content_ofs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer_photos`
--

DROP TABLE IF EXISTS `offer_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offer_photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offers_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `offer_photos_offers_id_foreign` (`offers_id`),
  CONSTRAINT `offer_photos_offers_id_foreign` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer_photos`
--

LOCK TABLES `offer_photos` WRITE;
/*!40000 ALTER TABLE `offer_photos` DISABLE KEYS */;
INSERT INTO `offer_photos` VALUES (1,'91.jpg','jpg',9),(2,'91.jpg','jpg',9),(3,'101.jpg','jpg',10),(4,'101.txt','txt',10),(5,'101.jpg','jpg',10),(6,'111.jpg','jpg',11),(7,'111.jpg','jpg',11),(8,'111.jpg','jpg',11),(9,'1201.jpg','jpg',12),(10,'1201.jpg','jpg',12),(11,'1201.jpg','jpg',12),(12,'1301.jpg','jpg',13),(13,'1302.jpg','jpg',13),(14,'1303.jpg','jpg',13),(15,'1501.jpg','jpg',15),(16,'1502.jpg','jpg',15),(17,'1503.jpg','jpg',15),(18,'1601.jpg','jpg',16),(19,'1602.jpg','jpg',16),(20,'1603.jpg','jpg',16),(21,'1701.jpg','jpg',17),(22,'1702.jpg','jpg',17),(23,'1703.jpg','jpg',17),(24,'1704.jpg','jpg',17),(25,'1705.jpg','jpg',17),(26,'1706.jpg','jpg',17),(27,'1707.jpg','jpg',17),(28,'1708.jpg','jpg',17),(29,'1709.jpg','jpg',17),(30,'17010.jpg','jpg',17),(31,'17011.jpg','jpg',17),(32,'17012.jpg','jpg',17),(33,'17013.jpg','jpg',17),(34,'17014.jpg','jpg',17),(35,'17015.jpg','jpg',17),(36,'17016.jpg','jpg',17),(37,'17017.jpg','jpg',17),(38,'17018.jpg','jpg',17),(39,'1801.jpg','jpg',18),(40,'1802.jpg','jpg',18),(41,'1803.jpg','jpg',18),(42,'1804.jpg','jpg',18),(43,'1805.jpg','jpg',18),(44,'1806.jpg','jpg',18),(45,'1807.bmp','bmp',18),(46,'1808.jpg','jpg',18),(47,'1809.jpg','jpg',18),(48,'18010.jpg','jpg',18),(49,'18011.jpg','jpg',18),(50,'18012.jpg','jpg',18),(51,'18013.jpg','jpg',18),(52,'18014.jpg','jpg',18),(53,'18015.jpg','jpg',18),(54,'2101.jpg','jpg',21),(55,'2102.jpg','jpg',21),(56,'2103.jpg','jpg',21),(57,'2104.jpg','jpg',21),(58,'2105.jpg','jpg',21),(59,'2106.jpg','jpg',21),(60,'2107.jpg','jpg',21),(61,'2108.jpg','jpg',21),(62,'2109.JPG','JPG',21),(63,'21010.jpg','jpg',21),(64,'21011.jpg','jpg',21),(65,'21012.jpg','jpg',21),(66,'21013.JPG','JPG',21),(67,'21014.JPG','JPG',21),(68,'2201.ini','ini',22),(69,'2202.jpg','jpg',22),(70,'2203.jpg','jpg',22),(71,'2204.jpg','jpg',22),(72,'2205.jpg','jpg',22),(73,'2206.jpg','jpg',22),(74,'2207.jpg','jpg',22),(75,'2208.jpg','jpg',22),(76,'2209.jpg','jpg',22),(77,'22010.gif','gif',22),(78,'22011.jpg','jpg',22),(79,'22012.JPG','JPG',22),(80,'22013.jpg','jpg',22),(81,'2301.ini','ini',23),(82,'2302.jpg','jpg',23),(83,'2303.jpg','jpg',23),(84,'2304.jpg','jpg',23),(85,'2305.jpg','jpg',23),(86,'2306.jpg','jpg',23),(87,'2307.jpg','jpg',23),(88,'2308.jpg','jpg',23),(89,'2309.jpg','jpg',23),(90,'23010.gif','gif',23),(91,'23011.jpg','jpg',23);
/*!40000 ALTER TABLE `offer_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stars_num` int(11) NOT NULL,
  `citys_id` int(10) unsigned NOT NULL,
  `hotel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `days_num` int(11) NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `offers_citys_id_foreign` (`citys_id`),
  KEY `offers_users_id_foreign` (`users_id`),
  CONSTRAINT `offers_citys_id_foreign` FOREIGN KEY (`citys_id`) REFERENCES `citys` (`id`),
  CONSTRAINT `offers_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (1,4,2,'هيلتون رمسيس','نبن نيبل ينبسل خيبل ى بيلى سيبمنىلةسىيبل سىبيةىل مسيبى لمنسيبىل نتسيبىل ستنيىل نتيسبىلتنسبيى لتيسبىلنتسيبىل نسبيىلخحسيبلىسةيبىلمهتسيى لنتسيىبل ستيبلى نتبسيىلتسن يىلتنسى',3,1,NULL,NULL),(2,4,2,'هيلتون رمسيس','نبن نيبل ينبسل خيبل ى بيلى سيبمنىلةسىيبل سىبيةىل مسيبى لمنسيبىل نتسيبىل ستنيىل نتيسبىلتنسبيى لتيسبىلنتسيبىل نسبيىلخحسيبلىسةيبىلمهتسيى لنتسيىبل ستيبلى نتبسيىلتسن يىلتنسى',3,1,NULL,NULL),(3,4,2,'هيلتون رمسيس','نبن نيبل ينبسل خيبل ى بيلى سيبمنىلةسىيبل سىبيةىل مسيبى لمنسيبىل نتسيبىل ستنيىل نتيسبىلتنسبيى لتيسبىلنتسيبىل نسبيىلخحسيبلىسةيبىلمهتسيى لنتسيىبل ستيبلى نتبسيىلتسن يىلتنسى',3,1,NULL,NULL),(4,4,2,'هيلتون رمسيس','نبن نيبل ينبسل خيبل ى بيلى سيبمنىلةسىيبل سىبيةىل مسيبى لمنسيبىل نتسيبىل ستنيىل نتيسبىلتنسبيى لتيسبىلنتسيبىل نسبيىلخحسيبلىسةيبىلمهتسيى لنتسيىبل ستيبلى نتبسيىلتسن يىلتنسى',3,1,NULL,NULL),(5,4,2,'هيلتون رمسيس','نبن نيبل ينبسل خيبل ى بيلى سيبمنىلةسىيبل سىبيةىل مسيبى لمنسيبىل نتسيبىل ستنيىل نتيسبىلتنسبيى لتيسبىلنتسيبىل نسبيىلخحسيبلىسةيبىلمهتسيى لنتسيىبل ستيبلى نتبسيىلتسن يىلتنسى',3,1,NULL,NULL),(6,1,1,'lknvfdsl','dklfv lkfd vjfd vkjfd vkjdf vjd fvj fdk vksdnf v.jsd',1,1,NULL,NULL),(7,5,2,'lknvfdsl','dlkdsv kfd vkfds vkfds vkdsf vkdfsj',2,1,NULL,NULL),(8,5,2,'lknvfdsl','dlkdsv kfd vkfds vkfds vkdsf vkdfsj',2,1,NULL,NULL),(9,5,2,'lknvfdsl','dlkdsv kfd vkfds vkfds vkdsf vkdfsj',2,1,NULL,NULL),(10,5,2,'lknvfdsl','dlkdsv kfd vkfds vkfds vkdsf vkdfsj',2,1,NULL,NULL),(11,5,2,'lknvfdsl','dlkdsv kfd vkfds vkfds vkdsf vkdfsj',2,1,NULL,NULL),(12,5,2,'lknvfdsl','dlkdsv kfd vkfds vkfds vkdsf vkdfsj',2,1,NULL,NULL),(13,5,2,'lknvfdsl','dlkdsv kfd vkfds vkfds vkdsf vkdfsj',2,1,NULL,NULL),(14,5,2,'lknvfdsl','dlkdsv kfd vkfds vkfds vkdsf vkdfsj',2,1,NULL,NULL),(15,5,2,'lknvfdsl','dlkdsv kfd vkfds vkfds vkdsf vkdfsj',2,1,NULL,NULL),(16,5,2,'lknvfdsl','dlkdsv kfd vkfds vkfds vkdsf vkdfsj',2,1,NULL,NULL),(17,3,4,'اى حاحجه','تنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بنيتنيبل نيس لنى بني',4,1,NULL,NULL),(18,5,5,'سيما رميس','نشى بنتشسيبى نشسيتىب نشسيىبمننشى بنتشسيبى نشسيتىب نشسيىبمننشى بنتشسيبى نشسيتىب نشسيىبمننشى بنتشسيبى نشسيتىب نشسيىبمننشى بنتشسيبى نشسيتىب نشسيىبمننشى بنتشسيبى نشسيتىب نشسيىبمننشى بنتشسيبى نشسيتىب نشسيىبمننشى بنتشسيبى نشسيتىب نشسيىبمننشى بنتشسيبى نشسيتىب نشسيىبمننشى بنتشسيبى نشسيتىب نشسيىبمن',4,1,NULL,NULL),(19,2,1,'yahia','منةم مشىسبمنشىبمن ينبتىي لنتبلىن بيىلنتبيىل بينتىلنتبيسى لنسيبى لنتيبلى يسهعلى سيبل ىشخهيىمتنسيلى سيل تسي لى ﻻتى',5,1,NULL,NULL),(20,2,1,'yahia','منةم مشىسبمنشىبمن ينبتىي لنتبلىن بيىلنتبيىل بينتىلنتبيسى لنسيبى لنتيبلى يسهعلى سيبل ىشخهيىمتنسيلى سيل تسي لى ﻻتى',5,1,NULL,NULL),(21,2,1,'yahia','منةم مشىسبمنشىبمن ينبتىي لنتبلىن بيىلنتبيىل بينتىلنتبيسى لنسيبى لنتيبلى يسهعلى سيبل ىشخهيىمتنسيلى سيل تسي لى ﻻتى',5,1,NULL,NULL),(22,1,1,'lknvfdsl','نميبة منيشسل تمنسبتيال منتيبس ىلنمتسبي ىلنتى يسمنبتلى منتيسلىمنتيسبل نتيبسنلت يبسةلى نمبيىلمنبسي لكن ةبيسلتمنبيسل منسبيتل منسيتلسيملنتيب مسلسيبت لمنتل منبيىلمنىزينلىسينىلن سيىلسي',4,1,NULL,NULL),(23,3,6,'lknvfdsl','نميس منيسك لمسيكمنل ىمنيسبىلمنتبسيىلىنميس منيسك لمسيكمنل ىمنيسبىلمنتبسيىلىنميس منيسك لمسيكمنل ىمنيسبىلمنتبسيىلىنميس منيسك لمسيكمنل ىمنيسبىلمنتبسيىلىنميس منيسك لمسيكمنل ىمنيسبىلمنتبسيىلىنميس منيسك لمسيكمنل ىمنيسبىلمنتبسيىلىنميس منيسك لمسيكمنل ىمنيسبىلمنتبسيىلى',6,1,NULL,NULL);
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
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
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `photo_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offers_id` int(10) unsigned NOT NULL,
  KEY `photos_offers_id_foreign` (`offers_id`),
  CONSTRAINT `photos_offers_id_foreign` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prices`
--

DROP TABLE IF EXISTS `prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prices` (
  `offers_id` int(10) unsigned NOT NULL,
  `room_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  KEY `prices_offers_id_foreign` (`offers_id`),
  CONSTRAINT `prices_offers_id_foreign` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prices`
--

LOCK TABLES `prices` WRITE;
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
INSERT INTO `prices` VALUES (21,'فرديه',200),(22,'فرديه',4),(22,'زوجيه',5545),(22,'ثلاثيه',54545),(23,'فرديه',55),(23,'زوجيه',555);
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tourist_types`
--

DROP TABLE IF EXISTS `tourist_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tourist_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tourist_types`
--

LOCK TABLES `tourist_types` WRITE;
/*!40000 ALTER TABLE `tourist_types` DISABLE KEYS */;
INSERT INTO `tourist_types` VALUES (1,'سياحه داخليه'),(2,'سياحه خارجيه'),(3,'حج و عمره'),(4,'سفارى');
/*!40000 ALTER TABLE `tourist_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'yahia abdullah','yahiafcih2014@gmail.com','123456789',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-20 18:12:57
