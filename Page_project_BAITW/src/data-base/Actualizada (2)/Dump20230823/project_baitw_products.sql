-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: project_baitw
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `descrip` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint DEFAULT NULL,
  `id_categoria` int NOT NULL,
  `activo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Bicicleta Todo Terreno','<br>\r\n<p>Bicicleta Hibrida todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>',850.00,5,1,1),(2,'Bicicleta Semiprofecional','<br>\r\n<p>Bicicleta Semi todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>',1200.00,3,1,1),(3,'Bicicleta Profecional Todoterreno','<br>\r\n<p>Bicicleta Hibrida todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>',2500.00,10,1,1),(4,'N/a','N/A',0.00,0,1,0),(5,'N/A','N/A',0.00,0,1,0),(6,'N/A','N/A',0.00,0,1,0),(7,'N/a','N/A',0.00,0,1,0),(8,'N/A','N/A',0.00,0,1,0),(9,'N/A','N/A',0.00,0,1,0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-23 17:58:19
