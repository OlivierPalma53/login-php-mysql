<?php

  if(isset($_GET['codigo'])){

    require_once 'classes/Usuario.php';

    $codigo = $_GET['codigo'];

    Usuario::ativarUsuario($codigo);

  } else {
    header("Location: index.php");
  }


?>
