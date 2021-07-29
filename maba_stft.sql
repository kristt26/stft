# Host: localhost  (Version 5.5.5-10.4.17-MariaDB)
# Date: 2021-07-30 07:55:24
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "asal_keuskupan"
#

DROP TABLE IF EXISTS `asal_keuskupan`;
CREATE TABLE `asal_keuskupan` (
  `kd_keuskupan` varchar(4) NOT NULL,
  `nama_keuskupan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`kd_keuskupan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "asal_keuskupan"
#

INSERT INTO `asal_keuskupan` VALUES ('K-01','Keuskupan Agats','Jl. Frans Kaisepo, Bis Agats, Agats, Kabupaten Asmat, Papua 99777'),('K-02','Kesukupan Timika','Jl. Cendrawasih No.12, Kwamki, Kec. Mimika Baru'),('K-03','Keuskupan Agung Merauke','Jl. Raya Mandala No. 30, Karang Indah Kec.Merauke');

#
# Structure for table "berita"
#

DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `kd_berita` varchar(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_berita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "berita"
#

INSERT INTO `berita` VALUES ('B-001','BEM STFT Fajar Timur periode 2021/2022 Terpilih di lantik','<p>fdrdtrdt ftfytf g r ft  y ft   </p>','2021-07-13','berita2.jpg'),('B-002','afdasdf','<p>asdfasdfasdfa</p>','2021-07-30','Taman_Alam_Sorong.jpg');

#
# Structure for table "data_diri"
#

DROP TABLE IF EXISTS `data_diri`;
CREATE TABLE `data_diri` (
  `kd_maba` varchar(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `kd_keuskupan` varchar(4) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `kartu_keluarga` varchar(100) NOT NULL,
  `surat_baptis` varchar(100) NOT NULL,
  `ijazah` varchar(100) NOT NULL,
  `status_berkas` varchar(11) NOT NULL,
  `kd_tahun_ajaran` varchar(255) DEFAULT NULL,
  `kd_gelombang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_maba`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "data_diri"
#

INSERT INTO `data_diri` VALUES ('CM-001-19','Demian','asti','asti','gddh','2021-07-16','perempuan','775656565','K-02','ktp.jpg','kk.jpg','surat_baptis.jpg','iajzah.jpg','valid','T-2019-1','G-1'),('CM-002-19','Roki','roki','roki','Abepura','2021-07-20','laki-laki','5757676776','K-02','ktp2.jpg','kk2.jpg','surat_baptis2.jpg','iajzah2.jpg','valid','T-2019-1','G-1'),('CM-003-19','Andre','joki','joki','jayapura','2021-07-20','laki-laki','75586868','K-02','ktp3.jpg','kk3.jpg','surat_baptis3.jpg','iajzah3.jpg','valid','T-2019-1','G-1'),('CM-004-19','Alberto','sepnat','sepnat','biak','2021-07-22','laki-laki','765567888','K-01','ktp4.jpg','kk4.jpg','surat_baptis4.jpg','iajzah4.jpg','valid','T-2019-1','G-1'),('CM-005-19','Fany','fani','fani','Timika','2021-07-13','perempuan','081345653422','K-02','ktp5.jpg','kk5.jpg','surat_baptis5.jpg','iajzah5.jpg','','T-2019-1','G-1'),('CM-006-19','Candra Putra','candra26','admin','Arso','1995-02-20','laki-laki','082238281801','K-03','tugas_perangkat_keras8.PNG','tugas_perangkat_keras9.PNG','tugas_perangkat_keras10.PNG','tugas_perangkat_keras11.PNG','','T-2019-1','G-1');

#
# Structure for table "dosen"
#

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nidn` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "dosen"
#


#
# Structure for table "gelombang"
#

DROP TABLE IF EXISTS `gelombang`;
CREATE TABLE `gelombang` (
  `kd_gelombang` varchar(3) NOT NULL,
  `gelombang` varchar(12) NOT NULL,
  PRIMARY KEY (`kd_gelombang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "gelombang"
#

INSERT INTO `gelombang` VALUES ('G-1','Gelombang-1'),('G-2','Gelombang-2');

#
# Structure for table "hasil_ujian"
#

DROP TABLE IF EXISTS `hasil_ujian`;
CREATE TABLE `hasil_ujian` (
  `kd_hasil_ujian` varchar(6) NOT NULL,
  `kd_maba` varchar(9) NOT NULL,
  `kd_ujian` varchar(5) NOT NULL,
  `nilai` int(4) NOT NULL,
  PRIMARY KEY (`kd_hasil_ujian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "hasil_ujian"
#

INSERT INTO `hasil_ujian` VALUES ('HU-001','CM-001-19','U-1',60),('HU-002','CM-002-19','U-1',60),('HU-003','CM-003-19','U-1',50),('HU-004','CM-003-19','U-2',60),('HU-005','CM-006-19','U-1',65);

#
# Structure for table "jadwal"
#

DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal` (
  `kd_jadwal` varchar(4) NOT NULL,
  `kd_ujian` varchar(3) NOT NULL,
  `jam_mulai` time NOT NULL DEFAULT '00:00:00',
  `jam_selesai` time DEFAULT NULL,
  `tanggal` date NOT NULL,
  `kd_gelombang` varchar(3) NOT NULL,
  `kd_maba` varchar(9) NOT NULL,
  `kd_tahun_ajaran` varchar(9) NOT NULL,
  `jam_ujian` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "jadwal"
#

INSERT INTO `jadwal` VALUES ('J-01','U-1','03:50:00','05:05:00','2021-07-30','G-1','','T-2019-1',NULL),('J-03','U-2','04:30:00','06:30:00','2021-07-30','G-1','','T-2019-1',NULL);

#
# Structure for table "jawaban"
#

DROP TABLE IF EXISTS `jawaban`;
CREATE TABLE `jawaban` (
  `kd_jawaban` int(6) NOT NULL AUTO_INCREMENT,
  `kd_maba` varchar(9) NOT NULL,
  `kd_soal_valid` varchar(5) NOT NULL,
  `jawaban` text NOT NULL,
  PRIMARY KEY (`kd_jawaban`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

#
# Data for table "jawaban"
#

INSERT INTO `jawaban` VALUES (1,'CM-002-19','SV-01','54545'),(2,'CM-002-19','SV-02','6464'),(3,'CM-001-19','SV-01','64646'),(4,'CM-001-19','SV-02','4343'),(5,'CM-003-19','SV-01','434343'),(6,'CM-003-19','SV-02','544433'),(7,'CM-003-19','SV-03','ddsa'),(8,'CM-003-19','SV-04','dsad'),(9,'CM-003-19','SV-05','asdas'),(10,'CM-003-19','SV-06','assas'),(11,'CM-001-19','SV-03','Frasa atau frase adalah sebuah makanan linguistik. Lebih tepatnya, frasa merupakan satuan linguistik yang lebih besar dari kata dan lebih kecil dari klausa dan kalimat. Frasa adalah kumpulan kata nonpredikatif. Artinya frasa tidak memiliki predikat dalam strukturnya. Itu yang membedakan frasa dari klausa dan kalimat.'),(12,'CM-001-19','SV-04','gigi+er = gerigi'),(13,'CM-001-19','SV-05','Kata dasar adalah kata yang ditulis sebagai satu kesatuan sedangkan kata turunan sering disebut juga sebagai kata berimbuhan.\r\nKata berimbuhan adalah kata dasar yang telah mendapatkan imbuhan baik itu awalan, akhiran, sisipan, maupun awalan dan akhiran.'),(14,'CM-001-19','SV-06','Huruf miring dalam cetakan dipakai untuk menuliskan nama buku, majalah, dan surat kabar yang dikutip dalam tulisan.'),(15,'CM-006-19','SV-01','1231'),(16,'CM-006-19','SV-02','321231');

#
# Structure for table "soal_tes"
#

DROP TABLE IF EXISTS `soal_tes`;
CREATE TABLE `soal_tes` (
  `kd_soal_tes` varchar(5) NOT NULL,
  `soal` text NOT NULL,
  `kd_ujian` varchar(3) NOT NULL,
  PRIMARY KEY (`kd_soal_tes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "soal_tes"
#

INSERT INTO `soal_tes` VALUES ('ST-01','X2 + 24 35 y','U-1'),('ST-02','12x + 25y -12','U-1'),('ST-03','apa yang dimaksud dengan frasa ?','U-2'),('ST-04','tuliskan contoh kalimat yang menggunakan berimbuhan sisipan ?','U-2'),('ST-05','Apa perbedaan dari kata dasar, kata turunan, dan kata berimbuhan?','U-2'),('ST-06','Kapan kita diharuskan untuk menggunakan huruf miring?','U-2'),('ST-07','2j','U-1');

#
# Structure for table "standar_kelulusan"
#

DROP TABLE IF EXISTS `standar_kelulusan`;
CREATE TABLE `standar_kelulusan` (
  `kd_standar_kelulusan` varchar(6) NOT NULL,
  `kd_ujian` varchar(3) NOT NULL,
  `nilai` int(4) NOT NULL,
  PRIMARY KEY (`kd_standar_kelulusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "standar_kelulusan"
#

INSERT INTO `standar_kelulusan` VALUES ('SK-1','U-1',60),('SK-2','U-2',80);

#
# Structure for table "tahun_ajaran"
#

DROP TABLE IF EXISTS `tahun_ajaran`;
CREATE TABLE `tahun_ajaran` (
  `kd_tahun_ajaran` varchar(9) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  PRIMARY KEY (`kd_tahun_ajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tahun_ajaran"
#

INSERT INTO `tahun_ajaran` VALUES ('T-2019-1','2018/2019'),('T-2019-2','2018/2019');

#
# Structure for table "ujian"
#

DROP TABLE IF EXISTS `ujian`;
CREATE TABLE `ujian` (
  `kd_ujian` varchar(3) NOT NULL,
  `nama_ujian` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_ujian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "ujian"
#

INSERT INTO `ujian` VALUES ('U-1','matematika'),('U-2','Bahsa indonesia');

#
# Structure for table "validasi_soal_tes"
#

DROP TABLE IF EXISTS `validasi_soal_tes`;
CREATE TABLE `validasi_soal_tes` (
  `kd_soal_valid` varchar(5) NOT NULL,
  `kd_soal_tes` varchar(5) NOT NULL,
  `status_validasi` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`kd_soal_valid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "validasi_soal_tes"
#

INSERT INTO `validasi_soal_tes` VALUES ('SV-01','ST-01','Valid','Soal Valid'),('SV-02','ST-02','Valid','Soal Valid'),('SV-03','ST-03','Valid','Soal Valid'),('SV-04','ST-04','Valid','Soal Valid'),('SV-05','ST-05','Valid','Soal Valid'),('SV-06','ST-06','Valid','Soal Valid');
