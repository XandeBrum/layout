CREATE DATABASE crud;

use crud;

CREATE TABLE people (
    id INT AUTO_INCREMENT NOT NULL,
    name varchar(30) NOT NULL,
    email varchar(30) NOT NULL,
    PRIMARY KEY(id)
);