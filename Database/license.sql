-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 01:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `license`
--

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `license_type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date_activation` date NOT NULL,
  `date_expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `licenses`
--

INSERT INTO `licenses` (`license_type`, `description`, `date_activation`, `date_expiry`) VALUES
('add', 'saaaoo', '2020-02-03', '2030-02-02'),
('Adobe Acrobat Reader', 'Let all your employees view, sign, comment on, and share PDFs for free.\r\nAcrobat Reader is available for distribution beyond single-user installation and can be quickly deployed in your organization with a volume license.', '2020-02-21', '2023-06-22'),
('AutoCAD', 'AutoCAD is computer-aided design (CAD) software that is used for precise 2D and 3D drafting, design, and modeling with solids, surfaces, mesh objects, documentation features, and more. It includes features to automate tasks and increase productivity such as comparing drawings, counting, adding objects, and creating tables. It also comes with seven industry-specific toolsets for electrical design, plant design, architecture layout drawings, mechanical design, 3D mapping, adding scanned images, and converting raster images. AutoCAD enables users to create, edit, and annotate drawings via desktop, web, and mobile devices.', '2021-04-12', '2022-05-12'),
('bast', 'jjnuhn', '2020-02-02', '2024-03-02'),
('butter bread', 'NDNNSDK', '2020-02-02', '2023-10-24'),
('Fortigate', 'FortiGate firewalls leverage machine learning-based threat intelligence from FortiGuard Labs and feature deep analytics through FortiAnalyzer. They can also be integrated with FortiSandbox to automatically generate local threat intelligence to secure against new zero-day and advanced threats.', '2007-03-30', '2025-05-30'),
('hbjhkjni', 'kmkmklm;m', '2021-03-04', '2034-02-02'),
('ioiijijij', 'jihihnoi', '2020-02-02', '2023-02-02'),
('jhniahnhadnhuj', 'kjndfkjfnkjsn', '2020-01-01', '2023-01-02'),
('kikjoijino ', 'mkn kknklmlmn', '2026-01-02', '2030-02-02'),
('kkuuuuuuu', 'httthrrt', '2020-02-22', '2200-02-02'),
('Microsoft 365', 'Microsoft 365 is the productivity cloud designed to help each of us achieve what matters, in our work and life, with best-in-class Office apps, intelligent cloud services, and advanced security.', '2012-02-08', '2026-05-16'),
('minimum', 'ddc77484844jnjnik', '2021-03-02', '2023-03-02'),
('qwwe', 'oooooooo', '2020-02-22', '2023-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(9, 'Emmanuel', 'marfulmanuel@yahoo.com', '$2y$10$Rc4LqRca1Qvz5cfv97CG8.AVDro8uVdp9IxbzC2qyEEOfOlHSbheu'),
(11, 'David Tekpor', 'tm4real10@gmail.com', '$2y$10$EG36eGd1z4MxTDyV7CbMU.5I.F4yRv/hmJuxXRGo.JJJfa8nxRthK'),
(12, 'Rhodalyn Bonsrah', 'bonsrahrhodalyn@gmail.com', '$2y$10$rS0Gp/kv0YudCsvsEUoAPOxOagbgYS3zYSZfgxePpM6XvE8wk92mG'),
(13, 'Arthur King', 'Arthur@yahoo.com', '$2y$10$.DGTnlgUN8MfuzMz4F/wV..7Uzyv86ctPDzj9Rno29qFq42ZObXLu'),
(14, 'Malik', 'malik@yahoo.com', '$2y$10$64Pvir80gCLzZP1E0t7DyOy0vcT16qQL0wpbF/P3J5vJh6G1WusZC'),
(15, 'James Foster', 'jamesf@gmail.com', '$2y$10$t7zCC0WyOAUGC/jwzOJaK.ZEX0gUCWEn8slhk4XNJPGEL9uSxg4oG'),
(19, 'Jon Jones', 'Jon@gmail.com', '$2y$10$hTc3mOoDxaN5rt9PGbwYu.7QgHgg3Kcfj2jdTNP5q8gxnPd06rJnu'),
(20, 'Addo-Ekremet Michelle-Lily', 'akuaadobea02@gmail.com', '$2y$10$QVnbK2GvfZhOcHS.5O8Hk.T4gu2F6RpMv8V0c0mhiln/bblWu4UFq'),
(21, 'Vin Diesel', 'vin@gmail.com', '$2y$10$ITKP7MVKpqVVl7izVV0tl.cRXuSuhPzwBE.LAfgRyH7r5Bnky7yKi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`license_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
