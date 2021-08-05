-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for larasite
DROP DATABASE IF EXISTS `larasite`;
CREATE DATABASE IF NOT EXISTS `larasite` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `larasite`;

-- Dumping structure for table larasite.followers
DROP TABLE IF EXISTS `followers`;
CREATE TABLE IF NOT EXISTS `followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follower_id` int(10) unsigned NOT NULL,
  `leader_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `follower_user` (`follower_id`),
  KEY `leader_user` (`leader_id`),
  CONSTRAINT `follower_user` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `leader_user` FOREIGN KEY (`leader_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table larasite.followers: ~1 rows (approximately)
DELETE FROM `followers`;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` (`id`, `follower_id`, `leader_id`, `created_at`, `updated_at`) VALUES
	(5, 4, 5, '2021-04-18 10:09:53', '2021-04-18 10:09:53');
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;

-- Dumping structure for table larasite.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL DEFAULT '',
  `user_id` int(11) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_user` (`user_id`),
  CONSTRAINT `image_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table larasite.images: ~2 rows (approximately)
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `image_url`, `description`, `user_id`, `updated_at`, `created_at`) VALUES
	(6, '/assets/upload_image/1618384030.png', 'This is sample uploading for test.\r\nThanks for vis', 4, '2021-04-14 07:07:10', '2021-04-14 07:07:10'),
	(7, '/assets/upload_image/1618384384.png', 'This is another work image.\r\nThanks.', 4, '2021-04-14 07:13:04', '2021-04-14 07:13:04'),
	(8, '/assets/upload_image/1618889283.png', 'This is test image for following function.\r\nThanks', 5, '2021-04-20 03:28:03', '2021-04-20 03:28:03');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table larasite.messages
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(10) unsigned NOT NULL,
  `receiver_id` int(10) unsigned NOT NULL,
  `content` varchar(50) NOT NULL DEFAULT '',
  `isread` tinyint(4) NOT NULL DEFAULT 0,
  `removedSender` tinyint(4) NOT NULL DEFAULT 0,
  `removedReceiver` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sender_user` (`sender_id`) USING BTREE,
  KEY `receiver_user` (`receiver_id`),
  CONSTRAINT `receiver_user` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sender_user` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table larasite.messages: ~9 rows (approximately)
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `content`, `isread`, `removedSender`, `removedReceiver`, `updated_at`, `created_at`) VALUES
	(2, 4, 3, 'fdsafdafdasfasfa', 1, 0, 0, '2021-04-19 06:52:50', '2021-04-19 00:23:35'),
	(3, 2, 4, 'Hi there', 0, 0, 0, '2021-04-19 07:18:57', '2021-04-19 00:24:21'),
	(4, 3, 4, 'Okay tvsdfawreareraew', 1, 0, 0, '2021-04-19 11:37:20', '2021-04-19 00:26:15'),
	(5, 4, 2, 'This is reply for test test.', 0, 0, 0, '2021-04-19 07:19:46', '2021-04-19 07:19:46'),
	(6, 4, 2, 'How are you this morning?', 0, 0, 0, '2021-04-19 07:26:28', '2021-04-19 07:26:28'),
	(8, 5, 4, 'Hi, there, how are you?', 0, 0, 0, '2021-04-19 08:01:55', '2021-04-19 07:58:24'),
	(9, 4, 5, 'I am fine, thanks.', 1, 0, 0, '2021-04-19 11:37:53', '2021-04-19 07:59:36'),
	(10, 5, 4, 'Roger has posted new image!.', 0, 0, 0, '2021-04-20 03:28:03', '2021-04-20 03:28:03'),
	(11, 14, 4, 'Hi, how are you?', 0, 0, 0, '2021-04-20 06:04:28', '2021-04-20 06:04:28');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Dumping structure for table larasite.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table larasite.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table larasite.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `amount` double(8,2) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table larasite.orders: ~12 rows (approximately)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`orderID`, `orderNumber`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
	(3, 'INV-05459', 18.60, 1, '2016-05-04 03:30:00', '2016-05-18 23:02:04'),
	(4, 'INV-0', 20.55, 2, '2016-05-10 03:30:00', NULL),
	(10, 'INV-1011', 70.50, 1, '2016-05-11 11:04:35', '2016-05-11 11:04:35'),
	(11, 'INV-101187', 70.50, 1, '2016-05-11 11:05:01', '2016-05-11 11:05:01'),
	(12, 'INV-101187', 70.50, 1, '2016-05-11 11:05:28', '2016-05-11 11:05:28'),
	(13, 'INV-87', 45.60, 1, '2016-05-18 22:26:58', '2016-05-18 22:26:58'),
	(14, 'INV-00872', 50.60, 1, '2016-05-18 22:27:46', '2016-05-18 22:27:46'),
	(15, 'INV-088', 58.60, 1, '2016-05-18 22:34:35', '2016-05-18 22:34:35'),
	(16, 'IIY-01', 90.50, 1, '2016-05-18 22:35:50', '2016-05-18 22:35:50'),
	(17, 'TT-262', 88.00, 1, '2016-05-18 22:36:29', '2016-05-18 22:36:29'),
	(18, 'INV-066', 89.40, 1, '2016-05-18 22:38:11', '2016-05-18 22:38:11'),
	(19, '878', 10.90, 1, '2016-05-18 22:47:47', '2016-05-18 22:47:47');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table larasite.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table larasite.password_resets: ~1 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('niladridey933@gmail.com', 'f6b9f01b1a128a0c38dba673b2b2e987404937ff9607a2fb5d8a1b2652eeda45', '2016-05-18 13:21:28');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table larasite.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `sport` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_api_token_unique` (`api_token`),
  KEY `user_type` (`type_id`),
  CONSTRAINT `user_type` FOREIGN KEY (`type_id`) REFERENCES `user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table larasite.users: ~6 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `api_token`, `address`, `remember_token`, `created_at`, `updated_at`, `state`, `position`, `grade`, `year`, `sport`, `type_id`) VALUES
	(1, 'Niladri Dey', 'niladridey933@gmail.com', '$2y$10$f//g/PX4eP7D4UEzvVq.L.nlyvR3DYwONyvZ47P9wCRgC2QORt.da', 'Ak28OCJFgawryj1LoGm8WfBY1BMVk8awH5YpGSdgvOTcs5y3HJrpFb9fE3lA', 'myaddress', 'ICG6A7og2RAENiMqMTl2raoYjG7LoL7CNdCG3tKj0MPW1urpbSNaWbUNlfrF', '2016-05-10 19:24:05', '2016-05-18 23:25:55', NULL, NULL, NULL, NULL, NULL, 2),
	(2, 'Test Test', 'niladridey9333@gmail.com', '$2y$10$kx/MytUwCeyAfOtb3aiSjeVc4pLLjh/mSHJ7VRM1iR7QSOUa/qv2m', 'DUi9kkGfpyHY4wHPizcs6jidOR63EOZXlq5g0raH1ZV2CMXD6FsVyi1kKyIW', 'Gm Lane', 'wdCJ6UTeDXrZPYxi713kvJ28Tl0s2GagACOO1JNLhTl4TPCKe548ijA6wYjn', '2016-05-10 19:24:24', '2016-05-10 19:24:26', NULL, NULL, NULL, NULL, NULL, 1),
	(3, 'Niladri Dey', 'niladridey93387@gmail.com', '$2y$10$0Jlwr.LAVc0m11Nfz7f5i.teC0ppQylqoFMhbTZmdVmlkKWSEttRK', 'odoo4efnTxwdHpxFPWnwFzRIqa21mE2Jz33wqOnheMU5MgQafJ4g7zg6fMu9', 'test address', 'r4fE5bGqg4ZHJmQo5xge9jBjvZJTb7STB4376oKf5Fowa880cqzRGLMwucMX', '2016-05-13 14:31:59', '2016-05-13 14:32:14', NULL, NULL, NULL, NULL, NULL, 2),
	(4, 'Sulton Nazarov', 'admim@admin.com', '$2y$10$C2LJ8z7naUIojKt1V5VimuzXXJnQIlBtnU2.iUAYQvGi0GXetxJQW', 'AxYFb3tl5yvB0HMqCX1JeqYhdX6QVQRlLeA9lh0ksJQlANzv4ZCKrgI6WEoX', '123, 123', '5lCPvm6QnSAQTNIKcnZIYMnpg8QRtI2e9K2xkhAnns6O2xa2UI5rZb7Vjvzc', '2021-04-13 08:25:24', '2021-04-20 06:10:20', 'What', 'position', 5, 2021, 'Basketball', 1),
	(5, 'Roger', 'roger@roger.com', '$2y$10$aYMGoeTcbAMgzsGNS2WC4.OM0hfy0a5Z0hEAvgM/CY84I1SzN75ZG', 'vhsPxokD4XNUyB06JSZQd9shweIgdHvZSIoDEdMyMh0mS5aAuGMAsZsfKFw4', '123', 'qvmNQqMPQjhwdytgK6ELAWyEywY1ZTc1pcYbTjhvz7FIIYFbQ4nyBsHlwOCV', '2021-04-16 06:59:49', '2021-04-20 03:28:06', NULL, NULL, NULL, NULL, NULL, 2),
	(6, 'Test', 'test@test.com', '$2y$10$bzU9BmdZlvriwdBD83sCRO/8l9QgopWSPAuXCfobqdqXHUmHqKDWy', 'XGE4egJp18VEXLWHJvryQWrrzlffOsJnm5irkAo3n2DC3TG8qM6WHSz7JDWV', 'test address', 'mcNgqIDpgIv2s1GfAy8jFvDZnWiC28z75WqOrbS2tnkjypEsuWlFjsIXWvj2', '2021-04-16 15:59:54', '2021-04-16 16:55:13', NULL, NULL, NULL, NULL, NULL, 1),
	(14, 'Trusted Developer', 'trustfirst12@outlook.com', '$2y$10$g/SXKcaSOKNnds8LQydyvOr.nuP7MniHSVkqPuAEZ2dbSYnWbET1e', 'dfiwUzKR8Ofx4ky1tLKU6k01dOgS3YCQ2DekWnRS0hk2DLdZHndoALBFyRXt', '5588444', 'lqlC7bsJFxLai0aw0nep94j0exLxMBy06RLNSCZMJHip7wbitID9wVzl0GtH', '2021-04-20 05:56:53', '2021-04-20 06:04:31', NULL, NULL, NULL, NULL, NULL, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table larasite.user_type
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `role` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table larasite.user_type: ~2 rows (approximately)
DELETE FROM `user_type`;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` (`id`, `type`, `role`) VALUES
	(1, 'Athlete', 0),
	(2, 'Coach', 0);
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;

-- Dumping structure for table larasite.videos
DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `video_url` varchar(100) NOT NULL,
  `description` varchar(50) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_user` (`user_id`),
  CONSTRAINT `video_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table larasite.videos: ~3 rows (approximately)
DELETE FROM `videos`;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` (`id`, `name`, `video_url`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, '', '/assets/upload_video/test.mp4', 'fdas', 4, '2021-04-16 06:31:30', '2021-04-16 06:31:30'),
	(4, '', '/assets/upload_video/1618558275.test.mp4', 'This is mp4 file for uploading.\r\nThanks for watchi', 4, '2021-04-16 07:31:15', '2021-04-16 07:31:15');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
