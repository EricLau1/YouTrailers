<?php

function getConexao(){
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=bdtrailers","root","");
        $pdo->query("set names utf8");
        //echo "Conectado com sucesso";
    }catch(PDOException $e){
        //echo "ERRO: ".$e->getMessage();
    }
    return $pdo;
}

//$pdo = getConexao();
?>