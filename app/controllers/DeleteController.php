<?php

require_once 'Controller.php';
require_once '../app/models/Admin.php';
require_once '../app/models/Agent.php';
require_once '../app/models/Contact.php';
require_once '../app/models/Hideout.php';
require_once '../app/models/Mission.php';
require_once '../app/models/Specialty.php';
require_once '../app/models/Target.php';
require_once '../app/models/Country.php';
require_once '../app/models/Type.php';
require_once '../app/models/Status.php';

class DeleteController extends Controller
{
  public function index()
  {
    $missionToCheck = new Mission();
    $missionToCheck = $missionToCheck->findAll();
    $agentToCheck = new Agent();
    $agentToCheck = $agentToCheck->findAll();
    $contactToCheck = new Contact();
    $contactToCheck = $contactToCheck->findAll();
    $targetToCheck = new Target();
    $targetToCheck = $targetToCheck->findAll();
    $hideoutToCheck = new Hideout();
    $hideoutToCheck = $hideoutToCheck->findAll();

    if(isset($_SESSION['Auth']) && $_SESSION['Auth'] === 'admin') {
      if(isset($_GET['table']) && isset($_GET['recordId'])) {
        //tests pour déterminer si l'enregistrement à effacer est clé étrangère d'une autre table
        $erasable = true;
        //Spécialité
        if ($_GET['table'] === 'Specialty') {
          foreach($agentToCheck as $agent) {
            if($agent['specialtyId'] === (int)$_GET['recordId']) {
              echo '<script>alert(\'Cette spécialité est utilisée par un agent, vous ne pouvez pas la supprimer\'); window.location =\'./adminpage\';</script>';
              $erasable = false;
            } 
          }
          foreach($missionToCheck as $mission) {
            if($mission['specialtyId'] === (int)$_GET['recordId']) {
              echo '<script>alert(\'Cette spécialité est utilisée par une mission, vous ne pouvez pas la supprimer\'); window.location =\'./adminpage\';</script>';
              $erasable = false;
            }
          }
        }
        //Pays
        if ($_GET['table'] === 'Country') {
          foreach($missionToCheck as $mission) {
            if($mission['countryId'] === (int)$_GET['recordId']) {
              echo '<script>alert(\'Ce pays est utilisé par une mission, vous ne pouvez pas le supprimer\'); window.location =\'./adminpage\';</script>';
              $erasable = false;
            }
          }
          foreach($agentToCheck as $agent) {
            if($agent['countryId'] === (int)$_GET['recordId']) {
              echo '<script>alert(\'Ce pays est utilisé par un agent, vous ne pouvez pas le supprimer\'); window.location =\'./adminpage\';</script>';
              $erasable = false;
            }
          }
          foreach($contactToCheck as $contact) {
            if($contact['countryId'] === (int)$_GET['recordId']) {
              echo '<script>alert(\'Ce pays est utilisé par un contact, vous ne pouvez pas le supprimer\'); window.location =\'./adminpage\';</script>';
              $erasable = false;
            }
          }
          foreach($targetToCheck as $target) {
            if($target['countryId'] === (int)$_GET['recordId']) {
              echo '<script>alert(\'Ce pays est utilisé par une cible, vous ne pouvez pas le supprimer\'); window.location =\'./adminpage\';</script>';
              $erasable = false;
            }
          }
          foreach($hideoutToCheck as $hideout) {
            if($hideout['countryId'] === (int)$_GET['recordId']) {
              echo '<script>alert(\'Ce pays est utilisé par une planque, vous ne pouvez pas le supprimer\'); window.location =\'./adminpage\';</script>';
              $erasable = false;
            }
          }
        }
        //Status, type,contact, cible, agent et planque
        if ($_GET['table'] === 'Status' || $_GET['table'] === 'Type' || $_GET['table'] === 'Agent' || $_GET['table'] === 'Contact' || $_GET['table'] === 'Target' || $_GET['table'] === 'Hideout') {
            foreach($missionToCheck as $mission) {
                if($mission[strtolower($_GET['table']).'Id'] === (int)$_GET['recordId']) {
                    echo '<script>alert(\'Cet enregistrement est utilisée par une mission, vous ne pouvez pas le supprimer\'); window.location =\'./adminpage\';</script>';
                    $erasable = false;
                }
            }
        }
        if($erasable) {
          $table = $_GET['table'];
          $itemToDelete = new $table();
          $itemToDelete->delete($_GET['recordId']);
          header('Location: ./adminpage');
        }
      }
    } else {
        $this->twig->display('/home/index.html.twig', ['Auth' => $_SESSION['Auth']]);
    }
  }
}