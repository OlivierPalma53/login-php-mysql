<?php
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once 'classes/Usuario.php';

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    Usuario::logar($login, $senha);


  }

?>
