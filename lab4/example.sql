############################################################## 
# Capital and country have a one to one relationship.
# One to one relationships are implemented by using the 
# primary key of a table as a foreign key of another table 
# and enforcing that each foreign key is unique.
##############################################################

DROP TABLE IF EXISTS `capital`;
CREATE TABLE `capital`(
	`id` int AUTO_INCREMENT,
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

##############################################################
# Mother and child have a one to many relationship.
# In 1-M relationships, the foreign key is placed in the table
# of the entity of which there can be many instances of.
##############################################################

DROP TABLE IF EXISTS `mother`;
CREATE TABLE `mother`(
	`id` int AUTO_INCREMENT,
	`name` varchar(255),
	PRIMARY KEY(id)
);

DROP TABLE IF EXISTS `child`;
CREATE TABLE `child`(
	`name` varchar(255),
	`mother_id` int,
	PRIMARY KEY(`name`),
	FOREIGN KEY (`mother_id`) REFERENCES mother(`id`)
);

##############################################################
# Many to many relationshiops are split into a seperate table
# Here, a relationship between author and book, calls for 
# the creation of a third table to keep track of all authors
# for all books.
##############################################################

DROP TABLE IF EXISTS `author`;
CREATE TABLE `author`(
	`id` int,
	`name` varchar(255),
	PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book`(
	`id` int,
	`name` varchar(255),
	PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `bookAuthor`;
CREATE TABLE `bookAuthor`(
	author_id int,
	book_id int,
	FOREIGN KEY(`author_id`) REFERENCES author(`id`),
	FOREIGN KEY(`book_id`) REFERENCES book(`id`),
	PRIMARY KEY(`author_id`, `book_id`)
);