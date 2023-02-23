<?php
    session_start();
    ob_start();

    require_once './conexao.php';


    if(isset($_POST["excluir"])) {

        $codigoproduto = $_POST["excluir"];

        $sqlexcluir = "DELETE from servico_item 
                       where idcliente = $idcliente";
        $resulexcluir=$conn->prepare($sqlexcluir);
        $resulexcluir->execute();
        $_SESSION["quant"]-=1;

    }
    else {
        if(!isset($_SESSION['nome'])) {
            // $_SESSION["carrinho"] = true;
            // echo "<script>
            // alert('Faça login para finalizar sua compra!');
            // parent.location = 'login.php'; </script>";
        }
        
        else{
            
            // acessar pagamento;
            $data = date('y-m-d');
            $valor = $_SESSION['totalcompra'];
            $idcliente = $_SESSION["cliente"];
            
            $sqlvenda = "INSERT into servico(idservico,valor,idcliente,idfuncionario) values (:idservico,:valor,:idcliente,:idfuncionario)";
            $salvarvenda= $conn->prepare($sqlvenda);
            $salvarvenda->bindParam(':idservico', $idservico, PDO::PARAM_STR);
            $salvarvenda->bindParam(':valor', $valor, PDO::PARAM_STR);
            $salvarvenda->bindParam(':idcliente', $idcliente, PDO::PARAM_STR);
            $salvarvenda->bindParam(':idfuncionario', $idfuncionario, PDO::PARAM_STR);
            $salvarvenda->execute();

            $venda = "Select LAST_INSERT_ID()";
            $resulvenda=$conn->prepare($venda);
            $resulvenda->execute();

            $linhavenda = $resulvenda->fetch(PDO::FETCH_ASSOC);
            $idvenda = ($linhavenda["LAST_INSERT_ID()"]);

            $busca = "SELECT * from servico_temp";
            $resulbusca=$conn->prepare($busca);
            $resulbusca->execute();

            if(($resulbusca) && ($resulbusca->rowCount()!=0)){
                while ($linha = $resulbusca->fetch(PDO::FETCH_ASSOC)) {
                    extract($linha);

                    $sqlitem = "INSERT into itemservico(iditem,idservico,idprocedimento,data,horario,valor) values (:iditem,:idservico,:idprocedimento,:data,:horario,:valor)";
                    $salvaritem= $conn->prepare($sqlitem);
                    $salvaritem->bindParam(':iditem', $iditem, PDO::PARAM_INT);
                    $salvaritem->bindParam(':idservico', $idservico, PDO::PARAM_INT);
                    $salvaritem->bindParam(':idprocedimento', $idprocedimento, PDO::PARAM_INT);
                    $salvaritem->bindParam(':data', $data, PDO::PARAM_STR);
                    $salvaritem->bindParam(':horario', $horario, PDO::PARAM_STR);
                    $salvaritem->bindParam(':valor', $valor, PDO::PARAM_STR);
                    $salvaritem->execute();

                    // $estoque = "UPDATE produto set quantidade=(quantidade - $quantcompra)
                    // where codigoproduto = $codigoproduto";
                    // $atualiza=$conn->prepare($estoque);
                    // $atualiza->execute();

                }
            }

            $sqllimpa = "DELETE from servico_temp";
            $limpa= $conn->prepare($sqllimpa);
            $limpa->execute();
            $_SESSION["quant"] = 0;
            header("Location:./index.php");
        }

        
    }

    ?>