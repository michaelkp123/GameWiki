-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 05:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `image`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'p1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `f_id` int(255) NOT NULL,
  `user_id` int(22) NOT NULL,
  `game_id` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`f_id`, `user_id`, `game_id`) VALUES
(6, 2, 3),
(10, 4, 1),
(11, 4, 3),
(12, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `title`, `short_description`, `long_description`, `image`, `role`) VALUES
(1, 'Counter-Strike: Global Offensive', 'Counter-Strike: Global Offensive (ofte forkortet CS:GO) er et taktisk online first-person shooter udviklet af Valve Corporation og Hidden Path Entertainment, der tog sig af Counter-Strike: Source efter dets udgivelse. Det er det fjerde spil i Counter-Strike-serien, hvis man ser bort fra Counter-Strike: Online og Counter-Strike: Neo. Counter strike var en modifikation til Half-Life fra 1998.', 'Counter-Strike: Global Offensive (ofte forkortet CS:GO) er et taktisk online first-person shooter udviklet af Valve Corporation og Hidden Path Entertainment, der tog sig af Counter-Strike: Source efter dets udgivelse. Det er det fjerde spil i Counter-Strike-serien, hvis man ser bort fra Counter-Strike: Online og Counter-Strike: Neo. Counter strike var en modifikation til Half-Life fra 1998.\r\n\r\nGlobal Offensive blev udgivet den 21. august 2012 til Microsoft Windows og OS X på Steam, Xbox Live Arcade og en version til det amerikanske PlayStation Network. Spillet indeholder meget klassisk indhold, såsom opdaterede udgaver af gamle baner, såvel som nye baner, karakterer og spilmåder. Platformsuafhængig multiplayer var planlagt imellem Windows, Mac OS og PSN spillere, men blev i sidste ende kun imellem Windows og OS X brugere på grund af forskellige opdateringscykluser på de forskellige platforme.[4] PlayStation 3 udgaven kan spilles på tre måder, enten med DualShock 3 kontrolleren, PlayStation Move eller USB tastatur/mus.)', 'Csgo.jpg', 'User'),
(5, 'Fortnite', 'Fortnite er et samarbejds- og overlevelsescomputerspil udviklet af Epic Games og People Can Fly. Spillet blev udgivet den 25. juli 2017.\r\n', 'Fortnite er et samarbejds- og overlevelsescomputerspil udviklet af Epic Games og People Can Fly. Spillet blev udgivet den 25. juli 2017.\r\n\r\nEn selvstændig version, Fortnite Battle Royale, blev udgivet i september 2017. I det forsøger 100 spillere at blive den eneste, som overlever. Fortnite Battle Royale er det største spil, Epic Games har lavet. Da spillet blev udgivet, fik det over 2 millioner spillere på 2 uger.', 'fornite-banner-1024x512.jpg', 'User'),
(6, 'League of Legends', 'League of Legends (forkortet LoL) er et gratis Multiplayer Online Battle Arena (MOBA) spil, som er udviklet og publiceret af Riot Games til Microsoft Windows og Mac. Det blev annonceret den 7. oktober 2008, og senere udgivet den 27. oktober 2009. LoL var i closed beta fra 10. april indtil 22. oktober 2009, hvorefter det gik til open beta indtil det blev udgivet.', 'League of Legends (forkortet LoL) er et gratis Multiplayer Online Battle Arena (MOBA) spil, som er udviklet og publiceret af Riot Games til Microsoft Windows og Mac. Det blev annonceret den 7. oktober 2008, og senere udgivet den 27. oktober 2009. LoL var i closed beta fra 10. april indtil 22. oktober 2009, hvorefter det gik til open beta indtil det blev udgivet.', 'League_of_Legends_Cover.jpg', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'user',
  `image` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `role`, `image`) VALUES
(5, 'Michael', 'mic@gmail.com', '1234', 'user', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `f_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
