<?php

$pdoFill = new PDO('mysql:host=localhost; dbname=spyAgencyDb', 'root', '');

$request=$pdoFill->prepare('INSERT INTO ADMIN (firstname, lastname, email, password, creationDate) VALUES (:firstname, :lastname, :email, :password, :creationDate)');
$request->bindValue(':firstname', 'jean');
$request->bindValue(':lastname', 'dupond');
$request->bindValue(':email', 'jean.dupond@test.com');
$request->bindValue(':password', password_hash('123456', PASSWORD_BCRYPT));
$request->bindValue('creationDate', date("Y-m-d"));
$request->execute();

$request=$pdoFill->prepare('INSERT INTO ADMIN (firstname, lastname, email, password, creationDate) VALUES (:firstname, :lastname, :email, :password, :creationDate)');
$request->bindValue(':firstname', 'lucie');
$request->bindValue(':lastname', 'jane');
$request->bindValue(':email', 'lucie.jane@test.com');
$request->bindValue(':password', password_hash('motdepasse', PASSWORD_BCRYPT));
$request->bindValue('creationDate', date("Y-m-d"));
$request->execute();

$request=$pdoFill->prepare('INSERT INTO ADMIN (firstname, lastname, email, password, creationDate) VALUES (:firstname, :lastname, :email, :password, :creationDate)');
$request->bindValue(':firstname', 'mary');
$request->bindValue(':lastname', 'white');
$request->bindValue(':email', 'mary.white@test.com');
$request->bindValue(':password', password_hash('password', PASSWORD_BCRYPT));
$request->bindValue('creationDate', date("Y-m-d"));
$request->execute();



