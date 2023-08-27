<?php

require_once 'Controller.php';
require_once '../app/models/Admin.php';

class LoginPageController extends Controller
{
  public function index()
  {
    if(!empty($_POST)) {
      $admin = new Admin();
      $email = $_POST['email'];
      $password = $_POST['password'];

      if($admin->findBy(['email' => $email]) !== []) {

        $adminToVerify = $admin->findBy(['email' => $email]);

        if(password_verify($password, $adminToVerify[0]['password'])) {

          $_SESSION['Auth'] = 'admin';
          $this->twig->display('/home/index.html.twig', ['Auth' => $_SESSION['Auth']]);
        } else {
          echo '<script>alert(\'Mauvais identifiants\')</script>';
          $this->twig->display('/loginPage/index.html.twig', ['Auth' => $_SESSION['Auth']]);
        }
      } else {
        echo '<script>alert(\'Mauvais identifiants\')</script>';
        $this->twig->display('/loginPage/index.html.twig', ['Auth' => $_SESSION['Auth']]);
      }
    } else {
      $this->twig->display('/loginPage/index.html.twig', ['Auth' => $_SESSION['Auth']]);
    }
  }
}


