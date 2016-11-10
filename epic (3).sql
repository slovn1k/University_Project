-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2015 г., 21:11
-- Версия сервера: 5.6.21
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `epic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `name` char(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `body`, `dt`) VALUES
(15, 'Admin', 'turcanualexandru1992@gmail.com', 'Bine ati venit pe site-ul MostEpic!!!', '2015-05-04 10:01:05'),
(16, 'Alexandr', 'turcanualexandru1992@gmail.com', 'E3 2015 a fost uimitor... :)', '2015-06-16 19:09:34');

-- --------------------------------------------------------

--
-- Структура таблицы `noutati`
--

CREATE TABLE IF NOT EXISTS `noutati` (
`id_noutate` int(10) NOT NULL,
  `titlu` varchar(50) NOT NULL,
  `data_adaugare` date NOT NULL,
  `textul` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `noutati`
--

INSERT INTO `noutati` (`id_noutate`, `titlu`, `data_adaugare`, `textul`, `link`) VALUES
(5, 'Despre noi...', '2015-05-04', '															Acest site contine informatie despre cele mai interesante curiozitati din lumea IT, Cosmoc, Stiinta si multe alte. Pe site puteti vedea nu numai imagini si text dar si video si linkuri care sursele curiozitatilor...	\r\n				\r\n				\r\n				', 'http://localhost/teza_de_an/index.php'),
(6, 'Teme', '2015-05-04', '										Probabil cineva doreste sa mai propuna teme in meniu sau cunoaste informatie interesanta la una din teme... Asteptam scrisorile voastre pe care le puteti transmite din meniul contact_us...\r\n				\r\n				', 'http://localhost/teza_de_an/index.php');

-- --------------------------------------------------------

--
-- Структура таблицы `oshibka`
--

CREATE TABLE IF NOT EXISTS `oshibka` (
  `ip` varchar(12) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `col` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `userlist`
--

CREATE TABLE IF NOT EXISTS `userlist` (
`id` int(3) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `userlist`
--

INSERT INTO `userlist` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'herospam1992');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `login` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `avatar`) VALUES
(10, 'sasha', 'd4c3d8020dcc1dab2e1afa7627a7d30fb3p6f', 'avatars/noavatar.gif');

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`id_video` int(11) NOT NULL,
  `titlu` varchar(50) NOT NULL,
  `descriere` varchar(250) NOT NULL,
  `src` text NOT NULL,
  `data_adaugare` date NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `video`
--

INSERT INTO `video` (`id_video`, `titlu`, `descriere`, `src`, `data_adaugare`, `link`) VALUES
(1, 'Experimente surprinzatoare', '					TheRussianHacker persoana va realiza citeva experimente care va vor surprinde...		\r\n				', 'video/amazing.mp4', '2015-04-28', 'http://localhost/teza_de_an/it.php'),
(8, 'MKS time lapse', 'Video inregistrat de pe nava cosmica MKS, care va arata miscarea planetei Pamint cu timpul accelerat		', 'video/earth.mp4', '2015-04-28', 'http://localhost/teza_de_an/it.php'),
(9, 'Envisioning Center', 'Vederea viitorul de catre compania Microsoft, cum vor interactiona oamenii cu calculatoarele si cum va fi viata in viitor impreuan cu compania Microsoft		', 'video/envisioning.mp4', '2015-04-28', 'http://localhost/teza_de_an/it.php'),
(10, 'Red Bull free fall', 'Video uimitor care a realizat compania RedBull, o sa va transfere in cosmos deschis si o sa va faca sa simtiti totul cind cadeti de la o inaltime inalte, chiar din cosmos!!!	', 'video/felix.mp4', '2015-04-28', 'http://localhost/teza_de_an/it.php'),
(11, 'Google Glass', 'Internetul in fata ochilor, compania Google a realizat ideea care oamenii doar au vazut intr-un film fantastic, dar acuma aceasta este realitatea si o puteti vedea		', 'video/google_glass.mp4', '2015-04-28', 'http://localhost/teza_de_an/it.php'),
(12, 'Microsoft Hololens Demo E3 2015', 'Video cu demo de la Microsoft, care demonstreaza lucrul ocelarilor Hololens, care ilustreaza lumea grafica in realitate	', 'video/hololens.mp4', '2015-06-16', 'http://localhost/teza_de_an/it.php');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `noutati`
--
ALTER TABLE `noutati`
 ADD PRIMARY KEY (`id_noutate`);

--
-- Индексы таблицы `userlist`
--
ALTER TABLE `userlist`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `noutati`
--
ALTER TABLE `noutati`
MODIFY `id_noutate` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `userlist`
--
ALTER TABLE `userlist`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `video`
--
ALTER TABLE `video`
MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
