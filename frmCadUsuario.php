<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro de Usuário</title>
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
    <h3 style="padding:20px;text-align:center;">Cadastro</h3>

       <?php
            session_start();
            if(isset($_SESSION['mensagem'])){
                echo "<h5 style='text-align:center; padding:20px 0;'>". $_SESSION['mensagem'] ."</h5>";
            }
            session_destroy();
       ?>
</div>

<form method="POST" action="cadastro.php">
    
  <div class="form-group row">
    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nome" placeholder="Crie um username"
      name="nome" maxlength="15" minlength="4" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="informe seu email..."
      required name="email" maxlength="50" minlength="10">
    </div>
  </div>

  <div class="form-group row">
    <label for="senha" class="col-sm-2 col-form-label">Senha</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Cria uma senha..."
      maxlength="32" minlength="5" required>
    </div>
  </div>

    <div class="form-group row">
    <label for="rsenha" class="col-sm-2 col-form-label">Confirme a senha</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="rsenha" placeholder="Confirme a senha"
      onblur="confirmarSenha();">
    </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <center>
            <input type="submit" class="btn btn-outline-dark" value="Cadastrar">
            </center>
        </div>
    </div>
  </div>
</form>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jquery/jquery.js"></script> 

    <script>
        function confirmarSenha(){
            var s1 = document.getElementById("senha").value;
            var s2 = document.getElementById("rsenha").value;
            if(s1 != s2){
                document.getElementById("rsenha").value = "";
                alert("Senhas diferentes!!!");
            }
        }    
    </script>
    </body>

</html>