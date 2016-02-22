-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: failbook
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.13.04.1

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
-- Table structure for table `flags`
--

DROP TABLE IF EXISTS `flags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flags` (
  `flag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flags`
--

LOCK TABLES `flags` WRITE;
/*!40000 ALTER TABLE `flags` DISABLE KEYS */;
INSERT INTO `flags` VALUES ('Flag 10: QWx3YXlzIGxvb2sgbGVmdCBhbmQgcmlnaHQuCg==');
/*!40000 ALTER TABLE `flags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `pid` int(11) NOT NULL DEFAULT '0',
  `type` text,
  `image` mediumblob NOT NULL,
  PRIMARY KEY (`pid`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `posts` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1245066943,1608196350),(1245066943,1675660827),(1245066943,1361601169),(1245066943,840151486),(1245066943,1361952531);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `text` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pid`),
  KEY `uid` (`uid`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (29023383,55037051,'Hope the FailBots don\'t catch me.','2015-03-14 07:54:46'),(34536677,1185908791,'School is so boring, I can\'t wait for the day to be over.','2015-03-14 07:54:46'),(61801571,198035746,'Hope the FailBots don\'t catch me.','2015-03-14 07:54:46'),(65042515,478535839,'Haha, just read a message while eating cereal and milk come out of my nose.','2015-03-14 07:54:46'),(90183320,1851844786,'Generally, I would have to agree with my inner child.','2015-03-14 07:54:45'),(110817174,1586614164,'This website is really cool!!!!','2015-03-14 07:54:47'),(125886854,235880173,'This website is really cool!!!!','2015-03-14 07:54:46'),(148153228,306926729,'My phone died. Goog thing this website doesn\'t have an app yet.','2015-03-14 07:54:45'),(181815739,536621395,'omg....','2015-03-14 07:54:45'),(239464975,671682707,'Generally, I would have to agree with my inner child.','2015-03-14 07:54:47'),(274218232,1893433888,'Charles Barkley, srsly? Charles Barkley','2015-03-14 07:54:47'),(298930635,1914788950,'It is something special when you hold your child for the first time','2015-03-14 07:54:47'),(405173808,120866378,'Tom is the best, can\'t believe he made such a cool website!','2015-03-14 07:54:47'),(421588592,816431840,'I\'m so tired of the news...how about some positive stuff once in a while','2015-03-14 07:54:46'),(472701309,1675660827,'Tyler just proposed, I am so freakin\' happy!!!','2015-03-14 07:54:34'),(523258423,350313936,'I\'ve been wondering for quite a while, is the world going to end?','2015-03-14 07:54:47'),(607878255,1247888264,'I\'ve been wondering for quite a while, is the world going to end?','2015-03-14 07:54:45'),(625894023,747032141,'It is something special when you hold your child for the first time','2015-03-14 07:54:46'),(738502760,203762923,'What\'s with all the weird traffic these days?','2015-03-14 07:54:46'),(740855104,149746475,'I\'m so tired of the news...how about some positive stuff once in a while','2015-03-14 07:54:45'),(806109121,1902522983,'Oh yeah, this is the next big thing in social networking. Take that Facebook and Myspace','2015-03-14 07:54:48'),(842950750,797729608,'Hope the FailBots don\'t catch me.','2015-03-14 07:54:47'),(928646795,563339428,'It is something special when you hold your child for the first time','2015-03-14 07:54:48'),(987898930,1030255929,'This website is really cool!!!!','2015-03-14 07:54:47'),(1050866835,1281619940,'omg....','2015-03-14 07:54:45'),(1051835559,367990417,'GrammarNazis need to stop monitoring my posts, if I want to use poor grammar, then I can; Haha, take that.','2015-03-14 07:54:46'),(1065029791,1884801263,'This website is really cool!!!!','2015-03-14 07:54:47'),(1100641523,669463665,'Tyler just proposed, I am so freakin\' happy!!!','2015-03-14 07:54:47'),(1129697987,74754640,'I\'ve been wondering for quite a while, is the world going to end?','2015-03-14 07:54:46'),(1157485039,1608196350,'Hope the FailBots don\'t catch me.','2015-03-14 07:54:34'),(1194497694,2087455101,'Generally, I would have to agree with my inner child.','2015-03-14 07:54:46'),(1227499861,1361601169,'Tom is the best, can\'t believe he made such a cool website!','2015-03-14 07:54:35'),(1245066943,306084229,'Flag 7: QSBtaW5kIGlzIGEgdGVycmlibGUgdGhpbmcgdG8gd2FzdGUK','2015-03-08 18:32:04'),(1249269402,740914451,'This website is really cool!!!!','2015-03-14 07:54:45'),(1259583700,1782038797,'Oh yeah, this is the next big thing in social networking. Take that Facebook and Myspace','2015-03-14 07:54:46'),(1262134458,637448003,'I hope no one hacks my account!','2015-03-14 07:54:48'),(1265718874,1328401343,'I\'ve been wondering for quite a while, is the world going to end?','2015-03-14 07:54:45'),(1282446176,611112284,'Is anyone else experienceing problems with their account?','2015-03-14 07:54:47'),(1293533135,218211502,'Hey, I just met you and I don\'t like you....;)','2015-03-14 07:54:48'),(1322547859,109642994,'Loving this new site!','2015-03-14 07:54:46'),(1341871103,390807565,'I wish I could live in a bubble, I love bubbles','2015-03-14 07:54:46'),(1416648125,80576586,'Hope the FailBots don\'t catch me.','2015-03-14 07:54:47'),(1452636034,840151486,'I\'ve been wondering for quite a while, is the world going to end?','2015-03-14 07:54:35'),(1484366546,1393615953,'omg....','2015-03-14 07:54:46'),(1585125293,1118690550,'Oh yeah, this is the next big thing in social networking. Take that Facebook and Myspace','2015-03-14 07:54:45'),(1624556334,711197907,'Really? What is the world coming to these days! #notamused','2015-03-14 07:54:47'),(1708380756,1881648152,'What\'s with all the weird traffic these days?','2015-03-14 07:54:47'),(1869737665,1361952531,'I hope no one hacks my account!','2015-03-14 07:54:35'),(1886239931,1931921182,'Hi everyone! I\'m Tom and I wanted to thank you for checking my website. Have fun and go ahead and take a look around.','2014-02-23 04:50:12'),(1895380654,1233368183,'omg....','2015-03-14 07:54:47'),(1898711906,1412285974,'School is so boring, I can\'t wait for the day to be over.','2015-03-14 07:54:47'),(1957966118,769061582,'Oh yeah, this is the next big thing in social networking. Take that Facebook and Myspace','2015-03-14 07:54:46');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `pass` text NOT NULL,
  `avatar` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (55037051,'yfellison','Yelena','Ellison','rJMyoTkcp29hI2I2FH1fI2j=',''),(74754640,'tbparsons','Thomasine','Parsons','qTWjLKWmo25mq1RjpJIlGQR=',''),(80576586,'lblawson','Layne','Lawson','oTWfLKqmo25YqwZlGHRmrt==',''),(109642994,'vtcosta','Val','Costa','qaEwo3A0LHShoyV3p2gn',''),(120866378,'deyoung','Deadra','Young','MTI5o3IhMmIlnaMmBUOv',''),(149746475,'giroach','Gertie','Roach','M2ylo2SwnSWZpHt3EHWD',''),(198035746,'mscrane','Marietta','Crane','oKAwpzShMGHmJGWvIxI2',''),(203762923,'vnmorrison','Val','Morrison','qz5go3WlnKAioabkq0MGozZk',''),(218211502,'kabaker','Karl','Baker','n2SvLJgypaMWJQAwExH2',''),(235880173,'mhbrennan','Maria','Brennan','oJuvpzIhozShAIILZ2qcIHf=',''),(306084229,'flaguser','flag','user','MzkuM3ImMKWjLKAmZGVm',''),(306926729,'jdcrane','Joleen','Crane','nzEwpzShMIqmn3OlFGyY',''),(350313936,'laallen','Loma','Allen','oTSuoTkyoycHHJkKZz5K',''),(367990417,'bqparsons','Bella','Parsons','LaSjLKWmo25mIzE0DISiZ1R=',''),(390807565,'kahuffman','Kristin','Huffman','n2SbqJMzoJShMKSYqmAcETp=',''),(478535839,'jqcherry','Jodee','Cherry','naSwnTIlpay5IUSHZSx0Aj==',''),(536621395,'ejcrane','Evette','Crane','MJcwpzShMIp1FRISo2c3',''),(563339428,'wicollins','Wai','Collins','q2ywo2kfnJ5mHzt1ox1lLwx=',''),(611112284,'gerollins','Greta','Rollins','M2Ilo2kfnJ5mJJWaIUZ5qRR=',''),(637448003,'sapetty','Steffanie','Petty','p2SjMKE0rGSQoIM3AUub',''),(669463665,'sbburke','Shonna','Burke','p2WvqKWeMHunD21GnGIk',''),(671682707,'emtyler','Elida','Tyler','MJ10rJkypwSHIKH1omDj',''),(711197907,'luschneider','Lawrence','Schneider','oUImL2uhMJyxMKWMpwZjMR16IN==',''),(740914451,'fyrice','Florentino','Rice','MaylnJAyFxW5HQuLMyL=',''),(747032141,'nkbaker','Nakia','Baker','ozgvLJgypzuAH1qELmuL',''),(769061582,'tudonaldson','Teresia','Donaldson','qUIxo25uoTEmo24mEwABowqyLt==',''),(797729608,'abgood','Aracelis','Good','LJWao29xMJcuI1WiLID=',''),(816431840,'dcflynn','Denice','Flynn','MTAzoUyhoaITI0ShD21R',''),(840151486,'jjwalker','Jake','Walker','nzc3LJkeMKWxL3pmETM3qN==',''),(1030255929,'svharrison','Sheldon','Harrison','p3MbLKWlnKAioaclGzgbE1My',''),(1118690550,'atshaffer','Assunta','Shaffer','LKEmnTSzMzIlF2czJRuIAJV=',''),(1185908791,'dllawrence','Danita','Lawrence','MTkfLKqlMJ5wMJcbGwMaBH5a',''),(1233368183,'egpowell','Earnestine','Powell','MJqjo3qyoTkjowOLG0WGpD==',''),(1247888264,'wfwoodard','Ward','Woodard','q2M3o29xLKWxBUMLAUqvn3Z=',''),(1281619940,'cmalvarez','Christin','Alvarez','L21uoUMupzI6Lx1Ko3N4GID=',''),(1328401343,'ruprince','Rufina','Prince','paIjpzyhL2IRLH9SpRq6At==',''),(1361601169,'hsdonaldson','Hwa','Donaldson','nUAxo25uoTEmo240EauVGTkuDj==',''),(1361952531,'bfrichmond','Becky','Richmond','LzMlnJAboJ9hMUH1DJf1ZyAX',''),(1393615953,'kyodom','Kathey','Odom','n3yiMT9gGRyYERgPLyx=',''),(1412285974,'osgilbert','Owen','Gilbert','o3AanJkvMKW0F2SjHmEhFx8=',''),(1586614164,'wkcaldwell','Ward','Caldwell','q2gwLJkxq2IfoQt1nyABrJAQ',''),(1608196350,'slrangel','Shawnda','Rangel','p2klLJ5aMJkMF0t4n3uHIj==',''),(1675660827,'ehrangel','Elane','Rangel','MJulLJ5aMJkaZKMYA2q4Hj==',''),(1782038797,'egharrison','Esmeralda','Harrison','MJqbLKWlnKAiozb3LyMxZJSD',''),(1851844786,'ddkramer','Deadra','Kramer','MTEepzSgMKWwHzAGHzxjFt==',''),(1881648152,'baspence','Bonita','Spence','LzSmpTIhL2HkZHIWFKV1nN==',''),(1884801263,'molove','Marinda','Love','oJ9fo3MyomuFD083pmZ=',''),(1893433888,'svcrane','Sharan','Crane','p3MwpzShMGAlMz5iIGAQ',''),(1902522983,'nwsantana','Nina','Santana','oaqmLJ50LJ5uGTgAD1AeEmR=',''),(1914788950,'vierickson','Vance','Erickson','qzyypzywn3AiozAXZGMwIyW2',''),(1931921182,'tom','Tom','Anderson','qT9gqT9gnKAhqJ1vMKVkVD==',''),(2087455101,'kbblake','Katheryn','Blake','n2WvoTSeMHkDnHIhnKOW','');
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

-- Dump completed on 2015-03-21  0:59:43
