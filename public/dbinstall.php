<?php
//création de la base de données
$pdo = new PDO('mysql:host=localhost', 'root', '');
  $request ='DROP DATABASE IF EXISTS spyAgnecyDb';
  $pdo->prepare($request)->execute();
  $request = 'CREATE DATABASE IF NOT EXISTS spyAgencyDb CHARACTER SET utf8;';
  if($pdo->prepare($request)->execute() !== false) {
    echo 'Base de données créée';
  } else {
    echo'Une erreur est survenue dans la création de la base de données';
  };

//création des tables
require_once '../app/db/DbTables.php';
//création des admnistrateurs
require_once '../app/db/DbFill.php';
