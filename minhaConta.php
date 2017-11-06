<?php

    session_start();
    if(isset($_SESSION['user'])){
        $nome = $_SESSION['user'];
        $id = $_SESSION['id'];

        echo "Bem vindo! @$nome ID: $id";
        echo "<a href='index.php'> home </a> <br><br>";
        echo "<a href='logout.php'>deslogar</a>";
        
    }else{
        
        require_once "data/dbUsuario.php";

        $nome = addslashes(trim($_POST['nome']));
        $senha = addslashes(trim($_POST['senha']));

        $rs = conectarUsuario($nome, $senha);

        if($rs != null){
            $row = $rs->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $row['nome'];
            $_SESSION['id'] = $row['id'];
            $nome = $_SESSION['user'];
            $id = $_SESSION['id'];
            header("location:index.php");
        }else{
            $_SESSION['mensagem'] = "usuario não encontrado!";
            header("location: frmLogin.php");
        }
    }

?>