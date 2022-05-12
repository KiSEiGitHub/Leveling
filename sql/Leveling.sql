-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 12 mai 2022 à 08:20
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

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
  `note_test` text NOT NULL,
  `note_avis` int(11) NOT NULL,
  `modele_eco` text NOT NULL,
  `classification` int(11) NOT NULL,
  `prix` text NOT NULL,
  `img_pp` varchar(255) NOT NULL,
  `img_banner` varchar(255) NOT NULL,
  `img_others` varchar(255) NOT NULL,
  PRIMARY KEY (`idinsert_games`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`idinsert_games`, `name`, `description`, `genre`, `plateforme`, `date_sortie`, `note_test`, `note_avis`, `modele_eco`, `classification`, `prix`, `img_pp`, `img_banner`, `img_others`) VALUES
(2, 'ASSASSIN\'S CREED VALHALLA', 'Dans Assassin\'s CreedÂ® Valhalla, vous incarnerez Eivor, redoutable Viking dont l\'esprit a Ã©tÃ© bercÃ©, dÃ¨s sa plus tendre enfance, par de glorieux rÃ©cits de combats. Vous explorerez un dynamique et splendide monde ouvert situÃ© dans la violente Angleterre mÃ©diÃ©vale des Ã‚ges obscurs. Vous mÃ¨nerez des raids contre vos ennemis, ferez prospÃ©rer votre peuple, et affermirez votre pouvoir politique en vue de vous assurer une place parmi les dieux, au Valhalla.', 'Aventure', 'PC/Playstation/Xbox', '2020-11-10', '18', 0, '', 0, '24', 'IMG-6277a0b2c5b848.96970598.png', 'IMG-6277a0b2c5e1a2.05889311.jpg', 'IMG-6277a0b2c60264.74180432.jpg'),
(8, 'Far Cry 6', 'Far Cry 6 est un jeu vidÃ©o de tir Ã  la premiÃ¨re personne, d\'action-aventure dÃ©veloppÃ© par le studio Ubisoft Toronto et Ã©ditÃ© par Ubisoft. ', 'Aventure', 'PC/Playstation/Xbox', '2021-10-07', '18', 0, '', 0, '29,99', 'IMG-6277c1dd81fac1.30807447.png', 'IMG-6277c1dd822fa4.17172562.jpg', 'IMG-6277c1dd824bc4.76072935.jpg'),
(9, 'Tom Clancy\'s Rainbow Six Siege', 'DÃ©couvrez une expÃ©rience de jeu 5 contre 5 explosive, des compÃ©titions oÃ¹ les enjeux sont Ã©levÃ©s et dâ€™excitantes batailles JcJ en Ã©quipe. Tom Clancyâ€™s Rainbow SixÂ® Siege propose une expÃ©rience en constante expansion oÃ¹ les occasions de parfaire votre stratÃ©gie et de mener votre Ã©quipe Ã  la victoire sont illimitÃ©es.', 'Jeu de tir Ã  la premiÃ¨re personn', 'PC/Playstation/Xbox', '2015-11-26', '17', 0, '', 0, '8,00', 'IMG-6277c4d6a07249.43984088.png', 'IMG-6277c4d6a0a457.72092173.jpg', 'IMG-6277c4d6a0cbc4.07722543.jpg'),
(10, 'Tom Clancyâ€™s The Division 2', 'Dans The Division 2, explorez le monde ouvert dynamique et hostile de Washington DC et sauvez une nation au bord de l\'effondrement. Partez au combat avec vos amis en coop en ligne ou affrontez d\'autres joueurs en JcJ compÃ©titif.', 'Tir tactique et d\'action-RPG', 'PC', '2019-02-07', '16', 0, '', 0, '18,00', 'IMG-6277c6a22b28e2.44535644.jpg', 'IMG-6277c6a22b50d9.69718513.png', 'IMG-6277c6a22b6de6.00832467.jpg'),
(11, 'Watch_Dogs 2', 'Explorez un monde ouvert dynamique immense aux possibilitÃ©s de gameplay infinies. Frayez-vous un chemin Ã  travers le trafic lors de dangereuses courses-poursuites, dÃ©placez-vous sur les toits colorÃ©s dâ€™Oakland, et infiltrez les bureaux bien gardÃ©s de la Silicon Valley. De nombreux secrets sont Ã  dÃ©couvrir dans le berceau de la rÃ©volution technologique.', 'Aventure / Infiltation', 'PC/Playstation/Xbox', '2016-11-15', '15', 0, '', 0, '59,99', 'IMG-6277c834d664b1.00746124.jpg', 'IMG-6277c834d68705.79138266.jpg', 'IMG-6277c834d6a5d1.31294186.jpg'),
(12, 'Just Dance 2022', 'Ramenez vos amis et votre famille : c\'est l\'heure de monter le volume et de se lÃ¢cher ! Avec plus de 79 millions d\'exemplaires vendus dans le monde, la plus grande franchise de jeu vidÃ©o musical de tous les temps est de retour cet automne avec Just Dance 2022 et ses 40 nouvelles chansons dans des univers inÃ©dits.', 'Dance ', 'Switch', '2021-04-04', '16', 0, '', 0, '59,99', 'IMG-6277cbba06bf30.27950667.jpg', 'IMG-6277cbba06e8f9.37939005.jpg', 'IMG-6277cbba070b55.21555159.png'),
(13, 'Trackmania', 'DONNEZ LIBRE COURS Ã€ VOTRE CRÃ‰ATIVITÃ‰ CrÃ©ez des circuits et faites-les tester sur des serveurs dÃ©diÃ©s.', 'Racing', 'PC', '2020-07-01', '17', 0, '', 0, '9,99', '', 'IMG-6277cd249265a0.51379662.jpeg', 'IMG-6277cd24928972.77357145.jpg'),
(14, 'Riders Republic', 'DÃ©couvrez l\'immense terrain de jeu multijoueur de Riders Republicâ„¢ ! Avec votre vÃ©lo, vos skis, votre snowboard ou votre wingsuit, explorez un paradis sportif en monde ouvert oÃ¹ vous imposez vos rÃ¨gles.', 'Competitive / Sport', 'PC/Playstation/Xbox', '2021-10-28', '14', 16, 'Free to play', 12, '59,99', 'IMG-627c1d61578b82.37357556.jpg', 'IMG-627c1d6157bba3.47619182.jpg', 'IMG-627c1d6157dad5.88750114.jpg');

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
(20, 'LAU', 'Tom', 'eaed214ee947c77fdadb3a08633d4046', 21, 'KiSEi', 'Je suis mystÃ©rieux', 'IMG-6272c34bab0848.33289667.jpg', 'admin', '0200-08-04', 'tom.lau.974@gmail.com', 10),
(21, 'AlarÃ§on', 'Salim', 'de888202780abc6fac34f876ded670bf', 19, 'JL SerMaX', 'Penta chaque game viens pas test', 'IMG-627383326958d7.80933972.jpg', 'admin', '20003-01-25', 'alarconsalim95@gmail.com', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
