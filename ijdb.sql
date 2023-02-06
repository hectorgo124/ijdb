-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-02-2023 a las 17:16:43
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ijdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(4, 'ContentEditor-Ximo', 'jokes@ximo.com', 'e0cf8cc562b953926ec87d643ac94538', NULL, NULL),
(5, 'AccountAdministrator-Ximo', 'authors@ximo.com', '1067c3e242bbaee3182714ab7c40caf9', NULL, NULL),
(6, 'SiteAdministrator-Ximo', 'categories@ximo.com', '79de9a448df45bcaca76c5e7d4e869b2', NULL, NULL),
(7, 'Mario', 'mario@gmail.com', '9a6fbaa1152cd097add69fcdc64cba16', NULL, '2023-02-04 13:21:50'),
(8, 'Enrique', 'enrique@yahoo.com', 'pass', '2023-02-03 17:40:08', '2023-02-03 17:40:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author_roles`
--

CREATE TABLE `author_roles` (
  `authorid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Knock-knock', NULL, NULL),
(2, 'Cross the road', NULL, NULL),
(3, 'Lawyers', NULL, NULL),
(4, 'Walk the bar', NULL, NULL),
(5, 'Proba categoria', '2023-02-04 17:29:02', '2023-02-04 17:29:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jokes`
--

CREATE TABLE `jokes` (
  `id` int(11) NOT NULL,
  `joketext` varchar(255) NOT NULL,
  `jokedate` varchar(255) NOT NULL,
  `authorid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `jokes`
--

INSERT INTO `jokes` (`id`, `joketext`, `jokedate`, `authorid`, `created_at`, `updated_at`) VALUES
(1, 'Et dolor distinctio ipsum laboriosam.', '1970-06-10', 8, NULL, NULL),
(2, 'Eum voluptatem fuga enim qui.', '1996-06-16', 8, NULL, NULL),
(3, 'Exercitationem aspernatur incidunt atque tempore dolores velit.', '1973-04-20', 5, NULL, NULL),
(4, 'Enim rem voluptatem nihil in.', '1975-02-26', 8, NULL, NULL),
(5, 'Ipsa nostrum dolores placeat minus.', '2004-11-23', 7, NULL, NULL),
(6, 'Sequi dolorem unde eveniet ipsa explicabo sit consequatur.', '1989-09-17', 6, NULL, NULL),
(7, 'Corrupti delectus rem porro autem.', '1996-03-12', 8, NULL, NULL),
(8, 'Voluptatum vitae vel impedit ut et.', '1980-01-07', 6, NULL, NULL),
(9, 'Et reiciendis asperiores enim aliquid ea.', '1982-04-14', 4, NULL, NULL),
(10, 'Inventore est optio molestias sed.', '1980-12-19', 7, NULL, NULL),
(11, 'Animi aliquam nesciunt dolores vel a.', '2014-03-22', 6, NULL, NULL),
(12, 'Dolor et et fugit est.', '2020-04-27', 4, NULL, NULL),
(13, 'Similique accusantium et dolore quasi laborum aut sit necessitatibus.', '2014-08-16', 7, NULL, NULL),
(15, 'Et pariatur natus quae quibusdam non.', '2004-11-03', 5, NULL, NULL),
(16, 'Consequatur qui magni voluptas sunt.', '1992-03-21', 5, NULL, NULL),
(17, 'Omnis sit in eligendi.', '1986-02-11', 8, NULL, NULL),
(18, 'Voluptatem quia dolor voluptatum eveniet fuga harum perspiciatis et.', '1977-05-29', 8, NULL, NULL),
(19, 'Asperiores molestiae accusantium maiores.', '1984-11-18', 8, NULL, NULL),
(20, 'Totam assumenda dolores nam rerum ipsum.', '1995-10-27', 7, NULL, NULL),
(21, 'Itaque voluptas voluptas est velit.', '1993-01-19', 8, NULL, NULL),
(22, 'Aut ut enim perferendis nostrum esse.', '1974-10-11', 8, NULL, NULL),
(23, 'Voluptas sunt sunt cupiditate.', '1975-03-22', 7, NULL, NULL),
(24, 'Ut veritatis accusantium quasi aut eveniet architecto vel.', '2001-02-20', 7, NULL, '2023-02-04 13:55:22'),
(26, 'joke de proba', '2023-02-04', 8, '2023-02-04 13:44:16', '2023-02-04 13:44:16'),
(30, 'proba categoryjoke', '2023-02-05', 4, '2023-02-05 09:38:44', '2023-02-05 09:38:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `joke_categories`
--

CREATE TABLE `joke_categories` (
  `jokeid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `joke_categories`
--

INSERT INTO `joke_categories` (`jokeid`, `categoryid`, `created_at`, `updated_at`) VALUES
(26, 1, NULL, NULL),
(26, 2, NULL, NULL),
(30, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_02_03_141501_create_authors_table', 1),
(3, 'create_jokes_table', 1),
(4, '2023_02_04_180432_create_categories_table', 2),
(5, '2023_02_04_183309_create_author_roles_table', 3),
(6, '2023_02_04_183452_create_joke_categories_table', 3),
(7, '2023_02_04_183539_create_roles_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `author_roles`
--
ALTER TABLE `author_roles`
  ADD PRIMARY KEY (`authorid`,`roleid`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jokes`
--
ALTER TABLE `jokes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `joke_ibfk_1` (`authorid`);

--
-- Indices de la tabla `joke_categories`
--
ALTER TABLE `joke_categories`
  ADD KEY `jokecategory_ibfk_1` (`jokeid`),
  ADD KEY `jokecategory_ibfk_2` (`categoryid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `jokes`
--
ALTER TABLE `jokes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jokes`
--
ALTER TABLE `jokes`
  ADD CONSTRAINT `joke_ibfk_1` FOREIGN KEY (`authorid`) REFERENCES `authors` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `joke_categories`
--
ALTER TABLE `joke_categories`
  ADD CONSTRAINT `jokecategory_ibfk_1` FOREIGN KEY (`jokeid`) REFERENCES `jokes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jokecategory_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
