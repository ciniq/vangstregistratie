-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2015 at 01:59 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vangstenregistratie`
--

-- --------------------------------------------------------

--
-- Table structure for table `catch`
--

CREATE TABLE IF NOT EXISTS `catch` (
  `id` int(11) NOT NULL,
  `refto_fishsession_id` int(11) NOT NULL,
  `refto_size_id` int(11) NOT NULL,
  `refto_species_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catch`
--

INSERT INTO `catch` (`id`, `refto_fishsession_id`, `refto_size_id`, `refto_species_id`, `amount`) VALUES
(1, 1, 5, 5, 0),
(2, 1, 1, 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE IF NOT EXISTS `community` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `displayname` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `name`, `displayname`) VALUES
(1, '881-Epen', 'HSV Sint Petrus - Epen'),
(2, '874-Mechelen', 'HSV de Forel - Mechelen'),
(3, '885-Gulpen', 'HSV de Springende Forel - Gulpen'),
(4, '980-Gulp', 'HSV de Gouden Forel - Gulpen'),
(5, '990-SB-Nijswiller', 'HSV Saibling - Nijswiller'),
(6, '875-SB-Wahlwiller', 'HSV de Eerste Beekforel - Wahlwiller'),
(7, '883-Wijlre', 'HSV de Springende Beekforel - Wijlre'),
(8, '886-SchinopGeul', 'HSV Sint Petrus - Schin op Geul'),
(9, '855-Valkenburg', 'HSV de Geulforel - Valkenburg'),
(10, '930-Houthem', 'HSV Sint Gerlach - Houthem'),
(11, '873-BergenTerblijt', 'HSV het Geuldal - Berg en Terblijt'),
(12, '860-Meerssen', 'HSV Geduld Overwint - Meerssen'),
(13, '852-Bunde', 'HSV Ons Genoegen - Bunde');

-- --------------------------------------------------------

--
-- Table structure for table `fishsession`
--

CREATE TABLE IF NOT EXISTS `fishsession` (
  `id` int(11) NOT NULL,
  `refto_user_id` int(11) NOT NULL,
  `refto_community_id` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `stop` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fishsession`
--

INSERT INTO `fishsession` (`id`, `refto_user_id`, `refto_community_id`, `start`, `stop`, `date`) VALUES
(1, 2, 7, 7, 17, '2015-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) NOT NULL,
  `size` varchar(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(1, '0 - 5'),
(2, '5 - 10'),
(3, '10 - 15'),
(4, '15 - 25'),
(5, '25 - 30'),
(6, '30 - 35'),
(7, '35 - 40'),
(8, '40 - 45'),
(9, '45 - 50'),
(10, '50 - 55'),
(11, '55 - 60'),
(12, '60 - 65'),
(13, '65 - 70'),
(14, '70 - 75'),
(15, '75 - 80'),
(16, '85 - 90'),
(17, '90 - 95'),
(18, '95 - 100'),
(19, '100+');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE IF NOT EXISTS `species` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `name`) VALUES
(1, 'alver'),
(2, 'baars'),
(3, 'barbeel'),
(4, 'beekdonderpad'),
(5, 'beekforel'),
(6, 'blankvoorn'),
(7, 'brasem'),
(8, 'elrits'),
(9, 'gestippelde alver'),
(10, 'giebel'),
(11, 'goudvis'),
(12, 'karper'),
(13, 'kolblei'),
(14, 'kopvoorn'),
(15, 'marmergrondel'),
(16, 'paling'),
(17, 'regenboogforel'),
(18, 'rietvoorn'),
(19, 'riviergrondel'),
(20, 'roofblei'),
(21, 'serpeling'),
(22, 'sneep'),
(23, 'snoekbaars'),
(24, 'snoek'),
(25, 'vetje'),
(26, 'vlagzalm'),
(27, 'winde'),
(28, 'zalm'),
(29, 'zeeforel'),
(30, 'zeelt'),
(31, 'zonnebaars');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `password` varchar(125) NOT NULL,
  `vispasnr` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `refto_community_id` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `password`, `vispasnr`, `email`, `refto_community_id`, `active`, `isadmin`) VALUES
(1, 'pim', 'Pim', 'Kusters', 'test', NULL, 'pim.kusters@gmail.com', 0, 0, 0),
(2, 'aaa', 'aaa', 'aaa', '$1$3r11z.OE$5Fql.l0hGPu99c60fH03b/', 0, '1', 0, 1, 0),
(3, 'tests', 'test', '12345', '$2y$10$SdPJlZZSelalKI7U56krFOLTjhFqXX4QiPTE2yfgZ5dohJeDGFAQC', 0, '1', 0, 0, 0),
(4, 'matt', 'matt', 'worley', '$2y$10$WSUSdi6ycW2Pm3Eiqj5by.76WYkqwT0uyzbFZbd/y2RAZcnIk8ZQC', 12345, '1', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catch`
--
ALTER TABLE `catch`
  ADD PRIMARY KEY (`id`), ADD KEY `sizeIndex` (`refto_size_id`), ADD KEY `SpeciesIndex` (`refto_species_id`), ADD KEY `fishsessionIndex` (`refto_fishsession_id`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishsession`
--
ALTER TABLE `fishsession`
  ADD PRIMARY KEY (`id`), ADD KEY `dateIndex` (`date`), ADD KEY `userIndex` (`refto_user_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catch`
--
ALTER TABLE `catch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `fishsession`
--
ALTER TABLE `fishsession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
