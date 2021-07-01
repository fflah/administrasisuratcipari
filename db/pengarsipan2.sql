-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 01:46 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengarsipan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_surat`
--

CREATE TABLE `kategori_surat` (
  `id_kategori` int(100) NOT NULL,
  `kategori surat` varchar(100) NOT NULL,
  `kode_surat` varchar(100) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_surat`
--

INSERT INTO `kategori_surat` (`id_kategori`, `kategori surat`, `kode_surat`, `no_surat`) VALUES
(1, 'surat_keterangan', '01', NULL),
(2, 'surat_undangan', '02', NULL),
(3, 'surat_tugas', '03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `NIK` bigint(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jk` varchar(100) DEFAULT NULL,
  `tempat_tgl_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `wa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `NIK`, `nama`, `jk`, `tempat_tgl_lahir`, `agama`, `status`, `pekerjaan`, `alamat`, `email`, `wa`) VALUES
(1, 123, 'falah', 'Laki-laki', 'simo', 'Islam', 'Belum Kawin', 'Developer', 'semarang', 'pmbyl@gmail.com', '+6285647358986'),
(2, 123, 'zulfa', 'Laki-laki', 'slo', 'Islam', 'Kawin', 'Developer', 'solo', 'masterwarefun@gmail.com', '09090909'),
(4, 123, 'joko', 'Laki-laki', 'solo. 12 januari 1999', 'Islam', 'Belum Kawin', 'Developer', 'solo', 'zulfafalah@gmail.com', '12344213'),
(6, 9090, 'falah', 'Laki-laki', 'Semarang, 21 Januari 1998', 'Islam', 'Kawin', 'Developer', 'Semarang', 'zulfa_hamazah@yahoo.com', '980909990'),
(7, 9090, 'ewewe', 'Laki-laki', 'sasa', 'sasa', 'Belum Kawin', 'asa', 'sa', '', 'sasa'),
(8, 0, 'falahsasas', 'Perempuan', 'sasa', 'sasa', 'Kawin', 'sasas', 'sasasa', 'sasa@gmail.com', 'sasa'),
(9, 0, 'dsds', 'Perempuan', 'dsds', 'dsds', 'Belum Kawin', 'dsds', 'dsds', 'dsds@gmail.com', 'ds');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_desa`
--

CREATE TABLE `perangkat_desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `divisi` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(20) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `proses_surat` varchar(100) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `id_ketegori_surat` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `kode_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `whatsapp`, `keperluan`, `keterangan`, `proses_surat`, `id_penduduk`, `id_ketegori_surat`, `no_surat`, `kode_surat`) VALUES
(29, 'sas', 'asasa', 'sasa', 'sasa', 2, 3, 'sas', 'sasa');

-- --------------------------------------------------------

--
-- Table structure for table `surat_kematian`
--

CREATE TABLE `surat_kematian` (
  `id` int(11) NOT NULL,
  `surat_rt_rw` varchar(255) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `kk` varchar(100) NOT NULL,
  `surat_nikah` varchar(100) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `proses_surat` varchar(50) DEFAULT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `kode_surat` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `jenis_surat` varchar(50) NOT NULL DEFAULT 'Surat Kematian',
  `hari_meninggal` varchar(255) DEFAULT NULL,
  `jam_meninggal` varchar(255) DEFAULT NULL,
  `send_notif` int(11) NOT NULL DEFAULT 0,
  `alasan_reject` varchar(255) DEFAULT NULL,
  `nama_ttd` varchar(50) DEFAULT NULL,
  `jabatan_ttd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_nikah`
--

CREATE TABLE `surat_nikah` (
  `id` int(11) NOT NULL,
  `surat_rt_rw` varchar(100) NOT NULL,
  `akta_kelahiran` varchar(100) NOT NULL,
  `ijazah` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `kk` varchar(100) NOT NULL,
  `ktp_ortu` varchar(100) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `proses_surat` varchar(50) DEFAULT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `kode_surat` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `jenis_surat` varchar(50) NOT NULL DEFAULT 'Surat Nikah',
  `send_notif` int(11) NOT NULL DEFAULT 0,
  `alasan_reject` varchar(255) DEFAULT NULL,
  `nama_ttd` varchar(50) DEFAULT NULL,
  `jabatan_ttd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_pindah_domisili`
--

CREATE TABLE `surat_pindah_domisili` (
  `id` int(11) NOT NULL,
  `surat_rt_rw` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `proses_surat` varchar(50) DEFAULT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `kode_surat` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `jenis_surat` varchar(50) NOT NULL DEFAULT 'Surat Pindah Daerah',
  `alamat_pindah` varchar(255) DEFAULT NULL,
  `alasan_pindah` varchar(255) DEFAULT NULL,
  `pengikut` varchar(50) DEFAULT NULL,
  `send_notif` int(11) NOT NULL DEFAULT 0,
  `alasan_reject` varchar(255) DEFAULT NULL,
  `nama_ttd` varchar(50) DEFAULT NULL,
  `jabatan_ttd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_sku`
--

CREATE TABLE `surat_sku` (
  `id` int(11) NOT NULL,
  `surat_rt_rw` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `proses_surat` varchar(50) DEFAULT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `kode_surat` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_surat` varchar(50) NOT NULL DEFAULT 'Surat Keterangan Usaha',
  `nama_usaha` varchar(255) DEFAULT NULL,
  `send_notif` int(11) NOT NULL DEFAULT 0,
  `alasan_reject` varchar(255) DEFAULT NULL,
  `nama_ttd` varchar(50) DEFAULT NULL,
  `jabatan_ttd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id` int(11) NOT NULL,
  `id_perangkat_desa` int(11) DEFAULT NULL,
  `kontent` text DEFAULT NULL,
  `nama_ttd` varchar(100) DEFAULT NULL,
  `jabatan_ttd` varchar(100) DEFAULT NULL,
  `jenis_surat` varchar(100) DEFAULT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `proses_surat` varchar(100) NOT NULL DEFAULT 'Finish',
  `tanggal_surat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan`
