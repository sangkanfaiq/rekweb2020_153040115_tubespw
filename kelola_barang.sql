-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 10:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelola_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `spesifikasi` varchar(25) NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `kode_kategori`, `spesifikasi`, `stock`) VALUES
('BRG001', 'Lychee', '1', 'Cup 180ml', 100),
('BRG002', 'Es Doger Teler', '1', 'Cup 180ml', 100),
('BRG003', 'Es doger Anggur', '1', 'Cup 180ml', 100),
('BRG004', 'Es Doger', '1', 'Cup 180ml', 100),
('BRG005', 'Es Doger Melon', '1', 'Cup 180ml', 100),
('BRG006', 'Es Doger Jeruk', '1', 'Cup 180ml', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_departement`
--

CREATE TABLE `tb_departement` (
  `kode_departement` varchar(20) NOT NULL,
  `nama_departement` text NOT NULL,
  `nama_manager` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_departement`
--

INSERT INTO `tb_departement` (`kode_departement`, `nama_departement`, `nama_manager`) VALUES
('DPT001', 'Mitra Bersama', 'Yusuf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penerimaan`
--

CREATE TABLE `tb_detail_penerimaan` (
  `id` int(10) NOT NULL,
  `kode_terima` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_penerimaan`
--

INSERT INTO `tb_detail_penerimaan` (`id`, `kode_terima`, `kode_barang`, `jumlah_barang`) VALUES
(27, 'T0001', 'BRG001', 100),
(28, 'T0001', 'BRG002', 100),
(29, 'T0001', 'BRG003', 100),
(30, 'T0001', 'BRG005', 100),
(34, 'T0002', 'BRG005', 100),
(35, 'T0002', 'BRG004', 100),
(36, 'T0002', 'BRG002', 100),
(37, 'T0003', 'BRG001', 100),
(38, 'T0003', 'BRG002', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pengeluaran`
--

CREATE TABLE `tb_detail_pengeluaran` (
  `id` varchar(10) NOT NULL,
  `kode_keluar` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Sanaco Nata Drink');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `jabatan_admin` varchar(20) NOT NULL,
  `status_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `username`, `password_admin`, `nama_admin`, `jabatan_admin`, `status_admin`) VALUES
('ADM001', 'faiq', 'cometome', 'Faiq', 'IT', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerimaan`
--

CREATE TABLE `tb_penerimaan` (
  `kode_terima` varchar(10) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `jumlah_item` int(10) NOT NULL,
  `kode_departement` varchar(10) NOT NULL,
  `id_login` varchar(10) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penerimaan`
--

INSERT INTO `tb_penerimaan` (`kode_terima`, `tanggal_terima`, `jumlah_item`, `kode_departement`, `id_login`, `keterangan`) VALUES
('T0001', '2020-09-03', 4, 'DPT001', 'ADM001', 'Contoh'),
('T0002', '2020-09-03', 3, 'DPT001', 'ADM001', 'Contoh'),
('T0003', '2020-09-22', 2, 'DPT001', 'ADM001', 'contoh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `kode_keluar` int(11) NOT NULL,
  `tanggal_keluar` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `kode_departement` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produksi`
--

CREATE TABLE `tb_produksi` (
  `kode_produksi` varchar(11) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `jumlah_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produksi`
--

INSERT INTO `tb_produksi` (`kode_produksi`, `tanggal_produksi`, `kode_barang`, `jumlah_produksi`) VALUES
('PRD001', '2020-09-01', 'BRG001', 100),
('PRD002', '2020-09-01', 'BRG002', 300),
('PRD003', '2020-09-01', 'BRG006', 200),
('PRD004', '2020-09-01', 'BRG004', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sementara`
--

CREATE TABLE `tb_sementara` (
  `id` int(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_departement`
--
ALTER TABLE `tb_departement`
  ADD PRIMARY KEY (`kode_departement`);

--
-- Indexes for table `tb_detail_penerimaan`
--
ALTER TABLE `tb_detail_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detail_pengeluaran`
--
ALTER TABLE `tb_detail_pengeluaran`
  ADD PRIMARY KEY (`kode_keluar`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_penerimaan`
--
ALTER TABLE `tb_penerimaan`
  ADD PRIMARY KEY (`kode_terima`);

--
-- Indexes for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`kode_keluar`);

--
-- Indexes for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  ADD PRIMARY KEY (`kode_produksi`);

--
-- Indexes for table `tb_sementara`
--
ALTER TABLE `tb_sementara`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_penerimaan`
--
ALTER TABLE `tb_detail_penerimaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sementara`
--
ALTER TABLE `tb_sementara`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
