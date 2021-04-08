-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 01:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_lembaga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `id_user`, `id_lembaga`, `created_at`, `updated_at`) VALUES
(9, 'admin1', 28, 1, '2021-04-07 20:17:38', '2021-04-07 20:17:38'),
(10, 'admin2', 31, 2, '2021-04-07 22:07:31', '2021-04-07 22:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `periode_booking` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_lembaga` int(11) NOT NULL,
  `kode_booking` varchar(50) DEFAULT NULL,
  `status_booking` varchar(50) DEFAULT NULL,
  `payment_token` varchar(191) DEFAULT NULL,
  `payment_url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `tanggal_booking`, `periode_booking`, `id_user`, `id_paket`, `id_lembaga`, `kode_booking`, `status_booking`, `payment_token`, `payment_url`, `created_at`, `updated_at`) VALUES
(76, '2021-04-08', '1 Bulan', 26, 32, 1, '123123', 'sukses', 'a434217f-91ca-45cc-8d7c-9a6f6d17ea25', 'https://app.sandbox.midtrans.com/snap/v2/vtweb/a434217f-91ca-45cc-8d7c-9a6f6d17ea25', '2021-04-07 20:29:13', '2021-04-07 20:29:13'),
(77, '2021-04-08', '1 Bulan', 29, 32, 1, NULL, 'pending', 'ffdb3595-d2b6-4b57-a5a7-4893ca74e521', 'https://app.sandbox.midtrans.com/snap/v2/vtweb/ffdb3595-d2b6-4b57-a5a7-4893ca74e521', '2021-04-07 20:48:38', '2021-04-07 20:48:38'),
(79, '2021-04-08', '1 Bulan', 30, 32, 1, NULL, 'pending', 'e70fb2bc-ecec-43d5-97cc-85d912540c5e', 'https://app.sandbox.midtrans.com/snap/v2/vtweb/e70fb2bc-ecec-43d5-97cc-85d912540c5e', '2021-04-07 21:58:32', '2021-04-07 21:58:32'),
(80, '2021-04-08', '1 Bulan', 26, 33, 2, NULL, 'pending', 'f7043443-91f2-4fe3-b412-2e2b4446084e', 'https://app.sandbox.midtrans.com/snap/v2/vtweb/f7043443-91f2-4fe3-b412-2e2b4446084e', '2021-04-07 22:11:41', '2021-04-07 22:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `id` int(11) NOT NULL,
  `nama_lembaga` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`id`, `nama_lembaga`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'lembaga 1', 'pare', NULL, NULL),
(2, 'lembaga 2', 'pare', NULL, NULL),
(3, 'lembaga 3', 'pare', NULL, NULL),
(4, 'lembaga 4', 'pare', '2021-04-04 05:35:34', '2021-04-04 05:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket_belajar`
--

CREATE TABLE `paket_belajar` (
  `id` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `jenis_paket` varchar(100) NOT NULL,
  `durasi_paket` varchar(100) NOT NULL,
  `biaya_paket` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `sold` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_lembaga` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `fasilitas1` varchar(100) DEFAULT NULL,
  `fasilitas2` varchar(100) DEFAULT NULL,
  `fasilitas3` varchar(100) DEFAULT NULL,
  `fasilitas4` varchar(100) DEFAULT NULL,
  `fasilitas5` varchar(100) DEFAULT NULL,
  `fasilitas6` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_belajar`
--

INSERT INTO `paket_belajar` (`id`, `nama_paket`, `jenis_paket`, `durasi_paket`, `biaya_paket`, `stok`, `sold`, `id_admin`, `id_lembaga`, `image`, `fasilitas1`, `fasilitas2`, `fasilitas3`, `fasilitas4`, `fasilitas5`, `fasilitas6`, `created_at`, `updated_at`) VALUES
(32, 'grammar 1', 'grammar', '3 bulan', 1000000, 22, NULL, 9, 1, '1617851887.jpg', '6 Program/hari', 'Camp Reguler', 'Marchandise', 'Modul dan Buku', 'Sertificate', 'Free pick up', '2021-04-07 20:18:07', '2021-04-07 20:18:07'),
(33, 'grammar 2', 'grammar', '3 bulan', 1200000, 20, NULL, 10, 2, '1617858487.jpg', '6 Program/hari', 'Camp Reguler', 'Marchandise', 'Modul dan Buku', 'Sertificate', 'Free pick up', '2021-04-07 22:08:07', '2021-04-07 22:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `total_biaya` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `id_paket_belajar` int(11) NOT NULL,
  `id_lembaga` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(50) DEFAULT NULL,
  `kode_pembayaran` varchar(50) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nohp` varchar(50) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `id_lembaga` int(11) DEFAULT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `nohp`, `role`, `alamat`, `jenis_kelamin`, `pendidikan`, `image`, `status`, `id_lembaga`, `remember_token`, `created_at`, `updated_at`) VALUES
(25, 'Super Admin', 'superadmin', '$2y$10$qKjiKqWfAXsxyGEgoSU.peoPVtD95vpnvJbpU26qhjYg4Ol/3m056', 'superadmin@gmail.comsu', '000000000', 'super_admin', NULL, NULL, NULL, NULL, 'aktif', NULL, NULL, '2021-04-08 02:39:34', '2021-04-08 02:39:34'),
(26, 'Andy Ferbiantoro', 'andy', '$2y$10$PVNRzhK9igFzEAwsvDOBWOTSyxuacNuvk6UjB4ekQz/Yi7KO7OaQa', 'andyfebri742@gmail.com', '081234556256', 'pemesan', 'Pesanggaran', 'Laki-Laki', 'D3', '1617850650.png', 'aktif', NULL, NULL, '2021-04-08 02:43:52', '2021-04-08 05:23:22'),
(28, 'admin1', 'admin1', '$2y$10$u0K8cynDMnKsXQs.GUUhL.zow9BZNz2mMU3jgrGMkSS7qeNsImFFa', 'admin1@gmail.com', NULL, 'admin', NULL, NULL, NULL, NULL, 'aktif', 1, NULL, '2021-04-08 03:16:29', '2021-04-08 03:16:29'),
(29, 'Iwan Hermansyah', 'iwan', '$2y$10$dW/t.Uf5qP9P81Ryh1ogx.a7M7QVNfPJnEzisNJnUW8smHWHO4BcC', 'iwan@gmail.com', '081234556224', 'pemesan', 'Jember Timur', 'Laki-Laki', 'D3', '1617854465.png', 'aktif', NULL, NULL, '2021-04-08 03:48:09', '2021-04-08 04:01:22'),
(30, 'Ricky David', 'ricky', '$2y$10$r6eMQAWU0SzMGWJguWfkTOzzusk.LznZcYgMJN3.hIe1mLkx9YCWG', 'ricky@gmail.com', '082123213431', 'pemesan', 'Banyuwangi Kota', 'Laki-Laki', 'D3', '1617856831.jpg', 'aktif', NULL, NULL, '2021-04-08 04:39:31', '2021-04-08 05:09:02'),
(31, 'admin2', 'admin2', '$2y$10$qTIUxtFGACehstMBsoM8iuNtm5pxr.h1/hbYtZ3rDmM0PPrOaYYoi', 'admin2@gmail.com', NULL, 'admin', NULL, NULL, NULL, NULL, 'aktif', 2, NULL, '2021-04-08 05:06:06', '2021-04-08 05:06:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lembaga` (`id_lembaga`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lembaga` (`id_lembaga`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `paket_belajar`
--
ALTER TABLE `paket_belajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_lembaga` (`id_lembaga`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_booking` (`id_booking`),
  ADD KEY `id_paket_belajar` (`id_paket_belajar`),
  ADD KEY `id_lembaga` (`id_lembaga`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lembaga` (`id_lembaga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `paket_belajar`
--
ALTER TABLE `paket_belajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`id_paket`) REFERENCES `paket_belajar` (`id`);

--
-- Constraints for table `paket_belajar`
--
ALTER TABLE `paket_belajar`
  ADD CONSTRAINT `paket_belajar_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `paket_belajar_ibfk_3` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_paket_belajar`) REFERENCES `paket_belajar` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
