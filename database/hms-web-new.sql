-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: hms-web-new
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `absen`
--

DROP TABLE IF EXISTS `absen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `absen` (
  `id_absen` int NOT NULL AUTO_INCREMENT,
  `id_dataset` int DEFAULT NULL,
  `tgl_absen` date NOT NULL,
  `pos_absen` varchar(100) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_absen`),
  KEY `id_dataset` (`id_dataset`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absen`
--

LOCK TABLES `absen` WRITE;
/*!40000 ALTER TABLE `absen` DISABLE KEYS */;
/*!40000 ALTER TABLE `absen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_set`
--

DROP TABLE IF EXISTS `data_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_set` (
  `id_dataset` int NOT NULL AUTO_INCREMENT,
  `id_kar` int DEFAULT NULL,
  `pos` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `sts_skill` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_dataset`),
  KEY `id_kar` (`id_kar`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_set`
--

LOCK TABLES `data_set` WRITE;
/*!40000 ALTER TABLE `data_set` DISABLE KEYS */;
INSERT INTO `data_set` VALUES (1,1,'1','Leader','Menguasai'),(2,2,'2','Member','Cukup'),(3,1,'3','Leader','Menguasai'),(4,2,'4','Member','Cukup'),(5,3,'5','Leader','Menguasai'),(6,4,'6','Member','Cukup'),(7,5,'7','Leader','Menguasai'),(8,6,'8','Member','Cukup'),(9,7,'9','Leader','Menguasai'),(10,8,'10','Member','Cukup'),(11,9,'11','Leader','Menguasai'),(12,10,'12','Member','Cukup'),(13,3,'2','Leader','Cukup'),(14,4,'3','Member','Menguasai'),(15,5,'2','Member','Cukup'),(16,6,'4','Member','Cukup'),(17,10,'1','Leader','Menguasai'),(18,1,'2','Leader','Menguasai'),(25,7,'1','Leader','Cukup'),(26,18,'FrFloor1','member','menguasai'),(27,13,'FrFloor1','leader','menguasai'),(28,12,'FrFloor1','member','menguasai'),(29,15,'FrFloor1','member','cukup'),(30,11,'FrFloor2','leader','menguasai'),(31,13,'FrFloor2','leader','cukup'),(32,14,'FrFloor2','member','menguasai'),(33,15,'FrFloor2','member','cukup'),(34,11,'FrFloor3','leader','menguasai'),(35,15,'FrFloor3','leader','cukup'),(36,15,'FrFloor3','member','menguasai'),(37,16,'FrFloor3','member','cukup'),(38,11,'FrFloor4','leader','menguasai'),(39,16,'FrFloor4','leader','cukup'),(40,17,'FrFloor4','member','menguasai'),(41,14,'FrFloor4','member','cukup');
/*!40000 ALTER TABLE `data_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hadir`
--

DROP TABLE IF EXISTS `hadir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hadir` (
  `hadir_id` int NOT NULL AUTO_INCREMENT,
  `hadir_tgl` datetime NOT NULL,
  `hadir_tgl_in` date NOT NULL,
  `hadir_npk` varchar(255) NOT NULL,
  `hadir_nama` varchar(255) NOT NULL,
  `hadir_jalur` varchar(255) NOT NULL,
  `hadir_pos` varchar(255) NOT NULL,
  `hadir_status` varchar(255) NOT NULL,
  `hadir_shift` varchar(255) NOT NULL,
  `hadir_kode` varchar(11) NOT NULL,
  `hadir_ket` varchar(255) NOT NULL,
  `hadir_gan_id` int NOT NULL,
  `hadir_gan_nama` varchar(255) NOT NULL,
  `hadir_gan_sts` varchar(255) NOT NULL,
  `status_ganti` varchar(100) NOT NULL,
  PRIMARY KEY (`hadir_id`),
  KEY `hadir_kode` (`hadir_kode`),
  KEY `hadir_kode_2` (`hadir_kode`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hadir`
--

LOCK TABLES `hadir` WRITE;
/*!40000 ALTER TABLE `hadir` DISABLE KEYS */;
INSERT INTO `hadir` VALUES (44,'2023-05-14 21:35:49','2023-05-15','28485','Muhammad Farindhi','22','17','Permanent','N','C1','Cuti Tahunan',0,'','',''),(45,'2023-05-14 21:47:54','2023-05-15','3116','Untung Subagyo','9','17','Permanent','1','C1','Cuti Tahunan',0,'','',''),(46,'2024-03-10 07:22:51','2024-03-10','3207','Herman Subiyanto','25','17','Permanent','N','C3','Cuti Pernikahan Karyawan',0,'','','');
/*!40000 ALTER TABLE `hadir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `henkaten`
--

DROP TABLE IF EXISTS `henkaten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `henkaten` (
  `hen_id` int NOT NULL AUTO_INCREMENT,
  `hadir_id` int NOT NULL,
  `hen_npk` varchar(255) NOT NULL,
  `hen_nama` varchar(255) NOT NULL,
  `hen_jalur` varchar(255) NOT NULL,
  `hen_status` varchar(255) NOT NULL,
  `hen_shift` varchar(255) NOT NULL,
  `hen_ganti` varchar(255) NOT NULL,
  `hen_gan_nama` varchar(255) NOT NULL,
  `hen_gan_sts` enum('1','0','','') NOT NULL,
  `status_ganti` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`hen_id`),
  KEY `hadir_id` (`hadir_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `henkaten`
--

LOCK TABLES `henkaten` WRITE;
/*!40000 ALTER TABLE `henkaten` DISABLE KEYS */;
INSERT INTO `henkaten` VALUES (3,44,'28485','Muhammad Farindhi','22','Permanent','N','18785','Adi Rahmanto Wijaya','','Selesai'),(4,45,'3116','Untung Subagyo','9','Permanent','1','','','','Menunggu Pengganti'),(5,46,'3207','Herman Subiyanto','25','Permanent','N','24495','Tri Winarno','','Selesai');
/*!40000 ALTER TABLE `henkaten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jalur`
--

DROP TABLE IF EXISTS `jalur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jalur` (
  `jalur_id` int NOT NULL AUTO_INCREMENT,
  `jalur_nama` varchar(255) NOT NULL,
  `jalur_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`jalur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jalur`
--

LOCK TABLES `jalur` WRITE;
/*!40000 ALTER TABLE `jalur` DISABLE KEYS */;
INSERT INTO `jalur` VALUES (6,'UnderBody D55L','underbody-d55l'),(8,'UnderBody D79L','underbody-d79l'),(9,'UF COMMON','uf-common'),(10,'SIDE MEMBER RH','side-member-rh'),(12,'SHELLPART','shellpart'),(13,'AUTOMIXLINE','automixline'),(17,'Others','others'),(18,'SIDE MEMBER LH','side-member-lh'),(19,'Supply','supply'),(20,'Quality','quality'),(21,'Project Improvement','project-improvement'),(22,'New Project','new-project'),(23,'Dojo Admin','dojo-admin'),(24,'Tatecho','tatecho'),(25,'BQC','bqc'),(26,'Safety','safety');
/*!40000 ALTER TABLE `jalur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `karyawan` (
  `id_kar` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id_kar`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karyawan`
--

LOCK TABLES `karyawan` WRITE;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` VALUES (1,'Alice','08123456789','Jl. Merpati No. 1'),(2,'Bob','08198765432','Jl. Kenari No. 2'),(3,'Bejo','081234567890','Alamat 1'),(4,'Sule 2','081234567891','Alamat 2'),(5,'Angga 3','081234567892','Alamat 3'),(6,'Benu','081234567893','Alamat 4'),(7,'Ojan','081234567894','Alamat 5'),(8,'Aryadi','081234567895','Alamat 6'),(9,'Jodi','081234567896','Alamat 7'),(10,'Prapto','081234567897','Alamat 8'),(11,'Rendi Kurniawan','081234567890','Alamat 1'),(12,'Yoga Wibowo','081234567891','Alamat 2'),(13,'Bima Saifudin','081234567892','Alamat 3'),(14,'Farhan Nurdiyanto','081234567893','Alamat 4'),(15,'Tio Ahmad','081234567894','Alamat 5'),(16,'Diki Puji','081234567895','Alamat 6'),(17,'Ahmad Mutakin','081234567896','Alamat 7'),(18,'Husen','081234567896','Alamat 8');
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kodeabsen`
--

DROP TABLE IF EXISTS `kodeabsen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kodeabsen` (
  `absen_id` varchar(11) NOT NULL,
  `absen_ket` varchar(255) NOT NULL,
  PRIMARY KEY (`absen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kodeabsen`
--

LOCK TABLES `kodeabsen` WRITE;
/*!40000 ALTER TABLE `kodeabsen` DISABLE KEYS */;
INSERT INTO `kodeabsen` VALUES ('C1','Cuti Tahunan'),('C2','Cuti Panjang'),('C3','Cuti Pernikahan Karyawan'),('CL19','Diliburkan'),('CL5','Ijin Duka Cita'),('CL6','Cuti Sakit Keras Keluarga Karyawan'),('CL8','Cuti Istri Karyawan Melahirkan'),('CL9','Cuti Khitanan Anak Karyawan'),('M','Mangkir'),('S1','Sakit dengan Keterangan Dokter'),('S2','Sakit dengan dirawat di Rumah Sakit'),('T1','Terlambat > 1 jam'),('T2','Terlambat > 30 menit kurang dari 1 jam'),('T3','Terlambat kurang dari 30 menit'),('WFH','Work From Home');
/*!40000 ALTER TABLE `kodeabsen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mp`
--

DROP TABLE IF EXISTS `mp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mp` (
  `mp_id` int NOT NULL,
  `mp_nama` varchar(255) NOT NULL,
  `mp_jalur` int NOT NULL,
  `mp_pos` varchar(255) NOT NULL,
  `mp_status` varchar(255) NOT NULL,
  `mp_shift` varchar(11) NOT NULL,
  `mp_atasan` varchar(255) NOT NULL,
  PRIMARY KEY (`mp_id`),
  KEY `mp_jalur` (`mp_jalur`),
  KEY `mp_shift` (`mp_shift`),
  KEY `mp_pos` (`mp_pos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mp`
--

LOCK TABLES `mp` WRITE;
/*!40000 ALTER TABLE `mp` DISABLE KEYS */;
/*!40000 ALTER TABLE `mp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengganti`
--

DROP TABLE IF EXISTS `pengganti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengganti` (
  `id_ganti` int NOT NULL AUTO_INCREMENT,
  `id_dataset` int DEFAULT NULL,
  `id_absen` int DEFAULT NULL,
  `id_data_set_pengganti` int DEFAULT NULL,
  `nama_ganti` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_ganti`),
  KEY `id_dataset` (`id_dataset`),
  KEY `id_absen` (`id_absen`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengganti`
--

LOCK TABLES `pengganti` WRITE;
/*!40000 ALTER TABLE `pengganti` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengganti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengguna` (
  `pengguna_id` int NOT NULL AUTO_INCREMENT,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_npk` varchar(11) NOT NULL,
  `pengguna_shift` varchar(255) NOT NULL,
  `pengguna_jalur` int NOT NULL,
  `pengguna_pos` varchar(50) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_wa` varchar(255) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_level` enum('admin','penulis','spv','BQC WQC','Project','Foreman','Quality Body','Produksi') NOT NULL,
  `pengguna_status` int NOT NULL,
  PRIMARY KEY (`pengguna_id`),
  KEY `pengguna_jalur` (`pengguna_jalur`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` VALUES (6,'Adi Rahmanto Wijaya','18785','1',6,'','Tholebjg18785@gmail.com','6.28E+12','Adi','07142c5501c3ea09303d899012e2b47d','Produksi',1),(7,'Sigit Prayitno','30503','1',17,'','pray1225@gmail.com','6.29E+12','Sigit','31e465dce170670b68fd1188f3bc44b7','BQC WQC',1),(8,'Deny Setiawan','28948','1',17,'','setiawan.deny8888@gmail.com','6.29E+12','Deny','31e465dce170670b68fd1188f3bc44b7','Quality Body',1),(9,'Yusep Ridwan','24221','B',9,'','rullznoe@gmail.com','6.28E+12','Yusep','541deb2fe959b93e108c020193d49425','Foreman',1),(10,'Agung  davit','44430','1',17,'','agung.david19@gmail.com','6.29E+12','Agung','6ade4163a398335a0a2abced430cf869','spv',1),(11,'Eji Hamali','41439','1',17,'','enzy.tansyu.et@gmail.com','6.28E+12','Eji','31e465dce170670b68fd1188f3bc44b7','',1),(14,'Suryo Bintang','45377','A',6,'','bodygital@gmail.com','08123124135135','admin','7488e331b8b64e5794da3fa4eb10ad5d','admin',1),(56,'suryo','45377','1',9,'','qwerty@gmail.com','085885343894','admin321','0685cbd213039b77003d35a83ef4bf68','admin',1);
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos`
--

DROP TABLE IF EXISTS `pos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pos` (
  `pos_id` int NOT NULL AUTO_INCREMENT,
  `pos_jalur` int NOT NULL,
  `pos_nama` varchar(255) NOT NULL,
  PRIMARY KEY (`pos_id`),
  KEY `pos_jalur` (`pos_jalur`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos`
--

LOCK TABLES `pos` WRITE;
/*!40000 ALTER TABLE `pos` DISABLE KEYS */;
INSERT INTO `pos` VALUES (5,6,'under rear small'),(7,10,'Pre B'),(13,19,'Underbody D79'),(14,20,'TD Link Side member'),(15,21,'Improvement'),(16,22,'Project D74'),(18,8,'Koordinator'),(26,19,'Koordinator'),(27,20,'Koordinator'),(28,21,'Koordinator'),(29,22,'Koordinator'),(33,22,'project d52'),(34,9,'Outline Under Front'),(35,9,'Front Floor'),(36,9,'Panel Dash'),(37,9,'Koordinator'),(39,9,'Apron 1');
/*!40000 ALTER TABLE `pos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shift`
--

DROP TABLE IF EXISTS `shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shift` (
  `shift_id` int NOT NULL AUTO_INCREMENT,
  `shift_nama` varchar(255) NOT NULL,
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shift`
--

LOCK TABLES `shift` WRITE;
/*!40000 ALTER TABLE `shift` DISABLE KEYS */;
INSERT INTO `shift` VALUES (1,'A'),(2,'B'),(3,'N');
/*!40000 ALTER TABLE `shift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skil`
--

DROP TABLE IF EXISTS `skil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skil` (
  `skil_id` int NOT NULL AUTO_INCREMENT,
  `mp_id` int NOT NULL,
  `mp_nama` varchar(255) NOT NULL,
  `skiljalur_id` int NOT NULL,
  `pos_kode` int NOT NULL,
  `skill_score` varchar(255) NOT NULL,
  `skill_sts` enum('1','0','','') NOT NULL,
  PRIMARY KEY (`skil_id`),
  KEY `pos_id` (`pos_kode`),
  KEY `jalur_id` (`skiljalur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skil`
--

LOCK TABLES `skil` WRITE;
/*!40000 ALTER TABLE `skil` DISABLE KEYS */;
INSERT INTO `skil` VALUES (7,7042,'Asep Saepudin',10,5,'100','1'),(8,7042,'Asep Saepudin',10,7,'50','0'),(9,14421,'Totok Kunarto',13,5,'25','0'),(10,34002,'Jumanto',22,16,'100','1'),(11,25174,'Nurjaman',22,16,'100','1'),(13,48520,'Mukhammad Sidiq Lastrikno',6,36,'100','1');
/*!40000 ALTER TABLE `skil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'hms-web-new'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-04  0:16:12
