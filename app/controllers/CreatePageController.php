<?php

require_once 'Controller.php';
require_once '../app/models/Admin.php';
require_once '../app/models/Agent.php';
require_once '../app/models/Contact.php';
require_once '../app/models/Hideout.php';
require_once '../app/models/Mission.php';
require_once '../app/models/Specialty.php';
require_once '../app/models/Target.php';

class CreatePageController extends Controller
{
  public function index()
  {
    if(isset($_SESSION['Auth']) && $_SESSION['Auth'] === 'admin') {
      //affichage du formulaire
      if(isset($_GET['table'])) {
        $specialtylist = new Specialty();
        $specialties = $specialtylist->findAll();
        $agentlist = new Agent();
        $agents = $agentlist->findAll();
        $hideoutlist = new Hideout();
        $hideouts = $hideoutlist->findAll();
        $contactlist = new Contact();
        $contacts = $contactlist->findAll();
        $targetlist = new Target();
        $targets = $targetlist->findAll();

        $table = $_GET['table'];
        $itemToCreate = new $table();
        //alimentation de valeurs pour les menus déroulants spécialité d'agent
        if ($itemToCreate->getTable() === 'agents') {
          if($specialties ===[]) {
            echo '<script>alert(\'Vous devez créer au moins une spécialité\')</script>';
          } else {
            $specialtieValues = [];
            foreach ($specialties as $specialty) {
              $specialtieValues[] = ['id' => $specialty['id'], 'name' => $specialty['name']];
            }
            $itemToCreate->setSpecialties($specialtieValues);
          }
        }
 
        //alimentation de valeurs pour les menus déroulants spécialité, agent, planque, contact et cible de la mission
        if ($itemToCreate->getTable() === 'missions') {
          if($specialties ===[]) {
            echo '<script>alert(\'Vous devez créer au moins une spécialité\')</script>';
          } else {
            $specialtyValues = [];
            foreach ($specialties as $specialty) {
                $specialtyValues[] = ['id' => $specialty['id'], 'name' => $specialty['name']];
            }
            $itemToCreate->setSpecialties($specialtyValues);
          }
          if($agents ===[]) {
            echo '<script>alert(\'Vous devez créer au moins un agent\')</script>';
          } else {
            $agentValues = [];
            foreach ($agents as $agent) {
                $agentValues[] = ['id' => $agent['id'], 'name' => $agent['firstname'].' '. $agent['lastname']];
            }
            $itemToCreate->setAgents($agentValues);
          }
          $hideoutValues = [];
          foreach ($hideouts as $hideout) {
            $hideoutValues[] = ['id' => $hideout['id'], 'name' => $hideout['code']];
          }        
          $itemToCreate->setHideouts($hideoutValues);
          if($contacts ===[]) {
            echo '<script>alert(\'Vous devez créer au moins un contact\')</script>';
          } else {
            $contactValues = [];
            foreach ($contacts as $contact) {
                $contactValues[] = ['id' => $contact['id'], 'name' => $contact['firstname'].' '. $contact['lastname']];
            }
            $itemToCreate->setContacts($contactValues);
          }
          if($targets ===[]) {
            echo '<script>alert(\'Vous devez créer au moins une cible\')</script>';
          } else {
            $targetValues = [];
            foreach ($targets as $target) {
                $targetValues[] = ['id' => $target['id'], 'name' => $target['firstname'].' '. $target['lastname']];
            }
            $itemToCreate->setTargets($targetValues);
          }
        }

        $this->twig->display('/createPage/index.html.twig', ['Auth' => $_SESSION['Auth'],'fields' =>$itemToCreate->getFields(), 'object' => get_class($itemToCreate)]);
      } elseif(isset($_POST) && !empty($_POST)) {
        //traitement de la demande
        $table = $_POST['table'];
        $itemToRegister = new $table();
        $datasToHydrate = [];
        foreach($_POST as $key=>$value) {
          if ($key != 'table') {
            $datasToHydrate[$key] = $value; 
          }
        }
        $itemToRegister->hydrate($datasToHydrate);
        $itemToRegister->create($itemToRegister);
        header('Location: ./adminpage');
      } 
   
    } else {
      $this->twig->display('/home/index.html.twig', ['Auth' => $_SESSION['Auth']]);
    }

  }


}