-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  CONSTRAINT `article_ibfk_2` FOREIGN KEY (`author`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `article` (`id`, `title`, `content`, `author`) VALUES
(1,	'Onepiece',	'123',	1),
(2,	'z',	'45',	2),
(17,	'Hammond',	'46',	2);

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `article` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article` (`article`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `commentaire` (`id`, `username`, `content`, `article`) VALUES
(1,	'aa',	'aa',	1),
(3,	'Les tanks sont les personnages avec le moins de mobilité mais avec le plus de points de vie ',	'55',	2),
(4,	'aa',	'2',	2),
(5,	'test',	'5',	2),
(6,	'OMAEWA',	'2',	2),
(7,	'Matisse',	'1',	2),
(8,	'',	'46',	2),
(9,	'',	'46',	2),
(10,	'',	'45',	2),
(11,	'',	'45',	2);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usersname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `usersname`, `password`) VALUES
(1,	'Matisse',	'Varlin'),
(2,	'Tank',	'tank'),
(3,	'Dps',	'*C35F290021A733338F164906A37ACC7BE88FBD55'),
(4,	'Heal',	'heal'),
(36,	'',	''),
(37,	'',	''),
(38,	'',	''),
(39,	'',	''),
(40,	'',	'');

-- 2019-01-30 22:57:26
