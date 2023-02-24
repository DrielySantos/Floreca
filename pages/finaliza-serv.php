<?php
    session_start();
    ob_start();

    require_once './conexao.php';


    if(isset($_POST["excluir"])) {

        $servico_item = $_POST["excluir"];

        $sqlexcluir = "DELETE from cartao
                       where idprocedimento = $idprocedimento";
        $resulexcluir=$conn->prepare($sqlexcluir);
        $resulexcluir->execute();
        $_SESSION["quant"]-=1;

    }
    
        
        else{
            
            // acessar pagamento;
            $data = date('y-m-d');
            $valor = $_SESSION['totalservice'];
            $idcliente = $_SESSION['idcliente'];
            
            $sqlvenda = "INSERT into servico(data,horario,valor,idcliente) values (:data,:horario,:valor,:idcliente)";
            $salvarvenda= $conn->prepare($sqlvenda);
            // $salvarvenda->bindParam(':idservico', $idservico, PDO::PARAM_STR);
            $salvarvenda->bindParam(':data', $data, PDO::PARAM_STR);
            $salvarvenda->bindParam(':horario', $horario, PDO::PARAM_STR);
            $salvarvenda->bindParam(':valor', $valor, PDO::PARAM_STR);
            $salvarvenda->bindParam(':idcliente', $idcliente, PDO::PARAM_STR);
            // $salvarvenda->bindParam(':idfuncionario', $idfuncionario, PDO::PARAM_STR);
            $salvarvenda->execute();

            $venda = "Select LAST_INSERT_ID()";
            $resulvenda=$conn->prepare($venda);
            $resulvenda->execute();

            $linhavenda = $resulvenda->fetch(PDO::FETCH_ASSOC);
            $idvenda = ($linhavenda["LAST_INSERT_ID()"]);

            $busca = "SELECT * from cartao";
            $resulbusca=$conn->prepare($busca);
            $resulbusca->execute();

            if(($resulbusca) && ($resulbusca->rowCount()!=0)){
                while ($linha = $resulbusca->fetch(PDO::FETCH_ASSOC)) {
                    extract($linha);

                    $sqlitem = "INSERT into itemservico(idservico,idprocedimento,data,horario,valor) values (:idservico,:idprocedimento,:data,:horario,:valor)";
                    $salvaritem= $conn->prepare($sqlitem);
                    $salvaritem->bindParam(':idservico', $idservico, PDO::PARAM_INT);
                    $salvaritem->bindParam(':idprocedimento', $idprocedimento, PDO::PARAM_INT);
                    $salvaritem->bindParam(':data', $data, PDO::PARAM_STR);
                    $salvaritem->bindParam(':horario', $horario, PDO::PARAM_STR);
                    $salvaritem->bindParam(':valor', $valor, PDO::PARAM_STR);
                    $salvaritem->execute();

                }
            }

            $sqllimpa = "DELETE from cartao";
            $limpa= $conn->prepare($sqllimpa);
            $limpa->execute();
            $_SESSION["quant"] = 0;
            header("Location:./index.php");
        }

        
    

    ?>