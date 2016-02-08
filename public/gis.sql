/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : gis

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-02-09 02:55:31
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `locations`
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `location_category_id` int(10) unsigned NOT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `locations_user_id_foreign` (`user_id`),
  KEY `locations_location_category_id_foreign` (`location_category_id`),
  CONSTRAINT `locations_location_category_id_foreign` FOREIGN KEY (`location_category_id`) REFERENCES `location_categories` (`id`),
  CONSTRAINT `locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of locations
-- ----------------------------

-- ----------------------------
-- Table structure for `location_categories`
-- ----------------------------
DROP TABLE IF EXISTS `location_categories`;
CREATE TABLE `location_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colour` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of location_categories
-- ----------------------------
INSERT INTO location_categories VALUES ('1', 'Category 1', '#525580', '0', '2016-02-08 19:27:01', '2016-02-08 19:29:09');

-- ----------------------------
-- Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` tinyint(4) NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `menus_parent_id_index` (`parent_id`),
  KEY `menus_slug_index` (`slug`),
  KEY `menus_order_index` (`order`),
  KEY `menus_controller_index` (`controller`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO menus VALUES ('1', '0', 'Home', 'home', '1', 'HomeController', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('2', '0', 'Users', 'users', '21', 'UserController', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('3', '0', 'Location', '#', '2', '#', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('4', '3', 'Manage Location', 'location', '1', 'LocationController', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO migrations VALUES ('2016_02_08_134420_create_roles_table', '1');
INSERT INTO migrations VALUES ('2016_02_08_134509_create_users_table', '2');
INSERT INTO migrations VALUES ('2016_02_08_141416_create_menus_table', '3');
INSERT INTO migrations VALUES ('2016_02_08_185907_create_location_categories', '4');
INSERT INTO migrations VALUES ('2016_02_08_193251_create_locations_table', '5');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO roles VALUES ('1', 'root', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO roles VALUES ('2', 'Super Visior', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO roles VALUES ('3', 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `users_role_id_foreign` (`role_id`),
  KEY `users_email_index` (`email`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('1', 'reza.wikrama3@gmail.com', '$2y$10$o4gakiCg/Ok9EvQvA9jG8.NtdE.nRY9UOrZH.TEhN6ABcfsjQ6r.W', 'Muhamad Reza Abdul Rohim', '12345', '1', '0', '2016-02-08 18:33:30', '2016-02-08 18:33:30');
INSERT INTO users VALUES ('6', 'falmesino@falmes.com', '$2y$10$YLTu.JLdVadWs40oFs6tk.ioX7JVT0qM6QxaWkXWCvVCAOrMdHLuC', 'Falmesino', '12345', '1', '1', '2016-02-08 18:35:43', '2016-02-08 18:46:10');
INSERT INTO users VALUES ('7', 'reza.wikrama@gmail.com', '$2y$10$OWSOL9mS6v.gX2N3qD2I8.7Mc/tsWJb6R7UIR0cipnnmzi6fQ.Fo.', 'Muhamad Reza Abdul Rohim', '123456', '1', '0', '2016-02-08 19:42:52', '2016-02-08 19:42:52');
