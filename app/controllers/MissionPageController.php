<?php

require_once 'Controller.php';
require_once '../app/models/Mission.php';

class MissionPageController extends Controller
{
  public function index()
  {
    $missions = new Mission();
    $mission = $missions->find($_GET['id']);

    $this->twig->display('/missionpage/index.html.twig', ['mission' => $mission, 'Auth' => $_SESSION['Auth']]);
  }
}