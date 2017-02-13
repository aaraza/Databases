############################################################## 
#Capital and country have a one to one relationship.
# One to one relationships are implemented by using the 
# primary key of a table as a foreign key of another table 
# and enforcing that each foreign key is unique.
##############################################################

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