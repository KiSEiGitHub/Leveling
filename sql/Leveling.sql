-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 08 mai 2022 à 14:36
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leveling`
--

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `idinsert_games` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `genre` text NOT NULL,
  `plateforme` text NOT NULL,
  `date_sortie` date NOT NULL,
  `evaluation` text NOT NULL,
  `prix` text NOT NULL,
  `img_pp` longblob NOT NULL,
  `img_banner` longblob NOT NULL,
  `img_others` longblob NOT NULL,
  PRIMARY KEY (`idinsert_games`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`idinsert_games`, `name`, `description`, `genre`, `plateforme`, `date_sortie`, `evaluation`, `prix`, `img_pp`, `img_banner`, `img_others`) VALUES
(2, 'ASSASSIN\'S CREED VALHALLA', 'Dans Assassin\'s CreedÂ® Valhalla, vous incarnerez Eivor, redoutable Viking dont l\'esprit a Ã©tÃ© bercÃ©, dÃ¨s sa plus tendre enfance, par de glorieux rÃ©cits de combats. Vous explorerez un dynamique et splendide monde ouvert situÃ© dans la violente Angleterre mÃ©diÃ©vale des Ã‚ges obscurs. Vous mÃ¨nerez des raids contre vos ennemis, ferez prospÃ©rer votre peuple, et affermirez votre pouvoir politique en vue de vous assurer une place parmi les dieux, au Valhalla.', 'Aventure', 'PC/Playstation/Xbox', '2020-11-10', '18', '24', 0x494d472d36323737613062326335623834382e39363937303539382e706e67, 0x494d472d36323737613062326335653161322e30353838393331312e6a7067, 0x494d472d36323737613062326336303236342e37343138303433322e6a7067),
(8, 'Far Cry 6', 'Far Cry 6 est un jeu vidÃ©o de tir Ã  la premiÃ¨re personne, d\'action-aventure dÃ©veloppÃ© par le studio Ubisoft Toronto et Ã©ditÃ© par Ubisoft. ', 'Aventure', 'PC/Playstation/Xbox', '2021-10-07', '18', '29,99', 0x494d472d36323737633164643831666163312e33303830373434372e706e67, 0x494d472d36323737633164643832326661342e31373137323536322e6a7067, 0x494d472d36323737633164643832346263342e37363037323933352e6a7067),
(9, 'Tom Clancy\'s Rainbow Six Siege', 'DÃ©couvrez une expÃ©rience de jeu 5 contre 5 explosive, des compÃ©titions oÃ¹ les enjeux sont Ã©levÃ©s et dâ€™excitantes batailles JcJ en Ã©quipe. Tom Clancyâ€™s Rainbow SixÂ® Siege propose une expÃ©rience en constante expansion oÃ¹ les occasions de parfaire votre stratÃ©gie et de mener votre Ã©quipe Ã  la victoire sont illimitÃ©es.', 'Jeu de tir Ã  la premiÃ¨re personn', 'PC/Playstation/Xbox', '2015-11-26', '17', '8,00', 0x494d472d36323737633464366130373234392e34333938343038382e706e67, 0x494d472d36323737633464366130613435372e37323039323137332e6a7067, 0x494d472d36323737633464366130636263342e30373732323534332e6a7067),
(10, 'Tom Clancyâ€™s The Division 2', 'Dans The Division 2, explorez le monde ouvert dynamique et hostile de Washington DC et sauvez une nation au bord de l\'effondrement. Partez au combat avec vos amis en coop en ligne ou affrontez d\'autres joueurs en JcJ compÃ©titif.', 'Tir tactique et d\'action-RPG', 'PC', '2019-02-07', '16', '18,00', 0x494d472d36323737633661323262323865322e34343533353634342e6a7067, 0x494d472d36323737633661323262353064392e36393731383531332e706e67, 0x494d472d36323737633661323262366465362e30303833323436372e6a7067),
(11, 'Watch_Dogs 2', 'Explorez un monde ouvert dynamique immense aux possibilitÃ©s de gameplay infinies. Frayez-vous un chemin Ã  travers le trafic lors de dangereuses courses-poursuites, dÃ©placez-vous sur les toits colorÃ©s dâ€™Oakland, et infiltrez les bureaux bien gardÃ©s de la Silicon Valley. De nombreux secrets sont Ã  dÃ©couvrir dans le berceau de la rÃ©volution technologique.', 'Aventure / Infiltation', 'PC/Playstation/Xbox', '2016-11-15', '15', '59,99', 0x494d472d36323737633833346436363462312e30303734363132342e6a7067, 0x494d472d36323737633833346436383730352e37393133383236362e6a7067, 0x494d472d36323737633833346436613564312e33313239343138362e6a7067),
(12, 'Just Dance 2022', 'Ramenez vos amis et votre famille : c\'est l\'heure de monter le volume et de se lÃ¢cher ! Avec plus de 79 millions d\'exemplaires vendus dans le monde, la plus grande franchise de jeu vidÃ©o musical de tous les temps est de retour cet automne avec Just Dance 2022 et ses 40 nouvelles chansons dans des univers inÃ©dits.', 'Dance ', 'Switch', '2021-04-04', '16', '59,99', 0x494d472d36323737636262613036626633302e32373935303636372e6a7067, 0x494d472d36323737636262613036653866392e33373933393030352e6a7067, 0x494d472d36323737636262613037306235352e32313535353135392e706e67),
(13, 'Trackmania', 'DONNEZ LIBRE COURS Ã€ VOTRE CRÃ‰ATIVITÃ‰ CrÃ©ez des circuits et faites-les tester sur des serveurs dÃ©diÃ©s.', 'Racing', 'PC', '2020-07-01', '17', '9,99', '', 0x494d472d36323737636432343932363561302e35313337393636322e6a706567, 0x494d472d36323737636432343932383937322e37373335373134352e6a7067);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `id auteur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `pseudo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DateDeNaissance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lvl` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `password`, `age`, `pseudo`, `bio`, `img`, `role`, `DateDeNaissance`, `mail`, `lvl`) VALUES
(20, 'LAU', 'Tom', 'eaed214ee947c77fdadb3a08633d4046', 21, 'KiSEi', 'Je suis mystÃ©rieux', 'IMG-6272c34bab0848.33289667.jpg', 'admin', '0200-08-04', 'tom.lau.974@gmail.com', 0),
(21, 'AlarÃ§on', 'Salim', 'de888202780abc6fac34f876ded670bf', 19, 'JL SerMaX', 'Penta chaque game viens pas test', 'IMG-627383326958d7.80933972.jpg', 'admin', '20003-01-25', 'alarconsalim95@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
