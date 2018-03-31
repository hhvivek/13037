-- MySQL dump 10.16  Distrib 10.1.32-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: thelster_hackathon
-- ------------------------------------------------------
-- Server version	10.1.32-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(1000) NOT NULL,
  `name` varchar(60) NOT NULL,
  `salary` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `img`, `name`, `salary`, `gender`, `dob`, `mobile`, `email`, `street`, `city`, `state`, `pcode`, `username`, `password`, `type`) VALUES (1,'http://thelstera.com/user_uploads','vivek singh','50,000','Male','1998-04-20','896217456','vivek@hostdust.com','89, santoshi vihar','bhopal','madhya pradesh','462041','vivek','Mastermind1#','admin'),(12,'http://thelstera.com/user_uploads','Siddhant Satpute','20000','Male','1999-02-01','8989658332','siddhantsureshsatpute@gmail.com','','','','','siddhant','qwerty123','employee'),(15,'http://thelstera.com/user_uploads','yash rana ','10000','Male','1998-02-05','8932547010','vujnwsalk@ymail.com','dsvs','dscvsd','sdcs','126562','yash','Mastermind1#','employee'),(16,'http://thelstera.com/user_uploads','Uddeshya Sharma','30000','Male','1999-07-08','8962582604','uddeshya.us@gmail.com','suraj nagar','Bhopal','M.P.','462044','Uddeshya','Uddeshya@08','manager'),(19,'http://thelstera.com/user_uploads','Sahil SOni','50000','male','1999-02-16','8225821222','hhsb2606@gmail.com','','','','','sahil....','sahilqwe','employee'),(17,'http://thelstera.com/user_uploads','anand','51651','Male','1997-02-06','8080807939','anand@wittyfeed.com','','','','','anand','123qwe,./','manager');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cin` varchar(60) NOT NULL,
  `cout` varchar(60) NOT NULL,
  `latti` varchar(60) NOT NULL,
  `longi` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` (`id`, `cin`, `cout`, `latti`, `longi`, `username`) VALUES (17,'2018-03-31 15:20:02','2018-03-31 15:20:28','28.474388','77.503990','yash'),(7,'2018-03-31','2018-03-31 14:08:19','29.4623423','72.5043219','yash'),(8,'2018-03-31','2018-03-31 14:09:41','28.4289657','77.72184213','yash'),(9,'2018-03-31','2018-03-31 14:11:34','28.4743822','77.503990','yash'),(10,'2018-03-31','2018-03-31 14:13:06','28.474388','77.5489210','yash'),(11,'2018-03-31','2018-03-31 14:13:50','28.474388','77.503990','yash'),(12,'2018-03-31','2018-03-31 14:16:05','28.474388','77.503990','yash'),(13,'2018-03-31 14:16:52','2018-03-31 14:16:59','28.4643423','75.9503990','yash'),(14,'2018-03-31 14:46:00','2018-03-31 14:46:13','28.474388','77.503990','yash'),(18,'2018-03-31 15:21:06','2018-03-31 15:22:10','28.474388','77.503990','yash'),(16,'2018-03-31 15:04:37','2018-03-31 15:04:52','28.474388','77.503990','siddhant');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `cdate` varchar(60) NOT NULL,
  `edate` varchar(60) NOT NULL,
  `user` varchar(80) NOT NULL,
  `add` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` (`id`, `cdate`, `edate`, `user`, `add`) VALUES (0,'20hgvh2','sd44sdFf','manager','user'),(1,'20hgvh2','sd44sdFf','manager','user');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(10) NOT NULL,
  `username` varchar(60) NOT NULL,
  `message` varchar(600) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` (`id`, `subject`, `username`, `message`) VALUES (1,'sdcds','yash','sa'),(2,'ON HOLIDAY','sahil....','DUE TO MEDICAL CONDITION I HAVE BABASIR');
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'thelster_hackathon'
--

--
-- Dumping routines for database 'thelster_hackathon'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-31 15:31:36
