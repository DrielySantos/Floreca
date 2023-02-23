<?php

    require_once './conexao.php';

    session_start();
    ob_start();

    $_SESSION["quant"]+=1;

    echo $_SESSION["quant"];

    $cesta = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    // var_dump($cesta);

    $idservico = $cesta["idservico"];
    $quantserv = $cesta["quantserv"];

    $sql = "SELECT idservico,idcliente,idfuncionario,valor
    FROM servico
    WHERE idservico = $idservico LIMIT 1";

    $resultado= $conn->prepare($sql);
    $resultado->execute();

    if(($resultado)and($resultado->RowCount()!=0)){
        $linha=$resultado->fetch(PDO::FETCH_ASSOC);
        extract($linha);
        
        if($quantidade<$quantserv){        
            header("Location:./index.php");
        }
        else{
            $sql2 = "INSERT into servico(idservico,valor,idcliente,idfuncionario) values (:idservico,:valor,:idcliente,:idfuncionario)";
            $salvar2= $conn->prepare($sql2);
            $salvar2->bindParam(':idservico', $data, PDO::PARAM_STR);
            $salvar2->bindParam(':valor', $valor, PDO::PARAM_STR);
            $salvar2->bindParam(':idcliente', $idcliente, PDO::PARAM_STR);
            $salvar2->bindParam(':valor', $valor, PDO::PARAM_STR);
            $salvar2->bindParam(':idfuncionario', $idfuncionario, PDO::PARAM_STR);
            $salvar2->execute();


        }

}



?>