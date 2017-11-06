<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Box Trailers</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
    </head>
    <body class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Painel de Controle</a>
  <a class="navbar-brand" href="index.php">Home</a>
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
    <h4 style="padding: 22px 0;">Trailers 
    <a class="btn" href="frmCadTrailer.php"><i class="material-icons">&#xE05C;</i></a>
    </h4>

      <?php
        if(isset($_SESSION['mensagem'])){
            $msg = $_SESSION["mensagem"];
            if($msg != ""){
                echo "<p>";
                echo "<h6 style='text-align:center; padding: 20px 0;'>$msg</h6>";
                echo "</p>";
                $_SESSION["mensagem"] = "";
            }
        }
    ?>
  </p>
 </div>
    <table class="table">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Título</th>
      <th>Descrição</th>
      <th>Link</th>
      <th>Editar</th>
      <th>Deletar</th>
    </tr>
  </thead>
  <tbody>

    <?php
    require_once "data/dbTrailer.php";
    
    $lista = selectLastTrailers();
    while($row = $lista->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        //echo "th scope='row'> </th>";
        echo "<td>". $row['cod'] . "</td>";
        $cod = $row['cod'];
        echo "<td>". $row['titulo'] . "</td>";
        echo "<td>". $row['descricao'] . "</td>";
        $link = $row['link'];
        echo "<td> <a href='$link' target='_blank'> Assistir </a></td>";
        echo "<td> <a class='btn btn-outline-primary' href='frmEditTrailer.php?cod=$cod'> <i class='material-icons'>&#xE869;</i>  </a></td>";
        echo "<td> <a class='btn btn-outline-danger' href='frmDelTrailer.php?cod=$cod'> <i class='material-icons'>&#xE92B;</i> </a></td>";
        echo "</tr>";
    }
  ?>
  </tbody>
</table>

    
    
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jquery/jquery.js"></script>                

    </body>
</html>