-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 03:21 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maba_stft`
--

-- --------------------------------------------------------

--
-- Table structure for table `asal_keuskupan`
--

CREATE TABLE `asal_keuskupan` (
  `kd_keuskupan` varchar(4) NOT NULL,
  `nama_keuskupan` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asal_keuskupan`
--

INSERT INTO `asal_keuskupan` (`kd_keuskupan`, `nama_keuskupan`, `alamat`) VALUES
('K-01', 'Keuskupan Agats', 'Jl. Frans Kaisepo, Bis Agats, Agats, Kabupaten Asmat, Papua 99777'),
('K-02', 'Kesukupan Timika', 'Jl. Cendrawasih No.12, Kwamki, Kec. Mimika Baru'),
('K-03', 'Keuskupan Agung Merauke', 'Jl. Raya Mandala No. 30, Karang Indah Kec.Merauke');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `kd_berita` varchar(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`kd_berita`, `judul`, `isi_berita`, `tanggal`, `gambar`) VALUES
('B-001', 'BEM STFT Fajar Timur periode 2021/2022 Terpilih di lantik', '<p>fdrdtrdt ftfytf g r ft  y ft   </p>', '2021-07-13', 'berita2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_diri`
--

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
  `status_berkas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_diri`
--

INSERT INTO `data_diri` (`kd_maba`, `nama`, `username`, `password`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `kd_keuskupan`, `ktp`, `kartu_keluarga`, `surat_baptis`, `ijazah`, `status_berkas`) VALUES
('CM-001-19', 'Demian', 'asti', 'asti', 'gddh', '2021-07-16', 'perempuan', '775656565', 'K-02', 'ktp.jpg', 'kk.jpg', 'surat_baptis.jpg', 'iajzah.jpg', 'valid'),
('CM-002-19', 'Roki', 'roki', 'roki', 'Abepura', '2021-07-20', 'laki-laki', '5757676776', 'K-02', 'ktp2.jpg', 'kk2.jpg', 'surat_baptis2.jpg', 'iajzah2.jpg', 'valid'),
('CM-003-19', 'Andre', 'joki', 'joki', 'jayapura', '2021-07-20', 'laki-laki', '75586868', 'K-02', 'ktp3.jpg', 'kk3.jpg', 'surat_baptis3.jpg', 'iajzah3.jpg', 'valid'),
('CM-004-19', 'Alberto', 'sepnat', 'sepnat', 'biak', '2021-07-22', 'laki-laki', '765567888', 'K-01', 'ktp4.jpg', 'kk4.jpg', 'surat_baptis4.jpg', 'iajzah4.jpg', 'valid'),
('CM-005-19', 'Fany', 'fani', 'fani', 'Timika', '2021-07-13', 'perempuan', '081345653422', 'K-02', 'ktp5.jpg', 'kk5.jpg', 'surat_baptis5.jpg', 'iajzah5.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `kd_gelombang` varchar(3) NOT NULL,
  `gelombang` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`kd_gelombang`, `gelombang`) VALUES
('G-1', 'Gelombang-1'),
('G-2', 'Gelombang-2');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian`
--

CREATE TABLE `hasil_ujian` (
  `kd_hasil_ujian` varchar(6) NOT NULL,
  `kd_maba` varchar(9) NOT NULL,
  `kd_ujian` varchar(5) NOT NULL,
  `nilai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_ujian`
--

INSERT INTO `hasil_ujian` (`kd_hasil_ujian`, `kd_maba`, `kd_ujian`, `nilai`) VALUES
('HU-001', 'CM-001-19', 'U-1', 60),
('HU-002', 'CM-002-19', 'U-1', 60),
('HU-003', 'CM-003-19', 'U-1', 50),
('HU-004', 'CM-003-19', 'U-2', 60);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kd_jadwal` varchar(4) NOT NULL,
  `kd_ujian` varchar(3) NOT NULL,
  `jam_ujian` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `kd_gelombang` varchar(3) NOT NULL,
  `kd_maba` varchar(9) NOT NULL,
  `kd_tahun_ajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `kd_ujian`, `jam_ujian`, `tanggal`, `kd_gelombang`, `kd_maba`, `kd_tahun_ajaran`) VALUES
('J-01', 'U-1', '10.00-12.00', '2021-07-05', 'G-1', 'CM-001-19', 'T-2019-1'),
('J-02', 'U-1', '10.00-12.00', '2021-07-05', 'G-1', 'CM-002-19', 'T-2019-1'),
('J-03', 'U-1', '10.00-12.00', '2021-07-05', 'G-1', 'CM-003-19', 'T-2019-1'),
('J-04', 'U-2', '12.00-13.00', '2021-07-16', 'G-1', 'CM-003-19', 'T-2019-1'),
('J-05', 'U-1', '10.00-12.00', '2021-07-07', 'G-2', 'CM-004-19', 'T-2019-1'),
('J-06', 'U-2', '12.30-13.30', '2021-07-16', 'G-1', 'CM-001-19', 'T-2019-1');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `kd_jawaban` int(6) NOT NULL,
  `kd_maba` varchar(9) NOT NULL,
  `kd_soal_valid` varchar(5) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`kd_jawaban`, `kd_maba`, `kd_soal_valid`, `jawaban`) VALUES
(1, 'CM-002-19', 'SV-01', '54545'),
(2, 'CM-002-19', 'SV-02', '6464'),
(3, 'CM-001-19', 'SV-01', '64646'),
(4, 'CM-001-19', 'SV-02', '4343'),
(5, 'CM-003-19', 'SV-01', '434343'),
(6, 'CM-003-19', 'SV-02', '544433'),
(7, 'CM-003-19', 'SV-03', 'ddsa'),
(8, 'CM-003-19', 'SV-04', 'dsad'),
(9, 'CM-003-19', 'SV-05', 'asdas'),
(10, 'CM-003-19', 'SV-06', 'assas'),
(11, 'CM-001-19', 'SV-03', 'Frasa atau frase adalah sebuah makanan linguistik. Lebih tepatnya, frasa merupakan satuan linguistik yang lebih besar dari kata dan lebih kecil dari klausa dan kalimat. Frasa adalah kumpulan kata nonpredikatif. Artinya frasa tidak memiliki predikat dalam strukturnya. Itu yang membedakan frasa dari klausa dan kalimat.'),
(12, 'CM-001-19', 'SV-04', 'gigi+er = gerigi'),
(13, 'CM-001-19', 'SV-05', 'Kata dasar adalah kata yang ditulis sebagai satu kesatuan sedangkan kata turunan sering disebut juga sebagai kata berimbuhan.\r\nKata berimbuhan adalah kata dasar yang telah mendapatkan imbuhan baik itu awalan, akhiran, sisipan, maupun awalan dan akhiran.'),
(14, 'CM-001-19', 'SV-06', 'Huruf miring dalam cetakan dipakai untuk menuliskan nama buku, majalah, dan surat kabar yang dikutip dalam tulisan.');

-- --------------------------------------------------------

--
-- Table structure for table `soal_tes`
--

CREATE TABLE `soal_tes` (
  `kd_soal_tes` varchar(5) NOT NULL,
  `soal` text NOT NULL,
  `kd_ujian` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_tes`
--

INSERT INTO `soal_tes` (`kd_soal_tes`, `soal`, `kd_ujian`) VALUES
('ST-01', 'X2 + 24 35 y', 'U-1'),
('ST-02', '12x + 25y -12', 'U-1'),
('ST-03', 'apa yang dimaksud dengan frasa ?', 'U-2'),
('ST-04', 'tuliskan contoh kalimat yang menggunakan berimbuhan sisipan ?', 'U-2'),
('ST-05', 'Apa perbedaan dari kata dasar, kata turunan, dan kata berimbuhan?', 'U-2'),
('ST-06', 'Kapan kita diharuskan untuk menggunakan huruf miring?', 'U-2'),
('ST-07', '2j', 'U-1');

-- --------------------------------------------------------

--
-- Table structure for table `standar_kelulusan`
--

CREATE TABLE `standar_kelulusan` (
  `kd_standar_kelulusan` varchar(6) NOT NULL,
  `kd_ujian` varchar(3) NOT NULL,
  `nilai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standar_kelulusan`
--

INSERT INTO `standar_kelulusan` (`kd_standar_kelulusan`, `kd_ujian`, `nilai`) VALUES
('SK-1', 'U-1', 60),
('SK-2', 'U-2', 80);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `kd_tahun_ajaran` varchar(9) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`kd_tahun_ajaran`, `tahun_ajaran`) VALUES
('T-2019-1', '2018/2019'),
('T-2019-2', '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `kd_ujian` varchar(3) NOT NULL,
  `nama_ujian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`kd_ujian`, `nama_ujian`) VALUES
('U-1', 'matematika'),
('U-2', 'Bahsa indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `validasi_soal_tes`
--

CREATE TABLE `validasi_soal_tes` (
  `kd_soal_valid` varchar(5) NOT NULL,
  `kd_soal_tes` varchar(5) NOT NULL,
  `status_validasi` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi_soal_tes`
--

INSERT INTO `validasi_soal_tes` (`kd_soal_valid`, `kd_soal_tes`, `status_validasi`, `keterangan`) VALUES
('SV-01', 'ST-01', 'Valid', 'Soal Valid'),
('SV-02', 'ST-02', 'Valid', 'Soal Valid'),
('SV-03', 'ST-03', 'Valid', 'Soal Valid'),
('SV-04', 'ST-04', 'Valid', 'Soal Valid'),
('SV-05', 'ST-05', 'Valid', 'Soal Valid'),
('SV-06', 'ST-06', 'Valid', 'Soal Valid'),
('SV-07', 'ST-07', 'Tidak Valid', 'Soal tidak lengkap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asal_keuskupan`
--
ALTER TABLE `asal_keuskupan`
  ADD PRIMARY KEY (`kd_keuskupan`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`kd_berita`);

--
-- Indexes for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`kd_maba`);

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`kd_gelombang`);

--
-- Indexes for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD PRIMARY KEY (`kd_hasil_ujian`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`kd_jawaban`);

--
-- Indexes for table `soal_tes`
--
ALTER TABLE `soal_tes`
  ADD PRIMARY KEY (`kd_soal_tes`);

--
-- Indexes for table `standar_kelulusan`
--
ALTER TABLE `standar_kelulusan`
  ADD PRIMARY KEY (`kd_standar_kelulusan`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`kd_tahun_ajaran`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`kd_ujian`);

--
-- Indexes for table `validasi_soal_tes`
--
ALTER TABLE `validasi_soal_tes`
  ADD PRIMARY KEY (`kd_soal_valid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `kd_jawaban` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
