<?php
    require_once './head.php';
    require './menu.php';
    include_once './conexao.php';

    $totalservice = 0;
    $sql = "SELECT * from servico_temp";
    $resultado= $conn->prepare($sql);
    $resultado->execute();

    if(($resultado)and($resultado->RowCount()!=0)){

?>~

    <form action="./finaliza-serv.php" method="post">
        <table class="table">
            <thead>
                <tr>
                    <!-- <th scope="col">Imagem</th> -->
                    <th scope="col">Cliente</th>
                    <th scope="col">Funcionário</th>
                    <th scope="col">Procedimento</th>
                    <th scope="col">Data</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Total</th>       
                </tr>
            </thead>
        <tbody>

<?php
    while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
       
        extract($linha);             
    
?>        
        <tr>
          <td scope="row"></td>
          <td><?php echo $cliente ?></td>
          <td><?php echo $funcionario ?></td>
          <td><?php echo $procedimento ?></td>
          <td><?php echo $data ?></td>
          <td><?php echo $horario ?></td>
          <td><?php echo $valor ?></td>
          <td><?php echo $quantserv ?></td>
          <td><?php echo $total = $quantserv * $valor;
                         $totalcompra += $total; ?></td>
         
            <td>      
                <a href="./finaliza-serv.php"><button type="submit" class="btn btn-danger" name="excluir" value="<?php echo $idcliente; ?>">Excluir</button></a>
            </td>
        </tr>        
         

<?php   
    } 
?>

    <tr><td><?php echo "Total do serviço - R$".$totalcompra; ?></td></tr>

        </tbody>
    </table>

    <?php $_SESSION["totalcompra"]=$totalcompra; ?>

    <input type="submit" class="btn btn-sucess" name="finalizar" value="Finalizar serviço">
 </form>

<?php
    }
    require_once './footer-admin.php';
?>