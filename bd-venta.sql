CREATE DATABASE  IF NOT EXISTS `bdventa` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `bdventa`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdventa
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cajero`
--

DROP TABLE IF EXISTS `cajero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cajero` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `idOficina` tinyint(3) unsigned NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Representante_Oficina` (`idOficina`),
  CONSTRAINT `FK_Representante_Oficina` FOREIGN KEY (`idOficina`) REFERENCES `oficina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cajero`
--
-- ORDER BY:  `id`

LOCK TABLES `cajero` WRITE;
/*!40000 ALTER TABLE `cajero` DISABLE KEYS */;
INSERT INTO `cajero` (`id`, `idOficina`, `nombreUsuario`, `password`, `estado`, `fechaRegistro`, `fechaActualizacion`) VALUES (4,1,'jaime','fde2fdb1dbf604aede0ffee76d26e4ce',1,'2019-11-16 12:56:25','2019-11-16 12:56:25'),(5,1,'jose','662eaa47199461d01a623884080934ab',1,'2019-11-16 12:56:25','2019-11-16 12:56:25'),(6,2,'gabriela','276e697e74e8b5264465139a480db556',1,'2019-11-16 12:56:25','2019-11-16 12:56:25'),(7,2,'paulo','dd41cb18c930753cbecf993f828603dc',1,'2019-11-16 12:56:25','2019-11-16 12:56:25'),(8,3,'tony','ddc5f5e86d2f85e1b1ff763aff13ce0a',1,'2019-11-16 12:56:25','2019-11-16 12:56:25'),(9,4,'junior','b03e3fd2b3d22ff6df2796c412b09311',1,'2019-11-16 12:56:25','2019-11-16 12:56:25'),(10,5,'mirtha','9592e419fcf1e13324e5fee29d428bd3',1,'2019-11-16 12:56:25','2019-11-16 12:56:25'),(11,2,'ivan','2c42e5cf1cdbafea04ed267018ef1511',1,'2019-11-16 12:56:25','2019-11-16 12:56:25');
/*!40000 ALTER TABLE `cajero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `ciNit` varchar(15) NOT NULL,
  `razonSocial` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--
-- ORDER BY:  `id`

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `ciNit`, `razonSocial`, `estado`, `fechaRegistro`, `fechaActualizacion`) VALUES (1,'7844102','Perez',1,'2019-11-16 12:54:18','2019-11-16 12:54:18'),(2,'9833205','Sanchez',1,'2019-11-16 12:54:18','2019-11-16 12:54:18'),(3,'4455021','Hoyos',1,'2019-11-16 12:54:18','2019-11-16 12:54:18'),(4,'9522145011','Ramirez',1,'2019-11-16 12:54:18','2019-11-16 12:54:18'),(5,'6615423012','Gutierrez',1,'2019-11-16 12:54:18','2019-11-16 12:54:18'),(6,'9866325','Vargas',1,'2019-11-16 12:54:18','2019-11-16 12:54:18'),(7,'7822365-1A','Torrico',1,'2019-11-16 12:54:18','2019-11-16 12:54:18'),(8,'4755102','Merida',1,'2019-11-16 12:54:18','2019-11-16 12:54:18'),(9,'8850230','Peñarrieta',1,'2019-11-16 12:54:18','2019-11-16 12:54:18'),(10,'6855102','Gutierrez',1,'2019-11-16 12:54:18','2019-11-16 12:54:18');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle`
--

DROP TABLE IF EXISTS `detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle` (
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUnitario` decimal(8,2) NOT NULL,
  PRIMARY KEY (`idVenta`,`idProducto`),
  KEY `FK_Pedido_Producto_Producto` (`idProducto`),
  CONSTRAINT `FK_Pedido_Producto_Pedido` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Pedido_Producto_Producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle`
--
-- ORDER BY:  `idVenta`,`idProducto`

LOCK TABLES `detalle` WRITE;
/*!40000 ALTER TABLE `detalle` DISABLE KEYS */;
INSERT INTO `detalle` (`idVenta`, `idProducto`, `cantidad`, `precioUnitario`) VALUES (1,3,25,5.00),(1,5,20,2.50),(1,7,10,8.50),(1,9,5,21.00),(1,11,80,5.00),(1,14,50,24.50),(2,2,50,2.50),(2,4,10,20.50),(2,6,15,3.00),(2,8,25,35.00),(2,10,20,5.00),(2,12,5,5.00),(2,14,10,24.50),(3,4,25,20.50),(3,5,30,2.50),(3,6,35,3.00),(3,7,15,8.50),(3,8,10,35.00),(3,14,5,24.50),(4,6,5,3.00),(4,9,5,21.00),(4,10,70,5.00),(4,11,10,5.00),(4,12,45,5.00),(4,13,35,7.50),(4,14,50,24.50),(5,1,2000,0.10),(5,3,35,5.00),(5,6,5,3.00),(5,9,10,21.00),(5,13,15,7.50),(5,14,20,24.50),(6,1,1000,0.10),(6,2,20,2.50),(6,3,10,5.00),(6,4,20,20.50),(6,5,10,2.50),(6,6,5,3.00),(6,7,10,8.50),(6,8,20,35.00),(7,1,1500,0.10),(7,11,5,5.00),(7,12,10,5.00),(7,13,25,7.50),(7,14,10,24.50),(8,5,5,2.50),(8,6,10,3.00),(8,7,5,8.50),(8,8,10,35.00),(8,9,15,21.00),(8,10,20,5.00),(9,10,70,5.00),(9,11,15,5.00),(9,12,25,5.00),(9,13,50,7.50),(9,14,60,24.50),(10,1,200,0.10),(10,2,5,2.50),(10,7,5,8.50),(10,8,15,35.00),(10,9,10,21.00),(10,12,25,5.00),(10,14,30,24.50),(11,6,55,3.00);
/*!40000 ALTER TABLE `detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoproducto`
--

DROP TABLE IF EXISTS `estadoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadoproducto` (
  `idestadoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(25) NOT NULL,
  PRIMARY KEY (`idestadoProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoproducto`
--
-- ORDER BY:  `idestadoProducto`

LOCK TABLES `estadoproducto` WRITE;
/*!40000 ALTER TABLE `estadoproducto` DISABLE KEYS */;
INSERT INTO `estadoproducto` (`idestadoProducto`, `estado`) VALUES (1,'Nuevo'),(2,'usado');
/*!40000 ALTER TABLE `estadoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oficina`
--

DROP TABLE IF EXISTS `oficina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oficina` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oficina`
--
-- ORDER BY:  `id`

LOCK TABLES `oficina` WRITE;
/*!40000 ALTER TABLE `oficina` DISABLE KEYS */;
INSERT INTO `oficina` (`id`, `nombre`, `direccion`, `estado`, `fechaRegistro`, `fechaActualizacion`) VALUES (1,'Oficina Center','Cine Center, Planta baja, Nro 1A',1,'2019-11-16 12:54:46','2019-11-16 12:54:46'),(2,'Oficina IC Norte 1','IC Norte, Melchor Perez de Olguin, 2do Piso',1,'2019-11-16 12:54:46','2019-11-16 12:54:46'),(3,'Oficina IC Norte 2','IC Norte, Av. America, 2do Piso, Nro 2-12',1,'2019-11-16 12:54:46','2019-11-16 12:54:46'),(4,'Oficina Heroinas','Avenida Heroinas 745, Ayacucho y Junin',1,'2019-11-16 12:54:46','2019-11-16 12:54:46'),(5,'Oficina Prado','Avenida Ballivian 789 y Oruro',1,'2019-11-16 12:54:46','2019-11-16 12:54:46');
/*!40000 ALTER TABLE `oficina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `stock` int(20) NOT NULL DEFAULT 5,
  `unidadMedida` varchar(25) NOT NULL,
  `saldo` int(11) NOT NULL,
  `precioBase` decimal(18,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `img` varchar(400) NOT NULL DEFAULT 'back.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--
-- ORDER BY:  `id`

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id`, `descripcion`, `stock`, `unidadMedida`, `saldo`, `precioBase`, `estado`, `fechaRegistro`, `fechaActualizacion`, `img`) VALUES (1,'Hojas Bond Oficio',5,'Pieza',150000,0.10,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(2,'Lapiz Negro HB 2.0',5,'Pieza',1000,2.50,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(3,'Borrador de Tinta',5,'Pieza',500,5.00,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(4,'Estuche Geométrico',5,'Estuche',250,20.50,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(5,'Cartulina de Color',5,'Pliego',400,2.50,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(6,'Archivador Rápido',5,'Pieza',4945,3.00,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(7,'Micropunta Negro 0.8',5,'Pieza',150,8.50,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(8,'Marcadores (12 Colores)',5,'Estuche',650,35.00,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(9,'Cuaderno 100 Hojas C/espiral',5,'Pieza',905,21.00,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(10,'Boligrafo Pilot Negro',5,'Pieza',1500,5.00,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(11,'Boligrafo Pilot Rojo',5,'Pieza',745,5.00,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(12,'Boligrafo Pilot Azul',5,'Pieza',800,5.00,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(13,'Pegamento de 250 ml',5,'Bote',234,7.50,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(14,'Acuarelas de color',5,'Docena',65,24.50,1,'2019-11-16 12:55:39','2019-11-16 12:55:39','default.png'),(35,'',5,'',0,0.00,1,'2024-06-13 14:00:56',NULL,'35-.jpg');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsusarrio` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contraseña` varchar(50) DEFAULT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsusarrio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--
-- ORDER BY:  `idUsusarrio`

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsusarrio`, `usuario`, `correo`, `contraseña`, `nombre`, `fecha_nacimiento`, `municipio`) VALUES (1,'Ilesandres6','ilesandres6@gmail.com','1127071568','Andres Iles','2005-07-12','Mocoa');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` smallint(6) NOT NULL,
  `idCajero` smallint(6) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(18,2) NOT NULL DEFAULT 0.00,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Cliente` (`idCliente`),
  KEY `FK_Pedido_Representante` (`idCajero`),
  CONSTRAINT `FK_Cajero` FOREIGN KEY (`idCajero`) REFERENCES `cajero` (`id`),
  CONSTRAINT `FK_Cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--
-- ORDER BY:  `id`

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` (`id`, `idCliente`, `idCajero`, `fecha`, `total`, `estado`, `fechaRegistro`, `fechaActualizacion`) VALUES (1,1,6,'2012-03-01 00:00:00',1990.00,1,'2019-11-16 12:55:06','2019-11-16 12:55:06'),(2,2,4,'2012-03-02 00:00:00',1620.00,1,'2019-11-16 12:55:06','2019-11-16 12:55:06'),(3,3,5,'2013-03-02 00:00:00',1292.50,1,'2019-11-16 12:55:06','2019-11-16 12:55:06'),(4,4,7,'2012-03-01 00:00:00',2232.50,1,'2019-11-16 12:55:06','2019-11-16 12:55:06'),(5,5,8,'2012-03-03 00:00:00',1202.50,1,'2019-11-16 12:55:06','2019-11-16 12:55:06'),(6,6,10,'2012-03-05 00:00:00',1435.00,1,'2019-11-16 12:55:06','2019-11-16 12:55:06'),(7,7,6,'2012-03-03 00:00:00',657.50,0,'2019-11-16 12:55:06','2019-11-16 12:55:06'),(8,8,8,'2012-03-03 00:00:00',850.00,1,'2019-11-16 12:55:06','2019-11-16 12:55:06'),(9,9,9,'2012-03-03 00:00:00',2395.00,1,'2019-11-16 12:55:06','2019-11-16 12:55:06'),(10,1,6,'2012-03-06 00:00:00',1670.00,1,'2019-11-16 12:55:06','2019-11-16 12:55:06'),(11,9,4,'2015-11-24 11:39:04',165.00,1,'2019-11-16 12:55:06','2019-11-16 12:55:06');
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed
