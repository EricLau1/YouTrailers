<?php

require_once "conexao.php";

function selectLastTrailers(){
    $pdo = getConexao();
    $sql = "SELECT * FROM trailer ORDER BY cod DESC LIMIT 25";
    $rs = $pdo->query($sql);
    return $rs;
}

function registrarTrailer($ti, $de, $li){
    $val = validarTrailer($li);
    session_start();
    if($val == ""){
            
        $pdo = getConexao();
        $sql = "INSERT INTO trailer (titulo, descricao, link) VALUES (?, ?, ?)";
        $rs = $pdo->prepare($sql);
        $rs->bindValue(1, $ti);
        $rs->bindValue(2, $de);
        $rs->bindValue(3, $li);
        $rs->execute();

        
        if($rs->rowCount() > 0){
            $_SESSION['mensagem'] = "Novo <strong><i>trailer</i></strong> registrado com sucesso!";
        }else{
            $_SESSION['mensagem'] = "O Trailer <strong><i>não</i></strong> foi registrado...";
        }
        
    }else{
        $_SESSION['mensagem'] = $val;
    }
    header("location: panel.php");
}

function validarTrailer($li){
    $pdo = getConexao();
    $sql = "SELECT * FROM trailer WHERE link=?";
    $rs = $pdo->prepare($sql);
    $rs->bindValue(1, $li);
    $rs->execute();
    if($rs->rowCount() > 0){
        $row = $rs->fetch(PDO::FETCH_ASSOC);
        return "Este Trailer já foi registrado, <strong>CÓDIGO: ". $row['cod']. "</strong>";
    }
    return "";
}

function deletarTrailer($cod){
    $pdo = getConexao();
    $sql = "DELETE FROM trailer WHERE cod=?";
    $rs = $pdo->prepare($sql);
    $rs->bindValue(1, $cod);
    $rs->execute();
    session_start();
    if($rs->rowCount() > 0){
        $_SESSION['mensagem'] = "O <strong><i>Trailer</i></strong> foi excluido";
    }else{
        $_SESSION['mensagem'] = "O Trailer <strong><i>não</i></strong> foi excluido";
    }
     header("location: panel.php");
}

function updateTrailer($co, $ti, $de, $li){

    $v = validarTrailerUpdate($li, $co);
    
    session_start();
    if($v == ""){
        $pdo = getConexao();
        $sql = "UPDATE trailer set titulo=?, descricao=?, link=? WHERE cod=?";
        $rs = $pdo->prepare($sql);
        $rs->bindValue(1, $ti);
        $rs->bindValue(2, $de);
        $rs->bindValue(3, $li);
        $rs->bindValue(4, $co);
        $rs->execute();
    
        if($rs->rowCount() > 0){
            $_SESSION['mensagem'] = "O <strong><i>Trailer</i></strong> foi atualizado!";
        }else{
            $_SESSION['mensagem'] = "O Trailer <strong><i>não</i></strong> foi atualizado...";
        }
    }else{
        $_SESSION['mensagem'] = $v;
    }
     header("location: panel.php");
}

function validarTrailerUpdate($li, $cod){
    $pdo = getConexao();
    $sql = "SELECT * FROM trailer WHERE link=? AND cod!=?";
    $rs = $pdo->prepare($sql);
    $rs->bindValue(1, $li);
    $rs->bindValue(2, $cod);
    $rs->execute();
    if($rs->rowCount() > 0){
        $row = $rs->fetch(PDO::FETCH_ASSOC);
        return "Este Trailer já foi registrado, <strong>CÓDIGO: ". $row['cod']. "</strong>";
    }
    return "";
}


function getTitulo($cod){
    $pdo = getConexao();
    $rs = $pdo->query("SELECT titulo FROM trailer WHERE cod=$cod");
    if($rs->rowCount() > 0){
        $ti = $rs->fetch(PDO::FETCH_ASSOC);
        return $ti['titulo'];
    }
    return "nada encontrado...";
}


function getDesc($cod){
    $pdo = getConexao();
    $rs = $pdo->query("SELECT descricao FROM trailer WHERE cod=$cod");
    if($rs->rowCount() > 0){
        $de = $rs->fetch(PDO::FETCH_ASSOC);
        return $de['descricao'];
    }
    return "nada encontrado...";
}


function getLink($cod){
    $pdo = getConexao();
    $rs = $pdo->query("SELECT link FROM trailer WHERE cod=$cod");
    if($rs->rowCount() > 0){
        $li = $rs->fetch(PDO::FETCH_ASSOC);
        return $li['link'];
    }
    return "nada encontrado...";
}

?>