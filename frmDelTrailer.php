<?php
    session_start();
    if(isset($_SESSION['user'])){
        $cod = $_GET['cod'];
        //echo "registro: $id";
        require_once "data/conexao.php";

        $pdo = getConexao();
        $sql = "SELECT * FROM trailer WHERE cod=?";
        $rs = $pdo->prepare($sql);
        $rs->bindValue(1, $cod);
        $rs->execute();
        if($rs->rowCount() > 0){
            $row = $rs->fetch(PDO::FETCH_ASSOC);
            //var_dump($row);
        }
    }else{
        die("Area restrita!");
    }
?>

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
              if(isset($_SESSION['user'])){
                $u = $_SESSION['user'];
                if($u == 'admin'){
                  echo "Olá, Seja bem vindo! @".$_SESSION['user'];
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
    <h4 style="padding: 22px 0; text-align:center;"> Exclusão de Trailers</h4>
 </div>

<table class="table">
  <tbody>
    <tr>
      <td><i class="material-icons">&#xE918;</i></td>
      <td><?php echo $row['cod']; ?></td>
    </tr>
    <tr>
      <td><i class="material-icons">&#xE264;</i></td>
      <td><?php echo $row['titulo']; ?></td>
    </tr>
    <tr>
      <td><i class="material-icons">&#xE048;</i></td>
      <td><?php echo $row['descricao']; ?></td>
    </tr>
    <tr>
      <td><i class="material-icons">&#xE157;</i></td>
      <td><?php echo $row['link']; ?></td>
    </tr>
  </tbody>
</table>
    
    <a class="btn btn-outline-danger" href="delTrailer.php?cod=<?php echo $row['cod']; ?>">Excluir</a>
    <a style="cursor:pointer;" class="btn btn-outline-primary" href="panel.php">Voltar</a>
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jquery/jquery.js"></script>                

    </body>
</html>