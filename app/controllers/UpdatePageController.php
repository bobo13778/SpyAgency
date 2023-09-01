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

class UpdatePageController extends Controller
{
  public function index()
  {
    if(isset($_SESSION['Auth']) && $_SESSION['Auth'] === 'admin') {
      //affichage du formulaire
      if(isset($_GET['table']) && isset($_GET['recordId'])) {
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
        $itemToModify = new $table();
        $curentValues = new $table();
        $curentValues = $curentValues->find($_GET['recordId']);
        //alimentation de valeurs pour les menus déroulants spécialités
        if ($itemToModify->getTable() === 'agents' || $itemToModify->getTable() === 'missions') {
          if($specialties ===[]) {
            echo '<script>alert(\'Vous devez créer au moins une spécialité\')</script>';
          } else {
            $specialtiesValues = [];
            foreach ($specialties as $specialty) {
              $specialtiesValues[] = ['id' => $specialty['id'], 'name' => $specialty['name']];
            }
            $itemToModify->setSpecialties($specialtiesValues);
          }
        }

        //alimentation de valeurs pour les menus déroulants pays
        if ($itemToModify->getTable() === 'agents' || $itemToModify->getTable() === 'contacts' || $itemToModify->getTable() === 'targets' || $itemToModify->getTable() === 'hideouts'|| $itemToModify->getTable() === 'missions') {
          if($countries ===[]) {
            echo '<script>alert(\'Vous devez créer au moins un pays\')</script>';
          } else {
            $countriesValues = [];
            foreach ($countries as $country) {
              $countriesValues[] = ['id' => $country['id'], 'name' => $country['name']];
            }
            $itemToModify->setCountries($countriesValues);
          }
        }
 
        //alimentation de valeurs pour les menus déroulants type, status, planque, agent, contact et cible 
        if ($itemToModify->getTable() === 'missions') {
          if($types ===[]) {
            echo '<script>alert(\'Vous devez créer au moins un type\')</script>';
          } else {
            $typeValues = [];
            foreach ($types as $type) {
                $typeValues[] = ['id' => $type['id'], 'name' => $type['name']];
            }
            $itemToModify->setTypes($typeValues);
          }

          if($statusList ===[]) {
            echo '<script>alert(\'Vous devez créer au moins un status\')</script>';
          } else {
            $statusValues = [];
            foreach ($statusList as $status) {
                $statusValues[] = ['id' => $status['id'], 'name' => $status['name']];
            }
            $itemToModify->setStatusList($statusValues);
          }
          if($agents ===[]) {
            echo '<script>alert(\'Vous devez créer au moins un agent\')</script>';
          } else {
            $agentValues = [];
            foreach ($agents as $agent) {
                $agentValues[] = ['id' => $agent['id'], 'name' => $agent['firstname'].' '. $agent['lastname']];
            }
            $itemToModify->setAgents($agentValues);
          }

          $hideoutValues = [];
          foreach ($hideouts as $hideout) {
            $hideoutValues[] = ['id' => $hideout['id'], 'name' => $hideout['code']];
          }        
          $itemToModify->setHideouts($hideoutValues);

          if($contacts ===[]) {
            echo '<script>alert(\'Vous devez créer au moins un contact\')</script>';
          } else {
            $contactValues = [];
            foreach ($contacts as $contact) {
                $contactValues[] = ['id' => $contact['id'], 'name' => $contact['firstname'].' '. $contact['lastname']];
            }
            $itemToModify->setContacts($contactValues);
          }

          if($targets ===[]) {
            echo '<script>alert(\'Vous devez créer au moins une cible\')</script>';
          } else {
            $targetValues = [];
            foreach ($targets as $target) {
                $targetValues[] = ['id' => $target['id'], 'name' => $target['firstname'].' '. $target['lastname']];
            }
            $itemToModify->setTargets($targetValues);
          }
        }


        $this->twig->display('/updatePage/index.html.twig', ['Auth' => $_SESSION['Auth'], 'itemToModifyId' => $_GET['recordId'], 'curentValues' => $curentValues, 'fields' =>$itemToModify->getFields(), 'object' => get_class($itemToModify)]);
      } elseif(isset($_POST) && !empty($_POST)) {
        //traitement de la demande
        $table = $_POST['table'];
        $itemToModifyId = $_POST['itemToModifyId'];
        $itemToRegister = new $table();
        $datasToHydrate = [];
        foreach($_POST as $key=>$value) {
          if ($key != 'table' && $key != 'itemToModifyId') {
            $datasToHydrate[$key] = $value; 
          }
        }
        $itemToRegister->hydrate($datasToHydrate);
        $itemToRegister->update($itemToModifyId, $itemToRegister);
        header('Location: ./adminpage');
      } 
   
    } else {
      $this->twig->display('/home/index.html.twig', ['Auth' => $_SESSION['Auth']]);
    }

  }


}