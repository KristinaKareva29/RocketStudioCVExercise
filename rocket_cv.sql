-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 30 окт 2023 в 22:08
-- Версия на сървъра: 10.4.24-MariaDB
-- Версия на PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `rocket_cv`
--

-- --------------------------------------------------------

--
-- Структура на таблица `cv_user`
--

CREATE TABLE `cv_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `technical_skill_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `cv_user`
--

INSERT INTO `cv_user` (`id`, `user_id`, `technical_skill_id`, `university_id`, `date`) VALUES
(1, 1, 2, 3, '2023-10-29'),
(2, 2, 1, 4, '2023-11-03'),
(3, 3, 4, 2, '2023-10-17'),
(4, 4, 4, 2, '2023-10-07');

-- --------------------------------------------------------

--
-- Структура на таблица `technical_skills`
--

CREATE TABLE `technical_skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `technical_skills`
--

INSERT INTO `technical_skills` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'C#'),
(3, 'SQL'),
(4, 'Java');

-- --------------------------------------------------------

--
-- Структура на таблица `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `grade` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `universities`
--

INSERT INTO `universities` (`id`, `name`, `grade`) VALUES
(1, 'Technincal University', 3.5),
(2, 'University of Iconomics', 5),
(3, 'Medical University', 6.8),
(4, 'Naval Academy', 9.6);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `surname`, `birth_date`) VALUES
(1, 'test1', 'test1_2', 'test1_3', '2023-10-25'),
(2, 'test2', 'test2_2', 'test2_3', '2023-11-03'),
(3, 'test3', 'test3_2', 'test3_3', '2023-10-17'),
(4, 'test4', 'test4_2', 'test4_3', '2023-10-07');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `cv_user`
--
ALTER TABLE `cv_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_user_fk_user_id` (`user_id`),
  ADD KEY `cv_user_fk_technical_skill_id` (`technical_skill_id`),
  ADD KEY `cv_user_fk_university_id` (`university_id`);

--
-- Индекси за таблица `technical_skills`
--
ALTER TABLE `technical_skills`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv_user`
--
ALTER TABLE `cv_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `technical_skills`
--
ALTER TABLE `technical_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `cv_user`
--
ALTER TABLE `cv_user`
  ADD CONSTRAINT `cv_user_fk_technical_skill_id` FOREIGN KEY (`technical_skill_id`) REFERENCES `technical_skills` (`id`),
  ADD CONSTRAINT `cv_user_fk_university_id` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `cv_user_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
