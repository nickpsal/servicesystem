SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `service_system_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `service_system_db`;

CREATE TABLE IF NOT EXISTS `branch` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `clients` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Telephone` int NOT NULL,
  `Mobile` int NOT NULL,
  `ContactPerson` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `VAT` int NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `devices` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Type` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `SN` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Date` datetime NOT NULL,
  `ClientID` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ClientID` (`ClientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `notifications` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Description` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Date` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `BranchID` int NOT NULL,
  `isReaded` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `BranchID` (`BranchID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `tickets` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `clientID` int NOT NULL,
  `Issue` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Description` varchar(1500) COLLATE utf8mb4_general_ci NOT NULL,
  `DateOppened` datetime NOT NULL,
  `DateClosed` datetime NOT NULL,
  `BranchID` int NOT NULL,
  `UserOpened` int NOT NULL,
  `UserResolved` int DEFAULT NULL,
  `History` varchar(1500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `clientID` (`clientID`),
  KEY `UserOpened` (`UserOpened`),
  KEY `BranchID` (`BranchID`),
  KEY `UserResolved` (`UserResolved`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `FullName` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Image` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `user_branch` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `BranchId` int NOT NULL,
  `UserId` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `BranchId` (`BranchId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `devices`
  ADD CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`clientID`) REFERENCES `clients` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`UserOpened`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`UserResolved`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `user_branch`
  ADD CONSTRAINT `user_branch_ibfk_1` FOREIGN KEY (`BranchId`) REFERENCES `branch` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_branch_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;