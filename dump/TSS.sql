CREATE DATABASE TSS;

USE TSS;

CREATE TABLE `Type`(
	Type_ID INT AUTO_INCREMENT,
    Type VARCHAR(50) NOT NULL,
    PRIMARY KEY(Type_ID)
);

CREATE TABLE `Theater`(
	Theater_ID INT AUTO_INCREMENT,
    PRIMARY KEY(Theater_ID)
);

CREATE TABLE `Show`(
	Show_ID INT AUTO_INCREMENT,
    Start_time TIME NOT NULL,
    End_time TIME NOT NULL,
    Theater1_ID INT NOT NULL,
	Theater2_ID INT NOT NULL,
	Theater3_ID INT NOT NULL,
    PRIMARY KEY(Show_ID),
    FOREIGN KEY(Theater1_ID) REFERENCES `Theater`(Theater_ID),
    FOREIGN KEY(Theater2_ID) REFERENCES `Theater`(Theater_ID),
    FOREIGN KEY(Theater3_ID) REFERENCES `Theater`(Theater_ID)
);

CREATE TABLE `Show_information`(
	Show_ID INT NOT NULL,
    Type_ID INT NOT NULL,
    PRIMARY KEY(Show_ID, Type_ID),
    FOREIGN KEY(Show_ID) REFERENCES `Show`(Show_ID),
    FOREIGN KEY(Type_ID) REFERENCES `Type`(Type_ID)
);

CREATE TABLE `Seat`(
	Seat_ID INT AUTO_INCREMENT,
    Seat_number INT NOT NULL,
    Theater_ID INT NOT NULL,
    PRIMARY KEY(Seat_ID),
    FOREIGN KEY(Theater_ID) REFERENCES `Theater`(Theater_ID)
);

CREATE TABLE `Customer`(
	Customer_ID INT AUTO_INCREMENT,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(128) NOT NULL,
    Firstname VARCHAR(50) NOT NULL,
    Lastname VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Credit_Card_Number CHAR(128) NOT NULL,
    PRIMARY KEY(Customer_ID)
);

CREATE TABLE `Ticket`(
	Ticket_ID INT AUTO_INCREMENT,
    Price INT NOT NULL,
    Theater_ID INT NOT NULL,
    Show_ID INT NOT NULL,
    Seat_ID INT NOT NULL,
    Customer_ID INT NOT NULL,
    PRIMARY KEY(Ticket_ID),
    FOREIGN KEY(Theater_ID) REFERENCES `Theater`(Theater_ID),
    FOREIGN KEY(Show_ID) REFERENCES `Show`(Show_ID),
    FOREIGN KEY(Seat_ID) REFERENCES `Seat`(Seat_ID),
	FOREIGN KEY(Customer_ID) REFERENCES `Customer`(Customer_ID)
);

-- Pre-inserted Data
INSERT INTO `Theater` VALUES(1);
INSERT INTO `Theater` VALUES(2);
INSERT INTO `Theater` VALUES(3);

INSERT INTO `Show` VALUES(1, '09:30', '12:30', 1, 2, 3);
INSERT INTO `Show` VALUES(2, '14:30', '17:30', 1, 2, 3);
INSERT INTO `Show` VALUES(3, '18:30', '21:30', 1, 2, 3);

INSERT INTO `Type` VALUES(1, 'Comedy');
INSERT INTO `Type` VALUES(2, 'Fantasy');
INSERT INTO `Type` VALUES(3, 'Action');
INSERT INTO `Type` VALUES(4, 'Romance');

INSERT INTO `Show_information` VALUES(1, 1);
INSERT INTO `Show_information` VALUES(1, 3);
INSERT INTO `Show_information` VALUES(2, 2);
INSERT INTO `Show_information` VALUES(2, 4);
INSERT INTO `Show_information` VALUES(3, 1);
INSERT INTO `Show_information` VALUES(3, 4);

