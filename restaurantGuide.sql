-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 25. Mrz 2014 um 19:15
-- Server Version: 5.5.35-0ubuntu0.13.10.2
-- PHP-Version: 5.5.3-1ubuntu2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `mifSchedule`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `restaurantGuide`
--

CREATE TABLE IF NOT EXISTS `restaurantGuide` (
  `restaurantId` int(11) NOT NULL AUTO_INCREMENT,
  `restaurantName` varchar(65) NOT NULL,
  `description` text NOT NULL,
  `topListe` int(2) NOT NULL,
  `ranking` int(2) NOT NULL,
  `hipsterRanking` int(2) NOT NULL,
  `website` varchar(65) NOT NULL,
  `googlemaps` varchar(360) NOT NULL,
  PRIMARY KEY (`restaurantId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `restaurantGuide`
--

INSERT INTO `restaurantGuide` (`restaurantId`, `restaurantName`, `description`, `topListe`, `ranking`, `hipsterRanking`, `website`, `googlemaps`) VALUES
(1, 'Restaurant de Testo', 'Lorem Impulsum', 1, 4, 5, '', ''),
(2, 'Resturant de testo dos', 'Lorem impulsum de Pulso', 2, 3, 3, 'test.com', ''),
(3, 'Resturant de testo tres', 'Lorem impulsum de Pulso', 3, 1, 5, 'test.com', ''),
(4, 'Restaurante de final', '', 4, 0, 3, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
