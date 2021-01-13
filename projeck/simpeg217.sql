-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 09:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg217`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti217`
--

CREATE TABLE `tb_cuti217` (
  `id_cuti217` int(11) NOT NULL,
  `id_pegawai217` int(11) NOT NULL,
  `tgl_mulai_cuti217` varchar(50) NOT NULL,
  `tgl_selesai_cuti217` varchar(50) NOT NULL,
  `keterangan217` varchar(50) NOT NULL,
  `file_cuti217` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cuti217`
--

INSERT INTO `tb_cuti217` (`id_cuti217`, `id_pegawai217`, `tgl_mulai_cuti217`, `tgl_selesai_cuti217`, `keterangan217`, `file_cuti217`) VALUES
(1, 0, '2002-02-20', '2020-02-20', 'qewqeqq', ''),
(2, 0, '0202-02-20', '2020-02-20', 'tahunanqeqeq', 'pisang_goreng_krispi.jpg'),
(4, 23, '2020-02-20', '2200-02-20', 'tahunan', 'pisang_goreng_krispi1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan217`
--

CREATE TABLE `tb_jabatan217` (
  `id_jabatan217` int(11) NOT NULL,
  `id_pegawai217` int(11) NOT NULL,
  `nama_jabatan217` varchar(50) NOT NULL,
  `no_sk217` varchar(30) NOT NULL,
  `tgl_sk217` date NOT NULL,
  `tgl_mulai217` date NOT NULL,
  `tgl_selesai217` date NOT NULL,
  `file_sk217` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan217`
--

INSERT INTO `tb_jabatan217` (`id_jabatan217`, `id_pegawai217`, `nama_jabatan217`, `no_sk217`, `tgl_sk217`, `tgl_mulai217`, `tgl_selesai217`, `file_sk217`) VALUES
(8, 23, 'DIREKTUR I', '1', '2021-01-05', '2021-01-06', '2021-01-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pangkat217`
--

CREATE TABLE `tb_pangkat217` (
  `id_pangkat217` int(11) NOT NULL,
  `id_pegawai217` varchar(11) NOT NULL,
  `nama_pangkat217` varchar(50) NOT NULL,
  `golongan217` varchar(50) NOT NULL,
  `no_sk217` varchar(50) NOT NULL,
  `tgl_sk217` date NOT NULL,
  `tgl_mulai217` date NOT NULL,
  `tgl_selesai217` date NOT NULL,
  `file_sk217` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pangkat217`
--

INSERT INTO `tb_pangkat217` (`id_pangkat217`, `id_pegawai217`, `nama_pangkat217`, `golongan217`, `no_sk217`, `tgl_sk217`, `tgl_mulai217`, `tgl_selesai217`, `file_sk217`) VALUES
(2, '23', 'Pembina', '1', '213123', '2021-01-12', '2020-12-30', '2021-01-19', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai217`
--

CREATE TABLE `tb_pegawai217` (
  `id_pegawai217` int(11) NOT NULL,
  `nik217` varchar(50) NOT NULL,
  `nama217` varchar(30) NOT NULL,
  `t_lahir217` text NOT NULL,
  `tgl_lahir217` date NOT NULL,
  `j_kelamin217` varchar(15) NOT NULL,
  `status217` varchar(15) NOT NULL,
  `alamat217` text NOT NULL,
  `agama217` varchar(25) NOT NULL,
  `no_telp217` varchar(15) NOT NULL,
  `photo217` varchar(100) NOT NULL,
  `tgl_mulai_bekerja217` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai217`
--

INSERT INTO `tb_pegawai217` (`id_pegawai217`, `nik217`, `nama217`, `t_lahir217`, `tgl_lahir217`, `j_kelamin217`, `status217`, `alamat217`, `agama217`, `no_telp217`, `photo217`, `tgl_mulai_bekerja217`) VALUES
(23, '12313123', 'ridhal', 'payukumbuh', '2020-02-02', 'Laki-laki', 'Aktif', 'jln arifin ahmad', 'Islam', '12313131', '', '2020-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan217`
--

CREATE TABLE `tb_pendidikan217` (
  `id_pendidikan217` int(11) NOT NULL,
  `id_pegawai217` int(11) NOT NULL,
  `tingkat217` varchar(10) NOT NULL,
  `nama_pt217` varchar(50) NOT NULL,
  `lokasi217` varchar(50) NOT NULL,
  `jurusan217` varchar(50) NOT NULL,
  `no_ijazah217` varchar(50) NOT NULL,
  `tgl_ijazah217` date NOT NULL,
  `file_ijazah217` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendidikan217`
--

INSERT INTO `tb_pendidikan217` (`id_pendidikan217`, `id_pegawai217`, `tingkat217`, `nama_pt217`, `lokasi217`, `jurusan217`, `no_ijazah217`, `tgl_ijazah217`, `file_ijazah217`) VALUES
(25, 23, 'S3', 'AMIK MAHAPUTRA', 'PANAM', 'TI', '1414', '2020-02-20', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user217`
--

CREATE TABLE `tb_user217` (
  `id_user217` int(50) NOT NULL,
  `nama217` varchar(80) NOT NULL,
  `email217` varchar(40) NOT NULL,
  `username217` varchar(50) NOT NULL,
  `password217` varchar(100) NOT NULL,
  `akses_level217` varchar(15) NOT NULL,
  `keterangan217` text NOT NULL,
  `tgl217` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo217` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user217`
--

INSERT INTO `tb_user217` (`id_user217`, `nama217`, `email217`, `username217`, `password217`, `akses_level217`, `keterangan217`, `tgl217`, `photo217`) VALUES
(4, 'ridhal', 'ridhal@gmail.com', 'ridhal123', '7c222fb2927d828af22f592134e8932480637c0d', 'admin', '12345678', '2021-01-09 05:13:08', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cuti217`
--
ALTER TABLE `tb_cuti217`
  ADD PRIMARY KEY (`id_cuti217`),
  ADD KEY `id_pegawai217` (`id_pegawai217`);

--
-- Indexes for table `tb_jabatan217`
--
ALTER TABLE `tb_jabatan217`
  ADD PRIMARY KEY (`id_jabatan217`),
  ADD KEY `id_pegawai` (`id_pegawai217`);

--
-- Indexes for table `tb_pangkat217`
--
ALTER TABLE `tb_pangkat217`
  ADD PRIMARY KEY (`id_pangkat217`),
  ADD KEY `id_pegawai217` (`id_pegawai217`);

--
-- Indexes for table `tb_pegawai217`
--
ALTER TABLE `tb_pegawai217`
  ADD PRIMARY KEY (`id_pegawai217`);

--
-- Indexes for table `tb_pendidikan217`
--
ALTER TABLE `tb_pendidikan217`
  ADD PRIMARY KEY (`id_pendidikan217`),
  ADD KEY `id_pegawai` (`id_pegawai217`);

--
-- Indexes for table `tb_user217`
--
ALTER TABLE `tb_user217`
  ADD PRIMARY KEY (`id_user217`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cuti217`
--
ALTER TABLE `tb_cuti217`
  MODIFY `id_cuti217` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jabatan217`
--
ALTER TABLE `tb_jabatan217`
  MODIFY `id_jabatan217` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pangkat217`
--
ALTER TABLE `tb_pangkat217`
  MODIFY `id_pangkat217` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pegawai217`
--
ALTER TABLE `tb_pegawai217`
  MODIFY `id_pegawai217` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_pendidikan217`
--
ALTER TABLE `tb_pendidikan217`
  MODIFY `id_pendidikan217` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_user217`
--
ALTER TABLE `tb_user217`
  MODIFY `id_user217` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
