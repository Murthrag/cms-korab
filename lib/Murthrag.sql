-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3311
-- Generation Time: Dec 03, 2016 at 10:30 AM
-- Server version: 5.7.15-9-log
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Murthrag`
--

-- --------------------------------------------------------

--
-- Table structure for table `nastenka`
--

CREATE TABLE `nastenka` (
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `upravene` timestamp NULL DEFAULT NULL,
  `dt_od` date DEFAULT NULL,
  `dt_do` date DEFAULT NULL,
  `nazov` varchar(500) NOT NULL,
  `oznam` longtext NOT NULL,
  `obrazok_link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nastenka`
--

INSERT INTO `nastenka` (`datum`, `upravene`, `dt_od`, `dt_do`, `nazov`, `oznam`, `obrazok_link`) VALUES
('2016-10-24 14:34:29', NULL, '2016-10-14', '2016-10-26', 'NIE', 'Toto je velmi dvolezity oznam ktory urcite uvidi vela ludi aj ja dokonca.', NULL),
('2016-10-24 14:39:28', NULL, '2016-10-14', '2016-10-26', 'Velmy dlhy nadpis ktory ani nic nehovori', ' ale ano', NULL),
('2016-10-24 14:39:35', NULL, NULL, NULL, 'NIE', 'Toto je velmi dvolezity oznam ktory urcite uvidi vela ludi aj ja dokonca.Toto je velmi dvolezity oznam ktory urcite uvidi vela ludi aj ja dokonca.Toto je velmi dvolezity oznam ktory urcite uvidi vela ludi aj ja dokonca.Toto je velmi dvolezity oznam ktory urcite uvidi vela ludi aj ja dokonca.Toto je velmi dvolezity oznam ktory urcite uvidi vela ludi aj ja dokonca.', NULL),
('2016-11-08 15:17:24', NULL, '2016-11-08', NULL, 'StrÃ¡nka je spustenÃ¡', ' Vitajte na strÃ¡nke Cirkevnej materskej Å¡koly KORÃB! TÃ¡to strÃ¡nka je spustenÃ¡ dÅˆa 2. novembra 2016 a slÃºÅ¾i vÃ½hradne pre informovanie verejnosti o fungovanÃ­ a novinkÃ¡ch materskej Å¡koly. DÃºfame Å¾e sa vÃ¡m pÃ¡Äi!', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prihlasenie`
--

CREATE TABLE `prihlasenie` (
  `login` varchar(20) NOT NULL,
  `heslo` varchar(50) NOT NULL,
  `rola` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prihlasenie`
--

INSERT INTO `prihlasenie` (`login`, `heslo`, `rola`) VALUES
('admin', 'janko0000', 'admin'),
('riaditelka', 'riaditelkaradka', 'riaditelka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nastenka`
--
ALTER TABLE `nastenka`
  ADD PRIMARY KEY (`datum`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
