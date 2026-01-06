-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;




-- Dumping structure for table anangfilaments.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.cache_locks: ~0 rows (approximately)

-- Dumping structure for table anangfilaments.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table anangfilaments.galeri
CREATE TABLE IF NOT EXISTS `galeri` (
  `galeri_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`galeri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.galeri: ~2 rows (approximately)
INSERT INTO `galeri` (`galeri_id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'DOKUMENTASI TRAGEDI PERANG EPEP', 'DOKUMENTASI TRAGEDI PERANG EPEP', '2025-12-16 13:22:27', '2025-12-16 13:22:27'),
	(2, 'DOKUMENTASI TRAGEDI PERANG PUBG', 'DOKUMENTASI TRAGEDI PERANG PUBG', '2025-12-16 13:33:56', '2025-12-16 13:33:56');

-- Dumping structure for table anangfilaments.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.jobs: ~0 rows (approximately)

-- Dumping structure for table anangfilaments.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.job_batches: ~0 rows (approximately)

-- Dumping structure for table anangfilaments.kategori_berita
CREATE TABLE IF NOT EXISTS `kategori_berita` (
  `kategori_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kategori_id`),
  UNIQUE KEY `kategori_berita_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.kategori_berita: ~1 rows (approximately)
INSERT INTO `kategori_berita` (`kategori_id`, `nama`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'berita upin ipin', 'berita-upin-ipin', 'Ini buat alok', '2025-12-13 06:40:00', '2025-12-13 06:40:00');

  -- Dumping structure for table anangfilaments.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `berita_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_html` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','terbit','arsip') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `terbit_at` timestamp NULL DEFAULT NULL,
  `cover` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`berita_id`),
  UNIQUE KEY `berita_slug_unique` (`slug`),
  KEY `berita_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `berita_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_berita` (`kategori_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.berita: ~0 rows (approximately)

-- Dumping structure for table anangfilaments.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping structure for table anangfilaments.media
CREATE TABLE IF NOT EXISTS `media` (
  `media_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ref_table` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_id` bigint unsigned NOT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`media_id`),
  KEY `media_ref_table_ref_id_index` (`ref_table`,`ref_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.media: ~3 rows (approximately)
INSERT INTO `media` (`media_id`, `ref_table`, `ref_id`, `jenis`, `nama_file`, `path`, `mime_type`, `ukuran`, `created_at`, `updated_at`) VALUES
	(1, 'galeri', 1, 'foto', '01KCMDFYA4SW7WSB3JCZHHYESF.png', 'galeri/01KCMDFYA4SW7WSB3JCZHHYESF.png', 'image/png', 977988, '2025-12-16 13:26:41', '2025-12-16 13:26:41'),
	(2, 'galeri', 2, 'foto', '01KCMDX771XD231REG27WC6DF3.png', 'galeri/01KCMDX771XD231REG27WC6DF3.png', 'image/png', 64961, '2025-12-16 13:33:56', '2025-12-16 13:33:56'),
	(3, 'galeri', 2, 'foto', '01KCMDX776EG2QJFTC03PBWCHJ.png', 'galeri/01KCMDX776EG2QJFTC03PBWCHJ.png', 'image/png', 35430, '2025-12-16 13:33:56', '2025-12-16 13:33:56');

-- Dumping structure for table anangfilaments.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.migrations: ~12 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_12_07_141935_add_role_column_on_users_table', 2),
	(5, '2025_12_13_000001_create_profil_table', 3),
	(6, '2025_12_13_000002_add_logo_column_to_profil_table', 4),
	(7, '2025_12_13_000003_create_kategori_berita_table', 5),
	(8, '2025_12_13_000004_create_berita_table', 6),
	(9, '2025_12_13_000005_create_agenda_table', 7),
	(10, '2025_12_16_201610_create_galeri_table', 8),
	(11, '2025_12_16_204014_create_warga_table', 9),
	(12, '2025_12_16_214939_add_foto_to_warga_table', 10);

-- Dumping structure for table anangfilaments.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table anangfilaments.profil
CREATE TABLE IF NOT EXISTS `profil` (
  `profil_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_desa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_kantor` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci,
  `misi` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`profil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.profil: ~1 rows (approximately)
INSERT INTO `profil` (`profil_id`, `nama_desa`, `kecamatan`, `kabupaten`, `provinsi`, `alamat_kantor`, `email`, `telepon`, `visi`, `misi`, `logo`, `created_at`, `updated_at`) VALUES
	(1, 'KEPULAUAN PULU PULU', 'KECAMATAN PULU PULU', 'KECAMATAN PULU PULU', 'KECAMATAN PULU PULU', 'JALAN SESAT, KABUTEN EPEP', 'epep@binadesa.site', '081267905243', 'MENJADIKAN EPEP SEBAGAI GAME TERLARIS DI DUNIA', 'MENJADIKAN EPEP SEBAGAI GAME TERLARIS DI DUNIA', 'profil/logo/01KCMGBG5WKVE36D1DHBZCKS1K.png', '2025-12-13 06:28:08', '2025-12-16 14:16:41');

-- Dumping structure for table anangfilaments.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.sessions: ~3 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('WKfchvUeowK3R1JSXFvjAOhxhOMRYThECEqWJkUl', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOWtnUDQxcEJ1NFNremRYWFM3c3R6U245VDlUZ3pMS0VrU2g2MkxkVyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7czo1OiJyb3V0ZSI7czozMDoiZmlsYW1lbnQuYWRtaW4ucGFnZXMuZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiQxeGZyMWdWdld0WDlYWTQ0NC8vWGkuOW1PQTgubVMyQVA5TFl4b3ZnaFZFS0FXblllelc4eSI7fQ==', 1765915834),
	('zaqJVCHBYDfm2svY3avpb5kAOb0jjOXSJpmuhksq', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQXRkeWdtRFBHTlNHZ0JnR2JhQzRDd0xkS3FFaTNmWkpRN1lMamJ4NiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4iO3M6NToicm91dGUiO3M6MzA6ImZpbGFtZW50LmFkbWluLnBhZ2VzLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiQxeGZyMWdWdld0WDlYWTQ0NC8vWGkuOW1PQTgubVMyQVA5TFl4b3ZnaFZFS0FXblllelc4eSI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1765922265),
	('ZhzUuPrctJidYX0yLHwEPS8ffwZO7MqA7SPZpBKj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnJGVVpKMXY0VXBDaWhIMEF1bE9hVmVMUDdjbVEyUENuQUVQYWdPUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7czo1OiJyb3V0ZSI7czoyNToiZmlsYW1lbnQuYWRtaW4uYXV0aC5sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767525657);

-- Dumping structure for table anangfilaments.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Mhd Fauzan', 'anang@afsphere.site', NULL, '$2y$12$1xfr1gVvWtX9XY444//Xi.9mOA8.mS2AP9LYxovghVEKAWnYezW8y', 'super_admin', 'KNN7NCmXYbLG220uOTNWLKOVDWRCaDMxZFxEfI1dsDKAR5R0IXPZjzBaOzWI', '2025-12-07 05:19:24', '2025-12-07 07:30:16'),
	(2, 'Muzakar Saputra', 'muzakar@anang.id', NULL, '$2y$12$L7zJm4XGjQhQaYEgST3HrepE6wUWxT.Z.q6ZPTaE7O5s9XPoBcGyi', 'user', NULL, '2025-12-07 07:29:11', '2025-12-07 07:29:11'),
	(3, 'Anang', 'anang@anangg.id', NULL, '$2y$12$3AuztqjV9sqZM1FIrhmz9OCADXyDg7hwvxzkEH/ApQJLcEJEYHHeq', 'super_admin', NULL, '2025-12-09 05:39:22', '2025-12-09 05:39:22'),
	(4, 'Adrian', 'adrian@anang.id', NULL, '$2y$12$p1c4up8geonHHIArILloa.ta2uXpFBR8PkaKlP0PIktNe70LcWJGC', 'user', NULL, '2025-12-09 05:42:10', '2025-12-09 05:42:10'),
	(5, 'Fahara', 'Fahara@anang.id', NULL, '$2y$12$YSlGcioVahhBRVmRsf29k.7HKTPmFjk104l0WUHn8VWkbW08edgOS', 'super_admin', NULL, '2025-12-16 14:55:36', '2025-12-16 14:55:36');

-- Dumping structure for table anangfilaments.warga
CREATE TABLE IF NOT EXISTS `warga` (
  `warga_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`warga_id`),
  UNIQUE KEY `warga_no_ktp_unique` (`no_ktp`),
  KEY `warga_no_ktp_index` (`no_ktp`),
  KEY `warga_nama_index` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table anangfilaments.warga: ~5 rows (approximately)
INSERT INTO `warga` (`warga_id`, `no_ktp`, `nama`, `jenis_kelamin`, `agama`, `pekerjaan`, `telp`, `email`, `foto`, `created_at`, `updated_at`) VALUES
	(1, '3201012001010001', 'Ahmad Fauzi', 'L', 'Islam', 'Petani', '081234567890', 'ahmad.fauzi@example.com', 'warga/foto/01KCMJDAX4MMXANXJKP4D76MX8.png', '2025-12-16 13:42:37', '2025-12-16 14:52:38'),
	(2, '3201012001010002', 'Siti Nurhaliza', 'P', 'Islam', 'Ibu Rumah Tangga', '081234567891', 'siti.nurhaliza@example.com', NULL, '2025-12-16 13:42:37', '2025-12-16 13:42:37'),
	(3, '3201012001010003', 'Budi Santoso', 'L', 'Kristen', 'Wiraswasta', '081234567892', 'budi.santoso@example.com', NULL, '2025-12-16 13:42:37', '2025-12-16 13:42:37'),
	(4, '3201012001010004', 'Dewi Lestari', 'P', 'Hindu', 'Guru', '081234567893', 'dewi.lestari@example.com', NULL, '2025-12-16 13:42:37', '2025-12-16 13:42:37'),
	(5, '3201012001010005', 'Eko Prasetyo', 'L', 'Buddha', 'PNS', '081234567894', 'eko.prasetyo@example.com', NULL, '2025-12-16 13:42:37', '2025-12-16 13:42:37');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
