<?php

    $nome = addslashes(trim($_POST['nome']));
    $email = addslashes(trim($_POST['email']));
    $senha = addslashes(trim($_POST['senha']));

    require_once "data/dbUsuario.php";

    registrarUsuario($nome, $email, $senha);

?>