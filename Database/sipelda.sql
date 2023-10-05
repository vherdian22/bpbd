-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.1.0-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sipelda
CREATE DATABASE IF NOT EXISTS `sipelda` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `sipelda`;

-- Dumping structure for table sipelda.input_laporan_bencana
CREATE TABLE IF NOT EXISTS `input_laporan_bencana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `rw` varchar(50) DEFAULT NULL,
  `rt` varchar(50) DEFAULT NULL,
  `dusun` varchar(50) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `koordinat` varchar(50) DEFAULT NULL,
  `jenis_bencana` varchar(50) DEFAULT NULL,
  `kronologi` varchar(10000) DEFAULT NULL,
  `kerusakan` varchar(50) DEFAULT NULL,
  `korban_jiwa` varchar(50) DEFAULT NULL,
  `korban_lk` varchar(50) DEFAULT NULL,
  `korban_pr` varchar(50) DEFAULT NULL,
  `fasum` varchar(50) DEFAULT NULL,
  `infra` varchar(50) DEFAULT NULL,
  `harta` varchar(50) DEFAULT NULL,
  `unit_usaha` varchar(50) DEFAULT NULL,
  `kerugian` varchar(50) DEFAULT NULL,
  `nama_korban` varchar(50000) DEFAULT NULL,
  `jumlah_luka` varchar(50) DEFAULT NULL,
  `jumlah_hilang` varchar(50) DEFAULT NULL,
  `keterangan_bantuan` varchar(50) DEFAULT NULL,
  `petugas_piket` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table sipelda.input_laporan_bencana: ~2 rows (approximately)
DELETE FROM `input_laporan_bencana`;
/*!40000 ALTER TABLE `input_laporan_bencana` DISABLE KEYS */;
INSERT INTO `input_laporan_bencana` (`id`, `tanggal`, `waktu`, `alamat`, `rw`, `rt`, `dusun`, `desa`, `kecamatan`, `koordinat`, `jenis_bencana`, `kronologi`, `kerusakan`, `korban_jiwa`, `korban_lk`, `korban_pr`, `fasum`, `infra`, `harta`, `unit_usaha`, `kerugian`, `nama_korban`, `jumlah_luka`, `jumlah_hilang`, `keterangan_bantuan`, `petugas_piket`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, '2023-07-21', '123', '123', '1', '1', '1', '1', '1', '123', 'Tanah Longsor', '123', '123', '123', '123', '123', '123', '132', '123', '123', '123', '123', '123', '123', '123', '123');
/*!40000 ALTER TABLE `input_laporan_bencana` ENABLE KEYS */;

-- Dumping structure for table sipelda.register
CREATE TABLE IF NOT EXISTS `register` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table sipelda.register: ~4 rows (approximately)
DELETE FROM `register`;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` (`username`, `password`, `level`, `email`) VALUES
	('abdulghani', 'payakumbuh123', 'Admin', '123123'),
	('admin', 'admin', 'Admin', 'admin@gmail.com'),
	('lapangan', 'lapangan', 'Lapangan', 'lapangan@gmail.com'),
	('operator', 'operator', 'Operator', 'operator@gmail.com');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
