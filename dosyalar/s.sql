-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: smakardesim
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bankaBilgileri`
--
USE sma_kardesim;
DROP TABLE IF EXISTS `bankaBilgileri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bankaBilgileri` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cocuk_id` int DEFAULT NULL,
  `banka` varchar(255) DEFAULT NULL,
  `birim` char(3) DEFAULT NULL,
  `iban` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bankaBilgileri_FK` (`cocuk_id`),
  CONSTRAINT `bankaBilgileri_FK` FOREIGN KEY (`cocuk_id`) REFERENCES `cocuk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankaBilgileri`
--

LOCK TABLES `bankaBilgileri` WRITE;
/*!40000 ALTER TABLE `bankaBilgileri` DISABLE KEYS */;
INSERT INTO `bankaBilgileri` VALUES (1,1,'Ziraat Bankası','USD','TR123456789012345678901234'),(2,1,'Yapı ve Kredi Bankası','TRY','TR678901234567890123412345');
/*!40000 ALTER TABLE `bankaBilgileri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cocuk`
--

DROP TABLE IF EXISTS `cocuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cocuk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ad` varchar(255) DEFAULT NULL,
  `yetkili_adi` varchar(255) DEFAULT NULL,
  `iletisim` varchar(100) DEFAULT NULL,
  `sma_tip` char(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `valilik_izin_baslangic` date DEFAULT NULL,
  `valilik_izin_bitis` date DEFAULT NULL,
  `toplanacak` bigint DEFAULT NULL,
  `toplanan` bigint DEFAULT NULL,
  `yuzde` tinyint DEFAULT NULL,
  `birim` char(3) DEFAULT NULL,
  `guncelleme_ani` timestamp NULL DEFAULT NULL,
  `kisa_aciklama` mediumtext,
  `aciklama` text,
  `valilik_izni_url` text,
  `hastalik_raporu_url` text,
  `kardes_sayisi` int DEFAULT NULL,
  `resim_url` text,
  `tamamlandi_mi` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cocuk`
--

LOCK TABLES `cocuk` WRITE;
/*!40000 ALTER TABLE `cocuk` DISABLE KEYS */;
INSERT INTO `cocuk` VALUES (1,'Abdurrahman AKKUŞ(Örnek)','Ahmet AKKUŞ','+90 123 123 45 78','SMA-1','2021-01-01','2021-06-01',1000000,900000,90,'USD','2021-06-27 14:05:00','Bu parçada kısaca hastanın özet bilgisi paylaşılacaktır.','Bu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.','dosyalar/valilik_izni_ornek.pdf','dosyalar/hastalik_raporu_ornek.pdf',153,'dosyalar/baby1.jpg',0),(2,'Deneme2(Örnek)','Ahmet AKKUŞ','+90 123 123 45 78','SMA-2','2021-01-01','2021-06-01',1000000,9000,9,'USD','2021-06-27 14:05:00','Bu parçada kısaca hastanın özet bilgisi paylaşılacaktır.','Bu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.','dosyalar/valilik_izni_ornek.pdf','dosyalar/hastalik_raporu_ornek.pdf',10,'dosyalar/baby2.jpg',0),(3,'Deneme3(Örnek)','Ahmet AKKUŞ','+90 123 123 45 78','SMA-2','2021-01-01','2021-06-01',1000000,100000,10,'USD','2021-06-27 14:05:00','Bu parçada kısaca hastanın özet bilgisi paylaşılacaktır.','Bu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.\nBu kısımda hasta ile ilgili detaylı açıklama yapılacaktır. \nAçıklama içerisinde hikayesinden bahsedilmesi uygun olacaktır. \nOnun dışında bahsedilmek istenen bir şey varsa da eklenebilir.\nAyrıca <code>html</code> kodları da eklenebilir.','dosyalar/valilik_izni_ornek.pdf','dosyalar/hastalik_raporu_ornek.pdf',10,'dosyalar/baby3.jpg',1);
/*!40000 ALTER TABLE `cocuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kullanici` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(25) NOT NULL,
  `sifre` varchar(12) NOT NULL,
  `yetki` int DEFAULT NULL,
  `aktif_mi` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kullanici`
--

LOCK TABLES `kullanici` WRITE;
/*!40000 ALTER TABLE `kullanici` DISABLE KEYS */;
INSERT INTO `kullanici` VALUES (1,'a','a',2,1);
/*!40000 ALTER TABLE `kullanici` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-02 19:45:58
