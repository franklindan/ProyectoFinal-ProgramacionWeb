-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pukllayweb
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8;
CREATE TABLE `administrador` (
  `dniAdministrador` char(8) NOT NULL,
  `nombreAdmi` varchar(18) DEFAULT NULL,
  `apelAdmi` varchar(18) DEFAULT NULL,
  `celuAdmi` varchar(14) DEFAULT NULL,
  `coreAdmi` varchar(30) DEFAULT NULL,
  `direAdmi` varchar(30) DEFAULT NULL,
  `usuario_idPukllay` char(8) NOT NULL,
  `usuario_usuarioUsuario` varchar(18) NOT NULL,
  PRIMARY KEY (`dniAdministrador`),
  KEY `fk_administrador_usuario1_idx` (`usuario_idPukllay`,`usuario_usuarioUsuario`),
  CONSTRAINT `fk_administrador_usuario1` FOREIGN KEY (`usuario_idPukllay`, `usuario_usuarioUsuario`) REFERENCES `usuario` (`idPukllay`, `usuarioUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES ('72680370','Daniel',NULL,NULL,NULL,NULL,'2021','72680370');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auspiciador`
--

DROP TABLE IF EXISTS `auspiciador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `auspiciador` (
  `idAuspiciador` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAuspiciador` varchar(18) DEFAULT NULL,
  `rucAuspiciador` varchar(25) DEFAULT NULL,
  `telefonoAuspiciador` varchar(14) DEFAULT NULL,
  `descripcionAuspiciador` varchar(50) DEFAULT NULL,
  `correoAuspiciador` varchar(30) DEFAULT NULL,
  `montoAuspiciador` float DEFAULT NULL,
  `pukllay_idPukllay` char(8) NOT NULL,
  PRIMARY KEY (`idAuspiciador`),
  KEY `fk_auspiciador_pukllay1_idx` (`pukllay_idPukllay`),
  CONSTRAINT `fk_auspiciador_pukllay1` FOREIGN KEY (`pukllay_idPukllay`) REFERENCES `pukllay` (`idPukllay`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auspiciador`
--

LOCK TABLES `auspiciador` WRITE;
/*!40000 ALTER TABLE `auspiciador` DISABLE KEYS */;
INSERT INTO `auspiciador` VALUES (1,'Claro','554596','55959','asd','claro@asf',1000,'2021'),(2,'Movistar','15494','64848','aaa','Movistar@asf',5000,'2021'),(3,'VirusNet','6994496','54494','asda','sasd@ad',1000,'2021');
/*!40000 ALTER TABLE `auspiciador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `calificacion` (
  `dniJurado` char(8) NOT NULL,
  `puntajeCalificacion` int(11) DEFAULT NULL,
  `descripcionCalificacion` varchar(50) DEFAULT NULL,
  `lugarCalificacion` varchar(18) NOT NULL,
  `etapa_idPukllay` char(8) NOT NULL,
  `etapa_fechaDia` datetime(3) NOT NULL,
  `comparsa_idComparsa` int(11) NOT NULL,
  PRIMARY KEY (`dniJurado`,`lugarCalificacion`,`comparsa_idComparsa`),
  KEY `R_43` (`dniJurado`),
  KEY `fk_calificacion_etapa1_idx` (`etapa_idPukllay`,`etapa_fechaDia`),
  KEY `fk_calificacion_comparsa1_idx` (`comparsa_idComparsa`),
  CONSTRAINT `R_43` FOREIGN KEY (`dniJurado`) REFERENCES `jurado` (`dniJurado`),
  CONSTRAINT `fk_calificacion_comparsa1` FOREIGN KEY (`comparsa_idComparsa`) REFERENCES `comparsa` (`idComparsa`),
  CONSTRAINT `fk_calificacion_etapa1` FOREIGN KEY (`etapa_idPukllay`, `etapa_fechaDia`) REFERENCES `etapa` (`idPukllay`, `fechaDia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion`
--

LOCK TABLES `calificacion` WRITE;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
INSERT INTO `calificacion` VALUES ('90',10,'bien','Estadio','2021','2022-01-31 00:00:00.000',1),('90',9,'bien','Estadio','2021','2022-01-31 00:00:00.000',2),('90',10,'bien','Estadio','2021','2022-01-31 00:00:00.000',3),('90',10,'Bueno','Lampa de oro','2021','2021-01-29 00:00:00.000',1),('90',5,'Bueno','Lampa de oro','2021','2021-01-29 00:00:00.000',2),('90',4,'bien','Lampa de oro','2021','2021-01-29 00:00:00.000',3),('90',1,'bien','Plaza','2021','2022-01-30 00:00:00.000',1),('90',4,'bien','Plaza','2021','2022-01-30 00:00:00.000',3),('90',9,'bien','Plza','2021','2022-01-30 00:00:00.000',2),('91',7,'bien','Estadio','2021','2022-01-31 00:00:00.000',1),('91',7,'bien','Estadio','2021','2022-01-31 00:00:00.000',2),('91',7,'bien','Estadio','2021','2022-01-31 00:00:00.000',3),('91',4,'bien','Lampa de oro','2021','2021-01-29 00:00:00.000',1),('91',4,'bien','Lampa de oro','2021','2021-01-29 00:00:00.000',2),('91',6,'sad','Lampa de oro','2021','2021-01-29 00:00:00.000',3),('91',10,'bien','Plaza','2021','2022-01-30 00:00:00.000',1),('91',9,'bien','Plaza','2021','2022-01-30 00:00:00.000',2),('91',1,'bien','Plaza','2021','2022-01-30 00:00:00.000',3);
/*!40000 ALTER TABLE `calificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comparsa`
--

DROP TABLE IF EXISTS `comparsa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `comparsa` (
  `idComparsa` int(11) NOT NULL AUTO_INCREMENT,
  `nombreComp` varchar(80) DEFAULT NULL,
  `Procedencia` varchar(30) DEFAULT NULL,
  `Categoria` varchar(30) DEFAULT NULL,
  `CantidadPart` int(11) DEFAULT NULL,
  `Financiamiento` char(18) DEFAULT NULL,
  `delegado_dniDele` char(8) NOT NULL,
  PRIMARY KEY (`idComparsa`),
  KEY `fk_comparsa_delegado1_idx` (`delegado_dniDele`),
  CONSTRAINT `fk_comparsa_delegado1` FOREIGN KEY (`delegado_dniDele`) REFERENCES `delegado` (`dniDele`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comparsa`
--

LOCK TABLES `comparsa` WRITE;
/*!40000 ALTER TABLE `comparsa` DISABLE KEYS */;
INSERT INTO `comparsa` VALUES (1,'Los galanes de sajichu papi','a','a',10,'','72680378'),(2,'Los fiesteros','a','a',10,'','123456'),(3,'Agrupación quintoncio','a','a',10,'',''),(4,'Comparsa','Andahuaylas','Provincial',20,NULL,'72680375'),(5,'a','a','a',3,NULL,'321'),(6,'a','a','a',5,NULL,'7894567'),(7,'darttf','Andahuaylas','asda',20,NULL,'9638523'),(8,'Yui metaru des','Japan','Internacional',8,NULL,'72680314'),(9,'asdafffff','ffff','ffff',5,NULL,'72680315');
/*!40000 ALTER TABLE `comparsa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delegado`
--

DROP TABLE IF EXISTS `delegado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `delegado` (
  `dniDele` char(8) NOT NULL,
  `nombDele` varchar(18) DEFAULT NULL,
  `apelDele` varchar(18) DEFAULT NULL,
  `celuDele` varchar(14) DEFAULT NULL,
  `coreDele` varchar(30) DEFAULT NULL,
  `usuario_idPukllay` char(8) NOT NULL,
  `usuario_usuarioUsuario` varchar(18) NOT NULL,
  PRIMARY KEY (`dniDele`),
  KEY `fk_delegado_usuario1_idx` (`usuario_idPukllay`,`usuario_usuarioUsuario`),
  CONSTRAINT `fk_delegado_usuario1` FOREIGN KEY (`usuario_idPukllay`, `usuario_usuarioUsuario`) REFERENCES `usuario` (`idPukllay`, `usuarioUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delegado`
--

LOCK TABLES `delegado` WRITE;
/*!40000 ALTER TABLE `delegado` DISABLE KEYS */;
INSERT INTO `delegado` VALUES ('','','','','','2021',''),('123456','a','a',NULL,'a','2021','123456'),('321','a','a',NULL,'a','2021','321'),('72680314','Yui','Escalante',NULL,'yui@sass','2021','72680314'),('72680315','a','a',NULL,'aasfaw','2021','72680315'),('72680375','Franklin','Daniel',NULL,'danielcco.12@gmail.com','2021','72680375'),('72680378','a','a','a','a','2021','72680378'),('7894567','a','a',NULL,'a','2021','7894567'),('9638523','fran','carb',NULL,'dan@sass','2021','9638523');
/*!40000 ALTER TABLE `delegado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etapa`
--

DROP TABLE IF EXISTS `etapa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8;
CREATE TABLE `etapa` (
  `fechaDia` datetime(3) NOT NULL,
  `idPukllay` char(8) NOT NULL,
  `descripcionDia` varchar(50) DEFAULT NULL,
  `nombreDia` varchar(25) DEFAULT NULL,
  `lugarDia` varchar(25) DEFAULT NULL,
  `horaIniDia` datetime(3) DEFAULT NULL,
  `horaFinDia` datetime(3) DEFAULT NULL,
  PRIMARY KEY (`idPukllay`,`fechaDia`),
  CONSTRAINT `R_3` FOREIGN KEY (`idPukllay`) REFERENCES `pukllay` (`idPukllay`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etapa`
--

LOCK TABLES `etapa` WRITE;
/*!40000 ALTER TABLE `etapa` DISABLE KEYS */;
INSERT INTO `etapa` VALUES ('2021-01-29 00:00:00.000','2021','a','Atipanacuy','andahuaylas','2021-01-30 00:00:00.000','2021-01-31 00:00:00.000'),('2022-01-30 00:00:00.000','2021','Dia 2','Tincus','andahuaylas','2021-01-30 00:00:00.000','2021-01-31 00:00:00.000'),('2022-01-31 00:00:00.000','2021','Dia 2','Gran final','andahuaylas','2021-01-30 00:00:00.000','2021-01-31 00:00:00.000');
/*!40000 ALTER TABLE `etapa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finalindirecto`
--

DROP TABLE IF EXISTS `finalindirecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `finalindirecto` (
  `dniFinal` char(8) NOT NULL,
  `nombreFinal` varchar(18) DEFAULT NULL,
  `apelFinal` varchar(18) DEFAULT NULL,
  `celuFinal` varchar(14) DEFAULT NULL,
  `coreFinal` varchar(30) DEFAULT NULL,
  `direFinal` varchar(30) DEFAULT NULL,
  `usuario_idPukllay` char(8) NOT NULL,
  `usuario_usuarioUsuario` varchar(18) NOT NULL,
  PRIMARY KEY (`dniFinal`),
  KEY `fk_finalindirecto_usuario1_idx` (`usuario_idPukllay`,`usuario_usuarioUsuario`),
  CONSTRAINT `fk_finalindirecto_usuario1` FOREIGN KEY (`usuario_idPukllay`, `usuario_usuarioUsuario`) REFERENCES `usuario` (`idPukllay`, `usuarioUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finalindirecto`
--

LOCK TABLES `finalindirecto` WRITE;
/*!40000 ALTER TABLE `finalindirecto` DISABLE KEYS */;
INSERT INTO `finalindirecto` VALUES ('72680373','Arturo',NULL,NULL,NULL,NULL,'2021','72680373');
/*!40000 ALTER TABLE `finalindirecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gastopukllay`
--

DROP TABLE IF EXISTS `gastopukllay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `gastopukllay` (
  `idGasto` int(11) NOT NULL AUTO_INCREMENT,
  `fechaGasto` datetime(3) DEFAULT NULL,
  `nombreGasto` varchar(25) DEFAULT NULL,
  `cantidadGasto` decimal(15,4) DEFAULT NULL,
  `descripcionGasto` varchar(50) DEFAULT NULL,
  `pukllay_idPukllay` char(8) NOT NULL,
  PRIMARY KEY (`idGasto`),
  KEY `fk_gastopukllay_pukllay1_idx` (`pukllay_idPukllay`),
  CONSTRAINT `fk_gastopukllay_pukllay1` FOREIGN KEY (`pukllay_idPukllay`) REFERENCES `pukllay` (`idPukllay`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gastopukllay`
--

LOCK TABLES `gastopukllay` WRITE;
/*!40000 ALTER TABLE `gastopukllay` DISABLE KEYS */;
INSERT INTO `gastopukllay` VALUES (1,'2021-01-31 00:00:00.000','Mantenimiento',200.0000,'as','2021'),(2,'2021-01-31 00:00:00.000','Adorno',100.0000,'as','2021'),(3,'2021-01-31 00:00:00.000','Mantenimiento calles',2000.0000,'a','2021'),(4,'2021-01-31 00:00:00.000','Estadio',2000.0000,'as','2021'),(5,'2021-01-31 00:00:00.000','Vesturio de trabajadores',500.0000,'as','2021'),(6,'2021-01-31 00:00:00.000','Plaza',2000.0000,'as','2021');
/*!40000 ALTER TABLE `gastopukllay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informe`
--

DROP TABLE IF EXISTS `informe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `informe` (
  `idInfo` char(8) NOT NULL,
  `nombInfo` varchar(30) DEFAULT NULL,
  `tipoInfo` varchar(18) DEFAULT NULL,
  `fechaInfo` datetime(3) DEFAULT NULL,
  `descpInfo` varchar(50) DEFAULT NULL,
  `FinalIndirecto_dniFinal` char(8) NOT NULL,
  `informecol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idInfo`),
  KEY `fk_informe_FinalIndirecto1_idx` (`FinalIndirecto_dniFinal`),
  CONSTRAINT `fk_informe_FinalIndirecto1` FOREIGN KEY (`FinalIndirecto_dniFinal`) REFERENCES `finalindirecto` (`dniFinal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informe`
--

LOCK TABLES `informe` WRITE;
/*!40000 ALTER TABLE `informe` DISABLE KEYS */;
/*!40000 ALTER TABLE `informe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurado`
--

DROP TABLE IF EXISTS `jurado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8;
CREATE TABLE `jurado` (
  `dniJurado` char(8) NOT NULL,
  `nombJurado` varchar(18) DEFAULT NULL,
  `apelJurado` varchar(18) DEFAULT NULL,
  `celuJurado` varchar(14) DEFAULT NULL,
  `coreJurado` varchar(30) DEFAULT NULL,
  `direJurado` varchar(30) DEFAULT NULL,
  `usuario_idPukllay` char(8) NOT NULL,
  `usuario_usuarioUsuario` varchar(18) NOT NULL,
  PRIMARY KEY (`dniJurado`),
  KEY `fk_jurado_usuario1_idx` (`usuario_idPukllay`,`usuario_usuarioUsuario`),
  CONSTRAINT `fk_jurado_usuario1` FOREIGN KEY (`usuario_idPukllay`, `usuario_usuarioUsuario`) REFERENCES `usuario` (`idPukllay`, `usuarioUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurado`
--

LOCK TABLES `jurado` WRITE;
/*!40000 ALTER TABLE `jurado` DISABLE KEYS */;
INSERT INTO `jurado` VALUES ('72680372','Juan',NULL,NULL,NULL,NULL,'2021','72680372'),('90','a','a',NULL,'a',NULL,'2021','90'),('91','b','b',NULL,'b',NULL,'2021','91'),('92','c','c',NULL,'c',NULL,'2021','92');
/*!40000 ALTER TABLE `jurado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operario`
--

DROP TABLE IF EXISTS `operario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `operario` (
  `dniOper` char(8) NOT NULL,
  `nombOper` varchar(18) DEFAULT NULL,
  `apelOper` varchar(18) DEFAULT NULL,
  `celuOper` varchar(14) DEFAULT NULL,
  `coreOper` varchar(30) DEFAULT NULL,
  `direOper` varchar(30) DEFAULT NULL,
  `usuario_idPukllay` char(8) NOT NULL,
  `usuario_usuarioUsuario` varchar(18) NOT NULL,
  PRIMARY KEY (`dniOper`),
  KEY `fk_operario_usuario1_idx` (`usuario_idPukllay`,`usuario_usuarioUsuario`),
  CONSTRAINT `fk_operario_usuario1` FOREIGN KEY (`usuario_idPukllay`, `usuario_usuarioUsuario`) REFERENCES `usuario` (`idPukllay`, `usuarioUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operario`
--

LOCK TABLES `operario` WRITE;
/*!40000 ALTER TABLE `operario` DISABLE KEYS */;
INSERT INTO `operario` VALUES ('72680371','Miguel',NULL,NULL,NULL,NULL,'2021','72680371');
/*!40000 ALTER TABLE `operario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizador`
--

DROP TABLE IF EXISTS `organizador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `organizador` (
  `dniOrg` char(8) NOT NULL,
  `nombreOrg` varchar(18) DEFAULT NULL,
  `ApellidoOrg` varchar(18) DEFAULT NULL,
  `ocupacionorg` varchar(20) DEFAULT NULL,
  `telefonoOrg` varchar(14) DEFAULT NULL,
  `direccionOrg` varchar(30) DEFAULT NULL,
  `correoOrg` varchar(30) DEFAULT NULL,
  `idPukllay` char(8) NOT NULL,
  PRIMARY KEY (`dniOrg`,`idPukllay`),
  KEY `R_2` (`idPukllay`),
  CONSTRAINT `R_2` FOREIGN KEY (`idPukllay`) REFERENCES `pukllay` (`idPukllay`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizador`
--

LOCK TABLES `organizador` WRITE;
/*!40000 ALTER TABLE `organizador` DISABLE KEYS */;
INSERT INTO `organizador` VALUES ('1','Juan','Arevalo','Secretario','9552635',NULL,'ada@asda','2021'),('23','Miguel','sad','Secretario','269594469',NULL,'ada@aseda','2021'),('789','Andrea','Cisneros','Secretario','549459',NULL,'qwe@as','2021');
/*!40000 ALTER TABLE `organizador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participante`
--

DROP TABLE IF EXISTS `participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `participante` (
  `dniPart` char(8) NOT NULL,
  `nombPart` varchar(18) DEFAULT NULL,
  `apelPart` varchar(18) DEFAULT NULL,
  `celuPart` varchar(14) DEFAULT NULL,
  `corePart` varchar(30) DEFAULT NULL,
  `tipoPart` char(18) DEFAULT NULL,
  `comparsa_idComparsa` int(11) NOT NULL,
  PRIMARY KEY (`dniPart`,`comparsa_idComparsa`),
  KEY `fk_participante_comparsa1_idx` (`comparsa_idComparsa`),
  CONSTRAINT `fk_participante_comparsa1` FOREIGN KEY (`comparsa_idComparsa`) REFERENCES `comparsa` (`idComparsa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participante`
--

LOCK TABLES `participante` WRITE;
/*!40000 ALTER TABLE `participante` DISABLE KEYS */;
INSERT INTO `participante` VALUES ('72680376','Wilmer','Carbajal','5996549','ada@aseda',NULL,4),('72680377','Mabel','Palomino','594848','lk@asd',NULL,4),('72680378','Sonia','Silvia','48949596','de@as',NULL,4);
/*!40000 ALTER TABLE `participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premiacion`
--

DROP TABLE IF EXISTS `premiacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8;
CREATE TABLE `premiacion` (
  `puestoPremiacion` int(11) DEFAULT NULL,
  `descripcionPremiacion` varchar(30) DEFAULT NULL,
  `categoriaPremiacion` char(18) DEFAULT NULL,
  `comparsa_idComparsa` int(11) NOT NULL,
  `premio_idPremio` int(11) NOT NULL,
  PRIMARY KEY (`comparsa_idComparsa`,`premio_idPremio`),
  KEY `fk_premiacion_comparsa1_idx` (`comparsa_idComparsa`),
  KEY `fk_premiacion_premio1_idx` (`premio_idPremio`),
  CONSTRAINT `fk_premiacion_comparsa1` FOREIGN KEY (`comparsa_idComparsa`) REFERENCES `comparsa` (`idComparsa`),
  CONSTRAINT `fk_premiacion_premio1` FOREIGN KEY (`premio_idPremio`) REFERENCES `premio` (`idPremio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premiacion`
--

LOCK TABLES `premiacion` WRITE;
/*!40000 ALTER TABLE `premiacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `premiacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premio`
--

DROP TABLE IF EXISTS `premio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `premio` (
  `idPremio` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePremio` varchar(18) DEFAULT NULL,
  `tipoPremio` varchar(18) DEFAULT NULL,
  `puestoPremio` int(11) DEFAULT NULL,
  `descripcionPremio` varchar(50) DEFAULT NULL,
  `pukllay_idPukllay` char(8) NOT NULL,
  PRIMARY KEY (`idPremio`),
  KEY `fk_premio_pukllay1_idx` (`pukllay_idPukllay`),
  CONSTRAINT `fk_premio_pukllay1` FOREIGN KEY (`pukllay_idPukllay`) REFERENCES `pukllay` (`idPukllay`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premio`
--

LOCK TABLES `premio` WRITE;
/*!40000 ALTER TABLE `premio` DISABLE KEYS */;
INSERT INTO `premio` VALUES (1,'Primer puesto','dinero',1,'En honor al primer puesto','2021'),(2,'2','dinero',2,'En honor al 2 puesto','2021'),(3,'3 puesto','dinero',3,'En honor al 3puesto','2021');
/*!40000 ALTER TABLE `premio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pukllay`
--

DROP TABLE IF EXISTS `pukllay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `pukllay` (
  `idPukllay` char(8) NOT NULL,
  `fechaInicioPukllay` datetime(3) DEFAULT NULL,
  `edicionPukllay` varchar(15) DEFAULT NULL,
  `añoPukllay` datetime(3) DEFAULT NULL,
  `fechaFinPukllay` datetime(3) DEFAULT NULL,
  `descripcionPukllay` varchar(50) DEFAULT NULL,
  `inversionPukllay` decimal(15,4) DEFAULT NULL,
  `nombrePukllay` varchar(50) DEFAULT NULL,
  `representantePukllay` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idPukllay`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pukllay`
--

LOCK TABLES `pukllay` WRITE;
/*!40000 ALTER TABLE `pukllay` DISABLE KEYS */;
INSERT INTO `pukllay` VALUES ('2018',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2019',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2021','2021-01-31 00:00:00.000','XX',NULL,'2021-02-28 00:00:00.000','El mejor',1000000.0000,'Pukllay','a');
/*!40000 ALTER TABLE `pukllay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8 ;
CREATE TABLE `usuario` (
  `idPukllay` char(8) NOT NULL,
  `usuarioUsuario` varchar(18) NOT NULL,
  `paswUsuario` varchar(18) DEFAULT NULL,
  `tipoUsuario` varchar(18) DEFAULT NULL,
  `estadoUsuario` varchar(18) DEFAULT NULL,
  `fotoUsuario` longblob,
  PRIMARY KEY (`idPukllay`,`usuarioUsuario`),
  CONSTRAINT `R_11` FOREIGN KEY (`idPukllay`) REFERENCES `pukllay` (`idPukllay`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('2021','','1','delegado','activo',NULL),('2021','123456','1','delegado','activo',NULL),('2021','321','1','delegado','activo',NULL),('2021','72680314','123456','delegado','activo',NULL),('2021','72680315','1','delegado','activo',NULL),('2021','72680370','72680370','administrador','activo',NULL),('2021','72680371','72680371','operario','activo',NULL),('2021','72680372','72680372','jurado','activo',NULL),('2021','72680373','72680373','final indirecto','activo',NULL),('2021','72680375','123456','delegado','activo',NULL),('2021','72680378','72680378','delegado','activo',NULL),('2021','7894567','1','delegado','activo',NULL),('2021','90','90','jurado','activo',NULL),('2021','91','91','jurado','activo',NULL),('2021','92','92','jurado','activo',NULL),('2021','950167644','a','delegado','activo',NULL),('2021','9638523','1','delegado','activo',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pukllayweb'
--

--
-- Dumping routines for database 'pukllayweb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-05 17:49:40
