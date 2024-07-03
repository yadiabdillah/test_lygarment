CREATE TABLE `LygDestination` (
	`DestinationId` INT(11) NOT NULL AUTO_INCREMENT,
	`DestinationCode` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`DestinationName` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	PRIMARY KEY (`DestinationId`) USING BTREE
)

CREATE TABLE `LygStyleSize` (
	`IdStyleSize` INT(11) NOT NULL AUTO_INCREMENT,
	`StyleCode` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`StyleSort` INT(3) NOT NULL,
	`SizeName` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	PRIMARY KEY (`IdStyleSize`) USING BTREE
)

CREATE TABLE `LygSewingOutput` (
	`IdSewingOutput` INT(11) NOT NULL AUTO_INCREMENT,
	`TrnDate` DATE NOT NULL,
	`OperatorName` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`StyleCode` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`SizeName` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`DestinationCode` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`QtyOutput` INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`IdSewingOutput`) USING BTREE,
	INDEX `StyleCode` (`StyleCode`) USING BTREE,
	INDEX `SizeName` (`SizeName`) USING BTREE
)