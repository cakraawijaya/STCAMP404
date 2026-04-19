-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2023 pada 13.00
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stcamp404`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2022_09_10_002925_create_pelatihan_table', 1),
(3, '2022_09_10_031445_create_siswa_table', 2),
(4, '2022_09_12_025510_create_password_resets_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_item` int(10) UNSIGNED NOT NULL,
  `nama_pelatihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_pelatihan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelatihan`
--

INSERT INTO `pelatihan` (`id_item`, `nama_pelatihan`, `waktu_pelatihan`, `created_at`, `updated_at`) VALUES
(1, 'Bootstrap 5', '2022-10-02', NULL, NULL),
(2, 'Git', '2022-10-20', NULL, NULL),
(3, 'Laravel 8', '2022-11-12', NULL, NULL),
(4, 'Codeigniter 4', '2022-12-05', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelatihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_siswa`, `pelatihan`, `created_at`, `updated_at`) VALUES
(1, 20220101, 'Jaya Mangunati', 'Bootstrap 5', '2022-09-11 14:45:46', '2022-09-11 14:47:23'),
(2, 20220101, 'Jaya Mangunati', 'Laravel 8', '2022-09-11 14:45:57', '2022-09-11 14:45:57'),
(3, 20220101, 'Jaya Mangunati', 'Codeigniter 4', '2022-09-11 14:46:35', '2022-09-11 14:46:35'),
(4, 20220102, 'Jadiyan Marto', 'Codeigniter 4', '2022-09-11 14:47:00', '2022-09-11 15:02:39'),
(5, 20220102, 'Jadiyan Marto', 'Git', '2022-09-11 14:48:40', '2022-09-11 14:48:40'),
(6, 20220102, 'Jadiyan Marto', 'Bootstrap 5', '2022-09-11 14:48:47', '2022-09-11 15:03:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `siswa_id`, `name`, `role`, `email`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Anastasya Geralda', 'admin', 'admin@stcamp404.ac.id', 'asset\\img\\profile\\admin.jpg', '$2y$10$sTFrUMwJgFADRIhmbqHJBe5Mqog2KAGDYJB9hqLjmohcmg5tcr7tO', NULL, NULL, NULL),
(2, 20220101, 'Jaya Mangunati', 'siswa', '20220101@stcamp404.ac.id', 'asset\\img\\profile\\siswa.jpg', '$2y$10$27FeEhw9YVfZa3QyFrtl6OGFcxiu/6bTdNn5DUYWA4TxULmJosNJa', NULL, NULL, NULL),
(3, 20220102, 'Jadiyan Marto', 'siswa', '20220102@stcamp404.ac.id', 'asset\\img\\profile\\default.jpg', '$2y$10$AkzQYtamtlQ0uG4kCncRguOe.MZXyTi1hATzXK/faKy51GKFDmn5q', NULL, '2023-10-30 11:58:20', '2023-10-30 11:58:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_item` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
