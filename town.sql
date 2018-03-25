-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 март 2018 в 00:01
-- Версия на сървъра: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `town`
--

-- --------------------------------------------------------

--
-- Структура на таблица `bisness`
--

CREATE TABLE `bisness` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `phone` char(50) NOT NULL,
  `location` char(255) NOT NULL,
  `start_working` datetime NOT NULL DEFAULT '0000-00-00 08:00:00',
  `start_lunch` datetime NOT NULL DEFAULT '0000-00-00 13:00:00',
  `stop_lunch` datetime NOT NULL DEFAULT '0000-00-00 13:30:00',
  `stop_working` datetime NOT NULL DEFAULT '0000-00-00 18:00:00',
  `profession` int(11) NOT NULL,
  `password` char(255) NOT NULL,
  `picture` char(255) DEFAULT NULL,
  `string_with_services` char(255) DEFAULT NULL,
  `string_with_subscriptions` char(255) DEFAULT NULL,
  `description` varchar(6000) DEFAULT NULL,
  `time_for_service` int(11) NOT NULL DEFAULT '15',
  `delete_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `bisness`
--

INSERT INTO `bisness` (`id`, `name`, `email`, `phone`, `location`, `start_working`, `start_lunch`, `stop_lunch`, `stop_working`, `profession`, `password`, `picture`, `string_with_services`, `string_with_subscriptions`, `description`, `time_for_service`, `delete_on`) VALUES
(5, 'petkata', '12SADF@FDS.com', '0832443215', 'lovech Bulgaria', '0000-00-00 08:00:00', '0000-00-00 13:00:00', '0000-00-00 13:30:00', '0000-00-00 18:00:00', 2, '$2y$10$sRS3mS2ckEcO2Q1OIYkKxOwuKXYVkFQFn16rZHTwmIkobQGBi0Cb6', NULL, 'преглед на очите, разширявае на зениците и тн...', NULL, NULL, 10, NULL),
(6, 'mincho', 'sdfsd@sdfadfs.com', '0832443215', 'lovech Bulgaria', '0000-00-00 08:00:00', '0000-00-00 13:00:00', '0000-00-00 13:30:00', '0000-00-00 18:00:00', 1, '$2y$10$oxoQU0tToUCCSulgQs6m5OzedkjwbMWFbWNvRz5.f9CqW9Nsdy4Je', '/softuniada/App\\avatars\\5aa507bd77fc2_професионална-грижа-за-косата-лореал-1144x552.jpg', 'преглед,лекуване на мъдрец и тн..', NULL, 'sqf', 120, NULL),
(7, 'sadfsda', 'saf@adsf.daf', '0892543312', 'lovech Bulgaria', '0000-00-00 08:00:00', '0000-00-00 08:00:00', '0000-00-00 08:00:00', '0000-00-00 12:00:00', 3, '$2y$10$ZaW81W3utMKdEbsjrqwRkuvPqZhLfJWuRzCtNGV6W8fpPSc0aSM7e', NULL, '', NULL, '', 20, NULL),
(8, 'при пешо', 'sdfsd@sdfadfs.com', '0888535618', 'lovech Bulgaria', '0000-00-00 08:00:00', '0000-00-00 13:00:00', '0000-00-00 13:30:00', '0000-00-00 18:00:00', 4, '$2y$10$4VjyCOiGks0hapWONjI8bOJmNdputJuESM8YFU2hQyyJLNYfLQ0g2', NULL, '', NULL, 'елата за да ви оправим зъбите.', 15, NULL),
(9, 'asana', 'asana@asanov.com', '0832463215', 'lovech Bulgaria', '0000-00-00 08:00:00', '0000-00-00 13:00:00', '0000-00-00 15:30:00', '0000-00-00 20:00:00', 1, '$2y$10$/HbvR3KR5lvIbo6Kad3rN.oA0Qfs0DW9R6Hw1GQsE8x.fhQl.em2.', NULL, NULL, NULL, 'pich', 15, NULL),
(10, 'Красота и Грация Ловеч', 'krasota@graciq.com', '08864372', 'Car ivan №32 lovech Bulgaria', '0000-00-00 08:00:00', '0000-00-00 13:00:00', '0000-00-00 13:30:00', '0000-00-00 18:00:00', 4, '$2y$10$u8JaO2FtQqRM.uUd51M6UOyCQxdnoXTXy0qi0V1QrCxyZ1EcQhdaC', NULL, NULL, NULL, 'най добрия маникчюр и педикюр', 30, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `index images`
--

CREATE TABLE `index images` (
  `id` int(11) NOT NULL,
  `url` char(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `professions`
--

CREATE TABLE `professions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `delete_on` date DEFAULT NULL,
  `confirm_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `professions`
--

INSERT INTO `professions` (`id`, `name`, `delete_on`, `confirm_on`) VALUES
(1, 'зъболекар', NULL, NULL),
(2, 'очен лекар', NULL, NULL),
(3, 'фризьор', NULL, NULL),
(4, 'маникюрист', NULL, NULL),
(5, 'лекар', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `bisness_name` char(50) NOT NULL,
  `date1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `subscription`
