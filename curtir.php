<?php
    session_start();
    if(isset($_SESSION['user'])){
        $cod = $_GET['cod'];
        $id = $_GET['user'];
        //echo "$cod, $id";
        require_once "data/dbRank.php";
        curtir($cod, $id);
    }
?>