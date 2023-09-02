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
        $countries = new Country();
        $countries = $countries->findAll();
        $types = new Type();
        $types = $types->findAll();
        $statusList = new Status();
        $statusList = $statusList->findAll();

        $table = $_GET['table'];
        $itemToCreate = new $table();
        //alimentation de valeurs pour les menus déroulants spécialités
        if ($itemToCreate->getTable() === 'agents' || $itemToCreate->getTable() === 'missions') {
          if($specialties ===[]) {
            echo '<script>alert(\'Vous devez créer au moins une spécialité\')</script>';
          } else {
            $specialtiesValues = [];
            foreach ($specialties as $specialty) {
              $specialtiesValues[] = ['id' => $specialty['id'], 'name' => $specialty['name']];
            }
            $itemToCreate->setSpecialties($specialtiesValues);
          }
        }

        //alimentation de valeurs pour les menus déroulants pays
        if ($itemToCreate->getTable() === 'agents' || $itemToCreate->getTable() === 'contacts' || $itemToCreate->getTable() === 'targets' || $itemToCreate->getTable() === 'hideouts'|| $itemToCreate->getTable() === 'missions') {
          if($countries ===[]) {
            echo '<script>alert(\'Vous devez créer au moins un pays\')</script>';
          } else {
            $countriesValues = [];
            foreach ($countries as $country) {
              $countriesValues[] = ['id' => $country['id'], 'name' => $country['name']];
            }
            $itemToCreate->setCountries($countriesValues);
          }
        }
 
        //alimentation de valeurs pour les menus déroulants type, status, planque, agent, contact et cible 
        if ($itemToCreate->getTable() === 'missions') {
          if($types ===[]) {
            echo '<script>alert(\'Vous devez créer au moins un type\')</script>';
          } else {
            $typeValues = [];
            foreach ($types as $type) {
                $typeValues[] = ['id' => $type['id'], 'name' => $type['name']];
            }
            $itemToCreate->setTypes($typeValues);
          }

          if($statusList ===[]) {
            echo '<script>alert(\'Vous devez créer au moins un status\')</script>';
          } else {
            $statusValues = [];
            foreach ($statusList as $status) {
                $statusValues[] = ['id' => $status['id'], 'name' => $status['name']];
            }
            $itemToCreate->setStatusList($statusValues);
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

        //test métiers
        $testCheck = true;
        if($_POST['table'] === 'Mission') {
          $targetToTest = new Target();
          $targetToTest = $targetToTest->find($_POST['targetId']);
          $agentToTest = new Agent();
          $agentToTest = $agentToTest->find($_POST['agentId']);
          $contactToTest = new Contact();
          $contactToTest = $contactToTest->find($_POST['contactId']);

          if($targetToTest['countryId'] === $agentToTest['countryId']) {
            echo 'L\'agent ne peut pas être de la même nationalité que la cible </br>';
            $testCheck = false;
          }

          if($contactToTest['countryId'] !== (int)$_POST['countryId']) {
            echo 'Le contact doit être de la même nationalité que le pays de la mission </br>';
            $testCheck = false;
          }

          if($agentToTest['specialtyId'] !== (int)$_POST['specialtyId']) {
            echo 'L\'agent doit disposer de la spécialité requise pour la mission </br>';
            $testCheck = false;
          }

          if(isset($_POST['hideoutId']) && $_POST['hideoutId'] !== null) {
            $hideoutToTest = new Hideout();
            $hideoutToTest = $hideoutToTest->find($_POST['hideoutId']);

            if($hideoutToTest['countryId'] !== (int)$_POST['countryId']) {
              echo 'La planque doit être dans le même pays que la mission </br>';
              $testCheck = false;
            }
          }
          
        }
        
        //traitement de la demande
        if ($testCheck) {
          $table = $_POST['table'];
          $itemToRegister = new $table();
          $datasToHydrate = [];
          foreach($_POST as $key=>$value) {
            if ($key != 'table') {
              $datasToHydrate[$key] = $value; 
            }
          }
          $itemToRegister->hydrate($datasToHydrate);
          var_dump($itemToRegister);
          $itemToRegister->create($itemToRegister);
          header('Location: ./adminpage');
        } 
      } 
   
    } else {
      $this->twig->display('/home/index.html.twig', ['Auth' => $_SESSION['Auth']]);
    }

  }


}