<?php
    require_once "conexao.php";

    function curtir($idTrailer, $idUser){
        // se verifica retornar false significa que o usuario nao curtiu este trailer ainda
        session_start();
        if(!verifica($idTrailer, $idUser)){
            $pdo = getConexao();
            $sql = "INSERT INTO rank (idTrailer, idUser) VALUES (?, ?)";
            $rs = $pdo->prepare($sql);
            $rs->bindValue(1, $idTrailer);
            $rs->bindValue(2, $idUser);
            $rs->execute();
               
            if($rs){
                $_SESSION['mensagem'] = "O trailer $idTrailer foi curtido...";
            }
        }else{
            $_SESSION['mensagem'] = "Você ja curtiu este trailer...";
        }
        header("location: index.php");
    }

    /* Verifica se o usuario ja curtiu o trailer */
    function verifica($t, $u){
        $pdo = getConexao();
        $sql = "SELECT * FROM rank WHERE idTrailer=? AND idUser=?";
        $rs = $pdo->prepare($sql);
        $rs->bindValue(1, $t);
        $rs->bindValue(2, $u);
        $rs->execute();
        if($rs->rowCount() > 0){
            return true;
        }
        return false;
    }


    function getLikesTrailer($cod){
        $pdo = getConexao();
        $sql = "SELECT COUNT(*) FROM rank WHERE idTrailer=?";
        $rs = $pdo->prepare($sql);
        $rs->bindValue(1, $cod);
        $rs->execute();

        if($rs->rowCount() > 0){
            $count = $rs->fetchColumn();
            return $count;
        }
        return 0;
    }


    function getRanking(){

        $pdo = getConexao();
    
        $rs = $pdo->query("SELECT idTrailer AS cod, count(*) AS likes FROM rank GROUP by idTrailer ORDER by COUNT(idTrailer) desc;");
        if($rs->rowCount() > 0){
/*             while($row = $rs->fetch(PDO::FETCH_ASSOC)){
                echo "<p>";
                var_dump($row);
                echo "</p>";
            } */
            return $rs;
        }else{
            echo "ERRO!";
        }
        return 0;
    }

    //getRanking();

  /*   if(verifica(2,1)){
        echo getLikesTrailer(1);
    }else{
        echo "Trailer nao foi curtido";
    }
 */
?>