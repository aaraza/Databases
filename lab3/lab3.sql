DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes`(
    `name` varchar(255),
    `department` varchar(255),
    `course_id` varchar(255),
    `start` time,
    `end` time,
    `days` varchar(255),
    PRIMARY KEY(`course_id`)
);
