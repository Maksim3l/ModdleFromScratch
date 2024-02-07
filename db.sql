-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 20. sep 2022 ob 10.33
-- Različica strežnika: 10.4.24-MariaDB
-- Različica PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `db`
--

-- --------------------------------------------------------

--
-- Struktura tabele `accounts`
--

CREATE TABLE `accounts` (
  `AccountId` int(128) NOT NULL,
  `AccountName` text NOT NULL,
  `AccountSurname` text NOT NULL,
  `AccountClass` varchar(64) NOT NULL,
  `AccountEmail` text NOT NULL,
  `AccountUsername` text NOT NULL,
  `AccountPwd` text NOT NULL,
  `AccountPerms` text NOT NULL DEFAULT 'Student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `accounts`
--

INSERT INTO `accounts` (`AccountId`, `AccountName`, `AccountSurname`, `AccountClass`, `AccountEmail`, `AccountUsername`, `AccountPwd`, `AccountPerms`) VALUES
(1, 'Maksim', 'Loknar', '', 'loknarmaksim@gmail.com', 'Maksim3l', '$2y$10$/qGyJguZriF8KuEOHa1lN.8jDz.n7fBHdLK4HKWv9LnuiktTaAvq2', 'Student'),
(2, 'A', 'A', '', 'Billy21@gmail.com', 'A', '$2y$10$R4nnt/UCABXjNPuh/DfD5enYjOTY.YJwqtQGoUDWIvoDDznDDQVlu', 'Student');

-- --------------------------------------------------------

--
-- Struktura tabele `chat`
--

CREATE TABLE `chat` (
  `ID` int(64) NOT NULL,
  `Text` varchar(200) NOT NULL,
  `Poster` varchar(24) NOT NULL,
  `Poster_ID` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `chat`
--

INSERT INTO `chat` (`ID`, `Text`, `Poster`, `Poster_ID`) VALUES
(5, 'NARUTO', 'A', 2),
(6, 'SASUKE', 'A', 2),
(7, 'BORUTO', 'A', 2),
(8, 'SARADA', 'A', 2),
(9, 'MAKSIM LIKES ZACK', 'A', 2),
(10, 'YUGI-OHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH', 'A', 2);

-- --------------------------------------------------------

--
-- Struktura tabele `class`
--

CREATE TABLE `class` (
  `Class_Id` int(11) NOT NULL,
  `Class_Name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabele `class-subjects`
--

CREATE TABLE `class-subjects` (
  `ClassSubject_Id` int(64) NOT NULL,
  `Class_Id` int(64) NOT NULL,
  `Subject_Id` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabele `subjects`
--

CREATE TABLE `subjects` (
  `Subjects_Id` int(11) NOT NULL,
  `SubjectName` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabele `teachers`
--

CREATE TABLE `teachers` (
  `Teacher_Id` int(11) NOT NULL,
  `Class_Id` int(64) DEFAULT NULL,
  `Subject_Id` int(64) NOT NULL,
  `Account_Id` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AccountId`);

--
-- Indeksi tabele `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksi tabele `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class_Id`);

--
-- Indeksi tabele `class-subjects`
--
ALTER TABLE `class-subjects`
  ADD PRIMARY KEY (`ClassSubject_Id`);

--
-- Indeksi tabele `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Subjects_Id`);

--
-- Indeksi tabele `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`Teacher_Id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AccountId` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT tabele `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT tabele `class`
--
ALTER TABLE `class`
  MODIFY `Class_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `class-subjects`
--
ALTER TABLE `class-subjects`
  MODIFY `ClassSubject_Id` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `subjects`
--
ALTER TABLE `subjects`
  MODIFY `Subjects_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `teachers`
--
ALTER TABLE `teachers`
  MODIFY `Teacher_Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
