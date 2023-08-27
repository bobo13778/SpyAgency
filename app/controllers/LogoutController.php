<?php

require_once 'Controller.php';

class LogoutController extends Controller
{
  public function index()
  {
    if(isset($_SESSION['Auth'])) {
      $_SESSION['Auth'] = null;
      $this->twig->display('/home/index.html.twig', ['Auth' => $_SESSION['Auth']]);
    }
  }
}
