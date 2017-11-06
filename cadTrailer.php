<?php
    session_start();
    if(isset($_SESSION['user'])){
        $titulo = addslashes(trim($_POST['titulo']));
        $desc = addslashes(trim($_POST['desc']));
        $link = addslashes(trim($_POST['link']));
    /*     echo "titulo: $titulo <br>";
        echo "descricao: $desc <br>";
        echo "link: $link <br>"; */

        require_once "data/dbTrailer.php";
        registrarTrailer($titulo, $desc, $link);
    }

?>