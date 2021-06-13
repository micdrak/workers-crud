-- ----------------------------
-- Database schema
-- ----------------------------


SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for workers_position
-- ----------------------------
DROP TABLE IF EXISTS `workers_position`;
CREATE TABLE `workers_position`
(
    `id`             int(20) unsigned NOT NULL AUTO_INCREMENT,
    `created_at`     timestamp NULL DEFAULT NULL,
    `updated_at`     timestamp NULL DEFAULT NULL,
    `title`          varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `default_margin` double(20, 2
) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `position_title_unique` (`title`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for workers
-- ----------------------------
DROP TABLE IF EXISTS `workers`;
CREATE TABLE `workers`
(
    `id`          int(20) unsigned NOT NULL AUTO_INCREMENT,
    `position_id` int(20) unsigned NOT NULL,
    `created_at`  timestamp NULL DEFAULT NULL,
    `updated_at`  timestamp NULL DEFAULT NULL,
    `surname`     varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `lastname`    varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `middlename`  varchar(255) COLLATE utf8mb4_unicode_ci          DEFAULT '',
    `titles`      varchar(255) COLLATE utf8mb4_unicode_ci          DEFAULT '',
    `email`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `phone`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `margin`      double(8, 2
) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workers_workers_id_index` (`position_id`) USING BTREE,
  CONSTRAINT `workers_position_fk` FOREIGN KEY (`position_id`) REFERENCES `workers_position` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
