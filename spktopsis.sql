-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2019 pada 15.29
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spktopsis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'IPA', '2019-05-28 19:58:47', '2019-05-28 20:02:58'),
(2, 'IPS', '2019-05-28 19:59:05', '2019-05-28 19:59:05'),
(3, 'BAHASA', '2019-05-28 19:59:13', '2019-05-28 19:59:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('benefit','cost') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `kategori`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'nilai rata-rata IPA', 'benefit', 4, NULL, '2019-05-28 06:20:31'),
(2, 'nilai rata-rata IPS', 'benefit', 4, NULL, NULL),
(3, 'nilai rata-rata BAHASA', 'benefit', 4, NULL, NULL),
(4, 'nilai test bakat IPA', 'benefit', 3, NULL, NULL),
(5, 'nilai test bakat IPS', 'benefit', 3, NULL, NULL),
(6, 'nilai test bakat BAHASA', 'benefit', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_siswa`
--

CREATE TABLE `kriteria_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria_siswa`
--

INSERT INTO `kriteria_siswa` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(19, 5, 1, 72, '2019-05-30 18:39:23', '2019-05-31 23:42:37'),
(20, 5, 2, 78, '2019-05-30 18:39:23', '2019-05-31 23:42:37'),
(21, 5, 3, 73, '2019-05-30 18:39:23', '2019-05-31 23:42:37'),
(22, 5, 4, 65, '2019-05-30 18:39:23', '2019-05-31 23:42:37'),
(23, 5, 5, 80, '2019-05-30 18:39:23', '2019-05-31 23:42:37'),
(24, 5, 6, 82, '2019-05-30 18:39:23', '2019-05-31 23:42:37'),
(25, 6, 1, 78, '2019-05-31 17:40:54', '2019-05-31 17:40:54'),
(26, 6, 2, 70, '2019-05-31 17:40:54', '2019-05-31 17:40:54'),
(27, 6, 3, 82, '2019-05-31 17:40:54', '2019-05-31 17:40:54'),
(28, 6, 4, 71, '2019-05-31 17:40:54', '2019-05-31 17:40:54'),
(29, 6, 5, 76, '2019-05-31 17:40:54', '2019-05-31 17:40:54'),
(30, 6, 6, 81, '2019-05-31 17:40:54', '2019-05-31 17:40:54'),
(31, 7, 1, 70, '2019-05-31 17:41:50', '2019-05-31 17:41:50'),
(32, 7, 2, 75, '2019-05-31 17:41:50', '2019-05-31 17:41:50'),
(33, 7, 3, 83, '2019-05-31 17:41:50', '2019-05-31 17:41:50'),
(34, 7, 4, 72, '2019-05-31 17:41:50', '2019-05-31 17:41:50'),
(35, 7, 5, 78, '2019-05-31 17:41:50', '2019-05-31 17:41:50'),
(36, 7, 6, 85, '2019-05-31 17:41:50', '2019-05-31 17:41:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_05_28_061626_create_kriteria_table', 1),
(7, '2019_05_28_143420_create_alternatif_table', 2),
(8, '2019_05_29_085403_create_siswa_table', 3),
(9, '2019_05_29_090421_create_kriteria_siswa_table', 4),
(10, '2019_05_31_141849_create_preferensi_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `preferensi`
--

CREATE TABLE `preferensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_preferensi` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `preferensi`
--

INSERT INTO `preferensi` (`id`, `siswa_id`, `alternatif_id`, `nilai_preferensi`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 0, '2019-05-31 06:28:24', '2019-05-31 06:28:24'),
(2, 5, 2, 0.6833415361111224, '2019-05-31 06:28:24', '2019-05-31 06:28:24'),
(3, 5, 3, 0.31665846388887764, '2019-05-31 06:28:24', '2019-05-31 06:28:24'),
(4, 6, 1, 0.449942821886869, '2019-05-31 17:42:00', '2019-05-31 19:30:54'),
(5, 6, 2, 0.35047214732886806, '2019-05-31 17:42:00', '2019-05-31 19:30:54'),
(6, 6, 3, 0.43577049591783806, '2019-05-31 17:42:00', '2019-05-31 19:30:54'),
(7, 7, 1, 0, '2019-05-31 19:33:49', '2019-05-31 19:33:49'),
(8, 7, 2, 0.4372131189663328, '2019-05-31 19:33:49', '2019-05-31 19:33:49'),
(9, 7, 3, 0.5627868810336671, '2019-05-31 19:33:49', '2019-05-31 19:33:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas`, `jurusan`, `foto`, `created_at`, `updated_at`) VALUES
(5, '12321', 'Abi', 'XI', 'IPS', 'fotos/iNh99m5Hey7hKbM32GiuXzBPdBzsN4WD97YtHBxw.jpeg', '2019-05-30 18:39:23', '2019-05-31 23:42:37'),
(6, '45321', 'Dita', 'XI', 'IPS', 'fotos/OEpklxVmyfWdj1sCrBuQDpWuqraXQKghMJU4CRmR.jpeg', '2019-05-31 17:40:54', '2019-05-31 17:40:54'),
(7, '76543', 'Cece', 'XII', 'BAHASA', 'fotos/RMHWJM06idTOEDSMvhW4M4VvotYanbSfs7LM1EHn.png', '2019-05-31 17:41:50', '2019-05-31 17:41:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'administrator', 'administrator@mail.com', NULL, '$2y$10$IaRMRBGALzADBxN0Del3feKUzb4Bhsdm1qaj8b2yBQOB1KevpvKJC', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria_siswa`
--
ALTER TABLE `kriteria_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_siswa_siswa_id_foreign` (`siswa_id`),
  ADD KEY `kriteria_siswa_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `preferensi`
--
ALTER TABLE `preferensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preferensi_siswa_id_foreign` (`siswa_id`),
  ADD KEY `preferensi_alternatif_id_foreign` (`alternatif_id`);

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
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kriteria_siswa`
--
ALTER TABLE `kriteria_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `preferensi`
--
ALTER TABLE `preferensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kriteria_siswa`
--
ALTER TABLE `kriteria_siswa`
  ADD CONSTRAINT `kriteria_siswa_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kriteria_siswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `preferensi`
--
ALTER TABLE `preferensi`
  ADD CONSTRAINT `preferensi_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preferensi_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