INSERT INTO `Seat` VALUES(1, 1, 1);
INSERT INTO `Seat` VALUES(2, 2, 1);
INSERT INTO `Seat` VALUES(3, 3, 1);
INSERT INTO `Seat` VALUES(4, 4, 1);
INSERT INTO `Seat` VALUES(5, 5, 1);
INSERT INTO `Seat` VALUES(6, 6, 1);
INSERT INTO `Seat` VALUES(7, 7, 1);
INSERT INTO `Seat` VALUES(8, 8, 1);
INSERT INTO `Seat` VALUES(9, 9, 1);
INSERT INTO `Seat` VALUES(10, 10, 1);
INSERT INTO `Seat` VALUES(11, 11, 1);
INSERT INTO `Seat` VALUES(12, 12, 1);
INSERT INTO `Seat` VALUES(13, 13, 1);
INSERT INTO `Seat` VALUES(14, 14, 1);
INSERT INTO `Seat` VALUES(15, 15, 1);
INSERT INTO `Seat` VALUES(16, 16, 1);
INSERT INTO `Seat` VALUES(17, 17, 1);
INSERT INTO `Seat` VALUES(18, 18, 1);
INSERT INTO `Seat` VALUES(19, 19, 1);
INSERT INTO `Seat` VALUES(20, 20, 1);
INSERT INTO `Seat` VALUES(21, 1, 2);
INSERT INTO `Seat` VALUES(22, 2, 2);
INSERT INTO `Seat` VALUES(23, 3, 2);
INSERT INTO `Seat` VALUES(24, 4, 2);
INSERT INTO `Seat` VALUES(25, 5, 2);
INSERT INTO `Seat` VALUES(26, 6, 2);
INSERT INTO `Seat` VALUES(27, 7, 2);
INSERT INTO `Seat` VALUES(28, 8, 2);
INSERT INTO `Seat` VALUES(29, 9, 2);
INSERT INTO `Seat` VALUES(30, 10, 2);
INSERT INTO `Seat` VALUES(31, 11, 2);
INSERT INTO `Seat` VALUES(32, 12, 2);
INSERT INTO `Seat` VALUES(33, 13, 2);
INSERT INTO `Seat` VALUES(34, 14, 2);
INSERT INTO `Seat` VALUES(35, 15, 2);
INSERT INTO `Seat` VALUES(36, 16, 2);
INSERT INTO `Seat` VALUES(37, 17, 2);
INSERT INTO `Seat` VALUES(38, 18, 2);
INSERT INTO `Seat` VALUES(39, 19, 2);
INSERT INTO `Seat` VALUES(40, 20, 2);
INSERT INTO `Seat` VALUES(41, 1, 3);
INSERT INTO `Seat` VALUES(42, 2, 3);
INSERT INTO `Seat` VALUES(43, 3, 3);
INSERT INTO `Seat` VALUES(44, 4, 3);
INSERT INTO `Seat` VALUES(45, 5, 3);
INSERT INTO `Seat` VALUES(46, 6, 3);
INSERT INTO `Seat` VALUES(47, 7, 3);
INSERT INTO `Seat` VALUES(48, 8, 3);
INSERT INTO `Seat` VALUES(49, 9, 3);
INSERT INTO `Seat` VALUES(50, 10, 3);
INSERT INTO `Seat` VALUES(51, 11, 3);
INSERT INTO `Seat` VALUES(52, 12, 3);
INSERT INTO `Seat` VALUES(53, 13, 3);
INSERT INTO `Seat` VALUES(54, 14, 3);
INSERT INTO `Seat` VALUES(55, 15, 3);
INSERT INTO `Seat` VALUES(56, 16, 3);
INSERT INTO `Seat` VALUES(57, 17, 3);
INSERT INTO `Seat` VALUES(58, 18, 3);
INSERT INTO `Seat` VALUES(59, 19, 3);
INSERT INTO `Seat` VALUES(60, 20, 3);

