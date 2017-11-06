<?php
       session_start();
    if(isset($_SESSION['user'])){
        $cod = addslashes(trim($_GET['cod']));
    /*     echo "titulo: $titulo <br>";
        echo "descricao: $desc <br>";
        echo "link: $link <br>"; */

        require_once "data/dbTrailer.php";
        deletarTrailer($cod);
    }else{
        die("AREA RESTRITA!");
    }
?>