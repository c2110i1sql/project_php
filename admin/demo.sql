CREATE DATABASE `demo_sho` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use demo_sho;


CREATE TABLE IF NOT EXISTS `category` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL UNIQUE,
  `status` tinyint(1) DEFAULT '0'
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `product` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255),
  `image` VARCHAR(255),
  `price` float(10,3),
  `sale_price` float(10,3),
  `content` text NULL,
  `category_id` INT NOT NULL,
  `status` tinyint(1) DEFAULT '0',
   FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `users` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL UNIQUE,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(100) NOT NULL
) ENGINE = InnoDB;

INSERT INTO users SET name='Admin Manager', email='admin@gmail.com', password = '123456';