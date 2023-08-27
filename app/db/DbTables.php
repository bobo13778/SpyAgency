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
  'CREATE TABLE IF NOT EXISTS agents (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(250) NOT NULL,
    lastname VARCHAR(250) NOT NULL,
    dateOfBirth DATE,
    idCode VARCHAR(250) NOT NULL,
    nationality VARCHAR(250) NOT NULL,
    specialtyId INT(10),
    FOREIGN KEY (specialtyId) REFERENCES specialties(id)
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS hideouts (
    code VARCHAR(250) NOT NULL UNIQUE PRIMARY KEY,
    address TEXT NOT NULL,
    country VARCHAR(250) NOT NULL,
    type VARCHAR(250) NOT NULL
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS contacts (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(250) NOT NULL,
    lastname VARCHAR(250) NOT NULL,
    dateOfBirth DATE,
    codeName VARCHAR(250) NOT NULL,
    nationality VARCHAR(250) NOT NULL
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS targets (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(250) NOT NULL,
    lastname VARCHAR(250) NOT NULL,
    dateOfBirth DATE,
    codeName VARCHAR(250) NOT NULL,
    nationality VARCHAR(250) NOT NULL
    );'
);

$pdoTables->prepare($request)->execute();

$request=(
  'CREATE TABLE IF NOT EXISTS missions (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250) NOT NULL,
    description TEXT NOT NULL,
    codeName VARCHAR(250) NOT NULL,
    country VARCHAR(250) NOT NULL,
    type VARCHAR(250) NOT NULL,
    status VARCHAR(250) NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    requiredSpecialty VARCHAR(250) NOT NULL,
    agentId INT(10) NOT NULL,
    hideoutCode VARCHAR(250),
    contactId INT(10) NOT NULL,
    targetId INT(10) NOT NULL,
    FOREIGN KEY (agentId) REFERENCES agents(id),
    FOREIGN KEY (hideoutCode) REFERENCES hideouts(code),
    FOREIGN KEY (contactId) REFERENCES contacts(id),
    FOREIGN KEY (targetId) REFERENCES targets(id)
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