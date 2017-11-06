<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>YouTrailers</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
    </head>
    <body class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="panel.php">Painel de Controle</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
            <?php
              session_start();              
              if(isset($_SESSION['user'])){
                $u = $_SESSION['user'];
                if($u == 'admin'){
                  echo "Olá, Seja bem vindo! @".$_SESSION['user'];
                  $cod = $_GET['cod'];
                  if(!isset($cod)){
                      header("location: panel.php");
                  }
                }             
              }
            ?>
        </li>       
    </ul>
    <span class="navbar-text">
      <?php
          if(isset($_SESSION['user'])){
                echo '<a class="btn" href="logout.php">Logout</a>';
          }
        ?> 
    </span>
  </div>
</nav>

 <div class='col-12'>
    <h4 style="padding: 22px 0; text-align:center;"> Cadastro de Trailers</h4>

 </div>

 <form action="editTrailer.php" method="POST">

  <?php
    require_once "data/conexao.php";

    $pdo = getConexao();
    $sql = "SELECT * FROM trailer WHERE cod=?";
    $rs = $pdo->prepare($sql);
    $rs->bindValue(1, $cod);
    $rs->execute();
    if($rs->rowCount() > 0){
        $row = $rs->fetch(PDO::FETCH_ASSOC);
        //var_dump($row);
    }else{
        echo "ERRO!";
    }
  ?>

  <div class="form-group row">
    <label for="cod" class="col-sm-2 col-form-label">Código</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="cod" name="cod" readonly
       required value="<?php echo $row['cod'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="titulo" class="col-sm-2 col-form-label">Título</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="titulo" name="titulo"
      placeholder="Informe o titulo do Trailer" required value="<?php echo $row['titulo'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="desc" class="col-sm-2 col-form-label">Descrição</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="desc" name="desc" placeholder="Escreva uma breve sinopse..."
      value="<?php echo $row['descricao'] ?>">
    </div>
  </div>

    <div class="form-group row">
    <label for="link" class="col-sm-2 col-form-label">Link</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="link" name="link" placeholder="Informe o link de acesso ao video..."
      value="<?php echo $row['link'] ?>">
    </div>
  </div>
  <center>
  <input type="submit" style="cursor:pointer;" class="btn btn-outline-primary" value="Gravar">
  <input type="reset" style="cursor:pointer;" class="btn btn-outline-secondary" value="Clear">
  <a style="cursor:pointer;" class="btn btn-outline-danger" href="panel.php">Voltar</a>
  </center>
</form>
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jquery/jquery.js"></script>                

    </body>
</html>