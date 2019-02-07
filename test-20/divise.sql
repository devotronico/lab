-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 07, 2019 alle 15:26
-- Versione del server: 10.1.33-MariaDB
-- Versione PHP: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tomatoware_local`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `divise`
--

CREATE TABLE `divise` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `codice` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valuta` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` mediumint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `divise`
--

INSERT INTO `divise` (`id`, `codice`, `valuta`, `numero`) VALUES
(1, 'EUR', 'euro', 978),
(2, 'USD', 'us dollars', 840);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `divise`
--
ALTER TABLE `divise`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `divise`
--
ALTER TABLE `divise`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
