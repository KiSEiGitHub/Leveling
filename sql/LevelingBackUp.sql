-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 19 juin 2022 à 19:59
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leveling`
--

-- --------------------------------------------------------

--
-- Structure de la table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about`
(
    `id`             int(11)     NOT NULL AUTO_INCREMENT,
    `exp`            int(11)     NOT NULL,
    `jeux_possede`   int(11)     NOT NULL,
    `jeux_termine`   int(11)     NOT NULL,
    `jeux_cent`      int(11)     NOT NULL,
    `jeu_fav`        varchar(50) NOT NULL,
    `genre_fav`      varchar(20) NOT NULL,
    `plateforme_fav` varchar(10) NOT NULL,
    `inscription`    varchar(10) NOT NULL,
    `id_user`        int(11)     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 8
  DEFAULT CHARSET = latin1;

--
-- Déchargement des données de la table `about`
--

INSERT INTO `about` (`id`, `exp`, `jeux_possede`, `jeux_termine`, `jeux_cent`, `jeu_fav`, `genre_fav`, `plateforme_fav`,
                     `inscription`, `id_user`)
VALUES (6, 8, 0, 0, 0, 'ASSASSIN\'S CREED VALHALLA', 'FPS', 'PC', '04/06/2022', 28);

-- --------------------------------------------------------

--
-- Structure de la table `about_groups`
--

DROP TABLE IF EXISTS `about_groups`;
CREATE TABLE IF NOT EXISTS `about_groups`
(
    `id`        int(11)      NOT NULL AUTO_INCREMENT,
    `jeu`       varchar(255) NOT NULL,
    `membres`   int(11)      NOT NULL,
    `fondation` varchar(255) NOT NULL,
    `id_groups` int(11)      NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = latin1;

--
-- Déchargement des données de la table `about_groups`
--

INSERT INTO `about_groups` (`id`, `jeu`, `membres`, `fondation`, `id_groups`)
VALUES (5, 'Riders Republic', 0, '05/06/2022', 17);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie`
(
    `id`      int(11)      NOT NULL AUTO_INCREMENT,
    `libelle` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`)
VALUES (1, 'Aventure'),
       (2, 'fps'),
       (3, 'Dance'),
       (4, 'Arcade');

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games`
(
    `idinsert_games` int(11)      NOT NULL AUTO_INCREMENT,
    `name`           text         NOT NULL,
    `description`    text         NOT NULL,
    `genre`          text         NOT NULL,
    `plateforme`     text         NOT NULL,
    `date_sortie`    date         NOT NULL,
    `note_test`      text         NOT NULL,
    `note_avis`      int(11)      NOT NULL,
    `modele_eco`     text         NOT NULL,
    `classification` int(11)      NOT NULL,
    `prix`           text         NOT NULL,
    `img_pp`         varchar(255) NOT NULL,
    `img_banner`     varchar(255) NOT NULL,
    `img_others`     varchar(255) NOT NULL,
    `idlibelle`      int(11)      NOT NULL,
    PRIMARY KEY (`idinsert_games`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 16
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`idinsert_games`, `name`, `description`, `genre`, `plateforme`, `date_sortie`, `note_test`,
                     `note_avis`, `modele_eco`, `classification`, `prix`, `img_pp`, `img_banner`, `img_others`,
                     `idlibelle`)
VALUES (2, 'ASSASSIN\'S CREED VALHALLA',
        'Dans Assassin\'s CreedÂ® Valhalla, vous incarnerez Eivor, redoutable Viking dont l\'esprit a Ã©tÃ© bercÃ©,\r\n        dÃ¨s sa plus tendre enfance,\r\n        par de glorieux rÃ©cits de combats. Vous explorerez un dynamique et splendide monde ouvert situÃ© dans la violente Angleterre mÃ©diÃ©vale des Ã‚ges obscurs. Vous mÃ¨nerez des raids contre vos ennemis,\r\n        ferez prospÃ©rer votre peuple,\r\n        et affermirez votre pouvoir politique en vue de vous assurer une place parmi les dieux,\r\n        au Valhalla.',
        'Aventure', 'PC/Playstation/Xbox', '2020-11-10', '18', 0, '', 0, '24', 'IMG-6277a0b2c5b848.96970598.png',
        'IMG-6277a0b2c5e1a2.05889311.jpg', 'IMG-6277a0b2c60264.74180432.jpg', 1),
       (8, 'Far Cry 6',
        'Far Cry 6 est un jeu vidÃ©o de tir Ã  la premiÃ¨re personne,\r\n        d\'action-aventure dÃ©veloppÃ© par le studio Ubisoft Toronto et Ã©ditÃ© par Ubisoft. ',
        'Aventure', 'PC/Playstation/Xbox', '2021-10-07', '18', 0, '', 0, '29,99', 'IMG-6277c1dd81fac1.30807447.png',
        'IMG-6277c1dd822fa4.17172562.jpg', 'IMG-6277c1dd824bc4.76072935.jpg', 1),
       (9, 'Tom Clancy\'s Rainbow Six Siege',
        'DÃ©couvrez une expÃ©rience de jeu 5 contre 5 explosive,\r\n        des compÃ©titions oÃ¹ les enjeux sont Ã©levÃ©s et dâ€™excitantes batailles JcJ en Ã©quipe. Tom Clancyâ€™s Rainbow SixÂ® Siege propose une expÃ©rience en constante expansion oÃ¹ les occasions de parfaire votre stratÃ©gie et de mener votre Ã©quipe Ã  la victoire sont illimitÃ©es.',
        'Jeu de tir Ã  la premiÃ¨re personn', 'PC/Playstation/Xbox', '2015-11-26', '17', 0, '', 0, '8,\r\n        00 ',
        'IMG-6277c4d6a07249.43984088.png', 'IMG-6277c4d6a0a457.72092173.jpg', 'IMG-6277c4d6a0cbc4.07722543.jpg', 2),
       (10, 'Tom Clancyâ€™s The Division 2',
        'Dans The Division 2,\r\n        explorez le monde ouvert dynamique et hostile de Washington DC et sauvez une nation au bord de l\'effondrement. Partez au combat avec vos Amis en coop en ligne ou affrontez d\'autres joueurs en JcJ compÃ©titif.',
        'Tir tactique et d\'action-RPG', 'PC', '2019-02-07', '16', 0, '', 0, '18, 00 ',
        'IMG-6277c6a22b28e2.44535644.jpg', 'IMG-6277c6a22b50d9.69718513.png', 'IMG-6277c6a22b6de6.00832467.jpg', 1),
       (11, 'Watch Dogs 2',
        'Explorez un monde ouvert dynamique immense aux possibilitÃ©s de gameplay infinies. Frayez-vous un chemin Ã  travers le trafic lors de dangereuses courses-poursuites,\r\n dÃ©placez- vous sur les toits colorÃ©s dâ€™Oakland,\r\n et infiltrez les bureaux bien gardÃ©s de la Silicon Valley. De nombreux secrets sont Ã  dÃ©couvrir dans le berceau de la rÃ©volution technologique.',
        'Aventure / Infiltation', 'PC/Playstation/Xbox', '2016-11-15', '15', 0, '', 0, '59,\r\n 99 ',
        'IMG-6277c834d664b1.00746124.jpg', 'IMG-6277c834d68705.79138266.jpg', 'IMG-6277c834d6a5d1.31294186.jpg', 1),
       (12, 'Just Dance 2022',
        'Ramenez vos Amis et votre famille : c\'est l\'heure de monter le volume et de se lÃ¢cher ! Avec plus de 79 millions d\'exemplaires vendus dans le monde,\r\n        la plus grande franchise de jeu vidÃ©o musical de tous les temps est de retour cet automne avec Just Dance 2022 et ses 40 nouvelles chansons dans des univers inÃ©dits.',
        'Dance ', 'Switch', '2021-04-04', '16', 0, '', 0, '59,\r\n        99 ', 'IMG-6277cbba06bf30.27950667.jpg',
        'IMG-6277cbba06e8f9.37939005.jpg', 'IMG-6277cbba070b55.21555159.png', 3),
       (13, 'Trackmania',
        'DONNEZ LIBRE COURS Ã€ VOTRE CRÃ‰ATIVITÃ‰ CrÃ©ez des circuits et faites-les tester sur des serveurs dÃ©diÃ©s.',
        'Racing', 'PC', '2020-07-01', '17', 0, '', 0, '9,\r\n        99 ', 'IMG-627c1d61578b82.37357550.jpg',
        'IMG-6277cd249265a0.51379662.jpeg', 'IMG-6277cd24928972.77357145.jpg', 4),
       (14, 'Riders Republic',
        'DÃ©couvrez l\'immense terrain de jeu multijoueur de Riders Republicâ„¢ ! Avec votre vÃ©lo, vos skis, votre snowboard ou votre wingsuit, explorez un paradis sportif en monde ouvert oÃ¹ vous imposez vos rÃ¨gles.',
        'Competitive / Sport', 'PC/Playstation/Xbox', '2021-10-28', '14', 16, 'Free to play', 12, '59,99',
        'IMG-627c1d61578b82.37357556.jpg', 'IMG-627c1d6157bba3.47619182.jpg', 'IMG-627c1d6157dad5.88750114.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message`
(
    `id`              int(11) NOT NULL AUTO_INCREMENT,
    `message`         text    NOT NULL,
    `id_destinataire` int(11) NOT NULL,
    `id auteur`       int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user`
(
    `id`              int(11)                              NOT NULL AUTO_INCREMENT,
    `nom`             varchar(20) COLLATE utf8_unicode_ci  NOT NULL,
    `prenom`          varchar(20) COLLATE utf8_unicode_ci  NOT NULL,
    `password`        varchar(64) COLLATE utf8_unicode_ci  NOT NULL,
    `age`             int(3)                               NOT NULL,
    `pseudo`          varchar(20) COLLATE utf8_unicode_ci  NOT NULL,
    `bio`             varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `img`             varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `role`            varchar(20) COLLATE utf8_unicode_ci  NOT NULL,
    `DateDeNaissance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `mail`            varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `lvl`             int(11)                              NOT NULL,
    `img_banner`      varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 30
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `password`, `age`, `pseudo`, `bio`, `img`, `role`, `DateDeNaissance`, `mail`,
                    `lvl`, `img_banner`)
VALUES (28, 'LAU', 'Tom', 'eaed214ee947c77fdadb3a08633d4046', 21, 'KiSEi', 'Je suis mystÃ©rieux',
        'IMG-6299d2722a3384.29245626.jpg', 'admin', '2000-08-04', 'tom.lau.974@gmail.com', 10,
        'IMG-6299d2722a7302.07240015.png');

-- --------------------------------------------------------

--
-- Structure de la table `user_friends`
--

DROP TABLE IF EXISTS `user_friends`;
CREATE TABLE IF NOT EXISTS `user_friends`
(
    `id`             int(11) NOT NULL AUTO_INCREMENT,
    `id_user`        int(11) NOT NULL,
    `id_user_friend` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user_games`
--

DROP TABLE IF EXISTS `user_games`;
CREATE TABLE IF NOT EXISTS `user_games`
(
    `id`      int(11) NOT NULL AUTO_INCREMENT,
    `id_game` int(11) NOT NULL,
    `id_user` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 10
  DEFAULT CHARSET = latin1;

--
-- Déchargement des données de la table `user_games`
--

INSERT INTO `user_games` (`id`, `id_game`, `id_user`)
VALUES (9, 2, 28);

-- --------------------------------------------------------

--
-- Structure de la table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups`
(
    `id`          int(11)      NOT NULL AUTO_INCREMENT,
    `nom`         varchar(25)  NOT NULL,
    `privacy`     varchar(25)  NOT NULL,
    `creator`     int(11)      NOT NULL,
    `img`         varchar(255) NOT NULL,
    `banner`      varchar(255) NOT NULL,
    `jeux`        varchar(255) NOT NULL,
    `description` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 20
  DEFAULT CHARSET = latin1;

--
-- Déchargement des données de la table `user_groups`
--

INSERT INTO `user_groups` (`id`, `nom`, `privacy`, `creator`, `img`, `banner`, `jeux`, `description`)
VALUES (17, 'Reyna Fan Base', 'PUBLIC', 28, 'IMG-6299d57fad6549.57080524.jpg', 'IMG-6299d57fad9d87.59320703.png',
        'test', 'ctfghjkl');

-- --------------------------------------------------------

--
-- Structure de la table `user_preferences`
--

DROP TABLE IF EXISTS `user_preferences`;
CREATE TABLE IF NOT EXISTS `user_preferences`
(
    `id`      int(11)     NOT NULL AUTO_INCREMENT,
    `id_user` int(11)     NOT NULL,
    `steam`   varchar(25) NOT NULL,
    `discord` varchar(25) NOT NULL,
    `twitch`  varchar(25) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = latin1;

--
-- Déchargement des données de la table `user_preferences`
--

INSERT INTO `user_preferences` (`id`, `id_user`, `steam`, `discord`, `twitch`)
VALUES (4, 20, 'KiSEi', 'KiSEi', 'axe_kisei');

-- --------------------------------------------------------

--
-- Structure de la table `user_wish`
--

DROP TABLE IF EXISTS `user_wish`;
CREATE TABLE IF NOT EXISTS `user_wish`
(
    `id`       int(11) NOT NULL AUTO_INCREMENT,
    `id_games` int(11) NOT NULL,
    `id_user`  int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 12
  DEFAULT CHARSET = latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
