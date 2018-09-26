CREATE TABLE IF NOT EXISTS `#__z_shop_categories` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `id_parent` int(12) UNSIGNED NOT NULL DEFAULT '0',
  `description` varchar(1024) NOT NULL,
  `image` varchar(64) NOT NULL,
  `published` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `alias` varchar(128) NOT NULL,
  `ordering` int(12) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__z_shop_deliveries` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `published` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `ordering` int(12) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__z_shop_discounts` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `value` int(3) UNSIGNED NOT NULL,
  `published` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__z_shop_images` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_name` varchar(64) NOT NULL,
  `id_product` int(12) UNSIGNED NOT NULL,
  `ordering` int(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__z_shop_nova_poshta_cities` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__z_shop_nova_poshta_departments` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `id_city` int(12) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__z_shop_orders` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(1024) NOT NULL,
  `order_date` datetime NOT NULL,
  `amount` float(12,2) UNSIGNED NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_phone` varchar(64) NOT NULL,
  `user_city` varchar(64) NOT NULL,
  `user_address` varchar(256) NOT NULL,
  `id_payment` int(12) UNSIGNED NOT NULL,
  `id_delivery` int(12) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__z_shop_payments` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `published` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `ordering` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__z_shop_products` (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `option_id` int(4) UNSIGNED NULL,
  `options` varchar(1024) NOT NULL,
  `price` float(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `code` varchar(15) NOT NULL,
  `video` varchar(256) NOT NULL,
  `id_category` int(12) UNSIGNED NOT NULL,
  `title2` varchar(128) NOT NULL,
  `published` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `availability` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `alias` varchar(128) NOT NULL,
  `ordering` int(12) UNSIGNED NOT NULL,
  `discount_price` float(12,2) UNSIGNED NOT NULL,
  `discount_percent` int(3) NOT NULL DEFAULT '0',
  `discount_id` int(12) UNSIGNED NOT NULL DEFAULT '0',
  `discount_type` tinyint(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__z_shop_options` (
  `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `value` varchar(1024) NOT NULL,
  `published` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;