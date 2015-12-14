-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Darbinė stotis: 127.0.0.1
-- Atlikimo laikas: 2013 m. Vas 23 d. 15:28
-- Serverio versija: 5.5.20
-- PHP versija: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Duomenų bazė: `ngr_system`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `adress` text COLLATE utf8_unicode_ci NOT NULL,
  `downloads` int(11) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `downloads` (`downloads`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Sukurta duomenų kopija lentelei `download`
--

INSERT INTO `download` (`id`, `name`, `adress`, `downloads`, `comment`, `date`) VALUES
(1, 'Radijo klausimosi failas', 'ngr.pls', 1, 'Naudojant šį failą jūs galite klausyti mūsų radijo, tiesiog atidarykite šį failą naudojant kokį norite muzikos leistuvą.', '2013-02-22 12:00');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_lithuanian_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `by` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=3 ;

--
-- Sukurta duomenų kopija lentelei `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `content`, `by`) VALUES
(1, '2013-02-10 12:00', 'Atidarymas', 'Startas!! Na štai ir startavome, štai mūsų pirmoji bandomoji versija! :) Manau ne už ilgo pradėsime veikti, tik kai gausime serverį, ačiū kad lankotės ;)', 'Martynas'),
(2, '2013-02-20 14:00', 'V2 Versija', 'O taip!!! :yay Štai mūsų pati pati naujausia v2 versija!\nKas joje gero?: O gi daug kas! 1. Daug kur nuo šiol naudojami smile :) kaip paveiksliukai o ne kaip tekstas, 2. Pilnai sutvarkyta lietuvių kalba o ne heroglifai, 3. Naujas tinklapis kas be ko :), na jaigu nematėt kaip atrodė senasis... na nieko tokio, ten ne buvo į ką žiurėti :D na tiek ir visko, ačiū kad lankotės ;)', 'Martynas');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `poll_a`
--

CREATE TABLE IF NOT EXISTS `poll_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(35) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Sukurta duomenų kopija lentelei `poll_a`
--

INSERT INTO `poll_a` (`id`, `field`, `votes`) VALUES
(1, 'Labai', 0),
(2, 'Taip', 0),
(3, 'Ne', 0),
(4, 'Ką čia veikiu?', 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `poll_ip`
--

CREATE TABLE IF NOT EXISTS `poll_ip` (
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `poll_q`
--

CREATE TABLE IF NOT EXISTS `poll_q` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Sukurta duomenų kopija lentelei `poll_q`
--

INSERT INTO `poll_q` (`id`, `question`, `total`) VALUES
(1, 'Ar laukite starto?', 5);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `suggest`
--

CREATE TABLE IF NOT EXISTS `suggest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `song-author` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `song-name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `tops`
--

CREATE TABLE IF NOT EXISTS `tops` (
  `place` int(2) NOT NULL,
  `author` varchar(70) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `song` varchar(50) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `tops`
--

INSERT INTO `tops` (`place`, `author`, `song`) VALUES
(1, 'Nėra', 'Nėra'),
(2, 'Nėra', 'Nėra'),
(3, 'Nėra', 'Nėra'),
(4, 'Nėra', 'Nėra'),
(5, 'Nėra', 'Nėra');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pass` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `level`) VALUES
(0, 'Martynas', '1c316ee86879c58a21dbdfb6265b2ded', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
