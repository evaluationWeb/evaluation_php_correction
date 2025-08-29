-- database
CREATE DATABASE evalphp2025 CHARSET utf8mb4;
USE evalphp2025;

-- tables
CREATE TABLE users(
id_users INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
firstname VARCHAR(50) NOT NULL,
lastname VARCHAR(50) NOT NULL,
email VARCHAR(50) UNIQUE NOT NULL,
password VARCHAR(100) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE category(
id_category INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
name VARCHAR(50) UNIQUE NOT NULL
)ENGINE = InnoDB;

CREATE TABLE book(
id_book INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
title VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
publication_date DATE NOT NULL,
author VARCHAR(50),
id_users INT,
id_category INT
)ENGINE = InnoDB;

-- constraintes foreign key
ALTER TABLE book
ADD CONSTRAINT fk_possess_users
FOREIGN KEY (id_users)
REFERENCES users(id_users);

ALTER TABLE book
ADD CONSTRAINT fk_completed_category
FOREIGN KEY (id_category)
REFERENCES category(id_category);

-- ajout des categories
INSERT INTO category(name) VALUES ("polar"), ("science fiction"), ("fantastique"), ("biopic");