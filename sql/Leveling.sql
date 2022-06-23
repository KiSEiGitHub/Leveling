-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 juin 2022 à 23:12
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

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
-- Structure de la table `tblaboutgroups`
--

DROP TABLE IF EXISTS `tblaboutgroups`;
CREATE TABLE IF NOT EXISTS `tblaboutgroups`
(
    `PK_AboutGroups`            int(11)                              NOT NULL AUTO_INCREMENT,
    `UQ_AboutGroups_Game`       varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_AboutGroups_Membres`    int(11)                              NOT NULL,
    `UQ_AboutGroups_Fondation`  varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `FK_UserGroups_AboutGroups` int(11)                              NOT NULL,
    PRIMARY KEY (`PK_AboutGroups`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

--
-- Déchargement des données de la table `about_groups`
--

INSERT INTO `tblaboutgroups` (PK_AboutGroups, UQ_AboutGroups_Game, UQ_AboutGroups_Membres, UQ_AboutGroups_Fondation,
                              FK_UserGroups_AboutGroups)
VALUES (5, 'Riders Republic', 0, '05/06/2022', 17);

-- --------------------------------------------------------

--
-- Structure de la table `tblaboutusers`
--

DROP TABLE IF EXISTS `tblaboutusers`;
CREATE TABLE IF NOT EXISTS `tblaboutusers`
(
    `PK_AboutUsers`                 int(11)                             NOT NULL AUTO_INCREMENT,
    `UQ_AboutUsers_Exp`             int(11)                             NOT NULL,
    `UQ_AboutUsers_JeuxPossede`     int(11)                             NOT NULL,
    `UQ_AboutUsers_JeuxTermine`     int(11)                             NOT NULL,
    `UQ_AboutUsers_JeuxCent`        int(11)                             NOT NULL,
    `UQ_AboutUsers_GenreFav`        varchar(25) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_AboutUsers_JeuFav`          varchar(25) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_AboutUsers_Plateforme`      varchar(25) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_AboutUsers_DateInscription` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
    `FK_Users_AboutUsers`           int(3)                              NOT NULL,
    PRIMARY KEY (`PK_AboutUsers`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

--
-- Déchargement des données de la table `about`
--

INSERT INTO `tblaboutusers` (pk_aboutusers, uq_aboutusers_exp, uq_aboutusers_jeuxpossede, uq_aboutusers_jeuxtermine,
                             uq_aboutusers_jeuxcent, uq_aboutusers_genrefav, uq_aboutusers_jeufav,
                             uq_aboutusers_plateforme, uq_aboutusers_dateinscription, fk_users_aboutusers)
VALUES (6, 8, 0, 0, 0, 'FPS', 'ASSASSIN\'S CREED VALHALLA', 'PC', '04/06/2022', 28);

-- --------------------------------------------------------

--
-- Structure de la table `tblgames`
--

DROP TABLE IF EXISTS `tblgames`;
CREATE TABLE IF NOT EXISTS `tblgames`
(
    `PK_Games`                int(11)                              NOT NULL AUTO_INCREMENT,
    `UQ_Games_Name`           varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_Games_Description`    varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_Games_Genre`          varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Games_Plateforme`     varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Games_DateSortie`     varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Games_NoteTest`       varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Games_NoteAvis`       varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Games_ModeleEco`      varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Games_Classification` varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Games_Price`          int(11)                              NOT NULL,
    `UQ_Games_Img`            varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_Games_ImgBanner`      varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_Games_ImgOther`       varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `FK_CategorieGames_Games` int(11)                              NOT NULL,
    PRIMARY KEY (`PK_Games`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;



--
-- Déchargement des données de la table `games`
--

INSERT INTO `tblgames` (PK_Games, UQ_Games_Name, UQ_Games_Description, UQ_Games_Genre, UQ_Games_Plateforme,
                        UQ_Games_DateSortie, UQ_Games_NoteTest, UQ_Games_NoteAvis, UQ_Games_ModeleEco,
                        UQ_Games_Classification, UQ_Games_Price, UQ_Games_Img, UQ_Games_ImgBanner, UQ_Games_ImgOther,
                        FK_CategorieGames_Games)
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
-- Structure de la table `tbluserfriends`
--

DROP TABLE IF EXISTS `tbluserfriends`;
CREATE TABLE IF NOT EXISTS `tbluserfriends`
(
    `PK_UserFriends`       int(11) NOT NULL AUTO_INCREMENT,
    `FK_Users_UserFriends` int(3)  NOT NULL,
    `UQ_UserFriends_User`  int(3)  NOT NULL,
    PRIMARY KEY (`PK_UserFriends`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblusergames`
--

DROP TABLE IF EXISTS `tblusergames`;
CREATE TABLE IF NOT EXISTS `tblusergames`
(
    `PK_UserGames`       int(11) NOT NULL AUTO_INCREMENT,
    `FK_User_UserGames`  int(11) NOT NULL,
    `FK_Games_UserGames` int(11) NOT NULL,
    PRIMARY KEY (`PK_UserGames`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;


--
-- Déchargement des données de la table `user_games`
--

INSERT INTO `tblusergames` (PK_UserGames, FK_User_UserGames, FK_Games_UserGames)
VALUES (9, 2, 28);

-- --------------------------------------------------------

--
-- Structure de la table `tblusergroups`
--

DROP TABLE IF EXISTS `tblusergroups`;
CREATE TABLE IF NOT EXISTS `tblusergroups`
(
    `PK_UserGroups`                int(11)                              NOT NULL AUTO_INCREMENT,
    `UQ_UserGroups_Nom`            varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_UserGroups_Privacy`        varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_UserGroups_ProfilePicture` varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_UserGroups_ImgBanner`      varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_UserGroups_Jeu`            varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_UserGroups_Description`    varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `FK_Users_UserGroups`          int(3)                               NOT NULL,
    PRIMARY KEY (`PK_UserGroups`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

--
-- Déchargement des données de la table `user_groups`
--

INSERT INTO `tblusergroups` (PK_UserGroups, UQ_UserGroups_Nom, UQ_UserGroups_Privacy, UQ_UserGroups_ProfilePicture,
                             UQ_UserGroups_ImgBanner, UQ_UserGroups_Jeu, UQ_UserGroups_Description, FK_Users_UserGroups)
VALUES (17, 'Reyna Fan Base', 'PUBLIC', 28, 'IMG-6299d57fad6549.57080524.jpg', 'IMG-6299d57fad9d87.59320703.png',
        'test', 'ctfghjkl');



-- --------------------------------------------------------

--
-- Structure de la table `tbluserpreferences`
--

DROP TABLE IF EXISTS `tbluserpreferences`;
CREATE TABLE IF NOT EXISTS `tbluserpreferences`
(
    `PK_UserPreferences`         int(11)                              NOT NULL AUTO_INCREMENT,
    `FK_User_UserPreferences`    int(11)                              NOT NULL,
    `UQ_UserPreferences_Steam`   varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_UserPreferences_Discord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_UserPreferences_Twitch`  varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`PK_UserPreferences`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;


--
-- Déchargement des données de la table `user_preferences`
--

INSERT INTO `tbluserpreferences` (PK_UserPreferences, FK_User_UserPreferences, UQ_UserPreferences_Steam,
                                  UQ_UserPreferences_Discord, UQ_UserPreferences_Twitch)
VALUES (4, 28, 'KiSEi', 'KiSEi', 'axe_kisei');

-- --------------------------------------------------------

--
-- Structure de la table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers`
(
    `PK_Users`                int(11)                              NOT NULL AUTO_INCREMENT,
    `UQ_Users_Nom`            varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Users_Prenom`         varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Users_Password`       varchar(64) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Users_Age`            int(3)                               NOT NULL,
    `UQ_Users_Bio`            varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_Users_ProfilePicture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_Users_Role`           varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Users_DateNaissance`  varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Users_Mail`           varchar(25) COLLATE utf8_unicode_ci  NOT NULL,
    `UQ_Users_Level`          int(11)                              NOT NULL,
    `UQ_Users_ImgBanner`      varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `UQ_Users_Pseudo`         varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`PK_Users`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;


--
-- Déchargement des données de la table `tblusers`
--

INSERT INTO `tblusers` (PK_Users, UQ_Users_Nom, UQ_Users_Prenom, UQ_Users_Password, UQ_Users_Age, UQ_Users_Bio,
                        UQ_Users_ProfilePicture, UQ_Users_Role, UQ_Users_DateNaissance, UQ_Users_Mail, UQ_Users_Level,
                        UQ_Users_ImgBanner, UQ_Users_Pseudo)
VALUES (28, 'LAU', 'Tom', 'eaed214ee947c77fdadb3a08633d4046', 21, 'Oui', 'IMG-6299d2722a3384.29245626.jpg', 'admin',
        '2000-08-04', 'tom.lau.974@gmail.com', 10, 'IMG-6299d2722a7302.07240015.png', 'KiSEi');

-- --------------------------------------------------------

--
-- Structure de la table `tbluserwishs`
--

DROP TABLE IF EXISTS `tbluserwishs`;
CREATE TABLE IF NOT EXISTS `tbluserwishs`
(
    `PK_UserWishs`       int(11) NOT NULL AUTO_INCREMENT,
    `FK_User_UserWishs`  int(11) NOT NULL,
    `FK_Games_UserWishs` int(11) NOT NULL,
    PRIMARY KEY (`PK_UserWishs`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
