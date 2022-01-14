-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 05:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctis`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_centreofficer`
--

CREATE TABLE `db_centreofficer` (
  `USERNAME` varchar(15) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `OFFICER_IC` varchar(12) NOT NULL,
  `PHONE_NO` varchar(12) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `ADDRESS` text NOT NULL,
  `POSITION` varchar(7) NOT NULL,
  `CENTRE_ID` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_centreofficer`
--

INSERT INTO `db_centreofficer` (`USERNAME`, `PASSWORD`, `NAME`, `OFFICER_IC`, `PHONE_NO`, `EMAIL`, `ADDRESS`, `POSITION`, `CENTRE_ID`) VALUES
('Bradley1957', 'Bradley123', 'Bradley L Kimble', '990310050123', '207-218-3763', 'tester1@gmail.com', '4965  Chipmunk Lane,\r\nPortland Maine,\r\n04101.', 'Tester', 3),
('Yuhain1999', 'Yuhain123', 'Yuhain Sivabalan', '990310066063', '0173540946', 'yuhain1999@gmail.com', 'No.14 Jalan Cahaya 1,\r\nTaman Cahaya Indah,\r\n45600 Bestari Jaya.', 'Manager', 3);

-- --------------------------------------------------------

--
-- Table structure for table `db_covidtest`
--

CREATE TABLE `db_covidtest` (
  `TEST_ID` int(3) NOT NULL,
  `TEST_DATE` date NOT NULL,
  `RESULT` varchar(8) DEFAULT NULL,
  `RESULT_DATE` date DEFAULT NULL,
  `STATUS` varchar(8) NOT NULL,
  `PATIENT_USERNAME` varchar(15) NOT NULL,
  `TESTER_USERNAME` varchar(15) NOT NULL,
  `KIT_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_covidtest`
--

INSERT INTO `db_covidtest` (`TEST_ID`, `TEST_DATE`, `RESULT`, `RESULT_DATE`, `STATUS`, `PATIENT_USERNAME`, `TESTER_USERNAME`, `KIT_ID`) VALUES
(27, '2021-03-05', 'Positive', '2021-03-05', 'Complete', 'Patient1', 'Bradley1957', 8);

-- --------------------------------------------------------

--
-- Table structure for table `db_patient`
--

CREATE TABLE `db_patient` (
  `USERNAME` varchar(15) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `PATIENT_IC` varchar(12) NOT NULL,
  `PHONE_NO` varchar(12) NOT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `ADDRESS` text NOT NULL,
  `PATIENT_TYPE` varchar(13) NOT NULL,
  `SYMPTOMS` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_patient`
--

INSERT INTO `db_patient` (`USERNAME`, `PASSWORD`, `NAME`, `PATIENT_IC`, `PHONE_NO`, `EMAIL`, `ADDRESS`, `PATIENT_TYPE`, `SYMPTOMS`) VALUES
('Patient1', 'Patient123', 'Patient1', '990211052324', '413-245-1958', 'patient1@gmail.com', '21 Jump Street', 'returnee', 'Fever');

-- --------------------------------------------------------

--
-- Table structure for table `db_role`
--

CREATE TABLE `db_role` (
  `USERNAME` varchar(15) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `ROLE` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_role`
--

INSERT INTO `db_role` (`USERNAME`, `PASSWORD`, `ROLE`) VALUES
('Bradley1957', 'Bradley123', 'Tester'),
('Patient1', 'Patient123', 'Patient'),
('Yuhain1999', 'Yuhain123', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `db_testcentre`
--

CREATE TABLE `db_testcentre` (
  `CENTRE_ID` int(3) NOT NULL,
  `CENTRE_NAME` varchar(20) NOT NULL,
  `ADDRESS` text NOT NULL,
  `PHONE_NO` varchar(10) NOT NULL,
  `MANAGER_USERNAME` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_testcentre`
--

INSERT INTO `db_testcentre` (`CENTRE_ID`, `CENTRE_NAME`, `ADDRESS`, `PHONE_NO`, `MANAGER_USERNAME`) VALUES
(3, 'Sunway Medical Centr', ' 5, Jalan Lagoon Selatan, Bandar Sunway, 47500 Petaling Jaya, Selangor', '03-7491 91', 'Yuhain1999');

-- --------------------------------------------------------

--
-- Table structure for table `db_testkit`
--

CREATE TABLE `db_testkit` (
  `KIT_ID` int(3) NOT NULL,
  `TEST_NAME` varchar(20) NOT NULL,
  `AVAILABLE_STOCK` int(4) NOT NULL,
  `CENTRE_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_testkit`
--

INSERT INTO `db_testkit` (`KIT_ID`, `TEST_NAME`, `AVAILABLE_STOCK`, `CENTRE_ID`) VALUES
(8, 'ABC', 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_centreofficer`
--
ALTER TABLE `db_centreofficer`
  ADD PRIMARY KEY (`USERNAME`),
  ADD KEY `db_centreofficer_ibfk_1` (`CENTRE_ID`);

--
-- Indexes for table `db_covidtest`
--
ALTER TABLE `db_covidtest`
  ADD PRIMARY KEY (`TEST_ID`),
  ADD KEY `PATIENT_USERNAME` (`PATIENT_USERNAME`),
  ADD KEY `TESTER_USERNAME` (`TESTER_USERNAME`),
  ADD KEY `KIT_ID` (`KIT_ID`);

--
-- Indexes for table `db_patient`
--
ALTER TABLE `db_patient`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `db_role`
--
ALTER TABLE `db_role`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `db_testcentre`
--
ALTER TABLE `db_testcentre`
  ADD PRIMARY KEY (`CENTRE_ID`),
  ADD KEY `MANAGER_USERNAME` (`MANAGER_USERNAME`);

--
-- Indexes for table `db_testkit`
--
ALTER TABLE `db_testkit`
  ADD PRIMARY KEY (`KIT_ID`),
  ADD KEY `db_testkit_ibfk_1` (`CENTRE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_covidtest`
--
ALTER TABLE `db_covidtest`
  MODIFY `TEST_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `db_testcentre`
--
ALTER TABLE `db_testcentre`
  MODIFY `CENTRE_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_testkit`
--
ALTER TABLE `db_testkit`
  MODIFY `KIT_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_centreofficer`
--
ALTER TABLE `db_centreofficer`
  ADD CONSTRAINT `db_centreofficer_ibfk_1` FOREIGN KEY (`CENTRE_ID`) REFERENCES `db_testcentre` (`CENTRE_ID`);

--
-- Constraints for table `db_covidtest`
--
ALTER TABLE `db_covidtest`
  ADD CONSTRAINT `db_covidtest_ibfk_2` FOREIGN KEY (`PATIENT_USERNAME`) REFERENCES `db_patient` (`USERNAME`),
  ADD CONSTRAINT `db_covidtest_ibfk_3` FOREIGN KEY (`TESTER_USERNAME`) REFERENCES `db_centreofficer` (`USERNAME`),
  ADD CONSTRAINT `db_covidtest_ibfk_4` FOREIGN KEY (`KIT_ID`) REFERENCES `db_testkit` (`KIT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_testcentre`
--
ALTER TABLE `db_testcentre`
  ADD CONSTRAINT `db_testcentre_ibfk_1` FOREIGN KEY (`MANAGER_USERNAME`) REFERENCES `db_centreofficer` (`USERNAME`);

--
-- Constraints for table `db_testkit`
--
ALTER TABLE `db_testkit`
  ADD CONSTRAINT `db_testkit_ibfk_1` FOREIGN KEY (`CENTRE_ID`) REFERENCES `db_testcentre` (`CENTRE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