--

INSERT INTO `subscription` (`id`, `date`, `user_id`, `bisness_name`, `date1`) VALUES
(13, '2018-03-14 11:00:00', 8, 'asana', '2018-03-14'),
(14, '2018-03-23 11:00:00', 8, 'Красота и Грация Ловеч', '2018-03-23'),
(15, '2018-03-11 12:00:00', 8, 'mincho', '2018-03-11');

-- --------------------------------------------------------

--
-- Структура на таблица `type_user`
--

CREATE TABLE `type_user` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `type_user`
--

INSERT INTO `type_user` (`id`, `name`) VALUES
(2, 'Admin'),
(1, 'User');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` char(50) NOT NULL,
  `last_name` char(50) NOT NULL,
  `nickname` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `phone` char(50) NOT NULL,
  `password` char(255) NOT NULL,
  `born_on` date NOT NULL,
  `time_for_service` int(11) NOT NULL DEFAULT '15',
  `picture` char(255) DEFAULT NULL,
  `type_id` int(11) NOT NULL DEFAULT '1',
  `string_with_subscriptions` varchar(2000) NOT NULL DEFAULT '``',
  `delete_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `nickname`, `email`, `phone`, `password`, `born_on`, `time_for_service`, `picture`, `type_id`, `string_with_subscriptions`, `delete_on`) VALUES
(2, 'penka', 'todorova', 'picheto', 'saf@adsf.daf', '0832314334', '$2y$10$.3c7jdvXvNekF7ZwruGlYOSgJapoMpQwrVNqn6kmWNiYwGpMzLA/W', '1967-03-21', 15, NULL, 1, '', NULL),
(4, 'mitko', 'mitkov', 'mitacheto', '12SADF@FDS.com', '0877737697', '$2y$10$9iv.x6.tJX0M8HqsO7CjiOsvQCzW3uCbJB8.lEIRQzP2VorZD9Lq6', '1969-03-12', 15, '/softuniada/App\\avatars\\5aa46615696fa_926614.jpg', 1, '``', NULL),
(8, 'georgi', 'nedkov', 'gogo', 'asd@asd.com', '0873242342', '$2y$10$.OcXoz2giRDRTX512DNuTOOoxnAYbu3Df3k0nqMueH3rE44uMLL3C', '1996-02-14', 15, NULL, 2, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bisness`
--
ALTER TABLE `bisness`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `FK_places_professions` (`profession`);

--
-- Indexes for table `index images`
--
ALTER TABLE `index images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bisness_name` (`bisness_name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nickname`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_users_type_user` (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bisness`
--
ALTER TABLE `bisness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `index images`
--
ALTER TABLE `index images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `type_user`
--
ALTER TABLE `type_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `bisness`
--
ALTER TABLE `bisness`
  ADD CONSTRAINT `FK_places_professions` FOREIGN KEY (`profession`) REFERENCES `professions` (`id`);

--
-- Ограничения за таблица `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_type_user` FOREIGN KEY (`type_id`) REFERENCES `type_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
