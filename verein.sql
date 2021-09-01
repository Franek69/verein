-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Mrz 2020 um 16:34
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `verein`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitglied`
--

CREATE TABLE `mitglied` (
  `mitglied_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vorname` varchar(100) NOT NULL,
  `geschlecht` varchar(1) NOT NULL,
  `geb_dat` date NOT NULL,
  `strasse` varchar(100) DEFAULT NULL,
  `nr` varchar(10) DEFAULT NULL,
  `plz` char(5) DEFAULT NULL,
  `ort` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `mitglied`
--

INSERT INTO `mitglied` (`mitglied_id`, `name`, `vorname`, `geschlecht`, `geb_dat`, `strasse`, `nr`, `plz`, `ort`) VALUES
(1, 'Poguntke', 'Martin', 'm', '1978-05-11', 'Hauptstr.', '45', '10437', 'Berlin'),
(2, 'Mustermann', 'Gabi', 'w', '1993-04-01', 'Dorfstr.', '5', '1245', 'Berlin'),
(3, 'Meier', 'Janine', 'w', '1980-05-04', 'Danziger Str.', '98b', '10245', 'Berlin'),
(4, 'Meier', 'Jens', 'm', '1940-01-01', 'Teststr.', '5', '14444', 'Berlin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verein`
--

CREATE TABLE `verein` (
  `verein_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stadt` varchar(100) NOT NULL,
  `vorstandsvors` int(11) DEFAULT NULL,
  `gruendung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `verein`
--

INSERT INTO `verein` (`verein_id`, `name`, `stadt`, `vorstandsvors`, `gruendung`) VALUES
(1, 'BierDC', 'Berlin', 36, '2020-02-19'),
(3, 'Neuer Verein', 'Musterstadt', 0, '2018-08-16'),
(5, 'neuer neuer verein', 'tese', 4, '2020-02-05'),
(6, 'Müsöläß', 'fsddf', 0, '2020-03-05'),
(7, 'Hockey', 'Dresden', 0, '1950-04-04'),
(8, 'Freitag', 'Musterstadt', 0, '2018-02-01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vereinmitglied`
--

CREATE TABLE `vereinmitglied` (
  `verein_id` int(11) NOT NULL,
  `mitglied_id` int(11) NOT NULL,
  `bezahlt` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `vereinmitglied`
--

INSERT INTO `vereinmitglied` (`verein_id`, `mitglied_id`, `bezahlt`) VALUES
(1, 1, 'n'),
(6, 2, 'n');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `mitglied`
--
ALTER TABLE `mitglied`
  ADD PRIMARY KEY (`mitglied_id`);

--
-- Indizes für die Tabelle `verein`
--
ALTER TABLE `verein`
  ADD PRIMARY KEY (`verein_id`);

--
-- Indizes für die Tabelle `vereinmitglied`
--
ALTER TABLE `vereinmitglied`
  ADD PRIMARY KEY (`verein_id`,`mitglied_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `mitglied`
--
ALTER TABLE `mitglied`
  MODIFY `mitglied_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `verein`
--
ALTER TABLE `verein`
  MODIFY `verein_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
