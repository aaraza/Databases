DROP TABLE IF EXISTS `capital`;
CREATE TABLE `capital`(
	id int AUTO_INCREMENT,
	`name` varchar(255),
	PRIMARY KEY(id)
);


DROP TABLE IF EXISTS `country`;
CREATE TABLE `country`(
	`name` varchar(255),
	`capital_city` int,
	PRIMARY KEY(`name`),
	UNIQUE(`capital_city`),
	FOREIGN KEY (`capital_city`) REFERENCES capital(`id`)
);