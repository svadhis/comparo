-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jun 07, 2019 at 02:41 PM
-- Server version: 10.3.13-MariaDB-1:10.3.13+maria~bionic
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comparator`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(10) NOT NULL,
  `idLocation` int(11) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `idTourOperator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `idLocation`, `price`, `description`, `idTourOperator`) VALUES
(2, 1, 740, 'Hôtel 4 étoilesPetit déjeuner inclus5 jours / 4 nuits', 1),
(4, 3, 490, 'odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos', 5),
(5, 5, 529, 'they cannot foresee the pain and trouble that are bound to ensue; and equal ', 5),
(6, 4, 680, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum', 7),
(7, 6, 775, 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis', 7),
(8, 1, 840, 'Si asint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi', 4),
(9, 2, 640, 'necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', 3),
(10, 3, 620, 'Et harum quidem rerum facilis est et expedita distinctio.', 7),
(11, 2, 650, ' sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur', 1),
(12, 2, 630, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.', 7),
(13, 5, 599, 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet', 3),
(14, 6, 890, 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque ', 7),
(15, 4, 670, 'ed quia non numquam eius modi tempora incidunt ut labore', 5),
(16, 2, 640, ' Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse', 5),
(17, 2, 670, 'vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', 1),
(18, 2, 870, 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis ', 4),
(19, 1, 776, 'os qui ratione voluptatem sequi nesciunt. Neque porro quisquam', 5),
(20, 6, 750, 'os qui ratione voluptatem sequi nesciunt. Neque porro quisquam', 4),
(21, 4, 850, ' Nor again is there anyone who loves or pursues or desires to obtain pain of itsel', 5),
(22, 5, 650, 'adipisci velit, sed quia non numquam eius modi tempora incidunt ', 1),
(23, 3, 630, 'adipisci velit, sed quia non numquam eius modi tempora incidunt ', 7),
(24, 3, 650, 'adipisci velit, sed quia non numquam eius modi tempora incidunt ', 3),
(25, 3, 650, 'non numquam eius modi tempora incidunt ', 4),
(26, 4, 768, 'adipisci velit, sed quia non numquam eius modi tempora incidunt ', 1),
(27, 1, 650, 'adipisci velit, sed quia non numquam eius modi tempora incidunt ', 3),
(30, 5, 680, 'Menu maxi best of potatoes coca', 13);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'Corse'),
(2, 'Baléares'),
(3, 'Croatie'),
(4, 'Grèce'),
(5, 'Italie'),
(6, 'Maldives');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `message` varchar(250) NOT NULL,
  `author` varchar(150) NOT NULL,
  `idTourOperator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `message`, `author`, `idTourOperator`) VALUES
(1, 'super club !', 'alex', 1),
(13, 'ah ben ouais mais bon.', 'dédé', 1),
(14, 'J\'AIME TATA !', 'toto', 1),
(15, 'MonAvis', 'MonNom', 1),
(16, 'pas mal.', 'David Goodenough', 3),
(17, 'ouais c\'est pas faux ', 'Perceval', 3),
(18, 'Super merci !!', 'Nico', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tour_operators`
--

CREATE TABLE `tour_operators` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `gradeCount` int(11) NOT NULL DEFAULT 0,
  `grade` float NOT NULL DEFAULT 0,
  `link` varchar(255) NOT NULL,
  `isPremium` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_operators`
--

INSERT INTO `tour_operators` (`id`, `name`, `gradeCount`, `grade`, `link`, `isPremium`) VALUES
(1, 'club med', 10, 5.55, 'https://www.clubmed.fr/', 0),
(3, 'club marmara', 10, 8.93633, 'https://www.tui.fr/hotels-clubs-tui/club-marmara/', 1),
(4, 'framissima', 4, 7.16492, 'https://www.fram.fr/sejour/hotels-framissima/', 1),
(5, 'jet tours', 18, 6.55556, 'https://www.jettours.com/', 0),
(7, 'kappa club', 3, 7.66667, 'https://www.kappaclub.fr', 0),
(13, 'OpieOp', 1, 6, 'http://kappa.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_operator` (`idTourOperator`),
  ADD KEY `id_location` (`idLocation`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tour_operator` (`idTourOperator`);

--
-- Indexes for table `tour_operators`
--
ALTER TABLE `tour_operators`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tour_operators`
--
ALTER TABLE `tour_operators`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_ibfk_1` FOREIGN KEY (`idLocation`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `fk_operator` FOREIGN KEY (`idTourOperator`) REFERENCES `tour_operators` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_tour_operator` FOREIGN KEY (`idTourOperator`) REFERENCES `tour_operators` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
