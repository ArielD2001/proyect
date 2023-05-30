-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `documento` int(15) NOT NULL,
  `id_lista` int(10) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lista` (`id_lista`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
INSERT INTO `estudiantes` VALUES (1,'Ariel caraballo Diaz',1001903388,1,'04/05/23'),(2,'Jesus valencia Torres',1234456780,1,'04/05/23'),(3,'Alvaro rodriguez velez',2147483647,1,'04/05/23'),(4,'María Beltran osorio',2147483647,1,'04/05/23'),(5,'Luka modric cr7',1234918741,1,'04/05/23'),(6,'Anuel  ortega doblea',1876324519,1,'04/05/23'),(7,'Diomedes gaviria Diaz',2147483647,1,'04/05/23'),(8,'Benito Camelo contreras',2147483647,1,'04/05/23'),(9,'alma marcela gosho',1234567890,1,'04/05/23'),(10,'Ariel caraballo Diaz',1001903388,2,'04/05/23'),(12,'Alvaro rodriguez velez',2147483647,2,'04/05/23'),(13,'María Beltran osorio',2147483647,2,'04/05/23'),(14,'Luka modric cr7',1234918741,2,'04/05/23'),(15,'Anuel  ortega doblea',1876324519,2,'04/05/23'),(16,'Diomedes gaviria Diaz',2147483647,2,'04/05/23'),(17,'Benito Camelo contreras',2147483647,2,'04/05/23'),(18,'alma marcela gosho',1234567890,2,'04/05/23'),(19,'julian colo colo',100192278,2,'23/05/04'),(20,'Ariel caraballo Diaz',1001903388,3,'06/05/23'),(21,'Jesus valencia Torres',1234456780,3,'06/05/23'),(22,'Alvaro rodriguez velez',2147483647,3,'06/05/23'),(23,'María Beltran osorio',2147483647,3,'06/05/23'),(24,'Luka modric cr7',1234918741,3,'06/05/23'),(25,'Anuel  ortega doblea',1876324519,3,'06/05/23'),(26,'Diomedes gaviria Diaz',2147483647,3,'06/05/23'),(27,'Benito Camelo contreras',2147483647,3,'06/05/23'),(28,'alma marcela gosho',1234567890,3,'06/05/23');
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listas`
--

