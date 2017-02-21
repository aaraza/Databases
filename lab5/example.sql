###################################################################
# @Author Ali Raza
# @Date Feburary 19, 2017
# 
# In this lab, we will insert data into a table.
# We will also query the table using SELECT statements.
###################################################################

DROP TABLE IF EXISTS `person`;
CREATE TABLE `person`(
    firstName varchar(255) NOT NULL,
    lastName varchar(255) NOT NULL,
    age integer,
    PRIMARY KEY(firstName, lastName)
); # Everything upto here should be review. 

###################################################################
# Insert into all columns by first specifying the name of the  
# table. Then use the values keyword. The parmeters for this will
# the data being inserted.
###################################################################
INSERT INTO `person` VALUES ("Ali", "Raza", 21);

##################################################################
# Insert into specific columns by providing the name of the table 
# followed by a parenthsized list of the columns you want to
populate. Then use the values keyword which accepts your input as 
# parameters. The order of the parameters is determined by
# us in the parenthisized list.
###################################################################
INSERT INTO `person` (firstName, lastName) VALUES("Joe", "Gulliums");

##################################################################
# Select queries the database and returns a subset of data based
# on our specification. First we provide the name of the columns
# we want to be displayed. Then we use the FROM keyword followed
# by the name of the table.
##################################################################
SELECT firstName, lastName FROM `person`;

SELECT * FROM `person`; # This is how you display all columns from a table

##################################################################
# We can use functions in SQL. Here I use the concat function to
# join two strings together and add a space between them. Note 
# the AS keyword. This is used to create an alias. Within our
# result set, the column that is returned by this query is
# now called fullName.
##################################################################. 
SELECT CONCAT(firstName, " ", lastName) AS fullName FROM `person`;

##################################################################
# We can provide conditions using the WHERE keyword.
##################################################################
SELECT * FROM `person` WHERE AGE IS NOT NULL;
SELECT * FROM `person` WHERE AGE = 21;

##################################################################
# Update statement
##################################################################
UPDATE person SET age=40 WHERE age is NULL;

##################################################################
# Delete statement
##################################################################
DELETE FROM person WHERE age>30;
