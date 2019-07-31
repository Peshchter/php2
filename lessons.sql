-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 31 2019 г., 22:07
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lessons`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(1) NOT NULL DEFAULT '0',
  `title` varchar(5) DEFAULT NULL,
  `price` int(2) DEFAULT NULL,
  `count` int(1) DEFAULT NULL,
  `img` varchar(10) DEFAULT NULL,
  `sizes` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `title`, `price`, `count`, `img`, `sizes`) VALUES
(2, 'Кепка', 55, 7, 'kepka.webp', 'XL,XXL,S');

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE `colors` (
  `id` int(1) NOT NULL DEFAULT '0',
  `name` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'Red'),
(2, 'Green'),
(3, 'Blue'),
(4, 'Yellow'),
(5, 'Black'),
(6, 'White');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_address` text NOT NULL,
  `summ` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `goods` text NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_address`, `summ`, `order_status`, `payment_status`, `goods`, `info`) VALUES
(2, 0, 'null', 0, 0, 0, 'a:3:{i:6;a:3:{s:5:\"title\";s:16:\"Футболка\";s:5:\"price\";s:3:\"400\";s:5:\"count\";i:3;}i:7;a:3:{s:5:\"title\";s:10:\"Брюки\";s:5:\"price\";s:3:\"180\";s:5:\"count\";i:1;}i:5;a:3:{s:5:\"title\";s:10:\"Туфли\";s:5:\"price\";s:3:\"450\";s:5:\"count\";i:1;}}', 'null'),
(3, 0, 'null', 0, 0, 0, 'a:0:{}', 'null'),
(4, 20, 'null', 0, 0, 0, 'a:2:{i:7;a:3:{s:5:\"title\";s:10:\"Брюки\";s:5:\"price\";s:3:\"180\";s:5:\"count\";i:1;}i:6;a:3:{s:5:\"title\";s:16:\"Футболка\";s:5:\"price\";s:3:\"400\";s:5:\"count\";i:2;}}', 'null');

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `is_local` tinyint(1) NOT NULL DEFAULT '1',
  `shown_count` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `filename`, `is_local`, `shown_count`, `size`) VALUES
(1, '83168e4b.jpg', 1, 1, 43161),
(2, '100_0906.JPG', 1, 5, 145621),
(3, 'x_d01d1a0c.jpg', 1, 10, 96670),
(4, '2011-corvette-z06-carbon-limited-edition.jpg', 1, 3, 1145594),
(5, 'JmV6FNE1XuE.jpg', 1, 1, 432981),
(6, 'c922193fd38c8ca86d2fa2e0d846af81.jpg', 1, 1, 74102),
(7, 'mickey-and-minnie_77899-1920x1200.jpg', 1, 2, 386416),
(8, 'abstract-colorfull-022.jpg', 1, 3, 387439),
(9, 'mountain_182486-1920x1200.jpg', 1, 1, 454760),
(10, 'https://bipbap.ru/wp-content/uploads/2017/12/65620375-6b2b57fa5c7189ba4e3841d592bd5fc1-800-640x426.jpg', 0, 2, 0),
(11, 'https://bipbap.ru/wp-content/uploads/2017/12/3bcf49273613bc88bc79040f08fd422008c52624.jpg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `price` int(3) DEFAULT NULL,
  `count` int(1) DEFAULT NULL,
  `img` varchar(11) DEFAULT NULL,
  `sizes` varchar(10) DEFAULT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `count`, `img`, `sizes`, `info`) VALUES
(2, 'Сапоги', 150, 2, 'sapogi.webp', 'XL,L,M', ''),
(3, 'Кепка', 55, 2, 'kepka.webp', 'XL,XXL,S', ''),
(4, 'Свитер', 350, 2, 'sviter.webp', 'XL,S,M,XXL', ''),
(5, 'Туфли', 450, 2, 'tyfli.webp', 'XL,S,M', ''),
(6, 'Футболка', 400, 2, 'shirt.jpg', 'XL,L,M', ''),
(7, 'Брюки', 180, 2, 'br.jpg', 'XL,L,M', ''),
(8, 'Шорты', 135, 2, 'Short.jpg', 'XL,L,M', ''),
(9, 'Носки', 25, 2, 'socks.png', 'XL,L,M', ''),
(16, 'dfngdn', 45, NULL, '', NULL, 'dnghmgdhm'),
(17, 'fghnfgmn', 56756, NULL, 'null', NULL, 'fghfgh');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `login`) VALUES
(23, 'Pavel', '$2y$10$tqVituEQ/M6gdLEeNAHVIeoy8natCT41XUYlu40YUFT6V6aFFo0eG', 'login');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
