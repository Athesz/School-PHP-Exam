-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Júl 25. 14:07
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `etterem`
--
CREATE DATABASE IF NOT EXISTS `etterem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci;
USE `etterem`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Hamburger'),
(2, 'Hotdog'),
(3, 'Pizza');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `db` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `price`, `image`, `db`) VALUES
(1, 1, 'Hamburger', 490, 'img/burger_1.jpg', 72),
(2, 1, 'Sajtburger', 590, 'img/burger_2.jpg', 52),
(3, 2, 'HotDog', 360, 'img/hot-dog_1.jpg', 40),
(4, 2, 'Chilis HotDog', 390, 'img/hot-dog_2.jpg', 29),
(5, 3, 'Négysajtos Pizza', 1190, 'img/pizza_1.jpg', 95),
(6, 3, 'Sonkás Pizza', 1090, 'img/pizza_2.png', 39),
(7, 3, 'Ananászos Pizza', 1290, 'img/pizza_3.jpg', 74);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'pergati@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
