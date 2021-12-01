/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ akademik /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE akademik;

DROP TABLE IF EXISTS khs;
CREATE TABLE `khs` (
  `id_khs` int(11) NOT NULL AUTO_INCREMENT,
  `NIM` varchar(5) NOT NULL,
  `kodeMK` varchar(5) NOT NULL,
  `nilai` varchar(2) NOT NULL,
  PRIMARY KEY (`id_khs`),
  KEY `kodeMK` (`kodeMK`),
  CONSTRAINT `khs_ibfk_1` FOREIGN KEY (`kodeMK`) REFERENCES `matakuliah` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS mahasiswa;
CREATE TABLE `mahasiswa` (
  `nim` varchar(5) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `jkel` varchar(1) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tgllhr` date DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS matakuliah;
CREATE TABLE `matakuliah` (
  `kode` varchar(5) NOT NULL,
  `namamk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO khs(id_khs,NIM,kodeMK,nilai) VALUES(1,'MHS01','TI003','92'),(2,'MHS02','TI001','87'),(3,'MHS03','TI005','75'),(4,'MHS04','TI002','90'),(5,'MHS06','TI004','78'),(6,'MHS02','TI006','98'),(7,'MHS03','TI002','85');

INSERT INTO mahasiswa(nim,nama,jkel,alamat,tgllhr,jurusan) VALUES('MHS01','Siti Amina','P',X'534f4c4f','1995-10-01','INFORMATIKA'),('MHS02','Rita','P',X'534f4c4f','1999-01-01','ELEKTRO'),('MHS03','Amirudin','L',X'53454d4152414e47','1998-08-11','KIMIA'),('MHS04','Siti Marya','P',X'4a414b41525441','1995-04-15','INFORMATIKA');

INSERT INTO matakuliah(kode,namamk,sks,sem) VALUES('TI001','Keamanan Komputer',3,5),('TI002','Pemrograman Web Dinamis',3,5),('TI003','Teori Bahasa Otomata',2,5),('TI004','Pembelajaran Mesin',2,5),('TI005','Pemrograman Mobile',3,5),('TI006','Sistem Pendukung Keputusan',2,5);
INSERT INTO users(id_user,password,nama_lengkap,email,alamat,level) VALUES('alfianina','18958dd9ad734fffe467926e27fa827e','Alfian Hakim','alfianhakim93@gmail.com',X'','user'),('sebvettel','b2961182974f865e10390d26c2fe993c','Sebastian Vettel','sebvettel@gmail.com',X'','user'),('tahubulat','827ccb0eea8a706c4c34a16891f84e7b','Tahu Bulat','tahu@gmail.com',X'4b75746f77696e616e67756e','user');
