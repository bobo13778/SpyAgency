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

class AdminPageController extends Controller
{
  public function index()
  {
    if(isset($_SESSION['Auth']) && $_SESSION['Auth'] === 'admin') {
      $admins = new Admin();
      $admins = $admins->findAll();
      $agents = new Agent();
      $agents = $agents->findAll();
      $contacts = new Contact();
      $contacts = $contacts->findAll();
      $hideouts = new Hideout();
      $hideouts = $hideouts->findAll();
      $missions = new Mission();
      $missions = $missions->findAll();
      $specialties = new Specialty();
      $specialties = $specialties->findAll();
      $targets = new Target();
      $targets = $targets->findAll();
      $countries = new Country();
      $countries = $countries->findAll();
      $types = new Type();
      $types = $types->findAll();
      $statusList = new Status();
      $statusList = $statusList->findAll();
      $this->twig->display('/adminPage/index.html.twig', [
        'Auth' => $_SESSION['Auth'], 
        'admins' => $admins, 
        'agents' => $agents, 
        'contacts' => $contacts, 
        'hideouts' => $hideouts, 
        'missions' => $missions, 
        'specialties' => $specialties, 
        'targets' => $targets,
        'countries' => $countries,
        'types' => $types,
        'statusList' => $statusList
      ]);
    } else {
      $this->twig->display('/home/index.html.twig', ['Auth' => $_SESSION['Auth']]);
    }

  }


}