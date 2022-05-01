START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `Leveling`;
CREATE DATABASE `Leveling`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` binary(64) NOT NULL,
  `age` int(3) NOT NULL,
  `pseudo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` longblob NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;