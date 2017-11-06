<?php

session_start();              
if(isset($_SESSION['user'])){
  $u = $_SESSION['user'];
  if(!($u == 'admin')){
    header("location: frmLogin.php");
  }else{

    $cod = trim(addslashes($_POST['cod']));
    $titulo = trim(addslashes($_POST['titulo']));
    $desc = trim(addslashes($_POST['desc']));
    $link = trim(addslashes($_POST['link']));

/*     echo "$cod <br>";
    echo "$titulo <br>";
    echo "$desc <br>";
    echo "$link <br>"; */
    require_once "data/dbTrailer.php";

    updateTrailer($cod, $titulo, $desc, $link);
  }             
}
?>
