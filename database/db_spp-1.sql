-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2020 at 11:15 AM
-- Server version: 5.1.62
-- PHP Version: 5.4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(25) NOT NULL,
  `kompetensi_keahlian` varchar(40) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2017122 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(120401, '12 RPL 1', 'Rekayasa Perangkat Lunak'),
(120201, '12 AP 1', 'Otomatisasi dan Tata Kelola Perkantoran'),
(120100, '12 AK', 'Akuntansi dan Keuangan Lembaga'),
(100201, '10 AP 1', 'Otomatisasi dan Tata Kelola Perkantoran'),
(110401, '11 RPL 1', 'Rekayasa Perangkat Lunak'),
(100100, '10 AK', 'Akuntansi dan Keuangan Lembaga'),
(100202, '10 AP 2', 'Otomatisasi dan Tata Kelola Perkantoran'),
(100401, '10 RPL 1', 'Rekayasa Perangkat Lunak'),
(100402, '10 RPL 2', 'Rekayasa Perangkat Lunak'),
(100300, '10 Farmasi', 'Farmasi Klinis dan Komunitas'),
(100501, '10 TKR 1', 'Teknik Kendaraan Ringan Otomotif'),
(100502, '10 TKR 2', 'Teknik Kendaraan Ringan Otomotif'),
(100600, '10 TSM', 'Teknik dan Bisnis Sepeda Motor'),
(110100, '11 AK', 'Akuntansi dan Keuangan Lembaga'),
(110201, '11 AP 1', 'Otomatisasi dan Tata Kelola Perkantoran'),
(110202, '11 AP 2', 'Otomatisasi dan Tata Kelola Perkantoran'),
(110402, '11 RPL 2', 'Rekayasa Perangkat Lunak'),
(110300, '11 Farmasi', 'Farmasi Klinis dan Komunitas'),
(110501, '11 TKR 1', 'Teknik Kendaraan Ringan Otomotif'),
(110502, '11 TKR 2', 'Teknik Kendaraan Ringan Otomotif'),
(110600, '11 TSM', 'Teknik dan Bisnis Sepeda Motor'),
(120202, '12 AP 2', 'Otomatisasi dan Tata Kelola Perkantoran'),
(120300, '12 Farmasi', 'Farmasi Klinis dan Komunitas'),
(120402, '12 RPL 2', 'Rekayasa Perangkat Lunak'),
(120501, '12 TKR 1', 'Teknik Kendaraan Ringan Otomotif'),
(120502, '12 TKR 2', 'Teknik Kendaraan Ringan Otomotif'),
(120600, '12 TSM', 'Teknik dan Bisnis Sepeda Motor');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bulan_dibayar` varchar(10) NOT NULL,
  `tahun_dibayar` year(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_spp` (`id_spp`),
  KEY `nisn` (`nisn`),
  KEY `id_petugas` (`id_petugas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=346465 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tanggal_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(201104, 201, 18110519, '2020-04-02', 'April', 2020, 191119, '80000');

--
-- Triggers `pembayaran`
--
DROP TRIGGER IF EXISTS `bayar`;
DELIMITER //
CREATE TRIGGER `bayar` AFTER INSERT ON `pembayaran`
 FOR EACH ROW update spp
set jumlah_bayar = jumlah_bayar - new.jumlah_bayar
where id_spp = new.id_spp
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas','siswa') NOT NULL,
  `picture` text NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7728273 ;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`, `picture`) VALUES
(101, 'admin', '123', 'Iwan Sopian', 'admin', 'img1.jpg'),
(301, 'mj', '098', 'Rika Ramanda', 'siswa', 'img3.jpg'),
(201, 'cici', 'tu123', 'Chi-chi', 'petugas', 'img2.jpg'),
(302, 'Rini', 'rika', 'Rini Kartini', 'siswa', 'img3.jpg'),
(303, 'ahmad', 'faruk', 'Ahmad Baehaki', 'siswa', 'img3.jpg'),
(304, 'windov', 'indri', 'windi indriani', 'siswa', 'img3.jpg'),
(305, 'lucu', '333', 'Hayomi', 'siswa', 'img3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nisn` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  PRIMARY KEY (`nisn`),
  KEY `id_spp` (`id_spp`),
  KEY `id_kelas` (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
(17120401, 171802819, 'Ahmad Baehaki', 120401, 'Cibiuk', '0817483647', 181227),
(17120501, 171802528, 'Agung Lesmana', 120501, 'Ciduga', '08133483647', 181227),
(17120304, 171802921, 'Ayu Lizah', 120300, 'Ciduga', '081910483647', 181227),
(17120228, 171803729, 'Yulan Yuliandini', 120201, 'Bojong', '081919164799', 181227),
(18110305, 181903528, 'Dhini Naura Nurfadila', 100300, 'Banyuresmi', '08246649464', 191119),
(18110519, 181903730, 'Rizal', 110502, 'Patrol', '08649464972', 191119),
(18110438, 181903416, 'Zaki', 110402, 'Cileungsing', '082147483647', 191119),
(18110435, 181903817, 'Putri Nabilla', 110401, 'Sumeuni', '08543184643', 191119),
(18110419, 181903627, 'Rika Ramanda', 110402, 'Banyuresmi', '08598559844', 191119),
(19100339, 192004919, 'Wini', 100300, 'Burujul', '08171818184', 201027),
(19100128, 192004623, 'Windi Indriani', 100100, 'Ciduga', '082147483647', 201027),
(17120418, 171802319, 'Rini Kartini', 120402, 'Cileungsing', '082147483647', 181227),
(19100413, 192004316, 'Imas', 100402, 'Cileungsing', '083928188191', 201027),
(19100106, 192004613, 'Alya', 100100, 'Patrol', '08187483647', 201027),
(19100215, 192004618, 'Hayomi', 100202, 'Banyuresmi', '084992719198', 201027);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE IF NOT EXISTS `spp` (
  `id_spp` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `nominal` varchar(35) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_spp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=202013 ;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`, `jumlah_bayar`) VALUES
(181227, 2018, '50000', 300000),
(191119, 2019, '60000', 280000),
(201027, 2020, '70000', 560000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
