CREATE DATABASE `diyproject`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `diyproject`;

CREATE TABLE `users`(
    `user_id` int(10) unsigned NOT NULL auto_increment,
    `username` varchar(30) NOT NULL default,
    `password` varchar(30) NOT NULL default,
    PRIMARY KEY (`user_id`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `users`(`user_id`, `username`, `password`) VALUES(
    1, `admin`, `admin`
);
