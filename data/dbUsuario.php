<?php

    require_once "conexao.php";

    function registrarUsuario($nome, $email, $senha){

        $val = validarUsuario($nome, $email);
        
        session_start();
        if($val == ""){
            $senhaMD5 = md5($senha);
            $pdo = getConexao();
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
            $rs = $pdo->prepare($sql);
            $rs->bindValue(1, $nome);
            $rs->bindValue(2, $email);
            $rs->bindValue(3, $senhaMD5);
            $rs->execute();

            
            if($rs->rowCount() > 0){
                $msg = "<strong><i>Usuario</i></strong> registrado com sucesso!";
                $_SESSION['mensagem'] = $msg;
                header("location:frmLogin.php");       
            }else{
                $msg = "<strong><i>Usuario</i></strong> não foi registrado.";
                $_SESSION['mensagem'] = $msg;
                header("location:frmCadUsuario.php");
            }
        }else{
                $_SESSION['mensagem'] = $val;
                header("location:frmCadUsuario.php");
        }
    }

    function validarUsuario($nome, $email){
        $pdo = getConexao();
        $sql = "SELECT nome, email FROM usuario WHERE nome=? OR email=?";
        $rs = $pdo->prepare($sql);
        $rs->bindValue(1, $nome);
        $rs->bindValue(2, $email);
        $rs->execute();
        if($rs->rowCount() > 0){
            return "usuario ja foi cadastrado";
        }
        return "";
    }

    function conectarUsuario($nome, $senha){
        $pdo = getConexao();
        $senhaMD5 = md5($senha);
        $sql = "SELECT * FROM usuario WHERE (nome=? OR email=?) AND (senha=?)";
        $rs = $pdo->prepare($sql);
        $rs->bindValue(1, $nome);
        $rs->bindValue(2, $nome);
        $rs->bindValue(3, $senhaMD5);
        $rs->execute();
    
        if($rs->rowCount() > 0){
            return $rs;
        }
           return null;
    }




?>