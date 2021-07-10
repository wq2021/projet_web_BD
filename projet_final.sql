-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 30, 2021 at 09:41 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `Info_Entreprises`
--

CREATE TABLE `Info_Entreprises` (
  `nom_entreprise` varchar(40) NOT NULL,
  `secteur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Info_Entreprises`
--

INSERT INTO `Info_Entreprises` (`nom_entreprise`, `secteur`) VALUES
('Alain Ducasse', 'Hôtellerie, Restauration'),
('Amorino', 'Hôtellerie, Restauration'),
('Anonyme', 'Divers'),
('Apple', 'Information, Télécommunication'),
('Auchan', 'Commerce'),
('AXA', 'Banque, Assurance'),
('BNP Paribas', 'Banque, Assurance'),
('Bouygues Constructions', 'BTP (Bâtiment et des Travaux Publics)'),
('Carrefour', 'Commerce'),
('Cojean', 'Hôtellerie, Restauration'),
('Danone', 'Agriculture, Artisanat'),
('Fnac', 'Commerce'),
('Free', 'Information, Télécommunication'),
('Galeries Lafayettes', 'Commerce'),
('Hôpital Montsouris', 'Enseignement, Santé, Action sociale, culturelle, et sportive'),
('La Poste', 'Transport et Logistique'),
('Le Bon Marché', 'Commerce'),
('Musée du Louvre', 'Communication, Art'),
('Musée MAC VAL', 'Communication, Art'),
('Nestle', 'Agriculture, Artisanat'),
('Orange', 'Information, Télécommunication'),
('Peugeot', 'Industrie'),
('Pret à manger', 'Hôtellerie, Restauration'),
('Primal Scream', 'Communication, Art'),
('Renault', 'Industrie'),
('SNCF', 'Transport et Logistique'),
('Sony', 'Industrie'),
('Spotify', 'Industrie'),
('Toyota', 'Industrie'),
('Warner', 'Communication, Art');

-- --------------------------------------------------------

--
-- Table structure for table `Info_Etudiants`
--

CREATE TABLE `Info_Etudiants` (
  `numero_inscription` int(5) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `nom` text NOT NULL,
  `formation` text NOT NULL,
  `annee_obtention` int(4) NOT NULL,
  `ville_actuelle` varchar(30) NOT NULL,
  `entreprise` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Info_Etudiants`
--

INSERT INTO `Info_Etudiants` (`numero_inscription`, `prenom`, `nom`, `formation`, `annee_obtention`, `ville_actuelle`, `entreprise`) VALUES
(10001, 'John', 'Lennon', 'Traduction et Interprétation (TI)', 1960, 'London', 'Orange'),
(10002, 'Stephen', 'Morris', 'Traduction et Interprétation (TI)', 2016, 'Manchester', 'SNCF'),
(10003, 'Rachel', 'Goswell', 'Relations internationales (RI)', 1998, 'London', 'BNP Paribas'),
(10004, 'Stéphane', 'Paut', 'Langues et sociétés', 2001, 'Helsinki', 'Free'),
(10005, 'Albert', 'Camus', 'Relations internationales (RI)', 1940, 'Paris', 'Nestle'),
(10006, 'Jim', 'Morrison', 'Langues, littératures, civilisations étrangères et régionales (LLCER)', 1960, 'Paris', 'Carrefour'),
(10007, 'Jean-Paul', 'Sartre', 'Traitement automatique des langues (TAL)', 1980, 'Paris', 'Apple'),
(10008, 'Ian', 'Brown', 'Relations internationales (RI)', 2004, 'Manchester', 'Toyota'),
(10009, 'John', 'Squire', 'Langues et sociétés', 1996, 'London', 'Musée MAC VAL'),
(10010, 'Wei', 'Dou', 'Langues, littératures, civilisations étrangères et régionales (LLCER)', 1993, 'Pékin', 'Anonyme'),
(10011, 'Robert', 'Bresson', 'Sciences du langage (SDL)', 1999, 'Paris', 'Alain Ducasse'),
(10012, 'Agnès', 'Varda', 'Didactique des langues (DDL)', 1959, 'Bruxelles', 'Cojean'),
(10013, 'François', 'Truffaut', 'Management et Commerce international (MCI)', 1958, 'Tokyo', 'Anonyme'),
(10014, 'George', 'Orwell', 'Traduction et Interprétation (TI)', 1977, 'London', 'Pret à manger'),
(10015, 'Gustave', 'Le Bon', 'Langues et sociétés', 1933, 'Paris', 'Le Bon Marché'),
(10016, 'Joël', 'Dicker', 'Didactique des langues (DDL)', 2010, 'Montréal', 'Auchan'),
(10017, 'Maurice', 'Blanchot', 'Management et Commerce international (MCI)', 1988, 'Paris', 'Galeries Lafayettes'),
(10018, 'Daniel', 'Sloss', 'Relations internationales (RI)', 2017, 'Dublin', 'Sony'),
(10019, 'Paul', 'McCartney', 'Traitement automatique des langues (TAL)', 2010, 'Liverpool', 'Fnac'),
(10020, 'George', 'Harrison', 'Sciences du langage (SDL)', 1968, 'Leeds', 'Danone'),
(10021, 'Ian', 'Curtis', 'Sciences du langage (SDL)', 1977, 'Manchester', 'Peugeot'),
(10022, 'Mac', 'Demarco', 'Langues et sociétés', 2009, 'Vancouver', 'AXA'),
(10023, 'Iggy', 'Pop', 'Traduction et Interprétation (TI)', 1998, 'Berlin', 'BNP Paribas'),
(10024, 'David', 'Bowie', 'Relations internationales (RI)', 1978, 'New York', 'Anonyme'),
(10025, 'Damon', 'Albarn', 'Traitement automatique des langues (TAL)', 1993, 'Bath', 'Hôpital Montsouris'),
(10026, 'Bernard', 'Sumner', 'Traitement automatique des langues (TAL)', 1996, 'London', 'Renault'),
(10027, 'Dave', 'Gahan', 'Management et Commerce international (MCI)', 1988, 'Los Angeles', 'Musée du Louvre'),
(10028, 'Martin', 'Gore', 'Traduction et Interprétation (TI)', 1997, 'San Francisco', 'Bouygues Constructions'),
(10029, 'Alan', 'Wilder', 'Traitement automatique des langues (TAL)', 1980, 'Lyon', 'Amorino'),
(10030, 'Graham', 'Coxon', 'Didactique des langues (DDL)', 2006, 'Seattle', 'La Poste');

-- --------------------------------------------------------

--
-- Table structure for table `Info_Ville`
--

CREATE TABLE `Info_Ville` (
  `ville` varchar(30) NOT NULL,
  `pays` varchar(40) NOT NULL,
  `continent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Info_Ville`
--

INSERT INTO `Info_Ville` (`ville`, `pays`, `continent`) VALUES
('', '', 'Europe'),
('Annecy', 'France', 'Europe'),
('Bath', 'Royaume-Uni', 'Europe'),
('Berlin', 'Allemagne', 'Europe'),
('Bruxelles', 'Belgique', 'Europe'),
('Dublin', 'Irlande', 'Europe'),
('Helsinki', 'Finlande', 'Europe'),
('Le Havre', 'France', 'Europe'),
('Leeds', 'Royaume-Uni', 'Europe'),
('Liverpool', 'Royaume-Uni', 'Europe'),
('London', 'Royaume-Uni', 'Europe'),
('Los Angeles', 'États-Unis', 'Amérique du nord'),
('Lyon', 'France', 'Europe'),
('Manchester', 'Royaume-Uni', 'Europe'),
('Meaux', 'France', 'Europe'),
('Montréal', 'Canada', 'Amérique du nord'),
('Moscou', 'Russie', 'Europe'),
('New York', 'États-Unis', 'Amérique du nord'),
('Paris', 'France', 'Europe'),
('Pékin', 'Chine', 'Asie'),
('Saint-Petersbourg', 'Russie', 'Europe'),
('San Francisco', 'États-Unis', 'Amérique du nord'),
('Seattle', 'États-Unis', 'Amérique du nord'),
('Stockholm', 'Suède', 'Europe'),
('Sydney', 'Australie', 'Océanie'),
('Tampere', 'Finlande', 'Europe'),
('Tokyo', 'Japon', 'Asie'),
('Vancouver', 'Canada', 'Amérique du nord'),
('Vitry-sur-Seine', 'France', 'Europe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Info_Entreprises`
--
ALTER TABLE `Info_Entreprises`
  ADD PRIMARY KEY (`nom_entreprise`),
  ADD UNIQUE KEY `nom_entreprise` (`nom_entreprise`);

--
-- Indexes for table `Info_Etudiants`
--
ALTER TABLE `Info_Etudiants`
  ADD PRIMARY KEY (`numero_inscription`),
  ADD KEY `city` (`ville_actuelle`),
  ADD KEY `company` (`entreprise`);

--
-- Indexes for table `Info_Ville`
--
ALTER TABLE `Info_Ville`
  ADD PRIMARY KEY (`ville`),
  ADD UNIQUE KEY `ville` (`ville`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Info_Etudiants`
--
ALTER TABLE `Info_Etudiants`
  MODIFY `numero_inscription` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99991;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Info_Etudiants`
--
ALTER TABLE `Info_Etudiants`
  ADD CONSTRAINT `company` FOREIGN KEY (`entreprise`) REFERENCES `Info_Entreprises` (`nom_entreprise`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
