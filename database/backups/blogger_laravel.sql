-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 03:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogger_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_post_view_10_4c6fecdce88b356e41f5286b58447ca7', 'b:1;', 2060570873),
('laravel_cache_post_view_3_4c6fecdce88b356e41f5286b58447ca7', 'b:1;', 2060571125),
('laravel_cache_postview_2_06b483579b73849ec8de8e70c264b0ec', 'b:1;', 1744691942),
('laravel_cache_postview_3_06b483579b73849ec8de8e70c264b0ec', 'b:1;', 1744972349),
('laravel_cache_postview_9_06b483579b73849ec8de8e70c264b0ec', 'b:1;', 1744720706),
('laravel_cache_postview_ip_3_f528764d624db129b32c21fbca0cb8d6', 'b:1;', 1745292745);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `gambar_kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `slug_kategori`, `gambar_kategori`, `created_at`, `updated_at`) VALUES
(7, 'Makanan Utama', 'makanan-utama', 'v2YwvPK1Bg5eEZhyZCpydNUAcyNqSTeKH8QdaMwR.jpg', '2025-03-30 02:23:55', '2025-05-13 06:49:48'),
(8, 'Makanan Pembuka', 'makanan-pembuka', 'ZMVvVSXSrMA2TQ8QWkWFTa3jYWzQ8P7L93YdaAJT.jpg', '2025-03-30 02:24:08', '2025-05-13 06:38:41'),
(9, 'Makanan Penutup', 'makanan-penutup', 'W00btoTgeUYXPFJtVwLZRpq6Y9NskHwpf5b5C3kn.jpg', '2025-03-30 02:24:23', '2025-05-13 04:47:54'),
(10, 'Camilan & Kudapan', 'camilan-kudapan', 'RvyUZbNotKSR1dn9G0nrIhYKh6jX0dUoXglMLdOp.jpg', '2025-03-30 02:24:40', '2025-05-13 05:30:47'),
(11, 'Minuman & Smoothies', 'minuman-smoothies', 'whg0Ipsnafz3jaDCEWMpIuLI7Nma1yG5tBEriHj6.jpg', '2025-03-30 02:24:53', '2025-05-13 04:49:50'),
(12, 'Sarapan', 'sarapan', 'XNaIsNXahU1msVfim7E917CuYQ1m2W7ECahFjwG5.jpg', '2025-03-30 02:25:04', '2025-05-13 05:18:26'),
(13, 'Resep Ayam', 'resep-ayam', '', '2025-03-30 02:25:32', '2025-03-30 02:25:32'),
(14, 'Resep Daging Sapi', 'resep-daging-sapi', '', '2025-03-30 02:25:43', '2025-03-30 02:25:43'),
(15, 'Resep Seafood', 'resep-seafood', '', '2025-03-30 02:25:54', '2025-03-30 02:25:54'),
(16, 'Resep Sayuran', 'resep-sayuran', '', '2025-03-30 02:26:06', '2025-03-30 02:26:06'),
(17, 'Resep Telur', 'resep-telur', '', '2025-03-30 02:26:18', '2025-03-30 02:26:18'),
(18, 'Resep Tahu & Tempe', 'resep-tahu-tempe', '', '2025-03-30 02:26:35', '2025-03-30 02:26:35'),
(19, 'Masakan Indonesia', 'masakan-indonesia', '', '2025-03-30 02:26:57', '2025-03-30 02:26:57'),
(20, 'Masakan Asia', 'masakan-asia', '', '2025-03-30 02:27:09', '2025-03-30 02:27:09'),
(21, 'Masakan Barat', 'masakan-barat', '', '2025-03-30 02:27:23', '2025-03-30 02:27:23'),
(22, 'Masakan Timur Tengah', 'masakan-timur-tengah', '', '2025-03-30 02:27:37', '2025-03-30 02:27:37'),
(23, 'Masakan untuk Diet', 'masakan-untuk-diet', '', '2025-03-30 02:28:08', '2025-03-30 02:28:08'),
(24, 'tes kategori', 'tes-kategori', NULL, '2025-05-11 05:02:12', '2025-05-11 05:02:12'),
(25, 'tes dulu', 'tes-dulu', 'NLHJCkgOZEOH3Vny4upn5ZKiOukXCvbciae1I4Vw.jpg', '2025-05-11 05:07:17', '2025-05-13 04:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_08_052136_create_categories_table', 2),
(5, '2025_03_08_053635_create_users_table', 3),
(6, '2025_03_09_104621_create_posts_table', 4),
(7, '2025_03_09_111006_create_post__categories_table', 5),
(8, '2025_03_09_111734_create_post_categories_table', 6),
(9, '2025_03_24_015538_create_media_table', 7),
(10, '2025_04_07_035104_create_tags_table', 8),
(11, '2025_04_07_043715_create_tags_table', 9),
(12, '2025_04_07_125122_create_post_tags_table', 10),
(13, '2025_04_10_073332_add_is_editor_pick_to_posts_table', 11),
(14, '2025_04_10_091948_add_is_editor_pick_to_posts_table', 12),
(15, '2025_04_14_085033_create_post_views_table', 13),
(16, '2025_04_14_110147_create_post_views_table', 14),
(17, '2025_04_14_110732_create_post_views_table', 15),
(18, '2025_04_14_112634_add_view_post_to_posts_table', 16),
(19, '2025_04_20_080839_add_published_at_to_posts_table', 17),
(20, '2025_04_21_114212_add_device_id_to_post_views_table', 18),
(21, '2025_05_11_084320_add_gambar_kategori_to_categories_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title_post` varchar(255) DEFAULT NULL,
  `slug_post` varchar(255) NOT NULL,
  `keyword_post` varchar(255) DEFAULT NULL,
  `thumbnail_post` varchar(255) DEFAULT NULL,
  `content_post` text DEFAULT NULL,
  `status_post` enum('draft','publish') NOT NULL,
  `view_post` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `is_editor_pick` tinyint(1) NOT NULL DEFAULT 0,
  `editor_pick_priority` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title_post`, `slug_post`, `keyword_post`, `thumbnail_post`, `content_post`, `status_post`, `view_post`, `created_at`, `updated_at`, `published_at`, `is_editor_pick`, `editor_pick_priority`) VALUES
(2, 12, 'Resep Nasi Kuning', 'resep-nasi-kuning', 'resep nasi kuning', 'Qjvj1lIcWkdacnCmR05sL8NfAjRQU7sfBE0Z7PHG.jpg', '<p>Inilah resep nasi kuning</p><p><br></p><p><br></p>', 'publish', 4, '2025-03-14 10:27:44', '2025-05-13 11:36:11', '2025-04-20 02:47:25', 0, 0);
INSERT INTO `posts` (`id`, `user_id`, `title_post`, `slug_post`, `keyword_post`, `thumbnail_post`, `content_post`, `status_post`, `view_post`, `created_at`, `updated_at`, `published_at`, `is_editor_pick`, `editor_pick_priority`) VALUES
(3, 12, 'Resep Magic Water', 'resep-magic-water', 'resep magic water', '7J3P0rMzByeOd6s1Ks5lM3L4eKeApybADohY3Yd1.jpg', '<p>Magic Water atau Palamig adalah minuman segar khas Filipina yang sedang viral.</p><p>Minuman ini memiliki tampilan bening seperti air biasa, tetapi rasanya manis dan menyegarkan.</p><p>Magic Water adalah minuman jalanan populer di Filipina, terutama pada musim kemarau.</p><p><br></p><p><img src=\"data:image/jpeg;base64,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\"></p><p><br></p><p>Berikut adalah resep dasar Magic Water:</p><p><br></p><p><strong>Bahan Jelly:</strong></p><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 bungkus (10gr) agar-agar tanpa rasa (plain) atau rasa leci.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>60-80 gram (2 sdm) gula pasir</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>400 ml air</li></ol><p><br></p><p><strong>Bahan Minuman:</strong></p><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>700 ml air</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>100 gram gula pasir</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 sendok teh esens pisang, melon, atau leci</li></ol><p><br></p><p><strong>Bahan Tambahan:</strong></p><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Es batu secukupnya</li></ol><p><br></p><p>itulah resep yang bisa anda ikuti dan silahkan menikmati!</p>', 'publish', 5, '2025-03-14 10:28:04', '2025-04-21 04:52:05', '2025-04-20 02:34:03', 1, 93);
INSERT INTO `posts` (`id`, `user_id`, `title_post`, `slug_post`, `keyword_post`, `thumbnail_post`, `content_post`, `status_post`, `view_post`, `created_at`, `updated_at`, `published_at`, `is_editor_pick`, `editor_pick_priority`) VALUES
(4, 14, 'Post Baru Bro', 'post-baru-bro', 'post-baru-bro', NULL, '<p>hehe tes dulu bro, harusnya sih ke atas langsung</p>', 'draft', 0, '2025-03-18 00:19:17', '2025-05-03 11:33:50', NULL, 0, 0),
(5, 12, 'Resep Japanese Souffle Pancake', 'resep-japanese-souffle-pancake', 'resep japanese souffle pancake', 'lNkBpnwdtHngA9vLuCCu03MC8YtVt6J3o9vytzEP.jpg', '<p>Souffle pancake ialah sebutan untuk pancake khas Jepang, beberapa waktu yang lalu kue ini sempat viral di media sosial karena peminatnya cukup banyak. Souffle pancake dapat dibuat dengan bahan dan alat yang ada di rumah. Di sini kamu bisa memanfaatkan wajan antilengket untuk memanggang adonan. Resep souffle pancake ala rumahan bisa dicoba sebagai berikut.</p><p><br></p><p><img src=\"http://127.0.0.1:8000/storage/content/1744783811_souffle.jpg\"></p><p><br></p><h2><strong>Resep <em>souffle </em>pancake</strong></h2><p><br></p><p><strong>Bahan souffle pancake</strong>:</p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>100 gram tepung terigu</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>50 gram gula pasir</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>2 butir telur ayam</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>50 mililiter air lemon</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>70 mililiter susu</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Cokelat leleh secukupnya (untuk topping)</li></ol><p><br></p><p><strong>Cara membuat souffle pancake</strong>:</p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Aduk kuning telur, tepung terigu, dan susu di dalam wadah menggunakan whisker hingga tercampur rata. Sisihkan!</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Di wadah terpisah, aduk putih telur dan gula menggunakan mikser hingga adonan kaku. Tambahkan air lemon sembari mengaduk putih telur.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Campur adonan putih telur ke dalam campuran terigu, lalu aduk dengan teknik melipat hingga tercampur rata. Tambahkan vanila dan aduk kembali dengan teknik melipat.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Siapkan cetakan berbentuk bulat dari kertas di atas telfon anti lengket, lalu tuang adonan pancake ke dalam cetakan.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Panggang pancake menggunakan api kecil hingga bagian bawah pancake berwarna kecoklatan, kemudian balik adonan dan panggang sisi lainnya hingga berwarna kecoklatan.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Angkat pancake dan lepaskan cetakan kertas yang menempel. Sajikan pancake dengan siraman cokelat leleh.</li></ol>', 'publish', 2, '2025-03-18 00:20:56', '2025-05-15 04:58:40', '2025-04-20 02:32:48', 1, 75),
(7, 12, 'Post Baru', 'post-baru-2', NULL, NULL, '<p>cek dulu gan</p>', 'draft', 0, '2025-03-18 00:24:20', '2025-04-17 14:49:47', NULL, 0, 0),
(9, 15, 'Ikan Nila Bumbu Kuning', 'tes-dulu-boyyy', 'tes dulu boyyy', 'P53UREGZDVknQNpYDqH7Sf2TfcebpBI9Y0y5gwp6.jpg', '<p>Menyantap ikan goreng tanpa ada bumbu bisa membuat bosan. Coba kreasikan ikan goreng dengan bumbu acar kuning.  Acar kunig sudah termasuk sayuran seperti wortel dan timun. Bumbunya sendiri saja sudah nikmat disantap dengan nasi putih hangat. </p><p><br></p><p><img src=\"http://127.0.0.1:8000/storage/content/1747118017_ikan-nila-bumbu-kuning.jpg\"></p><p><br></p><p>Simak resep ikan acar kuning dari Sajian Sedap berikut, kamu bisa pakai ikan kembung atau nila.</p><p><br></p><h2>Bahan-bahan:</h2><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>5 Ekor ikan nila</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 buah wortel</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>4-5 batang kemangi ambil ujung dan daun saja</li></ol><p><br></p><p><strong>bumbu halus</strong></p><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>5 Siung bawang merah</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>4 Siung bawang putih</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>2 ruas jari jahe</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 bungkus lada bubuk</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 sendok makan ketumbar bubuk</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>2 sendok makan kunyit bubuk</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>3-4 buah kemiri</li></ol><p><br></p><p><strong>bumbu potong</strong></p><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 buah tomat potong</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>10 buah cabai rawit potong menjadi dua bagian</li></ol><p><br></p><p><strong>bumbu aromatik</strong></p><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 buah sereh geprek</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>2 ruas jari lengkuas geprek</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>3 lembar daun salam</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>3 lembar daun jeruk</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>3-4 buah asam jawa</li></ol><p><br></p><h2>Cara memasak:</h2><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Haluskan semua bumbu halus(di foto lupa kemiri), potong smua bumbu potong, dan siapkan bumbu aromatik.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Bersihkan Ikan Nila,lalu Goreng seperti biasa dengan bumbu,garam, bawang putih, ketumbar, kunyit.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Tumis bumbu aromatik dengan minyak hingga wangi.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Masukan bumbu halus tumis hingga wangi dan tidak langu.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Masukan bumbu potong</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Tumis lalu, beri air, dan masukan wortel yang di Potong memanjang,tunggu hingga air mendidih dan wortel empuk. Lalu koreksi rasa jangan lupa gula garam</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Jika sudah mendidih dan wortel sudah empuk masukan ikan Nila yang sudah di goreng, jangan di aduk agar tidak hancur.Tunggu sebentar lalu masukan kemangi. Jika sudah matikan kompor.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Sudah matang, siap di santap dan sajikan</li></ol>', 'publish', 2, '2025-03-18 00:32:28', '2025-05-13 06:36:55', '2025-04-20 02:32:27', 1, 95),
(10, 12, 'Resep Pempek Panggang', 'resep-pempek-panggang', 'resep pempek panggang', 'ypXfP82iCvfpF04QwJ7EkJko4BeFennCJG4VqDC2.jpg', '<p>Pempek panggang termasuk dalam jenis olahan pempek yang tidak digoreng atau rebus. Makanan ini disebut juga dengan pempek tunu.</p><p>Masyarakat Palembang mengenal pempek panggang sebagai makanan khas yang dijadikan cemilan. Sajian ini menjadi menu rekomendasi ketika menggelar acara kumpul bersama seperti perayaan malam tahun baru.</p><p><br></p><h2><strong>Ciri Khas Pempek Panggang</strong></h2><p><br></p><p>Mengutip dari Buku Ensiklopedia: Seni, Budaya, dan Pariwisata Kota Palembang, ciri khas pempek panggang ini terletak pada adonan yang lebih padat dengan bentuk bulat pipih.</p><p><br></p><p>adapun cara pembuatannya</p>', 'publish', 2, '2025-03-18 00:32:42', '2025-05-13 11:36:34', '2025-04-20 02:05:24', 1, 50),
(11, 14, 'Resep Tumis Udang Saus Tiram', 'resep-tumis-udang-saus-tiram', 'resep tumis udang saus tiram', 'fndkotLmx9fQf5YL9PddVHXDbgjhR4V7x1sN4klu.jpg', '<p>Udang merupakan salah satu bahan makanan yang paling mudah diolah dan tidak pernah salah diolah apa saja karena udang sendiri sudah enak tanpa ditambah apa-apa, tapi jika ingin menumis udang yang praktis dan enak, ini resep yang anti ribet yang bisa dicoba.</p><p><br></p><p><img src=\"http://127.0.0.1:8000/storage/content/1747118864_tumis-udang-saus-tiram.jpg\"></p><p><br></p><h2>Bahan:</h2><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>200 gr udang ukuran sedang, kupas</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 buah bawang bombay, iris tipis</li></ol><p><br></p><h2>Bumbu:</h2><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>3 siung bawang putih, memarkan dan iris tipis</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>3 buah cabai rawit, iris serong (optional)</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 sdm saus tiram</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 sdm margarin</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>1 sdt kecap manis</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>garam dan lada bubuk secukupnya</li></ol><p><br></p><h2>Cara membuat:</h2><p><br></p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Tumis bawang putih dan bawang bombay hingga matang agak kecokelatan. Masukkan cabai dan tumis sebentar.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Masukkan udang dan tuang sedikit air, tumis hingga udang berubah warna.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Masukkan saus tiram, kecap manis, garam dan lada bubuk. Aduk rata.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Masukkan margarin dan tumis lagi hingga leleh dan tercampur rata dengan bumbu.</li></ol>', 'publish', 1, '2025-05-03 03:57:19', '2025-05-13 11:36:24', '2025-05-13 06:48:46', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(13, 9, 7, NULL, NULL),
(20, 3, 11, NULL, NULL),
(21, 5, 8, NULL, NULL),
(22, 10, 10, NULL, NULL),
(23, 9, 11, NULL, NULL),
(24, 11, 7, NULL, NULL),
(25, 2, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 9, 1, NULL, NULL),
(2, 3, 2, NULL, NULL),
(3, 9, 2, NULL, NULL),
(5, 5, 2, NULL, NULL),
(6, 10, 1, NULL, NULL),
(7, 11, 8, NULL, NULL),
(8, 11, 1, NULL, NULL),
(9, 2, 1, NULL, NULL),
(10, 2, 8, NULL, NULL),
(16, 5, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE `post_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `device_id` varchar(32) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_views`
--

INSERT INTO `post_views` (`id`, `post_id`, `ip_address`, `device_id`, `user_agent`, `created_at`, `updated_at`) VALUES
(14, 3, '127.0.0.1', '4c6fecdce88b356e41f5286b58447ca7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-21 04:52:05', '2025-04-21 04:52:05'),
(15, 5, '127.0.0.1', '2a3b3a9a01bf2e6cc53698df40537a6e', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-21 05:13:41', '2025-04-21 05:13:41'),
(16, 2, '127.0.0.1', '2a3b3a9a01bf2e6cc53698df40537a6e', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-03 01:46:37', '2025-05-03 01:46:37'),
(17, 11, '127.0.0.1', '6ea795a24108feccebbecc5109ec8718', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Mobile Safari/537.36', '2025-05-13 14:26:01', '2025-05-13 14:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('264GQKwSKRyp6pH5usSxEOcEKLyxjgskCwL9OMtJ', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR3ppdnlDdGh5b0s5d1FidlBHYkVWTldyNzl4SzJuSE9Ec25vT05OTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93cml0ZXIvc2V0dGluZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNDt9', 1747368320);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tag` varchar(255) NOT NULL,
  `slug_tag` varchar(255) NOT NULL,
  `img_tag` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `nama_tag`, `slug_tag`, `img_tag`, `created_at`, `updated_at`) VALUES
