<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once 'classes/Usuario.php';
    require_once 'classes/Email.php';

     $nome = $_POST['nome'];
     $email = $_POST['email'];
     $login = $_POST['login'];
     $senha = $_POST['senha'];


    $user = new Usuario($nome, $email, $login, $senha);

    $user->gravarUsuario();

  } else {
    header("Location: index.php");
  }

?>
