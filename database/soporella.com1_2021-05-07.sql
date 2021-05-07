# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.31)
# Database: soporella.com1
# Generation Time: 2021-05-07 15:29:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table attraction_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attraction_images`;

CREATE TABLE `attraction_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `img` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suggestion_attractions_attraction_id_foreign` (`attraction_id`),
  CONSTRAINT `attraction_images_ibfk_1` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `attraction_images` WRITE;
/*!40000 ALTER TABLE `attraction_images` DISABLE KEYS */;

INSERT INTO `attraction_images` (`id`, `attraction_id`, `img`, `sorting`, `created_at`, `updated_at`)
VALUES
	(19,22,'2021-05-07-image1.jpg',1,'2021-05-07 13:44:40','2021-05-07 13:44:40'),
	(20,22,'2021-05-07-image2.jpg',1,'2021-05-07 13:44:40','2021-05-07 13:44:40');

/*!40000 ALTER TABLE `attraction_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table attraction_interestedin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attraction_interestedin`;

CREATE TABLE `attraction_interestedin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `reference_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attraction_interestedin_attraction_id_foreign` (`attraction_id`),
  CONSTRAINT `attraction_interestedin_attraction_id_foreign` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table attraction_item_header
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attraction_item_header`;

CREATE TABLE `attraction_item_header` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `banner_img` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` tinyint(4) DEFAULT '0',
  `active` tinyint(1) DEFAULT NULL,
  `is_required` tinyint(4) DEFAULT '0',
  `is_multiple` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `language_string` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `attraction_item_header_attraction_id_foreign` (`attraction_id`),
  CONSTRAINT `attraction_item_header_attraction_id_foreign` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `attraction_item_header` WRITE;
/*!40000 ALTER TABLE `attraction_item_header` DISABLE KEYS */;

INSERT INTO `attraction_item_header` (`id`, `attraction_id`, `banner_img`, `title`, `img`, `sorting`, `active`, `is_required`, `is_multiple`, `created_at`, `updated_at`, `description`, `language_string`)
VALUES
	(20,22,NULL,NULL,NULL,0,1,0,0,'2021-04-27 16:17:10','2021-05-04 06:52:42',NULL,'a:2:{s:2:\"en\";a:2:{s:11:\"description\";s:8:\"Bew Gere\";s:5:\"title\";s:32:\"Bew Gere updated in english text\";}s:2:\"de\";a:2:{s:11:\"description\";s:32:\"Hala wla nag update sampka libog\";s:5:\"title\";s:8:\"Edited 1\";}}');

/*!40000 ALTER TABLE `attraction_item_header` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table attraction_related
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attraction_related`;

CREATE TABLE `attraction_related` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `reference_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attraction_interestedin_attraction_id_foreign` (`attraction_id`),
  CONSTRAINT `attraction_related_ibfk_1` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table attraction_upsell
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attraction_upsell`;

CREATE TABLE `attraction_upsell` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `reference_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attraction_interestedin_attraction_id_foreign` (`attraction_id`),
  CONSTRAINT `attraction_upsell_ibfk_1` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `attraction_upsell` WRITE;
/*!40000 ALTER TABLE `attraction_upsell` DISABLE KEYS */;

INSERT INTO `attraction_upsell` (`id`, `attraction_id`, `reference_id`)
VALUES
	(4,22,23);

/*!40000 ALTER TABLE `attraction_upsell` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table attractions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attractions`;

CREATE TABLE `attractions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `about` text COLLATE utf8mb4_unicode_ci,
  `redemption` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `availability` text COLLATE utf8mb4_unicode_ci,
  `policy` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language_string` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `attractions` WRITE;
/*!40000 ALTER TABLE `attractions` DISABLE KEYS */;

