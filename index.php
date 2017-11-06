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
  <a class="navbar-brand" href="#">YouTrailers</a>
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
                $id = $_SESSION['id'];
                if($u == 'admin'){
                  echo "<a href='panel.php' class='btn btn-outline-dark'>Painel de Controle</a>";
                }else{
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
          }else{
                echo '<a href="frmLogin.php">Minha conta</a>';
          }
        ?> 
    </span>
  </div>
</nav>

<div class="page-header"><h5 style="padding:20px;">Ultimas atualizações</h5></div>

<div class="col-md-12">
      <?php
          if(isset($_SESSION['mensagem'])){
            $msg = $_SESSION['mensagem'];
            if($msg != ""){
              echo "<h5 style='text-align:center;'> $msg </h5>";    
            }
            $_SESSION['mensagem'] = "";   
          }
      ?>
</div>

    <table class="table">
  <thead>
    <tr>
      <th>Título</th>
      <th>Descrição</th>
      <th>Link</th>
      <th>Curtir </h>
      <th>Likes </h>
    </tr>
  </thead>
  <tbody>

    <?php
    require_once "data/dbTrailer.php";
    require_once "data/dbRank.php";
    $lista = selectLastTrailers();
  
    while($row = $lista->fetch(PDO::FETCH_ASSOC)){
      
        $cod = $row['cod'];
       // echo $cod;
        
        echo "<tr>";
        
        echo "<td>". $row['titulo'] . "</td>";
        echo "<td>". $row['descricao'] . "</td>";
        $link = $row['link'];
        echo "<td> <a href='$link' target='_blank'> Assistir </a></td>";
        
        if(isset($_SESSION['user'])){
          echo "<td> <a href='curtir.php?cod=$cod&user=$id' class='btn btn-outline-primary'> <i class='material-icons'>&#xE8DC;</i> </a></td>";
        }else{
          echo "<td> <button onclick='logar();' class='btn btn-outline-secondary'> <i class='material-icons'>&#xE8DC;</i> </button></td>";
        }

        echo "<td> <span class='btn'>". getLikesTrailer($cod) ."</span> </td>"; 

        echo "</tr>";
    }
  ?>
  </tbody>
</table>


    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jquery/jquery.js"></script>
    <script>
        function logar(){
          var m = "Para curtir é necessário estar logado! \n\n";
          m += "Clique em OK para entrar na sua conta";
          if(confirm(m)){
            window.location.href = 'frmLogin.php';
          }
        }
    </script>                

    </body>
</html>