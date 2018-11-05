-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 10 2017 г., 09:10
-- Версия сервера: 5.6.34
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `all_notebooks`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(10) DEFAULT NULL,
  `count` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `product` text,
  `name` text,
  `image` varchar(255) DEFAULT NULL,
  `slide` tinyint(1) NOT NULL DEFAULT '0',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `price` int(10) DEFAULT NULL,
  `display` text,
  `display_size` text,
  `CPU` text,
  `frequency` text,
  `RAM` text,
  `memory` text,
  `GPU` text,
  `other` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `product`, `name`, `image`, `slide`, `new`, `price`, `display`, `display_size`, `CPU`, `frequency`, `RAM`, `memory`, `GPU`, `other`) VALUES
(1, 'DELL', 'Inspiron 3162, синий', 'dell-3162', 0, 0, 13290, '11.6\"', '1366x768', 'Intel Celeron N3060', '1.6 ГГц (2.48 ГГц, в режиме Turbo)', '2048 Мб, DDR3L', 'SSD: 32 Гб', 'Intel HD Graphics', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(2, 'DELL', 'Inspiron 3552, черный', 'dell-3552', 0, 0, 15990, '15.6\"', '1366x768', 'Intel Celeron N3060', '1.6 ГГц (2.48 ГГц, в режиме Turbo)', '4096 Мб, DDR3L, 1600 МГц', 'HDD: 500 Гб', 'Intel HD Graphics 400', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера'),
(3, 'DELL', 'Inspiron 3567, черный', 'dell-3567', 0, 0, 23190, '15.6\"', '1366x768', 'Intel Core i3 6006U', '2.0 ГГц', '4096 Мб, DDR4', 'HDD: 500 Гб', 'Intel HD Graphics 520', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Linux'),
(4, 'DELL', 'Inspiron 5759, серебристый', 'dell-5759', 0, 0, 23890, '17.3\"', '1600x900', 'Intel Pentium 4405U', '2.1 ГГц', '4096 Мб, DDR3L', 'HDD: 500 Гб', 'Intel HD Graphics 510', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(5, 'DELL', 'Inspiron 3565, чёрный', 'dell-3567', 0, 0, 25190, '15.6\"', '1366x768', 'AMD A9 9400', '2.4 ГГц (3.2 ГГц, в режиме Turbo)', '6144 Мб, DDR4, 2400 МГц', 'HDD: 1000 Гб', 'AMD Radeon R4', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Linux'),
(6, 'DELL', 'Vostro 3568, чёрный', 'dell-v-3568', 0, 0, 25490, '15.6\"', '1366x768', 'Intel Core i3 6100U', '2.3 ГГц', '4096 Мб, DDR4, 2400 МГц', 'HDD: 1000 Гб', 'AMD Radeon R5 M420X - 2048 Мб', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(7, 'DELL', 'Inspiron 3168, серебристый', 'dell-3168', 0, 0, 25590, '11.6\"', '1366x768', 'Intel Pentium N3710', '1.6 ГГц (2.56 ГГц, в режиме Turbo)', '4096 Мб, DDR3L, 1600 МГц', 'HDD: 500 Гб', 'Intel HD Graphics 405', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(8, 'DELL', 'Vostro 3565, чёрный', 'dell-v-3565', 0, 0, 26990, '15.6\"', '1366x768', 'AMD A8 7410', '2.2 ГГц (2.5 ГГц, в режиме Turbo)', '8192 Мб, DDR3L, 1600 МГц', 'HDD: 500 Гб', 'AMD Radeon R5', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Windows 10 Home'),
(9, 'DELL', 'Inspiron 5567, серебристый', 'dell-5567', 0, 0, 26990, '15.6\"', '1366x768', 'Intel Core i3 6006U', '2.0 ГГц', '4096 Мб, DDR4', 'HDD: 1000 Гб', 'AMD Radeon R7 M440 - 2048 Мб', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Linux'),
(10, 'DELL', 'Inspiron 5558, черный', 'dell-5558', 0, 0, 29190, '15.6\"', '1366x768', 'Intel Core i3 5005U', '2.0 ГГц', '4096 Мб, DDR3L, 1600 МГц', 'HDD: 1000 Гб', 'nVidia GeForce 920M - 2048 Мб', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Ubuntu'),
(11, 'APPLE', 'MacBook Air MMGF2RU, серебристый', 'apple-mmgf2ru', 0, 0, 63990, '13.3\"', '1440x900', 'Intel Core i5 5250U', '1.6 ГГц (2.7 ГГц, в режиме Turbo)', '8192 Мб, LPDDR3, 1600 МГц', 'SSD: 128 Гб', 'Intel HD Graphics 6000', 'WiFi; Bluetooth; WEB-камера; Mac OS X El Capitan'),
(12, 'APPLE', 'MacBook Air MMGG2RU/A, серебристый', 'apple-mmgf2ru', 0, 1, 82990, '13.3\"', '1440x900`', 'Intel Core i5 5250U', '1.6 ГГц (2.7 ГГц, в режиме Turbo)', '8192 Мб, LPDDR3, 1600 МГц', 'SSD: 256 Гб', 'Intel HD Graphics 6000', 'WiFi; Bluetooth; WEB-камера; Mac OS X El Capitan'),
(13, 'APPLE', 'MacBook MLHA2RU/A, серебристый', 'apple-mlh2ru', 0, 0, 94990, '12\"', '2304x1440', 'Intel Core M3 6Y30', '1.1 ГГц (2.2 ГГц, в режиме Turbo)', '8192 Мб, LPDDR3, 1866 МГц', 'SSD: 256 Гб', 'Intel HD Graphics 515', 'WiFi; Bluetooth; WEB-камера; Mac OS X El Capitan'),
(14, 'APPLE', 'MacBook pro MLUQ2RU/A, серебристый', 'apple-mluq2ru', 0, 0, 105590, '13.3\"', '2560x1600', 'Intel Core i5 6360U', '2.0 ГГц (3.1 ГГц, в режиме Turbo)', '8192 Мб, LPDDR3, 1866 МГц', 'SSD: 256 Гб', 'Intel Iris graphics 540', 'WiFi; Bluetooth; WEB-камера; Mac OS X El Capitan\r\n'),
(15, 'APPLE', 'MacBook MLHC2RU/A, серебристый', 'apple-mlhc2ru', 0, 0, 114990, '12\"', '2304x1440', 'Intel Core M5 6Y54', '1.2 ГГц (2.7 ГГц, в режиме Turbo)', '8192 Мб, LPDDR3, 1866 МГц', 'SSD: 512 Гб', 'Intel HD Graphics 515', 'WiFi; Bluetooth; WEB-камера; Mac OS X El Capitan\r\n'),
(16, 'APPLE', 'MacBook Pro Z0SW0008Y, серый', 'apple-mluq2ru', 0, 1, 135990, '13.3\"', '2560x1600', 'Intel Core i7 6660U', '2.4 ГГц (3.4 ГГц, в режиме Turbo)', '8192 Мб, LPDDR3, 1866 МГц', 'SSD: 512 Гб', 'Intel Iris graphics 540', 'WiFi; Bluetooth; WEB-камера; Mac OS X El Capitan'),
(17, 'APPLE', 'MacBook Pro Z0T200010, серебристый', 'apple-z0t200010', 0, 0, 150990, '13.3\"', '2560x1600', 'Intel Core i7 6567U', '3.3 ГГц', '8192 Мб, LPDDR3, 2133 МГц', 'SSD: 256 Гб', 'Intel Iris graphics 550', 'WiFi; Bluetooth; WEB-камера; Mac OS X El Capitan'),
(18, 'ACER', 'Aspire ES1-521-26GG, черный', 'acer-es1-521-26gg', 0, 0, 14990, '15.6\"', '1366x768', 'AMD E1 6010', '1.35 ГГц', '2048 Мб, DDR3L', 'HDD: 500 Гб', 'AMD Radeon R2', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(19, 'ACER', 'Extensa EX2519-P5PG, черный', 'acer-ex2519', 0, 0, 15190, '15.6\"', '1366x768', 'Intel Pentium N3710', '1.6 ГГц (2.56 ГГц, в режиме Turbo)', '2048 Мб, DDR3L', 'HDD: 500 Гб', 'Intel HD Graphics 405', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Linux'),
(20, 'ACER', 'Extensa EX2519-C9WN, черный', 'acer-ex2519', 0, 0, 15590, '15.6\"', '1366x768', 'Intel Celeron N3060', '1.6 ГГц (2.48 ГГц, в режиме Turbo)', '2048 Мб, DDR3L', 'HDD: 500 Гб', 'Intel HD Graphics 400', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(21, 'ACER', 'Aspire ES1-731-C50Q, черный', 'acer-es1-731-c50q', 0, 0, 19990, '17.3\"', '1600x900', 'Intel Celeron N3060', '1.6 ГГц (2.16 ГГц, в режиме Turbo)', '4096 Мб, DDR3L', 'HDD: 500 Гб', 'Intel HD Graphics', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(22, 'ACER', 'Aspire ES1-533-P8BX, черный', 'acer-es1-533-p8bx', 0, 1, 19990, '15.6\"', '1366x768', 'Intel Pentium N4200', '1.1 ГГц (2.5 ГГц, в режиме Turbo)', '2048 Мб, DDR3L', 'HDD: 500 Гб', 'Intel HD Graphics 505', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Linux'),
(23, 'ACER', 'Extensa EX2530-37ES, черный', 'acer-ex2530', 0, 0, 24290, '15.6\"', '1366x768', 'Intel Core i3 5005U', '2.0 ГГц', '4096 Мб, DDR3L', 'HDD: 1000 Гб', 'Intel HD Graphics 5500', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Linux'),
(24, 'ACER', 'Aspire E5-573G-32MQ, черный', 'acer-e5-573g-32mq', 0, 0, 24990, '15.6\"', '1366x768', 'Intel Core i3 5005U', '2.0 ГГц', '4096 Мб, DDR3L', 'HDD: 500 Гб', 'nVidia GeForce 920M - 2048 Мб', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Linux'),
(25, 'ACER', 'Extensa EX2540-3300, черный', 'acer-ex2540', 0, 0, 26090, '15.6\"', '1366x768', 'Intel Core i3 6006U', '2.0 ГГц', '4096 Мб, DDR4', 'HDD: 500 Гб', 'Intel HD Graphics 520', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(26, 'ASUS', 'R540YA-XO112T, черный', 'asus-r540ya-xo112t', 0, 0, 15990, '15.6\"', '1366x768', 'AMD E1 7010', '1.5 ГГц', '2048 Мб, DDR3', 'HDD: 500 Гб', 'AMD Radeon R2', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(27, 'ASUS', 'E502SA-XO014T, черный', 'asus-e502sa-xo014t', 0, 0, 15290, '15.6\"', '1366x768', 'Intel Celeron N3050', '1.6 ГГц (2.16 ГГц, в режиме Turbo)', '2048 Мб, DDR3', 'HDD: 500 Гб', 'Intel HD Graphics', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(28, 'ASUS', 'X553SA-XX137T, черный', 'asus-x553sa-xx137t', 0, 0, 17990, '15.6\"', '1366x768', 'Intel Celeron N3050', '1.6 ГГц (2.16 ГГц, в режиме Turbo)', '2048 Мб, DDR3L', 'HDD: 500 Гб', 'Intel HD Graphics', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(29, 'ASUS', 'R540SA-XX052T, черный', 'asus-r540sa-xx052t', 0, 0, 18390, '15.6\"', '1366x768', 'Intel Celeron N3050', '1.6 ГГц (2.16 ГГц, в режиме Turbo)', '4096 Мб, DDR3L', 'HDD: 500 Гб', 'Intel HD Graphics', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(30, 'ASUS', 'X541SC-XXO34D, черный', 'asus-e502sa-xo014t', 0, 0, 20990, '15.6\"', '1366x768', 'Intel Pentium N3710', '1.6 ГГц (2.56 ГГц, в режиме Turbo)', '4096 Мб, DDR3L', 'HDD: 500 Гб', 'nVidia GeForce 810M - 1024 Мб', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(31, 'ASUS', 'X540LA-XX732D, черный', 'asus-x553sa-xx137t', 0, 0, 23490, '15.6\"', '1366x768', 'Intel Core i3 5005U', '2.0 ГГц', '8192 Мб, DDR3L', 'HDD: 500 Гб', 'Intel HD Graphics 5500', 'WiFi; Bluetooth; HDMI; WEB-камера; Free DOS'),
(32, 'HP', '15-ay094ur, серебристый', 'hp15-ay094ur', 1, 0, 26989, '15.6\"', '1366x768', 'Intel Core i3 5005U', '2.0 ГГц', '4096 Мб, DDR3L', 'HDD: 500 Гб', 'nVidia GeForce 920M - 1024 Мб', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(33, 'ASUS', 'X751SV-TY010T, черный', 'asus-x751sv-ty010t', 0, 0, 30590, '17.3\"', '1600x900', 'Intel Pentium N3710', '1.6 ГГц (2.56 ГГц, в режиме Turbo)', '8192 Мб, DDR3L', 'HDD: 1000 Гб', 'nVidia GeForce 920MX - 1024 Мб', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(34, 'HP', 'Stream 11-y000ur, голубой', 'hp-s-11-y000ur', 0, 0, 14290, '11.6\"', '1366x768', 'Intel Celeron N3050', '1.6 ГГц (2.16 ГГц, в режиме Turbo)', '2048 Мб, DDR3L', 'SSD: 32 Гб', 'Intel HD Graphics', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(35, 'HP', '17-y004ur, черный', 'hp-17-y004ur', 0, 0, 18190, '17.3\"', '1600x900', 'AMD E2 7110', '1.8 ГГц', '4096 Мб, DDR3L, 1600 МГц', 'HDD: 500 Гб', 'AMD Radeon R2', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Free DOS'),
(36, 'HP', '15-ba504ur, синий', 'hp-15-ba504ur', 0, 0, 18890, '15.6\"', '1366x768', 'AMD E2 7110', '1.8 ГГц', '4096 Мб, DDR3L, 1600 МГц', 'HDD: 500 Гб', 'AMD Radeon R2', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(37, 'HP', '17-y018ur, черный', 'hp-17-y004ur', 0, 0, 19890, '17.3\"', '1600x900', 'AMD E2 7110', '1.8 ГГц', '4096 Мб, DDR3L, 1600 МГц', 'HDD: 1000 Гб', 'AMD Radeon R2', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Free DOS'),
(38, 'HP', '15-ay517ur, черный', 'hp-15-ay517ur', 0, 0, 18590, '15.6\"', '1366x768', 'Intel Pentium N3710', '1.6 ГГц (2.56 ГГц, в режиме Turbo)', '4096 Мб, DDR3L, 1600 МГц', 'HDD: 500 Гб', 'Intel HD Graphics 405', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(39, 'MSI', 'GL62 6QE-1699XRU, черный', 'msi-6qe-1699xru', 0, 0, 48990, '15.6\"', '1920x1080', 'Intel Core i5 6300HQ', '2.3 ГГц (3.2 ГГц, в режиме Turbo)', '8192 Мб, DDR4', 'HDD: 1000 Гб', 'nVidia GeForce GTX 950M - 2048 Мб', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(40, 'MSI', 'GP62 7QF(Leopard Pro)-1692, черный', 'msi-leo-gp62-7qf', 0, 0, 59490, '15.6\"', '1920x1080', 'Intel Core i5 7300HQ', '2.5 ГГц (3.5 ГГц, в режиме Turbo)', '8192 Мб, DDR4', 'HDD: 1000 Гб', 'nVidia GeForce GTX 960M - 2048 Мб', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(41, 'MSI', 'PX60 6QD-261RU, серебристый', 'msi-px60-6qd-261ru', 0, 0, 63290, '15.6\"', '1920x1080', 'Intel Core i5 6300HQ', '2.3 ГГц (3.2 ГГц, в режиме Turbo)', '8192 Мб, DDR4', 'HDD: 1000 Гб', 'nVidia GeForce GTX 950M - 2048 Мб', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(42, 'MSI', 'GP62M 7RD(Leopard)-663RU, черный', 'msi-leo-gp62m-7rd', 0, 0, 65090, '15.6\"', '1920x1080', 'Intel Core i5 7300HQ', '2.5 ГГц (3.5 ГГц, в режиме Turbo)', '8192 Мб, DDR4', 'HDD: 1000 Гб', 'nVidia GeForce GTX 1050 - 2048 Мб', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(43, 'MSI', 'GE62 6QE(Apache Pro)-462RU, черный', 'msi-ge62-6qe', 1, 0, 68290, '15.6\"', '1920x1080', 'Intel Core i5 6300HQ', '2.3 ГГц (3.2 ГГц, в режиме Turbo)', '16384 Мб, DDR4', 'HDD: 1000 Гб', 'nVidia GeForce GTX 965M - 2048 Мб', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(44, 'LENOVO', 'IdeaPad 100s-14IBR, серебристый', 'lenovo-100s-14ibr', 0, 0, 13390, '14\"', '1366x768', 'Intel Celeron N3060', '1.6 ГГц (2.48 ГГц, в режиме Turbo)', '2048 Мб, DDR3L, 1600 МГц', 'SSD: 32 Гб', 'Intel HD Graphics 400', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(45, 'LENOVO', 'B5030, черный', 'lenovo-b5030', 0, 0, 16690, '15.6\"', '1366x768', 'Intel Pentium N3540', '2.16 ГГц (2.66 ГГц, в режиме Turbo)', '2048 Мб, DDR3, 1600 МГц', 'HDD: 250 Гб', 'Intel HD Graphics', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(46, 'LENOVO', 'V110-15IAP, черный', 'lenovo-v110-15iap', 0, 0, 17990, '15.6\"', '1366x768', 'Intel Pentium N4200', '1.1 ГГц (2.5 ГГцб в режиме Turbo)', '4096 Мб, DDR3L, 1600 МГц', 'HDD: 1000 Гб', 'Intel HD Graphics 505', 'WiFi; Bluetooth; HDMI; WEB-камера; Free DOS'),
(47, 'LENOVO', 'IdeaPad 110-15IBR, черный', 'lenovo-110-15ibr', 0, 0, 18390, '15.6\"', '1366x768', 'Intel Pentium N3710', '1.6 ГГц (2.56 ГГц, в режиме Turbo)', '4096 Мб, DDR3L, 1600 МГц', 'HDD: 500 Гб', 'Intel HD Graphics 405', 'DVD-RW; WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(48, 'LENOVO', 'IdeaPad G5045, черный', 'lenovo-g5045', 0, 0, 17790, '15.6\"', '1366x768', 'AMD A4 6210', '1.8 ГГц', '4096 Мб, DDR3L', 'HDD: 500 Гб', 'AMD Radeon R3', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10'),
(50, 'HP', '15-ac101ur, черный', 'hp15-ac101ur', 1, 0, 14150, '15.6\"', '1366x768', 'Intel Celeron N3050', '1.6 ГГц (2.16 ГГц, в режиме turbo)', '2048 Мб, DDR3L, 1600 МГц', 'HDD: 500 Гб', 'Intel HD Graphics', 'WiFi; Bluetooth; HDMI; WEB-камера; Windows 10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`) VALUES
(6, 'Andrey252', 'andrei1998_a@mail.ru', '78d2a39e172ff39776ca1a90fcf56b71', 0),
(7, 'Andrei1998', 'a_ryzhkin93@mail.ru', '78d2a39e172ff39776ca1a90fcf56b71', 0),
(9, 'root', NULL, '78d2a39e172ff39776ca1a90fcf56b71', 1),
(13, 'Andrey252Admin', 'andrei1998ab@gmail.com', 'fabb209b738656635e59cbca5a6f79cd', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

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
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
