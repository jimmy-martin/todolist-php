-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `todolist`;
CREATE DATABASE `todolist` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `todolist`;

DROP TABLE IF EXISTS `todo`;
CREATE TABLE `todo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Intitulé du todo',
  `importance` tinyint(1) unsigned NOT NULL DEFAULT 3 COMMENT 'Importance du todo',
  `fait` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT 'Todo effectué ou non',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2021-09-04 22:24:14