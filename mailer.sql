-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
-- by Michael McCouman jr.
-- Host: 127.0.0.1
-- Erstellungszeit: 09. September 2012 um 18:47
-- PHP-Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `api`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mailer`
--

CREATE TABLE IF NOT EXISTS `mailer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `betreff` text NOT NULL,
  `nachricht` text NOT NULL,
  `von` text NOT NULL,
  `an` text NOT NULL,
  `datum` text NOT NULL,
  `uhr` text NOT NULL,
  `sendezustand` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `mailer`
--

INSERT INTO `mailer` (`id`, `name`, `betreff`, `nachricht`, `von`, `an`, `datum`, `uhr`, `sendezustand`, `url`) VALUES
(1, 'Hubert', 'Nachricht an dich - Email', 'Deine Infos und Nachrichten hier', 'Hubert', 'McCouman', 'Th 30 Juni 2012', '20.30', '1', 'y2492829y4t3wGjgze33weoyg'),
(2, 'Roland', 'Test Roland', 'He wie geht es dir?', 'Roland', 'McCouman', '', '', '1', 'x1x002492829y423wGjgze33weoyg');
