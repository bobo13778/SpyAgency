<?php

require_once 'Controller.php';

class AdminPageController extends Controller
{
  public function index()
  {

    $this->twig->display('/adminPage/index.html.twig', ['Auth' => $_SESSION['Auth']]);

    }


}