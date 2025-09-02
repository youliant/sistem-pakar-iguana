-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 05:01 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iguana_fcdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Dokter','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `nama`, `alamat`, `username`, `password`, `level`) VALUES
('D2796', 'adjdj', 'hajha', 'admin', '123', 'Admin'),
('user1282', 'kiko', '1ma', 'kiko', '123', 'User'),
('user3530', 'hani', 'bandung', 'hani', '123', 'User'),
('user6932', 'pasien', 'asd', 'samsul', '123', 'User'),
('user7140', 'handoko bujang', 'bandung', 'handoko ', '123', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_g` int(20) NOT NULL,
  `kd_gejala` varchar(20) NOT NULL,
  `gejala` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_g`, `kd_gejala`, `gejala`) VALUES
(124, 'G01', 'Berat badan turun'),
(125, 'G02', 'Diare'),
(126, 'G03', 'Muntah'),
(127, 'G04', 'Kehilangan nafsu makan'),
(128, 'G05', 'Lesu'),
(129, 'G06', 'Benjolan keras dibawah kulit'),
(130, 'G07', 'Berwarna Kemerahan'),
(131, 'G08', 'Hangat saat di sentuh'),
(132, 'G09', 'Pembengkakan perut'),
(133, 'G10', 'Gelisah'),
(134, 'G11', 'Pelebaran perut'),
(135, 'G12', 'Tulang Lemah'),
(136, 'G13', 'Deformitas tulang'),
(137, 'G14', 'Kesulitan Bergerak'),
(138, 'G15', 'Tremor'),
(139, 'G16', 'Lumpuh'),
(140, 'G17', 'Gatal'),
(141, 'G18', 'Iritasi kulit'),
(142, 'G19', 'Bercak merah pada kulit'),
(143, 'G20', 'Keropeng'),
(144, 'G21', 'Kehilangan darah'),
(145, 'G22', 'Pembengkakan pada tungkai kaki'),
(146, 'G23', 'Nyeri'),
(147, 'G24', 'Mengeluarkan cairan nanah'),
(148, 'G25', 'Perilaku menggali'),
(149, 'G26', 'Tinja tidak normal'),
(150, 'G27', 'Rahang membengkak dan melunak'),
(151, 'G28', 'Kelemahan otot'),
(152, 'G29', 'Kepala tampak membulat'),
(153, 'G30', 'Kaki membengkok');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `no_ip` varchar(55) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nama_iguana` varchar(150) NOT NULL,
  `umur_iguana` varchar(55) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `penyakit` varchar(55) NOT NULL,
  `tgl_diagnosa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `no_ip`, `nama`, `nama_iguana`, `umur_iguana`, `alamat`, `penyakit`, `tgl_diagnosa`) VALUES
(36, '::1', 'jaka', 'jaki', '87', 'bandung', 'Prolaps Rektum', '2023-08-20'),
(37, '::1', 'handoko', 'samsul', '89', 'bandung', 'Parasit Internal ( Endoparasit)', '2024-08-12'),
(38, '::1', 'popo', 'koko', '7 bulan', 'bandung', 'Parasit Internal ( Endoparasit)', '2024-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_k` int(11) NOT NULL,
  `kd_penyakit` varchar(20) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `info_penyakit` varchar(155) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_k`, `kd_penyakit`, `penyakit`, `info_penyakit`, `solusi`) VALUES
(37, 'P1', 'Parasit Eksternal ( Ektoparasit)', 'Iguana juga rentan terhadap parasit kulit seperti tungau atau kutu. Tungau merah atau hitam, menempel pada bagian tubuh iguana yang berbeda dan memakan dar', 'Jika mencurigai adanya tungau, periksa iguana dan kandangnya, terutama air. Tungau sangat kecil, tetapi kamu dapat melihatnya jika melihat dari dekat. Gunakan semprotan tungau reptil seperti ini pada kulit iguana dan saat membersihkan kandang.'),
(38, 'P2', 'Abses', 'Infeksi bakteri menyebabkan pembengkakan berisi nanah', ' Solusinya adalah tindakan pembedahan untuk mengeluarkan nanah, diikuti dengan pemberian antibiotik dan perawatan luka yang baik.'),
(39, 'P3', 'Egg Retention (Dystocia)', ' Iguana betina mengalami kesulitan mengeluarkan telur.', 'Solusinya adalah menyediakan tempat bertelur yang nyaman, menjaga nutrisi, dan konsultasi dengan dokter hewan jika iguana mengalami kesulitan bertelur.'),
(40, 'P4', 'Metabolic Bone Disease (MBD)', 'Kekurangan kalsium atau sinar UVB menyebabkan tulang rapuh dan lemah', 'Solusinya adalah memberikan suplemen kalsium, sinar UVB yang cukup, dan makanan kaya kalsium.'),
(41, 'P5', 'Parasit Internal ( Endoparasit)', 'Cacing atau parasit lainnya menyerang organ dalam iguana. ', 'Solusinya adalah pemeriksaan feses rutin, pemberian obat cacing, dan menjaga kebersihan lingkungan iguana.');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `ID` int(11) NOT NULL,
  `kd_penyakit` varchar(16) NOT NULL,
  `kd_gejala` varchar(16) NOT NULL,
  `nilai` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`ID`, `kd_penyakit`, `kd_gejala`, `nilai`) VALUES
(497, 'P1', 'G17', '1'),
(498, 'P1', 'G18', '1'),
(499, 'P1', 'G19', '1'),
(500, 'P1', 'G20', '1'),
(501, 'P1', 'G21', '1'),
(502, 'P2', 'G06', '1'),
(503, 'P2', 'G07', '1'),
(504, 'P2', 'G08', '1'),
(505, 'P2', 'G23', '1'),
(506, 'P2', 'G24', '1'),
(507, 'P3', 'G04', '1'),
(508, 'P3', 'G05', '1'),
(509, 'P3', 'G09', '1'),
(510, 'P3', 'G10', '1'),
(511, 'P3', 'G11', '1'),
(512, 'P3', 'G14', '1'),
(513, 'P3', 'G25', '1'),
(514, 'P4', 'G12', '1'),
(515, 'P4', 'G13', '1'),
(516, 'P4', 'G14', '1'),
(517, 'P4', 'G15', '1'),
(518, 'P4', 'G16', '1'),
(519, 'P4', 'G22', '1'),
(520, 'P4', 'G27', '1'),
(521, 'P4', 'G28', '1'),
(522, 'P4', 'G29', '1'),
(523, 'P4', 'G30', '1'),
(524, 'P5', 'G01', '1'),
(525, 'P5', 'G02', '1'),
(526, 'P5', 'G03', '1'),
(527, 'P5', 'G04', '1'),
(528, 'P5', 'G05', '1'),
(529, 'P5', 'G26', '1');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `no_ip` varchar(55) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nama_iguana` varchar(150) NOT NULL,
  `umur_iguana` varchar(55) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_g`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_k`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_g` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;
--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
