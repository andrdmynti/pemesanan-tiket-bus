-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 06:30 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumberalam`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(20) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `id_berangkat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id_bus`, `kelas`, `harga`, `id_berangkat`) VALUES
(1, 'Ekonomi', '65000', 1),
(2, 'Patas Non AC', '100000', 2),
(3, 'Ekonomi AC', '85000', 0),
(4, 'AC Non Toilet', '100000', 0),
(5, 'AC Toilet', '120000', 0),
(6, 'Ekonomi', '85000', 0),
(7, 'Patas Non AC', '125000', 0),
(8, 'Ekonomi AC', '100000', 0),
(9, 'AC Non Toilet', '135000', 0),
(10, 'AC Toilet', '160000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keberangkatan`
--

CREATE TABLE `keberangkatan` (
  `id_berangkat` int(20) NOT NULL,
  `tujuan` varchar(40) NOT NULL,
  `jadwal` varchar(10) NOT NULL,
  `rute` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keberangkatan`
--

INSERT INTO `keberangkatan` (`id_berangkat`, `tujuan`, `jadwal`, `rute`) VALUES
(1, 'Purwokerto', '16:00 WIB', 'Bekasi - Purwokerto'),
(2, 'Purwokerto', '17:00 WIB', 'Bekasi - Purwokerto'),
(8, 'Purwokerto', '18:30 WIB', 'Bekasi - Purwokerto'),
(9, 'Purwokerto', '19:00 WIB', 'Bekasi - Purwokerto'),
(10, 'Purwokerto', '19:30 WIB', 'Bekasi - Purwokerto'),
(11, 'Yogyakarta', '20:00 WIB', 'Bekasi - Gombong - Kebumen - Kutoarjo - Purworejo - Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id` int(10) NOT NULL,
  `id_bus` int(10) NOT NULL,
  `kode_kursi` varchar(20) NOT NULL,
  `urutan` int(20) NOT NULL,
  `id_pesan` int(25) NOT NULL,
  `tgl_berangkat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id`, `id_bus`, `kode_kursi`, `urutan`, `id_pesan`, `tgl_berangkat`) VALUES
