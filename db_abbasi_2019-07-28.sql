# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.25)
# Database: db_abbasi
# Generation Time: 2019-07-28 08:19:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table customer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;

INSERT INTO `customer` (`id`, `nama`, `email`, `no_telp`, `alamat`)
VALUES
	(1,'Arifin Nurmardiansyah','arifinofficial30@gmail.com','085739928666','Jl Imam Bonjol Gang 100'),
	(2,'Burhan','burhan@bur.com','085726498268','Jl. Imam Bpnjol');

/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kategori
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;

INSERT INTO `kategori` (`id`, `nama`)
VALUES
	(1,'Songket'),
	(2,'Satin'),
	(3,'Katun'),
	(4,'Brokat');

/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pembelian
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `total` int(25) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pembelian` WRITE;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;

INSERT INTO `pembelian` (`id`, `tanggal`, `total`, `status`, `id_customer`)
VALUES
	(1,'2018-07-01 00:00:00',1000000,1,1),
	(2,'2018-07-02 00:00:00',500000,2,2);

/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pembelian_produk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pembelian_produk`;

CREATE TABLE `pembelian_produk` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pembelian_produk` WRITE;
/*!40000 ALTER TABLE `pembelian_produk` DISABLE KEYS */;

INSERT INTO `pembelian_produk` (`id`, `id_pembelian`, `id_produk`, `jumlah`)
VALUES
	(1,1,1,1),
	(2,1,2,1);

/*!40000 ALTER TABLE `pembelian_produk` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table produk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `harga` int(25) DEFAULT NULL,
  `deskripsi` text,
  `id_kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `produk` WRITE;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;

INSERT INTO `produk` (`id`, `nama`, `foto`, `harga`, `deskripsi`, `id_kategori`)
VALUES
	(8,'kain satin motif jembrana','satin1.jpg',76000,'kain satin motif jembrana bahan satin ukuran 2m sangat lembut dan nyaman untuk digunakan dalam kegiatan sehari-hari dan kain brokat 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',2),
	(9,'kain satin motif nakula','satin3.jpg',75000,'kain satin motif nakula bahan satin ukuran 2m sangat lembut dan nyaman untuk digunakan dalam kegiatan sehari-hari dan kain brokat 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',2),
	(10,'kain satin motif kupu','satin6.jpg',75000,'kain satin motif kupu bahan satin ukuran 2m sangat lembut dan nyaman untuk digunakan dalam kegiatan sehari-hari dan kain brokat 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',2),
	(11,'kain katun motif bima','katun2.jpg',100000,'kain katun motif bima bahan katun ukuran 2m sangat lembut dan nyaman untuk digunakan dalam kegiatan sehari-hari dan kain brokat 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',3),
	(12,'kain katun motif shasa','katun6.jpg',100000,'kain katun motif shasa bahan katun ukuran 2m sangat lembut dan nyaman untuk digunakan dalam kegiatan sehari-hari dan kain brokat 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',3),
	(13,'kain katun motif sasmita','katun3.jpg',100000,'kain katun motif sasmita bahan katun ukuran 2m sangat lembut dan nyaman untuk digunakan dalam kegiatan sehari-hari dan kain brokat 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',3),
	(14,'kain songket motif nandhini','songket1.jpg',150000,'kain katun motif nandhini bahan songket ukuran 2m sangat lembut dan nyaman untuk digunakan dalam kegiatan sehari-hari dan kain brokat 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',1),
	(15,'kain songket motif sangkuni','songket3.jpg',150000,'kain songket motif sangkuni bahan songket ukuran 2m sangat lembut dan nyaman untuk digunakan dalam kegiatan sehari-hari dan kain brokat 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',1),
	(16,'kain songket motif raja','songket5.jpg',150000,'kain songket motif raja bahan songket ukuran 2m sangat lembut dan nyaman untuk digunakan dalam kegiatan sehari-hari dan kain brokat 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',1),
	(17,'kain brokat motif camila warna hijau ','brokat5.jpg',50000,'kain brokat motif camila warna hijau bahan brokat ukuran 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',4),
	(18,'kain brokat motif camila warna coklat','brokat2.jpg',50000,'kain brokat motif camila warna coklat bahan kain brokat 1.4m sangat nyaman dan tidak gatal.\r\n\r\n',4),
	(19,'kain brokat motif camila warna pink','brokat3.jpg',50000,'kain brokat motif camila warna pink bahan kain brokat ukuran  1.4m sangat nyaman dan tidak gatal.\r\n\r\n',4),
	(20,'kainsatin','brokat3.jpg',75000,'kain satin',2);

/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `nama`, `email`, `password`)
VALUES
	(1,'Arifin z','ajus@gmail.com','$2y$10$KIalkkaCYkewNVakkcZbV.eloQ8Z33ldeBem2ubdaJuJKgz6Qi/lu'),
	(9,'Arifin','test@abbasi.com','$2y$10$aGEkz2Clw/6tsHoeijMOUOW5IsLuQ89kFBdnI1Ap2y80oWHmIIJqK'),
	(11,'cicak','cicak@ci.vom','$2y$10$PdXuLf8b6RNM8hLbzPcTJ.SIK8aJF6u..DnbmDgydetiMe9Q/sMbG'),
	(12,'arifinn','arifindeath@gmail.com','$2y$10$IZ.kgMf2LyUVd907MIZzuegAr/X79gvZ9tWcYBqG9frc6IjO06LBi'),
	(13,'pakboss','boss@boss.com','$2y$10$UhHFdqiJaC5NXvuup3YYh.E56noAVgTfS/GojBX5sGUqcg2YoOV76'),
	(14,'jasic','jasic@jes.com','$2y$10$5MNQDLzPICleYFhFiANxn.wWI05vhhKh3TQiGUGz5yNiTNyblGyRG'),
	(17,'admin','admin@abbasi.com','$2y$10$5dOsLubDeFyICGzjBR7Y1epRJ9rm4KBDiE7atrVGz2OqSEGQ5Hk06'),
	(18,'Burhan','burhan@abbasi.com','$2y$10$5TcVw6BAIVVAG6Yd71hj0ORlNS3TzneVEkCfU76SESh1c0h0pQVOu');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
