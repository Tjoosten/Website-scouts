-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2014 at 07:31 AM
-- Server version: 5.1.67
-- PHP Version: 5.3.23-pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sn1145_scouts`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activiteiten`
--

CREATE TABLE IF NOT EXISTS `Activiteiten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tak` varchar(60) NOT NULL,
  `Datum` varchar(60) DEFAULT NULL,
  `Naam` varchar(255) DEFAULT NULL,
  `Beschrijving` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `Activity_log`
--

CREATE TABLE IF NOT EXISTS `Activity_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Gebruiker` varchar(255) DEFAULT NULL,
  `Bericht` text,
  `Datum` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=358 ;

--
-- Table structure for table `Inschrijvingen_ontbijt`
--

CREATE TABLE IF NOT EXISTS `Inschrijvingen_ontbijt` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(120) DEFAULT NULL,
  `Voornaam` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Maand` int(2) DEFAULT NULL,
  `Aantal_Personen` int(10) DEFAULT NULL,
  `Te_betalen` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Table structure for table `Ontbijt_datums`
--

CREATE TABLE IF NOT EXISTS `Ontbijt_datums` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Month` varchar(20) DEFAULT NULL,
  `Month_nr` varchar(5) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `Deathline` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Table structure for table `Photo_Gallery`
--

CREATE TABLE IF NOT EXISTS `Photo_Gallery` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(40) DEFAULT NULL,
  `Tak` varchar(60) NOT NULL,
  `File_path` varchar(500) NOT NULL,
  `File_name` varchar(250) NOT NULL,
  `Web_url` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Table structure for table `Takken`
--

CREATE TABLE IF NOT EXISTS `Takken` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tak` varchar(30) DEFAULT NULL,
  `Beschrijving` text,
  `Title` varchar(255) DEFAULT NULL,
  `Sub_title` varchar(60) DEFAULT NULL,
  `Last_edited` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Tak` (`Tak`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Admin_role` varchar(2) NOT NULL,
  `Tak` varchar(60) NOT NULL,
  `Blocked` varchar(5) NOT NULL,
  `GSM` varchar(255) NOT NULL,
  `Theme` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Table structure for table `Verhuur`
--

CREATE TABLE IF NOT EXISTS `Verhuur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Start_datum` varchar(255) DEFAULT NULL,
  `Eind_datum` varchar(255) DEFAULT NULL,
  `Groep` varchar(255) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `GSM` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;