(1, 1, '01A', 1, 41, '2017-08-20'),
(2, 1, '01B', 2, 41, '2017-08-20'),
(3, 1, '01C', 3, 0, '2017-08-20'),
(4, 1, '01D', 4, 0, '2017-08-20'),
(5, 1, '02A', 5, 0, '2017-08-20'),
(6, 1, '02B', 6, 0, '2017-08-20'),
(7, 1, '02C', 7, 0, '2017-08-20'),
(8, 1, '02D', 8, 0, '2017-08-20'),
(9, 1, '03A', 9, 0, '2017-08-20'),
(10, 1, '03B', 10, 0, '2017-08-20'),
(11, 1, '03C', 11, 0, '2017-08-20'),
(12, 1, '03D', 12, 0, '2017-08-20'),
(13, 1, '04A', 13, 0, '2017-08-20'),
(14, 1, '04B', 14, 0, '2017-08-20'),
(15, 1, '04C', 15, 0, '2017-08-20'),
(16, 1, '04D', 16, 0, '2017-08-20'),
(17, 1, '05A', 17, 0, '2017-08-20'),
(18, 1, '05B', 18, 0, '2017-08-20'),
(19, 1, '05C', 19, 0, '2017-08-20'),
(20, 1, '05D', 20, 0, '2017-08-20'),
(21, 1, '06A', 21, 0, '2017-08-20'),
(22, 1, '06B', 22, 0, '2017-08-20'),
(23, 1, '06C', 23, 0, '2017-08-20'),
(24, 1, '06D', 24, 0, '2017-08-20'),
(25, 1, '07A', 25, 0, '2017-08-20'),
(26, 1, '07B', 26, 0, '2017-08-20'),
(27, 1, '07C', 27, 0, '2017-08-20'),
(28, 1, '07D', 28, 0, '2017-08-20'),
(29, 1, '08A', 29, 0, '2017-08-20'),
(30, 1, '08B', 30, 0, '2017-08-20'),
(31, 1, '08C', 31, 0, '2017-08-20'),
(32, 1, '08D', 32, 28, '2017-08-20'),
(33, 1, '09A', 33, 0, '2017-08-20'),
(34, 1, '09B', 34, 0, '2017-08-20'),
(35, 1, '09C', 35, 0, '2017-08-20'),
(36, 1, '09D', 36, 0, '2017-08-20'),
(37, 1, '10A', 37, 0, '2017-08-20'),
(38, 1, '10B', 38, 0, '2017-08-20'),
(39, 1, '10C', 39, 0, '2017-08-20'),
(40, 1, '10D', 40, 0, '2017-08-20'),
(41, 1, '11C', 43, 0, '2017-08-20'),
(42, 1, '11D', 44, 0, '2017-08-20'),
(43, 1, '12A', 45, 0, '2017-08-20'),
(44, 1, '12B', 46, 0, '2017-08-20'),
(45, 1, '12C', 47, 0, '2017-08-20'),
(46, 1, '12D', 48, 0, '2017-08-20'),
(47, 2, '01A', 1, 41, '2017-08-30'),
(48, 2, '02A', 2, 0, '2017-08-30'),
(49, 2, '03A', 3, 0, '2017-08-30'),
(50, 2, '04A', 4, 0, '2017-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `kursi_pesanan`
--

CREATE TABLE `kursi_pesanan` (
  `id_kursi` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `kode_kursi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi_pesanan`
--

INSERT INTO `kursi_pesanan` (`id_kursi`, `id_pesan`, `kode_kursi`) VALUES
(1, 27, '3'),
(2, 27, '4'),
(3, 27, '8'),
(4, 27, '8'),
(5, 28, '8'),
(6, 28, '8'),
(7, 28, '8'),
(8, 28, '8'),
(9, 29, '12'),
(10, 29, '12'),
(11, 30, '3'),
(12, 30, '3'),
(13, 30, '4'),
(14, 30, '4'),
(17, 33, '4'),
(18, 33, '7'),
(19, 33, '2'),
(20, 34, '5'),
(21, 34, '5'),
(22, 34, '5'),
(23, 35, '06A'),
(26, 36, '01A'),
(27, 36, '01B'),
(28, 37, '04C'),
(29, 37, '07C'),
(30, 41, '01A'),
(31, 41, '01B');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(10) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `nmr_rekening` varchar(30) NOT NULL,
  `atas_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesan` int(20) NOT NULL,
  `id_bus` int(20) NOT NULL,
  `id_berangkat` int(20) NOT NULL,
  `nik` int(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `qty` int(20) NOT NULL,
  `total` varchar(30) NOT NULL,
  `fixed` int(2) NOT NULL,
  `invoice` int(20) NOT NULL,
  `konfirm` int(11) NOT NULL,
  `respons` varchar(50) NOT NULL,
  `pembayaran` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `id_bus`, `id_berangkat`, `nik`, `nama`, `alamat`, `tgl_pesan`, `tgl_berangkat`, `qty`, `total`, `fixed`, `invoice`, `konfirm`, `respons`, `pembayaran`) VALUES
(15, 1, 1, 4, 'a', 'jakarta', '2017-07-18', '2017-07-22', 2, '130000', 0, 206, 0, 'uploads/img51-1314949032.jpg', 0),
(18, 1, 1, 8, 'dian', 'kayuringin', '2017-07-18', '2017-07-28', 3, '195000', 1, 41, 1, 'uploads/img52-1314949172.jpg', 1),
(31, 1, 1, 2123123, 'andi', 'bekasi', '2017-07-20', '2017-07-28', 3, '195000', 1, 937, 0, '', 0),
(32, 1, 1, 90808, 'diana', 'cikarang', '2017-07-20', '2017-07-30', 3, '195000', 1, 970, 0, '', 0),
(33, 1, 1, 9139213, 'ari', 'dimana', '2017-07-22', '2017-07-30', 3, '195000', 1, 108, 0, '', 0),
(34, 1, 1, 897249, 'andri', 'cakung', '2017-07-22', '2017-07-31', 3, '195000', 1, 33, 0, '', 0),
(35, 1, 1, 423414, 'yudi', 'alamat', '2017-07-22', '2017-08-22', 1, '65000', 1, 226, 0, '', 0),
(36, 1, 1, 987928173, 'dini', 'alamat', '2017-07-22', '2017-08-22', 2, '130000', 1, 909, 1, '', 0),
(37, 1, 1, 123, 'NADIA SALSABIL', 'JAKARTA', '2017-07-24', '2017-07-25', 2, '130000', 1, 982, 1, 'uploads/53e60625e9a45c248f14c27d3990b23f.jpg', 0),
(38, 1, 1, 56767658, 'hilmy', 'rawa bebek', '2017-07-26', '2017-08-11', 4, '260000', 0, 430, 0, '', 0),
(39, 1, 1, 1923, 'diana', 'bekasi', '2017-08-03', '2017-08-30', 2, '130000', 0, 636, 0, '', 0),
(40, 1, 1, 13123, 'sasa', 'cakung', '2017-08-03', '2017-08-20', 3, '195000', 0, 351, 0, '', 0),
(41, 1, 1, 2093912, 'sasa', 'bintara', '2017-08-04', '2017-08-20', 2, '130000', 1, 914, 0, '', 0),
(42, 2, 2, 8776767, 'jhgjhg', 'dflsadj', '2017-08-04', '2017-08-20', 3, '300000', 0, 279, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`,`id_berangkat`);

--
-- Indexes for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD PRIMARY KEY (`id_berangkat`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursi_pesanan`
--
ALTER TABLE `kursi_pesanan`
  ADD PRIMARY KEY (`id_kursi`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  MODIFY `id_berangkat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `kursi_pesanan`
--
ALTER TABLE `kursi_pesanan`
  MODIFY `id_kursi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
