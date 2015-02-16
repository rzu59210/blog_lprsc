-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 16 Février 2015 à 13:10
-- Version du serveur: 5.5.40-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `blog_wk`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `Id` int(3) NOT NULL AUTO_INCREMENT,
  `Texte` varchar(255) NOT NULL,
  `Date` varchar(11) NOT NULL,
  `Titre` varchar(250) NOT NULL,
  `User_id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`Id`, `Texte`, `Date`, `Titre`, `User_id`) VALUES
(79, 'Le Lorem Ipsum est simplement du faux texte employÃ© dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les annÃ©es 1500, quand un peintre anonyme assembla ensemble des morceaux de tex', '4', 'Tennis de table', 0),
(81, 'J''aime prendre des flÃ¨ches, sa me rend heureux. J''ai aussi des oiseaux domestiques pour des poneys magrÃ©bins venus d''australie pour piner des phoques albinos.', '11. 12. 201', 'The arrow', 0),
(82, 'Ce champs est un nouvelle objet qui ne dis rien', '8. 2. 2015', 'Nouveau', 9),
(83, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum placerat iaculis. Fusce fringilla tristique commodo. Vestibulum convallis ligula a sodales feugiat. Aliquam a ante nec neque tristique tristique. Sed in mollis massa, id viverra lorem', '8. 2. 2015', 'Je suis Jean', 10);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Article_id` int(5) NOT NULL,
  `Auteur` varchar(11) NOT NULL,
  `Texte` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `Article_id`, `Auteur`, `Texte`) VALUES
(4, 0, 'Test', 'sdfksdlg kl'),
(5, 0, 'Test', 'sdfksdlg kl'),
(6, 0, 'Jean ', 'Je vous cer'),
(7, 64, '', ''),
(8, 64, '', ''),
(9, 64, 'Alfred', 'L''info c''es'),
(10, 64, 'Alfred', 'L''info c''es'),
(11, 64, 'Mohamed', 'Bonsoir j''a'),
(12, 80, 'Jean-Claude', 'Bonjour,\r\nVotre blog est magnifique ! \r\nCordialement.'),
(13, 80, 'Dominique', 'Il y a une chose qui ne va pas'),
(14, 80, 'Dominique', 'Il y a une chose qui ne va pas'),
(15, 80, 'Lol', 'moi de meme'),
(16, 80, 'Lol', 'moi de meme'),
(17, 80, 'Lol', 'moi de meme'),
(18, 80, 'Therese', 'sdv dfgdfgddfdfgdg  fgdfg'),
(19, 80, 'Mohamed', 'Halla wackba\r\n'),
(20, 79, 'Babar', 'Je suis un Ã©lÃ©phant\r\n'),
(21, 82, 'Trevor', 'J''adore les gateatx');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Sid` varchar(32) NOT NULL,
  `expiration` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `mdp` (`mdp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `mdp`, `Nom`, `Prenom`, `Sid`, `expiration`) VALUES
(1, 'Wallaert.kevin@hotmail.fr', 'Admin59210', '', '', 'ede20c179f3750c1e0341d21bdd0d97d', 1423410501),
(4, 'Wallaert.luc@neuf.fr', 'Test', '', '', '94b4277a267ead5505fd1529837be3cf', 1422957388),
(5, 'wallaert.kevin@hotmail.fr', '9b6c1a3a1e24e5e9bf8a0cf8eea927b1', '', '', 'ede20c179f3750c1e0341d21bdd0d97d', 1423410501),
(6, 'wallaert.kevin@hotmail.fr', '9b6c1a3a1e24e5e9bf8a0cf8eea927b1', '', '', 'ede20c179f3750c1e0341d21bdd0d97d', 1423410501),
(7, 'wallaert.kevin@hotmail.fr', '9b6c1a3a1e24e5e9bf8a0cf8eea927b1', '', '', 'ede20c179f3750c1e0341d21bdd0d97d', 1423410501),
(8, 'wallaert.kev@hotmail.fr', '25f9e794323b453885f5181f1b624d0b', '', '', '', 0),
(9, 'Wallaert.kevin@hotmail.fr', 'Kevin59210', 'Wallaert', 'Kevin', 'ede20c179f3750c1e0341d21bdd0d97d', 1423410501),
(10, 'Jean@laquet.fr', 'Kevin59210', 'Laquet', 'Jean', 'bcaa87cb24905f20cfede3c79a5974d7', 1423407039);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
