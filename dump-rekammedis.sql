-- MySQL dump 10.16  Distrib 10.3.9-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: rekammedis
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `kohort_bayi`
--

DROP TABLE IF EXISTS `kohort_bayi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kohort_bayi` (
  `id_register` varchar(20) NOT NULL,
  `djj` varchar(10) DEFAULT NULL,
  `tbj` varchar(10) DEFAULT NULL,
  `pap` varchar(10) DEFAULT NULL,
  `jumlah_janin` varchar(3) DEFAULT NULL,
  `presentasi_bayi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_register`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kohort_bayi`
--

LOCK TABLES `kohort_bayi` WRITE;
/*!40000 ALTER TABLE `kohort_bayi` DISABLE KEYS */;
INSERT INTO `kohort_bayi` VALUES ('REG000012',NULL,NULL,NULL,NULL,NULL),('REG000013',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `kohort_bayi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kohort_ibu_hamil`
--

DROP TABLE IF EXISTS `kohort_ibu_hamil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kohort_ibu_hamil` (
  `id_register` varchar(20) NOT NULL,
  `anamnesis` varchar(30) DEFAULT NULL,
  `bb` varchar(5) DEFAULT NULL,
  `tb` varchar(5) DEFAULT NULL,
  `td` varchar(5) DEFAULT NULL,
  `tfu` varchar(5) DEFAULT NULL,
  `lila` varchar(5) DEFAULT NULL,
  `status_gizi` varchar(3) DEFAULT NULL,
  `refleks_patella` varchar(3) DEFAULT NULL,
  `injeksi_tt` varchar(30) DEFAULT NULL,
  `buku_kia` varchar(30) DEFAULT NULL,
  `fa` int(5) DEFAULT NULL,
  `hb` int(11) DEFAULT NULL,
  `pretein_urin` varchar(3) DEFAULT NULL,
  `gula_darah` varchar(3) DEFAULT NULL,
  `deteksi_resiko` varchar(100) DEFAULT NULL,
  `komplikasi` varchar(100) DEFAULT NULL,
  `fasilitas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_register`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kohort_ibu_hamil`
--

LOCK TABLES `kohort_ibu_hamil` WRITE;
/*!40000 ALTER TABLE `kohort_ibu_hamil` DISABLE KEYS */;
INSERT INTO `kohort_ibu_hamil` VALUES ('REG000012','Anamnesis','71','150','180','110','90','m','-','Ya','Ya',NULL,20,NULL,NULL,'','',''),('REG000013',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `kohort_ibu_hamil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kohort_nifas`
--

DROP TABLE IF EXISTS `kohort_nifas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kohort_nifas` (
  `id_register` varchar(20) NOT NULL,
  `td_nifas` varchar(5) DEFAULT NULL,
  `suhu` varchar(5) DEFAULT NULL,
  `komplikasi_nifas` varchar(100) DEFAULT NULL,
  `fasilitas_nifas` varchar(100) DEFAULT NULL,
  `keadaan_tiba` varchar(5) DEFAULT NULL,
  `keadaan_pulang` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_register`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kohort_nifas`
--

LOCK TABLES `kohort_nifas` WRITE;
/*!40000 ALTER TABLE `kohort_nifas` DISABLE KEYS */;
INSERT INTO `kohort_nifas` VALUES ('REG000012',NULL,NULL,NULL,NULL,NULL,NULL),('REG000013',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `kohort_nifas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kohort_persalinan`
--

DROP TABLE IF EXISTS `kohort_persalinan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kohort_persalinan` (
  `id_register` varchar(10) NOT NULL,
  `tglk1` date DEFAULT NULL,
  `jamk1` varchar(8) DEFAULT NULL,
  `tglk2` date DEFAULT NULL,
  `jamk2` varchar(8) DEFAULT NULL,
  `tglbl` date DEFAULT NULL,
  `jambl` varchar(8) DEFAULT NULL,
  `tglpl` date DEFAULT NULL,
  `jampl` varchar(8) DEFAULT NULL,
  `usia_hpht` varchar(5) DEFAULT NULL,
  `presentasi` varchar(100) DEFAULT NULL,
  `berat_bayi` varchar(3) DEFAULT NULL,
  `cara_persalinan` varchar(100) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `keadaan_ibu` varchar(3) DEFAULT NULL,
  `keadaan_bayi` varchar(3) DEFAULT NULL,
  `komplikasi_persalinan` varchar(100) DEFAULT NULL,
  `fasilitas_persalinan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_register`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kohort_persalinan`
--

LOCK TABLES `kohort_persalinan` WRITE;
/*!40000 ALTER TABLE `kohort_persalinan` DISABLE KEYS */;
INSERT INTO `kohort_persalinan` VALUES ('REG000008','0000-00-00','2:07 am','0000-00-00','2:07 am','0000-00-00','2:07 am','0000-00-00','2:07 am','','','','','',NULL,NULL,'',''),('REG000009',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('REG000010','2019-02-09','2:19 am',NULL,'2:19 am',NULL,'2:19 am',NULL,'2:19 am','','','','','',NULL,NULL,'',''),('REG000011',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('REG000012',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('REG000013',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `kohort_persalinan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `image` varchar(80) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tgl_periksa_selanjutnya` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien`
--

LOCK TABLES `pasien` WRITE;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` VALUES (4,'123123123','Pasien','Alamat Pasien','1993-02-11','female.png','pasien','f5c25a0082eb0748faedca1ecdcfb131','2019-02-09'),(5,'3213131','Pasien2','Alamat Pasien2','1996-02-06','female.png',NULL,NULL,NULL),(6,'132132132','Pasien3','Alamat Pasien3','1990-02-11','female.png',NULL,NULL,NULL);
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register` (
  `id_register` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `jamkesmas` varchar(20) DEFAULT NULL,
  `usia_kehamilan` int(3) NOT NULL,
  `trimester` int(3) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `bidan` varchar(5) NOT NULL,
  PRIMARY KEY (`id_register`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES ('REG000012','2019-02-26','123123123123','332211',76,3,'0','61'),('REG000013','2019-02-28','123123123','',80,2,'0','61');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `aktif` enum('1','0') NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (59,'kp','kepala','870f669e4bbbfa8a6fde65549826d1c4','Kepala','JalanKepala','1'),(60,'b','bidan','cc274f4730ce350f1cf60e73f4172d67','Bidan','Jl. Poros Sungguminasa','1'),(61,'a','admin','21232f297a57a5a743894a0e4a801fc3','Admin','Jl. Poros Limbung','1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'rekammedis'
--
