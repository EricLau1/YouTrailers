<?php
  session_start();
  if(isset($_SESSION['user'])){
    header("location: minhaConta.php");
  }
?>

<!DOCTYPE html>
<html lang="pt=br">
    <head>
        <title>Area de login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="container">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">YouTrailers</a>
  
    <span class="navbar-text">
      <a href="index.php">Home</a>
    </span>
  </div>
</nav>

<div class="page-header">
    <h3 style="padding:20px;text-align:center;">Efetue seu login</h3>

       <?php
            if(isset($_SESSION['mensagem'])){
                echo "<h6 style='text-align:center;'>". $_SESSION['mensagem'] ."</h6>";
                 session_destroy();
            }
                    
       ?>
</div>

<form method="POST" action="minhaConta.php">
    
  <div class="form-group row">
    <label for="nome" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nome" placeholder="Informe o username ou o email..."
      name="nome" maxlength="50" minlength="4" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="senha" class="col-sm-2 col-form-label">Senha</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe a senha..."
      maxlength="32" minlength="5" required>
    </div>
  </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <center>
              <input type="submit" class="btn btn-outline-dark" value="Entrar">
              <a href="frmCadUsuario.php">Ainda não possui uma conta?</a>
            </center>
        </div>
    </div>
  </div>
</form>

  <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jquery/jquery.js"></script>
    
    </body>
</html>