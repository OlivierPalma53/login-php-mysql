<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css" type="text/css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="page-header">
          <h1>Sistema de Login</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="jumbotron">
            <h2>Cadastrar</h2>
            <form action="cadastrar.php" method="post">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" />
              </div>
              <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" />
              </div>
              <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" />
              </div>
              <input type="submit" value="Cadastrar" class="btn btn-primary btn-block"/>
            </form>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="jumbotron">
            <h2>Entrar</h2>
            <form action="login.php" method="post">
              <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" />
              </div>
              <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" />
              </div>
              <input type="submit" value="Entrar" class="btn btn-primary btn-block"/>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="lib/bootstrap/js/bootstrap.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
