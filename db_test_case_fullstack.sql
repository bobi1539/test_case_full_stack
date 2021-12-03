-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Des 2021 pada 19.51
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test_case_fullstack`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'minus', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(2, 'debitis', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(3, 'aliquam', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(4, 'alias', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(5, 'eaque', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(6, 'incidunt', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(7, 'aliquid', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(8, 'illum', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(9, 'et', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(10, 'Elektronik', '2021-12-02 19:16:34', '2021-12-03 05:24:27'),
(12, 'tas', '2021-12-02 19:31:57', '2021-12-02 19:31:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
(60, '2014_10_12_000000_create_users_table', 1),
(61, '2014_10_12_100000_create_password_resets_table', 1),
(62, '2019_08_19_000000_create_failed_jobs_table', 1),
(63, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(64, '2021_12_02_145935_create_categories_table', 1),
(65, '2021_12_03_003948_create_products_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(2, 10, 'Majo Pro', '<div>Cumque enim expedita corporis est voluptates.</div>', 2750000, 'product-images/F7esulLo2CMdMb7lUjs2vVt2N1hmUY0S0PKIUmdQ.png', '2021-12-02 19:16:34', '2021-12-03 05:24:37'),
(3, 10, 'Majo LifeStyle', '<div>Eos architecto sunt in atque quo.</div>', 2750000, 'product-images/h9UGgdgn8d4VUZPeSjTbzO2jA69gXCVdm0AORMyd.png', '2021-12-02 19:16:34', '2021-12-03 05:24:48'),
(4, 10, 'Majo Desktop', '<div>Commodi occaecati architecto incidunt.</div>', 2750000, 'product-images/GcUGOyzzhcleN3yxxPlwU5r6mpYrdcf6KZCzaNB4.png', '2021-12-02 19:16:34', '2021-12-03 05:24:57'),
(6, 10, 'Majo Advance', '<div>Sint consectetur enim molestiae aperiam.</div>', 2750000, 'product-images/rP6aHRuFVZ4bLskutalY2sTxh3UvCZwfSGrqrzaA.png', '2021-12-02 19:16:34', '2021-12-03 05:25:03'),
(7, 2, 'quia', 'Harum assumenda quo rerum fuga similique natus.', 71828, 'product-images/default-image.jpg', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(8, 9, 'eum', 'Consectetur voluptatem aliquid quis.', 26290, 'product-images/default-image.jpg', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(9, 4, 'non', 'Ut explicabo similique porro voluptas.', 54916, 'product-images/default-image.jpg', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(10, 5, 'molestiae', 'Accusamus voluptate omnis aut corrupti.', 52271, 'product-images/default-image.jpg', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(11, 8, 'dolores', 'Labore aut exercitationem aliquid tempore.', 75744, 'product-images/default-image.jpg', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(12, 4, 'earum', 'Soluta est a sed aut dolor.', 78700, 'product-images/default-image.jpg', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(13, 2, 'iste', 'Natus quis molestiae saepe dolores.', 67872, 'product-images/default-image.jpg', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(14, 1, 'eos', 'Nulla soluta ad adipisci ex iusto qui cupiditate.', 97486, 'product-images/default-image.jpg', '2021-12-02 19:16:34', '2021-12-02 19:16:34'),
(15, 8, 'nesciunt', 'Ut quas maiores quo dolores earum.', 91832, 'product-images/default-image.jpg', '2021-12-02 19:16:34', '2021-12-02 19:16:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ucup surucup', 'ucup@gmail.com', '$2y$10$MEeZNv3mG9mD6W8J1gZtSeSq4OMPK2VFDk7ZgYn1IfIFm/Oh9Hxsy', '2021-12-02 19:16:34', '2021-12-02 19:16:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
