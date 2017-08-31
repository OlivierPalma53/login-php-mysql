<?php

  class Usuario{
    private $id;
    private $nome;
    private $email;
    private $login;
    private $senha;
    private $codigoVerificador;
    private $ativado;

    public function __construct($nome, $email, $login, $senha){

      $this->setNome($nome);
      $this->setEmail($email);
      $this->setLogin($login);
      $this->setSenha($senha);
      $this->setCodigoVerificador();
      $this->setAtivado(0);

    }

    public function getId(){
      return $this->id;
    }

    public function setId($id){
      $this->id = $id;
    }

    public function getNome(){
      return $this->nome;
    }

    public function setNome($nome){
      $this->nome = $nome;
    }

    public function getEmail(){
      return $this->email;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function getLogin(){
      return $this->login;
    }

    public function setLogin($login){
      $this->login = $login;
    }

    public function getSenha(){
      return $this->senha;
    }

    public function setSenha($senha){
      $this->senha = md5($senha);
    }

    public function getCodigoVerificador(){
      return $this->codigoVerificador;
    }

    public function setCodigoVerificador(){
      $this->codigoVerificador = uniqid(rand());
    }

    public function getAtivado(){
      return $this->ativado;
    }

    public function setAtivado($ativado){
      $this->ativado = $ativado;
    }

    public function gravarUsuario(){

      $conn = new mysqli("localhost", "root", "root", "sis_login");

      if($conn->connect_error){
        echo "<script>alert('erro ao conectar ao banco de dados: $conn->connect_error');</script>";
      }

      $stmt = $conn->prepare("INSERT INTO usuario (nome, email, login, senha, codigo_verificador, ativado)
      values (?,?,?,?,?,?)");

      $stmt->bind_param("sssssi", $this->getNome(), $this->getEmail(), $this->getLogin(),
      $this->getSenha(), $this->getCodigoVerificador(), $this->getAtivado());

      if($stmt->execute()){
        $conn->close();
        $email = new Email();
        $email->enviarEmail($this->getNome(),$this->getEmail(), $this->getCodigoVerificador());

      } else {
        $conn->close();
        echo "<script>alert('erro ao gravar usuario no banco de dados');</script>";

      }

    }

    public static function ativarUsuario($codigo){
        $conn = new mysqli("localhost", "root", "root", "sis_login");

        if($conn->connect_error){
          echo "Erro ao conectar ao banco de dados: ".$conn->connect_error;
        }

        $stmt = $conn->prepare("UPDATE usuario SET ativado = '1' WHERE codigo_verificador = ? ");
        $stmt->bind_param("s", $codigo);
        if($stmt->execute()){
          echo "Usuario ativado com sucesso";
          $conn->close();
        } else {
          echo "erro";
          $conn->close();
        }
    }



    public static function logar($login, $senha){

      $conn = new mysqli("localhost", "root", "root", "sis_login");

      $stmt = $conn->prepare("SELECT * FROM usuario WHERE login = ? AND senha = ?");

      $stmt->bind_param('ss', $login, $senha);

      $stmt->execute();

      $result = $stmt->get_result();

      if($result->num_rows == '1'){

        $usuario = $result->fetch_assoc();
        if($usuario['ativado'] == 1){
          header("Location: dashboard/index.html");
        } else {
          echo 'Usuario não ativado, por favor entre em seu email e clique no link para ativar o seu cadastro';
        }

      } else {
        echo "Login ou senha digitados incorretamente";
      }




    }
  }

?>
