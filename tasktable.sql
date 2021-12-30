-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 30 Gru 2021, 23:07
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `tasktable`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `taskowo`
--

CREATE TABLE `taskowo` (
  `id` int(255) NOT NULL,
  `allTask` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `proTask` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `endTask` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `taskowo`
--

INSERT INTO `taskowo` (`id`, `allTask`, `proTask`, `endTask`) VALUES
(28, 'test1', '', ''),
(29, '', 'test2', ''),
(30, '', 'task4', 'task4'),
(31, '', '', 'test5'),
(32, '', '', 'test6'),
(33, 'test7', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `allTask` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `proTask` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `endTask` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `test`
--

INSERT INTO `test` (`id`, `login`, `allTask`, `proTask`, `endTask`) VALUES
(1, 'admin', 'coding', NULL, NULL),
(2, 'admin', 'coffee', NULL, NULL),
(3, 'admin', 'go out with dog', NULL, NULL),
(4, 'admin', NULL, 'clean room', NULL),
(5, 'admin', NULL, 'gym', NULL),
(6, 'admin', NULL, 'make dinner', NULL),
(7, 'admin', NULL, NULL, 'ola');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `okej` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `date`, `okej`) VALUES
(30, 'admin', 'admin@gmail.com', 'root123', '2021-11-01 19:13:47', NULL),
(31, 'janek', 'jankolodziej04@gmail.com', 'root123', '2021-12-28 19:05:38', NULL),
(45, 'ola', 'ola@gmial.com', 'root123', '2021-11-18 19:59:24', NULL),
(46, 'piotr', 'piotr@gmail.com', 'root123', '2021-11-18 20:44:24', NULL),
(47, 'renia', 'renia@gmail.com', 'root123', '2021-11-27 11:24:36', NULL),
(48, 'domin', 'domin@op.pl', 'root123', '2021-12-10 20:55:46', NULL),
(49, 'mariaXD', 'maria69@gmail.com', 'Karol1709', '2021-12-15 19:38:04', NULL),
(50, 'michal', 'michal@gmail.com', 'root123', '2021-12-17 08:40:52', NULL),
(51, 'przemek', 'przekre97@gmail.com', 'root123', '2021-12-28 20:07:18', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `taskowo`
--
ALTER TABLE `taskowo`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `taskowo`
--
ALTER TABLE `taskowo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT dla tabeli `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
