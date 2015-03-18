-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2015 at 11:23 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) NOT NULL,
  `size` varchar(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(1, '0 - 5'),
(2, '5 - 10'),
(3, '10 - 15'),
(4, '15 - 20'),
(5, '15 - 25'),
(6, '25 - 30'),
(7, '30 - 35'),
(8, '35 - 40'),
(9, '40 - 45'),
(10, '45 - 50'),
(11, '50 - 55'),
(12, '55 - 60'),
(13, '60 - 65'),
(14, '65 - 70'),
(15, '70 - 75'),
(16, '75 - 80'),
(17, '80 - 85'),
(18, '85 - 90'),
(19, '90 - 95'),
(20, '95 - 100'),
(21, '100+');

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
  `vispasnr` varchar(25) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `refto_community_id` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `password`, `vispasnr`, `email`, `refto_community_id`, `active`, `isadmin`) VALUES
(1, 'p.kusters', 'pim', 'kusters', '%$UBdpmHa.zKw', '1234567890', 'pim.kusters@gmail.com', 7, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `fishsession`
--
ALTER TABLE `fishsession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