--

CREATE TABLE `surat_undangan` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `nama_ttd` varchar(100) DEFAULT NULL,
  `jabatan_ttd` varchar(100) DEFAULT NULL,
  `jenis_surat` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `kontent` text DEFAULT NULL,
  `proses_surat` varchar(100) NOT NULL DEFAULT 'Finish',
  `kepada` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluar`
--

CREATE TABLE `tb_keluar` (
  `no` int(10) NOT NULL,
  `no_surat` int(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `NIK` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `no` int(100) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tgl_terima` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_masuk`
--

INSERT INTO `tb_masuk` (`no`, `no_surat`, `pengirim`, `tgl_surat`, `perihal`, `tgl_terima`, `keterangan`, `file_surat`) VALUES
(10, 'sasa', 'asasa', '2021-01-04', 'asasa', '2021-02-18', 'sasa', 'laporan-210227-290976e808.jpg'),
(12, '12121', 'asasa', '2021-06-07', 'tes', '2021-06-07', 'asasa', 'laporan-210607-9c12325349.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL COMMENT '1. admin, 2. kepalakelurahan, 3. sekdes,\r\n4. adminpengantar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Risa', ' Gandrungmangu', '   1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_surat`
--
ALTER TABLE `kategori_surat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `id_ketegori_surat` (`id_ketegori_surat`);

--
-- Indexes for table `surat_kematian`
--
ALTER TABLE `surat_kematian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `surat_nikah`
--
ALTER TABLE `surat_nikah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `surat_pindah_domisili`
--
ALTER TABLE `surat_pindah_domisili`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `surat_sku`
--
ALTER TABLE `surat_sku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perangkat_desa` (`id_perangkat_desa`);

--
-- Indexes for table `surat_undangan`
--
ALTER TABLE `surat_undangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_surat`
--
ALTER TABLE `kategori_surat`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `surat_kematian`
--
ALTER TABLE `surat_kematian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_nikah`
--
ALTER TABLE `surat_nikah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_pindah_domisili`
--
ALTER TABLE `surat_pindah_domisili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_sku`
--
ALTER TABLE `surat_sku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_undangan`
--
ALTER TABLE `surat_undangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_kematian`
--
ALTER TABLE `surat_kematian`
  ADD CONSTRAINT `surat_kematian_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id`);

--
-- Constraints for table `surat_nikah`
--
ALTER TABLE `surat_nikah`
  ADD CONSTRAINT `surat_nikah_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id`);

--
-- Constraints for table `surat_pindah_domisili`
--
ALTER TABLE `surat_pindah_domisili`
  ADD CONSTRAINT `surat_pindah_domisili_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id`);

--
-- Constraints for table `surat_sku`
--
ALTER TABLE `surat_sku`
  ADD CONSTRAINT `surat_sku_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id`);

--
-- Constraints for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD CONSTRAINT `surat_tugas_ibfk_1` FOREIGN KEY (`id_perangkat_desa`) REFERENCES `perangkat_desa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
