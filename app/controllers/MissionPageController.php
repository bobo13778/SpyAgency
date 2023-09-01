<?php

require_once 'Controller.php';
require_once '../app/models/Mission.php';
require_once '../app/models/Specialty.php';
require_once '../app/models/Agent.php';

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

    $this->twig->display('/missionpage/index.html.twig', ['mission' => $mission, 'Auth' => $_SESSION['Auth'], 'specialty' => $specialty, 'agent' => $agent, 'hideout' => $hideout, 'contact' => $contact, 'target' => $target]);
  }
}