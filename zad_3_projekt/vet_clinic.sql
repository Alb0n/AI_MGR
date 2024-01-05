-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 05, 2024 at 04:57 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet_clinic`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(45) NOT NULL,
  `pet_age` int(11) NOT NULL,
  `pet_user_id` int(11) NOT NULL,
  `pet_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Tabela zwierząt';

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_name`, `pet_age`, `pet_user_id`, `pet_type_id`) VALUES
(23, 'Amek', 2, 11, 1),
(24, 'Borys', 5, 11, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pet_types`
--

CREATE TABLE `pet_types` (
  `ptype_id` int(11) NOT NULL,
  `ptype_name` varchar(45) NOT NULL,
  `ptype_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Tabela typów zwierząt';

--
-- Dumping data for table `pet_types`
--

INSERT INTO `pet_types` (`ptype_id`, `ptype_name`, `ptype_desc`) VALUES
(1, 'Kot', ''),
(2, 'Pies', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL,
  `role_create_time` datetime(6) NOT NULL,
  `role_remove_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Tabela ról';

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_create_time`, `role_remove_time`) VALUES
(1, 'admin', '2023-12-08 20:09:28.000000', '0000-00-00 00:00:00.000000'),
(2, 'client', '2023-12-08 20:10:08.000000', '0000-00-00 00:00:00.000000'),
(3, 'doctor', '2023-12-08 20:10:25.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_surname` varchar(45) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_address` varchar(45) NOT NULL,
  `user_PESEL` varchar(11) NOT NULL,
  `user_mod_time` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `user_mod_modifier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Tabela użytkowników';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_name`, `user_surname`, `user_email`, `user_address`, `user_PESEL`, `user_mod_time`, `user_mod_modifier_id`) VALUES
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Maciej', 'Pin', 'maciejpin@123.pl', 'Hossa 43', '0ddd00e2380', '2024-01-04 17:02:19.684903', 9),
(10, 'doctor1', 'b3666d14ca079417ba6c2a99f079b2ac', 'Marek', 'Nowak', 'mareknowak@123.pl', 'Nowa 113', 'bfd81ee3ed2', '2024-01-05 16:42:31.277771', 10),
(11, 'client1', '3677b23baa08f74c28aba07f0cb6554e', 'Jan', 'Kowalski', 'jankowalski@123.pl', 'Kory 52', 'a7f9b53b851', '2024-01-05 16:47:06.076906', 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_has_roles`
--

CREATE TABLE `users_has_roles` (
  `ur_user_id` int(11) NOT NULL,
  `ur_role_id` int(11) NOT NULL,
  `ur_set_time` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `ur_take_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Tabela asocjacyjna users-roles';

--
-- Dumping data for table `users_has_roles`
--

INSERT INTO `users_has_roles` (`ur_user_id`, `ur_role_id`, `ur_set_time`, `ur_take_time`) VALUES
(9, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00'),
(10, 3, '2024-01-05 16:43:07.632333', '0000-00-00 00:00:00'),
(11, 2, '2024-01-05 16:47:06.079133', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `visits`
--

CREATE TABLE `visits` (
  `visit_id` int(11) NOT NULL,
  `visit_datetime` datetime NOT NULL,
  `visit_reason` varchar(200) DEFAULT NULL,
  `visit_doctor_id` int(11) NOT NULL,
  `visit_pet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Tabela wizyt';

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`visit_id`, `visit_datetime`, `visit_reason`, `visit_doctor_id`, `visit_pet_id`) VALUES
(25, '2024-02-18 14:15:00', 'Ból łapy', 10, 23),
(26, '2024-03-18 15:30:00', NULL, 10, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `pet_user_id` (`pet_user_id`),
  ADD KEY `pet_type_id` (`pet_type_id`);

--
-- Indeksy dla tabeli `pet_types`
--
ALTER TABLE `pet_types`
  ADD PRIMARY KEY (`ptype_id`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `users_ibfk_1` (`user_mod_modifier_id`);

--
-- Indeksy dla tabeli `users_has_roles`
--
ALTER TABLE `users_has_roles`
  ADD KEY `users_has_roles_ibfk_1` (`ur_role_id`),
  ADD KEY `users_has_roles_ibfk_2` (`ur_user_id`);

--
-- Indeksy dla tabeli `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`visit_id`),
  ADD KEY `visit_doctor_id` (`visit_doctor_id`),
  ADD KEY `visit_pet_id` (`visit_pet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pet_types`
--
ALTER TABLE `pet_types`
  MODIFY `ptype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`pet_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`pet_type_id`) REFERENCES `pet_types` (`ptype_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_mod_modifier_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_has_roles`
--
ALTER TABLE `users_has_roles`
  ADD CONSTRAINT `users_has_roles_ibfk_1` FOREIGN KEY (`ur_role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_has_roles_ibfk_2` FOREIGN KEY (`ur_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`visit_doctor_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `visits_ibfk_2` FOREIGN KEY (`visit_pet_id`) REFERENCES `pets` (`pet_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
