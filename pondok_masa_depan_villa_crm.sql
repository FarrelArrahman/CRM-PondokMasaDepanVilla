-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2021 at 12:43 PM
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
-- Database: `pondok_masa_depan_villa_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(40, '2014_10_12_000000_create_users_table', 1),
(41, '2014_10_12_100000_create_password_resets_table', 1),
(42, '2019_08_19_000000_create_failed_jobs_table', 1),
(43, '2020_11_25_124200_create_periodes_table', 1),
(44, '2020_11_25_124329_create_respondens_table', 1),
(45, '2020_11_25_124452_create_pertanyaan_table', 1),
(46, '2020_11_25_124609_create_hasil_kuesioners_table', 1),
(47, '2020_11_25_124633_create_ulasan_masukans_table', 1),
(51, '2021_02_11_121228_add_id_user_to_tabel_periode', 2),
(53, '2021_03_03_185118_add_foreign_key_to_id_user_in_tb_periode', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_kuesioner`
--

CREATE TABLE `tb_hasil_kuesioner` (
  `id_hasil_kuesioner` int(10) UNSIGNED NOT NULL,
  `id_responden` int(10) UNSIGNED NOT NULL,
  `id_pertanyaan` int(10) UNSIGNED NOT NULL,
  `tgl_input` date NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_hasil_kuesioner`
--

INSERT INTO `tb_hasil_kuesioner` (`id_hasil_kuesioner`, `id_responden`, `id_pertanyaan`, `tgl_input`, `nilai`) VALUES
(31, 21, 11, '2021-02-17', 5),
(32, 21, 12, '2021-02-17', 3),
(33, 21, 13, '2021-02-17', 1),
(34, 21, 14, '2021-02-17', 4),
(35, 21, 15, '2021-02-17', 3),
(36, 21, 16, '2021-02-17', 2),
(37, 21, 17, '2021-02-17', 1),
(38, 21, 18, '2021-02-17', 5),
(39, 21, 19, '2021-02-17', 2),
(40, 21, 20, '2021-02-17', 3),
(41, 21, 21, '2021-02-17', 4),
(42, 21, 22, '2021-02-17', 5),
(43, 21, 23, '2021-02-17', 3),
(44, 21, 24, '2021-02-17', 4),
(45, 21, 25, '2021-02-17', 2),
(46, 22, 11, '2021-02-17', 5),
(47, 22, 12, '2021-02-17', 5),
(48, 22, 13, '2021-02-17', 3),
(49, 22, 14, '2021-02-17', 1),
(50, 22, 15, '2021-02-17', 2),
(51, 22, 16, '2021-02-17', 4),
(52, 22, 17, '2021-02-17', 3),
(53, 22, 18, '2021-02-17', 5),
(54, 22, 19, '2021-02-17', 1),
(55, 22, 20, '2021-02-17', 2),
(56, 22, 21, '2021-02-17', 2),
(57, 22, 22, '2021-02-17', 4),
(58, 22, 23, '2021-02-17', 1),
(59, 22, 24, '2021-02-17', 4),
(60, 22, 25, '2021-02-17', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_periode`
--

CREATE TABLE `tb_periode` (
  `id_periode` int(10) UNSIGNED NOT NULL,
  `nama_periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_periode` year(4) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_periode`
--

INSERT INTO `tb_periode` (`id_periode`, `nama_periode`, `tahun_periode`, `id_user`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(2, 'Juli 2020 - Desember 2020', 2020, 1, '2020-07-01 00:00:00', '2020-12-31 00:00:00', '0'),
(3, 'Januari 2020 - Juni 2020', 2020, 1, '2020-01-01 00:00:00', '2020-06-30 00:00:00', '0'),
(5, 'Juli 2019 - Desember 2019', 2019, 1, '2019-07-01 00:00:00', '2019-12-31 00:00:00', '0'),
(6, 'Januari 2019 - Juni 2019', 2019, 1, '2019-01-01 00:00:00', '2019-07-31 00:00:00', '0'),
(7, 'Januari 2021 - Juni 2021', 2021, 1, '2021-01-01 00:00:00', '2021-06-30 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `id_pertanyaan` int(10) UNSIGNED NOT NULL,
  `id_periode` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `tgl_input` datetime NOT NULL,
  `pertanyaan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`id_pertanyaan`, `id_periode`, `id_user`, `tgl_input`, `pertanyaan`) VALUES
(1, 2, 1, '2020-12-19 00:00:00', 'Apakah fasilitas sudah baik?'),
(2, 2, 1, '2020-12-19 00:00:00', 'Bagaimanakah keramahan dan kepedulian karyawan dalam memberikan pelayanan?'),
(3, 2, 1, '2020-12-19 00:00:00', 'Bagaimanakah kecepatan dan ketanggapan karyawan dalam memberikan pelayanan?'),
(4, 2, 1, '2020-12-19 00:00:00', 'Bagaimanakah kenyamanan yang diberikan oleh Villa Pondok Masa Depan dalam melayani kustomer?'),
(5, 2, 1, '2020-12-19 00:00:00', 'Bagaimanakah penampilan/kerapian karyawan kami dalam memberikan pelayanan?'),
(6, 2, 1, '2020-12-19 00:00:00', 'Puaskah Bapak/Ibu terhadap kualitas pelayanan yang diberikan oleh kami?'),
(7, 2, 1, '2020-12-19 00:00:00', 'Puaskah Bapak/Ibu terhadap biaya yang ditawarkan oleh kami?'),
(8, 2, 1, '2020-12-19 00:00:00', 'Puaskah Bapak/Ibu terhadap informasi yang diberikan oleh karyawan kami?'),
(9, 2, 1, '2020-12-19 00:00:00', 'Puaskah Bapak/ibu terhadap ketepatan waktu dalam memberikan pelayanan yang diberikan?'),
(10, 2, 1, '2020-12-19 00:00:00', 'Puaskah Bapak/Ibu terhadap fasilitas yang diberikan karyawan?'),
(11, 7, 1, '2021-01-12 00:00:00', 'Keramahan dan kepedulian petugas melayani pengunjung'),
(12, 7, 1, '2021-01-12 00:00:00', 'Penampilan dan kerapian petugas melayani pengunjung'),
(13, 7, 1, '2021-01-12 00:00:00', 'Kecepatan dan ketepatan petugas dalam memberikan pelayanan'),
(14, 7, 1, '2021-01-12 00:00:00', 'Pengetahuan petugas dalam menjawab pertanyaan pengunjung'),
(15, 7, 1, '2021-01-12 00:00:00', 'Kesungguhan petugas dalam mengatasi masalah pengunjung'),
(16, 7, 1, '2021-01-12 00:00:00', 'Petugas memberikan informasi yang jelas'),
(17, 7, 1, '2021-01-12 00:00:00', 'Kepuasan dalam menjalankan program aktifitas pada Pondok Masa Depan'),
(18, 7, 1, '2021-01-12 00:00:00', 'Kebersihan kamar pada Pondok Masa Depan'),
(19, 7, 1, '2021-01-12 00:00:00', 'Kebersihan  toilet pada Pondok Masa Depan'),
(20, 7, 1, '2021-01-12 00:00:00', 'Kelengkapan peralatan pada kamar Pondok Masa Depan'),
(21, 7, 1, '2021-01-12 00:00:00', 'Kebersihan restoran atau tempat makan pada Pondok Masa Depan'),
(22, 7, 1, '2021-01-12 00:00:00', 'Rasa dan kualitas penyajian makanan pada Pondok Masa Depan'),
(23, 7, 1, '2021-01-12 00:00:00', 'Kepuasan berdasarkan suasana atau lingkungan pada Pondok Masa Depan'),
(24, 7, 1, '2021-01-12 00:00:00', 'Rasa aman ketika menginap di Pondok Masa Depan'),
(25, 7, 1, '2021-01-12 00:00:00', 'Keinginan untuk menikmati aktifitas atau menginap kembali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_responden`
--

CREATE TABLE `tb_responden` (
  `id_responden` int(10) UNSIGNED NOT NULL,
  `nama_responden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_responden`
--

INSERT INTO `tb_responden` (`id_responden`, `nama_responden`, `email`, `no_hp`, `jenis_kel`, `alamat`, `status`, `keterangan`) VALUES
(21, 'Farrel', 'arrahman_farrel@yahoo.com', '085792832313', 'L', 'Denpasar', 'Aktif', ''),
(22, 'Putri', 'putriaris59@gmail.com', '085792451316', 'P', 'Denpasar', 'Aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ulasan_masukan`
--

CREATE TABLE `tb_ulasan_masukan` (
  `id_ulasan_masukan` int(10) UNSIGNED NOT NULL,
  `id_responden` int(10) UNSIGNED NOT NULL,
  `id_periode` int(10) UNSIGNED NOT NULL,
  `ulasan_masukan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_input` datetime NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_ulasan_masukan`
--

INSERT INTO `tb_ulasan_masukan` (`id_ulasan_masukan`, `id_responden`, `id_periode`, `ulasan_masukan`, `tgl_input`, `keterangan`) VALUES
(3, 21, 7, 'Sudah baik', '2021-02-17 13:15:23', ''),
(4, 22, 7, 'Mohon ditingkatkan lagi pelayanannya', '2021-02-24 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `email`, `no_hp`, `jenis_kel`, `alamat`, `status`, `keterangan`) VALUES
(1, 'Raden Muhammad Farrel Arrahman', 'fvrrel', '$2y$10$VWgf4wwaHJ5HWmL7yb35.OYT5A44f9kskiF4foe3yHG..q8rswIJy', 'arrahman_farrel@yahoo.com', '085792832313', 'L', 'Denpasar', 'admin', ''),
(2, 'Putri Aristiani', 'putriaristiani05', '$2y$10$8O2BgoYbupU0xnUQV3XSQePKS8ujuLvgWPgpduvtq6mYQ6oS7zTEK', 'putriaris59@gmail.com', '085792451316', 'P', 'Jl. Gunung Agung Gg. Kojek No. 2A', 'admin', NULL),
(3, 'Nabila Syafira', 'nabilasyafiraa', '$2y$10$3I.TG.5ypwEzX/4CbuqhnuGR4tczZwWSnOn7NIowHC0e7/Ac3Rh9e', 'heyputri05@gmail.com', '081222333444', 'P', 'Surabaya', 'staff', NULL),
(7, 'Rafael', 'rafael', '$2y$10$Re3676FL2sV98NmADEBtP.XLqpLje6/rER2svHituqkwhlPY5ImJm', 'rafael@gmail.com', '085111222333', 'L', 'Dps', 'responden', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_hasil_kuesioner`
--
ALTER TABLE `tb_hasil_kuesioner`
  ADD PRIMARY KEY (`id_hasil_kuesioner`),
  ADD KEY `tb_hasil_kuesioner_id_responden_foreign` (`id_responden`),
  ADD KEY `tb_hasil_kuesioner_id_pertanyaan_foreign` (`id_pertanyaan`);

--
-- Indexes for table `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`id_periode`),
  ADD KEY `tb_periode_id_user_index` (`id_user`);

--
-- Indexes for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `tb_pertanyaan_id_periode_foreign` (`id_periode`),
  ADD KEY `tb_pertanyaan_id_user_foreign` (`id_user`);

--
-- Indexes for table `tb_responden`
--
ALTER TABLE `tb_responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- Indexes for table `tb_ulasan_masukan`
--
ALTER TABLE `tb_ulasan_masukan`
  ADD PRIMARY KEY (`id_ulasan_masukan`),
  ADD KEY `tb_ulasan_masukan_id_responden_foreign` (`id_responden`),
  ADD KEY `tb_ulasan_masukan_id_periode_foreign` (`id_periode`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tb_user_username_unique` (`username`),
  ADD UNIQUE KEY `tb_user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_hasil_kuesioner`
--
ALTER TABLE `tb_hasil_kuesioner`
  MODIFY `id_hasil_kuesioner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `id_periode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  MODIFY `id_pertanyaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_responden`
--
ALTER TABLE `tb_responden`
  MODIFY `id_responden` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_ulasan_masukan`
--
ALTER TABLE `tb_ulasan_masukan`
  MODIFY `id_ulasan_masukan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_hasil_kuesioner`
--
ALTER TABLE `tb_hasil_kuesioner`
  ADD CONSTRAINT `tb_hasil_kuesioner_id_pertanyaan_foreign` FOREIGN KEY (`id_pertanyaan`) REFERENCES `tb_pertanyaan` (`id_pertanyaan`),
  ADD CONSTRAINT `tb_hasil_kuesioner_id_responden_foreign` FOREIGN KEY (`id_responden`) REFERENCES `tb_responden` (`id_responden`);

--
-- Constraints for table `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD CONSTRAINT `tb_periode_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD CONSTRAINT `tb_pertanyaan_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `tb_periode` (`id_periode`),
  ADD CONSTRAINT `tb_pertanyaan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_ulasan_masukan`
--
ALTER TABLE `tb_ulasan_masukan`
  ADD CONSTRAINT `tb_ulasan_masukan_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `tb_periode` (`id_periode`),
  ADD CONSTRAINT `tb_ulasan_masukan_id_responden_foreign` FOREIGN KEY (`id_responden`) REFERENCES `tb_responden` (`id_responden`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
