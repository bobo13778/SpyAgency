<?
try{
  $pdo = new PDO('mysql:host=localhost', 'root', '');
  if($pdo->exec('CREATE DATABASE spyAgencyDb IF NOT EXISTS CHAR SET utf8') !== false) {
    echo 'Base de données créée';
  } else {
    echo'Une erreur est survenue dans la création de la base de données';
  }
} catch (PDOException $e) {

}