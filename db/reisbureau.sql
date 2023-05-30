-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 mei 2023 om 11:00
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reisbureau`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boekingen`
--

CREATE TABLE `boekingen` (
  `gebruiker_id` int(255) NOT NULL,
  `hotel-kamer_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `continent`
--

CREATE TABLE `continent` (
  `id` int(255) NOT NULL,
  `naam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `continent`
--

INSERT INTO `continent` (`id`, `naam`) VALUES
(1, 'Afrika'),
(2, 'Antarctica'),
(3, 'Azië'),
(4, 'Australië'),
(5, 'Europa'),
(6, 'Noord-Amerika'),
(7, 'Zuid-Amerika');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hotel-kamers`
--

CREATE TABLE `hotel-kamers` (
  `id` int(255) NOT NULL,
  `hotel_id` int(30) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `min-personen` int(15) NOT NULL,
  `max-personen` int(15) NOT NULL,
  `bedden` int(15) NOT NULL,
  `prijs` float NOT NULL,
  `beschikbaar` varchar(15) NOT NULL DEFAULT 'niet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hotels`
--

CREATE TABLE `hotels` (
  `id` int(255) NOT NULL,
  `hotel` varchar(30) NOT NULL,
  `stad_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `hotels`
--

INSERT INTO `hotels` (`id`, `hotel`, `stad_id`) VALUES
(1, 'Waldorf Astoria', 1),
(2, 'Pulitzer Hotel', 1),
(3, 'The Dylan', 1),
(4, 'Andaz', 1),
(5, 'Kimpton De Witt', 1),
(6, 'W Hotel', 1),
(7, 'Amstel Hotel', 1),
(8, 'Sofitel Legend', 1),
(9, 'Conservatorium Hotel', 1),
(10, 'De L’Europe', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `landen`
--

CREATE TABLE `landen` (
  `id` int(255) NOT NULL,
  `land` varchar(30) NOT NULL,
  `continent_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `landen`
--

INSERT INTO `landen` (`id`, `land`, `continent_id`) VALUES
(1, 'Albanië', 5),
(2, 'Andorra', 5),
(3, 'Armenië', 5),
(4, 'Azerbeidzjan', 5),
(5, 'België', 5),
(6, 'Bulgarije', 5),
(7, 'Cyprus', 5),
(8, 'Denemarken', 5),
(9, 'Duitsland', 5),
(10, 'Estland', 5),
(11, 'Finland', 5),
(12, 'Frankrijk', 5),
(13, 'Georgië', 5),
(14, 'Griekenland', 5),
(15, 'Hongarije', 5),
(16, 'Ierland', 5),
(17, 'IJsland', 5),
(18, 'Italië', 5),
(19, 'Kazachstan', 5),
(20, 'Kosovo', 5),
(21, 'Kroatië', 5),
(22, 'Letland', 5),
(23, 'Liechtenstein', 5),
(24, 'Litouwen', 5),
(25, 'Luxemburg', 5),
(26, 'Malta', 5),
(27, 'Moldavië', 5),
(28, 'Monaco', 5),
(29, 'Montenegro', 5),
(30, 'Nederland', 5),
(31, 'Noord-Macedonië', 5),
(32, 'Noorwegen', 5),
(33, 'Oekraïne', 5),
(34, 'Oostenrijk', 5),
(35, 'Polen', 5),
(36, 'Portugal', 5),
(37, 'Roemenië', 5),
(38, 'Rusland', 5),
(39, 'San Marino', 5),
(40, 'Servië', 5),
(42, 'Slovenië', 5),
(43, 'Slowakije', 5),
(44, 'Spanje', 5),
(45, 'Tsjechië', 5),
(46, 'Turkije', 5),
(47, 'Vaticaanstad', 5),
(48, 'Verenigd Koninkrijk', 5),
(49, 'Wit-Rusland', 5),
(50, 'Zweden', 5),
(51, 'Zwitserland', 5),
(52, 'Algerije', 1),
(53, 'Angola', 1),
(54, 'Benin', 1),
(55, 'Botswana', 1),
(56, 'Burkina Faso', 1),
(57, 'Burundi', 1),
(58, 'Centraal-Afrikaanse Republiek', 1),
(59, 'Comoren', 1),
(60, 'Congo', 1),
(61, 'Djibouti', 1),
(62, 'Egypte', 1),
(63, 'Equatoriaal-Guinea', 1),
(64, 'Eritrea', 1),
(65, 'Eswatini', 1),
(66, 'Ethiopië', 1),
(67, 'Gabon', 1),
(68, 'Gambia', 1),
(69, 'Ghana', 1),
(70, 'Guinee', 1),
(71, 'Guinee-Bissau', 1),
(72, 'Ivoorkust', 1),
(73, 'Kaapverdië', 1),
(74, 'Kameroen', 1),
(75, 'Kenia', 1),
(76, 'Lesotho', 1),
(77, 'Liberia', 1),
(78, 'Libië', 1),
(79, 'Madagaskar', 1),
(80, 'Malawi', 1),
(81, 'Mali', 1),
(82, 'Mauritanië', 1),
(83, 'Mauritius', 1),
(84, 'Marokko', 1),
(85, 'Mozambique', 1),
(86, 'Namibië', 1),
(87, 'Niger', 1),
(88, 'Nigeria', 1),
(89, 'Oeganda', 1),
(90, 'Rwanda', 1),
(91, 'Sao Tomé en Principe', 1),
(92, 'Senegal', 1),
(93, 'Seychellen', 1),
(94, 'Sierra Leone', 1),
(95, 'Somalië', 1),
(96, 'Soedan', 1),
(97, 'Tanzania', 1),
(98, 'Togo', 1),
(99, 'Tsjaad', 1),
(100, 'Tunesië', 1),
(101, 'Westelijke Sahara', 1),
(102, 'Zambia', 1),
(103, 'Zimbabwe', 1),
(104, 'Afghanistan', 3),
(105, 'Bahrain', 3),
(106, 'Bangladesh', 3),
(107, 'Bhutan', 3),
(108, 'Brunei', 3),
(109, 'Cambodja', 3),
(110, 'China', 3),
(111, 'Cyprus', 3),
(112, 'Filipijnen', 3),
(113, 'India', 3),
(114, 'Indonesië', 3),
(115, 'Irak', 3),
(116, 'Iran', 3),
(117, 'Israël', 3),
(118, 'Japan', 3),
(119, 'Jemen', 3),
(120, 'Jordanië', 3),
(121, 'Kazachstan', 3),
(122, 'Koeweit', 3),
(123, 'Kyrgyzstan', 3),
(124, 'Laos', 3),
(125, 'Libanon', 3),
(126, 'Maldiven', 3),
(127, 'Maleisië', 3),
(128, 'Mongolië', 3),
(129, 'Myanmar', 3),
(130, 'Nepal', 3),
(131, 'Noord-Korea', 3),
(132, 'Oezbekistan', 3),
(133, 'Oman', 3),
(134, 'Oost-Timor', 3),
(135, 'Pakistan', 3),
(136, 'Palestina', 3),
(137, 'Qatar', 3),
(138, 'Saudi-Arabië', 3),
(139, 'Singapore', 3),
(140, 'Sri Lanka', 3),
(141, 'Syrië', 3),
(142, 'Tadzjikistan', 3),
(143, 'Taiwan', 3),
(144, 'Thailand', 3),
(145, 'Turkmenistan', 3),
(146, 'VAE', 3),
(147, 'Vietnam', 3),
(148, 'Zuid-Korea', 3),
(149, 'Australië', 4),
(150, 'Nieuw-Zeeland', 4),
(151, 'Papoea-Nieuw-Guinea', 4),
(152, 'Fiji', 4),
(153, 'Salomonseilanden', 4),
(154, 'Micronesië', 4),
(155, 'Vanuatu', 4),
(156, 'Samoa', 4),
(157, 'Kiribati', 4),
(158, 'Marshalleilanden', 4),
(159, 'Tuvalu', 4),
(160, 'Nauru', 4),
(161, 'Palau', 4),
(162, 'Tonga', 4),
(163, 'Verenigde Staten', 6),
(164, 'Canada', 6),
(165, 'Mexico', 6),
(166, 'Guatemala', 6),
(167, 'Belize', 6),
(168, 'Honduras', 6),
(169, 'El Salvador', 6),
(170, 'Costa Rica', 6),
(171, 'Nicaragua', 6),
(172, 'Panama', 6),
(173, 'Bahama', 6),
(174, 'Cuba', 6),
(175, 'Haïti', 6),
(176, 'Dominicaanse Republiek', 6),
(177, 'Jamaica', 6),
(178, 'Trinidad en Tobago', 6),
(179, 'Barbados', 6),
(180, 'Saint Kitts en Nevis', 6),
(181, 'Saint Lucia', 6),
(182, 'Saint Vincent en de Grenadines', 6),
(183, 'Antigua en Barbuda', 6),
(184, 'Grenada', 6),
(185, 'Dominica', 6),
(186, 'Brazilië', 7),
(187, 'Argentinië', 7),
(188, 'Colombia', 7),
(189, 'Venezuela', 7),
(190, 'Peru', 7),
(191, 'Chili', 7),
(192, 'Ecuador', 7),
(193, 'Bolivia', 7),
(194, 'Paraguay', 7),
(195, 'Uruguay', 7),
(196, 'Suriname', 7),
(197, 'Guyana', 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `steden`
--

CREATE TABLE `steden` (
  `id` int(255) NOT NULL,
  `land_id` int(30) NOT NULL,
  `steden` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `steden`
--

INSERT INTO `steden` (`id`, `land_id`, `steden`) VALUES
(1, 30, 'Amsterdam'),
(2, 30, 'Rotterdam'),
(3, 30, 'Den Haag'),
(4, 30, 'Utrecht'),
(5, 30, 'Eindhoven'),
(6, 30, 'Tilburg'),
(7, 30, 'Groningen'),
(8, 30, 'Almere'),
(9, 30, 'Breda'),
(10, 30, 'Nijmegen'),
(11, 30, 'Enschede'),
(12, 30, 'Haarlem'),
(13, 30, 'Arnhem'),
(14, 30, 'Amersfoort'),
(15, 30, 'Zaanstad'),
(16, 30, 'Apeldoorn'),
(17, 30, 'Haarlemmermeer'),
(18, 30, 's-Hertogenbosch'),
(19, 30, 'Zwolle'),
(20, 30, 'Zoetermeer'),
(21, 30, 'Leiden'),
(22, 30, 'Dordrecht'),
(23, 30, 'Maastricht'),
(24, 30, 'Emmen'),
(25, 30, 'Westland'),
(26, 30, 'Venlo'),
(27, 30, 'Delft'),
(28, 30, 'Deventer'),
(29, 30, 'Leeuwarden'),
(30, 30, 'Alkmaar'),
(31, 30, 'Sittard-Geleen'),
(32, 30, 'Helmond'),
(33, 30, 'Heerlen'),
(34, 30, 'Hilversum'),
(35, 30, 'Oss'),
(36, 30, 'Amstelveen'),
(37, 30, 'Súdwest-Fryslân'),
(38, 30, 'Hengelo'),
(39, 30, 'Purmerend'),
(40, 30, 'Roosendaal'),
(41, 30, 'Schiedam'),
(42, 30, 'Lelystad'),
(43, 30, 'Leidschendam-Voorburg'),
(44, 30, 'Almelo'),
(45, 30, 'Spijkenisse'),
(46, 30, 'Hoorn'),
(47, 30, 'Gouda'),
(48, 30, 'Vlaardingen'),
(49, 30, 'Assen'),
(50, 30, 'Bergen op Zoom'),
(51, 30, 'Capelle aan den IJssel'),
(52, 30, 'Katwijk'),
(53, 30, 'Woerden'),
(54, 30, 'Kerkrade'),
(55, 30, 'Steenwijkerland'),
(56, 30, 'Hoogeveen'),
(57, 30, 'Velsen'),
(58, 30, 'Barneveld'),
(59, 30, 'Hardenberg'),
(60, 30, 'Doetinchem'),
(61, 30, 'Roermond'),
(62, 30, 'Heerenveen'),
(63, 30, 'Terneuzen'),
(64, 30, 'Delfzijl'),
(65, 30, 'Zeist'),
(66, 30, 'Medemblik'),
(67, 30, 'Kampen'),
(68, 30, 'Zwijndrecht'),
(69, 30, 'Rijswijk'),
(70, 30, 'Venray'),
(71, 30, 'Oosterhout'),
(72, 30, 'Veenendaal'),
(73, 30, 'Katwijk'),
(74, 30, 'Gooise Meren'),
(75, 30, 'Smallingerland'),
(76, 30, 'Houten'),
(77, 30, 'Krimpenerwaard'),
(78, 30, 'Oss'),
(79, 30, 'Schagen'),
(80, 30, 'Nieuwegein'),
(81, 30, 'Veldhoven'),
(82, 30, 'Hof van Twente'),
(83, 30, 'Beek'),
(84, 30, 'Dronten'),
(85, 30, 'Pijnacker-Nootdorp'),
(86, 30, 'Heerhugowaard'),
(87, 30, 'Weert'),
(88, 30, 'Castricum'),
(89, 30, 'Vlissingen'),
(90, 30, 'Bodegraven-Reeuwijk'),
(91, 30, 'Westerveld'),
(92, 30, 'Scherpenzeel'),
(93, 30, 'Heemskerk'),
(94, 30, 'Bernheze'),
(95, 30, 'Lansingerland'),
(96, 30, 'Teylingen'),
(97, 30, 'Leudal'),
(98, 30, 'Alphen-Chaam'),
(99, 30, 'Maasgouw'),
(100, 30, 'Peel en Maas'),
(101, 30, 'Stichtse Vecht');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `voornaam` varchar(15) NOT NULL,
  `achternaam` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `wachtwoord` varchar(30) NOT NULL,
  `rol` int(255) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `rol`) VALUES
(1, 'Jan', 'Honing', 'J@nHoning.nl', 'jan@aapje', 10);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `hotel-kamers`
--
ALTER TABLE `hotel-kamers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `landen`
--
ALTER TABLE `landen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `steden`
--
ALTER TABLE `steden`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `continent`
--
ALTER TABLE `continent`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `hotel-kamers`
--
ALTER TABLE `hotel-kamers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `landen`
--
ALTER TABLE `landen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT voor een tabel `steden`
--
ALTER TABLE `steden`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
