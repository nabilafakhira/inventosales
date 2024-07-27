-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (x86_64)
--
-- Host: localhost    Database: inventoSales
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `admin`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,1,'Budi Santoso','budi.santoso@example.com','+621234567890','l. Merdeka No. 10, Jakarta','2024-07-27 14:59:19'),(2,2,'Ayu Wulandari','ayu.wulandari@example.com','+6222345678911','Jl. Sudirman No. 15, Bandung','2024-07-27 15:47:06');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `stok` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1,'Televisi LED 32 Inch','Unit','Televisi LED dengan layar 32 inch dan resolusi HD.',1,8),(2,'Laptop 14 Inch','Unit','Laptop dengan layar 14 inch, prosesor Intel Core i5, RAM 8GB, dan SSD 256GB.',2,0),(3,'Smartphone Android','Unit','Smartphone dengan layar 6.5 inch, prosesor Octa-Core, RAM 4GB, dan memori internal 64GB.',1,15),(4,'Tablet 10 Inch','Unit','Tablet dengan layar 10 inch, prosesor Quad-Core, RAM 3GB, dan memori internal 32GB.',2,4),(5,'Kamera DSLR','Unit','Kamera DSLR dengan sensor 24MP, lensa kit 18-55mm, dan fitur Wi-Fi.',1,2),(6,'Headphone Bluetooth','Unit','Headphone nirkabel dengan teknologi Bluetooth, noise cancellation, dan baterai tahan 20 jam.',2,8),(7,'Smartwatch','Unit','Jam tangan pintar dengan layar sentuh, monitor detak jantung, dan fitur pelacakan aktivitas.',1,0);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hak_akses`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hak_akses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_akses` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_akses` (`nama_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hak_akses`
--

LOCK TABLES `hak_akses` WRITE;
/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
INSERT INTO `hak_akses` VALUES (1,'Admin','All Privilege'),(2,'Pelanggan',''),(3,'Supplier','');
/*!40000 ALTER TABLE `hak_akses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelanggan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES (1,8,'Eko Saputra','eko.saputra@example.com','+621234567897','Jl. Pemuda No. 45, Palembang','2024-07-27 15:50:58'),(2,9,'Rina Sari','rina.sari@example.com','+621234567898','Jl. Veteran No. 50, Makassar','2024-07-27 15:51:34'),(3,10,'Arif Rahman','arif.rahman@example.com','+621234567899','Jl. Sultan Agung No. 55, Padang','2024-07-27 15:52:09'),(4,11,'Linda Susanti','linda.susanti@example.com','+621234567800','Jl. Diponegoro No. 60, Pekanbaru','2024-07-27 15:53:12'),(5,12,'Fajar Setiawan','fajar.setiawan@example.com','+621234567801','Jl. Kertanegara No. 65, Denpasar','2024-07-27 15:54:12'),(6,13,'Yuni Kartika','yuni.kartika@example.com','+621234567802','Jl. Hasanuddin No. 70, Pontianak','2024-07-27 15:55:03'),(7,14,'Dian Permana','dian.permana@example.com','+621234567803','Jl. Cendrawasih No. 75, Jayapura','2024-07-27 15:55:40'),(8,15,'Hendra Wijaya','hendra.wijaya@example.com','+621234567804','Jl. Imam Bonjol No. 80, Manado','2024-07-27 15:56:16'),(9,16,'Sari Dewi','sari.dewi@example.com','+621234567805','Jl. Ahmad Yani No. 85, Banjarmasin','2024-07-27 15:57:05'),(10,17,'Bambang Supriyadi','bambang.supriyadi@example.com','+621234567806','Jl. Siliwangi No. 90, Cirebon','2024-07-27 15:57:38');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembelian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jumlah_pembelian` int NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL,
  `id_barang` int NOT NULL,
  `id_user` int NOT NULL,
  `id_supplier` int NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_barang` (`id_barang`),
  KEY `id_user` (`id_user`),
  KEY `id_supplier` (`id_supplier`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `pembelian_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian`
--

LOCK TABLES `pembelian` WRITE;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT INTO `pembelian` VALUES (1,10,2500000.00,1,1,1,'2024-07-01','2024-07-27 16:08:05'),(2,5,8500000.00,2,2,2,'2024-07-01','2024-07-27 16:08:05'),(3,20,3000000.00,3,1,3,'2024-07-01','2024-07-27 16:08:05'),(4,15,4500000.00,4,2,4,'2024-07-02','2024-07-27 16:08:05'),(5,8,12000000.00,5,1,5,'2024-07-03','2024-07-27 16:08:05'),(6,25,1500000.00,6,4,2,'2024-07-03','2024-07-27 16:08:05'),(7,18,2000000.00,7,5,3,'2024-07-04','2024-07-27 16:08:05');
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penjualan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jumlah_penjualan` int NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `id_barang` int NOT NULL,
  `id_user` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_barang` (`id_barang`),
  KEY `id_user` (`id_user`),
  KEY `id_pelanggan` (`id_pelanggan`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` VALUES (1,5,1800000.00,6,1,3,'2024-07-01','2024-07-27 16:12:49'),(2,2,3000000.00,1,1,6,'2024-07-01','2024-07-27 16:13:51'),(3,2,10200000.00,2,1,7,'2024-07-02','2024-07-27 16:14:37'),(4,4,5400000.00,4,1,4,'2024-07-02','2024-07-27 16:15:30'),(5,1,2400000.00,7,1,1,'2024-07-02','2024-07-27 16:31:09'),(6,2,3600000.00,3,1,10,'2024-07-03','2024-07-27 16:31:46'),(7,1,14400000.00,5,1,8,'2024-07-03','2024-07-27 16:32:03'),(8,3,3600000.00,3,1,4,'2024-07-04','2024-07-27 16:32:41'),(9,1,14400000.00,5,1,6,'2024-07-04','2024-07-27 16:32:57'),(10,2,10200000.00,2,1,2,'2024-07-05','2024-07-27 16:33:18'),(11,3,1800000.00,6,1,6,'2024-07-05','2024-07-27 16:35:33'),(12,3,2400000.00,7,1,3,'2024-07-05','2024-07-27 16:36:08'),(13,4,2400000.00,7,1,1,'2024-07-06','2024-07-27 16:36:20'),(14,6,1800000.00,6,1,7,'2024-07-06','2024-07-27 16:36:34'),(15,3,1800000.00,6,1,5,'2024-07-07','2024-07-27 16:37:20'),(16,4,2400000.00,7,1,9,'2024-07-07','2024-07-27 16:37:41'),(17,3,2400000.00,7,1,2,'2024-07-07','2024-07-27 16:38:07'),(18,1,14400000.00,5,1,4,'2024-07-07','2024-07-27 16:38:29'),(19,2,2400000.00,7,1,1,'2024-07-08','2024-07-27 16:39:22'),(20,2,5400000.00,4,1,6,'2024-07-08','2024-07-27 16:39:40'),(21,1,2400000.00,7,1,4,'2024-07-08','2024-07-27 16:40:11'),(22,5,5400000.00,4,1,3,'2024-07-09','2024-07-27 16:40:51'),(23,3,14400000.00,5,1,10,'2024-07-09','2024-07-27 16:41:10'),(24,1,10200000.00,2,1,6,'2024-07-10','2024-07-27 16:41:54');
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,3,'Rahmat Hidayat','rahmat.hidayat@example.com','+621234567892','Jl. Pahlawan No. 20, Surabaya','2024-07-27 15:47:46'),(2,4,'Siti Aminah','siti.aminah@example.com','+621234567893','Jl. Diponegoro No. 25, Yogyakarta','2024-07-27 15:48:24'),(3,5,'Dewi Lestari','dewi.lestari@example.com','+621234567894','Jl. Gajah Mada No. 30, Semarang','2024-07-27 15:49:02'),(4,6,'Agus Prasetyo','agus.prasetyo@example.com','+621234567895','Jl. Soekarno-Hatta No. 35, Malang','2024-07-27 15:49:41'),(5,7,'Nurul Aisyah','nurul.aisyah@example.com','+621234567896','Jl. Gatot Subroto No. 40, Medan','2024-07-27 15:50:15');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_akses` int NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id_akses` (`id_akses`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'budisantoso','$2y$10$otY/cpr0lqJHZrslji14w.tZSea4rMXb0D7ltTmGx5hnFfiOdBE2i',1,'2024-07-27 14:58:31'),(2,'ayuwulandari','$2y$10$wFUdnGitlugVZ0WvdeVphO7ezYfbYO9pBm1ZGB1R7BkVR/SESij7K',1,'2024-07-27 15:47:06'),(3,'rahmathidayat','$2y$10$LOpugN52lvLpLlgQ09GZr.oc3o6LbCAUyUClU4EgcGHKbEl.1SS.W',3,'2024-07-27 15:47:46'),(4,'sitiaminah','$2y$10$p.o4lRpir.cuvKCUjYiFh.RlQPnAfJEX.Y7vF.1UtoTyFO.hhrzqq',3,'2024-07-27 15:48:24'),(5,'dewilestari','$2y$10$r5T1jV6ErriSdHoFEOe4gOE3GQYrbWq98rH/wGwX47PEbF99idHT6',3,'2024-07-27 15:49:02'),(6,'agusprasetyo','$2y$10$jgXIdh5BTbHIUeT8Q4Nk/eHS.vFwucmK48X8kjLW9c7ILYn3QT.nm',3,'2024-07-27 15:49:41'),(7,'nurulaisyah','$2y$10$2tWq0syT43kXjvgFCotZpuYCABnFj26pqIn/OmbbtFSCLYcXSGGRa',3,'2024-07-27 15:50:15'),(8,'ekosaputra','$2y$10$RBiRMdxaFQD3fAMSD6J21eh6vCA6N50RFbkGhh63YtsCyVPyv/1Au',2,'2024-07-27 15:50:58'),(9,'rinasari','$2y$10$h1NkFpH.5K/Ug60Ti2IQF.uiRuwRYMH2a8iOQ.GZub3Q.nebpNzqe',2,'2024-07-27 15:51:34'),(10,'arifrahman','$2y$10$Xp3YSdGbc4Qq6wrkPSJXBu0.JrNzN8h5ZrgLrs8HIqYzLRHncx1E6',2,'2024-07-27 15:52:09'),(11,'lindasusanti','$2y$10$nhrPie9dpUPkViq3X/3PceCd1oiZECrP9X8HbBOOrJtIcYIhJ9aai',2,'2024-07-27 15:53:12'),(12,'fajarsetiawan','$2y$10$VxJcUcEcOrksRa8KJe9qteXY00HrT0XcyHfpX31Bm.APA6WR1bukC',2,'2024-07-27 15:54:12'),(13,'yunikartika','$2y$10$/qqZV15.r1FNd/LdNOO8XupQNKUIghSQ3FRsaDkVwpZf8oCZLVqb.',2,'2024-07-27 15:55:03'),(14,'dianpermana','$2y$10$cXAdw7ScOYrGkiLak83iA.yEKPF9TDx40W31XhyQXUeSW11wZFx7G',2,'2024-07-27 15:55:40'),(15,'hendrawijaya','$2y$10$rHzJ1MXBuCf7flxcnmV.jeHzFLh0DJTz3Vi0NeeGdiYOJ9Bx8Dm2m',2,'2024-07-27 15:56:16'),(16,'saridewi','$2y$10$EBzrkYjb7jG4OKqyZcqaDeFbTuCw7DfLaeei.JbBw16pLDWOkFKmq',2,'2024-07-27 15:57:05'),(17,'bambangsupriyadi','$2y$10$9RGmEbdnGrsu0A41.XKiguHpauh5wDvGWyDvizM5t6bghlc3U1pye',2,'2024-07-27 15:57:38');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'inventoSales'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-28  0:09:40
