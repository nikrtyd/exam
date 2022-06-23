-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 23 2022 г., 15:39
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `photodb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `Id` int(11) NOT NULL,
  `Image` text NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Brand` text NOT NULL,
  `Category` int(11) NOT NULL,
  `Purchases` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`Id`, `Image`, `Name`, `Description`, `Brand`, `Category`, `Purchases`, `Price`) VALUES
(1, 'images/1.jpg', 'Телевизор Samsung SL9291DJ', 'Телевизор Samsung SL9291DJ - это универсальный телевизор для всех ваших близких и родных. Берегите их.', 'Samsung', 1, 41, 130130),
(2, 'images/2.jpg', 'Смартфон LG Optimus Z', 'Смартфон LG Optimus Z - позволит вам стать солдатом Российской армии.', 'LG', 2, 13, 50000),
(3, 'images/3.jpg', 'Весы Hisense HC923', 'Эти весы - произведение искусств. Я понял, что вознесусь.', 'Hisense', 3, 41, 6900),
(4, 'images/4.jpg', 'Мышь A4Tech Bloody X7', 'Мышь на сенсоре Avago 3305, позволит вам тащить, но возможно нет.', 'A4Tech', 4, 31, 12000),
(5, 'images/5.jpg', 'Телевизор Xiaomi Turbo + 45SocialCredits', 'Стекло 3д печать китай хороший пластмасса срать в кепку', 'Xiaomi', 1, 13, 104400),
(6, 'images/6.jpg', 'Смартфон Samsung Galaxy S90 Pro Plus', 'Офигеть камера 148 МП, а я думал сова.', 'Samsung', 2, 411, 511000),
(7, 'images/7.jpg', 'Колонки Microlab KSI020', 'Колонки - разорвут весь танцпол, потому что там басы классные.', 'Microlab', 7, 131, 4000),
(8, 'images/8.jpg', 'Клавиатура Vermillo Assic 912', 'Клавиатура механическая - емае капец жесть ваще мда ваще ваще может не надо. Она слишком громкая.', 'Vermillo', 5, 11, 99200),
(9, 'images/9.jpg', 'Тачпад Oclick 200', 'Тачпад - очень крутой для офиса прекрасно пойдет. Для профессиональной игры в косынку. Работает на Windows, на Linux запрещено.', 'Oclick', 6, 11, 8000),
(10, 'images/10.jpg', 'Смартфон Apple iPhone X', 'iPhone X - да, старый, но вы посмотрите только какое качество. Он вас не разочарует. И нет, мы не продаём б/у.', 'Apple', 2, 80, 71000);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `CatName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`Id`, `CatName`) VALUES
(1, 'Телевизор'),
(2, 'Смартфон'),
(3, 'Весы'),
(4, 'Мышь'),
(5, 'Клавиатура'),
(6, 'Тачпад'),
(7, 'Колонки');

-- --------------------------------------------------------

--
-- Структура таблицы `promotions`
--

CREATE TABLE `promotions` (
  `Id` int(11) NOT NULL,
  `Aid` int(11) NOT NULL,
  `NewPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `promotions`
--

INSERT INTO `promotions` (`Id`, `Aid`, `NewPrice`) VALUES
(1, 1, 120130),
(2, 4, 11000),
(3, 6, 500000);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `Id` int(11) NOT NULL,
  `Aid` int(11) NOT NULL,
  `Uid` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Post_date` date NOT NULL,
  `Stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`Id`, `Aid`, `Uid`, `Text`, `Post_date`, `Stars`) VALUES
(1, 10, 1, 'Это хороший телефон.', '2022-05-19', 4),
(2, 2, 1, 'Хороший телефон (но вы только посмотрите, какая доставка вай быстрая)', '2022-05-20', 5),
(3, 6, 1, 'Тоже телефон как телефон, что тот такой же что этот', '2022-05-20', 4),
(4, 8, 1, 'Клавиатура действительно очень громкая. Разбудил всех соседей.', '2022-05-21', 4),
(5, 7, 2, 'Колонки тихие. Китайские походу.', '2022-05-21', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Password` text NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Id`, `Name`, `Password`, `Email`) VALUES
(1, 'Пётр Порошенко', 'porosha0012', 'poroshenko_p@com.ua'),
(2, 'Сагит Ниязбеков', 'milkyoqoq007', 'sag_niz@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`Id`) USING BTREE;

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `promotions`
--
ALTER TABLE `promotions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
