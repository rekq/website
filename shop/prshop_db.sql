-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Kwi 2022, 17:08
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `prshop_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'T-Shirts'),
(2, 'Shorts');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(63, 345, '34535434', 'Completed', 'USD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`) VALUES
(110, 'T-Shirt Yellow', 1, 25, 120, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat nisl id ex dapibus, id porta massa ultrices. In ut ligula sed mi pharetra consectetur. Sed sagittis lacus non lectus lobortis viverra. Phasellus sit amet augue et metus blandit suscipit vel ac mi. Phasellus sit amet imperdiet nibh. Sed sed consequat leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque magna tellus, pellentesque et neque ut, hendrerit eleifend sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat nisl id ex dapibus, id porta massa ultrices. ', '6.jpg'),
(111, 'T-Shirt Green', 1, 24, 250, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat nisl id ex dapibus, id porta massa ultrices. In ut ligula sed mi pharetra consectetur. Sed sagittis lacus non lectus lobortis viverra. Phasellus sit amet augue et metus blandit suscipit vel ac mi. Phasellus sit amet imperdiet nibh. Sed sed consequat leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque magna tellus, pellentesque et neque ut, hendrerit eleifend sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat nisl id ex dapibus, id porta massa ultrices. ', '1.jpg'),
(112, 'T-Shirt Grey', 1, 26, 150, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat nisl id ex dapibus, id porta massa ultrices. In ut ligula sed mi pharetra consectetur. Sed sagittis lacus non lectus lobortis viverra. Phasellus sit amet augue et metus blandit suscipit vel ac mi. Phasellus sit amet imperdiet nibh. Sed sed consequat leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque magna tellus, pellentesque et neque ut, hendrerit eleifend sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat nisl id ex dapibus, id porta massa ultrices. ', '2.jpg'),
(113, 'Shorts Black', 2, 30, 50, 'Cras eu lacus a metus ornare faucibus. Nulla a tortor tempus, sodales dui a, ultrices purus. In hac habitasse platea dictumst. Vivamus volutpat libero quis malesuada dictum. Nullam quis diam turpis. Cras bibendum ante ac velit tristique, eget sodales diam congue. Etiam dapibus nibh urna, sed gravida dolor condimentum a. Morbi sagittis dictum mi, et dictum nisl malesuada et. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus eleifend fermentum sapien, nec euismod nulla congue eu.', 'Cras eu lacus a metus ornare faucibus. Nulla a tortor tempus, sodales dui a, ultrices purus.', '4.jpg'),
(114, 'Shorts Pink', 2, 31, 60, 'Cras eu lacus a metus ornare faucibus. Nulla a tortor tempus, sodales dui a, ultrices purus. In hac habitasse platea dictumst. Vivamus volutpat libero quis malesuada dictum. Nullam quis diam turpis. Cras bibendum ante ac velit tristique, eget sodales diam congue. Etiam dapibus nibh urna, sed gravida dolor condimentum a. Morbi sagittis dictum mi, et dictum nisl malesuada et. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus eleifend fermentum sapien, nec euismod nulla congue eu.', 'Cras eu lacus a metus ornare faucibus. Nulla a tortor tempus, sodales dui a, ultrices purus.', '5.jpg'),
(115, 'Shorts Yellow', 2, 32, 70, 'Cras eu lacus a metus ornare faucibus. Nulla a tortor tempus, sodales dui a, ultrices purus. In hac habitasse platea dictumst. Vivamus volutpat libero quis malesuada dictum. Nullam quis diam turpis. Cras bibendum ante ac velit tristique, eget sodales diam congue. Etiam dapibus nibh urna, sed gravida dolor condimentum a. Morbi sagittis dictum mi, et dictum nisl malesuada et. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus eleifend fermentum sapien, nec euismod nulla congue eu.', 'Cras eu lacus a metus ornare faucibus. Nulla a tortor tempus, sodales dui a, ultrices purus.', '3.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_price`, `product_title`, `product_quantity`) VALUES
(37, 1, 61, 24.99, 'product 1', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'user1', 'user1@gmail.com', '123'),
(6, 'user2', 'user2@gmail.com', '123'),
(7, 'admin', 'admin@gmail.com', 'admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeksy dla tabeli `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT dla tabeli `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