INSERT INTO `attractions` (`id`, `title`, `photo`, `short_description`, `about`, `redemption`, `description`, `availability`, `policy`, `video`, `active`, `slug`, `deleted_at`, `created_at`, `updated_at`, `language_string`)
VALUES
	(22,'Burj Khalifa Sky Deck & Afternoon Desert Safari','2021-05-04-soporella-placeholder.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'111111',1,'burj-khalifa-sky-deck-afternoon-desert-safari',NULL,'2021-04-19 13:56:46','2021-05-07 13:45:33','a:2:{s:2:\"en\";a:4:{s:12:\"availability\";s:25:\"Availability english here\";s:10:\"redemption\";s:41:\"Redemption english here agun wala na save\";s:5:\"about\";s:25:\"About another english ere\";s:11:\"description\";s:244:\"Take advantage of this discounted combo which allows you to experience and be mesmerized as you enjoy Dubai skyline from the top of the world’s tallest building, Burj Khalifa as well as to indulge into an exhilarating desert safari adventure.\";}s:2:\"de\";a:4:{s:12:\"availability\";s:45:\"Availability availablibiyt german another one\";s:10:\"redemption\";s:22:\"Redemption german here\";s:5:\"about\";s:17:\"About german here\";s:11:\"description\";s:11:\"german here\";}}'),
	(23,'Hello world','2021-04-22-jol1.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'hello-world',NULL,'2021-04-22 12:59:53','2021-04-22 13:07:37','a:2:{s:2:\"en\";a:2:{s:17:\"short_description\";N;s:11:\"description\";s:11:\"Hello world\";}s:2:\"de\";a:4:{s:12:\"availability\";N;s:10:\"redemption\";N;s:5:\"about\";N;s:11:\"description\";s:18:\"Hello world german\";}}');

/*!40000 ALTER TABLE `attractions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table atttraction_item_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `atttraction_item_details`;

CREATE TABLE `atttraction_item_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_rate_header_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `markdown_price` double(8,2) NOT NULL DEFAULT '0.00',
  `qty` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language_string` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `atttraction_item_details_attraction_rate_header_id_foreign` (`attraction_rate_header_id`),
  CONSTRAINT `atttraction_item_details_attraction_rate_header_id_foreign` FOREIGN KEY (`attraction_rate_header_id`) REFERENCES `attraction_item_header` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `atttraction_item_details` WRITE;
/*!40000 ALTER TABLE `atttraction_item_details` DISABLE KEYS */;

INSERT INTO `atttraction_item_details` (`id`, `attraction_rate_header_id`, `title`, `currency`, `price`, `markdown_price`, `qty`, `active`, `created_at`, `updated_at`, `language_string`)
VALUES
	(11,20,NULL,NULL,100.00,75.00,0,0,'2021-04-27 16:48:35','2021-05-07 13:46:22','a:2:{s:2:\"en\";a:1:{s:5:\"title\";s:5:\"Adult\";}s:2:\"de\";a:1:{s:5:\"title\";s:8:\"Edited 1\";}}'),
	(20,20,NULL,NULL,200.00,150.00,0,0,'2021-05-07 13:45:58','2021-05-07 13:46:27','a:2:{s:2:\"en\";a:1:{s:5:\"title\";s:6:\"Chiild\";}s:2:\"de\";a:1:{s:5:\"title\";s:0:\"\";}}');

/*!40000 ALTER TABLE `atttraction_item_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table campaigns
# ------------------------------------------------------------

DROP TABLE IF EXISTS `campaigns`;

CREATE TABLE `campaigns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `sorting` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '0',
  `display_option` tinyint(4) DEFAULT NULL,
  `discount_string` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slider` int(11) DEFAULT NULL,
  `img_2` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `large_img` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_1` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campaigns_attraction_id_foreign` (`attraction_id`),
  CONSTRAINT `campaigns_attraction_id_foreign` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `campaigns` WRITE;
/*!40000 ALTER TABLE `campaigns` DISABLE KEYS */;

INSERT INTO `campaigns` (`id`, `title`, `description`, `attraction_id`, `sorting`, `active`, `display_option`, `discount_string`, `created_at`, `updated_at`, `slider`, `img_2`, `large_img`, `img_1`)
VALUES
	(1,'TEST','asdfgfdsa',22,NULL,1,1,'90%',NULL,'2021-05-07 13:41:35',0,'placeholder-1.jpg','2021-05-07-image-1-pr.png','placeholder-1.jpg'),
	(2,'','',23,NULL,1,2,'30%',NULL,NULL,0,NULL,NULL,'placeholder-1.jpg'),
	(3,'','',23,NULL,1,3,'30%',NULL,NULL,0,NULL,NULL,'placeholder-1.jpg'),
	(4,'TEST','asdfgfdsa',22,NULL,1,4,'20%',NULL,NULL,0,'placeholder-1.jpg','placeholder-banner-1.jpg','placeholder-1.jpg'),
	(7,'',NULL,22,NULL,1,2,'10%','2021-05-07 14:13:05','2021-05-07 14:13:24',0,NULL,NULL,NULL),
	(8,'',NULL,23,NULL,1,2,'undefined','2021-05-07 14:54:43','2021-05-07 15:05:39',1,NULL,NULL,'2021-05-07-image-112.jpg');

/*!40000 ALTER TABLE `campaigns` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `session_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `ip_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `payment_id` bigint(20) unsigned DEFAULT NULL,
  `sms_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `currency` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_ref_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_user_id_foreign` (`user_id`),
  CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;

INSERT INTO `cart` (`id`, `user_id`, `session_id`, `fullname`, `mobile`, `email`, `ref_no`, `active`, `ip_address`, `processed_at`, `submitted_at`, `payment_id`, `sms_code`, `amount`, `currency`, `discount_code`, `created_at`, `updated_at`, `payment_ref_no`, `status_id`)
VALUES
	(1,NULL,'5p1Ys0WJxKuQD5MACiRd5xLJMCNmMmTvZDfxXbQX',NULL,NULL,NULL,NULL,0,'127.0.0.1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-04-10 19:10:56','2021-04-10 19:10:56',NULL,NULL),
	(2,1,'K1swOSuGnfBzoFAAaIJvXizekKzDSDgdv2PKqezh','Leslie Parba','09123456789','admin@soporella.com','0000009712',1,'127.0.0.1',NULL,'2021-04-18 13:24:26',1,NULL,NULL,'AED',NULL,'2021-04-18 13:24:03','2021-04-18 13:24:26',NULL,NULL),
	(3,1,'L0xqPgZ6a0KTW2d5UdwWXaNQRNbutK8zDks7M47r',NULL,NULL,NULL,NULL,0,'127.0.0.1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-04-27 17:27:12','2021-04-27 17:27:12',NULL,NULL),
	(4,1,'92rIoFwHSoujTWLFgze42wjxEZfhT2zPbXOQd3vB','Super Admin','111111','admin@soporella.com','0000009714',1,'127.0.0.1',NULL,'2021-04-29 17:12:19',NULL,NULL,NULL,'AED',NULL,'2021-04-29 16:56:51','2021-04-29 17:12:19',NULL,1),
	(5,1,'xHFhPy32ee1pf3xfp8TnYy92ygD5HyVT1mkH7A7n','Super Admin','111111','admin@soporella.com','0000009715',1,'127.0.0.1',NULL,'2021-05-07 14:30:39',1,NULL,NULL,'AED',NULL,'2021-05-07 14:29:36','2021-05-07 14:30:39',NULL,1);

/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cart_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart_details`;

CREATE TABLE `cart_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` bigint(20) unsigned DEFAULT NULL,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `attraction_detail_id` bigint(20) unsigned DEFAULT NULL,
  `sub_total` double(8,2) NOT NULL DEFAULT '0.00',
  `total_qty` int(11) DEFAULT '0',
  `variance_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `variance_total` double(8,2) NOT NULL DEFAULT '0.00',
  `selected_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_details_cart_id_foreign` (`cart_id`),
  CONSTRAINT `cart_details_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cart_details` WRITE;
/*!40000 ALTER TABLE `cart_details` DISABLE KEYS */;

INSERT INTO `cart_details` (`id`, `cart_id`, `attraction_id`, `attraction_detail_id`, `sub_total`, `total_qty`, `variance_details`, `variance_total`, `selected_date`, `created_at`, `updated_at`)
VALUES
	(3,3,22,12,0.00,3,'a:2:{i:0;a:5:{s:14:\"rate_detail_id\";i:11;s:5:\"title\";N;s:5:\"price\";d:85;s:3:\"qty\";s:1:\"1\";s:8:\"currency\";s:3:\"AED\";}i:1;a:5:{s:14:\"rate_detail_id\";i:12;s:5:\"title\";N;s:5:\"price\";d:75;s:3:\"qty\";s:1:\"2\";s:8:\"currency\";s:3:\"AED\";}}',346.00,'2021-04-15','2021-04-27 17:27:20','2021-04-27 17:27:20'),
	(4,4,22,11,0.00,1,'a:1:{i:0;a:5:{s:14:\"rate_detail_id\";i:11;s:5:\"title\";N;s:5:\"price\";d:100;s:3:\"qty\";s:1:\"1\";s:8:\"currency\";s:3:\"AED\";}}',100.00,'2021-04-09','2021-04-29 16:57:37','2021-04-29 16:58:17'),
	(6,5,22,20,0.00,3,'a:2:{i:0;a:5:{s:14:\"rate_detail_id\";i:11;s:5:\"title\";N;s:5:\"price\";d:75;s:3:\"qty\";s:1:\"1\";s:8:\"currency\";s:3:\"AED\";}i:1;a:5:{s:14:\"rate_detail_id\";i:20;s:5:\"title\";N;s:5:\"price\";d:150;s:3:\"qty\";s:1:\"2\";s:8:\"currency\";s:3:\"AED\";}}',375.00,'2021-05-21','2021-05-07 14:29:58','2021-05-07 14:30:14');

/*!40000 ALTER TABLE `cart_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cart_transaction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart_transaction`;

CREATE TABLE `cart_transaction` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sorting` tinyint(4) DEFAULT NULL,
  `is_menu` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language_string` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `title`, `slug`, `sorting`, `is_menu`, `active`, `deleted_at`, `created_at`, `updated_at`, `language_string`)
VALUES
	(1,'Waterparks','waterpark',1,1,1,NULL,'2021-04-10 17:16:28','2021-04-28 10:51:33','a:2:{s:2:\"en\";a:1:{s:5:\"title\";s:9:\"Waterpark\";}s:2:\"de\";a:1:{s:5:\"title\";s:16:\"Waterpark German\";}}'),
	(2,'Themeparks','themepark',2,1,1,NULL,'2021-04-10 17:16:28','2021-04-28 10:50:23','a:2:{s:2:\"en\";a:1:{s:5:\"title\";s:9:\"Themepark\";}s:2:\"de\";a:1:{s:5:\"title\";s:6:\"123123\";}}'),
	(3,'Sports','1anothd',3,1,1,NULL,'2021-04-10 17:16:28','2021-04-28 10:10:23','a:2:{s:2:\"en\";a:1:{s:5:\"title\";s:7:\"1Anothd\";}s:2:\"de\";a:1:{s:5:\"title\";s:6:\"123123\";}}'),
	(4,'Sightseeing','edited-here',4,1,1,NULL,'2021-04-10 17:16:28','2021-04-28 10:10:32','a:2:{s:2:\"en\";a:1:{s:5:\"title\";s:11:\"Edited here\";}s:2:\"de\";a:1:{s:5:\"title\";s:6:\"123123\";}}'),
	(5,'Family','another-one-here',1,1,1,NULL,'2021-04-10 17:16:28','2021-04-28 10:10:42','a:2:{s:2:\"en\";a:1:{s:5:\"title\";s:16:\"Another one here\";}s:2:\"de\";a:1:{s:5:\"title\";s:6:\"123123\";}}'),
	(6,'Culture','culture',NULL,0,1,NULL,'2021-04-10 17:16:28','2021-04-28 10:16:12','a:2:{s:2:\"en\";a:1:{s:5:\"title\";s:0:\"\";}s:2:\"de\";a:1:{s:5:\"title\";s:6:\"123123\";}}'),
	(7,'Adventure','adventure',NULL,0,1,NULL,'2021-04-10 17:16:28','2021-04-28 10:16:12','a:2:{s:2:\"en\";a:1:{s:5:\"title\";s:0:\"\";}s:2:\"de\";a:1:{s:5:\"title\";s:6:\"123123\";}}');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_attraction_mapping
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_attraction_mapping`;

CREATE TABLE `category_attraction_mapping` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_attraction_mapping_attraction_id_foreign` (`attraction_id`),
  CONSTRAINT `category_attraction_mapping_attraction_id_foreign` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_attraction_mapping` WRITE;
/*!40000 ALTER TABLE `category_attraction_mapping` DISABLE KEYS */;

INSERT INTO `category_attraction_mapping` (`id`, `attraction_id`, `category_id`)
VALUES
	(11,22,1),
	(12,22,2),
	(13,22,3),
	(14,22,4),
	(16,22,6),
	(17,22,5),
	(18,22,7);

/*!40000 ALTER TABLE `category_attraction_mapping` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `flag` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fla_icon` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conversion` double(8,2) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `active`, `flag`, `created_at`, `updated_at`, `fla_icon`, `conversion`, `currency`)
VALUES
	(1,'en','English',1,'eng_flag.svg','2021-04-10 17:16:28','2021-04-10 17:16:28','flag-icon-us',1.00,'AED'),
	(2,'de','German',1,'german_flag.svg','2021-04-10 17:16:28','2021-04-10 17:16:28','flag-icon-de',0.23,'EUR');

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2021_01_26_143057_create_permission_tables',1),
	(5,'2021_03_01_142812_create_categories_table',1),
	(6,'2021_03_01_142840_create_attractions_table',1),
	(7,'2021_03_01_152711_create_promotions_table',1),
	(8,'2021_03_01_152719_create_top_attractions_table',1),
	(9,'2021_03_01_152720_create_suggestion_attractions_table',1),
	(10,'2021_03_01_152723_create_campaigns_table',1),
	(11,'2021_03_02_132918_create_category_attraction_mapping_table',1),
	(12,'2021_03_10_071237_create_countries_table',1),
	(13,'2021_04_07_074527_create_cart_table',1),
	(14,'2021_04_07_074532_cart_details',1),
	(15,'2021_04_07_074536_cart_transaction',1),
	(16,'2021_04_07_081106_create_attraction_item_header_table',1),
	(17,'2021_04_07_081236_create_attraction_interestedin_table',1),
	(18,'2021_04_07_092849_create_atttraction_item_details_table',1),
	(19,'2021_04_07_100725_create_payment_method_table',1),
	(20,'2021_04_10_170331_create_attraction_images_table',1),
	(21,'2021_04_10_171142_create_attraction_language_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table model_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table model_has_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`)
VALUES
	(1,'App\\User',1);

/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table payment_method
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment_method`;

CREATE TABLE `payment_method` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `class` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `payment_method` WRITE;
/*!40000 ALTER TABLE `payment_method` DISABLE KEYS */;

INSERT INTO `payment_method` (`id`, `title`, `description`, `active`, `class`, `created_at`, `updated_at`)
VALUES
	(1,'Credit Card','You will be redirected to the Payment Page to complete the payment process.',1,'credit_card','2021-04-10 17:16:28','2021-04-10 17:16:28'),
	(2,'Cash on Delivery','Paying when they are delivered.',1,'money','2021-04-10 17:16:28','2021-04-10 17:16:28');

/*!40000 ALTER TABLE `payment_method` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table promotions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `promotions`;

CREATE TABLE `promotions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `sorting` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promotions_attraction_id_foreign` (`attraction_id`),
  CONSTRAINT `promotions_attraction_id_foreign` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;

INSERT INTO `promotions` (`id`, `attraction_id`, `sorting`, `created_at`, `updated_at`)
VALUES
	(4,22,NULL,'2021-04-29 16:29:10','2021-04-29 16:29:10');

/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','web','2021-04-10 17:16:28','2021-04-10 17:16:28');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;

INSERT INTO `status` (`id`, `title`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'Pending',NULL,NULL,NULL),
	(2,'On going',NULL,NULL,NULL),
	(3,'On Hold',NULL,NULL,NULL),
	(4,'Cancelled',NULL,NULL,NULL);

/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table suggestion_attractions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `suggestion_attractions`;

CREATE TABLE `suggestion_attractions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `sorting` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suggestion_attractions_attraction_id_foreign` (`attraction_id`),
  CONSTRAINT `suggestion_attractions_attraction_id_foreign` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table top_attractions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `top_attractions`;

CREATE TABLE `top_attractions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` bigint(20) unsigned DEFAULT NULL,
  `sorting` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `top_attractions_attraction_id_foreign` (`attraction_id`),
  CONSTRAINT `top_attractions_attraction_id_foreign` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `top_attractions` WRITE;
/*!40000 ALTER TABLE `top_attractions` DISABLE KEYS */;

INSERT INTO `top_attractions` (`id`, `attraction_id`, `sorting`, `created_at`, `updated_at`)
VALUES
	(3,22,NULL,'2021-04-29 16:39:23','2021-04-29 16:39:23');

/*!40000 ALTER TABLE `top_attractions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optCountry` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `mobile`, `sms_code`, `provider`, `provider_id`, `street_address`, `city`, `postal_code`, `state_province`, `optCountry`, `remember_token`, `created_at`, `updated_at`, `active`)
VALUES
	(1,'Super Admin','admin@soporella.com','2021-04-10 17:16:28','$2y$10$hdFVqOTTuiBj6zV5iCC1ceN.xyCFlKV6wbIIFisQYsdQU77V6ckv2','YmtTTXhpbUV1WmNwRm9NOWJ6QW9NaEsxWEpZMk9mbU1jMFc0ZEYxdFRvVUhEdVRheUI3cnkwdXRwcUJK607c3304682d2','111111',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-04-10 17:16:28','2021-04-18 13:24:20',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
