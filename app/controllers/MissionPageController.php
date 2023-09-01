<?php

require_once 'Controller.php';
require_once '../app/models/Mission.php';
require_once '../app/models/Specialty.php';
require_once '../app/models/Agent.php';
require_once '../app/models/Country.php';
require_once '../app/models/Type.php';
require_once '../app/models/Status.php';

class MissionPageController extends Controller
{
  public function index()
  {
    $missions = new Mission();
    $mission = $missions->find($_GET['id']);

    $specialties = new Specialty();
    $specialty = $specialties->find($mission['specialtyId']);
    $agents = new Agent();
    $agent = $agents->find($mission['agentId']);
    $hideouts = new Hideout();
    $hideout = $hideouts->find($mission['hideoutId']);
    $contacts = new Contact();
    $contact = $contacts->find($mission['contactId']);
    $targets = new Target();
    $target = $targets->find($mission['targetId']);
    $countries = new Country();
    $country = $countries->find($mission['countryId']);
    $types = new Type();
    $type = $types->find($mission['typeId']);
    $statusList = new Status();
    $status = $statusList->find($mission['statusId']);

    $this->twig->display('/missionpage/index.html.twig', ['mission' => $mission, 'Auth' => $_SESSION['Auth'], 'specialty' => $specialty, 'agent' => $agent, 'hideout' => $hideout, 'contact' => $contact, 'target' => $target, 'country' => $country, 'type' => $type, 'status' => $status]);
  }
}