(1, 'pedas', 'pedas', 'pedas.png', NULL, NULL),
(2, 'manis', 'manis', 'pedas.png', NULL, NULL),
(3, 'tumis', 'tumis', 'pedas.png', NULL, NULL),
(4, 'kukus', 'kukus', 'pedas.png', NULL, NULL),
(5, 'rebus', 'rebus', 'pedas.png', NULL, NULL),
(6, 'bakar', 'bakar', 'pedas.png', NULL, NULL),
(7, 'asam', 'asam', 'pedas.png', NULL, NULL),
(8, 'gurih', 'gurih', 'pedas.png', NULL, NULL),
(9, 'keju', 'keju', 'pedas.png', NULL, NULL),
(10, 'panggang', 'panggang', 'pedas.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status_user` enum('aktif','nonaktif') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `email_verified_at`, `password`, `nohp`, `avatar`, `role`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'admin', 'System Administrator', 'admin@gmail.com', NULL, '$2y$12$8xt..oaFfsyWIh3aokbvyOwWC6jsdfxKWXiuR.QVK1HE/trdj8YQq', '089722223332', 'UvV9qeOCa3R4f4Y2CXr9zy2Cb4CGL2OykQHrxKab.jpg', 'admin', 'aktif', NULL, NULL, '2025-05-10 14:48:54'),
(14, 'budiono', 'Budiono Siregar', 'budiono@gmail.com', NULL, '$2y$12$7dWi5/aghnQ/QYqgs4dHlu7K3MhfbEES2NSl2v2BMr.HP.RjgJeBC', '08928299117', '48E9UQkTr2Sg0Xfaq2xk5zSDTf1F6HZWXHnrhGHA.jpg', 'writer', 'aktif', NULL, '2025-03-25 02:33:03', '2025-05-10 14:38:08'),
(15, 'sugiono', 'Sugiono', 'sugiono@gmail.com', NULL, '$2y$12$jJOW/3tR4cMkWoKCqIF/ZOWZIxuwy/xT4nySmNS7vaiFg1rahPgc6', '089833332222', 'hUTUtZvXAxtYuqPzcerKnw0Q9D8uyeSaeqK2mjAu.jpg', 'writer', 'aktif', NULL, '2025-05-03 08:42:36', '2025-05-13 11:14:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_post_id_category_id_unique` (`post_id`,`category_id`),
  ADD KEY `post_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_tags_post_id_tag_id_unique` (`post_id`,`tag_id`),
  ADD KEY `post_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_views_post_id_ip_address_index` (`post_id`,`ip_address`),
  ADD KEY `post_views_post_id_device_id_index` (`post_id`,`device_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_categories_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_views`
--
ALTER TABLE `post_views`
  ADD CONSTRAINT `post_views_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
