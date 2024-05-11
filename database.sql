CREATE DATABASE `diyproject`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `diyproject`;

CREATE TABLE `users`(
    `user_id` int(10) unsigned NOT NULL auto_increment,
    `firstname` varchar(45) NOT NULL default '',
    `lastname` varchar(45) NOT NULL default '',
    `email` varchar(50) NOT NULL default '',
    `username` varchar(30) NOT NULL default '',
    `password` varchar(255) NOT NULL default '',
    PRIMARY KEY (`user_id`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `feedback`(
    `feedback_id` int(10) unsigned NOT NULL auto_increment,
    `user` varchar(91) NOT NULL default 'Vendég',
    `message` varchar(2000) NOT NULL default '',
    `date_add` DATETIME NOT NULL default CURRENT_TIMESTAMP(),
    PRIMARY KEY (`feedback_id`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;


INSERT INTO `users`(`user_id`,`firstname`,`lastname`,`email`,`username`, `password`) VALUES
(1, 'admin', 'admin','admin@gmail.com','admin', sha1('admin123'));
