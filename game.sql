-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Novembre 2017 à 10:02
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `game`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `a_id` int(11) NOT NULL,
  `a_firstname` text,
  `a_lastname` text,
  `a_username` text,
  `a_email` varchar(25) DEFAULT NULL,
  `a_password` varchar(25) DEFAULT NULL,
  `a_victory` int(11) NOT NULL,
  `a_defeat` int(11) NOT NULL,
  `a_matches` int(11) NOT NULL,
  `a_newsletter` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`a_id`, `a_firstname`, `a_lastname`, `a_username`, `a_email`, `a_password`, `a_victory`, `a_defeat`, `a_matches`, `a_newsletter`) VALUES
(1, 'Jean', 'Tigana', 'Gentilgana', 'Jean@gmail.com', 'foot', 0, 0, 0, 0),
(3, 'Michel', 'Platini', 'Platoch', 'michou@gmail.com', 'foot', 0, 0, 0, 0),
(4, 'Olivier', 'Giroud', 'LaGirafe', 'Olive@gmail.com', 'foot', 0, 0, 0, 0),
(7, 'Nicolas', 'Sisavath', 'Pat', 'Pat@gmail.com', 'pat', 0, 0, 0, 0),
(8, 'Tim', 'Sauzet', 'Tim', 'tim@gmail.com', 'peche', 0, 0, 0, 0),
(9, 'zinedine', 'zidane', 'zizou', 'zizou@gmail.com', '$2y$10$JjywnWJPeltpHY1S29', 0, 0, 0, 0),
(10, 'karim', 'benzema', 'karim', 'karim@gmail.com', '$2y$10$od2YMx8CHZ3bHq4N2R', 0, 0, 0, 0),
(11, 'denis', 'berkamp', 'denis', 'denis@gmail.com', '$2y$10$gAVmRNWJvpJkcfblan', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

CREATE TABLE `card` (
  `c_id` int(11) NOT NULL,
  `c_def` int(11) DEFAULT NULL,
  `c_account_fk` int(11) NOT NULL,
  `c_model_fk` int(11) DEFAULT NULL,
  `c_deck_fk` int(11) NOT NULL,
  `c_statut` char(2) NOT NULL,
  `c_match_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `deck`
--

CREATE TABLE `deck` (
  `d_id` int(11) NOT NULL,
  `d_account_fk` int(11) NOT NULL,
  `d_hero_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `deck`
--

INSERT INTO `deck` (`d_id`, `d_account_fk`, `d_hero_fk`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 1),
(4, 1, 2),
(5, 1, 1),
(6, 1, 2),
(7, 1, 1),
(8, 1, 2),
(9, 1, 1),
(10, 1, 2),
(11, 9, 1),
(12, 9, 2),
(13, 10, 1),
(14, 10, 2),
(15, 11, 1),
(16, 11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `g_id` int(11) NOT NULL,
  `g_player1_fk` int(11) NOT NULL,
  `g_player2_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hero`
--

CREATE TABLE `hero` (
  `h_id` int(11) NOT NULL,
  `h_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hero`
--

INSERT INTO `hero` (`h_id`, `h_name`) VALUES
(1, 'Robin des boites'),
(2, 'Tony truand');

-- --------------------------------------------------------

--
-- Structure de la table `library`
--

CREATE TABLE `library` (
  `m_id` int(11) NOT NULL,
  `m_title` text,
  `m_nickname` text,
  `m_team` text,
  `m_type` text,
  `m_mana` int(11) DEFAULT NULL,
  `m_atk` int(11) DEFAULT NULL,
  `m_def` int(11) DEFAULT NULL,
  `m_hero_fk` int(11) DEFAULT NULL,
  `m_color` varchar(10) NOT NULL,
  `m_picture` varchar(25) NOT NULL,
  `m_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `library`
--

INSERT INTO `library` (`m_id`, `m_title`, `m_nickname`, `m_team`, `m_type`, `m_mana`, `m_atk`, `m_def`, `m_hero_fk`, `m_color`, `m_picture`, `m_text`) VALUES
(1, 'Merlin', 'le chanteur', 'moyen age', 'c', 7, 8, 6, 1, 'bleu', 'merlin', 'La douce barbe de Merlin le Chanteur lavée avec Amir Laine vous attire irrésistiblement sur la piste. Pas de chance ! Il vous dissout les tympans avec sa voix disgracieuse...'),
(2, 'Le taver', 'niais', 'moyen age', 'c', 1, 2, 1, 1, 'bleu', 'taverniais', 'Tu virevoltes depuis les 12 coups de minuit. Waouhh ! Voilà que la soif te prend. Passe ta commande, dommage, pas sûr qu’il te comprenne !'),
(3, 'Le chevalier', 'lance-slow', 'moyen age', 'c', 2, 2, 3, 1, 'bleu', 'chevalier', 'Tu a accepté de danser avec le chevalier Lance-Slow mais soudain... Tu te sens fatigué... Tellement fatigué… Trop fatiZzzzzzzzzzzz... RRRRrrrrrron pssssschiittttt… '),
(4, 'L''abbé', 'cédaire', 'moyen age', 'c', 4, 2, 4, 1, 'bleu', 'abbe', 'L’Abbé Cédaire vous propose gentiment de vous apprendre à lire. Vous acceptez son offre avec plaisir. Le maladroit vous crève un oeil avec une carotte !'),
(5, 'Le marchand', 'devin', 'moyen age', 'c', 3, 5, 3, 1, 'bleu', 'marchand', 'Le Marchand Devin savait que vous lui achèteriez tout son stock de vin nouveau. Vous êtes ruiné ! Sa boule de cristal glisse et vous écrase le pied...'),
(6, 'Verveine', 'la courtisane', 'moyen age', 'c', 5, 7, 5, 1, 'bleu', 'verveine', 'Verveine vous invite sur la piste et vous la suivez. Joue contre joue sous les projecteurs, un délicat fumet de morilles se dégage. Incommodé, vous piquez du nez !'),
(7, 'La boucle', 'y est', 'moyen age', 'b', 3, 3, 6, 1, 'gris', 'bouclier', 'Alors qu’une rixe débute au bar, un ami déboule et vous protège. Mais une araignée décide de se pointer. Appeuré, il s''en va et vous laisse seul...'),
(8, 'Tonyo', 'le tonneau', 'moyen age', 'b', 1, 1, 3, 1, 'gris', 'tonneau', 'Un tonneau fort maladroit tombe et roule sur la piste et vous écrase comme une crêpe ! Plusieurs fois… Quelle chance ! Pour vous, c’est Mardi Gras Night Fever !'),
(9, 'Bélier', '', 'moyen age', 'cs', 9, 9, 9, 1, 'jaune', 'belier', 'On ne dérange pas un bélier qui est occupé ! Enragé, il vous charge toute la nuit sur une longue distance. On ne vous revoit plus de la soirée.'),
(10, 'La fièvre', 'du samedi soir', 'moyen age', 's', 3, 4, 0, 1, 'rouge', 'fievre', 'Un rat se glisse sur la piste. Après avoir volé la vedette à Tony, il répand la peste noire. Vous avez soudainement une forte fièvre. La soirée est gâchée !'),
(11, 'Lancer', 'de goupillon', 'moyen age', 's', 1, 1, 0, 1, 'rouge', 'goupillon', 'Attention ! Pas de roupillon pour le goupillon ! La guerre est déclarée ! Dommage, vous semblez vous trouver précisément sur son passage...'),
(12, 'Le couillard', '', 'moyen age', 's', 5, 6, 0, 1, 'rouge', 'couillard', 'Jamais sur la piste vous ne serez à l’abri d’un lancer de gibiers en tous genres (béliers, Didier et autres animaux sauvages)… qui pourraient tomber poule-poil sur vous !'),
(13, 'Refoule', 'mon tea', 'boite de nuit', 'c', 1, 1, 1, 2, 'bleu', 'barman', 'Ici on ne sert pas de thé, verveine ou autre infusions aux plantes relaxantes. Vous ne pourrez pas vous remettre de vos blessures pour le moment...'),
(14, 'Le kéké', 'd''la soirée', 'boite de nuit', 'c', 2, 2, 3, 2, 'bleu', 'keke', 'Sur la piste de danse, vous repérez illico le kéké que voilà. Gare à vous, car de sa main agile, il pourrait bien tordre le cou à toutes vos idées préconçues !'),
(15, 'Le patron', '', 'boite de nuit', 'c', 7, 8, 6, 2, 'bleu', 'patron', 'Vous avez donné des boutons au Patron. Il examine les lieux sous toutes les coutures pour vous retrouver. Et on sait que le Patron ne fait pas dans la demi-mesure !'),
(16, 'La danseuse', 'd''apéro', 'boite de nuit', 'c', 3, 4, 3, 2, 'bleu', 'danseuse', 'Prenez garde au coup de pied rotatif de la danseuse d’opéra invitée à l’apéro ! Vous avez bien de la chance si elle ne vous à pas mis K.O. pour la soirée !'),
(17, 'Didier', 'le dj', 'boite de nuit', 'c', 4, 2, 4, 2, 'bleu', 'didier', 'Un jour, on a demandé à Didier de guetter, et Didier guetta. Avec son air innocent derrière sa table de mixage, vous n’auriez jamais deviné qu’il allait vous remixer la figure !'),
(18, 'Le grogro', 'dancer', 'boite de nuit', 'c', 5, 6, 5, 2, 'bleu', 'grogro', 'Le grogro-dancer débarque sur le podium. Il s’accroche à la barre et tente un lever de jambonneau qui se solde par une glissade incontrôlée de sa part. Il vous écrase...'),
(19, 'Titi', 'le videur', 'boite de nuit', 'b', 3, 3, 6, 2, 'gris', 'titi', 'Attention au « Tchhh tchhh ! » de titi qui repousse toutes les personnes ayant un mauvais goût vestimentaire et voulant entrer dans la discothèque.'),
(20, 'Le fils', 'zyonomyste', 'boite de nuit', 'b', 1, 1, 3, 2, 'gris', 'physio', 'Rien n’échappe aux yeux du fils zyonomiste. Vous n’avez pas la tenue adéquate, son regard hypnotiseur vous nettoie le cerveau. Vous avez oublié pourquoi vous êtes ici...'),
(21, 'Poule', 'à facettes', 'boite de nuit', 'cs', 9, 9, 9, 2, 'jaune', 'poule', 'Une poule sur un mur, qui picote du pain dur, picoti picota, fait un prout et puis s’en va ! Ses facettes vous aveuglent… La fumée vous pique le nez et vous piquez du nez…'),
(22, 'Téquila', 'paf', 'boite de nuit', 's', 3, 5, 0, 2, 'rouge', 'tequila', 'Ce citron est si mignooooooon !!! En pensant à vos 5 fruits et légumes par jour, vous courrez vers lui, mais... PAF ! Vous n’avez pas vu l''autre citron au sol sur lequel vous glissez !'),
(23, 'Coup de vinyle', 'mortel', 'boite de nuit', 's', 3, 5, 0, 2, 'rouge', 'vinyle', 'Un peu de tequila paf s’est renversée sur la platine de Didier. La machine déraille. Un vinyle agressif décide même de vous attaquer lors d’un zouk love.'),
(24, 'Merryl', 'streeptisseuse', 'boite de nuit', 's', 1, 2, 0, 2, 'rouge', 'merryl', 'Merryl est une charmeuse redoutable. Tisseuse de résilles, elle prend dans sa toile tous les minots innocents. Horreur ! Ce soir, elle vous a choisi comme proie...');

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
  `p_id` int(11) NOT NULL,
  `p_def` int(2) NOT NULL,
  `p_mana` int(2) NOT NULL,
  `p_hand` text NOT NULL,
  `p_deck` text NOT NULL,
  `p_deck_fk` int(11) NOT NULL,
  `p_account_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `save`
--

CREATE TABLE `save` (
  `s_id` int(11) NOT NULL,
  `s_history` text,
  `s_game_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `username` (`a_username`(25));

--
-- Index pour la table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `FK_carte_id_player` (`c_account_fk`),
  ADD KEY `FK_carte_id_mod` (`c_model_fk`),
  ADD KEY `c_deck_fk` (`c_deck_fk`),
  ADD KEY `c_partie_fk` (`c_match_fk`);

--
-- Index pour la table `deck`
--
ALTER TABLE `deck`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `FK_deck_id_player` (`d_account_fk`),
  ADD KEY `FK_deck_id_hero` (`d_hero_fk`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`g_id`);

--
-- Index pour la table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`h_id`);

--
-- Index pour la table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `equipe` (`m_team`(25)),
  ADD KEY `FK_modele_id_hero` (`m_hero_fk`);

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_deck_fk` (`p_deck_fk`),
  ADD KEY `p_account_fk` (`p_account_fk`);

--
-- Index pour la table `save`
--
ALTER TABLE `save`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `FK_sauvegarde_id_game` (`s_game_fk`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `card`
--
ALTER TABLE `card`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `deck`
--
ALTER TABLE `deck`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `hero`
--
ALTER TABLE `hero`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `library`
--
ALTER TABLE `library`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `save`
--
ALTER TABLE `save`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `FK_carte_id_mod` FOREIGN KEY (`c_model_fk`) REFERENCES `library` (`m_id`),
  ADD CONSTRAINT `FK_carte_id_player` FOREIGN KEY (`c_account_fk`) REFERENCES `account` (`a_id`),
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`c_deck_fk`) REFERENCES `deck` (`d_id`);

--
-- Contraintes pour la table `deck`
--
ALTER TABLE `deck`
  ADD CONSTRAINT `FK_deck_id_hero` FOREIGN KEY (`d_hero_fk`) REFERENCES `hero` (`h_id`),
  ADD CONSTRAINT `FK_deck_id_player` FOREIGN KEY (`d_account_fk`) REFERENCES `account` (`a_id`);

--
-- Contraintes pour la table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `FK_modele_id_hero` FOREIGN KEY (`m_hero_fk`) REFERENCES `hero` (`h_id`);

--
-- Contraintes pour la table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `FK_sont_jouees_id_game` FOREIGN KEY (`p_id`) REFERENCES `game` (`g_id`),
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`p_deck_fk`) REFERENCES `deck` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_ibfk_2` FOREIGN KEY (`p_account_fk`) REFERENCES `account` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `save`
--
ALTER TABLE `save`
  ADD CONSTRAINT `FK_sauvegarde_id_game` FOREIGN KEY (`s_game_fk`) REFERENCES `game` (`g_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
