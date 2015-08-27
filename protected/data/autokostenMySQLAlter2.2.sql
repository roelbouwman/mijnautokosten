CREATE DATABASE  IF NOT EXISTS `autokosten` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `autokosten`;
-- MySQL dump 10.14  Distrib 5.5.45-MariaDB, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: autokosten
-- ------------------------------------------------------
-- Server version	5.5.45-MariaDB-1~wheezy-log

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
-- Table structure for table `tbl_auto`
--

DROP TABLE IF EXISTS `tbl_auto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_auto` (
  `idtbl_auto` int(11) NOT NULL AUTO_INCREMENT,
  `merk` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `brandstof` varchar(45) DEFAULT NULL,
  `beginstand` int(11) DEFAULT NULL,
  `kenteken` varchar(45) DEFAULT NULL,
  `bouwjaar` int(11) DEFAULT NULL,
  `aanschafprijs` float DEFAULT NULL,
  `wegenbelasting` float DEFAULT NULL,
  `verzekering` float DEFAULT NULL,
  `afschrijving` float DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `aanschaf` date DEFAULT NULL,
  `hoofdauto` int(11) DEFAULT '0',
  `afschaf` date DEFAULT NULL,
  PRIMARY KEY (`idtbl_auto`),
  KEY `fk_tbl_auto_tbl_user_idx` (`tbl_user_idtbl_user`),
  CONSTRAINT `fk_tbl_auto_tbl_user` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_auto`
--

LOCK TABLES `tbl_auto` WRITE;
/*!40000 ALTER TABLE `tbl_auto` DISABLE KEYS */;
INSERT INTO `tbl_auto` VALUES (1,'Renault','Megane','diesel',150000,'74-PL-TF',2004,6500,97,34,0,1,'2010-03-01',1,NULL);
/*!40000 ALTER TABLE `tbl_auto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_onderhoud`
--

DROP TABLE IF EXISTS `tbl_onderhoud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_onderhoud` (
  `idtbl_onderhoud` int(11) NOT NULL AUTO_INCREMENT,
  `omschrijving` varchar(128) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `kosten` float DEFAULT NULL,
  `tbl_auto_idtbl_auto` int(11) NOT NULL,
  `kmstand` int(11) DEFAULT NULL,
  `onderhoud` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbl_onderhoud`),
  KEY `fk_tbl_onderhoud_tbl_auto1_idx` (`tbl_auto_idtbl_auto`),
  CONSTRAINT `fk_tbl_onderhoud_tbl_auto1` FOREIGN KEY (`tbl_auto_idtbl_auto`) REFERENCES `tbl_auto` (`idtbl_auto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_onderhoud`
--

LOCK TABLES `tbl_onderhoud` WRITE;
/*!40000 ALTER TABLE `tbl_onderhoud` DISABLE KEYS */;
INSERT INTO `tbl_onderhoud` VALUES (1,'eerste onderhoudsbeurt','2013-01-01',100,1,150000,NULL),(2,'tweede onderhoudsbeurt','2013-01-06',100,1,152000,NULL),(3,'derde onderhoudsbeurt','2013-01-10',100,1,155000,NULL);
/*!40000 ALTER TABLE `tbl_onderhoud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_soortbrandstof`
--

DROP TABLE IF EXISTS `tbl_soortbrandstof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_soortbrandstof` (
  `idtbl_soortbrandstof` int(11) NOT NULL AUTO_INCREMENT,
  `brandstof` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbl_soortbrandstof`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_soortbrandstof`
--

LOCK TABLES `tbl_soortbrandstof` WRITE;
/*!40000 ALTER TABLE `tbl_soortbrandstof` DISABLE KEYS */;
INSERT INTO `tbl_soortbrandstof` VALUES (1,'Benzine'),(2,'Diesel'),(3,'LPG'),(4,'Aardgas'),(5,'Electriciteit'),(6,'Waterstof');
/*!40000 ALTER TABLE `tbl_soortbrandstof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_soortonderhoud`
--

DROP TABLE IF EXISTS `tbl_soortonderhoud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_soortonderhoud` (
  `idtbl_soortonderhoud` int(11) NOT NULL AUTO_INCREMENT,
  `onderhoud` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbl_soortonderhoud`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_soortonderhoud`
--

LOCK TABLES `tbl_soortonderhoud` WRITE;
/*!40000 ALTER TABLE `tbl_soortonderhoud` DISABLE KEYS */;
INSERT INTO `tbl_soortonderhoud` VALUES (1,'onderhoud'),(2,'extra kosten');
/*!40000 ALTER TABLE `tbl_soortonderhoud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_soortvergoeding`
--

DROP TABLE IF EXISTS `tbl_soortvergoeding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_soortvergoeding` (
  `idtbl_soortvergoeding` int(11) NOT NULL AUTO_INCREMENT,
  `terugkerendeVergoeding` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbl_soortvergoeding`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_soortvergoeding`
--

LOCK TABLES `tbl_soortvergoeding` WRITE;
/*!40000 ALTER TABLE `tbl_soortvergoeding` DISABLE KEYS */;
INSERT INTO `tbl_soortvergoeding` VALUES (1,'eenmalig'),(2,'wekelijks'),(3,'maandelijks'),(4,'jaarlijks');
/*!40000 ALTER TABLE `tbl_soortvergoeding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tankbeurt`
--

DROP TABLE IF EXISTS `tbl_tankbeurt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tankbeurt` (
  `idtbl_tankbeurt` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date DEFAULT NULL,
  `liters` float DEFAULT NULL,
  `literprijs` float DEFAULT NULL,
  `kmstand` int(11) DEFAULT NULL,
  `tbl_auto_idtbl_auto` int(11) NOT NULL,
  `totaal` float DEFAULT NULL,
  PRIMARY KEY (`idtbl_tankbeurt`),
  KEY `fk_tbl_tankbeurt_tbl_auto1_idx` (`tbl_auto_idtbl_auto`),
  CONSTRAINT `fk_tbl_tankbeurt_tbl_auto1` FOREIGN KEY (`tbl_auto_idtbl_auto`) REFERENCES `tbl_auto` (`idtbl_auto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tankbeurt`
--

LOCK TABLES `tbl_tankbeurt` WRITE;
/*!40000 ALTER TABLE `tbl_tankbeurt` DISABLE KEYS */;
INSERT INTO `tbl_tankbeurt` VALUES (1,'2013-01-01',45.08,1.475,150000,1,66.493),(2,'2013-02-01',55.08,1.475,151000,1,81.243),(3,'2013-03-01',49.34,1.439,152000,1,71.0003),(4,'2013-01-01',44,1.345,155000,1,150);
/*!40000 ALTER TABLE `tbl_tankbeurt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `idtbl_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `salt` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `roles` varchar(128) DEFAULT NULL,
  `woonplaats` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idtbl_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'test@test.nl','f4028add34e82971eb758d1b38b1bcfe','xh2yPYCVe0','test@test.nl','leden','den haag'),(2,'roelbouwman@gmail.com','f4028add34e82971eb758d1b38b1bcfe','xh2yPYCVe0','roelbouwman@gmail.com','leden','Veghel');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_vergoeding`
--

DROP TABLE IF EXISTS `tbl_vergoeding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_vergoeding` (
  `idtbl_vergoeding` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date DEFAULT NULL,
  `omschrijving` varchar(45) DEFAULT NULL,
  `vergoeding` float DEFAULT NULL,
  `tbl_auto_idtbl_auto` int(11) NOT NULL,
  `terugkerendeVergoeding` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtbl_vergoeding`),
  KEY `fk_tbl_vergoeding_tbl_auto1_idx` (`tbl_auto_idtbl_auto`),
  CONSTRAINT `fk_tbl_vergoeding_tbl_auto1` FOREIGN KEY (`tbl_auto_idtbl_auto`) REFERENCES `tbl_auto` (`idtbl_auto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_vergoeding`
--

LOCK TABLES `tbl_vergoeding` WRITE;
/*!40000 ALTER TABLE `tbl_vergoeding` DISABLE KEYS */;
INSERT INTO `tbl_vergoeding` VALUES (13,'2010-03-01','dji',262.52,1,NULL),(14,'2010-04-01','dji',262.52,1,NULL),(15,'2010-05-01','dji',262.52,1,NULL),(16,'2010-06-01','dji',262.52,1,NULL),(17,'2010-07-01','dji',262.52,1,NULL),(18,'2010-08-01','dji',262.52,1,NULL),(19,'2010-09-01','dji',262.52,1,NULL),(20,'2010-10-01','dji',262.52,1,NULL),(21,'2010-11-01','dji',262.52,1,NULL),(22,'2010-12-01','dji',262.52,1,NULL),(23,'2011-01-01','dji',262.52,1,NULL),(24,'2011-02-01','dji',262.52,1,NULL),(25,'2011-03-01','dji',262.52,1,NULL),(26,'2011-04-01','dji',262.52,1,NULL),(27,'2011-05-01','dji',262.52,1,NULL),(28,'2011-06-01','dji',262.52,1,NULL),(29,'2011-07-01','dji',262.52,1,NULL),(30,'2011-08-01','dji',262.52,1,NULL),(31,'2011-09-01','dji',262.52,1,NULL),(32,'2011-10-01','dji',262.52,1,NULL),(33,'2011-11-01','dji',262.52,1,NULL),(34,'2011-12-01','dji',262.52,1,NULL),(35,'2012-01-01','dji',273,1,NULL),(36,'2012-02-01','dji',273,1,NULL),(37,'2012-03-01','dji',273,1,NULL),(38,'2012-04-01','dji',273,1,NULL),(39,'2012-05-01','dji',273,1,NULL),(40,'2012-06-01','dji',273,1,NULL),(41,'2012-07-01','dji',273,1,NULL),(42,'2012-08-01','dji',273,1,NULL),(43,'2012-09-01','dji',273,1,NULL),(44,'2012-10-01','dji',273,1,NULL),(45,'2012-11-01','dji',273,1,NULL),(46,'2012-12-01','dji',273,1,NULL),(47,'2013-01-01','dji',273,1,NULL),(48,'2013-02-01','dji',273,1,NULL),(49,'2013-03-01','dji',273,1,NULL),(50,'2013-04-01','dji',273,1,NULL),(51,'2015-04-04','sligro',34,1,''),(52,'2015-08-04','test',1234,1,'wekelijks');
/*!40000 ALTER TABLE `tbl_vergoeding` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-27 22:42:42
