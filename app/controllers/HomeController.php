<?php

require_once 'Controller.php';
require_once '../app/models/Mission.php';

class HomeController extends Controller
{
  public function index()
  {
    $missions = new Mission();
    $missions = $missions->findAll();

    $this->twig->display('/home/index.html.twig', ['missions' => $missions, 'Auth' => $_SESSION['Auth']]);
  }
}
