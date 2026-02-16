-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Okt 18. 08:21
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `films`
--

CREATE DATABASE `films`
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci ;

USE `films`;

--
-- Tábla szerkezet ehhez a táblához `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `birth_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `actors`
--

INSERT INTO `actors` (`name`, `birth_date`) VALUES
('Sam Worthington', '1976-08-02'),
('Zoe Saldaña', '1978-06-19'),
('Leonardo DiCaprio', '1974-11-11'),
('Joseph Gordon-Levitt', '1981-02-17'),
('Kate Winslet', '1975-10-05');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `casting`
--

CREATE TABLE `casting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  `character_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `casting`
--

INSERT INTO `casting` (`movie_id`, `actor_id`, `character_name`) VALUES
(1, 1, 'Jake Sully'),
(1, 2, 'Neytiri'),
(2, 3, 'Dominick \"Dom\" Cobb'),
(2, 4, 'Arthur'),
(3, 3, 'Jack Dawson'),
(3, 5, 'Rose DeWitt Bukater');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `category`
--

INSERT INTO `category` (`name`) VALUES
('Sci-fi'),
('Thriller'),
('Dráma');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `birth_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `directors`
--

INSERT INTO `directors` (`name`, `birth_date`) VALUES
('James Cameron', '1954-08-16'),
('Christopher Nolan', '1970-07-30');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `studio_id` int(11) DEFAULT NULL,
  `director_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `release_year` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `movies`
--

INSERT INTO `movies` (`title`, `duration`, `studio_id`, `director_id`, `category_id`, `release_year`) VALUES
('Avatar', 162, 1, 1, 1, 2009),
('Eredet', 148, 2, 2, 2, 2010),
('Titanic', 195, 1, 1, 3, 1997);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `studio`
--

CREATE TABLE `studio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `studio`
--

INSERT INTO `studio` (`name`) VALUES
('20th Century Fox'),
('Warner Bros. Pictures');

--
-- Indexek a kiírt táblákhoz
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