DROP TABLE IF EXISTS `listas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `semestre` varchar(15) NOT NULL,
  `fecha` varchar(60) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_periodo` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listas`
--

LOCK TABLES `listas` WRITE;
/*!40000 ALTER TABLE `listas` DISABLE KEYS */;
INSERT INTO `listas` VALUES (1,1,'Lista ejemplo','VIII (Octavo)','04/05/23',1,1),(2,2,'ejemplo con rotaciones','VII (Septimo)','04/05/23',1,2),(3,1,'Lista ejemplo','II (Segundo)','06/05/23',5,1);
/*!40000 ALTER TABLE `listas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo_nota`
--

DROP TABLE IF EXISTS `modulo_nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo_nota` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(10) NOT NULL,
  `nota` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estudiante` (`id_estudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo_nota`
--

LOCK TABLES `modulo_nota` WRITE;
/*!40000 ALTER TABLE `modulo_nota` DISABLE KEYS */;
INSERT INTO `modulo_nota` VALUES (1,9,0.735476),(2,18,0.711871);
/*!40000 ALTER TABLE `modulo_nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `rotaciones` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'Promoción y prevención',1),(2,'Actividades basicas',2),(3,'Cuidado medico',2),(4,'Cuidado materno infantil',3),(5,'Practicas administracion',2),(6,'Adulto mayor',2),(7,'Practica integral',3),(8,'Fundamentos socioeducativo IV',1),(9,'Fundamentos socioeducativo V',1);
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodos`
--

DROP TABLE IF EXISTS `periodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos`
--

LOCK TABLES `periodos` WRITE;
/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
INSERT INTO `periodos` VALUES (1,'S1-2023','activo'),(2,'S2-2023','activo');
/*!40000 ALTER TABLE `periodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntasm1`
--

DROP TABLE IF EXISTS `preguntasm1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntasm1` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(10) NOT NULL,
  `suma1` float NOT NULL,
  `p1m1` float NOT NULL,
  `p2m1` float NOT NULL,
  `p3m1` float NOT NULL,
  `p4m1` float NOT NULL,
  `p5m1` float NOT NULL,
  `p6m1` float NOT NULL,
  `p7m1` float NOT NULL,
  `p8m1` float NOT NULL,
  `total1` float NOT NULL,
  `recomendaciones1` varchar(255) NOT NULL,
  `p9m1` float NOT NULL,
  `p10m1` float NOT NULL,
  `p11m1` float NOT NULL,
  `p12m1` float NOT NULL,
  `p13m1` float NOT NULL,
  `p14m1` float NOT NULL,
  `p15m1` float NOT NULL,
  `p16m1` float NOT NULL,
  `p17m1` float NOT NULL,
  `p18m1` float NOT NULL,
  `total2` float NOT NULL,
  `recomendaciones2` varchar(255) NOT NULL,
  `subtotal1` float NOT NULL,
  `p19m1` float NOT NULL,
  `p20m1` float NOT NULL,
  `p21m1` float NOT NULL,
  `p22m1` float NOT NULL,
  `suma2` float NOT NULL,
  `p23m1` float NOT NULL,
  `p24m1` float NOT NULL,
  `p25m1` float NOT NULL,
  `p26m1` float NOT NULL,
  `p27m1` float NOT NULL,
  `p28m1` float NOT NULL,
  `p29m1` float NOT NULL,
  `total3` float NOT NULL,
  `recomendaciones3` varchar(255) NOT NULL,
  `p30m1` float NOT NULL,
  `p31m1` int(10) NOT NULL,
  `suma3` float NOT NULL,
  `p32m1` float NOT NULL,
  `p33m1` float NOT NULL,
  `p34m1` float NOT NULL,
  `p35m1` float NOT NULL,
  `p36m1` float NOT NULL,
  `p37m1` float NOT NULL,
  `p38m1` float NOT NULL,
  `p39m1` float NOT NULL,
  `p40m1` float NOT NULL,
  `p41m1` float NOT NULL,
  `p42m1` float NOT NULL,
  `p43m1` float NOT NULL,
  `p44m1` float NOT NULL,
  `p45m1` float NOT NULL,
  `total4` float NOT NULL,
  `recomendaciones4` varchar(255) NOT NULL,
  `subtotal2` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasm1`
--

LOCK TABLES `preguntasm1` WRITE;
/*!40000 ALTER TABLE `preguntasm1` DISABLE KEYS */;
INSERT INTO `preguntasm1` VALUES (1,9,3.25,5,5,3,0,0,0,0,0,0.065,'',0,3,0,3,0,0,3,0,3,0,0.12,'',0.185,3,0,3,0,0,0,0,0,3,0,0,3,0.533333,'',0,0,0.428571,0,0,3,0,0,0,0,0,0,0,0,0,0,0,0.0171429,'',0.550476);
/*!40000 ALTER TABLE `preguntasm1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntasm2`
--

DROP TABLE IF EXISTS `preguntasm2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntasm2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(10) NOT NULL,
  `suma1` float NOT NULL,
  `p1m2` float NOT NULL,
  `p2m2` float NOT NULL,
  `p3m2` float NOT NULL,
  `p4m2` float NOT NULL,
  `p5m2` float NOT NULL,
  `p6m2` float NOT NULL,
  `p7m2` float NOT NULL,
  `p8m2` float NOT NULL,
  `total1` float NOT NULL,
  `recomendaciones1` varchar(255) NOT NULL,
  `p9m2` float NOT NULL,
  `p10m2` float NOT NULL,
  `p11m2` float NOT NULL,
  `p12m2` float NOT NULL,
  `p13m2` float NOT NULL,
  `p14m2` float NOT NULL,
  `p15m2` float NOT NULL,
  `p16m2` int(10) NOT NULL,
  `p17m2` float NOT NULL,
  `p18m2` float NOT NULL,
  `total2` float NOT NULL,
  `recomendaciones2` varchar(255) NOT NULL,
  `subtotal1` float NOT NULL,
  `p19m2` float NOT NULL,
  `p20m2` float NOT NULL,
  `p21m2` float NOT NULL,
  `p22m2` float NOT NULL,
  `p23m2` float NOT NULL,
  `p24m2` float NOT NULL,
  `p25m2` float NOT NULL,
  `p26m2` float NOT NULL,
  `p27m2` float NOT NULL,
  `total3` float NOT NULL,
  `recomendaciones3` varchar(255) NOT NULL,
  `p28m2` float NOT NULL,
  `p29m2` float NOT NULL,
  `p30m2` float NOT NULL,
  `p31m2` float NOT NULL,
  `suma2` float NOT NULL,
  `p32m2` float NOT NULL,
  `p33m2` float NOT NULL,
  `p34m2` float NOT NULL,
  `p35m2` float NOT NULL,
  `p36m2` float NOT NULL,
  `p37m2` float NOT NULL,
  `p38m2` float NOT NULL,
  `p39m2` float NOT NULL,
  `p40m2` float NOT NULL,
  `p41m2` float NOT NULL,
  `suma3` float NOT NULL,
  `p42m2` float NOT NULL,
  `p43m2` float NOT NULL,
  `p44m2` float NOT NULL,
  `p45m2` float NOT NULL,
  `p46m2` float NOT NULL,
  `p47m2` float NOT NULL,
  `p48m2` float NOT NULL,
  `p49m2` float NOT NULL,
  `p50m2` float NOT NULL,
  `p51m2` float NOT NULL,
  `p52m2` float NOT NULL,
  `p53m2` float NOT NULL,
  `p54m2` float NOT NULL,
  `p55m2` float NOT NULL,
  `total4` float NOT NULL,
  `recomendaciones4` varchar(255) NOT NULL,
  `subtotal2` float NOT NULL,
  `p56m2` float NOT NULL,
  `total5` float NOT NULL,
  `recomendaciones5` varchar(255) NOT NULL,
  `subtotal3` float NOT NULL,
  `p57m2` float NOT NULL,
  `p58m2` float NOT NULL,
  `total6` float NOT NULL,
  `recomendaciones6` varchar(255) NOT NULL,
  `subtotal4` float NOT NULL,
  `rotacion` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasm2`
--

LOCK TABLES `preguntasm2` WRITE;
/*!40000 ALTER TABLE `preguntasm2` DISABLE KEYS */;
INSERT INTO `preguntasm2` VALUES (1,18,1,0,0,4,0,0,0,4,0,0.1,'Sin recomendaciones',4,4,4,0,0,4,0,0,0,0,0.16,'Sin recomendaciones',0.26,0,4,0,4,0,4,4,0,0,0.444444,'Sin recomendaciones',0,0,0,0,1.33333,0,0,0,4,0,4,0,0,0,0,0,0,0,0,0,0,0,4,4,4,4,0,0,0,0,0.319298,'Sin recomendaciones',0.763743,4,0.4,'Sin recomendaciones',0.4,0,0,0,'Sin recomendaciones   ',0,1);
/*!40000 ALTER TABLE `preguntasm2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntasm3`
--

DROP TABLE IF EXISTS `preguntasm3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntasm3` (
  `id` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `suma1` float NOT NULL,
  `p1m3` float NOT NULL,
  `p2m3` float NOT NULL,
  `p3m3` float NOT NULL,
  `p4m3` float NOT NULL,
  `p5m3` float NOT NULL,
  `p6m3` float NOT NULL,
  `p7m3` float NOT NULL,
  `p8m3` float NOT NULL,
  `total1` float NOT NULL,
  `recomendaciones1` varchar(255) NOT NULL,
  `p9m3` float NOT NULL,
  `p10m3` float NOT NULL,
  `p11m3` float NOT NULL,
  `p12m3` float NOT NULL,
  `p13m3` float NOT NULL,
  `p14m3` float NOT NULL,
  `p15m3` float NOT NULL,
  `p16m3` float NOT NULL,
  `p17m3` float NOT NULL,
  `p18m3` float NOT NULL,
  `total2` float NOT NULL,
  `recomendaciones2` varchar(255) NOT NULL,
  `subtotal1` float NOT NULL,
  `p19m3` float NOT NULL,
  `p20m3` float NOT NULL,
  `p21m3` float NOT NULL,
  `p22m3` float NOT NULL,
  `p24m3` float NOT NULL,
  `p25m3` float NOT NULL,
  `total3` float NOT NULL,
  `recomendaciones3` varchar(255) NOT NULL,
  `p26m3` float NOT NULL,
  `p27m3` float NOT NULL,
  `p28m3` float NOT NULL,
  `p29m3` float NOT NULL,
  `p30m3` float NOT NULL,
  `p31m3` float NOT NULL,
  `p32m3` float NOT NULL,
  `p33m3` float NOT NULL,
  `p34m3` float NOT NULL,
  `p35m3` float NOT NULL,
  `p36m3` float NOT NULL,
  `p37m3` float NOT NULL,
  `p38m3` float NOT NULL,
  `p39m3` float NOT NULL,
  `p40m3` float NOT NULL,
  `p41m3` float NOT NULL,
  `total4` float NOT NULL,
  `recomendaciones4` varchar(255) NOT NULL,
  `subtotal2` float NOT NULL,
  `p42m3` float NOT NULL,
  `total5` float NOT NULL,
  `recomendaciones5` varchar(255) NOT NULL,
  `subtotal3` float NOT NULL,
  `p43m3` float NOT NULL,
  `p44m3` float NOT NULL,
  `total6` float NOT NULL,
  `recomendaciones6` varchar(255) NOT NULL,
  `subtotal4` float NOT NULL,
  `rotacion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasm3`
--

LOCK TABLES `preguntasm3` WRITE;
/*!40000 ALTER TABLE `preguntasm3` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntasm3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntasm4`
--

DROP TABLE IF EXISTS `preguntasm4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntasm4` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(10) NOT NULL,
  `suma1` float NOT NULL,
  `p1m4` float NOT NULL,
  `p2m4` float NOT NULL,
  `p3m4` float NOT NULL,
  `p4m4` float NOT NULL,
  `p5m4` float NOT NULL,
  `p6m4` float NOT NULL,
  `p7m4` float NOT NULL,
  `p8m4` float NOT NULL,
  `total1` float NOT NULL,
  `recomendaciones1` varchar(255) NOT NULL,
  `p9m4` float NOT NULL,
  `p10m4` float NOT NULL,
  `p11m4` float NOT NULL,
  `p12m4` float NOT NULL,
  `p13m4` float NOT NULL,
  `p14m4` float NOT NULL,
  `p15m4` float NOT NULL,
  `p16m4` float NOT NULL,
  `p17m4` float NOT NULL,
  `p18m4` float NOT NULL,
  `total2` float NOT NULL,
  `recomendaciones2` varchar(255) NOT NULL,
  `subtotal1` float NOT NULL,
  `p19m4` float NOT NULL,
  `p20m4` float NOT NULL,
  `p21m4` float NOT NULL,
  `p22m4` float NOT NULL,
  `suma2` float NOT NULL,
  `p23m4` float NOT NULL,
  `p24m4` float NOT NULL,
  `p25m4` float NOT NULL,
  `p26m4` float NOT NULL,
  `p27m4` float NOT NULL,
  `p28m4` float NOT NULL,
  `p29m4` float NOT NULL,
  `total3` float NOT NULL,
  `recomendaciones3` varchar(255) NOT NULL,
  `p30m4` float NOT NULL,
  `p31m4` float NOT NULL,
  `suma3` float NOT NULL,
  `p32m4` float NOT NULL,
  `p33m4` float NOT NULL,
  `p34m4` float NOT NULL,
  `p35m4` float NOT NULL,
  `p36m4` float NOT NULL,
  `p37m4` float NOT NULL,
  `p38m4` float NOT NULL,
  `p39m4` float NOT NULL,
  `p40m4` float NOT NULL,
  `p41m4` float NOT NULL,
  `p42m4` float NOT NULL,
  `p43m4` float NOT NULL,
  `p44m4` float NOT NULL,
  `p45m4` float NOT NULL,
  `total4` float NOT NULL,
  `recomendaciones4` varchar(255) NOT NULL,
  `subtotal2` float NOT NULL,
  `p46m4` float NOT NULL,
  `p47m4` float NOT NULL,
  `p48m4` float NOT NULL,
  `p49m4` float NOT NULL,
  `p50m4` float NOT NULL,
  `p51m4` float NOT NULL,
  `p52m4` float NOT NULL,
  `p53m4` float NOT NULL,
  `p54m4` float NOT NULL,
  `p55m4` float NOT NULL,
  `p56m4` float NOT NULL,
  `p57m4` float NOT NULL,
  `p58m4` float NOT NULL,
  `total5` float NOT NULL,
  `total6` float NOT NULL,
  `subtotal3` float NOT NULL,
  `subtotal4` float NOT NULL,
  `recomendaciones5` varchar(255) NOT NULL,
  `recomendaciones6` varchar(255) NOT NULL,
  `rotacion` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasm4`
--

LOCK TABLES `preguntasm4` WRITE;
/*!40000 ALTER TABLE `preguntasm4` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntasm4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntasm5`
--

DROP TABLE IF EXISTS `preguntasm5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntasm5` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(10) NOT NULL,
  `suma1` float NOT NULL,
  `p1m5` float NOT NULL,
  `p2m5` float NOT NULL,
  `p3m5` float NOT NULL,
  `p4m5` float NOT NULL,
  `p5m5` float NOT NULL,
  `p6m5` float NOT NULL,
  `p7m5` float NOT NULL,
  `p8m5` float NOT NULL,
  `total1` float NOT NULL,
  `recomendaciones1` varchar(255) NOT NULL,
  `p9m5` float NOT NULL,
  `p10m5` float NOT NULL,
  `p11m5` float NOT NULL,
  `p12m5` float NOT NULL,
  `p13m5` float NOT NULL,
  `p14m5` float NOT NULL,
  `p15m5` float NOT NULL,
  `p16m5` float NOT NULL,
  `p17m5` float NOT NULL,
  `p18m5` float NOT NULL,
  `total2` float NOT NULL,
  `recomendaciones2` varchar(255) NOT NULL,
  `subtotal1` float NOT NULL,
  `p19m5` float NOT NULL,
  `p20m5` float NOT NULL,
  `p21m5` float NOT NULL,
  `p22m5` float NOT NULL,
  `p23m5` float NOT NULL,
  `p24m5` float NOT NULL,
  `p25m5` float NOT NULL,
  `p26m5` float NOT NULL,
  `p27m5` float NOT NULL,
  `p28m5` float NOT NULL,
  `p29m5` float NOT NULL,
  `total3` float NOT NULL,
  `recomendaciones3` varchar(255) NOT NULL,
  `p30m5` float NOT NULL,
  `p31m5` int(10) NOT NULL,
  `p32m5` float NOT NULL,
  `p33m5` float NOT NULL,
  `p34m5` float NOT NULL,
  `p35m5` float NOT NULL,
  `p36m5` float NOT NULL,
  `p37m5` float NOT NULL,
  `p38m5` float NOT NULL,
  `p39m5` float NOT NULL,
  `p40m5` float NOT NULL,
  `p41m5` float NOT NULL,
  `p42m5` float NOT NULL,
  `p43m5` float NOT NULL,
  `p44m5` float NOT NULL,
  `p45m5` float NOT NULL,
  `total4` float NOT NULL,
  `recomendaciones4` varchar(255) NOT NULL,
  `subtotal2` float NOT NULL,
  `p46m5` float NOT NULL,
  `p47m5` float NOT NULL,
  `p48m5` float NOT NULL,
  `p49m5` float NOT NULL,
  `p50m5` float NOT NULL,
  `p51m5` float NOT NULL,
  `p52m5` float NOT NULL,
  `p53m5` float NOT NULL,
  `p54m5` float NOT NULL,
  `p55m5` float NOT NULL,
  `p56m5` float NOT NULL,
  `p57m5` float NOT NULL,
  `p58m5` float NOT NULL,
  `p59m5` float NOT NULL,
  `p60m5` float NOT NULL,
  `p61m5` float NOT NULL,
  `p62m5` float NOT NULL,
  `p63m5` float NOT NULL,
  `total5` float NOT NULL,
  `total6` float NOT NULL,
  `subtotal3` float NOT NULL,
  `subtotal4` float NOT NULL,
  `recomendaciones5` varchar(255) NOT NULL,
  `recomendaciones6` varchar(255) NOT NULL,
  `rotacion` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasm5`
--

LOCK TABLES `preguntasm5` WRITE;
/*!40000 ALTER TABLE `preguntasm5` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntasm5` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntasm6`
--

DROP TABLE IF EXISTS `preguntasm6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntasm6` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(10) NOT NULL,
  `suma1` float NOT NULL,
  `p1m6` float NOT NULL,
  `p2m6` float NOT NULL,
  `p3m6` float NOT NULL,
  `p4m6` float NOT NULL,
  `p5m6` float NOT NULL,
  `p6m6` float NOT NULL,
  `p7m6` float NOT NULL,
  `p8m6` float NOT NULL,
  `total1` float NOT NULL,
  `recomendaciones1` varchar(255) NOT NULL,
  `p9m6` float NOT NULL,
  `p10m6` float NOT NULL,
  `p11m6` float NOT NULL,
  `p12m6` float NOT NULL,
  `p13m6` float NOT NULL,
  `p14m6` float NOT NULL,
  `p15m6` float NOT NULL,
  `p16m6` float NOT NULL,
  `p17m6` float NOT NULL,
  `p18m6` float NOT NULL,
  `total2` float NOT NULL,
  `recomendaciones2` varchar(255) NOT NULL,
  `subtotal1` float NOT NULL,
  `p19m6` float NOT NULL,
  `p20m6` float NOT NULL,
  `p21m6` float NOT NULL,
  `p22m6` float NOT NULL,
  `p23m6` float NOT NULL,
  `p24m6` float NOT NULL,
  `p25m6` float NOT NULL,
  `p26m6` float NOT NULL,
  `p27m6` float NOT NULL,
  `p28m6` float NOT NULL,
  `p29m6` float NOT NULL,
  `total3` float NOT NULL,
  `recomendaciones3` varchar(255) NOT NULL,
  `p30m6` float NOT NULL,
  `p31m6` int(10) NOT NULL,
  `p32m6` float NOT NULL,
  `p33m6` float NOT NULL,
  `p34m6` float NOT NULL,
  `p35m6` float NOT NULL,
  `p36m6` float NOT NULL,
  `p37m6` float NOT NULL,
  `p38m6` float NOT NULL,
  `p39m6` float NOT NULL,
  `p40m6` float NOT NULL,
  `p41m6` float NOT NULL,
  `p42m6` float NOT NULL,
  `p43m6` float NOT NULL,
  `p44m6` float NOT NULL,
  `p45m6` float NOT NULL,
  `total4` float NOT NULL,
  `recomendaciones4` varchar(255) NOT NULL,
  `subtotal2` float NOT NULL,
  `p46m6` float NOT NULL,
  `p47m6` float NOT NULL,
  `p48m6` float NOT NULL,
  `p49m6` float NOT NULL,
  `p50m6` float NOT NULL,
  `p51m6` float NOT NULL,
  `p52m6` float NOT NULL,
  `p53m6` float NOT NULL,
  `p54m6` float NOT NULL,
  `p55m6` float NOT NULL,
  `p56m6` float NOT NULL,
  `p57m6` float NOT NULL,
  `p58m6` float NOT NULL,
  `p59m6` float NOT NULL,
  `p60m6` float NOT NULL,
  `p61m6` float NOT NULL,
  `p62m6` float NOT NULL,
  `p63m6` float NOT NULL,
  `p64m6` float NOT NULL,
  `total5` float NOT NULL,
  `total6` float NOT NULL,
  `subtotal3` float NOT NULL,
  `subtotal4` float NOT NULL,
  `recomendaciones5` varchar(255) NOT NULL,
  `recomendaciones6` varchar(255) NOT NULL,
  `rotacion` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasm6`
--

LOCK TABLES `preguntasm6` WRITE;
/*!40000 ALTER TABLE `preguntasm6` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntasm6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntasm7`
--

DROP TABLE IF EXISTS `preguntasm7`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntasm7` (
  `id` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `suma1` float NOT NULL,
  `p1m7` float NOT NULL,
  `p2m7` float NOT NULL,
  `p3m7` float NOT NULL,
  `p4m7` float NOT NULL,
  `p5m7` float NOT NULL,
  `p6m7` float NOT NULL,
  `p7m7` float NOT NULL,
  `p8m7` float NOT NULL,
  `total1` float NOT NULL,
  `recomendaciones1` varchar(255) NOT NULL,
  `p9m7` float NOT NULL,
  `p10m7` float NOT NULL,
  `p11m7` float NOT NULL,
  `p12m7` float NOT NULL,
  `p13m7` float NOT NULL,
  `p14m7` float NOT NULL,
  `p15m7` float NOT NULL,
  `p16m7` float NOT NULL,
  `p17m7` float NOT NULL,
  `p18m7` float NOT NULL,
  `total2` float NOT NULL,
  `recomendaciones2` varchar(255) NOT NULL,
  `subtotal1` float NOT NULL,
  `p19m7` float NOT NULL,
  `p20m7` float NOT NULL,
  `p21m7` float NOT NULL,
  `p22m7` float NOT NULL,
  `p24m7` float NOT NULL,
  `p25m7` float NOT NULL,
  `p26m7` float NOT NULL,
  `p27m7` float NOT NULL,
  `p28m7` float NOT NULL,
  `p29m7` float NOT NULL,
  `p30m7` float NOT NULL,
  `p31m7` float NOT NULL,
  `p32m7` float NOT NULL,
  `total3` float NOT NULL,
  `recomendaciones3` varchar(255) NOT NULL,
  `p33m7` float NOT NULL,
  `p34m7` float NOT NULL,
  `p35m7` float NOT NULL,
  `p36m7` float NOT NULL,
  `p37m7` float NOT NULL,
  `p38m7` float NOT NULL,
  `p39m7` float NOT NULL,
  `p40m7` float NOT NULL,
  `p41m7` float NOT NULL,
  `p42m7` float NOT NULL,
  `p43m7` float NOT NULL,
  `p44m7` float NOT NULL,
  `p45m7` float NOT NULL,
  `p46m7` float NOT NULL,
  `p47m7` float NOT NULL,
  `p48m7` float NOT NULL,
  `p49m7` float NOT NULL,
  `p50m7` float NOT NULL,
  `p51m7` float NOT NULL,
  `p52m7` float NOT NULL,
  `p53m7` float NOT NULL,
  `p54m7` float NOT NULL,
  `p55m7` float NOT NULL,
  `p56m7` float NOT NULL,
  `total4` float NOT NULL,
  `recomendaciones4` varchar(255) NOT NULL,
  `subtotal2` float NOT NULL,
  `p57m7` float NOT NULL,
  `recomendaciones5` varchar(255) NOT NULL,
  `subtotal3` float NOT NULL,
  `p58m7` float NOT NULL,
  `p59m7` float NOT NULL,
  `p60m7` float NOT NULL,
  `recomendaciones6` varchar(255) NOT NULL,
  `subtotal4` float NOT NULL,
  `rotacion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasm7`
--

LOCK TABLES `preguntasm7` WRITE;
/*!40000 ALTER TABLE `preguntasm7` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntasm7` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntasm8`
--

DROP TABLE IF EXISTS `preguntasm8`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntasm8` (
  `id` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `suma1` float NOT NULL,
  `p1m3` float NOT NULL,
  `p2m3` float NOT NULL,
  `p3m3` float NOT NULL,
  `p4m3` float NOT NULL,
  `p5m3` float NOT NULL,
  `p6m3` float NOT NULL,
  `p7m3` float NOT NULL,
  `p8m3` float NOT NULL,
  `total1` float NOT NULL,
  `recomendaciones1` varchar(255) NOT NULL,
  `p9m3` float NOT NULL,
  `p10m3` float NOT NULL,
  `p11m3` float NOT NULL,
  `p12m3` float NOT NULL,
  `p13m3` float NOT NULL,
  `p14m3` float NOT NULL,
  `p15m3` float NOT NULL,
  `p16m3` float NOT NULL,
  `p17m3` float NOT NULL,
  `p18m3` float NOT NULL,
  `total2` float NOT NULL,
  `recomendaciones2` varchar(255) NOT NULL,
  `subtotal1` float NOT NULL,
  `p19m3` float NOT NULL,
  `p20m3` float NOT NULL,
  `p21m3` float NOT NULL,
  `p22m3` float NOT NULL,
  `total3` float NOT NULL,
  `recomendaciones3` varchar(255) NOT NULL,
  `p24m3` float NOT NULL,
  `p25m3` float NOT NULL,
  `p26m3` float NOT NULL,
  `p27m3` float NOT NULL,
  `p28m3` float NOT NULL,
  `p29m3` float NOT NULL,
  `p30m3` float NOT NULL,
  `total4` float NOT NULL,
  `recomendaciones4` varchar(255) NOT NULL,
  `subtotal2` float NOT NULL,
  `p31m3` float NOT NULL,
  `recomendaciones5` varchar(255) NOT NULL,
  `subtotal3` float NOT NULL,
  `p32m3` float NOT NULL,
  `recomendaciones6` varchar(255) NOT NULL,
  `subtotal4` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasm8`
--

LOCK TABLES `preguntasm8` WRITE;
/*!40000 ALTER TABLE `preguntasm8` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntasm8` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntasm9`
--

DROP TABLE IF EXISTS `preguntasm9`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntasm9` (
  `id` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `suma1` float NOT NULL,
  `p1m3` float NOT NULL,
  `p2m3` float NOT NULL,
  `p3m3` float NOT NULL,
  `p4m3` float NOT NULL,
  `p5m3` float NOT NULL,
  `p6m3` float NOT NULL,
  `p7m3` float NOT NULL,
  `p8m3` float NOT NULL,
  `total1` float NOT NULL,
  `recomendaciones1` varchar(255) NOT NULL,
  `p9m3` float NOT NULL,
  `p10m3` float NOT NULL,
  `p11m3` float NOT NULL,
  `p12m3` float NOT NULL,
  `p13m3` float NOT NULL,
  `p14m3` float NOT NULL,
  `p15m3` float NOT NULL,
  `p16m3` float NOT NULL,
  `p17m3` float NOT NULL,
  `p18m3` float NOT NULL,
  `total2` float NOT NULL,
  `recomendaciones2` varchar(255) NOT NULL,
  `subtotal1` float NOT NULL,
  `p19m3` float NOT NULL,
  `p20m3` float NOT NULL,
  `p21m3` float NOT NULL,
  `total3` float NOT NULL,
  `recomendaciones3` varchar(255) NOT NULL,
  `p22m3` float NOT NULL,
  `p24m3` float NOT NULL,
  `p25m3` float NOT NULL,
  `p26m3` float NOT NULL,
  `p27m3` float NOT NULL,
  `p28m3` float NOT NULL,
  `p29m3` float NOT NULL,
  `total4` float NOT NULL,
  `recomendaciones4` varchar(255) NOT NULL,
  `subtotal2` float NOT NULL,
  `p30m3` float NOT NULL,
  `recomendaciones5` varchar(255) NOT NULL,
  `subtotal3` float NOT NULL,
  `p31m3` float NOT NULL,
  `recomendaciones6` varchar(255) NOT NULL,
  `subtotal4` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasm9`
--

LOCK TABLES `preguntasm9` WRITE;
/*!40000 ALTER TABLE `preguntasm9` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntasm9` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rotacion`
--

DROP TABLE IF EXISTS `rotacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rotacion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(10) NOT NULL,
  `rotacion` int(5) NOT NULL,
  `nota` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rotacion`
--

LOCK TABLES `rotacion` WRITE;
/*!40000 ALTER TABLE `rotacion` DISABLE KEYS */;
INSERT INTO `rotacion` VALUES (1,18,1,1.42374);
/*!40000 ALTER TABLE `rotacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `ultima_sesion` varchar(69) NOT NULL,
  `documento` int(15) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `rol` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'ariel antonio','caraballo diaz','acaraballod21@curnvirtual.edu.co','ArielD19','04/05/23',0,'04/05/23','activo','PROFESOR'),(2,'Ariel','Caraballo','ariel@admin.com','123456','',1001903378,'','activo','ADMIN'),(3,'RIEL','CARABALLO','ariel@gmail.com','123456','06/05/2023',1001903378,'06/05/2023','activo','ADMIN'),(4,'RIEL','CARABALLO','ariel@gmail.comm','123456','06/05/2023',1213,'06/05/2023','inactivo','ADMIN'),(5,'Ariel','Caraballo Diaz','ariel123@gmail.com','123456','06/05/2023',1234567890,'06/05/2023','inactivo','PROFESOR');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-29 12:26:46
