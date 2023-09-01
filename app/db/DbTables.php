<?php

$pdoTables = new PDO('mysql:host=localhost; dbname=spyAgencyDb', 'root', '');

$request=(
  'CREATE TABLE IF NOT EXISTS specialties (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS countries (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS status (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS types (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS agents (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(250) NOT NULL,
    lastname VARCHAR(250) NOT NULL,
    dateOfBirth DATE NOT NULL,
    idCode VARCHAR(250) NOT NULL,
    countryId INT(10) NOT NULL,
    specialtyId INT(10),
    FOREIGN KEY (specialtyId) REFERENCES specialties(id),
    FOREIGN KEY (countryId) REFERENCES countries(id)
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS hideouts (
    id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(250) NOT NULL UNIQUE,
    address TEXT NOT NULL NOT NULL,
    countryId INT(10) NOT NULL,
    type VARCHAR(250) NOT NULL,
    FOREIGN KEY (countryId) REFERENCES countries(id)
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS contacts (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(250) NOT NULL,
    lastname VARCHAR(250) NOT NULL,
    dateOfBirth DATE NOT NULL,
    codeName VARCHAR(250) NOT NULL,
    countryId INT(10) NOT NULL,
    FOREIGN KEY (countryId) REFERENCES countries(id)
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS targets (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(250) NOT NULL,
    lastname VARCHAR(250) NOT NULL,
    dateOfBirth DATE NOT NULL,
    codeName VARCHAR(250) NOT NULL,
    countryId INT(10) NOT NULL,
    FOREIGN KEY (countryId) REFERENCES countries(id)
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS missions (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250) NOT NULL,
    description TEXT NOT NULL,
    codeName VARCHAR(250) NOT NULL,
    countryId INT(10) NOT NULL,
    typeId INT(10) NOT NULL,
    statusId INT(10) NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    specialtyId INT(10) NOT NULL,
    agentId INT(10) NOT NULL,
    hideoutId INT(10),
    contactId INT(10) NOT NULL,
    targetId INT(10) NOT NULL,
    FOREIGN KEY (agentId) REFERENCES agents(id),
    FOREIGN KEY (hideoutId) REFERENCES hideouts(id),
    FOREIGN KEY (contactId) REFERENCES contacts(id),
    FOREIGN KEY (targetId) REFERENCES targets(id),
    FOREIGN KEY (specialtyId) REFERENCES specialties(id),
    FOREIGN KEY (countryId) REFERENCES countries(id),
    FOREIGN KEY (statusId) REFERENCES status(id),
    FOREIGN KEY (typeId) REFERENCES types(id)
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS admin (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(250) NOT NULL,
    lastname VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    creationDate DATE NOT NULL
    );'
);

$pdoTables->prepare($request)->execute();
